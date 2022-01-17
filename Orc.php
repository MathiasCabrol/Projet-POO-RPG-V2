<?php
class Orc extends Character {
    private $damage;
    private $minDamage;
    private $maxDamage;

    public function __construct($minHealth, $maxHealth, $defaultRage, $setMinDamage, $setMaxDamage) {
        parent::__construct($minHealth, $maxHealth, $defaultRage);
        $this->setMinDamage($setMinDamage);
        $this->setMaxDamage($setMaxDamage);
    }

    public function showOrcInfos() {
        return 'Les points de vie de l\'orc sont de ' . $this->getHealth() . ' et sa rage est de ' . $this->getRage();
    }

    public function setMinDamage ($selectedDamage) {
        $this->minDamage = $selectedDamage;
    }

    public function getMinDamage () {
        return $this->minDamage;
    }

    public function setMaxDamage ($selectedDamage) {
        $this->maxDamage = $selectedDamage;
    }

    public function getMaxDamage () {
        return $this->maxDamage;
    }

    public function attack () {
        $this->setDamage(rand($this->getMinDamage(), $this->getMaxDamage()));
    }

    public function getDamage () {
        return $this->damage;
    }

    public function setDamage ($damageSelected) {
        $this->damage = $damageSelected;
    }
}