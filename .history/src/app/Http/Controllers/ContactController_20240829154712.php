<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request) {
        $contact = $request->only('first_name', 'last_name', 'gender', 'email', 'tell1', 'tell2', 'tell3', 'address', 'category_id', 'building', 'detail');
        $categories = Category::all();
        return view('confirm', compact('contact', 'categories'));
    }

    public function store(Request $request) {

        if ($request->input('back') == 'back') {
            return redirect('/')->withInput();
        }

        $form = [
            'category_id' => $request->category_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'tell' => $request->tell1.$request->tell2.$request->tell3,
            'address' => $request->address,
            'building' => $request->building,
            'detail' => $request->detail
        ];
        Contact::create($form);
        return view('thanks');
    }

    public function admin() {
        $contacts = Contact::Paginate(7);
        $categories = Category::all();
        return view ('auth.admin', compact('contacts','categories'));
    }

    public function search(Request $request) {
        if ($request->has('reset')) {
            return redirect('/admin')->withInput();
        }

        $contacts = Contact::with('category')->CategorySearch($request->category_id)->GenderSearch($request->gender)->KeywordSearch($request->keyword)->DateSearch($request->date)->Paginate(7);
        $categories = Category::all();
        return view ('auth.admin', compact('contacts', 'categories'));

    }

    public function destroy(Request $request) {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    public function export(Request $request) {
        $contacts = Contact::with('category')->CategorySearch($request->category_id)->GenderSearch($request->gender)->KeywordSearch($request->keyword)->DateSearch($request->date)->get();

        $csvData = $contacts->toAllay();

        $csvHeader = [
            'id', 'category', 'first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'detail', 
        ]
    }

}

