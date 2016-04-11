<?php

class QuestsController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$modelQuest = new Quests();
		$this->render('Quests',array('modelQuest'=> $modelQuest));
	}
	public function actionAddQuest()
	{
		$modelQuest = new Quests();
		$modelPages = new Page();
		if(isset($_POST)){
			$modelQuest->attributes = $_POST['Quests'];
			if($modelQuest->validate()){
				$modelQuest->save();
				$this->redirect('index');
			}
		}
		$this->render('AddQuests',array('modelQuest'=> $modelQuest, 'modelPages' => $modelPages));
	}

	public function actionEditQuests($id)
	{
		$modelQuest = Quests::model()->findByPk($id);
		$modelPages = new Page();
	/*	$modelPages->quests_id = $id;
		$modelPages->text=$_POST['page']['text'];*/
		$this->render('EditQuests',array('modelQuest'=> $modelQuest, 'modelPages' => $modelPages));
	}

	public function actionAddPage(){
		//echo json_decode($_GET['but']["but0"],true);
		$test=json_decode($_GET['but'],true);
		//var_dump($test);
		var_dump($test['but0']);

	}


}