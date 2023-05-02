<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Boutique.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fr=new Fournisseur;
        $fr->Nom=$request->input('name');
        $fr->Prenom=$request->input('prenom');
        $fr->Email=$request->input('email');
        $fr->password=$request->input('password');
        $fr->Adresse=$request->input('Adress');
        $fr->Boutiqye=$request->input('boutique');
        $fr->Catrebancaire=$request->input('carte');
        $fr->Telephone=$request->input('phone');
        $fr->save();
        dd("ok");
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
