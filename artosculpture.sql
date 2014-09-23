-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsql-ipg10.eigbox.net
-- Generation Time: Sep 19, 2014 at 02:15 PM
-- Server version: 5.5.32
-- PHP Version: 4.4.9
-- 
-- Database: `artosculpture`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fresh_password` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` VALUES (1, 'artosculpture1', 'rachita1222', '163d8b1bb885730039794952b6409f2f');

-- --------------------------------------------------------

-- 
-- Table structure for table `album_cat`
-- 

CREATE TABLE `album_cat` (
  `category_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` text NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `album_cat`
-- 

INSERT INTO `album_cat` VALUES (1, 'Architecture', 'Y');
INSERT INTO `album_cat` VALUES (2, 'Decorative', 'Y');
INSERT INTO `album_cat` VALUES (3, 'Sculpture', 'Y');
INSERT INTO `album_cat` VALUES (4, 'Workshop', 'Y');

-- --------------------------------------------------------

-- 
-- Table structure for table `banner`
-- 

CREATE TABLE `banner` (
  `banner_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `banner_thumb` varchar(255) NOT NULL,
  `banner_img` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `banner`
-- 

INSERT INTO `banner` VALUES (1, 3, 'Banner 1', 'photo/th1_1379398275gallery-img1.png', 'photo/1379398275gallery-img1.png', 'Y');
INSERT INTO `banner` VALUES (2, 4, 'Banner 2', 'photo/th1_1378914731gallery-img2.png', 'photo/1378914731gallery-img2.png', 'Y');
INSERT INTO `banner` VALUES (3, 1, 'Banner 3', 'photo/th1_1378914872gallery-img3.png', 'photo/1378914872gallery-img3.png', 'Y');

-- --------------------------------------------------------

-- 
-- Table structure for table `client_logo`
-- 

CREATE TABLE `client_logo` (
  `logo_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) NOT NULL,
  `link_page` text NOT NULL,
  `logo_thumb` varchar(255) NOT NULL,
  `logo_big` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`logo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `client_logo`
-- 

INSERT INTO `client_logo` VALUES (1, 'Rose Valley', 'http://www.rosevalleyresorts.com/resort-mandarmoni.html', 'photo/th1_1379053330rose_vally.png', 'photo/1379053330rose_vally.png', 'Y');
INSERT INTO `client_logo` VALUES (2, 'Nicco Park', 'http://www.niccoparks.com/', 'photo/th1_1379053349niccopark.png', 'photo/1379053349niccopark.png', 'N');
INSERT INTO `client_logo` VALUES (3, 'Ramoji', '', 'photo/th1_1379053356ramoji.png', 'photo/1379053356ramoji.png', 'N');
INSERT INTO `client_logo` VALUES (4, 'Rose Vally', '', 'photo/th1_1379053363rose_vally.png', 'photo/1379053363rose_vally.png', 'N');
INSERT INTO `client_logo` VALUES (5, 'Nicco Park', 'http://www.niccoparks.com/', 'photo/th1_1379053377niccopark.png', 'photo/1379053377niccopark.png', 'Y');
INSERT INTO `client_logo` VALUES (6, 'Ramoji', '', 'photo/th1_1379053368ramoji.png', 'photo/1379053368ramoji.png', 'N');

-- --------------------------------------------------------

-- 
-- Table structure for table `cms`
-- 

CREATE TABLE `cms` (
  `page_id` int(10) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) NOT NULL,
  `page_desc` text NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `cms`
-- 

INSERT INTO `cms` VALUES (1, 'About Us', '<p><img style="float: left;" src="../images/about.png" alt="about" /></p>\r\n<p><br />We are one of the most organized sectors in Eastern India manufacturing high quality F.R.P products which are technically superior and aesthetically beautiful since 2005.Basically, we are manufacturing various types of architectural structures, sculpture, animal &amp; human figures, Interior-Exterior decoration at our workshop, spread over 5 acres of land with a large waterbody within it. We have a workforce of approximately 40 specialized technicians headed by a highly experienced and qualified visual artist. Our workshop is situated by the main road; thus making it convenient for transportation.</p>');
INSERT INTO `cms` VALUES (2, 'Technology', '<p>We are using Epoxy coating on the F.R.P product, OD based colour, Acrylic Emulsion of renowned manufacturer like Asian Paints, Berger Paints so that the products will be highly durable with long lasting colours. The colour of the product(s) may be as per client&rsquo;s choice but subject to type of product(s).We work with Fibre, Bronze and Mixed media. For further details kindly contact.</p>');
INSERT INTO `cms` VALUES (3, 'Contact Us', '<h3 class="projects_heading">Office Address</h3>\r\n<p>Duttapukur, Srijani Pally, North 24 Parganas,<br />Pin Code: 743248&nbsp;</p>\r\n<h3 class="projects_heading">Email</h3>\r\n<p>info@artosculpture.com<br /> rupam.aman@gmail.com</p>\r\n<p>&nbsp;</p>\r\n<h3 class="projects_heading">Phone</h3>\r\n<p>+91 - 09830584599<br /><br /></p>\r\n<h3 class="projects_heading">Fax</h3>\r\n<div>033 - 2826 3058</div>\r\n<p>&nbsp;</p>');

-- --------------------------------------------------------

-- 
-- Table structure for table `gallery_images`
-- 

CREATE TABLE `gallery_images` (
  `photo_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `photo_thumb` varchar(255) NOT NULL,
  `photo_big` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

-- 
-- Dumping data for table `gallery_images`
-- 

INSERT INTO `gallery_images` VALUES (38, 1, 'aos_arch3', 'photo/th1_1379872499Untitled-9.jpg', 'photo/1379872499Untitled-9.jpg', 'Y');
INSERT INTO `gallery_images` VALUES (39, 1, 'aos_arch4', 'photo/th1_1379873102Untitled-10.jpg', 'photo/1379873102Untitled-10.jpg', 'Y');
INSERT INTO `gallery_images` VALUES (40, 1, 'aos_arch5', 'photo/th1_1379873792Untitled-11.jpg', 'photo/1379873792Untitled-11.jpg', 'Y');
INSERT INTO `gallery_images` VALUES (37, 1, 'aos_arch2', 'photo/th1_1379871924Untitled-8.jpg', 'photo/1379871924Untitled-8.jpg', 'Y');
INSERT INTO `gallery_images` VALUES (8, 1, 'aos_arch1', 'photo/th1_1379837907Untitled-7.jpg', 'photo/1379837907Untitled-7.jpg', 'Y');
INSERT INTO `gallery_images` VALUES (9, 2, 'Photo 1', 'photo/th1_13790498291.png', 'photo/13790498291.png', 'Y');
INSERT INTO `gallery_images` VALUES (11, 2, 'Photo 3', 'photo/th1_13790498593.png', 'photo/13790498593.png', 'Y');
INSERT INTO `gallery_images` VALUES (12, 2, 'Photo 4', 'photo/th1_13790499034.png', 'photo/13790499034.png', 'Y');
INSERT INTO `gallery_images` VALUES (31, 3, 'aos_sclp2', 'photo/th1_1379701923Untitled-2.jpg', 'photo/1379701923Untitled-2.jpg', 'Y');
INSERT INTO `gallery_images` VALUES (14, 2, 'Photo 6', 'photo/th1_13790499286.png', 'photo/13790499286.png', 'Y');
INSERT INTO `gallery_images` VALUES (15, 2, 'Photo 7', 'photo/th1_13790499397.png', 'photo/13790499397.png', 'Y');
INSERT INTO `gallery_images` VALUES (34, 3, 'aos_sclp5', 'photo/th1_1379770351Untitled-5.jpg', 'photo/1379770351Untitled-5.jpg', 'Y');
INSERT INTO `gallery_images` VALUES (33, 3, 'aos_sclp4', 'photo/th1_1379768688Untitled-4.jpg', 'photo/1379768688Untitled-4.jpg', 'Y');
INSERT INTO `gallery_images` VALUES (30, 3, 'aos_sclp1', 'photo/th1_1379700988Untitled-1.jpg', 'photo/1379700988Untitled-1.jpg', 'Y');
INSERT INTO `gallery_images` VALUES (20, 4, 'Photo 1', 'photo/th1_13790500351.png', 'photo/13790500351.png', 'Y');
INSERT INTO `gallery_images` VALUES (21, 4, 'Photo 2', 'photo/th1_13790500442.png', 'photo/13790500442.png', 'Y');
INSERT INTO `gallery_images` VALUES (22, 4, 'Photo 3', 'photo/th1_13790500513.png', 'photo/13790500513.png', 'Y');
INSERT INTO `gallery_images` VALUES (23, 4, 'Photo 4', 'photo/th1_13790500624.png', 'photo/13790500624.png', 'Y');
INSERT INTO `gallery_images` VALUES (24, 4, 'Photo 5', 'photo/th1_13790500755.png', 'photo/13790500755.png', 'Y');
INSERT INTO `gallery_images` VALUES (25, 4, 'Photo 6', 'photo/th1_13790500856.png', 'photo/13790500856.png', 'Y');
INSERT INTO `gallery_images` VALUES (26, 4, 'Photo 7', 'photo/th1_13790501007.png', 'photo/13790501007.png', 'Y');
INSERT INTO `gallery_images` VALUES (27, 4, 'Photo 8', 'photo/th1_13790501118.png', 'photo/13790501118.png', 'Y');
INSERT INTO `gallery_images` VALUES (28, 4, 'Photo 9', 'photo/th1_13790501249.png', 'photo/13790501249.png', 'Y');
INSERT INTO `gallery_images` VALUES (29, 5, '', 'photo/th1_13792281181.png', 'photo/13792281181.png', 'Y');
INSERT INTO `gallery_images` VALUES (32, 3, 'aos_sclp3', 'photo/th1_1379768237Untitled-3.jpg', 'photo/1379768237Untitled-3.jpg', 'Y');
INSERT INTO `gallery_images` VALUES (36, 3, 'aos_sclp6', 'photo/th1_1379771210Untitled-6.jpg', 'photo/1379771210Untitled-6.jpg', 'Y');

-- --------------------------------------------------------

-- 
-- Table structure for table `projects`
-- 

CREATE TABLE `projects` (
  `project_id` int(10) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `project_desc` text NOT NULL,
  `project_thumb` varchar(255) NOT NULL,
  `project_big` varchar(255) NOT NULL,
  `project_status` enum('O','C') NOT NULL DEFAULT 'O',
  PRIMARY KEY (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `projects`
-- 

INSERT INTO `projects` VALUES (1, 'Projects Heading 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lobortis pharetra justo sed semper. Praesent eu purus ipsum. Sed lacinia placerat congue. Phasellus velit massa, egestas blandit tristique in, imperdiet in libero. Ut porttitor nibh nisl, dictum egestas lacus fermentum ut. Duis nibh orci, sodales blandit neque et, pellentesque volutpat eros. Curabitur mattis pellentesque dui, quis consectetur urna ultricies vitae. Morbi scelerisque magna ante, id lobortis nisl condimentum non. Ut vestibulum convallis magna, non mollis elit vulputate a. Nam suscipit neque vel nunc cursus elementum. Aliquam sed gravida neque. Curabitur at sapien sit amet magna volutpat malesuada vitae at quam. Cras tincidunt lobortis semper. Sed faucibus ante vitae elementum malesuada.</p>', 'photo/th1_1379051705project1.png', 'photo/1379051705project1.png', 'C');
INSERT INTO `projects` VALUES (2, 'Projects Heading 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lobortis pharetra justo sed semper. Praesent eu purus ipsum. Sed lacinia placerat congue. Phasellus velit massa, egestas blandit tristique in, imperdiet in libero. Ut porttitor nibh nisl, dictum egestas lacus fermentum ut. Duis nibh orci, sodales blandit neque et, pellentesque volutpat eros. Curabitur mattis pellentesque dui, quis consectetur urna ultricies vitae. Morbi scelerisque magna ante, id lobortis nisl condimentum non. Ut vestibulum convallis magna, non mollis elit vulputate a. Nam suscipit neque vel nunc cursus elementum. Aliquam sed gravida neque. Curabitur at sapien sit amet magna volutpat malesuada vitae at quam. Cras tincidunt lobortis semper. Sed faucibus ante vitae elementum malesuada.</p>', 'photo/th1_1379051375project2.png', 'photo/1379051375project2.png', 'C');
INSERT INTO `projects` VALUES (3, 'Projects Heading 3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lobortis pharetra justo sed semper. Praesent eu purus ipsum. Sed lacinia placerat congue. Phasellus velit massa, egestas blandit tristique in, imperdiet in libero. Ut porttitor nibh nisl, dictum egestas lacus fermentum ut. Duis nibh orci, sodales blandit neque et, pellentesque volutpat eros. Curabitur mattis pellentesque dui, quis consectetur urna ultricies vitae. Morbi scelerisque magna ante, id lobortis nisl condimentum non. Ut vestibulum convallis magna, non mollis elit vulputate a. Nam suscipit neque vel nunc cursus elementum. Aliquam sed gravida neque. Curabitur at sapien sit amet magna volutpat malesuada vitae at quam. Cras tincidunt lobortis semper. Sed faucibus ante vitae elementum malesuada.</p>', 'photo/th1_1379051727project3.png', 'photo/1379051727project3.png', 'C');
INSERT INTO `projects` VALUES (4, 'Projects Heading 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lobortis pharetra justo sed semper. Praesent eu purus ipsum. Sed lacinia placerat congue. Phasellus velit massa, egestas blandit tristique in, imperdiet in libero. Ut porttitor nibh nisl, dictum egestas lacus fermentum ut. Duis nibh orci, sodales blandit neque et, pellentesque volutpat eros. Curabitur mattis pellentesque dui, quis consectetur urna ultricies vitae. Morbi scelerisque magna ante, id lobortis nisl condimentum non. Ut vestibulum convallis magna, non mollis elit vulputate a. Nam suscipit neque vel nunc cursus elementum. Aliquam sed gravida neque. Curabitur at sapien sit amet magna volutpat malesuada vitae at quam. Cras tincidunt lobortis semper. Sed faucibus ante vitae elementum malesuada.</p>', 'photo/th1_1379051770project2.png', 'photo/1379051770project2.png', 'O');
INSERT INTO `projects` VALUES (5, 'Projects Heading 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lobortis pharetra justo sed semper. Praesent eu purus ipsum. Sed lacinia placerat congue. Phasellus velit massa, egestas blandit tristique in, imperdiet in libero. Ut porttitor nibh nisl, dictum egestas lacus fermentum ut. Duis nibh orci, sodales blandit neque et, pellentesque volutpat eros. Curabitur mattis pellentesque dui, quis consectetur urna ultricies vitae. Morbi scelerisque magna ante, id lobortis nisl condimentum non. Ut vestibulum convallis magna, non mollis elit vulputate a. Nam suscipit neque vel nunc cursus elementum. Aliquam sed gravida neque. Curabitur at sapien sit amet magna volutpat malesuada vitae at quam. Cras tincidunt lobortis semper. Sed faucibus ante vitae elementum malesuada.</p>', 'photo/th1_1379051783project3.png', 'photo/1379051783project3.png', 'O');
INSERT INTO `projects` VALUES (6, 'Projects Heading 3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lobortis pharetra justo sed semper. Praesent eu purus ipsum. Sed lacinia placerat congue. Phasellus velit massa, egestas blandit tristique in, imperdiet in libero. Ut porttitor nibh nisl, dictum egestas lacus fermentum ut. Duis nibh orci, sodales blandit neque et, pellentesque volutpat eros. Curabitur mattis pellentesque dui, quis consectetur urna ultricies vitae. Morbi scelerisque magna ante, id lobortis nisl condimentum non. Ut vestibulum convallis magna, non mollis elit vulputate a. Nam suscipit neque vel nunc cursus elementum. Aliquam sed gravida neque. Curabitur at sapien sit amet magna volutpat malesuada vitae at quam. Cras tincidunt lobortis semper. Sed faucibus ante vitae elementum malesuada.</p>', 'photo/th1_1379051795project1.png', 'photo/1379051795project1.png', 'O');

-- --------------------------------------------------------

-- 
-- Table structure for table `testimonials`
-- 

CREATE TABLE `testimonials` (
  `testimonial_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) NOT NULL,
  `client_designation` text NOT NULL,
  `testimonial_desc` text NOT NULL,
  `client_thumb` varchar(255) NOT NULL,
  `client_big` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`testimonial_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `testimonials`
-- 

INSERT INTO `testimonials` VALUES (1, 'Client Name 1', 'Lorem ipsum', '', 'photo/th1_1378916950client.png', 'photo/1378916950client.png', 'Y');
