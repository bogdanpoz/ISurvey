<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link  @if(Request::Url() === route('admin.dashboard')) active @endif">
                        <i class="fas fa-chart-line nav-icon"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link @if((request()->is('admin/users*'))) active @endif">
                        <i class="fas fa-users nav-icon"></i>
                        <p>{{ __('Users') }}</p>
                    </a>
                </li>

                 <li class="nav-item">
                    <a href="{{ route('admin.notification.create') }}" class="nav-link @if((request()->is('admin/notifications*'))) active @endif">
                        <i class="fa fa-bell nav-icon"></i>
                        <p>{{ __('Notifications') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.plans.index')}}" class="nav-link @if((request()->is('admin/plans*'))) active @endif">
                        <i class="fas fa-ruler-vertical nav-icon"></i>
                        <p>{{ __('Plans') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.subscriptions.index') }}" class="nav-link {{ (request()->is('admin/subscriptions*')) ? 'active' : '' }}">
                        <i class="fas fa-exchange-alt nav-icon"></i>
                        <p>{{ __('Subscriptions') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.transactions.index') }}" class="nav-link {{ (request()->is('admin/transactions')) ? 'active' : '' }}">
                        <i class="fas fa-money-bill-wave nav-icon"></i>
                        <p>{{ __('Payment Requests') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.extensions.index') }}" class="nav-link {{ (request()->is('admin/extensions*')) ? 'active' : '' }}">
                        <i class="fas fa-th nav-icon"></i>
                        <p>{{ __('Extensions') }} <span class="right badge badge-warning">New</span></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link {{ (request()->is('admin/settings')) ? 'active' : '' }}">
                        <i class="fas fa-cogs nav-icon"></i>
                        <p>{{ __('Settings') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.surveys.index') }}" class="nav-link @if((request()->is('admin/surveys*'))) active @endif">
                        <i class="fas fa-book-open nav-icon"></i>
                        <p>{{ __('Surveys') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>{{ __('Logout') }}</p>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>