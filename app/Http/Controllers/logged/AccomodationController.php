<?php

namespace App\Http\Controllers\logged;

use App\Accomodation;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('logged.accomodation.create', compact('services'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|min:5|max:85',
            'description' => 'required|string|min:5|max:2000',
            'number_rooms' => 'required|integer|min:1|max:20',
            'number_bathrooms' => 'required|integer|min:1|max:20',
            'number_beds' => 'required|integer|min:1|max:20',
            'square_mts' => 'nullable|integer|min:10|max:1000|',
            'visibility' => 'nullable|bool',
            'country' => 'required|string|min:3|max:50',
            'city' => 'required|string|min:3|max:50',
            'zip' => 'required|string|size:5',
            'street_name' => 'required|string|min:3|max:150',
            'building_number' => 'required|string|min:3|max:150',
            // 'buildingNumber' => 'required|integer|min:1|max:50000',
            'placeholder' => 'nullable|string|min:1|max:200',
            'price_per_night' => 'required|integer|min:10|max:500',
        ]);

        $data = $request->all();

        $new_accomodation = new Accomodation();

        $new_accomodation->lat = 90.00;
        $new_accomodation->long = 90.00;
        $new_accomodation->fill($data);
        $new_accomodation->user_id = $request->user()->id;
        $new_accomodation->save();

        if (isset($data['services'])) {
            $new_accomodation->service()->sync($data['services']);
        }

        return redirect()->route('logged.show', $new_accomodation->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accomodation = Accomodation::findOrFail($id);
        return view('logged.accomodation.show', compact('accomodation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('logged.accomodation.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
