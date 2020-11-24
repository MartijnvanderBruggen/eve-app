<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation Starter Template</title>
    <link rel="stylesheet" href="css/app.css" />
    <link rel="stylesheet" href="css/foundation.css" />

  </head>
  <body>
    @yield('content')
    <script src="{{ mix('js/app.js') }}"></script>

    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.min.js"></script>

    @stack('scripts')
  </body>
</html>
