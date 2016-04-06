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
	<?php $form=$this->beginWidget('CActiveForm');?>
<div class="row">
	<?
	echo CHtml::label($modelQuest->name,'name');

	?>
	</div>
<div id="redactor">
<div class="row">
	<?
	echo CHtml::label('Текст','text');
	echo $form->textArea($modelPages, 'text');
	$this->endWidget();

	?>
</div>
</div>
<?
echo CHtml::button('Добавить страницу',array('id'=>'addPage'))
?>



<?
Yii::app()->getClientScript()->registerCoreScript('jquery');
?>
<script>
	$("#addPage").click(function(){
		$.ajax({
				type:"get",
				url:"/Quests/addPage",
				data:"idQ=1",
				resonse:"text",
				success: function(data){
					$("#redactor").html(data)
				}
			}
		)})
</script>