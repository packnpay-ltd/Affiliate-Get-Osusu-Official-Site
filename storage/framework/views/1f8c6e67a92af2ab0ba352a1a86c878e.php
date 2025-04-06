<!-- Sidebar -->
<aside id="sidebar" class="fixed top-0 left-0 w-64 h-full bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-50 lg:translate-x-0 lg:static lg:translate-x-0">
  <div class="px-6 py-4">
        <!-- Close Icon -->
    <button id="close-sidebar" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
      <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo-Dark" class="mb-6">
            <nav class="mt-6">
              <a href="/dashboard" class="flex gap-2 block py-2.5 px-4 rounded-md hover:bg-purple-200 text-purple-500 font-medium">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd"/>
                </svg>
                Dashboard
              </a>

              <!-- Affiliate Links -->
              <div class="mt-4">
                <p class="px-4 text-xs font-semibold text-gray-500 uppercase">Affiliate</p>
                <a href="<?php echo e(route('affiliate.overview')); ?>" class="flex gap-2 block py-2.5 px-4 rounded-md hover:bg-purple-200 text-gray-600 font-medium">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  Overview
                </a>
                <a href="<?php echo e(route('affiliate.referrals')); ?>" class="flex gap-2 block py-2.5 px-4 rounded-md hover:bg-purple-200 text-gray-600 font-medium">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                  My Referrals
                </a>
                <a href="<?php echo e(route('affiliate.earnings')); ?>" class="flex gap-2 block py-2.5 px-4 rounded-md hover:bg-purple-200 text-gray-600 font-medium">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  Earnings
                </a>
                <a href="<?php echo e(route('affiliate.marketing')); ?>" class="flex gap-2 block py-2.5 px-4 rounded-md hover:bg-purple-200 text-gray-600 font-medium">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                  </svg>
                  Marketing Tools
                </a>
              </div>
            </nav>
      </div>
                  <div class="m-6  relative">
                <div class="rounded-md flex items-center justify-between">
                    <div>
                         <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button
                type="submit"
                class="text-xs font-semibold hover:bg-red-700 text-white bg-red-600 rounded-md px-4 py-2">
                Logout
            </button>
        </form>
                    </div>
                </div>
            </div>
    </aside>

<!-- Toggle Button -->
<button id="menu-toggle" class="fixed top-4 left-4 z-10 bg-purple-600 text-white p-2 rounded-md lg:hidden">
    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
  </svg>
</button>

<!-- JavaScript -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('menu-toggle');
    const closeSidebarButton = document.getElementById('close-sidebar');
    const sidebar = document.getElementById('sidebar');

    toggleButton.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
    });

    closeSidebarButton.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
    });
  });
</script>



<?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views/components/userSidebar.blade.php ENDPATH**/ ?>