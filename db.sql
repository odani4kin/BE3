CREATE TABLE form (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  names varchar(128) NOT NULL DEFAULT '',
  email varchar(128) NOT NULL DEFAULT '',
  dateB DATE,
  gender varchar(20) NOT NULL DEFAULT '',
  limbs int(4) NOT NULL DEFAULT 0,
  biography varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (id)
);

CREATE TABLE superpower (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  superpowers_immor int(1) NOT NULL DEFAULT 0,
  superpowers_magic int(1) NOT NULL DEFAULT 0,
  superpowers_levit int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
);
