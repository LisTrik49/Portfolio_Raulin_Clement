<?php 
if(empty($_GET)){
    header("Location: contact.php?page=recommandation");
}
include("functions.php");
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="contact.css">
        <link rel="stylesheet" href="competences.css">
        <link rel="stylesheet" href="normalize.css">
        <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="Page_accueil.css">
        <link rel="stylesheet" href="a_propos.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Solway&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito&display=swap">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
        <meta charset="utf-8"/>
        <title>Portfolio</title>
    </head>
    <body>
        <header role = "header">
            <nav class="menu" role="navigation">
                <div class="inner">
                    <div class="m-right">
                        <div class="first">
                            <div class="accueil">
                                <a href="index.php" class="m-link"><i class="fa fa-home" aria-hidden="true"></i> ACCUEIL</a>
                            </div>
                            <div class="a_propos">
                                <a href="a_propos.php" class="m-link"><i class="fa fa-user" aria-hidden="true"></i> A PROPOS DE MOI</a>
                            </div>
                        </div>
                        <div class="second">
                            <div class="competences">
                                <a href="competences.php" class="m-link"><i class="fa fa-check" aria-hidden="true"></i> COMPETENCES</a>
                            </div>
                            <div class="contact">
                                <a href="contact.php" class="m-link"><i class="fa fa-envelope" aria-hidden="true"></i> CONTACT</a>
                            </div>
                        </div>
                    </div>
                    <div class="m-nav-toggle">
                        <span class="m-toggle-icon"></span>
                    </div>
                </div>
            </nav>
        </header>
        <div class="page">
            <div class="contact2">
                <div class="tout_contact">
                    <div>
                        <img src="Images/Gmail.png" class="logo1" alt="Gmail">
                    </div>
                    <div class="texte1">
                        clement.raulin@students.campus.academy
                    </div>
                </div>
                <div class="tout_contact">
                    <div>
                        <img src="Images/linkedin.png" class="logo" alt="Linkedin">
                    </div>
                    <div class="texte">
                        Clément Raulin
                    </div>
                </div>
                <div class="tout_contact">
                    <div>
                        <img src="Images/Telephone.png" class="logo" alt="Telephone">
                    </div>
                    <div class="texte">
                        07 81 78 78 84
                    </div>
                </div>            
                <div class="tout_contact">
                    <div>
                        <img src="Images/maison.png" class="logo" alt="Maison">
                    </div>
                    <div class="texte">
                        Nantes, 44300
                    </div>
                </div>
            </div>
            <div class='changement'>
                <?php
                if($_GET['page'] == 'message'){ ?>
                    Vous voulez laisser une recommandation ?
                    <a href='contact.php?page=recommandation'>Recommandation</a>
                <?php }
                
                elseif($_GET['page'] == 'recommandation'){ ?>
                    Vous voulez laisser un message ?
                    <a href='contact.php?page=message'>Message</a>
                <?php }
                ?>
            </div>
            <div>
            <?php
            if($_GET['page'] == 'message'){
            //On inclue le formulaire
                include("message.php");
            }
            elseif($_GET['page'] == 'recommandation'){
                include("recommandation.php");
            }

            $errors = formValidation($_GET['page']);
            foreach($errors as $error){?>
                    <div class=""><?=$error?></div>
            <?php }?>
                    </form>
                </div>  
            </div>
        </div>
        <script src="app.js"></script> 
    </body>
</html>