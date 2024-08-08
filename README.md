# Employee Management API

This is a Laravel 11 backend API for managing employees. The API includes authentication via Laravel Passport and CRUD operations for employee records.

## Requirements

-   PHP >= 8.0
-   Composer
-   Laravel >= 10.x
-   Laravel Passport
-   MySQL or any other supported database

## Installation

1. **Clone the repository:**

```bash
git clone https://github.com/katherinekhine/apiEmployeeCRUD.git
```

2. **Navigate to the project directory:**

```bash
cd apiEmployeeCRUD
```

3. **Install dependencies:**

```bash
composer install
```

4.  **Setup the environment variables:**

    Copy the `.env.example` file to `.env` and configure your database and other settings.

```bash
cp .env.example .env
```

5. **Setup private and public key**

    Setup your own env variables for private and public key in `.env` file for Laravel passport. Key generation website [https://cryptotools.net/rsagen](https://cryptotools.net/rsagen)

6. **Generate application key:**

```bash
php artisan key:generate
```

7.  **Migrate the database:**

```bash
php artisan migrate
```

8.  **Generate passport keys:**

```bash
php artisan passport:keys --force
```

9.  **Setup passport client:**

```bash
php artisan passport:client --personal
```

10. **Run the server:**

```bash
php artisan serve
```

## API Endpoints

### Authentication

-   **Register:** `POST http://localhost:8000/api/auth/register`

    Registers a new user.

#### Request payload

```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "your_password"
}
```

-   **Login:** `POST http://localhost:8000/api/auth/login`

    Login user.

#### Request payload

```json
{
    "email": "john@example.com",
    "password": "your_password"
}
```

### Employee

-   **Create new employee:** `POST http://localhost:8000/api/employees`

    Create new employees.

#### Request payload

```json
{
    "name": "nono",
    "email": "nono1@gmail.com",
    "phone": "0909896877",
    "address": "yangon",
},
```

-   **Get all employees:** `GET http://localhost:8000/api/employees`

    Get all employees.

#### Response payload

```json
[
    {
        "id": 1,
        "name": "nono",
        "email": "nono1@gmail.com",
        "phone": "0909896877",
        "address": "yangon",
        "created_at": "2024-08-08T07:50:08.000000Z",
        "updated_at": "2024-08-08T13:52:06.000000Z"
    },
    ...
]
```

-   **Get employee by id:** `GET http://localhost:8000/api/employees/1`

    Get employee by id.

#### Response payload

```json
{
    "data": {
        "id": 1,
        "name": "nono",
        "email": "nono1@gmail.com",
        "phone": "0909896877",
        "address": "yangon",
        "created_at": "2024-08-08T07:50:08.000000Z",
        "updated_at": "2024-08-08T13:52:06.000000Z"
    }
}
```

-   **Edit/update the employee:** `PUT http://localhost:8000/api/employees/1`

    Edit/update new employee.

#### Request payload

```json
{
    "name": "nono Update",
    "email": "nono1@gmail.com",
    "phone": "0909896877",
    "address": "yangon",
},
```

-   **Delete the employee:** `DELETE http://localhost:8000/api/employees/1`

    Delete the employee.

#### Response payload

```json
{
    "message": "Successfully deleted",
},
```
