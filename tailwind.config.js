module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './resources/**/*.css',
    ],
    theme: {
        extend: {
            fontFamily: {
                display: ['Playfair Display', 'serif'],
                body: ['Manrope', 'sans-serif'],
            },
            boxShadow: {
                soft: '0 24px 70px rgba(78, 52, 35, 0.12)',
            },
            colors: {
                coffee: {
                    50: '#fdf8f4',
                    100: '#f8eee6',
                    200: '#efddcd',
                    300: '#e0bf9e',
                    400: '#c98b5a',
                    500: '#a86435',
                    600: '#8b5e34',
                    700: '#6e4829',
                    800: '#4e3323',
                    900: '#2d1c14',
                },
            },
        },
    },
    plugins: [],
};