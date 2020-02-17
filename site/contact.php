<html>
    <head>
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
                        <a href="index.php" class="m-link"><i class="fa fa-home" aria-hidden="true"></i>Accueil</a>
                        <a href="a_propos.php" class="m-link"><i class="fa fa-user" aria-hidden="true"></i>A propos de moi</a>
                        <a href="competences.php" class="m-link"><i class="fa fa-check" aria-hidden="true"></i>Competences</a>
                        <a href="contact.php" class="m-link"><i class="fa fa-envelope" aria-hidden="true"></i>Contact</a>
                    </div>
                    <div class="m-nav-toggle">
                        <span class="m-toggle-icon"></span>
                    </div>
                </div>
            </nav>
        </header>
        <div class="page">
            <div class="contact">
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
                <div>
                <?php
                //On inclue le formulaire
                    include("formulaire.php")
                ?>
                </div>
            </div>
        </div>

    <script src="app.js"></script>
    </body>
</html>