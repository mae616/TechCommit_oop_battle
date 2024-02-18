<?php

class Battle {

    private array $characters = [];

    public function __construct()
    {
        $this->characters = [new Brave(), new Devil()];
    }

    public function start(): void {

        $battle = function(Character $attacker, Character $defender): bool {
            $isEnd = false;

            [$isCritical, $damage] = $attacker->attack();
            if($isCritical){
                echo $attacker->getName() . "の会心の一撃！";
            }else{
                echo $attacker->getName() . "の攻撃！";
            }

            $isMiss = $defender->takeDamage($damage);
            if($isMiss){
                echo $defender->getName() . "は攻撃をかわした！\n\n";
            }else{
                echo $defender->getName() . "に" . $damage . "のダメージ！\n\n";
            }

            if($defender->isDead()){

                echo $defender->getName() . "は力尽きた...\n\n";

                if($defender instanceof Devil){
                    echo "世界に平和が訪れた。！\n";
                }else{
                    echo "世界が滅ぼされた...\n";
                }
                return $isEnd = true;
            }
            return $isEnd;
        };

        echo "\n戦闘開始！\n\n";
        for ($i=0;; $i = ($i + 1) % 2) {

            echo $this->characters[0]->getName() . "のHP：" . $this->characters[0]->getHp()
                . " 攻撃力：" . $this->characters[0]->getPower() . "\n";
            echo $this->characters[1]->getName() . "のHP：" . $this->characters[1]->getHp()
                . " 攻撃力：" . $this->characters[1]->getPower() . "\n\n";

            $attacker = $this->characters[$i];
            $defender = $this->characters[($i + 1) % 2];
            if($battle($attacker, $defender)){
                break;
            }
        }
    }
}
