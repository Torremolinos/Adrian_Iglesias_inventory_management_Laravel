<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Http\Requests\StoreBoxRequest;
use App\Http\Requests\UpdateBoxRequest;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boxes = Box::all();
        return view('box.index', compact('box'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('box.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBoxRequest $request)
    {
        $validated = $request->validate([
            'label' => 'required|max:255',
            'local' => 'required|max:255',
        ]);
        
        Box::create($validated);

        return redirect('boxes')->with('success','Box created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Box $box)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Box $box)
    {
        $box = Box::findOrFail($box);
        return view('boxes.edit', compact('box'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoxRequest $request, Box $box)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'picture ' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
        ]);
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('public/pictures');
            $validated['picture'] = $path;

        }
        Box::create($validated);

        return redirect('boxes')->with('success','Box created successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Box $box)
    {
        $box = Box::findOrFail($box);
        $box->delete();
        return redirect('boxes')->with('success','Box deleted successfully');
    }
}
