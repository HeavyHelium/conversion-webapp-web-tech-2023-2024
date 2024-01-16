--- DB web-conv ------
CREATE TABLE users (
    userName VARCHAR(200),
    passwd VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL,
    PRIMARY KEY(userName)
);