--- DB web-conv ------
CREATE TABLE users (
    userName VARCHAR(200),
    name VARCHAR(200),
    passwd VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL,
    PRIMARY KEY(userName)
);

----------------------------------------------------------

CREATE TABLE ProfileHistory (
  username varchar(200) NOT NULL,
  inputField int(11) DEFAULT NULL,
  configField int(11) DEFAULT NULL,
  outputField int(11) DEFAULT NULL,
  version datetime NOT NULL,
  PRIMARY KEY(username, version),
  FOREIGN KEY (username) REFERENCES users(username)
);