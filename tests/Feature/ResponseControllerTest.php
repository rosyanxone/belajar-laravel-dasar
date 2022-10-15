<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    public function testResponse()
    {
        $this->get('/response/hello')
            ->assertStatus(200)
            ->assertSeeText('hello response');
    }

    public function testHeader()
    {
        $this->get('/response/header')
            ->assertStatus(200)
            ->assertSeeText('Rausyanfikr')->assertSeeText('Karmayoga')
            ->assertHeader('Content-Type', 'application/json')
            ->assertHeader('Author', 'rosyanxone')
            ->assertHeader('App', 'Belajar Laravel');
    }

    public function testView()
    {
        $this->get('/response/type/view')
            ->assertSeeText("Hello Rausyan");
    }

    public function testJson()
    {
        $this->get('/response/type/json')
            ->assertJson([
                "firstName" => 'Rausyanfikr',
                "lastName" => "Karmayoga"
            ]);
    }

    public function testFile()
    {
        $this->get('/response/type/file')
            ->assertHeader('Content-Type', 'text/html; charset=UTF-8');
    }

    public function testDownload()
    {
        $this->get('/response/type/download')
            ->assertDownload('rausyanfikr.png');
    }


}
