<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eve-app</title>
    <link rel="stylesheet" href="css/app.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>

  </head>
  <body>
    @yield('content')

    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')
  </body>
</html>
