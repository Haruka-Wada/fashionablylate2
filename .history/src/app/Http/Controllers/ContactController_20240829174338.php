<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Date;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
        $csvData = Contact::all();
        return view ('auth.admin', compact('contacts','categories', 'csvData'));
    }

    public function search(Request $request) {
        if ($request->has('reset')) {
            return redirect('/admin')->withInput();
        }

        $query = Contact::query();

        $query = $this->getSearchQuery($request, $query);

        $contacts = $query->paginate(7);
        $csvData = $query->get();
        $categories = Category::all();
        return view('auth.admin', compact('contacts', 'categories', 'csvData'));

    }

    public function destroy(Request $request) {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    public function export(Request $request) {

        $query = Contact::query();

        $query = $this->getSearchQuery($request, $query);

        $csvData = $query->get()->toArray();

        $csvHeader = [
            'id', 'category', 'first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'detail', 'created_at', 'updated_at'
        ];

        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $createCsvFile = fopen('php://output', 'w');

            mb_convert_variables('SJIS-win', 'UTF-8', $csvHeader);

            fputcsv($createCsvFile, $csvHeader);

            foreach ($csvData as $csv) {
                $csv['created_at'] = Date::make($csv['created_at'])->setTimezone('Asia/Tokyo')->format('Y/m/d H:i:s');
                $csv['updated_at'] = Date::make($csv['updated_at'])->setTimezone('Asia/Tokyo')->format('Y/m/d H:i:s');
                fputcsv($createCsvFile, $csv);
            }

            fclose($createCsvFile);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ]);

        return $response;
    }

    private function getSearchQuery($request, $query)
    {
        if (!empty($request->keyword)) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }

        if (!empty($request->gender)) {
            $query->where('gender', '=', $request->gender);
        }

        if (!empty($request->category_id)) {
            $query->where('category_id', '=', $request->category_id);
        }

        if (!empty($request->date)) {
            $query->whereDate('created_at', '=', $request->date);
        }

        return $query;
    }
}