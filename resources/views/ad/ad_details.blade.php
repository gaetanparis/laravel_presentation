@extends('layouts.app')
@section('title')
    Ad details
@endsection

@section('content')
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row"  >
            <div class="col-lg-12">
                <h1 class="page-header">
                    {{ $ad->title }}

                </h1>
                <hr>
            </div>

            <div class="col-sd-6">
                {{Html::image('medias/13959945756.jpg')}}

                <p style="color: grey;font-size: 11px">Created : {{ $ad->created_at }} by {{$user->name}}
            </div>
            <div class="col-sd-6" >
                <div class="col-md-6" style="border-bottom: 1px solid grey; border-top: 1px solid grey;border-left:1px solid grey; border-right: 1px solid grey; ">
                    <div class="form-group row" style="border-bottom: 1px solid grey; margin-bottom: 0rem!important;">
                        <div class="col-md-3" style="border-right: 1px solid grey;">
                            <b>Price :</b>
                        </div>
                        <div class="col-md-3">
                           {{$ad->price}} € {{$ad->precision}}
                        </div>
                    </div>
                    <div class="form-group row" style="border-bottom: 1px solid grey; margin-bottom: 0rem!important;">
                        <div class="col-md-3" style="border-right: 1px solid grey;">
                            <b>Type :</b>
                        </div>
                        <div class="col-md-3">
                            @if($ad->type == 1)
                                Service
                            @else
                                Object
                            @endif
                        </div>
                    </div>
                    <div class="form-group row" style="border-bottom: 1px solid grey; margin-bottom: 0rem!important;">
                        <div class="col-md-3" style="border-right: 1px solid grey;">
                            <b>Category :</b>
                        </div>
                        <div class="col-md-3 float-lg-lef">
                            {{$category->name}}
                        </div>
                    </div>
                    <div class="form-group row" >
                        <div class="col-md-3">
                            <b>Message :</b>
                        </div>
                        <div class="col-md-12 row">
                           <p style="margin-left: 20px; margin-top: 20px;"> {{$ad->message}}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

@endsection