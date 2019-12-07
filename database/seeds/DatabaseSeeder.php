<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        echo 'seeding users...', PHP_EOL;

        $user= User::create(
            [
                'name' => 'Mr. admin',
                'email' => 'admin@yahoo.com',
                'password' => bcrypt('admin'),
                'remember_token' => null,
            ]
        );
        echo 'Create Roles...', PHP_EOL;
        Role::create(['name' => 'former']);
        Role::create(['name' => 'learner']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'user']);

        echo 'seeding Role User...', PHP_EOL;
        $user->assignRole('admin');
        $role = $user->assignRole('admin');
        $role->givepermissionTo(Permission::all());
    }
}
