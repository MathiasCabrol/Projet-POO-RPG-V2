<?php

class Hero extends Character {
    private $weapon;
    private $minWeaponDamage;
    private $maxWeaponDamage;
    private $weaponDamage;
    private $shield;
    private $minShieldValue;
    private $maxShieldValue;
    private $shieldValue;
    //Valeurs par défaut de la rage et multiplicateur du paladin.
    protected $specificRage = 30;
    protected $multiplyAttack = 3;
    

    public function __construct(int $minHealth, int $maxHealth, int $defaultRage, string $weaponSelected,  int $minWeaponDamage, int $maxWeaponDamage, string $shieldSelected, int $minShieldValue, int $maxShieldValue) {
        parent::__construct($minHealth, $maxHealth, $defaultRage);
        $this->setWeapon($weaponSelected);
        $this->setMinWeaponDamage($minWeaponDamage);
        $this->setMaxWeaponDamage($maxWeaponDamage);
        $this->setShield($shieldSelected);
        $this->setMinShieldValue($minShieldValue);
        $this->setMaxShieldValue($maxShieldValue);
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
    
    public function attack () {
        if($this->getRage() < 100){
            $damageInflicted =  $this->getWeaponDamage();
        } else {
            $damageInflicted = ($this->getWeaponDamage() * $this->multiplyAttack);
            $this->setRage(0);
        }
        return $damageInflicted;
}

    public function attacked ($damage) {
        $damageTaken = ($damage - $this->getShieldValue());
        if($damageTaken < 0){
            $damageTaken = 0;
        }
        $this->setHealth($this->getHealth() - $damageTaken);
        if($this->getHealth() < 0){
            $this->setHealth(0);
        }
        return $this->getHealth();
    }

    public function updateRage() : void {
        $this->setRage($this->getRage() + $this->specificRage);
    }

    public function createAttack () {
        $this->setWeaponDamage(rand($this->getMinWeaponDamage(), $this->getMaxWeaponDamage()));
    }
}