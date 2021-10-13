<?php
require '../Backoffice.php';
 
    // Vérifie que les données proviennent bien d'un formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    if ($flag) {
        // Vérifie si l'image a été modifiée
        if(isset($_FILES['file'])){
            /* 1 */
            /* etape 1 : rechercher le nom de l'image */
            $query = "SELECT picture FROM projets WHERE idprojets =". $_POST["idprojets"];
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

                 /* mise en place de l'update */ 
                $sql = "UPDATE projets SET title = :titre, description = :desc, ";
                $sql = $sql. "pagehtml = :phtml, picture = :pict ";
                $sql = $sql. "WHERE idprojets = ". $_POST["idprojets"]. ";";

                $req = $db->prepare($sql);

                $req -> bindValue(':titre', $titre, PDO::PARAM_STR);
                $req -> bindValue(':desc', $desc, PDO::PARAM_STR);
                $req -> bindValue(':pict', $file, PDO::PARAM_STR);
                $req -> bindValue(':phtml', $phtml, PDO::PARAM_STR);

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