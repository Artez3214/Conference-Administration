<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Conferences;
use Carbon\Carbon;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;

class ConferencesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        (new Conferences())->insert([
            'header' =>Lorem::sentence(3),
            'description' =>Lorem::sentence(6),
            'date'      => Carbon::createFromDate(2000,01,01)->toDateTimeString(),
            'address' => Lorem::sentence(2)
        ]);
    }
}
