<?php
use App\Accomodation;

use Illuminate\Database\Seeder;


class AccomodationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accomodations = config('accomodations');

        foreach ($accomodations as $accomodation) {
            $new_accomodation = new Accomodation();

            $new_accomodation->fill($accomodation);

            $new_accomodation->save();
        }
    }
}
