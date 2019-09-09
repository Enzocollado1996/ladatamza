<?php

if(isset($_POST['email'])) {
  $email_to = "tgonzalez991@gmail.com";
  $email_subject = "Contacto desde Web";


    if(!isset($_POST['nombre']) ||
/*
        !isset($_POST['apellido']) ||

        !isset($_POST['dni']) ||

	!isset($_POST['provincia']) ||

        !isset($_POST['email']) ||

	!isset($_POST['telefono']) ||
	
	!isset($_POST['comentario']) ||

	!isset($_POST['pasaporte']) ||

        !isset($_POST['condiciones'])) 
*/
{
        die('Lo sentimos pero parece haber un problema con los datos enviados.');

    }



 

    $nombre = $_POST['nombre']; // requerido

    /*$apellido = $_POST['apellido']; // requerido

    $dni = $_POST['dni']; // requerido

    $provincia = $_POST['provincia']; // requerido

    $email_from = $_POST['email']; // requerido

    $telefono = $_POST['telefono']; // requerido 

    $comentario = $_POST['comentario']; // requerido 

    $pasaporte =  $_POST['pasaporte'];
    //if ($pasaporte1 =='on'){// requerido
    	//$pasaporte = 'Si'; 
   // }else{
       // $pasaporte = 'No'; 
    //}

    $condiciones = $_POST['condiciones'];// requerido
    */

    $error_message = "";//Linea numero 52;



    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

 

    $email_message .= "Nombre: ".clean_string($nombre)."\n";

    /*$email_message .= "Apellido: ".clean_string($apellido)."\n";

    $email_message .= "DNI: ".clean_string($dni)."\n";

    $email_message .= "Provincia/Localidad: ".clean_string($provincia)."\n";
 
    $email_message .= "Telefono: ".clean_string($telefono)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Merece ser el elegido porque: ".clean_string($comentario)."\n";

    $email_message .= "Pasaporte al dia: ".clean_string($pasaporte)."\n";

 //Grabamos a archivos
 $texto = $nombre." ".clean_string($apellido).";".clean_string($dni).";".clean_string($provincia).";".clean_string($telefono).";".clean_string($email_from).";".clean_string( str_replace(";", ',',$comentario)).";".clean_string($pasaporte);

$texto = str_replace("\n", ' ', $texto ); // remove new lines
$texto = str_replace("\r", ' ', $texto ); // remove carriage returns
$texto = iconv("UTF-8", "WINDOWS-1252", $texto);
 
file_put_contents('export.csv', $texto.";\r\n", FILE_APPEND);

*/
//Se crean los encabezados del correo

 

$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();

 
@mail($email_to, $email_subject, $email_message, $headers);

header("Location: /gracias.html");
die();

}

 

?>