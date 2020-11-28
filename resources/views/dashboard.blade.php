@extends('layouts.app')

@section('content')
<div id="app">

  <Assets :user='{!!json_encode($user)!!}' :eve_token='{!!json_encode($eve_token)!!}'>
    <AssetsNavbar></AssetsNavbar>
    <AssetsTable></AssetsTable>
  </Assets>
</div>
@endsection
