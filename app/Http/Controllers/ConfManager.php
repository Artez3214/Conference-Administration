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
    function conferences()
    {
        return view('conferences');
    }

    function createConferences()
    {
        return view('create');
    }
    function postConferences(Request $request)
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
}
