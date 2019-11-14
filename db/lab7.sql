describe 테이블이름; -> 잘 설명

CREATE TABLE student (
	student_id INTEGER  NOT NULL PRIMARY KEY,
	name VARCHAR(20) NOT NULL,
	year TINYINT NOT NULL  DEFAULT 1,
	dept_no INTEGER NOT NULL,
	major VARCHAR(50)
)
CREATE TABLE department (
	dept_no INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT ,  (자동으로 1증가)
	dept_name VARCHAR(40) NOT NULL,
	office VARCHAR(30) NOT NULL,
	office_tel VARCHAR(13),
	UNIQUE(dept_name)          (dept_name 중복값 불가)
)

ALTER TABLE student MODIFY major VARCHAR(30)
ALTER TABLE student ADD gender VARCHAR(10)  (gender란 속성추가)
ALTER TABLE student DROP gender       (gender란 속성삭제)

INSERT INTO student VALUES 
(20070002, 'Jane Smith', 3, 4, 'Business Administration'),
(20060001, 'Ashley Jackson', 4, 4, 'Business Administration'),
(20030001, 'Liam Johnson', 4, 2, 'Electrical Engineering'),
(20040003, 'Jacob Lee', 3, 2, 'Electrical Engineering'),
(20060002, 'Noah Kim', 3, 1, 'Computer Science'),
(20100002, 'Ava Lim', 3, 4, 'Business Administration'), 
(20110001, 'Emma Watson', 2, 1, 'Computer Science'),
(20080003, 'Lisa Maria', 4, 3, 'Law'),
(20040002, 'Jacob William', 4, 5, 'Law'),
(20070001, 'Emily Rose', 4, 4, 'Business Administration'),
(20100001, 'Ethan Hunt', 3, 4, 'Business Administration'),
(20110002, 'Jason Mraz', 2, 1, 'Electrical Engineering'), 
(20030002, 'John Smith', 5, 1, 'Computer Science'),
(20070003, 'Sophia Park', 4, 3, 'Law'), 
(20070007, 'James Michael', 2, 4, 'Business Administration'), 
(20100003, 'James Bond', 3, 1, 'Computer Science'),
(20070005, 'Olivia Madison', 2, 5, 'English Language and Literature'); 

INSERT INTO department (dept_name, office, office_tel) VALUES
('Computer Science', 'Science Building 101', '02-3290-0123'),
('Electrical Engineering', 'Engineering Building 401', '02-3290-2345'), 
('Law', 'Law Building 201', '02-3290-7896'), 
( 'Business Administration', 'Business Building 104', '02-3290-1112'), 
('English Language and Literature', 'Language Building 303', '02-3290-4412');

UPDATE student SET major = 'Electrical and Electronics Engineering' WHERE major = 'Electrical Engineering';
INSERT INTO department (dept_name, office, office_tel) VALUES('Special Education','Education Building 403','02-3290-2347');
UPDATE student SET major = 'Special Education' WHERE name = 'Emma Watson';
DELETE FROM student WHERE name = 'Jason Mraz';
DELETE FROM student WHERE name = 'John Smith';
SELECT * FROM student WHERE major = 'Computer Science';
SELECT student_id,year,major FROM student;
SELECT * FROM student WHERE year=3;
SELECT * FROM student WHERE year=1 or year=2;
SELECT student_id,name,year,major,student.dept_no FROM student JOIN department ON student.dept_no=department.dept_no WHERE student.dept_no=4;
SELECT * FROM student WHERE student_id LIKE '%2007%';    (%~%   %안 문자열 포함된거 출력)
SELECT * FROM student ORDER BY student_id ASC;     (ASC / DESC)
SELECT major, avg(year) FROM student GROUP BY major;
SELECT * FROM student WHERE student_id LIKE '%2007%' AND major='Business Administration' LIMIT 2;