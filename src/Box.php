<?php
namespace sts;

/**
 * Class Box
 * @package sts
 */
class Box
{
    protected $userId = null;
    protected $value = null;

    /**
     * Box constructor.
     * @param int $userId
     * @param int $value
     */
    public function __construct(int $userId, int $value)
    {
        $this->userId = $userId;
        $this->value = $value;
    }
}