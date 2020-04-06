CREATE TABLE `proj57`.`product_top` (
`sid` INT NOT NULL AUTO_INCREMENT ,
`item_name` VARCHAR(255) NOT NULL ,
`item_num` VARCHAR(255) NOT NULL ,
`color` VARCHAR(255) NOT NULL ,
`color_num` VARCHAR(255) NOT NULL ,
`creat_date` DATETIME NOT NULL ,
PRIMARY KEY (`sid`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

INSERT INTO `product_top` (`sid`, `item_name`, `item_num`, `color`, `color_num`, `creat_date`) VALUES (NULL, 'sweater', '00', 'r', '00', '2020-04-06 16:48:10');