<?php
class Mage extends Hero {

    private const MAGEMINDAMAGE = 600;
    private const MAGEMAXDAMAGE = 800;
    private const MAGEMINSHIELD = 500;
    private const MAGEMAXSHIELD = 700;
    private const MAGEMINHEALTH = 1000;
    private const MAGEMAXHEALTH = 1500;
    private const MAGEWEAPON = 'bâton des flammes froides';
    private const MAGESHIELD = 'robe noire';


    public function __construct () {
        parent::__construct(self::MAGEMINHEALTH, self::MAGEMAXHEALTH, 0, self::MAGEWEAPON, self::MAGEMINDAMAGE, self::MAGEMAXDAMAGE, self::MAGESHIELD, self::MAGEMINSHIELD, self::MAGEMAXSHIELD);
        $this->setHealth(rand($this->getMinHealth(), $this->getMaxHealth()));
        $this->createHero();
    }

    public function updateRage() : void {
        $this->setRage($this->getRage() + 20);
    }


    public function attack () {
        if($this->getRage() >= 100){
            $this->setRage(0);
            return $this->getWeaponDamage() * 4;
        } else {
            return $this->getWeaponDamage();
        }
    }

}