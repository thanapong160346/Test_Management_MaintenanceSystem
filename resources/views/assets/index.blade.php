<!-- resources/views/assets/index.blade.php -->
<x-layouts.app :title="__('Asset Management')">
    <div class="flex flex-col gap-6 rounded-xl p-6">
        <h1 class="text-2xl font-semibold text-center text-gray-800">Asset List</h1>

        <!-- Search Box -->
        <div class="mb-4 flex justify-between items-center">
            <input type="text" id="search-input" placeholder="Search for assets..." class="px-4 py-2 border rounded-lg shadow-sm w-full md:w-1/2" />
        </div>

        <!-- Table to display assets -->
        <div class="overflow-x-auto">
            <table id="asset-table" class="min-w-full table-auto border-collapse shadow-lg rounded-lg bg-white">
                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Asset ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Asset Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Asset Number</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Unit</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Price</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Registration Date</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody id="asset-body" class="bg-white dark:bg-gray-700">
                    @foreach ($assets as $asset)
                        <tr class="asset-row border-b border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $asset->asset_id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $asset->asset_name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $asset->asset_number }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $asset->asset_countingunit ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $asset->asset_price ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $asset->asset_regis_at }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">
                                <button class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">Edit</button>
                                <button class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">Delete</button>
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
