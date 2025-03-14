<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryModel;

class InventoryController extends Controller
{
    public function index()
    {
        $inventoryItems = InventoryModel::all();
        return view('inventory.index', compact('inventoryItems'));
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        InventoryModel::create($validated);
        return redirect('/inventory')->with('success', 'Item added successfully.');
    }

    public function show($id)
    {
        $inventoryItem = InventoryModel::find($id);
        if (!$inventoryItem) {
            return redirect('/inventory')->with('error', 'Item not found.');
        }
        return view('inventory.show', compact('inventoryItem'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $inventoryItem = InventoryModel::find($id);
        if (!$inventoryItem) {
            return redirect('/inventory')->with('error', 'Item not found.');
        }

        $inventoryItem->update($validated);
        return redirect('/inventory')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        $inventoryItem = InventoryModel::find($id);
        if (!$inventoryItem) {
            return redirect('/inventory')->with('error', 'Item not found.');
        }

        $inventoryItem->delete();
        return redirect('/inventory')->with('success', 'Item deleted successfully.');
    }
}
