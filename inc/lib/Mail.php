<?php            
class Mail{            
    public $success = false;
    public $error;
    public $email_firm;

    public $full_name;
    public $user_email;
    public $phone;
    public $message;
    public $thanks = "Thank you for your message. It has been sent.";
    
    public $recaptcha_response;

    public $subject = 'Medica Assistance';
    
    public function __construct() {      
        
        $this->email_firm = Configuration::$email;                    
    }

    public function make(){        
        if (isset($_POST['g-recaptcha-response'])) {
            $this->full_name = htmlspecialchars($_POST['full_name']);
            $this->user_email = htmlspecialchars($_POST['email']);
            $this->message = htmlspecialchars($_POST['message']);
            $this->recaptcha_response = $_POST['g-recaptcha-response'];

            if ($this->check_fields()) {                            
                $this->send_mail();                                    
            }
        }                                            
    }

    public function view(){
        ?>  
        
        <form class="c-form section-blue" id="contact-form" medthod="POST" action="contact-form">

        <?php        
        if($this->error):
            ?>  
            <div class="row">
                <div class="col-12">                        
                    <div class="form__error"><?= $this->error; ?></div>                                            
                </div>
            </div>
            <?php
        endif;

        if($this->success):
            ?>  
            <div class="row">
                <div class="col-12">
                    <div class="form__thanks"><?= $this->thanks; ?></div>
                </div>
            </div>
            <?php
        endif;

        if (empty($this->success)) :
        ?>                

                <div class="row">
                    <div class="col-12">
                        <input type="text" class="form__input field-js" name="full_name" placeholder="Full Name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <input type="text" class="form__input field-js" name="full_name" placeholder="Adres e-mail" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="text" class="form__input field-js" name="email" placeholder="Telefon kontaktowy" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <textarea name="message" class="form__textarea field-js" rows="6" placeholder="Message" required></textarea>
                    </div>
                </div>

                <div class="permission-js ">
                    <label class="form__label o-custom-check mb-5   permission-wrapper">
                        <input class="" type="checkbox" name="checkbox" value="true" required>
                        <span>
                            <i class="far fa-check-square"></i>
                            <i class="far fa-square"></i>
                            <p class="form__permission ml-2">

                            <?php 
                            $options = get_fields("options");
                            if($options['c_permissions']){
                                foreach($options["c_permissions"] as $permission){            
                                    echo $permission["cp_label"];
                                }     
                            }        
                            ?>                                    
                            </p>
                        </span>
                    </label>
                </div>

                <div class="row recaptcha-js">
                    <div class="col-12">
                        <div class="g-recaptcha mb-4" data-size="normal" data-sitekey="6LdryV8UAAAAAIZEvqUaSEttca1anP2GeMviDhjw"></div>
                    </div>
                </div>

                <button class="form__btn btn btn--orange" type="submit">Wyślij <i class="fas fa-chevron-right pl-1"></i> </button>
                <div class="clearfix"></div>
            
        <?php
        endif;
        ?>
        </form>
        <?php
    }

    public function send_mail(){      
                 
        $body = '<b>' . 'Name'.':'. '</b><br> ' . $this->full_name .
                '<br><b>' . 'E-mail' . '</b><br> ' . $this->user_email;                
        
        if($this->message){
            $body .=  '<br><b>' . 'Message' . '</b><br>' . nl2br($this->message);                  
            $body .= "<br><br>This e-mail was sent from a contact form on ".$this->subject.".";         
        }        

        $headers = 'From:'.$this->subject.'<' . $this->email_firm . ">\r\n" .
                'Reply-To: ' . htmlspecialchars($this->user_email) . "\r\n" .
                'Content-Type: text/html; charset=UTF-8' . "\r\n";       
                
        $this->success = wp_mail($this->email_firm, $this->subject, $body, $headers);        
        
        if(!$this->success){
            $this->error = "There was an error trying to send your message. Please try again later.";
        }

        return $this->success;
    }

    public function check_fields(){  
        
        $resp = true;

       if (!filter_var($this->user_email, FILTER_VALIDATE_EMAIL)) {
            $resp = false;
            $this->error = 'The e-mail address entered is invalid.';
        }    
        
        if(!$this->email_firm){
            $resp = false;
            $this->error = 'There was an error trying to send your message. Please try again later.';
        }

        if (empty($this->recaptcha_response)){
            $resp = false;
            $this->error = 'Please, fill the captcha to send the message.';
        }else{
            $verifyResponse = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . RECAPTCHA_SECRET . '&response=' . $this->recaptcha_response));
            if (!$verifyResponse->success){
                $resp = false;
                $this->error = 'Please, fill the captcha to send the message.';
            }
        }

        return $resp;
    }

}

