CREATE DATABASE enuygun;

USE enuygun;

CREATE TABLE enuygun.provider (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	code varchar(100) NOT NULL,
	url varchar(255) NOT NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=latin1
COLLATE=latin1_swedish_ci ;

CREATE TABLE enuygun.currency (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	data json NOT NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=latin1
COLLATE=latin1_swedish_ci ;

INSERT INTO enuygun.provider
(code, url)
VALUES('p2', 'http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0'
);

INSERT INTO enuygun.provider
(code, url)
VALUES('p1', 'http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3'
);


