CREATE TABLE `levels` (
  `Level_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Level_Name` varchar(1) NOT NULL,
  `Level_Status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Level_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1