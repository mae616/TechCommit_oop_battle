<?php

class Devil extends Character {
    public function __construct() {
        $hp = rand(50, 100);
        $power = rand(5, 20);
        $missProbability = rand(1, 6) / 10;
        $criticalAttackProbability = rand(1, 8) / 10;

        parent::__construct('魔王', $hp, $power, $missProbability, $criticalAttackProbability);
    }
}
