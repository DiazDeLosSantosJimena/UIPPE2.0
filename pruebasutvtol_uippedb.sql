-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-07-2024 a las 18:36:23
-- Versión del servidor: 5.7.41
-- Versión de PHP: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebasutvtol_uippedb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_04_000248_tb_tipos', 1),
(6, '2023_03_04_000541_tb_usuarios', 1),
(7, '2023_03_08_035611_tb_areas', 1),
(8, '2023_03_08_040229_tb_programas', 1),
(9, '2023_03_08_040306_tb_metas', 1),
(10, '2023_03_08_040814_tb_areasusuarios', 1),
(11, '2023_03_08_041215_tb_areasmetas', 1),
(12, '2023_04_22_222042_tb_correo', 1),
(13, '2023_04_28_194222_tb_meses', 1),
(14, '2023_04_28_194404_tb_calendarizars', 1),
(15, '2023_05_31_133222_tb_entregas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_areas`
--

CREATE TABLE `tb_areas` (
  `id_area` int(10) UNSIGNED NOT NULL,
  `clave` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_areas`
--

INSERT INTO `tb_areas` (`id_area`, `clave`, `nombre`, `descripcion`, `foto`, `activo`, `id_registro`, `created_at`, `updated_at`) VALUES
(1, 'ARE1', 'Abogado General', 'Abogado General', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(2, 'ARE2', 'Órgano Interno de Control', 'Organo Interno De Control', 'cuervo.png', 1, 2, '2024-03-06 18:04:16', '2024-04-25 16:24:15'),
(3, 'ARE3', 'Unidad De Información, Planeación, Programación  y Evaluación', 'UIPPE', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(4, 'ARE4', 'Secretaria Académica', 'Secretaria Académica', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(5, 'ARE5', 'Desarrollo y Fortalecimiento Académico', 'Desarrollo y Fortalecimiento Académico', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(6, 'ARE6', 'Secretaria de Vinculación', 'Secretaria de Vinculación', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(7, 'ARE7', 'Subdirección de Proyectos de Vinculación', 'Subdirección de Proyectos de Vinculación', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(8, 'ARE8', 'Departamento de Servicios Tecnológicos', 'Departamento de Servicios Tecnológicos', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(9, 'ARE9', 'Departamento de Desempeño a Egresados', 'Departamento de Desempeño a Egresados', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(10, 'ARE10', 'Centro de Desarrollo de Negocios/Centro de Protección de Invenciones y Marcas', 'CEPIMUTVTOL', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(11, 'ARE11', 'Coordinación de la Entidad de Certificación y Evaluación', 'CONOCER', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(12, 'ARE12', 'Dirección de Difusión y Extensión Universitaria', 'Dirección de Difusión y Extensión Universitaria', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(13, 'ARE13', 'Departamento de Actividades Culturales y Deportivas', 'Departamento de Actividades Culturales y Deportivas', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(14, 'ARE14', 'Departamento de Prensa y Difusión', 'Departamento de Prensa y Difusión', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(15, 'ARE15', 'Departamento de Educación Continua', 'Departamento de Educación Continua', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(16, 'ARE16', 'Departamento de Administración y Finanzas', 'Departamento de Administración y Finanzas', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(17, 'ARE17', 'Departamento de Recursos Humanos', 'Departamento de Recursos Humanos', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(18, 'ARE18', 'Departamento de Recursos Materiales', 'Departamento de Recursos Materiales', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(19, 'ARE19', 'Departamento de Mantenimiento y Servicios Generales', 'Departamento de Mantenimiento y Servicios Generales', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(20, 'ARE20', 'Departamento de Sistemas', 'Departamento de Sistemas', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16'),
(21, 'ARE21', 'Subdirección de Finanzas', 'Subdirección de Finanzas', 'cuervo.png', 1, 1, '2024-03-06 18:04:16', '2024-03-06 18:04:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_areasmetas`
--

CREATE TABLE `tb_areasmetas` (
  `id_areasmetas` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `meta_id` int(10) UNSIGNED NOT NULL,
  `id_programa` int(10) UNSIGNED NOT NULL,
  `objetivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_areasmetas`
--

INSERT INTO `tb_areasmetas` (`id_areasmetas`, `area_id`, `meta_id`, `id_programa`, `objetivo`, `id_registro`, `created_at`, `updated_at`) VALUES
(8, 3, 56, 3, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(9, 3, 57, 3, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(10, 3, 58, 3, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(12, 3, 60, 3, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(13, 3, 61, 3, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(14, 3, 62, 3, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(15, 3, 63, 3, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(16, 3, 64, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(17, 3, 65, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(18, 3, 66, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(19, 3, 67, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(21, 3, 69, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(22, 3, 70, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(23, 3, 71, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(24, 3, 72, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(25, 3, 73, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(26, 3, 74, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(27, 3, 75, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(28, 3, 76, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(29, 3, 77, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(30, 3, 78, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(31, 3, 79, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(32, 3, 80, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(33, 3, 81, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(35, 3, 83, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(36, 3, 84, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(37, 3, 85, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(38, 3, 86, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(39, 3, 87, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(40, 3, 88, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(41, 3, 89, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(44, 2, 27, 1, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(45, 2, 28, 1, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(46, 2, 29, 1, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(47, 2, 30, 1, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(48, 2, 31, 1, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(49, 2, 32, 1, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(50, 2, 33, 1, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(51, 2, 34, 1, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(52, 2, 35, 1, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(58, 1, 92, 3, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(59, 1, 93, 3, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(60, 1, 94, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(61, 1, 95, 4, 'Ninguno', 1, '2024-03-06 18:06:55', '2024-03-06 18:06:55'),
(67, 3, 53, 3, 'Ninguno', 1, '2024-03-06 18:08:13', '2024-03-06 18:08:13'),
(68, 3, 54, 3, 'Ninguno', 1, '2024-03-06 18:08:13', '2024-03-06 18:08:13'),
(69, 3, 55, 3, 'Ninguno', 1, '2024-03-06 18:08:13', '2024-03-06 18:08:13'),
(82, 3, 68, 4, 'Ninguno', 1, '2024-03-06 18:08:13', '2024-03-06 18:08:13'),
(125, 4, 3, 1, 'Contribuir a la generación de capital humano de calidad, que detone la innovación y desarrollo de la Entidad mediante el incremento de la eficiencia del sistema educativo en las Instituciones de Educación Superior de Control Estatal.', 2, '2024-05-02 20:29:07', '2024-05-02 20:29:07'),
(126, 4, 4, 1, 'Mostrar la variación en cuanto a la cantidad de estudiantes inscritos en TSU y Licenciatura las Instituciones de Educación Superior de Control Estatal en el ciclo escolar actual en comparación con los alumnos inscritos en el ciclo escolar anterior.', 2, '2024-05-02 20:31:26', '2024-05-02 20:31:26'),
(127, 4, 5, 1, 'Mostrar el porcentaje de aquellos jóvenes inscritos a primer grado en las Instituciones de Educación Superior de Control Estatal.', 2, '2024-05-02 20:32:53', '2024-05-02 20:32:53'),
(128, 13, 6, 1, 'Permitirá conocer la fluctuación de las acciones de formación integral que desarrollan las Instituciones de Educación Superior de Control Estatal de un año a otro.', 2, '2024-05-02 20:35:18', '2024-05-02 20:35:18'),
(129, 10, 7, 1, 'Desarrollo de acciones para fomentar una cultura emprendedora en Educación Superior.', 2, '2024-05-02 20:37:15', '2024-05-02 20:37:15'),
(130, 4, 8, 1, 'Medir el porcentaje de los programas educativos acreditados, en comparación con los acreditables en las Instituciones de Educación Superior de Control Estatal en el año n.', 2, '2024-05-02 20:39:27', '2024-05-02 20:39:27'),
(131, 4, 9, 1, 'Mostrar la variación de egresados que obtienen su título de un año fiscal a otro en las Instituciones de Educación Superior de Control Estatal.', 2, '2024-05-02 20:41:55', '2024-05-02 20:41:55'),
(132, 16, 10, 1, 'Obtención de certificaciones en Educación Superior.', 2, '2024-05-02 20:48:08', '2024-05-02 20:48:08'),
(133, 4, 11, 1, 'Fortalecer el proceso educativo en Educación Superior.', 2, '2024-05-02 22:29:10', '2024-05-02 22:29:10'),
(134, 4, 12, 1, 'Encontrar áreas de oportunidad para mejorar su desempeño en Educación Superior.', 2, '2024-05-02 22:29:50', '2024-05-02 22:29:50'),
(135, 17, 13, 1, 'Encontrar áreas de oportunidad para mejorar su desempeño en Educación Superior.', 2, '2024-05-02 22:31:00', '2024-05-02 22:31:00'),
(136, 4, 14, 1, 'Desarrollo de Proyectos de Investigación en Educación Superior que contribuyan a la mejora y solución de problemas.', 2, '2024-05-02 22:31:53', '2024-05-02 22:31:53'),
(137, 4, 15, 1, 'Conocer la variación de publicaciones de documentos derivados de la investigación para su divulgación en las Instituciones de Educación Superior de Control Estatal de un año a otro.', 2, '2024-05-02 22:32:48', '2024-05-02 22:32:48'),
(139, 7, 16, 1, 'Conocer la variación de acciones de vinculación y extensión realizadas en las Instituciones de Educación Superior de Control Estatal de un año a otro.', 2, '2024-05-02 22:33:59', '2024-05-02 22:33:59'),
(141, 7, 17, 1, 'Mostrar el porcentaje de convenios en operación por las Instituciones de Educación Superior de Control Estatal, con respecto a los vigentes en el año.', 2, '2024-05-02 22:34:56', '2024-05-02 22:34:56'),
(143, 5, 18, 1, 'Mostrar el porcentaje de estudiantes en educación dual en las Instituciones de Educación Superior de Control Estatal, con respecto a la matrícula potencial de educación dual en el ciclo escolar.', 2, '2024-05-02 22:36:20', '2024-05-02 22:36:20'),
(145, 7, 19, 1, 'Participación de la comunidad escolar en programas de internacionalización en Educación Superior.', 2, '2024-05-02 22:37:07', '2024-05-02 22:37:07'),
(147, 9, 20, 1, 'Conocer el número Egresados Contactados en las Instituciones de Educación Superior de Control Estatal, de un ciclo escolar a otro', 2, '2024-05-02 22:38:56', '2024-05-02 22:38:56'),
(149, 5, 21, 1, 'Identificar el porcentaje de estudiantes inscritos a cursos de inglés en el ciclo escolar n.', 2, '2024-05-02 22:40:15', '2024-05-02 22:40:15'),
(151, 5, 22, 1, 'Participación de estudiantes en procesos de certificación del idioma inglés en Educación Superior.', 2, '2024-05-02 22:47:34', '2024-05-02 22:47:34'),
(153, 21, 23, 1, 'Conocer el número de computadoras destinadas al proceso de Enseñanza-Aprendizaje en Educación Superior.', 2, '2024-05-02 22:50:49', '2024-05-02 22:50:49'),
(155, 5, 24, 1, 'Conocer la variación de estudiantes y docentes que participan en procesos de certificación en el uso de tecnologías del aprendizaje, conocimiento, información y comunicación en el año n, con respecto a los del año anterior .', 2, '2024-05-02 22:52:50', '2024-05-02 22:52:50'),
(157, 15, 25, 1, 'Implementar acciones para la prevención de la violencia escolar realizadas en Educación Superior.', 2, '2024-05-02 22:54:18', '2024-05-02 22:54:18'),
(158, 1, 26, 1, 'Implementación de acciones para promover la igualdad de trato y oportunidades de la comunidad escolar en Educación Superior', 2, '2024-05-02 22:54:56', '2024-05-02 22:54:56'),
(160, 9, 39, 2, 'N/A', 2, '2024-05-02 23:56:07', '2024-05-02 23:56:07'),
(162, 9, 40, 2, 'N/A', 2, '2024-05-02 23:56:58', '2024-05-02 23:56:58'),
(164, 7, 41, 2, 'N/A', 2, '2024-05-02 23:58:10', '2024-05-02 23:58:10'),
(166, 7, 42, 2, 'N/A', 2, '2024-05-02 23:58:32', '2024-05-02 23:58:32'),
(168, 14, 43, 2, 'N/A', 2, '2024-05-02 23:59:20', '2024-05-02 23:59:20'),
(170, 14, 44, 2, 'N/A', 2, '2024-05-03 00:01:02', '2024-05-03 00:01:02'),
(172, 15, 45, 2, 'N/A', 2, '2024-05-03 00:02:22', '2024-05-03 00:02:22'),
(173, 12, 46, 2, 'N/A', 2, '2024-05-03 00:03:48', '2024-05-03 00:03:48'),
(174, 5, 47, 2, 'N/A', 2, '2024-05-03 00:05:02', '2024-05-03 00:05:02'),
(175, 5, 48, 2, 'N/A', 2, '2024-05-03 00:06:05', '2024-05-03 00:06:05'),
(176, 1, 49, 2, 'N/A', 2, '2024-05-03 00:06:32', '2024-05-03 00:06:32'),
(177, 5, 50, 2, 'N/A', 2, '2024-05-03 00:07:05', '2024-05-03 00:07:05'),
(178, 4, 51, 2, 'N/A', 2, '2024-05-03 00:07:45', '2024-05-03 00:07:45'),
(180, 3, 82, 4, 'Ninguno', 2, '2024-05-08 18:17:29', '2024-05-08 18:17:29'),
(181, 3, 90, 4, 'Ninguno', 2, '2024-05-08 18:33:25', '2024-05-08 18:33:25'),
(182, 3, 91, 4, 'Ninguno', 2, '2024-05-08 18:35:09', '2024-05-08 18:35:09'),
(183, 1, 96, 4, 'Ninguno', 2, '2024-05-08 18:38:29', '2024-05-08 18:38:29'),
(184, 1, 97, 4, 'Ninguno', 2, '2024-05-08 18:39:12', '2024-05-08 18:39:12'),
(185, 4, 98, 3, 'Ninguno', 2, '2024-05-08 18:40:48', '2024-05-08 18:40:48'),
(186, 4, 99, 3, 'Ninguno', 2, '2024-05-08 18:42:03', '2024-05-08 18:42:03'),
(187, 4, 100, 3, 'Ninguno', 2, '2024-05-08 18:43:20', '2024-05-08 18:43:20'),
(188, 4, 101, 3, 'Ninguno', 2, '2024-05-08 18:46:18', '2024-05-08 18:46:18'),
(189, 4, 102, 3, 'Ninguno', 2, '2024-05-08 18:47:19', '2024-05-08 18:47:19'),
(190, 4, 103, 3, 'Ninguno', 2, '2024-05-08 18:50:20', '2024-05-08 18:50:20'),
(191, 4, 104, 3, 'Ninguno', 2, '2024-05-08 18:51:14', '2024-05-08 18:51:14'),
(192, 4, 105, 3, 'Ninguno', 2, '2024-05-08 18:51:45', '2024-05-08 18:51:45'),
(193, 4, 106, 3, 'Ninguno', 2, '2024-05-08 18:52:27', '2024-05-08 18:52:27'),
(194, 4, 108, 3, 'Ninguno', 2, '2024-05-16 23:46:47', '2024-05-16 23:46:47'),
(195, 4, 109, 3, 'Ninguno', 2, '2024-05-16 23:47:42', '2024-05-16 23:47:42'),
(196, 4, 110, 3, 'Ninguno', 2, '2024-05-16 23:53:59', '2024-05-16 23:53:59'),
(197, 4, 111, 3, 'Ninguno', 2, '2024-05-16 23:54:56', '2024-05-16 23:54:56'),
(198, 4, 112, 3, 'Ninguno', 2, '2024-05-16 23:56:00', '2024-05-16 23:56:00'),
(199, 4, 113, 3, 'Ninguno', 2, '2024-05-16 23:56:46', '2024-05-16 23:56:46'),
(200, 4, 114, 3, 'Ninguno', 2, '2024-05-16 23:57:23', '2024-05-16 23:57:23'),
(201, 4, 115, 3, 'Ninguno', 2, '2024-05-16 23:58:11', '2024-05-16 23:58:11'),
(202, 4, 116, 3, 'Ninguno', 2, '2024-05-16 23:58:47', '2024-05-16 23:58:47'),
(203, 4, 117, 3, 'Ninguno', 2, '2024-05-16 23:59:30', '2024-05-16 23:59:30'),
(204, 4, 118, 3, 'Ninguno', 2, '2024-05-17 00:00:14', '2024-05-17 00:00:14'),
(205, 4, 119, 3, 'Ninguno', 2, '2024-05-17 00:01:08', '2024-05-17 00:01:08'),
(206, 4, 120, 3, 'Ninguno', 2, '2024-05-17 00:01:54', '2024-05-17 00:01:54'),
(207, 4, 121, 3, 'Ninguno', 2, '2024-05-17 00:02:50', '2024-05-17 00:02:50'),
(208, 4, 122, 3, 'Ninguno', 2, '2024-05-17 16:51:58', '2024-05-17 16:51:58'),
(209, 4, 123, 3, 'Ninguno', 2, '2024-05-17 16:56:58', '2024-05-17 16:56:58'),
(210, 4, 124, 3, 'Ninguno', 2, '2024-05-17 16:58:09', '2024-05-17 16:58:09'),
(211, 4, 125, 3, 'Ninguno', 2, '2024-05-17 16:59:31', '2024-05-17 16:59:31'),
(212, 4, 126, 3, 'Ninguno', 2, '2024-05-17 17:00:34', '2024-05-17 17:00:34'),
(213, 4, 127, 3, 'Ninguno', 2, '2024-05-17 17:05:59', '2024-05-17 17:05:59'),
(214, 4, 128, 3, 'Ninguno', 2, '2024-05-17 18:35:24', '2024-05-17 18:35:24'),
(215, 4, 129, 3, 'Ninguno', 2, '2024-05-17 18:36:16', '2024-05-17 18:36:16'),
(216, 4, 130, 3, 'Ninguno', 2, '2024-05-17 18:37:05', '2024-05-17 18:37:05'),
(217, 4, 131, 3, 'Ninguno', 2, '2024-05-17 18:37:25', '2024-05-17 18:37:25'),
(218, 4, 132, 3, 'Ninguno', 2, '2024-05-17 18:40:15', '2024-05-17 18:40:15'),
(219, 4, 133, 3, 'Ninguno', 2, '2024-05-17 18:40:41', '2024-05-17 18:40:41'),
(220, 4, 134, 3, 'Ninguno', 2, '2024-05-17 18:41:30', '2024-05-17 18:41:30'),
(221, 4, 135, 3, 'Ninguno', 2, '2024-05-17 18:41:56', '2024-05-17 18:41:56'),
(222, 4, 136, 3, 'Ninguno', 2, '2024-05-17 18:43:24', '2024-05-17 18:43:24'),
(223, 4, 138, 3, 'Ninguno', 2, '2024-05-17 18:47:32', '2024-05-17 18:47:32'),
(224, 4, 139, 3, 'Ninguno', 2, '2024-05-17 18:48:40', '2024-05-17 18:48:40'),
(225, 4, 141, 3, 'Ninguno', 2, '2024-05-17 18:55:38', '2024-05-17 18:55:38'),
(226, 4, 140, 3, 'Ninguno', 2, '2024-05-17 19:02:14', '2024-05-17 19:02:14'),
(227, 4, 143, 3, 'Ninguno', 2, '2024-05-17 19:04:39', '2024-05-17 19:04:39'),
(228, 4, 142, 3, 'Ninguno', 2, '2024-05-17 19:07:11', '2024-05-17 19:07:11'),
(229, 4, 144, 3, 'Ninguno', 2, '2024-05-17 19:07:43', '2024-05-17 19:07:43'),
(230, 4, 145, 3, 'Ninguno', 2, '2024-05-17 19:08:23', '2024-05-17 19:08:23'),
(231, 4, 146, 3, 'Ninguno', 2, '2024-05-17 19:09:31', '2024-05-17 19:09:31'),
(232, 4, 147, 3, 'Ninguno', 2, '2024-05-17 19:15:16', '2024-05-17 19:15:16'),
(233, 4, 148, 3, 'Ninguno', 2, '2024-05-17 19:16:07', '2024-05-17 19:16:07'),
(234, 4, 149, 3, 'Ninguno', 2, '2024-05-17 19:16:53', '2024-05-17 19:16:53'),
(235, 4, 150, 3, 'Ninguno', 2, '2024-05-17 19:30:59', '2024-05-17 19:30:59'),
(236, 4, 151, 3, 'Ninguno', 2, '2024-05-17 19:34:17', '2024-05-17 19:34:17'),
(237, 4, 152, 3, 'Ninguno', 2, '2024-05-17 19:36:14', '2024-05-17 19:36:14'),
(238, 4, 153, 3, 'Ninguno', 2, '2024-05-17 19:37:35', '2024-05-17 19:37:35'),
(239, 4, 154, 3, 'Ninguno', 2, '2024-05-17 19:38:55', '2024-05-17 19:38:55'),
(240, 5, 101, 3, 'Ninguno', 2, '2024-05-17 19:53:42', '2024-05-17 19:53:42'),
(241, 4, 156, 3, 'Ninguno', 2, '2024-05-17 19:55:25', '2024-05-17 19:55:25'),
(242, 4, 157, 3, 'Ninguno', 2, '2024-05-17 19:56:10', '2024-05-17 19:56:10'),
(245, 5, 158, 4, 'Ninguna', 2, '2024-05-17 23:34:30', '2024-05-17 23:34:30'),
(246, 5, 159, 4, 'Ninguna', 2, '2024-05-17 23:35:01', '2024-05-17 23:35:01'),
(247, 5, 160, 4, 'Ninguno', 2, '2024-05-17 23:35:23', '2024-05-17 23:35:23'),
(248, 5, 161, 4, 'Ninguno', 2, '2024-05-17 23:35:45', '2024-05-17 23:35:45'),
(249, 5, 162, 4, 'Ninguno', 2, '2024-05-17 23:36:20', '2024-05-17 23:36:20'),
(250, 12, 163, 4, 'Ninguno', 2, '2024-05-17 23:37:25', '2024-05-17 23:37:25'),
(251, 13, 164, 3, 'Ninguno', 2, '2024-05-17 23:40:09', '2024-05-17 23:40:09'),
(252, 13, 165, 3, 'Ninguno', 2, '2024-05-17 23:41:13', '2024-05-17 23:41:13'),
(253, 13, 166, 3, 'Ninguna', 2, '2024-05-17 23:42:00', '2024-05-17 23:42:00'),
(254, 13, 185, 3, 'Ninguno', 2, '2024-05-17 23:43:05', '2024-05-17 23:43:05'),
(255, 14, 186, 3, 'Ninguno', 2, '2024-05-17 23:48:09', '2024-05-17 23:48:09'),
(256, 14, 187, 3, 'Ninguno', 2, '2024-05-17 23:49:13', '2024-05-17 23:49:13'),
(257, 14, 189, 3, 'Ninguno', 2, '2024-05-17 23:50:25', '2024-05-17 23:50:25'),
(258, 14, 167, 4, 'Ninguno', 2, '2024-05-17 23:52:33', '2024-05-17 23:52:33'),
(259, 14, 168, 4, 'Ninguno', 2, '2024-05-17 23:53:38', '2024-05-17 23:53:38'),
(260, 14, 169, 4, 'Ninguno', 2, '2024-05-17 23:54:55', '2024-05-17 23:54:55'),
(261, 14, 170, 4, 'Ninguno', 2, '2024-05-17 23:56:22', '2024-05-17 23:56:22'),
(262, 14, 171, 4, 'Ninguno', 2, '2024-05-17 23:56:54', '2024-05-17 23:56:54'),
(263, 14, 172, 4, 'Ninguno', 2, '2024-05-17 23:57:41', '2024-05-17 23:57:41'),
(264, 14, 173, 4, 'Ninguno', 2, '2024-05-17 23:58:14', '2024-05-17 23:58:14'),
(265, 14, 174, 4, 'Ninguno', 2, '2024-05-17 23:59:08', '2024-05-17 23:59:08'),
(266, 14, 175, 4, 'Ninguno', 2, '2024-05-17 23:59:45', '2024-05-17 23:59:45'),
(267, 14, 176, 4, 'Ninguno', 2, '2024-05-18 00:00:53', '2024-05-18 00:00:53'),
(268, 14, 177, 4, 'Ninguno', 2, '2024-05-20 15:58:33', '2024-05-20 15:58:33'),
(269, 14, 178, 4, 'Ninguno', 2, '2024-05-20 15:59:02', '2024-05-20 15:59:02'),
(270, 14, 179, 4, 'Ninguno', 2, '2024-05-20 15:59:48', '2024-05-20 15:59:48'),
(271, 14, 180, 4, 'Ninguno', 2, '2024-05-20 16:00:51', '2024-05-20 16:00:51'),
(272, 14, 181, 4, 'Ninguno', 2, '2024-05-20 16:01:29', '2024-05-20 16:01:29'),
(273, 14, 182, 4, 'Ninguno', 2, '2024-05-20 16:02:27', '2024-05-20 16:02:27'),
(274, 14, 183, 4, 'Ninguno', 2, '2024-05-20 16:12:02', '2024-05-20 16:12:02'),
(275, 14, 184, 4, 'Ninguno', 2, '2024-05-20 16:12:41', '2024-05-20 16:12:41'),
(276, 15, 189, 3, 'Ninguno', 2, '2024-05-20 16:14:02', '2024-05-20 16:14:02'),
(278, 15, 188, 3, 'Ninguno', 2, '2024-05-20 16:18:17', '2024-05-20 16:18:17'),
(279, 7, 191, 3, 'Ninguno', 2, '2024-05-20 16:51:54', '2024-05-20 16:51:54'),
(280, 7, 192, 3, 'Ninguno', 2, '2024-05-20 16:52:13', '2024-05-20 16:52:13'),
(281, 7, 193, 3, 'Ninguno', 2, '2024-05-20 16:53:06', '2024-05-20 16:53:06'),
(282, 7, 194, 3, 'Ninguno', 2, '2024-05-20 16:54:22', '2024-05-20 16:54:22'),
(283, 7, 92, 3, 'Ninguno', 2, '2024-05-20 16:59:27', '2024-05-20 16:59:27'),
(284, 8, 198, 3, 'Ninguno', 2, '2024-05-20 17:00:28', '2024-05-20 17:00:28'),
(285, 8, 199, 3, 'Ninguno', 2, '2024-05-20 17:00:52', '2024-05-20 17:00:52'),
(286, 8, 204, 3, 'Ninguno', 2, '2024-05-20 17:02:55', '2024-05-20 17:02:55'),
(287, 8, 195, 4, 'Ninguno', 2, '2024-05-20 17:06:09', '2024-05-20 17:06:09'),
(288, 8, 196, 4, 'Ninguno', 2, '2024-05-20 18:08:09', '2024-05-20 18:08:09'),
(289, 9, 205, 3, 'Ninguno', 2, '2024-05-20 18:19:02', '2024-05-20 18:19:02'),
(290, 11, 206, 3, 'Ninguno', 2, '2024-05-20 18:22:20', '2024-05-20 18:22:20'),
(291, 11, 210, 3, 'Ninguno', 2, '2024-05-20 18:23:00', '2024-05-20 18:23:00'),
(292, 11, 211, 3, 'Ninguno', 2, '2024-05-20 18:23:37', '2024-05-20 18:23:37'),
(293, 11, 207, 4, 'Ninguno', 2, '2024-05-20 18:24:54', '2024-05-20 18:24:54'),
(294, 11, 208, 4, 'Ninguno', 2, '2024-05-20 18:25:25', '2024-05-20 18:25:25'),
(295, 11, 209, 4, 'Ninguno', 2, '2024-05-20 18:26:10', '2024-05-20 18:26:10'),
(296, 10, 212, 3, 'Ninguno', 2, '2024-05-20 18:27:57', '2024-05-20 18:27:57'),
(297, 10, 213, 3, 'Ninguno', 2, '2024-05-20 18:28:43', '2024-05-20 18:28:43'),
(298, 10, 200, 4, 'Ninguno', 2, '2024-05-20 18:29:25', '2024-05-20 18:29:25'),
(299, 10, 201, 4, 'Ninguno', 2, '2024-05-20 18:29:59', '2024-05-20 18:29:59'),
(300, 10, 202, 4, 'Ninguno', 2, '2024-05-20 18:30:23', '2024-05-20 18:30:23'),
(301, 10, 203, 4, 'Ninguno', 2, '2024-05-20 18:31:01', '2024-05-20 18:31:01'),
(302, 16, 214, 3, 'Ninguno', 2, '2024-05-20 18:34:23', '2024-05-20 18:34:23'),
(303, 16, 215, 3, 'Ninguno', 2, '2024-05-20 18:35:00', '2024-05-20 18:35:00'),
(304, 16, 216, 3, 'Ninguno', 2, '2024-05-20 18:43:21', '2024-05-20 18:43:21'),
(305, 16, 217, 3, 'Ninguno', 2, '2024-05-20 18:45:47', '2024-05-20 18:45:47'),
(306, 16, 224, 3, 'Ninguno', 2, '2024-05-20 18:47:59', '2024-05-20 18:47:59'),
(307, 21, 225, 3, 'Ninguno', 2, '2024-05-20 18:49:38', '2024-05-20 18:49:38'),
(308, 21, 226, 3, 'Ninguno', 2, '2024-05-20 18:50:13', '2024-05-20 18:50:13'),
(309, 21, 227, 3, 'Ninguno', 2, '2024-05-20 19:00:12', '2024-05-20 19:00:12'),
(310, 17, 228, 3, 'Ninguno', 2, '2024-05-20 19:02:13', '2024-05-20 19:02:13'),
(311, 17, 229, 3, 'Ninguno', 2, '2024-05-20 19:04:04', '2024-05-20 19:04:04'),
(312, 17, 236, 3, 'Ninguno', 2, '2024-05-20 19:04:31', '2024-05-20 19:04:31'),
(313, 17, 218, 4, 'Ninguno', 2, '2024-05-20 19:05:00', '2024-05-20 19:05:00'),
(314, 17, 219, 4, 'Ninguno', 2, '2024-05-20 19:05:24', '2024-05-20 19:05:24'),
(315, 17, 220, 4, 'Ninguno', 2, '2024-05-20 19:05:55', '2024-05-20 19:05:55'),
(316, 17, 221, 4, 'Ninguno', 2, '2024-05-20 19:06:35', '2024-05-20 19:06:35'),
(317, 17, 222, 4, 'Ninguno', 2, '2024-05-20 19:08:10', '2024-05-20 19:08:10'),
(318, 17, 223, 4, 'Ninguno', 2, '2024-05-20 19:08:55', '2024-05-20 19:08:55'),
(319, 18, 237, 3, 'Ninguno', 2, '2024-05-20 19:10:09', '2024-05-20 19:10:09'),
(320, 18, 238, 3, 'Ninguno', 2, '2024-05-20 19:10:33', '2024-05-20 19:10:33'),
(321, 18, 239, 3, 'Ninguno', 2, '2024-05-20 19:10:57', '2024-05-20 19:10:57'),
(322, 18, 242, 3, 'Ninguno', 2, '2024-05-20 19:11:45', '2024-05-20 19:11:45'),
(323, 18, 230, 4, 'Ninguno', 2, '2024-05-20 19:12:28', '2024-05-20 19:12:28'),
(324, 18, 231, 4, 'Ninguno', 2, '2024-05-20 19:13:12', '2024-05-20 19:13:12'),
(325, 18, 232, 4, 'Ninguno', 2, '2024-05-20 19:14:05', '2024-05-20 19:14:05'),
(326, 18, 233, 4, 'Ninguno', 2, '2024-05-20 19:14:44', '2024-05-20 19:14:44'),
(327, 18, 234, 4, 'Ninguno', 2, '2024-05-20 19:15:18', '2024-05-20 19:15:18'),
(328, 18, 235, 4, 'Ninguno', 2, '2024-05-20 19:17:17', '2024-05-20 19:17:17'),
(329, 19, 243, 3, 'Ninguno', 2, '2024-05-20 19:37:33', '2024-05-20 19:37:33'),
(330, 19, 244, 3, 'Ninguno', 2, '2024-05-20 19:38:00', '2024-05-20 19:38:00'),
(331, 19, 245, 3, 'Ninguno', 2, '2024-05-20 19:38:36', '2024-05-20 19:38:36'),
(332, 19, 246, 3, 'Ninguno', 2, '2024-05-20 19:39:40', '2024-05-20 19:39:40'),
(333, 19, 240, 4, 'Ninguno', 2, '2024-05-20 19:40:12', '2024-05-20 19:40:12'),
(334, 19, 241, 4, 'Ninguno', 2, '2024-05-20 19:40:38', '2024-05-20 19:40:38'),
(335, 20, 247, 3, 'Ninguno', 2, '2024-05-20 19:41:26', '2024-05-20 19:41:26'),
(336, 20, 248, 3, 'Ninguno', 2, '2024-05-20 19:43:05', '2024-05-20 19:43:05'),
(337, 20, 249, 3, 'Ninguno', 2, '2024-05-20 19:43:36', '2024-05-20 19:43:36'),
(338, 20, 250, 3, 'Ninguno', 2, '2024-05-20 19:44:23', '2024-05-20 19:44:23'),
(339, 20, 251, 3, 'Ninguno', 2, '2024-05-20 19:44:59', '2024-05-20 19:44:59'),
(340, 20, 252, 3, 'Ninguno', 2, '2024-05-20 19:45:33', '2024-05-20 19:45:33'),
(341, 20, 253, 3, 'Ninguno', 2, '2024-05-20 19:46:24', '2024-05-20 19:46:24'),
(342, 20, 254, 3, 'Ninguno', 2, '2024-05-20 19:47:08', '2024-05-20 19:47:08'),
(343, 20, 255, 3, 'Ninguno', 2, '2024-05-20 19:47:49', '2024-05-20 19:47:49'),
(344, 20, 256, 3, 'Ninguno', 2, '2024-05-20 19:49:51', '2024-05-20 19:49:51'),
(345, 20, 257, 3, 'Ninguno', 2, '2024-05-20 19:51:28', '2024-05-20 19:51:28'),
(346, 20, 258, 3, 'Ninguno', 2, '2024-05-20 19:52:05', '2024-05-20 19:52:05'),
(347, 20, 266, 3, 'Ninguno', 2, '2024-05-20 19:53:02', '2024-05-20 19:53:02'),
(348, 20, 267, 3, 'Ninguno', 2, '2024-05-20 19:54:18', '2024-05-20 19:54:18'),
(349, 20, 268, 3, 'Ninguno', 2, '2024-05-20 19:54:57', '2024-05-20 19:54:57'),
(350, 20, 269, 3, 'Ninguno', 2, '2024-05-20 19:55:31', '2024-05-20 19:55:31'),
(351, 20, 270, 3, 'Ninguno', 2, '2024-05-20 19:56:16', '2024-05-20 19:56:16'),
(352, 20, 259, 4, 'Ninguno', 2, '2024-05-20 19:56:45', '2024-05-20 19:56:45'),
(354, 20, 260, 4, 'Ninguno', 2, '2024-05-20 20:01:21', '2024-05-20 20:01:21'),
(355, 20, 261, 4, 'Ninguno', 2, '2024-05-20 20:02:05', '2024-05-20 20:02:05'),
(356, 20, 262, 4, 'Ninguno', 2, '2024-05-20 20:04:23', '2024-05-20 20:04:23'),
(357, 20, 263, 4, 'Ninguno', 2, '2024-05-20 20:05:02', '2024-05-20 20:05:02'),
(358, 20, 264, 4, 'Ninguno', 2, '2024-05-20 20:05:42', '2024-05-20 20:05:42'),
(359, 20, 265, 4, 'Ninguno', 2, '2024-05-20 20:06:27', '2024-05-20 20:06:27'),
(360, 21, 36, 1, 'Ninguno', 2, '2024-05-21 20:04:54', '2024-05-21 20:04:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_areasusuarios`
--

CREATE TABLE `tb_areasusuarios` (
  `id_areasusuarios` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_calendarizars`
--

CREATE TABLE `tb_calendarizars` (
  `id_calendario` int(10) UNSIGNED NOT NULL,
  `areameta_id` int(10) UNSIGNED NOT NULL,
  `meses_id` int(10) UNSIGNED NOT NULL,
  `id_registro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_calendarizars`
--

INSERT INTO `tb_calendarizars` (`id_calendario`, `areameta_id`, `meses_id`, `id_registro`, `cantidad`, `activo`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 2, 1, 1, '2024-05-22 20:29:30', '2024-05-22 20:29:30'),
(2, 8, 2, 2, 1, 1, '2024-05-22 20:29:32', '2024-05-22 20:29:32'),
(3, 8, 3, 2, 1, 1, '2024-05-22 20:29:32', '2024-05-22 20:29:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_correo`
--

CREATE TABLE `tb_correo` (
  `id_correo` int(10) UNSIGNED NOT NULL,
  `destinatario` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `asunto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remitente` text COLLATE utf8mb4_unicode_ci,
  `fecha_envio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_entregas`
--

CREATE TABLE `tb_entregas` (
  `id_entregas` int(10) UNSIGNED NOT NULL,
  `areameta_id` int(10) UNSIGNED NOT NULL,
  `meses_id` int(10) UNSIGNED NOT NULL,
  `id_registro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_meses`
--

CREATE TABLE `tb_meses` (
  `id_meses` int(10) UNSIGNED NOT NULL,
  `m_enero` int(11) NOT NULL,
  `m_febrero` int(11) NOT NULL,
  `m_marzo` int(11) NOT NULL,
  `m_abril` int(11) NOT NULL,
  `m_mayo` int(11) NOT NULL,
  `m_junio` int(11) NOT NULL,
  `m_julio` int(11) NOT NULL,
  `m_agosto` int(11) NOT NULL,
  `m_septiembre` int(11) NOT NULL,
  `m_octubre` int(11) NOT NULL,
  `m_noviembre` int(11) NOT NULL,
  `m_diciembre` int(11) NOT NULL,
  `m_cantidad` int(11) NOT NULL,
  `m_year` year(4) NOT NULL,
  `m_fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_meses`
--

INSERT INTO `tb_meses` (`id_meses`, `m_enero`, `m_febrero`, `m_marzo`, `m_abril`, `m_mayo`, `m_junio`, `m_julio`, `m_agosto`, `m_septiembre`, `m_octubre`, `m_noviembre`, `m_diciembre`, `m_cantidad`, `m_year`, `m_fecha`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024', '2024-05-22', '2024-05-22 20:29:30', '2024-05-22 20:29:30'),
(2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024', '2024-05-22', '2024-05-22 20:29:32', '2024-05-22 20:29:32'),
(3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2024', '2024-05-22', '2024-05-22 20:29:32', '2024-05-22 20:29:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_metas`
--

CREATE TABLE `tb_metas` (
  `id_meta` int(10) UNSIGNED NOT NULL,
  `clave` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `unidadmedida` text COLLATE utf8mb4_unicode_ci,
  `programa_id` int(10) UNSIGNED NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_metas`
--

INSERT INTO `tb_metas` (`id_meta`, `clave`, `nombre`, `descripcion`, `unidadmedida`, `programa_id`, `activo`, `id_registro`, `created_at`, `updated_at`) VALUES
(3, 'MET1', 'Fomentar que los estudiantes egresen en el ciclo escolar para contribuir en sus estudios de tipo superior.', '• En el numerador se deberá considerar el total de egresados del ciclo escolar n (deberán de sumar los egresos de los diferentes periodos del ciclo escolar; para plan semestral el egreso de febrero y julio; para plan  cuatrimestral los egresos de diciembre, abril y agosto). En el caso de Universidades Tecnológicas sumar los egresados de TSU y Licenciatura. \r\n• En el denominador se deberá proyectar a los estudiantes que se encuentren inscritos en el último periodo académico y que cumplan con los requisitos para poder egresar. En Universidades Tecnológicas sumar los estudiantes de TSU y Licenciatura.', 'Egresados', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 17:20:41'),
(4, 'MET2', 'Atender a la matrícula de educación superior para contribuir a la cobertura educativa del nivel superior.', '• En el numerador sólo considerar la matrícula de licenciatura y TSU según corresponda, ya que la matrícula de especialidades, maestrías y doctorados se reportará en el proyecto de posgrado.\r\n• El denominador se obtendrá de acuerdo a la \"Guía metodológica para el análisis del área de influencia\" El nuevo ingreso, se debe calendarizar en el primer o segundo trimestre, a fin de mantener congruencia con lo reportado en la 911, de ciclo escolar vigente. Por ejemplo: para el ejercicio fiscal 2023, se deberá reportar la matrícula reportada en el lavantamiento estadístico 911, 22-23.', 'Estudiante', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 17:20:56'),
(5, 'MET3', 'Atender a los estudiantes de nuevo ingreso de educación superior para que continúen su formación profesional.', '• En el numerador sólo se considera el nuevo ingreso a primer grado de TSU y licenciatura según corresponda.\r\n• El denominador se obtendrá de acuerdo a la \"Guía metodológica para el análisis del área de influencia\".  Cabe mencionar que la población de 18 a 22 años de acuerdo a la guía metodológica debe corresponder a la proyectada a mitad de año, del año en el que inicia el ciclo escolar.', 'Estudiante', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 17:22:31'),
(6, 'MET4', 'Realizar acciones de formación integral, para desarrollar capacidades, valores, habilidades  blandas y profesionales.', 'Se consideran acciones de formación integral  las siguientes actividades: culturales, deportivas, cívicas, formación para el trabajo, talleres, concursos, cursos, torneos, foros, ferias, presentaciones, conferencias de formación disciplinar de desarrollo humano, entre otras.', 'Acción', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-24 22:48:26'),
(7, 'MET5', 'Realizar acciones que fomenten la cultura emprendedora para desarrollar habilidades en los estudiantes.', 'Se refiere a las siguientes acciones encaminadas a fomentar una cultura emprendedora:\r\n                              \r\n1.-Capacitación\r\n2.-Conferencias\r\n3.-Talleres\r\n4.-Ferias de emprendedor\r\n5.-Visitas guiadas a Institutos de Emprendimiento\r\n6.- Participación en Congresos\r\n7.- Gestionar y/o participar en concursos y Convocatorias\r\n8.- Asesorías\r\n9.- Desarrollo de proyectos emprendedores \r\n10.- Constitución de empresas\r\n*Se deben considerar las acciones que aplican a su Institución de acuerdo al listado antes descrito, lo que implica que no deben superar la meta programada de 10 en cada trimestre, es decir 40 de manera anual como máximo.\r\n*Las acciones reportadas en esta meta no deberán reportarse en acciones de Vinculación ya que se duplicarían.', 'Acción', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-24 22:49:24'),
(8, 'MET6', 'Acreditar programas educativos en educación superior para mejorar la calidad.', '• En el numerador se consideran tanto las nuevas acreditaciones como las acreditaciones vigentes, ya que el mantener dichas acreditaciones implica recursos para la institución al cubrir los estándares establecidos por los organismos acreditadores en el ejercicio fiscal.\r\n• En el denominador refiere a aquellos  programas que cumplen con los requisitos establecidos por los organismos acreditadores para ser acreditados, por ejemplo; que se cuente con generaciones determinadas de egresados. \r\nEs importante considerar como programas acreditables aquellos acreditados por un organismo acreditador, más los programas con posibilidad de acreditarse.', 'Programa', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-24 22:50:25'),
(9, 'MET7', 'Fomentar que los egresados se titulen para acreditar su formación profesional.', '• El numerador refiere a los titulados en el año n, considerando únicamente a los de TSU y licenciatura.\r\n• El denominador refiere al número de titulados en el año anterior. \r\nNOTA: Se considera titulado a quien haya obtenido el documento normativo (Acta de titulación, acta de excención de examen profesional, etc.) que acredite que concluyó su programa educativo y modalidad de titulación. \r\n\r\n*Los titulados de especialidades, maestrías y doctorados se reportan en el proyecto de Posgrado.', 'Documento', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-24 22:53:48'),
(10, 'MET8', 'Lograr certificaciones en Educación Superior para mejorar los servicios educativos.', 'El numerador corresponde a las certificaciones que logra y mantiene la institución en el ejercicio fiscal.\r\nLas certificaciones referentes son: \r\n1. Sistema de Gestión de la Calidad (migración al Sistemas de Gestión para Organizaciones Educativas)\r\n2. Sistema de Gestión Ambiental\r\n3. Igualdad Laboral y No Discriminación\r\nAdicionalmente se pueden considerar:\r\n- Sistema de Gestión de la Energía\r\n- Sistema de Seguridad Ocupacional.\r\n-Certificado de instalación 100% libre de plástico de un solo uso.\r\n-Reconociemto de espacio 100% libres de humo de tabaco.', 'Documento', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-24 22:54:50'),
(11, 'MET9', 'Impulsar la capacitación o actualización del personal docente para mejorar la formación académica.', '• En el numerador se debe considerar los docentes capacitados y actualizados independientemente del total de capacitaciones que reciba (lo anterior a efecto de que no se duplique el personal; por ejemplo si un docente recibe tres capacitaciones solo se reporta como un docente) \r\n• En el denominador considerar el total de la plantilla docente reportada en la estadistica 911 en el ciclo escolar n.', 'Docente', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-24 22:56:07'),
(12, 'MET10', 'Evaluar al personal docente con la finalidad de encontrar áreas de oportunidad para mejorar su desempeño.', '• En el numerador se debe considerar al total de los docentes evaluados en el ciclo escolar n. Es importante considerar que la unidad de medida es por persona (docente).\r\n• En el denominador considerar el total de la plantilla docente reportada en la estadistica 911 en el ciclo escolar n.', 'Docente', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-24 22:57:23'),
(13, 'MET11', 'Impulsar la capacitación del personal directivo y administrativo para el fortalecimiento institucional.', '• En el numerador se debe considerar al personal directivo y administrativo capacitados y/o actualizados independientemente del total de capacitaciones que reciba (lo anterior a efecto de que no se duplique el personal; por ejemplo si un directivo o administrativo  recibe tres capacitaciones solo se reporta como una persona) \r\n• En el denominador considerar el total de la plantilla de personal directivo y administrativo reportada en la estadistica 911 en el ciclo escolar n.', 'Persona', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-24 22:59:39'),
(14, 'MET12', 'Desarrollar proyectos de investigación para atender las necesidades de desarrollo tecnológico, económico y social.', 'Los proyectos de investigación deben contar con al menos una de las siguientes características:\r\n• Registrados ante el TecNM, DGUTyP,  PRODEP, CONACyT y/o COMECyT \r\n• Seleccionados de Convocatorias internas de investigación, con protocolos de investigación definidos y validados por parte de la Unidad responsable de lnvestigación de la Institución. \r\n• Elaborados por docentes y estudiantes.             \r\n• Proyectos de desarrollo tecnológico validados por la unidad responsable de investigación de la institución.\r\n• Proyectos de investigación aplicada (servicios técnicos, servicios tecnológicos, desarrollo tecnológico, transferencia tecnológica)\r\n\r\n*Si son proyectos que se desarrollan en varios años, se deben considerar como vigentes para los años que dure el proyecto.', 'Proyecto', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-24 23:02:16'),
(15, 'MET13', 'Realizar la publicación de documentos producto de la investigación para su divulgación.', 'Considerar las publicaciones de documentos producto de la investigación en el año, en revistas, libros, memorias y carteles de divulgación científica. \r\nNOTA: No considerar las publicaciones reportadas en la meta \"Realizar la publicación de documentos producto de la investigación en Posgrado para su divulgación\", del proyecto posgrado ya que se duplicarían.', 'Publicación', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 16:50:47'),
(16, 'MET14', 'Realizar acciones de vinculación y extensión para establecer lazos  de colaboración con los sectores público, privado y social.', 'Las acciones de vinculación y extensión con los sectores público, privado y social, se refieren a las siguientes:\r\n1.-Servicio Social\r\n2.-Residencias Profesionales \r\n3.-Prácticas Profesionales\r\n4.-Estancias o Estadías\r\n5.-Bolsa de trabajo\r\n6.-Visitas a empresas\r\n7.-Prácticas de campo \r\n8.-Educación continua \r\n9.-Conferencias \r\n10.-Difusión (promoción de la oferta educativa)\r\n11.-Ferias (de empleo, del libro, etc.)\r\n12.-Becas o gestión de becas\r\n13.-Programas emergentes del Gobierno\r\n14.-Acciones de los órganos de vinculación de la institución\r\n\r\n• Se deben considerar las acciones que aplican a su Institución de acuerdo al listado antes descrito (ejemplo, si aplican 5 visitas a empresas en el año, sólo se debe considerar como una acción general en el año n), lo que implica que no debe superar la meta programada de 14 en cada trimestre, es decir máximo 56 de manera anual.\r\n• Las acciones reportadas en esta meta no deberán reportarse en acciones para fomentar una cultura emprendedora, ni en convenios, ya que se duplicarían.', 'Acción', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 16:51:42'),
(17, 'MET15', 'Operar convenios con los sectores, público, privado y social  para fortalecer los lazos de colaboración institucional.', '• Se consideran los convenios que se encuentran operando e inicien operaciones con los sectores público, privado y social en el año n.\r\n\r\nDurante el ejercicio fiscal los convenios solamente se deberan reportar en el trimestre que inicia su operación, para evitar la duplicidad de los mismos. \r\n\r\nSe debe reportar la operación de los convenios marco  independiente de los estudiantes beneficiados.', 'Convenio', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 16:54:18'),
(18, 'MET16', 'Atender estudiantes en educación dual para desarrollar aptitudes y habilidades en unidades económicas.', '• En el numerador se debe considerar al total de estudiantes  inscritos y reinscritos en educación dual a lo largo del ciclo escolar n y no solamente a los que se incorporen como nuevos \r\n• En el denominador la matrícula potencial se refiere a la que determina la institución de conformidad con los requisitos establecidos en el \"Acuerdo por el que se establece y regula la educación dual en los tipos educativos, medio superior y superior en el Estado de México\".', 'Estudiante', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 16:55:10'),
(19, 'MET17', 'Impulsar la internacionalización de  la institución para fortalecer la calidad educativa.', '• Se debe considerar el total de personas (estudiantes, docentes, personal directivo y administrativo) que participan en acciones de internacionalización impulsadas con recurso propio o gestiones realizadas por la institución.\r\n• Considerar a las personas que participan por parte de la institución en: estancias, ponente en eventos acádemicos, estudios, concursos, doble titulación, en el extranjero de manera presencial o virtual.  \r\n*Se debe considerar a personas extranjeras que participan en algún evento académico o actividad de la Institución de manera presencial o virtual..\r\n• Es importante que NO se considere a los beneficiados de Proyecta Estado de México y de Becarios y Becarias de Excelencia, ya que éstos ya son reportados por el Departamento de Becas del GEM, así como los beneficiados de programas de Gobierno.', 'Persona', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 16:56:07'),
(20, 'MET18', 'Contactar egresados en Educación Superior para identificar su situación laboral y  profesional.', 'En el denominador se debe considerar al total de egresados contactados en el año n - 1, independientemente del año en el que egresaron.', 'Egresado', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 16:56:53'),
(21, 'MET19', 'Impartir el idioma inglés a los estudiantes en educación superior para el desarrollo de competencias.', 'Es importante tener en cuenta que un estudiante puede tomar varios módulos, pero sólo se considera como uno.', 'Estudiante', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 16:58:46'),
(22, 'MET20', 'Impulsar la participación de estudiantes de educación superior en procesos de certificación en el idioma inglés para el desarrollo de competencias.', 'Se debe considerar a los estudiantes que aplican en los procesos de certificación del idioma ingles \r\nComo procesos de certificación se consideran los siguientes: \r\n1.- Cambridge \r\n2.- Toefl\r\n3.-  Certificación Nacional del Nivel de Idioma - CENNI - de la SEP\r\n4.- Otros', 'Estudiante', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 16:59:31'),
(23, 'MET21', 'Destinar equipo de cómputo al proceso de enseñanza-aprendizaje en educación superior para el desarrollo de habilidades digitales.', 'Lo que se debe programar en la meta corresponde al denominador, es decir el Total de computadoras y no así  la matrícula.\r\n\r\nCabe mencionar que se considera el total de computadoras para uso del proceso de enseñanza y aprendizaje; no solo las nuevas.', 'Equipo de computo', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 17:00:26'),
(24, 'MET22', 'Impulsar la participación de estudiantes y docentes en procesos de certificación en el uso de tecnologías del aprendizaje, conocimiento, información y comunicación para el desarrollo de competencias y habilidades.', 'Se debe considerar el número de estudiantes y docentes que aplican en procesos para la certificación. \r\nComo procesos de certificación se consideran los siguientes: \r\n1.- AutoCAD \r\n2.- cisco \r\n3.- office \r\n4.- certificación internacional en acupuntura y en acupotomología \r\n5.- certificación activator system basic and advanced (quiropráctica)\r\n6.- certificaciones otorgadas por CONOCER\r\n7.-entre otras', 'Persona', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 17:28:51'),
(25, 'MET23', 'Realizar acciones de prevención, detección y atención de la violencia escolar para contribuir a una cultura de paz en la Institución.', 'Se refiere a las siguientes acciones encaminadas a prevenir, detectar y atender la violencia escolar en la Institución:\r\n                              \r\nPrevención:\r\n1.Capacitación.\r\n2.Conferencias.\r\n3.Talleres.\r\n4.Difusión en medios escritos. \r\n5.Difusión en redes sociales y medios digitales.\r\n6.Actividades de convivencia escolar.\r\n7.Eventos\r\nDetección y atención:\r\n8.Canalización.\r\n\r\n*Se deben considerar las acciones que aplican a su Institución de acuerdo al listado antes descrito, lo que implica que no deben superar la meta programada de 8 en cada trimestre, es decir 32 de manera anual como máximo.\r\n\r\n*Estás acciones no deberán estar consideradas como acciones en otras metas, ya que se duplicarían.', 'Acción', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 17:48:23'),
(26, 'MET24', 'Realizar acciones de igualdad de trato y oportunidades para contribuir a un entorno social equitativo.', 'Se refiere a las siguientes acciones encaminadas a promover la igualdad de trato y oportunidades en la Institución.\r\n                           \r\n1. Capacitación.\r\n2. Conferencias.\r\n3. Talleres.\r\n4. Difusión en medios escritos. \r\n5. Difusión en redes sociales y medios digitales.\r\n6. Programas.\r\n7. Reglamentos. \r\n8. Procedimientos. \r\n9. Certificaciones.\r\n10. Eventos.\r\n\r\n*Se deben considerar las acciones que aplican a su Institución de acuerdo al listado antes descrito, lo que implica que no deben superar la meta programada de 10 en cada trimestre, es decir 40 de manera anual como máximo.\r\n\r\n\"Estás acciones no deberán estar consideradas como acciones en otras metas, ya que se duplicarían\".', 'Acción', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 17:51:01'),
(27, 'MET25', 'Realizar auditorías, con el propósito de verificar el cumplimiento del marco normativo que regula el funcionamiento de las dependencias y organismos auxiliares del Ejecutivo Estatal y los Ayuntamientos.', '', 'Auditoria', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 17:54:51'),
(28, 'MET26', 'Realizar inspecciones a rubros específicos en las dependencias, organismos auxiliares del Ejecutivo Estatal y en su caso Ayuntamientos, con el propósito de constatar el cumplimiento del marco normativo que lo regula.', '', 'Inspección', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 17:55:55'),
(29, 'MET27', 'Participar en testificaciones, con el propósito de asegurarse que los actos administrativos se realicen con forme a la normatividad vigente.', '', 'Testificación', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 17:56:45'),
(30, 'MET28', 'Participación del Órgano Interno de Control en reuniones que por mandato legal o disposición administrativa así lo requiera.', '', 'Sesión', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 17:57:18'),
(31, 'MET29', 'Atender acciones derivadas de la Fiscalización realizada por Entes Fiscalizadores Externos.', '', 'Acción', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 17:58:48'),
(32, 'MET30', 'Acompañamiento en la atención de auditorias practicadas por los entes fiscalizadores externos.', '', 'Acción', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:00:00'),
(33, 'MET31', 'Atención a observaciones y acciones de mejora determinadas con motivo de los actos de fiscalización realizados por la Dirección General u Órgano Interno de Control.', '', 'Acción', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:00:29'),
(34, 'MET32', 'Elaborar el informe de presunta responsabilidad administrativa.', '', 'Informe', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:00:54'),
(35, 'MET33', 'Integrar expedientes derivados de la presunta responsabilidad administrativa.', '', 'Expediente', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:01:40'),
(36, 'MET34', 'Registrar el pago de adeudos de ejercicios fiscales anteriores.', '', 'Documento', 1, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:02:47'),
(37, 'MET35', 'Substanciar investigaciones derivadas de auditoria', '', 'Expediente', 1, 0, 2, '2024-03-06 18:04:32', '2024-04-25 18:03:10'),
(38, 'MET36', 'Substanciar investigaciones derivadas de actuación de oficio', '', 'Expediente', 1, 0, 2, '2024-03-06 18:04:32', '2024-04-25 18:03:57'),
(39, 'MET37', 'Aplicar encuesta de satisfacción de empleadores, para conocer su opinión acerca de las habilidades y preparación técnica de nuestros estudiantes o egresados.', '', 'Encuesta Realizada', 2, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:14:57'),
(40, 'MET38', 'Promover y promocionar a los egresados en el mercado laboral post estadía.', '', 'Egresados colocados', 2, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:15:53'),
(41, 'MET39', 'Llevar a cabo y dar seguimiento a las sesiones del consejo de vinculación y pertinencia.', '', 'Minuta de Sesión', 2, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:16:44'),
(42, 'MET40', 'Movilidad Estudiantil Nacional e Internacional.', '', 'Estudiante', 2, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:17:23'),
(43, 'MET41', 'Llevar a cabo la promoción, difusión y seguimiento de la oferta educativa en instituciones de educación media superior.', '', 'IEMS Visitadas', 2, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:18:15'),
(44, 'MET42', 'Llevar a cabo la promoción de planes de estudio en eventos de orientación vocacional.', '', 'Reporte de Evento', 2, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:18:55'),
(45, 'MET43', 'Promocionar y difundir la impartición de cursos de educación continua, a los estudiantes próximos a egresar.', '', 'Cursos Impartidos', 2, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:20:04'),
(46, 'MET44', 'Llevar a cabo y dar seguimiento a las campañas de prevención de embarazo, vacunación y asistencia médica, canalizando a las y los estudiantes que lo requieran a otros tipos de apoyo.', '', 'Campañas realizadas', 2, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:21:09'),
(47, 'MET45', 'Llevar acabo la aplicación de encuesta de Satisfacción de Servicios Bibliotecarios.', '', 'Informe de la Encuesta', 2, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:21:50'),
(48, 'MET46', 'Acceso al material bibliográfico digital.', '', 'Estudiante Inscrito', 2, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:51:20'),
(49, 'MET47', 'Llevar a cabo la Publicación  Legislación Universitaria Vigente.', '', 'Documento Elaborado', 2, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:23:28'),
(50, 'MET48', 'Llevar a cabo la gestión, seguimiento y apoyo a las y los estudiantes en el proceso de obtención de becas.', '', 'Estudiante Becado', 2, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:55:04'),
(51, 'MET49', 'Mantener Actualizado el AST de cada uno de los Programas Educativos de la UTVT.', '', 'Documento', 2, 1, 2, '2024-03-06 18:04:32', '2024-04-25 18:55:46'),
(52, 'MET50', 'Alumnos Inscritos a la Biblioteca Digital', '', 'Estudiante', 2, 0, 2, '2024-03-06 18:04:32', '2024-04-25 18:56:03'),
(53, 'MET51', 'Legislación Universitaria Publicado', '', 'Documento', 2, 0, 2, '2024-03-06 18:04:32', '2024-04-25 18:56:43'),
(54, 'MET52', 'Otorgamiento de Becas', '', 'Estudiante Becado', 2, 0, 2, '2024-03-06 18:04:32', '2024-04-25 18:57:11'),
(55, 'MET53', 'Elaborar informe anual de desempeño', '', 'Informe', 3, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(56, 'MET54', 'Instrumentos de Autoevaluación generados', '', 'Documento', 3, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(57, 'MET55', 'Instrumentos de Autoevaluación aplicados', '', 'Documento', 3, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(58, 'MET56', 'Tasa de variación del desempeño institucional para el año t.', '', 'Evaluación', 3, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(59, 'MET57', 'Tasa de variación del desempeño institucional para el año t.', '', 'Evaluación', 3, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(60, 'MET58', 'Programa Operativo Anual Federal y Estatal elaborado en congruencia con el PIDE', '', 'Programa', 3, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(61, 'MET59', 'Seguimiento mensual a programas y proyectos institucionales realizados. (PAT)', '', 'Evaluación', 3, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(62, 'MET60', 'Informe bimenstral elaborado y presentado al Consejo Directivo.', '', 'Informe', 3, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(63, 'MET61', 'Informe anual elaborado y presentado al Consejo Directivo', '', 'Informe', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 20:00:45'),
(64, 'MET62', 'Estadística cuatrimestral elaborada', '', 'Informe', 3, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(65, 'MET63', 'Estadística anual elaborada', '', 'Informe', 3, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(66, 'MET64', 'Celebrar sesiones del Comité Interno de Mejora Regulatoria', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(67, 'MET65', 'Integración de estadística 911.', '', 'Documento', 4, 1, 2, '2024-03-06 18:04:32', '2024-04-26 22:03:44'),
(68, 'MET66', 'Integración de Ficha Técnica Institucional', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(69, 'MET67', 'Integración de informe de Gobierno', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(70, 'MET68', 'Integración del Censo Nacional de Gobierno', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(71, 'MET69', 'Integrar reporte de avance del Programa Anual de Mejora Regulatoria', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(72, 'MET70', 'Elaboración del Programa Anual de Mejora Regulatoria', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(73, 'MET71', 'Actualización de trámites y servicios en el RETyS', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(74, 'MET72', 'Celebrar sesiones del Comité Interno de Ética', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(75, 'MET73', 'Elaboración del Programa Anual de Ética', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(76, 'MET74', 'Campaña de difusión del código de conducta y reglas de integridad', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(77, 'MET75', 'Evaluación anual del código de ética, código de conducta y reglas de integridad', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(78, 'MET76', 'Capacitación de Servidores públicos en materia de ética y cultura de la denuncia', '', 'Capacitación', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(79, 'MET77', 'Capacitación de Servidores públicos en la implementación de la política estatal anticorrupción', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(80, 'MET78', 'Entrega de reconocimientos a servidores públicos que fomentan una cultura de ética', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(81, 'MET79', 'Evaluación al Comité de Ética', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(82, 'MET80', 'Elaboración del Informe Anual de Ética', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(83, 'MET81', 'Celebrar sesiones del Comité de Transparencia', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(84, 'MET82', 'Integración de los Proyectos de Sistematización y actualización de la información', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(85, 'MET83', 'Seguimiento al cumplimiento de los Proyectos de Sistematización y actualización de la información', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(86, 'MET84', 'Validación de actualización trimestral del IPOMEX', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(87, 'MET85', 'Atención a solicitudes de información a través de: SAIMEX y SARCOEM', '', 'Solicutud', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(88, 'MET86', 'Celebrar sesiones del Comité Interno de COCODI', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(89, 'MET87', 'Reporte trimestral de Programa de Trabajo de Control Interno y de Administración de Riesgos', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(90, 'MET88', 'Elaboración del Reporte Anual del Programa de Trabajo de Control Interno y de Administración de Riesgos', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(91, 'MET89', 'Elaboración del anteproyecto de presupuesto', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(92, 'MET64', 'Variación de convenios operantes.', '', 'Convenio', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:15:09'),
(93, 'MET65', 'Análisis de ordenamientos elaborados.', '', 'Documento', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:15:41'),
(94, 'MET66', 'Actualización de ordenamientos jurídicos realizadas.', '', 'Documento', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:16:18'),
(95, 'MET67', 'Nuevos ordenamientos elaborados y difundidos.', '', 'Protocolo', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:17:31'),
(96, 'MET94', 'Auditoría de vigilancia de la NMX-R-025-2015 en Igualdad Laboral y no Discriminación', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(97, 'MET95', 'Comité de Igualdad Laboral y no Discriminación', '', 'Sesión', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(98, 'MET68', 'Tasa bruta de matriculación en la UTVT', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:18:22'),
(99, 'MET69', 'Tasa de participación en programas de educación profesionales y tecnológicos en la UTVT en personas de 18-24 años en los últimos 12 meses, por sexo en la Zona de Influencia', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:19:12'),
(100, 'MET70', 'Porcentaje de jóvenes y adultos inscritos en la UTVT que han alcanzado al menos un nivel mínimo de competencia digital de B1,', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:20:09'),
(101, 'MET71', 'Tasa de logros educativos de jóvenes y adultos por grupo de edad, actividad económica, nivel educativo y orientación del programa (eficiencia terminal).', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:20:40'),
(102, 'MET72', 'Tasa de egresados competentes por programa educativo.', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:22:51'),
(103, 'MET73', 'Instrumentos para el ingreso por competencias diseñados.', '', 'Evaluación', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:31:16'),
(104, 'MET74', 'Instrumentos para el ingreso por competencias implementados.', '', 'Evaluación', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:31:58'),
(105, 'MET75', 'Instrumentos para el ingreso por competencias actualizados.', '', 'Evaluación', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:33:04'),
(106, 'MET76', 'Valoración cuantitativa y cualitativa de perfiles vocacionales de candidatos a ingreso.', '', 'Evaluación', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:33:38'),
(107, 'MET77', 'Tasa de cursos por competencias diseñado por programa educativo.', '', 'Curso', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:34:05'),
(108, 'MET78', 'Tasa de cursos por competencias impartido por programa educativo.', '', 'Curso', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:34:35'),
(109, 'MET79', 'Tasa de cursos por competencias actualizado por programa educativo.', '', 'Curso', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:35:05'),
(110, 'MET80', 'Tasa de programas educativos con examen de egreso basado en competencias', '', 'Curso', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:36:01'),
(111, 'MET81', 'Porcentaje de egresados con examen de egreso por competencias aprobado por programa educativo', '', 'Evaluación', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:37:15'),
(112, 'MET82', 'Grado de coincidencia entre necesidades de las organizaciones y perfiles de alumnos en estadía.', '', 'Evaluación', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:38:06'),
(113, 'MET83', 'Investigaciones desarrolladas por docentes y alumnos de la UTVT.', '', 'Investigación', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:38:42'),
(114, 'MET84', 'Artículos e investigaciones en revistas científicas indizadas.', '', 'Investigación', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:39:17'),
(115, 'MET85', 'Artículos e investigaciones en revistas arbitrarias.', '', 'Investigación', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:40:11'),
(116, 'MET86', 'Proporción de grupos entre 25 y 35 alumnos', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:40:45'),
(117, 'MET87', 'Capacidad instalada por turno.', '', 'Inmueble', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:42:10'),
(118, 'MET88', 'Vacantes ofertadas por programa educativo en el ciclo escolar n cuatrimestre septiembre-diciembre.', '', 'Inmueble', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:43:01'),
(119, 'MET89', 'Alumnos que egresan por programa educativo en el ciclo escolar n-1 cuatrimestre enero-abril (ING).', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:43:40'),
(120, 'MET90', 'Alumnos que egresan por programa educativo en el ciclo escolar n-1 cuatrimestre mayo-agosto (TSU).', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:44:30'),
(121, 'MET91', 'Alumnos de TSU por programa educativo en el ciclo escolar n-1 cuatrimestre enero-abril dados de baja o no reinscritos.', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:45:40'),
(122, 'MET92', 'Alumnos de Ingeniería por programa educativo en el ciclo escolar n-1 cuatrimestre enero-abril dados de baja o no reinscritos.', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:46:13'),
(123, 'MET93', 'Alumnos de TSU por programa educativo en el ciclo escolar n-1 cuatrimestre mayo-agosto dados de baja o no reinscritos.', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:47:17'),
(124, 'MET94', 'Alumnos de Ingeniería por programa educativo en el ciclo escolar n-1 cuatrimestre mayo-agosto dados de baja o no inscritos.', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:47:53'),
(125, 'MET95', 'Número de grupos aperturados por cuatrimestre por programa educativo para TSU e Ingeniería por cuatrimestre.', '', 'Aula', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:48:42'),
(126, 'MET96', 'Tasa de crecimiento de matrícula ciclo n.', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:51:17'),
(127, 'MET97', 'Diferencial entre la tasa de crecimiento alcanzada contra el pronóstico de 3.75% anual', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:52:01'),
(128, 'MET98', 'Porcentaje de actualización de acervo bibliográfico.', '', 'Artículo', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:52:37'),
(129, 'MET99', 'Eventos académicos realizados.', '', 'Evento', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:53:17'),
(130, 'MET100', 'Juntas de academia realizadas.', '', 'Reunión', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:54:00'),
(131, 'MET101', 'Reuniones colegiadas realizadas.', '', 'Reunión', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:54:23'),
(132, 'MET102', 'Variación en el tipo de becas ofertadas.', '', 'Beca', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:54:54'),
(133, 'MET103', 'Evaluaciones externas del PAE para la UTVT realizadas.', '', 'Evaluación', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:55:31'),
(134, 'MET104', 'Indicadores socioeconómicos de la región actualizados anualmente.', '', 'Estudio', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:56:02'),
(135, 'MET105', 'Estudios de factibilidad y de mercado para carreras de la Universidad realizados.', '', 'Estudio', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:56:32'),
(136, 'MET106', 'Tasa de coincidencia del perfil de egreso con las competencias del egresado.', '', 'Egresado', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-25 23:57:08'),
(137, 'MET107', 'Tasa de egresados competentes por programa educativo.', '', 'Documento', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 00:01:02'),
(138, 'MET108', 'Índice de factibilidad y calidad laboral del programa educativo x.', '', 'Programa', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 00:01:58'),
(139, 'MET109', 'Tasa de planeaciones didácticas adecuadas a necesidades regionales.', '', 'Programa', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 00:02:52'),
(140, 'MET110', 'Tasa de actualización de programas educativos.', '', 'Programa', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 00:03:31'),
(141, 'MET111', 'Tasa de actualización de planes educativos.', '', 'Programa', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 00:04:24'),
(142, 'MET112', 'Tasa de programas educativos con contenidos validados por el sector público, privado y social.', '', 'Documento', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 15:44:07'),
(143, 'MET113', 'Tasa de programas educativos con contenidos validados por el sector público, privado y social.', '', 'Programa', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 15:49:54'),
(144, 'MET114', 'Promedio de satisfacción de la capacidad del egresado para desempeñar su trabajo adecuadamente por programa educativo.', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 15:50:31'),
(145, 'MET115', 'Proporción de Profesores de tiempo completo (PTC).', '', 'Docente', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 15:51:10'),
(146, 'MET116', 'Proporción de Profesores con estudios de posgrado: maestría y doctorado a fin al programa educativo x.', '', 'Docente', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 15:51:53'),
(147, 'MET117', 'Proporción de Profesores capacitados por la UTVT en temas afines a su docencia.', '', 'Docente', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 15:52:26'),
(148, 'MET118', 'Proporción de PTC´s con Licenciatura becados para estudiar Maestría.', '', 'Docente', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 15:52:56'),
(149, 'MET119', 'Proporción de PTC´s con Maestría becados para estudiar Doctorado.', '', 'Docente', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 15:54:00'),
(150, 'MET120', 'Proporción de PTC´s con posgrado par programa educativo.', '', 'Docente', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 15:55:26'),
(151, 'MET121', 'Cantidad de alumnos por PTC con posgrado por programa educativo.', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 15:56:04'),
(152, 'MET122', 'Proporción de Docentes (PTC y PA) capacitados en habilidades y técnicas didácticas por cuatrimestre.', '', 'Docente', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 15:56:36'),
(153, 'MET123', 'Total de alumnos en educación dual por año y programa educativo.', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 15:57:07'),
(154, 'MET124', 'Variación de alumnos en educación dual por año', '', 'Estudiante', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 15:58:42'),
(155, 'MET125', 'Tasa de logros educativos de jóvenes y adultos por grupo de edad, actividad económica, nivel educativo y orientación del programa (eficiencia terminal).', '', 'Egresado', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 15:59:19'),
(156, 'MET126', 'Porcentaje de estudiantes con algún tipo de beca.', '', 'Beneficiario', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 15:59:55'),
(157, 'MET127', 'Cobertura de la bibliografía básica y complementaria mencionada en los programas de asignatura de los planes de estudio.', '', 'Biblioteca', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 16:00:43'),
(158, 'MET156', 'Porcentaje de estudiantes con algún tipo de beca', '', 'Beneficiario', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(159, 'MET157', 'Cobertura de la bibliografía básica y complementaria mencionada en los programas de asignatura de los planes de estudio', '', 'Biblioteca', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(160, 'MET158', 'Promedio de satisfacción de los estudiantes con los servicios de apoyo psicológico de la UTVT', '', 'Biblioteca', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(161, 'MET159', 'Firma de Convenios con el Sector Productivo y de Servicios', '', 'Convenio', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(162, 'MET160', 'Empleabilidad de Egresados del Modelo de Educación Dual', '', 'Egresado empleado', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(163, 'MET161', 'Reuniones con representantes estudiantiles “Charla entre cuervos\"', '', 'Reunión', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(164, 'MET128', 'Proporción de estudiantes que participan en actividades culturales, deportivas o de otra índole.', '', 'Alumno', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 16:04:09'),
(165, 'MET129', 'Número de estudiantes que participan regularmente en Actividades culturales, cívicas, de equidad de género, prevención de la violencia y derechos humanos.', '', 'Alumno', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 16:04:47'),
(166, 'MET130', 'Actividades deportivas organizadas y difundidas.', '', 'Actuación', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 16:09:43'),
(167, 'MET165', 'Publicación y actualización de información general en la página web de la Universidad', '', 'Beneficiario', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(168, 'MET166', 'Publicación de información en la página de Facebook y Twitter (Notas informativas)', '', 'Biblioteca', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(169, 'MET167', 'Diseño de Campaña Publicitaria de la Convocatoria de Ingreso 2021 (Evidencia Digital del Diseño)', '', 'Beneficiario', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(170, 'MET168', 'Difusión a las IEMS de manera virtual sobre el modelo educativo de la universidad (Plática Virtual y/o presencial)', '', 'Publicación', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(171, 'MET169', 'Asistencia de manera virtual a exposiciones organizadas por IEMS para dar a conocer la convocatoria (Expo virtual y/o presencial)', '', 'Publicación', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(172, 'MET170', 'Publicación y actualización de información general en la página web de la Universidad (comprobaciones fiscales)', '', 'Publicación', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(173, 'MET171', 'Orientación informativa a través de la página oficial de Facebook, Twitter e Instagram (Captura de pantalla)', '', 'Publicación', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(174, 'MET172', 'Diseño de diversos materiales (credenciales de estudiantes y personal, corbatines, carteles, folletos, volantes, efemérides, lonas, vinilonas, pendones y banners) (Evidencia digital del diseño)', '', 'Publicación', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(175, 'MET173', 'Diseño de convocatorias culturales y deportivas y Educación Continua. (Evidencia digital del diseño)', '', 'Publicación', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(176, 'MET174', 'Difusión de Educación Dual', '', 'Publicación', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(177, 'MET175', 'Actualización en la plataforma IPOMEX cada trimestre. (Evidencia digital de la actualización)', '', 'Publicación', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(178, 'MET176', 'Realización de videos institucionales (Evidencia digital)', '', 'Publicación', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(179, 'MET177', 'Realización del informe anual de Rectoría 2024 (Evidencia digital del diseño y/o video)', '', 'Publicación', 4, 1, 2, '2024-03-06 18:04:32', '2024-04-26 22:15:37'),
(180, 'MET178', 'Solicitud de dictamen técnico de la Convocatoria de Ingreso 2024 (Evidencia digital del oficio)', '', 'Publicación', 4, 1, 2, '2024-03-06 18:04:32', '2024-04-26 22:17:19'),
(181, 'MET179', 'Campaña \"Promocional de los Programas Educativos\"', '', 'Publicación', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(182, 'MET180', 'Publicación de convocatorias internas y externas en la página web de la Universidad', '', 'Publicación', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(183, 'MET181', 'Realización de \"Podcast Universitarios\"', '', 'Publicación', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(184, 'MET182', 'Campaña \"Aniversario XXIII UTVT\"', '', 'Publicación', 4, 1, 2, '2024-03-06 18:04:32', '2024-04-26 22:40:09'),
(185, 'MET131', 'Número de estudiantes que participan regularmente en Actividades deportivas.', '', 'Alumno', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 16:10:43'),
(186, 'MET132', 'Número de actividades de difusión realizadas.', '', 'Publicación', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 16:12:34'),
(187, 'MET133', 'Número de actualizaciones a la página web de la universidad y redes sociales realizadas.', '', 'Publicación', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 16:13:11'),
(188, 'MET134', 'Actividades de identidad universitaria realizadas.', '', 'Publicación', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 16:13:49'),
(189, 'MET135', 'Actividades de identidad universitaria realizadas.', '', 'Curso', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 17:24:01'),
(190, 'MET136', 'Actividades de identidad universitaria realizadas.', '', 'Convocatoria', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 17:24:45'),
(191, 'MET137', 'Beneficios obtenidos para la UTVT a partir de convenios.', '', 'Convenio', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 17:27:10'),
(192, 'MET138', 'Monto económico generado por convenios.', '', 'Convenio', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 17:28:09'),
(193, 'MET139', 'Alumnos en movilidad universitaria por tipo.', '', 'Alumno', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 17:28:46'),
(194, 'MET140', 'Vacantes ofertadas en la Bolsa de Trabajo de la UTVT por semestre.', '', 'Empleo', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 17:29:22'),
(195, 'MET193', 'Prestar servicios tecnológicos de laboratorios al sector público, privado y social', '', 'Servicio', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(196, 'MET194', 'Difusión y promoción de servicios tecnológicos en los sectores público, privado y social', '', 'Visita', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(197, 'MET141', 'Variación de convenios operantes.', '', 'Convenio', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 17:35:45'),
(198, 'MET142', 'Servicios tecnológicos prestados a externos.', '', 'Servicio', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 17:37:42'),
(199, 'MET143', 'Ingresos generados por servicios tecnológicos prestados a externos.', '', 'Informe', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 17:38:46'),
(200, 'MET198', 'Asesorías a Proyectos en proceso de incubación', '', 'Asesoría', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(201, 'MET199', 'Asesorías en Propiedad intelectual', '', 'Asesoría', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(202, 'MET200', 'Registros de marca', '', 'Trámite', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(203, 'MET201', 'Desarrollo e implementación de un Programa de Cursos, Asesorías, y de Servicios de Emprendimiento', '', 'Programa', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(204, 'MET144', 'Actividades de servicios tecnológicos organizadas y difundidas.', '', 'Actividades', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 17:55:29'),
(205, 'MET145', 'Variación de egresados ocupados con Nivel Salarial F.', '', 'Egresado', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:00:37'),
(206, 'MET146', 'Certificaciones de los Estándares de Competencia Laboral de CONOCER otorgadas a externos.', '', 'Certificado', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:11:38'),
(207, 'MET205', 'Cursos de alineación de estándar de competencia', '', 'Curso', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(208, 'MET206', 'Entrega de certificados de competencia Laboral', '', 'Trámite', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(209, 'MET207', 'Auditoría externa anual de la Entidad de Certificación y Evaluación por parte de CONOCER', '', 'Auditoría', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(210, 'MET147', 'Ingresos generados por servicios de Certificación de Estándares de Competencia Laboral de CONOCER otorgados a externos.', '', 'Informe', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:13:56'),
(211, 'MET148', 'Proporción de egresados con al menos un Estándar de Competencia Laboral Certificado por CONOCER por promoción educativa.', '', 'Certificado', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:18:47'),
(212, 'MET149', 'Servicios de innovación, desarrollo de negocios y emprendimiento entregados a externos.', '', 'Asesoría', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:19:26'),
(213, 'MET150', 'Ingresos generados por servicios de innovación, desarrollo de negocios y emprendimiento entregados a externos.', '', 'Informe', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:20:02'),
(214, 'MET151', 'Cursos de capacitación del SGI impartidos al personal.', '', 'Curso', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:20:31'),
(215, 'MET152', 'Acciones de difusión del SGI realizadas.', '', 'Capacitación', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:21:12'),
(216, 'MET153', 'Número de mejoras implementadas.', '', 'Documento', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:22:09'),
(217, 'MET154', 'Número de auditorías y evaluaciones al SGI realizadas.', '', 'Auditoría Interna', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:22:52'),
(218, 'MET216', 'Pago de nómina', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(219, 'MET217', 'Pago mensual de plazas', '', 'Reporte', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(220, 'MET218', 'Reporte OSFEM', '', 'Reporte', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(221, 'MET219', 'Reporte Artículo 37', '', 'Reporte', 4, 1, 2, '2024-03-06 18:04:32', '2024-04-26 22:52:25'),
(222, 'MET220', 'Trámite de pago ISR', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(223, 'MET221', 'Trámite de pago ISSEMYM', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(224, 'MET155', 'Número de auditorías y evaluaciones al SGI realizadas.', '', 'Auditoría Externa', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:23:41'),
(225, 'MET156', 'Cobertura de equipos de cómputo en aulas.', '', 'Equipo de Cómputo', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:24:18'),
(226, 'MET157', 'Estados financieros dictaminados.', '', 'Documento', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:25:06'),
(227, 'MET158', 'Porcentaje del presupuesto ejercido contra autorizado.', '', 'Porcentaje', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:26:09'),
(228, 'MET159', 'Número de cursos de capacitación administrativa ofertados.', '', 'Persona', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:27:42'),
(229, 'MET160', 'Porcentaje de personal administrativo con al menos un curso de capacitación semestral al año.', '', 'Persona', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:28:40');
INSERT INTO `tb_metas` (`id_meta`, `clave`, `nombre`, `descripcion`, `unidadmedida`, `programa_id`, `activo`, `id_registro`, `created_at`, `updated_at`) VALUES
(230, 'MET228', 'Revisar y proporcionar información al sistema IPOMEX', '', 'Programa', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(231, 'MET229', 'Establecer estrategias para la recepción ordenada del formato R-GRE01', '', 'Documento', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(232, 'MET230', 'Realizar Informe entradas y salidas de almacén', '', 'Informe', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(233, 'MET231', 'Registro en el Sistema de Trazabilidad del Estado de México', '', 'Informe', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(234, 'MET232', 'Comité de Adquisiciones y Servicios', '', 'Informe', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(235, 'MET233', 'Comité de Adquisiciones, Arrendamientos y Servicios', '', 'Informe', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(236, 'MET161', 'Personal administrativo certificado en sus funciones.', '', 'Persona', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:29:39'),
(237, 'MET162', 'Control de inventarios físicos anuales realizados.', '', 'Acta', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:32:08'),
(238, 'MET163', 'Licitaciones públicas realizadas.', '', 'Acta', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:32:41'),
(239, 'MET164', 'Procesos adquisitivos. Realizados en tiempo y forma.', '', 'Documento', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 18:37:00'),
(240, 'MET238', 'Actualización de IPOMEX', '', 'Informe', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(241, 'MET239', 'Mantenimiento a infraestructura de acuerdo a los requisitos de la Norma Mexicana NMX-R-025-SCFI-2015, en Igualdad General y no Discriminación', '', 'Informe', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(242, 'MET165', 'Total de equipos y máquinas de laboratorio con más de 5 años de vida por cuatrimestre.', '', 'Informe', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 19:46:40'),
(243, 'MET166', 'Proporción de cubículos por PTC´s.', '', 'Servicio', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 19:51:35'),
(244, 'MET167', 'Salas de maestros por programa educativo.', '', 'Servicio', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 19:52:43'),
(245, 'MET168', 'Cobertura de instalaciones con mantenimiento preventivo por año.', '', 'Informe', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 19:55:37'),
(246, 'MET169', 'Cobertura de instalaciones con mantenimiento correctivo por año.', '', 'Servicio', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 19:57:31'),
(247, 'MET170', 'Total de equipos de cómputo con más de 3 años de vida por cuatrimestre.', '', 'Equipo de Cómputo', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 19:58:57'),
(248, 'MET171', 'Tasa de obsolencia de equipos de cómputo.', '', 'Equipo de Cómputo', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 20:00:16'),
(249, 'MET172', 'Total de equipos de cómputo.', '', 'Equipo de Cómputo', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 20:01:37'),
(250, 'MET173', 'Cobertura de equipos de cómputo pata PTC´s.', '', 'Equipo de Cómputo', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 20:02:27'),
(251, 'MET174', 'Cobertura de equipos de cómputo para PA´s.', '', 'Equipo de Cómputo', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 20:08:45'),
(252, 'MET175', 'Cobertura de equipos de cómputo para Personal Administrativo.', '', 'Equipo de Cómputo', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 20:10:31'),
(253, 'MET176', 'Cobertura de equipos de cómputo para Directivos.', '', 'Equipo de Cómputo', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 20:11:16'),
(254, 'MET177', 'Cobertura de equipos de cómputo en espacios comunes (auditorios, salas, etc.).', '', 'Equipo de Cómputo', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 20:11:53'),
(255, 'MET178', 'Total de equipos audiovisuales con más de tres años de vida por cuatrimestre.', '', 'Equipo de Cómputo', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 20:12:53'),
(256, 'MET179', 'Tasa de obsolencia de equipos audiovisuales.', '', 'Porcentaje', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 20:13:25'),
(257, 'MET180', 'Cobertura de equipos audiovisuales en aulas, laboratorios, auditorios y salas de juntas.', '', 'Porcentaje', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 20:14:01'),
(258, 'MET181', 'Porcentaje de equipos de cómputo con conexión a internet.', '', 'Porcentaje', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 20:16:04'),
(259, 'MET257', 'Sesiones Ordinarias Comité Interno de Gobierno Digital', '', 'Servicio', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(260, 'MET258', 'Mantenimiento preventivo a Servidores', '', 'Servicio', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(261, 'MET259', 'Mantenimiento preventivo a infraestructura de Señalización Digital', '', 'Servicio', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(262, 'MET260', 'Mantenimiento preventivo a infraestructura de Redes', '', 'Servicio', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(263, 'MET261', 'Mantenimiento preventivo a infraestructura exterior de CCTV', '', 'Servicio', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(264, 'MET262', 'Mantenimiento preventivo a infraestructura de Telefonía', '', 'Servicio', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(265, 'MET263', 'Presentación de la Norma Mexicana en Igualdad Laboral y No Discriminación (NMX-R-025-SCFI-2015) impartida a todo el personal adscrito al Departamento de Sistemas', '', 'Capacitación', 4, 1, 1, '2024-03-06 18:04:32', '2024-03-06 18:04:32'),
(266, 'MET182', 'Promedio de velocidad de conexión wifi en el campus.', '', 'Velocidad en kbps', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 21:03:40'),
(267, 'MET183', 'Tasa de variación en el incremento del promedio anual de velocidad de conexión wifi en el campus.', '', 'Porcentaje', 3, 1, 2, '2024-03-06 18:04:32', '2024-04-26 21:53:22'),
(268, 'MET184', 'Relación de software adquirido.', NULL, 'Software', 3, 1, 2, '2024-04-26 21:57:47', '2024-04-26 21:57:47'),
(269, 'MET185', 'Inventario de software instalado en equipos de cómputo.', NULL, 'Software', 3, 1, 2, '2024-04-26 21:58:49', '2024-04-26 21:58:49'),
(270, 'MET186', 'Porcentaje de software con licencia utilizado en equipos de cómputo.', NULL, 'Porcentaje', 3, 1, 2, '2024-04-26 21:59:28', '2024-04-26 21:59:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_programas`
--

CREATE TABLE `tb_programas` (
  `id_programa` int(10) UNSIGNED NOT NULL,
  `abreviatura` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_programas`
--

INSERT INTO `tb_programas` (`id_programa`, `abreviatura`, `nombre`, `descripcion`, `activo`, `id_registro`, `created_at`, `updated_at`) VALUES
(1, 'SIPREP', 'Sistema de Planeación y Presupuesto', 'La Subsecretaría de Planeación y Presupuesto, a través de la Unidad de Sistemas e Informática, ha puesto a disposición de las Unidades Responsables y Ejecutoras, el acceso vía Internet al Sistema de Planeación y Presupuesto (SIPREP), en el que registran y procesan las actividades de cada institución, mediante él se da seguimiento al proceso de ejecución del presupuesto autorizado para el ejercicio corriente.', 1, 2, '2024-03-06 18:04:30', '2024-04-24 17:30:45'),
(2, 'POA Federal', 'Programa Operativo Anual', 'Instrumento de planeación táctica que funciona a corto plazo el cual contribuye a las funciones sustantivas y adjetivas de las políticas institucionales. En él se establecen los objetivos, estrategias y acciones de la institución.', 1, 2, '2024-03-06 18:04:30', '2024-04-24 17:41:32'),
(3, 'PIDE', 'Programa Institucional de Desarrollo', 'Es el resultado del ejercicio de planeación estratégica y participativa a mediano plazo, mediante el cual se fijan objetivos, metas, estrategias, prioridades; se asignarán recursos, responsabilidades y tiempos de ejecución, se coordinarán acciones y se evaluarán los resultados mediante indicadores de resultados.', 1, 2, '2024-03-06 18:04:30', '2024-04-24 21:05:31'),
(4, 'PROPIAS', 'UTVT', 'El Programa Anual de Trabajo es el instrumento operativo de planeación en el cual se plasman de forma ordenada y lógica los compromisos de trabajo que serán realizados a lo largo de un año por las por las distintas Unidades Administrativas de la Institución, a través del cual se contemplan las actividades a realizar durante el ejercicio 2024, con el objetivo, estrategias y líneas de acción del Plan Institucional de Desarrollo (PIDE); considerando acciones del Programa Operativo Anual Federal (POA) y el Sistema de Planeación y Presupuesto (SIPREP), con la finalidad monitorear el avance en el cumplimiento de nuestras actividades.', 1, 2, '2024-03-06 18:04:30', '2024-05-20 20:41:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipos`
--

CREATE TABLE `tb_tipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `clave` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_tipos`
--

INSERT INTO `tb_tipos` (`id`, `clave`, `nombre`, `descripcion`, `activo`, `id_registro`, `created_at`, `updated_at`) VALUES
(1, 'TIP1', 'Administrador', 'Tiene acceso total al sistema', 1, 1, '2024-03-06 18:05:29', '2024-03-06 18:05:29'),
(2, 'TIP2', 'Administrador de Plataforma', 'Tiene acceso total al sistema', 1, 1, '2024-03-06 18:05:29', '2024-03-06 18:05:29'),
(3, 'TIP3', 'Encargado de Área', 'Tiene acceso total al sistema', 1, 1, '2024-03-06 18:05:29', '2024-03-06 18:05:29'),
(4, 'TIP4', 'Secretaria', 'Solo tiene acceso al apartado de Metas y gráficas', 1, 1, '2024-03-06 18:05:29', '2024-03-06 18:05:29'),
(5, 'TIP5', 'Invitado', 'Solo puede ver el contenido en gráficas', 1, 1, '2024-03-06 18:05:29', '2024-03-06 18:05:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clave` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gen` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fn` date NOT NULL,
  `academico` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tipo` int(10) UNSIGNED NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `clave`, `nombre`, `app`, `apm`, `gen`, `fn`, `academico`, `foto`, `email`, `email_verified_at`, `password`, `remember_token`, `id_tipo`, `activo`, `id_registro`, `created_at`, `updated_at`) VALUES
(1, 'URS1', 'Jimena', 'Diaz', 'De Los Santos', 'F', '2003-02-24', 'TSU Área Dasarrollo de Software Multiplataforma', 'cuervo.png', 'al222110707@gmail.com', NULL, '$2y$10$TR/I9CA9abwuokfikWaR/ONlJd8r3phpGOq4UC3i4/TjIvC0iwX/y', NULL, 1, 1, 1, '2024-06-02 06:46:41', '2024-06-02 06:46:41'),
(2, 'URS2', 'Jossue Alejandro', 'Candelas', 'Hernandez', 'M', '2003-06-17', 'TSU Área Dasarrollo de Software Multiplataforma', 'cuervo.png', 'al222110811@gmail.com', NULL, '$2y$10$tf85VAeOp3/Tw9cksU0Hwu2XwiBKNJX5iBhFDQMnvw3zc1ZC/Nnta', NULL, 1, 1, 1, '2024-06-02 06:46:42', '2024-06-02 06:46:42'),
(3, 'URS3', 'Miguel Emmanuel', 'Arriola', 'Ortega', 'M', '2003-05-01', 'TSU Área Dasarrollo de Software Multiplataforma', 'cuervo.png', 'al222010230@gmail.com', NULL, '$2y$10$zpl9eTX/.YDBEd5gM/dkguFoTjlmBzEk8Yb9gHg8gBru6rFUuknze', NULL, 1, 1, 1, '2024-06-02 06:46:42', '2024-06-02 06:46:42'),
(4, 'URS4', 'Juan Carlos', 'Lopez', 'Alarcon', 'M', '1998-09-04', 'TSU Área Dasarrollo de Software Multiplataforma', 'cuervo.png', 'al222220002@gmail.com', NULL, '$2y$10$lpCbXK6ry03BlvIv4fj0eOzNetfz4dx/vavGuCR/YUv4BJs/zcI2y', NULL, 1, 1, 1, '2024-06-02 06:46:42', '2024-06-02 06:46:42'),
(5, 'URS5', 'Christopher Dan', 'Zarate', 'Bedolla', 'M', '1999-12-05', 'TSU Área Dasarrollo de Software Multiplataforma', 'cuervo.png', 'al222111400@gmail.com', NULL, '$2y$10$Yb46p1Z8ATE/BB/wXy6VsekyL5KGvexMa2v4b//AUl3Et2zO5i/YW', NULL, 1, 1, 1, '2024-06-02 06:46:42', '2024-06-02 06:46:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `tb_areas`
--
ALTER TABLE `tb_areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `tb_areasmetas`
--
ALTER TABLE `tb_areasmetas`
  ADD PRIMARY KEY (`id_areasmetas`),
  ADD KEY `tb_areasmetas_area_id_foreign` (`area_id`),
  ADD KEY `tb_areasmetas_meta_id_foreign` (`meta_id`),
  ADD KEY `tb_areasmetas_id_programa_foreign` (`id_programa`);

--
-- Indices de la tabla `tb_areasusuarios`
--
ALTER TABLE `tb_areasusuarios`
  ADD PRIMARY KEY (`id_areasusuarios`),
  ADD KEY `tb_areasusuarios_area_id_foreign` (`area_id`),
  ADD KEY `tb_areasusuarios_usuario_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `tb_calendarizars`
--
ALTER TABLE `tb_calendarizars`
  ADD PRIMARY KEY (`id_calendario`),
  ADD KEY `tb_calendarizars_areameta_id_foreign` (`areameta_id`),
  ADD KEY `tb_calendarizars_meses_id_foreign` (`meses_id`);

--
-- Indices de la tabla `tb_correo`
--
ALTER TABLE `tb_correo`
  ADD PRIMARY KEY (`id_correo`);

--
-- Indices de la tabla `tb_entregas`
--
ALTER TABLE `tb_entregas`
  ADD PRIMARY KEY (`id_entregas`),
  ADD KEY `tb_entregas_areameta_id_foreign` (`areameta_id`),
  ADD KEY `tb_entregas_meses_id_foreign` (`meses_id`);

--
-- Indices de la tabla `tb_meses`
--
ALTER TABLE `tb_meses`
  ADD PRIMARY KEY (`id_meses`);

--
-- Indices de la tabla `tb_metas`
--
ALTER TABLE `tb_metas`
  ADD PRIMARY KEY (`id_meta`),
  ADD KEY `tb_metas_programa_id_foreign` (`programa_id`);

--
-- Indices de la tabla `tb_programas`
--
ALTER TABLE `tb_programas`
  ADD PRIMARY KEY (`id_programa`);

--
-- Indices de la tabla `tb_tipos`
--
ALTER TABLE `tb_tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_tipo_foreign` (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_areas`
--
ALTER TABLE `tb_areas`
  MODIFY `id_area` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tb_tipos`
--
ALTER TABLE `tb_tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_tipo_foreign` FOREIGN KEY (`id_tipo`) REFERENCES `tb_tipos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
