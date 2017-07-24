-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2017 at 02:03 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infoeducatie`
--

-- --------------------------------------------------------

--
-- Table structure for table `web_accounts`
--

CREATE TABLE `web_accounts` (
  `ID` int(11) NOT NULL,
  `Name` varchar(128) CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL COMMENT 'Surname, Prename',
  `Password` varchar(256) NOT NULL,
  `CardCode` bigint(20) NOT NULL,
  `EMail` varchar(128) NOT NULL,
  `Location` varchar(256) CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL COMMENT 'AREA(0 if no one), CITY, COUNTY',
  `Since` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `AccountType` int(1) NOT NULL,
  `BirthYear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_accounts`
--

INSERT INTO `web_accounts` (`ID`, `Name`, `Password`, `CardCode`, `EMail`, `Location`, `Since`, `AccountType`, `BirthYear`) VALUES
(1, 'Pătrașcu Andrei', 'E4757E322865FE5F7DF366BDD14FA9DE208907EE5CEE690550349D5E300D1ACD', 3276798432475544591, 'donbooo@yahooo.com', '0, FOCȘANI, VRANCEA', '2017-07-23 12:11:08', 1, 2001),
(2, 'Gigel Ionel', 'E4757E322865FE5F7DF366BDD14FA9DE208907EE5CEE690550349D5E300D1ACD', 4276798432475544592, 'gigel@yahoo.com', '0, PLOIEȘTI, PRAHOVA', '2017-07-19 15:58:15', 1, 1973);

-- --------------------------------------------------------

--
-- Table structure for table `web_analyzes`
--

CREATE TABLE `web_analyzes` (
  `ID` int(11) NOT NULL,
  `ReservedBy` varchar(256) NOT NULL,
  `Date` varchar(64) NOT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_analyzes`
--

INSERT INTO `web_analyzes` (`ID`, `ReservedBy`, `Date`, `Active`) VALUES
(1, '3276798432475544591', '2017-05-25', 0),
(2, '3276798432475544591', '2017-07-23', 0),
(8, '3276798432475544591', '2017-07-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_diagnostics`
--

CREATE TABLE `web_diagnostics` (
  `ID` int(11) NOT NULL,
  `CardCode` varchar(128) NOT NULL,
  `Diagnostic` varchar(512) NOT NULL,
  `Hospital` int(11) NOT NULL,
  `DoctorCode` varchar(128) NOT NULL,
  `Date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_diagnostics`
--

INSERT INTO `web_diagnostics` (`ID`, `CardCode`, `Diagnostic`, `Hospital`, `DoctorCode`, `Date`) VALUES
(1, '3276798432475544591', 'Faringita', 1, '4276798432475544592', '1495829926'),
(2, '3276798432475544591', '<p>Pneumonie</p>\n', 1, '3276798432475544591', '1498308231');

-- --------------------------------------------------------

--
-- Table structure for table `web_healthguide`
--

CREATE TABLE `web_healthguide` (
  `ID` int(11) NOT NULL,
  `TitleRO` varchar(128) CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL,
  `TitleEN` varchar(128) CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL,
  `Photo` varchar(128) NOT NULL,
  `Content` longtext CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL,
  `ContentEN` longtext CHARACTER SET utf8 COLLATE utf8_romanian_ci NOT NULL,
  `Date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_healthguide`
--

INSERT INTO `web_healthguide` (`ID`, `TitleRO`, `TitleEN`, `Photo`, `Content`, `ContentEN`, `Date`) VALUES
(1, 'De ce este ciclismul bun pentru sănătate?', 'Why is cycling good for your health?', 'bike.jpg', '<p>Ciclismul este, în sensul larg al cuvântului, deplasarea pe sol folosind mijloace de transport puse în mișcare de mușchii omului, cu precădere bicicletele. Ca sport, ciclismul condus de Uniunea Ciclistă Internațională, cu sediul în Elveția. Este împărțit în mai multe genuri: ciclism pe șosea, pe teren accidentat (engleză mountain biking) etc.. Concurenții poartă câte un număr de concurs și culorile echipei lor. Aceștia au nevoie de o bicicletă pentru a rula. La startul unei curse câștigătorul etapei sau cursei (în funcție de tipul întrecerii) este cel care trece primul linia de sosire.</p>', '<p>Cycling, also called bicycling or biking, is the use of bicycles for transport, recreation, exercise or sport.[1] Persons engaged in cycling are referred to as \"cyclists\",[2] \"bikers\",[3] or less commonly, as \"bicyclists\".[4] Apart from two-wheeled bicycles, \"cycling\" also includes the riding of unicycles, tricycles, quadracycles, recumbent and similar human-powered vehicles (HPVs).\n\nBicycles were introduced in the 19th century and now number approximately one billion worldwide.[5] They are the principal means of transportation in many parts of the world.\n\nCycling is widely regarded as a very effective and efficient mode of transportation[6][7] optimal for short to moderate distances.\n\nBicycles provide numerous benefits in comparison with motor vehicles, including the sustained physical exercise involved in cycling, easier parking, increased maneuverability, and access to roads, bike paths and rural trails. Cycling also offers a reduced consumption of fossil fuels, less air or noise pollution, and much reduced traffic congestion. These lead to less financial cost to the user as well as to society at large (negligible damage to roads, less road area required).[8] By fitting bicycle racks on the front of buses, transit agencies can significantly increase the areas they can serve.[9]\n\nAmong the disadvantages of cycling are the requirement of bicycles (excepting tricycles or quadracycles) to be balanced by the rider in order to remain upright, the reduced protection in crashes in comparison to motor vehicles,[10] often longer travel time (except in densely populated areas), vulnerability to weather conditions, difficulty in transporting passengers, and the fact that a basic level of fitness is required for cycling moderate to long distances.</p>', '1495700955'),
(2, 'Cum ne ajută merele?', 'How can apples help us?', 'apples.jpg', '<p>Mărul este o specie de plante din familia Rosaceae. Această specie cuprinde între 44 și 55 de soiuri, care se prezintă ca pomi sau arbuști. Varietățile de măr cresc în zona temperată nordică din Europa, Asia și America de Nord, printre acestea existând un număr mare de hibrizi.\n\nCea mai răspândită formă a mărului este mărul de cultură.</p>', 'The apple tree (Malus pumila, commonly and erroneously called Malus domestica) is a deciduous tree in the rose family best known for its sweet, pomaceous fruit, the apple. It is cultivated worldwide as a fruit tree, and is the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today. Apples have been grown for thousands of years in Asia and Europe, and were brought to North America by European colonists. Apples have religious and mythological significance in many cultures, including Norse, Greek and European Christian traditions.\n\nApple trees are large if grown from seed. Generally apple cultivars are propagated by grafting onto rootstocks, which control the size of the resulting tree. There are more than 7,500 known cultivars of apples, resulting in a range of desired characteristics. Different cultivars are bred for various tastes and uses, including cooking, eating raw and cider production. Trees and fruit are prone to a number of fungal, bacterial and pest problems, which can be controlled by a number of organic and non-organic means. In 2010, the fruit\'s genome was sequenced as part of research on disease control and selective breeding in apple production.\n\nWorldwide production of apples in 2014 was 84.6 million tonnes, with China accounting for 48% of the total.', '1495700955'),
(3, 'Carbohidrații', 'Carbohydrates', 'carbohidrati.jpg', '<p>Zaharidele (cunoscute și sub denumirea de: zaháruri, glucide, carbohidrați sau hidrați de carbon) sunt compuși organici cu funcțiune mixtă, ce au în compoziția lor atât grupări carbonilice (aldehidă sau cetonă), cât și grupări hidroxilice (hidroxil). În majoritatea cazurilor, raportul dintre numărul atomilor de hidrogen și de oxigen este de 2:1 (ca al apei); cu alte cuvinte, au formula empirică Cm(H2O)n (unde m poate fi diferit de n).[1] Există și unele excepții; de exemplu, deoxiriboza, o zaharidă componentă a ADN-ului,[2] are formula brută C5H10O4. [3] De aceea, zaharidele mai sunt numite și carbohidrați sau hidrați de carbon, [4] dar din punct de vedere structural este corect să fie privite mai degrabă ca polihidroxialdehide sau ca polihidroxicetone. [5]\n\nGlucidele constituie o componentă majoră a alimentației (macronutrienți) alături de proteine și lipide, exemple: glucoza, fructoza, zaharoza, lactoza.\n\nClasa zaharidelor este împărțită în trei grupe: monozaharide, oligozaharide (pot fi dizaharide, trizaharide, etc) și polizaharide. [6] Denumirea de zaharidă vine din grecescul σάκχαρον (sákkharon), care înseamnă zahăr. Deși nomenclatura zaharidelor este complexă, numele monozaharidelor și dizaharidelor se termină de cele mai multe ori cu sufixul -oză. De exemplu, glucida din struguri este glucoza, zahărul este zaharoza, iar glucida din lapte este lactoza.</p>', '<p>A carbohydrate is a biological molecule consisting of carbon (C), hydrogen (H) and oxygen (O) atoms, usually with a hydrogen–oxygen atom ratio of 2:1 (as in water); in other words, with the empirical formula Cm(H2O)n (where m could be different from n).[1] This formula holds true for monosaccharides. Some exceptions exist; for example, deoxyribose, a sugar component of DNA,[2] has the empirical formula C5H10O4.[3] Carbohydrates are technically hydrates of carbon;[4] structurally it is more accurate to view them as polyhydroxy aldehydes and ketones.[5]\n\nThe term is most common in biochemistry, where it is a synonym of \'saccharide\', a group that includes sugars, starch, and cellulose. The saccharides are divided into four chemical groups: monosaccharides, disaccharides, oligosaccharides, and polysaccharides. Monosaccharides and disaccharides, the smallest (lower molecular weight) carbohydrates, are commonly referred to as sugars.[6] The word saccharide comes from the Greek word σάκχαρον (sákkharon), meaning \"sugar\". While the scientific nomenclature of carbohydrates is complex, the names of the monosaccharides and disaccharides very often end in the suffix -ose. For example, grape sugar is the monosaccharide glucose, cane sugar is the disaccharide sucrose, and milk sugar is the disaccharide lactose.</p>', '1495700955'),
(4, 'Proteinele', 'Protein', '31306-quelle_est_la_difference_entre_proteines_vegetales_et_animales.jpg', '<p>\n<strong>Leguminoasele,<a href=\"http://www.csid.ro/diet-sport/dieta-si-nutritie/dieta-cu-cereale-integrale-2801611/\" target=\"_blank\" title=\"Dieta cu cereale integrale\"> cerealele integrale</a>, nucile şi seminţele ar trebui să nu lipsească din alimentaţia ta. Trebuie să ştii că cele mai bogate produse vegetale în proteine sunt leguminoasele.</strong></p>\n<p>\n<strong>Soia conţine aproximativ 50% proteine, fasolea 25%, iar lintea, năutul şi mazărea tot cam atât. Un gram de proteine furnizează organismului 4 calorii.</strong></p>\n<p>\n<strong>Principalele surse de proteine rămân carnea şi peştele, iar proteinele animale sunt digerate în proporţie mai mare, pe când cele vegetale au un conţinut mai mare de fibre şi gradul lor de digerabilitate este mai mic.</strong><br />\n<br />\nÎn plus proteinele vegetale sunt mult mai sărace sau nu conţin deloc unii aminoacizi esenţiali, deosebit de importanţi pentru organism, iar variantele de a înlocui proteina animală creează frecvent carenţe importante de vitamina D, B12, calciu, fier, iod, zinc, ale căror repercusiuni sunt diminuarea masei musculare, oboseală, crampe musclulare, insomnii.</p>\n<p>\n<a href=\"http://www.csid.ro/diet-sport/dieta-si-nutritie/dietele-sarace-in-proteine-sunt-indicate-8303527/\" target=\"_blank\" title=\"Dietele sarace in proteine - sunt indicate?\">Proteinele </a>constituie cărămizile necesare pentru constituirea ţesuturilor noastre (pereţii celulari, muşchii, sângele, părul, organele interne cum ar fi inima şi creierul etc), cât şi a hormonilor, enzimelor şi anticorpilor şi pentru înlocuirea celulelor uzate.</p>\n<p>\nDeşi consumul strict de fructe şi legume şi evitarea, pe cât posibil, a consumului de carne sunt din ce în ce mai promovate în \"lumea nutriţiei\", trebuie să ştii că cele mai bogate surse de proteine se găsesc în carne, ouă şi brânzeturi. Fiind atât de bogată în proteine, carnea măreşte rezistenţa organismului faţă de anumite boli, agresiuni toxice sau infecţioase, contribuind şi la buna funcţionare a sistemului nervos.</p>			   <div id=\"adoceanthinkdigitalrosaipjpjjyw\"></div>\n<script type=\"text/javascript\">\n/* (c)AdOcean 2003-2015, thinkdigital_ro.csid.ro.Dieta.640x160_adtext_580x160 */\nado.slave(\'adoceanthinkdigitalrosaipjpjjyw\', {myMaster: \'sXRWQP_6Qu5qrotqkBXiw4rHnGyTXjBlw9oMjaeIO4L.B7\' });\n</script>	\n<p>\nProteinele pot servi, de asemenea, ca sursă de energie atunci când<a href=\"http://www.csid.ro/diet-sport/dieta-si-nutritie/glucidele-in-alimentatie-ce-cum-si-cat-consumam-pentru-o-silueta-armonioasa-11931823/\" target=\"_blank\" title=\"Glucidele în alimentaţie - ce, cum şi cât consumăm pentru o siluetă armonioasă?\"> glucidele</a> sunt insuficiente. Totuşi, acest lucru nu este de dorit pentru că va fi îngreunată munca rinichilor şi se va pierde mult calciu din organism.</p>\n<p>\n<strong>Proteinele sunt alcătuite din <a href=\"http://www.csid.ro/video/emisiunea-csid/111011-anumiti-aminoacizi-va-slabesc-si-reduc-coelsterolul-aflati-care-sunt-acestia-8857125/\" target=\"_blank\" title=\"Anumiti aminoacizi va slabesc si reduc coelsterolul. Aflati care sunt acestia!\">aminoacizi,</a> mai exact există 23 de aminoacizi care formează proteinele umane. 13 dintre aceştia sunt produşi de organism, însă ceilalţi nouă, numiţi esenţiali, trebuie furnizaţi prin dietă.</strong></p>\n<p>\nAminoacizii esenţiali sunt: izoleucina, leucina, lizina, trenonina, triptofanul, valina, metionina, histidina şi fenilalanina.</p>			   <div id=\"adoceanthinkdigitalrombqhmnmhvg\"></div>\n<script type=\"text/javascript\">\n/* (c)AdOcean 2003-2016, thinkdigital_ro.csid.ro.Dieta.640x160_adtext_580x160_2 */\nado.slave(\'adoceanthinkdigitalrombqhmnmhvg\', {myMaster: \'sXRWQP_6Qu5qrotqkBXiw4rHnGyTXjBlw9oMjaeIO4L.B7\' });\n</script>	\n<p>\n<a href=\"http://www.csid.ro/diet-sport/dieta-si-nutritie/dieta-vegetariana-argumente-pro-si-contra-12339413/\" target=\"_blank\" title=\"Dieta vegetariană: argumente pro şi contra\">Dieta vegetariană</a> furnizează toţi aminoacizii esenţiali, cu condiţia asigurării unor alimente variate, bogate în proteine. De aceea este necesară combinarea alimentelor bogate în proteine; de exemplu, a cerealelor cu leguminoaselor, a cerealelor cu nucile sau seminţele.</p>\n<p>\nFiind necesare pentru creştere şi dezvoltare, copiii au nevoie de mai multe proteine decât adulţii. În prezent, cantitatea de proteine necesară pentru un adult este estimată la 0.8 g per kg corp, ceea ce pentru o persoană de 60 kg ar însemna circa 50 g de proteine zilnic.</p>\n<p>\nSugarul alimentat la sân primeşte proteine suficiente prin laptele de mamă.</p>\n<p>\nÎn ceea ce priveşte alimentaţia copiilor, aportul proteic necesar nu va constitui o problemă atâta timp cât li se asigură o alimentaţie variată şi echilibrată în timpul zilei.</p>\n<p>\n<strong>Cele mai bogate surse de proteine:</strong></p>\n<p>\nCarnea albă de pui sau <strong><a href=\"http://www.csid.ro/diet-sport/dieta-si-nutritie/carnea-de-curcan-principala-sursa-de-proteine-de-calitate-12217911/\" target=\"_blank\" title=\"Carnea de curcan, principala sursă de proteine de calitate\">de curcan</a></strong> - se găteşte uşor şi de obicei are puţină grăsime. 100 grame de piept de pui fără piele are aprox 30 grame de proteine.</p>\n<p>\n<a href=\"http://www.csid.ro/diet-sport/dieta-si-nutritie/ouale-de-ce-trebuie-sa-le-includeti-in-meniu-chiar-daca-aveti-probleme-cardiovasculare-10797080/\" target=\"_blank\" title=\"Ouăle - de ce TREBUIE să le includeţi în meniu chiar dacă aveţi probleme cardiovasculare\"><strong>Ouăle </strong></a>– ieftine şi pline de proteine; consumă-le întregi, cu tot cu gălbenuş şi albuş pentru a beneficia de bogăţia de proteine (un ou mediu, 46 g, întreg prăjit are 6,26 g).</p>\n<p>\nTonul şi <a href=\"http://www.csid.ro/diet-sport/dieta-si-nutritie/7-mituri-despre-consumul-de-somon-11111987/\" target=\"_blank\" title=\"7 mituri despre consumul de somon\"><strong>Somonul</strong></a> - sunt o sursă importantă de proteine şi acizi graşi Omega 3, nutrienţi esenţiali pentru menţinerea sănătăţii. 100 grame de file de ton - somon conţin aprox 26 grame de proteine.</p>\n<p>\n<a href=\"http://www.csid.ro/diet-sport/dieta-si-nutritie/carnea-de-porc-mai-sanatoasa-decat-carnea-rosie-si-cea-de-pui-10393712/\" target=\"_blank\" title=\"Carnea de porc, mai sănătoasă decât carnea roşie şi cea de pui\"><strong>Carnea de porc </strong></a>atent selecţionată, fără grăsime, este bogată în proteine şi vitamine din grupul B (tiamină, niacină, vitaminele B 6 şi B12) care joacă un rol important în funcţionarea sănătoasă a organismului.</p>\n<p>\n<strong>Soia</strong>, unul din cele mai sănătoase alimente, conţine nu doar multe proteine, dar multe minerale, vitamine şi fibre. La 100 de grame de boabe mature de soia, prajite uscat (fara ulei) avem 39,58 g proteine, la 100 g de boabe mature de soia, fierte avem 16,64 grame de proteine.</p>\n<p>\n<strong><a href=\"http://www.csid.ro/health/noutati-sanatate/consumul-de-fructe-in-coaja-lemnoasa-secretul-vietii-longevive-11129933/\" target=\"_blank\" title=\"Consumul de fructe în coajă lemnoasă, secretul vieţii longevive\">Fructele în coajă lemnoasă</a> –</strong> constituie gustarea ideală, sunt practice şi nu sunt perisabile, spre deosebire de o ciocolată de exemplu. Migdalele, nucile, fisticul, cajuu, alunele de pădure sunt excelente surse de vitamine, minerale, grîsimi sănătoase şi fibre şi pot fi luate oriunde, le poţi uita în birou, în ghiozdan sau în dulpa pentru mult timp că tot la fel de gustoase şi pline de beneficii vor fi.</p>\n<p>\n<strong>Sursa: <a href=\"http://www.csid.ro/diet-sport/dieta-si-nutritie/proteinele-baza-alimentatiei-tale-12968633/\">click</a></strong></p>', '<p>Contnent</p>\r\n', '1495790583'),
(5, 'Jogging', 'Jogging', 'exercise_jogging_SS.jpg', '<p>Jogging este o alergare necompetitivă, practicată pe orice fel de teren, în scopul menținerii formei fizice și al reducerii obezității. Poate avea consecințe grave în cazul în care alergătorul își depășește limitele fizice.</p>\n', '<p>Jogging is a form of trotting or running at a slow or leisurely pace. The main intention is to increase physical fitness with less stress on the body than from faster running, or to maintain a steady speed for longer periods of time. Performed over long distances, it is a form of aerobic endurance training.</p>\n', '1495824809');

-- --------------------------------------------------------

--
-- Table structure for table `web_hospitalizations`
--

CREATE TABLE `web_hospitalizations` (
  `ID` int(11) NOT NULL,
  `CardCode` varchar(128) NOT NULL,
  `Hospital` int(11) NOT NULL,
  `Reason` varchar(256) NOT NULL,
  `StartDate` varchar(128) NOT NULL COMMENT 'timestamp',
  `StopDate` varchar(128) NOT NULL COMMENT 'timestamp'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_hospitalizations`
--

INSERT INTO `web_hospitalizations` (`ID`, `CardCode`, `Hospital`, `Reason`, `StartDate`, `StopDate`) VALUES
(1, '3276798432475544591', 5, 'Faringita', '1432477237', '1495635638');

-- --------------------------------------------------------

--
-- Table structure for table `web_medicatii`
--

CREATE TABLE `web_medicatii` (
  `ID` int(11) NOT NULL,
  `DoctorCode` varchar(128) NOT NULL,
  `Product` varchar(256) NOT NULL,
  `Date` varchar(128) NOT NULL,
  `CardCode` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_medicatii`
--

INSERT INTO `web_medicatii` (`ID`, `DoctorCode`, `Product`, `Date`, `CardCode`) VALUES
(1, '3276798432475544591', '<p>Algocalmin</p>\r\n\r\n<p>Nurofen</p>\r\n\r\n<p>Klacid 400mg</p>\r\n', '1495913281', '3276798432475544591');

-- --------------------------------------------------------

--
-- Table structure for table `web_notes`
--

CREATE TABLE `web_notes` (
  `ID` int(11) NOT NULL,
  `CardCode` varchar(256) NOT NULL,
  `ByDoctor` varchar(256) NOT NULL COMMENT 'CardCode',
  `Notes` mediumtext NOT NULL,
  `Date` varchar(128) NOT NULL COMMENT 'TIMESTAMP'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_notes`
--

INSERT INTO `web_notes` (`ID`, `CardCode`, `ByDoctor`, `Notes`, `Date`) VALUES
(1, '3276798432475544591', '4276798432475544592', '<p>Alergic la tutun</p>', '1495655102'),
(2, '3276798432475544591', '3276798432475544591', '<p>Alergic la praf</p>\n', '1495788787');

-- --------------------------------------------------------

--
-- Table structure for table `web_recomandations`
--

CREATE TABLE `web_recomandations` (
  `ID` int(11) NOT NULL,
  `CardCode` varchar(128) COLLATE utf8_romanian_ci NOT NULL,
  `DoctorCode` varchar(128) COLLATE utf8_romanian_ci NOT NULL,
  `Recomandation` varchar(1024) COLLATE utf8_romanian_ci NOT NULL,
  `Date` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci;

--
-- Dumping data for table `web_recomandations`
--

INSERT INTO `web_recomandations` (`ID`, `CardCode`, `DoctorCode`, `Recomandation`, `Date`) VALUES
(1, '3276798432475544591', '4276798432475544592', '<p>Se recomanda folosirea unguentelor ce nu contin aluminiu.</p>\n', 1498307303);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `web_accounts`
--
ALTER TABLE `web_accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `web_analyzes`
--
ALTER TABLE `web_analyzes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `web_diagnostics`
--
ALTER TABLE `web_diagnostics`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `web_healthguide`
--
ALTER TABLE `web_healthguide`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `web_hospitalizations`
--
ALTER TABLE `web_hospitalizations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `web_medicatii`
--
ALTER TABLE `web_medicatii`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `web_notes`
--
ALTER TABLE `web_notes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `web_recomandations`
--
ALTER TABLE `web_recomandations`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `web_accounts`
--
ALTER TABLE `web_accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `web_analyzes`
--
ALTER TABLE `web_analyzes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `web_diagnostics`
--
ALTER TABLE `web_diagnostics`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `web_healthguide`
--
ALTER TABLE `web_healthguide`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `web_hospitalizations`
--
ALTER TABLE `web_hospitalizations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `web_medicatii`
--
ALTER TABLE `web_medicatii`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `web_notes`
--
ALTER TABLE `web_notes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `web_recomandations`
--
ALTER TABLE `web_recomandations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
