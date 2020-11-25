@extends('layouts.app')

@section('content')
<div id="app">
  <assets>
    <assets-navbar></assets-navbar>
    <assets-table></assets-table>
  </assets>
</div>
@stop

@push('scripts')
    <script src="js/dashboard.js"></script>
@endpush
