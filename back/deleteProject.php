<?php
require '../Backoffice.php';
 
    // Vérifie que les données proviennent bien d'un formulaire
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Vérifie que l'ID projet est bien passé en paramètre
        $id = $_GET["id"];
        /*var_dump($id);*/ 
        /* etape 1 : rechercher le nom de l'image */
        $query = "SELECT picture FROM projets WHERE idprojets =". $id;
        $req = $db->query($query);
        while($data = $req->fetch()){
            $file = $data['picture'];
        }
        /* etape 2 : construire la variable fichier à supprimer */
        $filesuppr = '../assets/uploads/'. $file;
        /* etape 3 : supprimer la référence dans la table */
        $query = "DELETE FROM projets WHERE idprojets =". $id;
        $req = $db->prepare($query);
        $req->execute();

        $count = $req->rowCount();
        /* print('Effacement de ' .$count. ' entrée(s).'); */
        /* etape 4 : supprimer le fichier image */
        if ($count>0){
            /* supprimer le fichier*/
            unlink($filesuppr);
            echo "Image supprimée de la base et du répertoire upload";
        }
    }
?>