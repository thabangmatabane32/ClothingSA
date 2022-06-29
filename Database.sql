--Do not Import this document as it has tables that don't follow the RDBMS, Instead copy and paste code for tblbrand and tblproduct--

CREATE DATABASE shopping;

CREATE TABLE `tblbrand`(

	brand_id INT(11) NOT NULL PRIMARY KEY,
	brand_name VARCHAR(150) NOT NULL,
	clothing_type VARCHAR(150),
	logo TEXT,
	date_of_entry DATE
);

--Include Quantity and foreign key for the tblbrand--
CREATE TABLE `tblproduct` (

	id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(150) NOT NULL,
	code VARCHAR(150) NOT NULL,
	image VARCHAR(150) NOT NULL,
	price DOUBLE NOT NULL
); 

--Modify the table after registration and use accurate attributes for this table--
CREATE TABLE `tblorders`(

	order_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	prod_id INT(11) NOT NULL REFERENCES tblproduct(`prod_id`),
	brand_id VARCHAR(150) NOT NULL REFERENCES tblbrand(`brand_id`)
);

--Modify the table after registration and use accurate attributes for this table--
CREATE TABLE `tblsales`(
	sales_id Int(11) NOT NULL AUTO_INCREMENT PRIMARY,
	prod_id INT(11) NOT NULL REFERENCES tblproduct(`prod_id`),
	brand_id INT(11) NOT NULL REFERENCES tblbrand(`brand_id`)
);

--Insert into tblbrand--
INSERT INTO tblbrand(brand_id,brand_name,logo) VALUES
(1,'Cotton Netter','1.jpg');
INSERT INTO tblbrand(brand_id,brand_name,logo) VALUES
(2,'Fede','2.jpg');
INSERT INTO tblbrand(brand_id,brand_name,logo) VALUES
(3,'Uncommon','3.jpg');
INSERT INTO tblbrand(brand_id,brand_name,logo) VALUES
(4,'Madafakha','4.jpg');
INSERT INTO tblbrand(brand_id,brand_name,logo) VALUES
(5,'Cotton Netter','5.jpg');


--Insert into tblproduct--
INSERT INTO `tblproduct`(`id`, `name`, `code`, `image`, `price`) VALUES ('1','Clothing Netter','clNetter','2.jpg','2100.00');
INSERT INTO `tblproduct`(`id`, `name`, `code`, `image`, `price`) VALUES ('2','Uncommon','clUncommon','3.jpg','	900.00');
INSERT INTO `tblproduct`(`id`, `name`, `code`, `image`, `price`) VALUES ('3','FiveO','clFive0','6.jpg','200.00');
INSERT INTO `tblproduct`(`id`, `name`, `code`, `image`, `price`) VALUES ('4','One4U','clOne4U','5.jpg','300.00');
INSERT INTO `tblproduct`(`id`, `name`, `code`, `image`, `price`) VALUES ('5','Cata','clCata','7.jpg','2100.00');
INSERT INTO `tblproduct`(`id`, `name`, `code`, `image`, `price`) VALUES ('7','MoJa','clMoJa','8.jpg','1300.00');
INSERT INTO `tblproduct`(`id`, `name`, `code`, `image`, `price`) VALUES ('8','Khula','clKhula','9.jpg','1100.00'
);
INSERT INTO `tblproduct`(`id`, `name`, `code`, `image`, `price`) VALUES ('9','KasiLam','clKasiLam','10.jpg','100.00');
INSERT INTO `tblproduct`(`id`, `name`, `code`, `image`, `price`) VALUES ('10','Phuka','clPhuka','11.jpg','900.00'
);

