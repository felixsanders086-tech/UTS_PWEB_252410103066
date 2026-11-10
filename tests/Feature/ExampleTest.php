<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_home_redirects_to_login(): void
    {
        $this->get('/')->assertRedirect('/login');
    }

    public function test_login_page_can_be_opened(): void
    {
        $this->get('/login')->assertOk()->assertSee('JemberExplore');
    }

    public function test_username_is_sent_to_dashboard(): void
    {
        $this->post('/login', ['username' => 'felix'])
            ->assertRedirect('/dashboard?username=felix');
    }

    public function test_dashboard_shows_recommendations(): void
    {
        $this->get('/dashboard?username=felix')
            ->assertOk()
            ->assertSee('Pantai Papuma')
            ->assertSee('felix');
    }

    public function test_search_finds_a_destination_by_name(): void
    {
        $this->get('/pengelolaan?username=felix&q=Papuma')
            ->assertOk()
            ->assertSee('Pantai Papuma')
            ->assertDontSee('Pantai Watu Ulo');
    }

    public function test_profile_shows_username(): void
    {
        $this->get('/profile?username=felix')
            ->assertOk()
            ->assertSee('felix');
    }
}
