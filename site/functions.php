<?php

include('DBconnection.php');

function formValidation($page)
{
    //traitement du formulaire s'il est soumis
    $errors = [];
    if (!empty($_POST)){

        $formIsValid = true;

        $name      = strip_tags($_POST['name']);
        $email     = strip_tags($_POST['email']);
        $content   = strip_tags($_POST['content']);

        if(array_key_exists('subject', $_POST))
        {
            $subject   = strip_tags($_POST['subject']);
        }
        if(array_key_exists('enterprise', $_POST))
        {
            $enterprise= strip_tags($_POST['enterprise']);
        }
        if(array_key_exists('location', $_POST))
        {
            $location= strip_tags($_POST['location']);
        }

        //Ici on a un tableau qui stocke nos éventuels messages d'erreur
        $errors = [];


		//On vérifie la validité de l'auteur
        if(empty($name)){
            //Si on note qu'on a trouvé une erreur, la commande suivante s'exécute 
            $formIsValid = false;
            $errors[] = "Veuillez renseigner votre nom !";
        }
        //mb_strlen calcule la longueur d'une chaîne
        elseif(mb_strlen($name) <= 1){
            $formIsValid = false;
            $errors[] = "Un nom sans plusieurs lettres n'est pas un nom !";
        }
        elseif(mb_strlen($name) > 30){
            $formIsValid = false;
            $errors[] = "Votre nom est trop long.";
        }

        //validation de l'email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $formIsValid = false;
            $errors[] = "Votre email n'est pas valide !";
        }

        //validation du commentaire
        if(empty($content)){
            $formIsValid = false;
            $errors[] = "Veuillez remplir le champ pour votre commentaire.";
        }

        elseif(mb_strlen($content) <= 1 || mb_strlen($content) > 500){
            $formIsValid = false;
            $errors[] = "Votre commentaire doit faire entre 1 et 500 caractères.";
        }

        if(array_key_exists('subject', $_POST) && empty($subject)){
            $formIsValid = false;
            $errors[] = "Veuillez renseigner le sujet de votre message.";
        }

        elseif(array_key_exists('subject', $_POST) && mb_strlen($subject) > 60){
            $formIsValid = false;
            $errors[] = "Le nom du sujet est trop long.";
        }

        if(array_key_exists('enterprise', $_POST) && empty($enterprise)){
            $formIsValid = false;
            $errors[] = "Veuillez renseigner le nom de l'entreprise.";
        }

        elseif(array_key_exists('enterprise', $_POST) && mb_strlen($enterprise) > 100){
            $formIsValid = false;
            $errors[] = "Le nom de l'entreprise est trop long.";
        }

        if(array_key_exists('location', $_POST) && empty($location)){
            $formIsValid = false;
            $errors[] = "Veuillez renseigner l'adresse de l'entreprise.";
        }

        elseif(array_key_exists('location', $_POST) && mb_strlen($location) > 150){
            $formIsValid = false;
            $errors[] = "L'adresse est trop longue";
        }

        //si le formulaire est toujours valide... 
        if ($formIsValid == true){

            if($page == 'message'){
            //La requête ajoute le nouveau message dans la base de données
            $sql = "INSERT INTO message
                    (name, email, subject, content)
                    VALUES
                    (:name, :email, :subject, :content)";

            $pdo = DBConnection::getPdo();

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ":subject" => $subject,
                ":email" => $email,
                ":name" => $name,
                ":content" => $content
            ]);
            }
            elseif($page == 'recommandation'){
            //La requête ajoute le nouveau message dans la base de données
            $sql = "INSERT INTO recommandations
                    (name, email, enterprise, location, content)
                    VALUES
                    (:name, :email, :enterprise, :location, :content)";

            $pdo = DBConnection::getPdo();

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ":enterprise" => $enterprise,
                ":email" => $email,
                ":name" => $name,
                ":content" => $content,
                ":location" => $location
            ]);
            }
        }
    }
    
    return $errors;
}


function saveNewContact($name, $email)
    {
        $sql = "INSERT INTO
                contact (name, email) 
                VALUES
                (:name, :email)";

        //on utilise la classe DBConnection pour récupérer 
        //notre connexion à la base de données ($pdo)
        //pamayim nekudotayim ou double : 
        //pour appeler les méthodes statiques ! 

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
        return $pdo->lastInsertId();
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
