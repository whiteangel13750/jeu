<?php

class Personnage {
    private $nom;
    private $force;
    private $level;
    private $health;
    private $etat;

    public function __construct(string $nom, int $force, int $level=1, int $health, string $etat){
        $this->nom =$nom;
        $this->force =$force;
        $this->level =$level;
        $this->health=$health;
        $this->etat =$etat;
    }

    public function caracteristiques() {
        
        echo "Le personnage" . " ". $this->nom ." ". "a une force de " ." ". $this->force . "."
        ."Il est de niveau"." ". $this->level ." ". "et il a une santé de " ." ". $this->health ."."." ". "Il est" ." ". $this->etat() . ".";
    }

    public function etat() {
        if ($this->health >=1) {
            $etat = "vivant";
        }else {
            $etat = "mort";
        }
        return $etat;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getForce() {
        return $this->force;
    }

    public function setForce($force) {
        $this->force = $force;
    }

    public function getLevel() {
        return $this->level;
    }

    public function setLevel($level) {
        $this->level = $level;
    }

    public function getHealth() {
        return $this->health;
    }

    public function setHealth($health) {
        $this->health = $health;
    }
    
    public function getEtat() {
        return $this->etat;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
    }

    public function attaquer() {
        $this->health = $health-10;
    }

};


$perso1 = new Personnage("Rose", 12,1,100,"");
$perso2 = new Personnage("Jules",15,1,50,"");
$perso3 = new Personnage("Jean",6,1,0,"");

$perso2->setNom("Ulrick");

$perso2->setForce(50);

$perso2->setLevel(4);

$perso2->setHealth(35);

$perso2->setEtat("mort");

echo "Le personnage" . " ". $perso2->getNom() ." ". "a une force de " ." ". $perso2->getForce() . "."
."Il est de niveau"." ". $perso2->getLevel() ." ". "et il a une santé de " ." ". $perso2->getHealth() ."."." ". "Il est" ." ". $perso2->getEtat() . ".";

echo "Le personnage" . " ". $perso1->getNom() ." ". "a une force de " ." ". $perso1->getForce() . "."
."Il est de niveau"." ". $perso1->getLevel() ." ". "et il a une santé de " ." ". $perso1->getHealth() ."."." ". "Il est" ." ". $perso1->getEtat() . ".";

echo "Le personnage" . " ". $perso3->getNom() ." ". "a une force de " ." ". $perso3->getForce() . "."
."Il est de niveau"." ". $perso3->getLevel() ." ". "et il a une santé de " ." ". $perso3->getHealth() ."."." ". "Il est" ." ". $perso3->getEtat() . ".";
