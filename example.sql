CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `level` int NOT NULL DEFAULT '1',
  `forget` varchar(255) DEFAULT NULL,
  `genre` varchar(10) DEFAULT NULL,
  `datebirth` date DEFAULT NULL,
  `document` varchar(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'registered' COMMENT 'registered, confirmed',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  FULLTEXT KEY `full_text` (`first_name`,`last_name`,`email`)
) ENGINE=InnoDB;

-- password: 12345678
INSERT INTO users (first_name, last_name, email, password)
values("John","Doe","johndoe@test.com","$2y$10$7aQNdKPaeaX0wwxShqfDN.Jwc4SzPPQGOk7fZdLgV/WmGvVx6oFwm");

CREATE TABLE `mail_queue` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `from_email` varchar(255) NOT NULL DEFAULT '',
  `from_name` varchar(255) NOT NULL DEFAULT '',
  `recipient_email` varchar(255) NOT NULL DEFAULT '',
  `recipient_name` varchar(255) NOT NULL DEFAULT '',
  `sent_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

insert into mail_queue(subject, body, from_email, from_name, recipient_email, recipient_name)
values("assunto qualquer", "<p>corpo do email</p>","johndoe@test.com","John Doe","test@test.com","test");
