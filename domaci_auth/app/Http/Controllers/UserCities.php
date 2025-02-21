<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCities extends Controller
{
    public function favourite(Request $request, $city)
    {
        $user = Auth::user();
        if($user === null) {
            return redirect()->back()->with(['error'=> "Morate biti ulogovani da stavite grad u favourite"]);
        }
        \App\Models\UserCities::create([
            'city_id' => $city,
            'user_id' => $user->id
        ]);

        return redirect()->back();

    }
}
