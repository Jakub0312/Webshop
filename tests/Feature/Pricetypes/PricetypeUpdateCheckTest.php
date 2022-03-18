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

test('pricetype name cant be longer than 45 characters', function ()
{
    //$this->withoutExceptionHandling();
    $pricetype = Pricetype::find(1)->make(['name' => 'Pneumonoultramicroscopicsilicovolcanoconiosis11']);

    $admin = User::find(4);
    Laravel\be($admin)
        ->patchJson(route('pricetypes.update', ['pricetype' => 1]), $pricetype->toArray())
        ->assertStatus(422);
})->group('pricetypeUpdateCheck');

test('pricetype requires a name', function ()
{
    //$this->withoutExceptionHandling();
    $pricetype = Pricetype::find(1)->make(['name' => null]);

    $admin = User::find(4);
    Laravel\be($admin)
        ->patchJson(route('pricetypes.update', ['pricetype' => 1]), $pricetype->toArray())
        ->assertStatus(422);
})->group('pricetypeUpdateCheck');

//test('pricetype name must be unique', function ()
//{
//    //$this->withoutExceptionHandling();
//    $pricetype = Pricetype::factory()->create();
//    $pricetype1 = Pricetype::find(2)->make(['name' => $pricetype->name]);
//
//    $admin = User::find(4);
//    Laravel\be($admin)
//        ->patchJson(route('pricetypes.update', ['pricetype' => 2]), $pricetype1->toArray())
//        ->assertStatus(422);
//})->group('pricetypeUpdateCheck');
