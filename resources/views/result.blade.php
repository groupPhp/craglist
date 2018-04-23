@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="title" style="text-align: center;">
                <h1>CragList</h1>
                <div style="padding: 5px; font-size: 16px;">Homepage</div>
            </div>
            <hr>
            <div class="card" style="float: left; height: 65%; position: fixed">
                <div class="card-header">CragList</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ url('/create') }}" class="btn btn-lg btn-primary">Post</a>
                </div>

            </div>
            <div id="content" style="float: right">
                <div class="title">
                    [{{ $article->type }}]<a href="{{ url('article/'.$article->id) }}">
                        <h4>{{ $article->title }}</h4>
                    </a>
                </div>
                <div class="body">
                    <p>{{ $article->body }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
