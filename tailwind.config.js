import defaultTheme from 'tailwindcss/defaultTheme'
import colors from 'tailwindcss/colors'
import aspectRatio from '@tailwindcss/aspect-ratio'
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'

/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  important: true,
  content: [
    'resources/**/*.{js,md,blade.php}',
  ],
  theme: {
    extend: {
      colors: {
        gray: colors.zinc,
        primary: colors.blue,
        success: colors.green,
        warning: colors.amber,
        danger: colors.red,
      },
      fontFamily: {
        sans: ['Geist', ...defaultTheme.fontFamily.sans],
        mono: ['JetBrains Mono', 'monospace', ...defaultTheme.fontFamily.mono],
        system: defaultTheme.fontFamily.sans,
      },
      maxWidth: {
        '8xl': '92rem',
      },
      boxShadow: {
        'white': "2px 2px 0 theme('colors.white', 'currentColor')",
        'white-lg': "4px 4px 0 theme('colors.white', 'currentColor')",
        'stack-black': "3px 3px 0 -1px #fff, 3px 3px 0 theme('colors.black'), 4px 4px 4px theme('colors.gray.900')",
        'stack-primary-sm': "3px 3px 0 -1px #fff, 3px 3px 0 theme('colors.primary.600'), 4px 4px 4px theme('colors.primary.300')",
        'stack-danger-sm': "3px 3px 0 -1px #fff, 3px 3px 0 theme('colors.danger.600'), 4px 4px 4px theme('colors.danger.300')",
        'stack-warning-sm': "3px 3px 0 -1px #fff, 3px 3px 0 theme('colors.warning.600'), 4px 4px 4px theme('colors.warning.300')",
        'stack-sm': "3px 3px 0 -1px #fff, 3px 3px 0 theme('colors.primary.300')",
        'stack': "5px 5px 0 -1px #fff, 5px 5px 0 theme('colors.primary.300')",
        'stack-md': "10px 10px 0 -1px #fff, 10px 10px 0 theme('colors.primary.300')",
        'stack-lg': "20px 20px 0 -1px #fff, 20px 20px 0 theme('colors.primary.300'), 40px 40px 0 -1px #fff, 40px 40px 0 theme('colors.black')",
        'bleed-warning': "0 3px 1px theme('colors.warning.300')",
        'outline': '0 0 0 3px rgba(66, 153, 225, 0.5)',
      },
      spacing: {
        68: '17rem',
        74: '18.5rem',
        76: '19rem'
      },
      typography: (theme) => ({
        DEFAULT: {
          css: {
            a: {
              color: theme('colors.primary.500'),
              '&:hover': {
                color: theme('colors.primary.600'),
              },
              '&:focus': {
                color: theme('colors.primary.600'),
              },
            },
            blockquote: {
              fontStyle: 'normal',
            },
            h1: {
              fontWeight: theme('fontWeight.extraBold'),
              fontSize: theme('fontSize.5xl')
            },
            'blockquote p:first-of-type::before': {
              content: 'none',
            },
            'blockquote p:first-of-type::after': {
              content: 'none',
            },
            'pre, code, p > code': {
              fontWeight: theme('fontWeight.medium'),
              color: theme('colors.primary.800'),
              backgroundColor: theme('colors.primary.100'),
              borderRadius: theme('borderRadius.sm'),
              padding: '.125rem .375rem',
            },
          },
        },
        invert: {
          css: {
            a: {
              color: theme('colors.primary.600'),
              '&:hover': {
                color: theme('colors.primary.500'),
              },
              '&:focus': {
                color: theme('colors.primary.500'),
              },
            },
            'pre, code, p > code': {
              color: theme('colors.primary.100'),
              backgroundColor: theme('colors.primary.900'),
            },
          },
        },
      }),
    },
  },
  plugins: [aspectRatio, forms, typography],
}
