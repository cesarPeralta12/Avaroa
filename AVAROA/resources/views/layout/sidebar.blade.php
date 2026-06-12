@php
    $isSuperAdmin = $user_session->is_super_admin;
@endphp
@if ($isSuperAdmin)
    <div class="sidebar-wrapper">
        <div>
            <div class="logo-wrapper"><a href="{{ route('dashboard') }}"><img class=" for-light" src="<?php echo '/' . $general_setting['app_logo'] ?? ''; ?>"
                        width="200px" height="200px" style="margin-top: -58px;" alt=""></a>
                <div class="back-btn"><i data-feather="grid"></i></div>
                <div class="toggle-sidebar icon-box-sidebar"><i class="status_toggle middle sidebar-toggle"
                        data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="{{ route('dashboard') }}">
                    <div class="icon-box-sidebar"><i data-feather="grid"></i></div>
                </a></div>
            <nav class="sidebar-main">
                <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div id="sidebar-menu">
                    <ul class="sidebar-links" id="simple-bar">
                        <li class="back-btn">
                            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                    aria-hidden="true"></i></div>
                        </li>
                        <li class="pin-title sidebar-list">
                            <h6>Pinned</h6>
                        </li>
                        <hr>
                        <li class="sidebar-list {{ Request::is('dashboard') ? 'active' : '' }}"><i
                                class="fa fa-thumb-tack"></i>
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard') }}">
                                <i class="icofont icofont-chart-line-alt text-white"></i>
                                <span class="lan-3" style="margin-left: 20px;">{{ __('Dashboard') }}</span>
                            </a>
                        </li>

                        <!--<li class="sidebar-list {{ Request::is('settings*') ? 'active' : '' }}"><i-->
                        <!--        class="fa fa-thumb-tack"></i>-->
                        <!--    <a class="sidebar-link sidebar-title d-flex align-items-center" href="javascript:void(0)">-->
                        <!--        <i data-feather="settings" class="me-2"></i>&nbsp;&nbsp;&nbsp;-->
                        <!--        <span>{{ __('Application') }}</span>-->
                        <!--    </a>-->

                        <!--    <ul class="sidebar-submenu">-->
                        <!--        <li>-->
                        <!--            <a class="{{ Request::is('settings/general_setting') ? 'active' : '' }}"-->
                        <!--                href="{{ route('settings.general_setting') }}">-->
                        <!--                <span>{{ __('Global Settings') }}</span>-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a class="{{ Request::is('settings/location/country*') ? 'active' : '' }}"-->
                        <!--                href="{{ route('settings.location.country.index') }}">-->
                        <!--                <span>{{ __('Location Settings') }}</span>-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a class="{{ Request::is('settings/mail-configuration') ? 'active' : '' }}"-->
                        <!--                href="{{ route('settings.mail-configuration') }}">-->
                        <!--                <span>{{ __('Mail Configuration') }}</span>-->
                        <!--            </a>-->
                        <!--        </li>-->

                        <!--        <li>-->
                        <!--            <a class="{{ Request::is('admin/notification-settings') ? 'active' : '' }}"-->
                        <!--                href="{{ route('admin.notification.settings') }}">-->
                        <!--                <span>{{ __('Notification Configuration') }}</span>-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a class="{{ Request::is('admin/notification-templates*') ? 'active' : '' }}"-->
                        <!--                href="{{ route('notification.template.index') }}">-->
                        <!--                <span>{{ __('Notification Templates') }}</span>-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a class="{{ Request::is('settings/payment_method_settings') ? 'active' : '' }}"-->
                        <!--                href="{{ route('settings.payment_method_settings') }}">-->
                        <!--                <span>{{ __('Payment Options') }}</span>-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a class="{{ Request::is('settings/support-ticket/cms') ? 'active' : '' }}"-->
                        <!--                href="{{ route('settings.support-ticket.cms') }}">-->
                        <!--                <span>{{ __('Support Ticket') }}</span>-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</li>-->

                        {{-- <li class="sidebar-list {{ Request::is('widgets*') ? 'active' : '' }}"><i
                                class="fa fa-thumb-tack"></i>
                            <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                <i data-feather="airplay"></i>
                                <span class="lan-6">Widgets</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li><a class="{{ Request::is('general_widget') ? 'active' : '' }}"
                                        href="{{ route('general_widget') }}">General</a></li>
                                <li><a class="{{ Request::is('chart_widget') ? 'active' : '' }}"
                                        href="{{ route('chart_widget') }}">Chart</a></li>
                            </ul>
                        </li> --}}

                        {{-- <li class="sidebar-list {{ Request::is('file_manager') ? 'active' : '' }}"><i
                                class="fa fa-thumb-tack"></i>
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('file_manager') }}">
                                <i data-feather="git-pull-request"></i>
                                <span>File manager</span>
                            </a>
                        </li> --}}
                        <li class="sidebar-list {{ Request::is('users') ? 'active' : '' }}"><i
                                class="fa fa-thumb-tack"></i>
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('users') }}">
                                <i class="fa fa-users text-light"></i>&nbsp;&nbsp;
                                <span>Gestión de Clientes</span>
                            </a>
                        </li>
                        <!-- Drivers Manage -->
                        <li class="sidebar-list {{ Request::routeIs('admin.drivers.*') ? 'active' : '' }}">
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('drivers.index') }}">
                                <i class="fas fa-users-cog text-light"></i>&nbsp;&nbsp;
                                <span> Conductores</span>
                            </a>
                        </li>

                        <!-- Vehicles Manage -->
                        <!--<li class="sidebar-list {{ Request::routeIs('admin.vehicles.*') ? 'active' : '' }}">-->
                        <!--    <a class="sidebar-link sidebar-title link-nav" href="{{ route('vehicles.index') }}">-->
                        <!--        <i data-feather="truck"></i>-->
                        <!--        <span>Vehicles Manage</span>-->
                        <!--    </a>-->
                        <!--</li>-->
                        {{-- <li class="sidebar-list {{ Request::is('admin/portfolios') ? 'active' : '' }}"><i
                                class="fa fa-thumb-tack"></i>
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('portfolios.index') }}">
                                <i class="icofont icofont-briefcase text-light"></i>&nbsp;&nbsp;&nbsp;
                                <span>Portfolio</span>
                            </a>
                        </li>
                        <li class="sidebar-list {{ Request::is('admin/testimonials') ? 'active' : '' }}"><i
                                class="fa fa-thumb-tack"></i>
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('testimonials.index') }}">
                                <i class="icofont icofont-award text-light"></i>&nbsp;&nbsp;&nbsp;
                                <span>Testimonial</span>
                            </a>
                        </li> --}}
                        <!-- Clients -->



                        <!--<li class="sidebar-list {{ Request::is('banners') ? 'active' : '' }}"><i-->
                        <!--        class="fa fa-thumb-tack"></i>-->
                        <!--    <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.banners.index') }}">-->
                        <!--        <i data-feather="map-pin"></i>-->
                        <!--        <span>Locations </span>-->
                        <!--    </a>-->
                        <!--</li>-->

                        <!--<li class="sidebar-list {{ Request::is('banners') ? 'active' : '' }}"><i-->
                        <!--        class="fa fa-thumb-tack"></i>-->
                        <!--    <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.banners.index') }}">-->
                        <!--        <i data-feather="monitor"></i>-->
                        <!--        <span>Slider</span>-->
                        <!--    </a>-->
                        <!--</li>-->
                        {{-- <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                                href="javascript:void(0)"><i data-feather="message-circle"></i><span>Chat</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ route('chat.index') }}">Chat App</a></li>

                            </ul>
                        </li> --}}
                        {{-- <li class="sidebar-list {{ Request::is('news') ? 'active' : '' }}"><i
                                class="fa fa-thumb-tack"></i>
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('news.index') }}">
                                <i class="icofont icofont-triangle text-light"></i>&nbsp;&nbsp;&nbsp;
                                <span>Noticias</span>
                            </a>
                        </li> --}}
                        <!--<li class="sidebar-list {{ Request::is('qrcode') ? 'active' : '' }}"><i-->
                        <!--        class="fa fa-thumb-tack"></i>-->
                        <!--    <a class="sidebar-link sidebar-title link-nav" href="{{ url('admin/qrcode') }}">-->
                        <!--        <i class="fa fa-qrcode text-light"></i>&nbsp;&nbsp;&nbsp;<span>Payments QR</span>-->

                        <!--    </a>-->
                        <!--</li>-->
                        <li class="sidebar-list {{ Request::is('admin/proof-of-delivery*') ? 'active' : '' }}">
    <i class="fa fa-thumb-tack"></i>
    <a class="sidebar-link sidebar-title link-nav" href="{{ url('admin/proof-of-delivery') }}">
        <i class="fas fa-file-signature text-light"></i> 
        <span>Pruebas de Entrega</span>
    </a>
</li>
                        <!--<li class="sidebar-list {{ Request::is('qrcode') ? 'active' : '' }}"><i-->
                        <!--        class="fa fa-thumb-tack"></i>-->
                        <!--    <a class="sidebar-link sidebar-title link-nav" href="{{ url('admin/qrcode') }}">-->
                        <!--        <i class="fa fa-bell text-light"></i>&nbsp;&nbsp;&nbsp;<span>Notifications</span>-->

                        <!--    </a>-->
                        <!--</li>-->
                        {{-- <li class="sidebar-list {{ Request::is('category') ? 'active' : '' }}"><i
                                class="fa fa-thumb-tack"></i>
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('category.index') }}">
                                <i class="icofont icofont-triangle text-light"></i>&nbsp;&nbsp;&nbsp;
                                <span>Categoría</span>
                            </a>
                        </li> --}}
                        {{-- <li class="sidebar-list {{ Request::is('restaurants') ? 'active' : '' }}">
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('restaurants.index') }}">
                                <i class="fa fa-cutlery text-light"></i>&nbsp;&nbsp;&nbsp;
                                <span>Restaurantes</span>
                            </a>
                        </li> --}}

                        {{-- <li class="sidebar-list {{ Request::is('subcategory') ? 'active' : '' }}"><i
                                class="fa fa-thumb-tack"></i>
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('subcategory.index') }}">
                                <i class="icofont icofont-triangle text-light"></i>&nbsp;&nbsp;&nbsp;
                                <span>Subcategory</span>
                            </a>
                        </li>
                        <li class="sidebar-list {{ Request::is('products*') ? 'active' : '' }}">
                            <i class="fa fa-thumb-tack"></i>
                            <a class="sidebar-link sidebar-title link-nav" href="{{ url('products.list') }}">
                                <i class="icofont icofont-triangle text-light"></i>&nbsp;&nbsp;&nbsp;
                                <span>Products</span>
                            </a>
                        </li> --}}
                        <!-- Trips (main list) -->
                        <li class="sidebar-list {{ Request::routeIs('admin.trips.index') ? 'active' : '' }}">
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('trips.index') }}">
                                <i class="fas fa-receipt text-light"></i>&nbsp;&nbsp;&nbsp;
                                <span>Viajes</span>
                            </a>
                        </li>

                        <!-- Manual Assignment -->
                        <!--<li-->
                        <!--    class="sidebar-list {{ Request::routeIs('admin.trips.manual-assignment') ? 'active' : '' }}">-->
                        <!--    <a class="sidebar-link sidebar-title link-nav"-->
                        <!--        href="{{ route('trips.manual-assignment') }}">-->
                        <!--        <i class="fas fa-map-marked-alt text-light"></i>&nbsp;&nbsp;&nbsp;-->
                        <!--        <span class="ms-2 align-middle"> Assignment</span>-->
                        <!--    </a>-->
                        <!--</li>-->

                        <!-- Fleet Management -->
                        <!--<li class="sidebar-list {{ Request::routeIs('admin.trips.fleet') ? 'active' : '' }}">-->
                        <!--    <a class="sidebar-link sidebar-title link-nav" href="{{ route('trips.fleet') }}">-->
                        <!--        <i class="fas fa-shipping-fast text-light"></i>&nbsp;-->
                        <!--        <span class="ms-2 align-middle">Fleet Manage</span>-->
                        <!--    </a>-->
                        <!--</li>-->

                        <!-- Pricing Rules -->
                        <!--<li class="sidebar-list {{ Request::routeIs('pricing-rules.*') ? 'active' : '' }}">-->
                        <!--    <a class="sidebar-link sidebar-title link-nav"-->
                        <!--        href="{{ route('pricing-rules.index') }}">-->
                        <!--        <i class="fas fa-coins text-light"></i>&nbsp;&nbsp;&nbsp;-->
                        <!--        <span class="ms-2 align-middle">Pricing Rules</span>-->
                        <!--    </a>-->
                        <!--</li>-->

                        <!-- Audit Logs -->
                        <!--<li class="sidebar-list {{ Request::routeIs('admin.audit-logs.*') ? 'active' : '' }}">-->
                        <!--    <a class="sidebar-link sidebar-title link-nav"-->
                        <!--        href="{{ route('audit-logs.index') }}">-->
                        <!--        <i class="fas fa-clipboard-list text-light"></i>&nbsp;&nbsp;&nbsp;-->
                        <!--        <span class="ms-2 align-middle">Audit Logs</span>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <!--<li class="sidebar-list {{ Request::is('blogs*') ? 'active' : '' }}"><i-->
                        <!--        class="fa fa-thumb-tack"></i>-->
                        <!--    <a class="sidebar-link sidebar-title" href="javascript:void(0)">-->
                        <!--        <i class="icofont icofont-social-blogger text-light"></i>&nbsp;&nbsp;-->
                        <!--        <span>{{ __('Blogs') }}</span>-->
                        <!--    </a>-->
                        <!--    <ul class="sidebar-submenu">-->
                        <!--        <li><a class="{{ Request::is('blog/create') ? 'active' : '' }}"-->
                        <!--                href="{{ route('blog.create') }}">{{ __('Add Blog') }}</a></li>-->
                        <!--        <li><a class="{{ Request::is('blog/index') ? 'active' : '' }}"-->
                        <!--                href="{{ route('blog.index') }}">{{ __('Blog List') }}</a></li>-->
                        <!--        <li><a class="{{ Request::is('blog/blog-comment-list') ? 'active' : '' }}"-->
                        <!--                href="{{ route('blog.blog-comment-list') }}">{{ __('Lista de Comentarios') }}</a>-->
                        <!--        </li>-->
                        <!--        <li><a class="{{ Request::is('blog/blog-category/index') ? 'active' : '' }}"-->
                        <!--                href="{{ route('blog.blog-category.index') }}">{{ __('Blog Categeory') }}</a>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</li>-->



                        <!--<li class="sidebar-list {{ Request::is('admin/referral-settings') ? 'active' : '' }}">-->
                        <!--    <i class="fa fa-thumb-tack"></i>-->
                        <!--    <a class="sidebar-link sidebar-title link-nav d-flex align-items-center"-->
                        <!--        href="{{ url('admin/referral-settings') }}">-->
                        <!--        <i data-feather="users" class="me-2"></i>&nbsp;&nbsp;-->
                        <!--        <span>{{ __('Manage Referral') }}</span>-->
                        <!--    </a>-->
                        <!--</li>-->

                        <!--<li class="sidebar-list {{ Request::routeIs('withdrawals.*') ? 'active' : '' }}">-->
                        <!--    <i class="fa fa-thumb-tack"></i>-->

                        <!--    <a class="sidebar-link sidebar-title link-nav d-flex align-items-center"-->
                        <!--        href="{{ route('withdrawals.index') }}">-->
                        <!--        <i data-feather="credit-card" class="me-2"></i>&nbsp;&nbsp;-->
                        <!--        <span>{{ __('Withdrawals') }}</span>-->
                        <!--    </a>-->
                        <!--</li>-->
{{-- Wallet Management --}}
                        <li
                            class="sidebar-list {{ Request::routeIs('wallets.*', 'topup-requests.*', 'wallet-transactions.*') ? 'active' : '' }}">
                            <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                <i data-feather="dollar-sign"></i>
                                <span>Gestión de Billetera</span>
                            </a>
                            <ul class="sidebar-submenu"
                                style="{{ Request::routeIs('wallets.*', 'topup-requests.*', 'wallet-transactions.*') ? 'display: block;' : '' }}">
                                <li class="{{ Request::routeIs('wallets.*') ? 'active' : '' }}">
                                    <a href="{{ route('wallets.index') }}">
                                        <i data-feather="wallet"></i>
                                        <span>Billeteras</span>
                                    </a>
                                </li>
                                <li class="{{ Request::routeIs('topup-requests.*') ? 'active' : '' }}">
                                    <a href="{{ route('topup-requests.index') }}">
                                        <i data-feather="plus-circle"></i>
                                        <span>Solicitudes de Recarga</span>
                                        @php
                                            $pendingCount = App\Models\TopUpRequest::where(
                                                'status',
                                                'pending',
                                            )->count();
                                        @endphp
                                        @if ($pendingCount > 0)
                                            <span class="badge badge-danger ms-2">{{ $pendingCount }}</span>
                                        @endif
                                    </a>
                                </li>
                                <li class="{{ Request::routeIs('wallet-transactions.*') ? 'active' : '' }}">
                                    <a href="{{ route('wallet-transactions.index') }}">
                                        <i data-feather="list"></i>
                                        <span>Transacciones</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!--<li class="sidebar-list {{ Request::is('admin/language') ? 'active' : '' }}"><i-->
                        <!--        class="fa fa-thumb-tack"></i>-->
                        <!--    <a class="sidebar-link sidebar-title link-nav" href="{{ url('admin/language') }}">-->
                        <!--        <i class="fa fa-language text-light"></i> &nbsp;&nbsp;-->
                        <!--        <span>{{ __('Multi Language') }}</span>-->
                        <!--    </a>-->
                        <!--</li>-->

                        <!--<li class="sidebar-list {{ Request::is('support-ticket*') ? 'active' : '' }}"><i-->
                        <!--        class="fa fa-thumb-tack"></i>-->
                        <!--    <a class="sidebar-link sidebar-title" href="javascript:void(0)">-->
                        <!--        <i class="icon-headphone-alt text-light"></i>&nbsp;&nbsp;-->
                        <!--        <span>{{ __('Support Ticket') }}</span>-->
                        <!--    </a>-->
                        <!--    <ul class="sidebar-submenu">-->
                        <!--        <li><a class="{{ Request::is('support-ticket/index') ? 'active' : '' }}"-->
                        <!--                href="{{ route('support-ticket.index') }}">{{ __('All Tickets') }}</a></li>-->
                        <!--        <li><a class="{{ Request::is('support-ticket/open') ? 'active' : '' }}"-->
                        <!--                href="{{ route('support-ticket.open') }}">{{ __('Open Ticket') }}</a></li>-->
                        <!--    </ul>-->
                        <!--</li>-->
<!--                        <li class="sidebar-list {{ Request::is('admin/transaction-history*') || Request::is('admin/login-history*') || Request::is('admin/notification-history*') ? 'active' : '' }}">-->
<!--    <i class="fa fa-thumb-tack"></i>-->
<!--    <a class="sidebar-link sidebar-title d-flex align-items-center" href="javascript:void(0)">-->
<!--        <i data-feather="file-text" class="me-2"></i>&nbsp;&nbsp;-->
<!--        <span>{{ __('History & Reports') }}</span>-->
<!--    </a>-->
<!--    <ul class="sidebar-submenu">-->
<!--        <li>-->
<!--            <a class="{{ Request::is('admin/transaction-history*') ? 'active' : '' }}" -->
<!--               href="{{ route('transaction.history') }}">-->
<!--               <i class="fas fa-wallet me-2"></i>{{ __('Transaction History') }}-->
<!--            </a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a class="{{ Request::is('admin/login-history*') ? 'active' : '' }}" -->
<!--               href="{{ route('login.history') }}">-->
<!--               <i class="fas fa-history me-2"></i>{{ __('Login History') }}-->
<!--            </a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a class="{{ Request::is('admin/notification-history*') ? 'active' : '' }}" -->
<!--               href="{{ route('notification.history') }}">-->
<!--               <i class="fas fa-bell me-2"></i>{{ __('Notification History') }}-->
<!--            </a>-->
<!--        </li>-->
<!--    </ul>-->
<!--</li>-->
                    </ul>
                </div>
                <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
        </div>
    </div>
@else
    <div class="sidebar-wrapper">
        <div>
            <div class="logo-wrapper"><a href="{{ route('dashboard') }}"><img class=" for-light"
                        src="<?php echo '/' . $general_setting['app_footer_payment_image'] ?? ''; ?>" width="157px" height="80px" alt=""></a>
                <div class="back-btn"><i data-feather="grid"></i></div>
                <div class="toggle-sidebar icon-box-sidebar"><i class="status_toggle middle sidebar-toggle"
                        data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="{{ route('dashboard') }}">
                    <div class="icon-box-sidebar"><i data-feather="grid"></i></div>
                </a></div>
            <nav class="sidebar-main">
                <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div id="sidebar-menu">
                    <ul class="sidebar-links" id="simple-bar">
                        <li class="back-btn">
                            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                    aria-hidden="true"></i></div>
                        </li>
                        <li class="pin-title sidebar-list">
                            <h6>Pinned</h6>
                        </li>
                        <hr>





                    </ul>
                </div>
                <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
        </div>
    </div>
@endif
