CREATE TABLE `employees` (
  `Emp_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_Name` varchar(100) NOT NULL,
  `Emp_Email` varchar(100) NOT NULL,
  `Emp_Password` varchar(100) NOT NULL,
  `Emp_Level_Id` int(11) NOT NULL,
  `Emp_Date_Registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Emp_Status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Emp_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1