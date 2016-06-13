@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <form action="/project/{{$project->id}}/edit" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$project->title}}">
                    </div>
                    <div class="form-group">
                        <label for="title">Rate</label>
                        <input type="text" class="form-control" id="title" name="rate" value="{{$project->rate}}">
                    </div>
                    <button type="submit" class="btn btn-success pull-right">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection