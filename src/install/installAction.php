<?php
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/configuration.php") || !file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php")) {
	header(header: "Location: install/install.php");}
# Redondance au cas où il y aurait une erreur avec le fichier install
if (isset($config['serveurBD']) && isset($config['name']) && isset($config['password']) && isset($config['port'])) {
    header("Location: ../index.php");
}
// Ajouter les donnee au fichier de configuration
else {
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "<?php\n", FILE_APPEND);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "\$config = [\n", FILE_APPEND);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "\"serveurBD\"=> \"" . $_POST['serveurBD'] . "\",\n", FILE_APPEND);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "\"port\"=> \"" . $_POST['port'] . "\",\n", FILE_APPEND);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "\"dbName\"=> \"" . $_POST['dbname'] . "\",\n", FILE_APPEND);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "\"name\"=> \"" . $_POST['user'] . "\",\n", FILE_APPEND);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "\"password\"=> \"" . $_POST['password'] . "\",\n", FILE_APPEND);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "\"defaultLang\"=> \"" . $_POST['defaultLang'] . "\",\n", FILE_APPEND);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "\"currencyUnit\"=> \"" . $_POST['currencyUnit'] . "\"\n", FILE_APPEND);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "];\n", FILE_APPEND);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php", "?>", FILE_APPEND);
    header("Location: ../index.php");
}