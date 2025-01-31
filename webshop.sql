-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2025 at 07:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `developer` varchar(255) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `title`, `developer`, `publisher`, `release_date`, `price`, `description`) VALUES
(1, 'The Legend of Zelda: Tears of the Kingdom', 'Nintendo', 'Nintendo', '2023-05-12', 81.00, 'Embark on an epic adventure in The Legend of Zelda: Tears of the Kingdom, where you explore vast landscapes, solve intricate puzzles, and battle formidable foes in a quest to save Hyrule.'),
(2, 'God of War Ragnarök', 'Santa Monica Studio', 'Sony Interactive Entertainment', '2022-11-09', 81.00, 'God of War Ragnarök continues the epic tale of Kratos and Atreus as they journey through the realms of Norse mythology, battling gods, monsters, and uncovering deep family secrets.'),
(3, 'Elden Ring', 'FromSoftware', 'Bandai Namco Entertainment', '2022-02-25', 81.00, 'Elden Ring offers an expansive open world filled with mystery and danger. Explore a dark fantasy universe, fight challenging enemies, and uncover a rich lore crafted by FromSoftware.'),
(4, 'Hogwarts Legacy', 'Portkey Games', 'Warner Bros. Interactive Entertainment', '2023-02-10', 81.00, 'Hogwarts Legacy invites players to experience the magic of the Harry Potter universe in a new, open-world RPG set in the 1800s, where you can attend classes, explore magical locations, and shape your own destiny.'),
(5, 'Horizon Forbidden West', 'Guerrilla Games', 'Sony Interactive Entertainment', '2022-02-18', 81.00, 'Horizon Forbidden West continues the story of Aloy in a stunning, post-apocalyptic world where she faces new robotic threats and uncovers ancient secrets in her quest to save humanity.'),
(6, 'Starfield', 'Bethesda Game Studios', 'Bethesda Softworks', '2023-09-06', 81.00, 'Starfield, the highly anticipated space exploration RPG from Bethesda, lets you explore the vast expanses of space, build your own starship, and discover alien worlds and civilizations.'),
(7, 'FIFA 24', 'EA Vancouver', 'Electronic Arts', '2023-09-29', 81.00, 'FIFA 24 brings the excitement of football to your screen with updated rosters, improved gameplay mechanics, and a variety of modes to experience the thrill of the sport.'),
(8, 'Final Fantasy XVI', 'Square Enix', 'Square Enix', '2023-06-22', 81.00, 'Final Fantasy XVI delivers a gripping narrative in a dark fantasy world with stunning visuals and a refined combat system, as players uncover the fate of the realm and its characters.'),
(9, 'Minecraft', 'Mojang Studios', 'Microsoft Studios', '2011-11-18', 81.00, 'Minecraft, the sandbox game that lets you build and explore limitless worlds, offers creativity and adventure in a blocky universe where you can craft, mine, and survive in various game modes.'),
(10, 'The Witcher 3: Wild Hunt', 'CD Projekt Red', 'CD Projekt', '2015-05-19', 81.00, 'The Witcher 3: Wild Hunt follows Geralt of Rivia on a gripping quest filled with rich storytelling, memorable characters, and expansive open-world exploration in a dark fantasy setting.'),
(11, 'Cyberpunk 2077', 'CD Projekt Red', 'CD Projekt', '2020-12-10', 81.00, 'Cyberpunk 2077, set in the dystopian Night City, offers a rich narrative experience with deep character customization, branching storylines, and a visually stunning open world.'),
(12, 'Call of Duty: Modern Warfare II <script>alert(\'hacked\')</script>', 'Infinity Ward', 'Activision', '2022-10-28', 81.00, 'Call of Duty: Modern Warfare II delivers intense and immersive first-person shooter action with a gripping campaign, a variety of multiplayer modes, and tactical gameplay. This is a description!'),
(15, 'Red Dead Redemption 2', 'Rockstar Games', 'Rockstar Games', '2018-10-26', 81.00, 'Red Dead Redemption 2 is an expansive open-world game set in the American frontier, featuring a compelling story, realistic characters, and immersive environments to explore and interact with.'),
(18, 'Genshin Impact', 'miHoYo', 'miHoYo', '2020-09-28', 81.00, 'Genshin Impact is an open-world action RPG set in the fantasy land of Teyvat, where players can explore diverse regions, uncover ancient mysteries, and engage in fast-paced elemental combat.'),
(19, 'Valorant', 'Riot Games', 'Riot Games', '2020-06-02', 81.00, 'Valorant is a tactical first-person shooter with precise gunplay and unique agent abilities, offering strategic gameplay in a variety of competitive and casual game modes.'),
(20, 'League of Legends', 'Riot Games', 'Riot Games', '2009-10-27', 81.00, 'League of Legends is a highly popular multiplayer online battle arena (MOBA) game where players choose from a roster of champions to compete in strategic, team-based matches.'),
(21, 'Fortnite', 'Epic Games', 'Epic Games', '2017-07-25', 81.00, 'Fortnite is a battle royale game known for its fast-paced gameplay, building mechanics, and vibrant art style, where players fight to be the last one standing in ever-changing map environments.'),
(22, 'Overwatch 2', 'Blizzard Entertainment', 'Blizzard Entertainment', '2022-10-04', 81.00, 'Overwatch 2 is a team-based shooter that builds on the success of its predecessor with new heroes, maps, and game modes, emphasizing cooperative play and diverse team compositions.'),
(23, 'Destiny 2', 'Bungie', 'Bungie', '2017-09-06', 81.00, 'Destiny 2 offers a blend of first-person shooter and RPG elements in a sci-fi universe where players explore planets, complete missions, and engage in cooperative and competitive multiplayer activities.'),
(24, 'The Sims 4', 'Maxis', 'Electronic Arts', '2014-09-02', 81.00, 'The Sims 4 allows players to create and control simulated lives in a dynamic open world, with deep customization options, creative building tools, and expansive gameplay possibilities.'),
(25, 'Rocket League', 'Psyonix', 'Psyonix', '2015-07-07', 81.00, 'Rocket League combines soccer with rocket-powered cars in an exhilarating, fast-paced game where players can perform amazing stunts and compete in various modes and tournaments.'),
(26, 'Monster Hunter Rise', 'Capcom', 'Capcom', '2021-03-26', 81.00, 'Monster Hunter Rise is an action RPG that lets players hunt massive monsters in a vibrant, open-world setting, using a variety of weapons and strategies to take down formidable foes.'),
(27, 'Dying Light 2 Stay Human', 'Techland', 'Techland', '2022-02-04', 81.00, 'Dying Light 2 Stay Human is a survival horror game set in a post-apocalyptic city, where players navigate dangerous environments, interact with factions, and make choices that impact the world.'),
(28, 'Ghost of Tsushima', 'Sucker Punch Productions', 'Sony Interactive Entertainment', '2020-07-17', 81.00, 'Ghost of Tsushima follows a samurai warrior as he fights to protect his home from Mongol invaders, featuring beautiful open-world exploration, intense combat, and a story steeped in Japanese culture.'),
(29, 'Death Stranding', 'Kojima Productions', 'Sony Interactive Entertainment', '2019-11-08', 81.00, 'Death Stranding presents a unique open-world experience where players deliver cargo across a fractured America while navigating a surreal and visually striking landscape filled with mysterious entities.'),
(30, 'Sekiro: Shadows Die Twice', 'FromSoftware', 'Activision', '2019-03-22', 81.00, 'Sekiro: Shadows Die Twice challenges players with intense combat and stealth in a beautifully crafted, feudal Japan-inspired world, featuring a deep narrative and skill-based gameplay.'),
(31, 'Divinity: Original Sin 2', 'Larian Studios', 'Larian Studios', '2017-09-14', 81.00, 'Divinity: Original Sin 2 is a critically acclaimed RPG that offers a deep, branching narrative, tactical turn-based combat, and cooperative multiplayer, set in a richly detailed fantasy world.'),
(32, 'Hades', 'Supergiant Games', 'Supergiant Games', '2020-09-17', 81.00, 'This rogue-like dungeon crawler challenges players to escape the underworld as the son of Hades. With its fast-paced combat and rich narrative, it’s a must-play for fans of action RPGs.'),
(33, 'CyberConnect2', 'CyberConnect2', 'CyberConnect2', '2024-03-12', 81.00, 'Embark on an epic journey in this highly anticipated action RPG from CyberConnect2. The game features an engaging story, breathtaking visuals, and dynamic combat.'),
(34, 'Forza Horizon 5', 'Playground Games', 'Xbox Game Studios', '2021-11-09', 81.00, 'Experience the thrill of racing in the beautiful open world of Mexico. With a vast array of cars, dynamic weather, and diverse terrains, this game sets a new standard for racing games.'),
(35, 'Metroid Dread', 'Nintendo', 'Nintendo', '2021-10-08', 81.00, 'The long-awaited sequel to the Metroid series brings Samus Aran back to the spotlight with a thrilling 2D action-adventure experience full of new abilities and enemies.'),
(36, 'Deathloop', 'Arkane Studios', 'Bethesda Softworks', '2021-09-14', 81.00, 'In this innovative first-person shooter, players are trapped in a time loop, fighting to break free by assassinating key targets while exploring a stylish, time-warped island.'),
(37, 'Ratchet & Clank: Rift Apart', 'Insomniac Games', 'Sony Interactive Entertainment', '2021-06-11', 81.00, 'Join Ratchet and Clank in a new dimension-hopping adventure. Featuring stunning visuals, engaging gameplay, and a charming story, it’s a standout entry in the series.'),
(38, 'Persona 5 Royal', 'Atlus', 'Atlus', '2020-03-31', 81.00, 'This expanded version of Persona 5 adds new story content, characters, and gameplay enhancements, making it an essential experience for fans of the critically acclaimed JRPG.'),
(39, 'Resident Evil Village', 'Capcom', 'Capcom', '2021-05-07', 81.00, 'The latest chapter in the Resident Evil saga, offering a chilling survival horror experience with a gripping story, creepy environments, and intense gameplay.'),
(40, 'Demon’s Souls', 'Bluepoint Games', 'Sony Interactive Entertainment', '2020-11-12', 81.00, 'Experience a stunning remake of the classic action RPG. With updated graphics and refined gameplay, it brings the challenging and atmospheric world of Boletaria to a new generation.');

-- --------------------------------------------------------

--
-- Table structure for table `server_config`
--

CREATE TABLE `server_config` (
  `config_id` int(11) NOT NULL,
  `setting_name` varchar(255) NOT NULL,
  `setting_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `server_config`
--

INSERT INTO `server_config` (`config_id`, `setting_name`, `setting_value`) VALUES
(1, 'pagination', '10'),
(2, 'session_timeout', '3600');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `remember_token`, `is_admin`) VALUES
(1, 'user', 'user@gmail.com', '$2y$10$8nh8YOHgAfWGwG0COjweKeBxlUb7Nxz6fJyvDjilJuA/Ksl.FfY8y', NULL, 0),
(2, 'abcd', 'abcd@gmail.com', '$2y$10$l8FxLsKOyy1aAKd2oCu5oOMln46gustP5IWVY7W.VLT/Q/ohhH79a', NULL, 1),
(3, 'admin', 'admin@gmail.com', '$2y$10$tAN3Y52bRtzpcOtlTZ450u3xFNJ7u2GRz2AD9qWz.pd2epHu7xeGC', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_actions`
--

CREATE TABLE `user_actions` (
  `ua_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `info` text DEFAULT NULL,
  `time` datetime DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_actions`
--

INSERT INTO `user_actions` (`ua_id`, `action`, `info`, `time`, `user_id`) VALUES
(90, 'LOGOUT', 'timed_out', '2024-09-18 15:19:40', 3),
(91, 'LOGIN', 'manual', '2024-09-18 16:41:23', 3),
(92, 'LOGOUT', 'manual', '2024-09-18 17:15:15', 3),
(93, 'LOGIN', 'manual', '2024-09-18 17:21:02', 1),
(94, 'LOGOUT', 'manual', '2024-09-18 17:23:16', 1),
(95, 'LOGIN', 'manual', '2024-09-18 17:23:26', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_games`
--

CREATE TABLE `user_games` (
  `ug_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `purchase_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_games`
--

INSERT INTO `user_games` (`ug_id`, `user_id`, `game_id`, `purchase_time`) VALUES
(8, 1, 33, '2024-09-18'),
(9, 1, 29, '2024-09-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `server_config`
--
ALTER TABLE `server_config`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_actions`
--
ALTER TABLE `user_actions`
  ADD PRIMARY KEY (`ua_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_games`
--
ALTER TABLE `user_games`
  ADD PRIMARY KEY (`ug_id`),
  ADD KEY `fk_game` (`game_id`),
  ADD KEY `fk_user` (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `server_config`
--
ALTER TABLE `server_config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_actions`
--
ALTER TABLE `user_actions`
  MODIFY `ua_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `user_games`
--
ALTER TABLE `user_games`
  MODIFY `ug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_actions`
--
ALTER TABLE `user_actions`
  ADD CONSTRAINT `user_actions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_games`
--
ALTER TABLE `user_games`
  ADD CONSTRAINT `fk_game` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
