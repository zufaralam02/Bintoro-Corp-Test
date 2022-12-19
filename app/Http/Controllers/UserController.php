<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function group()
    {
        // $user = User::select('birth_place', DB::raw('count(*) as jumlah_data_user'))
        //     ->groupBy('birth_place')
        //     ->get();

        $user = User::get(['id', 'name', 'birth_date', 'gender', 'birth_place'])->groupBy('birth_place');

        // $user = [];

        // $birthPlace = User::select('birth_place')->get();

        // foreach ($birthPlace as $bp) {
        //     if (in_array($bp->birth_place, $user)) {
        //         continue;
        //     }

        //     $user[] = $bp->birth_place;
        // }

        return response()->json($user);
    }

    public function test()
    {
        for ($i = 1; $i <= 5; $i++) {
            for ($j = 1; $j <= 8; $j++) {
                if ($j == $i + 1 || $j == $i + 2) {
                    echo "*";
                } else {
                    echo $j;
                }
            }
            echo "\n";
        }
    }
}
