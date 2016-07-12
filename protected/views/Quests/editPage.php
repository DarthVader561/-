<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */
Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget');
$this->pageTitle=Yii::app()->name . ' - Квест';
$this->breadcrumbs=array(
	'Квест',
);
?>

<h1>Редактирование страницы</h1>
	<?php $form=$this->beginWidget('CActiveForm');?>
<div class="row">
	<?

	echo CHtml::label($modelQuest->name,'name');

	?>
	</div>
<div id="redactor">
<div class="row">
	<?
	$this->widget('ImperaviRedactorWidget', array(
		//используем модель
		'model' => $modelPages, //модель
		'attribute' => 'text', //имя поля
		//или просто для поля ввода 'name' => 'inputName',
		'name' => 'my_input_name',
		// Настройки виджета, подробнее: http://imperavi.com/redactor/docs/
		'options' => array(
			'lang' => 'en',
			'toolbar' => true,
			'iframe' => true,
			'Width' => '400px'
		),
	));



	?>
</div>
</div>
<?
echo CHtml::button('Добавить кнопку',array('id'=>'addButton'));
echo $form->hiddenField($modelPages,'button');
echo  CHtml::submitButton('Отредактировать');
$this->endWidget();




?>
<div class="button" id="button">
	<?

	$buttonn=json_decode($modelPages->button,true);
	if($buttonn) {
		foreach ($buttonn as $button) {
			echo CHtml::button($button['text'], array('label' => $button['text'] . $button['idPage'], 'idPage' => $button['idPage']));
		}
	}
	?>
</div>

<?

Yii::app()->getClientScript()->registerCoreScript('jquery');
?>
<script>

	//создаем созданые кнопки


	//тут мы добавляем страничку квеста

/*	$("#addPage").click(function(){
		arrBut=attrBut();
		$.ajax({
				type:"get",
				url:"/Quests/EditPage",
				data: {'button':JSON.stringify(arrBut),'text':$("#my_input_name").val(),'idQuests':<? echo $id; ?>,'id_page':$("#Page_id_page").val()},
				response:"text",
				success: function(data){
					$("#button").html(data)
				}
			}
		)
	});*/
		//тут мы добавляем кнопки
	$("#addButton").click(function(){
		var div = document.getElementById('button');
		var elems = div.getElementsByTagName('*');
		var nextID=(elems.length)+1;
		page=prompt("Станичка");
		text = prompt("текст кнопки");
		$("div.button").append("<button id=0>text</button>");
		$("#0").attr('id',nextID);
		$("#"+nextID).attr('idpage',page)
		attrBut()
	});

		//тут собираеам атрибуты кнопки
	attrBut = function () {
		var div = document.getElementById('button');
		var elems = div.getElementsByTagName('*');
		var arrBut = {};
		for (var i = 0; i < elems.length; i++) {
			key = i+1;
			arrBut['but' + key] = {
				idPage: $(elems[i]).attr('idpage'),
				text: $(elems[i]).text()
			};
		}
		$("#Page_button").val(JSON.stringify(arrBut))
	}
	attrBut()
</script>