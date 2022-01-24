<?php
class Revenant extends Ennemy {

    private const REVENANTMINDAMAGE = 200;
    private const REVENANTMAXDAMAGE = 400;
    private const REVENANTMINSHIELD = 0;
    private const REVENANTMAXSHIELD = 0;
    private const REVENANTMINHEALTH = 1000;
    private const REVENANTMAXHEALTH = 1300;
    private const REVENANTWEAPON = 'ongles';
    private const REVENANTSHIELD = 'aucune armure';
    protected $specificRage = 20;
    protected $addAttack = 300;


    public function __construct () {
        parent::__construct(self::REVENANTMINHEALTH, self::REVENANTMAXHEALTH, 0, self::REVENANTWEAPON, self::REVENANTMINDAMAGE, self::REVENANTMAXDAMAGE, self::REVENANTSHIELD, self::REVENANTMINSHIELD, self::REVENANTMAXSHIELD);
        $this->setHealth(rand($this->getMinHealth(), $this->getMaxHealth()));
        $this->setShieldValue(rand($this->getMinShieldValue(), $this->getMaxShieldValue()));
    }

    public function image () {
        return 'assets/image/revenant.jpg';
    }
}

