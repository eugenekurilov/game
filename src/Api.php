<?php
namespace sts;

use Doctrine\ORM\EntityManager;
use sts\enum\Status;
use sts\entities\Games;

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

    /**
     * @param array|null $data
     * @return false|string
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function step(?array $data)
    {
        if (is_null($data)
            || (empty($data['left_user_id']) &&  empty($data['right_user_id']))
            || empty($data['game_id'])
            || (empty($data['ceil_id']) || in_array(!$data['ceil_id'], range(0,8)))
        ) {
            return $this->error('invalid parameters');
        }

        $data['left_user_id'] = 1;
        $data['right_user_id'] = 2;
        $data['game_id'] = 1;
        $data['ceil_id'] = 0;

        /* @var $game Games */
        if (($game = $this->em->find(':Games', $data['game_id'])) != null) {
            $map = $game->getMap();
            if ($data['left_user_id']) {
                $map[$data['ceil_id']] = 'o';
            } elseif ($data['right_user_id']) {
                $map[$data['ceil_id']] = 'x';
            }

            $game->setMap($map);
            $this->checked($game);

            $this->em->persist($game);
            $this->em->flush();
        }
    }

    /**
     * @param array|null $data
     * @return false|string
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function status(?array $data)
    {
        if (is_null($data) || empty($data['game_id'])) {
            return $this->error('invalid parameters');
        }

        /* @var $game Games */
        if (($game = $this->em->find(':Games', $data['game_id'])) != null) {
            return json_encode([
                'status_id' => Status::getNameById($game->getStatusId())
            ]);
        }
    }

    /**
     * @param array|null $data
     * @return false|string|void
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function create(?array $data)
    {
        if (is_null($data)
            || !isset($data['left_user_id'])
            || !isset($data['right_user_id'])

        ) {
            return $this->error('invalid parameters');
        }

        $game = new Games();
        $game->setLeftUserId($data['left_user_id']);
        $game->setRightUserId($data['right_user_id']);
        $this->em->persist($game);
        $this->em->flush();

        $data['game_id'] = $game->getId();

        return json_encode($data);
    }

    /**
     * @param Games $games
     * @return int
     */
    protected function checked(Games $games)
    {
        $map = $games->getMap();

        if (!in_array('-', $map)) {
            return Status::DRAW;
        }

        return $this->isWon($map);
    }

    /**
     * @param $map
     * @return int
     */
    protected function isWon($map)
    {
        if ($map[0] == $map[1] && $map[1] == $map[2]) {
            return Status::WON;
        }
        if ($map[3] == $map[4] && $map[4] == $map[5]) {
            return Status::WON;
        }
        if ($map[6] == $map[7] && $map[7] == $map[8]) {
            return Status::WON;
        }
        if ($map[0] == $map[3] && $map[3] == $map[6]) {
            return Status::WON;
        }
        if ($map[1] == $map[4] && $map[4] == $map[7]) {
            return Status::WON;
        }
        if ($map[2] == $map[5] && $map[5] == $map[8]) {
            return Status::WON;
        }
        if ($map[0] == $map[5] && $map[5] == $map[8]) {
            return Status::WON;
        }
        if ($map[2] == $map[5] && $map[5] == $map[6]) {
            return Status::WON;
        }

        return Status::PROGRESS;
    }

    /**
     * @param $message
     * @return false|string
     */
    protected function error($message)
    {
        return json_encode([
            'error' => $message
        ]);
    }
}
