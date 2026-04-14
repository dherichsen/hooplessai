export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
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
  plugins: [],
}
