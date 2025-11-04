<!-- resources/views/assets/create.blade.php -->
<x-layouts.app :title="__('Add New Asset')">
    <div class="flex flex-col gap-6 rounded-xl p-6 max-w-4xl mx-auto">
        <!-- Header -->
        <div class="flex items-center gap-4">
            <a href="{{ route('assets.index') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">
                <i data-lucide="arrow-left" class="w-6 h-6"></i>
            </a>
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Add New Asset</h1>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative dark:bg-red-900/30 dark:border-red-700 dark:text-red-400" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Create Form -->
        <form action="{{ route('assets.store') }}" method="POST" class="bg-white dark:bg-zinc-900 rounded-2xl shadow-lg p-6 border border-neutral-200 dark:border-neutral-700">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Asset Name -->
                <div class="md:col-span-2">
                    <label for="asset_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Asset Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="asset_name" 
                           id="asset_name" 
                           value="{{ old('asset_name') }}"
                           placeholder="e.g., Dell Laptop XPS 15"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white"
                           required>
                </div>

                <!-- Asset Number -->
                <div>
                    <label for="asset_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Asset Number <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="asset_number" 
                           id="asset_number" 
                           value="{{ old('asset_number') }}"
                           placeholder="e.g., ASSET-001"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white"
                           required>
                </div>

                <!-- Serial Number -->
                <div>
                    <label for="asset_sn_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Serial Number
                    </label>
                    <input type="text" 
                           name="asset_sn_number" 
                           id="asset_sn_number" 
                           value="{{ old('asset_sn_number') }}"
                           placeholder="e.g., SN-XPS-001"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white">
                </div>

                <!-- Counting Unit -->
                <div>
                    <label for="asset_countingunit" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Counting Unit
                    </label>
                    <input type="text" 
                           name="asset_countingunit" 
                           id="asset_countingunit" 
                           value="{{ old('asset_countingunit', 'Unit') }}"
                           placeholder="e.g., Unit, Piece, Set"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white">
                </div>

                <!-- Price -->
                <div>
                    <label for="asset_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Price (฿)
                    </label>
                    <input type="number" 
                           name="asset_price" 
                           id="asset_price" 
                           value="{{ old('asset_price') }}"
                           step="0.01"
                           min="0"
                           placeholder="0.00"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white">
                </div>

                <!-- Registration Date -->
                <div class="md:col-span-2">
                    <label for="asset_regis_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Registration Date
                    </label>
                    <input type="date" 
                           name="asset_regis_at" 
                           id="asset_regis_at" 
                           value="{{ old('asset_regis_at', date('Y-m-d')) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white">
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-4 mt-8">
                <button type="submit" 
                        class="flex-1 px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors flex items-center justify-center gap-2 font-medium">
                    <i data-lucide="plus" class="w-5 h-5"></i>
                    Create Asset
                </button>
                <a href="{{ route('assets.index') }}" 
                   class="flex-1 px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors flex items-center justify-center gap-2 font-medium">
                    <i data-lucide="x" class="w-5 h-5"></i>
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-layouts.app>

<script>
    lucide.createIcons();
</script>

