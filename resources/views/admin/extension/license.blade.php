<div class="row">
    <div class="col-12">
        <div class="card card-outline card-success mt-3">
            <div class="card-header">
                <h3 class="card-title">{{ __('Purchase Code') }} @if($envatoPurchaseCode) (Added) @else (Not Added) @endif</h3>
            </div>
            <form role="form" method="POST" action="{{ route('admin.extensions.updateLicense') }}">
                {{ csrf_field() }}
                <div class="card-body">
                    <p><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">Where Is My Purchase Code?</a></p>

                    <div class="form-group row">
                        <label for="envato_purchase_code" class="col-sm-3 col-form-label text-sm-right">{{ __('Purchase Code') }}</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control @error('envato_purchase_code') is-invalid @enderror" name="envato_purchase_code" value="{{ old('envato_purchase_code') }}">
                            @error('envato_purchase_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="select" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>