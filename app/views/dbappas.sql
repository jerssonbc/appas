-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2015 a las 10:02:05
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dbappas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_04_29_102328_crear_tabla_tbla_estado', 1),
('2015_04_29_103405_crear_tabla_tbla_usuario', 1),
('2015_04_29_112547_crear_tabla_tbla_empresa', 1),
('2015_04_29_115109_crear_tabla_tbla_direccionamientoestrategico', 1),
('2015_04_29_115859_crear_tabla_tbla_estrategia', 1),
('2015_04_29_120523_crear_tabla_tbla_planauditoria', 1),
('2015_05_07_042344_crear_tabla_tbla_normativa_institucional', 1),
('2015_05_07_043011_crear_tabla_tbla_marco_ref_internacional', 1),
('2015_05_07_043041_crear_tabla_tbla_marco_ref_nacional', 1),
('2015_05_07_043156_crear_tabla_tbla_objetivos_especificos', 1),
('2015_05_14_043730_crear_tabla_tbla_cargo', 1),
('2015_05_14_044038_crear_tabla_tbla_perfilequipo', 1),
('2015_05_14_044207_crear_tabla_tbla_perfil', 1),
('2015_05_14_044236_crear_tabla_tbla_auditor', 1),
('2015_05_14_044319_crear_tabla_tbla_limitacion', 1),
('2015_05_14_044407_crear_tabla_tbla_tipoaclaracion', 1),
('2015_05_14_044437_crear_tabla_tbla_aclaracion', 1),
('2015_05_26_195635_crear_tabla_tbla_auditor_cargo', 1),
('2015_05_28_100406_crear_tabla_tbla_personaentrevistar', 2),
('2015_05_28_121422_crear_tabla_tbla_pruebacumplimiento', 3),
('2015_05_28_121514_crear_tabla_tbla_preguntacumplimiento', 3),
('2015_06_25_122714_create_tbla_deta_pcumplimiento_minternacional', 4),
('2015_06_25_123146_create_tbla_deta_pcumplimiento_mnacional', 5),
('2015_06_25_125555_create_tbla_deta_pcniupdate', 6),
('2015_06_25_130454_create_tbla_deta_pcmiupdate', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_aclaracion`
--

CREATE TABLE IF NOT EXISTS `tbla_aclaracion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aclaracion` text COLLATE utf8_unicode_ci NOT NULL,
  `planauditoria_id` int(10) unsigned NOT NULL,
  `tipoaclaracion_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_aclaracion_planauditoria_id_foreign` (`planauditoria_id`),
  KEY `tbla_aclaracion_tipoaclaracion_id_foreign` (`tipoaclaracion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_auditor`
--

CREATE TABLE IF NOT EXISTS `tbla_auditor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `apellidos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dni` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(62) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `carrera_profesional` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `planauditoria_id` int(10) unsigned NOT NULL,
  `perfilequipo_id` int(10) unsigned NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_auditor_planauditoria_id_foreign` (`planauditoria_id`),
  KEY `tbla_auditor_perfilequipo_id_foreign` (`perfilequipo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbla_auditor`
--

INSERT INTO `tbla_auditor` (`id`, `apellidos`, `nombre`, `dni`, `email`, `telefono`, `celular`, `direccion`, `carrera_profesional`, `planauditoria_id`, `perfilequipo_id`, `estado`) VALUES
(1, 'Cortez Valderrama', 'Edgar Orlando', '71491171', 'edgar_ctz@hotmail.com', '415263', '944325641', 'Av Vallejo # 255', 'Ingeniería de Sistemas', 1, 2, 1),
(2, 'Castillo Carranza', 'Masiel', '48106923', 'masiel@gmail.com', '', '968799717', 'Av. Dean Saavedra Mz 59 Lt 4 - El Milagro', 'Ingenería de Sistemas', 1, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_auditor_cargo`
--

CREATE TABLE IF NOT EXISTS `tbla_auditor_cargo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cargo_id` int(10) unsigned NOT NULL,
  `planauditoria_id` int(10) unsigned NOT NULL,
  `auditor_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_auditor_cargo_cargo_id_foreign` (`cargo_id`),
  KEY `tbla_auditor_cargo_planauditoria_id_foreign` (`planauditoria_id`),
  KEY `tbla_auditor_cargo_auditor_id_foreign` (`auditor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_cargo`
--

CREATE TABLE IF NOT EXISTS `tbla_cargo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cargo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbla_cargo`
--

INSERT INTO `tbla_cargo` (`id`, `cargo`) VALUES
(1, 'Jefe de Auditoria'),
(2, 'Auditor Especialista'),
(3, 'Asistente de Auditoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_deta_pc_mi`
--

CREATE TABLE IF NOT EXISTS `tbla_deta_pc_mi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pruebacumplimiento_id` int(10) unsigned NOT NULL,
  `marco_ref_internacional_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_deta_pc_mi_pruebacumplimiento_id_foreign` (`pruebacumplimiento_id`),
  KEY `tbla_deta_pc_mi_marco_ref_internacional_id_foreign` (`marco_ref_internacional_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbla_deta_pc_mi`
--

INSERT INTO `tbla_deta_pc_mi` (`id`, `pruebacumplimiento_id`, `marco_ref_internacional_id`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_deta_pc_mn`
--

CREATE TABLE IF NOT EXISTS `tbla_deta_pc_mn` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pruebacumplimiento_id` int(10) unsigned NOT NULL,
  `marco_ref_nacional_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_deta_pc_mn_pruebacumplimiento_id_foreign` (`pruebacumplimiento_id`),
  KEY `tbla_deta_pc_mn_marco_ref_nacional_id_foreign` (`marco_ref_nacional_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbla_deta_pc_mn`
--

INSERT INTO `tbla_deta_pc_mn` (`id`, `pruebacumplimiento_id`, `marco_ref_nacional_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_deta_pc_ni`
--

CREATE TABLE IF NOT EXISTS `tbla_deta_pc_ni` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pruebacumplimiento_id` int(10) unsigned NOT NULL,
  `normativa_institucional_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_deta_pc_ni_pruebacumplimiento_id_foreign` (`pruebacumplimiento_id`),
  KEY `tbla_deta_pc_ni_normativa_institucional_id_foreign` (`normativa_institucional_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_direccionamientoestrategico`
--

CREATE TABLE IF NOT EXISTS `tbla_direccionamientoestrategico` (
  `empresa_id` int(10) unsigned NOT NULL,
  `mision` text COLLATE utf8_unicode_ci NOT NULL,
  `vision` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`empresa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbla_direccionamientoestrategico`
--

INSERT INTO `tbla_direccionamientoestrategico` (`empresa_id`, `mision`, `vision`) VALUES
(1, 'Nuestra misión es proporcionar a nuestros clientes personales y empresariales  equipos y accesorios de cómputo de alta calidad y  brindar un excelente servicio de reparación y mantenimiento de estos tipos de equipos y accesorios.', 'Ser reconocida como una de las 5 empresas líder a nivel de la región norte del país en la venta de equipos y accesorios de cómputo y poseedora de excelentes servicios de mantenimiento y reparación de estos mismo productos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_empresa`
--

CREATE TABLE IF NOT EXISTS `tbla_empresa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int(10) unsigned NOT NULL,
  `razon_social` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `giro_negocio` text COLLATE utf8_unicode_ci NOT NULL,
  `resena_historica` text COLLATE utf8_unicode_ci NOT NULL,
  `ug_latitud` decimal(9,2) DEFAULT NULL,
  `ug_longitud` decimal(9,2) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tbla_empresa_usuario_id_foreign` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tbla_empresa`
--

INSERT INTO `tbla_empresa` (`id`, `usuario_id`, `razon_social`, `giro_negocio`, `resena_historica`, `ug_latitud`, `ug_longitud`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 'COMPU CENTER BUSSINES S.A.C', 'Venta, Mantenimiento y Reparación de Equipos y Accesorios de Cómputo', 'La empresa fue fundada a inicios del año 2003 en la ciudad de Trujillo, distrito y provincia de Trujillo, departamento y región La Libertad. Con la consigna de poder establecer sucursales, oficinas u otras dependencias en cualquier lugar del Perú.\r\n\r\nCon la creciente necesidad de adquisición de productos tecnológicos por parte de los pobladores y empresas dentro medio local y regional, Compu Center desde sus inicios fue posicionándose como una empresa capaz de satisfacer dichas necesidades mediante la comercialización y distribución de productos de calidad que la demanda requería.\r\n\r\nCuenta con local de atención al público y un área de atención al segmento corporativo amplio con una sala de showroom para que puedan ver in situ los equipos en promoción, y la gama de productos de tecnología de la información de última generación. Así mismo contamos con un área de soporte técnico el cual está disponible a cualquier falla de algún equipo o alguna solución a implementar en su empresa.', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Lindley', 'Producción de Bebidas', 'Lindely inicio', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 'Androvición S.A.C', 'Consultoría en Sistemas de Información', 'La empresa se fundo en 2015', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 'Andro Visión', 'Servicio', 'Desde 2001', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 'INKA FARMA', 'Venta de MEDICAMENTO', 'Fundada el Año 1998', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 'Informasles S.A', 'Servicios', 'AA', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_estado`
--

CREATE TABLE IF NOT EXISTS `tbla_estado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbla_estado`
--

INSERT INTO `tbla_estado` (`id`, `estado`) VALUES
(1, 'Desactivado'),
(2, 'Activado'),
(3, 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_estrategia`
--

CREATE TABLE IF NOT EXISTS `tbla_estrategia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estrategia` text COLLATE utf8_unicode_ci NOT NULL,
  `empresa_id` int(10) unsigned NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_estrategia_empresa_id_foreign` (`empresa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbla_estrategia`
--

INSERT INTO `tbla_estrategia` (`id`, `titulo`, `estrategia`, `empresa_id`, `estado`) VALUES
(1, 'Responsabilidad', 'Contar con personal altamente responsable en la oferta, venta de nuestros productos y atención de los servicios solicitados.', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_limitacion`
--

CREATE TABLE IF NOT EXISTS `tbla_limitacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `limitacion` text COLLATE utf8_unicode_ci NOT NULL,
  `planauditoria_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_limitacion_planauditoria_id_foreign` (`planauditoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_marco_ref_internacional`
--

CREATE TABLE IF NOT EXISTS `tbla_marco_ref_internacional` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `planauditoria_id` int(10) unsigned NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_marco_ref_internacional_planauditoria_id_foreign` (`planauditoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbla_marco_ref_internacional`
--

INSERT INTO `tbla_marco_ref_internacional` (`id`, `nombre`, `descripcion`, `planauditoria_id`, `estado`) VALUES
(1, 'COBIT 5 - Supervisar, Evaluar y Valorar (MEA)  MEA02: Supervisar, Evaluar y Valorar el Sistema de Control Interno.', 'Supervisar y evaluar de forma continua el entorno de control, incluyendo tanto autoevaluaciones como revisiones externas independientes. Facilitar a la dirección la identificación de deficiencias e ineficiencias en el control y el inicio de acciones de mejora. Planificar, organizar y mantener normas para la evaluación del control interno y las actividades de aseguramiento', 1, 1),
(2, 'COBIT 5 - Entregar, dar servicio y soporte(DSS) - DSS01: Gestionar las operaciones', 'Un procesamiento de información completo y apropiado requiere de una efectiva administración del procesamiento de datos y del mantenimiento del hardware. Cumplir con los niveles operativos de servicio para procesamiento de datos programado, protección de datos de salida sensitivos y monitoreo y mantenimiento de la infraestructura.', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_marco_ref_nacional`
--

CREATE TABLE IF NOT EXISTS `tbla_marco_ref_nacional` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `planauditoria_id` int(10) unsigned NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_marco_ref_nacional_planauditoria_id_foreign` (`planauditoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbla_marco_ref_nacional`
--

INSERT INTO `tbla_marco_ref_nacional` (`id`, `nombre`, `descripcion`, `planauditoria_id`, `estado`) VALUES
(1, 'NTP-ISO/IEC 27001:2008', 'Proporciona mejores prácticas, recomendaciones sobre la gestión de la seguridad de la información para su uso por parte de los responsables de iniciar, implementar o mantener sistemas de gestión de seguridad de la información.', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_normativa_institucional`
--

CREATE TABLE IF NOT EXISTS `tbla_normativa_institucional` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `planauditoria_id` int(10) unsigned NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_normativa_institucional_planauditoria_id_foreign` (`planauditoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbla_normativa_institucional`
--

INSERT INTO `tbla_normativa_institucional` (`id`, `nombre`, `descripcion`, `planauditoria_id`, `estado`) VALUES
(1, 'MOF', 'Manual de Organización y Funciones', 1, 1),
(2, 'ROF', 'Reglamento de Organización y Funciones', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_objetivos_especificos`
--

CREATE TABLE IF NOT EXISTS `tbla_objetivos_especificos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `planauditoria_id` int(10) unsigned NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_objetivos_especificos_planauditoria_id_foreign` (`planauditoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbla_objetivos_especificos`
--

INSERT INTO `tbla_objetivos_especificos` (`id`, `descripcion`, `planauditoria_id`, `estado`) VALUES
(1, 'Supervisar y evaluar de forma continua el entorno de control y manipulación del Sistema de Ventas.', 1, 1),
(2, 'Evaluar el grado de satisfacción del trabajador en el momento que hace uso del sistema para procesar alguna venta.', 1, 1),
(3, 'Evaluar el correcto funcionamiento de facturas que el sistema de ventas emite.', 1, 1),
(4, 'Revisar el nivel de seguridad del Sistema de Ventas', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_perfil`
--

CREATE TABLE IF NOT EXISTS `tbla_perfil` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perfil` text COLLATE utf8_unicode_ci NOT NULL,
  `perfilequipo_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_perfil_perfilequipo_id_foreign` (`perfilequipo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tbla_perfil`
--

INSERT INTO `tbla_perfil` (`id`, `perfil`, `perfilequipo_id`) VALUES
(1, 'Conocimientos Avanzados en Procesos Empresariales y gestión de ventas.', 1),
(2, 'Conocimientos amplios de distintos Sistemas de Información.', 2),
(3, 'Conocimiento sobre los equipos y/o instalación', 1),
(4, 'Capaz de identificar problemas y riesgos asociados a los sistemas de información.', 2),
(5, 'Analítico (recursos humanos, técnicos, tecnológicos, tiempo, espacio físico, y otros)', 1),
(6, 'Implementar, dar soporte y gestionar bases de datos ', 3),
(7, 'Ser responsables de la integridad de los datos y la disponibilidad', 3),
(8, 'Disciplinado, responsable, trabajador y preciso.', 4),
(9, 'Imparcial y honesto.', 4),
(10, 'Conocedor de sistemas.', 4),
(11, 'Redacción precisa clara.', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_perfilequipo`
--

CREATE TABLE IF NOT EXISTS `tbla_perfilequipo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rol` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `planauditoria_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_perfilequipo_planauditoria_id_foreign` (`planauditoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbla_perfilequipo`
--

INSERT INTO `tbla_perfilequipo` (`id`, `rol`, `planauditoria_id`) VALUES
(1, 'Especialista en Procesos de una Empresa de Comercialización de equipos de cómputo', 1),
(2, 'Especialista en Sistemas de Información ', 1),
(3, 'Especialista en Requerimientos de Base de Datos ', 2),
(4, 'Redactor especialista de auditorías de TI', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_personaentrevistar`
--

CREATE TABLE IF NOT EXISTS `tbla_personaentrevistar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cargo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `planauditoria_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_personaentrevistar_planauditoria_id_foreign` (`planauditoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbla_personaentrevistar`
--

INSERT INTO `tbla_personaentrevistar` (`id`, `cargo`, `apellidos`, `nombre`, `planauditoria_id`) VALUES
(1, 'Gerente General', 'Rodriguez Reyes', 'Isabel', 1),
(2, 'Secretaria General de Ventas', 'Cañote', 'Mely Eli', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_planauditoria`
--

CREATE TABLE IF NOT EXISTS `tbla_planauditoria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `realidad_problematica` text COLLATE utf8_unicode_ci NOT NULL,
  `titulo_auditoria` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `empresa_id` int(10) unsigned NOT NULL,
  `objetivo_general` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `alcance` text COLLATE utf8_unicode_ci,
  `alineamiento_negocio` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `tbla_planauditoria_empresa_id_foreign` (`empresa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbla_planauditoria`
--

INSERT INTO `tbla_planauditoria` (`id`, `realidad_problematica`, `titulo_auditoria`, `empresa_id`, `objetivo_general`, `estado`, `alcance`, `alineamiento_negocio`) VALUES
(1, 'En opinión de los trabajadores que hacen uso del sistema de ventas de la empresa Compu Center Bussines se han suscitado algunos problemas desde la implantación de dicho sistema hasta la fecha. En ciertas ocasiones luego de que se procesó la factura elaborada por compra de un determinado producto y seguidamente de esta acción se intentó agregar algún otro producto, porque el cliente así lo quiso, a la misma factura ya procesada pero aún no impresa, el sistema no sumaba el monto correspondiente al nuevo producto agregado o duplicaba los montos establecidos antes de hacer la modificación. Esto último también cabe hacer notar que ocasionaba una demora en emitir el comprobante de pago al cliente.', 'Auditoría del Sistema Informático de Ventas de la empresa Compu Center Bussines', 1, 'Evaluar la situación actual del Sistema de Ventas de la empresa Compu Center Bussines.', 1, 'Mantener un eficiente funcionamiento de cada componente del sistema de ventas de la empresa Compu Center Bussines S.A.C. con respecto a los tiempos de la generación de documentos y actualización de la información de pedidos haciendo uso de los diferentes marcos normativos institucionales, nacionales así como internacionales.', 'Establecer un sistema de proceso óptimo para la venta de equipos informáticos que permita optimizar el proceso de facturación evitando la incomodidad y permitiendo una buena relación con el cliente o usuario al  momento de generar la venta'),
(2, 'Lindley cuenta con', 'Auditoría del Sistema Informático de Distribución', 2, 'Evaluar la situación actual del Sistema Informático de Distribución', 1, 'Se realizará', 'Tendremos en cuenta'),
(3, 'El sistema', 'Auditoría del Sistema Informático de Contratos de Servicios', 3, 'Evaluar la situación actual del Sistema Informático de Contratos', 1, 'El alcance', 'Se alinea'),
(4, 'aaa', 'Auditoria de Redes', 1, 'aaa', 1, 'aaa', 'aaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_preguntacumplimiento`
--

CREATE TABLE IF NOT EXISTS `tbla_preguntacumplimiento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pregunta` text COLLATE utf8_unicode_ci NOT NULL,
  `respuesta` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `obervaciones` text COLLATE utf8_unicode_ci NOT NULL,
  `pruebacumplimiento_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_preguntacumplimiento_pruebacumplimiento_id_foreign` (`pruebacumplimiento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_pruebacumplimiento`
--

CREATE TABLE IF NOT EXISTS `tbla_pruebacumplimiento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `tipo_marco` int(11) NOT NULL,
  `personaentrevistar_id` int(10) unsigned NOT NULL,
  `objetivos_especificos_id` int(10) unsigned NOT NULL,
  `planauditoria_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_pruebacumplimiento_personaentrevistar_id_foreign` (`personaentrevistar_id`),
  KEY `tbla_pruebacumplimiento_objetivos_especificos_id_foreign` (`objetivos_especificos_id`),
  KEY `tbla_pruebacumplimiento_planauditoria_id_foreign` (`planauditoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbla_pruebacumplimiento`
--

INSERT INTO `tbla_pruebacumplimiento` (`id`, `titulo`, `fecha_inicio`, `fecha_fin`, `tipo_marco`, `personaentrevistar_id`, `objetivos_especificos_id`, `planauditoria_id`) VALUES
(1, 'CUESTIONARIO DE AUDITORÍA A LOS PROCESOS DEL SISTEMA DE VENTAS', '0000-00-00', '0000-00-00', 0, 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_tipoaclaracion`
--

CREATE TABLE IF NOT EXISTS `tbla_tipoaclaracion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_aclaracion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbla_tipoaclaracion`
--

INSERT INTO `tbla_tipoaclaracion` (`id`, `tipo_aclaracion`) VALUES
(1, 'Se realizara'),
(2, 'No se realizara');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbla_usuario`
--

CREATE TABLE IF NOT EXISTS `tbla_usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(62) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `estado_id` int(10) unsigned NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tbla_usuario_estado_id_foreign` (`estado_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbla_usuario`
--

INSERT INTO `tbla_usuario` (`id`, `nombre`, `apellidos`, `email`, `password`, `estado_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Jersson', 'Bacilio Crux', 'jerss.edu@gmail.com', 'e27a849ad9652b7a5124aac95e3ea6d2', 2, NULL, '2015-05-27 02:47:52', '2015-05-27 02:47:52'),
(2, 'Edgar', 'Cortez Valderrama', 'edgar@gmail.com', '317044e593c114bfe3519c985d9a5a19', 2, NULL, '2015-05-27 20:21:31', '2015-05-27 20:21:31');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbla_aclaracion`
--
ALTER TABLE `tbla_aclaracion`
  ADD CONSTRAINT `tbla_aclaracion_planauditoria_id_foreign` FOREIGN KEY (`planauditoria_id`) REFERENCES `tbla_planauditoria` (`id`),
  ADD CONSTRAINT `tbla_aclaracion_tipoaclaracion_id_foreign` FOREIGN KEY (`tipoaclaracion_id`) REFERENCES `tbla_tipoaclaracion` (`id`);

--
-- Filtros para la tabla `tbla_auditor`
--
ALTER TABLE `tbla_auditor`
  ADD CONSTRAINT `tbla_auditor_perfilequipo_id_foreign` FOREIGN KEY (`perfilequipo_id`) REFERENCES `tbla_perfilequipo` (`id`),
  ADD CONSTRAINT `tbla_auditor_planauditoria_id_foreign` FOREIGN KEY (`planauditoria_id`) REFERENCES `tbla_planauditoria` (`id`);

--
-- Filtros para la tabla `tbla_auditor_cargo`
--
ALTER TABLE `tbla_auditor_cargo`
  ADD CONSTRAINT `tbla_auditor_cargo_auditor_id_foreign` FOREIGN KEY (`auditor_id`) REFERENCES `tbla_auditor` (`id`),
  ADD CONSTRAINT `tbla_auditor_cargo_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `tbla_cargo` (`id`),
  ADD CONSTRAINT `tbla_auditor_cargo_planauditoria_id_foreign` FOREIGN KEY (`planauditoria_id`) REFERENCES `tbla_planauditoria` (`id`);

--
-- Filtros para la tabla `tbla_deta_pc_mi`
--
ALTER TABLE `tbla_deta_pc_mi`
  ADD CONSTRAINT `tbla_deta_pc_mi_marco_ref_internacional_id_foreign` FOREIGN KEY (`marco_ref_internacional_id`) REFERENCES `tbla_marco_ref_internacional` (`id`);

--
-- Filtros para la tabla `tbla_deta_pc_mn`
--
ALTER TABLE `tbla_deta_pc_mn`
  ADD CONSTRAINT `tbla_deta_pc_mn_marco_ref_nacional_id_foreign` FOREIGN KEY (`marco_ref_nacional_id`) REFERENCES `tbla_marco_ref_nacional` (`id`);

--
-- Filtros para la tabla `tbla_deta_pc_ni`
--
ALTER TABLE `tbla_deta_pc_ni`
  ADD CONSTRAINT `tbla_deta_pc_ni_normativa_institucional_id_foreign` FOREIGN KEY (`normativa_institucional_id`) REFERENCES `tbla_normativa_institucional` (`id`);

--
-- Filtros para la tabla `tbla_direccionamientoestrategico`
--
ALTER TABLE `tbla_direccionamientoestrategico`
  ADD CONSTRAINT `tbla_direccionamientoestrategico_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `tbla_empresa` (`id`);

--
-- Filtros para la tabla `tbla_empresa`
--
ALTER TABLE `tbla_empresa`
  ADD CONSTRAINT `tbla_empresa_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `tbla_usuario` (`id`);

--
-- Filtros para la tabla `tbla_estrategia`
--
ALTER TABLE `tbla_estrategia`
  ADD CONSTRAINT `tbla_estrategia_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `tbla_empresa` (`id`);

--
-- Filtros para la tabla `tbla_limitacion`
--
ALTER TABLE `tbla_limitacion`
  ADD CONSTRAINT `tbla_limitacion_planauditoria_id_foreign` FOREIGN KEY (`planauditoria_id`) REFERENCES `tbla_planauditoria` (`id`);

--
-- Filtros para la tabla `tbla_marco_ref_internacional`
--
ALTER TABLE `tbla_marco_ref_internacional`
  ADD CONSTRAINT `tbla_marco_ref_internacional_planauditoria_id_foreign` FOREIGN KEY (`planauditoria_id`) REFERENCES `tbla_planauditoria` (`id`);

--
-- Filtros para la tabla `tbla_marco_ref_nacional`
--
ALTER TABLE `tbla_marco_ref_nacional`
  ADD CONSTRAINT `tbla_marco_ref_nacional_planauditoria_id_foreign` FOREIGN KEY (`planauditoria_id`) REFERENCES `tbla_planauditoria` (`id`);

--
-- Filtros para la tabla `tbla_normativa_institucional`
--
ALTER TABLE `tbla_normativa_institucional`
  ADD CONSTRAINT `tbla_normativa_institucional_planauditoria_id_foreign` FOREIGN KEY (`planauditoria_id`) REFERENCES `tbla_planauditoria` (`id`);

--
-- Filtros para la tabla `tbla_objetivos_especificos`
--
ALTER TABLE `tbla_objetivos_especificos`
  ADD CONSTRAINT `tbla_objetivos_especificos_planauditoria_id_foreign` FOREIGN KEY (`planauditoria_id`) REFERENCES `tbla_planauditoria` (`id`);

--
-- Filtros para la tabla `tbla_perfil`
--
ALTER TABLE `tbla_perfil`
  ADD CONSTRAINT `tbla_perfil_perfilequipo_id_foreign` FOREIGN KEY (`perfilequipo_id`) REFERENCES `tbla_perfilequipo` (`id`);

--
-- Filtros para la tabla `tbla_perfilequipo`
--
ALTER TABLE `tbla_perfilequipo`
  ADD CONSTRAINT `tbla_perfilequipo_planauditoria_id_foreign` FOREIGN KEY (`planauditoria_id`) REFERENCES `tbla_planauditoria` (`id`);

--
-- Filtros para la tabla `tbla_personaentrevistar`
--
ALTER TABLE `tbla_personaentrevistar`
  ADD CONSTRAINT `tbla_personaentrevistar_planauditoria_id_foreign` FOREIGN KEY (`planauditoria_id`) REFERENCES `tbla_planauditoria` (`id`);

--
-- Filtros para la tabla `tbla_planauditoria`
--
ALTER TABLE `tbla_planauditoria`
  ADD CONSTRAINT `tbla_planauditoria_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `tbla_empresa` (`id`);

--
-- Filtros para la tabla `tbla_pruebacumplimiento`
--
ALTER TABLE `tbla_pruebacumplimiento`
  ADD CONSTRAINT `tbla_pruebacumplimiento_objetivos_especificos_id_foreign` FOREIGN KEY (`objetivos_especificos_id`) REFERENCES `tbla_objetivos_especificos` (`id`),
  ADD CONSTRAINT `tbla_pruebacumplimiento_personaentrevistar_id_foreign` FOREIGN KEY (`personaentrevistar_id`) REFERENCES `tbla_personaentrevistar` (`id`),
  ADD CONSTRAINT `tbla_pruebacumplimiento_planauditoria_id_foreign` FOREIGN KEY (`planauditoria_id`) REFERENCES `tbla_planauditoria` (`id`);

--
-- Filtros para la tabla `tbla_usuario`
--
ALTER TABLE `tbla_usuario`
  ADD CONSTRAINT `tbla_usuario_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `tbla_estado` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
