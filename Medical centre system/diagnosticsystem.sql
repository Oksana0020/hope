-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: diagnosticsystem
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointments` (
  `AppointmentID` smallint(6) NOT NULL AUTO_INCREMENT,
  `AppDate` date DEFAULT NULL,
  `AppTime` time DEFAULT NULL,
  `AppStatus` enum('S','D','C') DEFAULT 'S',
  `PatientID` tinyint(4) DEFAULT NULL,
  `ServiceID` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`AppointmentID`),
  KEY `PatientID` (`PatientID`),
  KEY `ServiceID` (`ServiceID`),
  CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`PatientID`),
  CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`ServiceID`) REFERENCES `services` (`ServiceID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (1,'2024-02-10','09:00:00','S',1,11),(2,'2024-02-11','10:00:00','D',2,12),(3,'2024-02-12','11:00:00','C',3,13),(4,'2024-02-13','12:00:00','C',4,14),(5,'2024-02-14','12:30:00','S',5,15),(6,'2024-02-15','14:00:00','C',6,16),(7,'2024-02-16','15:00:00','D',7,17),(8,'2024-02-17','16:00:00','S',8,18),(9,'2024-02-18','16:30:00','C',9,19),(10,'2024-02-19','09:45:00','D',10,20),(11,'2024-02-20','09:30:00','S',11,21),(12,'2024-02-21','10:30:00','S',12,22),(13,'2024-02-22','11:30:00','C',13,23),(14,'2024-02-23','10:45:00','D',14,24),(15,'2024-02-24','11:45:00','S',15,25),(16,'2024-02-25','14:45:00','D',16,26),(17,'2024-02-26','15:45:00','C',17,27),(18,'2024-02-27','16:45:00','S',18,28),(19,'2024-02-28','11:00:00','C',19,29),(20,'2024-02-29','09:00:00','D',20,30);
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctors` (
  `DoctorID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `DForename` varchar(15) NOT NULL,
  `DSurname` varchar(20) NOT NULL,
  `DPhone` varchar(15) NOT NULL,
  `DEmail` varchar(25) NOT NULL,
  PRIMARY KEY (`DoctorID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (1,'Dr. Robert','Miller','35387-123-45-67','robert.miller@hope.ie'),(2,'Dr. Jennifer','Davis','35387-222-33-33','jennifer.davis@ hope.ie '),(3,'Dr. William','Anderson','35387-555-11-21','william.anderson@ hope.ie'),(4,'Dr. Susan','Martinez','35387-456-78-90','susan.martinez@ hope.ie '),(5,'Dr. Daniel','Taylor','35387-654-32-10','daniel.taylor@ hope.ie '),(6,'Dr. Emily','Johnson','35387-888-95-99','emily.johnson@hope.ie'),(7,'Dr. Michael','Wilson','35387-777-31-33','michael.wilson@hope.ie'),(8,'Dr. Jessica','Brown','35387-222-15-11','jessica.brown@hope.ie'),(9,'Dr. David','Garcia','35387-456-78-50','david.garcia@hope.ie'),(10,'Dr. Sarah','Lopez','35387-654-32-10','sarah.lopez@hope.ie'),(11,'Dr. James','Hernandez','35387-123-45-67','james.hernandez@hope.ie'),(12,'Dr. Samantha','Young','35387-222-33-53','samantha.young@hope.ie'),(13,'Dr. Benjamin','Scott','35387-555-11-41','benjamin.scott@hope.ie'),(14,'Dr. Olivia','King','35387-456-72-90','olivia.king@hope.ie'),(15,'Dr. Ethan','Wright','35387-654-32-80','ethan.wright@hope.ie'),(16,'Dr. Mia','Adams','35387-888-94-99','mia.adams@hope.ie'),(17,'Dr. Noah','Thomas','35387-777-37-33','noah.thomas@hope.ie'),(18,'Dr. Ava','Gonzalez','35387-222-18-11','ava.gonzalez@hope.ie'),(19,'Dr. William','Nelson','35387-456-78-90','william.nelson@hope.ie'),(20,'Dr. Charlotte','Roberts','35387-654-32-10','charlotte.roberts@hope.ie');
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patients` (
  `PatientID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `PForename` varchar(15) NOT NULL,
  `PSurname` varchar(20) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  PRIMARY KEY (`PatientID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (1,'Ernest','Hemingway','123 Connell Street','35387-111-22-33','ernest.hemingway@gmail.com'),(2,'Albert','Camus','456 Graf Street','35387-111-33-22','albert.camus@yahoo.com'),(3,'Charles','Dickens','12 More Street','35387-111-33-44','charles.dickens@hotmail.com'),(4,'Toni','Morrison','266 Same Street','35387-111-44-33','toni.morrison@gmail.com'),(5,'Jane','Austen','125 Kindare Street','35387-111-44-55','jane.austen@outlook.com'),(6,'Mary','Taylor','456 Henrietta Street','35387-111-55-44','mary.taylor@yahoo.com'),(7,'Flem','Dostoevsky','55 Happy Street','35387-111-55-66','flem.dostoevsky@gmail.com'),(8,'Stephen','King','123 Green Lane','35387-111-66-55','stephen.king@gmail.com'),(9,' Great ','Gatsby','456 Main Street','35387-111-66-77','the.greatgatsby@yahoo.com'),(10,'Virginia','Woolf','12 Grammy Street','35387-111-77-66','virginia.woolf@hotmail.com'),(11,'William','Faulkner','266 Moore Street','35387-111-77-88','william.faulkner@hotmail.com'),(12,'Arthur','Miller','125 Stefan Street','35387-111-88-77','arthur.miller@outlook.com'),(13,'Cormac','McCarthy','456 Kim Street','35387-111-88-99','cormac.mccarthy@hotmail.com'),(14,'Edgar','Allan Poe','55 Sunny Street','35387-111-99-88','edgar.allanpoe@gmail.com'),(15,'George','Orwell','123 Sweet Street','35387-111-11-44','george.orwell@gmail.com'),(16,'Harper','Lee','456 Red Lane','35387-111-22-55','harper.lee@yahoo.com'),(17,'Herman','Melville','12 Denny Street','35387-111-44-66','herman.melville@hotmail.com'),(18,'Margaret','Atwood','266 Green Street','35387-111-77-44','margaret.atwood@gmail.com'),(19,'Philip','Roth','125 Mint Street','35387-111-55-88','philip.roth@gmail.com'),(20,'William','Shakespeare','456 Drama Street','35387-111-65-99','william.shakespeare@gmail.com');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `ServiceID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `ServiceName` varchar(18) NOT NULL,
  `SDescription` varchar(25) NOT NULL,
  `Rate` decimal(5,2) NOT NULL,
  `Status` enum('A','D') DEFAULT 'A',
  PRIMARY KEY (`ServiceID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (11,'MRI','Magnetic Resonance Image',250.00,'A'),(12,'CT','Computed Tomography',200.00,'A'),(13,'X-ray','X-ray Imaging',150.00,'A'),(14,'Dopplerography','Doppler Ultrasound',180.00,'A'),(15,'Blood Test','Complete Blood Count',80.00,'A'),(16,'EKG','Electrocardiogram',120.00,'A'),(17,'Ultrasound','Medical Ultrasound',200.00,'A'),(18,'Endoscopy','Endoscopic Procedure',300.00,'A'),(19,'Colonoscopy','Colonoscopy Procedure',350.00,'A'),(20,'Mammography','Mammography Imaging',180.00,'A'),(21,'Bone Density Test','Bone Density Measurement',150.00,'A'),(22,'Stress Test','Cardiac Stress Test',250.00,'A'),(23,'Pulmonary Function','Lung Function Test',180.00,'A'),(24,'Allergy Testing','Allergy Test Panel',120.00,'A'),(25,'Gastrointestina','GI Function Test Panel',200.00,'A'),(26,'Genetic Testing','Genetic Test Panel',300.00,'A'),(27,'Hormone Panel','Hormone Level Test Panel',150.00,'A'),(28,'Thyroid Function','Thyroid Function Panel',120.00,'A'),(29,'Urine Test','Urinalysis',50.00,'A'),(30,'Colon Screening','Colon Cancer Screening',200.00,'A');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-26 21:03:38
