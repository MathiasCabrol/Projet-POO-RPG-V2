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


    public function __construct () {
        parent::__construct(self::REVENANTMINHEALTH, self::REVENANTMAXHEALTH, 0, self::REVENANTWEAPON, self::REVENANTMINDAMAGE, self::REVENANTMAXDAMAGE, self::REVENANTSHIELD, self::REVENANTMINSHIELD, self::REVENANTMAXSHIELD);
        $this->createEnnemy();
    }
    
    public function castSpecial () {
        if($this->getRage() >= 100){
            $this->setRage(0);
            return $this->getWeaponDamage() + 300;
        }
    }
}

