 $header
	<article>
		<header>
			<h2>
				<img src="templates/{$theme}/assets/img/icons/mysql_big.png" alt="" />&nbsp;
				{\Froxlor\I18N\Lang::getAll()['menue']['mysql']['databases']}&nbsp;({$mysqls_count})
			</h2>
		</header>

		<section>

			<form action="{$linker->getLink(array('section' => 'mysql'))}" method="post" enctype="application/x-www-form-urlencoded">
				<input type="hidden" name="s" value="$s" />
				<input type="hidden" name="page" value="$page" />

				<div class="overviewsearch">
					{$searchcode}
				</div>
		
				<if (\Froxlor\User::getAll()['mysqls_used'] < \Froxlor\User::getAll()['mysqls'] || \Froxlor\User::getAll()['mysqls'] == '-1') >
				<div class="overviewadd">
					<img src="templates/{$theme}/assets/img/icons/add.png" alt="" />&nbsp;
					<a href="{$linker->getLink(array('section' => 'mysql', 'page' => 'mysqls', 'action' => 'add'))}">{\Froxlor\I18N\Lang::getAll()['mysql']['database_create']}</a>
				</div>
				</if>
	
				<table class="full hl">
					<thead>
						<tr>
							<th>{\Froxlor\I18N\Lang::getAll()['mysql']['databasename']}&nbsp;{$arrowcode['databasename']}</th>
							<th>{\Froxlor\I18N\Lang::getAll()['mysql']['databasedescription']}&nbsp;{$arrowcode['description']}</th>
							<th>{\Froxlor\I18N\Lang::getAll()['mysql']['size']}</th>
							<if 1 < $count_mysqlservers><th>{\Froxlor\I18N\Lang::getAll()['mysql']['mysql_server']}</th></if>
							<th>{\Froxlor\I18N\Lang::getAll()['panel']['options']}</th>
						</tr>
					</thead>

					<if $pagingcode != ''>
					<tfoot>
						<tr>
							<td colspan="5">{$pagingcode}</td>
						</tr>
					</tfoot>
					</if>

					<tbody>
						{$mysqls}
					</tbody>
				</table>
			</form>

			<if (\Froxlor\User::getAll()['mysqls_used'] < \Froxlor\User::getAll()['mysqls'] || \Froxlor\User::getAll()['mysqls'] == '-1') && 15 < $mysqls_count >
			<div class="overviewadd">
				<img src="templates/{$theme}/assets/img/icons/add.png" alt="" />&nbsp;
				<a href="{$linker->getLink(array('section' => 'mysql', 'page' => 'mysqls', 'action' => 'add'))}">{\Froxlor\I18N\Lang::getAll()['mysql']['database_create']}</a>
			</div>
			</if>

		</section>
	</article>
$footer

