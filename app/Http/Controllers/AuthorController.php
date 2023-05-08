<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Request $request, string $id)
    {
        $author = Author::withCount('books')->whereId($id)->first();

        if (!$author) {
            return \redirect()->route('books.index')
            ->with('error', __(':item not found.', [
                'item' => __('Author'),
            ]));
        }

        return view('authors.show', [
            'author' => $author,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
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
    public function destroy(Request $request, string $id)
    {
        $author = Author::withCount('books')->whereId($id)->first();

        if (!$author) {
            return \redirect()->route('books.index')
            ->with('error', __(':item not found.', [
                'item' => __('Author'),
            ]));
        }

        $deleted = $author->delete();

        if ($deleted) {
            return \redirect()->route('books.index')
            ->with('success', __(':item deleted succesfuly.', [
                'item' => \sprintf(
                    '%s "(#%d) %s"',
                    __('Author'),
                    $author->id,
                    $author->name,
                ),
            ]));
        }

        return \redirect()->route('books.index')
        ->with('error', __('Fail to delete :item.', [
            'item' => \sprintf(
                '%s "(#%d)"',
                __('Author'),
                $author->id,
            ),
        ]));
    }
}
