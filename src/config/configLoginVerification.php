<?php
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/configuration.php") || !file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php")) {
	header(header: "Location: ../install/install.php");}
require_once $_SERVER['DOCUMENT_ROOT'] . "/configuration.php";
session_start();
if ($_POST['username'] == $config['name'] && $_POST['password'] == $config['password']) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];

    header('Location: /config/config.php');
} else {
    header('Location: /config/configLogin.php');
}
