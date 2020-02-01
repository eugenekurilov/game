<?php
namespace sts\enum;

class Enum
{
    public static $NAMES = [];

    /**
     * @param $id
     * @return mixed
     */
    public static function getNameById($id)
    {
        if (isset(static::$NAMES[$id])) {
            return static::$NAMES[$id];
        }
    }

    public static function getListNames()
    {
        return static::$NAMES;
    }
}