# WEB212-Database-Project
## Overview:
The Electric Company Dashboard is a web application that I designed while in college for a hypothetical electric company.
It is a single page dashboard that provides basic functionalities for managing customer data and eleticity usage.
Utlizing a MySQL database this deshboard takes advantage of two tables to allow for the saving, deletion and reading of 
records.

## Key Features:
+ **CRUD Operations:** allows users to create, read, update, and delete records.
+ **Database Integration:** Utilizes a MySQL database containing two tables: one for customer information and another for eletricity usage records.

## Technologies Used: 
+ **HTML:** Dashboard structure.
+ **SCSS/CSS:** Styling and apperance of the UI.
+ **JavaScript:** Implents dynamic behavior and interactivity.
+ **jQuery AJAX:** Handles asynchronous requests to the server.
+ **SQL:** Manages datastorage and retrieval from the database.
+ **PHP:** Makes server calls to allow the UI to interactive with the database

## Project Goals:
+ Create a functional website utilizing a database that has proactical usage.
+ Practice with and improve my skills using PHP.
+ Learn jQuery Ajax.
+ Apply SQL to a functional database.

## SQL Code:
```-- CREATE TABLES --
DROP TABLE IF EXISTS customers;
CREATE TABLE customers(
    id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(255) NOT NULL,
    -- lastName VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    email VARCHAR(255) DEFAULT 'notEntered',
    customer_type VARCHAR(255) NOT NULL
);
DROP TABLE IF EXISTS usage_data;
CREATE TABLE usage_data(
    id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    customerId INTEGER(255) NOT NULL,
    usage_month VARCHAR(255) NOT NULL,
    customer_usage DOUBLE NOT NULL
);

-- CREATE TRIGGERS --
/* NOTE: Delimiter is set as // means we are using // to indicate the end of the statement, since this
trigger uses multiple ;s already required - the delimiter must be set to // to indicate the finish of the 
trigger and should be reverted back to ; after the func/trigger/etc is finished*/

DROP TRIGGER IF EXISTS formatEntry;
DELIMITER //
CREATE TRIGGER formatEntry BEFORE INSERT ON customers
FOR EACH ROW
BEGIN

	-- format info
	SET NEW.name = LOWER(NEW.name);
    -- SET NEW.lastName = LOWER(NEW.lastName);
    SET NEW.address = LOWER(NEW.address);
    SET NEW.email = REPLACE(NEW.email, ' ', '');
    SET NEW.email = LOWER(NEW.email);
    
    -- trim phone #
    SET NEW.phone = REPLACE(REPLACE(NEW.phone, ' ', ''),'-', ''); -- removes spaces/dashes
    SET NEW.phone = REGEXP_REPLACE(NEW.phone, '[^0-9]+', ''); -- removes letters
    
    -- varify phone #
	IF NEW.phone NOT LIKE 'invalid%' AND (NEW.phone REGEXP '[^0-9]' OR LENGTH(NEW.phone) != 10) THEN
        SET NEW.phone = CONCAT('invalid(', NEW.phone, ')');
    END IF;
END//
DELIMITER ;


DROP TRIGGER IF EXISTS formatUsage;
DELIMITER //
CREATE TRIGGER formatUsage BEFORE INSERT ON usage_data
FOR EACH ROW
BEGIN
	SET NEW.usage_month = LOWER(NEW.usage_month);
    SET NEW.customer_usage = REPLACE(NEW.customer_usage, NEW.customer_usage, CAST(NEW.customer_usage AS DOUBLE));
END//
DELIMITER ;
```
## Acknowledgements
- jQuery: [https://jquery.com/](https://jquery.com/)
- Chart.js: [https://www.chartjs.org/](https://www.chartjs.org/)
