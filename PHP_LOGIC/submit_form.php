<?php
// Verifica si el método de solicitud es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Esta es la clave secreta para reCAPTCHA
    $secretKey = '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe';
    // Respuesta del reCAPTCHA
    $responseKey = $_POST['g-recaptcha-response'];
    // Dirección IP del usuario
    $userIP = $_SERVER['REMOTE_ADDR'];

    // URL de la verificación de reCAPTCHA
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
    // Obtenemos la respuesta de la verificación
    $response = file_get_contents($url);
    // Decodificamos la respuesta JSON en un array asociativo
    $responseKeys = json_decode($response, true);

    // Verificamos si la respuesta de reCAPTCHA fue exitosa
    if (intval($responseKeys["success"]) !== 1) {
        // Muestra un mensaje de error si reCAPTCHA no fue completado
        echo "Por favor, complete el reCAPTCHA.";
    } else {
        // Sanitizamos los datos del formulario
        $nombre = htmlspecialchars($_POST['nombre']);
        $email = htmlspecialchars($_POST['email']);
        $telefono = htmlspecialchars($_POST['telefono']);
        $mensaje = htmlspecialchars($_POST['mensaje']);

        // Configuración del correo
        $to = 'abigailmolina201@gmail.com'; 
        $subject = 'Nuevo mensaje del formulario de contacto';
        $body = "Nombre: $nombre \nEmail: $email\nTeléfono: $telefono\nMensaje: $mensaje";

        // Encabezados del correo
        $headers = 'From: BienesRaices@gmail.com' . "\r\n" . 
                   'Reply-To: ' . $to . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();
        
        // Intentamos enviar el correo
        if (mail($to, $subject, $body, $headers)) {
            // Redirige a index.php después de un envío exitoso
            header('Location: /PHP/index.php');
            exit();
        } else {
            // Muestra el mensaje de error si el correo no pudo ser enviado
            echo "Error al enviar el mensaje. Por favor, inténtelo de nuevo más tarde.";
        }
    }
}
?>
