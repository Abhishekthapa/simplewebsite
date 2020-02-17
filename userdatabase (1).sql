-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 06:44 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `place`
--
-- Error reading structure for table userdatabase.place: #1932 - Table 'userdatabase.place' doesn't exist in engine
-- Error reading data for table userdatabase.place: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `userdatabase`.`place`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `place_id` int(11) NOT NULL,
  `route` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `cost` int(10) NOT NULL,
  `traveldays` int(10) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `information` text NOT NULL,
  `verification` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`place_id`, `route`, `photo`, `cost`, `traveldays`, `posted_by`, `information`, `verification`) VALUES
(1, 'ktm-pokhara-deurali-ABC', '113.JPG', 15000, 7, 'Abhishek Thapa', 'Annapurna region is a popular trekking destination in Nepal. The Annapurna Base Camp trek and Annapurna Circuit trek are common names on the keen trekkerâ€™s bucket lists. Whereas, there are some of the short, easy, and amazing treks like Poon Hill Trek, Dhampus Village Trek, Ghandruk village trek, and many others.  Now, before one decides to go trekking in Annapurna, s/he has to have an idea on the Annapurna trekking map and complete guide. Also, if you decide to do ABC trekking, carry the new Annapurna base camp trekking trails map. It is a sheet of paper, yet, is so valuable.  The article is the Annapurna base camp trek map with distance. Along with distance, you can also get information on the trekking duration and altitude. The trek starts from Pokhara. The total Pokhara to Annapurna base camp distance is 37.1 kilometers.', 'verified'),
(2, 'ktm-bhainsepati-bhungamati', 'bungamati.jpg', 2000, 2, 'Abhishek Thapa', 'This historic village is the birthplace of Rato Machhendranath, the patron god of Patan, but the enormous shikhara temple that used to house the deity in the main square in Bungamati was shaken to rubble in the earthquake. Nevertheless, the Rato Machhendranath festival, which features a famous chariot parade between Bungamati and Patan continues.  Many locals make a living as woodcarvers, and workshops and showrooms surround the main square, which resonates with the tap-tap of chisels. To reach the square from the bus stand, follow the wide road south, then turn right, and then right again at an obvious junction by a Ganesh shrine.', 'pending'),
(3, 'ktm-pokhara-ghanruk-jhinu-sinuwa', 'mbc.jpg', 10000, 7, 'Abhishek Thapa', 'This trek offers the opportunity to escape Nepalâ€™s tourist trails to venture in to the deep forests and roam the high alpine pastures that flank the Annapurna ranges. The emphasis of the trek is on the forest and wilderness zone of these mountains. Some villages are visited on the last days of the trek and these receive few visitors and retain much of their traditional charm. There is an essence of exploration on this trek. The trails we follow are not well used and sometimes hard to identify. Sometimes shepherds and pilgrims pass by. Our Annapurna /Machapuchare trek is designed to provide outstanding mountain views, and to get away from the tea-house trails and into the forests and villages that have not felt the impact of tourism. If you are looking for a fresh trekking trail that offers you captivating views of mountain ranges, rich vegetation and the culture and lifestyle of the ethnic dwellers then this is just the perfect one for you.  As this trail traverses through five major village development committees, you will have numerous choices of trekking and hiking activities. One of the highlights of this trek is the length of the trekking can be decided by you, your interest and time frame and can be a 5 day or 10 day trek .', 'pending'),
(4, 'bhainsepati', 'abc1.jpg', 6000, 10, 'Abhishek Thapa', 'Annapurna region is a popular trekking destination in Nepal. The Annapurna Base Camp trek and Annapurna Circuit trek are common names on the keen trekkerâ€™s bucket lists. Whereas, there are some of the short, easy, and amazing treks like Poon Hill Trek, Dhampus Village Trek, Ghandruk village trek, and many others.  Now, before one decides to go trekking in Annapurna, s/he has to have an idea on the Annapurna trekking map and complete guide. Also, if you decide to do ABC trekking, carry the new Annapurna base camp trekking trails map. It is a sheet of paper, yet, is so valuable.  The article is the Annapurna base camp trek map with distance. Along with distance, you can also get information on the trekking duration and altitude. The trek starts from Pokhara. The total Pokhara to Annapurna base camp distance is 37.1 kilometers.', 'pending'),
(5, 'bhainsepati', 'board.jpg', 3400, 2, 'Abhishek Thapa', '7777', 'pending'),
(6, 'bhainsepati', 'abc.jpg', 12, 12, 'Abhishek Thapa', 'asdadsdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Usertype` varchar(50) NOT NULL DEFAULT 'user',
  `wantadmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `username`, `password`, `Email`, `Usertype`, `wantadmin`) VALUES
(11, 'admin', '$2y$10$kELQjDi1lHKQdmz0F5ZQnefeCVAX5nJ71rxwExIvmk4olLn8284tO', 'admin@gmail.com', 'admin', 0),
(13, 'valentyne7', '$2y$10$99D/tpieZk5rj3pidEdF8.JVC2sAq2tDbkdJgm..E6N3wbRZUP8Za', 'acevalentyne5@gmail.com', 'superadmin', 0),
(14, 'abc', '$2y$10$lZik6Dx/GZwXj/pexAChHez7nYoGsfmEVU8M4MMAkMa1OdXEBtH7m', 'abc@gmail.com', 'user', 0),
(15, 'abcd', '$2y$10$T8wNc0Sx9O2Kr5BndzQXKujto544iEIySg7xfh5IsBlPjL020y9.2', 'abcd@gmail.com', 'user', 1),
(16, 'abcde', '$2y$10$tuYTMmWFcCPAlRuwrV4VquE9fGoK3TiztaQrhNoXVN.7SxQlzTlfW', 'abcde@gmail.com', 'user', 1),
(17, 'ab', '$2y$10$lyCCC1F/Zk5GZ909kJ6NruhJ2E9PUhKAvbZdFubUbJmJSl5RvjmTO', 'ab@gmail.com', 'user', 1),
(18, 'a', '$2y$10$51tuvDLbnJ26HC0xw57gROWCWFOxpdiz7FD.vvXM9blfzJLESrn8O', 'a@gmail.com', 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
