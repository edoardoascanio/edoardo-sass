<?php

namespace App\Http\Controllers\Api;

use App\Accomodation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    public function index() {
        $number_beds_filter = isset($_GET['number_beds']) ? $_GET['number_beds'] : 0;
        $num_rooms_filter = isset($_GET['number_rooms']) ? $_GET['number_rooms'] : 0;
        $address = isset($_GET['address']) ? $_GET['address'] : '';
        $distance = isset($_GET['distance']) ? $_GET['distance'] : '';
        /* service è un array, cambiare $_GET */
        $services = isset($_GET['services']) ? $_GET['services'] : '';

        $accomodations = Accomodation::where('number_rooms', '>', $number_beds_filter)->where('number_beds', '>', $number_beds_filter)->get();

        $risultato = [];
        $risultato2 = [];

        $risultatoFinale = [];

        /* foreach ($accomodationsFiltered1 as $singleFilterAccomodation1) {
            foreach ($accomodationsFiltered2 as $singleFilterAccomodation2) {
                if ($singleFilterAccomodation1->id == $singleFilterAccomodation2->id) {
                    $risultato[] = $singleFilterAccomodation2;
                }
            }
        } */

        /* foreach ($accomodations as $singleAccomodation) {
            if ($singleAccomodation->number_beds >= $number_beds_filter) {
                $risultato[] = $singleAccomodation;
            }
            if ($singleAccomodation->number_rooms >= $num_rooms_filter) {
                $risultato2[] = $singleAccomodation;
            }
        }

        foreach ($risultato as $singleFilterAccomodation1) {
            foreach ($risultato2 as $singleFilterAccomodation2) {
                if ($singleFilterAccomodation1->id == $singleFilterAccomodation2->id) {
                    $risultatoFinale[] = $singleFilterAccomodation2;
                }
            }
        } */


        /* if (isset($number_beds)) {
            foreach ($accomodations as $accomodation) {
                $accomodation->link = route('guest.show', ['id' => $accomodation->id]);

                if ($accomodation->number_beds >= $number_beds) {
                    $accomodationsFiltered[] = $accomodation;
                }
            }
        } else {
            $accomodationsFiltered[] = $accomodations;
        } */
        /* foreach ($accomodations as $accomodation) {
            $accomodation->link = route('guest.show', ['id' => $accomodation->id]);

            if (is_null($number_beds)) $accomodationsFiltered[] = $accomodation;

            if ($accomodation->number_beds >= $number_beds) {
                $accomodationsFiltered[] = $accomodation;
            }
        } */

        return response()->json([
            'success' => true,
            'results' => $accomodations,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
