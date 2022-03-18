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

test('admin can view pricetype delete', function ()
{
    $admin = User::find(4);
    Laravel\be($admin)
        ->get(route('pricetypes.delete', ['pricetype' => $this->pricetype->id]))
        ->assertViewIs('admin.pricetypes.delete')
        ->assertSee($this->pricetype->id)
        ->assertSee($this->pricetype->name)
        ->assertStatus(200);
})->group('pricetypeDelete');

test('buyer cannot view pricetype delete', function ()
{
    $buyer = User::find(2);
    Laravel\be($buyer)
        ->get(route('pricetypes.delete', ['pricetype' => $this->pricetype->id]))
        ->assertStatus(403);
})->group('pricetypeDelete');

test('sales cannot view pricetype delete', function ()
{
    $sales = User::find(3);
    Laravel\be($sales)
        ->get(route('pricetypes.delete', ['pricetype' => $this->pricetype->id]))
        ->assertStatus(403);
})->group('pricetypeDelete');

test('customer can not view pricetype delete', function ()
{
    $customer = User::find(1);
    Laravel\be($customer)
        ->get(route('pricetypes.delete', ['pricetype' => $this->pricetype->id]))
        ->assertStatus(403);
})->group('pricetypeDelete');

test('guest can not view pricetype delete', function ()
{
    //$this->withoutExceptionHandling();
    $this->get(route('pricetypes.delete' , ['pricetype' => $this->pricetype->id]))
        ->assertRedirect('login');
})->group('pricetypeDelete');
