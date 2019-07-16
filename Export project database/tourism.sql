-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 16 2019 г., 19:12
-- Версия сервера: 5.7.23
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tourism`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `text`, `desc`, `alias`, `img`, `created_at`, `updated_at`, `user_id`, `category_id`, `keywords`, `meta_desc`) VALUES
(1, 'Италия', '<p>Италию населяет замечательный народ, известный своим горячим южным темпераментом, открытостью, радушием, удивительной общительностью, непринужденностью и гостеприимством.</p>', '<p>Италия &ndash; это удивительная страна, в которой переплелись история и современность, различные эпохи и богатое культурное наследие, традиции и самобытность. Памятники старины времен Рима, очаровывающая романтика Венеции, холмистая панорама Тосканы, южные склоны Альп, чудесная природа, солнце, море, воздух &ndash; всё это Италия! Имеющая уникальное географическое расположение в центральной части Средиземноморья, она стала колыбелью европейской цивилизации. Здесь, на Апеннинах, зародилась древняя Римская империя, давшая миру знаменитых ученых, талантливых художников и самое большое число достопримечательностей, составивших золотой фонд Всемирного наследия ЮНЕСКО.</p>', 'article-1', '{\"mini\":\"11.jpg \",\"max\":\"12_1.jpg \",\"path\":\"12_1.jpg\"}', '2019-06-05 21:00:00', '2019-07-09 14:38:21', 1, 2, 'Ключи', 'Краткое описание'),
(2, 'Амстердам.', '<p>Амстердам расположен на северо-западе Голландии в устье рек Амстел и Эй. Название города произошло от слов Amstel и Dam, что означает «дамба на реке Амстел». Первое упоминание об Амстердаме относится к 1275 году, когда на его месте находилась скромная рыбацкая деревушка, благодаря построенной дамбе превратившаяся затем в порт.</p>', '<p>Амстердам — столица Нидерландов и один из крупнейших исторических городов Европы. Кто-то едет сюда за хорошим шоппингом, другие жаждут увидеть уникальные музейные коллекции, третьих манит доступность лёгких наркотиков. Некоторые мечтают скорее попасть в район Красных фонарей, а кто-то — в отвязный ночной клуб. Романтики наслаждаются прогулками по средневековым улочкам вдоль колоритных каналов, а молодёжь — атмосферой свободолюбия.</p>', 'article-2', '{\"mini\":\"22.jpg \",\"max\":\"16.jpg\",\"path\":\"16.jpg\"}', '2019-06-01 21:00:00', NULL, 1, 2, '', ''),
(3, 'Греция.', '<p>Эллада – так свою родину называют сами греки – наполнена различными достопримечательностями, значительная часть которых восходит к античным временам. Не зря говорят, что в Греции древности встречаются буквально на каждом шагу. Где бы вы ни оказались – в Афинах или Дельфах, в Фивах или Метеорах, на святой горе Афон или в скальных монастырях – везде вас ждет знакомство с интересными памятниками, самобытными народными традициями. Здесь, на родине Гомера и Пифагора, Софокла и Демокрита, Аристотеля, Еврипида, Платона и других известных личностей прошлого, вы получите настолько яркие впечатления, что обязательно захотите приехать сюда вновь!</p>', '<p>Греция – одна из самых удивительных и неповторимых по своей красоте стран Европы. Расположенная на юге континента, на Балканском полуострове, она является небольшой как по территории – площадь вместе с прилегающими к побережью Малой Азии островами составляет 131 994 км², так и по населению, которое насчитывает 10,3 млн человек. Однако по историческому, культурному, археологическому и языковому наследию с Грецией может сравниться далеко не каждое крупное государство. Столица Афины – древнейший и красивейший город мира, мегаполис с 4-миллионным населением, основанный примерно в 7 тысячелетии до нашей эры.</p>', 'article-3', '{\"mini\":\"33.jpg \",\"max\":\"14.jpg \",\"path\":\"14.jpg\"}', '2019-06-02 21:00:00', NULL, 1, 3, '', ''),
(5, 'Швейцария.', '<p>Швейцария сегодня — это конгломерат из 26 кантонов (23 полных и 3 полукантона) с разным историческим прошлым, население которых принадлежит к разным этническим общностям, говорит на разных языках и имеет разное мировоззрение. Каждый кантон имеет права суверенного государства со своим правительством, законами и судом. Надпись в швейцарском паспорте гласит: «Швейцарская Конфедерация». Однако права кантонов ограничены федеральной конституцией. Высший федеральный орган власти — двухпалатное Федеральное собрание. Глава государства и правительства — президент. Столицы в том смысле, в каком ею является, например, Париж, Швейцария не имеет. Официальной столицей, или, как принято называть в Швейцарии, федеральным городом, является Берн. Однако не он является самым знаменитым городом страны. Пальма первенства принадлежит другому городу — Женеве. Она знаменита на весь мир как один из крупнейших городов — центров международной дипломатической деятельности.</p>', '<p>Швейцария — государство в Западной Европе. Предание гласит: когда Бог распределял богатства недр по Земле, Ему не хватило их для крошечной страны в сердце Европы. Чтобы исправить такую несправедливость, Он облек эту маленькую страну дивной красотой: подарил горы, подобные небесным замкам, сверкающие белизной ледники, поющие водопады, озера кристальной чистоты, светлые благоухающие долины. Красота Швейцарии, дух свободы присущий ей, всегда привлекали и привлекают представителей всех слоев общества — от студентов до членов королевских семей. К крупнейшим городам Швейцарии относят Цюрих, Базель, Женеву, Берн, Лозанну, Винтертур и Санкт-Галлен. </p>', 'article-4', '{\"mini\":\"44.jpg \",\"max\":\"15.jpg \",\"path\":\"15.jpg\"}', '2019-06-08 21:00:00', NULL, 1, 3, '', ''),
(8, 'ОАЭ', '<p>sdfsdfsdfsdfsdfdsf&nbsp;</p>', '<p>aljdlfj lajsdlfj saldjf&nbsp;</p>', 'oae', '{\"mini\":\"U6u2wEpW_mini.jpg\",\"max\":\"U6u2wEpW_max.jpg\",\"path\":\"U6u2wEpW.jpg\"}', '2019-07-15 06:57:36', '2019-07-15 06:57:36', 1, 3, 'tour', 'meta');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `alias`, `created_at`, `updated_at`) VALUES
(1, 'Туры', 0, 'blog', NULL, NULL),
(2, 'Экскурсии', 1, 'computers', NULL, NULL),
(3, 'Экскурсии с отдыхом', 1, '\r\niteresting', NULL, NULL),
(4, 'Детский отдых', 1, 'soveti', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `article_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `text`, `name`, `email`, `site`, `parent_id`, `created_at`, `updated_at`, `article_id`, `user_id`) VALUES
(1, 'Через двадцать лет вы будете больше жалеть не о том, что вы сделали, а о том, что не сделали. Так скидывайте узлы, выплывайте из тихих гаваней. Поймайте ветер в свои паруса. Исследуйте. Мечтайте. Открывайте.', 'Tatsiana', 'tat@mail.ru', 'http://super-codin', 0, '2019-06-20 21:00:00', NULL, 1, NULL),
(3, 'Путешествия учат больше, чем что бы то ни было. Иногда один день, проведенный в других местах, дает больше, чем десять лет жизни дома. ', 'Иван', 'ivan@mail.ru', 'https://alzari.ru', 1, '2019-06-15 21:00:00', NULL, 1, 1),
(4, 'Если я что-то понял за время своих путешествий, так это следующее: единственный способ сделать дело – взяться и сделать его. Не нужно разглагольствовать о поездке на Борнео. Купите билет, получите визу, соберите рюкзак – и это произойдет!', 'Дени', 'den@mail.ru', 'https://livetotravel.ru', 3, '2019-06-16 21:00:00', NULL, 1, 1),
(5, 'Готовясь к путешествию, выложите всю свою одежду и все деньги. После этого возьмите половину одежды и вдвое больше денег', 'Alex', 'alex@mail.ru', 'https://livetotravel.ru', 4, '2019-06-17 21:00:00', NULL, 1, 1),
(38, 'Сентябрь - прекрасное время для отдыха на Крите. Народу не так много, как в летние месяцы. Погода уже более мягкая, море тёплое и ласковое.\r\nНо этот остров не предназначен исключительно для пляжного отдыха. По нему хочется путешествовать, узнавать его. Кто увлекается мифологией, рекомендую взять экскурсию в пещеру Зевса. Самые внимательные разглядят главного Бога Олимпа. По пути вы посетите Плато Лассити, где попробуете своими руками смастерить горшок из глины.', 'Nika', 'nic@mail.ru', 'color', 0, '2019-07-13 14:57:40', '2019-07-13 14:57:40', 3, NULL),
(39, 'Хорошие пляжи на Крите придётся поискать. Рядом с нашим отелем были только галечные, с не самым комфортным заходом в море. Но у них тоже есть свои плюсы. Они все оборудованы лежаками и каждому человеку выдают бутылочку воды. Если проехать на автобусе минут 15 в сторону аэропорта, то вы попадете на широкий песчаный пляж с идеальным входом в воду. Само море чистейшее в любой части побережья. Вода абсолютно прозрачная, насыщенного синего цвета.', 'Igor', 'nic@mail.ru', 'Create', 38, '2019-07-13 14:58:59', '2019-07-13 14:58:59', 3, NULL),
(40, 'Hello!!!!', 'Igor5', 'igor5@mail.ru', 'Create', 0, '2019-07-14 07:55:48', '2019-07-14 07:55:48', 2, NULL),
(43, 'sdfsdfsdfs', 'Lucky8989', 'Laki888vip@mail.ru', 'sdsfs', 0, '2019-07-14 15:49:37', '2019-07-14 15:49:37', 2, NULL),
(44, 'Hello!', 'Tatsiana', 'tat@mai.ru', 'sdf', 0, '2019-07-15 06:03:18', '2019-07-15 06:03:18', 5, NULL),
(47, 'dfgdfgd', 'Nika', 'Sok@mail.ru', 'Create', 0, '2019-07-15 06:48:22', '2019-07-15 06:48:22', 1, NULL),
(48, 'ddfgddfg', 'Nika', 'Tat@mail.ru', 'Create', 0, '2019-07-15 06:49:21', '2019-07-15 06:49:21', 5, NULL),
(49, 'sdfdfsdfsg gfdgdfg', 'Nika', 'Sok@mail.ru', 'Create', 0, '2019-07-15 10:11:01', '2019-07-15 10:11:01', 2, NULL),
(50, 'sdfdsfdsfas', 'Igor', 'Sok@mail.ru', 'Create', 40, '2019-07-15 10:11:38', '2019-07-15 10:11:38', 2, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `filters`
--

CREATE TABLE `filters` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `filters`
--

INSERT INTO `filters` (`id`, `title`, `alias`, `created_at`, `updated_at`) VALUES
(1, 'Brand Identity\r\n', 'brand-identity', '2019-06-03 21:00:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `title`, `path`, `parent`, `created_at`, `updated_at`) VALUES
(1, 'Главная', 'http://tourism.loc', 0, NULL, NULL),
(2, 'Туры', 'http://tourism.loc/articles', 0, NULL, NULL),
(3, 'Экскурсионные туры', 'http://tourism.loc/articles/cat/computers\r\n', 2, NULL, '2019-07-09 15:36:49'),
(5, 'Детский отдых', 'http://tourism.loc/articles/cat/soveti', 2, NULL, NULL),
(6, 'Поиск туров', 'https://www.holiday.by/', 0, NULL, '2019-07-10 11:47:55'),
(7, 'Страны', 'http://tourism.loc/portfolios', 0, NULL, '2019-07-10 11:49:04'),
(9, 'Пляжный отдых', 'http://tourism.loc/portfolios', 2, '2019-07-09 15:02:48', '2019-07-09 15:35:37'),
(12, 'Контакты', 'http://tourism.loc/contacts', 0, '2019-07-10 11:49:49', '2019-07-10 11:49:49');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_01_221523_CreateArticlesTable', 1),
(4, '2019_06_01_221813_CreatePortfoliosTable', 1),
(5, '2019_06_01_222023_CreateFiltersTable', 1),
(6, '2019_06_01_222153_CreateCommentsTable', 1),
(7, '2019_06_01_222400_CreateSlidersTable', 1),
(8, '2019_06_01_222528_CreateMenusTable', 1),
(9, '2019_06_01_222704_CreateCategoriesTable', 1),
(10, '2019_06_01_223538_ChangeArticlesTable', 2),
(11, '2019_06_01_223728_ChangeCommentsTable', 2),
(12, '2019_06_01_223940_ChangePortfoliosTable', 2),
(13, '2019_06_18_192126_Change_Articles_Table2', 3),
(14, '2019_06_19_181239_ChangePortfoliosTable2', 4),
(15, '2019_06_25_205735_CreateRolesTable', 5),
(16, '2019_06_25_205907_CreatePermissionsTable', 5),
(17, '2019_06_25_210126_CreatePermissionRoleTable', 5),
(18, '2019_06_25_210657_CreateRolesUserTable', 5),
(19, '2019_06_28_103143_ChangeRoleUserTable', 6),
(20, '2019_06_28_103312_ChangePermissionRoleTable', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'VIEW_ADMIN', NULL, NULL),
(2, 'ADD_ARTICLES', NULL, NULL),
(3, 'UPDATE_ARTICLES', NULL, NULL),
(4, 'DELETE_ARTICLES', NULL, NULL),
(5, 'ADMIN_USERS', NULL, NULL),
(6, 'VIEW_ADMIN_ARTICLES', NULL, NULL),
(7, 'EDIT_USERS', NULL, NULL),
(8, 'VIEW_ADMIN_MENU', NULL, NULL),
(9, 'EDIT_MENU', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `permission_id` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permission_role`
--

INSERT INTO `permission_role` (`id`, `created_at`, `updated_at`, `role_id`, `permission_id`) VALUES
(1, NULL, NULL, 1, 1),
(2, NULL, NULL, 1, 2),
(3, NULL, NULL, 1, 3),
(4, NULL, NULL, 1, 4),
(5, NULL, NULL, 1, 5),
(7, NULL, NULL, 1, 7),
(10, NULL, NULL, 1, 9),
(11, NULL, NULL, 1, 6),
(12, NULL, NULL, 1, 8),
(13, NULL, NULL, 2, 1),
(14, NULL, NULL, 2, 2),
(15, NULL, NULL, 2, 3),
(16, NULL, NULL, 2, 4),
(17, NULL, NULL, 2, 5),
(18, NULL, NULL, 3, 1),
(19, NULL, NULL, 3, 6),
(20, NULL, NULL, 3, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `filter_alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `text`, `customer`, `alias`, `img`, `created_at`, `updated_at`, `filter_alias`, `keywords`, `meta_desc`) VALUES
(1, 'Египет', 'Курорты Египта – одно из самых популярных туристических направлений у белорусов. Это вполне оправданно, ведь круглый год здесь тепло и солнечно, не нужно оформлять визу, страна очень интересна с точки зрения экскурсионных программ, подводный мир Красного моря восхищает своей красотой и разнообразием, отели предлагают отличное питание и весь спектр развлечений. Но самое главное – такой отдых считается вполне доступным, а горящие предложения на курорты Египта и вовсе радуют очень низкими ценами, особенно зимой.\r\n\r\n', 'Steep This!', 'project1', '{\"mini\":\"6.6.jpg\",\"max\":\"61-770x368.jpg\",\"path\":\"61-770x368.jpg\"}', '2019-06-02 21:00:00', NULL, 'brand-identity', '', ''),
(3, 'Турция', 'Турция – это не просто сказочная страна, соединяющая европейский стиль жизни и восточный колорит, она еще и обладает богатой многовековой историей. Но основное, зачем туристы едут в Турцию, - это пляжный отдых по системе \"все включено\". Для отдыха молодежи прекрасно подходят курорты Кемер, Мармарис и Бодрум. Севернее курорта Сиде простираются мелкопесчаные пологие пляжи, что очень удобно для отдыха с детьми. Кемер –отдых для всех! Аквапарки, дискотеки, множество магазинов, и конечно потрясающая природа!', 'customer', 'project2', '{\"mini\":\"1.1.jpg\",\"max\":\"1.jpg\",\"path\":\"1.jpg\"}', '2019-06-02 21:00:00', NULL, 'brand-identity', '', ''),
(5, 'Кипр', 'Кипр – островное государство, родина удивительных мифов и сказочных легенд, таинственная территория с многовековой историей. Особое преимущество – приятный микроклимат на протяжении всего года. В государстве множество достопримечательностей, которые знакомят с прошлыми эпохами – замки, мечети, церкви, руины, а отдых привлекает внимание романтикой жизни на острове.\r\nКипр предлагает туристам отличный пляжный и экскурсионный отдых. Если правильно подойти к выбору курорта, в памяти останутся только положительные воспоминания. Необходимо учесть время отдыха, погоду, инфраструктуру курортов, возможность отдыха с детьми.\r\n\r\n', 'customer', 'project3', '{\"mini\":\"2.2.jpg\",\"max\":\"2.jpg\",\"path\":\"2.jpg\"}', '2019-06-04 21:00:00', NULL, 'brand-identity', '', ''),
(6, 'Крит\r\n', 'Остров Крит — одно из самых популярных и востребованных туристических направлений. Этот остров привлекает богатым выбором достопримечательностей, многовековой культурой. История Крита тесно связана с зарождением европейской цивилизации и культуры. Древние легенды обретают здесь реальность. Конечно, большинство туристов выбирают отдых на Крите ради комфортабельных, живописных пляжей.\r\nКрит — самый южный остров архипелага, его берега омываются тремя морями. Именно поэтому здесь будет интересно любителям пляжного отдыха и почитателям истории.', 'customer', 'project4', '{\"mini\":\"3.3.jpg\",\"max\":\"3.jpg\",\"path\":\"3.jpg\"}', '2019-06-05 21:00:00', NULL, 'brand-identity', '', ''),
(7, 'Испания\r\n', 'Курорты в Испании принято разделять на 3 группы, каждая из которых имеет свои особенные черты и пользуется популярностью у различных групп туристов, желающих насладиться отдыхом здесь и привести массу впечатлений об Испании, как о стране в целом.\r\nКурорты в Испании\r\nПервая группа курортов в Испании - Балеарские острова, включающие в себя такие курорты, как:\r\nостров Майорка;\r\nостров Ибица\r\nВторая группа курортов в Испании\r\nКанарские острова, включающие в себя такие курорты, как:\r\n\r\nТенерифе;\r\nГран - Канария;\r\nЛа Пальма.\r\nТретья группа курортов в Испании\r\nКурорты континентальной (материковой) Испании, включающие в себя такие места отдыха, как:\r\nКоста дель Соль;\r\nКоста Тропикал;\r\nКоста Брава;\r\nКоста Дорада;\r\nКоста Бланка\r\nПровести незабываемый отпуск можно на любом из курортов Испании. Каждый курорт имеет свои особенности - рассмотрим более подробно каждый из них, исходя из чего каждый сделает для себя вывод, где лучше отдохнуть в Испании.', 'customer', 'project5', '{\"mini\":\"4.4.jpg\",\"max\":\"4.jpg\",\"path\":\"4.jpg\"}', '2019-06-05 21:00:00', NULL, 'brand-identity', '', ''),
(8, 'Белек', 'Белек считается самым респектабельным курортом анталийского побережья Турции. Высококлассные отели, великолепное побережье Средиземного моря, кедровые, эвкалиптовые и сосновые леса, богатая фауна и флора, широкие песчаные пляжи и чистейшая вода – это отдых в Белеке. Окрестности курорта входят в состав природного национального парка «Каньон Кепрюлю», а на побережье откладывают яйца гигантские черепахи карета-карета.\r\nОдним из статусных развлечений, которым славится Белек, является гольф. Курорт является знаменитым на весь мир центром гольфа. Именно здесь находятся лучшие поля: National, Gloria, Nobilis, Tat. Хорошо провести время на поле для гольфа смогут и настоящие профессионалы и новички, которых опытные инструкторы обучат всем азам этой игры.\r\nБелек расположен недалеко от Антальи, поэтому от аэропорта до самого дальнего отеля составит не более сорока минут.', 'customer', 'project6', '{\"mini\":\"5.5.jpg\",\"max\":\"5.jpg\",\"path\":\"5.jpg\"}', '2019-06-06 21:00:00', NULL, 'brand-identity', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Moderator', NULL, NULL),
(3, 'Guest', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role_user`
--

INSERT INTO `role_user` (`id`, `created_at`, `updated_at`, `user_id`, `role_id`) VALUES
(1, NULL, NULL, 1, 1),
(2, NULL, NULL, 3, 3),
(3, NULL, NULL, 4, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sliders`
--

INSERT INTO `sliders` (`id`, `img`, `desc`, `title`, `created_at`, `updated_at`) VALUES
(1, '34.jpg', '', '<h2 style=\"color:#fff\">Santorini / Thira\r\n<br /><span>Σαντορίνη / Θήρα</span></h2>\r\n', NULL, NULL),
(2, '35.jpg', '\r\n', '<h2 style=\"color:#fff\">Switzerland <span>Direction for lovers of impeccability in everything</span></h2>', NULL, NULL),
(4, '36.jpg', '', '<h2 style=\"color:#fff\">Italy <span>is considered to be one of the most beautiful countries on the planet.</span></h2>', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `login`) VALUES
(1, 'Admin', 'admin@mail.ru', '$2y$10$vn7xrQksZ0/1rTgBD4Vey.4A9a/66mvBpDPqKKvlQqy7VIq.gXGES', NULL, '2019-06-01 19:46:05', '2019-06-01 19:46:05', 'admin'),
(3, 'Igor5', 'igor5@mail.ru', '$2y$10$pzzpkynRXlwQJk2D67eRvOqxzAHZp2/tZN/3R/K34JCsB.NnUqEPW', NULL, '2019-07-08 14:20:29', '2019-07-08 16:25:08', 'igor5'),
(4, 'Lucky8989', 'Laki888vip@mail.ru', '$2y$10$9IWKVTw5PWKUVYrvu4uCX.I7tfBaX.kGu3M40t6ikJNA7h528Hlku', NULL, '2019-07-14 15:46:16', '2019-07-14 15:46:16', 'lucky');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_alias_unique` (`alias`),
  ADD KEY `articles_user_id_foreign` (`user_id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_alias_unique` (`alias`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_article_id_foreign` (`article_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `filters_alias_unique` (`alias`);

--
-- Индексы таблицы `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Индексы таблицы `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `portfolios_alias_unique` (`alias`),
  ADD KEY `portfolios_filter_alias_foreign` (`filter_alias`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `filters`
--
ALTER TABLE `filters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Ограничения внешнего ключа таблицы `portfolios`
--
ALTER TABLE `portfolios`
  ADD CONSTRAINT `portfolios_filter_alias_foreign` FOREIGN KEY (`filter_alias`) REFERENCES `filters` (`alias`);

--
-- Ограничения внешнего ключа таблицы `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
