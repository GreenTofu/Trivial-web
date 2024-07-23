-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th7 16, 2022 lúc 10:48 AM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `2022quizzes`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `answer_text` text COLLATE utf8_unicode_ci NOT NULL,
  `is_correct` int(11) NOT NULL,
  PRIMARY KEY (`answer_id`,`question_id`,`quiz_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `answers`
--

INSERT INTO `answers` (`answer_id`, `question_id`, `quiz_id`, `answer_text`, `is_correct`) VALUES
(1, 1, 1, 'Hippopotamus', 1),
(2, 1, 1, 'Shark', 0),
(3, 1, 1, 'Lion', 0),
(4, 1, 1, 'Panda', 0),
(1, 2, 1, 'A house', 0),
(2, 2, 1, 'an ice cube', 0),
(3, 2, 1, 'A pebble', 1),
(4, 2, 1, 'A house', 0),
(1, 3, 1, '9 months and 10 days', 0),
(2, 3, 1, '22 Months', 1),
(3, 3, 1, '1 Year', 0),
(4, 3, 1, '24 Months', 0),
(1, 4, 1, 'The anteater', 0),
(2, 4, 1, 'the duck-billed platypus', 0),
(3, 4, 1, 'The anteater & the duck-billed platypus', 1),
(4, 4, 1, 'I have no idea', 0),
(1, 1, 82, 'Yes', 1),
(2, 1, 82, 'No', 0),
(1, 2, 82, 'a', 1),
(2, 2, 82, 'B', 0),
(3, 2, 82, 'C', 0),
(4, 2, 82, 'D', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_text` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`question_id`,`quiz_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`question_id`, `quiz_id`, `question_text`) VALUES
(1, 1, 'Which mammal is known to have the most powerful bite in the world?'),
(2, 1, 'What object does a male penguin often gift to a female penguin to win her over?'),
(3, 1, 'How long is an elephant pregnant before it gives birth?'),
(4, 1, 'What are the only two mammals are the only ones known to lay eggs?'),
(1, 82, 'QUESTION1(change)'),
(2, 82, 'QUESTION2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quiz_blogs`
--

DROP TABLE IF EXISTS `quiz_blogs`;
CREATE TABLE IF NOT EXISTS `quiz_blogs` (
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_title` text COLLATE utf8_unicode_ci NOT NULL,
  `quiz_description` text COLLATE utf8_unicode_ci NOT NULL,
  `quiz_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`quiz_id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quiz_blogs`
--

INSERT INTO `quiz_blogs` (`user_id`, `quiz_id`, `quiz_title`, `quiz_description`, `quiz_img`, `date_created`) VALUES
(1, 1, 'Animal Trivia', 'Test your knowledge to see that if you had know all about the animals', 'https://static.parade.com/wp-content/uploads/2021/08/animal-trivia.jpg', '2022-06-23 10:45:37'),
(1, 82, 'Quiz title change', 'Quiz body Change', 'images/itec_62d297467931c.jpeg', '2022-07-16 15:08:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '2',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password_hash`, `role`, `date_created`, `date_updated`) VALUES
(1, 'admin', 'sam@gmail.com', '$2y$10$xkZ9CFoY/NDZOL7V7XdxOOPD5ojc826bHMcqYSFVL4LwMEGG9K5/K', 1, '2022-05-21 14:28:07', NULL),
(9, 'sam10', 'sam@gmail.com', '$2y$10$SFEXoinwiTG8l8dvjg4Ep.nYBv5hFWGSV21XcQ3EisyqigO5Fxuo.', 2, '2022-05-25 16:31:01', NULL),
(10, 'randoman', 'sam@gmail.com', '$2y$10$FVnSCl1aX7fs4zNYF.vKTupUKDPQLFXoBJyq2VyU9zQpTzB2qdrlO', 2, '2022-05-27 11:39:47', NULL),
(11, 'hoangLongPham', 'TobiXiaomi@gmail.com', '$2y$10$f7irHKPYsKrZK1I3w8o/Nu/kGxmgN1u0dq9kxBTxiWiZUvLbPc1t.', 2, '2022-07-03 23:02:52', NULL),
(12, 'AmongUs', 'fujikoFfujio@gmail.com', '$2y$10$SWY5MMPGH0jf/umI781he.2GTEVhmwzmMpvIyRRiZ6UmnOCHvx/AG', 2, '2022-07-03 23:19:59', '2022-07-10 00:54:47'),
(13, 'change username', 'blablabla', '$2y$10$R7pEsPNeR8VxvwprdJGGF.2sa9.slTIPiy2K5oswmX7UyQQJvo6HC', 2, '2022-07-05 19:56:19', '2022-07-09 21:16:20'),
(14, 'Name has been changed', 'narutovsluffy09@gmail.com', '$2y$10$rwN6EKZA9ZDbY1o1UfITg.LNrw3VKZMDK.XcPRqXvTRofj0lt1rQO', 2, '2022-07-05 23:14:57', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
