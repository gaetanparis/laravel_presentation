@extends('layouts.app')

@section('title') Register
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">My informations</div>
                    <div class="card-block">
                        <div class="container">
                            <form class="form-horizontal offset-md-2" role="form" method="POST" action="{{ url('/register') }}">
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <p class="form-control-static mb-0">{{ Auth::user()->name }}</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <p class="form-control-static mb-0">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-md-4 control-label">Address</label>

                                    <div class="col-md-6">
                                        <p class="form-control-static mb-0">{{ Auth::user()->address }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address2" class="col-md-4 control-label">Address 2</label>

                                    <div class="col-md-6">
                                        <p class="form-control-static mb-0">{{ Auth::user()->address2 }}</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="pc" class="col-md-4 control-label">Postal code</label>

                                    <div class="col-md-6">
                                        <p class="form-control-static mb-0">{{ Auth::user()->pc }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-md-4 control-label">City</label>

                                    <div class="col-md-6">
                                        <p class="form-control-static mb-0">{{ Auth::user()->city }}</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection