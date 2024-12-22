<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    
    public function run(): void
    {
     
        $roles = [
            [
                'name' => 'admin',
            ]
        ];

        Role::insert($roles);
    }
}

