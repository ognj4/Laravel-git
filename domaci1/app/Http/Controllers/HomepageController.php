<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index ()
    {

        $sat = date("H");

        $trenutnoVreme =date('H:i:s');

        return view('welcome', compact('trenutnoVreme','sat'));
    }
}
