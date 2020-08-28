<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form

	//mysql credentials
	$mysql_host = "host";
	$mysql_username = "username";
	$mysql_password = "password";
	$mysql_database = "database";

	$u_name = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING); //set PHP variables like this so we can use them anywhere in code below
	$u_email = filter_var($_POST["user_email"], FILTER_SANITIZE_EMAIL);
        $u_postulation = filter_var($_POST["user_postulation"], FILTER_SANITIZE_STRING);
        $u_projects = filter_var($_POST["user_projects"], FILTER_SANITIZE_STRING);
	$u_contact = filter_var($_POST["user_text"], FILTER_SANITIZE_STRING);

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
	if (empty($u_email) || !filter_var($u_email, FILTER_VALIDATE_EMAIL)){
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
                <p>Ups... ¡Parece que has olvidado poner tu <b>correo electrónico!</b></p>
                <p>Por favor, regresa <b><a href="./">atrás</a></b> e introduce tu email.</p>
                
                HERE;
                die();

	}

  if (empty($u_postulation)){
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
                <p>Ups... ¡Parece que has olvidado poner las <b>categorías</b> a las que quieres presentarte!</p>
                <p>Por favor, regresa <b><a href="./">atrás</a></b> e introdúcelo.</p>
                
                HERE;
                die();

  }

	if (empty($u_contact)){
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
                <p>Ups... ¡Parece que has olvidado poner algún <b>método de contacto!</b></p>
                <p>Por favor, regresa <b><a href="./">atrás</a></b> e introdúcelo para que podamos comunicarnos contigo.</p>
                
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

	$statement = $mysqli->prepare("INSERT INTO Usuarios (Nom, Correu, Carrecs, Projectes, Contacte) VALUES(?, ?, ?, ?, ?)"); //prepare sql insert query
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	$statement->bind_param('sssss', $u_name, $u_email, $u_postulation, $u_projects, $u_contact); //bind values and execute insert query

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
                <p>¿Quieres volver <b><a href="../">atrás</a></b>? Pulsa el botón y volverás a la dimensión principal.</p>
                
                HERE;
	}else{
		print $mysqli->error; //show mysql error if any
	}
}
?>
