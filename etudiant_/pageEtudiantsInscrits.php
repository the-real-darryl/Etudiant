<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexEtudiant.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Maquette d'une page d'accueil</title>
</head>

<body>
<script>
    function onRowClick()
    {
        $(document).ready(function()
        {
    $("#myModal").modal({backdrop: true});
    $("#myModal").modal('handleUpdate');

    function alignModal()
    {
        var modalDialog = $(this).find(".modal-dialog");
        /* Applying the top margin on modal dialog to align it vertically center */
        modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
    }
    // Align modal when it is displayed
    $(".modal").on("shown.bs.modal", alignModal);
    
    // Align modal when user resize the window
    $(window).on("resize", function()
    {
        $(".modal:visible").each(alignModal);
    });
     });


};
</script>
                <?php
                require_once('/VersionNtier/Database.class.php');
                require_once('/VersionNtier/Etudiants.class.php');
                $result = Etudiants::etudiantsParProgram($_POST);
                ?>

    <main id="master" class="container">
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
                    <li> <a href="pageResultatScolaire.html">Resultats scolaire</a> </li>
                </ul>
            </nav>
        </article>
        <div id="banniere_image">
        </div>

        <section id="contenu">
            <p>Visualiser les information sur les étudiants:</p>
            <div class="form-group">
                <form id = "cours" name  = "cours" method = "post" action = "">
                <select class="form-control custom-select" id="sel1" name="choix" onchange="document.forms['cours'].submit();">
                    <!--><option selected disabled></option>-->               
                    <option value="all" <?php if(isset($_POST['choix'])){if($_POST['choix'] == "all") echo "selected = selected";} ?>>Tous</option>               
                    <option value="420-AB5-RO" <?php if(isset($_POST['choix'])){if($_POST['choix'] == "420-AB5-RO") echo "selected = selected";} ?>>Système d’exploitation Linux</option>
                    <option value="420-B56-RO" <?php if(isset($_POST['choix'])){if($_POST['choix'] == "420-B56-RO") echo "selected = selected";} ?>>Administration du système d’exploitation Linux</option>
                    <option value="420-AQ6-RO" <?php if(isset($_POST['choix'])){if($_POST['choix'] == "420-AQ6-RO") echo "selected = selected";} ?>> Sécurité des réseaux informatiques</option>                             
                    <option value="201-043-RO" <?php if(isset($_POST['choix'])){if($_POST['choix'] == "201-043-RO") echo "selected = selected";} ?>>Mathématiques appliquées à l’informatique</option>
                    <option value="420-935-RO" <?php if(isset($_POST['choix'])){if($_POST['choix'] == "420-935-RO") echo "selected = selected";} ?>>Concepts de la programmation orientée objet</option>     
                    <option value="420-977-RO" <?php if(isset($_POST['choix'])){if($_POST['choix'] == "420-977-RO") echo "selected = selected";} ?>>Concepts de structuration des données informatiques</option>                   
                </select>
            </form>
            </div>
            <article>
                <div class="container-fluid">
                    <h2>Gestion des etudiants</h2>
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Age</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $tr_attributs = "";
                        $td_attributs = "";
                        $surrounding_opening_tags = "";
                        $surrounding_closing_tags = "";
                        Etudiants::produireColonneTableau($result,$tr_attributs,$td_attributs,$surrounding_opening_tags,$surrounding_closing_tags);
                        ?>
                        </tbody>
                    </table>
                </div>
            </article>

        </section>
        <footer id="pied">
            <p><span class="titre"> Contact</span> : T. 514 376-1620</br>
                6400, 16e Avenue Montréal (Québec) H1X 2S9 </p>
        </footer>
    </main>

    <?php if(Etudiants::verifierSiEtudiantChoisit($_GET)){$etudiant_precis = Etudiants::etudiantsPrecis($_GET);  echo '<script> onRowClick(); </script>';}?>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Information precise sur l'etudiant</h4>
        </div>
        <div class="modal-body">
        <div class="container-fluid">
        <table class="table table-hover table-responsive" id="etudiants_precis">
                        <thead>
                            <tr>
                                <th scope="col">Photo</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Password</th>
                                <th scope="col">Age</th>
                                <th scope="col">Programme</th>
                                <th scope="col">Commentaire</th>
                                <th scope="col">Formation</th>
                                <th scope="col">Sex</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(Etudiants::verifierSiEtudiantChoisit($_GET))
                            {
                            $tr_attributs = "";
                            $td_attributs = "";
                            $surrounding_opening_tags = "";
                            $surrounding_closing_tags = "";
                            Etudiants::otenirUnEtudiantPrecis($etudiant_precis,$tr_attributs,$td_attributs,$surrounding_opening_tags,$surrounding_closing_tags);
                            }
                            ?>
                        </tbody>
        </table>
        </div>
        </div>
        <!--<div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
        </div>

    </div>
    </div>
    <script>

        $(document).ready(function(){
    $("#myModal").modal('handleUpdate');
    });
</script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>

</html>