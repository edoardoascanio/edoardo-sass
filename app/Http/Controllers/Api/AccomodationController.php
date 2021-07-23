<?php

namespace App\Http\Controllers\Api;

use App\Accomodation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    public function index()
    {


        
        $accomodations = Accomodation::with('user')->with('sponsorship')->with('services')->paginate(10);

        foreach ($accomodations as $accomodation) {
            $accomodation->link = route('guest.show', ['id' => $accomodation->id]);
        }

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
