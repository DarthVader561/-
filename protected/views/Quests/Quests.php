<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Квест';
$this->breadcrumbs=array(
	'Квест',
);
?>

<h1>Создание квестов</h1>
<p>
Создай квест
</p>

<div>
	<?

	echo CHtml::button('Создать квест',array('label'=>'Создать квест','onClick'=>'location.href="/Quests/addQuest"'));
	$this->widget('zii.widgets.grid.CGridView', array(
		'dataProvider' => $modelQuest->search(),
		'columns' => array(
			array(
				'name' => 'name',
				'type' => 'raw',
				'value' =>
					 'CHtml::link($data->name,
	array("Quests/editQuests","id" => $data->id))'
			),
		)
	));
	?>
</div>

