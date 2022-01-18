<?php

class Ennemy extends Character {
    private $weapon;
    private $minWeaponDamage;
    private $maxWeaponDamage;
    private $weaponDamage;
    private $shield;
    private $minShieldValue;
    private $maxShieldValue;
    private $shieldValue;
    protected $specificRage;
    protected $addAttack;
    

    public function __construct(int $minHealth, int $maxHealth, int $defaultRage, string $weaponSelected,  int $minWeaponDamage, int $maxWeaponDamage, string $shieldSelected, int $minShieldValue, int $maxShieldValue) {
        parent::__construct($minHealth, $maxHealth, $defaultRage);
        $this->setWeapon($weaponSelected);
        $this->setMinWeaponDamage($minWeaponDamage);
        $this->setMaxWeaponDamage($maxWeaponDamage);
        $this->setShield($shieldSelected);
        $this->setMinShieldValue($minShieldValue);
        $this->setMaxShieldValue($maxShieldValue);
    }

    public function showHeroInfos () {
        return 'Le héro avec la valeur en santé de ' . $this->getHealth() . ' et en rage de ' . $this->getRage() . ' équipé de l\'arme ' . $this->weapon . ' avec des dégats équivalents à ' . $this->weaponDamage . ' et l\'armure ' . $this->shield . ' avec des points d\'armure de ' . $this->shieldValue;
    }

    public function getWeapon () {
        return $this->weapon;
    }
    public function setWeapon($newWeapon) {
        $this->weapon = $newWeapon;
    }

    public function getMinWeaponDamage () {
        return $this->minWeaponDamage;
    }

    public function setMinWeaponDamage ($newMinWeaponDamage) {
        $this->minWeaponDamage = $newMinWeaponDamage;
    }

    public function getMaxWeaponDamage () {
        return $this->maxWeaponDamage;
    }

    public function setMaxWeaponDamage ($newMaxWeaponDamage) {
        $this->maxWeaponDamage = $newMaxWeaponDamage;
    }

    public function getMinShieldValue () {
        return $this->minShieldValue;
    }

    public function setMinShieldValue ($newMinShieldValue) {
        $this->minShieldValue = $newMinShieldValue;
    }

    public function getMaxShieldValue () {
        return $this->maxShieldValue;
    }

    public function setMaxShieldValue ($newMaxShieldValue) {
        $this->maxShieldValue = $newMaxShieldValue;
    }

    public function getWeaponDamage () {
        return $this->weaponDamage;
    }
    public function setWeaponDamage($newWeaponDamage) {
        $this->weaponDamage = $newWeaponDamage;
    }

    public function getShield () {
        return $this->shield;
    }
    public function setShield($newShield) {
        $this->shield = $newShield;
    }

    public function getShieldValue () {
        return $this->shieldValue;
    }
    public function setShieldValue($newShieldValue) {
        $this->shieldValue = $newShieldValue;
    }
    
    public function attacked($damage) {
        $this->setHealth($this->getHealth() - ($damage - $this->getShieldValue()));
        return $this->getHealth();
    }

    public function attack () {
        if($this->getRage() < 100){
            return $this->getWeaponDamage();
        } else {
            $this->setRage(0);
            return $this->getWeaponDamage() + $this->addAttack;
        }
}

    public function updateRage() : void {
        $this->setRage($this->getRage() + $this->specificRage);
    }

    public function createAttack () {
        $this->setWeaponDamage(rand($this->getMinWeaponDamage(), $this->getMaxWeaponDamage()));
    }
}