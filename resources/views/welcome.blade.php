@extends('layouts.guest')
@section('content')
  <div class="box">
    <a href="https://login.eveonline.com/v2/oauth/authorize/?response_type=code&redirect_uri=https://eve-app.test/callback&client_id=b72d20af7ccd4b11a7d04b9d73b36bb5&scope=esi-assets.read_assets.v1&state=0"><img src="{{ asset('storage/images/login.png') }}"></a>
  </div>
@endsection
