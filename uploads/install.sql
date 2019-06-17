-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2018 at 08:55 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_chamber_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `schedule` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chamber_id` int(11) NOT NULL,
  `is_visited` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chamber`
--

DROP TABLE IF EXISTS `chamber`;
CREATE TABLE `chamber` (
  `chamber_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `schedule` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chamber`
--

INSERT INTO `chamber` (`chamber_id`, `name`, `address`, `about`, `schedule`) VALUES
(1, 'Sydney Home', 'Some address', 'Something', '[{\"day\":\"sunday\",\"key\":0,\"status\":\"open\",\"morning_open\":\"9:00 AM\",\"morning_close\":\"11:00 AM\",\"morning\":\"9:00 AM - 11:00 AM\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"\",\"evening_close\":\"\",\"evening\":\"\"},{\"day\":\"monday\",\"key\":1,\"status\":\"open\",\"morning_open\":\"\",\"morning_close\":\"\",\"morning\":\"\",\"afternoon_open\":\"2:30 PM\",\"afternoon_close\":\"4:00 PM\",\"afternoon\":\"2:30 PM - 4:00 PM\",\"evening_open\":\"\",\"evening_close\":\"\",\"evening\":\"\"},{\"day\":\"tuesday\",\"key\":2,\"status\":\"open\",\"morning_open\":\"11:00 AM\",\"morning_close\":\"11:30 AM\",\"morning\":\"11:00 AM - 11:30 AM\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"\",\"evening_close\":\"\",\"evening\":\"\"},{\"day\":\"wednesday\",\"key\":3,\"status\":\"open\",\"morning_open\":\"\",\"morning_close\":\"\",\"morning\":\"\",\"afternoon_open\":\"\",\"afternoon_close\":\"\",\"afternoon\":\"\",\"evening_open\":\"6:30 PM\",\"evening_close\":\"8:00 PM\",\"evening\":\"6:30 PM - 8:00 PM\"},{\"day\":\"thursday\",\"key\":4,\"status\":\"open\",\"morning_open\":\"11:30 AM\",\"morning_close\":\"12:00 PM\",\"morning\":\"11:30 AM - 12:00 PM\",\"afternoon_open\":\"2:30 PM\",\"afternoon_close\":\"4:00 PM\",\"afternoon\":\"2:30 PM - 4:00 PM\",\"evening_open\":\"9:30 PM\",\"evening_close\":\"11:30 PM\",\"evening\":\"9:30 PM - 11:30 PM\"},{\"day\":\"friday\",\"key\":5,\"status\":\"open\",\"morning_open\":\"8:00 AM\",\"morning_close\":\"8:30 AM\",\"morning\":\"8:00 AM - 8:30 AM\",\"afternoon_open\":\"12:00 PM\",\"afternoon_close\":\"2:00 PM\",\"afternoon\":\"12:00 PM - 2:00 PM\",\"evening_open\":\"6:00 PM\",\"evening_close\":\"8:30 PM\",\"evening\":\"6:00 PM - 8:30 PM\"},{\"day\":\"saturday\",\"key\":6,\"status\":\"open\",\"morning_open\":\"10:00 AM\",\"morning_close\":\"11:30 AM\",\"morning\":\"10:00 AM - 11:30 AM\",\"afternoon_open\":\"2:00 PM\",\"afternoon_close\":\"4:00 PM\",\"afternoon\":\"2:00 PM - 4:00 PM\",\"evening_open\":\"7:30 PM\",\"evening_close\":\"9:30 PM\",\"evening\":\"7:30 PM - 9:30 PM\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE `file` (
  `file_id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `prescription_id` int(11) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `code` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `patient_id` int(11) NOT NULL DEFAULT '0',
  `appointment_id` int(11) NOT NULL DEFAULT '0',
  `charge` decimal(10,0) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1-paid 0-unpaid',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `chamber_id` int(11) NOT NULL DEFAULT '0',
  `timestamp` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bangla` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `spanish` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chinese` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hindi` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `bangla`, `spanish`, `chinese`, `hindi`) VALUES
(1, 'login', '', 'লগইন', 'Iniciar sesión', '登錄', 'लॉग इन करें'),
(2, 'forgot_password', '', 'পাসওয়ার্ড ভুলে গেছেন', 'Se te olvidó tu contraseña', '忘記密碼', 'पासवर्ड भूल गए'),
(3, 'appointment_list', '', 'নিয়োগ তালিকা', 'Lista de citas', '約會列表', 'नियुक्ति सूची'),
(4, 'profile', '', 'প্রোফাইলের', 'Perfil', '輪廓', 'प्रोफाइल'),
(5, 'logout', '', 'প্রস্থান', 'Cerrar sesión', '登出', 'लोग आउट'),
(6, 'appointment', '', 'এপয়েন্টমেন্ট', 'Cita', '約定', 'नियुक्ति'),
(7, 'prescription', '', 'প্রেসক্রিপশন', 'Prescripción', '處方', 'पर्चे'),
(8, 'billing', '', 'বিলিং', 'Facturación', '開票', 'बिलिंग'),
(9, 'patient', '', 'ধৈর্যশীল', 'Paciente', '患者', 'मरीज'),
(10, 'chamber', '', 'কক্ষ', 'Cámara', '商會', 'कक्ष'),
(11, 'settings', '', 'সেটিংস', 'ajustes', '設置', 'सेटिंग्स'),
(12, 'current_chamber', '', 'বর্তমান চেম্বার', 'Cámara actual', '目前商會', 'वर्तमान चैंबर'),
(13, 'new_appointment', '', 'নতুন অ্যাপয়েন্টমেন্ট', 'Nueva cita', '新的約會', 'नव नियुक्ति'),
(14, 'click_on_a_day_or_event_to_see_appointments', '', 'একটি দিন বা ইভেন্ট সাক্ষাৎকারগুলি দেখুন এ ক্লিক করুন', 'Haga clic en un día o evento para ver citas', '點擊某一天或一個事件要見約會', 'एक दिन या घटना नियुक्ति देखने के लिए क्लिक करें'),
(15, 'appointment_schedule', '', 'অ্যাপয়েন্টমেন্ট নির্দিষ্ট সময় নির্ধারণের', 'Programar una cita', '約會時間表', 'नियुक्ति अनुसूची'),
(16, 'no_appointments_found_on', '', 'কোন অ্যাপয়েন্টমেন্টগুলো পাওয়া', 'No hay citas conocer en', '沒有約會發現', 'कोई नियुक्ति पर मिले'),
(17, 'prescription_list', '', 'প্রেসক্রিপশন তালিকা', 'Lista de prescripción', '處方一覽', 'प्रिस्क्रिप्शन सूची'),
(18, 'new_prescription', '', 'নিউ প্রেসক্রিপশন', 'nueva receta', '新處方', 'नई प्रिस्क्रिप्शन'),
(19, 'date', '', 'তারিখ', 'Fecha', '日期', 'तारीख'),
(20, 'options', '', 'বিকল্প', 'opciones', '選項', 'विकल्प'),
(21, 'invoices', '', 'চালান', 'Facturas', '發票', 'चालान'),
(22, 'create_invoice', '', 'চালান তৈরি করুন', 'Crear factura', '創建發票', 'इनवॉयस बनाएँ'),
(23, 'code', '', 'কোড', 'Código', '碼', 'कोड'),
(24, 'amount', '', 'পরিমাণ', 'Cantidad', '量', 'रकम'),
(25, 'status', '', 'অবস্থা', 'Estado', '狀態', 'स्थिति'),
(26, 'total_billing_amount_for', '', 'মোট বিলিং সময়ের জন্য', 'Facturación importe total de', '總結算金額', 'कुल बिलिंग राशि के लिए'),
(27, 'back_to_invoice_list', '', 'পিছনে চালান লিস্টে', 'Volver a la lista de facturas', '返回發票清單', 'वापस चालान सूची के लिए'),
(28, 'select_patient', '', 'রোগীর নির্বাচন', 'Seleccionar paciente', '選擇病人', 'रोगी का चयन करें'),
(29, 'new_patient', '', 'নিউ রোগীর', 'Paciente nuevo', '新患者', 'नए रोगी'),
(30, 'phone', '', 'ফোন', 'Teléfono', '電話', 'फ़ोन'),
(31, 'phone_number', '', 'ফোন নম্বর', 'Número de teléfono', '電話號碼', 'फ़ोन नंबर'),
(32, 'name', '', 'নাম', 'Nombre', '名稱', 'नाम'),
(33, 'patient_name', '', 'রোগীর নাম', 'Nombre del paciente', '患者姓名', 'रोगी का नाम'),
(34, 'invoice_code', '', 'চালান কোড', 'Código de factura', '發票代碼', 'चालान कोड'),
(35, 'invoice_title', '', 'চালান শিরোনাম', 'Título de la factura', '發票抬頭', 'चालान शीर्षक'),
(36, 'charge', '', 'অভিযোগ', 'Cargar', '收費', 'चार्ज'),
(37, 'amount_in', '', 'পরিমাণ', 'Cantidad en', '量', 'इसमें राशि'),
(38, 'paid', '', 'পেইড', 'Pagado', '付費', 'भुगतान किया है'),
(39, 'unpaid', '', 'অবৈতনিক', 'No pagado', '未付', 'अवैतनिक'),
(40, 'patient_list', '', 'রোগীর তালিকা', 'Lista de pacientes', '病人列表', 'रोगी सूची'),
(41, 'age', '', 'বয়স', 'Años', '年齡', 'आयु'),
(42, 'address', '', 'ঠিকানা', 'Dirección', '地址', 'पता'),
(43, 'chamber_list', '', 'চেম্বার তালিকা', 'Lista de cámara', '商會列表', 'चैंबर सूची'),
(44, 'chamber_name', '', 'চেম্বার নাম', 'Nombre cámara', '商會名稱', 'चैंबर नाम'),
(45, 'chamber_address', '', 'চেম্বার ঠিকানা', 'cámara Dirección', '商會地址', 'चैंबर पता'),
(46, 'save', '', 'সংরক্ষণ করুন', 'Salvar', '保存', 'बचाना'),
(47, 'add_chamber', '', 'চেম্বার যোগ করুন', 'Añadir Cámara', '加入商會', 'चैंबर जोड़े'),
(48, 'manage', '', 'পরিচালনা করা', 'Gestionar', '管理', 'प्रबंधित'),
(49, 'doctor_name', '', 'ডক্টর নাম', 'Nombre médico', '醫生姓名', 'डॉक्टर का नाम'),
(50, 'doctor_email', '', 'ডক্টর ইমেইল', 'médico electrónico', '醫生電子郵件', 'डॉक्टर ईमेल'),
(51, 'currency', '', 'মুদ্রা', 'Moneda', '貨幣', 'मुद्रा'),
(52, 'language', '', 'ভাষা', 'Idioma', '語言', 'भाषा'),
(53, 'english', '', 'ইংরেজি', 'Inglés', '英語', 'अंग्रेज़ी'),
(54, 'logo', '', 'লোগো', 'Logo', '商標', 'प्रतीक चिन्ह'),
(55, 'update_settings', '', 'সেটিংস আপডেট করুন', 'Ajustes de actualización', '更新設置', 'सेटिंग अपडेट करें'),
(56, 'settings_updated', '', 'সেটিংস আপডেট', 'Ajustes actualizan', '設置更新', 'सेटिंग को अद्यतन किया गया है'),
(57, 'success', '', 'সাফল্য', 'Éxito', '成功', 'सफलता'),
(58, 'profile_information', '', 'জীবন তথ্য', 'información del perfil', '檔案信息', 'प्रोफ़ाइल जानकारी'),
(59, 'email', '', 'ইমেইল', '<font style=\"vertical-align: inherit;\"><font style=\"vertical-align: inherit;\" class=\"\">Email', '電子郵件', 'ईमेल'),
(60, 'doctor_phone', '', 'ডক্টর ফোন', 'médico Teléfono', '醫生電話', 'डॉक्टर फ़ोन'),
(61, 'update_profile_information', '', 'প্রোফাইল তথ্য আপডেট', 'Actualizar la información del perfil', '更新個人資料信息', 'प्रोफ़ाइल जानकारी अद्यतन'),
(62, 'change_password', '', 'পাসওয়ার্ড পরিবর্তন', 'Cambia la contraseña', '更改密碼', 'पासवर्ड बदलें'),
(63, 'current_password', '', 'বর্তমান পাসওয়ার্ড', 'contraseña actual', '當前密碼', 'वर्तमान पासवर्ड'),
(64, 'your_current_password', '', 'আপনার বর্তমান পাসওয়ার্ড', 'Tu contraseña actual', '當前密碼', 'आपका वर्तमान पासवर्ड'),
(65, 'new_password', '', 'নতুন পাসওয়ার্ড', 'Nueva contraseña', '新密碼', 'नया पासवर्ड'),
(66, 'your_new_password', '', 'আপনার নতুন গোপন নাম্বার', 'Tu nueva contraseña', '您的新密碼', 'आपका नया पासवर्ड'),
(67, 'confirm_password', '', 'পাসওয়ার্ড নিশ্চিত করুন', 'Confirmar contraseña', '確認密碼', 'पासवर्ड की पुष्टि कीजिये'),
(68, 'retype_new_password', '', 'পুনরায় টাইপ করুন নতুন পাসওয়ার্ড', 'Reescriba nueva contraseña', '重新輸入新密碼', 'नया पासवर्ड दोबारा टाइप करें'),
(69, 'update_password', '', 'আপডেট পাসওয়ার্ড', 'Actualiza contraseña', '更新密碼', 'अद्यतन पासवर्ड'),
(70, 'your_profile_info_is_updated_successfully', '', 'প্রোফাইলের তথ্য সফলভাবে আপডেট করা হয়', 'Información de su perfil se actualiza correctamente', '您的資料信息進行更新成功', 'अपने प्रोफ़ाइल जानकारी सफलतापूर्वक अपडेट कर रहा है'),
(71, 'chamber_changed_successfully', '', 'চেম্বার সফলভাবে পরিবর্তন', 'Cámara cambiado correctamente', '商會修改成功', 'चैंबर सफलतापूर्वक बदल'),
(72, 'back_to_appointment_list', '', 'পিছনে নিয়োগ লিস্টে', 'De nuevo a la Lista de citas', '回到約會列表', 'वापस नियुक्ति सूची के लिए'),
(73, 'schedule', '', 'তফসিল', 'Programar', '時間表', 'अनुसूची'),
(74, 'create_appointment', '', 'নিয়োগ তৈরি করুন', 'crear cita', '創建約會', 'नियुक्ति बनाएं'),
(75, 'back_to_prescription_list', '', 'পিছনে প্রেসক্রিপশন লিস্টে', 'Volver a la lista de la prescripción', '回到處方一覽', 'वापस प्रिस्क्रिप्शन सूची के लिए'),
(76, 'symptoms', '', 'লক্ষণ', 'Los síntomas', '症狀', 'लक्षण'),
(77, 'add_symptoms', '', 'লক্ষণ যোগ করুন', 'Añadir síntomas', '添加症狀', 'लक्षण जोड़े'),
(78, 'diagnosis', '', 'রোগ নির্ণয়', 'Diagnóstico', '診斷', 'निदान'),
(79, 'add_diagnosis', '', 'রোগ নির্ণয় যোগ করুন', 'Añadir Diagnóstico', '添加診斷', 'निदान जोड़े'),
(80, 'medicine', '', 'ঔষধ', 'Medicina', '醫學', 'दवा'),
(81, 'medicine_name', '', 'মেডিসিন নাম', 'Nombre del medicamento', '醫學名稱', 'चिकित्सा नाम'),
(82, 'notes', '', 'নোট', 'notas', '筆記', 'टिप्पणियाँ'),
(83, 'remove', '', 'অপসারণ', 'retirar', '去掉', 'हटाना'),
(84, 'add_medicine', '', 'মেডিসিন যোগ করুন', 'Añadir Medicina', '加藥系統', 'चिकित्सा जोड़े'),
(85, 'test', '', 'পরীক্ষা', 'Prueba', '測試', 'परीक्षा'),
(86, 'test_name', '', 'পরীক্ষার নাম', 'Nombre de la prueba', '測試名稱', 'परीक्षण का नाम'),
(87, 'add_test', '', 'টেস্ট যোগ করুন', 'Añadir prueba', '添加測試', 'टेस्ट जोड़े'),
(88, 'save_prescription', '', 'প্রেসক্রিপশন সংরক্ষণ', 'Guardar Receta', '保存處方', 'प्रिस्क्रिप्शन सहेजें'),
(89, 'gender', '', 'লিঙ্গ', 'Género', '性別', 'लिंग'),
(90, 'male', '', 'পুরুষ', 'Masculino', '男', 'नर'),
(91, 'female', '', 'মহিলা', 'Hembra', '女', 'महिला'),
(92, 'invoice_was_created_successfully', '', 'চালান সফলভাবে তৈরি করা হয়েছে', 'Factura se ha creado correctamente', '發票成功創建', 'चालान सफलतापूर्वक बनाया गया'),
(93, 'invoice', '', 'চালান', 'Factura', '發票', 'बीजक'),
(94, 'print_invoice', '', 'প্রিন্ট চালান', 'Imprimir factura', '打印發票', 'चालान छापें'),
(95, 'to', '', 'থেকে', 'A', '至', 'सेवा मेरे'),
(96, 'info', '', 'তথ্য', 'información', '信息', 'जानकारी'),
(97, 'total', '', 'মোট', 'Total', '總', 'कुल'),
(98, 'view_invoice', '', 'দেখুন চালান', 'Mirar la factura', '查看發票', 'चालान देखें'),
(99, 'patient_profile', '', 'রোগীর প্রোফাইল', 'Perfil del paciente', '患者概況', 'रोगी प्रोफ़ाइल'),
(100, 'file', '', 'ফাইল', 'Archivo', '文件', 'फ़ाइल'),
(101, 'choose_file', '', 'ফাইল পছন্দ কর', 'Elija el archivo', '選擇文件', 'फ़ाइल का चयन'),
(102, 'manage_patient', '', 'রোগীর পরিচালনা', 'Manejo del paciente', '管理病人', 'रोगी की व्यवस्था करें'),
(103, 'back_to_patient_list', '', 'পিছনে রোগীর লিস্টে', 'De nuevo a la lista de pacientes', '回到病人列表', 'वापस रोगी सूची के लिए'),
(104, 'medical_info', '', 'মেডিকেল তথ্য', 'Información médica', '醫療信息', 'मेडिकल इन्फो'),
(105, 'visited', '', 'পরিদর্শন', 'Visitó', '訪問', 'का दौरा किया'),
(106, 'appointment_was_created_successfully', '', 'নিয়োগ সফলভাবে তৈরি করা হয়েছে', 'Cita se ha creado correctamente', '預約成功創建', 'नियुक्ति सफलतापूर्वक बनाया गया'),
(107, 'serial', '', 'ক্রমিক', 'De serie', '串行', 'धारावाहिक'),
(108, 'patients', '', 'রোগীদের', 'Los pacientes', '耐心', 'मरीजों'),
(109, 'edit_patient', '', 'রোগীর সম্পাদনা', 'Editar paciente', '編輯患者', 'रोगी संपादित करें'),
(110, 'back_to_patient_profile', '', 'পিছনে রোগীর প্রোফাইল', 'Volver al perfil del paciente', '回到病人檔案', 'वापस रोगी प्रोफ़ाइल करने के लिए'),
(111, 'basic_info', '', 'মৌলিক তথ্য', 'Información básica', '基本信息', 'बुनियादी जानकारी'),
(112, 'blood_group', '', 'রক্তের গ্রুপ', 'Grupo sanguíneo', '血型', 'रक्त समूह'),
(113, 'height', '', 'উচ্চতা', 'Altura', '高度', 'ऊंचाई'),
(114, 'weight', '', 'ওজন', 'Peso', '重量', 'वजन'),
(115, 'blood_pressure', '', 'রক্তচাপ', 'Presión sanguínea', '血壓', 'रक्त चाप'),
(116, 'pulse', '', 'নাড়ি', 'Legumbres', '脈衝', 'नाड़ी'),
(117, 'respiration', '', 'শ্বসন', 'Respiración', '呼吸', 'श्वसन'),
(118, 'allergy', '', 'এলার্জি', 'Alergia', '過敏', 'एलर्जी'),
(119, 'diet', '', 'সাধারণ খাদ্য', 'Dieta', '飲食', 'आहार'),
(120, 'save_patient_info', '', 'রোগীর তথ্য সংরক্ষণ করুন', 'Guardar Información del Paciente', '保存病人信息', 'रोगी जानकारी सहेजें'),
(121, 'not_available', '', 'পাওয়া যায় না', 'No disponible', '無法使用', 'उपलब्ध नहीं है'),
(122, 'medical_info_unavailable', '', 'মেডিকেল তথ্য অনুপলব্ধ', 'Información Médica No Disponible', '醫療信息不可用', 'मेडिकल जानकारी अनुपलब्ध'),
(123, 'no', '', 'না', 'No', '沒有', 'नहीं'),
(124, 'manage_prescription', '', 'প্রেসক্রিপশন পরিচালনা', 'Manejo de Receta', '處方管理', 'प्रिस्क्रिप्शन की व्यवस्था करें'),
(125, 'delete', '', 'মুছে ফেলা', 'Borrar', '刪除', 'हटाना'),
(126, 'print_prescription', '', 'প্রিন্ট প্রেসক্রিপশন', 'Imprimir Receta', '打印處方', 'प्रिंट प्रिस्क्रिप्शन'),
(127, 'type', '', 'আদর্শ', 'Tipo', '類型', 'प्रकार'),
(128, 'select', '', 'নির্বাচন করা', 'Seleccionar', '選擇', 'चुनते हैं'),
(129, 'a', '', 'একজন', 'UN', '一個', 'ए'),
(130, 'b', '', 'বি', 'segundo', '乙', 'बी'),
(131, 'c', '', 'সি', 'do', 'C', 'सी'),
(132, 'patient_profile_was_updated_successfully', '', 'রোগীর প্রোফাইল সফলভাবে আপডেট করা হয়েছে', 'Perfil del paciente se ha actualizado correctamente', '患者資料進行了更新成功', 'रोगी प्रोफ़ाइल सफलतापूर्वक अपडेट किया गया'),
(133, 'prescription_was_updated_successfully', '', 'প্রেসক্রিপশন সফলভাবে আপডেট করা হয়েছে', 'La prescripción se ha actualizado correctamente', '處方已成功更新', 'प्रिस्क्रिप्शन सफलतापूर्वक अपडेट किया गया'),
(134, 'doctor_qualification', '', 'ডক্টর যোগ্যতা', 'Calificación médico', '醫師資格', 'डॉक्टर योग्यता'),
(135, 'qualification', '', 'যোগ্যতা', 'Calificación', '合格', 'योग्यता'),
(136, 'prescription_was_created_successfully', '', 'প্রেসক্রিপশন সফলভাবে তৈরি করা হয়েছে', 'La prescripción se ha creado correctamente', '處方成功創建', 'प्रिस्क्रिप्शन सफलतापूर्वक बनाया गया'),
(137, 'download', '', 'ডাউনলোড', 'Descargar', '下載', 'डाउनलोड'),
(138, 'files', '', 'নথি পত্র', 'archivos', '檔', 'फ़ाइलें'),
(139, 'file_was_deleted_successfully', '', 'ফাইল সফলভাবে মোছা হয়েছে', 'El archivo se ha eliminado correctamente', '成功刪除文件，', 'फ़ाइल सफलतापूर्वक हटा दिया गया'),
(140, 'add_patient', '', 'রোগীর যোগ করুন', 'Añadir paciente', '添加病人', 'रोगी जोड़े'),
(141, 'the_phone_number_you_have_entered_is_not_valid_or_already_associated_with_another_account', '', 'ফোন নম্বর আপনার লেখা বৈধ বা ইতিমধ্যেই অন্য অ্যাকাউন্টের সঙ্গে যুক্ত নয় এমন', 'El número de teléfono que ha introducido no es válido o están asociados con otra cuenta', '電話號碼您輸入無效，或已關使用其他帳戶', 'फ़ोन नंबर आपके द्वारा दिया गया वैध या पहले से ही अन्य खाते से संबद्ध नहीं है'),
(142, 'new_patient_was_created_successfully', '', 'নিউ রোগীর সফলভাবে তৈরি করা হয়েছে', 'Nuevo Paciente se ha creado correctamente', '新患者成功創建', 'नए रोगी सफलतापूर्वक बनाया गया'),
(143, 'purchase_code', '', 'ক্রয় কোড', 'Código de compra', '申購代碼', 'खरीद कोड'),
(144, 'install_update', '', 'আপডেট ইনস্টল করুন', 'Instalar actualización', '安裝更新', 'अद्यतन स्थापित करें'),
(145, 'product_updated_successfully', '', 'প্রোডাক্ট সফলভাবে আপডেট', 'Producto actualizado correctamente', '已成功更新產品', 'उत्पाद सफलतापूर्वक अपडेट'),
(146, 'manage_language', '', 'ভাষা পরিচালনা', 'Manejo de Lenguaje', '管理語言', 'भाषा की व्यवस्था करें'),
(147, 'phrase_list', '', 'শব্দবন্ধ তালিকা', 'Lista frase', '短語列表', 'वाक्यांश सूची'),
(148, 'add_phrase', '', 'শব্দবন্ধ যোগ করুন', 'Añadir Frase', '新增詞組', 'वाक्यांश जोड़ें'),
(149, 'add_language', '', 'ভাষা যুক্ত করুন', 'Agregar idioma', '添加語言', 'भाषा जोड़े'),
(150, 'option', '', 'পছন্দ', 'Opción', '選項', 'विकल्प'),
(151, 'edit_phrase', '', 'শব্দবন্ধ সম্পাদনা', 'Editar Frase', '編輯短語', 'वाक्यांश संपादित करें'),
(152, 'delete_language', '', 'ভাষা মুছুন', 'eliminar idioma', '刪除語言', 'भाषा हटाएं'),
(153, 'phrase', '', 'শব্দবন্ধ', 'Frase', '短語', 'मुहावरा'),
(154, 'update_phrase', '', 'আপডেট শব্দবন্ধ', 'actualización Frase', '更新短語', 'अद्यतन वाक्यांश'),
(155, 'update_product', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `about` text COLLATE utf8_unicode_ci,
  `age` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medical_info` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
CREATE TABLE `prescription` (
  `prescription_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `symptom` text COLLATE utf8_unicode_ci NOT NULL,
  `diagnosis` text COLLATE utf8_unicode_ci NOT NULL,
  `medicine` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'json',
  `test` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'json',
  `patient_id` int(11) NOT NULL,
  `chamber_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'doctor_name', 'doctor'),
(2, 'chamber_id', '1'),
(3, 'currency', 'USD'),
(4, 'language', 'english'),
(5, 'logo', 'logo.png'),
(6, 'doctor_email', 'doctor@example.com'),
(7, 'purchase_code', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type` int(3) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL,
  `auth_token` text COLLATE utf8_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `chamber`
--
ALTER TABLE `chamber`
  ADD PRIMARY KEY (`chamber_id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chamber`
--
ALTER TABLE `chamber`
  MODIFY `chamber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
