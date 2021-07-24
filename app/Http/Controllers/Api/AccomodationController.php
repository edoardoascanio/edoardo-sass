<?php

namespace App\Http\Controllers\Api;

use App\Accomodation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    public function index(Request $request)
    {
 
        // $filters = $request->only(["number_beds", "number_rooms", "services", "city"]);
        // $id_services = [];


        $accomodations = Accomodation::with('services')->with('sponsorship')->with('views')->paginate(10);


        // $query  = explode('&', $_SERVER['QUERY_STRING']);
        // $params = [];


        // foreach ($query as $param) {
        //     list($name, $value) = explode('=', $param, 2);
        //     $params[urldecode($name)][] = urldecode($value);
        // }

        // foreach ($filters as $filter => $value) {
        //     if ($filter === 'services') {
        //         $services[] = $value;
        //     }
        // }



        // ROOMS E BEDS NO SERVICES

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
        //             ->where("accomodation_service.service_id", $params['services']);
        //     } else {
        //         $accomodations->where($filter, "LIKE", "%$value%");
        //     }
        // }

        //NON LO SO
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

        //         foreach($params['services'] as $service) {
        //             // $id_services[] = $service;
        //             $accomodations->join("accomodation_service", "accomodations.id", "=", "accomodation_service.accomodation_id")
        //                 ->where("accomodation_service.service_id", $service);
        //         }
        //     }
        // }

        //         $accomodations->join("accomodation_service", "accomodations.id", "=", "accomodation_service.accomodation_id")
        //             ->where("accomodation_service.service_id", $value);
        //     } else {
        //         $accomodations->where($filter, "LIKE", "%$value%");
        //     }
        // }



        //PROVA
        // foreach ($params as $param => $value) {
        //     if ($param === 'number_beds') {

        //         $accomodations->where('number_beds', '>=', $value);
        //     }
        //     if ($param === 'number_rooms') {

        //         $accomodations->where('number_rooms', '>=', $value);
        //     }
        //     if ($param === 'services') {
        //     $param = explode(",", $value);
        //     $accomodations->join("accomodation_service", "accomodations.id", "=", "accomodation_service.accomodation_id");
        //     foreach($value as $single_service_id) {

        //         $accomodations->where('services', $single_service_id);
        //     }
        // }
        // if($param === 'services') {
        //     $accomodations->where("accomodation_service.service_id", $param);
        // foreach($value as $service_id) {
        // foreach($accomodations->services as $accomodation_services_id) {
        //     if( $service_id == $accomodation_services_id) {
        //         $accomodation_filtered[] = $service_id; 
        //     }

        // }
        // $accomodations->where("accomodation_service.service_id", $service_id);
        //    $accomodations->where('services', $service_id);

        //             $accomodation_filtered[] = $service_id; 

        // }
        // $filtered_accomodations = $accomodations->get();



        // if (!$query) {
        //     $filtered_accomodations = Accomodation::all();
        // }
        foreach ($accomodations as $accomodation) {
            $accomodation->link = route("guest.show", ["id" => $accomodation->id]);
        }
        return response()->json([
            'success' => true,
            // 'records' => count($filtered_accomodations),
            // 'services' => $services,
            // 'params' => $params,
            'results' => $accomodations,
            // 'x' => $accomodation_filtered
        ]);
    }
    public function filtered(Request $request)
    {

        $filters = $request->only(["number_beds", "number_rooms", "city"]);

        if (count($filters) == 0) {
            $accomodations = Accomodation::with('services')->with('sponsorship')->with('views')->paginate(10);
            foreach ($accomodations as $accomodation) {
                $accomodation->link = route("guest.show", ["id" => $accomodation->id]);
            }
            return response()->json([
                'success' => true,
                'filters' => $filters,
                'results' => $accomodations,
            ]);
        }

        $filters_services = [];

        $query  = explode('&', $_SERVER['QUERY_STRING']);
        $params = [];

        foreach ($query as $param) {
            list($name, $value) = explode('=', $param, 2);
            $params[urldecode($name)][] = urldecode($value);
        }

        foreach ($params as $param => $value) {
            if ($param === 'services') {
                $filters_services[] = $value;
            }
        }

        // $query  = explode('&', $_SERVER['QUERY_STRING']);
        // $params = [];

        $accomodations = Accomodation::with('services');
        // $pivot = $accomodations->join();

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
            } else {
                $accomodations->where($filter, "LIKE", "%$value%");
            }
        }

        // } else if ($filter === "services") {
        //     if (!is_array($value)) {
        //         $value = explode(",", $value);
        //     }

        //     $accomodations->join("accomodation_service", "accomodations.id", "=", "accomodation_service.accomodation_id")
        //         ->whereIn("accomodation_service.service_id", $params['1']);
        // } else {
        //     $accomodations->where($filter, "LIKE", "%$value%");
        // }
        // }
        // $accomodations = Accomodation::with('services')->paginate(10);

        $filtered_accomodations = $accomodations->get();



        // // if(!$query){
        // //     $filtered_accomodations = Accomodation::all();
        // // }
        // foreach ($filtered_accomodations as $accomodation) {
        //     $accomodation->link = route("guest.show", ["id" => $accomodation->id]);
        // }
        return response()->json([
            'success' => true,

            // 'services' => $filters_services,
            // 'params' => $params,
            'results' => $filtered_accomodations,

        ]);
    }
}


// $accomodation = Accomodation::join()whereHas('services', function($q){
//     $q->where('created_at', '>=', '2015-01-01 00:00:00');
// })->get();