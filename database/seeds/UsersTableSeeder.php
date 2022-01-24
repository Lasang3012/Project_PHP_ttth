<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();

        $adminRoles = Roles::where('name','admin')->first();
        $authorRoles = Roles::where('name','author')->first();
        $userRoles = Roles::where('name','user')->first();

        $admin = Admin::create([
			'admin_name' => 'Sang Admin',
			'admin_email' => 'sangadmin@gmail.com',
			'admin_phone' => '0123456789',
			'admin_password' => md5('123')
        ]);
        $author = Admin::create([
			'admin_name' => 'Sang Author',
			'admin_email' => 'sangauthor@gmail.com',
			'admin_phone' => '0123456789',
			'admin_password' => md5('123')
        ]);
        $user = Admin::create([
			'admin_name' => 'Sang User',
			'admin_email' => 'sanguser@gmail.com',
			'admin_phone' => '0123456789',
			'admin_password' => md5('123')
        ]);

        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);
    }
}
