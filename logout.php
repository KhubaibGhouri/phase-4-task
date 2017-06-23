<?php

session_start();

if(isset($_SESSION['user']))

{

 $_SESSION['user'] = NULL;

		unset($_SESSION['user']);

		header("Location: index.php");

}else{

		header("Location: index.php");
}


if(isset($_SESSION['type']))

{

 $_SESSION['type'] = NULL;

		unset($_SESSION['type']);

		header("Location: index.php");

}else{

		header("Location: index.php");
}




?>