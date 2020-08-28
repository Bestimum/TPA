<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form

	//mysql credentials
	$mysql_host = "host";
	$mysql_username = "username";
	$mysql_password = "password";
	$mysql_database = "database";

	$u_name = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
        
        $u_blog = filter_var($_POST["blog"], FILTER_SANITIZE_STRING);
        $u_blogBlogger = filter_var($_POST["blogBlogger"], FILTER_SANITIZE_STRING);
        $u_blogDiseno = filter_var($_POST["blogDiseno"], FILTER_SANITIZE_STRING);
        $u_blogExblog = filter_var($_POST["blogExblog"], FILTER_SANITIZE_STRING);
        $u_blogExblogger = filter_var($_POST["blogExblogger"], FILTER_SANITIZE_STRING);
        
        $u_mediaCanal = filter_var($_POST["mediaCanal"], FILTER_SANITIZE_STRING);
        $u_mediaYoutuber = filter_var($_POST["mediaYoutuber"], FILTER_SANITIZE_STRING);
        $u_mediaContenido = filter_var($_POST["mediaContenido"], FILTER_SANITIZE_STRING);
        $u_mediaStreamer = filter_var($_POST["mediaStreamer"], FILTER_SANITIZE_STRING);
        $u_mediaExStreamer = filter_var($_POST["mediaExStreamer"], FILTER_SANITIZE_STRING);
        $u_mediaExCanal = filter_var($_POST["mediaExCanal"], FILTER_SANITIZE_STRING);
        $u_mediaExYoutuber = filter_var($_POST["mediaExYoutuber"], FILTER_SANITIZE_STRING);
        
        $u_twitterMejor = filter_var($_POST["twitterMejor"], FILTER_SANITIZE_STRING);
        $u_twitterEx = filter_var($_POST["twitterEx"], FILTER_SANITIZE_STRING);
        $u_twitterPerfil = filter_var($_POST["twitterPerfil"], FILTER_SANITIZE_STRING);
        $u_twitterExPerfil = filter_var($_POST["twitterExPerfil"], FILTER_SANITIZE_STRING);
        
        $u_comunidadAmigo = filter_var($_POST["comunidadAmigo"], FILTER_SANITIZE_STRING);
        $u_comunidadAmable = filter_var($_POST["comunidadAmable"], FILTER_SANITIZE_STRING);
        $u_comunidadSimpatico = filter_var($_POST["comunidadSimpatico"], FILTER_SANITIZE_STRING);
        $u_comunidadPinguino = filter_var($_POST["comunidadPinguino"], FILTER_SANITIZE_STRING);
        $u_comunidadPinguinoRetirado = filter_var($_POST["comunidadPinguinoRetirado"], FILTER_SANITIZE_STRING);
        $u_comunidadServicial = filter_var($_POST["comunidadServicial"], FILTER_SANITIZE_STRING);
        $u_comunidadProyecto = filter_var($_POST["comunidadProyecto"], FILTER_SANITIZE_STRING);
        
        $u_staffModerador = filter_var($_POST["staffModerador"], FILTER_SANITIZE_STRING);
        $u_staffGestor = filter_var($_POST["staffGestor"], FILTER_SANITIZE_STRING);
        $u_staffRoleplayer = filter_var($_POST["staffRoleplayer"], FILTER_SANITIZE_STRING);
        $u_staffDisenador = filter_var($_POST["staffDisenador"], FILTER_SANITIZE_STRING);
        $u_staffProgramador = filter_var($_POST["staffProgramador"], FILTER_SANITIZE_STRING);
        $u_staffEditor = filter_var($_POST["staffEditor"], FILTER_SANITIZE_STRING);
        $u_staffEx = filter_var($_POST["staffEx"], FILTER_SANITIZE_STRING);
        
        $u_CPPSStaff = filter_var($_POST["CPPSStaff"], FILTER_SANITIZE_STRING);
        $u_CPPSFiesta = filter_var($_POST["CPPSFiesta"], FILTER_SANITIZE_STRING);
        $u_CPPSSala = filter_var($_POST["CPPSSala"], FILTER_SANITIZE_STRING);
        $u_CPPSWeb = filter_var($_POST["CPPSWeb"], FILTER_SANITIZE_STRING);
        $u_CPPSBlog = filter_var($_POST["CPPSBlog"], FILTER_SANITIZE_STRING);

	if (empty($u_name)){
		PRINT <<<HERE
                  <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
                   <link href="https://fonts.googleapis.com/css?family=Patrick+Hand&display=swap" rel="stylesheet">

                  <style media="screen">
                          body {
                          background-color: rgb(241, 255, 213);
                          }
                          p {
                          font-size: 30px; font-family: 'Itim', cursive;
                          padding-left: 10px;
                          padding-right: 10px;
                          text-align: center;
                          }
                          h1 {
                          font-family: 'Patrick Hand', cursive;
                          text-align: center;
                          font-size: 60px;
                          }
                          a{
                          transition:1s;
                          color:red;
                          text-decoration:none;
                          }
                          a:hover {
                          transition:1s;
                          color:black;
                          }
                  </style>
                 <h1>:(</h1>
                <p>Ups... ¡Parece que has olvidado poner tu <b>pingüino!</b></p>
                <p>Por favor, regresa <b><a href="./">atrás</a></b> e introduce tu usuario.</p>
                
                HERE;
                die();
	}

	//Open a new connection to the MySQL server
	//see https://www.sanwebe.com/2013/03/basic-php-mysqli-usage for more info
	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

	//Output any connection error
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	$statement = $mysqli->prepare("INSERT INTO Votaciones (Usuario, Blog, BlogBlogger, BlogDiseno, BlogExblog, BlogExblogger, MediaCanal, MediaYoutuber, MediaContenido, MediaStreamer, MediaExStreamer, MediaExCanal, MediaExYoutuber, TwitterMejor, TwitterEx, TwitterPerfil, TwitterExPerfil, ComunidadAmigo, ComunidadAmable, ComunidadSimpatico, ComunidadPinguino, ComunidadPinguinoRetirado, ComunidadServicial, ComunidadProyecto, StaffModerador, StaffGestor, StaffRoleplayer, StaffDisenador, StaffProgramador, StaffEditor, StaffEx, CPPSStaff, CPPSFiesta, CPPSSala, CPPSWeb, CPPSBlog) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); 
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	$statement->bind_param('ssssssssssssssssssssssssssssssssssss', $u_name, $u_blog, $u_blogBlogger, $u_blogDiseno, $u_blogExblog, $u_blogExblogger, $u_mediaCanal, $u_mediaYoutuber, $u_mediaContenido, $u_mediaStreamer, $u_mediaExStreamer, $u_mediaExCanal, $u_mediaExYoutuber, $u_twitterMejor, $u_twitterEx, $u_twitterPerfil, $u_twitterExPerfil, $u_comunidadAmigo, $u_comunidadAmable, $u_comunidadSimpatico, $u_comunidadPinguino, $u_comunidadPinguinoRetirado, $u_comunidadServicial, $u_comunidadProyecto, $u_staffModerador, $u_staffGestor, $u_staffRoleplayer, $u_staffDisenador, $u_staffProgramador, $u_staffEditor, $u_staffEx, $u_CPPSStaff, $u_CPPSFiesta, $u_CPPSSala, $u_CPPSWeb, $u_CPPSBlog); //bind values and execute insert query

	if($statement->execute()){
		PRINT <<<HERE
                  <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
                   <link href="https://fonts.googleapis.com/css?family=Patrick+Hand&display=swap" rel="stylesheet">

                  <style media="screen">
                          body {
                          background-color: rgb(241, 255, 213);
                          }
                          p {
                          font-size: 30px; font-family: 'Itim', cursive;
                          padding-left: 10px;
                          padding-right: 10px;
                          text-align: center;
                          }
                          h1 {
                          font-family: 'Patrick Hand', cursive;
                          text-align: center;
                          font-size: 60px;
                          }
                          a{
                          transition:1s;
                          color:red;
                          text-decoration:none;
                          }
                          a:hover {
                          transition:1s;
                          color:black;
                          }
                  </style>
                 <h1><3</h1>
                <p>¡Perfecto! Sus datos se han recibido correctamente. ¡Gracias por participar!</b></p>
                <p>¿Quieres volver <b><a href="./">atrás</a></b>? Pulsa el botón y volverás a la dimensión principal.</p>
                
                HERE;
	}else{
		print $mysqli->error; //show mysql error if any
	}
}
?>
