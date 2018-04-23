@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-header">CragList Backend</div>

                    <div class="card-body">

                        <a href="{{ url('admin/articles') }}" class="btn btn-lg btn-success col-xs-12">Articies Manager</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection