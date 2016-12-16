--
-- Table structure for table `bins`
--
CREATE TABLE IF NOT EXISTS bins (
  bin_id TINYINT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `status`
--
CREATE TABLE IF NOT EXISTS status (
  status_id TINYINT PRIMARY KEY AUTO_INCREMENT,
  description VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `products`
--
CREATE TABLE IF NOT EXISTS products (
  product_id INT(11) PRIMARY KEY AUTO_INCREMENT,
  bin_id TINYINT NOT NULL,
  name VARCHAR(255) NOT NULL,
  FOREIGN KEY (bin_id) REFERENCES bins(bin_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `unclassified_products`
--
CREATE TABLE IF NOT EXISTS unclassified_products (
  product_id INT(11) PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(255) DEFAULT NULL,
  name VARCHAR(255) NOT NULL,
  creation_date DATETIME NOT NULL DEFAULT NOW(),
  status_id TINYINT NOT NULL DEFAULT 1,
  FOREIGN KEY (status_id) REFERENCES status(status_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data for table `bins`
--
INSERT INTO bins VALUES
  (1,'carta'),
  (2,'plastica'),
  (3,'vetro'),
  (4,'organico'),
  (5,'metalli'),
  (6,'secco residuo'),
  (7,'umido');

--
-- Data for table `status`
--
INSERT INTO status VALUES
  (1,'product_inserted'),
  (2,'product_not_valid'),
  (3,'product_accepted');

--
-- Data for table `status`
--
INSERT INTO products (bin_id, name) VALUES
  (1,'quaderno'),
  (1,'carta'),
  (2,'plastica'),
  (2,'bottiglia di plastica'),
  (3,'vetro'),
  (3,'bottiglia di vetro'),
  (4,'banana'),
  (5,'lattina');
