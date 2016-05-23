<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */
$this->pageTitle=Yii::app()->name . ' - Квест';
$this->breadcrumbs=array(
	'Квест',
);
?>

<h1>Редактирование квеста</h1>

<?
echo CHtml::button('Создать страницу',array('label'=>'Создать страницу','submit' =>Yii::app()->createUrl("/Quests/AddPage", array('id' => $modelQuest->id))));
$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider' => $data,
	'columns' => array(
		array(
			'name' => 'id_page',
			'type' => 'raw',
			'value' =>
				'CHtml::link($data->id,
	array("Quests/editPage","id" => $data->id))'
		),

	)
));
Yii::app()->getClientScript()->registerCoreScript('jquery');
?>
