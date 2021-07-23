<?php

namespace App\Http\Controllers\Api;

use App\Accomodation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    public function index() {
        $accomodations = Accomodation::with('user')->with('sponsorship')->with('services')->paginate(10);

        $number_beds = isset($_GET['number_beds']) ? $_GET['number_beds'] : '';

        $accomodationsFiltered = [];

        foreach ($accomodations as $accomodation) {
            $accomodation->link = route('guest.show', ['id' => $accomodation->id]);

            if (is_null($number_beds)) $accomodationsFiltered[] = $accomodation;

            if ($accomodation->number_beds >= $number_beds) {
                $accomodationsFiltered[] = $accomodation;
            }
        }

        return response()->json([
            'success' => true,
            'results' => $accomodationsFiltered,
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
