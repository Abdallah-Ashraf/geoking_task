<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UsersController extends Controller
{
    //

    /**
     * @return \Inertia\Response
     */
    public function index(){
        $users = User::get(['id','name','email']);
        return Inertia::render('Users',['users'=>$users]);
    }

    /**
     * @param $id
     * @return \Inertia\Response
     */
    public function showLocationsInMap($id){
        $locations = Location::where('user_id',$id)->get();
        return Inertia::render('User-Locations-Map',['locations'=>$locations]);
    }

    /**
     * @param $id
     * @return \Inertia\Response
     */
    public function showLocations($id){
        $locations = Location::where('user_id',$id)->get();
        return Inertia::render('User-Locations',['userId'=>$id,'locations'=>$locations]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createLocation(Request $request){
        Location::create($request->input());
        return redirect()->route('user-locations',['id'=> $request->user_id]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function DeleteLocation($id){
        $location = Location::findOrFail($id);
        $userId = $location->user_id;
        $location->delete();
        return redirect()->route('user-locations',['id'=> $userId]);
    }
}
