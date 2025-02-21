<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function unFavourite($city)
    {
        $user = Auth::user();
        if($user === null) {
            return redirect()->back()->with(['error'=> "Morate biti ulogovani da stavite grad u favourite"]);
        }

        $userFavourites = \App\Models\UserCities::where([
            'city_id' => $city,
            'user_id' => $user->id
        ])->first();

        $userFavourites->delete();
        return redirect()->back();
    }

}
