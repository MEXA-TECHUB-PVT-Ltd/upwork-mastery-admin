-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 12:13 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upwork_mastery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `terms_and_condition` text NOT NULL,
  `privacy_policy` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `terms_and_condition`, `privacy_policy`, `created_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$MUMK673EepRDEfcwWgtdmuEmn/IdBOpAVvsartslo5rgTjiab1pPq', '<h1>Privacy Policy for mtechub product</h1>\r\n<p>At mtechub llc, accessible from https://mtechub.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by mtechub llc and how we use it.</p>\r\n<p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>\r\n<p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in mtechub llc. This policy is not applicable to any information collected offline or via channels other than this website.</p>\r\n<h2>Consent</h2>\r\n<p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>\r\n<h2>Information we collect</h2>\r\n<p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>\r\n<p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>\r\n<p>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>\r\n<h2>How we use your information</h2>\r\n<p>We use the information we collect in various ways, including to:</p>\r\n<ul>\r\n<li>Provide, operate, and maintain our website</li>\r\n<li>Improve, personalize, and expand our website</li>\r\n<li>Understand and analyze how you use our website</li>\r\n<li>Develop new products, services, features, and functionality</li>\r\n<li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>\r\n<li>Send you emails</li>\r\n<li>Find and prevent fraud</li>\r\n</ul>\r\n<h2>Log Files</h2>\r\n<p>mtechub llc follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.</p>\r\n<h2>Cookies and Web Beacons</h2>\r\n<p>Like any other website, mtechub llc uses \'cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and/or other information.</p>\r\n<h2>Advertising Partners Privacy Policies</h2>\r\n<p>You may consult this list to find the Privacy Policy for each of the advertising partners of mtechub llc.</p>\r\n<p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on mtechub llc, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>\r\n<p>Note that mtechub llc has no access to or control over these cookies that are used by third-party advertisers.</p>\r\n<h2>Third Party Privacy Policies</h2>\r\n<p>mtechub llc\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.</p>\r\n<p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites.</p>\r\n<h2>CCPA Privacy Rights (Do Not Sell My Personal Information)</h2>\r\n<p>Under the CCPA, among other rights, California consumers have the right to:</p>\r\n<p>Request that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p>\r\n<p>Request that a business delete any personal data about the consumer that a business has collected.</p>\r\n<p>Request that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data.</p>\r\n<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>\r\n<h2>GDPR Data Protection Rights</h2>\r\n<p>We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>\r\n<p>The right to access &ndash; You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>\r\n<p>The right to rectification &ndash; You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>\r\n<p>The right to erasure &ndash; You have the right to request that we erase your personal data, under certain conditions.</p>\r\n<p>The right to restrict processing &ndash; You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>\r\n<p>The right to object to processing &ndash; You have the right to object to our processing of your personal data, under certain conditions.</p>\r\n<p>The right to data portability &ndash; You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>\r\n<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>\r\n<h2>Children\'s Information</h2>\r\n<p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>\r\n<p>mtechub llc does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>\r\n<h2>Changes to This Privacy Policy</h2>\r\n<p>We may update our Privacy Policy from time to time. Thus, we advise you to review this page periodically for any changes. We will notify you of any changes by posting the new Privacy Policy on this page. These changes are effective immediately, after they are posted on this page.</p>\r\n<p>Our Privacy Policy was created with the help of the&nbsp;<a href=\"https://www.termsfeed.com/privacy-policy-generator/\">TermsFeed Privacy Policy Generator</a>.</p>\r\n<h2>Contact Us</h2>\r\n<p>If you have any questions or suggestions about our Privacy Policy, do not hesitate to contact us.</p>', '<h1>Privacy Policy for mtechub product</h1>\r\n<p>At mtechub llc, accessible from https://mtechub.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by mtechub llc and how we use it.</p>\r\n<p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>\r\n<p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in mtechub llc. This policy is not applicable to any information collected offline or via channels other than this website.</p>\r\n<h2>Consent</h2>\r\n<p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>\r\n<h2>Information we collect</h2>\r\n<p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>\r\n<p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>\r\n<p>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>\r\n<h2>How we use your information</h2>\r\n<p>We use the information we collect in various ways, including to:</p>\r\n<ul>\r\n<li>Provide, operate, and maintain our website</li>\r\n<li>Improve, personalize, and expand our website</li>\r\n<li>Understand and analyze how you use our website</li>\r\n<li>Develop new products, services, features, and functionality</li>\r\n<li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>\r\n<li>Send you emails</li>\r\n<li>Find and prevent fraud</li>\r\n</ul>\r\n<h2>Log Files</h2>\r\n<p>mtechub llc follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.</p>\r\n<h2>Cookies and Web Beacons</h2>\r\n<p>Like any other website, mtechub llc uses \'cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and/or other information.</p>\r\n<h2>Advertising Partners Privacy Policies</h2>\r\n<p>You may consult this list to find the Privacy Policy for each of the advertising partners of mtechub llc.</p>\r\n<p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on mtechub llc, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>\r\n<p>Note that mtechub llc has no access to or control over these cookies that are used by third-party advertisers.</p>\r\n<h2>Third Party Privacy Policies</h2>\r\n<p>mtechub llc\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.</p>\r\n<p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites.</p>\r\n<h2>CCPA Privacy Rights (Do Not Sell My Personal Information)</h2>\r\n<p>Under the CCPA, among other rights, California consumers have the right to:</p>\r\n<p>Request that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p>\r\n<p>Request that a business delete any personal data about the consumer that a business has collected.</p>\r\n<p>Request that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data.</p>\r\n<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>\r\n<h2>GDPR Data Protection Rights</h2>\r\n<p>We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>\r\n<p>The right to access &ndash; You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>\r\n<p>The right to rectification &ndash; You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>\r\n<p>The right to erasure &ndash; You have the right to request that we erase your personal data, under certain conditions.</p>\r\n<p>The right to restrict processing &ndash; You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>\r\n<p>The right to object to processing &ndash; You have the right to object to our processing of your personal data, under certain conditions.</p>\r\n<p>The right to data portability &ndash; You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>\r\n<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>\r\n<h2>Children\'s Information</h2>\r\n<p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>\r\n<p>mtechub llc does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>\r\n<h2>Changes to This Privacy Policy</h2>\r\n<p>We may update our Privacy Policy from time to time. Thus, we advise you to review this page periodically for any changes. We will notify you of any changes by posting the new Privacy Policy on this page. These changes are effective immediately, after they are posted on this page.</p>\r\n<p>Our Privacy Policy was created with the help of the&nbsp;<a href=\"https://www.termsfeed.com/privacy-policy-generator/\">TermsFeed Privacy Policy Generator</a>.</p>\r\n<h2>Contact Us</h2>\r\n<p>If you have any questions or suggestions about our Privacy Policy, do not hesitate to contact us.</p>', '2023-03-30 10:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `amount`, `token`, `created_at`) VALUES
(1, 1, 20000, 'StripeToken JSON: {\n    \"id\": \"tok_1MtTluSImwf7DA0fiCRl63jz\",\n    \"object\": \"token\",\n    \"card\": {\n        \"id\": \"card_1MtTluSImwf7DA0fv8F60UG6\",\n        \"object\": \"card\",\n        \"address_city\": null,\n        \"address_country\": null,\n        \"address_lin', '2023-04-05 15:41:00'),
(2, 1, 20000, 'StripeToken JSON: {\n    \"id\": \"tok_1MtTmUSImwf7DA0f9HpgNJll\",\n    \"object\": \"token\",\n    \"card\": {\n        \"id\": \"card_1MtTmUSImwf7DA0f88j4F628\",\n        \"object\": \"card\",\n        \"address_city\": null,\n        \"address_country\": null,\n        \"address_lin', '2023-04-05 15:41:36'),
(3, 1, 20000, 'StripeToken JSON: {\n    \"id\": \"tok_1MtTo4SImwf7DA0fbXOqcaEk\",\n    \"object\": \"token\",\n    \"card\": {\n        \"id\": \"card_1MtTo3SImwf7DA0fDghdrn0C\",\n        \"object\": \"card\",\n        \"address_city\": null,\n        \"address_country\": null,\n        \"address_lin', '2023-04-05 15:43:14'),
(4, 1, 20000, 'StripeToken JSON: {\n    \"id\": \"tok_1MtltvSImwf7DA0feeTPSRGl\",\n    \"object\": \"token\",\n    \"card\": {\n        \"id\": \"card_1MtltvSImwf7DA0fsQ1TbkuV\",\n        \"object\": \"card\",\n        \"address_city\": null,\n        \"address_country\": null,\n        \"address_lin', '2023-04-06 11:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `expire_date` varchar(255) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo_codes`
--

INSERT INTO `promo_codes` (`id`, `code`, `expire_date`, `discount`, `status`, `created_at`) VALUES
(1, 234155, '2023-04-13', 50, 'block', '2023-04-04 14:30:07'),
(2, 1134123, '2023-04-13', 24, 'block', '2023-04-05 12:47:53'),
(3, 234155, '2023-04-13', 40, 'block', '2023-04-05 14:07:11'),
(4, 1134123, '2023-04-15', 23, '', '2023-04-05 15:15:35'),
(5, 1134123, '2022-12-31', 23, '', '2023-04-05 15:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `user_id` varchar(1000) DEFAULT NULL,
  `customer_id` varchar(1000) DEFAULT NULL,
  `client_secret` varchar(1000) DEFAULT NULL,
  `secret` varchar(1000) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `customer_id`, `client_secret`, `secret`, `amount`, `currency`, `created_at`) VALUES
(1, '5', 'cus_Nf81KAVU1VrlUf', 'pi_3MtnlCSImwf7DA0f1D2xBT5G_secret_PNDvxafc0UgN2q8WpxZFkLIfy', 'ek_test_YWNjdF8xSzdPazFTSW13ZjdEQTBmLGs2V0JUajJic0lyU2g1MUhGZHBRN1lGS2lSekpmU00_00oMA3HTjT', 1000, 'inr', '2023-04-06 13:02:07'),
(3, '12', 'cus_Nf90LstvaVSUoY', 'pi_3MtoijC2CkXRGRDY0gxYKQWt_secret_sCqa4EfHL47T78mgwKbZRQkiP', 'ek_test_YWNjdF8xTXRudTBDMkNrWFJHUkRZLHRGWG5YUzVQRGRTcFJEd0pkVnpKQzZpRmpHQXFCS3A_007UcOgxx2', 100000, 'inr', '2023-04-06 14:03:07'),
(4, '12', 'cus_Nf9aVIbyonawcI', 'pi_3MtpHBC2CkXRGRDY0ItuowAm_secret_hVs443GkQi6KXXaegKHQamVwF', 'ek_test_YWNjdF8xTXRudTBDMkNrWFJHUkRZLDhtQXNyNFJxMnF0VzR0SDlOaWNRQ2w0QjN6ME1Telk_00HS7llbR2', 100000, 'inr', '2023-04-06 14:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `referral_code` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `subscription` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `OTP` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `country`, `referral_code`, `city`, `subscription`, `status`, `OTP`, `created_at`) VALUES
(5, 'Test User 2', 'test2@gmail.com', '$2y$10$uVneIkWM8d9nTYvAJZnJee2LqpDyMRL41AEwtyFBYbxvaNRA3qvNm', 'Pakistan', '46890', 'Peshawer', 'subscribed', 'active', 0, '2023-04-04 10:20:36'),
(12, 'Test User', 'test@gmail.com', '$2y$10$kPVYeKBAaf8hZZROaoI.FucJFXwWxXNPAMwU0EhNwH3qIBES8iQi.', 'UAE', '46000', 'DUBAI', 'subscribed', NULL, NULL, '2023-04-06 14:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `link`, `description`, `created_at`) VALUES
(3, 'Quran Payam E Rehmat', 'https://www.youtube.com/watch?v=a9xiJ6GrT3Y&ab_channel=HafizAbdulQadir-Topic', 'Provided to YouTube by Silent Roar Productions\r\n\r\nQuran Payam E Rehmat · Hafiz Abdul Qadir\r\n\r\nNoor E Hidayat\r\n\r\n℗ 2023 Rehmani and Saadi Enterprises\r\n\r\nReleased on: 2023-03-28\r\n\r\nMusic  Publisher: Silent Roar Productions\r\nIncome  Participant: Rehmani and Saadi Enterprises\r\n\r\nAuto-generated by YouTube.', '2023-03-31 15:27:31'),
(4, 'Javed Amirkhil - Naat e Sharif جاوید امیرخیل - (نعت شریف) د ستاینې سرود', 'https://www.youtube.com/watch?v=k8xmsBbYwos&list=RDMMk8xmsBbYwos&start_radio=1&ab_channel=JavedAmirkhailofficial%D8%AC%D8%A7%D9%88%DB%8C%D8%AF%D8%A7%D9%85%DB%8C%D8%B1%D8%AE%DB%90%D9%84', 'Javed Amirkhil\r\nNaat e Sharif\r\nLyrics: Peer Mohammad Karwan\r\nCompose: Javed Amirkhil\r\nMusic: Daniyal Anwar', '2023-03-31 15:28:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
