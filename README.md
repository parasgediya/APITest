# Laravel Job API

## Setup Instructions

1. Clone the repository.
2. Install dependencies:
    ```bash
    composer install
    ```
3. Set up your `.env` file with your database credentials.
4. Run the migrations:
    ```bash
    php artisan migrate
    ```
5. Start the Laravel development server:
    ```bash
    php artisan serve
    ```
6. Start the queue worker:
    ```bash
    php artisan queue:work
    ```

## Testing the API

You can test the API using a tool like Postman or cURL. Here's an example using cURL:
```
curl -X POST http://127.0.0.1:8000/api/submit \
-H "Content-Type: application/json" \
-d '{
    "name": "John Doe",
    "email": "john.doe@example.com",
    "message": "This is a test message."
}'
```
## Running Tests
To run the unit tests:

```bash
php artisan test
```
This should give you a fully functional Laravel API with job queues, database operations, migrations, and event handling.
