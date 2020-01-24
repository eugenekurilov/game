<?php
namespace sts;

/**
 * Class Field
 * @package sts
 */
class Field
{
    protected $map = [];

    /**
     * Field constructor.
     */
    public function __construct()
    {
        $this->map = [
            null, null, null,
            null, null, null,
            null, null, null,
        ];
    }

    /**
     * @return array
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * @param int $index
     * @param Box $box
     */
    public function setByIndex(int $index, Box $box)
    {
        $this->map[$index] = $box;
    }

    public function getByIndex(int $index)
    {
        return $this->map[$index];
    }
}