-- Categories
INSERT INTO categories (name, description, img) VALUES
    ('Smartphones', 'Latest mobile phones from top brands', '/images/categories/smartphones.jpg'),
    ('Cases', 'Protective cases and covers', '/images/categories/cases.jpg'),
    ('Chargers', 'Fast charging adapters and cables', '/images/categories/chargers.jpg'),
    ('Screen Protectors', 'Tempered glass and protective films', '/images/categories/screen-protectors.jpg'),
    ('Accessories', 'Stands, holders and other accessories', '/images/categories/accessories.jpg');

-- Products
INSERT INTO products (name, description, img, price, category_id) VALUES
    ('iPhone 14 Pro', '6.1" Super Retina XDR display, A16 Bionic chip', '/images/products/iphone14pro.jpg', 999, 1),
    ('Samsung Galaxy S23', '6.8" Dynamic AMOLED 2X, Snapdragon 8 Gen 2', '/images/products/s23.jpg', 899, 1),
    ('Google Pixel 7', '6.3" FHD+ OLED display, Google Tensor G2', '/images/products/pixel7.jpg', 599, 1),
    ('Spigen Tough Armor Case', 'Dual-layer protection for iPhone 14 Pro', '/images/products/spigen-case.jpg', 29, 2),
    ('OtterBox Defender', 'Rugged protection for Samsung Galaxy S23', '/images/products/otterbox.jpg', 39, 2),
    ('Anker 65W Charger', 'GaN II technology with 3 USB ports', '/images/products/anker-charger.jpg', 49, 3),
    ('Belkin Wireless Charger', '15W fast wireless charging pad', '/images/products/belkin-charger.jpg', 35, 3),
    ('ESR Screen Protector', 'Tempered glass 2-pack for iPhone', '/images/products/esr-protector.jpg', 15, 4),
    ('ZAGG Glass Shield', 'Anti-bacterial screen protection', '/images/products/zagg-protector.jpg', 19, 4),
    ('PopSocket Grip', 'Expandable phone grip and stand', '/images/products/popsocket.jpg', 12, 5),
    ('Phone Ring Holder', 'Metal ring kickstand with car mount', '/images/products/ring-holder.jpg', 9, 5);

-- Sample Users (passwords are hashed versions of "password123")
INSERT INTO users (username, email, password, salt) VALUES
    ('john_doe', 'john@example.com', decode('5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'hex'), decode('0123456789abcdef', 'hex')),
    ('jane_smith', 'jane@example.com', decode('5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'hex'), decode('fedcba9876543210', 'hex'));

-- Sample Orders
INSERT INTO orders (user_id) VALUES
    (1),
    (1),
    (2);

-- Order Products
INSERT INTO order_products (order_id, product_id, price, quantity) VALUES
    (1, 1, 999, 1),
    (1, 4, 29, 1),
    (1, 6, 49, 1),
    (2, 3, 599, 1),
    (2, 8, 15, 2),
    (3, 2, 899, 1),
    (3, 5, 39, 1),
    (3, 7, 35, 1),
    (3, 10, 12, 2);
