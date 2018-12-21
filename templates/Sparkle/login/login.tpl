$header
	<article class="login bradius">
		<header class="dark">
			<img src="{$header_logo}" alt="Froxlor Server Management Panel" />
		</header>

		<if $update_in_progress !== ''>
			<div class="warningcontainer bradius">
				<div class="warning">{$update_in_progress}</div>
			</div>
		</if>

		<if $successmessage != ''>
			<div class="successcontainer bradius">
				<div class="successtitle">{\Froxlor\I18N\Lang::getAll()['success']['success']}</div>
				<div class="success">$successmessage</div>
			</div>
		</if>

		<if $message != ''>
			<div class="errorcontainer bradius">
				<div class="errortitle">{\Froxlor\I18N\Lang::getAll()['error']['error']}</div>
				<div class="error">$message</div>
			</div>
		</if>

		<section class="loginsec">
			<form method="post" action="$filename" enctype="application/x-www-form-urlencoded">
				<input type="hidden" name="script" value="{$lastscript}" />
				<input type="hidden" name="qrystr" value="{$lastqrystr}" />
				<fieldset>
				<legend>Froxlor&nbsp;-&nbsp;Login</legend>
				<p>
					<label for="loginname">{\Froxlor\I18N\Lang::getAll()['login']['username']}:</label>&nbsp;
					<input type="text" name="loginname" id="loginname" value="" required/>
				</p>
				<p>
					<label for="password">{\Froxlor\I18N\Lang::getAll()['login']['password']}:</label>&nbsp;
					<input type="password" name="password" id="password" required/>
				</p>
				<p>
					<label for="language">{\Froxlor\I18N\Lang::getAll()['login']['language']}:</label>&nbsp;
					<select name="language" id="language">$language_options</select>
				</p>
				<p class="submit">
					<input type="hidden" name="send" value="send" />
					<input type="submit" value="{\Froxlor\I18N\Lang::getAll()['login']['login']}" />
				</p>
				</fieldset>
			</form>

			<aside>
				<if \Froxlor\Settings::Get('panel.allow_preset') == '1'>
					<a href="$filename?action=forgotpwd">{\Froxlor\I18N\Lang::getAll()['login']['forgotpwd']}</a>
				<else>
					&nbsp;
				</if>
			</aside>

		</section>

	</article>
$footer
