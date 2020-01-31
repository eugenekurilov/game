<?php
namespace sts;

use sts\entities\Games;
use Doctrine\ORM\EntityManager;

/**
 * Class Api
 * @package sts
 */
class Api
{
    /** @var EntityManager|null  */
    private $em = null;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

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
            || !isset($data['left_user_id'])
            || !isset($data['right_user_id'])

        ) {
            return;
        }

        $game = new Games();
        $game->setLeftUserId(1);
        $game->setRightUserId(2);
        $this->em->persist($game);
        $this->em->flush();

        $data['game_id'] = $game->getId();

        return json_encode($data);
    }
}
