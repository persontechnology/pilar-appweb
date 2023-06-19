@extends('layouts.app')

@section('breadcrumbs')
{{ Breadcrumbs::render('home') }}
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ config('app.name','..................................') }}, {{ date('Y') }}</h4>
    </div>
</div>
@endsection
