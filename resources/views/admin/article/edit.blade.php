@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit the Article</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Fail to Update</strong> The input didn't meet the requirements<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                            <form action="{{ url('admin/articles/'.$article->id) }}" method="POST">
                            {{ method_field('PATCH') }}
                            {!! csrf_field() !!}
                            <select class="custom-select" name="type" required="required">
                                <option value ="Housing">Housing</option>
                                <option value ="Jobs">Jobs</option>
                                <option value="ForSale">For Sale</option>
                                <option value="Rent">Rent</option>
                            </select>
                            <input type="text" name="title" class="form-control" required="required" value="{{$article->title}}">
                            <br>
                            <textarea name="body" rows="10" class="form-control" required="required">{{$article->body}}</textarea>
                            <br>
                            <button class="btn btn-lg btn-info">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection