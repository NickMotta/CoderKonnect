DROP TABLE IF EXISTS Developer;
DROP TABLE IF EXISTS Project;
DROP TABLE IF EXISTS Languages;
DROP TABLE IF EXISTS Categories;
DROP TABLE IF EXISTS Api;

CREATE TABLE Developer
	(d_id INTEGER UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
	d_firstName VARCHAR(64) NOT NULL,
	d_lastName VARCHAR(64) NOT NULL,
	d_email VARCHAR(64) NOT NULL,
	d_passhash VARCHAR(256) NOT NULL,
	d_profileSetup BOOLEAN NOT NULL DEFAULT false,
	p_id INTEGER,
	d_languages VARCHAR(64),
	d_api VARCHAR(64),
	d_category VARCHAR(64)
	);

CREATE TABLE Project
	(p_id INTEGER UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
	p_creator VARCHAR(64) NOT NULL,
	p_members VARCHAR(64) NOT NULL,
	p_description VARCHAR(200) NOT NULL, /* Use TEXT instead? */
	p_languages VARCHAR(64) NOT NULL,
	p_api VARCHAR(64) NOT NULL,
	p_categories VARCHAR(64) NOT NULL
	);

CREATE TABLE Languages
	(l_id INTEGER UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
	l_name VARCHAR(64) NOT NULL
	);

INSERT INTO Languages SET l_name = 'C';
INSERT INTO Languages SET l_name = 'C++';
INSERT INTO Languages SET l_name = 'C#';
INSERT INTO Languages SET l_name = 'Java';
INSERT INTO Languages SET l_name = 'Python';
INSERT INTO Languages SET l_name = 'Javascript';
INSERT INTO Languages SET l_name = 'Kotlin';
INSERT INTO Languages SET l_name = 'Scala';
INSERT INTO Languages SET l_name = 'Swift';
INSERT INTO Languages SET l_name = 'Objective-C';
INSERT INTO Languages SET l_name = 'PHP';
INSERT INTO Languages SET l_name = 'Ruby';
INSERT INTO Languages SET l_name = 'Go';
INSERT INTO Languages SET l_name = 'Rust';
INSERT INTO Languages SET l_name = 'Haskell';
INSERT INTO Languages SET l_name = 'Ada';
INSERT INTO Languages SET l_name = 'Pascal';
INSERT INTO Languages SET l_name = 'Lua';
INSERT INTO Languages SET l_name = 'Perl';
INSERT INTO Languages SET l_name = 'HTML';
INSERT INTO Languages SET l_name = 'Elixir';
INSERT INTO Languages SET l_name = 'CSS';
	
CREATE TABLE Categories
	(c_id INTEGER UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
	c_name VARCHAR(64) NOT NULL
	);

INSERT INTO Categories SET c_name = 'Web Development';
INSERT INTO Categories SET c_name = 'iOS App Development';
INSERT INTO Categories SET c_name = 'Android App Development';
INSERT INTO Categories SET c_name = 'Data Science';
INSERT INTO Categories SET c_name = 'Robotics';
INSERT INTO Categories SET c_name = 'Computer Vision';
INSERT INTO Categories SET c_name = 'Machine Learning and Artificial Intelligence';
INSERT INTO Categories SET c_name = 'Software Engineering';
INSERT INTO Categories SET c_name = 'Computer/Cyber Security';
INSERT INTO Categories SET c_name = 'Computer Graphics and Visualization';
	
CREATE TABLE Api
	(a_id INTEGER UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
	a_name VARCHAR(64) NOT NULL
	);
