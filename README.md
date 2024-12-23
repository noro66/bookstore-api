# Bookstore API - Symfony Project

This repository contains the source code for the **Bookstore API** built with Symfony. The API allows users to manage books, authors, and book categories, with functionalities like adding, editing, and deleting books, as well as listing available books.

## Prerequisites

Before setting up the project, ensure you have the following installed on your machine:

- PHP (version 8.0 or higher)
- Composer (dependency manager for PHP)
- Symfony CLI (optional but recommended for better development experience)
- PostgreSQL (or a compatible database server)

### Required PHP Extensions

- `pdo_pgsql`
- `mbstring`
- `openssl`
- `intl`

## Installation

### 1. Clone the repository

Start by cloning this repository to your local machine.

```bash
git clone https://github.com/your-username/bookstore-api.git
cd bookstore-api


2. Install Dependencies

Run the following command to install the required dependencies using Composer.

composer install

3. Configure the Environment

Copy the .env.example file to .env and modify the environment variables to fit your setup.

cp .env.example .env

Edit the .env file to configure the PostgreSQL database connection:

DATABASE_URL="pgsql://db_user:db_password@127.0.0.1:5432/bookstore_db"

Replace db_user, db_password, and bookstore_db with your actual PostgreSQL database credentials and name.
4. Set up the Database

Run the following command to create the database (if it doesn't exist) and run migrations.

php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

This will create the database and apply any pending migrations.
5. Load Fixtures (Optional)

If you'd like to load some example data into the database (books, authors), you can use the following command to load fixtures:

php bin/console doctrine:fixtures:load

6. Set up the Symfony Server (Optional)

If you are using Symfony's built-in server, you can run the following command to start the server:

symfony server:start

This will start a local development server. By default, the server will run on http://127.0.0.1:8000.
Usage

Usage

Once the setup is complete, you can access the API at http://127.0.0.1:8000/api/ (if using the Symfony server).
API Endpoints
Books

    GET /api/books - List all books
    POST /api/books - Create a new book
    GET /api/books/{id} - Get a single book by ID
    PUT /api/books/{id} - Update an existing book
    DELETE /api/books/{id} - Delete a book

Authors

    GET /api/authors - List all authors
    POST /api/authors - Create a new author
    GET /api/authors/{id} - Get a single author by ID
    PUT /api/authors/{id} - Update an existing author
    DELETE /api/authors/{id} - Delete an author

Reviews

    GET /api/reviews - List all reviews
    POST /api/reviews - Create a new review
    GET /api/reviews/{id} - Get a single review by ID
    PUT /api/reviews/{id} - Update an existing review
    DELETE /api/reviews/{id} - Delete a review

The API returns data in JSON format.