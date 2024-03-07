<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['create','store']);
    }
    public function index(){
        // Cache
        $profiles = Cache::remember('profiles',10,function (){
            return Profile::paginate(9);
        });
        return view('profiles.index',compact('profiles'));
    }
    public function show(string $id){
        $profile = Cache::remember('profile_'.$id,10,function () use ($id){
            return Profile::findOrFail($id);
        });
        return view('profiles.show',compact('profile'));
    }
    public function create(){
        return view("profiles.create");
    }
    public function store(ProfileRequest $request){
        $formFields = $request->validated();
        $password = $request->password;
        $formFields['password'] = Hash::make($password);
        $this->uploadImage($request,$formFields);
        Profile::create($formFields);
        return redirect()->route('profile.index')->with('success',"The Profile is created");
    }
    public function verifyEmail(string $hash){
        [$createdAt,$id] = explode('///',base64_decode($hash));
        $profile = Profile::findOrFail($id);
        if($profile->created_at->toDateTimeString() !== $createdAt){
            abort(403);
        }
        if($profile->email_verified_at !== NULL){
            return response('Compte deja Active');
        }
        $name = $profile->name;
        $email = $profile->email;
        $profile->fill([
            'email_verified_at' => date_format(date_create(),'Y-m-d H:i:s')
        ])->save();
        return view('profiles.email_verified',compact('name','email'));
    }
    public function destroy(Profile $profile){
        $profile->delete();
        return to_route('profile.index')->with('success','The Profile is Deleted');
    }
    public function edit(Profile $profile){
        return view("profiles.edit",compact('profile'));
    }
    public function update(ProfileRequest $request,Profile $profile){
        $formFields = $request->validated();
        $formFields['password'] = Hash::make($request->password);
        $this->uploadImage($request,$formFields);
        $profile->fill($formFields)->save();
        return to_route('profile.show',$profile->id)->with('success',"The Profile is Updated succesful");
    }
    private function uploadImage(ProfileRequest $request, array &$formFields){
        unset($formFields['image']);
        if($request->hasFile('image')){
            $formFields['image'] =  $request->file('image')->store('profile','public');
        }
    }
}
