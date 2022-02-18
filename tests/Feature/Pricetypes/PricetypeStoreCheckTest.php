<?php

use App\Models\Pricetype;
use App\Models\User;
use \Pest\Laravel;

beforeEach(function ()
{
    $this->seed('RoleAndPermissionSeeder');
    $this->seed('UserSeeder');
});

test('pricetype name cant be longer than 45 characters', function ()
{
    $this->withoutExceptionHandling();
   $pricetype = Pricetype::factory()->make(['name' => 'Pneumonoultramicroscopicsilicovolcanoconiosis11']);

    $admin = User::find(4);
    Laravel\be($admin)
        ->postJson(route('pricetypes.store'), $pricetype->toArray())
       ->assertStatus(302);
})->group('pricetypeStoreCheck');
