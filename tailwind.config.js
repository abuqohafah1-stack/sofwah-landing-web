/** @type {import('tailwindcss').Config} */
// SOFWAH-WEB · Tailwind design tokens — encodes Sofwah Brand DNA exactly.
// Colors are the 8 official tokens only. State changes (hover/active) use
// opacity, glow, and the accent token — never invented shades.
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './app/**/*.php',
  ],
  theme: {
    extend: {
      colors: {
        bg:      '#0B0B0D', // primary background (~70%)
        surface: '#151517', // secondary surface (cards, bento)
        brand:   '#730D04', // Deep Arabic Red (~15%) — primary CTA, active
        accent:  '#FF9A06', // Golden Orange (~10%) — hover, ratings, highlights
        gold:    '#FFDA7C', // Luxury Gold (~5%) — signature/VIP, sparingly
        ink: {
          DEFAULT: '#FFFFFF', // primary text
          2: '#D1D5DB',       // secondary text
          3: '#9CA3AF',       // muted text
        },
      },
      fontFamily: {
        display: ['Poppins', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        sans:    ['Poppins', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        arabic:  ['Tajawal', 'sans-serif'],
      },
      borderRadius: {
        xl2: '1.25rem',
        xl3: '1.75rem',
      },
      backdropBlur: {
        glass: '28px',
      },
      boxShadow: {
        // warm grill-glow for CTA hover / signature emphasis (accent-based)
        glow: '0 0 80px -20px rgba(255,154,6,0.45)',
      },
      maxWidth: {
        content: '1200px',
      },
    },
  },
  plugins: [],
}
