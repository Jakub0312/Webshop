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

test('customer can not update pricetype', function ()
{
    $customer = User::find(1);
    $pricetype = Pricetype::find(1);
    Laravel\be($customer)
        ->patchJson(route('pricetypes.update', ['pricetype' => $this->pricetype->id]),
        $pricetype->toArray())
        ->assertForbidden();
})->group('pricetypeUpdate');

test('guest can not update pricetype', function ()
{
    $pricetype = Pricetype::find(1);
        $this->patchJson(route('pricetypes.update', ['pricetype' => $this->pricetype->id]),
            $pricetype->toArray())
        ->assertStatus(401);
})->group('pricetypeUpdate');

test('admin can update pricetype', function ()
{
    $admin = User::find(4);
    $pricetype = Pricetype::find(1);
    Laravel\be($admin)
        ->patchJson(route('pricetypes.update', ['pricetype' => $this->pricetype->id]),
            ['name' => 'pricetype name']);

    $this->pricetype = $this->pricetype->fresh();

    $this->get(route('pricetypes.index'))
        ->assertSee('pricetype name');

    $this->get(route('pricetypes.index'))
        ->assertSee($this->pricetype->name);
})->group('pricetypeUpdate');

test('sales can update pricetype', function ()
{
    $sales = User::find(3);
    $pricetype = Pricetype::find(1);
    Laravel\be($sales)
        ->patchJson(route('pricetypes.update', ['pricetype' => $this->pricetype->id]),
            ['name' => 'pricetype name']);

    $this->pricetype = $this->pricetype->fresh();

    $this->get(route('pricetypes.index'))
        ->assertSee('pricetype name');

    $this->get(route('pricetypes.index'))
        ->assertSee($this->pricetype->name);
})->group('pricetypeUpdate');

test('buyer can update pricetype', function ()
{
    $buyer = User::find(2);
    $pricetype = Pricetype::find(1);
    Laravel\be($buyer)
        ->patchJson(route('pricetypes.update', ['pricetype' => $this->pricetype->id]),
            ['name' => 'pricetype name']);

    $this->pricetype = $this->pricetype->fresh();

    $this->get(route('pricetypes.index'))
        ->assertSee('pricetype name');

    $this->get(route('pricetypes.index'))
        ->assertSee($this->pricetype->name);
})->group('pricetypeUpdate');
