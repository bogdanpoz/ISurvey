<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
	<div class="container">
		<a href="" class="navbar-brand">
			<h1>inextSurvey</h1>
		</a>

		<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse order-3" id="navbarCollapse">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="/" class="nav-link">{{ __('Home') }}</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('company.surveys.index') }}" class="nav-link">{{ __('My Surveys') }}</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('company.surveys.templates.index') }}" class="nav-link">{{ __('Template Gallery') }}</a>
				</li>
				<li class="nav-item dropdown">
					<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="nav-link dropdown-toggle">{{ __('Billing') }}</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow drop-billing">
                        <li><a href="{{ route('company.billing.index') }}" class="dropdown-item">{{ __('Billing') }}</a></li>
                        <li><a href="{{ route('company.billing.plans') }}" class="dropdown-item">{{ __('Pricing Plans') }}</a></li>
                    </ul>
                </li>
			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="{{ route('company.notifications.index') }}" class="nav-link">
						<i class="fa fa-bell" aria-hidden="true"></i>
						@auth
							@if(\Auth::user()->unreadNotifications->count() > 0)
								<span class="badge badge-light badge-bell">
									{{\Auth::user()->unreadNotifications->count()}}
								</span>
							@endif
						@endauth
					</a>
				</li>

				<li class="nav-item dropdown show d-flex">
					<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
						<i class="far fa-user-circle"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right pro-right">
						<a href="{{route('company.account.edit')}}" class="dropdown-item">{{ __('Profile') }}</a>
						<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();" class="dropdown-item">{{ __('Logout') }}</a>
						<form class="logout-class-side" id="logout-form-sidebar" action="{{ route('logout') }}" method="POST">{{ csrf_field() }}</form>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>