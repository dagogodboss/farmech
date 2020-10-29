<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'title' => 'buyer',
                'description' => 'user that buys the commodity'
            ],
            [
                'title' => 'seller',
                'description' => 'user that sells the commodity'
            ]
        ]);

        DB::table('permissions')->insert([
            [
                'title' => 'upload_image',
                'description' => 'UPLOAD IMAGES OF PRODUCT'
            ],
            [
                'title' => 'add_product',
                'description' => 'ADD NEW PRODUCT'
            ],
            [
                'title' => 'buy_product',
                'description' => 'CAN BUY PRODUCTS'
            ],
            [
                'title' => 'view_product',
                'description' => 'VIEW PRODUCTS'
            ],
        ]);

        DB::table('role_permissions')->insert([
            [
                'role_id' => 2,
                'permission_id' => 1
            ],
            [
                'role_id' => 2,
                'permission_id' => 2
            ],
            [
                'role_id' => 2,
                'permission_id' => 3
            ],
            [
                'role_id' => 2,
                'permission_id' => 4
            ],
            [
                'role_id' => 1,
                'permission_id' => 3
            ],
            [
                'role_id' => 1,
                'permission_id' => 4
            ],
        ]);
    }
}
