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
		$aVotes = $this->oMapper->GetTopicVoters($oTopic);
		$aResult = array();
		$aResult['positive_count'] = $aResult['neutral_count'] = $aResult['negative_count'] = 0;
		foreach($aVotes as &$oVote) {
			$oVote->setUser($this->User_GetUserById($oVote->getVoterId()));
			if ($oVote->getDirection() > 0) {
				$aResult['positive'][] = $oVote;
				$aResult['positive_count'] ++;
			} elseif ($oVote->getDirection() == 0) {
				$aResult['neutral'][] = $oVote;
				$aResult['neutral_count'] ++;
			} elseif ($oVote->getDirection() < 0) {
				$aResult['negative'][] = $oVote;
				$aResult['negative_count'] ++;
			}
		}
		return $aResult;
	}
	private function CheckDate($oTopic) {
		$oConfigDate = date_create(Config::Get('plugin.showvotes.available_from_date'));
		$oTopicDate = date_create($oTopic->getDateAdd());
		return ($oTopicDate > $oConfigDate);
	}
}
?>