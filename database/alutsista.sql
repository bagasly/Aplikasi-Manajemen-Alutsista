-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2024 at 07:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alutsista`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `image`, `title`, `date`, `link`) VALUES
(1, 'https://www.indomiliter.com/wp-content/uploads/2023/12/3728560917-1-300x167.jpg', 'Condor 4×4 – Ranpur Lapis Baja yang Jadi Bukti Heroisme Pasukan Malaysia dalam “Black Hawk Down”', '2023-12-24', 'https://www.indomiliter.com/condor-4x4-ranpur-lapis-baja-yang-jadi-bukti-heroisme-pasukan-malaysia-dalam-black-hawk-down/'),
(2, 'https://www.indomiliter.com/wp-content/uploads/2023/12/rk27yqrkgwq91-1-300x200.jpg', 'Masuk Pasar Eropa, Rumania Jadi Pengguna Rudal Hanud Chiron Setelah Korea Selatan dan Indonesia', '2023-12-23', 'https://www.indomiliter.com/masuk-pasar-eropa-rumania-jadi-pengguna-rudal-hanud-chiron-setelah-korea-selatan-dan-indonesia/'),
(3, 'https://www.indomiliter.com/wp-content/uploads/2023/12/Hanwha_Systems_starts_development_of_mine_detection_system_using_AI__Big_Data-300x186.jpg', 'Hanwha Systems Kembangkan Sistem Deteksi Ranjau Laut dengan Kecerdasan Buatan dan Big Data', '2023-12-23', 'https://www.indomiliter.com/hanwha-systems-kembangkan-sistem-deteksi-ranjau-laut-dengan-kecerdasan-buatan-dan-big-data/'),
(4, 'https://www.indomiliter.com/wp-content/uploads/2023/12/submarine_422-1-300x155.jpg', 'Hai Lung Class (Taiwan) – Kapal Selam Diesel Listrik Modern Cita Rasa Belanda Penantang Kekuatan Laut Sang Naga', '2023-12-23', 'https://www.indomiliter.com/hai-lung-class-taiwan-kapal-selam-diesel-listrik-modern-cita-rasa-belanda-penantang-kekuatan-laut-sang-naga/'),
(5, 'https://www.indomiliter.com/wp-content/uploads/2023/12/Russia_equips_kamikaze_drones_with_TBG-7V_thermobaric_rocket_in_Ukraine_925_001-300x201.jpg', 'Mimpi Buruk Pasukan Ukraina, Drone Kamikaze Rusia Bawa Roket Termobarik TBG-7V', '2023-12-22', 'https://www.indomiliter.com/mimpi-buruk-pasukan-ukraina-drone-kamikaze-rusia-bawa-roket-termobarik-tbg-7v/'),
(6, 'https://www.indomiliter.com/wp-content/uploads/2023/12/412425104_10160794543118758_4007278500331741203_n-1536x1152-1-300x225.jpg', 'Roshel Kanada Umumkan Pengiriman Rantis Lapis Baja Senator 4×4 Ke-1000 untuk Ukraina', '2023-12-22', 'https://www.indomiliter.com/roshel-kanada-umumkan-pengiriman-rantis-lapis-baja-senator-4x4-ke-1000-untuk-ukraina/'),
(7, 'https://www.indomiliter.com/wp-content/uploads/2023/12/sub-1-300x169.jpg', 'Tiga Awak Kapal Selam Taiwan Hilang Setelah Tersapu Gelombang Tinggi', '2023-12-22', 'https://www.indomiliter.com/tiga-awak-kapal-selam-taiwan-hilang-setelah-tersapu-gelombang-tinggi/'),
(8, 'https://www.indomiliter.com/wp-content/uploads/2023/12/Fight_between_an_Ukrainian_M2A2_Bradley_and_a_Russian_BMP_near_Avdiivka_925_001-300x196.jpg', '[Video] Pertempuran Jarak Dekat M2A2 Bradley vs BMP Rusia, Deteksi Awal Jadi Kunci Kemenangan', '2023-12-22', 'https://www.indomiliter.com/video-pertempuran-jarak-dekat-m2a2-bradley-vs-bmp-rusia-deteksi-awal-jadi-kunci-kemenangan/'),
(9, 'https://www.indomiliter.com/wp-content/uploads/2023/12/GBaMlsFXwAAWRCp-1-300x169.jpg', 'Pantau Kapal Penangkap Ikan dari Cina, Angkatan Laut Chili Kerahkan Kapal Selam Scorpene Class', '2023-12-21', 'https://www.indomiliter.com/pantau-kapal-penangkap-ikan-dari-cina-angkatan-laut-chili-kerahkan-kapal-selam-scorpene-class/'),
(10, 'https://www.indomiliter.com/wp-content/uploads/2020/02/USS-Indiana_Commisioning_Navy-1_edit-300x200.jpg', 'Senat AS Beri Lampu Hijau ‘Penjualan’ Tiga Unit Kapal Selam Nuklir Virginia Class Block IV dan VII ke Australia', '2023-12-21', 'https://www.indomiliter.com/senat-as-beri-lampu-hijau-penjualan-tiga-unit-kapal-selam-nuklir-virginia-class-block-iv-dan-vii-ke-australia/'),
(11, 'dimas', '', '2024-01-02', '');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id_request` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `serial_number` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `opsi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id_request`, `id_user`, `serial_number`, `reason`, `tgl_pinjam`, `tgl_kembali`, `opsi`) VALUES
(11, 5, 7, 'Perang', '2024-01-18', '2024-01-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `battalion` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `battalion`, `grade`, `password`, `username`, `role`) VALUES
(5, 'bagas', 'abc', 'jendral', '$2y$10$cp5ACj668vi57i0GdHvZvumQRp.EqyCqY32DFcdlI0bQ6Ph7fpoLy', 'bagas', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `weapons`
--

CREATE TABLE `weapons` (
  `image` longblob NOT NULL,
  `serial_number` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `size` int(11) NOT NULL,
  `weight` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `fire_power` int(11) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `maintance` varchar(50) NOT NULL,
  `history` varchar(50) NOT NULL,
  `materials` varchar(50) NOT NULL,
  `speed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weapons`
--

INSERT INTO `weapons` (`image`, `serial_number`, `name`, `size`, `weight`, `status`, `location`, `type`, `capacity`, `fire_power`, `owner`, `maintance`, `history`, `materials`, `speed`) VALUES
(0x313636313534323537303237352e6a7067, 7, 'AKM', 7, 500, 0, 'Unknown', 'Assault', 50, 120, 'bagas', '', '', '', 0),
(0x494d475f32303232303230375f3036343331342e6a7067, 207, 'M24', 60, 10, 1, 'KODIM?', 'Sniper Rifle', 50, 120, '', '', '', 'alumunium', 0),
(0x313636313534323537303832362e6a7067, 212, 'MP5', 5, 5, 1, 'Your Future', 'SMG', 60, 70, '', '', '', 'nano', 0),
(0x446f72612d44656d6f6e27532e6a706567, 353, 'UZI', 5, 4, 1, 'Forest', 'SMG', 20, 50, '', '', '', 'Wood', 0),
(0x313636313534323537313432342e6a7067, 450, 'AWM', 40, 15, 1, 'Purwokerto', 'Sniper Riffle', 10, 0, '', '', '', 'Vibranium', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `id_user` (`id_user`,`serial_number`),
  ADD KEY `serial_number` (`serial_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `weapons`
--
ALTER TABLE `weapons`
  ADD PRIMARY KEY (`serial_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `weapons`
--
ALTER TABLE `weapons`
  MODIFY `serial_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`serial_number`) REFERENCES `weapons` (`serial_number`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
