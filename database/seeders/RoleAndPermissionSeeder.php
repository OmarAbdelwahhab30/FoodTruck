<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $allRoles = Role::all()->keyBy('id');

        $permissions = [

            // Customer Permissions
            'add-contactus'             => [Role::ROLE_CUSTOMER],
            'return-customer-orders'    => [Role::ROLE_CUSTOMER],
            'add-truck-review'          => [Role::ROLE_CUSTOMER],
            'add-order'                 => [Role::ROLE_CUSTOMER],
            'bookings-manage'           => [Role::ROLE_CUSTOMER],
            'get-truck-review-by-id'    => [Role::ROLE_CUSTOMER],
            'get-all-trucks'            => [Role::ROLE_CUSTOMER],
            'get-truck-by-id'           => [Role::ROLE_CUSTOMER],
            'find-nearest-trucks'       => [Role::ROLE_CUSTOMER],



            // Seller Permissions
            'add-product'               => [Role::ROLE_SELLER],
            'delete-product'            => [Role::ROLE_SELLER],
            'update-product'            => [Role::ROLE_SELLER],
            'add-section'              => [Role::ROLE_SELLER],
            'update-section'           => [Role::ROLE_SELLER],
            'accept-order'              => [Role::ROLE_SELLER],
            'reject-order'              => [Role::ROLE_SELLER],
            'order-delivered'           => [Role::ROLE_SELLER],
            'order-pickedUp'            => [Role::ROLE_SELLER],
            'add-customer-review'       => [Role::ROLE_SELLER],
            'change-delivery-status'    => [Role::ROLE_SELLER],
            'delete-truck-image'        => [Role::ROLE_SELLER],
            'update-truck-info'         => [Role::ROLE_SELLER],
            'get-order-by-id'           => [Role::ROLE_SELLER],

            // Seller and Customer Permissions
            'update-account-information'=> [Role::ROLE_SELLER , Role::ROLE_CUSTOMER],
            'change-password'           => [Role::ROLE_SELLER , Role::ROLE_CUSTOMER],
            'get-profile-reviews'       => [Role::ROLE_SELLER , Role::ROLE_CUSTOMER],
            'send-message'              => [Role::ROLE_SELLER , Role::ROLE_CUSTOMER],
            'load-latest-message'       => [Role::ROLE_SELLER , Role::ROLE_CUSTOMER],
            'get-truck-sections'        => [Role::ROLE_SELLER , Role::ROLE_CUSTOMER],
            'get-sections-products'     => [Role::ROLE_SELLER , Role::ROLE_CUSTOMER],
            'get-truck-products'        => [Role::ROLE_SELLER , Role::ROLE_CUSTOMER],
            'enter-location'            => [Role::ROLE_SELLER , Role::ROLE_CUSTOMER],
        ];


        foreach ($permissions as $key => $roles) {
            $permission = Permission::create(['name' => $key]);
            foreach ($roles as $role) {
                $allRoles[$role]->permissions()->attach($permission->id);
            }
        }
    }
}
