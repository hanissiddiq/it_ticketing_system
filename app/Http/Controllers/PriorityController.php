<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePriorityRequest;
use App\Http\Requests\UpdatePriorityRequest;
use App\Models\Priority;

class PriorityController extends Controller
{
    public function index()
    {
        $priorities = Priority::latest()->get();

        return view('priorities.index', compact('priorities'));
    }

    public function create()
    {
        return view('priorities.create');
    }

    public function store(StorePriorityRequest $request)
    {
        Priority::create($request->validated());

        return redirect()
            ->route('priorities.index')
            ->with('success','Priority berhasil ditambahkan.');
    }

    public function show(Priority $priority)
    {
        return view('priorities.show', compact('priority'));
    }

    public function edit(Priority $priority)
    {
        return view('priorities.edit', compact('priority'));
    }

    public function update(UpdatePriorityRequest $request, Priority $priority)
    {
        $priority->update($request->validated());

        return redirect()
            ->route('priorities.index')
            ->with('success','Priority berhasil diperbarui.');
    }

    public function destroy(Priority $priority)
    {
        $priority->delete();

        return redirect()
            ->route('priorities.index')
            ->with('success','Priority berhasil dihapus.');
    }
}