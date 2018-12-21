<?php

/**
 * This file is part of the Froxlor project.
 * Copyright (c) 2003-2009 the SysCP Team (see authors).
 * Copyright (c) 2010 the Froxlor Team (see authors).
 *
 * For the full copyright and license information, please view the COPYING
 * file that was distributed with this source code. You can also view the
 * COPYING file online at http://files.froxlor.org/misc/COPYING.txt
 *
 * @copyright  (c) the authors
 * @author     Florian Lippert <flo@syscp.org> (2003-2009)
 * @author     Froxlor team <team@froxlor.org> (2010-)
 * @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt
 * @package    \Froxlor\Settings
 *
 */
return array(
	'groups' => array(
		'webserver' => array(
			'title' => \Froxlor\I18N\Lang::getAll()['admin']['webserversettings'],
			'fields' => array(
				'system_webserver' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['admin']['webserver'],
					'settinggroup' => 'system',
					'varname' => 'webserver',
					'type' => 'option',
					'default' => 'apache2',
					'option_mode' => 'one',
					'option_options' => array(
						'apache2' => 'Apache 2',
						'lighttpd' => 'ligHTTPd',
						'nginx' => 'Nginx'
					),
					'save_method' => 'storeSettingField',
					'plausibility_check_method' => array(
						'\\Froxlor\\Validate\\Check',
						'checkPhpInterfaceSetting'
					),
					'overview_option' => true
				),
				'system_apache_24' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['apache_24'],
					'settinggroup' => 'system',
					'varname' => 'apache24',
					'type' => 'bool',
					'default' => false,
					'save_method' => 'storeSettingField',
					'websrv_avail' => array(
						'apache2'
					)
				),
				'system_apache_itksupport' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['apache_itksupport'],
					'settinggroup' => 'system',
					'varname' => 'apacheitksupport',
					'type' => 'bool',
					'default' => false,
					'save_method' => 'storeSettingField',
					'visible' => (\Froxlor\Settings::Get('system.mod_fcgid') == 0 && \Froxlor\Settings::Get('phpfpm.enabled') == 0),
					'websrv_avail' => array(
						'apache2'
					)
				),
				'system_http2_support' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['http2_support'],
					'settinggroup' => 'system',
					'varname' => 'http2_support',
					'type' => 'bool',
					'default' => false,
					'save_method' => 'storeSettingField',
					'websrv_avail' => array(
						'apache2',
						'nginx'
					),
					'visible' => \Froxlor\Settings::Get('system.use_ssl')
				),
				'system_dhparams_file' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['dhparams_file'],
					'settinggroup' => 'system',
					'varname' => 'dhparams_file',
					'type' => 'string',
					'string_type' => 'file',
					'string_emptyallowed' => true,
					'default' => '',
					'save_method' => 'storeSettingField',
					'visible' => \Froxlor\Settings::Get('system.use_ssl')
				),
				'system_httpuser' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['admin']['webserver_user'],
					'settinggroup' => 'system',
					'varname' => 'httpuser',
					'type' => 'string',
					'default' => 'www-data',
					'save_method' => 'storeSettingWebserverFcgidFpmUser'
				),
				'system_httpgroup' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['admin']['webserver_group'],
					'settinggroup' => 'system',
					'varname' => 'httpgroup',
					'type' => 'string',
					'default' => 'www-data',
					'save_method' => 'storeSettingField'
				),
				'system_apacheconf_vhost' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['apacheconf_vhost'],
					'settinggroup' => 'system',
					'varname' => 'apacheconf_vhost',
					'type' => 'string',
					'string_type' => 'filedir',
					'default' => '/etc/apache2/sites-enabled/',
					'save_method' => 'storeSettingField'
				),
				'system_apacheconf_diroptions' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['apacheconf_diroptions'],
					'settinggroup' => 'system',
					'varname' => 'apacheconf_diroptions',
					'type' => 'string',
					'string_type' => 'filedir',
					'default' => '/etc/apache2/sites-enabled/',
					'save_method' => 'storeSettingField'
				),
				'system_apacheconf_htpasswddir' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['apacheconf_htpasswddir'],
					'settinggroup' => 'system',
					'varname' => 'apacheconf_htpasswddir',
					'type' => 'string',
					'string_type' => 'confdir',
					'default' => '/etc/apache2/htpasswd/',
					'save_method' => 'storeSettingField'
				),
				'system_logfiles_directory' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['logfiles_directory'],
					'settinggroup' => 'system',
					'varname' => 'logfiles_directory',
					'type' => 'string',
					'string_type' => 'dir',
					'default' => '/var/customers/logs/',
					'save_method' => 'storeSettingField'
				),
				'system_logfiles_script' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['logfiles_script'],
					'settinggroup' => 'system',
					'varname' => 'logfiles_script',
					'type' => 'string',
					'string_type' => '',
					'default' => '',
					'save_method' => 'storeSettingField',
					'websrv_avail' => array(
						'apache2'
					)
				),
				'system_logfiles_piped' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['logfiles_piped'],
					'settinggroup' => 'system',
					'varname' => 'logfiles_piped',
					'type' => 'bool',
					'default' => false,
					'save_method' => 'storeSettingField',
					'websrv_avail' => array(
						'apache2'
					)
				),
				'system_logfiles_format' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['logfiles_format'],
					'settinggroup' => 'system',
					'varname' => 'logfiles_format',
					'type' => 'string',
					'default' => '',
					'string_emptyallowed' => true,
					'save_method' => 'storeSettingField',
					'websrv_avail' => array(
						'apache2',
						'nginx'
					)
				),
				'system_logfiles_type' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['logfiles_type'],
					'settinggroup' => 'system',
					'varname' => 'logfiles_type',
					'type' => 'option',
					'default' => '1',
					'option_mode' => 'one',
					'option_options' => array(
						'1' => 'combined',
						'2' => 'vhost_combined'
					),
					'save_method' => 'storeSettingField',
					'websrv_avail' => array(
						'apache2'
					)
				),
				'system_customersslpath' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['customerssl_directory'],
					'settinggroup' => 'system',
					'varname' => 'customer_ssl_path',
					'type' => 'string',
					'string_type' => 'confdir',
					'default' => '/etc/ssl/froxlor-custom/',
					'save_method' => 'storeSettingField'
				),
				'system_phpappendopenbasedir' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['phpappendopenbasedir'],
					'settinggroup' => 'system',
					'varname' => 'phpappendopenbasedir',
					'type' => 'string',
					'string_emptyallowed' => true,
					'default' => '',
					'save_method' => 'storeSettingField'
				),
				'system_deactivateddocroot' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['deactivateddocroot'],
					'settinggroup' => 'system',
					'varname' => 'deactivateddocroot',
					'type' => 'string',
					'string_type' => 'dir',
					'string_emptyallowed' => true,
					'default' => '',
					'save_method' => 'storeSettingField'
				),
				'system_default_vhostconf' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['default_vhostconf'],
					'settinggroup' => 'system',
					'varname' => 'default_vhostconf',
					'type' => 'text',
					'default' => '',
					'save_method' => 'storeSettingField'
				),
				'system_apache_globaldiropt' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['apache_globaldiropt'],
					'settinggroup' => 'system',
					'varname' => 'apacheglobaldiropt',
					'type' => 'text',
					'default' => '',
					'save_method' => 'storeSettingField',
					'visible' => (\Froxlor\Settings::Get('system.mod_fcgid') == 0 && \Froxlor\Settings::Get('phpfpm.enabled') == 0),
					'websrv_avail' => array(
						'apache2'
					)
				),
				'system_apachereload_command' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['apachereload_command'],
					'settinggroup' => 'system',
					'varname' => 'apachereload_command',
					'type' => 'string',
					'default' => '/etc/init.d/apache2 reload',
					'save_method' => 'storeSettingField'
				),
				'system_phpreload_command' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['phpreload_command'],
					'settinggroup' => 'system',
					'varname' => 'phpreload_command',
					'type' => 'string',
					'default' => '',
					'save_method' => 'storeSettingField',
					'websrv_avail' => array(
						'nginx'
					)
				),
				'system_nginx_php_backend' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['nginx_php_backend'],
					'settinggroup' => 'system',
					'varname' => 'nginx_php_backend',
					'type' => 'string',
					'default' => '127.0.0.1:8888',
					'save_method' => 'storeSettingField',
					'websrv_avail' => array(
						'nginx'
					)
				),
				'nginx_fastcgiparams' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['nginx_fastcgiparams'],
					'settinggroup' => 'nginx',
					'varname' => 'fastcgiparams',
					'type' => 'string',
					'string_type' => 'file',
					'default' => '/etc/nginx/fastcgi_params',
					'save_method' => 'storeSettingField',
					'websrv_avail' => array(
						'nginx'
					)
				),
				'defaultwebsrverrhandler_enabled' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['defaultwebsrverrhandler_enabled'],
					'settinggroup' => 'defaultwebsrverrhandler',
					'varname' => 'enabled',
					'type' => 'bool',
					'default' => false,
					'save_method' => 'storeSettingField'
				),
				'defaultwebsrverrhandler_err401' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['defaultwebsrverrhandler_err401'],
					'settinggroup' => 'defaultwebsrverrhandler',
					'varname' => 'err401',
					'type' => 'string',
					'default' => '',
					'save_method' => 'storeSettingField',
					'websrv_avail' => array(
						'apache2',
						'nginx'
					)
				),
				'defaultwebsrverrhandler_err403' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['defaultwebsrverrhandler_err403'],
					'settinggroup' => 'defaultwebsrverrhandler',
					'varname' => 'err403',
					'type' => 'string',
					'default' => '',
					'save_method' => 'storeSettingField',
					'websrv_avail' => array(
						'apache2',
						'nginx'
					)
				),
				'defaultwebsrverrhandler_err404' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['defaultwebsrverrhandler_err404'],
					'settinggroup' => 'defaultwebsrverrhandler',
					'varname' => 'err404',
					'type' => 'string',
					'default' => '',
					'save_method' => 'storeSettingField'
				),
				'defaultwebsrverrhandler_err500' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['defaultwebsrverrhandler_err500'],
					'settinggroup' => 'defaultwebsrverrhandler',
					'varname' => 'err500',
					'type' => 'string',
					'default' => '',
					'save_method' => 'storeSettingField',
					'websrv_avail' => array(
						'apache2',
						'nginx'
					)
				),
				'customredirect_enabled' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['customredirect_enabled'],
					'settinggroup' => 'customredirect',
					'varname' => 'enabled',
					'type' => 'bool',
					'default' => false,
					'save_method' => 'storeSettingField'
				),
				'customredirect_default' => array(
					'label' => \Froxlor\I18N\Lang::getAll()['serversettings']['customredirect_default'],
					'settinggroup' => 'customredirect',
					'varname' => 'default',
					'type' => 'option',
					'default' => '1',
					'option_mode' => 'one',
					'option_options_method' => array('\\Froxlor\\Domain\\Domain', 'getRedirectCodes'),
					'save_method' => 'storeSettingField'
				)
			)
		)
	)
);
