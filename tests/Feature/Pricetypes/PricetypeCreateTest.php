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

test('customer can not view pricetype create', function () {
    $customer = User::find(1);
    Laravel\be($customer)
        ->get(route('pricetypes.create'))
        ->assertStatus(403);
})->group('pricetypeCreate');

test('guest can not view pricetype create', function () {
    $this->get(route('pricetypes.create'))
        ->assertStatus(302); //redirect werkte niet?
})->group('pricetypeCreate');

test('Admin can view pricetype create', function () {
    $admin = User::find(4);
    Laravel\be($admin)
        ->get(route('pricetypes.create'))
        ->assertViewIs('admin.pricetypes.create')
        ->assertStatus(200);
})->group('pricetypeCreate');

test('Sales can view pricetype create', function () {
    $sales = User::find(3);
    Laravel\be($sales)
        ->get(route('pricetypes.create'))
        ->assertViewIs('admin.pricetypes.create')
        ->assertStatus(200);
})->group('pricetypeCreate');

test('Buyer(inkoop) can view pricetype create', function () {
    $buyer = User::find(2);
    Laravel\be($buyer)
        ->get(route('pricetypes.create'))
        ->assertViewIs('admin.pricetypes.create')
        ->assertStatus(200);
})->group('pricetypeCreate');
