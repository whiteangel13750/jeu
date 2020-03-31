<?php

class Personnage {
    private $nom;
    private $force;
    private $level;
    private $health;
    private $etat;

    public function __construct(string $nom, int $force, int $level=1,int $health, string $etat){
        $this->setNom($nom);
        $this->setForce($force);
        $this->setLevel($level);
        $this->setHealth($health);
        $this->setEtat();
    }

    public function caracteristiques() {
        
        echo "Le personnage" . " ". $this->nom ." ". "a une force de " ." ". $this->force . "."
        ."Il est de niveau"." ". $this->level ." ". "et il a une santé de " ." ". $this->health ."."." ". "Il est" ." ". $this->setEtat() . "<br>";
    }

    public function setEtat() {
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

    public function attaquer(Personnage $perso) {
        $perso->setHealth($perso->getHealth() - $this->force);
        $perso->setEtat();
    }

    public function levelUp(Personnage $perso) {
        $perso->setLevel($perso->getLevel() +1);
    }
}


$perso1 = new Personnage("Rose", 12,2,100,"");
$perso2 = new Personnage("Jules",15,1,50,"");
$perso3 = new Personnage("Jean",6,1,0,"");

$perso2->setNom("Ulrick");

$perso2->setForce(100);

$perso2->setLevel(4);

$perso2->setHealth(35);

$perso2->setEtat("mort");

echo "Avant l'attaque : ";
$perso2->caracteristiques();
$perso1->attaquer($perso2);
echo "Après l'attaque : ";
$perso2->caracteristiques();

echo "Un niveau inférieur ";
$perso2->caracteristiques();
$perso2->levelUp($perso2);
echo "Un niveau superieur ";;
$perso2->caracteristiques();