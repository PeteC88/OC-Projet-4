-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Creato il: Mag 01, 2018 alle 19:25
-- Versione del server: 5.7.19
-- Versione PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'Pietro', 'Ciao, bell\'articolo', '2018-03-25 09:29:05'),
(2, 2, 'Mélanie', 'Mi piace tanto.', '2018-03-25 11:14:19'),
(3, 3, 'Saso', 'Sono d\'accordo', '2018-03-14 18:14:38'),
(4, 1, 'Mélanie', 'Chi è l\'autore?', '2018-03-25 10:07:26'),
(5, 1, 'Saso', 'Sono contento di averlo letto.', '2018-04-17 23:37:58'),
(6, 1, 'Chérazad', 'Je ne parle pas latin.', '2018-04-18 13:09:29'),
(7, 2, 'Olivier', 'Salut', '2018-04-21 11:10:08'),
(8, 1, 'Mél', 'Mi piace questo post', '2018-04-21 21:45:42'),
(9, 7, 'Chérazad', 'ça me plait', '2018-04-24 13:27:57'),
(10, 7, 'Jason', 'Non capisco', '2018-04-29 20:40:36');

-- --------------------------------------------------------

--
-- Struttura della tabella `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `connexion`
--

INSERT INTO `connexion` (`id`, `email`, `password`) VALUES
(1, 'pietro@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Struttura della tabella `jeux_video`
--

DROP TABLE IF EXISTS `jeux_video`;
CREATE TABLE IF NOT EXISTS `jeux_video` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `possesseur` varchar(255) NOT NULL,
  `console` varchar(255) NOT NULL,
  `prix` double NOT NULL DEFAULT '0',
  `nbre_joueurs_max` int(11) NOT NULL DEFAULT '0',
  `commentaires` text NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `jeux_video`
--

INSERT INTO `jeux_video` (`ID`, `nom`, `possesseur`, `console`, `prix`, `nbre_joueurs_max`, `commentaires`) VALUES
(1, 'Super Mario Bros', 'Florent', 'NES', 4, 1, 'Un jeu d\'anthologie !'),
(2, 'Sonic', 'Patrick', 'Megadrive', 2, 1, 'Pour moi, le meilleur jeu du monde !'),
(3, 'Zelda : ocarina of time', 'Florent', 'Nintendo 64', 15, 1, 'Un jeu grand, beau et complet comme on en voit rarement de nos jours'),
(4, 'Mario Kart 64', 'Florent', 'Nintendo 64', 25, 4, 'Un excellent jeu de kart !'),
(5, 'Super Smash Bros Melee', 'Michel', 'GameCube', 55, 4, 'Un jeu de baston délirant !'),
(6, 'Dead or Alive', 'Patrick', 'Xbox', 60, 4, 'Le plus beau jeu de baston jamais créé'),
(7, 'Dead or Alive Xtreme Beach Volley Ball', 'Patrick', 'Xbox', 60, 4, 'Un jeu de beach volley de toute beauté o_O'),
(8, 'Enter the Matrix', 'Michel', 'PC', 45, 1, 'Plutôt bof comme jeu, mais ça complète bien le film'),
(9, 'Max Payne 2', 'Michel', 'PC', 50, 1, 'Très réaliste, une sorte de film noir sur fond d\'histoire d\'amour. A essayer !'),
(10, 'Yoshi\'s Island', 'Florent', 'SuperNES', 6, 1, 'Le paradis des Yoshis :o)'),
(11, 'Commandos 3', 'Florent', 'PC', 44, 12, 'Un bon jeu d\'action où on dirige un commando pendant la 2ème guerre mondiale !'),
(12, 'Final Fantasy X', 'Patrick', 'PS2', 40, 1, 'Encore un Final Fantasy mais celui la est encore plus beau !'),
(13, 'Pokemon Rubis', 'Florent', 'GBA', 44, 4, 'Pika-Pika-chu !!!'),
(14, 'Starcraft', 'Michel', 'PC', 19, 8, 'Le meilleur jeux pc de tout les temps !'),
(15, 'Grand Theft Auto 3', 'Michel', 'PS2', 30, 1, 'Comme dans les autres Gta on ecrase tout le monde :) .'),
(16, 'Homeworld 2', 'Michel', 'PC', 45, 6, 'Superbe ! o_O'),
(17, 'Aladin', 'Patrick', 'SuperNES', 10, 1, 'Comme le dessin Animé !'),
(18, 'Super Mario Bros 3', 'Michel', 'SuperNES', 10, 2, 'Le meilleur Mario selon moi.'),
(19, 'SSX 3', 'Florent', 'Xbox', 56, 2, 'Un très bon jeu de snow !'),
(20, 'Star Wars : Jedi outcast', 'Patrick', 'Xbox', 33, 1, 'Encore un jeu sur star-wars où on se prend pour Luke Skywalker !'),
(21, 'Actua Soccer 3', 'Patrick', 'PS', 30, 2, 'Un jeu de foot assez bof ...'),
(22, 'Time Crisis 3', 'Florent', 'PS2', 40, 1, 'Un troisième volet efficace mais pas vraiment surprenant'),
(23, 'X-FILES', 'Patrick', 'PS', 25, 1, 'Un jeu censé ressembler a la série mais assez raté ...'),
(24, 'Soul Calibur 2', 'Patrick', 'Xbox', 54, 1, 'Un jeu bien axé sur le combat'),
(25, 'Diablo', 'Florent', 'PS', 20, 1, 'Comme sur PC mais la c\'est sur un ecran de télé :) !'),
(26, 'Street Fighter 2', 'Patrick', 'Megadrive', 10, 2, 'Le célèbre jeu de combat !'),
(27, 'Gundam Battle Assault 2', 'Florent', 'PS', 29, 1, 'Jeu japonais dont le gameplay est un peu limité. Peu de robots malheureusement'),
(28, 'Spider-Man', 'Florent', 'Megadrive', 15, 1, 'Vivez l\'aventure de l\'homme araignée'),
(29, 'Midtown Madness 3', 'Michel', 'Xbox', 59, 6, 'Dans la suite des autres versions de Midtown Madness'),
(30, 'Tetris', 'Florent', 'Gameboy', 5, 1, 'Qui ne connait pas ? '),
(31, 'The Rocketeer', 'Michel', 'NES', 2, 1, 'Un super un film et un jeu de m*rde ...'),
(32, 'Pro Evolution Soccer 3', 'Patrick', 'PS2', 59, 2, 'Un petit jeu de foot sur PS2'),
(33, 'Ice Hockey', 'Michel', 'NES', 7, 2, 'Jamais joué mais a mon avis ca parle de hockey sur glace ... =)'),
(34, 'Sydney 2000', 'Florent', 'Dreamcast', 15, 2, 'Les JO de Sydney dans votre salon !'),
(35, 'NBA 2k', 'Patrick', 'Dreamcast', 12, 2, 'A votre avis :p ?'),
(36, 'Aliens Versus Predator : Extinction', 'Michel', 'PS2', 20, 2, 'Un shoot\'em up pour pc'),
(37, 'Crazy Taxi', 'Florent', 'Dreamcast', 11, 1, 'Conduite de taxi en folie !'),
(38, 'Le Maillon Faible', 'Mathieu', 'PS2', 10, 1, 'Le jeu de l\'émission'),
(39, 'FIFA 64', 'Michel', 'Nintendo 64', 25, 2, 'Le premier jeu de foot sur la N64 =) !'),
(40, 'Qui Veut Gagner Des Millions', 'Florent', 'PS2', 10, 1, 'Le jeu de l\'émission'),
(41, 'Monopoly', 'Sebastien', 'Nintendo 64', 21, 4, 'Bheuuu le monopoly sur N64 !'),
(42, 'Taxi 3', 'Corentin', 'PS2', 19, 4, 'Un jeu de voiture sur le film'),
(43, 'Indiana Jones Et Le Tombeau De L\'Empereur', 'Florent', 'PS2', 25, 1, 'Notre aventurier préféré est de retour !!!'),
(44, 'F-ZERO', 'Mathieu', 'GBA', 25, 4, 'Un super jeu de course futuriste !'),
(45, 'Harry Potter Et La Chambre Des Secrets', 'Mathieu', 'Xbox', 30, 1, 'Abracadabra !! Le célebre magicien est de retour !'),
(46, 'Half-Life', 'Corentin', 'PC', 15, 32, 'L\'autre meilleur jeu de tout les temps (surtout ses mods).'),
(47, 'Myst III Exile', 'Sébastien', 'Xbox', 49, 1, 'Un jeu de réflexion'),
(48, 'Wario World', 'Sebastien', 'Gamecube', 40, 4, 'Wario vs Mario ! Qui gagnera ! ?'),
(49, 'Rollercoaster Tycoon', 'Florent', 'Xbox', 29, 1, 'Jeu de gestion d\'un parc d\'attraction'),
(50, 'Splinter Cell', 'Patrick', 'Xbox', 53, 1, 'Jeu magnifique !');

-- --------------------------------------------------------

--
-- Struttura della tabella `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(1, 'Pietro', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'pietro@gmail.com', '2018-03-29'),
(2, 'Saso', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'saso@gmail.com', '2018-04-03'),
(3, 'Mélanie', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'mel@gmail.com', '2018-04-03'),
(4, 'Saverio', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'saverio@gmail.com', '2018-04-03'),
(5, 'Anto', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'anto@gmail.com', '2018-04-07'),
(6, 'Olivier', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'olivier@gmail.com', '2018-04-07'),
(7, 'mel', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'mela@gmail.com', '2018-04-21');

-- --------------------------------------------------------

--
-- Struttura della tabella `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PSEUDO` varchar(255) NOT NULL,
  `MESSAGE` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `message`
--

INSERT INTO `message` (`ID`, `PSEUDO`, `MESSAGE`) VALUES
(8, 'Pietro', 'Ciao come va?'),
(9, 'Olivier', 'Tutto bene grazie, e tu?'),
(10, 'sajdapos', 'fdsfds'),
(11, 'sadsaopp', 'apofdjdsò');

-- --------------------------------------------------------

--
-- Struttura della tabella `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Il mio primo blog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit.', '2018-03-21 12:32:00'),
(2, 'I dolori del Giovane Werther', 'La mia anima è pervasa da una mirabile serenità, simile a queste belle mattinate di maggio che io godo con tutto il cuore. Sono solo e mi rallegro di vivere in questo luogo che sembra esser creato per anime simili alla mia. Sono così felice, mio caro, così immerso nel sentimento della mia tranquilla esistenza che la mia arte ne soffre. Non potrei disegnare nulla ora, neppure un segno potrei tracciare; eppure mai sono stato così gran pittore come in questo momento. Quando l\'amata valle intorno a me si avvolge nei suoi vapori, e l\'alto sole posa sulla mia foresta impenetrabilmente oscura, e solo alcuni raggi si spingono nell\'interno sacrario, io mi stendo nell\'erba alta presso il ruscello che scorre, e più vicino alla terra osservo mille multiformi erbette; allora sento più vicino al mio cuore brulicare tra gli steli il piccolo mondo degli innumerevoli, infiniti vermiciattoli e moscerini, e sento la presenza dell\'Onnipossente che ci ha creati a sua immagine e ci tiene in una eterna gioia. Amico mio, quando dinanzi ai miei occhi si stende il crepuscolo e posa intorno a me il mondo e il cielo tutto nell\'anima mia come la sembianza di donna amata, allora spesso', '2018-03-13 06:14:16'),
(3, 'Cicerone', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere', '2018-03-15 14:26:22'),
(4, 'Il mio quarto post', 'Ma la volpe col suo balzo ha raggiunto il quieto Fido. Quel vituperabile xenofobo zelante assaggia il whisky ed esclama: alleluja! Aquel vituperable xenófobo apasionado prueba su güisqui y exclama: ¡Aleluya! Ma la volpe col suo balzo ha raggiunto il quieto Fido. Quel vituperabile xenofobo zelante assaggia il whisky ed esclama: alleluja! Aquel vituperable xenófobo apasionado prueba su güisqui y exclama: ¡Aleluya! Ma la volpe col suo balzo ha raggiunto il quieto Fido. Quel vituperabile xenofobo zelante assaggia il whisky ed esclama: alleluja! Aquel vituperable xenófobo apasionado prueba su güisqui y exclama: ¡Aleluya! Ma la volpe col suo balzo ha raggiunto il quieto Fido. Quel vituperabile xenofobo zelante assaggia il whisky ed esclama: alleluja! Aquel vituperable xenófobo apasionado prueba su güisqui y exclama: ¡Aleluya! Ma la volpe col suo balzo ha raggiunto il quieto Fido. Quel vituperabile xenofobo zelante assaggia il whisky ed esclama: alleluja! Aquel vituperable xenófobo apasionado prueba su güisqui y exclama: ¡Aleluya! Ma la volpe col suo balzo ha raggiunto il quieto Fido. Quel vituperabile xenofobo zelante assaggia il whisky ed esclama: alleluja! Aquel vituperable xenófobo apasionado prueba su güisqui y exclama: ¡Aleluya!Ma la volpe col suo balzo ha raggiunto il quieto Fido. Quel vituperabile xenofobo', '2018-04-18 09:21:00'),
(5, 'il mio quinto post', 'Gregorio Samsa, svegliandosi una mattina da sogni agitati, si trovò trasformato, nel suo letto, in un enorme insetto immondo. Riposava sulla schiena, dura come una corazza, e sollevando un poco il capo vedeva il suo ventre arcuato, bruno e diviso in tanti segmenti ricurvi, in cima a cui la coperta da letto, vicina a scivolar giù tutta, si manteneva a fatica. Le gambe, numerose e sottili da far pietà, rispetto alla sua corporatura normale, tremolavano senza tregua in un confuso luccichio dinanzi ai suoi occhi. Cosa m’è avvenuto? pensò. Non era un sogno. La sua camera, una stanzetta di giuste proporzioni, soltanto un po’ piccola, se ne stava tranquilla fra le quattro ben note pareti. Sulla tavola, un campionario disfatto di tessuti - Samsa era commesso viaggiatore e sopra, appeso alla parete, un ritratto, ritagliato da lui - non era molto - da una rivista illustrata e messo dentro una bella cornice dorata: raffigurava una donna seduta, ma ben dritta sul busto, con un berretto e un boa di pelliccia; essa levava incontro a chi guardava un pesante manicotto, in cui scompariva tutto l’avambraccio. Lo sguardo di Gregorio si rivolse allora verso la finestra, e il cielo fosco (si sentivano', '2018-04-12 14:12:00'),
(6, 'il mio sesto post', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nun', '2018-04-16 11:26:00'),
(7, 'il mio settimo post', 'In una terra lontana, dietro le montagne Parole, lontani dalle terre di Vocalia e Consonantia, vivono i testi casuali. Vivono isolati nella cittadina di Lettere, sulle coste del Semantico, un immenso oceano linguistico. Un piccolo ruscello chiamato Devoto Oli attraversa quei luoghi, rifornendoli di tutte le regolalie di cui hanno bisogno. È una terra paradismatica, un paese della cuccagna in cui golose porzioni di proposizioni arrostite volano in bocca a chi le desideri. Non una volta i testi casuali sono stati dominati dall’onnipotente Interpunzione, una vita davvero non ortografica. Un giorno però accadde che la piccola riga di un testo casuale, di nome Lorem ipsum, decise di andare a esplorare la vasta Grammatica. Il grande Oximox tentò di dissuaderla, poiché quel luogo pullulava di virgole spietate, punti interrogativi selvaggi e subdoli punti e virgola, ma il piccolo testo casuale non si fece certo fuorviare. Raccolse le sue sette maiuscole, fece scorrere la sua iniziale nella cintura, e si mise in cammino. Quando superò i primi colli dei monti Corsivi, si voltò a guardare un’ultima volta la skyline di Lettere, la sua città, la headline del villaggio Alfabeto e la subline della sua stessa strada, il vicolo Riga. Una domanda retorica', '2018-04-24 10:25:00'),
(8, 'ciao', 'doisajosaijda', '2018-04-28 19:17:48'),
(26, 'Post numero 8', 'Sto scrivendo questo post con Jason', '2018-04-29 20:41:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
