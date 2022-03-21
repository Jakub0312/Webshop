<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthTest extends DuskTestCase
{
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('name', 'User')
                ->type('email', 'user@user.com')
                ->type('password', 'password')
                ->type('password_confirmation', 'password')
                ->click('button[type="submit"]')
                ->assertSee('Welcome back')
                ->visit('/logout')
                ->assertSee('Products');
        });
    }

    public function testExample2()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'user@user.com')
                ->type('password', 'password')
                ->click('button[type="submit"]')
                ->assertSee('Welcome back');
        });
    }
}
