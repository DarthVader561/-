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


<p>
Создай квест
</p>

<div class="form">
	<?
	CHtml::button('Создать квест',array('label'=>'Создать квест'))
	?>
</div>

