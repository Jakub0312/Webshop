<?php

use App\Models\User;
use \Pest\Laravel;

beforeEach(function (){
    $this->seed('RoleAndPermissionSeeder');
    $this->seed('UserSeeder');
    $this->user = User::factory()->create();
});

test('admin can see the User create page', function() {
    $this->withoutExceptionHandling();
    $admin = User::find(4);
    Laravel\be($admin)
        ->get(route('users.create'))
        ->assertViewIs('admin.users.create')
        ->assertStatus(200);
})->group('UserCreate');

test('sales can see the User create page', function() {
    //$this->withoutExceptionHandling();
    $sales = User::find(3);
    Laravel\be($sales)
        ->get(route('users.create'))
        ->assertStatus(403);
})->group('UserCreate');

test('buyer can not see the User create page', function() {
    //$this->withoutExceptionHandling();
    $buyer = User::find(2);
    Laravel\be($buyer)
        ->get(route('users.create'))
        ->assertStatus(403);
})->group('UserCreate');

test('customer can  not see the User create page', function() {
    //$this->withoutExceptionHandling();
    $customer = User::find(1);
    Laravel\be($customer)
        ->get(route('users.create'))
        ->assertStatus(403);
})->group('UserCreate');




