<?php

namespace App\Http\Controllers\Api;

use App\Accomodation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(["number_beds", "number_rooms", "services", "city"]);
        // $services = [];

        $accomodations = Accomodation::with(['services']);

        $query  = explode('&', $_SERVER['QUERY_STRING']);
        $params = [];
        $accomodation_filtered = [];

        foreach ($query as $param) {
            list($name, $value) = explode('=', $param, 2);
            $params[urldecode($name)][] = urldecode($value);
        }

        // foreach ($filters as $filter => $value) {
        //     if ($filter === 'services') {
        //         $services[] = $value;
        //     }
        // }

        // foreach ($filters as $filter => $value) {
        //     if ($filter === 'number_beds') {
        //         if (!is_array($value)) {
        //             $value = explode(",", $value);
        //         }
        //         $accomodations->where('number_beds', '>=', $value);
        //     } else if ($filter === 'number_rooms') {
        //         if (!is_array($value)) {
        //             $value = explode(",", $value);
        //         }
        //         $accomodations->where('number_rooms', '>=', $value);
        //     } else if ($filter === "services") {
        //         if (!is_array($value)) {
        //             $value = explode(",", $value);
        //         }

        //         $accomodations->join("accomodation_service", "accomodations.id", "=", "accomodation_service.accomodation_id")
        //             ->where("accomodation_service.service_id", $value);
        //     } else {
        //         $accomodations->where($filter, "LIKE", "%$value%");
        //     }
        // }

        foreach($params as $param => $value) {
            if ($param === 'number_beds'){

                $accomodations->where('number_beds', '>=', $value);
            }
            if ($param === 'number_rooms'){

                $accomodations->where('number_rooms', '>=', $value);
            }
            if ($param === 'services'){
                $param = explode(",", $value);
                $accomodations->join("accomodation_service", "accomodations.id", "=", "accomodation_service.accomodation_id");
                foreach($value as $single_service_id) {

                    $accomodations->where('services', $single_service_id);
                }
            }
            
        }

        $filtered_accomodations = $accomodations->get();
        foreach ($filtered_accomodations as $accomodation) {
            $accomodation->link = route("guest.show", ["id" => $accomodation->id]);
        }


        return response()->json([
            'success' => true,
            'results' => $filtered_accomodations,
            'params' => $params
        ]);
    }
}
