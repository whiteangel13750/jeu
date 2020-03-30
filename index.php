<?php

class Personnage {
    public $nom;
    public $force;
    public $level;
    public $health;
    public $etat;

    public function caracteristiques() {
        echo "Le personnage" . " ". $this->nom ." ". "a une force de " ." ". $this->force . "."
        ."Il est de niveau"." ". $this->level ." ". "et il a une santé de " ." ". $this->health ."."." ". "Il est" ." ". $this->etat . ".";
    }
};

$perso1 = new Personnage();
$perso1->nom ="Rose";
$perso1->force = 12;
$perso1->level = 1;
$perso1->health = 100;
$perso1->etat = true;
$perso2 = new Personnage();
$perso2->nom ="Jules";
$perso2->force = 15;
$perso2->level = 1;
$perso2->health = 50;
$perso2->etat = true;
$perso3 = new Personnage();
$perso3->nom ="Jean";
$perso3->force = 6;
$perso3->level = 1;
$perso3->health = 0;
$perso3->etat = false;

$etat = isset($_POST['etat'])? "Vivant(e)" : "Mort" ;

$perso1-> caracteristiques();

