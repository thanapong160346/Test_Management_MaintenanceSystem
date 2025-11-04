<!-- resources/views/assets/index.blade.php -->
<x-layouts.app :title="__('Asset Management')">
    <div class="flex flex-col gap-6 rounded-xl p-6">
        <!-- Header with Add Button -->
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Asset List</h1>
            <a href="{{ route('assets.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 flex items-center gap-2">
                <i data-lucide="plus" class="w-4 h-4"></i>
                Add Asset
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative dark:bg-green-900/30 dark:border-green-700 dark:text-green-400" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Search Box -->
        <div class="mb-4 flex justify-between items-center">
            <input type="text" id="search-input" placeholder="Search for assets..." class="px-4 py-2 border rounded-lg shadow-sm w-full md:w-1/2 dark:bg-zinc-800 dark:border-zinc-700 dark:text-white" />
        </div>

        <!-- Table to display assets -->
        <div class="overflow-x-auto">
            <table id="asset-table" class="min-w-full table-auto border-collapse shadow-lg rounded-lg bg-white dark:bg-zinc-900">
                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Asset ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Asset Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Asset Number</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Unit</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Price</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Registration Date</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody id="asset-body" class="bg-white dark:bg-zinc-900">
                    @foreach ($assets as $asset)
                        <tr class="asset-row border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $asset->asset_id ?? $asset->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $asset->asset_name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $asset->asset_number }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $asset->asset_countingunit ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">฿{{ number_format($asset->asset_price ?? 0, 2) }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">{{ $asset->asset_regis_at ? $asset->asset_regis_at->format('Y-m-d') : 'N/A' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-200">
                                <div class="flex flex-col md:flex-row gap-2 items-center">
                                    <!-- Edit Button -->
                                    <a href="{{ route('assets.edit', $asset->asset_id ?? $asset->id) }}"
                                       class="px-3 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 flex items-center justify-center gap-1 w-full md:w-auto transition-colors"
                                       title="Edit Asset">
                                        <i data-lucide="edit" class="w-4 h-4"></i>
                                        <span class="md:hidden">Edit</span>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('assets.destroy', $asset->asset_id ?? $asset->id) }}" method="POST" class="w-full md:w-auto" onsubmit="return confirm('Are you sure you want to delete this asset?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 flex items-center justify-center gap-1 w-full transition-colors"
                                                title="Delete Asset">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            <span class="md:hidden">Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div id="pagination-links" class="mt-6 flex justify-center">
            {{ $assets->links('pagination::tailwind') }}  <!-- แสดงปุ่ม Pagination -->
        </div>
    </div>
</x-layouts.app>

<script>
    // JavaScript to filter table rows based on search input
    document.getElementById('search-input').addEventListener('input', function() {
        let filter = this.value.toLowerCase(); // Get the input value
        let rows = document.querySelectorAll('.asset-row'); // Get all rows of the table

        rows.forEach(function(row) {
            let assetId = row.querySelector('td:nth-child(1)').textContent.toLowerCase(); // Asset ID
            let assetName = row.querySelector('td:nth-child(2)').textContent.toLowerCase(); // Asset Name
            let assetNumber = row.querySelector('td:nth-child(3)').textContent.toLowerCase(); // Asset Number

            // Check if any of the columns match the search term
            if (assetId.includes(filter) || assetName.includes(filter) || assetNumber.includes(filter)) {
                row.style.display = ''; // Show row if match found
            } else {
                row.style.display = 'none'; // Hide row if no match
            }
        });
    });
</script>
<script>
  lucide.createIcons();
</script>
