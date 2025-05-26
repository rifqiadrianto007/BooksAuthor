<!DOCTYPE html>
<html>

<head>
    <title>Daftar Buku</title>
</head>

<body>
    <h1>Daftar Buku</h1>

    <a href="{{ route('books.create') }}">+ Tambah Buku</a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->category }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}">Edit</a> |
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
