<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" Content-Language="fr">

    <title>Maquette d'une page d'accueil</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="indexEtudiant.css" />
    <script src="form_validation.js"></script>
</head>

<body>

        <main class="container" id="master">
            <header id="entete">
                <nav>
                    <ul>
                        <li> <a href="#">Le College</a></li>
                        <li> <a href="#">Carrière</a> </li>
                        <li> <a href="#">Bibliothèque</a> </li>
                        <li> <a href="#">Fondation</a> </li>
                        <li> <a href="#">Nous joindre</a></li>
                    </ul>
                    <input type="search" name="recherche" id="recherche" />
                </nav>
                <!--<img id="logo" src="images/rosemont.jpg" alt="college rosemont" width="220" height="80" />
            <p><span class="titre">Bienvenue au College Rosemont</span> </br> Rosemont, à la fine pointe de la technologie </p> -->
            </header>
            <article id="sous_menu">
                <nav>
                    <ul>
                        <li> <a href="pageInscription.php">Inscriptions</a></li>
                        <li> <a href="pageEtudiantsInscrits.php">Étudiants inscrits</a> </li>
                        <li> <a href="pageResultatScolaire2.html">Resultats scolaire</a> </li>
                    </ul>
                </nav>
            </article>
            <div id="banniere_image">
            </div>

            <section id="contenu">
                <p><span class="titre">Portail des étudiants</span></p>

                <article>
                 

                    
                <?php
                require_once('/VersionNtier/Database.class.php');
                require_once('/VersionNtier/Etudiants.class.php');
                if(isset($_GET['enreg'])){
                $etudiant = new Etudiants();
                $etudiant->loadFromFormulaireInscription($_GET);
                $etudiant->inscrireEtudiant();
                }
                ?>


                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        Select image to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload Image" name="submit">
                    </form>

                    <form method="GET" action="">
                        <fieldset>
                            <legend>Informations Personnelles</legend>
                            <!-- Titre du fieldset -->
                            <label class="radio-inline"><input type="radio" name="sex" value="male">Male</label>
                            <label class="radio-inline"><input type="radio" name="sex" value="female">Female</label>
                            <div class="form-group">
                                <label for="nom">Nom:</label>
                                <input type="text" class="form-control" name="nom" id="nom" onkeyup="validateNames('nom','valid_nom')" required>
                                <div id="valid_nom"></div>
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom:</label>
                                <input type="text" class="form-control" name="prenom" id="prenom" onkeyup="validateNames('prenom','prenom_valide')" required>
                                <div id="prenom_valide"></div>
                            </div>
                            <div class="form-group">
                                <label for="mail">Email adresse:</label>
                                <input type="email" class="form-control" name="mail" id="mail" onkeyup="validateEmail('mail','mail_valide')" required>
                                <div id="mail_valide"></div>
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" name="pwd" id="password" onkeyup="validatePassword('password','password_valide')" required>
                                <div id="password_valide"></div>
                            </div>
                            <div class="form-group">
                                <label for="daten">Date de naissance:</label>
                                <input type="date" class="form-control" name="daten">
                            </div>
                            <div class="custom-file">
                                <label class="custom-file-label" for="customFileLang">Photo:</label>
                                <input type="file" class="custom-file-input" id="customFileLang" lang="fr">
                            </div>    
                        </fieldset>
                        <fieldset>
                            <legend>Choix du programme</legend>
                            <div class="form-group">
                                <label for="sel1">Programme:</label>
                                <select class="form-control custom-select" name="prog" id="sel1">
                                           <!--><option selected disabled></option>-->
                                        <optgroup label="Gestionnaire de réseaux Linux et Windows (LEA.A6)">
                                            <option  value="420-AB5-RO">Système d’exploitation Linux</option>
                                            <option  value="420-B56-RO">Administration du système d’exploitation Linux</option>
                                            <option  value="420-AQ6-RO"> Sécurité des réseaux informatiques</option>
                                        </optgroup>                                          
                                        <optgroup label="Programmation orientée objet et technologies Web (LEA.3N">
                                            <option  value="201-043-RO">Mathématiques appliquées à l’informatique</option>
                                            <option  value="420-935-RO">Concepts de la programmation orientée objet</option>     
                                            <option  value="420-977-RO">Concepts de structuration des données informatiques</option>
                                        </optgroup>
                                    </select>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Choix du Formation</legend>
                            <div class="checkbox">
                                <label><input type="checkbox" name="formation" value="Formation reguliere" id="Formation_reguliere" onclick="validateCheckBox('Formation_reguliere','Formation_continue')">Formation reguliere</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="formation" value="Formation continue" id="Formation_continue" onclick="validateCheckBox('Formation_continue','Formation_reguliere')">Formation continue</label>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Commentaire</legend>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="comment"></textarea>
                            </div>
                        </fieldset>
                        <div class="container-fluid">
                            <button type="submit" class="btn-lg btn-primary" name="enreg" id="enreg" value="enreg">Inscription</button>
                        </div>
                    </form>
                </article>
            </section>
            <footer id="pied">
                <p><span class="titre"> Contact</span> : T. 514 376-1620</br>
                    6400, 16e Avenue Montréal (Québec) H1X 2S9 </p>
            </footer>
        </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>

</html>