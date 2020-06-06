-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 6 月 06 日 10:28
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `tori_table`
--

CREATE TABLE `tori_table` (
  `id` int(12) NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `file_p` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `tori_table`
--

INSERT INTO `tori_table` (`id`, `title`, `naiyou`, `name`, `file_p`, `indate`) VALUES
(1, '２０２０語学研修', '今年の語学研修のベンダーとのやりとり', '村上', 'file221', '2020-05-29 00:00:00'),
(2, 'インダクション', '中途入社関連。２０２０年のメモ', '村上', '', '2020-05-31 00:00:00'),
(3, '翻訳ソフトマニュアル', '５月のミーティングをもとに簡単に作りました', '村上', 'honyaku', '2020-05-31 00:00:00'),
(4, '3月の入社トレーニング', 'コロナ対応のため一部イレギュラーで組んでます。', '田中', 'http://', '2020-05-31 14:47:06'),
(6, 'English Training', 'This is about internal English lessons for 1st year associates', 'murakami', 'http://english', '2020-06-03 15:56:48'),
(8, 'visitor対応', '海外オフィスからのビジター関連。到着日までの必要事項まとめ', '山本', 'file##', '2020-06-03 16:33:40'),
(9, 'APMAP Candidates 2019', '選考過程メールやりとり\r\n対象は、Jr.-Mid. Associates', 'S.Murakami', '#678902', '2020-06-04 22:37:49'),
(10, 'イベントカレンダー手順', '登録リンク、インビテーションなどの作成手順はここ', '村上', '#99036', '2020-06-04 23:06:28'),
(11, 'オンライントレーニング対応', 'コロナウイルスでオンライン対応した際のまとめ', 'Hajime', 'covid', '2020-06-05 10:56:56'),
(12, 'Office Sponsored Training', '東京オフィスのインターナルトレーニング。リージョンは除く。', '村上', '#119999', '2020-06-05 15:00:18'),
(13, '1st year induction memo ', 'about induction training tips for FY21.......', 'murakami', '#666666', '2020-06-05 16:19:13'),
(15, 'training tips via zoom', 'about some tips regarding training via zoom due to covid19', 'shoko', '#67835', '2020-06-06 00:23:43'),
(17, 'Regional Training notes', 'Correspondence  records in 2019 (L&L related) \r\nAsk Jane for more detail\r\n', 'shoko', '#896436', '2020-06-06 01:53:54'),
(19, '削除練習', '削除の練習です。\r\n', '村上', '888888', '2020-06-06 17:00:15');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `tori_table`
--
ALTER TABLE `tori_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `tori_table`
--
ALTER TABLE `tori_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
