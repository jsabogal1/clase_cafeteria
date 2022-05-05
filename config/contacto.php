<?php
include("../mail/class.phpmailer.php");
require '../mail/class.smtp.php';
require '../mail/PHPMailerAutoload.php';
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$mail = $_POST['correo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$mensaje = $_POST['mensaje'];

$correo = new PHPMailer(); 
$correo->IsSMTP(); 
$correo->SMTPDebug = 1;
$correo->SMTPAuth = true;
$correo->Host = "pod51004.outlook.com";
$correo->SMTPSecure = 'tsl';
$correo->SMTPAuth=true;
$correo->Port = 587;

$correo->IsHTML(false);
$correo->Username   = "jorge.sabogals@campusucc.edu.co";// corrreo
$correo->Password   = "Sabogal89";// tu clave

$correo->SetFrom("jorge.sabogals@campusucc.edu.co", "Contacto Restaurante");//tu corrreo envio ,"Nombre"
$correo->AddAddress("jleonardosabogal@gmail.com");//correo destino, "nombre"
//$correo->AddCC(); //Con Copia

$correo->Subject = "Contacto Resturante";//asunto

$msn= "El siguiente mensaje - ".$mensaje." - enviado por: ".$nombres." , ".$apellidos." telefono: ".$telefono." Direccion: ".$direccion." Correo: ".$mail; 

$correo->Body = $msn;//mensaje 
 if(!$correo->Send()) {

  echo "Hubo un error: " . $correo->ErrorInfo;

} else {
	echo "<script language='JavaScript'> 
          alert('Mensaje enviado con exito'); 
          location.href='../index.php';
          </script>";
}
?>


