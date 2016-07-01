<?php

//suscribir news
add_action('wp_ajax_nopriv_suscribir', 'suscribir_email');
add_action('wp_ajax_suscribir', 'suscribir_email');

function suscribir_email() {

    header('Content-type: application/json');

    $honeyPot = filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);


    //Descarto por ser un bot!
    if ($honeyPot !== '') {
        echo json_encode(array('enviado' => TRUE, 'trucho-sex' => TRUE));
        die();
    }

    if (is_null($email)) {
        echo json_encode(array('enviado' => TRUE, 'trucho-vacio' => TRUE));
        die();
    }


    // COMMON FOR ALL CLIENTS

    include_once 'class.phpmailer.php';

    $cuerpo_email = "<h3>Nueva Subscripcion a Newsletter!</h3>                                    
                    <p>Email: <b>{$email}</b></p>";

    $asunto = 'Subscripcion Newsletter';

    $mail = new PHPMailer;

    $mail->IsSMTP();                           // tell the class to use SMTP

    $mail->SMTPAuth = true;                  // enable SMTP authentication  
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;                    // set the SMTP server port
    $mail->Host = "smtp.gmail.com"; // SMTP server
    $mail->Username = "formulario@worq.com.ar";     // SMTP server username
    $mail->Password = "f0rmulario_de_worq_con_q";            // SMTP server password
// Enable encryption, 'ssl' also accepted

    $mail->From = 'formulario@worq.com.ar';
    $mail->FromName = 'Formulario de Suscripcion';
    $mail->addAddress('nicolas@worq.com.ar', 'Nicolas');  // Add a recipient
    $mail->addReplyTo('formulario@worq.com.ar', 'Form');

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $asunto;
    $mail->Body = $cuerpo_email;


    if (!$mail->send()) {
        echo json_encode(array('enviado' => FALSE, 'error-mailer' => $mail->ErrorInfo));
        exit;
    }
    echo json_encode(array('enviado' => TRUE));
    die();
}
