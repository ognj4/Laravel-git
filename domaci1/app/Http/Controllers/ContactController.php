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

    public function sendContact(Request $request) {

        // provera validacije
        $request->validate([
            // 'name' => 'pravila'
            'email' => 'required|string', // isto sto iif(!isset($_POST)['email']&& is_string($_POST['email']))
            'subject' => 'required|string',
            'description' => 'required|string|min:5',
        ]);


        // upis u bazu
        ContactModel::create([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('description')
        ]);

        return redirect('admin/all-contacts');
    }
}
