<?php

abstract class TestCase extends Laravel\Lumen\Testing\TestCase
{
    protected $baseUrl = 'http://localhost:8000/api/v1';
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }
    public function setUp()
    {
        parent::setUp();
        $this->app->instance('middleware.disable', true);
    }
}
