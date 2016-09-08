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
		$thisPage=$modelPages->search($id);
		/*	$modelPages->quests_id = $id;
            $modelPages->text=$_POST['page']['text'];*/
		$this->render('EditQuests',array('modelQuest'=> $modelQuest, 'modelPages' => $modelPages, 'id'=>$id, 'data'=>$thisPage));
	}

	public function actionAddPage($id)
	{
		$modelQuest = Quests::model()->findByPk($id);
		$modelPages = new Page();

		if(isset($_POST['Page'])){

			$modelPages->button=$_POST['Page']['button'];
			$modelPages->text=$_POST['Page']['text'];
			$modelPages->quests_id=$id;
			if($modelPages->validate()){
				$modelPages->save();
				$this->redirect('/Quests/editQuests/'.$id);
			}

		}
	/*	$modelPages->quests_id = $id;
		$modelPages->text=$_POST['page']['text'];*/
		$this->render('AddPage',array('modelQuest'=> $modelQuest, 'modelPages' => $modelPages, 'id'=>$id));
	}

	public function actionEditPage($id)
	{
		$modelPages = Page::model()->findByPk($id);
		$modelQuest = $modelPages->quests;


		if(isset($_POST['Page'])){

			$modelPages->button=$_POST['Page']['button'];
			$modelPages->text=$_POST['Page']['text'];

			if($modelPages->validate()){
				$modelPages->save();
				$this->redirect('/Quests/editQuests/'.$modelQuest->id);
			}

		}

		$this->render('EditPage',array('modelQuest'=> $modelQuest, 'modelPages' => $modelPages, 'id'=>$id));
	}


	public function actionQuestsInfo($id)
	{
		$modelQuest = Quests::model()->findByPk($id);
		/*	$modelPages->quests_id = $id;
            $modelPages->text=$_POST['page']['text'];*/
		$this->render('QuestsInfo',array('modelQuest'=> $modelQuest, 'id'=>$id));
	}

	public function actionReviewQuests($id)
	{
		$modelPages =  Page::model()->findByPk($id);

		$this->render('ReviewQuests',array('modelPages' => $modelPages, 'id'=>$id));
	}




}