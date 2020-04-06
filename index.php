<?php

Interface Attaquant {
    function attaquer(Personnage $perso);
}

Interface Cible {
    function subirDegats();
}

abstract class Personnage implements Attaquant {
    protected $nom;
    protected $force;
    protected $level;
    protected $health;
    protected $etat;
    protected $type;
    protected $experience;
    protected $degats;

    public function __construct(string $nom, int $force, int $level=1,int $health, string $etat, string $type, int $experience){
        $this->setNom($nom);
        $this->setForce($force);
        $this->setLevel($level);
        $this->setHealth($health);
        $this->setEtat();
        $this->setType($type);
        $this->setExperience($experience);
    }

    public function caracteristiques() {
        
        echo "Le personnage" . " ". $this->nom ." ". "a une force de " ." ". $this->force . "."
        ."Il est de niveau"." ". $this->level ." ". "et il a une santé de " ." ". $this->health ."."." ". "Il est" ." ". $this->setEtat()."."." "."Il est de type". " ". $this->type."."." "."Son experience est de :".$this->experience."xp"."<br>";
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
        echo "Suite a ce combat, le personnage vient de monter de niveau :"."<br>";
        $this->setLevel($this->getLevel()+1);
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setExperience($experience) {
        $this->experience = $experience;
    }

    public function getExperience() {
       return $this->experience;
    }

    abstract function subirDegats();

    abstract function attaquer(Personnage $perso);

}

class Guerrier extends Personnage implements Cible{

    public function attaquer(Personnage $perso) {
        $this->frapper();
        $this->degats($perso);
        {
            $perso->setEtat();
        }
    }

    public function frapper() {
        echo $this->nom. " "."de type". " ".Guerrier::class. " ". "vient de frapper ce personnage et lui inflige des dégats"."<br>";
    }

    public function degats(Personnage $perso) {
       
    if ($perso instanceof Archer ) {
        $perso->subirDegats();
       $this->setExperience($this->getExperience()+50);
    } else {
        $perso->subirDegats();
        $this->setExperience($this->getExperience()+50);
    }
}

public function subirDegats(){
        $this->health -= rand(0,100);
}

}

class Sorcier extends Personnage implements Cible {
    
    public function attaquer(Personnage $perso) {
        $this->lancerSort();
        $this->degats($perso);
        {
            $perso->setEtat();
        }
    }

    public function lancerSort() {
        echo $this->nom. " "."de type". " ". Sorcier::class. " "."vient de lancer un sort contre ce personnage et lui inflige des dégats"."<br>";
    }

    public function degats(Personnage $perso) {
       
        if ($perso instanceof Archer ) {
            $perso->subirDegats();
            $this->setExperience($this->getExperience()+50);
        } else {
            $perso->subirDegats();
            $this->setExperience($this->getExperience()+50);
        }
    }

    public function subirDegats(){
        $this->health -= rand(0,100);
}

}

class Archer extends Personnage implements Cible {
   
    public function attaquer(Personnage $perso) {
        $this->tirer();
        $this->degats($perso);
        {
            $perso->setEtat();
        }
    }

    public function tirer() {
        echo $this->nom. " "."de type". " ". Archer::class. " ". "vient de lancer plusieurs flèches contre ce personnage et lui inflige des dégats"."<br>";
    }

    public function degats(Personnage $perso) {
       
        if ($perso instanceof Guerrier ) {
            $perso->subirDegats();
           $this->setExperience($this->getExperience()+50);
        } else {
            $perso->subirDegats();
            $this->setExperience($this->getExperience()+50);
        }
    }

    public function subirDegats(){
        $this->health -= rand(0,100);
}
}

class Creature implements Attaquant {
        function attaquer(Personnage $perso) {
         $perso->setHealth($perso->getHealth()-rand(0,100));
         echo "Une créature vient d'attaquer le personnage"."<br>";
        }


}



$perso1 = new Archer("Rose", 12,2,100,"", "Archer", 0);
$perso2 = new Sorcier("Jules",15,1,100,"","Sorcier",0);
$perso3 = new Guerrier("Jean",6,1,100,"", "Guerrier",0);

$creature = new Creature();


// $perso1->caracteristiques();
// $perso2->caracteristiques();
// $perso3->caracteristiques();

// echo "Un niveau inférieur ";
// $perso2->caracteristiques();
// $perso2->levelUp($perso2);
// echo "Un niveau superieur ";;
// $perso2->caracteristiques();

echo "Avant l'attaque : ";
$perso2->caracteristiques();
$perso1->attaquer($perso2);
echo "Après l'attaque : ";
$perso1->caracteristiques();
$perso2->caracteristiques();
echo "<br>";
echo "Avant l'attaque : ";
$perso1->caracteristiques();
$perso2->attaquer($perso1);
echo "Après l'attaque : ";
$perso1->caracteristiques();
$perso2->caracteristiques();
echo "<br>";
echo "Avant l'attaque : ";
$perso2->caracteristiques();
$perso1->attaquer($perso2);
echo "Après l'attaque : ";
$perso1->caracteristiques();
$perso2->caracteristiques();
echo "<br>";
echo "Avant l'attaque : ";
$perso2->caracteristiques();
$perso3->attaquer($perso2);
echo "Après l'attaque : ";
$perso2->caracteristiques();
$perso3->caracteristiques();
echo "<br>";
echo "Avant l'attaque : ";
$perso1->caracteristiques();
$perso3->attaquer($perso1);
echo "Après l'attaque : ";
$perso1->caracteristiques();
$perso3->caracteristiques();
echo "<br>";
echo "Avant l'attaque : ";
$perso2->caracteristiques();
$perso3->attaquer($perso2);
echo "Après l'attaque : ";
$perso2->caracteristiques();
$perso3->caracteristiques();
echo "<br>";
echo "Avant l'attaque : ";
$perso3->caracteristiques();
$creature->attaquer($perso3);
echo "Après l'attaque : ";
$perso3->caracteristiques();
$perso2->caracteristiques();
echo "<br>";
echo "Avant l'attaque : ";
$perso3->caracteristiques();
$perso2->attaquer($perso3);
echo "Après l'attaque : ";
$perso3->caracteristiques();
$perso2->caracteristiques();
echo "<br>";
$perso2->levelUp();
$perso2->caracteristiques();
