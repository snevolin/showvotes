<?php
/**
 * ShowVotes
 * by Stanislav Nevolin, stanislav@nevolin.info
 */
class PluginShowvotes_ModuleVote extends Module {
	public function Init() {
		$this->oMapper = Engine::GetMapper(__CLASS__);
	}
	public function GetTopicVoters($oTopic) {
		$oUserCurrent = $this->User_GetUserCurrent();
		switch (Config::Get('plugin.showvotes.can_see')) {
			case 'admin':	if (!$oUserCurrent || !$oUserCurrent->isAdministrator()) {
											return array();
										}
										break;
			case 'author':	if (!$oUserCurrent || (!$oUserCurrent->isAdministrator() && $oUserCurrent->getId() != $oTopic->getUserId())) {
											return array();
										}
										break;
			case 'user':	if (!$oUserCurrent) {
											return array();
										}
										break;
		}
		if (Config::Get('plugin.showvotes.topic_add_date_restriction') && !$this->CheckDate($oTopic)) {
			return array();
		}
		$aVotes = array();
		foreach(array('positive', 'neutral', 'negative') as $sDirection) {
			$iCount = 0;
			$aVotes[$sDirection] = $this->oMapper->GetTopicVotersByFilter($oTopic->getId(), array('direction' => $sDirection), $iCount, Config::Get('plugin.showvotes.' . $sDirection . '_display_limit'));
			$aVotes[$sDirection . '_count'] = $iCount;
			$aVotes[$sDirection . '_overcount'] = ($iCount > Config::Get('plugin.showvotes.' . $sDirection . '_display_limit'));
			array_map(function($oVote) {
				$oVote->setUser($this->User_GetUserById($oVote->getVoterId()));
			}, $aVotes[$sDirection]);
		}
	
		return $aVotes;
	}
	private function CheckDate($oTopic) {
		$oConfigDate = date_create(Config::Get('plugin.showvotes.available_from_date'));
		$oTopicDate = date_create($oTopic->getDateAdd());
		return ($oTopicDate > $oConfigDate);
	}
}
?>