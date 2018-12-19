const FILES_TO_CACHE = [
'/index.html',
'/tracker/index.html',
'/style/style.css',
'/js/main.js',
'https://fonts.googleapis.com/css?family=Fjalla+One|Rubik',
'/assets/LongShineLogo.png',
'/assets/shineSolarLogo.png',
'/assets/ShineSunburst.png',
'/assets/icons/check-mark.svg',
'/assets/icons/clock.svg',
'/assets/icons/horizon.svg',
'/assets/icons/loader.svg',
'/assets/icons/login-icon.svg',
'/assets/icons/modal.svg',
'/assets/icons/phone.svg',
'/assets/icons/sun.svg'
//'/error/404.html'
];

const CACHE_NAME = `static-cache-v11-${new Date().getTime()}`;

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

	// Responding from cache if possible. If not, respond with the network or other cached content
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
	);

});

