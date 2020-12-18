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
    MobileNumber numeric(11,0),
    Address text,
    PRIMARY KEY(DriverID)
);

      
CREATE TABLE "Vehicle"(
    VehicleID INT  GENERATED ALWAYS AS IDENTITY,
    PlateNumber numeric(6,0),
    VehicleType text,
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



INSERT INTO "User"(DriverLicenseNo,Name,Age,Sex,MobileNumber,Address)
VALUES('JSC100000000001','Fahim Abrar',24,'Male','01687058140','Dhanmondi'),
('JSC100000000002','Nahid Molla',23,'Male','01687058140','Dhanmondi'),
('JSC100000000003','Hasibul Alam',28,'Male','01737800250','Mirpur'),
('JSC100000000004','Nusrat Zahan',23,'Female','01624964778','Farmgate'),
('JSC100000000005','Rafi Shahriar',30,'Male','01836733920','Natun Bazar'),
('JSC100000000006','Simron Mehjabin',24,'female','01686308140','Mahammadpur'),
('JSC100000000007','Towsif Kader',27,'Male','01717058914','Rampura'),
('JSC100000000008','Shourav Dash',29,'Male','01987058193','Jhigatola'),
('JSC100000000009','Mamun Khandakar',34,'Male','01687027893','Agargaon'),
('JSC100000000010','Shakil Ahmed',21,'Male','01835711209','Kazipara'),
('JSC100000000011','Samia Akhter',25,'Female','01687773309','Dhanmondi'),
('JSC100000000012','Abdullah-Al-Mamun',33,'Male','01957201180','Mirpur'),
('JSC100000000013','Masud Ahmed',36,'Male','01734490288','Taltola');	   
	   
INSERT INTO "Vehicle"(DriverID,PlateNumber,VehicleType)
VALUES(1,'408111','MotorBike'),
      (1,'401235','MotorBike'),
      (2,'401236','Car'),
      (3,'402356','Car'),
      (4,'405678','MotorBike'),
      (5,'407890','Bus'),
      (6,'401234','Car'),
      (6,'401123','Car'),
      (7,'401112','Car'),
      (8,'401122','MotorBike'),
      (8,'408122','MotorBike'),
      (9,'402234','Car'),
      (9,'402223','MotorBike'),
      (10,'402333','Car'),	
      (11,'403344','Car'),
      (11,'403334','MotorBike'),
      (12,'404456','MotoBike'),
      (13,'405667','Car'),
      (13,'408779','MotorBike');



