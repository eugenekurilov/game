<?php

namespace sts\entities;

use sts\enum\Status;

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

    /** @Column(type="datetime", name="created_at", options={"default": "CURRENT_TIMESTAMP"}) */
    private $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->statusId = Status::PROGRESS;
    }

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
