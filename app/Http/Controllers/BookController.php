<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\BookFormRequest;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orderBy = $request->input('order_by', 'id');
        $sortOrder = $request->input('sort', 'ASC');
        $perPage = $request->integer('per_page', 20);
        $query = Book::query()->with([
            'author' => fn ($query) => $query->select('id', 'name'),
        ]);

        $orderBy = \is_string($orderBy) && \in_array($orderBy, [
            'id',
            'title',
            'description',
            'author_id',
            'page_count',
            'created_at',
        ]) ? $orderBy : 'id';

        $sortOrder = \is_string($sortOrder) && \in_array(\strtoupper($sortOrder), ['ASC', 'DESC']) ? $sortOrder : 'ASC';

        $query = $query->orderBy($orderBy, $sortOrder);

        return view('books.index', [
            'books' => $query->paginate($perPage),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return \view(
            'books.form',
            [
                'authors' => Author::authorList(),
                'type' => 'create',
                'title' => __('New :item', ['item' => __('book')]),
                'action' => route('books.store')
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookFormRequest $request)
    {
        $book = Book::create($request->only([
            'title',
            'description',
            'author_id',
            'page_count',
        ]));

        if ($book) {
            return \redirect()->route('books.index')
                ->with('success', \sprintf(
                    '%s: %s (#%d)',
                    __(':item created successfuly', ['item' => __('Book')]),
                    $book?->title,
                    $book?->id,
                ));
        }

        return back()->with('error', __('Fail on update :item.', [
            'item' => __('Book'),
        ]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Book $book)
    {
        return view('books.show', [
            'book' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Book $book)
    {
        return \view(
            'books.form',
            [
                'authors' => Author::authorList(),
                'type' => 'edit',
                'title' => \sprintf(
                    '%s: %s (#%d)',
                    __('Editing :item', ['item' => __('book')]),
                    $book->title,
                    $book->id,
                ),
                'book' => $book,
                'action' => route('books.update', $book->id)
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookFormRequest $request, Book $book)
    {
        $updated = $book->update($request->only([
            'title',
            'description',
            'author_id',
            'page_count',
        ]));

        if ($updated) {
            return \redirect()->route('books.index')
                ->with('success', \sprintf(
                    '%s: %s (#%d)',
                    __(':item updated successfuly', ['item' => __('Book')]),
                    $book?->title,
                    $book?->id,
                ));
        }

        return back()->with('error', __('Fail on update :item.', [
            'item' => __('Book'),
        ]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Book $book)
    {
        $deleted = $book->delete();

        if ($deleted) {
            return \redirect()->route('books.index')
            ->with('success', __(':item deleted succesfuly.', [
                'item' => \sprintf(
                    '%s "(#%d) %s"',
                    __('Book'),
                    $book->id,
                    $book->title,
                ),
            ]));
        }

        return \redirect()->route('books.index')
        ->with('error', __('Fail to delete :item.', [
            'item' => \sprintf(
                '%s "(#%d)"',
                __('Book'),
                $book->id,
            ),
        ]));
    }
}
