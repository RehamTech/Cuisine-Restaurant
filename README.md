# Cuisine - Restaurant Management System

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/bootstrap-%238511FA.svg?style=for-the-badge&logo=bootstrap&logoColor=white)

Cuisine is a high-end Restaurant Management System built with Laravel, featuring a luxury dining interface and a robust admin dashboard for meal and category management.

## ✨ Features

- **Luxury Admin Dashboard**: Clean and modern UI for managing the restaurant's offerings.
- **Category Management**: Organize meals into customizable categories.
- **Meal CRUD**: Full control over meal items, including descriptions, prices, and images.
- **Elegant Menu Page**: A beautifully designed public menu showcasing featured dishes.
- **Responsive UI**: Optimized for all devices using Bootstrap 5 and custom CSS.
- **Authentic Design**: Uses premium fonts (Playfair Display & Montserrat) for a luxury feel.
- **Secure Authentication**: Protected admin routes.

## 🛠️ Tech Stack

- **Backend**: Laravel 10+
- **Frontend**: Blade, Bootstrap 5, FontAwesome
- **Database**: MySQL

## 🚀 Installation

1.  **Clone the repository**:
    ```bash
    git clone https://github.com/RehamTech/Cuisine-Restaurant.git
    cd Cuisine-Restaurant
    ```

2.  **Install PHP dependencies**:
    ```bash
    composer install
    ```

3.  **Setup Environment**:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Database Migration**:
    Configure your database in `.env` and run:
    ```bash
    php artisan migrate
    ```

5.  **Run the application**:
    ```bash
    php artisan serve
    ```

## 📸 Preview

*(Add your screenshots here)*

## 📄 License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
