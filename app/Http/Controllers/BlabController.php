<?php

namespace App\Http\Controllers;

use App\Models\Blab;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;


class BlabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('blabs.index', [
            'blabs' => Blab::with('user')->latest()->get(),
        ]);
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
    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->blabs()->create($validated);

        return redirect(route('blabs.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Blab $blab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blab $blab) : View
    {
        $this->authorize('update', $blab);

        return view('blabs.edit',[
            'blab' => $blab
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blab $blab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blab $blab)
    {
        //
    }
}
