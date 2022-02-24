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

test('customer can not view edit page', function ()
{
    $customer = User::find(1);
    Laravel\be($customer)
        ->get(route('pricetypes.edit', ['pricetype' => $this->pricetype->id]))
        ->assertForbidden();
})->group('pricetypeEdit');

test('guest can not view edit page', function ()
{
        $this->get(route('pricetypes.edit', ['pricetype' => $this->pricetype->id]))
        ->assertRedirect('login');
})->group('pricetypeEdit');

test('admin can view edit page', function ()
{
    $admin = User::find(4);
    Laravel\be($admin)
        ->get(route('pricetypes.edit', ['pricetype' => $this->pricetype->id]))
        ->assertViewIs('admin.pricetypes.edit')
        ->assertSee($this->pricetype->id)
        ->assertSee($this->pricetype->name)
        ->assertStatus(200);
})->group('pricetypeEdit');

test('sales can view edit page', function ()
{
    $sales = User::find(3);
    Laravel\be($sales)
        ->get(route('pricetypes.edit', ['pricetype' => $this->pricetype->id]))
        ->assertViewIs('admin.pricetypes.edit')
        ->assertSee($this->pricetype->id)
        ->assertSee($this->pricetype->name)
        ->assertStatus(200);
})->group('pricetypeEdit');

test('buyer can view edit page', function ()
{
    $buyer = User::find(2);
    Laravel\be($buyer)
        ->get(route('pricetypes.edit', ['pricetype' => $this->pricetype->id]))
        ->assertViewIs('admin.pricetypes.edit')
        ->assertSee($this->pricetype->id)
        ->assertSee($this->pricetype->name)
        ->assertStatus(200);
})->group('pricetypeEdit');
