<tr>
	<td>{$description}</td>
	<td>{$row['lastrun']}</td>
	<td>{$row['interval']}</td>
	<td>{$row['isactive']}</td>
	<td>
		<a href="{$linker->getLink(array('section' => 'cronjobs', 'page' => $page, 'action' => 'edit', 'id' => $row['id']))}">
			<img src="templates/{$theme}/assets/img/icons/edit.png" alt="{\Froxlor\I18N\Lang::getAll()['panel']['edit']}" title="{\Froxlor\I18N\Lang::getAll()['panel']['edit']}" />
		</a>
	</td>
</tr>
