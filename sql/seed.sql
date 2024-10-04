-- Inserting users (Admin, Manager, Passengers)
INSERT INTO users (name, email, password, role) VALUES
('Admin User', 'admin@railway.com', MD5('admin123'), 'Admin'),
('Manager User', 'manager@railway.com', MD5('manager123'), 'Manager'),
('Passenger One', 'passenger1@gmail.com', MD5('passenger123'), 'Passenger'),
('Passenger Two', 'passenger2@gmail.com', MD5('passenger456'), 'Passenger');

-- Inserting trains (popular Indian trains)
INSERT INTO trains (train_name, train_number, train_type, train_route) VALUES
('Rajdhani Express', '12951', 'Superfast', 'New Delhi - Mumbai Central'),
('Shatabdi Express', '12009', 'Shatabdi', 'Mumbai Central - Ahmedabad'),
('Duronto Express', '12269', 'Duronto', 'Chennai Central - Hazrat Nizamuddin'),
('Gatimaan Express', '12049', 'Semi-High Speed', 'Hazrat Nizamuddin - Jhansi'),
('Garib Rath Express', '12216', 'Garib Rath', 'New Delhi - Bandra Terminus'),
('Tejas Express', '22119', 'Semi-High Speed', 'Mumbai CSMT - Karmali (Goa)'),
('Jan Shatabdi Express', '12023', 'Shatabdi', 'Howrah - Patna'),
('Vande Bharat Express', '22436', 'High Speed', 'Varanasi - New Delhi');


-- Inserting routes (major Indian rail routes)
INSERT INTO routes (route_name, stations) VALUES
('New Delhi - Mumbai Central', 'New Delhi, Mathura, Kota, Vadodara, Mumbai Central'),
('Mumbai Central - Ahmedabad', 'Mumbai Central, Borivali, Surat, Vadodara, Ahmedabad'),
('Chennai Central - Hazrat Nizamuddin', 'Chennai Central, Vijayawada, Nagpur, Jhansi, Hazrat Nizamuddin'),
('Hazrat Nizamuddin - Jhansi', 'Hazrat Nizamuddin, Agra Cantt, Gwalior, Jhansi'),
('New Delhi - Bandra Terminus', 'New Delhi, Mathura, Kota, Ratlam, Surat, Bandra Terminus'),
('Mumbai CSMT - Karmali (Goa)', 'Mumbai CSMT, Panvel, Ratnagiri, Kudal, Karmali'),
('Howrah - Patna', 'Howrah, Asansol, Jhajha, Mokama, Patna'),
('Varanasi - New Delhi', 'Varanasi, Allahabad, Kanpur, Ghaziabad, New Delhi');


-- Inserting sample bookings
INSERT INTO bookings (user_id, train_id, travel_date, class) VALUES
(3, 1, '2024-10-15', 'Economy'),   -- Passenger One, Rajdhani Express
(4, 2, '2024-11-01', 'Business'),  -- Passenger Two, Shatabdi Express
(3, 5, '2024-12-05', 'Economy'),   -- Passenger One, Garib Rath Express
(4, 7, '2024-10-20', 'Business'),  -- Passenger Two, Jan Shatabdi Express
(3, 4, '2024-10-25', 'Economy'),   -- Passenger One, Gatimaan Express
(4, 6, '2024-11-15', 'Business');  -- Passenger Two, Tejas Express
