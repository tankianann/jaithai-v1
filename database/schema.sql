-- Jai Thai local development schema.
--
-- Extracted from the production dump through an isolated MariaDB 10.11
-- container. Production rows and production auto-increment positions are
-- intentionally excluded.

CREATE TABLE `jt_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `qn1` varchar(1) NOT NULL,
  `qn2` varchar(1) NOT NULL,
  `qn3` varchar(1) NOT NULL,
  `qn4` varchar(255) NOT NULL,
  `qn4a` varchar(255) NOT NULL,
  `qn5` text NOT NULL,
  `qn6` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `jt_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `jt_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordertime` datetime NOT NULL,
  `ordernum` varchar(10) NOT NULL,
  `ordertotalprice` decimal(10,2) NOT NULL,
  `orderhash` varchar(255) NOT NULL,
  `deliverypickup` varchar(10) NOT NULL,
  `pickuplocation` varchar(20) NOT NULL,
  `functiondate` date NOT NULL,
  `timestart` varchar(10) NOT NULL,
  `timeend` varchar(10) NOT NULL,
  `paymentmode` varchar(30) NOT NULL,
  `notes` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `company` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL,
  `email2` varchar(255) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `mobile2` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `unitnum` varchar(50) NOT NULL DEFAULT '',
  `buildingname` varchar(255) NOT NULL,
  `postalcode` varchar(6) NOT NULL,
  `typeoffunction` varchar(255) NOT NULL,
  `setuparea` varchar(255) NOT NULL,
  `accessiblebylift` text NOT NULL,
  `tablesrequired` varchar(255) NOT NULL,
  `cutleryrequired` varchar(255) NOT NULL,
  `sameasdelivery` int(1) NOT NULL,
  `billname` varchar(100) NOT NULL,
  `billcompany` varchar(255) NOT NULL,
  `billemail` varchar(255) NOT NULL,
  `billtelephone` varchar(50) NOT NULL,
  `billmobile` varchar(50) NOT NULL,
  `billaddress` varchar(255) NOT NULL,
  `billunitnum` varchar(50) NOT NULL DEFAULT '',
  `billbuildingname` varchar(255) NOT NULL,
  `billpostalcode` varchar(6) NOT NULL,
  `communicationpreference` varchar(20) NOT NULL,
  `items` text NOT NULL,
  `a_assignedoutlet` varchar(2) NOT NULL,
  `a_assigneddriver` varchar(100) NOT NULL,
  `a_addedtocalendar` datetime NOT NULL,
  `a_confirmationsent` datetime NOT NULL,
  `a_confirmationack` datetime NOT NULL,
  `a_paid` datetime NOT NULL,
  `a_delivered` datetime NOT NULL,
  `a_feedbacksent` datetime NOT NULL,
  `a_feedbackreceived` datetime NOT NULL,
  `a_credit` datetime NOT NULL,
  `a_archived` datetime NOT NULL,
  `a_cancelled` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `jt_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `scope` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `jt_vouchers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vouchernum` varchar(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dateissue` datetime NOT NULL,
  `dateexpire` datetime NOT NULL,
  `dateused` datetime NOT NULL,
  `orderid` int(11) NOT NULL,
  `amount` float NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vouchernum` (`vouchernum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
