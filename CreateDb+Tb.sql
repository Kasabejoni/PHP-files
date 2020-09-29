CREATE DATABASE Jtest1;


CREATE TABLE `Jtest1`.`users` (`id` INT NOT NULL AUTO_INCREMENT,
                                                 `name` VARCHAR(50) NOT NULL,
                                                                    `email` VARCHAR(50) NOT NULL,
                                                                                        `updated_at` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                                                                                                           `created_at` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                                                                                                                                              PRIMARY KEY (`id`)) ENGINE = InnoDB;


CREATE TABLE `Jtest1`.`posts` (`id` INT NOT NULL AUTO_INCREMENT,
                                                 `user_id` INT NOT NULL,
                                                               `title` VARCHAR(50) NOT NULL,
                                                                                   `body` VARCHAR(255) NOT NULL,
                                                                                                       `updated_at` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                                                                                                                          `created_at` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                                                                                                                                                             PRIMARY KEY (`id`), CONSTRAINT FK_user_id
                               FOREIGN KEY (user_id) REFERENCES users(id)) ENGINE = InnoDB;