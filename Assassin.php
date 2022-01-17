<?php
class Assassin extends Hero {

    private const ASSASSINMINDAMAGE = 600;
    private const ASSASSINMAXDAMAGE = 800;
    private const ASSASSINMINSHIELD = 300;
    private const ASSASSINMAXSHIELD = 400;
    private const ASSASSINMINHEALTH = 800;
    private const ASSASSINMAXHEALTH = 1300;
    private const ASSASSINWEAPON = 'dague empoisonnée';
    private const ASSASSINSHIELD = 'cape de voleur';


    public function __construct () {
        parent::__construct(self::ASSASSINMINHEALTH, self::ASSASSINMAXHEALTH, 0, self::ASSASSINWEAPON, self::ASSASSINMINDAMAGE, self::ASSASSINMAXDAMAGE, self::ASSASSINSHIELD, self::ASSASSINMINSHIELD, self::ASSASSINMAXSHIELD);
        $this->setHealth(rand($this->getMinHealth(), $this->getMaxHealth()));
        $this->createHero();
    }

    public function updateRage() : void {
        $this->setRage($this->getRage() + 20);
    }


    public function attack () {
        if($this->getRage() >= 100){
            $this->setRage(0);
            return $this->getWeaponDamage() * 2;
        } else {
            return $this->getWeaponDamage();
        }
    }

}