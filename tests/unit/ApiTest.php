<?php

class ApiTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $em;

    protected function _before()
    {
        $this->em = \sts\DbManager::getInstance(
            require(__DIR__ . '/../../configs/config-test.php')
        );
    }

    protected function _after()
    {
    }

    public function testCreate()
    {
        $result = (new \sts\Api($this->em))->create([
            'left_user_id' => 1,
            'right_user_id' => 2,

        ]);

        $this->assertArrayHasKey('game_id', json_decode($result, true));
    }

    public function testStep()
    {
        $result = (new \sts\Api($this->em))->create([
            'left_user_id' => 1,
            'right_user_id' => 2,

        ]);

        $result = json_decode($result, true);

        $result = (new \sts\Api($this->em))->step([
            'left_user_id' => 1,
            'ceil_id' => 3,
            'game_id' => $result['game_id']
        ]);

        $result = json_decode($result, true);

        $this->assertArrayHasKey('error', $result);
    }

    public function testStatus()
    {
        $result = (new \sts\Api($this->em))->create([
            'left_user_id' => 1,
            'right_user_id' => 2,

        ]);

        $result = json_decode($result, true);

        $this->assertEquals(\sts\enum\Status::PROGRESS, $result['status_id']);
    }
}