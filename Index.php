<?php
require 'Backoffice.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/styleDesk.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="assets/js/portfolio.js"></script>
    <title>Portfolio</title>
</head>
<body>
    <?php
    $req = $db->query('SELECT title, description, picture, codeposition FROM projets WHERE pagehtml="Index"');
    $results = $req->fetchAll();
    ?>
    <div class="menu">
        <ul>
            <li><div class="liAcc"></div><a href="/#home">Accueil</a></li>
            <li><div class="liCpt"></div><a href="/#Competences">Compétences</a></li>
            <li><div class="liPjt"></div><a href="/#Projets">Projets</a></li>
            <li><div class="liCtt"></div><a href="/#contact">Contact</a></li>
        </ul>
    </div>
    <section id="home">
        <div class="container-fluid">
            <div class="row min-vh-100">
                <div class="col-lg-5 homeLft d-flex align-items-center justify-content-end position-relative p-0">
                    <?php
                        foreach($results as $data){
                            if ($data['codeposition'] == "apropos"){
                                echo "<img src='assets/uploads/". $data['picture']. "' alt='Photo Martine Debray' class='photo-martine'>";
                            }
                        }
                    ?>
                    <div class="col-home h-100 position-absolute"></div>
                </div>
                <div class="col-lg-5 homeCtr d-flex align-items-center justify-content-end position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12 homeCtrTxt text-justify" style="display: initial; opacity: 1; transition: all 1s ease 0s;">
                            <img src="assets/icons/martine.png" >
                            <h2>Web Designer</h2>
                            <p>Après plus de 20 ans d'expérience en gestion de projet informatique,</p>
                            <p>j'ai choisi de me diriger vers le métier de Web Designer via une formation Access Code School - Online Formapro.</p>
                        </div>
                    </div>
                </div>
                <div class="col homeRgt d-flex align-items-center justify-content-end"></div>
            </div>
        </div>
    </section>
    <section id="Competences">
        <div class="container-fluid">
            <div class="row min-vh-100">
                <div class="col-md-12 col-lg-2 CompetencesLft d-flex align-items-center justify-content-center p-0">
                    <h3 class="vertical">Compétences</h3>
                </div>
                <div class="col-md-12 col-lg-9 p-md-0 p-lg-3 d-md-none d-lg-block">
                    <div class="row">
                        <div class="col-12 col-lg-6 d-flex align-items-center justify-content-end pt-5 pb-5">
                            <img src="assets/icons/logoCV.png" alt="logo CV" class="logocv">
                            <a href="assets/fichiers/MartineDebray.pdf" download="CV MArtine Debray 2021">Télécharger mon cv</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center anim-wd">
                            <?php
                            foreach($results as $data){
                                if ($data['codeposition'] == "cptwd"){
                                    echo "<img src='assets/uploads/". $data['picture']. "' alt='photo outils Web Design & intégration'>";
                                }
                            }
                            ?>
                        </div>
                        <div class="col-12 col-lg-6 d-flex align-items-center justify-content-left">
                            <p class="sectCompetences-text"> Développement, intégration (Sites Web et responsive) et Design.</p>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6 d-flex align-items-center justify-content-end">
                            <p class="sectCompetences-text">Gestion de projets, Coach Agile, formatrice (Méthodologies). </p>
                        </div>
                        <div class="col-12 col-lg-6 anim-pjt">
                            <p class="sectCompetences-text">Cycle V, Agile, Scrum, kanban, lean, obeya.</p>
                            <?php
                            foreach($results as $data){
                                if ($data['codeposition'] == "cptgestion"){
                                    echo "<img src='assets/uploads/". $data['picture']. "' alt='Photo outils de gestion de projets'>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-1 CompetencesRght d-flex align-items-center justify-content-end p-0"></div>  
            </div>
        </div>
    </section>
    <section id="Projets">
        <div class="container-fluid">
            <div class="row min-vh-100">
                <div class="col-md-12 col-lg-2 ProjetsLft d-flex align-items-center justify-content-center p-0">
                    <h3 class="vertical">Projets</h3>
                </div>
                <div class="col-md-12 col-lg-9 padProjets">
                    <div class="row d-flex align-items-center justify-content-end p-0">
                        <div class="col-lg-4 d-flex flex-column align-items-center justify-content-center">
                            <?php
                            foreach($results as $data){
                                if ($data['codeposition'] == "prjcol1"){
                                    $imgcol1 = '<a href="projetSammy.php">';
                                    $imgcol1 = $imgcol1. "<img src='assets/uploads/". $data['picture']. "' alt='Photo projet Oncle Sammy' class='img-fluid'>";
                                    $imgcol1 = $imgcol1. "</a>";
                                    echo $imgcol1;
                                    echo "<h4>". $data['title']. "</h4>";
                                    echo "<p>". $data['description']. "</p>";
                                }
                            }
                            ?>
                        </div>
                        <div class="col-lg-4 d-flex flex-column align-items-center justify-content-center">
                            <?php
                            foreach($results as $data){
                                if ($data['codeposition'] == "prjcol2"){
                                    $imgcol2 = '<a href="projetMusic.php">';
                                    $imgcol2 = $imgcol2. "<img src='assets/uploads/". $data['picture']. "' alt='Photo projet ACS Music Mobile' class='img-fluid'>";
                                    $imgcol2 = $imgcol2. "</a>";
                                    echo $imgcol2;
                                    echo "<h4>". $data['title']. "</h4>";
                                    echo "<p>". $data['description']. "</p>";
                                }
                            }
                            ?>
                        </div>
                        <div class="col-lg-4 d-flex flex-column align-items-center justify-content-center">
                            <?php
                            foreach($results as $data){
                                if ($data['codeposition'] == "prjcol3"){
                                    $imgcol3 = '<a href="projetAzuream.php">';
                                    $imgcol3 = $imgcol3. "<img src='assets/uploads/". $data['picture']. "' alt='Photo projet Azuream' class='img-fluid'>";
                                    $imgcol3 = $imgcol3. "</a>";
                                    echo $imgcol3;
                                    echo "<h4>". $data['title']. "</h4>";
                                    echo "<p>". $data['description']. "</p>";
                                }
                            }
                            ?>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12 d-flex align-items-center justify-content-center p-0">
                                <a href="projets.php" class="stylePlus mt-5">Voir plus de projets</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-1 ProjetsRght d-flex align-items-center justify-content-end p-0"></div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="container-fluid">
            <div class="row min-vh-100">
                <div class="d-lg-flex justify-content-center p-0">
                    <div class="ContactLft col-md-12 col-lg-2 d-md-none d-lg-block"></div>
                    <div class="col-md-12 col-lg-9 d-md-none d-lg-block">
                        <div class="position relative mx-auto ml-1 float-lg-right p-5">
                            <div class="divFlexReseau centre">
                                <h5>Me contacter</h5>
                           </div>
                           <div class="Tel">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                                </svg>
                                <p class="gras">06 86 90 78 10</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-mailbox" viewBox="0 0 16 16">
                                    <path d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3zm0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4zm2.646 1A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3H6.646z"/>
                                    <path d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146l-.853-.854zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0z"/>
                                </svg>
                                <p class="gras">debraymartine.a@gmail.com</p>
                           </div>
                           <div class="divFlexReseau">
                            <a href="https://github.com/DebrayM" target="_blank">
                               <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="#000" class="bi bi-github" viewBox="0 0 16 16">
                               <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                               </svg>
                           </a>
                           <a href="https://www.linkedin.com/in/martine-debray-99705345/" target="_blank">
                               <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="#000" class="bi bi-linkedin" viewBox="0 0 16 16">
                               <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                               </svg>
                           </a>
                            </div>
                            <form action="mailto:debraymartine.a@gmail.com" name="formContact" method="post" enctype="text/plain">
                                <div id="formContact">
                                    <input type="text" id="name" name="name" size=50 maxlenght=50 placeholder="Votre nom" required/>
                                    <input type="email" id="mail" name="mail"size=50 maxlenght=50 placeholder="Votre email" required/>
                                    <input type="textarea" id="subject" name="subject" size=500 maxlength=500 placeholder="Votre message" required onkeyup="adjust_textarea(this)"/>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <input type="button" id="formContactBTN" class="styled" value="Envoyer votre message"/>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="ContactRght col-md-12 col-lg-2 d-md-none d-lg-block">
                    </div> 
                </div>             
            </div>
        </div>
    </section>
</body>
</html>