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
	echo CHtml::label($modelPages->quests->name,'name');
	echo CHtml::label($modelPages->text,'text');

	?>
	</div>

<div class="button" id="buttonQuests" style="background: #efefef">
	<?

	$buttons=json_decode($modelPages->button,true);
	if($buttons) {
		foreach ($buttons as $id => $button) {
			echo CHtml::button($button['text'], array('label' => $button['text'], 'onClick'=>'location.href="/Quests/ReviewQuests/'.$button['idPage'].'"', 'id' => $id));
		}
	}
	?>
</div>
<div class="row">
	<?
	$this->endWidget();
	?>
</div>

<?

?>
<div class="button" id="button">

</div>

<?
Yii::app()->getClientScript()->registerCoreScript('jquery');
?>
<script>

</script>