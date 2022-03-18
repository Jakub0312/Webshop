<?php

use App\Models\User;
use \Pest\Laravel;

beforeEach(function (){
    $this->seed('RoleAndPermissionSeeder');
    $this->seed('UserSeeder');
    $this->user = User::factory()->create();
});

test('customer can not create an user in the admin', function(){
    $customer = User::find(1);
    Laravel\be($customer)
        ->postJson(route('users.store'))
        ->assertForbidden();
})->group('UserStore');

test('buyer can not create an user in the admin', function(){
    $buyer = User::find(2);
    Laravel\be($buyer)
        ->postJson(route('users.store'))
        ->assertForbidden();
})->group('UserStore');

test('admin can create an  user in the admin', function(){
    $admin = User::find(4);
    $user = User::factory()->make();


    Laravel\be($admin)
        ->postJson(route('users.store'), $user->toArray())
        ->assertRedirect(route('users.index'));

    $this->assertDatabaseHas('users',[
        'name' => $user->name,
    ]);
})->group('UserStore');
