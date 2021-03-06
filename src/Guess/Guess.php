<?php

namespace Wim4rk\Guess;

/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */
class Guess
{
    /**
     * @var int $number   The current secret number.
     * @var int $tries    Number of tries a guess has been made.
     */

    private $number;
    private $tries;

    /**
     * Constructor to initiate the object with current game settings,
     * if available. Randomize the current number if no value is sent in.
     *
     * @param int $number The current secret number, default -1 to initiate
     *                    the number from start.
     * @param int $tries  Number of tries a guess has been made,
     *                    default 6.
     */

    public function __construct(int $number = null, int $tries = 6)
    {
        $this->tries = $tries;
        $this->number = $number;

        if ($number === null) {
            $this->random();
        }
    }



    /**
     * Randomize the secret number between 1 and 100 to initiate a new game.
     *
     * @return void
     */

    public function random() : void
    {
        $this->number = rand(1, 100);
    }




    /**
     * Get number of tries left.
     *
     * @return int as number of tries made.
     */

    public function tries() : int
    {
        return $this->tries;
    }



    /**
     * Get the secret number.
     *
     * @return int as the secret number.
     */

    public function number() : int
    {
        return $this->number;
    }

    /**
     * Make a guess, evaluate
     *
     * @throws GuessException when guessed number is out of bounds.
     *
     * @return string to show the status of the guess made.
     */

    /**
     * Shall we continue?
     *
     * @return string as result of guess.
     */
    public function makeGuess(int $number) : string
    {
        if ($number > 100 || $number < 1) {
            throw new GuessException("Guess is out of bounds");
        }

        $this->tries -= 1;

        // if ($this->tries < 1) {
        //     $this->game_over("guesses");
        // }

        if ($number == $this->number) {
            // $this->game_over("correct");
            return "correct";
        } elseif ($number > $this->number) {
            return "too high";
        } else {
            return "too low";
        }
    }
}
