@extends('layouts.app')

@section('title', 'Your dashboard')

@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-warning">
                <p>{{ session('message') }}</p>
            </div>
        @endif
            <h3>Front Page</h3>

    </div>
@endsection
