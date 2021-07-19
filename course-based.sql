-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 18 يوليو 2021 الساعة 23:08
-- إصدار الخادم: 5.7.34-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masafatc_norah`
--

-- --------------------------------------------------------

--
-- بنية الجدول `course`
--

CREATE TABLE `course` (
  `Course_id` int(11) NOT NULL,
  `course_code` varchar(6) NOT NULL,
  `course_number` int(11) NOT NULL,
  `Univ_request` tinyint(1) NOT NULL,
  `colleg_request` tinyint(1) NOT NULL,
  `major_request` tinyint(1) NOT NULL,
  `major_elective` tinyint(1) NOT NULL,
  `major_id` int(11) DEFAULT NULL,
  `track_id` int(11) DEFAULT NULL,
  `hours` int(11) NOT NULL,
  `level` varchar(50) NOT NULL,
  `lap` tinyint(1) NOT NULL,
  `prerequisite` int(11) DEFAULT NULL,
  `type` tinyint(1) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- إرجاع أو استيراد بيانات الجدول `course`
--

INSERT INTO `course` (`Course_id`, `course_code`, `course_number`, `Univ_request`, `colleg_request`, `major_request`, `major_elective`, `major_id`, `track_id`, `hours`, `level`, `lap`, `prerequisite`, `type`, `name`) VALUES
(1, 'COIT', 100, 1, 0, 0, 0, NULL, 0, 3, 'الأول', 0, NULL, 1, 'مهارات الحاسب'),
(2, 'ELI', 101, 1, 0, 0, 0, NULL, NULL, 3, 'الأول ', 0, NULL, 1, 'لغة انجليزية ١'),
(3, 'MATH', 110, 1, 0, 0, 0, NULL, NULL, 3, 'الأول ', 0, NULL, 1, 'استراتيجيات التسويق'),
(4, 'PHYS', 110, 1, 0, 0, 0, NULL, NULL, 3, 'الأول', 0, NULL, 1, 'فيزياء عامة'),
(8, 'COMM', 101, 1, 0, 0, 0, NULL, NULL, 3, 'الثاني', 1, NULL, 1, 'مهارات اتصال'),
(9, 'ELI102', 102, 1, 0, 0, 0, NULL, NULL, 3, 'الثاني', 0, NULL, 1, 'لغة انجليزيه٢'),
(10, 'CHEM', 110, 1, 0, 0, 0, NULL, NULL, 3, 'الثاني', 0, NULL, 1, 'احصاء عامة'),
(11, 'BIO', 110, 1, 0, 0, 0, NULL, NULL, 3, 'الثاني', 0, NULL, 1, 'احياء عامة'),
(48, 'ISLS', 101, 1, 0, 0, 0, NULL, NULL, 2, 'الثالث', 0, NULL, 1, 'ثقافة اسلامية١'),
(49, 'ARAB', 101, 1, 0, 0, 0, NULL, NULL, 3, 'الثالث', 0, NULL, 1, 'مهارات لغوية'),
(50, 'COCS', 202, 0, 1, 0, 0, NULL, NULL, 4, 'الثالث', 0, NULL, 1, 'برمجة ١'),
(51, 'STAT', 210, 0, 1, 0, 0, NULL, 0, 3, 'الثالث', 0, 10, 1, 'نظرية احتمالات'),
(52, 'COIT', 260, 0, 1, 0, 0, NULL, NULL, 3, 'الثالث', 0, NULL, 1, 'اساسيات الحوسبة'),
(53, 'PHYS', 281, 0, 0, 0, 1, NULL, 2, 1, 'الثالث', 0, NULL, 1, 'معمل الفيزياء'),
(54, 'ISLS', 201, 1, 0, 0, 0, NULL, NULL, 3, 'الرابع', 0, NULL, 1, 'ثقافة اسلامية ٢'),
(55, 'ARAB', 201, 1, 0, 0, 0, NULL, NULL, 3, 'الرابع', 0, NULL, 1, 'التحريرالكتابي'),
(56, 'COCS', 203, 0, 1, 0, 0, NULL, 0, 4, 'الرابع', 0, NULL, 1, 'برمجة ٢'),
(57, 'COIS', 231, 0, 1, 0, 0, NULL, NULL, 2, 'الرابع', 0, NULL, 1, 'اساليب الكتابة'),
(58, 'COCS', 222, 0, 1, 0, 0, NULL, NULL, 3, 'الرابع', 0, NULL, 1, 'تراكيب متقطعة'),
(59, 'CHEM', 281, 0, 0, 0, 1, NULL, NULL, 1, 'الرابع', 0, NULL, 1, 'معمل الكيمياء'),
(60, 'COCS', 452, 0, 0, 1, 0, 4, 2, 3, 'التاسع', 0, NULL, 0, 'إدارة مشاريع البرمجيات'),
(61, 'COCS', 455, 0, 0, 1, 0, 4, 2, 3, 'التاسع', 0, NULL, 0, 'موثوقية البرمجيات وأمنها '),
(62, 'COCS', 453, 0, 0, 1, 0, 4, 2, 3, 'التاسع', 0, NULL, 0, 'الأساليب المنهجية'),
(63, 'COCS', 454, 0, 0, 1, 0, 4, 2, 3, 'التاسع', 0, NULL, 0, 'تقييم مخاطر البرمجيات'),
(64, 'COCS', 456, 0, 0, 1, 0, 4, 2, 3, 'التاسع', 0, NULL, 0, 'جودة البرمجيات وإختبارها');

-- --------------------------------------------------------

--
-- بنية الجدول `major`
--

CREATE TABLE `major` (
  `majer_ID` int(11) NOT NULL,
  `chairperson` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `numoflevel` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `conditions` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- إرجاع أو استيراد بيانات الجدول `major`
--

INSERT INTO `major` (`majer_ID`, `chairperson`, `name`, `numoflevel`, `hours`, `conditions`, `description`) VALUES
(4, 25, 'علوم حاسب', 10, 140, 'أن يكون المعدل 3 من 5, اجتياز برمجة 1 وبرمجة 2', 'علوم الحاسب: هو التخصص الأم الذي تندرج منه كل تخصصات الحاسب. يركز على الجزء النظري في الحاسب أكثر من غيره من التخصصات الأخرى  '),
(5, 28, 'تقنية معلومات', 10, 140, 'أن يكون المعدل 3.75 من 5', 'تقنية المعلومات: يركز على الجزء التطبيقي في الحاسب أكثر من غيره من التخصصات الأخرى'),
(6, 4, 'نظم معلومات', 10, 140, 'أن يكون المعدل 2.75 من 5', 'يركز على جزء الأعمال والتحليل في الحاسب.\r\n');

-- --------------------------------------------------------

--
-- بنية الجدول `room`
--

CREATE TABLE `room` (
  `room_number` varchar(11) NOT NULL,
  `floor` varchar(10) NOT NULL,
  `room_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- إرجاع أو استيراد بيانات الجدول `room`
--

INSERT INTO `room` (`room_number`, `floor`, `room_image`) VALUES
('001', 'الأرضي ', ''),
('004', 'الأرضي ', ''),
('006', 'الأرضي', ''),
('008', 'الأرضي', ''),
('009', 'الأرضي', ''),
('101', 'الأول', ''),
('102', 'الأول', ''),
('103', 'الأول', ''),
('104', 'الأول', 'rooms\\104.jpeg'),
('105', 'الأول', 'rooms\\105.jpeg'),
('106', 'الأول', 'rooms\\106.jpeg'),
('107', 'الأول', ''),
('108', 'الأول', ''),
('109', 'الأول', ''),
('110', 'الأول', 'rooms\\110.jpeg'),
('111', 'الأول', 'rooms\\111.jpeg');

-- --------------------------------------------------------

--
-- بنية الجدول `section`
--

CREATE TABLE `section` (
  `section_id` varchar(11) NOT NULL,
  `Course_id` int(11) NOT NULL,
  `day` varchar(40) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- إرجاع أو استيراد بيانات الجدول `section`
--

INSERT INTO `section` (`section_id`, `Course_id`, `day`, `time`) VALUES
('2YR', 60, 'الاثنين - الاربعاء ', '٩٠:٣٠ - ١٠:٥٠'),
('AA', 57, 'الاحد - الثلاثاء ', '٨:٠٠ - ٨:٥٠'),
('AB', 59, 'الثلاثاء', '٨:٠٠ - ١٠:٥٠'),
('AC', 58, 'الاحد - الثلاثاء - الخميس ', '٨:٠٠ - ٨:٥٠ '),
('AD', 48, 'الاثنين - الاربعاء ', '١٠:٠٠ - ١٠:٥٠'),
('AF', 51, 'الاحد - الثلاثاء - الخميس ', '١٠:٠٠ - ١٠:٥٠'),
('AS', 11, 'الاثنين - الاربعاء ', '١١:٠٠ - ١٢:٢٠'),
('AW', 55, 'الاحد - الثلاثاء ', '١٣:٠٠ - ١٣:٥٠'),
('BT', 63, 'الاثنين- الأربعاء ', '٠٩:٣٠ - ١٠:٥٠'),
('CA', 56, 'الاحد - الثلاثاء - الخميس ', '٩:٠٠ - ٩:٥٠'),
('DA', 50, 'الاثنين - الاربعاء ', '٩:٣٠ - ١٠:٥٠'),
('EA', 52, 'الاحد - الثلاثاء - الخميس ', '١٠:٠٠ - ١٠:٥٠'),
('GT', 61, 'الاثنين - الاربعاء ', '٠٨:٠٠ - ٠٩:٢٠');

-- --------------------------------------------------------

--
-- بنية الجدول `sec_room`
--

CREATE TABLE `sec_room` (
  `sec_roomId` int(11) NOT NULL,
  `room_number` varchar(11) NOT NULL,
  `section_id` varchar(11) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- بنية الجدول `sec_teacher`
--

CREATE TABLE `sec_teacher` (
  `sec_teacherid` int(11) NOT NULL,
  `teacher_ID` int(11) NOT NULL,
  `section_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- بنية الجدول `teacher`
--

CREATE TABLE `teacher` (
  `teacher_Id` int(11) NOT NULL,
  `room_number` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `office_hour` varchar(50) NOT NULL,
  `ViceDean` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- إرجاع أو استيراد بيانات الجدول `teacher`
--

INSERT INTO `teacher` (`teacher_Id`, `room_number`, `name`, `email`, `office_hour`, `ViceDean`) VALUES
(1, '105', ' بيان تركي خالد باقاسي', 'bbagasi@kau.edu.sa', 'من ٩-١١ الاثنين والاربعاء ', 0),
(2, '105', 'عبير فؤاد كاتب ', 'afkateb@kau.edu.sa', 'من ٩-١١  الاحد -الثلاثاء - الخميس ', 0),
(3, '103', 'مرام غزاي العصلاني', 'mgalaslany@kau.edu.sa', 'من ٩-١١ الاثنين والاربعاء ', 0),
(4, '102', 'نسرين محمد صالح الحربي', 'nmsalharbi@kau.edu.sa', 'من ٩-١١ الاثنين والاربعاء ', 0),
(10, '102', 'هناء عبد العزيز الجهني ', 'haaljehani@kau.edu.sa', 'من ٩-١١ الاثنين والاربعاء ', 0),
(25, '103', 'أروى عبدالوهاب مشاط', 'aasmashat@kau.edu.sa', 'من ٩-١١  الاحد -الثلاثاء - الخميس ', 0),
(26, '103', 'علياء محفوظ العبدلي', 'amalabdali@kau.edu.sa', 'من ٩-١١  الاحد -الثلاثاء - الخميس ', 1),
(28, '104', 'انتصار سليمان محمد سعد الكيال', 'ealkayyal@kau.edu.s', 'من ٩-١١  الاحد -الثلاثاء - الخميس ', 0),
(30, '109', 'اندي بيسي فيردوسياه منصور', 'abmansur@kau.edu.sa', 'من ٩-١١  الاحد -الثلاثاء - الخميس ', 0),
(31, '106', 'شروق محمد أحمد الغامدي ', 'smaalgamdi@kau.edu.sa', 'من ٩-١١ الاثنين والاربعاء ', 0),
(32, '108', 'غدير جاد الله مصطفى الدويك', 'galdweik@kau.edu.sa', 'من ٩-١١  الاحد -الثلاثاء - الخميس ', 0),
(33, '105', 'دلال أحمد عبدالله الشهري ', '  daalshehri@kau.edu.sa ', 'من ٩-١١  الاحد -الثلاثاء - الخميس ', 0),
(34, '106', 'اميرة معيض سالم المطيري ', 'asubahi@kau.edu.sa', 'من ٩-١١ الاثنين والاربعاء ', 0),
(36, '110', 'ريم حمد عبدالله الوشمي ', 'rhalwashmi@kau.edu.sa', 'من ٩-١١  الاحد -الثلاثاء - الخميس ', 0),
(37, '102', 'نورازا يوسف', 'nyusof@kau.edu.sa', 'من ٩-١١  الاحد -الثلاثاء - الخميس ', 0),
(38, '105', 'فاطمه محمد الغامدي', 'fmalghamdi2@kau.edu.sa', 'من ٩-١١ الاثنين والاربعاء ', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `track`
--

CREATE TABLE `track` (
  `track_id` int(11) NOT NULL,
  `major_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- إرجاع أو استيراد بيانات الجدول `track`
--

INSERT INTO `track` (`track_id`, `major_id`, `name`, `description`) VALUES
(2, 4, 'هندسة البرمجيات ', '....'),
(3, 4, 'رسومات الحاسب ', 'هي مجال فرعي لعلوم الحاسوب يدرس طرق تجميع المحتوى المرئي ومعالجته رقمياً. على الرغم من أن المصطلح يشير غالبًا إلى دراسة رسومات الكمبيوتر ثلاثية الأبعاد، إلا أنه يشمل أيضًا الرسومات ثنائية الأبعاد ومعالجة الصور.'),
(4, 4, 'المعلوماتية الحيوية ', '....'),
(5, 5, 'تقنية الويب ', ''),
(6, 5, 'إدارة وأمن الشبكات ', '..'),
(7, 5, 'الحوسبة المتنقلة  ', '...'),
(8, 6, 'نظم المعلومات ', '\r\nمكونات النظام ومراحله.\r\nنظام المعلومات نظام يتكون من أشخاص، وسجلات البيانات، وعمليات يدوية وغير يدوية، ويقوم هذا النظام بمعالجة البيانات والمعلومات في أي منظومة.'),
(9, 6, 'الحوسبة الصناعية ', '..'),
(10, 6, 'التجارة الالكترونية ', '..'),
(11, 6, 'استرجاع المعلومات ', '..');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_id`),
  ADD KEY `track_id` (`track_id`),
  ADD KEY `major_id` (`major_id`),
  ADD KEY `prerequisite` (`prerequisite`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`majer_ID`),
  ADD KEY `chairperson` (`chairperson`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_number`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `Course_1d` (`Course_id`);

--
-- Indexes for table `sec_room`
--
ALTER TABLE `sec_room`
  ADD PRIMARY KEY (`sec_roomId`),
  ADD KEY `sec_room_ibfk_3` (`room_number`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `sec_teacher`
--
ALTER TABLE `sec_teacher`
  ADD PRIMARY KEY (`sec_teacherid`),
  ADD KEY `teacher_ID` (`teacher_ID`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_Id`),
  ADD KEY `room_number` (`room_number`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`track_id`),
  ADD KEY `major_id` (`major_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `Course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `majer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sec_room`
--
ALTER TABLE `sec_room`
  MODIFY `sec_roomId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sec_teacher`
--
ALTER TABLE `sec_teacher`
  MODIFY `sec_teacherid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `track`
--
ALTER TABLE `track`
  MODIFY `track_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`prerequisite`) REFERENCES `course` (`Course_id`);

--
-- القيود للجدول `major`
--
ALTER TABLE `major`
  ADD CONSTRAINT `major_ibfk_1` FOREIGN KEY (`chairperson`) REFERENCES `teacher` (`teacher_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`Course_id`) REFERENCES `course` (`Course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `sec_room`
--
ALTER TABLE `sec_room`
  ADD CONSTRAINT `sec_room_ibfk_3` FOREIGN KEY (`room_number`) REFERENCES `room` (`room_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sec_room_ibfk_4` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`) ON UPDATE CASCADE;

--
-- القيود للجدول `sec_teacher`
--
ALTER TABLE `sec_teacher`
  ADD CONSTRAINT `sec_teacher_ibfk_1` FOREIGN KEY (`teacher_ID`) REFERENCES `teacher` (`teacher_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sec_teacher_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`) ON UPDATE CASCADE;

--
-- القيود للجدول `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`room_number`) REFERENCES `room` (`room_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `track`
--
ALTER TABLE `track`
  ADD CONSTRAINT `track_ibfk_1` FOREIGN KEY (`major_id`) REFERENCES `major` (`majer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
