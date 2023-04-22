<?php

namespace App\Http\Controllers;

use App\Models\Conferences;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class ConfManager extends Controller
{

    public function createConferences()
    {
        return view('create');
    }

    public function postConferences(Request $request)
    {
        $request->validate([
            'header'      => 'required',
            'description' => 'required',
            'date'        => 'required',
            'address'     => 'required'
        ]);

        $data['header'] = $request->header;
        $data['description'] = $request->description;
        $data['date'] = $request->date;
        $data['address'] = $request->address;
        $conferences = Conferences::create($data);
        if(!$conferences){
            return redirect(route('createConferences'))->with("error", "registration details are not valid");
        }

        return redirect(route('conferences'))->with("success", "Registration success");


    }

    public function index()
    {
        $conferences = Conferences::latest()->paginate(5);
        return view('index', compact('conferences'))->with(request()->input('page'));
    }

}



