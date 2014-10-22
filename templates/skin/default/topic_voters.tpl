{assign var="oUser" value=$oTopic->getUser()}
{assign var="oVote" value=$oTopic->getVote()}
{if $oVote || ($oUserCurrent && $oTopic->getUserId() == $oUserCurrent->getId()) || strtotime($oTopic->getDateAdd()) < $smarty.now-$oConfig->GetValue('acl.vote.topic.limit_time')}
<li style="display: none;">
	<div id="showvote-info-topic-{$oTopic->getId()}">
		<ul class="vote-topic-info">

								<li><i class="icon-synio-vote-info-up"></i> {$oTopic->getCountVoteUp()}{if $aVotes.positive}: 
{foreach from=$aVotes.positive item=oVote name=showvotes_list}
{assign var='oUser' value=$oVote->getUser()}
								<a href="{$oUser->getUserWebPath()}">{$oUser->getLogin()}</a>{if !$smarty.foreach.showvotes_list.last}, {/if}
{/foreach}
{if $aVotes.positive_overcount}
, ...
{/if}
								</li>
{/if}
								<li><i class="icon-synio-vote-info-down"></i> {$oTopic->getCountVoteDown()}{if $aVotes.negative}: 
{foreach from=$aVotes.negative item=oVote name=showvotes_list}
{assign var='oUser' value=$oVote->getUser()}
								<a href="{$oUser->getUserWebPath()}">{$oUser->getLogin()}</a>{if !$smarty.foreach.showvotes_list.last}, {/if}
{/foreach}
{if $aVotes.negative_overcount}
, ...
{/if}
								</li>
{/if}
								<li><i class="icon-synio-vote-info-zero"></i> {$oTopic->getCountVoteAbstain()}{if $aVotes.neutral}: 
{foreach from=$aVotes.neutral item=oVote name=showvotes_list}
{assign var='oUser' value=$oVote->getUser()}
								<a href="{$oUser->getUserWebPath()}">{$oUser->getLogin()}</a>{if !$smarty.foreach.showvotes_list.last}, {/if}
{/foreach}
{if $aVotes.neutral_overcount}
, ...
{/if}
								</li>
{/if}
		</ul>
	</div>
</li>
{/if}