<?php

namespace App\Http\Controllers\Logged;

use App\Accomodation;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard($id) {
        
        $accomodations = Accomodation::orderBy("created_at", "ASC")->where('user_id', $id)->get();
        return view('logged.user.dashboard', ['accomodations' => $accomodations]);
    }
}
