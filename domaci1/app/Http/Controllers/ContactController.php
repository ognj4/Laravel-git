<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class  ContactController extends Controller
{
    public function index() {
        return view('contact');
    }

    public function delete($contact){
        $singleContact = ContactModel::where('id', $contact)->first();
        if($singleContact==null){
            die("OVAJ KONTAKT NE POSTOJI");
        }
        $singleContact->delete();
        return redirect()->back();
    }

    public function getAllContacts() {

        // SELECT * FROM contacts, vadi sve kontakte iz baze
        $allContacts = ContactModel::all();

        // Ucitavamo allCOntacts.blade.php i prosledjujemo varijablu
        return view('allContacts', compact('allContacts'));

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
