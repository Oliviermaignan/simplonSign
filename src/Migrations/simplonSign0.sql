CREATE TABLE B6_promo(
   id INT AUTO_INCREMENT,
   name VARCHAR(50) ,
   PRIMARY KEY(id)
);
ALTER TABLE B6_promo ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE B6_authentication(
   id INT AUTO_INCREMENT,
   status VARCHAR(50) ,
   PRIMARY KEY(id)
);
ALTER TABLE B6_authentication ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE B6_classes(
   id INT AUTO_INCREMENT,
   name VARCHAR(255) ,
   startTime DATETIME,
   endTime DATETIME,
   promo_id INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(promo_id) REFERENCES B6_promo(id)
);
ALTER TABLE B6_classes ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE B6_role(
   id VARCHAR(50) ,
   type VARCHAR(255) ,
   PRIMARY KEY(id)
);
ALTER TABLE B6_role ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE B6_users(
   id INT AUTO_INCREMENT,
   name VARCHAR(255)  NOT NULL,
   last_name VARCHAR(255) ,
   email VARCHAR(255)  NOT NULL,
   activated BOOLEAN,
   password VARCHAR(255) ,
   role_id VARCHAR(50)  NOT NULL,
   promo_id INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(role_id) REFERENCES B6_role(id),
   FOREIGN KEY(promo_id) REFERENCES B6_promo(id)
);
ALTER TABLE B6_users ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE B6_relation_users_promo(
   users_id INT,
   promo_id INT,
   PRIMARY KEY(users_id, promo_id),
   FOREIGN KEY(users_id) REFERENCES B6_users(id),
   FOREIGN KEY(promo_id) REFERENCES B6_promo(id)
);
ALTER TABLE B6_relation_users_promo ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE B6_relation_users_classes(
   user_id INT,
   authentication_id INT,
   classes_id INT,
   dateTime DATETIME,
   status VARCHAR(100) ,
   PRIMARY KEY(user_id, authentication_id, classes_id),
   FOREIGN KEY(user_id) REFERENCES B6_users(id),
   FOREIGN KEY(authentication_id) REFERENCES B6_authentication(id),
   FOREIGN KEY(classes_id) REFERENCES B6_classes(id)
);
ALTER TABLE B6_relation_users_classes ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;