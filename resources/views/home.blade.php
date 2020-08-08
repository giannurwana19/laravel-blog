@extends('templates.home')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h3>{{ __('Dashboard') }}</h3>

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        {{ __('You are logged in!') }}

    </div>
</div>
@endsection