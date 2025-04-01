<x-app-layout>
    <main>
        <!-- Header -->
        <header class="container w-full text-sm py-5 xl:px-9 px-5">
            @include('components.adminNavBar')
        </header>

                <!-- Main Content -->
                <main class="h-full pt-4">

                    <div class="container mx-auto px-4">
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <h4 class="text-gray-800 text-2xl font-semibold">Coupon Details</h4>
                                <p class="text-sm text-gray-600 mt-1">Code: <span class="font-mono">{{ $coupon->code }}</span></p>
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('admin.coupons.edit', $coupon) }}"
                                   class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                    Edit Coupon
                                </a>
                                <a href="{{ route('admin.coupons.index') }}"
                                   class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                                    Back to List
                                </a>
                            </div>
                        </div>

                        <!-- Coupon Details Card -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                            <!-- Basic Information -->
                            <div class="bg-white p-6 rounded-lg shadow">
                                <h5 class="text-lg font-semibold mb-4">Coupon Information</h5>
                                <dl class="grid grid-cols-2 gap-4">
                                    <div>
                                        <dt class="text-sm text-gray-600">Type</dt>
                                        <dd class="font-medium capitalize">{{ $coupon->type }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm text-gray-600">Status</dt>
                                        <dd>
                                            <span class="px-2 py-1 rounded-full text-sm
                                                {{ $coupon->status === 'Active' ? 'bg-green-100 text-green-800' :
                                                   ($coupon->status === 'Expired' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                                {{ $coupon->status }}
                                            </span>
                                        </dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm text-gray-600">Expiration</dt>
                                        <dd>{{ $coupon->expires_at->format('M j, Y \a\t g:i A') }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm text-gray-600">Minimum Order</dt>
                                        <dd>{{ $coupon->minimum_order ? '$'.number_format($coupon->minimum_order, 2) : 'None' }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm text-gray-600">Max Uses</dt>
                                        <dd>{{ $coupon->max_uses ?? 'Unlimited' }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm text-gray-600">Times Used</dt>
                                        <dd>{{ $coupon->used_count }}</dd>
                                    </div>
                                </dl>
                            </div>

                            <!-- Discount Details -->
                            <div class="bg-white p-6 rounded-lg shadow">
                                <h5 class="text-lg font-semibold mb-4">Discount Details</h5>
                                <div class="space-y-3">
                                    @if($coupon->type === 'percentage')
                                        <p class="text-2xl font-bold text-purple-600">
                                            {{ $coupon->discount_percentage }}% Off
                                        </p>
                                    @elseif($coupon->type === 'fixed')
                                        <p class="text-2xl font-bold text-purple-600">
                                            ${{ number_format($coupon->discount_fixed, 2) }} Off
                                        </p>
                                    @else
                                        <p class="text-2xl font-bold text-purple-600">
                                            Free Shipping
                                        </p>
                                    @endif

                                    <div class="mt-4">
                                        <p class="text-sm text-gray-600">Created:
                                            {{ $coupon->created_at->diffForHumans() }} ({{ $coupon->created_at->format('M j, Y') }})
                                        </p>
                                        <p class="text-sm text-gray-600">Last Updated:
                                            {{ $coupon->updated_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Usage Statistics -->
                        <div class="bg-white p-6 rounded-lg shadow mb-8">
                            <h5 class="text-lg font-semibold mb-4">Redemption History</h5>

                            @if($users->isEmpty())
                                <div class="text-center py-6 text-gray-500">
                                    No redemptions yet
                                </div>
                            @else
                                <div class="overflow-x-auto">
                                    <table class="table-auto w-full border-collapse">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">User</th>
                                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Email</th>
                                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Redeemed At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                                <tr class="border-t hover:bg-gray-50">
                                                    <td class="px-4 py-3">{{ $user->name }}</td>
                                                    <td class="px-4 py-3">{{ $user->email }}</td>
                                                    <td class="px-4 py-3">
                                                        {{ $user->pivot->used_at ? $user->pivot->used_at->format('M j, Y g:i A') : 'Not available' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4">
                                    {{ $users->links() }}
                                </div>
                            @endif
                        </div>

                        <!-- Additional Stats -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                            <div class="bg-white p-4 rounded-lg shadow text-center">
                                <div class="text-sm text-gray-600">Days Remaining</div>
                                <div class="text-2xl font-bold mt-1 {{ $coupon->expires_at->isPast() ? 'text-red-600' : 'text-green-600' }}">
                                    {{ max(0, now()->diffInDays($coupon->expires_at, false)) }}
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow text-center">
                                <div class="text-sm text-gray-600">Usage Rate</div>
                                <div class="text-2xl font-bold mt-1 text-purple-600">
                                    @if($coupon->max_uses)
                                        {{ number_format(($coupon->used_count / $coupon->max_uses) * 100, 1) }}%
                                    @else
                                        &infin;
                                    @endif
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded-lg shadow text-center">
                                <div class="text-sm text-gray-600">Average Redemptions/Day</div>
                                <div class="text-2xl font-bold mt-1 text-blue-600">
                                    @php
                                        $daysActive = max(1, $coupon->created_at->diffInDays());
                                        $rate = $coupon->used_count / $daysActive;
                                    @endphp
                                    {{ number_format($rate, 1) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
    </main>
</x-app-layout>