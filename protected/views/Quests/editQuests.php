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
	echo $form->label($modelPages,'id_page');
	echo $form->textField($modelPages, 'id_page');
	$this->endWidget();
	?>
</div>
</div>
<?
echo CHtml::button('Добавить страницу',array('id'=>'addPage'));
echo CHtml::button('Добавить кнопку',array('id'=>'addButton'));

?>
<div class="button" id="button">

</div>

<?
Yii::app()->getClientScript()->registerCoreScript('jquery');
?>
<script>
	//тут мы добавляем страничку квеста

	$("#addPage").click(function(){
		arrBut=attrBut();
		$.ajax({
				type:"get",
				url:"/Quests/addPage",
				data: {'button':JSON.stringify(arrBut),'text':$("#Page_text").val(),'idQuests':<? echo $id; ?>,'id_page':$("#Page_id_page").val()},
				response:"text",
				success: function(data){
					$("#button").html(data)
				}
			}
		)
	});
		//тут мы добавляем кнопки
	$("#addButton").click(function(){
		var div = document.getElementById('button');
		var elems = div.getElementsByTagName('*');
		var nextID=(elems.length)+1;
		page=prompt("Станичка");
		$("div.button").append("<button id=0>Кнопка</button>");
		$("#0").attr('id',nextID);
		$("#"+nextID).attr('idpage',page)
	});

		//тут собираеам атрибуты кнопки
	attrBut = function () {
		var div = document.getElementById('button');
		var elems = div.getElementsByTagName('*');
		var arrBut = {};
		for (var i = 0; i < elems.length; i++) {
			key = i+1;
			arrBut['but' + key] = {
				idPage: $(elems[i]).attr('idpage')
			};
		}
		return arrBut;
	}
</script>