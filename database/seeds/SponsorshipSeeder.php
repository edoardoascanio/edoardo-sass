<?php

use App\Sponsorship;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $sponsorships = [
            [
                'title' => 'bronze',
                'duration' => 24,
                'price' => 2.99,
            ],
            [
                'title' => 'silver',
                'duration' => 72,
                'price' => 5.99,
            ],
            [
                'title' => 'gold',
                'duration' => 144,
                'price' => 9.99,
            ]
        ];

        foreach ($sponsorships as $sponsorship) {
            $new_sponsorship = new Sponsorship();

            $new_sponsorship->fill($sponsorship);

            $new_sponsorship->save();
        }
    }
}
