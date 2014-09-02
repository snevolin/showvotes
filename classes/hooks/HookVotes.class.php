<?php
/**
 * ShowVotes
 * by Stanislav Nevolin, stanislav@nevolin.info
 */
class PluginShowvotes_HookVotes extends Hook {
	public function RegisterHook() {
		$this->AddHook('template_topic_show_end', 'VotesShow');
	}
	public function VotesShow($aParams) {
		$oTopic = $aParams['topic'];
		$aVotes = $this->PluginShowvotes_ModuleVote_GetTopicVoters($oTopic);
		if ($aVotes) {
			$this->Viewer_Assign('aVotes', $aVotes);
			return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__) . 'topic_voters.tpl');
		}
	}
}
?>