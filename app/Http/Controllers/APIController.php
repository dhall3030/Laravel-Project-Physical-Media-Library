<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Media;


class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $media = Media::all();
        return response()->json($media);


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMedia($user_id)
    {
       
        $media = Media::where('user_id', $user_id )->orderBy("name")->get();
        
        return response()->json($media);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $name = $request->name;
            $user_id = $request->user_id;
            $name = $request->name;
            $number_of_copies = $request->number_of_copies;
            $description = $request->description;
            $media_type_id = $request->media_type_id;
            
            $media = new Media;
            //$media->user_id = Auth::user()->id;
            $media->user_id = $user_id;
            $media->name = $name;
            $media->description = $description;
            $media->media_type_id = $media_type_id;
            $media->number_of_copies = $number_of_copies;
            $media->save();


         return response()->json('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        $media = Media::find($id);


        $media->delete();


        return response()->json($id);
    }
}
