<?php
require 'Database.php';
require 'User.php';

// Connexion
$database = new Database();
$db = $database->getConnection();

// Créer un utilisateur
$user = new User($db);
$user->nom = "Alice";
$user->email = "alice@test.com";
$user->create();

// Lire les utilisateurs
$liste = $user->read();
foreach ($liste as $u) {
    echo $u['nom'] . " - " . $u['email'] . "<br>";
}
