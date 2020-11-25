@extends('layouts.app')

@section('content')
<div id="app">
  <get-assets></get-assets>
</div>
@stop

@push('scripts')
    <script src="js/dashboard.js"></script>
@endpush
