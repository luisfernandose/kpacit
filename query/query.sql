ALTER TABLE `users` ADD `device` VARCHAR(1000) NULL AFTER `gitlab_id`;
ALTER TABLE `users` ADD `android` VARCHAR(1000) NULL AFTER `device`, ADD `ios` VARCHAR(1000) NULL AFTER `android`;
ALTER TABLE `users` ADD `phone_verified` ENUM('0','1') NOT NULL DEFAULT '0' AFTER `ios`;
ALTER TABLE `users` ADD `phone_otp` VARCHAR(100) NULL AFTER `phone_verified`;
ALTER TABLE `settings` ADD `live_url` TEXT NULL AFTER `zoom_enable`;



ALTER TABLE `settings` ADD `sms_enable` INT NOT NULL DEFAULT '0' AFTER `live_url`, ADD `sms_key` TEXT NULL AFTER `sms_enable`;