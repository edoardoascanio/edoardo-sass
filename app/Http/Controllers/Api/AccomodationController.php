<?php

namespace App\Http\Controllers\Api;

use App\Accomodation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccomodationController extends Controller
{

    public function index(Request $request)
    {
        $filters = $request->only(["number_beds", "number_rooms", "services", "title"]);
        $accomodations = Accomodation::with(['services']);

        foreach ($filters as $filter => $value) {
            if ($filter === 'number_beds') {
                if (!is_array($value)) {
                    $value = explode(",", $value);
                }
                $accomodations->where('number_beds', '>=', $value);
            } else if ($filter === 'number_rooms') {
                if (!is_array($value)) {
                    $value = explode(",", $value);
                }
                $accomodations->where('number_rooms', '>=', $value);
            } else if ($filter === "services") {
                if (!is_array($value)) {
                  $value = explode(",", $value);
                }
                
        
                $accomodations->join("accomodation_service", "accomodations.id", "=", "accomodation_service.accomodation_id")
                  ->where("accomodation_service.service_id", $value);
              } else {
                $accomodations->where($filter, "LIKE", "%$value%");
              }
        }

        $filtered_accomodations = $accomodations->get();

        return response()->json([
            'success' => true,
            'results' => $filtered_accomodations,
        ]);
    }
}
