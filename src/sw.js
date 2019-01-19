const FILES_TO_CACHE = [
'/',
'/style/fonts/Rubik-Regular.ttf',
'/style/fonts/FjallaOne-Regular.ttf',
'/style/style.css',
'/js/main.js',
'/assets/loader.svg',
'/assets/logo.svg',
'/assets/shine-sun.svg',
'/assets/video-icon.svg',
'/assets/white-video-icon.svg',
'/assets/pwa_icons/shine_pwa_icon.png',
'/favicon.svg',
'/assets/check.svg',
'/favicon.png',
'/manifest.webmanifest',
'https://signatures.shinesolar.com/assets/logos/v2/shine-home-email.png',
'https://signatures.shinesolar.com/assets/logos/v2/shine-solar-email.png'
];

const CACHE_NAME = `static-cache-v3`;

// Caching files in the cache
self.addEventListener('install', event => {
	event.waitUntil(
		caches.open(CACHE_NAME)
		.then(cache => {
			return cache.addAll(FILES_TO_CACHE)
		})
		.catch(err => {
			console.log(err);
			// log this error
		})
	);
});

self.addEventListener('fetch', ev => {

	// Getting URL
	const url = new URL(ev.request.url);

	if (url.host.search('google') !== -1) {

		// Network only for the index page and the google analytics
		ev.respondWith(fetch(ev.request));

	} else if (url.pathname === '/style/style.css' || url.pathname === '/js/main.js' || url.pathname === '/' || url.pathname === '/manifest.webmanifest') {

		// Network falling back to cache for the CSS and JS
		ev.respondWith(
			fetch(ev.request).catch(() => {
				ev.respondWith(caches.match(ev.request));
			})
		);

	} else {

		// Cache only for the images, fonts, and manifest file
		ev.respondWith(caches.match(ev.request));

	}

});

