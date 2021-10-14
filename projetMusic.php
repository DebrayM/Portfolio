<?php
require 'Backoffice.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Présentation du projet API Music</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styleMusic.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    $req = $db->query('SELECT title, description, picture, codeposition FROM projets WHERE pagehtml="ACS"');
    $results = $req->fetchAll();
    ?>
    <section id="apimusic">
        <div class="container-fluid">
            <div class="row min-vh-100">
                <div class="col-md-12 col-lg-2 sectmusic d-flex align-items-center justify-content-end p-0">
                    <p class="vertical">ACS Music</p>
                </div>
                <div class="col-md-12 col-lg-9 pt-1">
                    <div class="row d-flex align-items-center justify-content-end pt-3">
                        <div class="col-lg-4 d-flex flex-column align-items-center justify-content-end">
                            <?php
                            foreach($results as $data){
                            if ($data['codeposition'] == "acsl1col1"){
                                echo "<img src='assets/uploads/". $data['picture']. "' alt='". $data['title']. "' class='img-fluid'>";
                                echo "<p>". $data['description']. "</p>";
                            }
                            }
                            ?>
                        </div>
                        <div class="col-lg-4 d-flex flex-column align-items-center justify-content-end">
                            <?php
                            foreach($results as $data){
                            if ($data['codeposition'] == "acsl1col2"){
                                echo "<img src='assets/uploads/". $data['picture']. "' alt='". $data['title']. "' class='img-fluid'>";
                                echo "<p>". $data['description']. "</p>";
                            }
                            }
                            ?>
                        </div>
                        <div class="col-lg-4"><h4>HTML, CSS et JS (API)</h4><p>Design et intégration d'un site de music pour mobile. Utilisation d'une API pour récupérer les données (Artistes et Albums). Utilisation du token Bearer.</p> </div>
                    </div>
                    <div class="row d-flex align-items-center justify-content-end pt-3">
                        <div class="col-lg-4 d-flex flex-column align-items-center justify-content-end">
                            <?php
                            foreach($results as $data){
                            if ($data['codeposition'] == "acsl2col1"){
                                echo "<img src='assets/uploads/". $data['picture']. "' alt='". $data['title']. "' class='img-fluid'>";
                                echo "<p>". $data['description']. "</p>";
                            }
                            }
                            ?>
                        </div>
                        <div class="col-lg-4 d-flex flex-column align-items-center justify-content-end">
                            <?php
                            foreach($results as $data){
                            if ($data['codeposition'] == "acsl2col2"){
                                echo "<img src='assets/uploads/". $data['picture']. "' alt='". $data['title']. "' class='img-fluid'>";
                                echo "<p>". $data['description']. "</p>";
                            }
                            }
                            ?>
                        </div>
                        <div class="col-lg-4 d-flex flex-column align-items-center justify-content-end">
                            <?php
                            foreach($results as $data){
                            if ($data['codeposition'] == "acsl2col3"){
                                echo "<img src='assets/uploads/". $data['picture']. "' alt='". $data['title']. "' class='img-fluid'>";
                                echo "<p>". $data['description']. "</p>";
                            }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-1 sectmusic d-flex align-items-center justify-content-center p-0">
                    <a href="Index.php#Projets">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="#EDF6F9" class="bi bi-house" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>