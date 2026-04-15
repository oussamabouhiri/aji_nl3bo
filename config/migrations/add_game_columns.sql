-- Migration script to add missing columns to existing games table
-- Run this if you already have the database set up

-- Add missing columns to games table
ALTER TABLE games ADD COLUMN IF NOT EXISTS image_url VARCHAR(255) AFTER price;
ALTER TABLE games ADD COLUMN IF NOT EXISTS min_players INT DEFAULT 2 AFTER difficulty;
ALTER TABLE games ADD COLUMN IF NOT EXISTS max_players INT DEFAULT 4 AFTER min_players;

-- Add price column to reservations
ALTER TABLE reservations ADD COLUMN IF NOT EXISTS price DECIMAL(10, 2) DEFAULT 0.00 AFTER status;

-- Add in_progress status to reservations
ALTER TABLE reservations MODIFY COLUMN status ENUM('pending', 'confirmed', 'cancelled', 'completed', 'in_progress') DEFAULT 'pending';

-- Update session_games table structure
ALTER TABLE session_games 
ADD COLUMN IF NOT EXISTS price_at_time DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
ADD COLUMN IF NOT EXISTS is_active BOOLEAN DEFAULT FALSE,
ADD COLUMN IF NOT EXISTS returned_at TIMESTAMP NULL,
ADD COLUMN IF NOT EXISTS added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;
