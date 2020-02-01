<?php

namespace sts;

/**
 * Class Game
 * @package sts
 */
class Game
{
    protected $leftUserId = null;
    protected $rightUserId = null;
    protected $gameId = null;

    /**
     * Game constructor.
     * @param int $leftUserId
     * @param int $rightUserId
     */
    public function __construct(int $leftUserId, int $rightUserId)
    {
        $this->leftUserId = $leftUserId;
        $this->rightUserId = $rightUserId;
    }

    /**
     * @return int|null
     */
    public function getGameId()
    {
        return $this->gameId;
    }
}
