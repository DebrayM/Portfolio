<?php
    // Vérifie que les données proviennent d'un formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"]; 
    $desc = $_POST["desc"];
    $file = $_POST["file"];
    if ((!isset($title)) or (!isset($title)) or (!isset($file))) {
        die("Veuillez sasir le titre, la description et l'image du projet");
    } else {
        /* upload de l'image */ 

    }

  }
?>