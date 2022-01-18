<?php
class Wizard extends Hero {

    private const MAGEMINDAMAGE = 600;
    private const MAGEMAXDAMAGE = 800;
    private const MAGEMINSHIELD = 500;
    private const MAGEMAXSHIELD = 700;
    private const MAGEMINHEALTH = 1000;
    private const MAGEMAXHEALTH = 1500;
    private const MAGEWEAPON = 'bâton des flammes froides';
    private const MAGESHIELD = 'robe noire';
    protected $specificRage = 20;
    protected $multiplyAttack = 4;


    public function __construct () {
        parent::__construct(self::MAGEMINHEALTH, self::MAGEMAXHEALTH, 0, self::MAGEWEAPON, self::MAGEMINDAMAGE, self::MAGEMAXDAMAGE, self::MAGESHIELD, self::MAGEMINSHIELD, self::MAGEMAXSHIELD);
        $this->setHealth(rand($this->getMinHealth(), $this->getMaxHealth()));
        $this->createHero();
    }

    public function image () {
        return 'assets/image/mage.webp';
    }
}