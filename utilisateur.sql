-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 04 avr. 2020 à 20:13
-- Version du serveur :  10.4.12-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gamepedia`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `email` varchar(60) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `numTel` varchar(20) NOT NULL,
  `dateNaiss` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`email`, `nom`, `prenom`, `adresse`, `numTel`, `dateNaiss`) VALUES
('adolph.dooley@harvey.com', 'Ritchie', 'Randi', '97881 June Center Suite 977\nWest Venamouth, CA 28880-0497', '+9097302405538', '1978-12-26'),
('agustin.wyman@hotmail.com', 'Robel', 'Karianne', '34463 Vincenzo Turnpike Suite 763\nNew Amelia, OH 34284', '+3910527417928', '2013-03-13'),
('alfred59@hotmail.com', 'Ferry', 'Anabelle', '3889 Nikolaus Garden\nKuhicstad, NY 36213', '+2646069330731', '1985-02-24'),
('ana75@orn.com', 'Jast', 'Monica', '71299 Janice Expressway Suite 707\nPort Palma, FL 90211', '+1337350080007', '1999-03-05'),
('armstrong.raven@dickinson.net', 'Herman', 'Janiya', '2749 Abbey Cliffs Apt. 835\nWest Karolann, SD 74898', '+5898219476614', '2008-02-13'),
('arnaldo51@yahoo.com', 'Kertzmann', 'Nyah', '11227 Ratke Lakes Apt. 862\nBrekkeland, ND 01895', '+4990778165919', '1973-06-10'),
('bergstrom.dock@grady.com', 'Orn', 'Weston', '12947 Fletcher Fort Suite 846\nNorth Davonteshire, ID 04488', '+3077142042031', '2003-09-23'),
('bfunk@gmail.com', 'Lubowitz', 'Wyman', '243 Ritchie Centers\nSylvanview, LA 24147', '+6872745140767', '1990-03-10'),
('billy.schulist@hotmail.com', 'Steuber', 'Julie', '52163 Eladio Harbors\nCorkeryton, SC 40486', '+9029497729891', '2000-10-07'),
('brennan.cronin@yahoo.com', 'O\'Conner', 'Chandler', '9122 Everardo Ports Suite 902\nNorth Reymundoside, ID 88777-8785', '+6922078764084', '1975-02-25'),
('champlin.douglas@adams.com', 'Larson', 'Seth', '680 Lynch Mountain Suite 757\nLake Hannamouth, DE 01965-1621', '+3803027899952', '2003-08-26'),
('crystel.kris@dicki.com', 'Flatley', 'Jovani', '2260 Parker Island Suite 036\nAngelinehaven, IL 97866-6880', '+3043232653354', '1982-05-04'),
('deborah87@yahoo.com', 'Pouros', 'Jarred', '28166 Mallie Path\nStaceyport, MD 42288', '+4909210674313', '2002-11-16'),
('dell.crist@hotmail.com', 'Marks', 'King', '67855 Devyn Circles Suite 380\nNew Destineyville, OR 33805', '+3901382110512', '1991-07-14'),
('dolores29@yahoo.com', 'Hyatt', 'Haylie', '4924 Charlotte Islands Suite 981\nNorth Ronny, DC 83351-2596', '+4584599994767', '1975-06-25'),
('douglas.karen@gmail.com', 'Johnson', 'Angela', '2003 Thiel Street\nKutchview, ND 85782-7805', '+9507354940521', '1979-12-16'),
('dustin20@yahoo.com', 'Casper', 'Deshaun', '83160 Freddie Cliff Suite 972\nPort Karlie, NJ 06855', '+3077465724412', '2009-08-02'),
('echristiansen@gmail.com', 'Bauch', 'Easter', '4567 Lindgren Route Apt. 336\nEast Marguerite, IL 75534', '+5262730707409', '2004-08-08'),
('elmo.schinner@hotmail.com', 'Leffler', 'Ransom', '57636 Kihn Station Apt. 147\nEast Nannie, VT 34851-5944', '+5300478298760', '1973-08-12'),
('elvie18@schoen.org', 'Schroeder', 'Augustus', '914 Emilie Junction\nSouth Christophe, AZ 64959', '+7672763344114', '2003-09-02'),
('ernser.garnet@johns.com', 'White', 'Zack', '913 Durgan Roads\nLavernport, WV 48613-6953', '+9338501931421', '2008-11-29'),
('esauer@aufderhar.biz', 'Auer', 'Alan', '22404 Kathryne Avenue Apt. 101\nWaynemouth, MN 18717', '+7632305247605', '1977-07-03'),
('estevan81@conn.com', 'Hermann', 'Janessa', '542 Lindgren View\nGoldaville, KY 65972-5608', '+4619641483206', '2004-10-18'),
('feest.lyric@halvorson.org', 'Breitenberg', 'Melany', '97006 Feest Pass Suite 218\nSouth Lilianaside, DE 09335', '+5428870608119', '1978-07-21'),
('funk.ryan@crona.org', 'McLaughlin', 'Drew', '700 Alvah Stream Apt. 336\nSpencerfort, IL 23766-3486', '+2229273613663', '2007-05-21'),
('garnett45@hotmail.com', 'Bogisich', 'Justen', '2573 Collin Circle Apt. 083\nNitzschefort, RI 18680', '+4887669398717', '1989-10-26'),
('gerhold.blaze@fisher.net', 'Gutmann', 'Deondre', '35796 Braden Underpass Apt. 942\nKennaport, CA 41313-4070', '+2174685695490', '2011-01-27'),
('gmcclure@gmail.com', 'Ziemann', 'Raven', '2393 Stokes Ports Apt. 346\nNew Kayleefort, AR 95763', '+6617497507044', '1980-05-11'),
('gonzalo33@bode.com', 'Cole', 'Rahul', '473 Cydney Plain\nLinaborough, ND 71283', '+3947242061546', '1979-11-28'),
('graciela.dach@swift.com', 'Murray', 'Janie', '11980 Funk Hill Apt. 577\nLake Gudrunfurt, VT 19701-5363', '+5572736010167', '1999-05-02'),
('hill.jeanette@yahoo.com', 'Schuppe', 'Reynold', '10285 Jast Crest\nPort Granville, AK 46219', '+9091296653184', '2010-07-10'),
('homenick.carolina@gmail.com', 'Lang', 'Electa', '514 Jones Isle\nNorth Alvenafort, NE 64561', '+3461617616241', '2005-01-30'),
('hortense12@windler.com', 'Tromp', 'Brianne', '61608 Angela Pike Apt. 111\nMercedesfort, TN 51690', '+6710071866860', '1978-03-17'),
('hvolkman@gmail.com', 'Witting', 'Kenton', '645 Shanel Prairie\nWest Sydnie, RI 86988', '+3933444872151', '1981-02-01'),
('iupton@hotmail.com', 'Walsh', 'Bettye', '47712 Monahan Greens\nNew Twila, OR 60721-8312', '+6867516411490', '1976-03-21'),
('jaylon34@weber.com', 'Crooks', 'Kamryn', '435 Schaefer View Apt. 660\nPort Dayna, WV 99068-1419', '+4114040886269', '2018-10-04'),
('jedediah79@fritsch.com', 'Crist', 'Emory', '90435 Crist Forks Apt. 481\nWest Loisstad, GA 90144-2704', '+2966669746515', '1996-01-27'),
('jesse22@yahoo.com', 'Block', 'Michel', '44727 Harber Plaza Apt. 935\nSouth Gerardomouth, AR 13003-3546', '+7096492026288', '2015-05-10'),
('jones.oceane@maggio.com', 'Hills', 'Dock', '24065 Ana Manors Suite 779\nEast Elmore, OK 72017-1802', '+4402281136448', '1988-10-31'),
('kallie61@maggio.com', 'Conn', 'Carlee', '374 Clare Stravenue Suite 165\nCristopherbury, IN 82977-7862', '+7982496833913', '1974-07-11'),
('katarina.heller@hotmail.com', 'Parisian', 'Easter', '994 Lesch Avenue\nPort Clementmouth, IL 05946', '+7939855679064', '1979-02-10'),
('katlyn.price@schmitt.com', 'Rutherford', 'Herbert', '5744 Ruecker Shore Apt. 632\nThomasshire, NY 78700-9440', '+4288883154480', '1972-12-29'),
('kautzer.antoinette@yahoo.com', 'Kerluke', 'Delilah', '326 Collier Cove\nLake Daltonshire, NE 10010-2869', '+4161692045687', '2010-06-13'),
('kirlin.rosanna@medhurst.info', 'Stark', 'Parker', '339 Maggie Junction\nNorth Salvadorfurt, WV 70915', '+2082271454653', '2001-04-17'),
('klowe@haley.biz', 'Wisoky', 'Donna', '3018 Lind Station Suite 057\nNorth Judsonfurt, ID 34833', '+6937152002794', '1993-01-16'),
('kohler.alicia@hotmail.com', 'Dicki', 'Beryl', '1886 Satterfield Lane\nLake Pabloside, PA 90662-9574', '+2749936496593', '2002-04-24'),
('kullrich@bednar.org', 'Sipes', 'Mark', '557 Pollich Drive Suite 156\nSouth Shannaville, MT 34049-7557', '+2865690146063', '1983-04-05'),
('lauretta24@hessel.com', 'Jaskolski', 'Chester', '2180 Jordy Field\nTillmanstad, SD 26918', '+5078115895336', '1975-06-30'),
('lebsack.ricardo@yahoo.com', 'Glover', 'Sandra', '453 Luettgen Isle Apt. 777\nPort Bryonside, MD 56535', '+1108885275491', '2018-12-21'),
('lokeefe@hotmail.com', 'Mraz', 'Izabella', '60293 Roselyn Port Suite 366\nKochhaven, FL 10750-4477', '+6547337433994', '1995-09-25'),
('loma.reichel@gmail.com', 'Hamill', 'Twila', '244 Osinski Ways Suite 965\nPort Norrisville, MO 53897', '+5222074867634', '2014-10-30'),
('lori.dubuque@konopelski.com', 'Bode', 'Savanah', '51751 Kuvalis Cape\nJenkinsmouth, SD 85490', '+9477144944514', '2004-01-03'),
('mabel.johnston@romaguera.org', 'Muller', 'Bret', '2936 Mariano Trace\nErnserborough, MN 82864', '+8612356979500', '1996-07-07'),
('manuela.flatley@hotmail.com', 'Crooks', 'Elijah', '69384 Daphney Springs\nMaggiostad, MT 91395-8095', '+2532608994995', '1991-04-04'),
('mazie16@yahoo.com', 'Schulist', 'Lee', '28590 Emile Rapid Suite 366\nLornafort, ID 27570-7894', '+2490677791957', '1988-06-13'),
('mcormier@gmail.com', 'Murazik', 'Jaleel', '16766 Langworth Mountain\nEast Lafayetteborough, NH 15955-8401', '+4359254814020', '1987-07-12'),
('micaela.schamberger@gmail.com', 'Klocko', 'Rae', '6422 Keeling Spurs Apt. 280\nMikeport, NJ 26526-0635', '+7713489651231', '1984-04-04'),
('miller.sarai@gmail.com', 'Ondricka', 'Melissa', '171 Deja Knoll Apt. 565\nPort Coby, MI 29622', '+5974828330797', '1988-04-17'),
('mina.leuschke@yahoo.com', 'Walter', 'Triston', '3509 Esteban Crescent\nFaheyport, VT 80062-6793', '+3234575211218', '2007-04-21'),
('mondricka@satterfield.com', 'Nolan', 'Carrie', '2291 Langworth Ranch Suite 169\nLake Adeliastad, RI 55508', '+3293867249091', '1985-12-27'),
('monserrat.greenfelder@cormier.org', 'Bradtke', 'Constantin', '38286 Roderick Gardens\nWest Delphashire, TX 86112-0525', '+8271873371398', '2003-02-22'),
('mvonrueden@erdman.info', 'Corkery', 'Demetrius', '55615 Arely Union\nPort Bellfort, CT 06150-2840', '+6937123191033', '1977-03-20'),
('nmertz@gmail.com', 'Waters', 'Merl', '36317 Aufderhar Centers\nNew Camilleberg, MS 61357-3876', '+8912783685792', '1990-07-24'),
('nmonahan@tromp.com', 'Bosco', 'Elise', '67534 Anjali Hill Apt. 624\nJudemouth, DC 20842', '+4035276746576', '1996-05-06'),
('okuneva.ansley@gmail.com', 'Green', 'Enos', '5880 Sidney Grove\nEast Havenside, MO 34666', '+2415190681606', '1981-01-22'),
('ola94@gmail.com', 'Wilderman', 'Zita', '6951 Satterfield Shore\nWalterville, MI 72342-4713', '+4422666809302', '1981-09-22'),
('patricia.hill@brekke.com', 'Rogahn', 'Marlee', '4441 Nathen Union Suite 507\nJacobsonborough, MT 54309', '+3111286413492', '1991-02-05'),
('pberge@ward.com', 'Corkery', 'Glen', '2769 Schmidt Estate Suite 211\nWest Gaetano, ND 17715-9917', '+9288933874858', '2006-10-24'),
('pbraun@yahoo.com', 'Wilderman', 'Fabian', '777 Boyer Pines\nWest Liliane, UT 72308', '+8313511058856', '2009-03-04'),
('penelope76@shanahan.com', 'Thiel', 'Lolita', '26376 Kiehn Extensions Apt. 124\nPaucekmouth, HI 92811-0275', '+9394374910576', '2003-07-19'),
('pierce.carroll@jacobs.com', 'DuBuque', 'Delfina', '952 McKenzie Junction\nRiceton, SD 60291-9624', '+6022831456903', '1980-09-24'),
('pollich.madisyn@lynch.com', 'Abernathy', 'Renee', '4747 Rodriguez Circles\nNew Maximustown, ID 25419-5390', '+7816165681555', '1989-05-31'),
('psimonis@hotmail.com', 'Stamm', 'Joelle', '52244 Hyatt Ports Apt. 660\nHarrisport, IA 18088', '+5812077209642', '1994-03-05'),
('qboehm@lubowitz.com', 'Greenholt', 'Elliot', '6784 Ollie Creek Apt. 335\nReichertview, LA 76723', '+6688817766178', '1972-04-27'),
('raquel37@kovacek.com', 'Will', 'Camylle', '4860 Jamaal Vista\nWest Stuarttown, KY 73211', '+4740727156880', '1993-10-13'),
('rgulgowski@satterfield.com', 'Von', 'Sydnie', '328 Russel Mall Suite 273\nEichmannberg, NM 81218-8215', '+2040788102058', '2010-01-01'),
('rhianna.ritchie@gmail.com', 'Bergnaum', 'Margret', '42436 Rylan Pines\nPort Trevahaven, TX 98635-4741', '+4049853116615', '1975-08-30'),
('river.champlin@daugherty.net', 'Ortiz', 'Darrin', '90247 Vernice Island\nUllrichmouth, CO 19584', '+3139043738001', '2014-02-22'),
('rolfson.johathan@hegmann.org', 'Wisoky', 'Camilla', '9164 Moen Plain Suite 517\nLake Buddy, NJ 61457', '+8046920851642', '2000-01-24'),
('ruecker.felton@gmail.com', 'Fisher', 'Kevon', '198 Arvid Oval Apt. 575\nGoyetteton, IL 41715-3905', '+7663628807854', '2006-01-04'),
('runolfsson.nelle@grimes.org', 'Corkery', 'Alexandra', '696 Bartell Mission Suite 745\nLake Nedraview, WY 45626', '+9490471377009', '1995-02-28'),
('sconnelly@hilpert.com', 'Labadie', 'Brisa', '499 Maxie Gateway\nPort Jessburgh, VA 11668', '+9806277093020', '2003-06-01'),
('scotty43@stark.info', 'Jaskolski', 'Flo', '77862 Neal Meadow Suite 115\nNorth Kayleebury, DC 77512', '+7421264672178', '1985-07-30'),
('shanahan.eulalia@hotmail.com', 'Bergnaum', 'Edmund', '648 Schroeder Oval\nEast Harmony, CA 10739-6810', '+6947649509170', '1988-09-30'),
('simonis.amy@hotmail.com', 'Fay', 'Gregg', '96275 Vito Burg Apt. 667\nAshlynnton, SC 44953', '+5177404084274', '2015-11-12'),
('stanton.pearl@champlin.info', 'Reichert', 'Jazmin', '46815 Considine Rapids\nLake Shaun, WI 12209-2463', '+3250705108119', '1988-09-12'),
('streich.jules@abbott.com', 'Olson', 'Carlee', '453 Shields Forges\nEast Leanna, AZ 83208', '+3161849396760', '2016-04-30'),
('timmothy.spinka@ebert.com', 'Kuphal', 'Cade', '867 Lind Unions Suite 542\nNorth Virgilchester, MA 14512', '+5817564093197', '2016-07-13'),
('torey59@hotmail.com', 'Powlowski', 'Josie', '572 Thea Pines Apt. 596\nPresleyborough, DC 85994', '+5751019606420', '1980-02-28'),
('turcotte.kailyn@thiel.com', 'Funk', 'King', '3288 Gerlach Islands\nBayermouth, IL 67433', '+4196302349582', '1989-10-05'),
('turner.keaton@herzog.net', 'Gibson', 'Esther', '851 Carolanne Extensions\nConstanceton, NC 34419', '+9363298547637', '1987-11-20'),
('turner.scottie@mitchell.info', 'Walsh', 'Angelina', '3129 Veum Court\nSchuylerton, WY 30231', '+5459035344139', '1994-11-23'),
('uborer@tillman.com', 'Beatty', 'Mathias', '49789 Ledner Creek Suite 918\nEphraimshire, WY 62816', '+6945916671148', '1999-04-17'),
('verlie50@kassulke.com', 'Nader', 'Jefferey', '43047 Nelda Mountains\nO\'Konmouth, WA 21359', '+5680382805033', '1980-08-10'),
('vhamill@hotmail.com', 'Hansen', 'Nora', '298 Schumm Shore Apt. 123\nNew Juanita, KY 57177-3011', '+1647874267914', '1976-07-02'),
('vivien.flatley@kerluke.com', 'Stanton', 'Calista', '44757 Von Drives Apt. 942\nSouth Ebony, OR 99946-7601', '+7241900204308', '2001-02-09'),
('vnolan@mcclure.com', 'Blick', 'Keaton', '358 Bergstrom Lodge Apt. 209\nLake Guillermoburgh, ID 53634-7654', '+9918604015843', '1994-03-31'),
('vschaden@hotmail.com', 'Mann', 'Carmella', '1279 Yolanda Curve\nEast Kayley, AL 85020', '+4414279161847', '2006-05-23'),
('walsh.rodger@yahoo.com', 'Dickinson', 'Kenyatta', '87777 Morar Springs\nWatsicaberg, NM 51121-9861', '+4345155941651', '2019-06-13'),
('xanderson@gmail.com', 'Kohler', 'Sigmund', '295 Heathcote Plains\nTyraview, CA 82736', '+8996934386915', '1995-03-19');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
