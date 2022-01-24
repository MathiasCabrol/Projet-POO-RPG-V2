<?php
Class Character {
    private $health;
    private $minHealth;
    private $maxHealth;
    private $rage;

    public function __construct(int $minHealth, int $maxHealth, int $defaultRage) {
        $this->setMinHealth($minHealth);
        $this->setMaxHealth($maxHealth);
        $this->setRage($defaultRage);
    }

    public function getMaxHealth () {
        return $this->maxHealth;
    }

    public function setMaxHealth ($newMaxHealth) {
        $this->maxHealth = $newMaxHealth;
    }

    public function getMinHealth () {
        return $this->minHealth;
    }

    public function setMinHealth ($newMinHealth) {
        $this->minHealth = $newMinHealth;
    }

    public function getHealth () {
        return $this->health;
    }

    public function createHealth () {
        $this->setHealth(rand($this->getMinHealth(), $this->getMaxHealth()));
    }

    public function setHealth($newHealth) {
        if($newHealth <= 0){
        $newHealth = 0;
        }
        $this->health = $newHealth;
    }

    public function getRage () {
        return $this->rage;
    }
    public function setRage ($newRage) {
        $this->rage = $newRage;
    }
}
