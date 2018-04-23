@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">CragList</div>
                    <div class="panel-body">

                        <h1>[{{ $article->type }}]{{ $article->title }}</h1>
                        <div>{{ $article->body }}</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection