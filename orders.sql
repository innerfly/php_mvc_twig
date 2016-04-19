CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(9) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `address` varchar(35) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(35) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

INSERT INTO orders (amount, name, address, zip, city, country, email, phone) VALUES (15, 'John Doe', 'Tottenham Court Road 35', 'W1T 1JY', 'London', 'GB', 'asd@as.uk', '+441234554890');
INSERT INTO orders (amount, name, address, zip, city, country, email, phone) VALUES (68, 'Rojer Smith', 'Colmore Row 2', 'B3 2EW', 'Birmingham', 'GB', 'fff@ffd.co.uk', '+339876565555');
INSERT INTO orders (amount, name, address, zip, city, country, email, phone) VALUES (32, 'Hans Andersen', 'Western Road 9', 'BN1 2NW', 'Brighton', 'GB', 'ppp@ppp.de', '+491701234567');
INSERT INTO orders (amount, name, address, zip, city, country, email, phone) VALUES (9, 'Vasily Pupkin', 'Red square', '16540', 'Moscow', 'RU', 'vvv@rrr', '+7666555444');