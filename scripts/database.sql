-- JWR assignment database;

DROP TABLE IF EXISTS `bookmarks`;
DROP TABLE IF EXISTS `reviews`;
DROP TABLE IF EXISTS `games`;
DROP TABLE IF EXISTS `genres`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uname VARCHAR(40),
    pass VARCHAR(255),
    salt VARCHAR(255),
    is_admin BOOLEAN
);

CREATE TABLE `genres` (
    id varchar(3) NOT NULL PRIMARY KEY,
    title VARCHAR(50)
);

CREATE TABLE `games` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150),
    image VARCHAR(255),
    genre varchar(3) NOT NULL,
    rating INT,
    FOREIGN KEY (genre) REFERENCES genres(id) ON DELETE CASCADE
);

CREATE TABLE `bookmarks` (
    user_id INT,
    game_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE
);

CREATE TABLE `reviews` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id int,
    game_id int,
    rating INT,
    title VARCHAR(150),
    review TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE
);


INSERT INTO `genres` VALUES ("str", "Strategy");
INSERT INTO `genres` VALUES ("rpg", "Role-Playing Game");
INSERT INTO `genres` VALUES ("fps", "First Person Shooter");
INSERT INTO `genres` VALUES ("sim", "Simulation Game");
INSERT INTO `genres` VALUES ("???", "Other");

-- game list (yes, I'm including ones with strange letters on purpose)
INSERT INTO `games` VALUES (NULL, "Sid Meier's Civilization V: Brave New World", "https://images.thedigitalfix.com/image/gaming/1872/1140/641.jpg", "str", 85); -- 8 Jul 2013
INSERT INTO `games` VALUES (NULL, "Crusader Kings II", "https://www.macgamestore.com/images_boxshots/master/crusader-kings-ii-holy-fury-1548952140.jpg", "str", 82); -- 14 feb 2012
INSERT INTO `games` VALUES (NULL, "Warcraft III: Reforged ", "https://i.ytimg.com/vi/Odmvx-T8uJc/maxresdefault.jpg", "str", 60); -- 28 jan 2020

INSERT INTO `games` VALUES (NULL, "Else Heart.Break()", "https://i.ytimg.com/vi/75IeBfUfhXc/maxresdefault.jpg", "rpg", 79); -- Sep 24 2015
INSERT INTO `games` VALUES (NULL, "Shadowrun: Dragonfall - Director's Cut", "https://gpstatic.com/acache/38/11/1/us/t620x300-4bf3ab0dd40f104ba0550bae0baab8a7.jpg", "rpg", 87); -- 18 sep 2014
INSERT INTO `games` VALUES (NULL, "Stardew Valley", "https://d3tg06jbotvai2.cloudfront.net/game_tetiere/upload/gameimage/file/8378.jpeg", "rpg", 89); -- 26 feb 2016 (it has the RPG tag on steam, it counts...)
INSERT INTO `games` VALUES (NULL, "Disco Elysium", "https://monstervine.com/wp-content/uploads/2019/11/disco-elysium-banner-scaled.jpg", "rpg", 91); -- 15 oct 2019

INSERT INTO `games` VALUES (NULL, "RimWorld", "https://www.netzpiloten.de/wp-content/uploads/2018/10/RimWorld_Header.jpg", "sim", 87); -- 17 oct 2018
INSERT INTO `games` VALUES (NULL, "Tom Clancy's Rainbow Six® Siege", "https://http2.mlstatic.com/tom-clancys-rainbow-six-siege-complete-edition-pc-digital-D_NQ_NP_750412-MLA27869085803_072018-F.jpg", "fps", 0); -- 1 dec 2015, metacritic score wasn't on steam page
INSERT INTO `games` VALUES (NULL, "Euro Truck Simulator 2", "https://www.ligaprorace.com/wp-content/uploads/2018/10/Euro-Truck-Simulator-2-Cover.jpg", "sim", 79); -- 18 oct 2012
INSERT INTO `games` VALUES (NULL, "Farming Simulator 19", "https://sm.ign.com/ign_pt/screenshot/default/main-artwork-fs19-logo_q5nz.jpg", "sim", 73); -- 19 Nov, 2018
INSERT INTO `games` VALUES (NULL, "Train Simulator 2020", "https://www.hrkgame.com/media/games/.thumbnails/Train_Simulator_2018.jpg/Train_Simulator_2018-460x215.jpg", "sim", 0); -- 12 jul 2009 *shrugs at release date on steam...*

INSERT INTO `games` VALUES (NULL, "Project Zomboid", "https://steamuserimages-a.akamaihd.net/ugc/768350028783496833/FAF08AA53A912BFAE84427D3B07026C3755C57A8/", "rpg", 87); -- 8 nov 2013
INSERT INTO `games` VALUES (NULL, "Shadowrun Returns", "https://upload.wikimedia.org/wikipedia/en/9/9f/Shadowrun_Returns_logo.jpg", "rpg", 76); -- 25 july 2013
INSERT INTO `games` VALUES (NULL, "Shadowrun: Hong Kong - Extended Edition", "https://images.gog-statics.com/fcc90f964947d19b0bc49825d55cd181fea2389cd1312a5619ac731fc1c64208_product_card_v2_mobile_slider_639.jpg", "rpg", 81); -- 20 aug 2015

INSERT INTO `games` VALUES (NULL, "Cave Story+", "https://cdn02.nintendo-europe.com/media/images/10_share_images/games_15/nintendo_switch_download_software_1/H2x1_NSwitchDS_CaveStoryPlus_image1600w.jpg", "???", 81); -- 22 nov 2011
INSERT INTO `games` VALUES (NULL, "Sorcery! Parts 1 & 2", "https://steamcdn-a.akamaihd.net/steam/apps/411000/header.jpg?t=1549288043", "???", 69); -- 2 feb 2016
INSERT INTO `games` VALUES (NULL, "Dwarf Fortress", "https://steamcdn-a.akamaihd.net/steam/apps/975370/header.jpg?t=1572362071", "???", 0); -- 'time is subjective' isn't a valid release date...

-- users
-- salts should be random, using strings here, algorithm is sha1( $pass . $salt ); not secure, but it's an assignment.
INSERT INTO `users` VALUES (NULL, "jwalto", "244cad413fa94db1c686ff5bfc6777241ceaa3ea", "abc123", 1); -- password42
INSERT INTO `bookmarks` VALUES (1, 1);
INSERT INTO `bookmarks` VALUES (1, 2);

INSERT INTO `users` VALUES (NULL, "pwillic", "38bf8a5df0a227b697045c1b29a25a759e391f9b", "java123", 0); -- hanabi
INSERT INTO `bookmarks` VALUES (2, 3);
INSERT INTO `bookmarks` VALUES (2, 4);
INSERT INTO `bookmarks` VALUES (2, 5);

INSERT INTO `users` VALUES (NULL, "rpgs", "ba494cde63bd5d092e916b4083e27cda7c306d43", "html42", 0); -- rpgsftw
INSERT INTO `bookmarks` VALUES (3, 4);
INSERT INTO `bookmarks` VALUES (3, 5);
INSERT INTO `bookmarks` VALUES (3, 6);
INSERT INTO `bookmarks` VALUES (3, 7);
INSERT INTO `bookmarks` VALUES (3, 13);

INSERT INTO `users` VALUES (NULL, "sims", "c65e822545b8596c484112ac62a9194c6043c724", "eadlc", 0); -- simsftw
INSERT INTO `bookmarks` VALUES (4, 8);
INSERT INTO `bookmarks` VALUES (4, 10);
INSERT INTO `bookmarks` VALUES (4, 11);
INSERT INTO `bookmarks` VALUES (4, 12);
