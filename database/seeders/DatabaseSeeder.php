<?php

namespace Database\Seeders;

use App\Models\Period;
use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TeamSeeder::class);
        $teams = Team::all();
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => '',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'mobile_number' => '',
            'shirt_size' => 9,
            'image_path' => '',
            'company_name' => 'Gigaheap',
            'arrival_date' => '2023-04-20',
            'departure_date' => '2023-05-20',
            'bed_preference' => 0,
            'team_id' => $teams->random()->id,
            'password' => Hash::make('kcF@cN444'),
            'userType' => 0,
        ]);
        DB::table('users')->insert([
            'first_name' => 'Umar',
            'last_name' => 'Barlas',
            'username' => 'umarbarlas',
            'email' => 'umarbarlas4@gmail.com',
            'mobile_number' => '923204343549',
            'shirt_size' => 9,
            'image_path' => '',
            'company_name' => 'Gigaheap',
            'arrival_date' => '2023-04-20',
            'departure_date' => '2023-05-20',
            'bed_preference' => 0,
            'team_id' => $teams->random()->id,
            'password' => Hash::make('randomUserPass'),
            'userType' => 1,
        ]);
        DB::table('users')->insert([
            'first_name' => 'Aleem',
            'last_name' => 'Ahmad',
            'username' => 'aleemahmad',
            'email' => 'aleemahmada107@gmail.com',
            'mobile_number' => '923034410038',
            'shirt_size' => 9,
            'image_path' => '',
            'company_name' => 'Gigaheap',
            'arrival_date' => '2023-04-20',
            'departure_date' => '2023-05-20',
            'bed_preference' => 1,
            'team_id' => $teams->random()->id,
            'password' => Hash::make('randomUserPass'),
            'userType' => 1,
        ]);
    }
}
