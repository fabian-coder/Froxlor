		<tr class="top">
			<td>
				<b><if $admin['adminid'] != \Froxlor\User::getAll()['userid']><a href="{$linker->getLink(array('section' => 'admins', 'page' => 'admins', 'action' => 'su', 'id' => $admin['adminid']))}" target="_blank">{$admin['loginname']}</a></if><if $admin['adminid'] == \Froxlor\User::getAll()['userid']>{$admin['loginname']}</if></b>
			</td>
			<td>
				{\Froxlor\I18N\Lang::getAll()['admin']['customers']}: <span <if $admin['customers_used'] == $admin['customers_used_new']>class="green"<else>class="red"</if>><b>{$admin['customers_used']} -&gt; {$admin['customers_used_new']}</b></span><br />
				{\Froxlor\I18N\Lang::getAll()['customer']['domains']}: <span <if $admin['domains_used'] == $admin['domains_used_new']>class="green"<else>class="red"</if>><b>{$admin['domains_used']} -&gt; {$admin['domains_used_new']}</b></span><br />
				{\Froxlor\I18N\Lang::getAll()['customer']['subdomains']}: <span <if $admin['subdomains_used'] == $admin['subdomains_used_new']>class="green"<else>class="red"</if>><b>{$admin['subdomains_used']} -&gt; {$admin['subdomains_used_new']}</b></span><br />
				{\Froxlor\I18N\Lang::getAll()['customer']['diskspace']}: <span <if $admin['diskspace_used'] == $admin['diskspace_used_new']>class="green"<else>class="red"</if>><b>{$admin['diskspace_used']} -&gt; {$admin['diskspace_used_new']}</b></span><br />
				{\Froxlor\I18N\Lang::getAll()['customer']['traffic']}: <span <if $admin['traffic_used'] == $admin['traffic_used_new']>class="green"<else>class="red"</if>><b>{$admin['traffic_used']} -&gt; {$admin['traffic_used_new']}</b></span><br />
				{\Froxlor\I18N\Lang::getAll()['customer']['mysqls']}: <span <if $admin['mysqls_used'] == $admin['mysqls_used_new']>class="green"<else>class="red"</if>><b>{$admin['mysqls_used']} -&gt; {$admin['mysqls_used_new']}</b></span>
			</td>
			<td>
				{\Froxlor\I18N\Lang::getAll()['customer']['emails']}: <span <if $admin['emails_used'] == $admin['emails_used_new']>class="green"<else>class="red"</if>><b>{$admin['emails_used']} -&gt; {$admin['emails_used_new']}</b></span><br />
				{\Froxlor\I18N\Lang::getAll()['customer']['accounts']}: <span <if $admin['email_accounts_used'] == $admin['email_accounts_used_new']>class="green"<else>class="red"</if>><b>{$admin['email_accounts_used']} -&gt; {$admin['email_accounts_used_new']}</b></span><br />
				{\Froxlor\I18N\Lang::getAll()['customer']['forwarders']}: <span <if $admin['email_forwarders_used'] == $admin['email_forwarders_used_new']>class="green"<else>class="red"</if>><b>{$admin['email_forwarders_used']} -&gt; {$admin['email_forwarders_used_new']}</b></span><br />
				<if \Froxlor\Settings::Get('system.mail_quota_enabled') == 1>
				{\Froxlor\I18N\Lang::getAll()['customer']['email_quota']}: <span <if $admin['email_quota_used'] == $admin['email_quota_used_new']>class="green"<else>class="red"</if>><b>{$admin['email_quota_used']} -&gt; {$admin['email_quota_used_new']}</b></span><br />
				</if>
				{\Froxlor\I18N\Lang::getAll()['customer']['ftps']}: <span <if $admin['ftps_used'] == $admin['ftps_used_new']>class="green"<else>class="red"</if>><b>{$admin['ftps_used']} -&gt; {$admin['ftps_used_new']}</b></span><br />
			</td>
		</tr>
