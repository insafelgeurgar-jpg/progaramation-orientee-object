<?php
class Article {
public $titre;
public $contenu;

    public function __construct($titre, $contenu) {
        $this->titre = $titre;
        $this->contenu = $contenu;
    }

    public function afficher() {
        return "Titre : " . $this->titre . " - Contenu : " . $this->contenu;
    }
}

$article = new Article("Introduction à PHP", "PHP est un langage serveur.");
echo $article->afficher();
