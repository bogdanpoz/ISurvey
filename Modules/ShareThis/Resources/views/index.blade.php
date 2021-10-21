@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-success mt-3">
                        <div class="card-header">
                            <h3 class="card-title">SharThis Plugin</h3>
                        </div>
                        <form role="form" method="POST" action="{{ route('admin.sharethis.store') }}">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="select" class="col-sm-3 col-form-label text-sm-right">Status</label>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="sharethis_status">
                                            <option value="1" {{ $sharethis_status == 1  ? 'selected' : '' }}>On</option>
                                            <option value="0" {{ $sharethis_status == 0  ? 'selected' : '' }}>Off</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="text" class="col-sm-3 col-form-label text-sm-right">Property ID</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="sharethis_property" value="{{ $sharethis_property }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="select" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
