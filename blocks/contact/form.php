<?php
$fields = get_field("additional_fields");
?>
<form class="c-form form-rc-js" id="contact-form" medthod="POST" action="contact-form" send="send_ajax" title="Contact Form">

    <div class="row">
        <div class="col-12">
            <div class="form__error"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form__thanks"> <?= Configuration::$contact["form"]["thank_you_message"] ?></div>
        </div>
    </div>

    <div class="hide-after-js">

        <div class="row">
            <div class="col-12 col-md-6">
                <input type="text" class="form__input field-js" name="name" placeholder="Name *" required>
            </div>
            <div class="col-12 col-md-6">
                <input type="email" class="form__input field-js" name="email" placeholder="Email address *" required>
            </div>
        </div>



        <div class="row">

            <?php
            $index = 0;
            foreach ($fields as $field) :

                if ($field["name"]) :
                    $placeholder = $field["name"] . ($field["required"] ? " *" : "");
                    $required = $field["required"] ? " required" : "";
                    $index++;
                    if ($index % 2) {
                        echo '</div><div class="row">';
                    };
            ?>
                    <div class="col-12 col-md-6">
                        <input type="text" class="form__input field-js" name="<?= strtolower($field["name"]) ?>" placeholder="<?= $placeholder ?>" <?= $required; ?>>
                    </div>
            <?php
                endif;

            endforeach;
            ?>

        </div>

        <div class="row">
            <div class="col-12">
                <textarea name="message" class="form__textarea field-js" rows="6" placeholder="Your message *" required></textarea>
            </div>
        </div>



        <div class="mb-5"></div>

        <div class="permission-js fade-in-js u-text-right">
            <label class="form__label o-custom-check mb-5  permission-wrapper">
                <input class="privacy-policy-js" type="checkbox" name="permissions" value="true" required>
                <span>
                    <div class="checked">
                        <?= file_get_contents(IMAGES . '/icons/checkbox-checked.svg'); ?>
                    </div>
                    <div class="unchecked">
                        <?= file_get_contents(IMAGES . '/icons/checkbox-unchecked.svg'); ?>
                    </div>

                    <p class="form__permission ml-4">
                        <?= Configuration::$contact["form"]["permissions"] ?>
                    </p>
                </span>
            </label>
        </div>

        <div class="row fade-in-js">
            <div class="col-12">
                <div class="g-recaptcha recaptcha-js mb-4" data-size="normal" data-sitekey="<?= Configuration::$rc_site_key ?>"></div>
            </div>
        </div>


        <button class="form__btn std-btn-quaternary" type="submit">Send </button>

    </div>



</form>