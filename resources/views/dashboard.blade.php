@extends('layouts.app')

@section('content')
<div id="app">
  <Assets>
    <AssetsNavbar/>
    <AssetsTable/>
  </Assets>
</div>
@stop

@push('scripts')
    <script src="js/dashboard.js"></script>
@endpush
