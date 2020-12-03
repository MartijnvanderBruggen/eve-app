@extends('layouts.app')

@section('content')
<div id="app">

  <eve-app-dashboard image="{{ asset('storage/login.png') }}" user='{!!json_encode(auth()->user())!!}' token='{{session('token')}}'></eve-app-dashboard>
</div>
@endsection
