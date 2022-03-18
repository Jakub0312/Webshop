<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProductTest extends DuskTestCase
{
    //use DatabaseMigrations;
    //protected static $migrationRun = false;
//    public function setUp() : Void
//    {
//        parent::setUp();
//
//        if(!static::$migrationRun){
//            $this->artisan('migrate:refresh');
//            $this->artisan('db:seed');
//            static::$migrationRun = true;
//        }
//    }

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testproductindex()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                ->type('email', 'admin@webshop.nl')
                ->type('password', 'test1234')
                ->click('button[type="submit"]')
                ->assertSee('Welcome back Admin')
                ->visit('/admin')
                ->clickLink('Products')
                ->assertSee('Overzicht products')
                ->assertSee('1')
                ->visit('/logout');
        });
    }

    public function testproductshow()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'admin@webshop.nl')
                ->type('password', 'test1234')
                ->click('button[type="submit"]')
                ->assertSee('Welcome back Admin')
                ->visit('/admin')
                ->clickLink('Products')
                ->assertSee('Overzicht products')
                ->clickLink('Details')
                ->assertSee('Show products')
                ->visit('/logout');
        });
    }

    public function testproductcreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->maximize();
            $browser->visit('/login')
                ->type('email', 'admin@webshop.nl')
                ->type('password', 'test1234')
                ->click('button[type="submit"]')
                ->assertSee('Welcome back Admin')
                ->visit('/admin')
                ->clickLink('Products')
                ->assertSee('Overzicht products')
                ->clickLink('Toevoegen')
                ->assertSee('Toevoegen products')
                ->type('name', 'RTX 2070')
                ->type('description', 'card go brrr')
                ->type('specifications', 'fast card yes')
                ->select('productstate_id', '1')
                ->type('stock', '64')
                ->type('price', '750')
                ->select('category_id', '1')
                ->click('button[type="submit"]')
                ->assertSee('Product succesvol aangemaakt!')
                ->visit('/logout');
        });
    }

    public function testproductedit()
    {
        $this->browse(function (Browser $browser) {
            $browser->maximize();
            $browser->visit('/login')
                ->type('email', 'admin@webshop.nl')
                ->type('password', 'test1234')
                ->click('button[type="submit"]')
                ->assertSee('Welcome back Admin')
                ->visit('/admin')
                ->clickLink('Products')
                ->assertSee('Overzicht products')
                //hier id pakken en edit selecteren
                ->clickLink('Edit')
                //Op de edit pagina gekomen:
                ->assertSee('Edit product')
                ->type('name', 'AMD Ryzen 3600')
                ->type('description', 'CPU go brrr')
                ->type('specifications', 'fast cpu yes')
                ->select('productstate_id', '3')
                ->type('stock', '23')
                ->type('price', '300')
                ->select('category_id', '3')
                ->click('button[type="submit"]')
                ->assertSee('Product succesvol geupdate')
                ->visit('/logout');
        });
    }

    public function testproductdelete()
    {
        $this->browse(function (Browser $browser) {
            $browser->maximize();
            $browser->visit('/login')
                ->type('email', 'admin@webshop.nl')
                ->type('password', 'test1234')
                ->click('button[type="submit"]')
                ->assertSee('Welcome back Admin')
                ->visit('/admin')
                ->clickLink('Products')
                ->assertSee('Overzicht products')
                //hier id pakken en delete selecteren
                ->clickLink('Delete')
                //Op de edit pagina gekomen:
                ->assertSee('Verwijderen product')
                ->click('button[type="submit"]')
                ->assertSee('Product succesvol verwijderd')
                ->visit('/logout');
        });
    }
}
