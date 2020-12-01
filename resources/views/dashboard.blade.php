@extends('layouts.app')

@section('content')
<div id="app">
  @if(!empty($user) && !empty($eve_token))
  <eve-app-dashboard image="{{ asset('storage/login.png') }}" user="{!!json_encode($user)!!}" eve_token="{!!json_encode($eve_token)!!}"></eve-app-dashboard>
  @else
  <eve-app-dashboard image="{{ asset('storage/login.png') }}"></eve-app-dashboard>
  @endif

</div>
@endsection
