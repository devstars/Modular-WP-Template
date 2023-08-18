<?php
class Configuration{       

    public static $email;
    public static $phone;        
    public static $phone_link;    
    public static $socials;      
    
    public static $server;
    public static $company_name;
    public static $fields;
    public static $contact;

    public static $google_map_api_key;
            
    public static function get()
    {
        self::$fields = get_fields("option");

        $company_details = self::$fields["company_details"];

        self::$email = trim($company_details["email"]);

        self::$phone = trim($company_details["phone"]);

        self::$company_name = trim($company_details["name"]);        
        self::$phone_link = self::phone_link(self::$phone);                
                
        if ($company_details['sm_repeater']) :
            foreach ($company_details['sm_repeater'] as $key => $social) :
                self::$socials[$social['name']] = array('icon' => strtolower($social['name']) ,'name' => $social['name'], 'url' => $social['url']  );
            endforeach;
        endif;

        self::$server = trim(self::$fields["server"]);   
        self::$contact = self::$fields["contact_form"];
        self::$google_map_api_key = trim($company_details["google_map_api_key"]);        

    }

    public static function phone_link($phone){
        return "phone:".preg_replace("/\s+/", "", $phone);
    }

    public static function get_root_styles(){        

        ob_start();

        $rootParameters = self::getRootParameters(self::$fields);        
        foreach($rootParameters as $key => $option){
            if (strpos($key, "root_") === 0) {   
                    $name = str_replace(["root_","_"], ["--modular_", "-"], $key);
                    ?><?= $name ?>: <?= $option ?>; <?php
            }
        }

        $styles = ob_get_clean();
        if($styles) return "<style> :root {".$styles."}</style>";
    }


    public static function getRootParameters($array) {
        $parameters = array();
    
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                // If the value is an array, use recursion to get parameters from the nested array
                $nestedParameters = self::getRootParameters($value);
                $parameters = array_merge($parameters, $nestedParameters);
            } else {
                // If the value is not an array, it is a parameter in the parent array
                if (strpos($key, "root_") === 0) {
                    if (preg_match('/\s/', $value)) {
                        $parameters[$key] = "'".$value."'";
                    }else{
                        $parameters[$key] = $value;
                    }   
                    
                }            
            }
        }
    
        return $parameters;
    }
    

    public static function init(){
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page(array(
                'page_title' => 'Configuration page',
                'menu_title' => 'Configuration',
                'icon_url' => 'dashicons-images-alt2',
                'redirect' => false
            ));
        }

        Configuration::get();        
    }
}
?>