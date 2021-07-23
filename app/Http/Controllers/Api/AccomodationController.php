<?php

namespace App\Http\Controllers\Api;

use App\Accomodation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    public function index() {
        function filterNumbers($array, $filter, $column)
        {
            $resultsArray = [];

            /* if (isset($filter)) {
                foreach ($array as $item) {
                    $item->link = route('guest.show', ['id' => $item->id]);
                    if ($item[$column] >= $filter) {
                        $resultsArray[] = $item;
                    }
                }
            } else {
                $resultsArray = $array;
            } */

            if ($filter == '') {
                return $array;
            }

            foreach ($array as $item) {
                if ($item[$column] >= $filter) {
                    $resultsArray[] = $item;
                }
            }

            return $resultsArray;
        }


        $accomodations = Accomodation::with('user')->with('sponsorship')->with('services')->get();

        $number_beds_filter = isset($_GET['number_beds']) ? $_GET['number_beds'] : '';
        $num_rooms_filter = isset($_GET['min_num_rooms']) ? $_GET['min_num_rooms'] : '';
        $address = isset($_GET['address']) ? $_GET['address'] : '';
        $distance = isset($_GET['distance']) ? $_GET['distance'] : '';
        /* service è un array, cambiare $_GET */
        $services = isset($_GET['services']) ? $_GET['services'] : '';

        $accomodationsFiltered1 = filterNumbers($accomodations, $number_beds_filter, 'number_beds');

        $accomodationsFiltered2 = filterNumbers($accomodations, $num_rooms_filter, 'min_num_room');

        $risultato = array_intersect($accomodationsFiltered1, $accomodationsFiltered2);


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
            'results' => $risultato,
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
