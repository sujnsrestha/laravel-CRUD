<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ApplicationController extends Controller
{
    public function index()
    {
        $userdata = User::orderBy('id', 'DESC')->paginate(5);
        return view('welcome', compact('userdata'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('index');
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:3',
                'user_name' => 'required|unique:users,user_name|min:5',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:5'
            ]);
            $data['name'] = $request->name;
            $data['user_name'] = $request->user_name;
            $data['email'] = $request->email;
            $data['password'] = bcrypt($request->password);
            if (User::create($data)) {
                return redirect()->route('index')->with('success', 'data was successfully inserted');
            }
        }
    }


    public function delete(Request $request)
    {
        $criteria = $request->criteria;
        $data = User::findOrFail($criteria);
        if ($data->delete()) {
            return redirect()->route('index')->with('success', 'data was successfully deleted');
        }
    }

    public function edit(Request $request)
    {
        $criteria = $request->criteria;
        $data = User::findOrFail($criteria);
        return view('edit', compact('data'));
    }

    public function editAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('index');
        }
        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $this->validate($request, [
                'name' => 'required|min:3',
                'user_name' => 'required|min:5|unique:users,user_name',
                'email' => 'required|email|',
                [
                    Rule::unique('users', 'user_name')->ignore($criteria)
                ],
            ]);
            $data['name'] = $request->name;
            $data['user_name'] = $request->user_name;
            $data['email'] = $request->email;
            if (User::Where('id', $criteria)->update($data)) {
                return redirect()->route('index')->with('success', 'data was successfully updated');
            }
        }
    }

}


