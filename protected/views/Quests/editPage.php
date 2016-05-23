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

<h1>Создание квестов</h1>
	<?php $form=$this->beginWidget('CActiveForm');?>
<div class="row">
	<?
	echo CHtml::label($modelQuest->name,'name');
	$modelPages->button=json_decode($modelPages->button,true);
	foreach($modelPages->button as $button){
		echo CHtml::button('На страницу'.$button['idPage'],array('label'=>'На страницу'.$button['idPage'], 'idPage'=>$button['idPage']));
	}
	?>
	</div>
<div id="redactor">
<div class="row">
	<?
	echo CHtml::label('Текст','text');
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
	echo $form->label($modelPages,'id_page');
	echo $form->textField($modelPages, 'id_page');
	$this->endWidget();
	?>
</div>
</div>
<?
echo CHtml::button('Отрелактировать страницу',array('id'=>'addPage'));
echo CHtml::button('Добавить кнопку',array('id'=>'addButton'));

?>
<div class="button" id="button">

</div>

<?

Yii::app()->getClientScript()->registerCoreScript('jquery');
?>
<script>

	//создаем созданые кнопки


	//тут мы добавляем страничку квеста

	$("#addPage").click(function(){
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