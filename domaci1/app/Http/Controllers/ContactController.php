<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class  ContactController extends Controller
{
    public function index() {
        return view('contact');
    }

    public function getAllContacts() {
        $allContacts = ContactModel::all(); // SELECT * FROM contacts, vadi sve kontakte iz baze

        return view('allContacts', compact('allContacts')); // Ucitavamo allCOntacts.blade.php i prosledjujemo varijablu

    }
}
