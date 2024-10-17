CREATE IF NOT EXISTS categories (
    id SERIAL NOT NULL PRIMARY KEY,
    name TEXT NOT NULL UNIQUE,
    desc TEXT NOT NULL,
    img VARCHAR(255) NOT NULL
);

CREATE IF NOT EXISTS products (
    id SERIAL NOT NULL PRIMARY KEY,
    name TEXT NOT NULL UNIQUE,
    desc TEXT NOT NULL,
    img VARCHAR(255) NOT NULL,
    price INTEGER NOT NULL CHECK (price >= 0),
    category_id INTEGER NOT NULL REFERENCES categories.id ON DELETE RESTRICT
);

CREATE IF NOT EXISTS users (
    id SERIAL NOT NULL PRIMARY KEY,
    username TEXT NOT NULL UNIQUE,
    email TEXT NOT NULL UNIQUE,
    password BYTEA NOT NULL,
    salt BYTEA NOT NULL
);

CREATE IF NOT EXISTS orders (
    id SERIAL NOT NULL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES users.id ON DELETE CASCADE,
    creation_date TIMESTAMP DEFAULT NOW
);

CREATE IF NOT EXISTS order_products (
    order INTEGER NOT NULL REFERENCES orders.id ON DELETE CASCADE,
    product INTEGER NOT NULL REFERENCES products.id ON DELETE CASCADE,
    price INTEGER NOT NULL CHECK (price >= 0),
    quantity INTEGER NOT NULL CHECK (quantity > 0)
);
