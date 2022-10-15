<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    public function testView()
    {
        $this->get('/hello')
            ->assertSeeText('Hello Rausyan');

        $this->get('/hello-again')
            ->assertSeeText('Hello Rausyan');
    }

    public function testNested()
    {
        $this->get('/hello-world')
            ->assertSeeText('World Rausyan');
    }

    public function testTemplate()
    {
        $this->view('hello', ['name' => 'Rausyan'])
            ->assertSeeText('Hello Rausyan');

        $this->view('hello.world', ['name' => 'Rausyan'])
            ->assertSeeText('World Rausyan');
    }


}
