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

test('customer can not destroy pricetype', function (){
    $customer = User::find(1);
    Laravel\be($customer);
    $this->json('DELETE', route('pricetypes.destroy', ['pricetype' => $this->pricetype->id]))
    ->assertForbidden();
})->group('pricetypeDestroy');

test('sales can not destroy pricetype', function (){
    $sales = User::find(3);
    Laravel\be($sales);
    $this->json('DELETE', route('pricetypes.destroy', ['pricetype' => $this->pricetype->id]))
        ->assertForbidden();
})->group('pricetypeDestroy');


test('buyer can not destroy pricetype', function (){
    $buyer = User::find(2);
    Laravel\be($buyer);
    $this->json('DELETE', route('pricetypes.destroy', ['pricetype' => $this->pricetype->id]))
        ->assertForbidden();
})->group('pricetypeDestroy');

test('guest can not destroy pricetype', function (){
    $this->json('DELETE', route('pricetypes.destroy', ['pricetype' => $this->pricetype->id]))
        ->assertStatus(401);
})->group('pricetypeDestroy');

test('admin can destroy pricetype', function () {
    $admin = User::find(4);
    Laravel\be($admin);
    $this->json('DELETE', route('pricetypes.destroy', ['pricetype' => $this->pricetype->id]));
    $this->assertDatabaseMissing('pricetypes', ['id' => $this->pricetype->id]);
});
