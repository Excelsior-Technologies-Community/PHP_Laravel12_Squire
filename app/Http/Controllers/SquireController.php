<?php

namespace App\Http\Controllers;

use App\Models\Squire;
use App\Models\Knight;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SquireController extends Controller
{
    public function index(): View
    {
        $squires = Squire::with('knight')->latest()->paginate(10);
        return view('squires.index', compact('squires'));
    }

    public function create(): View
    {
        $knights = Knight::all();
        return view('squires.create', compact('knights'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:10|max:30',
            'training_level' => 'required|in:beginner,intermediate,advanced',
            'knight_id' => 'required|exists:knights,id',
        ]);

        Squire::create($validated);

        return redirect()->route('squires.index')
            ->with('success', 'Squire assigned successfully!');
    }

    public function show(Squire $squire): View
    {
        return view('squires.show', compact('squire'));
    }

    public function edit(Squire $squire): View
    {
        $knights = Knight::all();
        return view('squires.edit', compact('squire', 'knights'));
    }

    public function update(Request $request, Squire $squire): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:10|max:30',
            'training_level' => 'required|in:beginner,intermediate,advanced',
            'knight_id' => 'required|exists:knights,id',
        ]);

        $squire->update($validated);

        return redirect()->route('squires.index')
            ->with('success', 'Squire updated successfully!');
    }

    public function destroy(Squire $squire): RedirectResponse
    {
        $squire->delete();

        return redirect()->route('squires.index')
            ->with('success', 'Squire dismissed successfully!');
    }
}