# Task Manager Project

This is a simple Task Manager application built using Laravel for the backend and Vue.js for the frontend. The project includes user authentication, task management (CRUD operations), and ensures only authenticated users can manage tasks.

## Prerequisites

Before setting up the project, ensure you have the following installed on your machine:
- PHP 
- Composer
- Node.js 
- NPM or Yarn
- MySQL
  
## Getting Started

Follow these instructions to get the project running locally.

### Clone the repository

```bash
git clone https://github.com/wgclakshan/TaskTrack.git
```

### Navigate into the project directory

```bash
cd task-manager
```

### Install PHP dependencies

```bash
composer install
```

### Install JavaScript dependencies

Using NPM:

```bash
npm install
```

### Set up the environment variables

Copy the `.env.example` file to `.env`:

Edit the `.env` file to match your environment settings, such as database configuration:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Run database migrations

```bash
php artisan migrate
```

### Compile assets

For development (with hot reloading):

```bash
npm run dev
```

### Start the server

Run the Laravel development server:

```bash
php artisan serve
```

By default, the application will be available at `http://localhost:8000`.

### Access the application

Once the server is running, you can access the application in your browser at:

```
http://localhost:8000
```

