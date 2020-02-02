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
        $isDevMode = true;

        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
            [
                __DIR__. '/sts/entities/'
            ],
            $isDevMode, null,null,false
        );

        $config->addEntityNamespace('', 'sts\entities');

        $dbParams = [
            'driver'   => 'driver',
            'user'     => 'user',
            'password' => 'password',
            'dbname'   => 'dbname',
        ];

        /** @var EntityManager $em */
        $this->em = \Doctrine\ORM\EntityManager::create($dbParams, $config);
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