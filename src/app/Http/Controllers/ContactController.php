<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(Request $request) {
        $contact = $request->only('first_name', 'last_name', 'gender', 'email', 'tell1', 'tell2', 'tell3', 'address', 'category_id', 'building', 'detail');
        $categories = Category::all();
        return view('confirm', compact('contact', 'categories'));
    }

    public function store(Request $request) {
        
        if ($request->input('back') == 'back') {
            $contact = $request->only('first_name', 'last_name', 'gender', 'email', 'tell1', 'tell2', 'tell3', 'address', 'category_id', 'building', 'detail');
            return redirect('/')->withInput();
        }

        $contact = new Contact;
        $contact->tell = '$request->tell1.$request->tell3¥2.$request->tell3';
        $contact = $request->only('first_name', 'last_name', 'gender', 'email', 'address', 'category_id', 'building', 'detail');

        
    }
}
