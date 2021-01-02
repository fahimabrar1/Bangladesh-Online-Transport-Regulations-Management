DROP SCHEMA public CASCADE;
CREATE SCHEMA public;

DROP TABLE IF EXISTS "Case";
DROP TABLE IF EXISTS "Police";
DROP TABLE IF EXISTS "User";
DROP TABLE IF EXISTS "Vehicle";



CREATE TABLE "User"(
    DriverID INT GENERATED ALWAYS AS IDENTITY,
    DriverLicenseNo text,
    Name text,
    Age numeric(3,0),
    Sex text,
    Email text,
    MobileNumber numeric(11,0),
    "Password" text,
    Address text,
    ImgData text,
    PRIMARY KEY(DriverID)
);

      
CREATE TABLE "Vehicle"(
    VehicleID INT  GENERATED ALWAYS AS IDENTITY,
    PlateNumber numeric(6,0),
    VehicleType text,
    ImgData text,
    DriverID INT,
    PRIMARY KEY(VehicleID),
    CONSTRAINT fk_User
      FOREIGN KEY(DriverID) 
	    REFERENCES "User"(DriverID)
	       ON DELETE SET NULL 
);




CREATE TABLE "Case"(
    CaseNo INT GENERATED ALWAYS AS IDENTITY,
    PlateNumber numeric(6,0),
    VehicleID INT,
    "Status" text,
    Amount numeric(10,0),
    Type text,
    "Date" date,
    "Time" text,
    Note text,
    PRIMARY KEY(CaseNo),
    CONSTRAINT fk_Vehicle
      FOREIGN KEY(VehicleID) 
        REFERENCES "Vehicle"(VehicleID)
            ON DELETE SET NULL
);


CREATE TABLE "Police"(
    Username text NOT NULL,
    "Password" text,
    Name text,
    Thana text,
    PoliceID text,
    Age numeric(3,0),
    Sex text
);



INSERT INTO "User"(DriverLicenseNo,Name,Age,Sex,Email,MobileNumber,"Password",Address)
VALUES('JSC100000000001','Fahim Abrar',24,'Male','fa@gmail.com','01687056140','1234','Dhanmondi'),
('JSC100000000002','Nahid Molla',23,'Male','nm@gmail.com','01687058140','1234','Dhanmondi'),
('JSC100000000003','Hasibul Alam',28,'Male','ha@gmail.com','01737800250','1234','Mirpur'),
('JSC100000000004','Nusrat Zahan',23,'Female','nze@gmail.com','01624964778','1234','Farmgate'),
('JSC100000000005','Rafi Shahriar',30,'Male','rs@gmail.com','01836733920','1234','Natun Bazar'),
('JSC100000000006','Simron Mehjabin',24,'female','sm@gmail.com','01686308140','1234','Mahammadpur'),
('JSC100000000007','Towsif Kader',27,'Male','tk@gmail.com','01717058914','1234','Rampura'),
('JSC100000000008','Shourav Dash',29,'Male','sd@gmail.com','01987058193','1234','Jhigatola'),
('JSC100000000009','Mamun Khandakar',34,'Male','mk@gmail.com','01687027893','1234','Agargaon'),
('JSC100000000010','Shakil Ahmed',21,'Male','sa@gmail.com','01835711209','1234','Kazipara'),
('JSC100000000011','Samia Akhter',25,'Female','sa@gmail.com','01687773309','1234','Dhanmondi'),
('JSC100000000012','Abdullah-Al-Mamun',33,'Male','am@gmail.com','01957201180','1234','Mirpur'),
('JSC100000000013','Masud Ahmed',36,'Male','ma@gmail.com','01734490288','1234','Taltola');	   
	   
INSERT INTO "Vehicle"(DriverID,PlateNumber,VehicleType)
VALUES(1,'408111','MotorBike'),         /*Vehicle ID = 1 */
      (1,'401235','MotorBike'),         /*Vehicle ID = 2 */
      (2,'401236','Car'),               /*Vehicle ID = 3 */
      (3,'402356','Car'),               /*Vehicle ID = 4 */
      (4,'405678','MotorBike'),         /*Vehicle ID = 5 */
      (5,'407890','Bus'),               /*Vehicle ID = 6 */
      (6,'401234','Car'),               /*Vehicle ID = 7 */
      (6,'401123','Car'),               /*Vehicle ID = 8 */
      (7,'401112','Car'),               /*Vehicle ID = 9 */
      (8,'401122','MotorBike'),         /*Vehicle ID = 10 */
      (8,'408122','MotorBike'),         /*Vehicle ID = 11 */
      (9,'402234','Car'),               /*Vehicle ID = 12 */
      (9,'402223','MotorBike'),         /*Vehicle ID = 13 */
      (10,'402333','Car'),	            /*Vehicle ID = 14 */
      (11,'403344','Car'),              /*Vehicle ID = 15 */
      (11,'403334','MotorBike'),        /*Vehicle ID = 16 */
      (12,'404456','MotoBike'),         /*Vehicle ID = 17 */
      (13,'405667','Car'),              /*Vehicle ID = 18 */
      (13,'408779','MotorBike');        /*Vehicle ID = 19 */


INSERT INTO "Case"(PlateNumber,VehicleID,"Status",Amount ,Type,"Date","Time",Note)
VALUES  ('408111','1','inactive','5000','No Papers,No Headlights',CURRENT_DATE,CURRENT_TIME,'the driver seems to be on drugs'),
        ('408111','1','inactive','1000','No Headlights',CURRENT_DATE,CURRENT_TIME,''),
        ('408111','1','inactive','2000','No Papers',CURRENT_DATE,CURRENT_TIME,''),
        ('401235','2','active','7000','No headlights',CURRENT_DATE,CURRENT_TIME,'Caught Speeding On Highway')
