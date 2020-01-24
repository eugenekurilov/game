<?php

namespace sts;

/**
 * Class Game
 * @package sts
 */
class Game
{
    protected $firstUserId = null;
    protected $secondUserId = null;
    protected $gameId = null;

    /**
     * Game constructor.
     * @param int $firstUserId
     * @param int $secondUserId
     */
    public function __construct(int $firstUserId, int $secondUserId)
    {
        $this->firstUserId = $firstUserId;
        $this->secondUserId = $secondUserId;
        // TODO DUMMY
        $this->gameId = rand(0,10);
    }

    /**
     * @return int|null
     */
    public function getGameId()
    {
        return $this->gameId;
    }
}
