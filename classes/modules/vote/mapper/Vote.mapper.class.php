<?php
/**
 * ShowVotes
 * by Stanislav Nevolin, stanislav@nevolin.info
 */
class PluginShowvotes_ModuleVote_MapperVote extends Mapper {
	public function GetTopicVoters($oTopic) {
		$sql = "
			SELECT * FROM " . Config::Get('db.table.vote') . "
			WHERE
					target_type = 'topic'
				AND
					target_id = ?d
		";
		$aResult = array();
		if ($aVotes = $this->oDb->select($sql, $oTopic->getId())) {
			foreach ($aVotes as $aVote) {
				$aResult[] = Engine::GetEntity('ModuleVote_EntityVote', $aVote);
			}
		}
		return $aResult;
	}
}
?>