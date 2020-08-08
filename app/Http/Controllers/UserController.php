<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'type_user' => 'required',
        ]);

        if ($request->password) {
            $password = bcrypt($request->password);
        } else {
            $password = bcrypt(123);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type_user' => $request->type_user,
            'password' => $password
        ]);

        return redirect()->route('user.index')->with('pesan', 'disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'type_user' => 'required',
        ]);
        
        $user = User::findOrFail($id);

        if ($request->password) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'type_user' => $request->type_user,
                'password' => bcrypt($request->password)
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'type_user' => $request->type_user,
            ]);
        }

        return redirect()->route('user.index')->with('pesan', 'diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->back()->with('pesan', 'dihapus!');
    }
}
