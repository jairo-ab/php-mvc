<?php

namespace Crud\Model;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {

    public $mail = null;

    public function __construct() 
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = 2;                                         // Enable verbose debug output
        $this->mail->CharSet = 'UTF-8';
        $this->mail->isSMTP();                                              // Set mailer to use SMTP
        $this->mail->Host       = EMAIL_HOST;          // Specify main and backup SMTP servers
        $this->mail->SMTPAuth   = true;                                     // Enable SMTP authentication
        $this->mail->Username   = EMAIL_USUARIO;                            // SMTP username
        $this->mail->Password   = EMAIL_SENHA;                              // SMTP password
        $this->mail->SMTPSecure = 'tls';                                    // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port       = EMAIL_PORTA;                              // TCP port to connect to

        $this->mail->setFrom(EMAIL,EMAIL_NOME);
            
        $this->mail->isHTML(true);                                  // Set email format to HTML
    }

    public function enviar($email,$assunto,$mensagem,$nome = 'Anônimo') 
    {
        try {
            $this->mail->addAddress($email, $nome); 
            $this->mail->Subject = $assunto;
            $this->mail->Body    = $mensagem;
            //$this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $this->mail->send();
            echo 'Mensagem enviada para o endereço ' . $email;
        } catch (Exception $e) {
            echo "Erro ao enviar mensagem para {$email} código de erro: {$this->mail->ErrorInfo}";
        }
    }

    public function enviarHash($nome,$email,$hash) 
    {
        try {
            $this->mail->addAddress($email, $nome); 
            $this->mail->Subject = "Cadastro de $nome no site";
            $this->mail->Body    = "Olá {$nome}! Seja bem vindo ao nosso site!<br />Segue seu hash <a href='" . URL . "usuarios/confirma/" . $hash . "'>" . $hash . "</a>, clique nele para validar seu cadastro.";
            //$this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return "Erro ao enviar e-mail para {$email}: {$this->mail->ErrorInfo}";
        }
    }
}