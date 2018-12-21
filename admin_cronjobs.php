<?php

/**
 * This file is part of the Froxlor project.
 * Copyright (c) 2010 the Froxlor Team (see authors).
 *
 * For the full copyright and license information, please view the COPYING
 * file that was distributed with this source code. You can also view the
 * COPYING file online at http://files.froxlor.org/misc/COPYING.txt
 *
 * @copyright  (c) the authors
 * @author     Froxlor team <team@froxlor.org> (2010-)
 * @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt
 * @package    Panel
 *
 */
define('AREA', 'admin');
require './lib/init.php';

use Froxlor\Database\Database;
use Froxlor\Api\Commands\Cronjobs as Cronjobs;

if (isset($_POST['id'])) {
	$id = intval($_POST['id']);
} elseif (isset($_GET['id'])) {
	$id = intval($_GET['id']);
}

if ($page == 'cronjobs' || $page == 'overview') {
	if ($action == '') {
		$log->logAction(ADM_ACTION, LOG_NOTICE, 'viewed admin_cronjobs');

		$fields = array(
			'c.lastrun' => \Froxlor\I18N\Lang::getAll()['cron']['lastrun'],
			'c.interval' => \Froxlor\I18N\Lang::getAll()['cron']['interval'],
			'c.isactive' => \Froxlor\I18N\Lang::getAll()['cron']['isactive']
		);
		$paging = new \Froxlor\UI\Paging(\Froxlor\User::getAll(), TABLE_PANEL_CRONRUNS, $fields);

		$crons = '';
		$result_stmt = Database::prepare("SELECT `c`.* FROM `" . TABLE_PANEL_CRONRUNS . "` `c` ORDER BY `module` ASC, `cronfile` ASC");
		Database::pexecute($result_stmt);
		$paging->setEntries(Database::num_rows());
		$sortcode = $paging->getHtmlSortCode($lng);
		$arrowcode = $paging->getHtmlArrowCode($filename . '?page=' . $page . '&s=' . $s);
		$searchcode = $paging->getHtmlSearchCode($lng);
		$pagingcode = $paging->getHtmlPagingCode($filename . '?page=' . $page . '&s=' . $s);

		$i = 0;
		$count = 0;
		$cmod = '';

		while ($row = $result_stmt->fetch(PDO::FETCH_ASSOC)) {
			if ($cmod != $row['module']) {
				$_mod = explode("/", $row['module']);
				$module = ucfirst($_mod[1]);
				eval("\$crons.=\"" . \Froxlor\UI\Template::getTemplate('cronjobs/cronjobs_cronjobmodule') . "\";");
				$cmod = $row['module'];
			}
			if ($paging->checkDisplay($i)) {
				$row = \Froxlor\PhpHelper::htmlentities_array($row);

				$row['lastrun'] = date('d.m.Y H:i', $row['lastrun']);
				$row['isactive'] = ((int) $row['isactive'] == 1) ? \Froxlor\I18N\Lang::getAll()['panel']['yes'] : \Froxlor\I18N\Lang::getAll()['panel']['no'];

				$description = \Froxlor\I18N\Lang::getAll()['crondesc'][$row['desc_lng_key']];

				eval("\$crons.=\"" . \Froxlor\UI\Template::getTemplate('cronjobs/cronjobs_cronjob') . "\";");
				$count ++;
			}

			$i ++;
		}

		eval("echo \"" . \Froxlor\UI\Template::getTemplate('cronjobs/cronjobs') . "\";");
	} elseif ($action == 'new') {
		/*
		 * @TODO later
		 */
	} elseif ($action == 'edit' && $id != 0) {
		try {
			$json_result = Cronjobs::getLocal(\Froxlor\User::getAll(), array(
				'id' => $id
			))->get();
		} catch (Exception $e) {
			\Froxlor\UI\Response::dynamic_error($e->getMessage());
		}
		$result = json_decode($json_result, true)['data'];
		if ($result['cronfile'] != '') {
			if (isset($_POST['send']) && $_POST['send'] == 'send') {
				try {
					Cronjobs::getLocal(\Froxlor\User::getAll(), $_POST)->update();
				} catch (Exception $e) {
					\Froxlor\UI\Response::dynamic_error($e->getMessage());
				}
				\Froxlor\UI\Response::redirectTo($filename, array(
					'page' => $page,
					's' => $s
				));
			} else {

				// interval
				$interval_nfo = explode(' ', $result['interval']);
				$interval_value = $interval_nfo[0];

				$interval_interval = '';
				$interval_interval .= \Froxlor\UI\HTML::makeoption(\Froxlor\I18N\Lang::getAll()['cronmgmt']['minutes'], 'MINUTE', $interval_nfo[1]);
				$interval_interval .= \Froxlor\UI\HTML::makeoption(\Froxlor\I18N\Lang::getAll()['cronmgmt']['hours'], 'HOUR', $interval_nfo[1]);
				$interval_interval .= \Froxlor\UI\HTML::makeoption(\Froxlor\I18N\Lang::getAll()['cronmgmt']['days'], 'DAY', $interval_nfo[1]);
				$interval_interval .= \Froxlor\UI\HTML::makeoption(\Froxlor\I18N\Lang::getAll()['cronmgmt']['weeks'], 'WEEK', $interval_nfo[1]);
				$interval_interval .= \Froxlor\UI\HTML::makeoption(\Froxlor\I18N\Lang::getAll()['cronmgmt']['months'], 'MONTH', $interval_nfo[1]);
				// end of interval

				$change_cronfile = false;
				if (substr($result['module'], 0, strpos($result['module'], '/')) != 'froxlor') {
					$change_cronfile = true;
				}

				$cronjobs_edit_data = include_once dirname(__FILE__) . '/lib/formfields/admin/cronjobs/formfield.cronjobs_edit.php';
				$cronjobs_edit_form = \Froxlor\UI\HtmlForm::genHTMLForm($cronjobs_edit_data);

				$title = $cronjobs_edit_data['cronjobs_edit']['title'];
				$image = $cronjobs_edit_data['cronjobs_edit']['image'];

				eval("echo \"" . \Froxlor\UI\Template::getTemplate('cronjobs/cronjob_edit') . "\";");
			}
		}
	} elseif ($action == 'delete' && $id != 0) {
		/*
		 * @TODO later
		 */
	}
}
