<?php

namespace Database\Seeders;

use App\Constants\RoleNameConstants;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Throwable;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminsTableSeeder::class,
        ]);
    }
}
