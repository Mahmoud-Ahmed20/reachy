<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Ahmed',
            'second_name' => 'Mohammed',
            'email' => 'shady@shady.com',
            'password' => bcrypt('shady'),
            'gendar' => 'male',
            'birthday' => '1992/02/02',
            'avatar' => 'default-pp.png',
            'country_id' => '1',
            'city_id' => '1',
            'phone_number' => '011',
            'sec_phone_number' => '11235',
        ]);

        $role = Role::create(['name' => 'Super-admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}