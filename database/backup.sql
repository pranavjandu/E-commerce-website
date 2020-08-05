DROP TABLE credentials;

CREATE TABLE `credentials` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT 'password',
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO credentials VALUES("1","abc","202cb962ac59075b964b07152d234b70","pranav.jandu@gmail.com","0981082878");



DROP TABLE ordering;

CREATE TABLE `ordering` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `Customer Name` varchar(255) NOT NULL,
  `CustomerNumber` varchar(10) NOT NULL,
  `ProductOrdered` varchar(255) NOT NULL,
  `Quantity` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




DROP TABLE products;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

INSERT INTO products VALUES("1","mi","Mi A2 (4/64)","12999","a2.jpeg");
INSERT INTO products VALUES("2","mi","Redmi Note 8 Pro (6/64)","15999","n8p.jpeg");
INSERT INTO products VALUES("3","mi","Redmi Note 7 PRO (4\\64)","11999","n7p.jpeg");
INSERT INTO products VALUES("4","mi","Redmi Note 6 PRO (4\\64)","10999","n6p.jpeg");
INSERT INTO products VALUES("5","apple","Iphone 7","26999","7.jpeg");
INSERT INTO products VALUES("6","apple","Iphone 11","52999","11.jpeg");
INSERT INTO products VALUES("7","apple","Iphone XS","79000","xs.jpeg");
INSERT INTO products VALUES("8","apple","Iphone SE","42499","se.jpeg");
INSERT INTO products VALUES("9","oppo","Oppo A5 2020","12500","a5.jpg");
INSERT INTO products VALUES("10","oppo","Oppo A9 2020","14500","a9.jpg");
INSERT INTO products VALUES("11","oppo","Oppo A31 2020","10500","a31.jpg");
INSERT INTO products VALUES("12","realme","Realme 10","11999","10.jpeg");
INSERT INTO products VALUES("13","realme","Realme 10A","8499","10a.jpeg");
INSERT INTO products VALUES("14","realme","Realme C2","8000","c2.jpeg");
INSERT INTO products VALUES("15","realme","Realme 5 Pro","13999","r5p.jpeg");
INSERT INTO products VALUES("16","realme","Realme X","18999","x.jpeg");
INSERT INTO products VALUES("17","samsung","Samsung M01","9000","m01.jpeg");
INSERT INTO products VALUES("18","samsung","Samsung M11","11000","m11.jpeg");
INSERT INTO products VALUES("19","samsung","Samsung M21","13000","m21.jpg");
INSERT INTO products VALUES("20","samsung","Samsung A50","17000","a50.jpeg");
INSERT INTO products VALUES("21","samsung","Samsung A31","12000","a31.jpeg");
INSERT INTO products VALUES("22","vivo","Vivo Y91i","9000","y91i.jpg");
INSERT INTO products VALUES("23","vivo","Vivo Y11","10000","y11.jpg");
INSERT INTO products VALUES("24","vivo","Vivo Y15","12000","y15.jpg");
INSERT INTO products VALUES("25","vivo","Vivo Y19","14000","y19.jpg");
INSERT INTO products VALUES("26","vivo","Vivo Y50","18000","y50.jpg");
INSERT INTO products VALUES("27","samsung","Samsung M001","9000","m01.jpeg");



