# Set up  Laravel application with Docker

To start containers run 
```bash
docker-compose up -d
```

To install dependencies run 
```bash
docker exec -it laravel_app composer install
```

To create database and seed it run 
```bash
docker exec -it laravel_app php artisan app:migrate-env-database
```

To create test database and seed it run 
```bash
docker exec -it laravel_app php artisan app:migrate-test-database
```

## Run tests
Run 
```bash
docker exec -it laravel_app php artisan test
```
to run tests.

## Generate OpenAPI documentation
Run 
```bash
docker exec -it laravel_app php artisan l5-swagger:generate
```
to generate OpenAPI documentation.

API documentation is available at [http://localhost:8000/api/documentation](http://localhost:8000/api/documentation).
