DROP DATABASE IF EXISTS photo_gallery;
CREATE DATABASE photo_gallery;
USE photo_gallery;

CREATE TABLE photo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT,
    timestamp DATETIME,
    latitude DOUBLE,
    longitude DOUBLE,
    file_path VARCHAR(4096)
);

CREATE TABLE tag (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE
);

CREATE TABLE photo_tag (
    photo_id INT,
    tag_id INT,
    PRIMARY KEY (photo_id, tag_id),
    FOREIGN KEY (photo_id) REFERENCES photo(id),
    FOREIGN KEY (tag_id) REFERENCES tag(id)
);

CREATE TABLE album (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE,
    description TEXT
);

CREATE TABLE album_photo (
    album_id INT,
    photo_id INT,
    PRIMARY KEY (album_id, photo_id),
    FOREIGN KEY (album_id) REFERENCES album(id),
    FOREIGN KEY (photo_id) REFERENCES photo(id)
);
