/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
    ],
    theme: {
      extend: {},
    },
    plugins: [],
  }


// /** @type {import('tailwindcss').Config} */
// module.exports = {
//     content: [
//       './resources/**/*.blade.php',
//       './resources/**/*.js',
//       './resources/**/*.vue',
//       './resources/**/*.jsx',
//       './resources/**/*.tsx',
//     ],
//     theme: {
//       extend: {
//         colors: {
//           primary: {
//             light: '#4c51bf',
//             DEFAULT: '#3c366b',
//             dark: '#2a2a54',
//           },
//           secondary: {
//             light: '#f56565',
//             DEFAULT: '#e53e3e',
//             dark: '#c53030',
//           },
//         },
//         fontFamily: {
//           sans: ['Nunito', 'sans-serif'],
//           serif: ['Merriweather', 'serif'],
//         },
//       },
//     },
//     plugins: [
//       require('@tailwindcss/forms'),
//       require('@tailwindcss/typography'),
//       require('@tailwindcss/aspect-ratio'),
//     ],
//   }
