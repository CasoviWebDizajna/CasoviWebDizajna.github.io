<?php
                         
if(filter_has_var(INPUT_POST, 'submit')) {

  $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
  $subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
  $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

  if(!empty($email) && !empty($subject) && !empty($message)) {
    $to = "miricmilica35@gmail.com"; // your mail here
    $body = "Message: $message\nE-mail: $email";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";

      if(mail($to, $subject, $headers, $message, $body)) {
        $output = json_encode(array('success' => true));
        die($output);
      } else {
        $output = json_encode(array('success' => false));
        die($output);
      }
    
  } else {
    
    echo "You must fill in all the required fields!";
    
  }
};
?>
