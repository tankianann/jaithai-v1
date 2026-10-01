-- Jai Thai synthetic local-development fixtures.
--
-- Every person, address, contact detail, order, response, and credential in
-- this file is fictional. Nothing in this file was copied from production.

INSERT INTO `jt_options` (`id`, `key`, `value`) VALUES
  (1, 'jtnextordernum', '2'),
  (2, 'jtdrivers', 'a:1:{i:0;s:12:"Local Driver";}');

-- Local-only login: local-admin / local-admin-only
INSERT INTO `jt_users` (`id`, `uname`, `pwd`, `type`, `scope`) VALUES
  (1, 'local-admin', '9f8ce62588a4107f93bfa0d7f16a90a28445cd5a', 'admin', 'ALL');

INSERT INTO `jt_orders` SET
  `id` = 1,
  `ordertime` = '2030-01-01 09:00:00',
  `ordernum` = '1',
  `ordertotalprice` = 230.00,
  `orderhash` = 'local-fixture-order-hash',
  `deliverypickup` = 'delivery',
  `pickuplocation` = '',
  `functiondate` = '2030-01-15',
  `timestart` = '12:00 PM',
  `timeend` = '1:00 PM',
  `paymentmode` = 'Cash',
  `notes` = 'Synthetic local fixture. Do not contact.',
  `name` = 'Synthetic Local Customer',
  `company` = 'Example Test Company',
  `email` = 'customer@example.invalid',
  `email2` = '',
  `telephone` = '00000000',
  `mobile` = '00000000',
  `mobile2` = '',
  `address` = '1 Example Test Street',
  `unitnum` = '#01-01',
  `buildingname` = 'Example Building',
  `postalcode` = '000000',
  `typeoffunction` = 'Local development test',
  `setuparea` = 'Ground floor',
  `accessiblebylift` = 'yes',
  `tablesrequired` = 'No',
  `cutleryrequired` = 'No',
  `sameasdelivery` = 1,
  `billname` = 'Synthetic Local Customer',
  `billcompany` = 'Example Test Company',
  `billemail` = 'billing@example.invalid',
  `billtelephone` = '00000000',
  `billmobile` = '00000000',
  `billaddress` = '1 Example Test Street',
  `billunitnum` = '#01-01',
  `billbuildingname` = 'Example Building',
  `billpostalcode` = '000000',
  `communicationpreference` = 'email',
  `items` = 'a:7:{s:5:"items";a:1:{s:18:"local-fixture-item";a:9:{s:6:"menuid";s:12:"LOCALFIXTURE";s:8:"menutype";i:1;s:5:"title";s:23:"Synthetic Catering Menu";s:10:"addondrink";s:8:"No Drink";s:6:"perpax";i:20;s:6:"numpax";i:10;s:9:"foodprice";i:200;s:6:"dishes";a:3:{i:0;s:14:"Pineapple Rice";i:1;s:19:"Green Curry Chicken";i:2;s:16:"Mixed Vegetables";}s:6:"hitmin";i:1;}}s:9:"foodprice";i:200;s:14:"containerprice";i:0;s:13:"deliveryprice";i:30;s:19:"chargeforcontainers";i:0;s:6:"hitmin";i:1;s:10:"surcharges";a:0:{}}',
  `a_assignedoutlet` = 'CW',
  `a_assigneddriver` = 'Local Driver',
  `a_addedtocalendar` = '0000-00-00 00:00:00',
  `a_confirmationsent` = '0000-00-00 00:00:00',
  `a_confirmationack` = '0000-00-00 00:00:00',
  `a_paid` = '0000-00-00 00:00:00',
  `a_delivered` = '0000-00-00 00:00:00',
  `a_feedbacksent` = '0000-00-00 00:00:00',
  `a_feedbackreceived` = '0000-00-00 00:00:00',
  `a_credit` = '0000-00-00 00:00:00',
  `a_archived` = '0000-00-00 00:00:00',
  `a_cancelled` = '0000-00-00 00:00:00';

INSERT INTO `jt_feedback` (`id`, `orderid`, `qn1`, `qn2`, `qn3`, `qn4`, `qn4a`, `qn5`, `qn6`) VALUES
  (1, 1, '5', '5', '5', 'Local test', '', 'Synthetic fixture feedback.', 'No');

INSERT INTO `jt_vouchers` (`id`, `vouchernum`, `name`, `email`, `dateissue`, `dateexpire`, `dateused`, `orderid`, `amount`, `type`) VALUES
  (1, 'LOCAL000001', 'Synthetic Local Customer', 'customer@example.invalid', '2030-01-01 09:00:00', '2030-02-01 09:00:00', '0000-00-00 00:00:00', 1, 15, 'percent');
