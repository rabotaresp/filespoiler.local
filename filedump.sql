-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 21 2019 г., 19:39
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `filedump`
--

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `Id` int(11) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `Link` varchar(100) NOT NULL,
  `Link_Key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`Id`, `Id_User`, `Link`, `Link_Key`) VALUES
(71, 1, './uploads/3/a/3ac819cb8bad4ecf7f52b1f96633a6e8.jpg', '4914bfa96fbc78c1caf7594c5d6952a8'),
(72, 1, './uploads/b/f/bf44e4814af5246afffb88656a919eb8.jpg', '00dd029c18ed598ec2acf5da6dd2770c'),
(73, 1, './uploads/b/d/bd8e3ad9db9f1863932432d466a879b2.jpg', 'e57f3e591931abb9f39e4ea20b508f4a'),
(74, 1, './uploads/5/8/58415e75ebc0ed4fb6d40f64c54fac92.jpg', '7d8c33c6a5db07de4cc8866ac421b243'),
(75, 1, './uploads/4/7/476749b05fd3c095265eb331caf83f77.jpg', '4800998e0f485bccf0b4f0b1c2eb095b'),
(76, 2, './uploads/9/3/93b30f9aa1c68363131f3e71fb06ddb8.jpg', 'd66b2a2d3e93c0da2f6e841ee52686db'),
(77, 2, './uploads/1/5/15cd4e365d4429b800b7d55e8c9366c9.jpg', 'be996677795f67b0d39db2463b49c71b'),
(78, 2, './uploads/8/f/8ff2d18f14115fcf3fb18504281078d0.jpg', '5122083803eb0f244f584b18009a03b6'),
(79, 1, './uploads/3/7/376031ececd873de30bd27101430327f.jpg', 'a7500e37dfe8f9a1a5922c6c78d05710'),
(80, 1, './uploads/1/1/11750703173cd2305e1da1e18f795750.jpg', '224bb8d549ba4f15b189a67e2d3cba5d'),
(81, 1, './uploads/a/7/a78051f9dbe5815e27eddecdea59bcf7.jpg', '5478282b8360561558d9721bea36dca0'),
(82, 1, './uploads/f/a/fa9a4057904281ada0c7bf761fc20c91.jpg', '486d2ac0db9c06f1855e59632f8a8ad2');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Login` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`Id`, `Name`, `Login`, `Password`) VALUES
(1, 'Mihail', 'Mihab', 'ok'),
(2, 'fasdf', 'gt', 'ok'),
(3, 'Sergey', 'qwerty', '323');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `files_users_Id_fk` (`Id_User`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_users_Id_fk` FOREIGN KEY (`Id_User`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
