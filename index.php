<?php

class Personnage {
    protected $nom;
    protected $force;
    protected $level;
    protected $health;
    protected $etat;
    protected $type;

    public function __construct(string $nom, int $force, int $level=1,int $health, string $etat, string $type){
        $this->setNom($nom);
        $this->setForce($force);
        $this->setLevel($level);
        $this->setHealth($health);
        $this->setEtat();
        $this->setType($type);
    }

    public function caracteristiques() {
        
        echo "Le personnage" . " ". $this->nom ." ". "a une force de " ." ". $this->force . "."
        ."Il est de niveau"." ". $this->level ." ". "et il a une santé de " ." ". $this->health ."."." ". "Il est" ." ". $this->setEtat()."."." "."Il est de type". " ". $this->type."."." "."<br>";
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

    public function levelUp() {
        $this->setLevel($this->getLevel()+1);
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function attaquer(Personnage $perso) {
        $perso->setEtat();
    }


}

class Guerrier extends Personnage {

    public function attaquer(Personnage $perso) {
        $this->frapper();
        $this->degats($perso);
        parent::attaquer($perso);
    }

    public function frapper() {
        echo $this->nom. " "."de type". " ".Guerrier::class. " ". "vient de frapper ce personnage et lui inflige des dégats"."<br>";
    }

    public function degats($perso) {
        $perso->setHealth($perso->getHealth() - 50);
    }

}

class Sorcier extends Personnage {
    
    public function attaquer(Personnage $perso) {
        $this->lancerSort();
        $this->degats($perso);
        parent::attaquer($perso);
    }

    public function lancerSort() {
        echo $this->nom. " "."de type". " ". Sorcier::class. " "."vient de lancer un sort contre ce personnage et lui inflige des dégats"."<br>";
    }

    public function degats($perso) {
        $perso->setHealth($perso->getHealth() - 100);
    }

}

class Archer extends Personnage {
   
    public function attaquer(Personnage $perso) {
        $this->tirer();
        $this->degats($perso);
        parent::attaquer($perso);      
    }

    public function tirer() {
        echo $this->nom. " "."de type". " ". Archer::class. " ". "vient de lancer plusieurs flèches contre ce personnage et lui inflige des dégats"."<br>";
    }

    public function degats($perso) {
        $perso->setHealth($perso->getHealth() - 40);
    }

}


$perso1 = new Archer("Rose", 12,2,100,"", "Archer");
$perso2 = new Sorcier("Jules",15,1,50,"","Sorcier");
$perso3 = new Guerrier("Jean",6,1,0,"", "Guerrier");

// $perso1->caracteristiques();
// $perso2->caracteristiques();
// $perso3->caracteristiques();

// echo "Un niveau inférieur ";
// $perso2->caracteristiques();
// $perso2->levelUp($perso2);
// echo "Un niveau superieur ";;
// $perso2->caracteristiques();

echo "Avant l'attaque : ";
$perso1->caracteristiques();
$perso2->attaquer($perso1);
echo "Après l'attaque : ";
$perso1->caracteristiques();

