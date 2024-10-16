<?php
require_once 'config.php';
require '../../libs/phpmailer/src/Exception.php';
require '../../libs/phpmailer/src/PHPMailer.php';
require '../../libs/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email{
    private $host;
    private $smtp_auth;
    private $username;
    private $password;
    private $port;
    private $from;
    private $name;

    function __construct(){
        $this->host = HOST_EMAIL;
        $this->smtp_auth = SMTP_AUTH;
        $this->username = USER_EMAIL;
        $this->password = PASS_EMAIL;
        $this->port = PORT_EMAIL;
        $this->from = USER_EMAIL;
        $this->name = NAME_EMAIL;
    }

    public function send($email, $name, $subject, $body, $file){
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $this->host;
        $mail->SMTPAuth = $this->smtp_auth;
        $mail->Username = $this->username;
        $mail->Password = $this->password;
        $mail->Port = $this->port;
        $mail->setFrom($this->from, $this->name);
        $mail->addAddress($email, $name);
        if(isset($file) && $file != ''){
            $mail->addAttachment($file);
        }
        $mail->isHTML(true);
        $mail->Subject = utf8_decode($subject);
        $mail->Body    = $body;
        $mail->send();
    }
}
?>