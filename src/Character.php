<?php

class Character {

    const CRITICAL_ATTACK_ATTACK_MULTIPLIER = 1.5;
    const MIN_HP = 0;

    private string $name = '';
    private float $hp = 0;
    private int $power = 0;
    private float $missProbability = 0;
    private float $criticalAttackProbability = 0;

    public function __construct(
                                string $name,
                                int $hp,
                                int $power,
                                float $missProbability,
                                float $criticalAttackProbability) {
        $this->name = $name;
        $this->hp = $hp;
        $this->power = $power;
        $this->missProbability = $missProbability;
        $this->criticalAttackProbability = $criticalAttackProbability;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getHp(): float {
        return $this->hp;
    }

    public function getPower(): int {
        return $this->power;
    }

    public function isDead(): bool {
        return $this->hp <= self::MIN_HP;
    }

    public function attack(): array {

        $isCritical = false;
        $toGiveDamage = $this->power;

        if($this->isCritical()){
            $isCritical = true;
            $toGiveDamage *= self::CRITICAL_ATTACK_ATTACK_MULTIPLIER;
        }

        return [$isCritical, $toGiveDamage];
    }

    public function takeDamage(float $damage): bool {
        $isMiss = false;
        if($this->isMiss()){
            return $isMiss = true;
        }

        $this->hp -= $damage;
        return $isMiss;
    }

    private function isMiss(): bool {
        return rand(0, 1) <= $this->missProbability;
    }

    private function isCritical(): bool {
        return rand(0, 1) <= $this->criticalAttackProbability;
    }
}
