<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST["subject"];
    $message = $_POST['message'];
    $to = "karthikgedx@gmail.com";
    $headers = "From:$email";
    if(mail($to, $subject, $message, $headers)){
        echo "Thank you, $name. Your message has been received.
        you will recive the response on $email";
    }else{
        echo "email sending failed";
    }
    }
  ?>