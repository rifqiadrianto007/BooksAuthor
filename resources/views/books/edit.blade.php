<h1>Edit Buku</h1>

<form method="POST" action="{{ route('books.update', $book->id) }}">
    @csrf
    @method('PUT')

    <label>Judul:</label>
    <input type="text" name="name" value="{{ $book->name }}"><br>

    <label>Harga:</label>
    <input type="number" name="price" value="{{ $book->price }}"><br>

    <label>Kategori:</label>
    <select name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select><br>

    <button type="submit">Update</button>
</form>
