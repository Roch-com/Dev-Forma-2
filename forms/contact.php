<?php

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'wittarochambeau@gmail.com';

  if( file_exists($php_email_form = 'php-email-form/validate.js' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $Contact = new php_email_form;
  $Contact->ajax = true;
  
  $Contact->to = $receiving_email_address;
  $Contact->from_name = $_POST['name'];
  $Contact->from_email = $_POST['email'];
  $Contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $Contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $Contact->add_message( $_POST['name'], 'From');
  $Contact->add_message( $_POST['email'], 'Email');
  $Contact->add_message( $_POST['message'], 'Message', 10);

  echo $Contact->send();
?>
