<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

/**
 * Created by PhpStorm.
 * User: KEUDEM
 * Date: 14/12/2019
 * Time: 07:35
 */
class Formation extends Seeder
{
    public function run()
    {
        $permissions = [
            'formation-list',
            'formation-create',
            'formation-edit',
            'formation-delete',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}