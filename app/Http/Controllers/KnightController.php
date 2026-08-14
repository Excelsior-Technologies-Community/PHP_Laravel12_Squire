<?php

namespace App\Http\Controllers;

use App\Models\Knight;
use Illuminate\Http\Request;

class KnightController extends Controller
{
    public function index(Request $request)
    {
        $query = Knight::withTrashed()
            ->withCount('squires');

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%");
            });
        }

        if ($request->filled('age')) {

            $query->where('age', $request->age);
        }

        $knights = $query
            ->oldest()
            ->paginate(3)
            ->withQueryString();

        return view('knights.index', compact('knights'));
    }

    public function create()
    {
        return view('knights.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
        ]);

        Knight::create($request->all());

        return redirect()->route('knights.index')
            ->with('success', 'Knight created successfully.');
    }

    public function show(Knight $knight)
    {
        $knight->load('squires');

        return view('knights.show', compact('knight'));
    }

    public function edit(Knight $knight)
    {
        return view('knights.edit', compact('knight'));
    }

    public function update(Request $request, Knight $knight)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'experience' => 'required|integer|min:0',
        ]);

        $knight->update($request->all());

        return redirect()->route('knights.index')
            ->with('success', 'Knight updated successfully.');
    }

    public function destroy(Knight $knight)
    {
        $knight->delete();

        return redirect()->route('knights.index')
            ->with('success', 'Knight deleted successfully.');
    }

    public function restore($id)
    {
        $knight = Knight::withTrashed()->findOrFail($id);

        $knight->restore();

        return redirect()
            ->route('knights.index')
            ->with('success', 'Knight restored successfully.');
    }
}
