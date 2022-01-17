<?php
class Paladin extends Hero {

    private const PALADINMINDAMAGE = 400;
    private const PALADINMAXDAMAGE = 600;
    private const PALADINMINSHIELD = 800;
    private const PALADINMAXSHIELD = 1500;
    private const PALADINMINHEALTH = 2000;
    private const PALADINMAXHEALTH = 3000;
    private const PALADINWEAPON = 'espadon';
    private const PALADINSHIELD = 'armure de plaques';


    public function __construct () {
        parent::__construct(self::PALADINMINHEALTH, self::PALADINMAXHEALTH, 0, self::PALADINWEAPON, self::PALADINMINDAMAGE, self::PALADINMAXDAMAGE, self::PALADINSHIELD, self::PALADINMINSHIELD, self::PALADINMAXSHIELD);
        $this->setHealth(rand($this->getMinHealth(), $this->getMaxHealth()));
        $this->createHero();
    }

    

}

