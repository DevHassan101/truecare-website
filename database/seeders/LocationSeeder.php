<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            "USA" => [
                "California",
                "Texas",
                "New York",
                "Florida",
                "Illinois"
            ],
            "Canada" => [
                "Ontario",
                "Quebec",
                "British Columbia",
                "Alberta",
                "Manitoba"
            ],
            "Australia" => [
                "New South Wales",
                "Victoria",
                "Queensland",
                "Western Australia",
                "South Australia"
            ],
            "India" => [
                "Maharashtra",
                "Karnataka",
                "Tamil Nadu",
                "Uttar Pradesh",
                "Gujarat"
            ]
        ];
        foreach ($countries as $country => $states) {
            $c = Country::create([
                'name' => $country
            ]);
            foreach ($states as $state) {
                State::create([
                    'name' => $state,
                    'country_id' => $c->id,
                ]);
            }
        }
    }
}
