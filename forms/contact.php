<?php
  $receiving_email_address = 'lokendrabhat.2022@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  
  // You can also add multiple receiving email addresses for the submitted forms via cc and bcc methods.
  // $contact->cc = array('ccreceiver1@example.com', 'ccreceiver2@example.com');
  // $contact->bcc = array('bccreceiver1@example.com', 'bccreceiver2@example.com');

  // Reference: https://bootstrapmade.com/php-email-form/

  $contact->honeypot = $_POST['first_name'];
  echo $contact->send();
?>
