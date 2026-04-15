-- Seed data for Aji L3bo Board Game Cafe
-- Run this after database.sql

-- Insert categories
INSERT INTO categories (name, description) VALUES
('Strategy', 'Games that require careful planning and tactical thinking'),
('Party', 'Fun games perfect for gatherings and social play'),
('Family', 'Accessible games suitable for all ages'),
('Cooperative', 'Games where players work together as a team'),
('Abstract', 'Pure strategy games with minimal luck elements'),
('Thematic', 'Immersive games with rich storytelling and theme');

-- Insert game_tables
INSERT INTO game_tables (capacity, reference) VALUES
(2, 'Table 1'),
(2, 'Table 2'),
(4, 'Table 3'),
(4, 'Table 4'),
(6, 'Table 5'),
(6, 'Table 6'),
(8, 'Table 7'),
(8, 'Table 8');

-- Insert users (password: 'password')
INSERT INTO users (name, email, password, phone, role) VALUES
('Admin', 'admin@ajil3bo.ma', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0612345678', 'admin'),
('Yassir', 'yassir@ajil3bo.ma', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0661234567', 'user'),
('Fatima', 'fatima@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0672345678', 'user'),
('Omar', 'omar@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0683456789', 'user');

-- Sample reservations for today (some time-up for testing game change)
INSERT INTO reservations (user_id, table_id, game_id, date, start_time, end_time, spots, status, price) VALUES
(2, 3, 1, CURDATE(), '08:00:00', '10:00:00', 4, 'confirmed', 80.00),  -- Time's up, ready to start
(3, 4, 5, CURDATE(), CURTIME(), DATE_ADD(CURTIME(), INTERVAL 2 HOUR), 4, 'pending', 150.00),  -- Current time reservation
(4, 5, NULL, CURDATE(), CURTIME(), DATE_ADD(CURTIME(), INTERVAL 2 HOUR), 6, 'pending', 0.00),  -- No game selected yet
(2, 3, 11, CURDATE(), CURTIME(), DATE_ADD(CURTIME(), INTERVAL 2 HOUR), 4, 'pending', 50.00),  -- Game already selected
(4, 6, NULL, CURDATE(), '14:00:00', '16:00:00', 6, 'pending', 0.00);  -- Future reservation, no game

-- Insert games (password for all users is: 'password')
INSERT INTO games (name, description, difficulty, min_players, max_players, spots, duration, price, category_id, image_url, status) VALUES
-- Strategy Games
('Catan', 'Build settlements, roads, and trade resources to become the dominant force on the island.', 'medium', 3, 4, 4, 90, 80.00, 1, 'https://picsum.photos/seed/catan/400/300', 'available'),
('Catan: 5-6 Player', 'Expanded version of Catan for larger groups. Build settlements, roads, and trade resources.', 'medium', 5, 6, 6, 120, 120.00, 1, 'https://picsum.photos/seed/catan5/400/300', 'available'),
('Ticket to Ride', 'Build train routes across the country and complete destination tickets to win.', 'easy', 2, 5, 5, 60, 70.00, 1, 'https://picsum.photos/seed/ttr/400/300', 'available'),
('Azul', 'Draft colorful tiles and arrange them on your board to create the most beautiful pattern.', 'easy', 2, 4, 4, 45, 60.00, 1, 'https://picsum.photos/seed/azul/400/300', 'available'),
('Scythe', 'Lead your faction in an alternate-history 1920s Europa with mechs and resources.', 'hard', 1, 5, 5, 115, 150.00, 1, 'https://picsum.photos/seed/scythe/400/300', 'available'),
('Terraforming Mars', 'Compete with rival corporations to make Mars habitable and build your corporate empire.', 'hard', 1, 5, 5, 120, 140.00, 1, 'https://picsum.photos/seed/terraform/400/300', 'available'),
('Wingspan', 'Attract birds to your wildlife reserves and complete objectives to score the most points.', 'medium', 1, 5, 5, 70, 90.00, 1, 'https://picsum.photos/seed/wingspan/400/300', 'available'),
('Agricola', 'Build and manage your farm, plant crops, raise animals, and feed your family.', 'hard', 1, 4, 4, 150, 130.00, 1, 'https://picsum.photos/seed/agricola/400/300', 'available'),
('Power Grid', 'Buy power plants, mine resources, and supply electricity to growing cities.', 'hard', 2, 6, 6, 120, 100.00, 1, 'https://picsum.photos/seed/powergrid/400/300', 'available'),
('7 Wonders', 'Draft cards and build your civilization across three ages to achieve victory.', 'medium', 3, 7, 7, 45, 85.00, 1, 'https://picsum.photos/seed/7wonders/400/300', 'available'),

-- Party Games
('Codenames', 'Two teams compete to identify secret agents based on one-word clues.', 'easy', 4, 8, 8, 30, 50.00, 2, 'https://picsum.photos/seed/codenames/400/300', 'available'),
('Dixit', 'Use beautiful illustrated cards to tell stories and guess what others are thinking.', 'easy', 3, 6, 6, 45, 75.00, 2, 'https://picsum.photos/seed/dixit/400/300', 'available'),
('Telestrations', 'Draw, guess, and laugh as your sketches transform through multiple players.', 'easy', 4, 8, 8, 30, 45.00, 2, 'https://picsum.photos/seed/telestrations/400/300', 'available'),
('Cards Against Humanity', 'The party game for horrible people. Fill in the blank with the worst answers.', 'easy', 4, 10, 10, 45, 40.00, 2, 'https://picsum.photos/seed/cah/400/300', 'available'),
('Spyfall', 'One player is the spy trying to guess the location while others try to identify them.', 'medium', 4, 8, 8, 30, 35.00, 2, 'https://picsum.photos/seed/spyfall/400/300', 'available'),
('Wavelength', 'Guess where the psychic hid their target on a spectrum between two opposing concepts.', 'easy', 2, 12, 12, 30, 55.00, 2, 'https://picsum.photos/seed/wavelength/400/300', 'available'),
('Mafia', 'Classic social deduction game where villagers try to find the mafia among them.', 'easy', 6, 20, 20, 45, 20.00, 2, 'https://picsum.photos/seed/mafia/400/300', 'available'),
('The Resistance', 'Spies infiltrate the resistance while operatives try to complete missions.', 'medium', 5, 10, 10, 30, 45.00, 2, 'https://picsum.photos/seed/resistance/400/300', 'available'),

-- Family Games
('Carcassonne', 'Place tiles and claim features to build the medieval landscape of France.', 'easy', 2, 5, 5, 45, 55.00, 3, 'https://picsum.photos/seed/carcassonne/400/300', 'available'),
('Splendor', 'Collect gems, acquire development cards, and attract nobles to accumulate prestige.', 'easy', 2, 4, 4, 30, 65.00, 3, 'https://picsum.photos/seed/splendor/400/300', 'available'),
('King of Tokyo', 'Roll dice to attack Tokyo, gain energy, and evolve into a more powerful monster.', 'easy', 2, 6, 6, 30, 70.00, 3, 'https://picsum.photos/seed/kot/400/300', 'available'),
('Pandemic', 'Your team of experts must prevent the world from four deadly diseases.', 'medium', 2, 4, 4, 60, 85.00, 3, 'https://picsum.photos/seed/pandemic/400/300', 'available'),
('Takenoko', 'Care for the panda, cultivate your garden, and fulfill the Emperor''s wishes.', 'easy', 2, 4, 4, 45, 70.00, 3, 'https://picsum.photos/seed/takenoko/400/300', 'available'),
('Blokus', 'Place your pieces on the board so they touch only at corners of the same color.', 'easy', 2, 4, 4, 30, 50.00, 3, 'https://picsum.photos/seed/blokus/400/300', 'available'),
('Dobble', 'Race to find the matching symbol between two cards in this fast-paced matching game.', 'easy', 2, 8, 8, 15, 35.00, 3, 'https://picsum.photos/seed/dobble/400/300', 'available'),
('UNO', 'Match colors and numbers, and don''t forget to shout UNO when you have two cards left!', 'easy', 2, 10, 10, 30, 25.00, 3, 'https://picsum.photos/seed/uno/400/300', 'available'),

-- Cooperative Games
('Gloomhaven', 'Lead your team of mercenaries through a persistent world of dungeons and decisions.', 'hard', 1, 4, 4, 120, 250.00, 4, 'https://picsum.photos/seed/gloomhaven/400/300', 'available'),
('Spirit Island', 'Defend your island from colonizing invaders using your unique spirit powers.', 'hard', 1, 4, 4, 120, 180.00, 4, 'https://picsum.photos/seed/spiritisland/400/300', 'available'),
('Forbidden Desert', 'Navigate the shifting sands, uncover the buried star machine, and escape the desert.', 'medium', 2, 4, 4, 45, 55.00, 4, 'https://picsum.photos/seed/forbiddendesert/400/300', 'available'),
('Pandemic: Legacy', 'Your choices permanently alter the world as you fight to save humanity.', 'hard', 2, 4, 4, 60, 120.00, 4, 'https://picsum.photos/seed/pandemiclegacy/400/300', 'available'),
('Arkham Horror LCG', 'Investigate the horrors of Arkham while solving mysteries and fighting monsters.', 'hard', 1, 2, 2, 120, 150.00, 4, 'https://picsum.photos/seed/arkham/400/300', 'available'),

-- Abstract Games
('Chess', 'The classic game of strategy. Outthink your opponent and trap their king.', 'hard', 2, 2, 2, 60, 0.00, 5, 'https://picsum.photos/seed/chess/400/300', 'available'),
('Go', 'Surround territory and capture stones in this ancient Asian strategy game.', 'hard', 2, 2, 2, 90, 0.00, 5, 'https://picsum.photos/seed/go/400/300', 'available'),
('Checkers', 'Simple rules but deep strategy. Jump your opponent''s pieces to win.', 'easy', 2, 2, 2, 30, 0.00, 5, 'https://picsum.photos/seed/checkers/400/300', 'available'),
('Hive', 'Capture the enemy queen by surrounding her with your bugs in this bug-themed battle.', 'medium', 2, 2, 2, 30, 60.00, 5, 'https://picsum.photos/seed/hive/400/300', 'available'),
('Patchwork', 'Patch together a quilt using tetris-like pieces while managing time and buttons.', 'medium', 2, 2, 2, 30, 55.00, 5, 'https://picsum.photos/seed/patchwork/400/300', 'available'),
('Onitama', 'A martial arts duel played with cards. Capture the enemy master to win.', 'medium', 2, 2, 2, 20, 50.00, 5, 'https://picsum.photos/seed/onitama/400/300', 'available'),

-- Thematic Games
('Gloomhaven: Jaws of the Lion', 'A standalone prequel to Gloomhaven with simplified rules and lower price.', 'medium', 1, 4, 4, 60, 120.00, 6, 'https://picsum.photos/seed/jaws/400/300', 'available'),
('Viticulture', 'Build a thriving vineyard in Tuscany, plant vines, harvest grapes, and make wine.', 'medium', 1, 6, 6, 90, 110.00, 6, 'https://picsum.photos/seed/viticulture/400/300', 'available'),
('Everdell', 'Build a city of critters and constructions in this charming forest-building game.', 'medium', 1, 4, 4, 80, 100.00, 6, 'https://picsum.photos/seed/everdell/400/300', 'available'),
('Root', 'Multiple factions with unique powers compete for control of the forest.', 'hard', 2, 4, 4, 90, 130.00, 6, 'https://picsum.photos/seed/root/400/300', 'available'),
('Tapestry', 'Build the most glorious civilization through the ages with unique tapestry tracks.', 'medium', 1, 5, 5, 90, 120.00, 6, 'https://picsum.photos/seed/tapestry/400/300', 'available'),
('Nemesis', 'Survive the spaceship nightmare where one of you might be the alien.', 'hard', 1, 5, 5, 180, 200.00, 6, 'https://picsum.photos/seed/nemesis/400/300', 'available'),
('Sleeping Gods', 'Explore a mysterious island chain in this story-driven cooperative adventure.', 'medium', 1, 4, 4, 90, 140.00, 6, 'https://picsum.photos/seed/sleepinggods/400/300', 'available'),
('Aeons End', 'Battle monsters using unique powers and custom cards in this cooperative deckbuilder.', 'hard', 2, 4, 4, 60, 100.00, 6, 'https://picsum.photos/seed/aeonsend/400/300', 'available'),
('Clank!', 'Grab treasure, avoid the dragon, and escape the dungeon with your life and loot.', 'medium', 2, 4, 4, 60, 80.00, 6, 'https://picsum.photos/seed/clank/400/300', 'available'),
('Lord of the Rings: Journeys', 'Explore Middle-earth through this narrative-driven adventure game.', 'medium', 2, 4, 4, 60, 90.00, 6, 'https://picsum.photos/seed/lotr/400/300', 'available');
