<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'hoopless.ai')</title>
  <meta name="description" content="@yield('meta_description', 'Boutique AI firm building enterprise-grade software, consulting on intelligent systems, and bringing businesses into the AI era.')">

  <!-- Use Tailwind CDN (same as static site) for pixel-perfect match -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              50: '#F3EEFF', 100: '#E9E0FF', 200: '#C4B5FD', 300: '#A78BFA',
              400: '#8B5CF6', 500: '#7C3AED', 600: '#6D28D9', 700: '#5B21B6',
              DEFAULT: '#8B5CF6',
            },
            cream: { DEFAULT: '#FAFBFF', dark: '#F0EDF7' },
            ink: '#1E1B2E',
          },
          fontFamily: {
            serif: ["'Big Daily Short'", 'serif'],
            sans: ["'Basel Grotesk'", 'sans-serif'],
          },
          borderRadius: { pill: '40px' },
          fontSize: {
            'display': ['86px', { lineHeight: '1.12', fontWeight: '300' }],
            'display-md': ['56px', { lineHeight: '1.12', fontWeight: '300' }],
            'display-sm': ['38px', { lineHeight: '1.15', fontWeight: '300' }],
            'h1': ['64px', { lineHeight: '1.12', fontWeight: '300' }],
            'h1-md': ['48px', { lineHeight: '1.12', fontWeight: '300' }],
            'h1-sm': ['36px', { lineHeight: '1.15', fontWeight: '300' }],
            'h2': ['36px', { lineHeight: '1.25', fontWeight: '300' }],
            'h2-sm': ['26px', { lineHeight: '1.3', fontWeight: '300' }],
            'logo': ['30px', { lineHeight: '1.2', fontWeight: '300' }],
            'logo-sm': ['24px', { lineHeight: '1.2', fontWeight: '300' }],
          },
        },
      },
    }
  </script>

  <!-- Site-specific styles (extracted from static site) -->
  <link rel="stylesheet" href="{{ asset('css/site.css') }}">

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

  <!-- Site JS (extracted from static site) -->
  <script src="{{ asset('js/site.js') }}"></script>
</body>
</html>
