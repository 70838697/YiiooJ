<?php
$this->homelink=CHtml::link(CHtml::encode($model->course->title),array('/course/view','id'=>$model->course_id,'class_room_id'=>$model->id), array('class'=>'home'));
$this->breadcrumbs=array(
	CHtml::encode($model->title)."(".$this->classRoom->begin.")"=>array('view','id'=>$model->id),
	Yii::t("t",'Experiments')
);

$this->toolbar= array(
	array(
		'label'=>Yii::t('t','Add an experiment'),
		'icon-position'=>'left',
		'icon'=>'circle-plus', // This a CSS class starting with ".ui-icon-"
		'url'=>array('/experiment/create/'.$model->id),
		'visible'=>(UUserIdentity::isTeacher()) ||UUserIdentity::isAdmin(),
	),
	array(
		'label'=>Yii::t('course','View students'),
		'icon-position'=>'left',
		'visible'=>(UUserIdentity::isTeacher()&& $model->user_id==Yii::app()->user->id) ||UUserIdentity::isAdmin(),
		'icon'=>'document',
		'url'=>array('/classRoom/students/'.$model->id),
	),
	array(
		'label'=>Yii::t('course','View reports'),
		'icon-position'=>'left',
		'visible'=>(UUserIdentity::isTeacher()&& $model->user_id==Yii::app()->user->id) ||UUserIdentity::isAdmin(),
		'icon'=>'document',
		'url'=>array('/classRoom/reports/'.$model->id),
	),
	/*
	 array(
	 	'label'=>Yii::t('course','Class information'),
	 	'icon-position'=>'left',
	 	'icon'=>'document',
	 	'url'=>array('/classRoom/view/'.$model->id.''),
	 ),*/
);

?>
<center><font size='6'><?php echo CHtml::encode($model->title);?></font></center>
<table>
	<tr>
	<td><b><?php echo CHtml::encode($model->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($model->userinfo->lastname.$model->userinfo->firstname),array('/schoolInfo/view', 'id'=>$model->userinfo->user_id)); ?> | <?php echo CHtml::link(Yii::t('main',"send a message"), array("message/compose/". $model->user_id));?>
	<td><center><b><?php echo CHtml::encode($model->getAttributeLabel('due_time')); ?>:</b>
	<?php echo CHtml::encode($model->due_time); ?></center></td>
	<td align="right"><b><?php echo CHtml::encode($model->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($model->location); ?></td>
	</tr>
</table>

<?php if(!(Yii::app()->user->isGuest)){?>
<div id="experiments">
		<h3>
			<?php echo count($model->experiments)!=1 ? count($model->experiments) . ' experiments' : 'One experiment'; ?>
		</h3>

	<?php if(count($model->experiments)>=1): ?>
		<?php $this->renderPartial('_experiments',array(
			'classRoom'=>$model,
			'experiments'=>$model->experiments,
		)); ?>
	<?php endif; ?>
</div><!-- experiment -->
<?php 
if($experiment!=null){
echo CHtml::script('
function showDialogue()
{
	$("#submitiondialog").dialog("open");
	//this.blur();
	return false;	
}
');

if(Yii::app()->user->hasFlash('experimentSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('experimentSubmitted'); ?>
		</div>
<?php endif;	
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'submitiondialog',
    'options'=>array(
		'dialogClass'=>'rbam-dialog',
        'title'=>Yii::t('course','Create an experiment'),
        'autoOpen'=>$experiment->hasErrors(),
		'minWidth'=>800,
		'height'=>700,
		'modal'=>true,
    ),
));
?>
		<?php $this->renderPartial('/experiment/_form',array(
			'model'=>$experiment,
		)); ?>

<?php 
	$this->endWidget('zii.widgets.jui.CJuiDialog');
}
?>
<?php } ?>

