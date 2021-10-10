

<?php
/* bdd.php pour créer un fichier bdd.php qui nous servira à nous connecter 
/* à la base de données*/ 
try{
    $db = new PDO('mysql:host=localhost;dbname=upload_file', 'root', "TonMotDePasse");
}catch(PDOException $e){
    die('Erreur connexion : '.$e->getMessage());
}
?>
<?php
    require './bdd.php';
    if(isset($_FILES['file'])){
        $file = $uniqueName.".".$extension;
        //$file = 5f586bf96dcd38.73540086.jpg
        move_uploaded_file($tmpName, './upload/'.$file);
        $req = $db->prepare('INSERT INTO file (name) VALUES (?)');
        $req->execute([$file]);
        echo "Image enregistrée";
    }
?>
/* dans un fichier html : Afficher les images de la base de données */ 
<body>
    <form action="index.php" method="POST" enctype="multipart/form-data">
    
        <label for="file">Fichier</label>
        <input type="file" name="file">
        <button type="submit">Enregistrer</button>
    </form>
    <h2>Mes images</h2>
    <?php 
        $req = $db->query('SELECT name FROM file');
        while($data = $req->fetch()){
            var_dump($data);
        }
    ?>
</body>