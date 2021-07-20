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
    public function run()
    {
        $sponsorships = config('sponsorship');

        foreach ($sponsorships as $sponsorship) {
            $new_sponsorship = new Sponsorship();

            $new_sponsorship->fill($sponsorship);

            $new_sponsorship->save();
        }
    }
}
