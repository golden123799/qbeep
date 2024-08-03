# Mini-CRM Admin Panel

This project is a mini-CRM built with Laravel that allows administrators to manage companies and their employees. It includes basic CRUD functionality, authentication, and API endpoints for interacting with the data.

## Table of Contents

-   [Project Setup](#project-setup)
-   [Authentication](#authentication)
-   [Database Setup](#database-setup)
-   [CRUD Functionality](#crud-functionality)
-   [Logo Storage](#logo-storage)
-   [Validation and Pagination](#validation-and-pagination)
-   [Resource Controllers](#resource-controllers)
-   [API and Web Routes](#api-and-web-routes)
-   [Testing](#testing)
-   [Commands](#commands)

## Project Setup

1. Clone the repository:

    ```bash
    git clone https://github.com/your-username/mini-crm.git
    cd mini-crm
    ```

2. Install dependencies:

    ```bash
    composer install
    npm install
    ```

3. Set up your environment file:

    Copy `.env.example` to `.env` and configure your environment variables as needed.

    ```bash
    cp .env.example .env
    ```

4. Create a symbolic link for storage:

    ```bash
    php artisan storage:link
    ```

## Authentication

-   Basic Laravel authentication is implemented to allow administrators to log in.
-   Registration functionality is disabled.
-   Use the credentials `admin@admin.com` and `password` for initial login.

## Database Setup

1. Set up the database configuration in the `.env` file. Ensure you have the correct database connection details.

2. Run the migrations to create the necessary database tables:

    ```bash
    php artisan migrate
    ```

3. Seed the database with an initial user, api token and sample data:

    ```bash
    php artisan db:seed
    ```

    This command creates an initial user with the email `admin@admin.com` and password `password`, along with sample companies and employees.

## CRUD Functionality

-   **Companies**: You can create, read, update, and delete company records.
-   **Employees**: You can create, read, update, and delete employee records.
-   Both entities are managed through the admin panel interface.

## Logo Storage

-   Company logos are stored in the `storage/app/public` folder.
-   Ensure that the logos are accessible from the public domain by creating a symbolic link:

    ```bash
    php artisan storage:link
    ```

## Validation and Pagination

-   Laravel's validation functions are used in request classes to validate input data.
-   Lists of companies and employees are paginated with 10 entries per page.

## Resource Controllers

-   Basic Laravel resource controllers are used with default methods (`index`, `create`, `store`, etc.) for handling CRUD operations.

## API and Web Routes

-   Web routes are used for the admin panel interface.
-   An API endpoint is available to return a single company with a list of employees, including the `employee_count` attribute.

    Example API endpoint:

    ```
    GET /api/companies/{company}
    ```

## Testing

-   Test the API using Postman or any other API testing tool.
-   Ensure that the API responses include the necessary data and are authenticated properly.

## Commands

-   **Start the Development Server**:

    ```bash
    php artisan serve
    ```

-   **Start the Frontend Development Server**:

    ```bash
    npm run dev
    ```
