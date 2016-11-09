@extends('layouts.app')
@section('title')
    Ad details
@endsection

@section('content')
    <div class="container" >
        <!-- Marketing Icons Section -->
        <div class="row" >
            <div class="col-xs-8 text-xs-center">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        {{ $ad->title }}<br>
                    </h1>
                    <p style="color: grey;font-size: 11px">Created : {{ $ad->created_at }} by {{$user->name}}
                    <hr>
                    @if($photo = \App\Photo::where("ad_id", $ad->id)->first()['photo'])
                        {{Html::image('medias/'.$photo,'alt', array( 'width' => '90%', 'height' => "428px"))}}
                    @else
                        {{Html::image('medias/no-image.png','alt', array( 'width' => '225px', 'height' => "225px"))}}
                    @endif

                </div>

            </div>
            <div class="col-xs-4 float-xs-right">
                <div class="card ">
                    <div class="card-header">
                        Manage ad
                    </div>
                    <div class="card-block">
                        <div class="col-xs-4 text-xs-center">
                           <a href="" style="color: black;"> <i class="fa fa-star fa-2x" style="color: greenyellow"></i><br>Favoris</a>
                        </div>
                        <div class="col-xs-4 text-xs-center">
                            <a href="" style="color: black;"> <i class="fa fa-edit fa-2x" style="color: green"></i><br>Edit</a>
                        </div>
                        <div class="col-xs-4 text-xs-center">
                            <a href="" style="color: black;"> <i class="fa fa-warning fa-2x" style="color: red"></i><br>Report</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="col-sd-8" >
            <div class="col-xs-8" style="border-bottom: 1px solid #ccc; border-top: 1px solid #ccc;border-left:1px solid #ccc; border-right: 1px solid #ccc; ">
                <div class="form-group row" style="border-bottom: 1px solid #ccc; margin-bottom: 0rem!important;">
                    <div class="col-md-3" style="background-color: #D7D8D8;">
                        <b>Price :</b>
                    </div>
                    <div class="col-md-9">
                       {{$ad->price}} € {{$ad->precision}}
                    </div>
                </div>
                <div class="form-group row" style="border-bottom: 1px solid #ccc; margin-bottom: 0rem!important;">
                    <div class="col-md-3"  style="background-color: #D7D8D8;">
                        <b>Type :</b>
                    </div>
                    <div class="col-md-9">
                        @if($ad->type == 1)
                            Service
                        @else
                            Object
                        @endif
                    </div>
                </div>
                <div class="form-group row" style="border-bottom: 1px solid #ccc; margin-bottom: 0rem!important;">
                    <div class="col-md-3"  style="background-color: #D7D8D8;">
                        <b>Category :</b>
                    </div>
                    <div class="col-md-9 float-lg-lef">
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
    <!-- /.row -->

@endsection