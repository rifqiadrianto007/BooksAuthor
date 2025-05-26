<h1>Tambah Buku</h1>

<form method="POST" action="{{ route('books.store') }}">
    @csrf
    <label>Judul :</label>
    <input type="text" name="name"><br>

    <label>Harga :</label>
    <input type="number" name="price"><br>

    <label>Kategori:</label>
    <select name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select><br>

    <button type="submit">Simpan</button>
</form>
