<?php

use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://mage2-ecommerce';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';
        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function setUp()
    {
        
        parent::setUp();
        //putenv('DB_CONNECTION=sqlite_testing');
        Artisan::call('migrate');
    }

     /**
     * A basic functional test example.
     *
     * @return void
     */
    public function adminUserLogin()
    {
        $this->visit('/admin/login')
                ->type('admin@admin.com','email')
                ->type('admin123','password')
                ->press('Login');

    }
}
