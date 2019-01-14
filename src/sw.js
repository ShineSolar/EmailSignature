const FILES_TO_CACHE = [
'https://fonts.googleapis.com/css?family=Fjalla+One|Rubik',
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
'/favicon.png'
];

const CACHE_NAME = `static-cache-v1`;

// Caching files in the cache
self.addEventListener("install", event => {
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

self.addEventListener("fetch", event => {

	// Getting URL
	const url = new URL(event.request.url);

/*	// Responding from cache if possible. If not, respond with the network or other cached content
	if (url.origin === location.origin && url.pathname === "/") {
		event.respondWith(caches.match("/index.html"));
		return;
	} else if (url.pathname === "/tracker/") {
		event.respondWith(caches.match("/tracker/index.html"));
		return;
	}

	event.respondWith(
		caches.match(event.request)
		.then(response => response || fetch(event.request))
	);*/

});

