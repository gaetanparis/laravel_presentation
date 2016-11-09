@extends('layouts.app')

@section('plugin_css')
<link rel="stylesheet" href="{{ asset('css/custom/custom_edit_ad.css') }}">
@endsection
@section('plugin_js')
    <script src="{{ asset('js/custom/edit_ad_custom.js') }}"></script>
@endsection
@section('title')
    Edit ad
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Edit ad</div>
                    <div class="card-block">
                        <div class="container">
                            <form class="form-horizontal offset-md-2" role="form" method="POST" action="{{ url('/ad') }}" name="form_edit_ad" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <input type="hidden" name="ad_id" value="{{ $ad->id}}">
                                    <label for="title" class="col-md-4 control-label">Title</label>

                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title"
                                               value="{{ $ad->title }}"  required autofocus>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="category" class="col-md-4 control-label">Category</label>

                                    <div class="col-md-6">
                                        <select name="category" id="category">

                                            @foreach($categories as $category)
                                                <option value="{{ $category->id_category }}">{{ $category->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="type" class="col-md-4 control-label">Type</label>

                                    <div class="col-md-6">
                                        <select name="type" id="type">
                                            <option value="1" @if($ad->type == 1) selected @endif>Service</option>
                                            <option value="2"  @if($ad->type == 2) selected @endif>Object</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="price" class="col-md-4 control-label">Price</label>

                                    <div class="col-md-3">
                                        <input id="price" type="text" class="form-control" name="price"
                                               value="{{ $ad->price }}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="precision" id="precision">
                                            <option value="Per hour"  @if($ad->precision == "Per hour") selected @endif>Per hour</option>
                                            <option value="All"     @if($ad->precision == "All") selected @endif>All</option>
                                            <option value="Each"    @if($ad->precision == "Each") selected @endif>Each</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="message" class="col-md-4 control-label">Message</label>

                                    <div class="col-xs-6">
                                        <textarea name="message">{{ $ad->message }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="photo" class="col-md-4 control-label">Photo</label>

                                    <div class="col-lg-6">
                                        @if($photos)
                                            @foreach($photos as $photo)
                                                <div class="image-edit-show">
                                                    <div class="col-md-8 img-edit-ad rounded ">
                                                        {{Html::image('medias/'.$photo->photo,'alt', array( 'width' => '225px', 'height' => "225px"))}}
                                                    </div>
                                                    <div class="col-lg-12 img-edit-ad">
                                                        <button class="btn-delete-image btn btn-danger" value="{{ $photo->id_photo }}" >Delete</button>
                                                        <button class="btn-change-image btn btn-info" value="{{ $photo->id_photo }}" >Change</button>
                                                    </div>
                                                </div>

                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="col-md-4 control-label">Description (photo)</label>

                                    <div class="col-md-6">
                                        <input id="description" type="text" class="form-control" name="description"
                                               placeholder="Description" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Send
                                        </button>

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