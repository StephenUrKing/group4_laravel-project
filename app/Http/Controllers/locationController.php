<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;



class locationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations  = Location::paginate(18);
        return view('location.list', ['locations'=>$locations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action =route('location.store');
        return view('location.form',[
            'alllocation' => new Location,
            'action'=>$action,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|regex:/^[A-Z][a-zA-Z]*$/',
            'description' => 'required|min:10|max:500',
            'locationId' => 'required',
            'duration' => 'required'
        ]);

        Location::create($data);

        return redirect(route('location.index'))->with('notification', 'Location Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alllocation = Location::findOrFail($id);
        return view('location.view',[
            'alllocation'=>$alllocation,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alllocation = Location::findOrFail($id);
        $action =route('location.update', [$id]);
        return view('location.form',[
            'alllocation'=>$alllocation,
            'action'=>$action,
            'edit' => true
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =  $request->validate([
            'name'=>"required",
            'description'=>"required|min:10",
            'locationId'=>"required",
            'duration'=>"required"
        ]);;
        $alllocation = Location::findOrFail($id);
        $alllocation->update($data);
        return redirect(route('location.index'))->with('notification', 'Location Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alllocation = Location::findOrFail($id);
        $alllocation->delete();
        return redirect(route('location.index'))->with('notification', 'Location Deleted');
    }
}
