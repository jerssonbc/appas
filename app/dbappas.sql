-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2015 at 03:18 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbappas`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
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
-- Table structure for table `tbla_aclaracion`
--

CREATE TABLE IF NOT EXISTS `tbla_aclaracion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aclaracion` text COLLATE utf8_unicode_ci NOT NULL,
  `planauditoria_id` int(10) unsigned NOT NULL,
  `tipoaclaracion_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_aclaracion_planauditoria_id_foreign` (`planauditoria_id`),
  KEY `tbla_aclaracion_tipoaclaracion_id_foreign` (`tipoaclaracion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbla_aclaracion`
--

INSERT INTO `tbla_aclaracion` (`id`, `aclaracion`, `planauditoria_id`, `tipoaclaracion_id`) VALUES
(1, 'Se verificará el cumplimento de las políticas existentes que indican el funcionamiento del sistema en la empresa Compu Center Bussines S.A.C', 1, 1),
(2, 'Se verificará los resultados de datos extraídos de la empresa, con el fin de evaluar su consistencia y confiabilidad', 1, 1),
(3, 'Se analizará y evaluará las incidencias frecuentes en la empresa y sus soluciones.', 1, 1),
(4, 'Se verificará el cumplimiento de las políticas de seguridad dela empresa', 1, 1),
(5, 'No se realizará ninguna modificación en las políticas establecidas por el negocio', 1, 2),
(6, 'No se tomará ninguna decisión respecto al plan de mantenimiento ni otro que no existiera', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbla_auditor`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbla_auditor`
--

INSERT INTO `tbla_auditor` (`id`, `apellidos`, `nombre`, `dni`, `email`, `telefono`, `celular`, `direccion`, `carrera_profesional`, `planauditoria_id`, `perfilequipo_id`, `estado`) VALUES
(1, 'Bacilito Cruz', 'Jersson Eduardo', '70662924', 'jerss.edu@gmail.com', '', '944483283', 'Urb. Los Jasminez Mz L Lote 6', 'Ingeniería de Sistemas', 1, 1, 1),
(2, 'Cortez Valderrama', 'Edgar Orlando', '71491171', 'edgar.ctz@hotmail.com', '044217938', '971233794', 'Av. Federico Villareal Mz B L-4 La Alameda	', 'Ingeniería de Sistemas', 1, 2, 1),
(3, 'Pérez Huamán', 'Luis Miguel', '47687890', 'lmperez093@gmail.com', '044274523', '958408310', 'Jr. José Castelli 228 – Bellavista – La Esperanza', 'Ingeniería de Sistemas', 1, 3, 1),
(4, 'Castillo Carranza', 'Masiel', '48106923', 'masiel093@gmail.com', '', '968799717', 'Av. Dean Saavedra mz59 lt 4ª. El Milagro ', 'Ingeniería de Sistemas', 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbla_auditor_cargo`
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
-- Table structure for table `tbla_cargo`
--

CREATE TABLE IF NOT EXISTS `tbla_cargo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cargo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbla_cargo`
--

INSERT INTO `tbla_cargo` (`id`, `cargo`) VALUES
(1, 'Jefe de Auditoria'),
(2, 'Auditor Especialista'),
(3, 'Asistente de Auditoria');

-- --------------------------------------------------------

--
-- Table structure for table `tbla_deta_pc_mi`
--

CREATE TABLE IF NOT EXISTS `tbla_deta_pc_mi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pruebacumplimiento_id` int(10) unsigned NOT NULL,
  `marco_ref_internacional_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_deta_pc_mi_pruebacumplimiento_id_foreign` (`pruebacumplimiento_id`),
  KEY `tbla_deta_pc_mi_marco_ref_internacional_id_foreign` (`marco_ref_internacional_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbla_deta_pc_mi`
--

INSERT INTO `tbla_deta_pc_mi` (`id`, `pruebacumplimiento_id`, `marco_ref_internacional_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 6, 3),
(7, 7, 3),
(8, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbla_deta_pc_mn`
--

CREATE TABLE IF NOT EXISTS `tbla_deta_pc_mn` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pruebacumplimiento_id` int(10) unsigned NOT NULL,
  `marco_ref_nacional_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_deta_pc_mn_pruebacumplimiento_id_foreign` (`pruebacumplimiento_id`),
  KEY `tbla_deta_pc_mn_marco_ref_nacional_id_foreign` (`marco_ref_nacional_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbla_deta_pc_ni`
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
-- Table structure for table `tbla_deta_ps_mi`
--

CREATE TABLE IF NOT EXISTS `tbla_deta_ps_mi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pruebasustantiva_id` int(11) NOT NULL,
  `marco_ref_internacional_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbla_deta_ps_mi`
--

INSERT INTO `tbla_deta_ps_mi` (`id`, `pruebasustantiva_id`, `marco_ref_internacional_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2),
(10, 10, 2),
(11, 11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbla_deta_ps_mn`
--

CREATE TABLE IF NOT EXISTS `tbla_deta_ps_mn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pruebasustantiva_id` int(11) NOT NULL,
  `marco_ref_nacional_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbla_deta_ps_ni`
--

CREATE TABLE IF NOT EXISTS `tbla_deta_ps_ni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pruebasustantiva_id` int(11) NOT NULL,
  `normativa_institucional_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbla_direccionamientoestrategico`
--

CREATE TABLE IF NOT EXISTS `tbla_direccionamientoestrategico` (
  `empresa_id` int(10) unsigned NOT NULL,
  `mision` text COLLATE utf8_unicode_ci NOT NULL,
  `vision` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`empresa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbla_direccionamientoestrategico`
--

INSERT INTO `tbla_direccionamientoestrategico` (`empresa_id`, `mision`, `vision`) VALUES
(1, 'Nuestra misión es proporcionar a nuestros clientes personales y empresariales  equipos y accesorios de cómputo de alta calidad y  brindar un excelente servicio de reparación y mantenimiento de estos tipos de equipos y accesorios.', 'Ser reconocida como una de las 5 empresas líder a nivel de la región norte del país en la venta de equipos y accesorios de cómputo y poseedora de excelentes servicios de mantenimiento y reparación de estos mismo productos'),
(2, 'Llevar con calidez y optimismo: salud, bienestar y ahorro a todas las comunidades del Perú.', 'Cambiar la historia de la salud en todas las comunidades donde operemos, a través de la mejor calidad, el mejor precio y la mejor gente');

-- --------------------------------------------------------

--
-- Table structure for table `tbla_empresa`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbla_empresa`
--

INSERT INTO `tbla_empresa` (`id`, `usuario_id`, `razon_social`, `giro_negocio`, `resena_historica`, `ug_latitud`, `ug_longitud`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 'COMPU CENTER BUSSINES S.A.C', 'VENTA, MANTENIMIENTO Y REPARACIÓN DE EQUIPOS y ACCESORIOS DE CÓMPUTO', 'La empresa fue fundada a inicios del año 2003 en la ciudad de Trujillo, distrito y provincia de Trujillo, departamento y región La Libertad. Con la consigna de poder establecer sucursales, oficinas u otras dependencias en cualquier lugar del Perú.\nCon la creciente necesidad de adquisición de productos tecnológicos por parte de los pobladores y empresas dentro medio local y regional, Compu Center desde sus inicios fue posicionándose como una empresa capaz de satisfacer dichas necesidades mediante la comercialización y distribución de productos de calidad que la demanda requería.\n', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'INKAFRAM S.A', 'Venta Minorista Productos Farmacia Medicinas Y Artículos Tocador', 'En InkaFarma, somos más de 11,000 colaboradores a nivel nacional con la misión de llevar con calidez y optimismo: salud, bienestar y ahorro a todas las comunidades del Perú. Ofrecemos una completa variedad de productos farmacéuticos, perfumería y tocador de excelente calidad y a los mejores precios los 365 días del año. Somos la cadena de boticas líder del mercado farmacéutico gracias a nuestra gran cobertura de boticas a nivel nacional y, sobretodo, a nuestra gente quienes gracias a su obsesión por el análisis, pasión por los resultados, liderazgo inspirador y amor por las personas alinean sus esfuerzos para que juntos cambiemos la historia de la salud en todas las comunidades donde operemos.', NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbla_estado`
--

CREATE TABLE IF NOT EXISTS `tbla_estado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbla_estado`
--

INSERT INTO `tbla_estado` (`id`, `estado`) VALUES
(1, 'Desactivado'),
(2, 'Activado'),
(3, 'Eliminado');

-- --------------------------------------------------------

--
-- Table structure for table `tbla_estrategia`
--

CREATE TABLE IF NOT EXISTS `tbla_estrategia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `estrategia` text COLLATE utf8_unicode_ci NOT NULL,
  `empresa_id` int(10) unsigned NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_estrategia_empresa_id_foreign` (`empresa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbla_estrategia`
--

INSERT INTO `tbla_estrategia` (`id`, `titulo`, `estrategia`, `empresa_id`, `estado`) VALUES
(1, 'Responsabilidad', 'Contar con personal altamente responsable en la oferta, venta de nuestros productos y atención de los servicios solicitados.', 1, NULL),
(2, 'Crecimiento', 'Buscar aumentar nuestra participación dentro del mercado norteño perteneciente al rubro de nuestro negocio  ofreciendo productos respaldados en marcas internacionales de calidad y brindado servicios que siempre dejen contentos a nuestros clientes', 1, NULL),
(3, 'Proveedores reconocidos', 'Seguir contando con proveedores que poseen productos de excelente calidad en lo que concierne a equipos y accesorios computacionales.', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbla_limitacion`
--

CREATE TABLE IF NOT EXISTS `tbla_limitacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `limitacion` text COLLATE utf8_unicode_ci NOT NULL,
  `planauditoria_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_limitacion_planauditoria_id_foreign` (`planauditoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbla_limitacion`
--

INSERT INTO `tbla_limitacion` (`id`, `limitacion`, `planauditoria_id`) VALUES
(1, 'Existencia de Políticas de Seguridad en la Institución, que limitan la entrega de la información a cualquier tipo de persona externa a la Empresa. Por tal motivo el equipo coordinará previamente con los directivos de la empresa para la autorización y disposición de permitir realizar las tareas de auditoria establecidas', 1),
(2, 'Inexistencia de documentación del software (Sistemas de Ventas), puesto que este ha sido desarrollado e implantado por terceros y los cuales no brindaron dicha información', 1),
(3, 'La inexistencia de un formato estándar para el registro de incidencias suscitadas durante el uso del Sistema de Ventas de la empresa', 1),
(4, 'Existencia de horarios de trabajo establecidos tal que el personal debe exclusivamente estar dedicado a su labor para la cual se le contrató, lo cual provoca limitada disposición de tiempo. Por tal motivo se coordinará previamente con los directivos para realizar las tareas de auditoria en horarios libre donde se pretende atención a los clientes, o algún horario extra', 1),
(5, 'El activo uso del Sistema de Ventas durante la operatividad del negocio limita el tiempo para realizar las tareas establecidas con utilización directa del sistema. Por tal motivo se coordinará previamente con los directivos para realizar dichas tareas en horarios apropiados o que se nos habilite un terminal de visualización del sistema sin que afecte la continuidad del negocio', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbla_marco_ref_internacional`
--

CREATE TABLE IF NOT EXISTS `tbla_marco_ref_internacional` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `planauditoria_id` int(10) unsigned NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_marco_ref_internacional_planauditoria_id_foreign` (`planauditoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbla_marco_ref_internacional`
--

INSERT INTO `tbla_marco_ref_internacional` (`id`, `nombre`, `descripcion`, `planauditoria_id`, `estado`) VALUES
(1, 'COBIT - 5 - Entregar, dar servicio y soporte(DSS) - DSS01: Gestionar las operaciones', 'Un procesamiento de información completo y apropiado requiere de una efectiva administración del procesamiento de datos y del mantenimiento del hardware. Cumplir con los niveles operativos de servicio para procesamiento de datos programado, protección de datos de salida sensitivos y monitoreo y mantenimiento de la infraestructura.', 1, 1),
(2, 'COBIT-5  - Entregar, dar servicio y soporte(DSS) - DSS03: Gestionar los problemas', 'Una efectiva administración de problemas requiere la identificación y clasificación de problemas, el análisis de las causas desde su raíz, y la resolución de problemas. Registrar, rastrear y resolver problemas operativos; investigación de las causas raíz de todos los problemas relevantes y definir soluciones para los problemas operativos identificados.', 1, 1),
(3, 'COBIT-5 - Entregar, dar servicio y soporte(DSS) - DSS05: Gestionar servicios de seguridad', 'Con el fin de proteger la información de la empresa para mantener aceptable el nivel de riesgo de seguridad de la información de acuerdo con las políticas de seguridad existentes. Además, establece y mantiene los roles de seguridad y privilegios de acceso a la información y realiza la supervisión de la seguridad', 1, 1),
(4, 'ISO 9126', 'La norma ISO-9126 fue desarrollada con el fin de mostrar los elementos que deben considerarse en la evaluación de calidad de los productos de software. \r\nEl estándar ISO-9126 establece que cualquier componente de la calidad del software puede ser descrito en términos de seis atributos cada una de las cuales se detalla a través de un conjunto de sub-atributos que permiten analizar y profundizar en la evaluación de la calidad de productos de software. Los atributos a tomar en cuenta son: funcionalidad, confiabilidad, usabilidad, eficiencia, mantenibilidad y portabilidad.\r\n', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbla_marco_ref_nacional`
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
-- Dumping data for table `tbla_marco_ref_nacional`
--

INSERT INTO `tbla_marco_ref_nacional` (`id`, `nombre`, `descripcion`, `planauditoria_id`, `estado`) VALUES
(1, 'NTP-ISO/IEC 27001:2008', 'Proporciona mejores prácticas, recomendaciones sobre la gestión de la seguridad de la información para su uso por parte de los responsables de iniciar, implementar o mantener sistemas de gestión de seguridad de la información.\r\nEsta política debe ser apoyada y aplicada para un bien de la institución. Dicha política de seguridad debe poseer los siguientes enunciados:\r\n- Importancia de la información al trasmitirla\r\n- Fundamentación de los objetos de la empresa con respecto a los objetivos comerciales.\r\n- Establecer los objetivos de control.\r\n\r\n', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbla_normativa_institucional`
--

CREATE TABLE IF NOT EXISTS `tbla_normativa_institucional` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `planauditoria_id` int(10) unsigned NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_normativa_institucional_planauditoria_id_foreign` (`planauditoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbla_normativa_institucional`
--

INSERT INTO `tbla_normativa_institucional` (`id`, `nombre`, `descripcion`, `planauditoria_id`, `estado`) VALUES
(1, 'MOF (Manual de Organización y Funciones)', 'Puntos relacionados con la función de venta', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbla_objetivos_especificos`
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
-- Dumping data for table `tbla_objetivos_especificos`
--

INSERT INTO `tbla_objetivos_especificos` (`id`, `descripcion`, `planauditoria_id`, `estado`) VALUES
(1, 'Evaluar la validez de las operaciones gestionadas por el Sistema de Ventas  (DSS01).', 1, 1),
(2, 'Verificar la gestión de problemas del Sistema de Ventas (DSS03).', 1, 1),
(3, 'Evaluar los servicios de seguridad incorporadas en el Sistema de Ventas (DSS05).', 1, 1),
(4, 'Evaluar el grado de satisfacción del trabajador en el momento que hace uso del sistema para procesar alguna venta (ISO9126).', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbla_pasos_sustantivos`
--

CREATE TABLE IF NOT EXISTS `tbla_pasos_sustantivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `cumplimiento` char(4) DEFAULT NULL,
  `pruebasustantiva_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbla_pasos_sustantivos`
--

INSERT INTO `tbla_pasos_sustantivos` (`id`, `descripcion`, `cumplimiento`, `pruebasustantiva_id`) VALUES
(1, 'Verificar lista de servicios entregados', NULL, 1),
(2, 'Verificar el conocimiento de los pasos a seguir para la entrega de un servicio. ', NULL, 1),
(3, 'Verificar los procedimientos operativos a llevarse a cabo como apoyo a los servicios entregados.', NULL, 1),
(4, 'Verificar la lista de actividades operativas a llevarse a cabo', NULL, 2),
(5, 'Revisar la programación de dichas actividades', NULL, 2),
(6, 'Revisar el desempeño de dichas actividades operativas', NULL, 2),
(7, 'Verificar el conocimiento de las actividades de flujo de datos.', NULL, 3),
(8, 'Verificar los estándares de seguridad aplicados a las actividades de flujo de datos.', NULL, 3),
(9, 'Verificar la búsqueda de información requerida por los usuarios.', NULL, 4),
(10, 'Verificar que los datos sean entregados de forma segura a los usuarios.', NULL, 4),
(11, 'Verificar la  lista de copias realizadas de forma periódica', NULL, 5),
(12, 'Verificar que dichas copias sean almacenadas de forma ordenada.', NULL, 5),
(13, 'Se puede acceder al sistema de ventas de la empresa', NULL, 6),
(14, 'Se puede acceder a los datos de la empresa.', NULL, 6),
(15, 'Se accede de formalmente a los datos en los problemas', NULL, 6),
(16, 'La empresa cuenta con un soporte técnico', NULL, 7),
(17, 'El equipo de soporte cuenta con un ambiente adecuado.', NULL, 7),
(18, 'Tienen un registro de los turnos de soporte o personal que lo conforma', NULL, 7),
(19, 'La empresa tiene documentado la lista de problemas priorizados', NULL, 8),
(20, 'Soporte tiene conocimiento de los errores conocidos.', NULL, 9),
(21, 'Se tiene una documentación de errores conocidos y qué hacer ante ellos', NULL, 9),
(22, 'Se conoce cuáles son las configuraciones afectadas', NULL, 10),
(23, 'Se tiene un registro de configuraciones afectadas por el error.', NULL, 10),
(24, 'Ingresar a algún ordenador de la empresa usado por personal de la empresa.', NULL, 11),
(25, 'Verificar la  herramienta de protección usada en el negocio', NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbla_perfil`
--

CREATE TABLE IF NOT EXISTS `tbla_perfil` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perfil` text COLLATE utf8_unicode_ci NOT NULL,
  `perfilequipo_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_perfil_perfilequipo_id_foreign` (`perfilequipo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbla_perfil`
--

INSERT INTO `tbla_perfil` (`id`, `perfil`, `perfilequipo_id`) VALUES
(1, 'Conocimientos Avanzados en Procesos Empresariales y gestión de ventas', 1),
(2, 'Conocimiento sobre los equipos y/o instalación', 1),
(3, 'Analítico (recursos humanos, técnicos, tecnológicos, tiempo, espacio físico, y otros)', 1),
(4, 'Paciente, amable, imparcial, honesto, preciso y directo', 1),
(5, 'Generador de alternativas', 1),
(6, 'Conocimientos amplios de distintos sistemas de información.', 2),
(7, 'Capaz de identificar problemas y riesgos asociados a los sistemas de información', 2),
(8, 'Implementar, dar soporte y gestionar el sistema de información ', 2),
(9, 'Ser responsables de la integridad de los datos y la disponibilidad', 2),
(10, 'Proactivo, comunicativo', 3),
(11, 'Experiencia en elaboración y desarrollo de proyectos', 3),
(12, 'Participación en la realización de pruebas de sistemas', 3),
(13, 'Disciplinado, responsable, trabajador y preciso.', 4),
(14, 'Imparcial y honesto', 4),
(15, 'Conocedor de sistemas', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbla_perfilequipo`
--

CREATE TABLE IF NOT EXISTS `tbla_perfilequipo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rol` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `planauditoria_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_perfilequipo_planauditoria_id_foreign` (`planauditoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbla_perfilequipo`
--

INSERT INTO `tbla_perfilequipo` (`id`, `rol`, `planauditoria_id`) VALUES
(1, 'Especialista en Procesos de una Empresa de Comercialización de Equipos de Computo ', 1),
(2, 'Especialista en Sistemas de información', 1),
(3, 'Técnico en sistemas', 1),
(4, 'Redactor especialista de auditorías de TI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbla_personaentrevistar`
--

CREATE TABLE IF NOT EXISTS `tbla_personaentrevistar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cargo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `planauditoria_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_personaentrevistar_planauditoria_id_foreign` (`planauditoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbla_personaentrevistar`
--

INSERT INTO `tbla_personaentrevistar` (`id`, `cargo`, `apellidos`, `nombre`, `planauditoria_id`) VALUES
(1, 'Gerente General', 'Rodriguez Reyes', 'Isabel Santos', 1),
(2, 'Asistente Administrativo - Ventas', 'Cañote Zuniga', 'Melly', 1),
(3, 'Tecnico en Sistemas', 'Rodriguez Reyes', 'Manuel', 1),
(4, 'Asesor Corporativo', 'Sotero Davalos', 'Aldo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbla_planauditoria`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbla_planauditoria`
--

INSERT INTO `tbla_planauditoria` (`id`, `realidad_problematica`, `titulo_auditoria`, `empresa_id`, `objetivo_general`, `estado`, `alcance`, `alineamiento_negocio`) VALUES
(1, 'En opinión de los trabajadores que hacen uso del sistema de ventas de la empresa Compu Center Bussines se han suscitado algunos problemas desde la implantación de dicho sistema hasta la fecha. En ciertas ocasiones luego de que se procesó la factura elaborada por compra de un determinado producto y seguidamente de esta acción se intentó agregar algún otro producto, porque el cliente así lo quiso, a la misma factura ya procesada pero aún no impresa, el sistema no sumaba el monto correspondiente al nuevo producto agregado o duplicaba los montos establecidos antes de hacer la modificación. Esto último también cabe hacer notar que ocasionaba una demora en emitir el comprobante de pago al cliente', 'Auditoría del Sistema Informático de Ventas de la empresa Compu Center Bussines', 1, 'Evaluar la situación actual del Sistema de Ventas de la empresa Compu Center Bussines.', 1, 'Mantener un eficiente funcionamiento de cada componente del sistema de ventas de la empresa Compu Center Bussines S.A.C. con respecto a los tiempos de la generación de documentos y actualización de la información de pedidos haciendo uso de los diferentes marcos normativos institucionales, nacionales así como internacionales', 'El sistema de ventas establecido dentro de la empresa debe ser el más óptimo en el momento de generar los diferentes documentos, registro y actualización de la información. Durante la auditoría del proceso se tendrá que evaluar indicadores, controles, y alguna otra información  que pueda servir al equipo auditor   para permitir que el sistema funcione manteniendo los criterios de confidencialidad, integridad y disponibilidad'),
(2, 'El estado actual de soporte ', 'Auditoría al Soporte Informático', 1, 'Evaluar el estado del servico de soporte informático con el cuenta la empresa.', 1, 'El alcance', 'El alineamiento');

-- --------------------------------------------------------

--
-- Table structure for table `tbla_preguntacumplimiento`
--

CREATE TABLE IF NOT EXISTS `tbla_preguntacumplimiento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pregunta` text COLLATE utf8_unicode_ci NOT NULL,
  `respuesta` char(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `obervaciones` text COLLATE utf8_unicode_ci,
  `pruebacumplimiento_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbla_preguntacumplimiento_pruebacumplimiento_id_foreign` (`pruebacumplimiento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tbla_preguntacumplimiento`
--

INSERT INTO `tbla_preguntacumplimiento` (`id`, `pregunta`, `respuesta`, `obervaciones`, `pruebacumplimiento_id`) VALUES
(1, '¿Se llevan a cabo procedimientos operativos como apoyo a los servicios entregados?', NULL, NULL, 1),
(2, '¿Existe una programación de actividades operativas y su desempeño?', NULL, NULL, 1),
(3, '¿Se cumplen los estándares de seguridad en las actividades de flujo de datos?', NULL, NULL, 1),
(4, '¿Los datos son entregados de forma oportuna y segura a los usuarios?', NULL, NULL, 1),
(5, '¿Se realizan, de forma periódica, copias de respaldo de acuerdo a las políticas existentes?', NULL, NULL, 1),
(6, '¿Se identifican los problemas a través de los informes de incidentes?', NULL, NULL, 2),
(7, '¿Se accede formalmente a los datos asociados en los problemas?', NULL, NULL, 2),
(8, '¿Se cuenta con grupos de soporte para facilitar la identificación de problemas?', NULL, NULL, 2),
(9, '¿Se priorizan la solución de problemas de acuerdo a su impacto en el negocio?', NULL, NULL, 2),
(10, '¿Se informa del estado de problemas al centro de servicios?', NULL, NULL, 2),
(11, '¿Existe un catálogo de gestión de problemas?', NULL, NULL, 2),
(12, '¿Se identifican los problemas de errores conocidos?', NULL, NULL, 3),
(13, '¿Se asocian las configuraciones afectadas con los errores conocidos?', NULL, NULL, 3),
(14, '¿Se comunica el progreso de la resolución de problemas?', NULL, NULL, 3),
(15, '¿Se desarrolla una solución temporal a los errores conocidos luego de su registro?', NULL, NULL, 4),
(16, '¿Se priorizan la solución de errores de acuerdo a su impacto?', NULL, NULL, 4),
(17, '¿El problema se cierra con la eliminación del error o una alternativa de gestión?', NULL, NULL, 5),
(18, '¿Se informa al centro de servicio del calendario de cierre del problema?', NULL, NULL, 5),
(19, '¿Se generan informes sobre la gestión de cambios en la resolución de problemas?', NULL, NULL, 5),
(20, '¿Se supervisa el continuo impacto de los problemas y errores?', NULL, NULL, 5),
(21, '¿Se confirma la resolución de problemas graves?', NULL, NULL, 5),
(22, '¿Se incorpora la metodología de resolución del problema en las reuniones?', NULL, NULL, 5),
(23, '¿Se es consciente de la importancia de prevención de software malicioso?', NULL, NULL, 6),
(24, '¿Se instalan y activan herramientas de protección?', NULL, NULL, 6),
(25, '¿Se distribuye todo el software de protección en la empresa?', NULL, NULL, 6),
(26, '¿Se evalúa regularmente la aparición de posibles amenazas?', NULL, NULL, 6),
(27, '¿Se filtra el tráfico entrante?', NULL, NULL, 6),
(28, '¿Se forma a los usuarios sobre la no instalación de softwares no autorizados?', NULL, NULL, 6),
(29, '¿Se mantienen los accesos a los usuarios de acuerdo a los requerimientos de sus funciones?', NULL, NULL, 7),
(30, '¿Se identifican todas las actividades de proceso con los roles definidos?', NULL, NULL, 7),
(31, '¿Se administran los derechos de acceso (creación, modificación y eliminación) ', NULL, NULL, 7),
(32, '¿Se revisa regularmente la gestión de cuentas y privilegios?', NULL, NULL, 7),
(33, '¿Se identifica cada usuario según su actividad de proceso de información?', NULL, NULL, 7),
(34, '¿Las funciones en el sistema satisfacen todas las necesidades del negocio?', NULL, NULL, 8),
(35, '¿Puede mantener un nivel de rendimiento en la ejecución del software?', NULL, NULL, 8),
(36, '¿El software es fácil de usar y de aprender?', NULL, NULL, 8),
(37, '¿Es rápido y minimalista en cuanto al uso de recursos?', NULL, NULL, 8),
(38, '¿Es fácil de modificar y verificar?', NULL, NULL, 8),
(39, '¿Es fácil de transferir de un ambiente a otro?', NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbla_pruebacumplimiento`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbla_pruebacumplimiento`
--

INSERT INTO `tbla_pruebacumplimiento` (`id`, `titulo`, `fecha_inicio`, `fecha_fin`, `tipo_marco`, `personaentrevistar_id`, `objetivos_especificos_id`, `planauditoria_id`) VALUES
(1, 'CUESTIONARIO DE AUDITORÍA A LOS PROCESOS DEL SISTEMA DE VENTAS', '2015-07-01', '2015-07-01', 0, 2, 1, 1),
(2, 'CUESTIONARIO DE AUDITORÍA A LA GESTIÓN DE INCIDENCIAS', '2015-07-01', '2015-07-01', 0, 1, 2, 1),
(3, 'CUESTIONARIO DE AUDITORÍA A LA GESTIÓN DE INCIDENCIAS', '2015-07-01', '2015-07-01', 0, 1, 2, 1),
(4, 'CUESTIONARIO DE AUDITORÍA A LA GESTIÓN DE INCIDENCIAS', '2015-07-01', '2015-07-01', 0, 1, 2, 1),
(5, 'CUESTIONARIO DE AUDITORÍA A LA GESTIÓN DE INCIDENCIAS', '2015-07-01', '2015-07-01', 0, 1, 2, 1),
(6, 'CUESTIONARIO DE AUDITORÍA AL NIVEL DE SEGURIDAD DEL SISTEMA', '2015-07-01', '2015-07-01', 0, 1, 3, 1),
(7, 'CUESTIONARIO DE AUDITORÍA AL NIVEL DE SEGURIDAD DEL SISTEMA', '2015-07-01', '2015-07-01', 0, 1, 3, 1),
(8, 'CUESTIONARIO DE SATISFACCIÓN EN EL USO DEL SISTEMA', '2015-07-01', '2015-07-01', 0, 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbla_pruebasustantiva`
--

CREATE TABLE IF NOT EXISTS `tbla_pruebasustantiva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `pregunta` text NOT NULL,
  `respuesta` char(4) NOT NULL,
  `objetivos_especificos_id` int(11) NOT NULL,
  `auditor_id` int(11) NOT NULL,
  `planauditoria_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbla_pruebasustantiva`
--

INSERT INTO `tbla_pruebasustantiva` (`id`, `titulo`, `pregunta`, `respuesta`, `objetivos_especificos_id`, `auditor_id`, `planauditoria_id`) VALUES
(1, 'CUESTIONARIO DE AUDITORÍA A LOS PROCESOS DEL SISTEMA DE VENTAS', '¿Se llevan a cabo procedimientos operativos como apoyo a los servicios entregados?', '', 1, 1, 1),
(2, 'CUESTIONARIO DE AUDITORÍA A LOS PROCESOS DEL SISTEMA DE VENTAS', '¿Existe una programación de actividades operativas y su desempeño?', '', 1, 1, 1),
(3, 'CUESTIONARIO DE AUDITORÍA A LOS PROCESOS DEL SISTEMA DE VENTAS', '¿Se cumplen los estándares de seguridad en las actividades de flujo de datos?', '', 1, 1, 1),
(4, 'CUESTIONARIO DE AUDITORÍA A LOS PROCESOS DEL SISTEMA DE VENTAS', '¿Los datos son entregados de forma oportuna y segura a los usuarios?', '', 1, 1, 1),
(5, 'CUESTIONARIO DE AUDITORÍA A LOS PROCESOS DEL SISTEMA DE VENTAS', '¿Se realizan, de forma periódica, copias de respaldo de acuerdo a las políticas existentes?', '', 1, 1, 1),
(6, 'CUESTIONARIO DE AUDITORÍA A LA GESTIÓN DE INCIDENCIAS', '¿Se accede formalmente a los datos asociados en los problemas?', '', 2, 3, 1),
(7, 'CUESTIONARIO DE AUDITORÍA A LA GESTIÓN DE INCIDENCIAS', '¿Se cuenta con grupos de soporte para facilitar la identificación de problemas?', '', 2, 3, 1),
(8, 'CUESTIONARIO DE AUDITORIA A LA GESTIÓN DE INCIDENCIAS', '¿Se priorizan la solución de problemas de acuerdo a su impacto en el negocio?', '', 2, 3, 1),
(9, 'CUESTIONARIO DE AUDITORÍA A LA GESTIÓN DE INCIDENCIAS', '¿Se identifican los problemas de errores conocidos?', '', 2, 3, 1),
(10, 'CUESTIONARIO DE AUDITORÍA A LA GESTIÓN DE INCIDENCIAS', '¿Se asocian las configuraciones afectadas con los errores conocidos?', '', 2, 3, 1),
(11, 'CUESTIONARIO DE AUDITORÍA AL NIVEL DE SEGURIDAD DEL SISTEMA', '¿Se instalan y activan herramientas de protección?', '', 3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbla_tipoaclaracion`
--

CREATE TABLE IF NOT EXISTS `tbla_tipoaclaracion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_aclaracion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbla_tipoaclaracion`
--

INSERT INTO `tbla_tipoaclaracion` (`id`, `tipo_aclaracion`) VALUES
(1, 'Se realizara'),
(2, 'No se realizara');

-- --------------------------------------------------------

--
-- Table structure for table `tbla_usuario`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbla_usuario`
--

INSERT INTO `tbla_usuario` (`id`, `nombre`, `apellidos`, `email`, `password`, `estado_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Jersson', 'Bacilio Crux', 'jerss.edu@gmail.com', 'e27a849ad9652b7a5124aac95e3ea6d2', 2, NULL, '2015-05-27 02:47:52', '2015-05-27 02:47:52'),
(2, 'Edgar', 'Cortez Valderrama', 'edgar@gmail.com', '317044e593c114bfe3519c985d9a5a19', 2, NULL, '2015-05-27 20:21:31', '2015-05-27 20:21:31'),
(3, 'Luis Miguel', 'Pérez Huaman', 'lmperez093@gmail.com', 'e6ba4060d7bc5a577715be0c5352a6f1', 2, NULL, '2015-07-09 03:14:24', '2015-07-09 03:14:24'),
(4, 'Masiel', 'Castillo Carranza', 'masiel093@gmail.com', '88e71d784f4a1ee7e7ae7f8722587f92', 2, NULL, '2015-07-09 03:42:12', '2015-07-09 03:42:12');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbla_aclaracion`
--
ALTER TABLE `tbla_aclaracion`
  ADD CONSTRAINT `tbla_aclaracion_tipoaclaracion_id_foreign` FOREIGN KEY (`tipoaclaracion_id`) REFERENCES `tbla_tipoaclaracion` (`id`);

--
-- Constraints for table `tbla_auditor_cargo`
--
ALTER TABLE `tbla_auditor_cargo`
  ADD CONSTRAINT `tbla_auditor_cargo_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `tbla_cargo` (`id`);

--
-- Constraints for table `tbla_empresa`
--
ALTER TABLE `tbla_empresa`
  ADD CONSTRAINT `tbla_empresa_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `tbla_usuario` (`id`);

--
-- Constraints for table `tbla_usuario`
--
ALTER TABLE `tbla_usuario`
  ADD CONSTRAINT `tbla_usuario_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `tbla_estado` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
