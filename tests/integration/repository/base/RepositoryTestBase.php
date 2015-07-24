<?php
/**
 * Created by IntelliJ IDEA.
 * User: christian
 * Date: 24/07/15
 * Time: 15:46
 */
namespace tests\integration\repository\base;

trait RepositoryTestBase
{
    private $TESTING_ENVIRONMENT = "testing";

    protected function setUp()
    {
        $this->runMigrations();
        $sut = $this->createSut();
        $sut->setEnvironment($this->TESTING_ENVIRONMENT);
        $sut->startTransaction();
        //$sut->truncateDb();
        $this->sut = $sut;
    }

    protected function tearDown()
    {
        $this->sut->rollbackTransaction();
    }

    protected function runMigrations()
    {
        ini_set('include_path', get_include_path() . PATH_SEPARATOR . '/home/christian/workspace/php-dexeus-seed/');
        $app = require __DIR__ . '/../../../../vendor/robmorgan/phinx/app/phinx.php';
        $_SERVER['argv'] = ["php", "migrate", "-e", $this->TESTING_ENVIRONMENT];
        $app->setAutoExit(false);
        $app->run();
    }

    /**
     * @return RepositoryBase
     */
    protected abstract function createSut();
}