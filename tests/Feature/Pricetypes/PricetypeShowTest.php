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

test('admin can view pricetype show', function ()
{
    $admin = User::find(4);
    Laravel\be($admin)
        ->get(route('pricetypes.show', ['pricetype' => $this->pricetype->id]))
        ->assertViewIs('admin.pricetypes.show')
        ->assertSee($this->pricetype->id)
        ->assertSee($this->pricetype->name)
        ->assertStatus(200);
})->group('pricetypeShow');

test('sales can view pricetype show', function ()
{
    $sales = User::find(3);
    Laravel\be($sales)
        ->get(route('pricetypes.show', ['pricetype' => $this->pricetype->id]))
        ->assertViewIs('admin.pricetypes.show')
        ->assertSee($this->pricetype->id)
        ->assertSee($this->pricetype->name)
        ->assertStatus(200);
})->group('pricetypeShow');

test('buyer can view pricetype show', function ()
{
    $buyer = User::find(2);
    Laravel\be($buyer)
        ->get(route('pricetypes.show', ['pricetype' => $this->pricetype->id]))
        ->assertViewIs('admin.pricetypes.show')
        ->assertSee($this->pricetype->id)
        ->assertSee($this->pricetype->name)
        ->assertStatus(200);
})->group('pricetypeShow');

test('customer can not view pricetype show', function ()
{
    $customer = User::find(1);
    Laravel\be($customer)
        ->get(route('pricetypes.show', ['pricetype' => $this->pricetype->id]))
        ->assertStatus(403);
    //403 = wel ingelogd geen rechten om ergens te komen
})->group('pricetypeShow');

test('guest can not view pricetype show', function ()
{
    $this->get(route('pricetypes.show', ['pricetype' => $this->pricetype->id]))
        ->assertRedirect('login');
})->group('pricetypeShow');
