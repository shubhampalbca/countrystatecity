<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Dropdoun;

class DropdownController extends Controller
{

    public function view()
    {
        $result = Dropdoun::with(['country', 'state', 'city'])->get();
        return view('welcome', compact('result'));
    }

    public function index()
    {
        $data['countries'] = Country::get(["name", "id"]);
        return view('dropdown', $data);
    }

    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id", $request->country_id)
            ->get(["name", "id"]);

        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id", $request->state_id)
            ->get(["name", "id"]);

        return response()->json($data);
    }

    public function select(Request $request)
    {

        $country_id = $request->input('country_id');
        $state_id = $request->input('state_id');
        $city_id = $request->input('city_id');
        $name = $request->input('name');

        if (is_array($city_id)) {
            foreach ($city_id as $cityid) {
                $user = new Dropdoun;
                $user->country_id = $country_id;
                $user->name = $name;
                $user->state_id = $state_id;
                $user->city_id = $cityid;
                $user->save();
            }

            return redirect('/')->with('status', 'Test Added Successfully');
        } else {

            return redirect()->back()->with('error', 'Invalid data for cs_id');
        }
    }
}
