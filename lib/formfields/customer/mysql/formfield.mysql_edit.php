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
 * @package    Formfields
 */
return array(
	'mysql_edit' => array(
		'title' => \Froxlor\I18N\Lang::getAll()['mysql']['database_edit'],
		'image' => 'icons/mysql_edit.png',
		'sections' => array(
			'section_a' => array(
				'title' => \Froxlor\I18N\Lang::getAll()['mysql']['database_edit'],
				'image' => 'icons/mysql_edit.png',
				'fields' => array(
					'databasename' => array(
						'label' => \Froxlor\I18N\Lang::getAll()['mysql']['databasename'],
						'type' => 'label',
						'value' => $result['databasename']
					),
					'description' => array(
						'label' => \Froxlor\I18N\Lang::getAll()['mysql']['databasedescription'],
						'type' => 'text',
						'value' => $result['description']
					),
					'mysql_server' => array(
						'visible' => (1 < $count_mysqlservers ? true : false),
						'label' => \Froxlor\I18N\Lang::getAll()['mysql']['mysql_server'],
						'type' => 'label',
						'value' => $sql_root['caption']
					),
					'mysql_password' => array(
						'label' => \Froxlor\I18N\Lang::getAll()['changepassword']['new_password_ifnotempty'],
						'type' => 'password',
						'autocomplete' => 'off'
					),
					'mysql_password_suggestion' => array(
						'label' => \Froxlor\I18N\Lang::getAll()['customer']['generated_pwd'],
						'type' => 'text',
						'visible' => (\Froxlor\Settings::Get('panel.password_regex') == ''),
						'value' => \Froxlor\System\Crypt::generatePassword()
					)
				)
			)
		)
	)
);
