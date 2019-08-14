<?php
$installer = $this;
$installer->startSetup();

$installer->run("
DROP TABLE IF EXISTS `{$installer->getTable('fontawesome')}`;
CREATE TABLE IF NOT EXISTS `{$installer->getTable('fontawesome')}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `font_name` varchar(500) NOT NULL,
  `font_class` text NOT NULL,
  `font_code` varchar(500) NOT NULL,
  `font_selected` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `{$installer->getTable('fontsettings')}`;
CREATE TABLE IF NOT EXISTS `{$installer->getTable('fontsettings')}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `font_url` text NOT NULL,
  `id_fontawesome` int(11) NOT NULL,
  `font_seckey` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `{$installer->getTable('font_css_setting')}`;
CREATE TABLE IF NOT EXISTS `{$installer->getTable('font_css_setting')}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `font_css_file_status` tinyint(4) NOT NULL,
  `extension_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

");
$installer->endSetup(); 