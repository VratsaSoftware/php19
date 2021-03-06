<?php

namespace App\Http\Controllers;

use App\Hall;
use Illuminate\Http\Request;

class HallsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //TO DO - GET ALL HALLS
       
        $halls = Hall::all();
       return view('halls.index', compact('halls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("halls.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $hall = new Hall();

       // $hall->hall_name = $request->hall_name;

       // $hall->save();
        $rules = [
            'hall_name' => 'required|unique:halls|min:3',
        ];


        $this->validate( $request, $rules );

        $hall = Hall::create([
            'hall_name' => $request->hall_name
        ]);

        dd( $hall );
       return redirect()->route('halls.index');
       // return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function show(Hall $hall)
    {
        $hall = Hall::find($hall)->first();
        
        return view('halls.show', compact('hall'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function edit(Hall $hall)
    {
        $hall = Hall::find($hall)->first();

        return view('halls.edit', compact('hall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hall $hall)
    {
        $hall = Hall::find( $hall->id );

        $hall->hall_name = $request->hall_name;

        $hall->save();

        return redirect()->route('halls.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hall $hall)
    {
       // $hall = Hall::find( $hall )->first();
       // $hall->delete();

        Hall::find( $hall->id )->delete();

       return redirect()->back();
    }
}
