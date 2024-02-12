<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Dropdoun;

use Illuminate\Support\Facades\DB;
  
class DropdownController extends Controller
{
    /**
     * Write code on Method
    
     */
    public function index()
    {
        $data['countries'] = Country::get(["name", "id"]);
        return view('dropdown', $data);
    }
    /**
     * Write code on Method
     *
  
     */
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id", $request->country_id)
                                ->get(["name", "id"]);
  
        return response()->json($data);
    }
    /**
     * Write code on Method
     *
   
     */
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id", $request->state_id)
                                    ->get(["name", "id"]);
                                      
        return response()->json($data);
    }

    // public function select(Request $request)
    // {
    //     $c_id = $request->input('c_id');
    //     $s_id = $request->input('s_id');
    //     $cs_id = $request->input('cs_id');
       
    //     $data=array('c_id'=>$c_id,"s_id"=>$s_id,"cs_id"=>$cs_id);
    //     DB::table('dropdoun')->insert($data);
    //     return redirect()->back()->with('status','Student Added Successfully');
    // }


    public function select(Request $request)
    {
        $country_id = $request->input('country_id');
        $state_id = $request->input('state_id');
        $city_id = $request->input('city_id');
    
        if (is_array($city_id)) {
            foreach ($city_id as $name) {
                $user = new Dropdoun;
                $user->country_id = $country_id;
                $user->state_id = $state_id;
                $user->city_id = $name;
                $user->save();
            }
    
            return redirect()->back()->with('status', 'Test Added Successfully');
        } else {
           
            return redirect()->back()->with('error', 'Invalid data for cs_id');
        }
    }
    


}