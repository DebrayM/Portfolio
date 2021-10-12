<?php
require '../Backoffice.php';
 
    // Vérifie que les données proviennent bien d'un formulaire
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Vérifie que l'ID projet est bien passé en paramètre
        $id = $_GET["id"];

        var_dump($id);
    }
?>