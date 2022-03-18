<?php

use App\Models\User;
use \Pest\Laravel;

beforeEach(function (){
    $this->seed('RoleAndPermissionSeeder');
    $this->seed('UserSeeder');
    $this->user = User::factory()->create();
});

test('admin can see the project index page', function () {
    $this->withoutExceptionHandling();
    $admin = User::find(4);
    Laravel\be($admin)
        ->get(route('users.index'))
        ->assertViewIs('admin.users.index')
        ->assertSee($this->user->id)
        ->assertSee($this->user->name)
        ->assertSee($this->user->email)
        ->assertSee($this->user->role_id)
        ->assertStatus(200);
})->group('UserIndex');

test('customer can not see the project index page', function () {
   // $this->withoutExceptionHandling();
    $customer = User::find(1);
    Laravel\be($customer)
        ->get(route('users.index'))
        ->assertStatus(403);
})->group('UserIndex');

test('buyer can not see the project index page', function () {
    // $this->withoutExceptionHandling();
    $buyer = User::find(2);
    Laravel\be($buyer)
        ->get(route('users.index'))
        ->assertStatus(403);
})->group('UserIndex');

test('sales can not see the project index page', function () {
    // $this->withoutExceptionHandling();
    $sales = User::find(3);
    Laravel\be($sales)
        ->get(route('users.index'))
        ->assertStatus(403);
})->group('UserIndex');



