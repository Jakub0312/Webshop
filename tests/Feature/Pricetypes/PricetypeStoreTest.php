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

test('guest can not create a pricetype in the admin', function ()
{
  $this->postJson(route('pricetypes.store'))
    ->assertStatus(403); //403 inplaats van 401 want redirect ofzo
})->group('pricetypeStore');

test('customer can not create a pricetype in the admin', function ()
{
    //$this->withoutExceptionHandling(); als deze aangaat faalt de test??
    $customer = User::find(1);
    Laravel\be($customer)
        ->postJson(route('pricetypes.store'))
        ->assertStatus(403);
})->group('pricetypeStore');

test('admin can create a pricetype in the admin', function () {
    $this->withoutExceptionHandling();
    $admin = User::find(4);
    $pricetype = Pricetype::factory()->make();

    Laravel\be($admin)
        ->postJson(route('pricetypes.store'), $pricetype->toArray())
        ->assertRedirect(route('pricetypes.index'));

    $this->assertDatabaseHas('pricetypes',[
        'name' => $pricetype->name
    ]);
})->group('pricetypeStore');
