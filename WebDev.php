<?php
class WebDev extends Hero {


    private const DEVELOPPEURMINDAMAGE = 400;
    private const DEVELOPPEURMAXDAMAGE = 700;
    private const DEVELOPPEURMINSHIELD = 300;
    private const DEVELOPPEURMAXSHIELD = 500;
    private const DEVELOPPEURMINHEALTH = 1500;
    private const DEVELOPPEURMAXHEALTH = 1800;
    private const DEVELOPPEURWEAPON = 'ordinateur vieillissant';
    private const DEVELOPPEURSHIELD = 'armure de câbles RJ-45';
    private $healthInit;
    protected $specificRage = 40;
    protected $multiplyAttack = 1;


    public function __construct () {
        parent::__construct(self::DEVELOPPEURMINHEALTH, self::DEVELOPPEURMAXHEALTH, 0, self::DEVELOPPEURWEAPON, self::DEVELOPPEURMINDAMAGE, self::DEVELOPPEURMAXDAMAGE, self::DEVELOPPEURSHIELD, self::DEVELOPPEURMINSHIELD, self::DEVELOPPEURMAXSHIELD);
        $this->setHealth(rand($this->getMinHealth(), $this->getMaxHealth()));
        $this->setShieldValue(rand($this->getMinShieldValue(), $this->getMaxShieldValue()));
    }

    public function image () {
        return 'assets/image/dev.png';
    }
}

