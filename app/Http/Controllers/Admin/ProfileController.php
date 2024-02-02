<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Specialization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations=Specialization::all();
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->get();
        if (count($profile)==0){
            $profile=[];
        };
        return view('admin.profile.create', compact('specializations', 'profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {
        $user_id = auth()->user()->id;
        $data = $request->validated();
        $profile = new Profile();
        $profile->user_id = $user_id;
        $profile->fill($data);

        // immagine
        if (array_key_exists('photo', $data)) {
            $img_url = Storage::put('uploads', $data['photo']);
            $data['photo'] = $img_url;
        }
        // immagine
        $profile->save();
        if(isset($data['specializations'])){
            $profile->specializations()->sync($data['specializations']);
        }

        return redirect()->route('admin.profile.show', $profile)->with('message', 'Nuovo Profilo Dottore Creato');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        $user_data = Auth::user();
        $profile = Auth::user()->profile;
        return view('admin.profile.show', compact('profile', 'user_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $specializations = Specialization::all();
        $user_data = Auth::user();
        $profile = Auth::user()->profile;
        $profile_specializations = $profile->specializations->pluck('id')->toArray();

        return view('admin.profile.edit', compact('profile', 'specializations', 'user_data','profile_specializations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
          // dd($request);
          $user_data = Auth::user();
          $profile = Auth::user()->profile;
          $data = $request->validated();
  
          // immagine
          if (array_key_exists('photo', $data)) {
              $img_url = Storage::put('uploads', $data['photo']);
              $data['photo'] = $img_url;
          }
  
          // specializzazioni
          $specializations = isset($data['specializations']) ? $data['specializations'] : [];
          $profile->specializations()->sync($specializations);
          // specializzazioni
          $profile->update($data);
  
          return redirect()->route('admin.profile.show', compact('profile', 'user_data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $old_id = $profile->id;

        if ($profile->photo) {
            Storage::delete($profile->photo);
        }
        $profile->delete();

        return redirect()->route('admin.profile.show',compact('profile'))->with('message', "Il $old_id Profilo è stato Cancellato");
    }
}
