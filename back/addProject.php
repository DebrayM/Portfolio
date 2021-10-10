<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  action="insertProject.php" method="post" enctype= "multipart/form-data">
        <div class="divForm">
            <div>
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" required >
                <label for="desc">Description</label> 
                <input type="text" name="desc" id="desc" required >
                <label for="file">Image du projet</label>
                <input type="file" name="file" id="file" required >
            </div>
            <input type="submit" class="styled" value="Envoyer"/> 
        </div>
    </form>
</body>
</html>