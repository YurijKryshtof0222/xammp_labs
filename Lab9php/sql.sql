CREATE DATABASE IF NOT EXISTS football_teams_db;
USE football_teams_db;

CREATE TABLE IF NOT EXISTS teams (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    manager VARCHAR(150) NOT NULL,
    stadium VARCHAR(200) NOT NULL
);

INSERT INTO teams (name, city, manager, stadium) VALUES
('Динамо', 'Київ', 'Мірча Луческу', 'НСК Олімпійський'),
('Шахтар', 'Донецьк', 'Роберто Де Дзербі', 'Металіст'),
('Дніпро', 'Дніпро', 'Василь Лашкевич', 'Дніпро Арена'),
('Зоря', 'Луганськ', 'Віктор Скрипник', 'Слован'),
('Олімпік', 'Донецьк', 'Василь Романчук', 'Авангард'),
('Карпати', 'Львів', 'Олег Блохін', 'Україна'),
('Чорноморець', 'Одеса', 'Олег Мазур', 'Чорноморець'),
('Металіст', 'Харків', 'Віталій Кварцяний', 'Металіст'),
('Ворскла', 'Полтава', 'Віталій Косовський', 'Ворскла'),
('Кривбас', 'Кривий Ріг', 'Олег Кононенко', 'Кривбас');