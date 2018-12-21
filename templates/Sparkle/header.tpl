<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="Default-Style" content="text/css" />
	<if \Froxlor\Settings::Get('panel.no_robots') == '0'>
	<meta name="robots" content="noindex, nofollow, noarchive" />
	<meta name="GOOGLEBOT" content="nosnippet" />
	</if>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
	<script type="text/javascript" src="js/plugins/jquery.tablesorter.sizeparser.min.js"></script>
	<!--[if lt IE 9]><script type="text/javascript" src="js/html5shiv.min.js"></script><![endif]-->
	<if isset($intrafficpage)>
	<!--[if lt IE 9]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
	<script type="text/javascript" src="js/jquery.flot.min.js"></script>
	<script type="text/javascript" src="js/plugins/jquery.flot.resize.min.js"></script>
	<script type="text/javascript" src="templates/{$theme}/assets/js/traffic.js"></script>
	</if>
	<script type="text/javascript" src="templates/{$theme}/assets/js/tipper.min.js"></script>
	<script type="text/javascript" src="templates/{$theme}/assets/js/jcanvas.min.js"></script>
	<script type="text/javascript" src="templates/{$theme}/assets/js/circular.js"></script>
	<script type="text/javascript" src="templates/{$theme}/assets/js/autosize.min.js"></script>
	{$css}
	<!--[if IE]><link rel="stylesheet" href="templates/{$theme}/assets/css/main_ie.css" type="text/css" /><![endif]-->
	<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
	{$js}
	<link href="templates/{$theme}/assets/img/favicon.ico" rel="icon" type="image/x-icon" />
	<link href="templates/{$theme}/assets/img/touchicon.png" rel="shortcut" />
	<link href="templates/{$theme}/assets/img/touchicon.png" rel="apple-touch-icon" />
	<title><if isset(\Froxlor\User::getAll()['loginname']) && \Froxlor\User::getAll()['loginname'] != ''>{\Froxlor\User::getAll()['loginname']} - </if>Froxlor Server Management Panel</title>
</head>
<body>

<if isset(\Froxlor\User::getAll()['loginname'])>
<header class="topheader">
	<hgroup>
		<h1>Froxlor Server Management Panel</h1>
	</hgroup>
	<a href="{$linker->getLink(array('section' => 'index'))}">
		<img src="{$header_logo}" alt="Froxlor Server Management Panel" class="small" />
	</a>
	<div class="topheader_navigation">
		<ul class="topheadernav">
			<if \Froxlor\Settings::Get('panel.is_configured') == 0 && \Froxlor\User::getAll()['adminsession'] == 1 && \Froxlor\User::getAll()['change_serversettings'] == 1>
				<li class="liwarn">
					<a href="{$linker->getLink(array('section' => 'configfiles', 'page' => 'configfiles'))}">{\Froxlor\I18N\Lang::getAll()['panel']['not_configured']}</a>
				</li>
			</if>
			<li>{\Froxlor\User::getAll()['loginname']}</li>
			<li><a href="{$linker->getLink(array('section' => 'index'))}">{\Froxlor\I18N\Lang::getAll()['panel']['dashboard']}</a></li>
			<li><a href="#">{\Froxlor\I18N\Lang::getAll()['panel']['options']}&nbsp;&#x25BE;</a>
				<ul>
					<li><a href="{$linker->getLink(array('section' => 'index', 'page' => 'change_password'))}">{\Froxlor\I18N\Lang::getAll()['login']['password']}</a></li>
					<li><a href="{$linker->getLink(array('section' => 'index', 'page' => 'change_language'))}">{\Froxlor\I18N\Lang::getAll()['login']['language']}</a></li>
					<if \Froxlor\Settings::Get('2fa.enabled') == 1>
						<li><a href="{$linker->getLink(array('section' => 'index', 'page' => '2fa'))}">{\Froxlor\I18N\Lang::getAll()['2fa']['2fa']}</a></li>
					</if>
					<if \Froxlor\Settings::Get('panel.allow_theme_change_admin') == '1' && \Froxlor\User::getAll()['adminsession'] == 1>
						<li><a href="{$linker->getLink(array('section' => 'index', 'page' => 'change_theme'))}">{\Froxlor\I18N\Lang::getAll()['panel']['theme']}</a></li>
					</if>
					<if \Froxlor\Settings::Get('panel.allow_theme_change_customer') == '1' && \Froxlor\User::getAll()['adminsession'] == 0>
						<li><a href="{$linker->getLink(array('section' => 'index', 'page' => 'change_theme'))}">{\Froxlor\I18N\Lang::getAll()['panel']['theme']}</a></li>
					</if>
					<if \Froxlor\Settings::Get('api.enabled') == 1>
						<li><a href="{$linker->getLink(array('section' => 'index', 'page' => 'apikeys'))}">{\Froxlor\I18N\Lang::getAll()['menue']['main']['apikeys']}</a></li>
						<li><a href="https://api.froxlor.org/doc/" rel="external">{\Froxlor\I18N\Lang::getAll()['menue']['main']['apihelp']}</a></li>
					</if>
				</ul>
			</li>
			<li><a href="{$linker->getLink(array('section' => 'index', 'action' => 'logout'))}" class="logoutlink">{\Froxlor\I18N\Lang::getAll()['login']['logout']}</a></li>
		</ul>
	</div>
</header>
<div class="content">
	<nav id="sidenavigation">$navigation</nav>
	<div class="main" id="maincontent">
</if>
