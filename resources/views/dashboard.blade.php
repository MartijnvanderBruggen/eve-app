@extends('layouts.app')

@section('content')
<div id="app">
  <Assets :user='{!!json_encode($user)!!}'>
    <AssetsNavbar></AssetsNavbar>
    <AssetsTable></AssetsTable>
  </Assets>
</div>
@endsection
