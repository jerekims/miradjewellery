ALTER TABLE `categories` CHANGE `id` `catid` INT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `categories` CHANGE `Category_Status` `catstatus` TINYINT(4) NOT NULL DEFAULT '0';

ALTER TABLE `categories` CHANGE `name` `catname` VARCHAR(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `customers` CHANGE `Cust_ID` `cust_id` INT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `customers` CHANGE `Cust_Name` `cust_name` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `customers` CHANGE `Title_id` `title_id` INT(11) NOT NULL;

ALTER TABLE `customers` CHANGE `Cust_Email` `cust_email` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `customers` CHANGE `Cust_Password` `cust_password` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `customers` CHANGE `Date_registered` `date_registered` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `customers` CHANGE `Cust_status` `cust_status` TINYINT(4) NOT NULL;

ALTER TABLE `customers` DROP `Active`;

ALTER TABLE `products` CHANGE `id` `prodid` INT(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `products` CHANGE `category_id` `catid` INT(11) NOT NULL;

ALTER TABLE `products` CHANGE `name` `catname` VARCHAR(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `products` CHANGE `description` `catdescription` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `products` CHANGE `price` `prodprice` DOUBLE NOT NULL;

ALTER TABLE `products` CHANGE `Product_Date_Entry` `proddateentry` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; TINYINT(1) NOT NULL;