<?php
require '../Backoffice.php';
 
    // Vérifie que les données proviennent bien d'un formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie que les données ne sont pas vides
    if ((!isset($_POST["title"])) or (!isset($_POST["desc"]))) {
        die("Veuillez sasir le titre et la description");
    } else {
        // Vérifie l'existance du fichier image
        if(isset($_FILES['file'])){
            /* traitement de l'image */ 
            $tmpName = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $error = $_FILES['file']['error']; 

            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));
        
            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            $maxSize = 4 * 1024 * 1024;

            if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){

                $uniqueName = uniqid('', true);
                //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                $file = $uniqueName.".".$extension;
                //$file = 5f586bf96dcd38.73540086.jpg
        
                /* format de date français pour l'affichage */
                /*date_default_timezone_set('Europe/Paris');*/
                /*$date = date("d-m-Y H:m:s");*/
                /* format de date anglaise pour le stockage */
                date_default_timezone_set('UTC');
                $date = date("Y-m-d H:m:s");
                $titre = $_POST["title"];
                $titre = htmlentities($titre);
                $desc = $_POST["desc"];
                $desc = htmlentities($desc);
                $phtml = $_POST["phtml"];
                $codepos = strtolower($phtml);

                move_uploaded_file($tmpName, '../assets/uploads/'.$file);

                $req = $db->prepare("INSERT INTO projets (title, description, picture, createdat, pagehtml, codeposition) VALUES (:titre, :desc, :pict, :date, :phtml, :codepos)");
                $req -> bindValue(':titre', $titre, PDO::PARAM_STR);
                $req -> bindValue(':desc', $desc, PDO::PARAM_STR);
                $req -> bindValue(':pict', $file, PDO::PARAM_STR);
                $req -> bindValue(':date', $date, PDO::PARAM_STR);
                $req -> bindValue(':phtml', $phtml, PDO::PARAM_STR);
                $req -> bindValue(':codepos', $codepos, PDO::PARAM_STR);
                /*
                var_dump($titre);
                var_dump($desc);
                var_dump($file);
                var_dump($date);
                var_dump($phtml);
                var_dump($codepos);
                */
                $req->execute();
                header('Location: Projects.php');
            }
            else{
                echo "Une erreur est survenue";
            }

        }
    }

  }
?>