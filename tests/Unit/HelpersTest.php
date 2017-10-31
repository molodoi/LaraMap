<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HelpersTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function page_title_return_base_title_isempty()
    {        
        $this->assertEquals('Laramap', page_title(''));
    }

    /**
     * @test
     *
     * @return void
     */
    public function page_title_return_base_title_notempty()
    {        
        $this->assertEquals('Bienvenue sur Laramap', page_title('Bienvenue sur'));
        $this->assertEquals('A propos de Laramap', page_title('A propos de'));
        $this->assertEquals('Contactez Laramap', page_title('Contactez'));
    }

    /**
     * @test
     *
     * @return void
     */
    public function set_active_route_return_active_class()
    {        
        $this->get(route('home'));
        $this->assertEquals('active', set_active_route('home'));
        $this->assertEquals('', set_active_route('about'));
        $this->assertEquals('', set_active_route('contact'));
    }
}
