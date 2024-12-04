DROP TABLE IF EXISTS aluminia;

CREATE TABLE `aluminia` (
  `al_id` int NOT NULL AUTO_INCREMENT,
  `s_id` int DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `is_current` tinyint(1) NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`al_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO aluminia VALUES("1","1","Google","senior webdeveloper","2023-11-09","0000-00-00","1","just a senior web developer ");



DROP TABLE IF EXISTS attendance_master;

CREATE TABLE `attendance_master` (
  `a_id` int NOT NULL AUTO_INCREMENT,
  `t_id` int NOT NULL,
  `e_id` int NOT NULL,
  `status` text COLLATE utf8mb4_general_ci NOT NULL,
  `takenon` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO attendance_master VALUES("1","2","1","absent","05:51:13");
INSERT INTO attendance_master VALUES("2","2","1","absent","05:51:55");
INSERT INTO attendance_master VALUES("3","2","1","present","05:53:42");
INSERT INTO attendance_master VALUES("4","1","1","present","07:57:47");
INSERT INTO attendance_master VALUES("5","2","1","present","06:03:36");



DROP TABLE IF EXISTS batch_master;

CREATE TABLE `batch_master` (
  `batch_id` int NOT NULL AUTO_INCREMENT,
  `batch_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `batch_year` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO batch_master VALUES("1","20233","2024");
INSERT INTO batch_master VALUES("2","2025-2028","2025");



DROP TABLE IF EXISTS class_master;

CREATE TABLE `class_master` (
  `class_id` int NOT NULL AUTO_INCREMENT,
  `class_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `batch_id` int NOT NULL,
  `course_id` int NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO class_master VALUES("1","sadsd","1","1");
INSERT INTO class_master VALUES("2","div a","2","2");
INSERT INTO class_master VALUES("3","extra course ","2","2");
INSERT INTO class_master VALUES("4","extra course ","2","2");
INSERT INTO class_master VALUES("5","extra course ","2","2");
INSERT INTO class_master VALUES("6","extra course ","2","2");
INSERT INTO class_master VALUES("7","extra course ","2","2");
INSERT INTO class_master VALUES("8","extra course ","2","2");
INSERT INTO class_master VALUES("9","extra course ","2","2");
INSERT INTO class_master VALUES("10","extra course ","2","2");
INSERT INTO class_master VALUES("11","extra course ","2","2");
INSERT INTO class_master VALUES("12","extra course ","2","2");
INSERT INTO class_master VALUES("13","extra course ","2","2");
INSERT INTO class_master VALUES("14","extra course ","2","2");
INSERT INTO class_master VALUES("15","extra course ","2","2");
INSERT INTO class_master VALUES("16","extra course ","2","2");
INSERT INTO class_master VALUES("17","extra course ","2","2");
INSERT INTO class_master VALUES("18","extra course ","2","2");
INSERT INTO class_master VALUES("19","extra course ","2","2");
INSERT INTO class_master VALUES("20","extra course ","2","2");
INSERT INTO class_master VALUES("21","extra course ","2","2");
INSERT INTO class_master VALUES("22","extra course ","2","2");
INSERT INTO class_master VALUES("23","sadsd","2","2");
INSERT INTO class_master VALUES("24","sadsd","2","2");



DROP TABLE IF EXISTS comapny_master;

CREATE TABLE `comapny_master` (
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_person` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `company_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO comapny_master VALUES("amit@gmail.com","san fransisco","amit ","789456215","amit@gmail.com","2","3");



DROP TABLE IF EXISTS courses;

CREATE TABLE `courses` (
  `c_id` int NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `years` text COLLATE utf8mb4_general_ci NOT NULL,
  `createdon` date NOT NULL,
  `createdby` int NOT NULL,
  `d_id` int NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO courses VALUES("1","Bca","3","2024-01-21","1","1");
INSERT INTO courses VALUES("2","MCA","2","2024-03-06","1","1");



DROP TABLE IF EXISTS department;

CREATE TABLE `department` (
  `d_id` int NOT NULL AUTO_INCREMENT,
  `d_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `createdon` date NOT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO department VALUES("1","Computer Science ","2027-01-21","1");
INSERT INTO department VALUES("2","sdasda","2024-02-22","1");
INSERT INTO department VALUES("3","","0000-00-00","0");



DROP TABLE IF EXISTS enrollement_master;

CREATE TABLE `enrollement_master` (
  `e_id` int NOT NULL AUTO_INCREMENT,
  `e_number` int NOT NULL,
  `student_id` int NOT NULL,
  `course_id` int NOT NULL,
  `class_id` int NOT NULL,
  `status` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `joined_on` date NOT NULL,
  `completed` date DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO enrollement_master VALUES("1","0","1","1","1","1","2024-01-21","0000-00-00");
INSERT INTO enrollement_master VALUES("6","0","4","2","2","1","2024-03-28","0000-00-00");



DROP TABLE IF EXISTS exam_schedule;

CREATE TABLE `exam_schedule` (
  `examschedule_id` int NOT NULL AUTO_INCREMENT,
  `exam_id` int NOT NULL,
  `date` text COLLATE utf8mb4_general_ci NOT NULL,
  `ps_id` int NOT NULL,
  `time` text COLLATE utf8mb4_general_ci NOT NULL,
  `room` text COLLATE utf8mb4_general_ci,
  `status` int NOT NULL,
  PRIMARY KEY (`examschedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO exam_schedule VALUES("1","4","2024-02-27","1","11:20","","2");
INSERT INTO exam_schedule VALUES("5","4","2024-03-18","1","22:30","2","1");



DROP TABLE IF EXISTS exam_table;

CREATE TABLE `exam_table` (
  `exam_id` int NOT NULL AUTO_INCREMENT,
  `e_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `course_id` int NOT NULL,
  `class_id` int NOT NULL,
  `sem` int NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO exam_table VALUES("3","internal","1","1","2");
INSERT INTO exam_table VALUES("4","sadsa","1","1","1");
INSERT INTO exam_table VALUES("5","Sem2","1","1","1");



DROP TABLE IF EXISTS fees_master;

CREATE TABLE `fees_master` (
  `fees_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `fees_id` int NOT NULL AUTO_INCREMENT,
  `department_id` int NOT NULL,
  `course_id` int NOT NULL,
  `batch_id` int NOT NULL,
  `sem` int NOT NULL,
  `amount` int NOT NULL,
  `duedate` date DEFAULT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`fees_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO fees_master VALUES("Internals ","1","1","1","1","2","150000","2024-03-04","1");
INSERT INTO fees_master VALUES("SEM-6","2","1","1","1","3","1560","2024-03-02","1");
INSERT INTO fees_master VALUES("extra course ","3","1","1","1","4","600","2024-03-30","1");
INSERT INTO fees_master VALUES("Internals ","4","1","1","1","1","1200","2024-03-24","1");



DROP TABLE IF EXISTS hack_participation;

CREATE TABLE `hack_participation` (
  `hp_id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `hackathon_id` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`hp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS hackathon;

CREATE TABLE `hackathon` (
  `hack_id` int NOT NULL AUTO_INCREMENT,
  `hack_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `max_part` int NOT NULL,
  `teamorind` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `mode` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about_hack` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cover_imge` text COLLATE utf8mb4_general_ci,
  `rep_uni` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fees` int NOT NULL,
  `app_start` date NOT NULL,
  `app_end` date NOT NULL,
  `hack_start` date NOT NULL,
  `hack_end` date NOT NULL,
  `location` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `brochure` text COLLATE utf8mb4_general_ci,
  `result` date NOT NULL,
  PRIMARY KEY (`hack_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS marks;

CREATE TABLE `marks` (
  `mark_id` int NOT NULL AUTO_INCREMENT,
  `e_id` int NOT NULL,
  `examschedule_id` int NOT NULL,
  `uploaded_by` int NOT NULL,
  `mark` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`mark_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO marks VALUES("1","1","1","1","25","1");
INSERT INTO marks VALUES("2","1","1","1","25","1");
INSERT INTO marks VALUES("3","1","1","1","90","1");
INSERT INTO marks VALUES("4","1","1","1","90","1");
INSERT INTO marks VALUES("5","1","1","1","85","1");
INSERT INTO marks VALUES("6","1","1","1","45","1");



DROP TABLE IF EXISTS notes_master;

CREATE TABLE `notes_master` (
  `n_id` int NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `subject_id` int NOT NULL,
  `link` text COLLATE utf8mb4_general_ci NOT NULL,
  `uploaded_by` int NOT NULL,
  `d_id` int NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO notes_master VALUES("3","asdas","2","notes/29,02,241709184523navbar.php","1","1");
INSERT INTO notes_master VALUES("4","asda","2","notes/29,02,241709184536main.php","1","1");



DROP TABLE IF EXISTS notification;

CREATE TABLE `notification` (
  `n_id` int NOT NULL AUTO_INCREMENT,
  `message` int NOT NULL,
  `notification_from` int NOT NULL,
  `notification_to` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS payement_master;

CREATE TABLE `payement_master` (
  `payement_id` int NOT NULL AUTO_INCREMENT,
  `fees_id` int NOT NULL,
  `enrollement_id` int NOT NULL,
  `amount` int NOT NULL,
  `transaction_id` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL,
  `date` date NOT NULL,
  `method` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`payement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO payement_master VALUES("1","1","1","15000","0","1","2024-03-06","online");
INSERT INTO payement_master VALUES("2","4","1","15000","0","1","2024-03-06","online");



DROP TABLE IF EXISTS placement_application;

CREATE TABLE `placement_application` (
  `application_id` int NOT NULL AUTO_INCREMENT,
  `enrollement_id` int NOT NULL,
  `placement_id` int NOT NULL,
  `file` text COLLATE utf8mb4_general_ci,
  `status` int NOT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO placement_application VALUES("1","1","2","cv/Readme.txt","2");
INSERT INTO placement_application VALUES("2","1","3","cv/Readme.txt","0");
INSERT INTO placement_application VALUES("3","1","5","cv/carrental.sql","0");



DROP TABLE IF EXISTS placement_master;

CREATE TABLE `placement_master` (
  `placement_id` int NOT NULL AUTO_INCREMENT,
  `company_id` int NOT NULL,
  `p_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `apply_start` date NOT NULL,
  `apply_end` date NOT NULL,
  `type` text COLLATE utf8mb4_general_ci NOT NULL,
  `eligibility` int NOT NULL,
  PRIMARY KEY (`placement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO placement_master VALUES("2","1","Internals","2024-03-10","2024-03-10","2","1");
INSERT INTO placement_master VALUES("5","2","Amount","2024-03-01","2024-03-22","3","1");
INSERT INTO placement_master VALUES("6","2","Amount","2024-03-01","2024-03-22","3","1");



DROP TABLE IF EXISTS professor_master;

CREATE TABLE `professor_master` (
  `professor_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `p_firstname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `p_lastname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phoneno` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `address1` text COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date NOT NULL,
  `j_date` date NOT NULL,
  `field_of_expertise` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `experience` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `previously_job` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_general_ci NOT NULL,
  `type` int NOT NULL DEFAULT '1',
  `e_phone` varchar(12) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sex` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `blood_group` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `d_id` int DEFAULT NULL,
  PRIMARY KEY (`professor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO professor_master VALUES("1","1","juzar","kagdi","1234567895","jahsjdh","2003-12-08","2020-08-18","ai","3","none ","s","2","45645645645","Female","b+","1");
INSERT INTO professor_master VALUES("2","11","Meghna ","mam","7894561235","bharuch ","2023-09-06","2024-03-15","Machine Learning ","5","Narmada","professorid/15,03,24171048129025,09,231695616093download (4).jpg","1","45645645645","Female","b+","");



DROP TABLE IF EXISTS professor_subject;

CREATE TABLE `professor_subject` (
  `ps_id` int NOT NULL AUTO_INCREMENT,
  `p_id` int NOT NULL,
  `s_id` int NOT NULL,
  `assign_by` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`ps_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO professor_subject VALUES("1","1","2","1","1");



DROP TABLE IF EXISTS query_master;

CREATE TABLE `query_master` (
  `query_id` int NOT NULL AUTO_INCREMENT,
  `query_to` int NOT NULL,
  `query_from` int NOT NULL,
  `subject` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `answer` text COLLATE utf8mb4_general_ci,
  `status` int NOT NULL,
  PRIMARY KEY (`query_id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO query_master VALUES("1","1","1","heloo","heloo","ghghjghjhhj","1");
INSERT INTO query_master VALUES("2","0","0","","","sfdsdfdfs","0");
INSERT INTO query_master VALUES("3","1","1","","asdasd","yesss","1");
INSERT INTO query_master VALUES("4","1","1","","asdasd","ajhdkjs","1");
INSERT INTO query_master VALUES("5","1","4","","asdasd","adsad","1");
INSERT INTO query_master VALUES("6","1","2","","Juzarrrrrrrrrrrrrrrrrasmbasjkglasjk","klsdf","1");
INSERT INTO query_master VALUES("7","1","1","","Juzarrrrrrrrrrrrrrrrrasmbasjkglasjk","dadasdsadas","1");
INSERT INTO query_master VALUES("8","0","0","","","sfdfs","1");
INSERT INTO query_master VALUES("9","1","2","","","klsdf","1");
INSERT INTO query_master VALUES("10","1","2","","","klsdf","1");
INSERT INTO query_master VALUES("11","1","2","","","klsdf","1");
INSERT INTO query_master VALUES("12","1","2","","","klsdf","1");
INSERT INTO query_master VALUES("13","1","2","","","klsdf","1");
INSERT INTO query_master VALUES("14","1","2","","","klsdf","1");
INSERT INTO query_master VALUES("15","1","2","","","klsdf","1");
INSERT INTO query_master VALUES("19","1","2","","","klsdf","1");
INSERT INTO query_master VALUES("20","1","2","","","klsdf","1");
INSERT INTO query_master VALUES("21","1","2","","","klsdf","1");
INSERT INTO query_master VALUES("22","1","2","","","klsdf","1");
INSERT INTO query_master VALUES("24","1","2","","","klsdf","1");
INSERT INTO query_master VALUES("25","1","2","","","klsdf","1");
INSERT INTO query_master VALUES("26","1","2","","","klsdf","1");
INSERT INTO query_master VALUES("27","1","2","","","klsdf","1");
INSERT INTO query_master VALUES("28","1","2","","","klsdf","1");
INSERT INTO query_master VALUES("29","1","2","","","sd","1");
INSERT INTO query_master VALUES("30","1","4","","","adsad","1");
INSERT INTO query_master VALUES("31","1","4","","","sdfs","1");
INSERT INTO query_master VALUES("32","1","2","","","dssd","1");
INSERT INTO query_master VALUES("33","0","0","","","sdf","1");
INSERT INTO query_master VALUES("34","0","0","","","sdffsd","0");
INSERT INTO query_master VALUES("35","0","0","","","sdffsdfsd","0");
INSERT INTO query_master VALUES("36","0","0","","","asda","1");
INSERT INTO query_master VALUES("37","0","2","","","fsdfds","1");
INSERT INTO query_master VALUES("38","0","2","","","fsdfds","1");
INSERT INTO query_master VALUES("39","1","2","","","dadasdsa","1");
INSERT INTO query_master VALUES("40","1","1","","","dadasdsadasdsf","1");
INSERT INTO query_master VALUES("41","1","1","","","dadasdsadasdsf","1");
INSERT INTO query_master VALUES("42","1","1","","","dadasdsadasdsf","1");
INSERT INTO query_master VALUES("43","1","1","","","dadasdsadasdsf","1");
INSERT INTO query_master VALUES("44","1","1","","","dadasdsadasdsf","1");
INSERT INTO query_master VALUES("45","1","1","","","dadasdsadasdsf","1");
INSERT INTO query_master VALUES("46","1","1","","","dadasdsadasdsf","1");
INSERT INTO query_master VALUES("47","1","2","","","sdad","1");
INSERT INTO query_master VALUES("48","1","2","","","sdad","1");
INSERT INTO query_master VALUES("49","1","2","","","sdad","1");
INSERT INTO query_master VALUES("50","1","2","","","sdad","1");
INSERT INTO query_master VALUES("51","1","2","","","sdad","1");
INSERT INTO query_master VALUES("52","2","2","","","fh","1");
INSERT INTO query_master VALUES("53","2","2","","","fh","1");
INSERT INTO query_master VALUES("54","2","2","","","fh","1");
INSERT INTO query_master VALUES("55","2","2","","","fhhfgh","1");
INSERT INTO query_master VALUES("56","2","2","","","fhhfgh","1");
INSERT INTO query_master VALUES("57","2","2","","","fhhfgh","1");
INSERT INTO query_master VALUES("58","2","2","","","fhhfghfghfg","1");
INSERT INTO query_master VALUES("59","2","2","","","fhhfghfghfg","1");
INSERT INTO query_master VALUES("60","2","2","","","fhhfghfghfg","1");
INSERT INTO query_master VALUES("61","2","2","","","fhhfghfghfg","1");
INSERT INTO query_master VALUES("62","2","2","","","fhhfghfghfg","1");
INSERT INTO query_master VALUES("63","2","1","","","fhhfghfghfgfh","1");
INSERT INTO query_master VALUES("64","2","1","","","fhhfghfghfgfh","1");
INSERT INTO query_master VALUES("65","2","1","","","fhhfghfghfgfh","1");
INSERT INTO query_master VALUES("66","2","1","","","fhhfghfghfgfh","1");
INSERT INTO query_master VALUES("67","2","1","","","fhhfghfghfgfh","1");
INSERT INTO query_master VALUES("68","2","1","","","dfgdfg","1");
INSERT INTO query_master VALUES("69","2","1","","","dfgdfg","1");
INSERT INTO query_master VALUES("70","2","1","","","dfgdfg","1");
INSERT INTO query_master VALUES("71","2","1","","","dfgdg","1");
INSERT INTO query_master VALUES("72","2","1","","","dfgdg","1");
INSERT INTO query_master VALUES("73","2","1","","","dfgdg","1");
INSERT INTO query_master VALUES("74","2","1","","","dfgdg","1");
INSERT INTO query_master VALUES("75","2","1","","","dfgdg","1");
INSERT INTO query_master VALUES("76","2","1","","","dfgdg","1");
INSERT INTO query_master VALUES("77","2","1","","","dfgd","1");
INSERT INTO query_master VALUES("78","2","1","","","dfgd","1");
INSERT INTO query_master VALUES("79","2","1","","","dfgd","1");
INSERT INTO query_master VALUES("80","2","1","","","dfgd","1");
INSERT INTO query_master VALUES("81","2","1","","","dfgd","1");
INSERT INTO query_master VALUES("82","2","1","","","dfgd","1");
INSERT INTO query_master VALUES("83","2","1","","","dfgd","1");
INSERT INTO query_master VALUES("84","2","1","","","dfgd","1");
INSERT INTO query_master VALUES("85","2","1","","","dfgd","1");
INSERT INTO query_master VALUES("86","2","4","","","sdfsdf","1");
INSERT INTO query_master VALUES("87","2","4","","","sdfsdf","1");
INSERT INTO query_master VALUES("88","2","4","","","sdfsdf","1");
INSERT INTO query_master VALUES("89","2","4","","","sdfsdf","1");
INSERT INTO query_master VALUES("90","2","4","","","sdfsdf","1");
INSERT INTO query_master VALUES("91","2","4","","","sdfsdf","1");
INSERT INTO query_master VALUES("92","2","4","","","sdfsdf","1");
INSERT INTO query_master VALUES("93","2","4","","","sdfsdf","1");
INSERT INTO query_master VALUES("94","2","4","","","sdfsdf","1");
INSERT INTO query_master VALUES("95","2","4","","","sdfsdf","1");
INSERT INTO query_master VALUES("96","2","4","","","sdfsdf","1");
INSERT INTO query_master VALUES("97","2","1","","","asda","1");
INSERT INTO query_master VALUES("98","2","1","","","dd","1");
INSERT INTO query_master VALUES("99","2","1","","","dasd","1");
INSERT INTO query_master VALUES("100","2","1","","","dasd","1");
INSERT INTO query_master VALUES("101","2","1","","","dasd","1");
INSERT INTO query_master VALUES("102","2","1","","","dasd","1");
INSERT INTO query_master VALUES("103","2","1","","","dasd","1");
INSERT INTO query_master VALUES("104","2","1","","","dasd","1");
INSERT INTO query_master VALUES("105","2","1","","","dasdtyu","1");
INSERT INTO query_master VALUES("106","2","1","","","dasd","1");
INSERT INTO query_master VALUES("107","2","1","","","dasdasda","1");
INSERT INTO query_master VALUES("108","2","2","","","asd","1");
INSERT INTO query_master VALUES("109","2","4","","","sdas","1");
INSERT INTO query_master VALUES("110","2","4","","","sdasasd","1");
INSERT INTO query_master VALUES("111","2","4","adasd","","sdasasd","1");
INSERT INTO query_master VALUES("112","2","4","","wrwer","sdasasd","1");
INSERT INTO query_master VALUES("113","2","4","","wwre","sdasasd","1");
INSERT INTO query_master VALUES("114","2","4","","werwe","sdasasd","1");
INSERT INTO query_master VALUES("115","2","4","werwer","werwe","sdasasd","1");
INSERT INTO query_master VALUES("116","1","0","","","","1");
INSERT INTO query_master VALUES("117","1","0","","","","1");
INSERT INTO query_master VALUES("118","1","0","","","","1");
INSERT INTO query_master VALUES("119","2","1","","","kkk","1");
INSERT INTO query_master VALUES("120","2","1","","","heelloooo","1");



DROP TABLE IF EXISTS student_master;

CREATE TABLE `student_master` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `s_firstname` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `s_lastname` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_no` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `father_name` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mother_name` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `father_phone` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `admission_date` date NOT NULL,
  `blood_group` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `sex` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO student_master VALUES("1","4","jyoti","kagdi","2003-08-18","c-1520 , lala bazaar","rajput street ","7984915566","mohammed ","banu","9856321475","2024-02-27","b+","Male","none","studentid/09,03,2417099723706_20240227_232932_0005.png");
INSERT INTO student_master VALUES("2","0","Juzar","kagdi","2024-03-01","c-1520 , lala bazaar","bharuch ","7984915566","mohammed ","banu","9856321475","2024-03-07","b+","Male","asdfasdf","studentid/09,03,2417099723706_20240227_232932_0005.png");
INSERT INTO student_master VALUES("3","5","Juzardad","kagdi","2024-03-15","c-1520 , lala bazaar","bharuch ","7984915566","mohammed asdasdas","banu","9876543210","2024-03-22","b+","Male","ad","../admin/studentid/09,03,2417099728136_20240227_232932_0005.png");
INSERT INTO student_master VALUES("4","7","Atiya","Kharwa","2002-06-15","Ankleshwar ","bharuch ","7894561235","mohammed","asma ","7894562135","2024-03-15","b+","Female","Sahil","studentid/15,03,241710481027ist.jpg");
INSERT INTO student_master VALUES("5","8","Nirmit","pujara","2003-07-11","Bholav","bharuch ","7894561235","sumit ","kunj","7894561235","2024-03-15","a-","Male","sa","studentid/15,03,24171048109610,10,231696953135logo-removebg-preview (1).png");



DROP TABLE IF EXISTS subject;

CREATE TABLE `subject` (
  `subject_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `credit` int DEFAULT NULL,
  `c_id` int NOT NULL,
  `year` int NOT NULL,
  `sem` int NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO subject VALUES("1","css","10","1","1","2");
INSERT INTO subject VALUES("2","Java","10","1","1","1");
INSERT INTO subject VALUES("3","css","5","1","1","1");



DROP TABLE IF EXISTS timetable;

CREATE TABLE `timetable` (
  `t_id` int NOT NULL AUTO_INCREMENT,
  `ps_id` int NOT NULL,
  `class_id` int NOT NULL,
  `time` text COLLATE utf8mb4_general_ci NOT NULL,
  `room_no` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO timetable VALUES("1","1","1","8.30","2","","2024-02-10","2");
INSERT INTO timetable VALUES("2","1","2","8.30","2","","2024-02-18","2");
INSERT INTO timetable VALUES("3","1","1","8.30","5","","2024-02-14","1");
INSERT INTO timetable VALUES("4","1","1","8.30","2","5","2024-03-07","");
INSERT INTO timetable VALUES("5","1","2","8.30","2","5","2024-03-07","1");



DROP TABLE IF EXISTS user_master;

CREATE TABLE `user_master` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `type` int NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO user_master VALUES("1","hod@gmail.com","123456","2");
INSERT INTO user_master VALUES("2","cyberjuzar@gmail.com","2003-08-18","3");
INSERT INTO user_master VALUES("3","company@gmail.com","123456","4");
INSERT INTO user_master VALUES("4","student@gmail.com","123456","3");
INSERT INTO user_master VALUES("5","juzasr@gmail.com","123456","3");
INSERT INTO user_master VALUES("6","admin@gmail.com","123456","1");
INSERT INTO user_master VALUES("7","student@gmail.com","2002-06-15","3");
INSERT INTO user_master VALUES("8","pujaranirmit@gmail.com","2003-07-11","3");
INSERT INTO user_master VALUES("11","atiyakharwa@gmail.com","12345678","2");
INSERT INTO user_master VALUES("12","kharwaatiya@gmail.com","123456","1");



