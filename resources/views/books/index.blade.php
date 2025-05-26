<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
    <!-- Header -->
    <div class="bg-white shadow-lg border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-3 rounded-xl shadow-lg">
                        <i class="fas fa-book text-white text-xl"></i>
                    </div>
                    <div>
                        <h1
                            class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                            Perpustakaan Digital
                        </h1>
                        <p class="text-gray-500 text-sm">Kelola koleksi buku Anda dengan mudah</p>
                    </div>
                </div>
                <div class="hidden sm:flex items-center space-x-2 text-sm text-gray-500">
                    <i class="far fa-calendar-alt"></i>
                    <span id="currentDate"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Action Bar -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-100 p-2 rounded-lg">
                        <i class="fas fa-list text-blue-600"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Daftar Buku</h2>
                        <p class="text-gray-500 text-sm">Total: <span
                                class="font-medium text-blue-600">{{ count($books ?? []) }}</span> buku</p>
                    </div>
                </div>
                <a href="{{ route('books.create') }}"
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 group">
                    <i class="fas fa-plus mr-2 group-hover:rotate-90 transition-transform duration-200"></i>
                    Tambah Buku
                </a>
            </div>
        </div>

        <!-- Books Table -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <!-- Table Header -->
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800">Koleksi Buku</h3>
                    <div class="flex items-center space-x-2 text-sm text-gray-500">
                        <i class="fas fa-filter"></i>
                        <span>Semua Kategori</span>
                    </div>
                </div>
            </div>

            <!-- Table Content -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-book-open text-gray-400"></i>
                                    <span>Judul Buku</span>
                                </div>
                            </th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-tag text-gray-400"></i>
                                    <span>Harga</span>
                                </div>
                            </th>
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-layer-group text-gray-400"></i>
                                    <span>Kategori</span>
                                </div>
                            </th>
                            <th
                                class="px-6 py-4 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <div class="flex items-center justify-end space-x-2">
                                    <i class="fas fa-cogs text-gray-400"></i>
                                    <span>Aksi</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse ($books ?? [] as $index => $book)
                            <tr
                                class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-200 group">
                                <td class="px-6 py-5">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="bg-gradient-to-br from-blue-100 to-indigo-100 p-2 rounded-lg group-hover:shadow-md transition-shadow duration-200">
                                            <i class="fas fa-book text-blue-600 text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $book->name ?? 'Contoh Judul Buku' }}</div>
                                            <div class="text-xs text-gray-500">ID: #{{ $book->id ?? $index + 1 }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-lg font-bold text-green-600">Rp</span>
                                        <span
                                            class="text-sm font-semibold text-gray-900">{{ number_format($book->price ?? 50000, 0, ',', '.') }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-purple-100 to-pink-100 text-purple-800 border border-purple-200">
                                        <i class="fas fa-bookmark mr-1 text-purple-600"></i>
                                        {{ $book->category ?? 'Fiksi' }}
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center justify-end space-x-2">
                                        <a href="{{ route('books.edit', $book->id ?? 1) }}"
                                            class="inline-flex items-center px-3 py-2 text-xs font-medium text-blue-700 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 hover:border-blue-300 transition-all duration-200 group/edit">
                                            <i
                                                class="fas fa-edit mr-1 group-hover/edit:scale-110 transition-transform duration-200"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('books.destroy', $book->id ?? 1) }}" method="POST"
                                            style="display:inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center px-3 py-2 text-xs font-medium text-red-700 bg-red-50 border border-red-200 rounded-lg hover:bg-red-100 hover:border-red-300 transition-all duration-200 group/delete">
                                                <i
                                                    class="fas fa-trash mr-1 group-hover/delete:scale-110 transition-transform duration-200"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="bg-gray-100 p-6 rounded-full">
                                            <i class="fas fa-book-open text-gray-400 text-3xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada buku</h3>
                                            <p class="text-gray-500 text-sm mb-4">Mulai tambahkan buku pertama Anda ke
                                                koleksi</p>
                                            <a href="{{ route('books.create') }}"
                                                class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-200">
                                                <i class="fas fa-plus mr-2"></i>
                                                Tambah Buku Pertama
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div
                class="bg-white rounded-xl shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Buku</p>
                        <p class="text-2xl font-bold text-gray-900">{{ count($books ?? []) }}</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-books text-blue-600"></i>
                    </div>
                </div>
            </div>
            <div
                class="bg-white rounded-xl shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Kategori</p>
                        <p class="text-2xl font-bold text-gray-900">
                            {{ count(array_unique(array_column($books ?? [], 'category'))) ?: 1 }}</p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <i class="fas fa-layer-group text-purple-600"></i>
                    </div>
                </div>
            </div>
            <div
                class="bg-white rounded-xl shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Nilai Total</p>
                        <p class="text-2xl font-bold text-gray-900">Rp
                            {{ number_format(array_sum(array_column($books ?? [], 'price')) ?: 0, 0, ',', '.') }}</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-money-bill-wave text-green-600"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="text-center text-gray-500 text-sm">
                <p>&copy; 2025 Perpustakaan Digital. Kelola buku dengan mudah dan efisien.</p>
            </div>
        </div>
    </footer>

    <script>
        // Set current date
        document.getElementById('currentDate').textContent = new Date().toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        // Add hover effects and animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate stats cards on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');
                    }
                });
            }, observerOptions);

            // Observe stats cards
            document.querySelectorAll('.grid > div').forEach(card => {
                observer.observe(card);
            });
        });
    </script>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-out forwards;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</body>

</html>
