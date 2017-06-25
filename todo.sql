CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `done` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `todo` (`id`, `content`, `done`) VALUES
(9, 'Do exercises', 0),
(10, 'Make site', 0);

ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

