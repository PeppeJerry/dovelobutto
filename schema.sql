--
-- Table structure for table `bins`
--

CREATE TABLE bins (
  bin_id tinyint(1) NOT NULL AUTO_INCREMENT,
  bin_name varchar(255),
  UNIQUE (bin_id),
  PRIMARY KEY (bin_id)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
-- Table structure for table `status`
--

CREATE TABLE status (
  status_id tinyint(1) NOT NULL,
  status_description varchar(255) NOT NULL,
  UNIQUE (status_id),
  PRIMARY KEY (status_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data for table `status`
--

INSERT INTO status VALUES 
                      (0,'product_inserted'),
                      (1,'product_not_valid'),
                      (2,'product_accepted');

--
-- Table structure for table `emails`
--

CREATE TABLE emails (
  email_id int(11) NOT NULL AUTO_INCREMENT,
  email_address varchar(255) DEFAULT NULL,
  product_name varchar(255) NOT NULL,
  time_stamp datetime NOT NULL DEFAULT NOW(),
  status_id tinyint(1) NOT NULL DEFAULT 0,
  UNIQUE (email_id),
  PRIMARY KEY (email_id),
  FOREIGN KEY (status_id) REFERENCES status(status_id)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

--
-- Table structure for table `products`
--

CREATE TABLE products (
  product_id int(11) NOT NULL AUTO_INCREMENT,
  product_name varchar(255) NOT NULL,
  bin_id tinyint(1) NOT NULL,
  UNIQUE (product_id),
  PRIMARY KEY (product_id),
  FOREIGN KEY (bin_id) REFERENCES bins(bin_id)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;
