<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lemari Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 min-h-screen">
    <!-- Header -->
    <div class="bg-white shadow-lg border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('books.index') }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                    <div class="flex items-center space-x-3">
                        <div class="bg-gradient-to-r from-green-600 to-emerald-600 p-3 rounded-xl shadow-lg">
                            <i class="fas fa-plus text-white text-xl"></i>
                        </div>
                        <div>
                            <h1
                                class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                                Tambah Buku Baru
                            </h1>
                            <p class="text-gray-500 text-sm">Isi form di bawah untuk menambahkan buku ke koleksi</p>
                        </div>
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
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-8 py-6 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-100 p-2 rounded-lg">
                        <i class="fas fa-book-medical text-blue-600"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Informasi Buku</h2>
                        <p class="text-gray-500 text-sm">Lengkapi semua field yang diperlukan</p>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <div class="p-8">
                <form method="POST" action="{{ route('books.store') }}" class="space-y-8" id="bookForm">
                    @csrf

                    <!-- Judul Buku -->
                    <div class="space-y-2">
                        <label for="name" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                            <div class="bg-blue-100 p-1.5 rounded-md mr-3">
                                <i class="fas fa-book-open text-blue-600 text-sm"></i>
                            </div>
                            Judul Buku
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-gray-900 placeholder-gray-400 bg-gray-50 focus:bg-white"
                                placeholder="Masukkan judul buku..." maxlength="255">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-heading text-gray-400"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">
                            <i class="fas fa-info-circle mr-1"></i>
                            Contoh: "Harry Potter dan Batu Bertuah"
                        </p>
                    </div>

                    <!-- Harga -->
                    <div class="space-y-2">
                        <label for="price" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                            <div class="bg-green-100 p-1.5 rounded-md mr-3">
                                <i class="fas fa-tag text-green-600 text-sm"></i>
                            </div>
                            Harga Buku
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative">
                            <input type="number" id="price" name="price" required min="0" step="1000"
                                class="w-full px-4 py-3 pl-16 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 text-gray-900 placeholder-gray-400 bg-gray-50 focus:bg-white"
                                placeholder="0" oninput="formatPrice(this)">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-gray-500 font-medium">Rp</span>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">
                            <i class="fas fa-info-circle mr-1"></i>
                            Masukkan harga dalam Rupiah (contoh: 75000)
                        </p>
                    </div>

                    <!-- Kategori -->
                    <div class="space-y-2">
                        <label for="category_id" class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                            <div class="bg-purple-100 p-1.5 rounded-md mr-3">
                                <i class="fas fa-layer-group text-purple-600 text-sm"></i>
                            </div>
                            Kategori Buku
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative">
                            <select id="category_id" name="category_id" required
                                class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 text-gray-900 bg-gray-50 focus:bg-white appearance-none">
                                <option value="" disabled selected>Pilih kategori buku...</option>
                                @forelse ($categories ?? [] as $category)
                                    <option value="{{ $category->id ?? 1 }}">{{ $category->name ?? 'Kategori Contoh' }}
                                    </option>
                                @empty
                                    <option value="1">Fiksi</option>
                                    <option value="2">Non-Fiksi</option>
                                    <option value="3">Pendidikan</option>
                                    <option value="4">Bisnis</option>
                                    <option value="5">Teknologi</option>
                                @endforelse
                            </select>
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-bookmark text-gray-400"></i>
                            </div>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">
                            <i class="fas fa-info-circle mr-1"></i>
                            Pilih kategori yang sesuai dengan jenis buku
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                        <button type="submit"
                            class="flex-1 inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 group">
                            <i class="fas fa-save mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                            Simpan Buku
                        </button>
                        <button type="reset"
                            class="flex-1 inline-flex items-center justify-center px-6 py-4 bg-gray-100 text-gray-700 font-semibold rounded-xl border-2 border-gray-200 hover:bg-gray-200 hover:border-gray-300 transition-all duration-200 group">
                            <i class="fas fa-undo mr-2 group-hover:rotate-180 transition-transform duration-200"></i>
                            Reset Form
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Help Card -->
        <div class="mt-8 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl border border-blue-200 p-6">
            <div class="flex items-start space-x-4">
                <div class="bg-blue-100 p-2 rounded-lg flex-shrink-0">
                    <i class="fas fa-lightbulb text-blue-600"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-blue-900 mb-2">Tips Menambahkan Buku</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-blue-800">
                        <div class="flex items-start space-x-2">
                            <i class="fas fa-check-circle text-blue-600 mt-0.5 flex-shrink-0"></i>
                            <span>Pastikan judul buku ditulis dengan lengkap dan jelas</span>
                        </div>
                        <div class="flex items-start space-x-2">
                            <i class="fas fa-check-circle text-blue-600 mt-0.5 flex-shrink-0"></i>
                            <span>Harga sebaiknya dalam kelipatan 1000 rupiah</span>
                        </div>
                        <div class="flex items-start space-x-2">
                            <i class="fas fa-check-circle text-blue-600 mt-0.5 flex-shrink-0"></i>
                            <span>Pilih kategori yang paling sesuai dengan isi buku</span>
                        </div>
                        <div class="flex items-start space-x-2">
                            <i class="fas fa-check-circle text-blue-600 mt-0.5 flex-shrink-0"></i>
                            <span>Semua field yang bertanda * wajib diisi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
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

        // Format price input
        function formatPrice(input) {
            let value = input.value.replace(/\D/g, '');
            if (value) {
                // Add thousands separator for display (visual feedback)
                input.setAttribute('data-formatted', new Intl.NumberFormat('id-ID').format(value));
            }
        }

        // Form validation and enhancement
        document.getElementById('bookForm').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const price = document.getElementById('price').value;
            const category = document.getElementById('category_id').value;

            if (!name) {
                e.preventDefault();
                alert('Judul buku harus diisi!');
                document.getElementById('name').focus();
                return;
            }

            if (!price || price <= 0) {
                e.preventDefault();
                alert('Harga buku harus diisi dengan nilai yang valid!');
                document.getElementById('price').focus();
                return;
            }

            if (!category) {
                e.preventDefault();
                alert('Kategori buku harus dipilih!');
                document.getElementById('category_id').focus();
                return;
            }
        });

        // Real-time validation feedback
        document.getElementById('name').addEventListener('input', function() {
            const value = this.value.trim();
            if (value.length > 0) {
                this.classList.remove('border-red-300', 'bg-red-50');
                this.classList.add('border-green-300', 'bg-green-50');
            } else {
                this.classList.remove('border-green-300', 'bg-green-50');
                this.classList.add('border-gray-300', 'bg-gray-50');
            }
        });

        document.getElementById('price').addEventListener('input', function() {
            const value = parseInt(this.value);
            if (value > 0) {
                this.classList.remove('border-red-300', 'bg-red-50');
                this.classList.add('border-green-300', 'bg-green-50');
            } else {
                this.classList.remove('border-green-300', 'bg-green-50');
                this.classList.add('border-gray-300', 'bg-gray-50');
            }
        });

        document.getElementById('category_id').addEventListener('change', function() {
            if (this.value) {
                this.classList.remove('border-red-300', 'bg-red-50');
                this.classList.add('border-green-300', 'bg-green-50');
            } else {
                this.classList.remove('border-green-300', 'bg-green-50');
                this.classList.add('border-gray-300', 'bg-gray-50');
            }
        });

        // Auto-focus on first input
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('name').focus();
        });
    </script>

    <style>
        /* Custom focus styles */
        input:focus,
        select:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
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

        /* Animate form elements */
        .space-y-8>div {
            animation: slideUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .space-y-8>div:nth-child(1) {
            animation-delay: 0.1s;
        }

        .space-y-8>div:nth-child(2) {
            animation-delay: 0.2s;
        }

        .space-y-8>div:nth-child(3) {
            animation-delay: 0.3s;
        }

        .space-y-8>div:nth-child(4) {
            animation-delay: 0.4s;
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</body>

</html>
