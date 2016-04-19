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
		$this->render('EditQuests',array('modelQuest'=> $modelQuest, 'modelPages' => $modelPages, 'id'=>$id));
	}

	public function actionAddPage()
	{
		$page = new Page();
		$page->button = $_GET['button'];
		$page->quests_id = json_decode($_GET['idQuests'], true);
		$page->text = $_GET['text'];
		$page->save();
	}

	public function actionReviewQuests($id)
	{
		$modelQuest = Quests::model()->findByPk($id);
		$modelPages =  Page::model()->find('quests_id='.$id);
		/*	$modelPages->quests_id = $id;
            $modelPages->text=$_POST['page']['text'];*/
		$this->render('ReviewQuests',array('modelQuest'=> $modelQuest, 'modelPages' => $modelPages, 'id'=>$id));
	}




}