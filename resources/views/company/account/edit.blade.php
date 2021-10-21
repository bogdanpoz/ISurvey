@extends('layouts.company')

@section('content')
<div class="content-header">
	<div class="container">

		<div class="row mt-3">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">{{ __('Account') }}</h3>
					</div>
					<form method="POST" action="{{ route('company.account.update',$user) }}">
						{{csrf_field()}}
						@method('PUT')
						<div class="card-body">
							<div class="form-group row">
								<label for="name" class="col-sm-3 text-sm-right col-form-label">
									{{ __('Name') }}</label>
								<div class="col-sm-6">
									<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}">
									@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-sm-3 text-sm-right col-form-label">{{ __('Email') }}</label>
								<div class="col-sm-6">
									<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">
									@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label for="password" class="col-sm-3 text-sm-right col-form-label" style="margin:bottom 3%">{{ __('Password') }}</label>
								<div class="col-sm-6">
									<input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
									@error('password')
									
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
									<div class="input-group survey-colorpicker"  style="margin-top: 3%">
										<label for="main_color" class="col-sm-3 text-sm-right">Main color</label>
										<input type="text" class="form-control input-lg" value={{$user->main_color}} name="main_color" />
										<span class="input-group-append">
											<span class="input-group-text colorpicker-input-addon"><i></i></span>
										</span>
									</div>
									<div class="input-group survey-colorpicker"  style="margin-top: 3%">
										<label for="primary_color" class="col-sm-3 text-sm-right">Primary color</label>
										<input type="text" class="form-control input-lg" value={{$user->primary_color}} name="primary_color" />
										<span class="input-group-append">
											<span class="input-group-text colorpicker-input-addon"><i></i></span>
										</span>
									</div>
									<div class="input-group survey-colorpicker" style="margin-top: 3%">
										<label for="secondary_color" class="col-sm-3 text-sm-right">Secondary color</label>
										<input type="text" class="form-control input-lg" value={{$user->secondary_color}} name="secondary_color"/>
										<span class="input-group-append">
											<span class="input-group-text colorpicker-input-addon"><i></i></span>
										</span>
									</div>
								</div>
							</div>
						</div>	
						<div class="card-footer">
							<button type="submit" class="btn btn-info float-right">{{ __('Update') }}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection