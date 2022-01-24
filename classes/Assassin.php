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
    protected $specificRage = 20;
    protected $multiplyAttack = 2;


    public function __construct () {
        parent::__construct(self::ASSASSINMINHEALTH, self::ASSASSINMAXHEALTH, 0, self::ASSASSINWEAPON, self::ASSASSINMINDAMAGE, self::ASSASSINMAXDAMAGE, self::ASSASSINSHIELD, self::ASSASSINMINSHIELD, self::ASSASSINMAXSHIELD);
        $this->setHealth(rand($this->getMinHealth(), $this->getMaxHealth()));
        $this->setShieldValue(rand($this->getMinShieldValue(), $this->getMaxShieldValue()));
    }

    public function image () {
        return 'assets/image/assassin.jpg';
    }


}