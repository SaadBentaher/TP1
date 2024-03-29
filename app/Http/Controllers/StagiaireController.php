<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $stagiaires = DB::table('stagiaires')->get();
        return view('index', ['stagiaires' => $stagiaires]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'name' => 'required|string',
        'prenom' => 'required|string',
        'classe' => 'required|string',
        'email' => 'required|email',
    ]);

    DB::table('stagiaires')->insert($data);

    return redirect()->route('stagiaires.index')->with('success', 'Stagiaire added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
