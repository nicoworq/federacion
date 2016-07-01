<?php

//form contacto
add_action('wp_ajax_nopriv_pedir_reporte', 'enviar_mail_reporte');
add_action('wp_ajax_pedir_reporte', 'enviar_mail_reporte');

function enviar_mail_reporte() {

    /*
     * AJAX CONTACTO
     * 
     * AUTOR: Nicolas Monjelat
     * VERSION 1.0
     * 
     * 
     */


    header('Content-type: application/json');

    $honeyPot = filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_STRING);


    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $apellido = filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_STRING);
    $empresa = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $camara = filter_input(INPUT_POST, 'camara', FILTER_SANITIZE_STRING);

    $reporte = filter_input(INPUT_POST, 'reporte', FILTER_SANITIZE_STRING);


    //Descarto por CSRF
    if (!check_ajax_referer('pedir-reporte-nonce', 'pedir-reporte', false)) {
        echo json_encode(array('enviado' => TRUE, 'trucho' => TRUE, 'csrf' => TRUE));
        die();
    }

//Descarto por ser un bot!
    if ($honeyPot !== '') {
        echo json_encode(array('enviado' => TRUE, 'trucho-sex' => TRUE));
        die();
    }

    if (is_null($nombre) || is_null($email)) {
        echo json_encode(array('enviado' => TRUE, 'trucho-vacio' => TRUE));
        die();
    }



// COMMON FOR ALL CLIENTS

    include_once 'class.phpmailer.php';
    $cuerpo_email = "<h3>Nueva solicitud de reportes desde el Formulario Web</h3>
                    <p>Nombre: <b>{$nombre}</b> </p>  
                    <p>Apellido: <b>{$apellido}</b> </p>                      
                    <p>Email: <b>{$email}</b></p>                        
                    <p>Empresa: <b>{$empresa}</b></p>
                    <p>Cámara: <b>{$camara}</b></p>
                    <p>Reporte: <b>{$reporte}</b></p>";


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
    $mail->FromName = 'Formulario de Contacto Web';
    $mail->addAddress('nicolas@worq.com.ar', 'Nicolas');  // Add a recipient
    $mail->addReplyTo('formulario@worq.com.ar', 'Form');

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Solicitud de Reporte via Web';
    $mail->Body = $cuerpo_email;


    if (!$mail->send()) {
        echo json_encode(array('enviado' => FALSE, 'error-mailer' => $mail->ErrorInfo));
        exit;
    }
    echo json_encode(array('enviado' => TRUE));
    die();
}
