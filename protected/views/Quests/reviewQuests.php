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
	echo CHtml::label($modelPages->text,'text')
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

?>
<div class="button" id="button">

</div>

<?
Yii::app()->getClientScript()->registerCoreScript('jquery');
?>
<script>

</script>