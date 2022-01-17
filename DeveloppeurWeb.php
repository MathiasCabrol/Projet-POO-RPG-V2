<?php
class Developpeur extends Hero {


    private const DEVELOPPEURMINDAMAGE = 400;
    private const DEVELOPPEURMAXDAMAGE = 700;
    private const DEVELOPPEURMINSHIELD = 300;
    private const DEVELOPPEURMAXSHIELD = 500;
    private const DEVELOPPEURMINHEALTH = 1500;
    private const DEVELOPPEURMAXHEALTH = 1800;
    private const DEVELOPPEURWEAPON = 'ordinateur vieillissant';
    private const DEVELOPPEURSHIELD = 'armure de câbles RJ-45';
    private $healthInit;
    private $damageInit;
    private $shieldInit;


    public function __construct () {
        parent::__construct(self::DEVELOPPEURMINHEALTH, self::DEVELOPPEURMAXHEALTH, 0, self::DEVELOPPEURWEAPON, self::DEVELOPPEURMINDAMAGE, self::DEVELOPPEURMAXDAMAGE, self::DEVELOPPEURSHIELD, self::DEVELOPPEURMINSHIELD, self::DEVELOPPEURMAXSHIELD);
        $this->setHealth(rand($this->getMinHealth(), $this->getMaxHealth()));
        $this->createHero();
        $this->healthInit = $this->health;
        $this->damageInit = $this->getWeaponDamage();
        $this->shieldInit = $this->getShieldValue();
    }

    public function updateRage() : void {
        $this->setRage($this->getRage() + 40);
    }


    public function attack () {
            return $this->getWeaponDamage();
    }

    public function castSpecial ($ennemyHealth) : bool {
        if($this->getRage() >= 0 && $this->getHealth() < $ennemyHealth){
            $this->setHealth($this->healthInit);
            $this->setRage(0);
            return true;
        }
        return false;
    }
}

