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
                        <div class="bg-gradient-to-r from-amber-600 to-orange-600 p-3 rounded-xl shadow-lg">
                            <i class="fas fa-edit text-white text-xl"></i>
                        </div>
                        <div>
                            <h1
                                class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                                Edit Buku
                            </h1>
                            <p class="text-gray-500 text-sm">Perbarui informasi buku yang sudah ada</p>
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
        <!-- Current Book Info -->
        <div class="bg-gradient-to-r from-amber-50 to-orange-50 rounded-2xl border border-amber-200 p-6 mb-8">
            <div class="flex items-center space-x-4">
                <div class="bg-amber-100 p-3 rounded-xl">
                    <i class="fas fa-book text-amber-600 text-xl"></i>
                </div>
                <div class="flex-1">
                    <h2 class="text-lg font-semibold text-amber-900">Buku yang sedang diedit</h2>
                    <div class="flex flex-wrap items-center gap-4 mt-2 text-sm text-amber-800">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-book-open"></i>
                            <span class="font-medium">{{ $book->name ?? 'Contoh Judul Buku' }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-tag"></i>
                            <span>Rp {{ number_format($book->price ?? 75000, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-bookmark"></i>
                            <span>ID: #{{ $book->id ?? 1 }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-8 py-6 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-100 p-2 rounded-lg">
                        <i class="fas fa-pencil-alt text-blue-600"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Form Edit Buku</h2>
                        <p class="text-gray-500 text-sm">Ubah informasi buku sesuai kebutuhan</p>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <div class="p-8">
                <form method="POST" action="{{ route('books.update', $book->id ?? 1) }}" class="space-y-8"
                    id="editBookForm">
                    @csrf
                    @method('PUT')

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
                                value="{{ $book->name ?? 'Contoh Judul Buku' }}"
                                class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-gray-900 placeholder-gray-400 bg-gray-50 focus:bg-white"
                                placeholder="Masukkan judul buku..." maxlength="255">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-heading text-gray-400"></i>
                            </div>
                        </div>
                        <div class="flex items-center justify-between text-xs text-gray-500 mt-1">
                            <span>
                                <i class="fas fa-info-circle mr-1"></i>
                                Judul saat ini akan diperbarui
                            </span>
                            <span id="nameCounter" class="text-gray-400">0/255</span>
                        </div>
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
                            <input type="number" id="price" name="price" required min="0" step="1"
                                value="{{ $book->price ?? 75000 }}"
                                class="w-full px-4 py-3 pl-16 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 text-gray-900 placeholder-gray-400 bg-gray-50 focus:bg-white"
                                placeholder="0" oninput="formatPrice(this)">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-gray-500 font-medium">Rp</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between text-xs text-gray-500 mt-1">
                            <span>
                                <i class="fas fa-info-circle mr-1"></i>
                                Harga saat ini: <span class="font-medium text-green-600">Rp
                                    {{ number_format($book->price ?? 75000, 0, ',', '.') }}</span>
                            </span>
                            <span id="priceFormatted" class="text-gray-400"></span>
                        </div>
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
                                @forelse ($categories ?? [] as $category)
                                    <option value="{{ $category->id ?? 1 }}"
                                        {{ ($category->id ?? 1) == ($book->category_id ?? 1) ? 'selected' : '' }}>
                                        {{ $category->name ?? 'Kategori Contoh' }}
                                    </option>
                                @empty
                                    <option value="1" {{ 1 == ($book->category_id ?? 1) ? 'selected' : '' }}>
                                        Novel</option>
                                    <option value="2" {{ 2 == ($book->category_id ?? 1) ? 'selected' : '' }}>
                                        Komik</option>
                                    <option value="3" {{ 3 == ($book->category_id ?? 1) ? 'selected' : '' }}>
                                        Buku Pelajaran</option>
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
                            Kategori akan diperbarui dari pilihan saat ini
                        </p>
                    </div>

                    <!-- Change Summary -->
                    <div id="changeSummary" class="hidden bg-blue-50 border border-blue-200 rounded-xl p-4">
                        <div class="flex items-center space-x-2 mb-3">
                            <i class="fas fa-exclamation-circle text-blue-600"></i>
                            <h4 class="font-semibold text-blue-900">Perubahan yang akan disimpan:</h4>
                        </div>
                        <div id="changesList" class="space-y-1 text-sm text-blue-800"></div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                        <button type="submit"
                            class="flex-1 inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-amber-600 to-orange-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 group">
                            <i class="fas fa-save mr-2 group-hover:scale-110 transition-transform duration-200"></i>
                            Update Buku
                        </button>
                        <button type="reset"
                            class="flex-1 inline-flex items-center justify-center px-6 py-4 bg-gray-100 text-gray-700 font-semibold rounded-xl border-2 border-gray-200 hover:bg-gray-200 hover:border-gray-300 transition-all duration-200 group"
                            onclick="resetToOriginal()">
                            <i class="fas fa-undo mr-2 group-hover:rotate-180 transition-transform duration-200"></i>
                            Reset ke Asli
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="text-center text-gray-500 text-sm">
                <p>&copy; 2025 Lemari Buku. Kelola buku dengan mudah dan efisien.</p>
            </div>
        </div>
    </footer>

    <script>
        // Original data for reset functionality
        const originalData = {
            name: '{{ $book->name ?? 'Contoh Judul Buku' }}',
            price: {{ $book->price ?? 75000 }},
            category_id: {{ $book->category_id ?? 1 }}
        };

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
                document.getElementById('priceFormatted').textContent =
                    'Format: Rp ' + new Intl.NumberFormat('id-ID').format(value);
            } else {
                document.getElementById('priceFormatted').textContent = '';
            }
        }

        // Reset to original values
        function resetToOriginal() {
            document.getElementById('name').value = originalData.name;
            document.getElementById('price').value = originalData.price;
            document.getElementById('category_id').value = originalData.category_id;

            // Update counters and formatters
            updateNameCounter();
            formatPrice(document.getElementById('price'));
            checkForChanges();

            // Reset visual feedback
            resetFormValidation();
        }

        // Update name character counter
        function updateNameCounter() {
            const nameInput = document.getElementById('name');
            const counter = document.getElementById('nameCounter');
            counter.textContent = `${nameInput.value.length}/255`;
        }

        // Check for changes and show summary
        function checkForChanges() {
            const currentName = document.getElementById('name').value.trim();
            const currentPrice = parseInt(document.getElementById('price').value) || 0;
            const currentCategory = document.getElementById('category_id').value;

            const changes = [];

            if (currentName !== originalData.name) {
                changes.push(`Judul: "${originalData.name}" → "${currentName}"`);
            }

            if (currentPrice !== originalData.price) {
                changes.push(
                    `Harga: Rp ${new Intl.NumberFormat('id-ID').format(originalData.price)} → Rp ${new Intl.NumberFormat('id-ID').format(currentPrice)}`
                );
            }

            if (currentCategory != originalData.category_id) {
                const oldCategoryText = document.querySelector(`option[value="${originalData.category_id}"]`)
                    ?.textContent || 'Unknown';
                const newCategoryText = document.querySelector(`option[value="${currentCategory}"]`)?.textContent ||
                    'Unknown';
                changes.push(`Kategori: "${oldCategoryText}" → "${newCategoryText}"`);
            }

            const summaryDiv = document.getElementById('changeSummary');
            const changesList = document.getElementById('changesList');

            if (changes.length > 0) {
                changesList.innerHTML = changes.map(change =>
                    `<div class="flex items-center space-x-2">
                        <i class="fas fa-arrow-right text-blue-600"></i>
                        <span>${change}</span>
                    </div>`
                ).join('');
                summaryDiv.classList.remove('hidden');
            } else {
                summaryDiv.classList.add('hidden');
            }
        }

        // Reset form validation styles
        function resetFormValidation() {
            const inputs = ['name', 'price', 'category_id'];
            inputs.forEach(id => {
                const element = document.getElementById(id);
                element.classList.remove('border-red-300', 'bg-red-50', 'border-green-300', 'bg-green-50');
                element.classList.add('border-gray-300', 'bg-gray-50');
            });
        }

        // Form validation and enhancement
        document.getElementById('editBookForm').addEventListener('submit', function(e) {
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

            // Confirm if there are changes
            const summaryDiv = document.getElementById('changeSummary');
            if (!summaryDiv.classList.contains('hidden')) {
                if (!confirm('Apakah Anda yakin ingin menyimpan perubahan ini?')) {
                    e.preventDefault();
                    return;
                }
            }
        });

        // Real-time validation and change detection
        document.getElementById('name').addEventListener('input', function() {
            updateNameCounter();
            checkForChanges();

            const value = this.value.trim();
            if (value.length > 0) {
                this.classList.remove('border-red-300', 'bg-red-50');
                this.classList.add('border-green-300', 'bg-green-50');
            } else {
                this.classList.remove('border-green-300', 'bg-green-50');
                this.classList.add('border-red-300', 'bg-red-50');
            }
        });

        document.getElementById('price').addEventListener('input', function() {
            formatPrice(this);
            checkForChanges();

            const value = parseInt(this.value);
            if (value > 0) {
                this.classList.remove('border-red-300', 'bg-red-50');
                this.classList.add('border-green-300', 'bg-green-50');
            } else {
                this.classList.remove('border-green-300', 'bg-green-50');
                this.classList.add('border-red-300', 'bg-red-50');
            }
        });

        document.getElementById('category_id').addEventListener('change', function() {
            checkForChanges();

            if (this.value) {
                this.classList.remove('border-red-300', 'bg-red-50');
                this.classList.add('border-green-300', 'bg-green-50');
            }
        });

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateNameCounter();
            formatPrice(document.getElementById('price'));
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

        .space-y-8>div:nth-child(5) {
            animation-delay: 0.5s;
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Highlight changed fields */
        .field-changed {
            background: linear-gradient(90deg, #fef3c7, #ffffff) !important;
            border-color: #f59e0b !important;
        }
    </style>
</body>

</html>
