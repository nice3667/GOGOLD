<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <link rel="icon" href="/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="/favicon.ico" sizes="64x64">
  <link rel="icon" href="/favicon.svg" sizes="any" type="image/svg+xml">
  <link rel="apple-touch-icon" href="/apple-touch-icon-180x180.png" sizes="180x180">
  <link rel="manifest" href="/build/manifest.webmanifest">

  <title inertia>{{ config('app.name') }}</title>

  <!-- Scripts -->
  @routes
  @vite(['resources/js/app.js', "resources/js/pages/{$page['component']}.vue", 'resources/scss/app.scss'])
  @inertiaHead
</head>

<body class="font-sans antialiased ">
  @inertia
</body>

</html>
