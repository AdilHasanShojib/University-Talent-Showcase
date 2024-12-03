-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 05:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talent_showcase`
--

-- --------------------------------------------------------

--
-- Table structure for table `content_uploads`
--

CREATE TABLE `content_uploads` (
  `id` int(11) NOT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `student_id` varchar(50) DEFAULT NULL,
  `content_type` enum('mp3','mp4','image','text') NOT NULL,
  `content_description` text DEFAULT NULL,
  `content_file` varchar(255) DEFAULT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` varchar(255) NOT NULL DEFAULT 'No Title',
  `approval_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content_uploads`
--

INSERT INTO `content_uploads` (`id`, `student_name`, `student_id`, `content_type`, `content_description`, `content_file`, `upload_time`, `title`, `approval_status`) VALUES
(2, 'Shojib Talukder', '011201345', 'image', 'This is my first wall painting.', 'wallpainting.jpg', '2024-09-10 14:15:32', 'My Wall Painting\r\n', 1),
(3, 'Hasan Ahmed Shakil', '011203112', 'mp3', 'This is about guitar tone.', 'Bird one.mp3', '2024-09-10 14:57:29', 'Guitar Playing by myself', 1),
(4, 'Anamul Haque Sunny', '011201346', 'mp4', 'A Bollywood song sung by me', 'video song.mp4', '2024-09-12 04:36:07', 'Cover Bollywood Song', 1),
(5, 'Arefin Tisha', '011181200', 'image', '', 'picture 3.jpg', '2024-09-12 04:38:17', 'Anime Sketch', 1),
(6, 'Sadman Sakib', '011202279', 'text', '', 'Talent people.txt', '2024-09-12 04:39:54', 'This Article About Talent people', 1),
(7, 'Shojib Talukder', '011201345', 'image', 'This is my second Wall painting', 'wallpainting 2.jpg', '2024-09-12 04:41:01', 'Flower Wall Painting', 1),
(8, 'Amin Talukder', '011203445', 'mp3', 'GOT theme Music', 'thrones_theme.mp3', '2024-09-12 04:42:00', 'GOT Theme Music', 1),
(9, 'Arefin Tisha', '011181200', 'image', 'Color Women Sketch', 'picture 2.png', '2024-09-12 04:43:17', 'Color Women Sketch', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `image`, `title`, `description`, `start_time`, `end_time`) VALUES
(2, 'uploads/1727956383How-do-hackathons-work.png', 'Hackathon 2024: Code for Change', 'The annual university hackathon invites all tech enthusiasts to come together and solve real-world problems using innovative coding skills. Teams will collaborate for 36 hours to create software or hardware solutions that can positively impact society. Participants will be provided mentorship, food, and an engaging environment to showcase their technical prowess. Whether you\'re a beginner or a pro, this event is designed to foster creativity and teamwork. Winners will receive exciting prizes and an opportunity to have their projects incubated by industry experts.', '2024-10-10 09:52:00', '2024-10-10 22:52:00'),
(4, 'uploads/1727957231images.png', 'Green Campus Initiative: Sustainability Contest', 'Help make our university greener! The Green Campus Initiative contest encourages students to develop practical sustainability projects that reduce the university\'s carbon footprint. From waste management to energy-efficient designs, students will collaborate with environmental experts to bring their ideas to life. Prizes include grants to fund the winning projects and recognition at the Sustainability Awards Gala. It’s time to think green and make a difference in the fight against climate change.', '2024-10-17 06:06:00', '2024-10-18 18:07:00'),
(5, 'uploads/1727957352images2.jpeg', 'University Business Plan Competition', 'spiring entrepreneurs, this is your moment! The University Business Plan Competition invites students from all disciplines to pitch their innovative business ideas to a panel of successful entrepreneurs and venture capitalists. Whether you’re proposing a tech startup or a social enterprise, this contest is your chance to secure funding and mentorship. Finalists will compete in a live pitch event, and winners will receive seed funding to turn their dreams into reality.', '2024-10-25 08:08:00', '2024-10-25 21:08:00'),
(6, 'uploads/1727957431images2.jpeg', 'Cybersecurity Capture the Flag (CTF) Challenge', 'Are you ready to defend against cyber threats? The Cybersecurity Capture the Flag (CTF) Challenge puts students’ hacking and cybersecurity skills to the test. Teams will compete to solve a series of security puzzles, ranging from cryptography to web vulnerabilities. The challenge will mimic real-world cyber-attack scenarios, and the winning team will be invited to participate in a regional CTF event. Stay sharp, because the hackers are coming!\r\n\r\n', '2024-10-30 06:10:00', '2024-10-30 21:10:00'),
(7, 'uploads/17279580101686922015864.png', 'Creative Writing Contest: The Power of Words', 'harpen your writing skills and tell stories that captivate! The Creative Writing Contest encourages students to explore their imagination and submit short stories, poetry, or personal essays. This year’s theme is \"The Power of Words\"—entries should highlight how language can inspire, challenge, and unite. Winning entries will be published in the university’s literary magazine, and top writers will have a chance to meet acclaimed authors at a special event.', '2024-10-15 06:19:00', '2024-10-15 18:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL,
  `faculty_name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `faculty_name`, `designation`, `department`, `profile_photo`, `email`, `password`) VALUES
(1, 'Dr. Hasan Sarwar', 'Professor', 'CSE', 'Hasan.jpg', 'hasan@gmail.com', '12345'),
(2, 'Dr. Mohammad Nurul Huda', 'Professor', 'CSE', 'Huda.jpg', 'nurul@gmail.com', '12345'),
(3, 'Dr. Md. Motaharul Islam', 'Professor', 'CSE', 'Motaharul.jpg', 'motaharul@gmail.com', '12345'),
(4, 'Mr. Nahid Hossain', 'Assistant Professor', 'CSE', 'Nahid.jpg', 'nahid@gmail.com', '12345'),
(5, 'Dr. Raqibul Mostafa', 'Professor', 'EEE', 'Raqibul.jpg', 'raqibul@gmail.com', '12345'),
(6, 'Dr. Suman Ahmmed', 'Assistant Professor', 'CSE', 'Sumon.jpg', 'suman@gmail.com', '12345'),
(7, 'Ms. Mehenaz Afrin', 'Lecturer', 'EEE', 'Mehenaj.jpg', 'mehenaz@gmail.com', '12345'),
(8, 'Ms. Rubaiya Rahtin Khan', 'Assistant Professor', 'CSE', 'Rubaiya.jpg', 'rubaiya@gmail.com', '12345'),
(9, 'Ms. Tanzila Amir', 'Lecturer', 'BBA', 'Tanzila.jpg', 'tanzila@gmail.com', '12345'),
(10, 'Dr. Farid Ahammad Sobhani', 'Professor', 'BBA', 'Farid.jpg', 'farid@gmail.com', '12345'),
(11, 'Ms. Sadia Islam', 'Lecturer', 'CSE', 'Sadia.jpg', 'sadia@gmail.com', '12345'),
(12, 'Mr. Fahim Hafiz', 'Lecturer', 'CSE', 'FahimHafij.jpg', 'fahim@gmail.com', '12345'),
(13, 'Mr. Md. Ashiqur Rahman', 'Lecturer', 'CSE', 'Ashiq.jpg', 'ashiqur@gmail.com', '12345'),
(14, 'Abtahi Ahmed', 'Lecturer', 'CSE', 'Abtahi.webp', 'abtahi@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `judges`
--

CREATE TABLE `judges` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `judges`
--

INSERT INTO `judges` (`id`, `faculty_id`) VALUES
(35, 1),
(43, 2),
(41, 4),
(44, 7);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `judge_id` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `judge_id`, `content_id`, `rating`, `created_at`) VALUES
(34, 35, 3, 4, '2024-11-19 14:22:47'),
(35, 35, 4, 3, '2024-11-19 14:29:33'),
(36, 35, 6, 2, '2024-11-19 14:38:31'),
(37, 35, 7, 3, '2024-11-19 14:38:38'),
(38, 43, 2, 5, '2024-11-19 14:54:05'),
(39, 43, 3, 3, '2024-11-19 14:54:09'),
(40, 43, 4, 4, '2024-11-19 14:54:13'),
(41, 43, 5, 5, '2024-11-19 14:54:16'),
(42, 43, 6, 2, '2024-11-19 14:54:19'),
(43, 43, 7, 2, '2024-11-19 14:54:24'),
(44, 43, 8, 3, '2024-11-19 14:54:29'),
(45, 43, 9, 4, '2024-11-19 14:54:33'),
(46, 44, 2, 5, '2024-11-19 15:27:13'),
(47, 44, 3, 4, '2024-11-19 15:27:19'),
(48, 44, 4, 5, '2024-11-19 15:27:24'),
(49, 44, 5, 2, '2024-11-19 15:27:27'),
(50, 44, 6, 3, '2024-11-19 15:27:31'),
(51, 44, 7, 2, '2024-11-19 15:27:34'),
(52, 44, 8, 4, '2024-11-19 15:27:38'),
(53, 44, 9, NULL, '2024-11-19 15:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `s_users`
--

CREATE TABLE `s_users` (
  `name` varchar(255) NOT NULL,
  `studentid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `cgpa` varchar(255) NOT NULL,
  `c_credit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_users`
--

INSERT INTO `s_users` (`name`, `studentid`, `password`, `email`, `gender`, `linkedin`, `facebook`, `image`, `department`, `cgpa`, `c_credit`) VALUES
('Arefin Tisha', '011181200', '$2y$10$phLMGR0V.rRO89R6PnvJK.W8m/AHLrw7eUo8ljt4mxL0hU/GpbGdW', 'nazmul202108@bscse.uiu.ac.bd', 'Female\r\n', 'https://linkedin.com', 'https://facebook.com', 'arefin.jpg', 'Computer Science And Engineering', '3.8', '87'),
(' Shojib Talukder', '011201345', '$2y$10$LLefVQkJDTPj8Uw80UJ/JuI8hi5u.nuvHrRdZNCyr4IrYhaDw36Ha', 'adilhasanshojib@gmail.com', 'Male', 'https://www.linkedin.com/in/md-shojib-talukder-8551112b3/', 'https://www.facebook.com/shojib.talukder.adil', 'Shojib.jpg', 'Computer Science And Engineering', '3.6', '137'),
('Anamul Haque Sunny', '011201346', '$2y$10$ROgVV9hqP/WPo94op48HK.42zZ751nF0XFKUg1kjkljCeCmjR7brO', 'anamul@gmail.com', '', '', '', 'Anamul.JPG', 'Computer Science And Engineering', '3.8', '130'),
('Sadman Sakib', '011202279', '$2y$10$6M72Mkhq7MiUEZ8t/RomL.dstl.j2nyMniwLDzE6n8GaSZD95HkvO', 'sadman202279@bscse.uiu.ac.bd', 'Male', 'https://linkedin.com', 'https://facebook.com', '271187999_3250893568474160_7036554719133763293_n.jpg', 'Computer Science And Engineering', '3.9', '92'),
('Hasan Ahmed Shakil', '011203112', '$2y$10$.UVXQZgj5OzwNdO/Sfafkep2bR85HNhnqPLEWJPSZz67Zvi2LA8by', 'hafez202283@bscse.uiu.ac.bd', 'Male', 'https://linkedin.com', 'https://facebook.com', 'sunny.jpg', 'Computer Science And Engineering', '3.85', '90'),
('Amin Talukder', '011203445', '$2y$10$BivvRBjDAcuq6Arirf3mIOGqBtfbyYJmD3riAOdfaaVVMoyzTckA6', 'tushar202080@bscse.uiu.ac.bd', 'Male', 'https://linkedin.com', 'https://facebook.com/Tushar499', 'Amin.jpg', 'Computer Science And Engineering', '3.2', '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content_uploads`
--
ALTER TABLE `content_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judges`
--
ALTER TABLE `judges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_id` (`content_id`),
  ADD KEY `ratings_ibfk_1` (`judge_id`);

--
-- Indexes for table `s_users`
--
ALTER TABLE `s_users`
  ADD PRIMARY KEY (`studentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content_uploads`
--
ALTER TABLE `content_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `judges`
--
ALTER TABLE `judges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `judges`
--
ALTER TABLE `judges`
  ADD CONSTRAINT `judges_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`judge_id`) REFERENCES `judges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `content_uploads` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
