{literal}
<style>
.topic .showvotes-positive { margin: 5px 10px; clear: both; }
.topic .showvotes-negative { margin: 5px 10px; clear: both; }
.topic .showvotes-neutral { margin: 5px 10px; clear: both; }
.topic .showvotes-positive li { color: green; display: inline; }
.topic .showvotes-negative li { color: red; display: inline; }
.topic .showvotes-neutral li { color: gray; display: inline; }
.topic .showvotes-positive li a { color: green; }
.topic .showvotes-negative li a { color: red; }
.topic .showvotes-neutral li a { color: gray; }
.topic .showvotes-positive div.count { float: left; text-align: right; width: 42px; color: green; margin-right: 5px; }
.topic .showvotes-negative div.count { float: left; text-align: right; width: 42px; color: red; margin-right: 5px; }
.topic .showvotes-neutral div.count { float: left; text-align: right; width: 42px; color: gray; margin-right: 5px; }
</style>
{/literal}


<div>
{if $aVotes.positive}
	<ul class="showvotes-positive">
	<div title="{$aLang.shv_positive}" class="count">+ ({$aVotes.positive_count}):</div>
{foreach from=$aVotes.positive item=oVote name=showvotes_list}
{assign var='oUser' value=$oVote->getUser()}
		<li><a href="{$oUser->getUserWebPath()}">{$oUser->getLogin()}</a>{if !$smarty.foreach.showvotes_list.last}, {/if}</li>
{/foreach}
	</ul>
{/if}

{if $aVotes.negative}
	<ul class="showvotes-negative">
	<div title="{$aLang.shv_negative}" class="count">- ({$aVotes.negative_count}):</div>
{foreach from=$aVotes.negative item=oVote name=showvotes_list}
{assign var='oUser' value=$oVote->getUser()}
		<li><a href="{$oUser->getUserWebPath()}">{$oUser->getLogin()}</a>{if !$smarty.foreach.showvotes_list.last}, {/if}</li>
{/foreach}
	</ul>
{/if}

{if $aVotes.neutral}
	<ul class="showvotes-neutral">
	<div title="{$aLang.shv_neutral}" class="count">/ ({$aVotes.neutral_count}):</div>
{foreach from=$aVotes.neutral item=oVote name=showvotes_list}
{assign var='oUser' value=$oVote->getUser()}
		<li><a href="{$oUser->getUserWebPath()}">{$oUser->getLogin()}</a>{if !$smarty.foreach.showvotes_list.last}, {/if}</li>
{/foreach}
	</ul>
{/if}
</div>