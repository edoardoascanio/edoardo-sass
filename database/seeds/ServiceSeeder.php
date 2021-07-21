<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = config('servicesaccomodations');

        foreach ($services as $service) {
            $new_servicesaccomodations = new Service();

            $new_servicesaccomodations->fill($service);

            $new_servicesaccomodations->save();
        }
    }
}
