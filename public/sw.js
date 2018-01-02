self.addEventListener('install', function (e) {
    e.waitUntil(
        caches.open('live-gw2').then(function (cache) {
            return cache.addAll([
                '/index.php',
                '/events',
                '/js/app.js',
                '/css/app.css',
                '/css/main.css'
            ]);
        })
    );
});

self.addEventListener('fetch', function (event) {
    event.respondWith(
        caches.match(event.request).then(function (resp) {
            return resp || fetch(event.request).then(function (response) {
                return caches.open('live-gw2').then(function (cache) {
                    cache.put(event.request, response.clone());
                    return response;
                });
            });
        })
    );
});