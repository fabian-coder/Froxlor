$header
<div class="messagewrapper">
	<form action="$yesfile" method="post">
		<div class="warningcontainer bradius">
			<div class="warningtitle">{\Froxlor\I18N\Lang::getAll()['question']['question']}</div>
			<div class="warning">
				$text
				<div>
					<input type="hidden" name="s" value="$s" />
					<input type="hidden" name="send" value="send" />
					{$hiddenparams}
					<input type="submit" name="submitbutton" value="{\Froxlor\I18N\Lang::getAll()['panel']['yes']}" />&nbsp;
					<input type="button" class="nobutton" value="{\Froxlor\I18N\Lang::getAll()['panel']['no']}" id="historyback" />
				</div>
			</div>
		</div>
	</form>
</div>
$footer
