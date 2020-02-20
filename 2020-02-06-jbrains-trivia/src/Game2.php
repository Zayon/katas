<?php

declare(strict_types=1);

require_once __DIR__.'/QuestionStack.php';
require_once __DIR__.'/Player.php';
require_once __DIR__.'/Players.php';

function echoln2($string) {
    echo $string."\n";
}

class Game2 {
    private const CATEGORY_MAP = [
        self::CATEGORY_POP,
        self::CATEGORY_SCIENCE,
        self::CATEGORY_SPORTS,
        self::CATEGORY_ROCK,
    ];

    private const CATEGORY_POP = 'Pop';
    private const CATEGORY_SCIENCE = 'Science';
    private const CATEGORY_SPORTS = 'Sports';
    private const CATEGORY_ROCK = 'Rock';

    /** @var QuestionStack[] */
    private array $board = [];

    private $isGettingOutOfPenaltyBox;

    private Players $players;

    public function  __construct()
    {
        $this->players = new Players();

        foreach (self::CATEGORY_MAP as $category) {
            $this->board[$category] = new QuestionStack($category);
        }
    }

    public function add(string $playerName): void
    {
        $this->players->add(new Player($playerName));

        echoln2($playerName .' was added');
        echoln2('They are player number '. count($this->players));
    }

    public function roll(int $roll): void
    {
        $currentPlayer = $this->players->current();
        echoln2($currentPlayer.' is the current player');
        echoln2('They have rolled a '. $roll);

        if ($currentPlayer->isInPenaltyBox()) {
            if ($roll % 2 === 0) {
                echoln2($currentPlayer.' is not getting out of the penalty box');
                $this->isGettingOutOfPenaltyBox = false;

                return;
            }

            $this->isGettingOutOfPenaltyBox = true;

            echoln2($currentPlayer.' is getting out of the penalty box');
        }

        $currentPlayer->setPlace($this->getNewPlayerPlace($currentPlayer, $roll));

        echoln2(
            sprintf(
                "%s's new location is %s",
                $currentPlayer,
                $currentPlayer->getPlace()
            )
        );
        $this->askQuestion();
    }

    private function askQuestion(): void
    {
        $category = self::CATEGORY_MAP[$this->players->current()->getPlace() % 4];
        echoln2('The category is '.$category);
        echoln2($this->board[$category]->next());
    }

    public function correctAnswer(): bool
    {
        $currentPlayer =$this->players->current();

        if (!$this->isGettingOutOfPenaltyBox && $currentPlayer->isInPenaltyBox()) {
            $this->players->next();

            return true;
        }

        echoln2('Answer was correct!!!!');
        $currentPlayer->addCoin();

        echoln2(
            sprintf(
                '%s now has %s Gold Coins.',
                $currentPlayer,
                $currentPlayer->getNumberOfCoins()
            )
        );

        $shouldGameContinue = $this->shouldGameContinue();
        $this->players->next();

        return $shouldGameContinue;
    }

    public function wrongAnswer(): bool
    {
        echoln2('Question was incorrectly answered');
        $currentPlayer = $this->players->current();
        echoln2($currentPlayer.' was sent to the penalty box');
        $currentPlayer->putInPenaltyBox();

        $this->players->next();

        return true;
    }

    private function shouldGameContinue(): bool
    {
        return !($this->players->current()->getNumberOfCoins() === 6);
    }

    private function getNewPlayerPlace(Player $player, int $roll): int
    {
        return ($player->getPlace() + $roll) % 12;
    }
}
