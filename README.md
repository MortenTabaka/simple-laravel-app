# Set up  Laravel application with Docker

Run `docker-compose up -d` to start containers.

Run `docker exec -it laravel_app php artisan app:migrate-env-database` to create database and seed it.

Run `docker exec -it laravel_app php artisan app:migrate-test-database` to create test database and seed it.

## Run tests
Run `docker exec -it laravel_app php artisan test` to run tests.

## Generate OpenAPI documentation
Run `docker exec -it laravel_app php artisan l5-swagger:generate` to generate OpenAPI documentation.

API documentation is available at [http://localhost:8000/api/documentation](http://localhost:8000/api/documentation).
