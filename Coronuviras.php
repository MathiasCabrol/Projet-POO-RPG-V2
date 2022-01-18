<?php
class Coronuviras extends Ennemy {

    private const CORONUVIRASMINDAMAGE = 700;
    private const CORONUVIRASMAXDAMAGE = 1000;
    private const CORONUVIRASMINSHIELD = 500;
    private const CORONUVIRASMAXSHIELD = 700;
    private const CORONUVIRASMINHEALTH = 2000;
    private const CORONUVIRASMAXHEALTH = 3000;
    private const CORONUVIRASWEAPON = 'masse';
    private const CORONUVIRASSHIELD = 'armure en peau de chauve-souris';
    protected $specificRage = 20;


    public function __construct () {
        parent::__construct(self::CORONUVIRASMINHEALTH, self::CORONUVIRASMAXHEALTH, 0, self::CORONUVIRASWEAPON, self::CORONUVIRASMINDAMAGE, self::CORONUVIRASMAXDAMAGE, self::CORONUVIRASSHIELD, self::CORONUVIRASMINSHIELD, self::CORONUVIRASMAXSHIELD);
        $this->createEnnemy();
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
        return 'assets/image/virus.webp';
    }

}

