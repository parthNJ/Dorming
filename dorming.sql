-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2017 at 07:23 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parthpateldatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `dorming`
--

CREATE TABLE `dorming` (
  `netid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `deposit` int(11) NOT NULL,
  `cwid` int(11) NOT NULL,
  `hasRoommate` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `dorm` varchar(255) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `person` int(11) NOT NULL,
  `roommate` int(11) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dorming`
--

INSERT INTO `dorming` (`netid`, `password`, `email`, `fname`, `lname`, `deposit`, `cwid`, `hasRoommate`, `year`, `dorm`, `discription`, `person`, `roommate`, `admin`) VALUES
('george13', '9b306ab04ef5e25f9fb89c998a6aedab', 'george13@gmail.com', 'george', 'lopes', 1, 42819776, 1, '0', 'Russ Hall', 'hi i am george love watch comedy ', 1, 42819776, 0),
('jason14', '2b877b4b825b48a9a0950dd5bd1f264d', 'jason14@gmail.com', 'jason', 'dickson', 1, 16551322, 0, 'Sophmore', 'Russ Hall', 'what up i am jason', 1, 0, 0),
('jigs10', 'f2cc1a426a389960af5feb3ecfe2a68d', 'jigs10@gmail.com', 'jigs', 'beastly', 1, 44334277, 0, 'Freshman', 'Blanton Hall', 'sup fellas beastly here i am a beast', 4, 16551322, 0),
('jake15', '1200cf8ad328a60559cf5e7c5f46ee6d', 'jake15@gmail.com', 'jake', 'dillon', 1, 79843485, 1, 'Junior', 'Russ Hall', 'hi there ', 1, 16551322, 0),
('admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin@gmail.com', '', '', 0, 51822580, 0, '', '', '', 0, 0, 1),
('mark64', 'ea82410c7a9991816b5eeeebe195e20a', 'mark64@gmail.com', '', '', 0, 18271034, 0, '', '', '', 0, 0, 0),
('mason340', '5c29c2e513aadfe372fd0af7553b5a6c', 'mason340@gmail.com', 'mason', 'cosby', 1, 47619128, 0, 'Senior', 'Hawk Crossing', 'what up yall i am mason cosby choose me plz ', 2, 0, 0),
('Kate3030', '29ddc288099264c17b07baf44d3f0adc', 'kate3030@gmail.com', 'kate', 'winston', 1, 80003293, 0, 'Junior', 'The Heights', 'my hobbies include eating sleeping and drinking coffee', 4, 0, 0),
('katt23', '0fd9accd1d8c95e86a96f681b6805948', 'katt23@gmail.com', 'katherine', 'marine', 1, 52187644, 0, 'Sophmore', 'Stone Hall', 'hello i am kat one of the most kindest people in this world ', 1, 0, 0),
('sidd90', 'c3ed80c53d8a01bc9ab5bbb9ed34fc8e', 'sidd90@gmail.com', '', '', 0, 38071423, 0, '', '', '', 0, 0, 0),
('davidTheboss', '172522ec1028ab781d9dfd17eaca4427', 'davidTheboss@gmail.com', '', '', 0, 51253959, 0, '', '', '', 0, 0, 0),
('gordon76', '8fb744b51a1f14e5e8cda4e4aec68e2f', 'gordon76@gmail.com', 'Gordon', 'Mukta', 1, 86500976, 0, 'Senior', 'Frank Sinatra Hall', 'whats up yall looking for a make dorm partner alright cool', 2, 0, 0),
('mom', 'bd1d7b0809e4b4ee9ca307aa5308ea6f', 'mom@gmail.com', 'mom', 'mom', 1, 63133732, 0, 'Freshman', 'The Heights', 'hello i am the users mom ', 3, 0, 0),
('updta34', '482c703f87b1bb9ec19ce52eb9eab6a4', 'updta34@gmail.com', 'updta', 'dickto', 1, 53071370, 0, 'Junior', 'Russ Hall', 'hi i am updta looking for a nice roommate. ', 1, 0, 0),
('victor12', 'ffc150a160d37e92012c196b6af4160d', 'victor12@gmail.com', 'victor', 'mishab', 1, 71246681, 0, 'Junior', 'Frank Sinatra Hall', 'hello i am victor i need a roommate. i am also cool ', 3, 0, 0),
('lucus234', '09d83c0508254e48c374bb9d22ba3fd9', 'lucus234@gmail.com', 'Lucus', 'Keekly', 1, 33857278, 0, 'Freshman', 'Hawk Crossing', 'hello there i am lucus, if yo u need a roommate please email me', 2, 0, 0),
('justin45', '53dd9c6005f3cdfc5a69c5c07388016d', 'justin45@gmail.com', 'Justin', 'Lopes', 1, 24745480, 0, 'Junior', 'Village Apartments', 'sup my hibbies include eating cooking reading. be my roommate plz', 4, 0, 0),
('Vally9098', '1f1df7e5759b7e3fcfd5821bd9d24eb7', 'Vally9098@gmail.com', '', '', 0, 86353244, 0, '', '', '', 0, 0, 0),
('amiDoct25', '6c5b7de29192b42ed9cc6c7f635c92e0', 'amiDoct25@montclair.edu', 'Ami', 'Zeeps', 1, 30173733, 0, 'Junior', 'The Heights', 'sup, I could really use a roommate please hit me up if we match', 3, 0, 0),
('jermainCole21', '18b6308e0d56e77293f0d15a8bc256e9', 'jermainCole21@montclair.edu', 'jermain', 'lamar cole', 1, 94957057, 0, 'Sophmore', 'Russ Hall', 'hi sup, i am jermain i rap, if you need a roommate hit me up ', 1, 0, 0),
('KendrickL34', '129f6fb0661a508384f83f9ca56a2bf1', 'Kendrick34@gmail.com', 'kendrick', 'lamar', 1, 52273671, 0, 'Sophmore', 'Russ Hall', 'i am kendrick i am probably the coolest person you will meet ', 1, 0, 0),
('meesek9', '3bcae4b9f433480fb1d3d0c08bfd85cf', 'meesek9@gmail.com', 'meesek', 'sanchaz', 1, 78331465, 1, 'Senior', 'Russ Hall', 'sup i am meeseek i could really use a roommate thanks', 1, 94957057, 0),
('twins4kk', '9275efa86a9ca523106d0238bbf8c0b2', 'twins4@gmail.com', 'lawse', 'twins', 1, 68489966, 0, 'Junior', 'Russ Hall', 'hi feel free to choose me as your roommate i m cool ', 1, 0, 0);
COMMIT;



GRANT SELECT,INSERT, UPDATE, DELETEON *TO parthpatel@localhostIDENTIFIED BY 'parthpatelpass';



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;





