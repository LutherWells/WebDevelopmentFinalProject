CREATE TABLE IF NOT EXISTS message (
   id INTEGER  AUTO_INCREMENT,
   text VARCHAR(100) NOT NULL,
   name VARCHAR(30),
   posted DATETIME DEFAULT NULL,
   PRIMARY KEY (id)
);

INSERT IGNORE INTO message VALUES
   (1, 'Can you see my message?', 'Maria', NOW()),
   (2, 'Nice project!', 'Anton', NOW()
);