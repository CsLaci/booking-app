<?php

namespace App\Http\Controllers;

use App\Accommodation;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accommodations = Accommodation::all();
        
        return view('accommodations.index', ['accommodations' => $accommodations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accommodations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //citim datele din formular
        $title = $request->get('title');
        $description = $request->get('description');

        $accommodation = new Accommodation;
        $accommodation->title = $title;
        $accommodation->description = $description;

        $accommodation->save();

        return redirect()->action('AccommodationController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function show(Accommodation $accommodation)
    {
        return view('accommodations.show', compact('accommodation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function edit(Accommodation $accommodation)
    {
        return view('accommodations.edit', compact('accommodation'));
        //  ['book' => $book]   => compact('book');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accommodation $accommodation)
    {
        $accommodation->title = $request->input('title');
        // $accomodation->title = $_POST['title']
        $accommodation->description = $request->input('description');

        $accommodation->save();

        return redirect('/accommodations/' . $accommodation->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accommodation  $accommodation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accommodation $accommodation)
    {
        //
    }
}
