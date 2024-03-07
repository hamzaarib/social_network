<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PublicationRequest;

class PublicationController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::latest()->get();
        return view("publications.index",compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationRequest $request)
    {
        $formFields = $request->validated();
        $this->uploadImage($request,$formFields);
        $formFields['profile_id'] = Auth::id();
        Publication::create($formFields);
        return to_route('publication.index')->with('success','The Publication is created successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        $this->authorize('update',$publication);
        return view('publications.edit',compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        $formFields = $request->validated();
        $this->uploadImage($request,$formFields);
        $publication->fill($formFields)->save();
        return to_route('publication.index')->with('success','The Publication is updated successfuly');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return to_route('publication.index')->with('success',"The Publication is Deleted");
    }
    private function uploadImage(PublicationRequest $request, array &$formFields){
        unset($formFields['image']);
        if($request->hasFile('image')){
            $formFields['image'] =  $request->file('image')->store('publication','public');
        }
    }
}
