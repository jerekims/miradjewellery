ALTER TABLE `products` CHANGE `catdescription` `proddescription` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `products` CHANGE `catname` `prodname` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `customers` CHANGE `cust_email` `cust_email` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `customers` CHANGE `cust_status` `cust_status` TINYINT(1) NOT NULL;