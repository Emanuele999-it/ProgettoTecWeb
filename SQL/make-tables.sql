CREATE TABLE categoria (
  cat_id INT AUTO_INCREMENT,
  nome VARCHAR(30) NOT NULL,
  PRIMARY KEY (cat_id)
);
CREATE TABLE utente (
  user_id INT AUTO_INCREMENT,
  nome VARCHAR(30) NOT NULL,
  cognome VARCHAR(30) NOT NULL,
  email VARCHAR(50) NOT NULL,
  img_path VARCHAR(256) NOT NULL,
  passw VARCHAR(256) NOT NULL,
  is_admin BOOLEAN DEFAULT FALSE,
  PRIMARY KEY (user_id),
  UNIQUE (email)
);
CREATE TABLE articolo (
  articolo_id INT AUTO_INCREMENT,
  titolo VARCHAR(65) NOT NULL,
  testo TEXT NOT NULL,
  data_pub DATETIME NOT NULL,
  img_path VARCHAR(256) NOT NULL,
  cat_id INT NOT NULL,
  is_admin BOOLEAN DEFAULT FALSE,
  PRIMARY KEY (articolo_id), 
  FOREIGN KEY (cat_id) REFERENCES categoria (cat_id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE voto (
  user_id INT NOT NULL,
  articolo_id INT NOT NULL,
  PRIMARY KEY (user_id, articolo_id),
  FOREIGN KEY (user_id) REFERENCES utente (user_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (articolo_id) REFERENCES articolo (articolo_id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE commento (
  comment_id INT AUTO_INCREMENT,
  articolo_id INT NOT NULL,
  user_id INT NOT NULL,
  testo VARCHAR(256) NOT NULL,
  data_com DATETIME NOT NULL,
  PRIMARY KEY (comment_id),
  FOREIGN KEY (user_id) REFERENCES utente (user_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (articolo_id) REFERENCES articolo (articolo_id) ON DELETE CASCADE ON UPDATE CASCADE
);
