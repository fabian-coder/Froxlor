<if isset(\Froxlor\User::getAll()['loginname'])>
	</div>
	<div class="clear"></div> 
	</div>
</if>
<footer>
	<span><img src="templates/{$theme}/assets/img/logo_grey.png" alt="Froxlor" /> 
		<if (\Froxlor\Settings::Get('admin.show_version_login') == '1' && $filename == 'index.php') || ($filename != 'index.php' && \Froxlor\Settings::Get('admin.show_version_footer') == '1')>
			{$version}{$branding}
		</if>
		&copy; 2009-{$current_year} by <a href="http://www.froxlor.org/" rel="external">the Froxlor Team</a><br />
	</span>
	<if \Froxlor\I18N\Lang::getAll()['translator'] != ''>
		<br /><span>{\Froxlor\I18N\Lang::getAll()['panel']['translator']}: {\Froxlor\I18N\Lang::getAll()['translator']}
	</if>
</footer>
<a href="#" class="scrollup">Scroll</a>
</body>
</html>
