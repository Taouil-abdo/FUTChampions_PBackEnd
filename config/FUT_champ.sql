CREATE DATABASE FUTChampion;
USE FUTChampion;

CREATE TABLE nationalities(
    nationality_id INT PRIMARY KEY AUTO_INCREMENT,
    nationality VARCHAR(50),
    flag_img VARCHAR(50)
);

CREATE TABLE clubs(
    club_id INT PRIMARY KEY AUTO_INCREMENT,
    clubName VARCHAR(50),
    club_img VARCHAR(50)
);
CREATE TABLE players(
    player_id INT PRIMARY KEY AUTO_INCREMENT,
    FullName VARCHAR(50),
    status ENUM('principale','bench'),
    player_img VARCHAR(100),
    position ENUM('GK','LB','RB','LCB','RCB','LM','RM','RCM','LCM','LF','RF'),
    rating INT,
    pace INT DEFAULT NULL,
    shooting INT DEFAULT NULL,
    passing INT DEFAULT NULL,
    dribbling INT DEFAULT NULL,
    defending INT DEFAULT NULL,
    physical INT DEFAULT NULL,
    diving INT DEFAULT NULL,
    handling INT DEFAULT NULL,
    reflexes INT DEFAULT NULL,
    positioning INT DEFAULT NULL,
    nationality_id INT,
    club_id INT,
    FOREIGN KEY (nationality_id)REFERENCES nationalities(nationality_id),
    FOREIGN KEY (club_id)REFERENCES clubs(club_id)
);



-- Insert Nationalities
INSERT INTO nationalities (nationality, flag_img) VALUES
('Argentina', 'argentina_flag.png'),
('Portugal', 'portugal_flag.png'),
('France', 'france_flag.png'),
('Brazil', 'brazil_flag.png'),
('Germany', 'germany_flag.png');

-- Insert Clubs
INSERT INTO clubs (clubName, club_img) VALUES
('Inter Miami', 'inter_miami_logo.png'),
('Paris Saint-Germain', 'psg_logo.png'),
('Real Madrid', 'real_madrid_logo.png'),
('FC Barcelona', 'barcelona_logo.png'),
('Manchester United', 'man_united_logo.png');

-- Insert Players
INSERT INTO players (FullName, status, player_img, position, rating, pace, shooting, passing, dribbling, defending, physical, diving, handling, reflexes, positioning, nationality_id, club_id) VALUES
('Lionel Messi', 'principale', 'messi.png', 'RW', 93, 85, 92, 91, 95, 35, 65, NULL, NULL, NULL, NULL, 1, 1),
('Cristiano Ronaldo', 'principale', 'ronaldo.png', 'ST', 91, 88, 93, 82, 88, 40, 77, NULL, NULL, NULL, NULL, 2, 3),
('Neymar Jr', 'principale', 'neymar.png', 'LW', 91, 91, 85, 90, 94, 37, 64, NULL, NULL, NULL, NULL, 4, 2),
('Kylian Mbappé', 'principale', 'mbappe.png', 'ST', 92, 97, 88, 80, 93, 36, 78, NULL, NULL, NULL, NULL, 3, 2),
('Manuel Neuer', 'principale', 'neuer.png', 'GK', 90, NULL, NULL, NULL, NULL, NULL, NULL, 92, 90, 91, 88, 5, 5);
