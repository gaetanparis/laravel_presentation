@extends('layouts.app')

@section('title')
    My ads
@endsection

@section('content')
    <div class="container">
        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    My ads

                </h1>
            </div>
            @foreach($ads as $ad)
                <div class="col-lg-3">
                    <div class="card ">
                        <div class="card-block">
                            <h4 class="card-title">{{ $ad->title }}</h4>
                            <h6 class="card-subtitle text-muted" style="font-size: 11px;">Created : {{ $ad->created_at }}</h6>
                        </div>
                        <div class="text-xs-center">
                            @if($photo = \App\Photo::where("ad_id", $ad->id)->first()['photo'])
                                {{Html::image('medias/'.$photo,'alt', array( 'width' => '225px', 'height' => "225px"))}}
                            @else
                                {{Html::image('medias/no-image.png','alt', array( 'width' => '225px', 'height' => "225px"))}}
                            @endif
                        </div>
                        <div class="card-block">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="{{ url('ad/'.$ad->id) }}" class="card-link">See</a>
                            <a href="{{ url('ad/'.$ad->id.'/edit') }}" class="card-link">Edit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection