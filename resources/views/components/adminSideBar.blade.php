<aside id="application-sidebar-brand"
                class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 xl:relative xl:flex-shrink-0 border-r-[1px] w-[270px] border-gray-400 bg-white left-sidebar transition-all duration-300">

                <div class="p-5">
                    <a href="/" class="text-nowrap">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo-Dark" class="w-full max-w-[150px]" />
                    </a>
                </div>

                <div class="scroll-sidebar" data-simplebar="">
                    <div class="px-6 mt-8">
                        <nav class="w-full flex flex-col sidebar-nav">
                            <ul id="sidebarnav" class="text-gray-600 text-sm">
                                <li class="text-xs font-bold pb-4">
                                    <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                                    <span>HOME</span>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-white hover:bg-blue-500"
                                        href="{{ route('admin.dashboard') }}">
                                        <i class="ti ti-layout-dashboard text-xl"></i> <span>Dashboard Overview</span>
                                    </a>
                                </li>

                                <li class="text-xs font-bold mb-4 mt-8">
                                    <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                                    <span>COMPONENTS</span>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-white hover:bg-blue-500"
                                        href="{{ route('admin.users.list') }}">
                                        <i class="ti ti-article text-xl"></i> <span>User Management</span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-white hover:bg-blue-500"
                                        href="{{ route('plans.index') }}">
                                        <i class="ti ti-alert-circle text-xl"></i>
                                        <span>Installment Management</span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-white hover:bg-blue-500"
                                        href="{{ route('admin.blog.all') }}">
                                        <i class="ti ti-alert-circle text-xl"></i>
                                        <span>Blog Section</span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-white hover:bg-blue-500"
                                        href="{{ route('products.index') }}">
                                        <i class="ti ti-package text-xl"></i>
                                        <span>Product Management</span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-white hover:bg-blue-500"
                                        href="{{ route('admin.coupons.index') }}">
                                        <i class="ti ti-discount-2 text-xl"></i>
                                        <span>Coupon Management</span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-white hover:bg-blue-500"
                                        href="{{ route('payment.transaction') }}">
                                        <i class="ti ti-cards text-xl"></i> <span>Payment and Transactions</span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-white hover:bg-blue-500"
                                        href="#">
                                        <i class="ti ti-file-description text-xl"></i> <span>Analytics and Reporting</span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-white hover:bg-blue-500"
                                        href="{{ route('support_tickets.index') }}">
                                        <i class="ti ti-typography text-xl"></i> <span>Support and Tickets</span>
                                    </a>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-white hover:bg-blue-500"
                                        href="{{ route('admin.waitlist') }}">
                                        <i class="ti ti-magnet text-xl"></i> <span>Waitlist</span>
                                    </a>
                                </li>

                                <li class="text-xs font-bold mb-4 mt-8">
                                    <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                                    <span>Control</span>
                                </li>

                                <li class="sidebar-item">
                                    <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-white hover:bg-blue-500"
                                        href="">
                                        <i class="ti ti-login text-xl"></i> <span>Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Bottom Upgrade Option -->
                <div class="m-6 relative">
                    <div class="rounded-md flex items-center justify-between">
                        <div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="text-xs font-semibold hover:bg-red-700 text-white bg-red-600 rounded-md px-4 py-2">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </aside>
