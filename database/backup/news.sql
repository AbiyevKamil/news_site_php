-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2022 at 09:39 PM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `code` varchar(10) NOT NULL,
  `expire_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`id`, `user_id`, `code`, `expire_date`) VALUES
(1, '625090990bfda6.27809311', '418850', '2022-04-08 19:44:27'),
(11, '', '362683', '2022-04-08 21:35:54'),
(12, '6250ab13bad5a9.10652503', '338485', '2022-04-08 21:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(5) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(100) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(5) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `news_id` int(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(5) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `banner` varchar(150) NOT NULL,
  `is_deleted` bit(1) NOT NULL DEFAULT b'0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `banner`, `is_deleted`, `created_at`, `updated_at`, `user_id`) VALUES
(115, 'Bakıda evin zirzəmisində yanğın olub, ölən var', 'Bakıda evin zirzəmisində yanğın olub, ölən var.Bu barədə "Report"a Fövqəladə Hallar Nazirliyindən məlumat verilib.Qeyd olunub ki, Bakı şəhərinin Binəqədi rayonunda ümumi sahəsi 330 m² (hər mərtəbəsi 110 m²) olan mansarda tipli üçmərtəbəli evin zirzəmisində 1 ədəd çarpayı yanıb. Yanğın yerinin kəşfiyyatı zamanı 1989-cu il təvəllüdlü Əliyev Orxan Tahir oğlunun yanmış meyiti yanğınsöndürənlər tərəfindən aşkar edilərək aidiyyəti üzrə təhvil verilib. Ev yanğından mühafizə olunub. Yanğın yanğından mühafizə bölmələri tərəfindən söndürülüb.Hadisə ilə əlaqədar müvafiq qurumlar tərəfindən təhqiqat aparılır.Saytdakı materialların istifadəsi zamanı istinad edilməsi vacibdir. Məlumat internet səhifələrində istifadə edildikdə hiperlink vasitəsi ilə istinad mütləqdir."Report" müstəqil informasiya agentliyi sayt və gündəlik bülletenlər vasitəsi ilə Azərbaycan, rus və ingilis dillərində siyasət, iqtisadiyyat, cəmiyyət, idman, mədəniyyət sahələri üzrə ölkədə və dünyada baş verən ən vacib hadisələri öz oxucularına operativ şəkildə çatdırır. O cümlədən, saytın “Analitika” bölməsində Azərbaycanda və dünyada gedən proseslərlə bağlı analitik materiallar təqdim edilir.', 'https://static.report.az/photo/024b76de-cb9e-3ee0-b6f1-e9e8f379a323_180.jpg', b'0', '2022-03-26 18:06:58', NULL, '60423032-ad08-11ec-ba09-002b67e478b5'),
(116, 'Bayden: “Ukraynada baş verənlər XXI əsri dəyişdirəcək”', '“Bayden mənə iki şey söylədi: Ukraynada baş verənlər XXI əsri dəyişdirəcək. O, bunu aydın başa düşür - bu, Rusiyanın Ukraynaya qarşı müharibəsi deyil, bu, tiranlığın bütün dünyaya qarşı müharibəsidir”.“Report” "RBK Ukraina"ya istinadən xəbər verir ki, bunu Ukraynanın xarici işlər naziri Dmitro Kuleba Polşanın paytaxtı Varşavadan ABŞ Prezidenti Cozef Baydenlə görüşdən sonra bildirib.“O həmçinin bildirib ki, ABŞ bizim qələbəmiz üçün hər məsələdə Ukraynanın yanında olacaq, heç bir şey ABŞ-ı Ukraynadan kənarlaşmağa və dəstəyi zəiflətməyə məcbur etməyəcək, əksinə, dəstək yalnız güclənəcək”, - XİN başçısı bildirib.Saytdakı materialların istifadəsi zamanı istinad edilməsi vacibdir. Məlumat internet səhifələrində istifadə edildikdə hiperlink vasitəsi ilə istinad mütləqdir."Report" müstəqil informasiya agentliyi sayt və gündəlik bülletenlər vasitəsi ilə Azərbaycan, rus və ingilis dillərində siyasət, iqtisadiyyat, cəmiyyət, idman, mədəniyyət sahələri üzrə ölkədə və dünyada baş verən ən vacib hadisələri öz oxucularına operativ şəkildə çatdırır. O cümlədən, saytın “Analitika” bölməsində Azərbaycanda və dünyada gedən proseslərlə bağlı analitik materiallar təqdim edilir.', 'https://static.report.az/photo/11e95070-0568-396a-b9dc-a64704ce4991_180.jpeg', b'0', '2022-03-26 18:06:58', NULL, '60423032-ad08-11ec-ba09-002b67e478b5'),
(117, '"Qərbdə, Rusiyada Ermənistanın xəyanətkarlığı ənənəyə çevirdiyini yaxşı bil...', '“Dünya ictimaiyyəti bir daha Ermənistanın ikiüzlülüyünün¸erməni idarəçilərin xəyanətkarlığının, öz ağalarını rahatlıqla satmağının şahidi olur. Bədnam qonşularımza xas bu xüsusiyyətlər bu dəfə də Rusiya-Ukrayna gərginliyi fonunda nümayiş etdirilir”.Bu fikirləri "Report"a açıqlamasında Milli Məclisin deputatı Vüqar İskəndərov deyib.Onun sözlərinə görə, Ermənistanın xarici işlər naziri Ararat Mirzoyanın Gürcüstanın xarici işlər naziri David Zalkalianiyə zəngi zamanı sərgilənən mövqe bunu deməyə əsas verir: “Biz burada bir daha Ermənistan rəhbərliyinin satqınlığı və riyakarlığının şahidi oluruq. Görünən odur ki, dünənə qədər Ruisyanın buyruq qulu olan, hətta Qazaxıstan olaylarında belə özünü Rusiyaya ən yaxın, ən isti müttəfiq kimi qələmə verməyə çalışan Ermənistan bu gün tamamilə başqa havalar eşqindədir. Yəni Ermənistan rəhbərliyi Gürcüstanla yaxınlaşma nümayiş etdirərək guya Rusiyanın təsiri altında olmadığını və Qərbə meyil etdiyini göstərməyə çalışır”.Deputat bildirib ki, bura son vaxtlar Ermənistanın guya NATO-ya meyillənməsi əhval-ruhiyyəsinin yaradılmasına edilən cəhdləri də əlavə etmək olar: “Halbuki NATO rəhbərliyi kimin kim olduğunu, kimin səmimi, kimin isə hiyləgər və müttəfiqinə qarşı xəyanət edən olduğunu yaxşı bilir. Xatırlatmaq istəyirəm ki, ötən ilin dekabrında "Şərq Tərəfdaşlığı" sammitində Azərbaycan, Ermənistan və Gürcüstan rəhbərləri NATO-ya dəvət olunmuşdular. Prezident Əliyev dəvəti qəbul etdi. NATO-nun Baş katibi Yens Stoltenberq ilə görüşdü və qurumun ali orqanı olan Şimali Atlantika Şurasında çıxış etdi. NATO-nun 30 üzv dövlətinin 20-dən artıq daimi nümayəndəsi, yəni NATO yanında səfirləri çıxış edərək Azərbaycanın rolunu və yürütdüyü siyasətini, Əfqanıstan əməliyyatında iştirakını yüksək qiymətləndirdilər. Gürcüstan rəhbərliyi də NATO-ya səfər etdi və müvafiq görüşlər keçirdi. Ancaq həmin vaxt Rusiyanın qorxusundan vassal və müstəmləkə dövlətin rəhbəri olan Nikol Paşinyan NATO-ya səfər etməkdən boyun qaçırdı. Çünki o vaxt Rusiya güclü idi və Ermənistan rəhbərliyi Moskvanın kölgəsinə sığınmağı özləri üçün xoşbəxtlik sayırdı. İndi isə Rusiyanın zəiflədiyini görən Nikol Paşinyanın özünü və təmsil etdiyi dövləti guya Qərbpərəst, NATO sevdalısı göstərməsi, əslində, batmaqda olan gəmini tez tərk edən siçovullara bənzəyir”.“Əslində, Ermənistanın daima ikili oyun oynadığını, xəyanətkarlığı ənənəyə çevirdiyini Qərbdə də, Rusiyada da yaxşı bilirlər. Sadəcə olaraq, son olay bədnam qonşularımızın bu xislətlərindən heç zaman əl çəkməyəcəklərinin növbəti sübutu oldu”, - V.İskəndərov vurğulayıb.Saytdakı materialların istifadəsi zamanı istinad edilməsi vacibdir. Məlumat internet səhifələrində istifadə edildikdə hiperlink vasitəsi ilə istinad mütləqdir."Report" müstəqil informasiya agentliyi sayt və gündəlik bülletenlər vasitəsi ilə Azərbaycan, rus və ingilis dillərində siyasət, iqtisadiyyat, cəmiyyət, idman, mədəniyyət sahələri üzrə ölkədə və dünyada baş verən ən vacib hadisələri öz oxucularına operativ şəkildə çatdırır. O cümlədən, saytın “Analitika” bölməsində Azərbaycanda və dünyada gedən proseslərlə bağlı analitik materiallar təqdim edilir.', 'https://static.report.az/photo/fdfb7475-bc90-4541-8494-e984f4f4ca8c_180.jpg', b'0', '2022-03-26 18:06:58', NULL, '60423032-ad08-11ec-ba09-002b67e478b5'),
(118, 'Foto Nazir müavini: "Azad olunmuş ərazilərdə hindistanlı iş adamlarını görmək is...', '"Azərbaycan azad olunmuş ərazilərində hindistanlı iş adamlarını görmək istəyir və onları dəvət edir"."Report" xəbər verir ki, bunu Bakıda keçirilən “Best of India” - Hindistan məhsullarının ən böyük eksklüziv Ticarət Sərgisinin açılışında ekologiya və təbii sərvətlər nazirinin müavini Firdovsi Əliyev deyib.F. Əliyev isə iki ölkə arasında əlaqələrin genişlənməsində maraqlı olduqlarını qeyd edib: "Gənclik vaxtında bizim ən çox sevdiyimiz film Hindistan filmləri idi. Hətta uzaq dağ kəndlərində də onun həsrətində olanlar var idi. Məsafə baxımından iki ölkə uzaqda yerləşsə də ürəklər arasında əlaqə var idi.Müstəqillikdən sonra ölkələrimiz arasında münasibətlər qurulmağa başladı və indi bu əlaqələr yüksəkdir. Amma biz bununla razı deyilik. İstəyirik ki, əlaqələrimiz daha da inkişaf etsin".Hindistanın Azərbaycandakı səfiri Bavitlunq Vanlalvavna qeyd edib ki, hər il ənənəvi olaraq keçirilən sərgi pandemiya səbəbindən 2 il keçirilməyib: "9 gün ərzində davam edəcək sərgi Hindistanın müstəqilliyinin 75 illiyinə həsr edilib".Qeyd edək ki, bu ilki sərgi “Best of India” sərgisinin səkkizinci buraxılışı olacaq və bu sərgidə özünün düyü, çay, ədviyyatlar, hədiyyələr, əl işləri, ev mebeli kimi yüksək keyfiyyətli məhsul və xidmətlərini nümayiş etdirəcək Hindistanın 60-a yaxın şirkət iştirak edəcək.2021-ci il ərzində Hindistan və Azərbaycan arasında ümumi ticarət dövriyyəsi 2020-ci ilə nisbətən 26,8 % artaraq 739,1 milyon ABŞ dolları təşkil edib.Saytdakı materialların istifadəsi zamanı istinad edilməsi vacibdir. Məlumat internet səhifələrində istifadə edildikdə hiperlink vasitəsi ilə istinad mütləqdir."Report" müstəqil informasiya agentliyi sayt və gündəlik bülletenlər vasitəsi ilə Azərbaycan, rus və ingilis dillərində siyasət, iqtisadiyyat, cəmiyyət, idman, mədəniyyət sahələri üzrə ölkədə və dünyada baş verən ən vacib hadisələri öz oxucularına operativ şəkildə çatdırır. O cümlədən, saytın “Analitika” bölməsində Azərbaycanda və dünyada gedən proseslərlə bağlı analitik materiallar təqdim edilir.', 'https://static.report.az/photo/59d4233f-1ec5-34b1-967f-5f27ec1b5f12_180.jpg', b'0', '2022-03-26 18:06:58', NULL, '60423032-ad08-11ec-ba09-002b67e478b5'),
(119, 'Deputat: "Ermənistan üzərinə götürdüyü öhdəlikləri hələ də yerinə yetirməyi...', '“Azərbaycan və Ermənistan arasında hərbi əməliyyatlara son qoyan bəyanatın imzalanmasından bir ildən çox vaxt keçir. Təəsüf ki, həmin sənədə əsasən Ermənistan üzərinə götürdüyü öhdəliklərin bir hissəsini hələ də yerinə yetirməyib”.Bu fikirləri "Report”a açıqlamasında Milli Məclisin deputatı Nigar Arpadarai deyib.O xatırladıb ki, Rusiya sülhməramlılarının müvəqqəti yerləşdirildiyi məsuliyyət zonasında hələ də qanunsuz erməni silahlı dəstələri var: “Ermənistan Azərbaycan üçün Naxçıvana dəhliz təmin etməyib. Azərbaycanlılar hələ də Xocalıya və Azərbaycanın digər yaşayış məntəqələrinə qayıtmayıblar. Bundan əlavə, hərbi cinayətkarlar Arayik Aratunyan və Vitali Balasanyan hələ də Xankəndində “rəhbərlik” edir, yerli erməni əhalisinin arxasında gizlənir, diaspor yardımlarını oğurlayırlar. Bunlar bir qrup xırda fırıldaqçı və hərbi cinayətkarlardır ki, özlərini hökumət nümayəndəsi kimi təqdim edirlər və yeganə məqsədləri daha çox oğurluq edəndən sonra yerdə qalan erməniləri unudub Soçi və ya Qlendeylə köçməkdir”.Deputat bildirib ki, Azərbaycan bu müddət ərzində çox səbirli olub, öhdəliklərini yerinə yetirib və təxribatlara təmkinlə reaksiya verib: “Bunun arxasında, heç şübhəsiz, seçdiyi kursdan, yəni Azərbaycan dövlətçiliyinin möhkəmləndirilməsindən heç kimin döndərə bilməyəcəyini dəfələrlə sübut edən Azərbaycan Prezidentinin strateji və uzunmüddətli baxışı dayanır. Bu müddət ərzində Xankəndinə Ermənistan və Fransadan bir neçə təxribat mahiyyətli səfərlər təşkil olunub ki, onların da məqsədi “DQR”in müəyyən subyektivliyini nümayiş etdirmək idi. “DQR rəsmiləri” mütəmadi olaraq bəyan edirlər ki, “DQR” heç vaxt Azərbaycanın tərkibində olmayacaq. Eyni zamanda, bu ritorikanın İrəvanla razılaşdırıldığı da tamamilə göz qabağındadır. Eyni zamanda, Paşinyan özü də “DQR” mövzusundan yayınır və qeyri-müəyyən eyhamlara istinad edir ki, Ermənistan artıq bu məsələni ərazi mövzusu hesab etmir. İndi onun üçün bu, “hüquqlar məsələsidir”. O, açıq-aydın xalqların öz müqəddəratını təyinetmə hüququnu, ermənilərin ənənəvi olaraq ayrılma hüququ kimi şərh etdikləri beynəlxalq hüquqi prinsiplərdən birini nəzərdə tutur. Hansı ki, düzgün deyil. İstər erməni, istərsə də Azərbaycan xalqı çoxdan öz ərazilərində öz müqəddəratını təyin edib. Yəni Ermənistanın əsas məqsədi deyil, yalnız taktikasını dəyişib. Məqsəd isə eynidir - qonşulara qarşı ərazi iddiaları. Eyni zamanda Ermənistan bu gün sadəcə olaraq bu məqsədə nail ola bilmədiyini yaxşı dərk edir. Biz isə Ermənistanın məqsədini unutmamalı və ona uyğun hərəkət etməliyik, çünki bu mövqe regionda sülh üçün əsas təhlükədir".N.Arpadarai vurğulayıb ki, “DQR” rejiminin və ordusunun qalıqlarını saxlamaq və gücləndirmək məqsədini daşıyan Ermənistanın birbaşa və dolayı yardımı Azərbaycana qarşı düşmən addımlarıdır: "Ermənistandan Azərbaycanın Qarabağ bölgəsində müvvəqəti yerləşdirilən Rusiya sülhməramlılarının məsuliyyət zonasına qaz nəqli bunlardan biridir. Azərbaycanın son aylarda bu daşımalara müdaxilə etməməsi humanitar və texniki səbəblərlə asanlıqla izah olunur. Azərbaycanın Qarabağ bölgəsində yaşayan erməni millətindən olan mülki şəxslərin isti evlərdə normal və təhlükəsiz yaşamaq hüququ var. Lakin Azərbaycan Ermənistanın Azərbaycan ərazisində hələ də qalan qanunsuz dəstələrə dəstəyinə göz yummağa borclu deyil. Bu həmçinin qaz nəqlinə şamil olunur. Azərbaycan bu gün üçtərəfli bəyanatın müddəaları çərçivəsində fəaliyyət göstərir. Bundan əlavə, sülhməramlı qüvvələrin kontingentinin normal fəaliyyəti təmin edilir. Lakin Azərbaycan qaz kəmərinin işləməsini təmin etmək kimi öhdəliyi üzərinə götürməyib. Deməli, onun işinə icazə verib-verməmək məsələsi Azərbaycanın öz qərarından asılıdır"."Hökumətimiz müəyyən şərtlər daxilində humanitar məqsədlərini rəhbər tutaraq müəyyən həcmdə qazın nəqlinə icazə verə bilər. Məsələn, mülki əhali və sülhməramlı qüvvələrin kontingenti üçün lazım olan həcmdən söhbət gedə bilər. Eyni zamanda bu qazın necə istehlak edildiyinin monitorinqini tətbiq etmək lazımdır. Birincisi, istifadəçilərin siyahısını və sayını, eləcə də istehlakçılar üçün məqbul kvota müəyyən etməklə. Şübhəsiz, Azərbaycan qanunsuz erməni silahlı dəstələrini qazla təmin etməməlidir və etməyəcək. Bundan əlavə, bu mexanizm müəyyən müddət üçün nəzərdə tutula bilər. Rusiya sülhməramlılarının müvəqqəti yerləşdirildiyi ərazidə əvvəlcədən müəyyən edilmiş məqbul müddət ərzində istehlakçıların abonent kimi Azərbaycanın qazpaylayıcı sisteminə, eləcə də digər ictimai xidmətlərə qoşulması təmin edilməlidir. Mülki vətəndaşlar üçün bu, heç bir problem yaratmayacaq, lakin ərazidə hələ də qalan erməni silahlı qüvvələrin nazı ilə oynamaq öhdəliymiz yoxdur və onların fikri də bizi maraqlandırmır. Beləliklə, Erməni mediasının ümumdünya çağırışına və isterikasına baxmayaraq, bu mövqeyin ədalətli, qanuni və Azərbaycanın öz xalqı və beynəlxalq ictimaiyyət qarşısında götürdüyü öhdəliklərə tam uyğun gəldiyini nümayiş etdirmək üçün Azərbaycanın aidiyyəti olan qurumlarının bunu həyata keçirə bildiyini düşünürəm", - deputat qeyd edib.Saytdakı materialların istifadəsi zamanı istinad edilməsi vacibdir. Məlumat internet səhifələrində istifadə edildikdə hiperlink vasitəsi ilə istinad mütləqdir."Report" müstəqil informasiya agentliyi sayt və gündəlik bülletenlər vasitəsi ilə Azərbaycan, rus və ingilis dillərində siyasət, iqtisadiyyat, cəmiyyət, idman, mədəniyyət sahələri üzrə ölkədə və dünyada baş verən ən vacib hadisələri öz oxucularına operativ şəkildə çatdırır. O cümlədən, saytın “Analitika” bölməsində Azərbaycanda və dünyada gedən proseslərlə bağlı analitik materiallar təqdim edilir.', 'https://static.report.az/photo/eb1f11fc-71f3-3d1a-aea7-e80a03a42391_180.jpg', b'0', '2022-03-26 18:06:58', NULL, '60423032-ad08-11ec-ba09-002b67e478b5'),
(120, '"İƏT-in qətnaməsi Azərbaycanın haqlı mövqeyinin dəstəklənməsinin göstəricis...', '"İslam Əməkdaşlıq Təşkilatının 4 yeni qətnamə qəbul etməsi Azərbaycanın haqlı mövqeyini dəstəklənməsinin göstəricisidir".“Report” xəbər verir ki, bunu Milli Məclisin deputatı Sədaqət Vəliyeva deyib.Onun sözlərinə görə, mürəkkəb və qeyri-sabit geostrateji proseslərin cərəyan etdiyi dövrdə Azərbaycan dünya ölkələri ilə yanaşı, beynəlxalq təşkilatlarla da əməkdaşlıq edir, mövcud əlaqələri daha dərinləşdirir, bir sıra əhəmiyyətli layihələr reallaşdırır: "Ölkəmizin uzun müddət yüksək səviyyədə əməkdaşlıq etdiyi təşkilatlardan biri də İslam Əməkdaşlıq Təşkilatıdır. İslam Əməkdaşlıq Təşkilatı hər zaman Azərbaycanın ədalətli mövqeyini dəstəkləyib. Təşkilatın Xarici İşlər Nazirləri Şurasının “Birlik, ədalət və inkişaf naminə tərəfdaşlığın qurulması” mövzusunda keçirilən sessiyasında Ermənistanın təcavüzü və Xocalı soyqırımı ilə bağlı 4 yeni qətnamənin qəbul edilməsi ölkəmizin növbəti diplomatik uğuru olmaqla yanaşı xüsusi əhəmiyyətə malikdir”.Deputat bildirib ki, qəbul edilən qətnamələr Ermənistanın Azərbaycana qarşı təcavüzkar və işğalçılıq siyasətinin dünya ictimaiyyətinə çatdırılmasında, saxta erməni təbliğatının qarşısının alınmasında böyük rol oynayacaq: "Bu qətnamələr beynəlxalq miqyasda Azərbaycanın haqlı mövqeyinin dəstəklənməsinin və ölkəmizin İslam dünyasındakı nüfuzunun göstəricisidir. Əlbəttə, bütün bunlar Prezident İlham Əliyevin həyata keçirdiyi müdrik xarici və diplomatik siyasətin nəticəsidir”.Rəvan ƏzizSaytdakı materialların istifadəsi zamanı istinad edilməsi vacibdir. Məlumat internet səhifələrində istifadə edildikdə hiperlink vasitəsi ilə istinad mütləqdir."Report" müstəqil informasiya agentliyi sayt və gündəlik bülletenlər vasitəsi ilə Azərbaycan, rus və ingilis dillərində siyasət, iqtisadiyyat, cəmiyyət, idman, mədəniyyət sahələri üzrə ölkədə və dünyada baş verən ən vacib hadisələri öz oxucularına operativ şəkildə çatdırır. O cümlədən, saytın “Analitika” bölməsində Azərbaycanda və dünyada gedən proseslərlə bağlı analitik materiallar təqdim edilir.', 'https://static.report.az/photo/38c6653a-7893-3628-9966-1fbe9b33dbea_180.jpg', b'0', '2022-03-26 18:06:58', NULL, '60423032-ad08-11ec-ba09-002b67e478b5'),
(121, '“Milli Nüvə Tədqiqatları Mərkəzi”nə yeni ləğvedici təyin edilib', 'Rəqəmsal İnkişaf və Nəqliyyat Nazirliyinə məxsus və hazırda ləğvetmə prosesində olan “Milli Nüvə Tədqiqatları Mərkəzi” QSC-nin rəhbəri dəyişib.“Report”un əldə etdiyi məlumata görə, quruma rəhbərlik müvəqqəti olaraq Rəqəmsal İnkişaf və Nəqliyyat Nazirliyinin Strateji təhlil, innovasiya və rəqəmsallaşma şöbəsinin müdiri Ceyhun Hüseynzadəyə tapşırılıb.C. Hüseynzadə bu vəzifədə adıçəkilən şöbənin keçmiş müdiri Anar Qasımovu əvəz edib.Qeyd edək ki, Azərbaycanda rəqəmsallaşma, innovasiya, yüksək texnologiyalar və rabitə sahəsində idarəetmənin təkmilləşdirilməsi ilə bağlı bəzi tədbirlər haqqında Azərbaycan Prezidentinin 11 oktyabr 2021-ci il tarixli Fərmanı ilə “Milli Nüvə Tədqiqatları Mərkəzi” Qapalı Səhmdar Cəmiyyətinin, İnnovasiyalar Agentliyi publik hüquqi şəxsin və Yüksək Texnologiyalar üzrə Tədqiqat Mərkəzinin birləşmə formasında yenidən təşkili yolu ilə İnnovasiya və Rəqəmsal İnkişaf Agentliyi yaradılıb.Saytdakı materialların istifadəsi zamanı istinad edilməsi vacibdir. Məlumat internet səhifələrində istifadə edildikdə hiperlink vasitəsi ilə istinad mütləqdir."Report" müstəqil informasiya agentliyi sayt və gündəlik bülletenlər vasitəsi ilə Azərbaycan, rus və ingilis dillərində siyasət, iqtisadiyyat, cəmiyyət, idman, mədəniyyət sahələri üzrə ölkədə və dünyada baş verən ən vacib hadisələri öz oxucularına operativ şəkildə çatdırır. O cümlədən, saytın “Analitika” bölməsində Azərbaycanda və dünyada gedən proseslərlə bağlı analitik materiallar təqdim edilir.', 'https://static.report.az/photo/222d7123-05f6-3982-8f01-f65879c08c60_180.jpg', b'0', '2022-03-26 18:06:58', NULL, '60423032-ad08-11ec-ba09-002b67e478b5'),
(122, 'Bakıda “Yer saatı” ekoloji aksiyası keçiriləcək', '“İçərişəhər” Dövlət Tarix-Memarlıq Qoruğu İdarəsi bu gün saat 20:30-dan 21:30-dək Qız Qalasının işıqlarını söndürərək “Yer saatı” ekoloji aksiyaya qoşulacaq.İdarədən "Report"a verilən məlumata görə, Ümumdünya Vəhşi Təbiət Fondunun təşəbbüsü ilə hər il martın son şənbə günü dünyada “Yer saatı” ekoloji aksiyası keçirilir.Aksiya çərçivəsində binaların fasad işıqları söndürülərək iqlim dəyişikliyinə və ekoloji fəsadlara diqqət cəlb edilir.Azərbaycan “Yer saatı” kampaniyasına rəsmi olaraq 2011-ci il martın 26-da qoşulub və ilk aksiya çərçivəsində Qız Qalasının işıqları söndürülüb. Bu il Bakının bir çox tanınmış tikililərinin fasad işıqları bir saatlıq söndürüləcək.Saytdakı materialların istifadəsi zamanı istinad edilməsi vacibdir. Məlumat internet səhifələrində istifadə edildikdə hiperlink vasitəsi ilə istinad mütləqdir."Report" müstəqil informasiya agentliyi sayt və gündəlik bülletenlər vasitəsi ilə Azərbaycan, rus və ingilis dillərində siyasət, iqtisadiyyat, cəmiyyət, idman, mədəniyyət sahələri üzrə ölkədə və dünyada baş verən ən vacib hadisələri öz oxucularına operativ şəkildə çatdırır. O cümlədən, saytın “Analitika” bölməsində Azərbaycanda və dünyada gedən proseslərlə bağlı analitik materiallar təqdim edilir.', 'https://static.report.az/photo/e5516b21-377c-3754-8420-99bfbc45be09_180.jpg', b'0', '2022-03-26 18:06:58', NULL, '60423032-ad08-11ec-ba09-002b67e478b5'),
(123, 'Deputat: "Ermənistan rəhbərliyi üçün sədaqət, dostluq, müttəfiqlik heç vaxt...', '“Son günlər Ermənistanın siyasi rəhbərliyinin Gürcüstana meyl etməsi, rəsmi Tbilisi ilə münasibətləri inkişaf etdirmək meyli diqqətdən yayınmır. Sual yaranır ki, Ermənistanın Gürcüstana münasibətdə bu fəal davranışının motivləri nə ilə bağlıdır. Ermənistan dövlətinin siyasi hərbi rəhbərliyini yaxşı tanıyanlar bilirlər ki, bu, heç də təsadüfi deyil. Çünki Ermənistan rəhbərliyi hər zaman xəyanətkar mövqeyi ilə seçilib”.Bu fikirləri “Report”a açıqlamasında Milli Məclisin Beynəlxalq münasibətlər və parlamentlərarası əlaqələr komitəsinin üzvü, politoloq Elman Nəsirov deyib.Onun sözlərinə görə, eyni vaxtda iki stulda əyləşmək taktikasına üstünlük verilib və bu da Ermənistanın xarici siyasətini çox ciddi problemlərlə üz-üzə qoyub: “Ermənistanın siyasi rəhbərliyi bir tərəfdən Rusiya-Ukrayna müharibəsinin getdiyi reallıqda, xüsusilə də müharibənin ilk günlərindən Rusiyanın xoşuna gəlmək, onun diqqətini cəlb etmək, özünün müttəfiq olduğunu Rusiyanın gözünə soxmaq üçün Suriyadan gələn muzdluların öz ərazisində təlimlər keçməsinə şərait yaradırdı, eyni zamanda Qarabağdakı qondarma rejimin vasitəsilə Luqansk və Donetskdəki separatçılara humanitar yardım edirdi. Bununla da rəsmi Moskavanı məmnun etməyə çalışırdı, Rusiyanın yanında olduğu fonunu yaratmaq istəyirdi. Amma son zamanlar bu mövqe kəskin dəyişməyə başlayıb”.E.Nəsirov bildirib ki, Ermənistan siyasi rəhbərliyi hər zaman olduğu kimi, oyun qaydalarını növbəti dəfə pozmağa başlıyıb: “Rusiyaya müttəfiq olan Ermənistan indi də Qərbə meyilli və onları məmnun edə biləcək addımlar atır. Elə bu nöqteyi-nəzərdən Ermənistan xarici işlər nazirinin tələm-tələsik gürcüstanlı həmkarına zəng etməsi, onunla ikitərəfli münasibətlərə dair, eyni zamanda beynəlxalq xarici siyasətlə bağlı müzakirələr aparması, Qərbə meyilli fikirlər səsləndirməsi onu göstərir ki, Paşinyan hökuməti Rusiyanın Ukraynada gözlənilən nəticələri əldə edə bilməməsinin fərqindədir. Görürlər ki, müharibədə gözlənilən uğurlar və qələbə təmin edilməyib”.Deputat qeyd edib ki, müharibə uzanır və bu, Rusiya üçün çox ciddi problemlər yaradır: “Belə olan vəziyyətdə o, həmişəki ampluasında yenə də dönüklük, yenə də satqınlıq yolunu seçir. İndi artıq birmənalı şəkildə Qərbə yaxınlığını göstərməyə çalışır. Gürcüstan vasitəsilə Qərbə, NATO-ya mesajlar göndərir ki, biz sizin siyasətinizi dəstəkləyir və təqdir edirik. Ermənistan rəhbərliyi üçün sədaqət, dostluq, müttəfiqlik heç vaxt keçərli məsələ olmayıb. Bircə misal çəkim, ötən ilin dekabrında "Şərq Tərəfdaşlığı" sammitində Azərbaycan, Ermənistan və Gürcüstan rəhbərləri NATO-ya dəvət olunmuşdular. Prezident Əliyev dəvəti qəbul etdi. NATO-nun Baş katibi Yens Stoltenberqlə görüşdü və qurumun ali orqanı olan Şimali Atlantika Şurasında çıxış etdi. NATO-nun 30 üzv dövlətinin 20-dən artıq daimi nümayəndəsi, yəni NATO yanında səfirləri çıxış edərək Azərbaycanın rolunu və yürütdüyü siyasətini, Əfqanıstan əməliyyatında iştirakını yüksək qiymətləndirdilər. Tədbirə qatılmayan yeganə şəxs Ermənistanın Baş naziri oldu. Müstəqil siyasət aparmayan Ermənistan Rusiyanın güclü olduğu bir vaxtda başqa addım ata da bilməzdi. Çünki asılıdır, vassaldır. Rusiyanın Ukraynada üzləşdiyi çətinlikləri və hərbi qələbə əldə edə bilməməsini görərək indi Paşinyan və onun komandası NATO-ya və Qərb ölkələrinə meyil edir. Bu vasitə ilə Gürcüstana yaxınlaşmağa və ya Gürcüstanla yaxınlaşma fonu yaratmağa çalışır. Bunları dünya ictimaiyyəti də çox gözəl təhlil edir və bu qənaətə gəlirlər ki, Ermənistan heç zaman arxanala biləcək müttəfiq olmayıb, bu gün də belə deyil, sabah da məsələ bu cür qalacaq. Bir sözlə, Sorosun uşaqlarından bundan artıq nə gözləmək olar?!”.RƏVAN ƏZİZSaytdakı materialların istifadəsi zamanı istinad edilməsi vacibdir. Məlumat internet səhifələrində istifadə edildikdə hiperlink vasitəsi ilə istinad mütləqdir."Report" müstəqil informasiya agentliyi sayt və gündəlik bülletenlər vasitəsi ilə Azərbaycan, rus və ingilis dillərində siyasət, iqtisadiyyat, cəmiyyət, idman, mədəniyyət sahələri üzrə ölkədə və dünyada baş verən ən vacib hadisələri öz oxucularına operativ şəkildə çatdırır. O cümlədən, saytın “Analitika” bölməsində Azərbaycanda və dünyada gedən proseslərlə bağlı analitik materiallar təqdim edilir.', 'https://static.report.az/photo/4b260246-3eba-37b6-87e0-9f4e05efebb3_180.png', b'0', '2022-03-26 18:06:58', NULL, '60423032-ad08-11ec-ba09-002b67e478b5'),
(124, 'Dohada Əminə Cabbarla Çavuşoğlu arasında görüş keçirilib', 'Qətərin paytaxtında keçirilən “Doha Forumu”nda Türkiyənin xarici işlər naziri Mövlud Çavuşoğlu və Ukraynanın xarici işlər nazirinin müavini Əminə Cabbar arasında görüş olub.“Report” xəbər verir ki, bu barədə ukraynalı siyasətçi tviterdə yazıb.“Türkiyəyə Ukrayna ilə sarsılmaz həmrəyliyinə, Rusiya təcavüzünə son qoyulması istiqamətində əməli siyasi və humanitar dəstəyə, həmçinin Ukraynanın təhlükəsizliyinin təminatçılarından biri olmaq məsələsini nəzərdən keçirməyə hazır olduğuna görə təşəkkür etdim”, - Ə.Cabbar vurğulayıb.Qeyd edək ki, Ukrayna XİN başçısı Dmitro Kulebanın birinci müavini olan Əminə Cabbar bu qurumda Krım türklərinin ilk nümayəndəsidir.Saytdakı materialların istifadəsi zamanı istinad edilməsi vacibdir. Məlumat internet səhifələrində istifadə edildikdə hiperlink vasitəsi ilə istinad mütləqdir."Report" müstəqil informasiya agentliyi sayt və gündəlik bülletenlər vasitəsi ilə Azərbaycan, rus və ingilis dillərində siyasət, iqtisadiyyat, cəmiyyət, idman, mədəniyyət sahələri üzrə ölkədə və dünyada baş verən ən vacib hadisələri öz oxucularına operativ şəkildə çatdırır. O cümlədən, saytın “Analitika” bölməsində Azərbaycanda və dünyada gedən proseslərlə bağlı analitik materiallar təqdim edilir.', 'https://static.report.az/photo/06c36ab4-afaf-3446-9f74-ad8d8ba25567_180.jpg', b'0', '2022-03-26 18:06:58', NULL, '60423032-ad08-11ec-ba09-002b67e478b5'),
(125, 'Rəqəmsal İnkişaf və Nəqliyyat Nazirliyində kadr dəyişikliyi olub', 'Rəqəmsal İnkişaf və Nəqliyyat Nazirliyinin Strateji təhlil, innovasiya və rəqəmsallaşma şöbəsinin müdiri Anar Qasımov vəzifəsindən azad edilib.“Report”un əldə etdiyi məlumata görə, bu barədə rəqəmsal inkişaf və nəqliyyat naziri Rəşad Nəbiyev əmr imzalayıb.Nazirin digər əmri ilə onun yerinə bu vəzifəyə Ceyhun Hüseynzadə təyin edilib.Bu təyinata qədər C.Hüseynzadə adıçəkilən şöbədə müdir müavini vəzifəsində çalışıb.A.Qasımov isə “Azercell Telekom” MMC-nin transformasiya proqram meneceri təyin edilib.Saytdakı materialların istifadəsi zamanı istinad edilməsi vacibdir. Məlumat internet səhifələrində istifadə edildikdə hiperlink vasitəsi ilə istinad mütləqdir."Report" müstəqil informasiya agentliyi sayt və gündəlik bülletenlər vasitəsi ilə Azərbaycan, rus və ingilis dillərində siyasət, iqtisadiyyat, cəmiyyət, idman, mədəniyyət sahələri üzrə ölkədə və dünyada baş verən ən vacib hadisələri öz oxucularına operativ şəkildə çatdırır. O cümlədən, saytın “Analitika” bölməsində Azərbaycanda və dünyada gedən proseslərlə bağlı analitik materiallar təqdim edilir.', 'https://static.report.az/photo/222d7123-05f6-3982-8f01-f65879c08c60_180.jpg', b'0', '2022-03-26 18:06:58', NULL, '60423032-ad08-11ec-ba09-002b67e478b5'),
(126, 'Qurban Qurbanov və Elnurə Məmmədova feyr-pley mükafatına namizəddir', 'Azərbaycan Milli Olimpiya Komitəsinin (MOK) Ədalətli Oyunlar Komissiyası feyr-pley mükafatı üçün hələlik iki namizəd müəyyənləşdirib.Bu barədə "Report"a komissiyanın sədri Xəzər İsayev məlumat verib.Onun sözlərinə görə, "Qarabağ" klubunun baş məşqçisi Qurban Qurbanov və Azərbaycanın qadın güləşçisi Elnurə Məmmədova (55 kq) bu mükafata namizəddir.İsayev 50 yaşlı mütəxəssisə bir neçə dəfə feyr-pley mükafatı təqdim etdiklərini xatırladıb: "Bu mükafatı Qurbanova yenə verməyə hazırıq. Çünki buna layiqdir. Amma onun jesti ilə yanaşı, qadın güləşçi Elnurə Məmmədova da var. O, Bolqarıstanın Plovdiv şəhərində 23 yaşadək güləşçilərin Avropa çempionatında qalib gələndən sonra zədələnmiş rəqibini çiynində döşəkcədən kənara çıxarıb. Bu da ədalət prinsipinin ən yüksək amillərindən biridir. Biz hər şeyə diqqət edirik. Mətbuat nümayəndələrinə, federasiyalara sorğu barədə məlumat verəcəyik. Hər biriniz öz fikrinizi bizə bildirdikdən sonra seçimimizi açıqlayacağıq. Hazırda Qurban Qurbanov və Elnurə Məmmədova ön sıralardadır. Hər ikisini nəzərə ala və birinə məşqçi, digərinə isə idmançı kimi mükafat verə bilərik".Sədr bildirib ki, ilk növbədə, tədbirin vaxtını Milli Olimpiya Komitəsinin (MOK) vitse-prezidenti Çingiz Hüseynzadə ilə müəyyənləşdirməlidirlər: "Son zamanlarda Gənclər və İdman Nazirliyi və MOK-da dəyişikliklər olduqdan sonra yeni mövzular, yeni sistem işlənməyə başlayıb. Bu səbəbdən, bir qədər vaxt məhdudiyyəti var. Amma yəqin ki, tədbiri bu il keçirməyə nail olacağıq. Çingiz Hüseynzadə ilə məsləhətləşəndən sonra vaxtla bağlı ətraflı məlumat verə biləcəyəm".Qeyd edək ki, Qurban Qurbanov UEFA Konfrans Liqasının pley-off mərhələsinin Fransa "Marsel"i ilə Bakıda keçirilmiş cavab görüşündə "Qarabağ"ın futbolçusu İbrahima Vadjinin vurduğu qolu ləğv etdirib. O, qol epizodunda Vadjinin əllə oynadığını əsas gətirib.Saytdakı materialların istifadəsi zamanı istinad edilməsi vacibdir. Məlumat internet səhifələrində istifadə edildikdə hiperlink vasitəsi ilə istinad mütləqdir."Report" müstəqil informasiya agentliyi sayt və gündəlik bülletenlər vasitəsi ilə Azərbaycan, rus və ingilis dillərində siyasət, iqtisadiyyat, cəmiyyət, idman, mədəniyyət sahələri üzrə ölkədə və dünyada baş verən ən vacib hadisələri öz oxucularına operativ şəkildə çatdırır. O cümlədən, saytın “Analitika” bölməsində Azərbaycanda və dünyada gedən proseslərlə bağlı analitik materiallar təqdim edilir.', 'https://static.report.az/photo/764f659f-1b97-3f17-940b-48c6f295505c_180.jpg', b'0', '2022-03-26 18:06:58', NULL, '60423032-ad08-11ec-ba09-002b67e478b5'),
(127, '"Qərbdə, Rusiyada Ermənistanın xəyanətkarlığı ənənəyə çevirdiyini yaxşı bilirlər"', '“Dünya ictimaiyyəti bir daha Ermənistanın ikiüzlülüyünün¸erməni idarəçilərin xəyanətkarlığının, öz ağalarını rahatlıqla satmağının şahidi olur. Bədnam qonşularımza xas bu xüsusiyyətlər bu dəfə də Rusiya-Ukrayna gərginliyi fonunda nümayiş etdirilir”.Bu fikirləri "Report"a açıqlamasında Milli Məclisin deputatı Vüqar İskəndərov deyib.Onun sözlərinə görə, Ermənistanın xarici işlər naziri Ararat Mirzoyanın Gürcüstanın xarici işlər naziri David Zalkalianiyə zəngi zamanı sərgilənən mövqe bunu deməyə əsas verir: “Biz burada bir daha Ermənistan rəhbərliyinin satqınlığı və riyakarlığının şahidi oluruq. Görünən odur ki, dünənə qədər Ruisyanın buyruq qulu olan, hətta Qazaxıstan olaylarında belə özünü Rusiyaya ən yaxın, ən isti müttəfiq kimi qələmə verməyə çalışan Ermənistan bu gün tamamilə başqa havalar eşqindədir. Yəni Ermənistan rəhbərliyi Gürcüstanla yaxınlaşma nümayiş etdirərək guya Rusiyanın təsiri altında olmadığını və Qərbə meyil etdiyini göstərməyə çalışır”.Deputat bildirib ki, bura son vaxtlar Ermənistanın guya NATO-ya meyillənməsi əhval-ruhiyyəsinin yaradılmasına edilən cəhdləri də əlavə etmək olar: “Halbuki NATO rəhbərliyi kimin kim olduğunu, kimin səmimi, kimin isə hiyləgər və müttəfiqinə qarşı xəyanət edən olduğunu yaxşı bilir. Xatırlatmaq istəyirəm ki, ötən ilin dekabrında "Şərq Tərəfdaşlığı" sammitində Azərbaycan, Ermənistan və Gürcüstan rəhbərləri NATO-ya dəvət olunmuşdular. Prezident Əliyev dəvəti qəbul etdi. NATO-nun Baş katibi Yens Stoltenberq ilə görüşdü və qurumun ali orqanı olan Şimali Atlantika Şurasında çıxış etdi. NATO-nun 30 üzv dövlətinin 20-dən artıq daimi nümayəndəsi, yəni NATO yanında səfirləri çıxış edərək Azərbaycanın rolunu və yürütdüyü siyasətini, Əfqanıstan əməliyyatında iştirakını yüksək qiymətləndirdilər. Gürcüstan rəhbərliyi də NATO-ya səfər etdi və müvafiq görüşlər keçirdi. Ancaq həmin vaxt Rusiyanın qorxusundan vassal və müstəmləkə dövlətin rəhbəri olan Nikol Paşinyan NATO-ya səfər etməkdən boyun qaçırdı. Çünki o vaxt Rusiya güclü idi və Ermənistan rəhbərliyi Moskvanın kölgəsinə sığınmağı özləri üçün xoşbəxtlik sayırdı. İndi isə Rusiyanın zəiflədiyini görən Nikol Paşinyanın özünü və təmsil etdiyi dövləti guya Qərbpərəst, NATO sevdalısı göstərməsi, əslində, batmaqda olan gəmini tez tərk edən siçovullara bənzəyir”.“Əslində, Ermənistanın daima ikili oyun oynadığını, xəyanətkarlığı ənənəyə çevirdiyini Qərbdə də, Rusiyada da yaxşı bilirlər. Sadəcə olaraq, son olay bədnam qonşularımızın bu xislətlərindən heç zaman əl çəkməyəcəklərinin növbəti sübutu oldu”, - V.İskəndərov vurğulayıb.Saytdakı materialların istifadəsi zamanı istinad edilməsi vacibdir. Məlumat internet səhifələrində istifadə edildikdə hiperlink vasitəsi ilə istinad mütləqdir."Report" müstəqil informasiya agentliyi sayt və gündəlik bülletenlər vasitəsi ilə Azərbaycan, rus və ingilis dillərində siyasət, iqtisadiyyat, cəmiyyət, idman, mədəniyyət sahələri üzrə ölkədə və dünyada baş verən ən vacib hadisələri öz oxucularına operativ şəkildə çatdırır. O cümlədən, saytın “Analitika” bölməsində Azərbaycanda və dünyada gedən proseslərlə bağlı analitik materiallar təqdim edilir.', 'https://static.report.az/photo/fdfb7475-bc90-4541-8494-e984f4f4ca8c_400.jpg', b'0', '2022-03-26 18:06:58', NULL, '60423032-ad08-11ec-ba09-002b67e478b5'),
(128, 'İƏT-in 4 qətnaməsi - Azərbaycanın haqlı mövqeyinə növbəti dəstək ', 'İslam Əməkdaşlıq Təşkilatının Xarici İşlər Nazirləri Şurasının 48-ci iclasının Yekun Bəyannaməsində Qarabağ münaqişəsinin ədalətli həll olunmasının alqışlanması və qəbul edilmiş dörd qətnamədə Ermənistanın Azərbaycana qarşı hərbi təcavüzünün siyasi, iqtisadi, mədəni və humanitar aspektləri ilə bağlı müddəaların əks olunması təşkilatın rəsmi Bakının mövqeyinə xüsusi əhəmiyyət verdiyinin göstəricisidir.İƏT Azərbaycan torpaqlarının Ermənistanın işğalı altında olan dövrdə Azərbaycanın çağırışlarına biganə qalmayıb və hər zaman rəsmi Bakının haqlı mövqeyini dəstəkləyib. İƏT Xocalı soyqırımını tanıyan təşkilatlardan biridir.İƏT Xarici İşlər Nazirləri Şurasının 48-ci iclasında quruma üzv dövlətlər, tam olaraq, Azərbaycana postmüharibə dövründə dəstəklərini ifadə ediblər, xüsusilə də Ermənistanın hərbi təcavüzünə məruz qalmış ərazilərdən məcburi köçkünlərin geri qayıdışına şərait yaratmaq, azad edilmiş ərazilərin yenidən qurulmasına yardım göstərmək səylərini ifadə ediblər.İƏT Ermənistana da çağırış edib: Rəsmi İrəvan təcavüzkar ritorikadan əl çəkməli və Azərbaycanın ərazi bütövlüyü və suverenliyinə qarşı yönələn fəaliyyətinə son qoymalı, dövlətlərin suverenliyi, ərazi bütövlüyü və beynəlxalq sərhədlərin toxunulmazlığına əsaslanan münasibətlər qurulmalıdır.Nəzərə alınmalıdır ki, İƏT dünyanın 57 dövlətini birləşdirir. Ermənistanla birlikdə Kollektiv Təhlükəsizlik Müqaviləsi Təşkilatına üzv olan Qazaxıstan və Qırğızıstan da İƏT-də təmsil olunur. Buna baxmayaraq, hər iki dövlət də Azərbaycanın mövqeyini tam dəstəkləyən sənədlərin qəbulunun lehinə çıxış edib. Son Bəyannamədə əksini tapan müddəalar göstərir ki, 44 günlük Vətən müharibəsinin hərbi və siyasi nəticələri beynəlxalq ictimaiyyət tərəfindən qəbul edilib. Artıq beynəlxalq birlik Cənubi Qafqazda sülhün bərqərar olmasını və dövlətlərarası əməkdaşlığın inkişafını gözləyir, əlavə gərginlik və revanşist səylər isə Ermənistana ciddi ziyan vuracaq, o cümlədən beynəlxalq müstəvidə.\r\n Xarici İşlər Nazirləri Şurasının iclasında Azərbaycana dəstəyi ifadə edən keçmiş Qarabağ münaqişəsinə dair daha dörd qətnamə qəbul edilib: “Ermənistanın Azərbaycana qarşı hərbi təcavüzünün fəsadlarının aradan qaldırılması haqqında”, “Azərbaycana iqtisadi yardım haqqında”, “Ermənistanın Azərbaycana qarşı hərbi təcavüzü nəticəsində Azərbaycan Respublikasının ərazisində İslam tarixi və mədəni irsinin və dini ziyarətgahların dağıdılması və təhqir edilməsi haqqında” və “Xocalı qətliamının qurbanları ilə həmrəylik haqqında” qətnamələr.\r\n qətnamələrdə Ermənistanın silahlı qüvvələrinin 30 il ərzində azərbaycanlı əhaliyə qarşı törətdiyi amansız hərəkətlər insanlıq əleyhinə cinayət kimi göstərilir və bu əməlləri törədənlərin məsuliyyətə cəlb olunması tələb edilir.İƏT üzvləri Azərbaycan ərazilərinin Ermənistanın işğalı altında olduğu dövrdə İslam mədəni irsinə aid məscidlərin, ibadət yerlərinin talan edilməsi və dağıdılmasını vandalizmin təzahürü kimi qəbul edərək qətiyyətlə pisləyiblər. Bu ərazilərin bərpası üçün Azərbaycana dəstək olmaq məqsədilə İƏT-in müvafiq qurumlarına və üzv dövlətlərə çağırış edilib, Ermənistanın dəymiş zərərə görə məsuliyyəti təsbit edilib.\r\n İƏT həmçinin Ermənistanı sülhə məcbur etmək üçün üzv dövlətlərə çağırış edib. Belə ki, təşkilatın üzvləri rəsmi İrəvanla diplomatik əlaqələr qurmaqdan çəkinməli və iqtisadi əməkdaşlığı məhdudlaşdırmalıdırlar. Bu addımlar Ermənistanın Azərbaycanın suverenliyi və ərazi bütövlüyünü tanımaq üçün ciddi təsir mexanizmləri işə sala bilər. Bu müddəa son dövrlər Ermənistanın İƏT dövlətləri ilə əlaqələr qurmağa cəhdləri fonunda xüsusi əhəmiyyət kəsb edir.Bu qətnamələrin qəbulu rəsmi İrəvana göstərdi ki, İƏT üzvləri Ermənistanın Azərbaycana qarşı təcavüzkarlığını unutmayıb və bu ölkənin yalan təbliğatına inanmır. Ermənistan üçün yeganə yol Azərbaycanın təklifi ilə ölkələrin ərazi bütövlüyü və suverenliyinə hörmət əsasında sülh müqaviləsi üzərində işin aparılmasıdır. Yalnız Azərbaycanla sülh müqaviləsinin imzalanmasından sonra Ermənistan İƏT ölkələri ilə faydalı əməkdaşlıq qurmağa imkan əldə edə bilər.Saytdakı materialların istifadəsi zamanı istinad edilməsi vacibdir. Məlumat internet səhifələrində istifadə edildikdə hiperlink vasitəsi ilə istinad mütləqdir."Report" müstəqil informasiya agentliyi sayt və gündəlik bülletenlər vasitəsi ilə Azərbaycan, rus və ingilis dillərində siyasət, iqtisadiyyat, cəmiyyət, idman, mədəniyyət sahələri üzrə ölkədə və dünyada baş verən ən vacib hadisələri öz oxucularına operativ şəkildə çatdırır. O cümlədən, saytın “Analitika” bölməsində Azərbaycanda və dünyada gedən proseslərlə bağlı analitik materiallar təqdim edilir.', 'https://static.report.az/photo/e333c842-5a59-38f3-991c-bba71294fbf4_194.jpg', b'0', '2022-03-26 18:06:58', NULL, '60423032-ad08-11ec-ba09-002b67e478b5'),
(129, 'Deputat: "Ermənistan üzərinə götürdüyü öhdəlikləri hələ də yerinə yetirməyib" ', '“Azərbaycan və Ermənistan arasında hərbi əməliyyatlara son qoyan bəyanatın imzalanmasından bir ildən çox vaxt keçir. Təəsüf ki, həmin sənədə əsasən Ermənistan üzərinə götürdüyü öhdəliklərin bir hissəsini hələ də yerinə yetirməyib”.Bu fikirləri "Report”a açıqlamasında Milli Məclisin deputatı Nigar Arpadarai deyib.O xatırladıb ki, Rusiya sülhməramlılarının müvəqqəti yerləşdirildiyi məsuliyyət zonasında hələ də qanunsuz erməni silahlı dəstələri var: “Ermənistan Azərbaycan üçün Naxçıvana dəhliz təmin etməyib. Azərbaycanlılar hələ də Xocalıya və Azərbaycanın digər yaşayış məntəqələrinə qayıtmayıblar. Bundan əlavə, hərbi cinayətkarlar Arayik Aratunyan və Vitali Balasanyan hələ də Xankəndində “rəhbərlik” edir, yerli erməni əhalisinin arxasında gizlənir, diaspor yardımlarını oğurlayırlar. Bunlar bir qrup xırda fırıldaqçı və hərbi cinayətkarlardır ki, özlərini hökumət nümayəndəsi kimi təqdim edirlər və yeganə məqsədləri daha çox oğurluq edəndən sonra yerdə qalan erməniləri unudub Soçi və ya Qlendeylə köçməkdir”.Deputat bildirib ki, Azərbaycan bu müddət ərzində çox səbirli olub, öhdəliklərini yerinə yetirib və təxribatlara təmkinlə reaksiya verib: “Bunun arxasında, heç şübhəsiz, seçdiyi kursdan, yəni Azərbaycan dövlətçiliyinin möhkəmləndirilməsindən heç kimin döndərə bilməyəcəyini dəfələrlə sübut edən Azərbaycan Prezidentinin strateji və uzunmüddətli baxışı dayanır. Bu müddət ərzində Xankəndinə Ermənistan və Fransadan bir neçə təxribat mahiyyətli səfərlər təşkil olunub ki, onların da məqsədi “DQR”in müəyyən subyektivliyini nümayiş etdirmək idi. “DQR rəsmiləri” mütəmadi olaraq bəyan edirlər ki, “DQR” heç vaxt Azərbaycanın tərkibində olmayacaq. Eyni zamanda, bu ritorikanın İrəvanla razılaşdırıldığı da tamamilə göz qabağındadır. Eyni zamanda, Paşinyan özü də “DQR” mövzusundan yayınır və qeyri-müəyyən eyhamlara istinad edir ki, Ermənistan artıq bu məsələni ərazi mövzusu hesab etmir. İndi onun üçün bu, “hüquqlar məsələsidir”. O, açıq-aydın xalqların öz müqəddəratını təyinetmə hüququnu, ermənilərin ənənəvi olaraq ayrılma hüququ kimi şərh etdikləri beynəlxalq hüquqi prinsiplərdən birini nəzərdə tutur. Hansı ki, düzgün deyil. İstər erməni, istərsə də Azərbaycan xalqı çoxdan öz ərazilərində öz müqəddəratını təyin edib. Yəni Ermənistanın əsas məqsədi deyil, yalnız taktikasını dəyişib. Məqsəd isə eynidir - qonşulara qarşı ərazi iddiaları. Eyni zamanda Ermənistan bu gün sadəcə olaraq bu məqsədə nail ola bilmədiyini yaxşı dərk edir. Biz isə Ermənistanın məqsədini unutmamalı və ona uyğun hərəkət etməliyik, çünki bu mövqe regionda sülh üçün əsas təhlükədir".N.Arpadarai vurğulayıb ki, “DQR” rejiminin və ordusunun qalıqlarını saxlamaq və gücləndirmək məqsədini daşıyan Ermənistanın birbaşa və dolayı yardımı Azərbaycana qarşı düşmən addımlarıdır: "Ermənistandan Azərbaycanın Qarabağ bölgəsində müvvəqəti yerləşdirilən Rusiya sülhməramlılarının məsuliyyət zonasına qaz nəqli bunlardan biridir. Azərbaycanın son aylarda bu daşımalara müdaxilə etməməsi humanitar və texniki səbəblərlə asanlıqla izah olunur. Azərbaycanın Qarabağ bölgəsində yaşayan erməni millətindən olan mülki şəxslərin isti evlərdə normal və təhlükəsiz yaşamaq hüququ var. Lakin Azərbaycan Ermənistanın Azərbaycan ərazisində hələ də qalan qanunsuz dəstələrə dəstəyinə göz yummağa borclu deyil. Bu həmçinin qaz nəqlinə şamil olunur. Azərbaycan bu gün üçtərəfli bəyanatın müddəaları çərçivəsində fəaliyyət göstərir. Bundan əlavə, sülhməramlı qüvvələrin kontingentinin normal fəaliyyəti təmin edilir. Lakin Azərbaycan qaz kəmərinin işləməsini təmin etmək kimi öhdəliyi üzərinə götürməyib. Deməli, onun işinə icazə verib-verməmək məsələsi Azərbaycanın öz qərarından asılıdır"."Hökumətimiz müəyyən şərtlər daxilində humanitar məqsədlərini rəhbər tutaraq müəyyən həcmdə qazın nəqlinə icazə verə bilər. Məsələn, mülki əhali və sülhməramlı qüvvələrin kontingenti üçün lazım olan həcmdən söhbət gedə bilər. Eyni zamanda bu qazın necə istehlak edildiyinin monitorinqini tətbiq etmək lazımdır. Birincisi, istifadəçilərin siyahısını və sayını, eləcə də istehlakçılar üçün məqbul kvota müəyyən etməklə. Şübhəsiz, Azərbaycan qanunsuz erməni silahlı dəstələrini qazla təmin etməməlidir və etməyəcək. Bundan əlavə, bu mexanizm müəyyən müddət üçün nəzərdə tutula bilər. Rusiya sülhməramlılarının müvəqqəti yerləşdirildiyi ərazidə əvvəlcədən müəyyən edilmiş məqbul müddət ərzində istehlakçıların abonent kimi Azərbaycanın qazpaylayıcı sisteminə, eləcə də digər ictimai xidmətlərə qoşulması təmin edilməlidir. Mülki vətəndaşlar üçün bu, heç bir problem yaratmayacaq, lakin ərazidə hələ də qalan erməni silahlı qüvvələrin nazı ilə oynamaq öhdəliymiz yoxdur və onların fikri də bizi maraqlandırmır. Beləliklə, Erməni mediasının ümumdünya çağırışına və isterikasına baxmayaraq, bu mövqeyin ədalətli, qanuni və Azərbaycanın öz xalqı və beynəlxalq ictimaiyyət qarşısında götürdüyü öhdəliklərə tam uyğun gəldiyini nümayiş etdirmək üçün Azərbaycanın aidiyyəti olan qurumlarının bunu həyata keçirə bildiyini düşünürəm", - deputat qeyd edib.Saytdakı materialların istifadəsi zamanı istinad edilməsi vacibdir. Məlumat internet səhifələrində istifadə edildikdə hiperlink vasitəsi ilə istinad mütləqdir."Report" müstəqil informasiya agentliyi sayt və gündəlik bülletenlər vasitəsi ilə Azərbaycan, rus və ingilis dillərində siyasət, iqtisadiyyat, cəmiyyət, idman, mədəniyyət sahələri üzrə ölkədə və dünyada baş verən ən vacib hadisələri öz oxucularına operativ şəkildə çatdırır. O cümlədən, saytın “Analitika” bölməsində Azərbaycanda və dünyada gedən proseslərlə bağlı analitik materiallar təqdim edilir.', 'https://static.report.az/photo/eb1f11fc-71f3-3d1a-aea7-e80a03a42391_194.jpg', b'0', '2022-03-26 18:06:58', NULL, '60423032-ad08-11ec-ba09-002b67e478b5');

-- --------------------------------------------------------

--
-- Table structure for table `recovery`
--

CREATE TABLE `recovery` (
  `code_id` int(10) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `expire_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recovery`
--

INSERT INTO `recovery` (`code_id`, `user_id`, `code`, `expire_date`) VALUES
(19, '6245c8c004a590.59994200', '684170', '2022-04-07 21:19:29'),
(20, '625090990bfda6.27809311', '636215', '2022-04-08 20:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `profile_picture` varchar(100) NOT NULL DEFAULT 'default_picture.png',
  `is_approved` bit(1) NOT NULL DEFAULT b'0',
  `is_admin` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `full_name`, `user_name`, `password`, `profile_picture`, `is_approved`, `is_admin`) VALUES
('60423032-ad08-11ec-ba09-002b67e478b5', 'report@gmail.com', 'Report Az', 'report.az', '123456', 'default_picture.png', b'0', b'0'),
('624392e36e9ab4.75835697', 'admin@gmail.com', 'admin', 'admin', '$2y$10$B7B9GZ8m/zuXklzLCsg.f.TWX8Ndh8kZPdwi4KEnt1e343DOxklb6', 'default_picture.png', b'1', b'1'),
('6245ca0a284823.59340905', 'test1@gmail.com', 'test one', 'test1', '$2y$10$.Jq5EdY0GKA49UUTRtxK2efrmGVVZOj4c3lCyTdXckIu.rXbuOsMm', 'default_picture.png', b'0', b'0'),
('6250ab13bad5a9.10652503', 'hashimlisahil@gmail.com', 'Sahil Hashimli', 'hashimlijr', '$2y$10$mjy9f8XMtQ.hEHPXLQ4o8ejsmFwbVoIxdeuYd6QEdLPn6pJT0YVte', 'default_picture.png', b'1', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recovery`
--
ALTER TABLE `recovery`
  ADD PRIMARY KEY (`code_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `recovery`
--
ALTER TABLE `recovery`
  MODIFY `code_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
