CREATE TABLE IF NOT EXISTS categories (
    id SERIAL NOT NULL PRIMARY KEY,
    name TEXT NOT NULL UNIQUE,
    description TEXT NOT NULL,
    img VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS products (
    id SERIAL NOT NULL PRIMARY KEY,
    name TEXT NOT NULL UNIQUE,
    description TEXT NOT NULL,
    img VARCHAR(255) NOT NULL,
    price INTEGER NOT NULL CHECK (price >= 0),
    category_id INTEGER NOT NULL REFERENCES categories (id) ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS users (
    id SERIAL NOT NULL PRIMARY KEY,
    username TEXT NOT NULL UNIQUE,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    address VARCHAR(30) NOT NULL,
    city VARCHAR(30) NOT NULL,
    zip_code VARCHAR(5) NOT NULL
);

CREATE TABLE IF NOT EXISTS orders (
    id SERIAL NOT NULL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES users (id) ON DELETE CASCADE,
    creation_date TIMESTAMP DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS order_products (
    order_id INTEGER NOT NULL REFERENCES orders (id) ON DELETE CASCADE,
    product_id INTEGER NOT NULL REFERENCES products (id) ON DELETE CASCADE,
    price INTEGER NOT NULL CHECK (price >= 0),
    quantity INTEGER NOT NULL CHECK (quantity > 0)
);

ALTER TABLE order_products ADD PRIMARY KEY (order_id, product_id);
