<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        /* Consult DB */
        $data['favorites']=Favorite::paginate(5);
        return view('favorites.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('favorites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //      
        $fields=[
            'Título'=>'required|string|max:100',
            'Tema'=>'required|string|max:100',
            'URL'=>'required|string|max:100',
        ];

        $message=[
            'required'=>'El campo :ATTRIBUTE es necesario'
        ];

        $this->validate($request, $fields, $message);

        /* Create data without token */
        $favoriteData = $request->except('_token');
        /* Insert data */
        Favorite::insert($favoriteData);
        /* Return data */
        return redirect('favorites')->with('message', 'Registro agregado a tu colección de favoritos satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
        $favorite=Favorite::findOrFail($id);
        return view('favorites.edit', compact('favorite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $fields=[
            'Título'=>'required|string|max:100',
            'Tema'=>'required|string|max:100',
            'URL'=>'required|string|max:100',
        ];

        $message=[
            'required'=>'El campo :ATTRIBUTE es necesario'
        ];

        $this->validate($request, $fields, $message);

        /* Update all except token and method */
        $favoriteData = $request->except(['_token','_method']);
        /* Search register with the same id */
        Favorite::where('id','=',$id)->update($favoriteData); 
        /* Update all data */
        $favorite=Favorite::findOrFail($id);
        /* Return the current data */
        return redirect('favorites')->with('message','Registro editado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $favorite=Favorite::findOrFail($id);
        Favorite::destroy($id);
        return redirect('favorites')->with('message','Registro eliminado de tu colección de favoritos satisfactoriamente');
    }
}
