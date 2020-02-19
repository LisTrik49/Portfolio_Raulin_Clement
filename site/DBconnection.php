<?php 

class DBConnection 
{
    //cette méthode est statique
    //on peut donc l'appeler sans avoir à créer d'instance de la classe
    public static function getPdo()
    {
        $DbHost = "localhost";
        $DbName = "campus_contest";
        $DbUser = "root";
        $DbPass = "";

        try {
            //connexion à la base avec la classe PDO et le dsn
            $pdo = new PDO('mysql:host='.$DbHost.';dbname='.$DbName.';charset=UTF8', $DbUser, $DbPass, array(
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //on récupère nos données en array associatif par défaut
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING         //on affiche les erreurs. À modifier en prod. 
            ));
        } catch (PDOException $e) { //attrappe les éventuelles erreurs de connexion
            echo 'Erreur de connexion : ' . $e->getMessage();
        }

        return $pdo;
    }
}