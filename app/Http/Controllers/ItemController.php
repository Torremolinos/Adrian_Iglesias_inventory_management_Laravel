<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('items.index', [
            'items' => Item::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'box_id' => 'nullable|exists:boxes,id',
            'picture ' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
        ]);
       
            Item::create($validated);

            return redirect('item')->with('success', 'Item created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $item = Item::findOrFail($item);
        return view('item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'box_id' => 'nullable|exists:boxes,id',
            'picture ' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
        ]);
       
            Item::create($validated);

            return redirect('item')->with('success', 'Item created successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item = Item::findOrFail($item);
        $item->delete();
        return redirect('items')->with('success','Item deleted successfully');
    }
}
