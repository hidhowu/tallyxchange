/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["*.{html,js,php}", "includes/*.{php,html}"],
  theme: {
    extend: {},
    colors: {
      green: "#17BF83",
      green2: "#3DE881",
      white: "#ffffff",
      black: "#000000",
      gray: "#D4D4D4",
      darkgray: "#1b212e",
      lightgray: "#EFEFEF",
      lightgray2: "#F7F7F7",
      green3: "rgba(23, 191, 131, 0.72)",
      tablegreen: "#CDF1E4",
    },

    backgroundImage: {
      ratebg: "url('https://tallyxchange.com/images/ratebg.png')",
      aboutback: "url('https://tallyxchange.com/images/aboutback.png')",
    },
  },
  plugins: [],
};
