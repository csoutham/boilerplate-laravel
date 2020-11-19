const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
	purge: [
		'./resources/views/**/*.blade.php',
	],
	theme: {
		extend: {
			fontFamily: {
				display: ['Ovo', ...defaultTheme.fontFamily.sans],
				sans: ['Quattrocento Sans', ...defaultTheme.fontFamily.sans],
			},
			opacity: {
				'10': '0.1',
				'20': '0.2',
				'80': '0.8',
				'90': '0.9',
			},
			backgroundOpacity: {
				'10': '0.1',
				'20': '0.2',
				'80': '0.8',
				'90': '0.9',
			}
		},
	},
	variants: {
		backgroundOpacity: ['responsive', 'hover', 'focus', 'active'],
		backgroundColor: ['responsive', 'hover', 'focus', 'disabled'],
		borderOpacity: ['responsive', 'hover', 'focus'],
	},
	plugins: [
		require('@tailwindcss/ui')({
			layout: 'sidebar',
		}),
		require('autoprefixer'),
	],
	future: {
		removeDeprecatedGapUtilities: true,
		purgeLayersByDefault: true,
	},
}
