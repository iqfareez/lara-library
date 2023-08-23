@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            Hi {{ Auth::user()->name }}.
            Welcome to library system
        </div>
    </div>
@endsection
