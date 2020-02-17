<?php

function formValidation()
{
    //traitement du formulaire s'il est soumis
    $errors = [];
    if (!empty($_POST)){

        $formIsValid = true;

        $name      = strip_tags($_POST['name']);
        $comment    = strip_tags($_POST['comment']);

        //Ici on a un tableau qui stocke nos éventuels messages d'erreur
        $errors = [];


		//On vérifie la validité de l'auteur
        if(empty($author) ){
            //Si on note qu'on a trouvé une erreur, la commande suivante s'exécute 
            $formIsValid = false;
            $errors[] = "Veuillez renseigner votre nom !";
        }
        //mb_strlen calcule la longueur d'une chaîne
        elseif(mb_strlen($author) <= 1){
            $formIsValid = false;
            $errors[] = "Nope, un prénom sans plusieurs lettres n'est pas un nom !";
        }
        elseif(mb_strlen($author) > 30){
            $formIsValid = false;
            $errors[] = "A moins d'être un noble, tu peux pas avoir de nom avec autant de lettres !";
        }

        //validation de l'email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $formIsValid = false;
            $errors[] = "Votre email n'est pas valide !";
        }

//si le formulaire est toujours valide... 
if ($formIsValid == true){
    //La requête ajoute le nouveau message dans la base de données
    $sql = "INSERT INTO messages
            (author, email, message, created_date)
            VALUES 
            (:author, :email, :message, NOW())";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":author" => $author,
		":email" => $email,
		":message" => $message,
    ]);
}
	}
}


function saveNewContact($contact)
    {
        $sql = "INSERT INTO
                contact (name, email) 
                VALUES
                (:name, :email)";

        //on utilise la classe DBConnection pour récupérer 
        //notre connexion à la base de données ($pdo)
        //pamayim nekudotayim ou double : 
        //pour appeler les méthodes statiques ! 
        include("DBconnection.php");

        //si la méthode n'était pas statique...
        //$dbConnection = new DbConnection();
        //$pdo = $dbConnection->getPdo();

        //envoie la requête au serveur sql
        $stmt = $pdo->prepare($sql);

        //exécute la requête SQL avec les données du user
        //on appelle tous les getters de notre classe pour récupérer les données
        $stmt->execute([
            ":email" => $email,
            ":name" => $name,

        ]);
    }

    //récupère une ligne depuis la table contact
    //en fonction d'un username ou d'un email
    function findContactByNameOrEmail($nameOrEmail)
    {
        $sql = "SELECT * FROM contact 
                WHERE name = :name 
                OR email = :email";

        //récupère notre connexion à la bdd
        include('DBconnection.php');

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":name" => $nameOrEmail,
            ":email" => $nameOrEmail,
        ]);

        $foundName = $stmt->fetch();
        return $foundName;
    }

?>
