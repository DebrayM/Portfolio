<?php
session_start();
require '../Backoffice.php';

// Vérifie que les données proviennent bien d'un formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie que les données ne sont pas vides
    if ((!isset($_POST["username"])) or (!isset($_POST["password"]))) {
        die("Veuillez saisir un identifiant et un mot de passe");
    } else {

        /* 1 */
        /* Vérifier si l'utilisateur existe dans la table users */
        $id = 0;
        $query = "SELECT idusers FROM users WHERE username ='{$_POST['username']}'";
        $req = $db->query($query);
        while($data = $req->fetch()){
            $id = $data['idusers'];
            $passwordHash = $data['password'];
        }
        if ($id = 0){
            die("Vous n'êtes pas autorisé à accéder au back-office du Portfolio");
        } else{
            /* 2 */
            /* Vérifier si le mot de passe est correct */
            /* traitement du mot de passe saisi */
            $password = $_POST["password"];
            /* comparer le mot de passe saisi au mot de passe stocké en base */ 

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            if (password_verify($password, $passwordHash)) {
                /* l'identifiant et le mot de passe sont corrects */ 
                /* création de la session utilisateur */
                $_SESSION["newsession"]=$_POST["username"];
                header('Location: Projects.php');
            }else{
                die("Vous n'êtes pas autorisé à accéder au back-office du Portfolio");
            }
        }
    }
}
?>