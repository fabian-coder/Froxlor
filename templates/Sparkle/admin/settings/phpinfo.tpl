$header
<article>
		<header>
			<h2>
				<img src="templates/{$theme}/assets/img/icons/res_recalculate_big.png" alt="" />&nbsp;
				{\Froxlor\I18N\Lang::getAll()['admin']['phpinfo']}
			</h2>
		</header>

		<section>
			<table class="full">
				{$phpinfo}
			</table>
		</section>
</article>
$footer
