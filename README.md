# Mini API One Piece
The Mini API One Piece is a simple API that allows you to interact with data related to One Piece characters and Devil Fruits. It provides endpoints for retrieving character details, creating new characters, updating existing ones, managing Devil Fruits, and more.

## Live API

You can access the live API at the following URL:

[https://api-onepiece.teguhrianto.com/](https://api-onepiece.teguhrianto.com/)

## API Documentation
You can access the detailed API documentation and endpoint descriptions here:

[https://documenter.getpostman.com/view/5968363/2s9YC7Sr79](https://documenter.getpostman.com/view/5968363/2s9YC7Sr79)

## Tech Stack

- **PHP**: The server-side scripting language used for building the API.
- **MySQL**: The relational database used to store character and Devil Fruit data.
- **Apache and Nginx**: Web servers for hosting the API (You can choose either).

## Local Development

Follow these steps to set up and run the One Piece Mini API on your local machine:

### Prerequisites

1. PHP installed on your system (version 7.4 or higher).
2. MySQL server installed and running.
3. Composer installed for managing PHP dependencies.

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/teguhrianto/MiniAPIOnePiece.git.git
2.  Change to the project directory:
    ```bash
    cd MiniAPIOnePiece
3.  Import the database schema by running the SQL script located in the database folder:

    ```bash
    mysql -u yourusername -p yourdbname < database/db_onepiece.sql
4. Configure the database connection by editing the **config/config.php** file.

## Running on Apache

1.  Place the project folder in your Apache web server directory.
2.  Make sure Apache is running.
3. Configure the `.htaccess` file located in the project's root directory to enable clean URLs and routing. The `.htaccess` file includes rules to rewrite URLs for friendly API endpoints. You don't need to make any changes to this file, as it's preconfigured.
4.  Access the API using a web browser or a tool like Postman

## Running on Nginx
1. Ensure that Nginx is installed and running on your system.
2. In the project root directory, you'll find an `nginx.conf` example file. This file contains an Nginx server block configuration that you can use to set up the project with Nginx. The `nginx.conf` file includes rules to rewrite URLs for friendly API endpoints
3. In your server block configuration file, adjust the settings as needed, including the `server_name` (replace with your domain or IP address) and the `root` (replace with the actual path to the project root directory).
4. Access the API using a web browser or a tool like Postman

## Author

**Teguh Rianto** Frontend Developer

**Portfolio** [https://teguhrianto.com](https://teguhrianto.com)

**Github** [https://github.com/teguhrianto](https://github.com/teguhrianto)
