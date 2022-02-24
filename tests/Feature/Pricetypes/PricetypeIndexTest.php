<?php

use App\Models\Pricetype;
use App\Models\User;
use \Pest\Laravel;

beforeEach(function ()
{
    $this->seed('RoleAndPermissionSeeder');
    $this->seed('UserSeeder');
    $this->pricetype = Pricetype::factory()->create();
});

test('admin can view pricetype index', function ()
{
    $admin = User::find(4);
    Laravel\be($admin)
        ->get(route('pricetypes.index'))
        ->assertViewIs('admin.pricetypes.index')
        ->assertSee($this->pricetype->id)
        ->assertSee($this->pricetype->name)
        ->assertStatus(200);
})->group('pricetypeIndex');

test('sales can view pricetype index', function ()
{
    $sales = User::find(3);
    Laravel\be($sales)
        ->get(route('pricetypes.index'))
        ->assertViewIs('admin.pricetypes.index')
        ->assertSee($this->pricetype->id)
        ->assertSee($this->pricetype->name)
        ->assertStatus(200);
})->group('pricetypeIndex');

test('buyer(inkoop) can view pricetype index', function ()
{
    $buyer = User::find(2);
    Laravel\be($buyer)
        ->get(route('pricetypes.index'))
        ->assertViewIs('admin.pricetypes.index')
        ->assertSee($this->pricetype->id)
        ->assertSee($this->pricetype->name)
        ->assertStatus(200);
})->group('pricetypeIndex');

test('customer can not view pricetype index', function ()
{
    $customer = User::find(1);
    Laravel\be($customer)
        ->get(route('pricetypes.index'))
        ->assertStatus(403);
})->group('pricetype');

test('guest can not view pricetype index', function ()
{
    //$this->withoutExceptionHandling();
    $this->get(route('pricetypes.index'))
        ->assertRedirect('login');
})->group('pricetype');



