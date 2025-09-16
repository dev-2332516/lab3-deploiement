<?php
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/configuration.php") || !file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/configuration.php")) {
	header(header: "Location: install/install.php");}
require_once $_SERVER['DOCUMENT_ROOT'] . "/configuration.php";
abstract class FactoryBase
{
    protected function dbConnect()
    {
        global $config;
        if (isset($config['serveurBD']) && isset($config['name']) && isset($config['password']) && isset($config['port']) && isset($config['dbName'])) {
            $mySqlHost = "mysql:host=" . $config['serveurBD'] . ";port=" . $config['port'] . ";dbname=". $config['dbName'] .";charset=utf8";
            $mySqlUsername = $config['name'];
            $mySqlPsw = $config['password'];
        } else {
            header("Location: ../../index.php");
        }
        // Essayer de se connecter à la base de données
        // Si la connexion échoue, lancer le script SQL pour créer les tables et insérer les données de base
        $db = new PDO($mySqlHost, $mySqlUsername, $mySqlPsw);
        try {
            $stmt = $db->prepare('SELECT * FROM Exercice_Categories ORDER BY Nom;');
            $stmt->execute();
        } catch (Exception $ex) {
            $SqlCategorieText = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/sql/exercice_categories.sql");
            $stmt = $db->prepare($SqlCategorieText);
            $stmt->execute();

            $SqlProductsText = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/sql/exercice_products.sql");
            $stmt = $db->prepare($SqlProductsText);
            $stmt->execute();
        } finally {
            return $db;
        }

    }
}
