<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Conferences;
use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        (new User())->insert([
            'name' =>'admin',
            'email' =>'admin@gmail.com',
            'password'      => Hash::make('admin')
        ]);
    }
}
