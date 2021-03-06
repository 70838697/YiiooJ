<?php
	$this->breadcrumbs=array(
		'My classes'=>array('/classRoom/index/mine/1'),
		$model->experiment->classRoom->title=>array('/classRoom/'.$model->experiment->classRoom->id),
		'Experiments'=>array('/classRoom/experiments','id'=>$model->experiment->classRoom->id),	
		$model->experiment->title=>array('/experiment/'.$model->experiment->id),
		"Experiment Report",
	);

$this->menu=array(
	array('label'=>'List ExperimentReport', 'url'=>array('index')),
	array('label'=>'Create ExperimentReport', 'url'=>array('create')),
	array('label'=>'View ExperimentReport', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ExperimentReport', 'url'=>array('admin')),
);
?>
<?php
$canEdit=UUserIdentity::isAdmin()
	||Yii::app()->user->id==$model->user_id
	||(UUserIdentity::isTeacher()&&Yii::app()->user->id==$model->experiment->classRoom->user_id);

$this->toolbar=array(
	array(
		'label'=>Yii::t('main','Save'),
		'icon-position'=>'left',
		'icon'=>'plus', // This a CSS class starting with ".ui-icon-"
		'url'=>'#',
		'visible'=>$canEdit,
		'linkOptions'=>array('onclick'=>'return saver();',)
	),
	array(
		'label'=>Yii::t('main','Preview'),
		'icon-position'=>'left',
		'icon'=>'document', // This a CSS class starting with ".ui-icon-"
		'url'=>'#',
		'visible'=>$canEdit,
		'linkOptions'=>array('onclick'=>'return preview();',)
	),
	array(
		'label'=>Yii::t('main','Submit'),
		'icon-position'=>'left',
		'icon'=>'plus', // This a CSS class starting with ".ui-icon-"
		'url'=>'#',
		'visible'=>true,
		'linkOptions'=>array('onclick'=>'return submitr();',)
	),

);
echo CHtml::script('
function preview()
{
	$("#experiment-report-form").attr("target","_blank");
	var action=$("#experiment-report-form").attr("action");
	$("#experiment-report-form").attr("action",action+"/preview/1");
	$("#experiment-report-form").submit();
	$("#experiment-report-form").attr("action",action);
	$("#experiment-report-form").attr("target","");
	return false;
}
function submitr()
{
	if(confirm("Are you really want to submit the report?\r\n You will not be allowed to modify it then."))
	{
		var action=$("#experiment-report-form").attr("action");
		$("#experiment-report-form").attr("action",action+"/submited/1");
		$("#experiment-report-form").submit();
		$("#experiment-report-form").attr("action",action);
	}
	return false;	
}
function saver()
{
	$("#experiment-report-form").submit();
	return true;	
	
}
');
?>

<?php echo $this->renderPartial('_update', array('model'=>$model)); ?>