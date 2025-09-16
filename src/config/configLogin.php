<?php
if (!file_exists(filename: $_SERVER['DOCUMENT_ROOT'] . "/configuration.php")) {
    header(header: "Location: ../install/install.php");
}
session_start();
$_SESSION['username'] = "";
$_SESSION['password'] = "";
ob_start();
?>
<div>
    <p>
        Se connecter
    </p>
</div>
<form action="configLoginVerification.php" method="POST" style="display: grid;">
    <div>
        Nom d'utilisateur :
        <input type="text" name="username">
    </div>
    <div>
        Mot de passe :
        <input type="password" name="password">
    </div>
    <div>
        <input type="submit" value="Login" />
    </div>
</form>

<?php
$region_content = ob_get_clean();

require('../includes/template.php');
?>