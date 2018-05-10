-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2018 at 11:47 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  `liked` int(11) NOT NULL,
  `disliked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `address`, `lat`, `lng`, `type`, `liked`, `disliked`) VALUES
(1, 'Gyu-Kaku Japanese BBQ', '34 Cooper Sq, New York, NY, USA', 40.728256, -73.991463, 'Restaurant', 5, 1),
(2, 'Flame', '100 West 82nd Street, New York, NY, USA', 40.783978, -73.974503, 'Restaurant', 5, 0),
(3, 'Tony\'s Di Napoli', '1081 3rd Avenue, New York, NY, USA', 40.764351, -73.964066, 'Restaurant', 6, 1),
(4, 'Applebee\'s', '205 West 50th Street, New York, NY, USA', 40.761372, -73.983582, 'Restaurant', 5, 2),
(5, 'McSorley\'s Old Ale House', '15 E 7th St, New York, NY, USA', 40.728809, -73.989685, 'Bar', 5, 2),
(6, 'TsuruTonTan Udon Noodle', '21 East 16th Street, New York, NY, USA', 40.736866, -73.991264, 'Restaurant', 3, 1),
(7, 'Chipotle Mexican Grill', '111 Fulton Street, New York, NY, USA', 40.709927, -74.006561, 'Fast Food', 1, 0),
(8, 'Open Kitchen', '123 William Street, New York, NY, USA', 40.709469, -74.007294, 'Grab and Go', 1, 0),
(9, 'Shake Shack', '200 Broadway, New York, NY, USA', 40.710522, -74.008987, 'Fast Food', 1, 0),
(10, 'Ippudo NY', '65 4th Avenue, New York, NY, USA', 40.730949, -73.990288, 'Restaurant', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
