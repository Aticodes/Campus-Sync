DROP TABLE IF EXISTS aluminia;

CREATE TABLE `aluminia` (
  `al_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `is_current` tinyint(1) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`al_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO aluminia VALUES("1","1","Google","senior webdeveloper","2023-11-09","0000-00-00","1","just a senior web developer ");



DROP TABLE IF EXISTS attendance_master;

CREATE TABLE `attendance_master` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `takenon` text NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO attendance_master VALUES("6","15","9","present","03:41:44");
INSERT INTO attendance_master VALUES("7","15","10","present","03:41:44");
INSERT INTO attendance_master VALUES("8","15","11","present","03:41:44");
INSERT INTO attendance_master VALUES("9","21","9","absent","03:42:03");
INSERT INTO attendance_master VALUES("10","21","10","present","03:42:03");
INSERT INTO attendance_master VALUES("11","21","11","present","03:42:03");
INSERT INTO attendance_master VALUES("12","24","9","present","03:44:38");
INSERT INTO attendance_master VALUES("13","24","10","present","03:44:38");
INSERT INTO attendance_master VALUES("14","24","11","present","03:44:38");
INSERT INTO attendance_master VALUES("15","16","9","present","03:45:38");
INSERT INTO attendance_master VALUES("16","16","10","absent","03:45:38");
INSERT INTO attendance_master VALUES("17","16","11","present","03:45:38");
INSERT INTO attendance_master VALUES("18","19","9","absent","03:45:47");
INSERT INTO attendance_master VALUES("19","19","10","present","03:45:47");
INSERT INTO attendance_master VALUES("20","19","11","present","03:45:47");
INSERT INTO attendance_master VALUES("21","23","9","present","03:46:09");
INSERT INTO attendance_master VALUES("22","23","10","present","03:46:09");
INSERT INTO attendance_master VALUES("23","23","11","absent","03:46:09");
INSERT INTO attendance_master VALUES("24","18","9","absent","06:57:02");
INSERT INTO attendance_master VALUES("25","18","10","present","06:57:02");
INSERT INTO attendance_master VALUES("26","18","11","present","06:57:02");
INSERT INTO attendance_master VALUES("27","24","9","present","11:26:05");
INSERT INTO attendance_master VALUES("28","24","10","absent","11:26:05");
INSERT INTO attendance_master VALUES("29","24","11","present","11:26:05");
INSERT INTO attendance_master VALUES("30","24","12","present","11:26:05");
INSERT INTO attendance_master VALUES("31","24","9","absent","11:39:18");
INSERT INTO attendance_master VALUES("32","24","10","present","11:39:18");
INSERT INTO attendance_master VALUES("33","24","11","absent","11:39:18");
INSERT INTO attendance_master VALUES("34","24","12","present","11:39:18");
INSERT INTO attendance_master VALUES("35","24","9","absent","11:40:00");
INSERT INTO attendance_master VALUES("36","24","10","present","11:40:00");
INSERT INTO attendance_master VALUES("37","24","11","absent","11:40:00");
INSERT INTO attendance_master VALUES("38","24","12","present","11:40:00");



DROP TABLE IF EXISTS batch_master;

CREATE TABLE `batch_master` (
  `batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `batch_name` varchar(255) DEFAULT NULL,
  `batch_year` varchar(255) NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO batch_master VALUES("17","2023-2027","2023");



DROP TABLE IF EXISTS class_master;

CREATE TABLE `class_master` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` text NOT NULL,
  `batch_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO class_master VALUES("26","Btech Div-A","17","8");



DROP TABLE IF EXISTS comapny_master;

CREATE TABLE `comapny_master` (
  `name` varchar(255) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact_person` varchar(150) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO comapny_master VALUES("amit@gmail.com","san fransisco","amit ","789456215","amit@gmail.com","2","3");
INSERT INTO comapny_master VALUES("juzar@gmail.com","c-1234, lal baadjaskl","jsklfdjskj","2147483647","ssdfsfs@gmail.com","3","13");



DROP TABLE IF EXISTS courses;

CREATE TABLE `courses` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) NOT NULL,
  `years` text NOT NULL,
  `createdon` date NOT NULL,
  `createdby` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO courses VALUES("8","BTech","4","2024-03-29","1","2");
INSERT INTO courses VALUES("9","MTech","2","2024-03-29","1","2");
INSERT INTO courses VALUES("10","sadhj","3","2024-03-30","1","4");



DROP TABLE IF EXISTS department;

CREATE TABLE `department` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(255) NOT NULL,
  `createdon` date NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO department VALUES("1","Computer Science ","2027-01-21","1");
INSERT INTO department VALUES("2","Engineering","2024-02-22","1");
INSERT INTO department VALUES("4","Information Technology","2024-03-21","1");



DROP TABLE IF EXISTS enrollement_master;

CREATE TABLE `enrollement_master` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_number` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `status` varchar(70) NOT NULL,
  `joined_on` date NOT NULL,
  `completed` date DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO enrollement_master VALUES("9","0","1","8","26","1","2024-03-30","0000-00-00");
INSERT INTO enrollement_master VALUES("10","0","3","8","26","1","2024-03-30","0000-00-00");
INSERT INTO enrollement_master VALUES("11","0","4","8","26","1","2024-03-30","0000-00-00");
INSERT INTO enrollement_master VALUES("12","0","5","8","26","1","2024-03-30","0000-00-00");



DROP TABLE IF EXISTS exam_schedule;

CREATE TABLE `exam_schedule` (
  `examschedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `date` text NOT NULL,
  `ps_id` int(11) NOT NULL,
  `time` text NOT NULL,
  `room` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`examschedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO exam_schedule VALUES("6","6","2024-03-30","3","13:20","2","1");
INSERT INTO exam_schedule VALUES("7","6","2024-04-01","4","13:20","2","1");
INSERT INTO exam_schedule VALUES("8","6","2024-04-02","5","13:20","2","1");
INSERT INTO exam_schedule VALUES("9","6","2024-04-03","6","13:20","2","1");



DROP TABLE IF EXISTS exam_table;

CREATE TABLE `exam_table` (
  `exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_name` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO exam_table VALUES("6","First Internals ","8","26","1");



DROP TABLE IF EXISTS fees_master;

CREATE TABLE `fees_master` (
  `fees_name` text NOT NULL,
  `fees_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `duedate` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`fees_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO fees_master VALUES("Internals ","1","1","1","1","2","150000","2024-03-04","1");
INSERT INTO fees_master VALUES("SEM-6","2","1","1","1","3","1560","2024-03-02","1");
INSERT INTO fees_master VALUES("extra course ","3","1","1","1","4","600","2024-03-30","1");
INSERT INTO fees_master VALUES("Internals ","4","1","1","1","1","1200","2024-03-24","1");
INSERT INTO fees_master VALUES("extra course ","5","4","3","1","3","7500","2024-03-28","1");
INSERT INTO fees_master VALUES("extra course ","6","2","6","2","1","15000","2024-03-28","1");
INSERT INTO fees_master VALUES("extra course ","7","2","8","17","1","15000","2024-04-05","1");



DROP TABLE IF EXISTS hack_participation;

CREATE TABLE `hack_participation` (
  `hp_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `hackathon_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`hp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS hackathon;

CREATE TABLE `hackathon` (
  `hack_id` int(11) NOT NULL AUTO_INCREMENT,
  `hack_name` varchar(30) NOT NULL,
  `max_part` int(11) NOT NULL,
  `teamorind` varchar(100) NOT NULL,
  `mode` varchar(10) DEFAULT NULL,
  `about_hack` varchar(100) NOT NULL,
  `cover_imge` text DEFAULT NULL,
  `rep_uni` varchar(20) DEFAULT NULL,
  `fees` int(11) NOT NULL,
  `app_start` date NOT NULL,
  `app_end` date NOT NULL,
  `hack_start` date NOT NULL,
  `hack_end` date NOT NULL,
  `location` varchar(50) NOT NULL,
  `brochure` text DEFAULT NULL,
  `result` date NOT NULL,
  PRIMARY KEY (`hack_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS marks;

CREATE TABLE `marks` (
  `mark_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_id` int(11) NOT NULL,
  `examschedule_id` int(11) NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `status` int(11) NOT NULL,
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
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `subject_id` int(11) NOT NULL,
  `link` text NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO notes_master VALUES("3","asdas","2","notes/29,02,241709184523navbar.php","1","1");
INSERT INTO notes_master VALUES("4","asda","2","notes/29,02,241709184536main.php","1","1");



DROP TABLE IF EXISTS notification;

CREATE TABLE `notification` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` int(11) NOT NULL,
  `notification_from` int(11) NOT NULL,
  `notification_to` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS payement_master;

CREATE TABLE `payement_master` (
  `payement_id` int(11) NOT NULL AUTO_INCREMENT,
  `fees_id` int(11) NOT NULL,
  `enrollement_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `transaction_id` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `method` text NOT NULL,
  PRIMARY KEY (`payement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO payement_master VALUES("1","1","1","15000","0","1","2024-03-06","online");
INSERT INTO payement_master VALUES("2","4","1","15000","0","1","2024-03-06","online");
INSERT INTO payement_master VALUES("3","1","1","15000","pay_NqUyHwyuF5sxYr","1","2024-03-25","online");
INSERT INTO payement_master VALUES("4","1","1","15000","pay_NsV7thTGmYNxX5","1","2024-03-30","online");



DROP TABLE IF EXISTS placement_application;

CREATE TABLE `placement_application` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `enrollement_id` int(11) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `file` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO placement_application VALUES("1","1","2","cv/Readme.txt","2");
INSERT INTO placement_application VALUES("2","1","3","cv/Readme.txt","0");
INSERT INTO placement_application VALUES("3","1","5","cv/carrental.sql","0");
INSERT INTO placement_application VALUES("4","9","7","CAMPUS SYNCfor utu.pdf","0");
INSERT INTO placement_application VALUES("5","9","7","CAMPUS SYNCfor utu.pdf","0");



DROP TABLE IF EXISTS placement_master;

CREATE TABLE `placement_master` (
  `placement_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `p_name` text NOT NULL,
  `apply_start` date NOT NULL,
  `apply_end` date NOT NULL,
  `type` text NOT NULL,
  `eligibility` int(11) NOT NULL,
  PRIMARY KEY (`placement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO placement_master VALUES("5","1","Amount","2024-03-01","2024-03-22","3","1");
INSERT INTO placement_master VALUES("6","2","Amount","2024-03-01","2024-03-22","3","1");
INSERT INTO placement_master VALUES("7","2","Summer Internship","2024-03-30","2024-04-30","1","8");



DROP TABLE IF EXISTS professor_master;

CREATE TABLE `professor_master` (
  `professor_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `p_firstname` varchar(255) NOT NULL,
  `p_lastname` varchar(255) NOT NULL,
  `phoneno` varchar(12) NOT NULL,
  `address1` text NOT NULL,
  `dob` date NOT NULL,
  `j_date` date NOT NULL,
  `field_of_expertise` varchar(150) DEFAULT NULL,
  `experience` varchar(10) DEFAULT NULL,
  `previously_job` varchar(255) DEFAULT NULL,
  `image` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `e_phone` varchar(12) DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `blood_group` varchar(15) NOT NULL,
  `d_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`professor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO professor_master VALUES("1","1","juzar","kagdi","1234567895","jahsjdh","2003-12-08","2020-08-18","ai","3","none ","professorid/22,03,241711101794Screenshot (4).png","2","45645645645","Female","b+","2");
INSERT INTO professor_master VALUES("2","11","Meghna ","Shukla","7894561235","bharuch ","2023-09-06","2024-03-15","Machine Learning ","5","Narmada","professorid/15,03,24171048129025,09,231695616093download (4).jpg","1","45645645645","Female","b+","");
INSERT INTO professor_master VALUES("3","12","Prachi raol","h","1234567895","bharuch ","2004-08-18","2023-05-18","AI","3 ","Parul university","professorid/22,03,241711101794Screenshot (4).png","1","adada","Female","b+","");
INSERT INTO professor_master VALUES("4","16","Bipasa","Rana","7894561235","Shaktinath , Bharuch ","2010-10-07","2024-03-27","Machine Learning ","3","Narmada College","professorid/hel.jpeg","1","5689456235","Male","b+","");



DROP TABLE IF EXISTS professor_subject;

CREATE TABLE `professor_subject` (
  `ps_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `assign_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`ps_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO professor_subject VALUES("3","4","10","1","1");
INSERT INTO professor_subject VALUES("4","1","8","1","1");
INSERT INTO professor_subject VALUES("5","2","9","1","1");
INSERT INTO professor_subject VALUES("6","3","11","1","1");



DROP TABLE IF EXISTS query_master;

CREATE TABLE `query_master` (
  `query_id` int(11) NOT NULL AUTO_INCREMENT,
  `query_to` int(11) NOT NULL,
  `query_from` int(11) NOT NULL,
  `subject` varchar(150) DEFAULT NULL,
  `message` text NOT NULL,
  `answer` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`query_id`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO query_master VALUES("167","1","1","","asdadasda","","1");
INSERT INTO query_master VALUES("168","1","1","","sdasdsa","","1");
INSERT INTO query_master VALUES("169","1","1","","asas","","1");
INSERT INTO query_master VALUES("170","1","1","","likftrdr","","1");
INSERT INTO query_master VALUES("171","1","1","","","ggg","1");
INSERT INTO query_master VALUES("172","0","1","","hellooo","","1");
INSERT INTO query_master VALUES("173","0","1","","hellooo","","1");
INSERT INTO query_master VALUES("174","0","1","","hellooo","","1");
INSERT INTO query_master VALUES("175","4","1","","hfggh","","1");
INSERT INTO query_master VALUES("176","4","1","","How Are You","","1");
INSERT INTO query_master VALUES("177","4","1","","","yess for sure ","1");
INSERT INTO query_master VALUES("178","4","1","","","what about you ","1");
INSERT INTO query_master VALUES("179","4","1","","sfds","","1");
INSERT INTO query_master VALUES("180","4","1","","Hello HOw are yu ","","1");
INSERT INTO query_master VALUES("181","4","1","","","i am fine how about you","1");



DROP TABLE IF EXISTS student_master;

CREATE TABLE `student_master` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `s_firstname` varchar(150) NOT NULL,
  `s_lastname` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `phone_no` varchar(12) NOT NULL,
  `father_name` varchar(150) DEFAULT NULL,
  `mother_name` varchar(150) DEFAULT NULL,
  `father_phone` varchar(12) NOT NULL,
  `admission_date` date NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `img` text DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO student_master VALUES("1","4","juzar","kagdi","2003-08-18","c-1520 , lala bazaar","rajput street ","7984915566","mohammed ","banu","9856321475","2024-02-27","b+","Male","none","studentid/images.jpeg");
INSERT INTO student_master VALUES("3","5","Nirmit","kagdi","2024-03-15","c-1520 , lala bazaar","bharuch ","7984915566","mohammed asdasdas","banu","9876543210","2024-03-22","b+","Male","ad","../admin/studentid/09,03,2417099728136_20240227_232932_0005.png");
INSERT INTO student_master VALUES("4","7","Atiya","Kharwa","2002-06-15","Ankleshwar ","bharuch ","7894561235","mohammed","asma ","7894562135","2024-03-15","b+","Female","Sahil","studentid/15,03,241710481027ist.jpg");
INSERT INTO student_master VALUES("5","8","shradhha","pujara","2003-07-11","Bholav","bharuch ","7894561235","sumit ","kunj","7894561235","2024-03-15","a-","Male","sa","studentid/15,03,24171048109610,10,231696953135logo-removebg-preview (1).png");



DROP TABLE IF EXISTS subject;

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `credit` int(11) DEFAULT NULL,
  `c_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO subject VALUES("8","DSA","9","8","1","1");
INSERT INTO subject VALUES("9","JAVA","9","8","1","1");
INSERT INTO subject VALUES("10","WEB DESIGNING","7","8","1","1");
INSERT INTO subject VALUES("11","Software Testing","10","8","1","1");



DROP TABLE IF EXISTS timetable;

CREATE TABLE `timetable` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `ps_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `time` text NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `remarks` text NOT NULL,
  `date` date NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO timetable VALUES("15","4","26","7.30","2","","2024-03-14","2");
INSERT INTO timetable VALUES("16","5","26","8.30","2","","2024-03-14","2");
INSERT INTO timetable VALUES("17","3","26","9.30","2","","2024-03-14","1");
INSERT INTO timetable VALUES("18","6","26","10.30","2","","2024-03-14","2");
INSERT INTO timetable VALUES("19","5","26","7.30","2","","2024-03-15","2");
INSERT INTO timetable VALUES("20","6","26","8.30","2","","2024-03-15","1");
INSERT INTO timetable VALUES("21","4","26","8.30","2","","2024-03-16","2");
INSERT INTO timetable VALUES("22","3","26","9.30","2","","2024-03-16","1");
INSERT INTO timetable VALUES("23","5","26","10.30","5","","2024-03-16","2");
INSERT INTO timetable VALUES("24","4","26","7.30","2","","2024-03-21","2");
INSERT INTO timetable VALUES("25","3","26","8.30","2","","2021-03-21","1");
INSERT INTO timetable VALUES("26","6","26","11.30","5","","2024-03-30","1");



DROP TABLE IF EXISTS user_master;

CREATE TABLE `user_master` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO user_master VALUES("1","mohammedkagdi68@gmail.com","123456","2");
INSERT INTO user_master VALUES("2","cyberjuzar@gmail.com","123456","1");
INSERT INTO user_master VALUES("3","company@gmail.com","123456","4");
INSERT INTO user_master VALUES("4","student@gmail.com","123456","3");
INSERT INTO user_master VALUES("5","pujaranirmit@gmail.com","123456","3");
INSERT INTO user_master VALUES("6","admin@gmail.com","123456","2");
INSERT INTO user_master VALUES("7","atiyakharwa@gmail.com","2002-06-15","3");
INSERT INTO user_master VALUES("8","shradha@gmail.com","123456","3");
INSERT INTO user_master VALUES("11","professor@gmail.com","123456","2");
INSERT INTO user_master VALUES("12","dd@gmail.com","123456","2");
INSERT INTO user_master VALUES("13","ssdfsfs@gmail.com","juzar@gmail.com","4");
INSERT INTO user_master VALUES("16","bipasa@gmail.com","123456","2");



