<?php
class Bug extends Ennemy {

    private const BUGMINDAMAGE = 500;
    private const BUGMAXDAMAGE = 800;
    private const BUGMINSHIELD = 10;
    private const BUGMAXSHIELD = 600;
    private const BUGMINHEALTH = 1;
    private const BUGMAXHEALTH = 9999;
    private const BUGWEAPON = 'AirèmeTiréAireÉfÉToile';
    private const BUGSHIELD = 'armure d\'erreur système';
    protected $specificRage = 5;
    protected $addAttack = 1000000;


    public function __construct () {
        parent::__construct(self::BUGMINHEALTH, self::BUGMAXHEALTH, 0, self::BUGWEAPON, self::BUGMINDAMAGE, self::BUGMAXDAMAGE, self::BUGSHIELD, self::BUGMINSHIELD, self::BUGMAXSHIELD);
        $this->setHealth(rand($this->getMinHealth(), $this->getMaxHealth()));
        $this->setShieldValue(rand($this->getMinShieldValue(), $this->getMaxShieldValue()));
    }

    public function image () {
        return 'assets/image/bug.jpg';
    }

}

