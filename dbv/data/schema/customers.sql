CREATE TABLE `customers` (
  `Cust_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cust_Name` varchar(100) NOT NULL,
  `Title_id` int(11) NOT NULL,
  `Cust_Email` varchar(100) NOT NULL,
  `Cust_Password` varchar(100) NOT NULL,
  `Date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Cust_status` tinyint(4) NOT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Cust_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1