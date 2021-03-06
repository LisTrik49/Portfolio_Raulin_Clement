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
        <link rel="stylesheet" href="normalize.css">
        <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <div class="texte">
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
                    <a href='contact.php?page=recommandation' style="text-decoration: none; color: #00bcbe">Vous voulez laisser une recommandation sur le site ?</a>
                <?php }
                
                elseif($_GET['page'] == 'recommandation'){ ?>
                    <a href='contact.php?page=message' style="text-decoration: none; color: #00bcbe">Vous préférez me laisser un message personnel ?</a>
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
        <div class="commentaires">
            <div class="titre3">
                RECOMMANDATIONS
            </div>
            <?php
                $recommandations = findMessage();
                if(!empty($recommandations)){
                    foreach($recommandations as $recommandation){?>
                        <div class = "recommandation">
                            <div class="tete">
                                <div class="name">
                                    <?="<b>" . $recommandation['name'] . "</b>"?>
                                </div>
                                <div class="enterprise">
                                    <?=", " . $recommandation['enterprise']?>
                                </div>
                                <div class="location">
                                    <?=",<i> " . $recommandation['location'] . ".</i>"?>
                                </div>
                            </div>
                                <div class="date_created">
                                    <?="Posté le " . $recommandation['date_created']?>
                                </div>
                            <div class="content">
                                <?="<br>\"" .$recommandation['content'] . "\""?>
                            </div>
                        </div>
                    <?php }
                }
            ?>
        </div>
        <div class="CGU">
            <a href="CGU.PHP">Cliquez ici pour lire les CGU</a>
        </div>
        <div class="footer">
            <img src="Images/toplogo.png" alt="footer" style="width: 100%; margin-left: 8%;">
        </div>
        <script src="app.js"></script> 
    </body>
</html>