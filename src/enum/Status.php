<?php
namespace sts\enum;

class Status extends Enum
{
    const PROGRESS = 0;
    const WON = 2;
    const DRAW = 3;
    const CANCEL = 4;

    public static $NAMES = [
        self::PROGRESS => 'В процессе',
        self::WON => 'Победа',
        self::DRAW => 'Ничья',
        self::CANCEL => 'Отмена',
    ];
}

