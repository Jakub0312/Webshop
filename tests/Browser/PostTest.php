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
                ->visit('/admin/reviews')
                ->assertSee('Reviews')
                ->visit('/admin/reviews/create')
                ->type('title', 'Title')
                ->type('review', 'Review')
                ->click('button[type="submit"]')
                ->assertSee('Review succesfully added')
                ->visit('/admin/reviews/1')
                ->assertSee('Details reviews')
                ->visit('/admin/reviews')
                ->assertSee('Overview Reviews')
                ->visit('/admin/reviews/11/delete')
                ->assertSee('Verwijderen user')
                ->click('button[type="submit"]')
                ->assertSee('Overview Reviews');
        });
    }
}
