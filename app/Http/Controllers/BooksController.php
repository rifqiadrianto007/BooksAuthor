<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Books;
use App\Models\Category;

class BooksController extends Controller
{
    // Tampilkan semua buku (RAW QUERY)
    public function index()
    {
        $books = DB::select("
            SELECT books.*, categories.name as category
            FROM books
            JOIN categories ON books.category_id = categories.id
        ");

        return view('books.index', compact('books'));
    }

    // Tampilkan form tambah buku
    public function create()
    {
        $categories = Category::all(); // ORM
        return view('books.create', compact('categories'));
    }

    // Simpan buku baru (ORM)
    public function store(Request $request)
    {
        Books::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('books.index');
    }

    // Tampilkan form edit buku
    public function edit($id)
    {
        $book = Books::findOrFail($id); // ORM
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    // Update buku (QUERY BUILDER)
    public function update(Request $request, $id)
    {
        DB::table('books')
            ->where('id', $id)
            ->update([
                'name' => $request->name,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'updated_at' => now(),
            ]);

        return redirect()->route('books.index');
    }

    // Hapus buku (ORM)
    public function destroy($id)
    {
        Books::findOrFail($id)->delete();
        return redirect()->route('books.index');
    }
}
