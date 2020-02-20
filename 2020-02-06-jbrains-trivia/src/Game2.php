<?php
function echoln2($string) {
    echo $string."\n";
}

class Game2 {
    private $players;
    private $places;
    private $purses ;
    private $inPenaltyBox ;

    private $popQuestions;
    private $scienceQuestions;
    private $sportsQuestions;
    private $rockQuestions;

    private $currentPlayer = 0;
    private $isGettingOutOfPenaltyBox;

    public function  __construct()
    {
        $this->players = array();
        $this->places = array(0);
        $this->purses  = array(0);
        $this->inPenaltyBox  = array(0);

        $this->popQuestions = array();
        $this->scienceQuestions = array();
        $this->sportsQuestions = array();
        $this->rockQuestions = array();

        for ($i = 0; $i < 50; $i++) {
            $this->popQuestions[] = 'Pop Question '.$i;
            $this->scienceQuestions[] = 'Science Question '.$i;
            $this->sportsQuestions[] = 'Sports Question '.$i;
            $this->rockQuestions[] = 'Rock Question '. $i;
        }
    }

    public function add($playerName): void
    {
        $this->players[] = $playerName;
        $howManyPlayers = $this->howManyPlayers();

        $this->places[$howManyPlayers] = 0;
        $this->purses[$howManyPlayers] = 0;
        $this->inPenaltyBox[$howManyPlayers] = false;

        echoln2($playerName .' was added');
        echoln2('They are player number '. $howManyPlayers);
    }

    private function howManyPlayers(): int
    {
        return count($this->players);
    }

    public function roll($roll): void
    {
        $currentPlayer = $this->players[$this->currentPlayer];
        echoln2($currentPlayer.' is the current player');
        echoln2('They have rolled a '. $roll);

        if ($this->inPenaltyBox[$this->currentPlayer]) {
            if ($roll % 2 === 0) {
                echoln2($currentPlayer.' is not getting out of the penalty box');
                $this->isGettingOutOfPenaltyBox = false;
                return;
            }

            $this->isGettingOutOfPenaltyBox = true;
            echoln2($currentPlayer.' is getting out of the penalty box');
        }

        $this->places[$this->currentPlayer] += $roll;
        if ($this->places[$this->currentPlayer] > 11) {
            $this->places[$this->currentPlayer] -= 12;
        }

        echoln2(
            sprintf(
                "%s's new location is %s",
                $currentPlayer,
                $this->places[$this->currentPlayer]
            )
        );
        echoln2('The category is '. $this->currentCategory());
        $this->askQuestion();
    }

    private function askQuestion(): void
    {
        if ($this->currentCategory() === 'Pop') {
            echoln2(array_shift($this->popQuestions));
        }
        if ($this->currentCategory() === 'Science') {
            echoln2(array_shift($this->scienceQuestions));
        }
        if ($this->currentCategory() === 'Sports') {
            echoln2(array_shift($this->sportsQuestions));
        }
        if ($this->currentCategory() === 'Rock') {
            echoln2(array_shift($this->rockQuestions));
        }
    }


    private function currentCategory(): string
    {
        $moduloMap = [
            0 => 'Pop',
            1 => 'Science',
            2 => 'Sports',
            3 => 'Rock',
        ];

        return $moduloMap[$this->places[$this->currentPlayer] % 4];
    }

    public function correctAnswer(): bool
    {
        if ($this->inPenaltyBox[$this->currentPlayer] && !$this->isGettingOutOfPenaltyBox) {
            $this->nextPlayer();

            return true;
        }

        echoln2('Answer was correct!!!!');
        $this->purses[$this->currentPlayer]++;
        echoln2(
            sprintf(
                '%s now has %s Gold Coins.',
                $this->players[$this->currentPlayer],
                $this->purses[$this->currentPlayer]
            )
        );

        $shouldGameContinue = $this->shouldGameContinue();
        $this->nextPlayer();

        return $shouldGameContinue;
    }

    public function wrongAnswer(): bool
    {
        echoln2('Question was incorrectly answered');
        echoln2($this->players[$this->currentPlayer] .' was sent to the penalty box');
        $this->inPenaltyBox[$this->currentPlayer] = true;

        $this->nextPlayer();

        return true;
    }

    private function shouldGameContinue(): bool
    {
        return !($this->purses[$this->currentPlayer] === 6);
    }

    private function nextPlayer(): void
    {
        $this->currentPlayer++;
        if ($this->currentPlayer === count($this->players)) {
            $this->currentPlayer = 0;
        }
    }
}
