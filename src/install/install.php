<?php
if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/configuration.php")) {
    header(header: "Location: ../index.php");
    exit();
}
ob_start();
?>
<b>Installation</b>
<form action="installAction.php" method="POST" style="display: grid;">
    <div>
        Serveur BD :
        <input type="text" name="serveurBD">
    </div>
    <div>
        Port :
        <input type="text" name="port">
    </div>
     <div>
        Nom de la base de donnée :
        <input type="text" name="dbname">
    </div>
    <div>
        Utilisateur :
        <input type="text" name="user">
    </div>
    <div>
        Mot de passe :
        <input type="password" name="password">
    </div>
    <div>
        Langue par défaut :
        <select type="text" name="defaultLang">
            <option>Français</option>
            <option>Anglais</option>
        </select>
    </div>
    <div>
        Unité monetaire :
        <select type="text" name="currencyUnit">
            <option>CAD</option>
            <option>USD</option>
        </select>
    </div>
    <div>
        <input type="submit" value="Install" />
    </div>
</form>

<?php
$region_content = ob_get_clean();

require('../includes/template.php');
?>