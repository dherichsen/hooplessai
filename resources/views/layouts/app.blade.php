<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'hoopless.ai')</title>
  <meta name="description" content="@yield('meta_description', 'Boutique AI firm building enterprise-grade software, consulting on intelligent systems, and bringing businesses into the AI era.')">

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    @font-face {
      font-family: 'Big Daily Short';
      src: url('/fonts/BigDailyShort-Light.woff2') format('woff2'),
           url('/fonts/BigDailyShort-Light.woff') format('woff');
      font-weight: 300; font-style: normal; font-display: swap;
    }
    @font-face {
      font-family: 'Basel Grotesk';
      src: url('/fonts/BaselGrotesk-Regular.woff2') format('woff2'),
           url('/fonts/BaselGrotesk-Regular.woff') format('woff');
      font-weight: 400; font-style: normal; font-display: swap;
    }
    @font-face {
      font-family: 'Basel Grotesk';
      src: url('/fonts/BaselGrotesk-Medium.woff2') format('woff2'),
           url('/fonts/BaselGrotesk-Medium.woff') format('woff');
      font-weight: 500; font-style: normal; font-display: swap;
    }
  </style>
</head>
<body class="bg-cream font-serif text-ink font-light overflow-x-hidden">

  <!-- FULL-PAGE GRADIENT SYSTEM -->
  <canvas id="gradient-canvas"></canvas>

  <!-- NAVIGATION -->
  @include('partials.header')

  <!-- FULL-SCREEN MENU OVERLAY -->
  @include('partials.menu')

  <main>
    @yield('content')
  </main>

  <!-- FOOTER -->
  @include('partials.footer')

</body>
</html>
