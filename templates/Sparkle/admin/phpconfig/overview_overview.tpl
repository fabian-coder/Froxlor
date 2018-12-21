<tr class="top">
	<td><strong>{$row['description']}</strong></td>
	<td>{$domains}<if 0 < $subdomains_count><if !empty($domains)>+ </if>{$subdomains_count} {\Froxlor\I18N\Lang::getAll()['customer']['subdomains']}</if></td>
	<if \Froxlor\Settings::Get('phpfpm.enabled') == '1'>
		<td>{$row['fpmdesc']}</td>
	<else>
		<td>{$row['binary']}</td>
	</if>
	<td>{$row['file_extensions']}</td>
	<td>
		<a href="{$linker->getLink(array('section' => 'phpsettings', 'page' => $page, 'action' => 'edit', 'id' => $row['id']))}">
			<img src="templates/{$theme}/assets/img/icons/edit.png" alt="{\Froxlor\I18N\Lang::getAll()['panel']['edit']}" title="{\Froxlor\I18N\Lang::getAll()['panel']['edit']}" />
		</a>
		<if $row['id'] != 1>
		&nbsp;<a href="{$linker->getLink(array('section' => 'phpsettings', 'page' => $page, 'action' => 'delete', 'id' => $row['id']))}">
			<img src="templates/{$theme}/assets/img/icons/delete.png" alt="{\Froxlor\I18N\Lang::getAll()['panel']['delete']}" title="{\Froxlor\I18N\Lang::getAll()['panel']['delete']}" />
		</a>
		</if>
	</td>
</tr>
