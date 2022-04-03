<?php

class Sondage
{
    private int $length;
    private int $expirationTime;
    private int $nbVoters;
    private array $choices;

    public static array $sondages = [];

    private function __construct($choices, $length = 2*60) {
        $this->length = $length;
        $this->nbVoters = 0;
        $this->expirationTime = time() + $length;
        $this->choices = array_fill_keys($choices, 0);
    }

    public function getNbVoters(): int {
        return $this->nbVoters;
    }
    public function addVoter($choice): string {
        if(array_key_exists($choice, $this->choices)) {
            $this->choices[$choice]++;
            $this->nbVoters++;
            return "done";
        } else {
            return "choice not available";
        }
    }
    public function getExpirationTime(): string {
        return $this->expirationTime;
    }
    public function getLength(): int{
        return $this->length;
    }
    public function getChoices(): array {
        return array_keys($this->choices);
    }

    public static function initialize() {
        self::$sondages = unserialize(file_get_contents("data.txt")) ?? [];
    }
    public static function newInstance($choices, $length = 2*60): string {
        $key = uniqid();
        self::$sondages[$key] = new Sondage($choices, $length);
        file_put_contents("data.txt", serialize(self::$sondages));
        return $key;
    }
    public static function getInstance($key): Sondage|null {
        return self::$sondages[$key];
    }
    public static function getAllKeys(): array {
        return array_keys(self::$sondages);
    }
}