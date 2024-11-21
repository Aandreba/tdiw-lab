-- Categories
INSERT INTO categories (name, description, img) VALUES
    ('Smartphones', 'Latest mobile phones from top brands', '/images/categories/smartphones.jpg'),
    ('Cases', 'Protective cases and covers', '/images/categories/cases.jpg'),
    ('Chargers', 'Fast charging adapters and cables', '/images/categories/chargers.jpg'),
    ('Screen Protectors', 'Tempered glass and protective films', '/images/categories/screen-protectors.jpg'),
    ('Accessories', 'Stands, holders and other accessories', '/images/categories/accessories.jpg');

-- Products
INSERT INTO products (name, description, img, price, category_id) VALUES
    ('iPhone 14 Pro', '6.1" Super Retina XDR display, A16 Bionic chip', '/images/products/iphone14pro.jpg', 99900, 1),
    ('Samsung Galaxy S23', '6.8" Dynamic AMOLED 2X, Snapdragon 8 Gen 2', '/images/products/s23.jpg', 89900, 1),
    ('Google Pixel 7', '6.3" FHD+ OLED display, Google Tensor G2', '/images/products/pixel7.jpg', 59900, 1),
    ('Spigen Tough Armor Case', 'Dual-layer protection for iPhone 14 Pro', '/images/products/spigen-case.jpg', 2900, 2),
    ('OtterBox Defender', 'Rugged protection for Samsung Galaxy S23', '/images/products/otterbox.jpg', 3900, 2),
    ('Anker 65W Charger', 'GaN II technology with 3 USB ports', '/images/products/anker-charger.jpg', 4900, 3),
    ('Belkin Wireless Charger', '15W fast wireless charging pad', '/images/products/belkin-charger.jpg', 3500, 3),
    ('ESR Screen Protector', 'Tempered glass 2-pack for iPhone', '/images/products/esr-protector.jpg', 1500, 4),
    ('ZAGG Glass Shield', 'Anti-bacterial screen protection', '/images/products/zagg-protector.jpg', 1900, 4),
    ('PopSocket Grip', 'Expandable phone grip and stand', '/images/products/popsocket.jpg', 1200, 5),
    ('Phone Ring Holder', 'Metal ring kickstand with car mount', '/images/products/ring-holder.jpg', 900, 5);

-- Sample Users (passwords are hashed versions of "password123")
INSERT INTO users (username, email, password, address, city, zip_code) VALUES
    ('john_doe', 'john@example.com', '$2y$10$vIJwRHrxYmSCxAbCjqicYu/5d8Jb5zGUe1EqrEB0UQhhyp8YgTA1C', '123 Maple Street', 'Springfield', '62704'),
    ('jane_smith', 'jane@example.com', '$2y$10$2DNUY5pNs4GRf4Kw9dwrau7O8ncnzGL1mXfw/ngLz2K6rDe0dTM3G', '456 Oak Avenue', 'Riverside', '92501');

-- Sample Orders
INSERT INTO orders (user_id) VALUES
    (1),
    (1),
    (2);

-- Order Products
INSERT INTO order_products (order_id, product_id, price, quantity) VALUES
    (1, 1, 99900, 1),
    (1, 4, 2900, 1),
    (1, 6, 4900, 1),
    (2, 3, 59900, 1),
    (2, 8, 1500, 2),
    (3, 2, 89900, 1),
    (3, 5, 3900, 1),
    (3, 7, 3500, 1),
    (3, 10, 1200, 2);
