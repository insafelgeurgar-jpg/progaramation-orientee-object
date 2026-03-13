<?php

require_once 'Article.php';

$database = new Database();
$db = $database->getConnection();

$article = new Article($db);


/* DELETE */

if(isset($_GET['delete'])){

$article->delete($_GET['delete']);

header("Location: index.php");
exit;

}


/* UPDATE */

if(isset($_POST['update'])){

$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];

$article->update($id,$title,$content);

header("Location: index.php");
exit;

}

$articles = $article->getAll();

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Liste des articles</title>

</head>

<body>

<h1>Liste des articles</h1>

<a href="create.php">Ajouter un article</a>

<hr>


<?php if(isset($_GET['edit'])): ?>

<?php

$id = $_GET['edit'];

foreach($articles as $a){

if($a['id'] == $id){

$editArticle = $a;

}

}

?>

<h2>Modifier article</h2>

<form method="post">

<input type="hidden" name="id" value="<?= $editArticle['id'] ?>">

<input type="text" name="title" value="<?= $editArticle['title'] ?>" required>

<br><br>

<textarea name="content" required><?= $editArticle['content'] ?></textarea>

<br><br>

<button type="submit" name="update">Modifier</button>

</form>

<hr>

<?php endif; ?>


<?php foreach ($articles as $row) : ?>

<h3><?= htmlspecialchars($row['title']) ?></h3>

<p><?= nl2br(htmlspecialchars($row['content'])) ?></p>

<small><?= $row['created_at'] ?></small>

<br>

<a href="index.php?edit=<?= $row['id'] ?>">Modifier</a>

<a href="index.php?delete=<?= $row['id'] ?>" onclick="return confirm('Supprimer cet article ?')">Supprimer</a>

<hr>

<?php endforeach; ?>

</body>

</html>
