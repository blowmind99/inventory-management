<?php

namespace App\Http\Controllers;

use App\Models\Inventori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class InventoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = DB::table('users')->where('id', auth::user()->id)->first();
        return view('partials.feature.inventori', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventori $inventori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventori $inventori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventori $inventori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventori $inventori)
    {
        //
    }
}
