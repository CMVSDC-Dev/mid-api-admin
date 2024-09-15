<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Return the paginated data with Inertia
        return Inertia::render('Entry/Index');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function fetchAll(Request $request)
    {
        // Build a query
        $query = Entry::query();

        // Capture the searchField and searchValue from the request
        if ($request->searchField && $request->searchValue) {
            // Apply the search filter
            $query->where($request->searchField, 'like', '%' . $request->searchValue . '%');
        }

        // Paginate the results
        $data = $query->orderBy($request->sortBy, $request->sortType)->paginate($request->rowsPerPage);

        // Return the paginated data as JSON
        return response()->json($data);
    }
}
