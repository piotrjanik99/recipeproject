-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Maj 2021, 01:28
-- Wersja serwera: 10.4.18-MariaDB
-- Wersja PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `recipeproject`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `category_ID` int(2) NOT NULL,
  `title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`category_ID`, `title`) VALUES
(1, 'Śniadanie'),
(2, 'Obiad'),
(3, 'Kolacja');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rates`
--

CREATE TABLE `rates` (
  `rate_ID` int(5) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `recipe_ID` int(3) NOT NULL,
  `rate` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `recipes`
--

CREATE TABLE `recipes` (
  `recipe_ID` int(3) NOT NULL,
  `category_ID` int(2) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `title` varchar(25) NOT NULL,
  `ingredients` longtext NOT NULL,
  `description` longtext NOT NULL,
  `picture` varchar(255) NOT NULL,
  `creation_date` datetime(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `recipes`
--

INSERT INTO `recipes` (`recipe_ID`, `category_ID`, `user_ID`, `title`, `ingredients`, `description`, `picture`, `creation_date`) VALUES
(60, 1, 37, 'Omlet na słodko', '2 jajka,\r\n4 łyżki mleka,\r\n3 łyżki mąki,\r\n2 łyżki powideł śliwkowych,\r\n2 łyżki serka śmietankowego,\r\n1 łyżka cukru,\r\n1 łyżka masła do smażenia,\r\n1 łyżeczka cukru waniliowego', 'Krok 1\r\nOddziel białka od żółtek.\r\nKrok 2\r\nŻółtka wymieszaj z cukrem, cukrem waniliowym, mlekiem i mąką pszenną za pomocą trzepaczki.\r\nKrok 3\r\nBiałka ubij mikserem na sztywną pianę.\r\nKrok 4\r\nUbite białka delikatnie wmieszaj do masy z żółtek.\r\nKrok 5\r\nMasło rozpuść na patelni.\r\nKrok 6\r\nNa rozgrzaną patelnię wlej wymieszaną masę, smaż na bardzo małym ogniu.\r\nKrok 7\r\nPo 3–4 minutach delikatnie przewróć na drugą stronę.\r\nKrok 8\r\nSmaż przez mniej więcej 2 minuty.\r\nKrok 9\r\nUsmażony omlet przełóż na talerz, dodaj serek i powidła, złóż na pół i zjedz od razu, ponieważ z czasem omlet traci puszystość.', '1621115458_z25350932IER,Omlet-na-slodko.jpg', '2021-05-30 21:18:16.979869'),
(61, 1, 37, 'Tosty z szynką i serem', '8 kromek chleba tostowego,\r\n1/4 kostki masła (50g),\r\n4 plastry cebuli,\r\n4 plastry szynki,\r\n4 plastry pomidora,\r\n4 plastry sera żółtego,\r\n1 łyżeczka Przyprawa do masła czosnkowego grzanki złociste w torebce', 'Krok 1\r\nMasło utrzeć z przyprawą.\r\nKrok 2\r\nNa 4 kromkach chleba tostowego ułożyć ser, wędlinę, pomidora i cebulę.\r\nKrok 3\r\nPrzykryć drugą kromką chleba i posmarować na zewnątrz, z obu stron, masłem.\r\nKrok 4\r\nUpiec w tosterze do kanapek na złoty kolor.', '1621115475_tosty_z_szynka_i_serem_600.jpg', '2021-05-30 21:19:45.705900'),
(62, 1, 37, 'Owsianka z bananem', '30 g płatków owsianych (1/3 szklanki),\r\n1 banan,\r\n200 ml mleka,\r\n0.5 łyżeczki cynamonu', 'Krok 1\r\nBanana pokrój w plastry, a następnie rozgnieć widelcem.\r\nKrok 2\r\nDo rondelka wsyp płatki owsiane, dodaj rozgniecionego banana i cynamon.\r\nKrok 3\r\nWlej mleko i wymieszaj.\r\nKrok 4\r\nGotuj na średnim ogniu około 7-10 minut - aż płatki zmiękną, a owsianka zgęstnieje.\r\nKrok 5\r\nPrzełóż owsiankę do miseczki i zjedz z ulubionymi dodatkami.', '1621115491_owsianka_z_bananem_i_cynamonem_800.jpg', '2021-05-30 21:25:27.985913'),
(64, 1, 37, 'Jajecznica na boczku', '200 g wędzonego boczku,\r\n5 jajek,\r\n1 cebula,\r\nsól i pieprz do smaku,\r\n1 łyżka oleju lub masła', 'Krok 1\r\nCebule obieram i kroję w kostkę.\r\nKrok 2\r\nPodsmażam na oleju, gdy stanie się złota wkładam pokrojony w kostkę wędzony boczek.\r\nLekko wytapiam na małym gazie.\r\nKrok 3\r\nDo boczku i cebuli wbijam jajka, delikatnie mieszam.\r\nWłaściwie nie solę ponieważ boczek jest słony, tu wystarczy doprawić pieprzem mielonym.\r\nKrok 4\r\nJajecznica z boczkiem ląduje na talerzu w towarzystwie chleba.', '1621115525_jajecznica-na-boczku-4391.jpg', '2021-05-30 21:23:22.623765'),
(65, 1, 37, 'Rogale z makiem', '600 g mąki pszennej,\r\n3 łyżki cukru,\r\n250 ml ciepłego mleka,\r\n2 jajka,\r\n1 żółtko,\r\n50 g drożdży świeżych,\r\n100 g rozpuszczonego masła,\r\n1 łyżeczka ekstraktu waniliowego,\r\nszczypta soli,\r\n400 g masy makowej', 'Krok 1\r\nPrzygotuj rozczyn: wymieszaj 50 ml ciepłego mleka, 50 g świeżych rozdrobnionych drożdży i 20 g cukru. Odstaw na chwilę w cieple miejsce.\r\nKrok 2\r\nNastępnie do dużej misy przesiej mąkę, dodaj jajka oraz żółtko, resztę mleka i cukru, masło, esencje waniliową i sól. Dodaj “pracujący” zaczyn i wyrabiaj ciasto tak długo, aż zacznie odchodzić od dłoni. Tak przygotowane wstaw razem z misą do piekarnika nagrzanego do 30-35°C i ogrzewaj przez 20 minut.\r\nKrok 3\r\nWyrośnięte ciasto podziel na 4 części i po kolei każdą z nich rozwałkuj.\r\nKrok 4\r\nRozwałkowany placek ciasta podziel na 8 równych części. Tak jak kroi się pizzę. Na szerszy brzeg każdego kawałka ciasta nałóż po czubatej łyżeczce masy makowej i zawiń tak aby ich wąski koniec znalazł się pod rogalikiem. Przygotowane rogaliki układaj na blaszkach pokrytych papierem do pieczenia i piecz partiami 12-14 minut w 220 °C. Grzanie góra-dół.\r\n', '1621115570_fed1dc1c8f344a3aa0a5ff01d2dd14f021ca639b.jpeg', '2021-05-30 21:24:49.010307'),
(72, 2, 37, 'Pikantne żeberka z grilla', 'żeberka wieprzowe 800 gramów, miód gryczany 3 łyżki, Przyprawa pikantna grubo mielona Knorr 1 opakowanie, cebula szalotka 1 sztuka, ketchup 100 gramów,sos sojowy 50 mililitrów, ocet balsamiczny 50 mililitrów, 2 cm imbiru 1 sztuka, olej rzepakowy 3 łyżki, Liść laurowy z Turcji Knorr 3 sztuki, Ziele angielskie z Meksyku Knorr 3 ziarna, sól 0.75 łyżki', 'Krok 1\r\nŻeberka pokrój w mniejsze kawałki, przełóż do garnka zalej 500 ml wody, dodaj sól, ziele angielskie i liść laurowy, gotuj około 30 minut pod przykryciem, aż mięso zmięknie.\r\nKrok 2\r\nSzalotkę pokrój w drobną kosteczkę, obierz i zetrzyj imbir.\r\nKrok 3\r\nW garnku na rozgrzanym oleju zeszkli szalotkę, dodaj miód smaż aż zacznie się karmelizować, dodaj ocet gotuj aż zupełnie odparuje, dodaj imbir, sos sojowy, ketchup i opakowanie przyprawy grubo mielonej Knorr. Całość gotuj chwilę pod przykryciem uważając na gęsty sos, który będzie pryskał.\r\nKrok 4\r\nGotowa marynatę podziel na dwie części. Do jednej części włóż jeszcze gorące żeberka i dokładnie wymieszaj, odstaw je do zamarynowania na co najmniej 12 h. Druga część posłuży do glazurowania już upieczonego mięsa.\r\nKrok 5\r\nŻeberka piecz/grilluj na tackach aluminiowych około 15 minut na średnio rozgrzanym grillu pod przykryciem, obracając mięso co jakiś czas. Grillując musisz uważać żeby glazura na sosie się nie spaliła. Gotowe żeberka tuż przed podaniem wymieszaj z pozostała marynatą.', 'zeberka.jpeg', '2021-05-30 22:10:37.823027'),
(73, 2, 37, 'Zapiekanka makaronowa', 'makaron świderki 100 gramów, Rosół z kury Knorr 1 sztuka, filet z kurczaka 1 sztuka, cebula 1 sztuka, papryka 1 sztuka, pomidor 1 sztuka, przecier pomidorowy 2 łyżki, ząbek czosnku 1 sztuka, mozarella light 20 dekagramów, olej 4 łyżki, woda 1 szklanka', 'Krok 1\r\nCebulę pokrój w piórka, czosnek przeciśnij przez praskę. Podsmaż je na oleju.\r\nKrok 2\r\nUgotuj makaron na sposób al dente.\r\nKrok 3\r\nWarzywa pokrój w paski i wraz z kurczakiem dodaj do całości. Duś około 15 minut. Następnie podlej szklanką wody i dodaj kostkę Rosołu z kury Knorr oraz przecier pomidorowy.\r\nKrok 4\r\nMakaron wyłóż do naczynia żaroodpornego, zalej sosem i posyp startym serem. Włóż do piekarnika nagrzanego do 180 stopni na 20 minut. Następnie podawaj.', 'zapiekanka.jpg', '2021-05-30 22:13:21.434491'),
(74, 2, 37, 'Szaszłyki z kurczaka', 'ok. 450 gram piersi z kurczaka (bez skóry),\r\n10-12 plastrów boczku,\r\n1/2 łyżki oliwy z oliwek,\r\n1/4 łyżeczki wędzonej papryki,\r\n1/4 łyżeczki suszonego czosnku,\r\n1/4 łyżeczki suszonej cebuli,\r\n1/4 łyżeczki suszonej bazylii,\r\n1/4 łyżeczki suszonego tymianku,\r\n1/8 łyżeczki pieprzu cayenne,\r\nsól + pieprz czarny,\r\ngarść natki pietruszki (opcjonalnie do podania)', 'Krok 1\r\nPiekarnik nagrzać do 180 stopni Celsjusza. Płaską blachę wyłożyć folią aluminiową lub papierem do pieczenia, a na jej wierzchu ułożyć nasmarowany oliwą z oliwek ruszt. Boczek pokroić w cienkie plastry. Pierś z kurczaka dokładnie opłukać, osuszyć, pozbawić zbędnych kawałków (tłuszczu i chrząstek) i pokroić w kostkę.\r\nKrok 2\r\nPokrojoną w kostkę pierś z kurczaka przerzucić do miski, skropić 1/2 łyżki oliwy z oliwek i wymieszać. Następnie dodać 1/4 łyżeczki mielonej wędzonej papryki, 1/4 łyżeczki suszonego czosnku, 1/4 łyżeczki suszonej cebuli, 1/4 łyżeczki suszonego tymianku, 1/4 łyżeczki suszonej bazylii, 1/8 łyżeczki pieprzu cayenne, sól oraz pieprz czarny do smaku i dokładnie przemieszać, aby mięso pokryło się przyprawami.\r\nKrok 3\r\nTak przygotowane kawałki kurczaka owijać w cienkie plastry oczku i nadziewać na patyczki do szaszłyków. Po czym układać na uprzednio przygotowanym ruszcie i wstawić do nagrzanego piekarnika. Piec ok. 25-30 minut, lub do czasu uzyskania ulubionego przez nas stopnia ugotowania kurczaka i podpieczenia boczku.\r\nKrok 4\r\nPrzepyszne, delikatne w środku i chrupiące z zewnątrz szaszłyki z kurczaka i boczku podawać wraz z wszelkiego rodzaju ulubionymi dodatkami, sałatkami lub dipami, dodatkowo udekorowane drobno posiekaną natką pietruszki.', 'szaszlyki.jpg', '2021-05-30 22:12:19.041456'),
(75, 2, 37, 'Placki Ziemniaczane', '1 kg ziemniaków,\r\n2 cebule,\r\n2 ząbki czosnku (opcjonalnie),\r\n2 jajka,\r\n2 - 3 łyżki mąki pszennej,\r\n1 łyżka śmietany (opcjonalnie),\r\nsól i pieprz,\r\nolej do smażenia', 'Krok 1\r\nObrane ziemniaki i cebulę ścieramy na tarce o drobnych oczkach, wylewamy masę na sitko ustawione na naczyniu i delikatnie odciskamy. Ziemniaki mieszamy z jajkami i mąką oraz dodajemy przeciśnięty przez praskę czosnek (opcjonalnie).\r\nKrok 2\r\nZ naczynia, nad którym odcedzaliśmy ziemniaki z nadmiaru wody, odlewamy delikatnie sok zostawiając na dnie skrobię ziemniaczaną. Skrobię dodajemy do masy wraz 1 łyżką śmietany, doprawiamy solą oraz pieprzem i smażymy z obu stron na złoty kolor.\r\nKrok 3\r\nGotowe placki podajemy z gęstą śmietaną lub jogurtem naturalnym.\r\n\r\n*placki możemy smażyć na oleju lub na smalcu\r\n\r\n* śmietana w masie zapobiegnie jej ciemnieniu. Zamiast śmietany możemy użyć także gęstego jogurtu\r\n\r\n* kształt i grubość placków zależna jest od sposobu nałożenia masy oraz naszych upodobań', 'placki.jpeg', '2021-05-30 22:15:53.298259'),
(76, 2, 37, 'Lazania', '500 g mięsa mielonego wieprzowego,\r\npuszka pomidorów z puszki,\r\nmały koncentrat pomidorowy,\r\n2 cebule,\r\n2 ząbki czosnku,\r\nmakaron lazania,\r\n30 dag żółtego sera,\r\nsól i pieprz,\r\nbazylia,\r\noregano,\r\noliwa z oliwek,\r\nszklanka mleka 3,2 %,\r\n4 łyżki mąki,\r\n4 łyżki masła', 'Krok 1\r\nSos beszamelowy: Na patelni rozpuszczamy 4 łyżki masła, zdejmujemy z ognia i dosypujemy 4 łyżki mąki. Mieszamy aż powstanie gładka masa. Następnie dolewamy szklankę mleka, z powrotem wstawiamy na palnik i podgrzewamy do uzyskania jednolitej gęstej masy - ciągle mieszając.\r\nKrok 2\r\nLazania: Na patelni podsmażamy mięso, dodajemy posiekane w kosteczkę cebule i czosnek. Gdy mięso będzie już rozdrobnione i podsmażone dodajemy pomidory z puszki i koncentrat pomidorowy, przyprawiamy do smaku solą, pieprzem, oregano i bazylią i chwilę dusimy. W osolonej wodzie z dodatkiem oliwy z oliwek podgotowujemy makaron ok 2-3 min, odcedzamy.\r\nKrok 3\r\nNaczynie żaroodporne smarujemy oliwą i układamy pierwszą warstwę makaronu. Makaron pokrywamy cienką warstwą beszamelu a na beszamelu układamy mięso. Przykrywamy makaronem i powtarzamy czynność. Ostatnia warstwa powinna się składać z beszamelu i mięsa. Całość posypujemy startym serem.\r\nKrok 4\r\nPieczemy w piekarniku rozgrzanym do 180 stopni ok 20-30 minut. Potem wyłączamy piekarnik i lazanię pozostawiamy w nim jeszcze na ok. 20 min.', '166274-v-1000x1000.jpg', '2021-05-30 21:54:40.694593'),
(77, 3, 37, 'Bigos', '40g suszonych grzybów, 200g boczku, 400g mięsa wieprzowego, 400g mięsa wołowego, 3 łyżki oleju, 1 litr bulionu, 1kg białej kapusty, 500g kiszonej kapusty, 100g suszonych śliwek, 2 cebule, 250g kiełbasy, 1 łyżka koncentratu pomidorowego', 'Krok 1\r\nSuszone grzyby połamać, zalać szklanką ciepłej wody i odstawić do namoczenia.\r\nKrok 2\r\nPrzygotować duży garnek z grubym dnem oraz dużą patelnię. Boczek pokroić w kosteczkę. Całe mięso pokroić w niedużą kostkę.\r\nKrok 3\r\nNa gorącą patelnię wlać 1 łyżkę oleju, włożyć boczek i co chwilę mieszając smażyć przez ok. 5 minut, przełożyć do garnka.\r\nKrok 4\r\nNa patelnię wlać drugą łyżkę oleju i partiami obsmażać mięso, następnie przekładać je do garnka z boczkiem.\r\nKrok 5\r\nGarnek z obsmażonym mięsem postawić na ogniu, wlać bulion (najlepiej gorący) i zagotować. Gotować pod przykryciem przez około 45 minut.\r\nKrok 6\r\nŚwieżą kapustę drobno poszatkować, pomijając głąba ze środka kapusty. Włożyć do garnka z mięsem i wymieszać. Przykryć i gotować przez około 1/2 godziny.\r\nKrok 7\r\nCiągle gotując bigos dodać grzyby wraz z wodą z moczenia, odciśnię kapustę kiszoną, posiekane śliwki oraz przyprawy. Dokładnie wymieszać i gotować przez około 1/2 godziny.\r\nKrok 8\r\nCebulę pokroić w kostkę, następnie zeszklić ją na patelni na 1 łyżce oleju. Przełożyć do garnka z mięsem.\r\nKrok 9\r\nKiełbasę obrać, pokroić w kostkę lub plasterki i podsmażyć na patelni, dodać do bigosu.\r\nKrok 10\r\nDodać koncentrat, dokładnie wymieszać, przykryć i gotować przez ok. 1 godzinę. Czasem zamieszać i sprawdzić czy bigos nie przywiera do dna. Doprawić pieprzem oraz w razie potrzeby solą.', '1622415957_bigos.jpg', '2021-05-31 01:05:57.091779'),
(78, 3, 37, 'Leczo', '1 łyżka oliwy lub oleju, 1 mała cebula, 2 ząbki czosnku, 100 g kiełbasy chorizo, 1 mały batat (350 g), 250 g cukinii, 2/3 szklanki bulionu, po połowie żółtej i czerwonej papryki, 1 puszka pomidorów, 2 łyżeczki koncentratu pomidorowego', 'Krok 1\r\nDo garnka wlać oliwę, dodać pokrojoną na półplasterki cebulę oraz pokrojony w kosteczkę czosnek. Wymieszać i zeszklić na umiarkowanym ogniu przez 1 - 2 minuty.\r\nKrok 2\r\nZdjąć cienką skórkę z kiełbasy chorizo i pokroić na półplasterki. Dodać do garnka, wymieszać i podsmażać przez ok. 2 - 3 minuty.\r\nKrok 3\r\nDodać obranego i pokrojonego w kostkę batata i wszystko wymieszać. Podsmażać przez ok. 2 - 3 minuty.\r\nKrok 4\r\nDodać pokrojoną w kostkę cuknię, przyprawy, doprawić solą i pieprzem oraz wlać bulion. Zagotować.\r\nKrok 5\r\nDodać pokrojoną w kostkę paprykę, delikatnie wymieszać i gotować pod lekko uchyloną pokrywą przez ok. 5 minut. W międzyczasie 1 raz zamieszać.\r\nKrok 6\r\nDodać pomidory (jeśli są w całości, z puszki - należy je posiekać). Dodać koncentrat pomidorowy, wymieszać i gotować przez ok. 5 minut.', '1622416216_leczo.jpg', '2021-05-31 01:10:16.802372'),
(79, 3, 37, 'Ryż z mango', '1 szklanka ryżu kleistego, 1 szklanka wody, 1 szklanka mleka kokosowego, 3 łyżki cukru, mała szczypta soli, 1 łyżeczka skrobi ziemniaczanej, 2 dojrzałe owoce mango, 1/4 limonki, 2 łyżki lekko podprażonego sezamu, listki mięty do dekoracji', 'Krok 1\r\nRyż dokładnie wypłukać kilkakrotnie zmieniając wodę, odsączyć. Zalać zimną wodą (1 szklanka), przykryć i gotować na małym ogniu przez ok. 10 minut. Odstawić z ognia i zostawić pod przykryciem na ok. 10 - 15 minut, aby ryż całkowicie wchłonął wodę.\r\nKrok 2\r\nMleko kokosowe zagotować w garnku z dodatkiem cukru i soli. 3/4 mleka wlać do ryżu i wymieszać. Resztę wymieszać z mąką ziemniaczaną (uprzednio rozprowadzić ją w 2 - 3 łyżkach zimnej wody) i zagotować. Otrzymaną polewę zachować do polania ryżu.\r\nKrok 3\r\nMango umyć, obrać i pokroić. Ułożyć na talerzych i skropić sokiem z limonki. Obok wyłożyć ryż (np. za pomocą filiżanki), polać sosem z mleka kokosowego i posypać sezamem. Udekorować listkami mięty.', '1622416386_mango.jpg', '2021-05-31 01:17:35.401017'),
(80, 3, 37, 'Medaliony warzywne', '1/2 brokuła, 1/2 pora, 1 łyżka oliwy, 2 - 3 ugotowane ziemniaki, 3 jajka, 3 łyżki śmietanki 30% lub mleka, sól, pieprz, 1 łyżeczka suszonego oregano, po 1 łyżeczce mąki pszennej i ziemniaczanej, 1 łyżka posiekanego koperku lub szczypiorku, 4 plasterki żółtego sera', 'Krok 1\r\nNa gotującą się wodę włożyć połówkę brokuła (różyczkami ku górze). Gotować przez ok. 3 minuty, wyjąć i pokroić na małe kawałeczki, przestudzić.\r\nKrok 2\r\nPora przekroić wzdłuż na 4 części, opłukać, osuszyć, następnie posiekać. Włożyć na patelnię z oliwą i dusić przez ok. 5 minut do miękkości, co chwilę mieszając. Zdjąć na talerz i przestudzić.\r\nKrok 3\r\nUgotowane i obrane ziemniaki pokroić w kostkę. Piekarnik nagrzać do 180 stopni C.\r\nKrok 4\r\nW misce roztrzepać jajka z dodatkiem śmietanki lub mleka, soli, pieprzu i oregano. Dodać mąkę pszenną i ziemniaczaną i wymieszać dokładnie rózgą.\r\nKrok 5\r\nPołączyć za pomocą łyżki z koperkiem lub szczypiorkiem, pokrojonym w kosteczkę serem oraz przygotowanymi składnikami: brokułem, porem i ziemniakami.\r\nKrok 6\r\n8 żaroodpornych kokilkek (lub 8 wgłębień w formie do muffinów lub 8 foremek silikonowych) natłuścić oliwą lub masłem, napełnić masą i wstawić do piekarnika. Piec przez ok. 20 min', '1622416965_medaliony.jpg', '2021-05-31 01:22:45.204711'),
(81, 3, 37, 'Placek z cukinii', '2 cukinie, 1 cebula, 2 ząbki czosnku, 4 łyżki bułki tartej, 3 jajka, 50 g tartego sera żółtego, 50 g tartego parmezanu, 1/2 pęczka szczypiorku, 1 łyżeczka oliwy extra vergine, sól, pieprz, tarta gałka muszkatołowa', 'Krok 1\r\nCukinie umyć, odkroić końce. Zetrzeć na tarce o dużych oczkach razem z obraną cebulą. Doprawić solą, wymieszać i zostawić na sitku na ok. 15 minut, następnie dokładnie odcisnąć z nadmiaru soku.\r\nKrok 2\r\nWłożyć do większej miski. Piekarnik nagrzać do 190 stopni C.\r\nKrok 3\r\nDo miski z cukinią i cebulą dodać starte ząbki czosnku, bułkę tartą, jajka, tarty ser, parmezan, posiekany szczypiorek i oliwę. Doprawić solą, pieprzem oraz gałką muszkatołową, wymieszać.\r\nKrok 4\r\nWyłożyć do niedużej formy (np. 18 x 23 cm) wyścielonej papierem do pieczenia i piec przez ok. 30 minut.', '1622417179_placek.jpg', '2021-05-31 01:26:19.339222');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_ID` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(60) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_ID`, `username`, `password`, `email`) VALUES
(37, 'admin', '$2y$10$ttH3XMDzxn1hct1PSleqjOMmy4mjBBlJi9aCrjrQ/D0r7pHiSK8la', 'admin@admin'),
(38, 'patryk', '$2y$10$p5CvcvMjNGBjm6ymiEEKvul0IjL1nv.Kn9eT64x7c3LBjN.erIcmO', 'patryk@mail'),
(39, 'piotrek', '$2y$10$isDbmbPPTav.Vb0T7aWKmuOdRoKw0UoHVQJ.5hrzyBej0fgylm2vG', 'piotrek@mail'),
(40, 'user', '$2y$10$r5Rl.X/mhLIYF32wU/EV3ebSX/Iz8KvYmPrmqY11fvtHEaoCgKF3W', 'user@mail');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indeksy dla tabeli `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`rate_ID`),
  ADD KEY `recipe_ID` (`recipe_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indeksy dla tabeli `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipe_ID`),
  ADD KEY `category_ID` (`category_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `category_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `rates`
--
ALTER TABLE `rates`
  MODIFY `rate_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT dla tabeli `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipe_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_ibfk_1` FOREIGN KEY (`recipe_ID`) REFERENCES `recipes` (`recipe_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rates_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`category_ID`) REFERENCES `categories` (`category_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `recipes_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
