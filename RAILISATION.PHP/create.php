<?php

require_once 'Article.php';

$database = new Database();
$db = $database->getConnection();

$article = new Article($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';

if ($title && $content) {

$article->create($title,$content);

header("Location: index.php");
exit;

}

}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Ajouter un article</title>

</head>

<body>

<h1>Ajouter un article</h1>

<form method="post">

<label>Titre</label>

<br>

<input type="text" name="title" required>

<br><br>

<label>Contenu</label>

<br>

<textarea name="content" required></textarea>

<br><br>

<button type="submit">Ajouter</button>

</form>

<br>

<a href="index.php">Retour</a>

</body>
<style>
input[type="text"]{
    width:100%;
    padding:12px;
    border-radius:8px;
    border:none;
    background:rgba(255,255,255,0.08);
    color:white;
    font-size:14px;
    outline:none;
    margin-bottom:15px;
}

textarea{
    width:100%;
    height:120px;
    padding:12px;
    border-radius:8px;
    border:none;
    background:rgba(255,255,255,0.08);
    color:white;
    font-size:14px;
    outline:none;
    resize:none;
    margin-bottom:20px;
}

/* effect ملي كتضغط على input */
input[type="text"]:focus,
textarea:focus{
    border:1px solid #9b3ed3;
    background:rgba(255,255,255,0.12);
}
body{
    margin:0;
    font-family: Arial, sans-serif;
    background: radial-gradient(circle at top,#917191,#1a1a1a);
    color:white;
    padding:120px 40px;
}

/* ---------- HEADER ---------- */
h1{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:80px;
    line-height:80px;
    text-align:center;
    margin:0;
    font-size:28px;
    letter-spacing:1px;
    background:rgba(87, 11, 120, 0.45);
    backdrop-filter: blur(8px);
    border-bottom:1px solid rgba(255,255,255,0.1);
    z-index:100;
}

/* ---------- ADD BUTTON ---------- */
.add-btn{
    display:inline-block;
    padding:12px 22px;
    background:linear-gradient(45deg, #6a149f, #9b3ed3);
    color:white;
    text-decoration:none;
    border-radius:8px;
    font-weight:600;
    margin-bottom:30px;
    transition:0.3s;
}

.add-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 5px 15px rgba(0,0,0,0.4);
}

/* ---------- ARTICLE CARD ---------- */
.article-card{
    background:rgba(255,255,255,0.05);
    border:1px solid rgba(255,255,255,0.08);
    border-radius:12px;
    padding:20px;
    margin-bottom:20px;
    backdrop-filter: blur(6px);
    transition:0.3s;
}

.article-card:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 20px rgba(0,0,0,0.4);
}

/* ---------- TEXT ---------- */
.article-card h3{
    margin-top:0;
    color:#e0b8ff;
}

.article-card p{
    color:#eeeeee;
    line-height:1.6;
}

.article-card small{
    color:#cfcfcf;
}

/* ---------- BUTTONS ---------- */
.btn{
    display:inline-block;
    padding:8px 15px;
    margin-right:6px;
    border-radius:6px;
    text-decoration:none;
    font-size:14px;
    transition:0.3s;
    color:white;
}

.btn-edit{
    background:#8e44ad;
}

.btn-delete{
    background:#c0392b;
}

.btn:hover{
    transform:scale(1.05);
}

/* ---------- FORM CONTAINER ---------- */
.form-container{
    max-width:500px;
    margin:auto;
    background:rgba(255,255,255,0.05);
    padding:30px;
    border-radius:12px;
    border:1px solid rgba(255,255,255,0.08);
    backdrop-filter: blur(8px);
}

/* ---------- LABEL ---------- */
label{
    display:block;
    margin-bottom:6px;
    color:#e0b8ff;
    font-weight:600;
}

/* ---------- INPUT ---------- */
input{
    width:100%;
    padding:12px;
    border-radius:8px;
    border:none;
    margin-bottom:20px;
    background:rgba(255,255,255,0.08);
    color:white;
    outline:none;
}

/* ---------- TEXTAREA ---------- */
textarea{
    width:100%;
    height:120px;
    padding:12px;
    border-radius:8px;
    border:none;
    background:rgba(255,255,255,0.08);
    color:white;
    outline:none;
    resize:none;
    margin-bottom:20px;
}

/* ---------- INPUT FOCUS ---------- */
input:focus, textarea:focus{
    border:1px solid #9b3ed3;
    background:rgba(255,255,255,0.12);
}

/* ---------- BUTTON SUBMIT ---------- */
button{
    width:100%;
    padding:12px;
    background:linear-gradient(45deg,#6a149f,#9b3ed3);
    border:none;
    border-radius:8px;
    color:white;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:translateY(-2px);
    box-shadow:0 5px 15px rgba(0,0,0,0.4);
}

/* ---------- BACK LINK ---------- */
.back-link{
    display:inline-block;
    margin-top:20px;
    color:#e0b8ff;
    text-decoration:none;
}

.back-link:hover{
    text-decoration:underline;
}

</style>
</html>