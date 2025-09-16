<?php
session_start();
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/configuration.php")) {
    header(header: "Location: ../install/install.php");
    exit();
}
else if (!isset($_SESSION['username']) || !isset($_SESSION['password']) || $_SESSION['username'] == "" || $_SESSION['password'] == "") {
    header(header: "Location: configLogin.php");
    exit();
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/configuration.php";
ob_start();
?>

<div>
    <p>
        Modifier les informations
    </p>
</div>
<form action="configModifier.php" method="POST" style="display: grid;">
    <div>
        Serveur BD :
        <input type="text" name="serveurBD" value="<?php echo $config['serveurBD'] ?>">
    </div>
    <div>
        Port :
        <input type="text" name="port" value="<?php echo $config['port'] ?>">
    </div>
    <div>
        Nom de la base de donnée :
        <input type="text" name="dbName" value="<?php echo $config['dbName'] ?>">
    </div>
    <div>
        Utilisateur :
        <input type="text" name="user" value="<?php echo $config['name'] ?>">
    </div>
    <div>
        Mot de passe :
        <input type="password" name="password">
    </div>
    <div>
        Langue par défaut :
        <select type="text" name="defaultLang" value="<?php $config['defaultLang'] ?>">
            <option>Français</option>
            <option>Anglais</option>
        </select>
    </div>
    <div>
        Unité monetaire :
        <select type="text" name="currencyUnit" value="<?php $config['currencyUnit'] ?>">
            <option>CAD</option>
            <option>USD</option>
        </select>
    </div>
    <div>
        <input type="submit" value="Modifier" />
    </div>
</form>

<?php
$region_content = ob_get_clean();

require('../includes/template.php');
?>