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

        if (!$conferences && $request->header(''))
        {
            return redirect(route('createConferences'))->with("error", "conferences details are not valid");
        }

        return redirect(route('conferences'))->with("success", "conference creation was successful");

    }

    public function postEdit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'header'      => 'required',
            'description' => 'required',
            'date'        => 'required',
            'address'     => 'required'
        ]);

        $conferences = Conferences::findOrFail($id);

        $conferences->header = $validatedData['header'];
        $conferences->description = $validatedData['description'];
        $conferences->date = $validatedData['date'];
        $conferences->address = $validatedData['address'];
        $conferences->save();

        return redirect()->route('conferences', ['id' => $conferences->id])->with('success', 'Item updated successfully!');


    }


    public function index()
    {
        $conferences = Conferences::latest()->paginate(5);
        return view('index', compact('conferences'))->with(request()->input('page'));
    }

    public function show($id)
    {
        $conferences= Conferences::find($id);
        return view('show',['conferences' => $conferences]);
    }

    public function edit($id)
    {
        $conferences= Conferences::find($id);
        return view('edit',['conferences' => $conferences]);
    }


    public function destroy()
    {

    }

}



