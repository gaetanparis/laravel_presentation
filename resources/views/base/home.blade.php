@extends('layouts.app')

@section('plugin_js')
    <script src="{{ asset('js/owl-carroussel/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/custom/home_custom.js') }}"></script>
@endsection
@section('plugin_css')
        <!-- Important Owl stylesheet -->
        <link rel="stylesheet" href="{{ asset('css/owl-carroussel/owl.carousel.css') }}">
        <!-- Default Theme -->
        <link rel="stylesheet" href="{{ asset('css/owl-carousel/owl.theme.css') }}">
@endsection
@section('title')
    Home
@endsection

@section('content')
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                   Welcome to my website that will show you what i can do with Laravel.

                </h1>
            </div>
            <div class="col-sd-12">
               Work still in progress
                <img src="{{asset('medias/ad_img/maison.png')}}" >
            </div>
            <div id="owl-example" class="owl-carousel">
                <div> {{Html::image('medias/13959945756.jpg')}} </div>
                <div> {{Html::image('medias/13959945756.jpg')}} </div>
                <div> {{Html::image('medias/13959945756.jpg')}} </div>
                <div> {{Html::image('medias/13959945756.jpg')}} </div>
                <div> {{Html::image('medias/13959945756.jpg')}} </div>
                <div> {{Html::image('medias/13959945756.jpg')}} </div>
                <div> {{Html::image('medias/13959945756.jpg')}} </div>
               
            </div>
        </div>
    </div>
    <!-- /.row -->

@endsection