## Running
php artisan serve --port=8686

## Urls
Without Cache
http://localhost:8686/test

With Cache
http://localhost:8686/test_memcache

Note: The first query, it is going to create the cache for 10 minutes, after the first query, the next queries are going to be so fast.

On routes/web.php are there the two routes with the code
