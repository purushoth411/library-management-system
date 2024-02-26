--host:localhost
--port:3307
--dbname:library_management_system
--username:root


--tables: admin,book,userdata,issuebook,userrequest,requestbook

--table structure for admin

CREATE TABLE `admin` (
  `id` int(200) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL
)

INSERT INTO `admin` (`id`, `email`, `pass`,`type`) VALUES
(1, 'yogesh@gmail.co', '1234','admin');

--create table book

CREATE TABLE `book` (
  `id` int(25) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `bookname` varchar(100) NOT NULL,
  `bookdetail` varchar(100) NOT NULL,
  `bookauthor` varchar(50) NOT NULL,
  `bookpub` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `bookprice` varchar(25) NOT NULL,
  `bookquantity` varchar(25) NOT NULL,
  `bookavail` int(25) NOT NULL,
  `bookrent` int(25) NOT NULL
)

--table structure for issue book

CREATE TABLE `issuebook` (
  `id` int(25) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `userid` int(25) NOT NULL,
  `issuename` varchar(100) NOT NULL,
  `issuebook` varchar(100) NOT NULL,
  `issuetype` varchar(110) NOT NULL,
  `issuedays` int(25) NOT NULL,
  `issuedate` varchar(110) NOT NULL,
  `issuereturn` varchar(110) NOT NULL,
  `fine` int(25) NOT NULL
)

--TABLE STRUCTURE FOR USERDATA

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(110) NOT NULL,
  `email` varchar(110) NOT NULL,
  `pass` varchar(110) NOT NULL,
  `type` varchar(110) NOT NULL
)

--TABLE STRUCTURE FOR REQUESTBOOK

CREATE TABLE `requestbook` (
  `id` int(25) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `userid` int(25) NOT NULL,
  `bookid` int(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `issuedays` varchar(100) NOT NULL
)

--TABLE STRUCTURE FOR USERREQUEST

CREATE TABLE `userrequest` (
  `id` int(25) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `reqname` varchar(100) NOT NULL,
  `reqemail` varchar(100) NOT NULL,
  `reqpassword` varchar(100) NOT NULL,
  `reqtype` varchar(100) NOT NULL
)
