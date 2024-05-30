<?php

namespace Database\Seeders;

use App\Models\Admin;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Throwable;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $user = Admin::where('email' , 'wasla@owner.com')->first();
        if (!$user){
            try {
                DB::transaction(static function() {
                    Admin::firstOrCreate([
                        'id' => 2,
                        'name' => 'Owner',
                        'username' => 'owner',
                        'email' => 'wasla@owner.com',
                        'phone' => '+201220566300',
                        'password' => 12345678,
                        'is_primary' => 1
                    ]);
                });
            }catch (Exception $e) {
                echo $e->getMessage();
            } catch (Throwable $e) {
                echo $e->getMessage();
            }
        }
    }
}
