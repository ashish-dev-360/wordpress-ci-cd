<?php
/*
Plugin Name: Login / Registration Without Password
Plugin URI: https://newfold.com/
Description: Allow users to login or register without password.
Version: 1.0
Requires PHP: 7.2
Author: Ashish Kumar
Author URI: https://newfold.com/
Text Domain: lpw
*/

//Create register form
function lpw_register_form($atts){
    //default fields
    $fields = array(
        'email' => 'email',
        'firstname' => '',
        'lastname' => '',
        'phone' => ''
    );

    $applied_fields = shortcode_atts($fields, $atts);

    $form = '<form name="lwp_registerform" id="lwp_registerform" class="lwpregister" action="https://academy.bluehost.com/wp-login.php?action=register" method="post">';
    $form .= '<p class="lwp-field-email lwp-required"><label for="email">User Email <span class="lwp-required-field">*</span></label><input type="text" id="email" name="user_email" value=""></p>';

    if($applied_fields['firstname'] != '' && $applied_fields['firstname'] == 'true'){
        $form .= '<p class="lwp-field-firstname "><label for="firstname">Firstname</label><input type="text" id="firstname" name="firstname" value=""></p>';
    }

    if($applied_fields['lastname'] != ''  && $applied_fields['lastname'] == 'true'){
        $form .= '<p class="lwp-field-lastname "><label for="lastname">Lastname</label><input type="text" id="lastname" name="lastname" value=""></p>';
    }

    if($applied_fields['phone'] != ''  && $applied_fields['phone'] == 'true'){
        $form .= '<p class="lwp-field-phone "><label for="phone">Phone No.</label><input type="text" id="phone" name="phone" value=""></p>';
    }

    $form .= '<input type="hidden" name="redirect_to" value="https://academy.bluehost.com/?ld-registered=true&amp;ld_register_id=0">';		
    $form .= '<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Enroll Now">';
    $form .= '<p class="registration-login">Already enrolled? <a class="registration-login-link" href="">Log In</a></p>';
    $form .= '</form>';
    
    return $form;

}

add_shortcode('lpw-register', 'lpw_register_form');