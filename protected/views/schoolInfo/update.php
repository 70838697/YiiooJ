<?php
$this->breadcrumbs=array(
	'SchoolInfos'=>array('index'),
	$model->user_id=>array('view','id'=>$model->user_id),
	'Update',
);

if(UUserIdentity::isAdmin()||UUserIdentity::isCommonUser())
{
	$this->menu=array(
		array('label'=>'Update SchoolInfo','visible'=>UUserIdentity::isAdmin()||UUserIdentity::isCommonUser(), 'url'=>array('update', 'id'=>$model->user_id)),
		array('label'=>'Delete SchoolInfo', 'visible'=>UUserIdentity::isAdmin(), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user_id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Manage SchoolInfo', 'visible'=>UUserIdentity::isAdmin(), 'url'=>array('admin')),
	);
}
?>

<h1>Update SchoolInfo <?php echo $model->user_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'units'=>$units)); ?>