@extends('layouts.app')
@section('title')
    New ad
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-block">
                        <div class="container">
                            <form class="form-horizontal offset-md-2" role="form" method="POST" action="{{ url('/new_ad') }}">
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label for="title" class="col-md-4 control-label">Title</label>

                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title"
                                               placeholder="Title" required autofocus>
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
                                            <option value="1">Service</option>
                                            <option value="2">Object</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="message" class="col-md-4 control-label">Message</label>

                                    <div class="col-md-6">
                                        <textarea name="message"></textarea>
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