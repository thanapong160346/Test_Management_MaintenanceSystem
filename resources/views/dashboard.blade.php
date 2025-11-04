<!-- resources/views/dashboard.blade.php -->
<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6">
        <!-- Welcome Header -->
        <div class="mb-4">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                {{ __('Welcome back') }}, {{ auth()->user()->name }}! 👋
            </h1>
            <p class="mt-2 text-gray-600 dark:text-gray-400">
                {{ __('Here\'s what\'s happening with your system today.') }}
            </p>
        </div>

        <!-- Statistics Cards -->
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            <!-- Total Assets Card -->
            <div class="group relative overflow-hidden rounded-2xl border border-neutral-200 bg-gradient-to-br from-blue-50 to-blue-100 p-6 shadow-lg transition-all hover:shadow-xl dark:border-neutral-700 dark:from-blue-900/20 dark:to-blue-800/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-blue-600 dark:text-blue-400">{{ __('Total Assets') }}</p>
                        <h3 class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($totalAssets) }}</h3>
                        <p class="mt-1 text-xs text-gray-600 dark:text-gray-400">{{ __('Active equipment') }}</p>
                    </div>
                    <div class="rounded-full bg-blue-500/10 p-4">
                        <svg class="h-8 w-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                </div>
                <div class="absolute bottom-0 right-0 h-24 w-24 translate-x-8 translate-y-8 rounded-full bg-blue-500/5"></div>
            </div>

            <!-- Total Repairs Card -->
            <div class="group relative overflow-hidden rounded-2xl border border-neutral-200 bg-gradient-to-br from-purple-50 to-purple-100 p-6 shadow-lg transition-all hover:shadow-xl dark:border-neutral-700 dark:from-purple-900/20 dark:to-purple-800/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-purple-600 dark:text-purple-400">{{ __('Total Repairs') }}</p>
                        <h3 class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($totalRepairs) }}</h3>
                        <p class="mt-1 text-xs text-gray-600 dark:text-gray-400">{{ __('All time requests') }}</p>
                    </div>
                    <div class="rounded-full bg-purple-500/10 p-4">
                        <svg class="h-8 w-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="absolute bottom-0 right-0 h-24 w-24 translate-x-8 translate-y-8 rounded-full bg-purple-500/5"></div>
            </div>

            <!-- Pending Repairs Card -->
            <div class="group relative overflow-hidden rounded-2xl border border-neutral-200 bg-gradient-to-br from-orange-50 to-orange-100 p-6 shadow-lg transition-all hover:shadow-xl dark:border-neutral-700 dark:from-orange-900/20 dark:to-orange-800/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-orange-600 dark:text-orange-400">{{ __('Pending Repairs') }}</p>
                        <h3 class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($pendingRepairs) }}</h3>
                        <p class="mt-1 text-xs text-gray-600 dark:text-gray-400">{{ __('Awaiting action') }}</p>
                    </div>
                    <div class="rounded-full bg-orange-500/10 p-4">
                        <svg class="h-8 w-8 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="absolute bottom-0 right-0 h-24 w-24 translate-x-8 translate-y-8 rounded-full bg-orange-500/5"></div>
            </div>

            <!-- Total Asset Value Card -->
            <div class="group relative overflow-hidden rounded-2xl border border-neutral-200 bg-gradient-to-br from-green-50 to-green-100 p-6 shadow-lg transition-all hover:shadow-xl dark:border-neutral-700 dark:from-green-900/20 dark:to-green-800/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-green-600 dark:text-green-400">{{ __('Total Value') }}</p>
                        <h3 class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">฿{{ number_format($totalAssetValue ?? 0, 2) }}</h3>
                        <p class="mt-1 text-xs text-gray-600 dark:text-gray-400">{{ __('Asset portfolio') }}</p>
                    </div>
                    <div class="rounded-full bg-green-500/10 p-4">
                        <svg class="h-8 w-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="absolute bottom-0 right-0 h-24 w-24 translate-x-8 translate-y-8 rounded-full bg-green-500/5"></div>
            </div>
        </div>

        <!-- Repair Status Overview -->
        <div class="grid gap-6 lg:grid-cols-3">
            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-lg dark:border-neutral-700 dark:bg-zinc-900">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('In Progress') }}</h3>
                    <span class="rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                        {{ $inProgressRepairs }}
                    </span>
                </div>
                <div class="mt-4">
                    <div class="h-2 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700">
                        <div class="h-full rounded-full bg-blue-500" style="width: {{ $totalRepairs > 0 ? ($inProgressRepairs / $totalRepairs * 100) : 0 }}%"></div>
                    </div>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        {{ $totalRepairs > 0 ? number_format(($inProgressRepairs / $totalRepairs * 100), 1) : 0 }}% {{ __('of total repairs') }}
                    </p>
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-lg dark:border-neutral-700 dark:bg-zinc-900">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('Completed') }}</h3>
                    <span class="rounded-full bg-green-100 px-3 py-1 text-sm font-medium text-green-800 dark:bg-green-900/30 dark:text-green-400">
                        {{ $completedRepairs }}
                    </span>
                </div>
                <div class="mt-4">
                    <div class="h-2 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700">
                        <div class="h-full rounded-full bg-green-500" style="width: {{ $totalRepairs > 0 ? ($completedRepairs / $totalRepairs * 100) : 0 }}%"></div>
                    </div>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        {{ $totalRepairs > 0 ? number_format(($completedRepairs / $totalRepairs * 100), 1) : 0 }}% {{ __('of total repairs') }}
                    </p>
                </div>
            </div>

            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-lg dark:border-neutral-700 dark:bg-zinc-900">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('Success Rate') }}</h3>
                    <span class="rounded-full bg-purple-100 px-3 py-1 text-sm font-medium text-purple-800 dark:bg-purple-900/30 dark:text-purple-400">
                        {{ $totalRepairs > 0 ? number_format(($completedRepairs / $totalRepairs * 100), 1) : 0 }}%
                    </span>
                </div>
                <div class="mt-4">
                    <div class="h-2 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700">
                        <div class="h-full rounded-full bg-purple-500" style="width: {{ $totalRepairs > 0 ? ($completedRepairs / $totalRepairs * 100) : 0 }}%"></div>
                    </div>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Completion efficiency') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Recent Activities Section -->
        <div class="grid gap-6 lg:grid-cols-2">
            <!-- Recent Repairs -->
            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-lg dark:border-neutral-700 dark:bg-zinc-900">
                <div class="mb-6 flex items-center justify-between">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ __('Recent Repairs') }}</h3>
                    <a href="{{ route('repairs.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                        {{ __('View all') }} →
                    </a>
                </div>
                <div class="space-y-4">
                    @forelse($recentRepairs as $repair)
                        <div class="flex items-center justify-between rounded-lg border border-gray-200 p-4 transition-all hover:border-blue-300 hover:shadow-md dark:border-gray-700 dark:hover:border-blue-600">
                            <div class="flex items-center space-x-4">
                                <div class="rounded-full bg-blue-100 p-2 dark:bg-blue-900/30">
                                    <svg class="h-5 w-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 dark:text-white">{{ $repair->name ?? 'N/A' }}</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $repair->created_at ? $repair->created_at->diffForHumans() : 'N/A' }}</p>
                                </div>
                            </div>
                            <span class="rounded-full px-3 py-1 text-xs font-medium
                                @if($repair->status === 'completed') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400
                                @elseif($repair->status === 'in_progress') bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400
                                @else bg-orange-100 text-orange-800 dark:bg-orange-900/30 dark:text-orange-400
                                @endif">
                                {{ ucfirst(str_replace('_', ' ', $repair->status ?? 'pending')) }}
                            </span>
                        </div>
                    @empty
                        <div class="py-8 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ __('No recent repairs') }}</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Recent Assets -->
            <div class="rounded-2xl border border-neutral-200 bg-white p-6 shadow-lg dark:border-neutral-700 dark:bg-zinc-900">
                <div class="mb-6 flex items-center justify-between">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ __('Recent Assets') }}</h3>
                    <a href="{{ route('assets.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                        {{ __('View all') }} →
                    </a>
                </div>
                <div class="space-y-4">
                    @forelse($recentAssets as $asset)
                        <div class="flex items-center justify-between rounded-lg border border-gray-200 p-4 transition-all hover:border-green-300 hover:shadow-md dark:border-gray-700 dark:hover:border-green-600">
                            <div class="flex items-center space-x-4">
                                <div class="rounded-full bg-green-100 p-2 dark:bg-green-900/30">
                                    <svg class="h-5 w-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 dark:text-white">{{ $asset->asset_name ?? 'N/A' }}</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $asset->asset_number ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-gray-900 dark:text-white">฿{{ number_format($asset->asset_price ?? 0, 2) }}</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">{{ $asset->created_at ? $asset->created_at->diffForHumans() : 'N/A' }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="py-8 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ __('No recent assets') }}</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="rounded-2xl border border-neutral-200 bg-gradient-to-r from-blue-50 to-purple-50 p-6 shadow-lg dark:border-neutral-700 dark:from-blue-900/10 dark:to-purple-900/10">
            <h3 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{ __('Quick Actions') }}</h3>
            <div class="grid gap-4 md:grid-cols-3">
                <a href="{{ route('assets.index') }}" class="group flex items-center space-x-4 rounded-xl border border-blue-200 bg-white p-4 transition-all hover:border-blue-400 hover:shadow-md dark:border-blue-800 dark:bg-zinc-900 dark:hover:border-blue-600">
                    <div class="rounded-full bg-blue-100 p-3 dark:bg-blue-900/30">
                        <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white">{{ __('Add Asset') }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Register new equipment') }}</p>
                    </div>
                </a>

                <a href="{{ route('repairs.index') }}" class="group flex items-center space-x-4 rounded-xl border border-purple-200 bg-white p-4 transition-all hover:border-purple-400 hover:shadow-md dark:border-purple-800 dark:bg-zinc-900 dark:hover:border-purple-600">
                    <div class="rounded-full bg-purple-100 p-3 dark:bg-purple-900/30">
                        <svg class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white">{{ __('Report Repair') }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Submit repair request') }}</p>
                    </div>
                </a>

                <a href="{{ route('dashboard') }}" class="group flex items-center space-x-4 rounded-xl border border-green-200 bg-white p-4 transition-all hover:border-green-400 hover:shadow-md dark:border-green-800 dark:bg-zinc-900 dark:hover:border-green-600">
                    <div class="rounded-full bg-green-100 p-3 dark:bg-green-900/30">
                        <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white">{{ __('View Reports') }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Analytics & insights') }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
