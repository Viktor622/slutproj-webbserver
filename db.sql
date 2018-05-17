

CREATE TABLE `lager` (
  `produkt_id` int(8) DEFAULT NULL,
  `antal` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `produkter` (
  `id` int(8) NOT NULL,
  `namn` varchar(32) DEFAULT NULL,
  `pris` float DEFAULT NULL,
  `bild` varchar(64) DEFAULT NULL,
  `beskrivning` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `produkter` (`id`, `namn`, `pris`, `bild`, `beskrivning`) VALUES
(8, 'Marabou', 24, 'marabou.png', 'Den perfekta chokladen'),
(9, 'Snickers', 9, 'snickers.jpg', 'Utsökt choklad med nötter'),
(10, 'Twix', 9, 'Twix.jpg', 'Två pinnar med underbar choklad'),
(11, 'Riesen', 19, 'riesen.jpg', 'Seg och mörk choklad'),
(12, 'Daim', 9, 'daim.jpg', 'En hård utsida med utsökt caramell inuti'),
(13, 'Ferrero Rocher', 49, 'ferrerorocher.jpg', 'Kvalitets choklad'),
(14, 'Aladdin', 39, 'aladdin.jpg', 'Alla sorters choklad du kan tänka dig');

CREATE TABLE `users` (
  `UserId` int(8) NOT NULL,
  `Username` varchar(64) DEFAULT NULL,
  `Adress` varchar(64) DEFAULT NULL,
  `Mail` varchar(64) DEFAULT NULL,
  `Password` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`UserId`, `Username`, `Adress`, `Mail`, `Password`) VALUES
(1, 'hghg', NULL, '', ''),
(2, 'Dorian', NULL, 'Dorian@kuksug.nu', 'hej'),
(3, 'Dorian', NULL, 'Dorian@kuksug.nu', 'hej'),
(4, 'Dorian', NULL, 'Dorian@kuksug.nu', 'hej'),
(5, 'fsdogj', NULL, 'ffasf@gsdg.se', 'bajsvÃ¤gen 10d'),
(6, 'asd', 'asd', 'asd', 'asd'),
(7, 'qwe', 'qwe', 'qwe@qwe.qwe', 'qwe');

ALTER TABLE `lager`
  ADD KEY `produkt_id` (`produkt_id`);

  ALTER TABLE `produkter`
  ADD PRIMARY KEY (`id`);

 ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

  ALTER TABLE `produkter`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

  ALTER TABLE `users`
 
ALTER TABLE `lager`
  ADD CONSTRAINT `lager_ibfk_1` FOREIGN KEY (`produkt_id`) REFERENCES `produkter` (`id`);
