
<p align="center"><a href=" https://github.com/SarahAbdeldaym/Online_Coaching_App.git" target="_blank"><img src="https://i.imgur.com/FMsPX5S.png" width="400"></a></p>


# Online Coach Booking System

This is a project is A Back-end of Personal Coach Booking web Application 
--------------------------------------------------------------------------

### Demo video
[![Watch the video](https://img.youtube.com/vi/qpkg6TL31mY/sddefault.jpg)](https://www.youtube.com/watch?v=qpkg6TL31mY)



### Team Members:
	- Sarah Abdeldaym.
    - Hossam Adel.
    - Amira Emad.
    - Shrouk mamdoh.
   

### Prerequisites

You should have  `composer` installed. If you don't install composer from [here](https://getcomposer.org/download/).

### Installing
1. Download the zipped file and unzip it or Clone it
	```sh
	git clone https://github.com/SarahAbdeldaym/Online_Coaching_App.git
	```
2. cd inside the project
    ```sh
    cd Online_Coaching_App
    ```
3.  Run this command to download composer packages
    ```sh
    composer update
    ```
4. Run this command to update composer packages
    ```sh
    composer install
    ```
5. Create a copy of your .env file
    ```sh
    cp .env.example .env
    ```
6. Generate an app encryption key
    ```sh
    php artisan key:generate
    ```
7. Create an empty database for our application in your DBMS
8. In the .env file, add database information to allow Laravel to connect to the database
9. Migrate the database
    ```sh
    php artisan migrate
    ```
10. Seed the database
    ```sh
    php artisan db:seed
    ```
11. Generate Storage folder in your public directory to store uploaded files or images
    ```sh
    php artisan storage:link
    ```

12. Open up the server
    ```sh
    php artisan serve
    ```
13. Open your browser on this url [http://localhost:8000](http://localhost:8000)


Copyright (c) 2022 OS42

