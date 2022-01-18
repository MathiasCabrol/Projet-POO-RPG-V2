<?php
class Urukhai extends Ennemy {

    private const URUKHAIMINDAMAGE = 500;
    private const URUKHAIMAXDAMAGE = 800;
    private const URUKHAIMINSHIELD = 700;
    private const URUKHAIMAXSHIELD = 1000;
    private const URUKHAIMINHEALTH = 1500;
    private const URUKHAIMAXHEALTH = 2000;
    private const URUKHAIWEAPON = 'fléau';
    private const URUKHAISHIELD = 'armure de piques';
    protected $specificRage = 20;
    protected $addAttack = 900;


    public function __construct () {
        parent::__construct(self::URUKHAIMINHEALTH, self::URUKHAIMAXHEALTH, 0, self::URUKHAIWEAPON, self::URUKHAIMINDAMAGE, self::URUKHAIMAXDAMAGE, self::URUKHAISHIELD, self::URUKHAIMINSHIELD, self::URUKHAIMAXSHIELD);
        $this->setHealth(rand($this->getMinHealth(), $this->getMaxHealth()));
        $this->setShieldValue(rand($this->getMinShieldValue(), $this->getMaxShieldValue()));
    }

    public function castSpecial () {
        if($this->getRage() >= 100){
            $this->setRage(0);
            return true;
        } else {
            return false;
        }
    }

    public function image () {
        return 'assets/image/urukhai.jpeg';
    }

}

