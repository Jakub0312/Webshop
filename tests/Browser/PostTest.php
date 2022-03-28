<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PostTest extends DuskTestCase
{
    public function testExample()
    {

        $this->browse(function (Browser $browser) {
            $browser->maximize();
            $browser->visit('/login')
                ->type('email', 'admin@webshop.nl')
                ->type('password', 'test1234')
                ->click('button[type="submit"]')
                ->assertSee('Welcome back')
                ->visit('/admin')
                ->assertSee('Admin')
                ->clickLink('Reviews')
                ->assertSee('Reviews')
                ->clickLink('Toevoegen')
                ->type('title', 'Title')
                ->type('review', 'Review')
                ->click('button[type="submit"]')
                ->assertSee('Review succesfully added')
                ->clickLink('Details')
                ->assertSee('Details reviews')
                ->clickLink('Overview')
                ->assertSee('Overview Reviews')
                ->clickLink('Delete')
                ->assertSee('Verwijderen user')
                ->click('button[type="submit"]')
                ->assertSee('Overview Reviews');
        });
    }
}
