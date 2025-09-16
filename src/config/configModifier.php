<?php
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/configuration.php") || !file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php")) {
    header(header: "Location: ../install/install.php");
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/configuration.php";

session_start();
$_SESSION['username'] = "";
$_SESSION['password'] = "";
if (!isset($config['serveurBD']) && !isset($config['name']) && !isset($config['password']) && !isset($config['port'])) {
    header(header: "Location: ../install/install.php");
}
// Supprimer le fichier de configuration
$tempPassword = $config['password'];
unlink($_SERVER['DOCUMENT_ROOT'] . "/configuration.php");

// remplir le fichier configuration.php avec les nouvelles valeurs
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "<?php\n", FILE_APPEND);
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "\$config = [\n", FILE_APPEND);
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "\"serveurBD\"=> \"" . $_POST['serveurBD'] . "\",\n", FILE_APPEND);
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "\"port\"=> \"" . $_POST['port'] . "\",\n", FILE_APPEND);
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "\"dbName\"=> \"" . $_POST['dbName'] . "\",\n", FILE_APPEND);
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "\"name\"=> \"" . $_POST['user'] . "\",\n", FILE_APPEND);
if ($_POST['password'] != "") {
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "\"password\"=> \"" . $_POST['password'] . "\",\n", FILE_APPEND);
} else {
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "\"password\"=> \"" . $tempPassword . "\",\n", FILE_APPEND);
}
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "\"defaultLang\"=> \"" . $_POST['defaultLang'] . "\",\n", FILE_APPEND);
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "\"currencyUnit\"=> \"" . $_POST['currencyUnit'] . "\"\n", FILE_APPEND);
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "];\n", FILE_APPEND);
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "?>", FILE_APPEND);
header("Location: ../index.php");




