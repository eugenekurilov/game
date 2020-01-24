<?php
namespace sts;

/**
 * Class Api
 * @package sts
 */
class Api
{
    public function games(?array $data)
    {
        return json_encode([1, 2, 3, 4]);
    }

    public function step(?array $data)
    {

    }

    public function status(?array $data)
    {

    }

    /**
     * @param array|null $data
     * @return false|string|void
     */
    public function create(?array $data)
    {
        if (is_null($data)
            || !isset($data['first_user_id'])
            || !isset($data['second_user_id'])

        ) {
            return;
        }

        $data['game_id'] = (new Game(
            $data['first_user_id'],
            $data['second_user_id']
        ))->getGameId();

        return json_encode($data);
    }
}
