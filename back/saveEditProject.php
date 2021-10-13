<?php
require '../Backoffice.php';
 
    // Vérifie que les données proviennent bien d'un formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie que les données ne sont pas vides
    if ((!isset($_POST["title"])) or (!isset($_POST["desc"])) or (!isset($_POST["phtml"]))) {
        die("Veuillez saisir le titre et la description");
    } else {
        // Vérifie si l'image a été modifiée
        if(isset($_FILES['file'])){
            /* 1 */
            /* etape 1 : rechercher le nom de l'image */
            $query = "SELECT picture FROM projets WHERE idprojets =". $_POST["id"];
            $req = $db->query($query);
            while($data = $req->fetch()){
                $file = $data['picture'];
            }
            /* etape 2 : construire la variable fichier à supprimer */
            $filesuppr = '../assets/uploads/'. $file;
            /*étape 1 : supprimer le fichier image dans upload*/
            unlink($filesuppr);

            /* 2 */
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
                move_uploaded_file($tmpName, '../assets/uploads/'.$file);

                /* format de date français pour l'affichage */
                /* format de date anglaise pour le stockage */
                date_default_timezone_set('UTC');
                $date = date("Y-m-d H:m:s");
                $titre = $_POST["title"];
                $desc = $_POST["desc"];
                $phtml = $_POST["phtml"];

                $req = $db->prepare("INSERT INTO projets (title, description, picture, createdat, pagehtml) VALUES (:titre, :desc, :pict, :date, :phtml)");
                $req -> bindParam(':titre', $titre);
                $req -> bindParam(':desc', $desc);
                $req -> bindParam(':pict', $file);
                $req -> bindParam(':date', $date);
                $req -> bindParam(':phtml', $phtml);
                /* 
                var_dump($titre);
                var_dump($desc);
                var_dump($file);
                var_dump($date);
                */
                $req->execute();
                echo "Image mise à jour";
            }
            else{
                echo "Une erreur est survenue";
            }

        }
    }

  }
?>