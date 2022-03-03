CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    first_name varchar(255) NOT NULL,
    last_name varchar(255) NOT NULL
);

CREATE TABLE products (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) NOT NULL,
    price int NOT NULL,
    availability int NOT NULL
);

CREATE TABLE orders (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    status ENUM('PENDING',  'PAID', 'SHIPPED', 'DELIVERED') DEFAULT 'PENDING' NOT NULL,
    user_id int NOT NULL,

    FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE orders_products (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    count int NOT NULL,
    product_id int NOT NULL,
    order_id int NOT NULL,
    
    FOREIGN KEY(order_id) REFERENCES orders(id),
    FOREIGN KEY(product_id) REFERENCES products(id)
);
