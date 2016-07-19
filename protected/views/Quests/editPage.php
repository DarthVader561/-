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
<div class="button">
	<!-- Див с кнопками для квеста -->
	<div class="button" id="buttonQuests" style="background: #efefef">
		<?

		$buttonn=json_decode($modelPages->button,true);
		if($buttonn) {
			foreach ($buttonn as $id => $button) {
				echo CHtml::button($button['text'], array('label' => $button['text'] . $button['idPage'], 'idPage' => $button['idPage'], 'id' => $id));
			}
		}
	?>
	</div>
	<!-- Див для выбора атрибутиов кнопок -->
	<div class="button" id="attrButton" redactBut="none" redacAttr="none" style="display: none">
		<?
		echo CHtml::button('Имя',array('id' => 'text'));
		echo CHtml::button('Id',array('id' => 'idPage')) . '<br>';
		?>
		<!-- Див для изменения кнопок -->
		<div class="button" id="redactButton" style="display: none">
		<?
		echo CHtml::label('Свойство','');
		echo CHtml::textField('valAttr','',array('attribut'=>''));
		echo CHtml::button('Применить',array('id' => 'attrEnter'))
		?>
		</div>
	</div>
	<?

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

	//редактирую сво-во кнопки
		$("#attrEnter").bind('click', function(){
			switch ($("#attrButton").attr('redacAttr')) {
				//перезаписываю сво-во
				case 'value':
					$("#"+$("#attrButton").attr('redactBut')).attr('value',$("#valAttr").val());
					attrBut()
					break;
				case 'idPage':
					$("#"+$("#attrButton").attr('redactBut')).attr('idPage',$("#valAttr").val());
					attrBut()
					break;
			}
			$("#valAttr").val("")
			$("#redactButton").hide()
			$("#attrButton").hide()
		});


	//Добавляю событие на кнопки редактирования
	$(document).ready(function()  {
		$("#attrButton input").bind('click', function(){
			switch (this.id) {
				// в сво-во дива записываю атрибут, который хочу редактировать
				case 'text':
					$("#attrButton").attr('redacAttr','value');
					$("#attrButton label").text("Название кнопки")
					break;
				case 'idPage':
					$("#attrButton label").text("Направление кнопки")
					$("#attrButton").attr('redacAttr','idPage');
					break;
			}

			$("#redactButton").show()
		});
	})

	//открываю панель редактирования
	addButtonEvent = function() {
		$("#buttonQuests input").bind('click', function(){
			// в сво-во дива записываю id кнопки, которую собираемся редактировать
			$("#attrButton").attr('redactBut',this.id);
			$("#attrButton").show()

		});
	};
	addButtonEvent();

		//тут мы добавляем кнопки
	$("#addButton").click(function(){
		var nextID = $("#buttonQuests").find('input').length+1;
		page=prompt("Станичка");
		text = prompt("текст кнопки");
		$("#buttonQuests").append("<input type='button' value="+text+" id=0>");
		$("#0").attr('id',nextID);
		$("#"+nextID).attr('idpage',page);
		attrBut()
		addButtonEvent()

	});


		//тут собираеам атрибуты кнопки
	attrBut = function () {
		var elems = $("#buttonQuests").find('input');
		var arrBut = {};
		for (var i = 0; i < elems.length; i++) {
			key = i+1;
			arrBut['but' + key] = {
				idPage: $(elems[i]).attr('idpage'),
				text: $(elems[i]).val()
			};
		}
		$("#Page_button").val(JSON.stringify(arrBut))
	}
	attrBut()
</script>