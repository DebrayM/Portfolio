<?php
var_dump($_POST);
var_dump($_FILES);
?>
<?php

if(isset($_FILES['file'])){
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];

    
    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));
    //Tableau des extensions que l'on accepte
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    //Taille max que l'on accepte
    $maxSize = 400000;

    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
        move_uploaded_file($tmpName, './upload/'.$name);
    }
    else{
        if ($error != 0){
            echo "Une erreur est survenue";
        } else {
            echo "Mauvaise extension ou taille trop grande";
        }
    }
}
?>