<!DOCTYPE html>
<html>

<head>
    <title>Daftar Buku (Metode: {{ $method }})</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Daftar Buku (Metode: {{ $method }})</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <p><a href="{{ route('books.create') }}">Tambah Buku Baru</a></p>

    @if (count($books) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>
                            @if ($method === 'Eloquent ORM')
                                {{ $book->author->name ?? 'N/A' }}
                            @elseif($method === 'Query Builder' || $method === 'Raw SQL')
                                {{ $book->author_name ?? 'N/A' }}
                            @endif
                        </td>
                        <td>{{ $book->publication_year ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('books.show', $book->id) }}">Lihat</a> |
                            <a href="{{ route('books.edit', $book->id) }}">Edit</a> |
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Anda yakin ingin menghapus buku ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada data buku.</p>
    @endif
</body>

</html>
