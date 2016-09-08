<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Квест';
$this->breadcrumbs=array(
	'Квест',
);
?>

<h1>Просмотр квеста</h1>
	<?php $form=$this->beginWidget('CActiveForm');?>
<div class="row">
	<?
	echo CHtml::label($modelQuest->name,'name');
	?>
	</div>
<div id="redactor">
<div class="row">
	<?
	$this->endWidget();
	?>
</div>
</div>
<?
echo CHtml::button('Начать',array('label'=>'Начать','onClick'=>'location.href="/Quests/ReviewQuests/'.
	Page::model()->find('quests_id='.$modelQuest->id .' and id_page=1')->id.'"'));
?>
