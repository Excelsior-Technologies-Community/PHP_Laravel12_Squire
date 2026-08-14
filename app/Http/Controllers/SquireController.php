<?php

namespace App\Http\Controllers;

use App\Models\Knight;
use App\Models\Squire;
use Illuminate\Http\Request;

class SquireController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $squires = Squire::with('knight')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('training_level', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('squires.index', compact('squires', 'search'));
    }

    public function create()
    {
        $knights = Knight::all();

        return view('squires.create', compact('knights'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'knight_id' => 'required|exists:knights,id',
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:10|max:100',
            'training_level' => 'required|string|max:100',
        ]);

        Squire::create($request->all());

        return redirect()->route('squires.index')
            ->with('success', 'Squire created successfully.');
    }

    public function show(Squire $squire)
    {
        $squire->load('knight');

        return view('squires.show', compact('squire'));
    }

    public function edit(Squire $squire)
    {
        $knights = Knight::all();

        return view('squires.edit', compact('squire', 'knights'));
    }

    public function update(Request $request, Squire $squire)
    {
        $request->validate([
            'knight_id' => 'required|exists:knights,id',
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:10|max:100',
            'training_level' => 'required|string|max:100',
        ]);

        $squire->update($request->all());

        return redirect()->route('squires.index')
            ->with('success', 'Squire updated successfully.');
    }

    public function destroy(Squire $squire)
    {
        $squire->delete();

        return redirect()->route('squires.index')
            ->with('success', 'Squire deleted successfully.');
    }
}
