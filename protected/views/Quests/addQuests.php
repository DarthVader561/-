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
<div class="form">
	<?php $form=$this->beginWidget('CActiveForm');?>
<div class="row">
	<?
	echo $form->label($modelQuest,'name',array('title'=>'имя'));
	echo $form->textField($modelQuest,'name');
	echo  CHtml::submitButton('Создать');
	?>
	</div>
	<?

	$this->endWidget();
	echo CHtml::button('ajax',array('id'=>'12'))
	?>
</div>
<div id="redactor">

</div>
<?
Yii::app()->getClientScript()->registerCoreScript('jquery');
?>
<script>
$("#12").click(function(){
	$.ajax({
		type:"get",
		url:"./addPage",
		data:"idQ=1",
		resonse:"text",
		success: function(data){
		$("#redactor").html(data)
		}
	}
)})
</script>