<?php

/**
 * This file is part of the Froxlor project.
 * Copyright (c) 2010 the Froxlor Team (see authors).
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, you can also view it online at
 * http://files.froxlor.org/misc/COPYING.txt
 *
 * @copyright  the authors
 * @author     Froxlor team <team@froxlor.org>
 * @license    http://files.froxlor.org/misc/COPYING.txt GPLv2
 */

use Froxlor\Database\Database;
use Froxlor\Settings;

if (!defined('_CRON_UPDATE')) {
	if (!defined('AREA') || (defined('AREA') && AREA != 'admin') || !isset($userinfo['loginname']) || (isset($userinfo['loginname']) && $userinfo['loginname'] == '')) {
		header('Location: ../../../../index.php');
		exit();
	}
}

// last 0.10.x release
if (\Froxlor\Froxlor::isFroxlorVersion('0.10.99')) {
	showUpdateStep("Updating from 0.10.99 to 0.11.0-dev1", false);

	showUpdateStep("Removing unused table");
	Database::query("DROP TABLE IF EXISTS `panel_sessions`;");
	Database::query("DROP TABLE IF EXISTS `panel_languages`;");
	lastStepStatus(0);

	showUpdateStep("Updating froxlor - theme");
	Database::query("UPDATE `" . TABLE_PANEL_ADMINS . "` SET `theme` = 'Froxlor' WHERE `theme` <> 'Froxlor';");
	Database::query("UPDATE `" . TABLE_PANEL_CUSTOMERS . "` SET `theme` = 'Froxlor' WHERE `theme` <> 'Froxlor';");
	Settings::Set('panel.default_theme', 'Froxlor');
	lastStepStatus(0);

	showUpdateStep("Creating new tables and fields");
	Database::query("DROP TABLE IF EXISTS `panel_usercolumns`;");
	$sql = "CREATE TABLE `panel_usercolumns` (
	`adminid` int(11) NOT NULL default '0',
	`customerid` int(11) NOT NULL default '0',
	`section` varchar(500) NOT NULL default '',
	`columns` text NOT NULL,
	UNIQUE KEY `user_section` (`adminid`, `customerid`, `section`),
	KEY adminid (adminid),
	KEY customerid (customerid)
	) ENGINE=InnoDB CHARSET=utf8 COLLATE=utf8_general_ci;";
	Database::query($sql);
	lastStepStatus(0);


	showUpdateStep("Cleaning up old files");
	$to_clean = array(
		"install/lib",
		"install/lng",
		"templates/Sparkle",
		"lib/version.inc.php",
		"lng/czech.lng.php",
		"lng/dutch.lng.php",
		"lng/english.lng.php",
		"lng/french.lng.php",
		"lng/german.lng.php",
		"lng/italian.lng.php",
		"lng/lng_references.php",
		"lng/portugues.lng.php",
		"lng/swedish.lng.php",
	);
	$disabled = explode(',', ini_get('disable_functions'));
	$exec_allowed = !in_array('exec', $disabled);
	$del_list = "";
	foreach ($to_clean as $filedir) {
		$complete_filedir = \Froxlor\Froxlor::getInstallDir() . $filedir;
		if (file_exists($complete_filedir)) {
			if ($exec_allowed) {
				Froxlor\FileDir::safe_exec("rm -rf " . escapeshellarg($complete_filedir));
			} else {
				$del_list .= "rm -rf " . escapeshellarg($complete_filedir) . PHP_EOL;
			}
		}
	}
	if ($exec_allowed) {
		lastStepStatus(0);
	} else {
		if (empty($del_list)) {
			// none of the files existed
			lastStepStatus(0);
		} else {
			lastStepStatus(1, 'manual commands needed', 'Please run the following commands manually:<br><pre>' . $del_list . '</pre>');
		}
	}

	showUpdateStep("Adding new settings");
	$panel_settings_mode = isset($_POST['panel_settings_mode']) ? (int) $_POST['panel_settings_mode'] : 0;
	Settings::AddNew("panel.settings_mode", $panel_settings_mode);
	lastStepStatus(0);

	showUpdateStep("Adjusting existing settings");
	Settings::Set('system.passwordcryptfunc', PASSWORD_DEFAULT);
	// remap default-language
	$lang_map = [
		'Deutsch' => 'de',
		'English' => 'en',
		'Fran&ccedil;ais' => 'fr',
		'Portugu&ecirc;s' => 'pt',
		'Italiano' => 'it',
		'Nederlands' => 'nl',
		'Svenska' => 'sv',
		'&#268;esk&aacute; republika' => 'cs'
	];
	Settings::Set('panel.standardlanguage', $lang_map[Settings::Get('panel_standardlanguage')] ?? 'en');
	lastStepStatus(0);


	if (\Froxlor\Froxlor::isFroxlorVersion('0.10.99')) {
		showUpdateStep("Updating from 0.10.99 to 0.11.0-dev1", false);
		\Froxlor\Froxlor::updateToVersion('0.11.0-dev1');
	}
}
