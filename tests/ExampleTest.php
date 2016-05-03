<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\Client;

class ExampleTest extends TestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testDB() {
        //Testing Database
        $this->seeInDatabase('users', ['username' => 'admin']);
    }

    public function testURL() {
        //Testing routing
        $this->visit('/')
                ->see('Sign in');
    }

    public function testIndex() {
        //Testing index
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->status());
    }
    
    public function testWarning() {
        //Testing add Warning page
        $response = $this->call('GET', '/addwarnings');

        $this->assertEquals(200, $response->status());
    }
    
    public function testViewWarnings() {
        //Testing view Warnings page
        $response = $this->call('GET', '/viewwarnings');

        $this->assertEquals(200, $response->status());
    }

}
