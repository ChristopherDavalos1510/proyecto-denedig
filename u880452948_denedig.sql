-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-08-2024 a las 19:46:33
-- Versión del servidor: 10.11.8-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u880452948_denedig`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `tipo_admin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `correo`, `contraseña`, `tipo_admin`) VALUES
(1, 'ccobrian@denedig.online', '$2a$12$rdyrJKW9jKDk1lu4ItrrTuyow.17QY2KrArX.Jtl7lw41nUJBqgTO', 1),
(5, 'pruebaadmin1@gmail.com', 'adminbrian27', 0),
(10, 'karina@gmail.com', '$2y$10$.H2PWeapVM8.LKYVA6fBQePnRchByF.zzPvhkM7dGn7L9Fdmw8lWm', 0),
(11, 'cuacho.ax@gmail.com', '$2y$10$ZGqqb07W5Cknnd/vLEGNP.Fh6zw.z1m2jyL0XM5tiXjjnLyPTVa4a', 0),
(12, 'liderprueba@gmail.com', 'lider123', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buzon`
--

CREATE TABLE `buzon` (
  `id_buzon` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `mensaje` text NOT NULL,
  `asunto` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `estatus` varchar(50) NOT NULL,
  `observaciones` text NOT NULL,
  `lider` varchar(50) NOT NULL,
  `observacion_lider` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `buzon`
--

INSERT INTO `buzon` (`id_buzon`, `titulo`, `mensaje`, `asunto`, `correo`, `estatus`, `observaciones`, `lider`, `observacion_lider`) VALUES
(9, 'Prueba 1', 'pruebas de asuntos', 'Personal', 'prueba@gmail.com', '2', 'esto es una observacion', 'JAROD JOSUE', ''),
(10, 'prueba2', 'prueba2', 'Escolar', 'prueba2@gmail.com', '2', 'esto es una observacion', 'PAOLA', ''),
(11, 'prueba3', 'prueba3', 'colega', 'prueba3@gmail.com', '1', '', '', ''),
(12, 'prueba4', 'prueba4', 'docencia', 'prueba4@gmail.com', '3', '', '', ''),
(13, 'prueba', 'prueba de ', 'Personal', 'prueba23mayo12@gmail.com', '2', '', '', ''),
(14, 'pruebas', 'pruebas', 'Escolar', 'pruebas23@gmail.com', '1', '', '', ''),
(15, 'pruebas12', 'pruebas', 'colega', 'pruebas25@gmail.com', '3', '', '', ''),
(18, 'prueba 04/06', 'itfkyifyfyfyu', 'Escolar', 'prueba0406@gmail.com', '', '', '', ''),
(19, 'prueba12', 'prueba12prueba12prueba12', 'Escolar', 'prueba12@gmail.com', '3', '', '', ''),
(20, 'KAren', 'prueba responsivo', 'Personal', 'karentesi829@gmail.com', '3', '', '', ''),
(21, 'KAren', 'prueba responsivo', 'Personal', 'karentesi829@gmail.com', '3', '', '', ''),
(22, 'prueba miki', 'prueba conexión', 'docencia', 'miriam.balcazar@conocetupasion.com', '3', '', '', ''),
(23, 'prueba miki', 'prueba conexión', 'docencia', 'miriam.balcazar@conocetupasion.com', '3', '', '', ''),
(24, 'Css', 'Probando conexión ', 'Escolar', 'denedigvideogamesgit@gmail.com', '3', '', '', ''),
(25, 'asunto', 'wi', 'Personal', 'responsivo@jxnj', '3', '', '', ''),
(26, 'Solicitud de información ', '¿Podrían brindarme detalles de sus servicios?', 'colega', 'criveunecrelou-8389@yopmail.com', '3', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(10) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` text NOT NULL,
  `subject` varchar(20) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(1, 'Aleman Noreste', 'mentor.zuleika@conocetupasion.com', '332222222222222222', 'ninguna', 'xd'),
(2, 'wenas', 'wenas@kk', '332222222222222222', 'ninguna', 's'),
(3, 'Diana Hunt', 'benedict.champion@msn.com', '(818) 890-1234', ' Eco-Friendly Office', 'Did you know?\r\n\r\nGoing green is not just a trend!\r\n\r\nDon\'t miss out and upgrade your environment with green solutions.\r\n\r\nClick this link to learn more >>> https://www.missionnewenergy.com/solar-energ'),
(4, 'William Ambrosio', 'globalhiringagents@gmail.com', '7473163974', 'Complimentary Market', 'Hello, it\'s Will!  Does your company have any urgent hiring needs? I have a lot of experience in finding professionals who often seem undiscoverable.\r\n\r\nI\'ve found that volunteering my efforts is a gr'),
(5, 'CompanyRegistar.org', 'royce.merewether48@msn.com', '678881451', 'Your online property', 'Hi \r\n\r\nI see your online property is only listed in 9 out of 2459 directories\r\n\r\nThis will severely impact your page rank, the higher amount of directories your company is listed in, globally or local'),
(6, 'Kyle Phillip', 'emailaudits@gmail.com', '9143256394', 'Question with denedi', 'Hi, my name is Kyle and I\'d like to volunteer my time to you. I have a ton of experience building and marketing websites and I\'ve found that one of the best ways to network is by volunteering. I\'d lik'),
(7, 'Mike Morgan\r\n', 'mikeEnlandy@gmail.com', '88981484644', 'Increase rankings wi', 'Hi there \r\nI just checked denedig.online ranks and am sorry to bring this up, but it lacks in many areas. \r\n \r\nUnfortunately, building a bunch of links won\'t solve the issue in this case, and a more c'),
(8, 'Mike Nevill\r\n', 'mikeEnlandy@gmail.com', '83527864532', 'Improve your website', 'Hi there, \r\n \r\nWhile checking your denedig.online for its ranks, I have noticed that there are some toxic links pointing towards it. \r\n \r\nGrab your free clean up and improve ranks in no time \r\nhttps:/'),
(9, 'Benito Beckwith', 'benito.beckwith77@googlemail.com', '417253190', 'To the denedig.onlin', 'hi! I want to invite you to boost your earnings with our service:\r\n\r\nMonetag accept all websites instant!\r\nYou can place ads, yes\r\n\r\nBut:\r\n\r\nJust place a (direct lin)k, and for everyone that clicks th'),
(10, 'Cyril Van De Velde', 'vandevelde.cyril@gmail.com', '447812088', 'LeadsMax.biz shuttin', 'Hello,\r\n\r\nIt is with sad regret that after 12 years, LeadsMax.biz is shutting down.\r\n\r\nWe have made all our databases available on our website.\r\n\r\n25 Million companies\r\n527 Million People\r\n\r\nLeadsMax.'),
(11, 'Andra Pettit', 'andra.pettit@outlook.com', '351117612', 'Discover the Secret ', 'Hi Denedig,\r\n\r\nAre you ready to dive into a revolutionary way of earning passive income? Introducing Auto-Affiliate AI – the only automated affiliate system that can generate $5,000/week without sales'),
(12, 'Layne Vrooman', 'aibizboosters@gmail.com', '4456668', 'Transform Your Busin', 'Hi, \r\n\r\nUnless you\'re living under a rock (remember that commercial) you have heard about AI (artificial intelligence), but do you know that you can use AI tools to get more money into your business? '),
(13, 'Hattie Beet', 'beet.hattie@gmail.com', '7769355637', 'Hello denedig.online', 'hi! I want to invite you to boost your earnings (massivly!) with our service:\r\n\r\nFREE Traffic System: Flood Your Sites With FREE Traffic\r\n\r\n\r\nHere’s Why You Need To Get Empire For Just $1 Right Now…\r\n'),
(14, 'Princess Brindley', 'brindley.princess@msn.com', '677996480', 'To the denedig.onlin', 'Hey there,\r\n\r\nAre you tired of seeing your website traffic go to waste?\r\n\r\n Monetag can help you turn those visitors into cold, hard cash. Imagine earning extra income without the hassle of complex ad'),
(15, 'Naomi Westgarth', 'westgarth.naomi@outlook.com', '160670571', 'Crazy system that he', 'hi!\r\n\r\nExplode Your Earnings:(Seriously!): SECRET EMAIL SYSTEM\r\n\r\nWithout Ever Creating Product, Without Fulfilling Services, Without Running Ads, or Ever Doing Customer Service – And Best of All Only'),
(16, 'Kyle Phillip', 'emailaudits@gmail.com', '1159867537', 'Question for denedig', 'Hi, my name is Kyle and I\'d like to volunteer my time to you. I have a ton of experience building and marketing websites and I\'ve found that one of the best ways to network is by volunteering. I\'d lik'),
(17, 'Natalen', 'woodthighgire1988@gmail.com', '86435578333', 'Hello Admin!', ' \r\nSi Quieres Videos Privados, Mira esto https://datingsmatches-meets.top/?u=41nkd08&o=8dhpkzk'),
(18, 'Jerri Plath', 'plath.jerri@gmail.com', '482449726', 'Dear denedig.online ', 'Get An INSTANT FLOOD of Non-Stop HUNGRY LEADS\r\nUsing This SHOCKING HACK That Nobody’s Even Heard Of!\r\nWe Show You How To Turn This FLOOD OF LEADS\r\nInto ONGOING INCOME…\r\nAnd Do It In Just 3 MINUTES!(RE'),
(19, 'Louella Fredrick', 'fredrick.louella@msn.com', '443973760', 'Hi denedig.online Ad', 'MUST SEE!\r\n\r\nCreate AI Video\'s in 1 click (every topic)\r\nEnter your idea (every niche) and click generate!=video!\r\n\r\nGuru\'s Don\'t want you to know this! 60 000$/year!\r\nGenearte Shorts videos 9:16 BUT '),
(20, 'Dan Bradshaw', 'rockstarseomasters@gmail.com', '489098200', 'Boost Your Google Ra', '\r\n\r\n\r\nHello there,\r\n\r\nWe Located in Del Mar California. \r\nand we use a lot of A.I. to rank our clients on the top of Google Search.\r\n\r\nWe Provide:\r\n\r\n    SEO – both Local and National Worldwide.\r\n    '),
(21, 'Chris Smith', 'leadmegaphoneus@gmail.com', '313-555-2345', 'Are you the owner? I', 'Hi,\r\n \r\nI was on your website and noticed some words are missing. It might sound silly, but this could be costing you customers and affecting your monthly revenue.\r\n \r\nWould you like a complimentary W'),
(22, 'Find your true match now. - http://xurl.es/p0gwt', 'bdana6036@gmail.com', '83921133863', 'Discover love and co', 'Discover love and companionship now. - http://xurl.es/p0gwt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `nombrecompleto` text DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`nombrecompleto`, `email`) VALUES
('Estefani Asusena ', 'estefanitov12@gmail.com'),
('Rosa Linda Montoya García', 'rosa.garcia04m@gmail.com'),
('Joshua Miguel Leal Diaz', 'videjones2@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador`
--

CREATE TABLE `contador` (
  `id_usuario` int(11) NOT NULL,
  `tiempo_inicio` int(11) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_final` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contador`
--

INSERT INTO `contador` (`id_usuario`, `tiempo_inicio`, `fecha_inicio`, `fecha_final`) VALUES
(4, 1722283840, '2024-07-30 02:10:40', '2024-07-30 02:15:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Departamentos`
--

CREATE TABLE `Departamentos` (
  `id_departamento` int(3) NOT NULL,
  `N_departamento` int(3) NOT NULL,
  `Nombre_departamento` text NOT NULL,
  `Descripcion` text NOT NULL,
  `objetivos` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `id_usuario` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `Departamentos`
--

INSERT INTO `Departamentos` (`id_departamento`, `N_departamento`, `Nombre_departamento`, `Descripcion`, `objetivos`, `nombre`, `id_usuario`) VALUES
(1, 1, 'Administracion', 'Este departamento es la columna vertebral de la empresa. Se encarga de gestionar los recursos humanos, financieros y materiales de la empresa para asegurar su buen funcionamiento y crecimiento. Los profesionales de administración se ocupan de tareas como contabilidad, finanzas, recursos humanos, planificación estratégica, gestión de proyectos y cumplimiento normativo. Su objetivo principal es garantizar que la empresa opere de manera eficiente, rentable y sostenible a largo plazo.\r\n\r\n', 'Gestión Financiera Eficiente: Administrar los recursos financieros de la empresa de manera responsable, controlando costos, maximizando ingresos y asegurando la rentabilidad.\r\nOptimización de Recursos Humanos: Atraer, desarrollar y retener el talento huma', 'lider', 2),
(2, 2, 'Ingenieria', 'Este departamento es el cerebro técnico de la empresa. Se encarga de diseñar, desarrollar y mejorar productos y servicios utilizando principios científicos y matemáticos. Los ingenieros aplican sus conocimientos en áreas como mecánica, electrónica, software, civil y química para resolver problemas y crear soluciones innovadoras. Su trabajo es esencial para garantizar que los productos sean seguros, eficientes y cumplan con las expectativas del cliente.', 'Desarrollo de Productos Innovadores: Diseñar y desarrollar productos o servicios nuevos y mejorados que satisfagan las necesidades del mercado y superen a la competencia.\r\nOptimización de Procesos: Mejorar la eficiencia y productividad de los procesos de ', 'lider', 2),
(3, 3, 'Marketing', 'Este departamento es el motor que impulsa el crecimiento de la empresa. Se encarga de promocionar la marca, productos y servicios para atraer y retener clientes. Los profesionales de marketing utilizan estrategias como publicidad, relaciones públicas, marketing digital, investigación de mercado y análisis de datos para alcanzar los objetivos comerciales de la empresa. Su objetivo principal es aumentar la visibilidad de la marca, generar interés en los productos, y en última instancia, aumentar las ventas.', 'Aumento de la Visibilidad de la Marca: Implementar estrategias para aumentar el conocimiento y la percepción positiva de la marca en el mercado objetivo.\r\nGeneración de Leads y Conversión: Atraer clientes potenciales y convertirlos en clientes reales a tr', 'lider', 2),
(4, 4, 'Diseño', 'Este departamento es el corazón creativo de la empresa. Se encarga de desarrollar la imagen visual de la marca, productos y servicios. Los diseñadores utilizan su talento artístico y habilidades técnicas para crear diseños atractivos y funcionales que comuniquen el mensaje de la empresa y conecten con los clientes. Trabajan en proyectos como diseño gráfico, diseño web, diseño de productos, diseño de envases, entre otros.', 'Creatividad e Innovación: Desarrollar diseños originales y atractivos que reflejen la identidad de la marca y se destaquen en el mercado.\r\nFuncionalidad y Usabilidad: Crear diseños que no solo sean estéticamente agradables, sino también prácticos y fácile', 'lider', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Documentos`
--

CREATE TABLE `Documentos` (
  `id_documentos` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `NACIMIENTO` int(11) NOT NULL,
  `NACIMIENTO_LINK` varchar(1000) NOT NULL,
  `INE` int(11) NOT NULL,
  `INE_LINK` varchar(1000) NOT NULL,
  `CURP` int(11) NOT NULL,
  `CURP_LINK` varchar(1000) NOT NULL,
  `DOMICILIO` int(11) NOT NULL,
  `DOMICILIO_LINK` varchar(1000) NOT NULL,
  `BOLETA` int(11) NOT NULL,
  `BOLETA_LINK` varchar(1000) NOT NULL,
  `SALUD` int(11) NOT NULL,
  `SALUD_LINK` varchar(1000) NOT NULL,
  `CREDENCIAL` int(11) NOT NULL,
  `CREDENCIAL_LINK` varchar(1000) NOT NULL,
  `cv` int(11) NOT NULL,
  `CV_LINK` varchar(1000) NOT NULL,
  `APROBACION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `Documentos`
--

INSERT INTO `Documentos` (`id_documentos`, `id_usuario`, `NACIMIENTO`, `NACIMIENTO_LINK`, `INE`, `INE_LINK`, `CURP`, `CURP_LINK`, `DOMICILIO`, `DOMICILIO_LINK`, `BOLETA`, `BOLETA_LINK`, `SALUD`, `SALUD_LINK`, `CREDENCIAL`, `CREDENCIAL_LINK`, `cv`, `CV_LINK`, `APROBACION`) VALUES
(1, 1, 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0),
(3, 3, 0, '0', 1, '../documentos/3/NACIMIENTO_3_kevin Isai ortiz sanchez.pdf', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0),
(92, 92, 1, '../documentos/92/NACIMIENTO_92_ALECSIS FERNANDO RESENDIZ MARCIAL.pdf', 1, '../documentos/92/INE_92_ALECSIS FERNANDO RESENDIZ MARCIAL.pdf', 1, '../documentos/92/CURP_92_ALECSIS FERNANDO RESENDIZ MARCIAL.pdf', 1, '../documentos/92/DOMICILIO_92_ALECSIS FERNANDO RESENDIZ MARCIAL.pdf', 1, '../documentos/92/BOLETA_92_ALECSIS FERNANDO RESENDIZ MARCIAL.pdf', 1, '../documentos/92/SALUD_92_ALECSIS FERNANDO RESENDIZ MARCIAL.pdf', 1, '../documentos/92/CREDENCIAL_92_ALECSIS FERNANDO RESENDIZ MARCIAL.pdf', 1, '../documentos/92/CV_92_ALECSIS FERNANDO RESENDIZ MARCIAL.pdf', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `id_evaluaciones` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `paterno` varchar(30) DEFAULT NULL,
  `materno` varchar(30) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `N_departamento` int(2) DEFAULT NULL,
  `N_grupo` text DEFAULT NULL,
  `equipo` int(2) DEFAULT NULL,
  `puntualidad` int(2) DEFAULT NULL,
  `responsabilidad` int(2) DEFAULT NULL,
  `liderazgo` int(2) DEFAULT NULL,
  `comunicacion` int(2) DEFAULT NULL,
  `colega_activo` int(2) NOT NULL,
  `total` int(2) DEFAULT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evaluaciones`
--

INSERT INTO `evaluaciones` (`id_evaluaciones`, `id_usuario`, `nombre`, `paterno`, `materno`, `departamento`, `N_departamento`, `N_grupo`, `equipo`, `puntualidad`, `responsabilidad`, `liderazgo`, `comunicacion`, `colega_activo`, `total`, `Fecha`, `deleted`) VALUES
(224, NULL, 'kevin Isai', 'ortiz', 'sanchez', 'Ingenieria', NULL, '6', 1, 1, 1, 1, 1, 0, 5, '2024-07-12 10:05:20', 0),
(225, NULL, 'colega', 'colega', 'colega', 'Ingenieria', NULL, '1', 6, 6, 6, 6, 6, 0, 30, '2024-07-26 19:02:15', 0),
(226, NULL, 'colega', 'colega', 'colega', 'Ingenieria', NULL, '1', 9, 9, 9, 9, 9, 0, 45, '2024-07-26 19:11:05', 0),
(227, NULL, 'colega', 'colega', 'colega', 'Ingenieria', 0, '1', 10, 10, 10, 10, 10, 0, 50, '2024-07-26 19:13:02', 0),
(228, NULL, 'colega', 'colega', 'colega', 'Ingenieria', NULL, '1', 8, 8, 8, 8, 8, 0, 40, '2024-07-29 21:57:26', 0),
(229, NULL, 'nancy ', '', '', '', NULL, '1', 5, 6, 6, 7, 7, 0, 31, '2024-07-29 22:08:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `tipo_servicio` varchar(100) NOT NULL,
  `nombre_dias` varchar(500) NOT NULL,
  `dias_semana` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_termino` time NOT NULL,
  `horas_totales` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_horario`, `tipo_servicio`, `nombre_dias`, `dias_semana`, `hora_inicio`, `hora_termino`, `horas_totales`) VALUES
(1, 'Practicas profesionales', 'Lunes, Martes, Miércoles, Jueves, Viernes', 5, '09:00:00', '12:00:00', 3),
(2, 'Servicio social', 'Lunes, Martes, Miércoles, Jueves, Viernes', 5, '09:00:00', '13:00:00', 4),
(3, 'Estadias profesionales', 'Lunes, Martes, Miércoles, Jueves, Viernes', 5, '09:00:00', '18:00:00', 8),
(4, 'Sistemas dual', 'Lunes, Martes, Miércoles, Jueves', 4, '09:00:00', '18:00:00', 8),
(5, 'Residencias profesionales (ingenieria)', 'Lunes, Martes, Miércoles, Jueves, Viernes', 5, '09:00:00', '16:00:00', 6),
(6, 'Residencias profesionales', 'Lunes, Martes, Miércoles, Jueves, Viernes', 5, '09:00:00', '14:00:00', 5),
(7, 'Sabatino', 'Sabado', 1, '09:00:00', '12:00:00', 3),
(8, 'Practicas Profesionales (horario especial)', 'Lunes, Martes, Miércoles, Jueves, Viernes', 5, '08:00:00', '11:00:00', 3),
(9, 'Servicio Social (horario especial)', 'Lunes, Martes, Miércoles, Jueves, Viernes', 5, '09:00:00', '14:00:00', 5),
(10, 'Vespertino Practicas profesionales', 'Lunes, Martes, Miércoles, Jueves, Viernes', 5, '15:00:00', '18:00:00', 3),
(11, 'Vespertino Servicio social', 'Lunes, Martes, Miércoles, Jueves, Viernes', 5, '13:00:00', '17:00:00', 4),
(12, 'Vespertino Servicio social (horario especial)', 'Lunes, Martes, Miércoles, Jueves, Viernes', 5, '14:00:00', '18:00:00', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interesados_convenios`
--

CREATE TABLE `interesados_convenios` (
  `id` int(11) NOT NULL,
  `universidad` varchar(255) NOT NULL,
  `interesado` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `url_universidad` varchar(255) NOT NULL,
  `tipo_convenio` varchar(50) NOT NULL,
  `sectores` varchar(255) NOT NULL,
  `mensaje` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `interesados_convenios`
--

INSERT INTO `interesados_convenios` (`id`, `universidad`, `interesado`, `cargo`, `telefono`, `whatsapp`, `correo`, `url_universidad`, `tipo_convenio`, `sectores`, `mensaje`) VALUES
(1, 'TESOEM', 'KAren ñañes', 'administración', '323324422424', '12212121212212', 'karentesi829@outlook.com', 'dcdsfds.com', 'Servicio Social', 'E-Commerce, Logística', 'hb'),
(2, 'La nueva de Uni', 'Ismael Maldonado', 'Prueba', '3121543747', '3121543747', 'i-smo@hotmail.com', 'www.denedig.com', 'Residencias', 'E-Commerce', 'Hola hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `justificantes`
--

CREATE TABLE `justificantes` (
  `id_justificante` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo_justificante` varchar(255) NOT NULL,
  `ruta_justificante` text NOT NULL,
  `fecha_justificante` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `titulo_notificación` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `mensaje_notificacion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_lider` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `departamento` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_usuario` varchar(7000) DEFAULT NULL,
  `N_departamento` varchar(50) NOT NULL,
  `N_grupo` varchar(50) NOT NULL,
  `tipo_notificacion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `vistas_usuario` varchar(255) DEFAULT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `titulo_notificación`, `mensaje_notificacion`, `id_lider`, `departamento`, `id_usuario`, `N_departamento`, `N_grupo`, `tipo_notificacion`, `vistas_usuario`, `fecha_hora`) VALUES
(1, 'prueba', ' prueba prueba prueba  prueba prueba prueba  prueba prueba prueba ', '', 'Ingenieria', '3', '1', '1', 'Prioritaria', '3:5', '2024-06-19 09:36:00'),
(2, 'pollo', 'pruebapruebapruebapruebapruebaprueba', '', 'Ingenieria', '3', '1', '1', 'Normal', '3:5', '2024-06-19 10:39:00'),
(3, 'Tu(s) NACIMIENTO ha sido borrado', 'El acta de nacimiento ha sido eliminada por perfil_lider. Corrige y vuelve a subirla.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-26 22:23:42'),
(4, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:6', '2024-06-26 22:44:27'),
(5, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-26 23:13:23'),
(6, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-26 23:13:27'),
(7, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-26 23:13:28'),
(8, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-26 23:13:56'),
(9, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-26 23:14:57'),
(10, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-26 23:15:01'),
(11, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-26 23:54:09'),
(12, 'Tu(s) CONFIDENCIAL ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 00:11:04'),
(13, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 00:15:36'),
(14, 'Tu(s) CONFIDENCIAL ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:6', '2024-06-27 00:18:06'),
(15, 'Tu(s) CONFIDENCIAL ha sido borrado', 'El documento confidencial ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:6', '2024-06-27 00:37:42'),
(16, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:6', '2024-06-27 00:40:21'),
(17, 'Tu(s) CONFIDENCIAL ha sido borrado', 'El documento confidencial ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 00:42:23'),
(18, 'Tu(s) CONFIDENCIAL ha sido borrado', 'El documento confidencial ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 00:47:45'),
(19, 'Tu(s) CONFIDENCIAL ha sido borrado', 'El contrato confidencial ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 00:48:38'),
(20, 'Tu(s) NACIMIENTO ha sido borrado', 'El acta de nacimiento ha sido eliminada por perfil_lider. Corrige y vuelve a subirla.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 18:15:18'),
(21, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 18:17:02'),
(22, 'Tu(s) CONFIDENCIAL ha sido borrado', 'El contrato confidencial ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 18:17:28'),
(23, 'Tu(s) CONFIDENCIAL ha sido borrado', 'El contrato confidencial ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 18:18:03'),
(24, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 18:19:52'),
(25, 'Tu(s) CONFIDENCIAL ha sido borrado', 'El contrato confidencial ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 18:34:32'),
(26, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 18:34:35'),
(27, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 19:22:41'),
(28, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 19:23:12'),
(29, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 19:23:25'),
(30, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 19:23:39'),
(31, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 19:26:26'),
(32, 'Tu(s) CONFIDENCIAL ha sido borrado', 'El contrato confidencial ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 19:32:24'),
(33, 'Tu(s) CONFIDENCIAL ha sido borrado', 'El contrato confidencial ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', 'Ingenieria', '3', '1', '1', 'Urgente', '3:5', '2024-06-27 19:35:27'),
(34, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', '', '1', '0', '0', 'Urgente', '1:6', '2024-07-01 20:06:19'),
(35, 'Tu(s) reglamento ha sido borrado', 'El reglamento ha sido eliminado por perfil_lider. Corrige y vuelve a subirlo.', '2', '', '1', '0', '0', 'Urgente', '1:5', '2024-07-01 20:09:32'),
(36, 'Tu(s) documentos ha sido borrado', 'Todos los documentos han sido eliminados por perfil_lider. Corrige y vuelve a subirlos.', '2', 'Diseño', '348', '0', '0', 'Urgente', NULL, '2024-07-02 15:20:09'),
(37, 'Tu(s) INE ha sido borrado', 'La INE ha sido eliminada por perfil_lider. Corrige y vuelve a subirla.', '2', 'Diseño', '348', '0', '0', 'Urgente', NULL, '2024-07-02 15:26:30'),
(38, 'Tu(s) INE ha sido borrado', 'La INE ha sido eliminada por perfil_lider. Corrige y vuelve a subirla.', '2', 'Ingenieria', '347', '0', '0', 'Urgente', NULL, '2024-07-03 21:54:56'),
(39, 'Tu(s) documentos ha sido borrado', 'Todos los documentos han sido eliminados por perfil_lider. Corrige y vuelve a subirlos.', '2', 'Diseño', '342', '0', '0', 'Urgente', '342:5', '2024-07-18 17:44:57'),
(40, 'Tu(s) INE ha sido borrado', 'La INE ha sido eliminada por perfil_lider. Corrige y vuelve a subirla.', '2', 'Marketing', '1', '0', '3', 'Urgente', '1:5', '2024-07-22 23:47:49'),
(41, 'feliz cumpleaños te desea denedig', 'feliz cumpleaños (adjuntar nombre) te desea un bonito dia y felicidad', '', 'Diseño', '2727', '0', '0', 'Normal', NULL, '2024-12-27 09:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestaciones`
--

CREATE TABLE `prestaciones` (
  `id` int(11) NOT NULL,
  `escuela` text NOT NULL,
  `persona_dirigida` varchar(255) NOT NULL,
  `cargo_dirigida` varchar(255) NOT NULL,
  `plantel_carrera` varchar(255) NOT NULL,
  `tipo_documento` varchar(100) NOT NULL,
  `tipo_prestacion` varchar(255) NOT NULL,
  `horas` int(11) NOT NULL,
  `años` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `prestaciones`
--

INSERT INTO `prestaciones` (`id`, `escuela`, `persona_dirigida`, `cargo_dirigida`, `plantel_carrera`, `tipo_documento`, `tipo_prestacion`, `horas`, `años`) VALUES
(1, 'TECNOLOGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA', 'MSPE. ELVIRA ADRIANA LÓPEZ JACINTO ', 'DIRECTORA GENERAL ', 'PLANTEL IXTAPALUCA ', 'C-A', 'SERVICIO SOCIAL', 480, 6),
(2, 'TECNOLOGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA', 'MSPE. ELVIRA ADRIANA LÓPEZ JACINTO ', 'DIRECTORA GENERAL', 'PLANTEL IXTAPALUCA ', 'C-T', 'SERVICIO SOCIAL', 480, 0),
(3, 'TECNOLOGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA', 'MSPE. ELVIRA ADRIANA LÓPEZ JACINTO ', 'DIRECTORA GENERAL', 'PLANTEL IXTAPALUCA ', 'C-A', 'RESIDENCIA PROFESIONAL', 500, 0),
(4, 'TECNOLOGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA', 'MSPE. ELVIRA ADRIANA LÓPEZ JACINTO ', 'DIRECTORA GENERAL ', 'PLANTEL IXTAPALUCA ', 'C-T', 'RESIDENCIA PROFESIONAL', 500, 0),
(5, 'TECNOLOGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA', 'M. EN D. DEMETRIO MORENO ARCEGA ', 'DIRECTOR GENERAL ', 'PLANTEL IXTAPALUCA ', 'C-A', 'SISTEMA DUAL', 0, 1),
(6, 'TECNOLOGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA', 'M. EN D. DEMETRIO MORENO ARCEGA ', 'DIRECTOR GENERAL ', 'PLANTEL IXTAPALUCA ', 'C-T', 'SISTEMA DUAL', 0, 1),
(7, 'TECNOLOGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA', '', '', '', 'C-A', 'P.C.', 0, 0),
(8, 'TECNOLOGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA', '', '', '', 'C-A', 'P.C.', 0, 0),
(101, 'UTN', '', '', '', 'C-A', 'SERVICIO SOCIAL', 0, 0),
(102, 'UTN', '', '', '', 'C-T', 'SERVICIO SOCIAL', 0, 0),
(103, 'UTN', '', '', '', 'C-A', 'ESTADIAS PROFESIONALES', 0, 0),
(104, 'UTN', '', '', '', 'C-T', 'ESTADIAS PROFESIONALES', 0, 0),
(105, 'UTN', '', '', '', 'C-A', 'SISTEMA DUAL', 0, 0),
(106, 'UTN', '', '', '', 'C-T', 'SISTEMA DUAL', 0, 0),
(107, 'UTN', '', '', '', 'C-A', 'P.C.', 0, 0),
(108, 'UTN', '', '', '', 'C-T', 'P.C.', 0, 0),
(201, 'TECNOLOGICO DE ESTUDIOS SUPERIORES DEL ORIENTE DEL ESTADO DE MEXICO', 'LIC. SILVIA GLORIA MENDOZA FERNÁNDEZ', 'JEFA DEL DEPARTAMENTO DE SERVICIO SOCIAL Y RESIDENCIA PROFESIONAL.', 'PLANTEL DE ESTADO DE MEXICO', 'C-A', 'SERVICIO SOCIAL', 480, 0),
(202, 'TECNOLOGICO DE ESTUDIOS SUPERIORES DEL ORIENTE DEL ESTADO DE MEXICO', 'LIC. SILVIA GLORIA MENDOZA FERNÁNDEZ', 'JEFA DEL DEPARTAMENTO DE SERVICIO SOCIAL Y RESIDENCIA PROFESIONAL.', 'PLANTEL DE ESTADO DE MEXICO', 'C-T', 'SERVICIO SOCIAL', 480, 0),
(203, 'TECNOLOGICO DE ESTUDIOS SUPERIORES DEL ORIENTE DEL ESTADO DE MEXICO', 'LIC. SILVIA GLORIA MENDOZA FERNÁNDEZ ', 'JEFA DEL DEPARTAMENTO DE SERVICIO SOCIAL Y RESIDENCIA PROFESIONAL.', 'PLANTEL DE ESTADO DE MEXICO ', 'C-A', 'RESIDENCIA PROFESIONAL', 500, 0),
(204, 'TECNOLOGICO DE ESTUDIOS SUPERIORES DEL ORIENTE DEL ESTADO DE MEXICO', 'LIC. SILVIA GLORIA MENDOZA FERNÁNDEZ ', 'JEFA DEL DEPARTAMENTO DE SERVICIO SOCIAL Y RESIDENCIA PROFESIONAL.', 'PLANTEL DE ESTADO DE MEXICO ', 'C-T', 'RESIDENCIA PROFESIONAL', 500, 0),
(205, 'TECNOLOGICO DE ESTUDIOS SUPERIORES DEL ORIENTE DEL ESTADO DE MEXICO', 'LIC. ANDREA MORENO RIVERA', 'JEFA DEL DEPARTAMENTO DE VINCULACIÓN Y DIFUSIÓN ', 'PLANTEL DE ESTADO DE MEXICO ', 'C-A', 'SISTEMA DUAL', 0, 1),
(206, 'TECNOLOGICO DE ESTUDIOS SUPERIORES DEL ORIENTE DEL ESTADO DE MEXICO', 'LIC. ANDREA MORENO RIVERA', 'JEFA DEL DEPARTAMENTO DE VINCULACIÓN Y DIFUSIÓN ', 'PLANTEL DE ESTADO DE MEXICO ', 'C-T', 'SISTEMA DUAL', 0, 1),
(207, 'TECNOLOGICO DE ESTUDIOS SUPERIORES DEL ORIENTE DEL ESTADO DE MEXICO', '', '', '', 'C-A', 'P.C.', 0, 0),
(208, 'TECNOLOGICO DE ESTUDIOS SUPERIORES DEL ORIENTE DEL ESTADO DE MEXICO', '', '', '', 'C-T', 'P.C.', 0, 0),
(301, 'AMERIKE', '', '', '', 'C-A', 'SERVICIO SOCIAL', 0, 0),
(302, 'AMERIKE', '', '', '', 'C-T', 'SERVICIO SOCIAL', 0, 0),
(303, 'AMERIKE', 'LIC. JESSICA IVONNE MEDINA SÁNCHEZ', 'COORDINACIÓN ALUMNO', '', 'C-A', 'PRACTICAS PROFESIONALES', 240, 0),
(304, 'AMERIKE', 'LIC. JESSICA IVONNE MEDINA SÁNCHEZ', 'COORDINACIÓN ALUMNO', '', 'C-T', 'PRACTICAS PROFESIONALES', 240, 0),
(305, 'AMERIKE', 'LIC. JESSICA IVONNE MEDINA SÁNCHEZ', 'COORDINACIÓN ALUMNI CDMX', '', 'C-A', 'PRACTICAS PROFESIONALES', 240, 0),
(306, 'AMERIKE', 'LIC. JESSICA IVONNE MEDINA SÁNCHEZ', 'COORDINACIÓN ALUMNI CDMX', '', 'C-T', 'PRACTICAS PROFESIONALES', 240, 0),
(307, 'AMERIKE', 'MAURICIO ALEJNDRO CABRERA ARELLANO', 'COORDINADOR ACADEMICO ', '', 'C-A', 'PRACTICAS PROFESIONALES', 240, 0),
(308, 'AMERIKE', 'LIC. JESSICA IVONNE MEDINA SÁNCHEZ', 'COORDINACIÓN ALUMNI CDMX', '', 'C-T', 'PRACTICAS PROFESIONALES', 240, 0),
(309, 'AMERIKE', '', '', '', 'C-A', 'SISTEMA DUAL', 0, 0),
(310, 'AMERIKE', '', '', '', 'C-T', 'SISTEMA DUAL', 0, 0),
(311, 'AMERIKE', '', '', '', 'C-A', 'P.C.', 0, 0),
(312, 'AMERIKE', '', '', '', 'C-T', 'P.C.', 0, 0),
(401, 'UNIVERISDAD TRES CULTURAS PLANTEL NEZAHUALCOTOTL', 'LIC. MONTSERRAT ALVAREZ ORELLANA', 'COORDINADOR DE VINCULACIÓN Y SERVICIO SOCIAL', 'PLANTEL DE NEZAHUALCOYÓTL', 'C-A', 'SERVICIO SOCIAL', 480, 0),
(402, 'UNIVERISDAD TRES CULTURAS PLANTEL NEZAHUALCOTOTL', 'LIC. MONTSERRAT ALVAREZ ORELLANA', 'COORDINADOR DE VINCULACIÓN Y SERVICIO SOCIAL', 'PLANTEL DE NEZAHUALCOYÓTL', 'C-T', 'SERVICIO SOCIAL', 480, 0),
(403, 'UNIVERSIDAD TRES CULTURAS', '', '', '', 'C-A', 'RESIDENCIA PROFESIONAL', 0, 0),
(404, 'UNIVERSIDAD TRES CULTURAS', '', '', '', 'C-T', 'RESIDENCIA PROFESIONAL', 0, 0),
(405, 'UNIVERSIDAD TRES CULTURAS', '', '', '', 'C-A', 'SISTEMA DUAL', 0, 0),
(406, 'UNIVERSIDAD TRES CULTURAS', '', '', '', 'C-T', 'SISTEMA DUAL', 0, 0),
(407, 'UNIVERISDAD TRES CULTURAS PLANTEL LOS REYES', 'LIC. MONTSERRAT ALVAREZ ORELLANA', 'COORDINADOR DE VINCULACIÓN Y SERVICIO SOCIAL', 'PLANTEL LOS REYES', 'C-A', 'SERVICIO SOCIAL', 480, 0),
(408, 'UNIVERISDAD TRES CULTURAS PLANTEL LOS REYES', 'LIC. MONTSERRAT ALVAREZ ORELLANA', 'COORDINADOR DE VINCULACIÓN Y SERVICIO SOCIAL', 'PLANTEL LOS REYES', 'C-T', 'SERVICIO SOCIAL', 480, 0),
(409, 'UNIVERISDAD TRES CULTURAS PLANTEL EL TOREO', 'LIC. MONTSERRAT ALVAREZ ORELLANA', 'COORDINADOR DE VINCULACIÓN Y SERVICIO SOCIAL', 'PLANTEL TOREO', 'C-A', 'SERVICIO SOCIAL', 480, 0),
(410, 'UNIVERISDAD TRES CULTURAS PLANTEL EL TOREO', 'LIC. MONTSERRAT ALVAREZ ORELLANA', 'COORDINADOR DE VINCULACIÓN Y SERVICIO SOCIAL', 'PLANTEL TOREO', 'C-T', 'SERVICIO SOCIAL', 480, 0),
(411, 'UNIVERISDAD TRES CULTURAS PLANTEL ZONA ROSA', 'LIC. MONTSERRAT ALVAREZ ORELLANA', 'COORDINADOR DE VINCULACIÓN Y SERVICIO SOCIAL', 'PLANTEL ZONA ROSA', 'C-A', 'SERVICIO SOCIAL', 480, 0),
(412, 'UNIVERISDAD TRES CULTURAS PLANTEL ZONA ROSA', 'LIC. MONTSERRAT ALVAREZ ORELLANA', 'COORDINADOR DE VINCULACIÓN Y SERVICIO SOCIAL', 'PLANTEL ZONA ROSA', 'C-T', 'SERVICIO SOCIAL', 480, 0),
(413, 'UNIVERSIDAD TRES CULTURAS', '', '', '', 'C-A', 'P.C.', 0, 0),
(414, 'UNIVERSIDAD TRES CULTURAS', '', '', '', 'C-T', 'P.C.', 0, 0),
(501, 'ETAC CAMPUS CHALCO', 'LIC. JOSÉ ROBERTO DAVALOS VALENCIA ', 'RESPONSABLE DE SERVICIOS ESCOLARES ', 'CAMPUS CHALCO ', 'C-A', 'SERVICIO SOCIAL', 480, 0),
(502, 'ETAC CAMPUS CHALCO', 'LIC. JOSÉ ROBERTO DAVALOS VALENCIA ', 'RESPONSABLE DE SERVICIOS ESCOLARES ', 'CAMPUS CHALCO ', 'C-T', 'SERVICIO SOCIAL', 480, 0),
(503, 'ETAC', '', '', '', 'C-A', 'RESIDENCIA PROFESIONAL', 0, 0),
(504, 'ETAC', '', '', '', 'C-T', 'RESIDENCIA PROFESIONAL', 0, 0),
(505, 'ETAC', '', '', '', 'C-A', 'SISTEMA DUAL', 0, 0),
(506, 'ETAC', '', '', '', 'C-T', 'SISTEMA DUAL', 0, 0),
(507, 'ETAC', '', '', '', 'C-A', 'P.C.', 0, 0),
(508, 'ETAC', '', '', '', 'C-T', 'P.C.', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `titulo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagen` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL,
  `recomendacion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `megusta` int(11) NOT NULL,
  `corazon` int(11) NOT NULL,
  `felicitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo`, `descripcion`, `imagen`, `estado`, `fecha`, `recomendacion`, `megusta`, `corazon`, `felicitacion`) VALUES
(2, 'LE DAMOS LA BIENVENIDA A UTN', 'En Denedig, extendemos una cálida bienvenida a todos los colegas de la UTN. Esperamos colaborar de manera efectiva y constructiva para alcanzar nuestros objetivos comunes', '../image/Imagen de WhatsApp 2024-05-10 a las 09.51.33_d2dc5c24.jpg', 3, '2024-05-10 16:20:28', '', 12, 7, 0),
(3, '10 de mayo', 'En México, el 10 de mayo se celebra el Día de las Madres, una fecha dedicada a honrar y reconocer el papel fundamental de las madres en la sociedad. Es una ocasión para expresar gratitud, amor y aprecio hacia las madres y figuras maternas, con gestos de cariño, regalos y muestras de afecto.', '../image/Este-10-de-mayo-celebramos-el-Día-de-las-Madres.png', 0, '2024-05-07 16:36:36', '', 9, 5, 0),
(4, '5 de mayo', 'En la Batalla de Puebla, ocurrida el 5 de mayo de 1862, el ejército mexicano, liderado por el general Ignacio Zaragoza, enfrentó y derrotó a las fuerzas francesas, a pesar de estar en desventaja numérica y de armamento. Esta victoria simboliza la resistencia y el orgullo nacional mexicano, celebrado anualmente como el Día de la Batalla de Puebla.', '../image/descarga.webp', 9, '2024-05-07 16:36:02', '', 6, 2, 2),
(5, '<i>prueba</i>', '<i>prueba</i>', '../image/logosinfondo.png', 0, '2024-05-31 07:52:34', '', 0, 0, 0),
(6, '<i>Feliz cumple!!</i>', '<i>Feliz cumpleaños a todos nuestros colegas un fuerte abrazo y nuestros mejores deseos, Éxito!!</i>', '', 0, '2024-06-10 15:54:35', '', 0, 0, 0),
(7, '<i>prueba 10 junio</i>', '<i>prueba 10 junio</i>', '../image/29072.png', 0, '2024-06-11 16:44:26', 'Aprobado', 0, 0, 0),
(8, 'Les deseamos a estos colegas ¡Feliz Cumpleaños!', 'La empresa denedig les desea a estas personas que hacen un lugar comodo y agradable una felicitacion a su dia', '../image/cumpleaño.jpg', 9, '2024-06-10 23:55:01', '', 3, 2, 2),
(9, 'Muy Feliz Cumple!!', 'Que ésta nueva vuelta al sol sea muy exitosa, muchas felicidades!! un fuerte abrazo!! Los mejores deseos de parte de DENEDIG...', '../image/imagenesActualizadas/Cumpleaños Julio (1).jpg', 2, '2024-07-02 01:57:57', '', 0, 0, 0),
(10, 'Felicidades!!', 'Que ésta nueva vuelta al sol sea muy exitosa, muchas felicidades!! un fuerte abrazo!! Los mejores deseos de parte de DENEDIG...', '../image/Cumpleaños Julio (1).jpg', 9, '2024-07-02 02:09:44', '', 0, 0, 2),
(11, '<i>CUMPLEAÑOS AGOSTO</i>', '<i>A todos los cumpleañeros de agosto\r\nMuchas felicidades!!\r\nDENEDIG les manda un fuerte abrazo y les desea múcho éxito</i>', '../image/imagenesActualizadas/Cumpleaños Enero (4).png', 3, '2024-08-01 15:26:35', 'Aprobado', 8, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id` int(11) NOT NULL,
  `nombre_recurso` varchar(255) NOT NULL,
  `recurso_link` varchar(1000) NOT NULL,
  `N_departamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id`, `nombre_recurso`, `recurso_link`, `N_departamento`) VALUES
(1, 'kit ejemplo', '../../kits/kit1.docx', 'ingenieria'),
(2, 'kit ejemplo', '../../kits/kit1.docx', 'ingenieria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_horario`
--

CREATE TABLE `registro_horario` (
  `id` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `tipo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `dias_semanas` int(11) NOT NULL,
  `fecha_hora` datetime DEFAULT current_timestamp(),
  `motivo_salida` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_horario`
--

INSERT INTO `registro_horario` (`id`, `id_horario`, `tipo`, `id_usuario`, `dias_semanas`, `fecha_hora`, `motivo_salida`) VALUES
(1, 1, 'entrada', 1, 5, '2024-07-19 15:35:03', NULL),
(2, 2, 'entrada', 3, 5, '2024-07-19 15:41:40', NULL),
(3, 1, 'salida', 1, 5, '2024-07-19 18:02:51', NULL),
(4, 2, 'salida', 3, 5, '2024-07-23 15:28:36', 'por que se me olvido'),
(5, 2, 'entrada', 3, 5, '2024-07-23 15:28:55', NULL),
(6, 1, 'entrada', 1, 5, '2024-07-24 00:06:07', NULL),
(7, 1, 'salida', 1, 5, '2024-07-24 00:06:08', NULL),
(8, 1, 'entrada', 1, 5, '2024-07-24 00:06:09', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_sectores`
--

CREATE TABLE `sub_sectores` (
  `id_subsector` int(4) NOT NULL,
  `id_departamento` int(4) NOT NULL,
  `N_subsector` int(4) NOT NULL,
  `nombre_subsector` varchar(1000) NOT NULL,
  `Descripcion` varchar(1000) NOT NULL,
  `objetivos` varchar(1000) NOT NULL,
  `nombre` varchar(1000) NOT NULL,
  `id_usuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `paterno` text NOT NULL,
  `materno` text NOT NULL,
  `telefono` text NOT NULL,
  `correo` varchar(50) NOT NULL,
  `correo_personal` varchar(255) NOT NULL,
  `imagen` text NOT NULL,
  `nom_usuario` varchar(20) NOT NULL,
  `contraseña` varchar(1000) NOT NULL,
  `escuela` text NOT NULL,
  `carrera` varchar(255) NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `prestacion` varchar(255) NOT NULL,
  `horario` varchar(255) NOT NULL,
  `periodo` varchar(255) NOT NULL,
  `proyecto` varchar(255) NOT NULL,
  `actividades` varchar(1000) NOT NULL,
  `lider` varchar(255) NOT NULL,
  `semestre` varchar(50) NOT NULL,
  `aceptacion` varchar(255) NOT NULL,
  `termino` varchar(255) NOT NULL,
  `aut_termino` int(11) NOT NULL,
  `tipo_usuario` text NOT NULL,
  `nivel_usuario` int(15) NOT NULL,
  `link_seguimiento` text NOT NULL,
  `Grupo_asesor` int(3) NOT NULL,
  `departamento` text NOT NULL,
  `N_departamento` int(11) NOT NULL,
  `N_grupo` int(11) NOT NULL,
  `reglamento` int(3) NOT NULL,
  `reglamento_link` varchar(1000) NOT NULL,
  `CONFIDENCIAL` int(100) NOT NULL,
  `CONFIDENCIAL_LINK` text NOT NULL,
  `id_horario` int(11) NOT NULL,
  `horas_asignadas` int(3) NOT NULL,
  `horas_cumplidas` int(4) NOT NULL,
  `horas_restantes` int(4) NOT NULL,
  `evaluacion` int(2) DEFAULT NULL,
  `colega_activo` int(2) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `fecha_postulante` date NOT NULL,
  `solicitud` date DEFAULT NULL,
  `puesto` varchar(255) NOT NULL,
  `estatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `paterno`, `materno`, `telefono`, `correo`, `correo_personal`, `imagen`, `nom_usuario`, `contraseña`, `escuela`, `carrera`, `matricula`, `prestacion`, `horario`, `periodo`, `proyecto`, `actividades`, `lider`, `semestre`, `aceptacion`, `termino`, `aut_termino`, `tipo_usuario`, `nivel_usuario`, `link_seguimiento`, `Grupo_asesor`, `departamento`, `N_departamento`, `N_grupo`, `reglamento`, `reglamento_link`, `CONFIDENCIAL`, `CONFIDENCIAL_LINK`, `id_horario`, `horas_asignadas`, `horas_cumplidas`, `horas_restantes`, `evaluacion`, `colega_activo`, `cv`, `fecha_postulante`, `solicitud`, `puesto`, `estatus`) VALUES
(1, 'colega', 'colega', 'colega', '2207202', 'Perfil_colega@gmail.com', '', '', 'Perfil_colega', 'Perfil_colega123', 'TESI', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 1, 1, 0, '0', 0, '', 1, 3, 0, 3, 1, 0, NULL, '0000-00-00', NULL, '', NULL),
(2, 'lider', '', '', '', 'perfil_lider@gmail.com', '', '', 'perfil_lider', 'perfil_lider123', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'lider', 3, '', 0, '', 0, 2, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(3, 'KEVIN ISAI', 'SANCHEZ', 'ORTIZ', '5566726006', 'pruebacolega@gmail.com', '', '', 'Pruebalogin1', '1234567', 'TESI', 'INGENIERIA EN SISTEMAS COMPUTACIONALES', '12432456', '1', 'Lunes a viernes de 9am a 6pm', '11/04/2024 al 11/10/2024', 'Generador', 'Escribir código para hacer que las páginas web funcionen (como formularios, bases de datos y funciones de usuario). Mejorar y arreglar código ya existente. Probar y corregir errores en el código para asegurarse de que todo funcione correctamente.', 'Brian Roman', 'NOVENO', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 1, 1, 0, 'Reglamento_3_20240413160912.pdf', 0, '0', 2, 4, 0, 4, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(4, 'Prueba', 'de', 'aspirante', '', 'aspirante@gmail.com', '', '', 'aspirante_1', 'aspirante123', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'aspirante', 5, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 1, 0, NULL, '0000-00-00', NULL, '', NULL),
(5, 'superadmin', '', '', '', 'superadmin@gmail.com', '', '', 'superadmin', 'superadmin123', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'superadmin', 0, '', 0, '', 1, 1, 0, '', 0, '', 0, 0, 0, 0, 1, 0, NULL, '0000-00-00', NULL, '', NULL),
(6, 'pruebalider', '', '', '123456789987', 'pruebalider@gmail.com', '', '', 'lider1', 'lider123', 'col', '', '', '', '', '', '', '', '', '', '', '', 0, '', 2, 'https://docs.google.com/spreadsheets/d/1L2CkmS-819FUdH-X0lk23dpQCT20BoQeVuv8yad2F1w/edit?usp=drive_link', 0, '', 1, 1, 0, '', 0, '', 0, 0, 0, 0, 1, 0, NULL, '0000-00-00', NULL, '', NULL),
(7, 'admin', 'admin', 'admin', '123456789', 'pruebaadmin1@gmail.com', '', '', 'admin', 'admin123', 'col', '', '', '', '', '', '', '', '', '', '', '', 0, '', 1, '', 0, '', 1, 1, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(8, 'oscar', '', '', '', 'oscar_lider@denedig.online', '', '', 'oscar_lider', 'oscar_lider123', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'lider', 2, 'https://docs.google.com/spreadsheets/d/1dBnHRtA5gJWjSCTOQBU8BH2DetRrlUEbJB9iFY2YFYU/edit?usp=sharing', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(9, 'Issac', '', '', '', 'issac_lider@denedig.online', '', '', 'issac_lider', 'issac_lider123', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'lider', 2, 'https://docs.google.com/spreadsheets/d/1Qr8-jSYEWFdZNpkxIggUVs-eWk33swN1ER_wKK-yhVI/edit?usp=sharing', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(10, 'Chang', '', '', '', 'Chang_lider@denedig.online', '', '', 'chang_lider', 'chang_lider123', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'lider', 2, 'https://docs.google.com/spreadsheets/d/1n-807TRhLR06schxg7u7VRDysdD3_tKpo4Ldr5LjFVo/edit?usp=sharing', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(11, 'Brian ', 'Martin', '', '', 'brian_lider@denedig.online', '', '', 'brian_lider', 'brian_lider123', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'lider', 2, 'https://docs.google.com/spreadsheets/d/1rqx4e9_KJXChjSTgbpq1PaR6B94-RcSlcZxWwQF1EqA/edit?usp=sharing', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(12, 'Ismael', '', '', '', 'ismael_lider@denedig.online', '', '', 'ismael_lider', 'ismael_lider123', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'lider', 2, 'https://docs.google.com/spreadsheets/d/1iTsDcKstdjP-69uCns9L6W6KnLXjVYWP0Shq2B4gvhI/edit?usp=sharing', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(13, 'nancy', '', '', '', 'nancy_lider@denedig.online', '', '', 'nancy_lider', 'nancylider_998', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'lider', 2, 'https://docs.google.com/spreadsheets/d/1L2CkmS-819FUdH-X0lk23dpQCT20BoQeVuv8yad2F1w/edit?usp=sharing', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(14, 'nancy ', '', '', '', 'nancy_admin@denedig.online', '', '', 'nancy_admin', 'nancyadmin_999', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'admin', 1, '', 0, '', 1, 1, 0, '', 0, '', 0, 0, 0, 0, 1, 0, NULL, '0000-00-00', NULL, '', NULL),
(92, 'ALECSIS FERNANDO', 'RESENDIZ', 'MARCIAL', '55-4834-2030', 'AlecsisResendiz@denedig.online', '', '', 'ALECSISRESENDIZ92', '123AlecsisResendiz', 'TESI', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/92/Reglamento_92_ALECSIS FERNANDO RESENDIZ MARCIAL.pdf', 1, '../documentos/92/CONFIDENCIAL_92_ALECSIS FERNANDO RESENDIZ MARCIAL.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(100, 'KAREN', 'YAÑES', 'ALONSO', '5512345678', 'YANESKAREN100@DENEDIG.ONLINE.COM', '', '', 'YAÑESKAREN100', 'YAÑESKAREN', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 2, 'https://docs.google.com/spreadsheets/d/1sUWWpWy__xHW7N5Rl1PVyIl0c-v5-WEx9Nn7o7Da5vo/edit?usp=drive_link', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(134, ' BRYAN', 'ESPINOSA', 'ALVAREZ', '56-3030-5847', 'BryanEspinoza@denedig.online', '', '', 'BRYANESPINOZA135', '123BryanEspinoza', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Publicidad', 0, 0, 1, '../documentos/134/Reglamento_134_ BRYAN ESPINOSA ALVAREZ.pdf', 1, '../documentos/134/CONFIDENCIAL_134_ BRYAN ESPINOSA ALVAREZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(136, ' LESLIE DANIELA', 'HERNANDEZ', 'ARELLANO', '56-4394-4214', 'LeslieHernandez@denedig.online', '', '', 'LESLIEHERNANDEZ136', '123LeslieHernandez', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/136/Reglamento_136_ LESLIE DANIELA HERNANDEZ ARELLANO.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(142, ' KEVIN ISAI', 'ORTIZ', 'SANCHEZ', '55-6672-6006', 'KevinOrtiz@denedig.online', '', '', 'KEVINORTIZ142', '123KevinOrtiz', 'TESI', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 1, '../documentos/142/Reglamento_142_ KEVIN ISAI ORTIZ SANCHEZ.pdf', 1, '../documentos/142/CONFIDENCIAL_142_ KEVIN ISAI ORTIZ SANCHEZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(162, ' LUCERO YOSELIN ', 'GONZALEZ', 'HERNANDEZ', '56-2431-3260', 'LuceroGonzalez@denedig.online', '', '', 'LUCEROGONZALEZ162', '123LuceroGonzalez', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/162/Reglamento_162_ LUCERO YOSELIN  GONZALEZ HERNANDEZ.pdf', 1, '../documentos/162/CONFIDENCIAL_162_ LUCERO YOSELIN  GONZALEZ HERNANDEZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(193, 'NELLY MONSERRAT', 'SANCHEZ ', 'MOGOLLAN', '55-1781-5209', 'NellySanchez@denedig.online', '', '', 'NELLYSANCHEZ193', '123NellySanchez', 'ETAC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Publicidad', 0, 0, 0, '../documentos/193/Reglamento_193_NELLY MONSERRAT SANCHEZ  MOGOLLAN.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(199, ' RAUL IVAN', 'MARTINEZ', 'VARGAS', '55-8221-0252', 'RaulMartinez@denedig.online', '', '', 'RAULMARTINEZ199', '123RaulMartinez', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(203, ' JAIR MISAEL ', 'MIRANDA', 'AGUIRRE', '55-8093-4728', 'JairMiranda@denedig.online', '', '', 'JAIRMIRANDA203', '123JairMiranda', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(205, ' DANIELA ALEJANDRA', 'GUZMAN', 'PERALTA', '55-2904-9460', 'DanielaGuzman@denedig.online', '', '', 'DANIELAGUZMAN205', '123DanielaGuzman', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Publicidad', 0, 0, 0, '../documentos/205/Reglamento_205_ DANIELA ALEJANDRA GUZMAN PERALTA.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(209, ' BRIZA DE MAR ', 'HERNÁNDEZ ', 'VALENCIA', '55-6337-2116', 'BrizaHernandez@denedig.online', '', '', 'BRIZAHERNANDEZ209', '123BrizaHernandez', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Publicidad', 0, 0, 0, '../documentos/209/Reglamento_209_ BRIZA DE MAR  HERNÁNDEZ  VALENCIA.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(210, ' BRYAN ALEXIS', 'CORTÉS', 'ARRIOLA', '56-3669-6358', 'BryanCortes@denedig.online', '', '', 'BRYANCORTES210', '123BryanCortes', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Publicidad', 0, 0, 0, '../documentos/210/Reglamento_210_ BRYAN ALEXIS CORTÉS ARRIOLA.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(212, ' CARMEN MARIANA', 'TOLEDO', 'HERNÁNDEZ', '55-6231-5130', 'CarmenToledo@denedig.online', '', '', 'CARMENTOLEDO212', '123CarmenToledo', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Publicidad', 0, 0, 0, '../documentos/212/Reglamento_212_ CARMEN MARIANA TOLEDO HERNÁNDEZ.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(214, ' BRANDON', 'SUÁREZ', 'SERVIN', '56-4521-5429', 'BrandonSuarez@denedig.online', '', '', 'BRANDONSUAREZ214', '123BrandonSuarez', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Publicidad', 0, 0, 0, '../documentos/214/Reglamento_214_ BRANDON SUÁREZ SERVIN.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(215, ' EDWIN ALFREDO', 'LÓPEZ', 'LÓPEZ', '55-3773-5921', 'EdwinLopez@denedig.online', '', '', 'EDWINLOPEZ215', '123EdwinLopez', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Publicidad', 0, 0, 0, '../documentos/215/Reglamento_215_ EDWIN ALFREDO LÓPEZ LÓPEZ.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(218, 'GALILEA ESTHER', 'FEREGRINO', 'CRUZ', '55-3225-9605', 'GalileaFeregrino@denedig.onine', '', '', 'GALILEAFEREGRINO218', '123GalileaFeregrino', 'ETAC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Publicidad', 0, 0, 1, '../documentos/218/Reglamento_218_GALILEA ESTHER FEREGRINO CRUZ.pdf', 1, '../documentos/218/CONFIDENCIAL_218_GALILEA ESTHER FEREGRINO CRUZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(219, ' VALENTINA', 'TORRES', 'REYES', '55-1007-0443', 'ValentinaTorres@denedig.online', '', '', 'VALENTINATORRES219', '123ValentinaTorres', 'ETAC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Publicidad', 0, 0, 1, '../documentos/219/Reglamento_219_ VALENTINA TORRES REYES.pdf', 1, '../documentos/219/CONFIDENCIAL_219_ VALENTINA TORRES REYES.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(220, ' EMMANUEL ', 'TRUJEQUE', 'ARRIOLA', '55 3158 4301', 'EmmanuelTrujeque@denedig.online', '', '', 'EMMANUELTRUJEQUE220', '123EmmanuelTrujeque', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '../documentos/220/Reglamento_220_ EMMANUEL  TRUJEQUE ARRIOLA.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(221, ' ASTRID ANAHÍ', 'GONZÁLEZ ', 'SALGADO', '55 1120 9665', 'AstridGonzalez@denedig.online', '', '', 'ASTRIDGONZALEZ221', '123AstridGonzalez', 'ETAC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Publicidad', 0, 0, 1, '../documentos/221/Reglamento_221_ ASTRID ANAHÍ GONZÁLEZ  SALGADO.pdf', 1, '../documentos/221/CONFIDENCIAL_221_ ASTRID ANAHÍ GONZÁLEZ  SALGADO.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(227, 'RENE', 'LOPEZ ', 'GUERRERO', '55-6767-5050', 'ReneLopez@denedig.online', '', '', 'RENELOPEZ277', '123ReneLopez', 'ETAC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Publicidad', 0, 0, 1, '../documentos/227/Reglamento_227_RENE LOPEZ  GUERRERO.pdf', 1, '../documentos/227/CONFIDENCIAL_227_RENE LOPEZ  GUERRERO.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(230, ' CARLOS DANIEL ', 'PÉREZ ', 'CAMPERO', '55-7361-6473', 'CarlosPerez@denedig.online', '', '', 'CARLOSPEREZ230', '123CarlosPerez', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '../documentos/230/Reglamento_230_ CARLOS DANIEL  PÉREZ  CAMPERO.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(231, ' JESUS ALDAYR', 'MATEOS', 'RAMIREZ', '56-2456-4882', 'JesusRamirez@denedig.online', '', '', 'JESUSRAMIREZ231', '123JesusRamirez', 'TESI', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 1, '../documentos/231/Reglamento_231_ JESUS ALDAYR MATEOS RAMIREZ.pdf', 1, '../documentos/231/CONFIDENCIAL_231_ JESUS ALDAYR MATEOS RAMIREZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(232, 'FÁTIMA', 'PÉREZ ', 'GODÍNEZ', '55-7852-7682', 'FatimaPerez@denedig.online', '', '', 'FATIMAPEREZ232', '123FatimaPerez', 'TESI', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/232/Reglamento_232_FÁTIMA PÉREZ  GODÍNEZ.pdf', 1, '../documentos/232/CONFIDENCIAL_232_FÁTIMA PÉREZ  GODÍNEZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(233, 'PAOLA', 'BARRIENTOS ', 'ESPARZA', '5578370144', 'PaolaBarrientos@denedig.online', '', '', 'PaolaBarrientos233', '123PaolaBarrientos', 'TESI', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 2, 'https://docs.google.com/spreadsheets/d/1L2CkmS-819FUdH-X0lk23dpQCT20BoQeVuv8yad2F1w/edit?usp=sharing', 0, 'Administracion', 0, 0, 0, '../documentos/233/Reglamento_233_PAOLA BARRIENTOS  ESPARZA.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(239, ' VÍCTOR DANIEL', 'RODRIGUEZ', 'LOPEZ', '55-7992-4921', 'VictorRodriguez@denedig.online', '', '', 'VICTORRODRIGUEZ239', '123VictorRodriguez', 'TESI', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '../documentos/239/Reglamento_239_ VÍCTOR DANIEL RODRIGUEZ LOPEZ.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(241, 'BRENDA NAYELLI', 'ANGELES', 'CARRERA', '+51941752269', 'BRENDAANGELES@DENEDIG.COM.ONLINE', '', '', '241BRENDAANGELES', '123BRENDAANGELES', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 2, 'https://docs.google.com/spreadsheets/d/1L2CkmS-819FUdH-X0lk23dpQCT20BoQeVuv8yad2F1w/edit?usp=sharing', 0, 'Administracion', 0, 0, 0, '../documentos/241/Reglamento_241_BRENDA NAYELLI ANGELES CARRERA.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(242, 'MARIA FERNANDA ', 'FRANCO ', 'MACEDO ', '5531420156', 'MariaFranco@denedig.online', '', '', '242MARIAFERNANDA ', 'MariaFranco242', 'TESI', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 2, 'https://docs.google.com/spreadsheets/d/1L2CkmS-819FUdH-X0lk23dpQCT20BoQeVuv8yad2F1w/edit?usp=sharing', 0, 'Administracion', 0, 0, 0, '../documentos/242/Reglamento_242_MARIA FERNANDA  FRANCO  MACEDO .pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(243, 'Oscar Villa', 'Gomez ', 'Ocampo', '55-1194-9965', 'OscarVillagomez@denedig.online', '', '', '123OscarVillagomez', '123OscarVillagomez', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/243/Reglamento_243_Oscar Villa Gomez  Ocampo.pdf', 1, '../documentos/243/CONFIDENCIAL_243_Oscar Villa Gomez  Ocampo.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(244, 'SAMMAEL ALEJANDRO', 'AVENDAÑO', 'ESPINOZA', '56-2518-5719', 'SammaelAvendano@denedig.online', '', '', 'SAMMAELAVENDAÑO244', '123SammaelAvendaño', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/244/Reglamento_244_SAMMAEL ALEJANDRO AVENDAÑO ESPINOZA.pdf', 1, '../documentos/244/CONFIDENCIAL_244_SAMMAEL ALEJANDRO AVENDAÑO ESPINOZA.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(247, 'BRANDON FERNANDO', 'RODRIGUEZ ', 'CRUZ', '55-3495-5525', 'BrandonRodriguez@denedig.online', '', '', 'BRANDONRODRIGUEZ247', '123BrandonRodriguez', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/247/Reglamento_247_BRANDON FERNANDO RODRIGUEZ  CRUZ.pdf', 1, '../documentos/247/CONFIDENCIAL_247_BRANDON FERNANDO RODRIGUEZ  CRUZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(248, 'ARNOLDO EMMANUEL', 'MARTINEZ', 'MARTINEZ', '55-1682-3473', 'ArnoldoMartinez@denedig.online', '', '', 'ARNOLDOMARTINEZ248', '123ArnoldoMartinez', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/248/Reglamento_248_ARNOLDO EMMANUEL MARTINEZ MARTINEZ.pdf', 1, '../documentos/248/CONFIDENCIAL_248_ARNOLDO EMMANUEL MARTINEZ MARTINEZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(249, 'VICTOR ANDRE', 'SANCHEZ', 'GARCÍA', '55-7938-0820', 'victorandre@gmail.com', '', '', 'VICTOR ANDRE', '123456', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 1, '../documentos/249/Reglamento_249_VICTOR ANDRE SANCHEZ GARCÍA.pdf', 1, '../documentos/249/CONFIDENCIAL_249_VICTOR ANDRE SANCHEZ GARCÍA.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(250, 'ROBERTO SANTIAGO', 'ORTEGA', 'MENDOZA', '56-1579-4128', 'RobertoOrtega@denedig.online', '', '', 'ROBERTOORTEGA250', '123RobertoOrtega', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/250/Reglamento_250_ROBERTO SANTIAGO ORTEGA MENDOZA.pdf', 1, '../documentos/250/CONFIDENCIAL_250_ROBERTO SANTIAGO ORTEGA MENDOZA.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(251, 'IAN AXEL', 'HERNANDEZ', 'ORTEGA', '33-3386-9390', 'IanHernandez@denedig.online', '', '', 'IANHERNANDEZ251', '123IanHernandez', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/251/Reglamento_251_IAN AXEL HERNANDEZ ORTEGA.pdf', 1, '../documentos/251/CONFIDENCIAL_251_IAN AXEL HERNANDEZ ORTEGA.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(252, ' LUIS ABRAHAM', 'PÉREZ ', 'SÁNCHEZ', '55- 5215 9281', 'LuisPerez@denedig.online', '', '', 'LUISPEREZ252', '123LuisPerez', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 1, '../documentos/252/Reglamento_252_ LUIS ABRAHAM PÉREZ  SÁNCHEZ.pdf', 1, '../documentos/252/CONFIDENCIAL_252_ LUIS ABRAHAM PÉREZ  SÁNCHEZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(253, ' JOSÉ EDUARDO', 'MIRANDA ', 'CASTILLO', '55-7471-7514', 'JoseMiranda@denedig.online', '', '', 'JOSEMIRANDA253', '123JoseMiranda', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '../documentos/253/Reglamento_253_ JOSÉ EDUARDO MIRANDA  CASTILLO.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(256, ' JOSE LEONARDO', 'GONZÁLEZ ', 'VALADEZ', '55-4236-0493', 'JoseGonzalez@denedig.online', '', '', 'JOSEGONZALEZ256', '123JoseGonzalez', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 1, '../documentos/256/Reglamento_256_ JOSE LEONARDO GONZÁLEZ  VALADEZ.pdf', 1, '../documentos/256/CONFIDENCIAL_256_ JOSE LEONARDO GONZÁLEZ  VALADEZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(257, ' DANIEL', 'FUENTES', 'CORTINA', '56-4140-7530', 'DanielFuentes@denedig.online', '', '', 'DANIELFUENTES257', '123DanielFuentes', 'TESI', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 1, '../documentos/257/Reglamento_257_ DANIEL FUENTES CORTINA.pdf', 1, '../documentos/257/CONFIDENCIAL_257_ DANIEL FUENTES CORTINA.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(258, 'SOFIA', 'OSUNA', 'TOVAR', '55-4789-8022', 'SofiaOsuna@denedig.online', '', '', 'SOFIAOSUNA258', '123SofiaOsuna', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/258/Reglamento_258_SOFIA OSUNA TOVAR.pdf', 1, '../documentos/258/CONFIDENCIAL_258_SOFIA OSUNA TOVAR.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(259, 'IVAN', 'LEON', 'PEREZ', '55-2469-9347', 'IvanLeon@denedig.online', '', '', 'IVANLEON259', '123IvanLeon', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/259/Reglamento_259_IVAN LEON PEREZ.pdf', 1, '../documentos/259/CONFIDENCIAL_259_IVAN LEON PEREZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(260, 'JUAN RODRIGO', 'BARAJAS', 'ORTIZ', '55-1695-5503', 'RodrigoBarajas@denedig.online', '', '', 'RODRIGOBARAJAS260', '123RodrigoBarajas', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(261, 'LEONARDO GABRIEL', 'SUAREZ', 'NEGRETE', '55-8152-3843', 'LEONARDOSUAREZ@DENEDIG.ONLINE', '', '', 'LEONARDOSUAREZ261', '123LEONARDOSUAREZ', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/261/Reglamento_261_LEONARDO GABRIEL SUAREZ NEGRETE.pdf', 1, '../documentos/261/CONFIDENCIAL_261_LEONARDO GABRIEL SUAREZ NEGRETE.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(262, 'MIKHAIL', 'YACAMAN', 'GORDOA', '55-7481-7974', 'YacamanCordoa@denedig.online', '', '', 'YACAMANCORDOA262', '123YacamanCordoa', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/262/Reglamento_262_MIKHAIL YACAMAN GORDOA.pdf', 1, '../documentos/262/CONFIDENCIAL_262_MIKHAIL YACAMAN GORDOA.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(263, 'SANTIAGO', 'MARTINEZ', 'DIAZ', '55-9186-4911', 'SantiagoMartinez@denedig.online', '', '', 'SANTIAGOMARTINEZ263', '123SantiagoMartinez', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/263/Reglamento_263_SANTIAGO MARTINEZ DIAZ.pdf', 1, '../documentos/263/CONFIDENCIAL_263_SANTIAGO MARTINEZ DIAZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(265, 'JAROD JOSUE', 'TREJO', 'CARREÑO', '56-3710-4706', 'JarodTrejo@denedig.online', '', '', 'JAROD JOSUE', '123JarodTrejo', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 2, 'https://docs.google.com/spreadsheets/d/1L2CkmS-819FUdH-X0lk23dpQCT20BoQeVuv8yad2F1w/edit?usp=sharing', 0, 'Administracion', 0, 0, 0, '../documentos/265/Reglamento_265_JAROD JOSUE TREJO CARREÑO.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(266, 'MARIANA', 'SORIANO', 'CHAVEZ', '55-7942-2480', 'MarianaSoriano@denedig.online', '', '', 'MARIANASORIANO266', '123MarianaSoriano', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/266/Reglamento_266_MARIANA SORIANO CHAVEZ.pdf', 1, '../documentos/266/CONFIDENCIAL_266_MARIANA SORIANO CHAVEZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(267, 'DAVID', 'CORONA', 'ALCOCER', '99 9748 1271', 'DavidCorona@denedig.online', '', '', 'DAVIDCORONA267', '123DavidCorona', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/267/Reglamento_267_DAVID CORONA ALCOCER.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(270, 'DANIELA', 'GARCIA', 'GONZALEZ', '96-1272-6494', 'DanielaGarcia@denedig.online', '', '', 'DANIELAGARCIA270', '123DanielaGarcia', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(272, 'Brian Martin ', 'Roman', 'Lopez', '4564564', 'brian@brian.com', '', '', 'BrianJefe operacione', '123456', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 1, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(275, 'EDGAR ALEJANDRO', 'CHAVEZ', 'DEL RIO', '55-1301-9256', 'EdgarChavez@denedig.online', '', '', 'EDGARCHAVEZ275', '123EdgarChavez', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(277, ' XIMENA  ', 'MARTINEZ', 'GUERRERO', '55-4489-7708', 'XimenaMartinez@denedig.online', '', '', 'XIMENAMARTINEZ227', '123XimenaMartinez', 'ETAC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Publicidad', 0, 0, 1, '../documentos/277/Reglamento_277_ XIMENA   MARTINEZ GUERRERO.pdf', 1, '../documentos/277/CONFIDENCIAL_277_ XIMENA   MARTINEZ GUERRERO.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(278, ' MAURICIO ALEJANDRO', 'LOPEZ ', 'HERNANDEZ', '56-4681-5461', 'MauricioLopez@denedig.online', '', '', 'MAURICIOLOPEZ278', '123MauricioLopez', 'TESI', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '../documentos/278/Reglamento_278_ MAURICIO ALEJANDRO LOPEZ  HERNANDEZ.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(279, ' RODRIGO', 'ROMERO', 'GARCIA', '56-3035-6524', 'RodrigoRomero@denedig.online', '', '', 'RODRIGOROMERO279', '123RodrigoRomero', 'TESI', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '../documentos/279/Reglamento_279_ RODRIGO ROMERO GARCIA.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(281, ' ADRIANA ', 'MARTÍNEZ', 'QUIRINO', '55-1851-7597', 'AdrianaMartinez@denedig.online', '', '', 'ADRIANAMARTINEZ281', '123AdrianaMartinez', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Publicidad', 0, 0, 0, '../documentos/281/Reglamento_281_ ADRIANA  MARTÍNEZ QUIRINO.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(282, 'IVAN ', 'PANIAGUA ', 'MALDONADO', '55-8033-5774', 'IvanPaniagua@denedig.online', '', '', 'IVANPANIAGUA282', '123IvanPaniagua', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/282/Reglamento_282_IVAN  PANIAGUA  MALDONADO.pdf', 1, '../documentos/282/CONFIDENCIAL_282_IVAN  PANIAGUA  MALDONADO.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(284, 'Susana Paola', 'Juárez', 'Salazar', '55-7801-0717', 'SusanaJuarez284@gmail.com', '', '', 'SusanaJuarez284', 'susana123', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 1, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(285, 'Gabriel ', 'Meza ', 'Gonzalez', '55-7801-0717', 'GabrielMeza285@gmail.com', '', '', 'Gabriel Meza Gonzale', 'gabriel123', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 1, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(287, ' TOBÍAS ARMANDO', 'GUTIERREZ ', 'SALINAS', '56-3811-8088', 'TobiasGutierrez@denedig.online', '', '', 'TOBIASGUTIERREZ287', '123TobiasGutierrez', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(288, ' LUIS RICARDO', 'CALDERON', 'RIOS', '55-3931-3521', 'LuisCalderon@denedig.online', '', '', 'LUISCALDERON288', '123LuisCalderon', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '../documentos/288/Reglamento_288_ LUIS RICARDO CALDERON RIOS.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(291, 'RAFAEL', 'RIVERA', 'AGUILAR', '55-7268-0809', 'RAFAELAGUILAR@DENEDIG.ONLINE', '', '', 'RAFAELAGUILAR291', '123RAFAELAGUILAR', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(293, 'JOSE GERARDO', 'RUIZ', 'AVILA', '55-1755-1414', 'JOSERUIZ@DENEDIG.ONLINE', '', '', 'JOSERUIZ293', '123JOSERUIZ', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/293/Reglamento_293_JOSE GERARDO RUIZ AVILA.pdf', 1, '../documentos/293/CONFIDENCIAL_293_JOSE GERARDO RUIZ AVILA.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(294, 'EDWIN YAHIR', 'MARQUEZ', 'ROMANO', '55-2424-3305', 'EDWINMARQUEZ@DENEDIG.ONLINE', '', '', 'EDWINMARQUEZ294', '123EDWINMARQUEZ', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(296, 'CARLOS DANIEL', 'PEREA', 'BLAS', '55-8205-7516', 'CARLOSPEREA@DENEDIG.ONLINE', '', '', 'CARLOSPEREA296', '123CARLOSPEREA', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/296/Reglamento_296_CARLOS DANIEL PEREA BLAS.pdf', 1, '../documentos/296/CONFIDENCIAL_296_CARLOS DANIEL PEREA BLAS.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(297, 'MAXIMILIANO', 'TREJO ', 'CRISTINO', '55-7498-8007', 'MAXIMILIANOTREJO@DENEDIG.ONLINE', '', '', 'MAIMILIANOTREJO297', '123MAXIMILIANOTREJO', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/297/Reglamento_297_MAXIMILIANO TREJO  CRISTINO.pdf', 1, '../documentos/297/CONFIDENCIAL_297_MAXIMILIANO TREJO  CRISTINO.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(298, 'CHRISTIAN LEONEL', 'MONTIEL', 'FERNANDEZ', '55-7485-5626', 'CHRISTIANMONTIEL@DENEDIG.ONLINE', '', '', 'CHRISTIANMONTIEL298', '123CHRISTIANMONTIEL', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(299, 'LEONARDO DANIEL', 'D OLARTE', 'GOMEZ', '55-4449-3868', 'LEONARDOGOMEZ@DENEDIG.ONLINE', '', '', 'LEONARDOGOMEZ299', '123LEONARDOGOMEZ', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/299/Reglamento_299_LEONARDO DANIEL D OLARTE GOMEZ.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(300, 'DIANA JAQUELINE', 'BACA ', 'MONTERO', '55-4208-7494', 'DIANABACA@DENEDIG.ONLINE', '', '', 'DIANABACA300', '123DIANABACA', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/300/Reglamento_300_DIANA JAQUELINE BACA  MONTERO.pdf', 1, '../documentos/300/CONFIDENCIAL_300_DIANA JAQUELINE BACA  MONTERO.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(301, 'CHRISTIAN DAVID', 'CORTES', 'PIZANO', '5630549212', 'CHRISTIANCORTES@DENEDIG.ONLINE', '', 'Imagen de WhatsApp 2024-07-31 a las 14.22.58_6ed55763.jpg', 'CHRISTIANCORTES301', '123CHRISTIANCORTES', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/301/Reglamento_301_CHRISTIAN DAVID CORTES PIZANO.pdf', 1, '../documentos/301/CONFIDENCIAL_301_CHRISTIAN DAVID CORTES PIZANO.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(302, 'CUAUHTEMOC', 'VIDAL', 'LANDIN', '55-2232-3553', 'CUAUHTEMOCVIDAL@DENEDIG.ONLINE', '', '', 'CUAUHTEMOCVIDAL302', '123CUAUHTEMOCVIDAL', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/302/Reglamento_302_CUAUHTEMOC VIDAL LANDIN.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(303, 'LUS ALONSO', 'MARTINEZ', 'TORRES', '56-3301-7833', 'LUISMARTINEZ@DENEDIG.ONLINE', '', '', 'LUISMARTINEZ303', '123LUISMARTINEZ', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/303/Reglamento_303_LUS ALONSO MARTINEZ TORRES.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(304, 'SAID JAEL', 'GUTIERREZ ', 'MARTINEZ', '55-3545-8821', 'SAIDGUITIERREZ@DENEDIG.ONLINE', '', '', 'SAIDGUITIERREZ304', '123SAIDGUITIERREZ', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/304/Reglamento_304_SAID JAEL GUTIERREZ  MARTINEZ.pdf', 1, '../documentos/304/CONFIDENCIAL_304_SAID JAEL GUTIERREZ  MARTINEZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(305, 'ZAIRA JAZMIN', 'INIESTRA', 'PEÑA', '55-6441-1806', 'ZAIRAINIESTRA@DENEDIG.ONLINE', '', '', 'ZAIRAINIESTRA305', '123ZAIRAINIESTRA', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(306, 'FERNANDO', 'VELAZQUEZ', 'CASTAÑEDA', '56-4702-4736', 'FERNANDOVELAZQUEZ@DENEDIG.ONLINE', '', '', 'FERNANDOVELAZQUEZ306', '123FERNANDOVELAZQUEZ', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/306/Reglamento_306_FERNANDO VELAZQUEZ CASTAÑEDA.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(308, 'SERGIO', 'ITURBIDE', 'SALAZAR', '56-4702-4535', 'SERGIOITURBIDE@DENEDIG.ONLINE', '', '', 'SERGIOITURBIDE308', '123SERGIOITURBIDE', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(309, 'IRIDIAN ZULEMA', 'ESPINOZA', 'MONTES DE OCA', '55-2698-0511', 'IRIDIANESPINOZA@DENEDIG.ONLINE', '', '', 'IRIDIANESPINOZA309', '123IRIDIANESPINOZA', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(310, 'EDGAR ADAN', 'DIAZ', 'DE LA TORRE', '56-1933-4959', 'EDGARDIAZ@DENEDIG.ONLINE', '', '', 'EDGARDIAZ310', '123EDGARDIAZ', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(312, 'IRVIN ALBERTO', 'MORENO', 'CRUZ', '56-1680-4707', 'IRVINMORENO@DENEDIG.ONLINE', '', '', 'IRVINMORENO312', '123IRVINMORENO', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(314, 'BRANDON', 'PEDRAZA', 'MAYA', '55-2138-8384', 'BRANDOPEDRAZA@DENEDIG.ONLINE', '', '', 'BRANDOPEDRAZA314', '123BRANDOPEDRAZA', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(315, 'LUIS ANDRES', 'CASTAÑEDA', 'RIVERA', '55-3012-5820', 'LUISCASTANEDA@DENEDIG.ONLINE', '', '', 'LUISCASTAÑEDA315', '123LUISCASTAÑEDA', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/315/Reglamento_315_LUIS ANDRES CASTAÑEDA RIVERA.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(317, 'ABIGAIL MONSERRAT', 'ROSAS', 'RODRIGUEZ', '55-3829-0736', 'ABIGAILROSAS@DENEDIG.ONLINE', '', '', 'ABIGAILROSAS317', '123ABIGAILROSAS', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(318, 'JOSE ARMANDO', 'DAGANTE', 'ARAGON', '55-7716-3109', 'JOSEDAGANTE@DENEDIG.ONLINE', '', '', 'JOSEDAGANTE318', '123JOSEDAGANTE', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(319, 'EDITH', 'NAVA', 'VELAZQUEZ', '56-1948-0820', 'EDITHNAVA@DENEDIG.ONLINE', '', '', 'EDITHNAVA319', '123EDITHNAVA', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/319/Reglamento_319_EDITH NAVA VELAZQUEZ.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(320, 'MARIBEL', 'JUAREZ ', 'DIAZ', '5529721755', 'MARIBELJUAREZ@DENEDIG.ONLINE', '', 'Foto_JuárezDíazMaribel.jpg', 'MARIBELJUAREZ320', '123MARIBELJUAREZ', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(321, 'LILIANA', 'PERALTA', 'HERNANDEZ', '55-1751-4412', 'LILIANAPERALTA@DENEDIG.ONLINE', '', '', 'LILIANAPERALTA321', '123LILIANAPERALTA', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/321/Reglamento_321_LILIANA PERALTA HERNANDEZ.pdf', 1, '../documentos/321/CONFIDENCIAL_321_LILIANA PERALTA HERNANDEZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(324, 'NADIA VERONICA', 'BAEZ', 'LOPEZ', '55-3788-0345', 'NADIABAEZ@DENEDIG.ONLINE', '', '', 'NADIABAEZ324', '123NADIABAEZ', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/324/Reglamento_324_NADIA VERONICA BAEZ LOPEZ.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(325, 'KARINA ESTELA', 'MARTINEZ', 'ALBARRAN CORONEL', '55-8516-0036', 'KARINAMARTINEZ@DENEDIG.ONLINE', '', '', 'KARINAMARTINEZ325', '123KARINAMARTINEZ', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/325/Reglamento_325_KARINA ESTELA MARTINEZ ALBARRAN CORONEL.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(326, 'CLAUDIA', 'ALVARADO', 'PEREZ', '55-8516-0036', 'CLAUDIAALVARADO@DENEDIG.ONLINE', '', '', 'CLAUDIAALVARADO326', '123CLAUDIAALVARADO', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(327, 'JESUS ', 'SUAREZ', 'AGIS', '55-4489-3715', 'JESUSAGIS@DENEDIG.ONLINE', '', '', 'JESUSAGIS327', '123JESUSAGIS', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(328, 'JESUS OMAR', 'ÁVILA', 'VÁZQUEZ', '5621056620', 'OmarAvila@denedig.online', '', '', 'OmarAvila328', '123OMARAVILA', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(329, 'FATIMA ', 'VALDEZ ', 'MANDUJANO', '5610945377', 'FatimaValdez@denedig.online', '', '', 'FatimaValdez329', '123FatimaValdez', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Publicidad', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(330, 'MIGUEL ANGEL', 'RUIZ', 'SANCHEZ', '5571665955', 'MiguelRuiz@denedig.online', '', 'Imagen_RuizSanchezMiguelAngel.pdf.pdf', 'MIGUELRUIZ330', '123MiguelRuiz', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/330/Reglamento_330_MIGUEL ANGEL RUIZ SANCHEZ.pdf', 1, '../documentos/330/CONFIDENCIAL_330_MIGUEL ANGEL RUIZ SANCHEZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(331, 'JESSICA VIRIDIANA', 'GARCIA', 'SILVA', '55-1286-7410', 'JESSICAGARCIA@DENEDING.ONLINE', '', '', 'JESSICAGARCIA', '123JESSICAGARCIA', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 1, '../documentos/331/Reglamento_331_JESSICA VIRIDIANA GARCIA SILVA.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(332, 'GUADALUPE', 'LOPEZ', 'SALAZAR', '55- 4826-1102', 'GUADALUPELOPEZ@DENEDING.ONLINE', '', '', 'GUADALUPELOPEZ332', '123GUADALUPELOPEZ', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(333, 'ADRIÁN MICHEL', 'LÓPEZ', 'FLORES', '52 55 6165-5423', 'ADRIANLOPEZ@DENEDING.ONLINE', '', '', 'ADRIÁNLÓPEZ333', '123ADRIÁNLÓPEZ', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 1, '../documentos/333/Reglamento_333_ADRIÁN MICHEL LÓPEZ FLORES.pdf', 1, '../documentos/333/CONFIDENCIAL_333_ADRIÁN MICHEL LÓPEZ FLORES.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(334, 'HECTOR DANIEL', 'MUÑOZ', 'HUIZAR', '3327656145', 'HECTORMUNOZ@DENEDIG.ONLINE', '', '', 'HECTORMUÑOZ324', '123HECTORMUÑOZ', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 1, '../documentos/334/Reglamento_334_HECTOR DANIEL MUÑOZ HUIZAR.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(335, 'VALERIA', 'GALLARDO', 'CORTES', '5511374774', 'VALERIAGALLARDO@DENEDIG.ONLINE', '', '', 'VALERIAGALLARDO335', '123VALERIAGALLARDO', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(336, ' JOSE ARMANDO ', 'DEGANTE ', 'ARAGÓN', '55-7716-3109', 'JOSEDEGANTE@DENEDIG.ONLINE', '', '', 'JOSEDEGANTE336', '123JOSEDEGANTE', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/336/Reglamento_336_ JOSE ARMANDO  DEGANTE  ARAGÓN.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(337, ' ERICK SALVADOR ', 'RODRÍGUEZ ', 'GARCÍA ', '55- 6901-3638', 'ERICKRODRIGUEZ@DENEDING.ONLINE', '', '', ' ERICKRODRÍGUEZ337 ', '123 ERICKRODRÍGUEZ', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/337/Reglamento_337_ ERICK SALVADOR  RODRÍGUEZ  GARCÍA .pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(338, '  CARLOS EDUARDO ', 'GARCIA ', 'NÁJERA', '55- 7462-9977', 'CARLOSGARCIA@DENEDING.ONLINE', '', '', '  CARLOSGARCIA338 ', '123CARLOSGARCIA', 'UTN', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 1, '../documentos/338/Reglamento_338_  CARLOS EDUARDO  GARCIA  NÁJERA.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(339, 'DAN LEONARDO', 'VILLA', 'ROBLEDO', '5636176459', 'DANVILLA@DENEDING.ONLINE', '', '', 'DANVILLA339', '123DANVILLA', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 1, '../documentos/339/Reglamento_339_DAN LEONARDO VILLA ROBLEDO.pdf', 1, '../documentos/339/CONFIDENCIAL_339_DAN LEONARDO VILLA ROBLEDO.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(340, 'BRENDA SARAI', 'GARCIA', 'ESTRADA', '56-1750-5335', 'BRENDAGARCIA@DENEDIG.ONLINE', '', '', 'BRENDAGARCIA340', '123BRENDAGARCIA', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/340/Reglamento_340_BRENDA SARAI GARCIA ESTRADA.pdf', 1, '../documentos/340/CONFIDENCIAL_340_BRENDA SARAI GARCIA ESTRADA.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(342, 'RICARDO PATRICIO ', 'PEREZ ', 'MAGINNISS', '33 1546 0376', 'RICARDOPEREZ@DENEDIG.ONLINE', '', '', 'RICARDOPEREZ342', '123RICARDOPEREZ', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/342/Reglamento_342_RICARDO PATRICIO  PEREZ  MAGINNISS.pdf', 1, '../documentos/342/CONFIDENCIAL_342_RICARDO PATRICIO  PEREZ  MAGINNISS.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(343, 'CARLOS EDUARDO', 'GUTIERREZ', 'RIOS', '33 2394 3966', 'CARLOSGUTIERREZ@DENEDIG.ONLINE', '', '', 'CARLOSGUTIERREZ343', '123CARLOSGUTIERREZ', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/343/Reglamento_343_CARLOS EDUARDO GUTIERREZ RIOS.pdf', 1, '../documentos/343/CONFIDENCIAL_343_CARLOS EDUARDO GUTIERREZ RIOS.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(344, 'MAURICIO', 'RODRIGUEZ', 'DIAZ', '55 4460 5859', 'MAURICIORODRIGUEZ@DENEDIG.ONLINE', '', '', 'MAURICIORODRIGUEZ344', '123MAURICIORODRIGUEZ', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/344/Reglamento_344_MAURICIO RODRIGUEZ DIAZ.pdf', 1, '../documentos/344/CONFIDENCIAL_344_MAURICIO RODRIGUEZ DIAZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(345, 'OSCAR JESUS', 'JIMENEZ ', 'VALENCIA', '123OSCARJIMENEZ', 'OSCARJIMENEZ@DENEDING.ONLINE', '', '', 'OSCARJIMENEZ345', '123OSCARJIMENEZ', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(346, 'MONTSERRAT', 'PERÉZ', 'ARRIAGA', '55 1502 8976 ', 'MONTSERRATPEREZ@DENEDIG.ONLINE', '', '', 'MONTSERRATPEREZ346', '123MONTSERRATPEREZ', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/346/Reglamento_346_MONTSERRAT PERÉZ ARRIAGA.pdf', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(347, 'GIOVANNI', 'PALACIOS', 'CENTENO', '55 7122 5012', 'GIOVANNIPALACIOS@DENEDIG.ONLINE', '', '', 'GIOVANNIPALACIOS347', '123GIOVANNIPALACIOS', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(348, 'BRYAN HERNÁNDEZ LÓPEZ', ' HERNÁNDEZ LÓPEZ', 'LÓPEZ', '55 8482 6430', 'BRYANHERNANDEZ@DENEDIG.ONLINE', '', '', 'BRYANHERNÁNDEZ348', '123BRYANHERNÁNDEZ', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/348/Reglamento_348_BRYAN HERNÁNDEZ LÓPEZ  HERNÁNDEZ LÓPEZ LÓPEZ.pdf', 1, '../documentos/348/CONFIDENCIAL_348_BRYAN HERNÁNDEZ LÓPEZ  HERNÁNDEZ LÓPEZ LÓPEZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(349, 'ABDALA', 'SERAFIN', 'MANZANO', '55 5456 2169', 'ABDALASERAFIN@DENEDIG.ONLINE', '', '', 'ABDALASERAFIN349', '123ABDALASERAFIN', 'AMERIKE', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(350, 'JENNIFER', 'ALCANTARA', 'LOPEZ', '12', 'JENNIFERALCANTARA@DENEDIG.ONLINE', '', '', 'JENNIFERALCANTARA350', '123JENNIFERALCANTARA', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 2, '	https://docs.google.com/spreadsheets/d/1dBnHRtA5gJWjSCTOQBU8BH2DetRrlUEbJB9iFY2YFYU/edit?usp=sharing', 0, 'Diseño', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(351, 'INGRID', 'NUÑEZ', 'PRIEGO', '56 3109 2883', 'INGRIDNUNEZ@DENEDIG.ONLINE', '', '', 'INGRIDNUÑEZ351', '123INGRIDNUÑEZ', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Administracion', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(352, 'AARON', 'ORTIZ', 'RIVERA', '55 2558 9934', 'AARONORTIZ@DENEDIG.ONLINE', '', '', 'AARONORTIZ352', '123AARONORTIZ', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 2, 'https://docs.google.com/spreadsheets/d/1L2CkmS-819FUdH-X0lk23dpQCT20BoQeVuv8yad2F1w/edit?usp=sharing', 0, 'Administracion', 0, 0, 1, '../documentos/352/Reglamento_352_AARON ORTIZ RIVERA.pdf', 1, '../documentos/352/CONFIDENCIAL_352_AARON ORTIZ RIVERA.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(353, 'BRANDON URIEL', 'BLANCO', 'DAVILA', '52-56-48-80-98-19', 'BRANDONBLANCO353@DENEDIG.ONLINE', '', '', 'BRANDONBLANCO353', '123BRANDONBLANCO', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 1, '../documentos/353/CONFIDENCIAL_353_BRANDON URIEL BLANCO DAVILA.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(354, 'ALAYA JATCE', 'SERRANO', 'LICEA', '55 3406 8472', 'ALAYASERRANO@DENEDIG.ONLINE', '', '', 'ALAYASERRANO354', '123ALAYASERRANO', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/354/Reglamento_354_ALAYA JATCE SERRANO LICEA.zip', 1, '../documentos/354/CONFIDENCIAL_354_ALAYA JATCE SERRANO LICEA.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(355, 'VALERIA PERLA', 'SANTIAGO', 'LÓPEZ', '56 1447 3183', 'VALERIASANTIAGO@DENEDIG.ONLINE', '', '', 'VALERIASANTIAGO355', '123VALERIASANTIAGO', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(356, 'MICHELLE ABIGAI', 'RODRIGUEZ', 'VAZQUEZ', '55 3162 6807', 'MICHELLERODRIGUEZ@DENEDIG.ONLINE', '', '', 'MICHELLERODRIGUEZ356', '123MICHELLERODRIGUEZ', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Diseño', 0, 0, 1, '../documentos/356/Reglamento_356_MICHELLE ABIGAI RODRIGUEZ VAZQUEZ.pdf', 1, '../documentos/356/CONFIDENCIAL_356_MICHELLE ABIGAI RODRIGUEZ VAZQUEZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL);
INSERT INTO `usuarios` (`id_usuario`, `nombre`, `paterno`, `materno`, `telefono`, `correo`, `correo_personal`, `imagen`, `nom_usuario`, `contraseña`, `escuela`, `carrera`, `matricula`, `prestacion`, `horario`, `periodo`, `proyecto`, `actividades`, `lider`, `semestre`, `aceptacion`, `termino`, `aut_termino`, `tipo_usuario`, `nivel_usuario`, `link_seguimiento`, `Grupo_asesor`, `departamento`, `N_departamento`, `N_grupo`, `reglamento`, `reglamento_link`, `CONFIDENCIAL`, `CONFIDENCIAL_LINK`, `id_horario`, `horas_asignadas`, `horas_cumplidas`, `horas_restantes`, `evaluacion`, `colega_activo`, `cv`, `fecha_postulante`, `solicitud`, `puesto`, `estatus`) VALUES
(357, 'JUDITH METABEL', 'RAMALES', 'LOPEZ', '56 5230 9911', 'JUDITHRAMALES@DENEDIG.ONLINE', '', '', 'JUDITHRAMALES357', '123JUDITHRAMALES', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(360, 'ELIER', 'PÉREZ', 'GONZÁLEZ', '55 4965 0013', 'ELIERPEREZ@DENEDIG.ONLINE', '', '', 'ELIERPÉREZ360', '123ELIERPÉREZ', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(361, 'DIANA ELISA', 'MORALES', 'FRAGOSO', '55 6466 4155', 'DIANAMORALES@DENEDIG.ONLINE', '', '', 'DIANAMORALES361', '123DIANAMORALES', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(362, 'MARISOL', 'GONZÁLEZ', 'SALAZAR', '55 4546 4944', 'MARISOLGOLZALEZ@DENEDIG.ONLINE', '', '', 'MARISOLGOLZALEZ362', '123MARISOLGOLZALEZ', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(363, 'MIGUEL ISSAC', 'GONZALEZ', 'MARTINEZ', '55 9170 1865', 'MIGUELGONZALES@DENEDIG.ONLINE', '', '', 'MIGUELGONZALEZ363', '123MIGUELGONZALEZ', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(365, 'MARIELA', 'SANCHEZ', 'CRUZ', '646270591', 'MARIELASANCHEZ@DENEDIG.ONLINE', '', '', 'MARIELASANCHEZ365', '123MARIELASANCHEZ', 'UAD', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Administracion', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(366, 'DULCE JAZMÍN ', 'VERA', 'DIEGO', '55 1535 0171', 'DULCEVERA@DENEDIG.ONLINE', '', '', 'DULCEVERA366', '123DULCEVERA', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(367, 'SERGIO DANIEL', 'MARTÍNEZ', 'TORAL', '55 6816 4334', 'SERGIOTORAL@DENEDIG.ONLINE', '', '', 'SERGIOTORAL367', '123SERGIOTORAL', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(369, 'JACQUELINE IVETH', 'HERNANDEZ', 'BAUTISTA ', '55 7682 7420', 'JACQUELINEHERNANDEZ@DENEDIG.ONLINE', '', '', 'JACQUELINEHERNANDEZ3', '123JACQUELINEHERNANDEZ', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 1, '../documentos/369/Reglamento_369_JACQUELINE IVETH HERNANDEZ BAUTISTA .pdf', 1, '../documentos/369/CONFIDENCIAL_369_JACQUELINE IVETH HERNANDEZ BAUTISTA .pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(370, 'Vazquez', 'Delgado', 'Rocio', '449 313 7243', 'ROCIODELGADO@DENEDIG.ONLINE', '', '', 'ROCIODELGADO370', '123ROCIODELGADO', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, '', 3, '', 0, 'Administracion', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(371, 'Medellín Guillen', 'Pamela', 'Lizbeth', '496 149 4119', 'PAMELAGUILLEN@DENEDIG.ONLINE', '', '', 'PAMELAGUILLEN371', '123PAMELAGUILLEN', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, '', 3, '', 0, 'Administracion', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(372, 'Rodríguez', 'Flores', 'Esmeralda', '449 349 9148', 'ESMERALDAFLORES@DENEDIG.ONLINE', '', '', 'ESMERALDAFLORES372', '123ESMERALDAFLORES', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, '', 3, '', 0, 'Administracion', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(373, 'Cynthia Lisbeth', 'Hernández', 'Plascencia', '44 9429 5729', 'CYNTHIAPLASCENCIA@DENEDIG.ONLINE', '', '', 'CYNTHIAPLASCENCIA373', '123CYNTHIAPLASCENCIA', 'UAD', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Administracion', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(374, 'Christopher Sergio', 'Davalos', 'González', '55 8707 5162', 'CHRISTOPHERGONZALEZ@DENEDIG.ONLINE', '', '', 'CHRISTOPHERGONZALEZ3', '123CHRISTOPHERGONZALEZ', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(375, 'Fernanda Paola', 'Carreón', 'Valadez', '44 9586 0409', 'FERNANDAVALADEZ@DENEDIG.ONLINE', '', '', 'FERNANDAVALADEZ375', '123FERNANDAVALADEZ', 'UAD', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Administracion', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(376, 'Gabriela', 'Castro', 'Cadena', '56 2163 2981', 'GABRIELACASTRO@DENEDIG.ONLINE', '', '', 'GABRIELACASTRO376', '123GABRIELACASTRO', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Administracion', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(377, 'Martinez Roa', 'Edith', 'Romina', '56 1276 0334', 'ROMINAMARTINEZ@DENEDIG.ONLINE', '', '', 'ROMINAMARTINEZ377', '123ROMINAMARTINEZ', 'UTC', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Administracion', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(378, 'MARITZA ELIZABETH', 'BALDERAS', 'VELEZ ', '55 8704 7963', 'MARITZAVELEZ@DENEDIG.ONLINE', '', '', 'MARITZAVELEZ378', '123MARITZAVELEZ', 'TESI', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Administracion', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(379, 'JOSHUA', 'HERNANDEZ', 'PAOLY', '55 6131 8750', 'JOSHUAPAOLY@DENEDIG.ONLINE', '', '', 'JOSHUAPAOLY379', '123JOSHUAPAOLY', 'TESI', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(380, 'SANDRA', 'SANTIAGO', 'ORTEGA', '55 6411 5881', 'SANDRAORTEGA@DENEDIG.ONLINE', '', '', 'SANDRAORTEGA380', '123SANDRAORTEGA', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Administracion', 0, 0, 0, '', 0, '', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL),
(381, 'ANGEL ALEXIS', 'FUENTES', 'GOMEZ', '56 1093 9674', 'ANGELGOMEZ@DENEDIG.ONLINE', '', '', 'ANGELGOMEZ381', '123ANGELGOMEZ', 'TESOEM', '', '', '', '', '', '', '', '', '', '', '', 0, 'colega', 3, '', 0, 'Ingenieria', 0, 0, 0, '', 1, '../documentos/381/CONFIDENCIAL_381_ANGEL ALEXIS FUENTES GOMEZ.pdf', 0, 0, 0, 0, NULL, NULL, NULL, '0000-00-00', NULL, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `validacion_horario`
--

CREATE TABLE `validacion_horario` (
  `id_validacion` int(11) NOT NULL,
  `fecha_dia` varchar(500) NOT NULL,
  `fecha_semana` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `resultado` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `buzon`
--
ALTER TABLE `buzon`
  ADD PRIMARY KEY (`id_buzon`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `contador`
--
ALTER TABLE `contador`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `Departamentos`
--
ALTER TABLE `Departamentos`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `Documentos`
--
ALTER TABLE `Documentos`
  ADD PRIMARY KEY (`id_documentos`),
  ADD KEY `id_usuario_fk` (`id_usuario`);

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`id_evaluaciones`),
  ADD KEY `fk_usuario` (`id_usuario`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `interesados_convenios`
--
ALTER TABLE `interesados_convenios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_horario`
--
ALTER TABLE `registro_horario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sub_sectores`
--
ALTER TABLE `sub_sectores`
  ADD PRIMARY KEY (`id_subsector`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `validacion_horario`
--
ALTER TABLE `validacion_horario`
  ADD PRIMARY KEY (`id_validacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `buzon`
--
ALTER TABLE `buzon`
  MODIFY `id_buzon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `id_evaluaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `interesados_convenios`
--
ALTER TABLE `interesados_convenios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sub_sectores`
--
ALTER TABLE `sub_sectores`
  MODIFY `id_subsector` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD CONSTRAINT `evaluaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
