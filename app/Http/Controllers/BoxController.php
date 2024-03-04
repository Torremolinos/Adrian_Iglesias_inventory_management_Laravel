<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Http\Requests\StoreBoxRequest;
use App\Http\Requests\UpdateBoxRequest;
use Illuminate\View\View;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('boxes.index', [
            'boxes' => Box::all(),
            'items' => Item::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('boxes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'label' => 'required|max:255',
                'location' => 'required|max:255',
            ]);

            Box::create($validated);

            return redirect()->route('boxes.index')->with('success', 'Box created successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Box $box): View
    {
        $box->load('items'); // Cargar la relación 'items' para la caja específica
        return view('boxes.show', [
            'box' => $box, // Pasar la instancia de la caja a la vista
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Box $box)
    {

        return view('boxes.edit', compact('box'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Box $box)
    {
        $validated = $request->validate([
            'label' => 'required|max:255',
            'location' => 'required|max:255',
        ]);

        $box->update($validated);

        return redirect('boxes')->with('success', 'Box updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Box $box)
    {
        $box->items()->update(['box_id' => null]);
        $box->delete();

        return redirect('boxes')->with('success', 'Box deleted successfully');
    }
}
