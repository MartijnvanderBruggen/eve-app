@extends('layouts.app')

@section('content')

<button type="button" class="success button">Refresh assets</button>

@stop

@push('scripts')
    <script src="js/dashboard.js"></script>
@endpush
