<?php

namespace App\Http\Controllers\open;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Address;
use App\Models\Addresstype;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {

        $user = User::find(Auth::user()->id);//
        //$address = Address::where('user_id', Auth::user()->id)->get(); //Deze gebruiken om alle adressen te laten zien. Check profile.blade voor de andere code
        $address = Address::where('user_id', Auth::user()->id)->first();
        if (empty($address)) {
            return view('public.profiles.profile', compact('user'));
        } else {
            return view('public.profiles.profile', compact('user', 'address'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addAddress()
    {
        $address = Address::all();
        $addresstypes = Addresstype::all();
        return view('public.profiles.create', compact('address', 'addresstypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAddress(StoreAddressRequest $request)
    {
        $address = new Address();
        $address->user_id = Auth::user()->id;
        $address->address = $request->streetname;
        $address->city = $request->city;
        $address->zipcode = $request->zipcode;
        $address->country = $request->country;
        $address->addresstype_id = $request->input('addresstype');
        $address->save();

        return redirect()->route('profile')->with('message', 'Address succesfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editAddress(User $user)
    {
        $address = Address::where('user_id', Auth::user()->id)->first();
        $addresstypes = Addresstype::all();
        return view('public.profiles.editaddress', compact('address', 'addresstypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateAddress(UpdateAddressRequest $request, Address $address)
    {
        //$address->user_id = Auth::user()->id;
        $address->address = $request->streetname;
        $address->city = $request->city;
        $address->zipcode = $request->zipcode;
        $address->country = $request->country;
        $address->addresstype_id = $request->input('addresstype');
        $address->save();

        return redirect()->route('profile')->with('message', 'Address succesfully updated');
    }

    public function editProfile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('public.profiles.editprofile', compact('user'));
    }

    public function updateProfile(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile')->with('message', 'Profile succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
