CREATE TABLE `orders` (
  `Order_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Order_Number` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Product_Price` int(11) NOT NULL,
  `Cust_Id` int(11) NOT NULL,
  `Order_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Order_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1