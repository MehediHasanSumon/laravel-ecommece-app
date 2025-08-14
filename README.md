# Laravel E-Commerce Application

<p align="center"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></p>

## About ShopEase

ShopEase is a modern e-commerce application built with Laravel, offering a comprehensive solution for online retail businesses. This application provides both customer-facing shop interfaces and an administrative backend for managing all aspects of an e-commerce operation.

## Features

### Customer Features

- **Product Browsing**: Browse products with filtering by category, price range, and other attributes
- **Product Search**: Search functionality to quickly find products
- **User Accounts**: Register, login, and manage user profiles
- **Shopping Cart**: Add products to cart, update quantities, and proceed to checkout
- **Wishlist**: Save products for future consideration
- **Order Management**: View order history and track order status
- **Responsive Design**: Fully responsive interface that works on mobile, tablet, and desktop devices

### Admin Features

- **Dashboard**: Overview of sales, orders, and customer activity
- **Product Management**: Add, edit, and delete products with support for images, variants, and inventory
- **Category Management**: Organize products into categories and subcategories
- **Order Processing**: View, process, and update order statuses
- **Customer Management**: View and manage customer accounts
- **Discount & Coupon System**: Create and manage promotional offers
- **Newsletter Management**: Send and track marketing emails

## Technology Stack

- **Backend**: Laravel PHP Framework
- **Frontend**: Blade templates with Tailwind CSS
- **Database**: MySQL
- **Authentication**: Laravel Breeze/Fortify
- **Authorization**: Spatie Permission
- **Asset Compilation**: Vite

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/MehediHasanSumon/laravel-ecommece-app.git
   cd laravel-ecommece-app
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   ```

3. Set up environment variables:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure your database in the `.env` file

5. Run migrations and seed the database:
   ```bash
   php artisan migrate --seed
   ```

6. Compile assets:
   ```bash
   npm run dev
   ```

7. Start the development server:
   ```bash
   php artisan serve
   ```

## Usage

- Access the shop frontend at: `http://localhost:8000`
- Access the admin panel at: `http://localhost:8000/admin`

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
