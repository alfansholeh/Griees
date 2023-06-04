/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/views/**/*.blade.php",
      "./public/js/addTransactionRow.js"
  ],
  theme: {
    extend: {
        colors: {
            "primary": "#0028B7"
        }
    },
  },
  plugins: [],
}

