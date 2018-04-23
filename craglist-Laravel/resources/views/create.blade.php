@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new Article</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Fail to Add</strong> The input didn't meet the requirements<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{ url('/') }}" method="POST">
                            {!! csrf_field() !!}
                            <select class="custom-select" name="type" required="required">
                                <option value ="Housing">Housing</option>
                                <option value ="Jobs">Jobs</option>
                                <option value="ForSale">For Sale</option>
                                <option value="Rent">Rent</option>
                            </select>
                            <input type="text" name="title" class="form-control" required="required" placeholder="Please input title">
                            <br>
                            <textarea name="body" rows="10" class="form-control" required="required" placeholder="Please input body"></textarea>
                            <br>
                            <button class="btn btn-lg btn-info">Add New</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection