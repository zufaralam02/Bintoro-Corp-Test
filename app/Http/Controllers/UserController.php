<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $user = User::all();

        return response()->json($user);
    }

    public function show($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'gender' => 'required'
        ]);

        $data = $request->all();
        $user = User::create($data);

        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $this->validate($request, [
            'name' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'gender' => 'required'
        ]);

        $data = $request->all();
        $user->fill($data);
        $user->save();

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Data deleted successfully'], 200);
    }
}
