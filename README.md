# Laravel + Filament Blog App

## Description
The **Laravel + Filament Blog App** is a full-featured blogging platform built with Laravel and Filament. This application allows users to write, edit, and delete articles seamlessly through an intuitive admin dashboard. The platform provides an efficient content management system with a user-friendly interface, making it ideal for bloggers and content creators.

## Features
- User authentication and authorization
- Create, edit, and delete blog posts
- Filament-powered admin dashboard
- Responsive and user-friendly UI
- Efficient content management

## Installation Guide

### Prerequisites
Ensure you have the following installed on your system:
- PHP (>= 8.0)
- Composer
- Laravel (latest version recommended)
- MySQL or any other supported database
- Node.js & npm (for frontend assets)

### Setup Instructions

1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-repo-name.git
   cd your-repo-name
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Set Up Environment Variables**
   Copy the `.env.example` file and rename it to `.env`. Then update the necessary configuration values, especially database credentials.
   ```bash
   cp .env.example .env
   ```

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Run Database Migrations**
   ```bash
   php artisan migrate --seed
   ```

6. **Serve the Application**
   ```bash
   php artisan serve
   ```
   The application will be available at `http://127.0.0.1:8000`.

7. **Run Frontend Build (if applicable)**
   ```bash
   npm run dev
   ```

## Admin Dashboard Access
Once the setup is complete, you can access the admin panel at:
```
http://127.0.0.1:8000/admin
```
Use the default credentials created during the seeding process or register a new admin user.

## Contribution
Feel free to contribute to this project by submitting issues or pull requests.

## License
This project is open-source and available under the [MIT License](LICENSE).



