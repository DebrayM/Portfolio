<?php
require '../Backoffice.php';
 
    // Vérifie que les données proviennent bien d'un formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        /*
        var_dump($_POST["idprojets"]);
        var_dump($_POST["title"]);
        var_dump($_POST["desc"]);
        var_dump($_POST["phtml"]);
        var_dump($_POST["codepos"]);
        */
    // Vérifie que les données ne sont pas vides
    $flag = true;
    if ( (!isset($_POST["idprojets"])) or empty($_POST["idprojets"]) ) {
        $flag = false;
        die("ID du projet est manquant");
    }
    if ( (!isset($_POST["title"])) or empty($_POST["title"]) ) {
        $flag = false;
        die("Le titre est manquant");
    }
    if ( (!isset($_POST["desc"])) or empty($_POST["desc"]) ) {
        $flag = false;
        die("La description est manquante");
    }
    if ( (!isset($_POST["phtml"])) or empty($_POST["phtml"]) ) {
        $flag = false;
        die("La page HTML est manquante");
    }
    if ( (!isset($_POST["codepos"])) or empty($_POST["codepos"]) ) {
        $flag = false;
        die("Le code positionnement est manquant");
    }
    if ($flag) {
 
        $titre = $_POST["title"];
        $desc = $_POST["desc"];
        $phtml = $_POST["phtml"];
        $codepos = $_POST["codepos"];
        $id = $_POST["idprojets"];

        /* mise en place de l'update */ 
        $sql = "UPDATE projets SET title = :titre, description = :desc,";
        $sql = $sql. "pagehtml = :phtml, codeposition = :codepos ";
        $sql = $sql. "WHERE idprojets =". $id;

        $req = $db->prepare($sql);

        $req -> bindValue(':titre', $titre, PDO::PARAM_STR);
        $req -> bindValue(':desc', $desc, PDO::PARAM_STR);
        $req -> bindValue(':phtml', $phtml, PDO::PARAM_STR);
        $req -> bindValue(':codepos', $codepos, PDO::PARAM_STR);

        $req->execute();
        header('Location: Projects.php');
    }
    }
?>