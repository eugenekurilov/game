<?php

namespace sts\entities;

use sts\enum\Status;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;

/** @Entity */
class Games
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    /** @Column(type="integer") */
    private $leftUserId = null;
    /** @Column(type="integer") */
    private $rightUserId = null;
    /** @Column(type="boolean") */
    private $statusId;
    /** @Column(type="json_array") */
    private $map;
    /** @Column(type="datetime", name="created_at", options={"default": "CURRENT_TIMESTAMP"}) */
    private $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->statusId = Status::PROGRESS;
        $this->map = [
            '-', '-', '-',
            '-', '-', '-',
            '-', '-', '-',
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
     * @return int
     */
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     */
    public function getCreatedAt()
    {
        $this->createdAt;
    }

    /**
     *
     */
    public function getRightUserId()
    {
        $this->rightUserId;
    }

    /**
     *
     */
    public function getLeftUserId()
    {
        $this->leftUserId;
    }

    /**
     * @param array $map
     */
    public function setMap(array $map)
    {
        $this->map = $map;
    }

    /**
     * @param int $userId
     */
    public function setLeftUserId(int $userId)
    {
        $this->leftUserId = $userId;
    }

    /**
     * @param int $userId
     */
    public function setRightUserId(int $userId)
    {
        $this->rightUserId = $userId;
    }

}
