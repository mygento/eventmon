<?php

$installer = $this;

$installer->startSetup();

$installer->run("
DROP TABLE IF EXISTS {$this->getTable('mygento_eventmon_events')};
CREATE TABLE {$this->getTable('mygento_eventmon_events')} (
`id` int(11) NOT NULL AUTO_INCREMENT,
`event` varchar(100) NOT NULL,
`status` varchar(30) NOT NULL,
`message` text NOT NULL,
`start_time` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
`end_time` timestamp NULL DEFAULT NULL,
PRIMARY KEY (`id`),
INDEX `ix_event` USING BTREE (`event`) comment ''
) ENGINE=`InnoDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci CHECKSUM=1;
");

$installer->endSetup();