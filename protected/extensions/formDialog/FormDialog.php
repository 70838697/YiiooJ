<?php


Yii::import('zii.widgets.jui.CJuiWidget');

class FormDialog extends CJuiWidget
{
	public $link;
	public $options;
	public function run()
	{
		if (!isset($this->options['id']))
		{
			$this->options['id']=$this->getId();
		}
		if (!isset($this->options['onSuccess']))
			$this->options['onSuccess']='js:function(data, e){alert("Success")}';
		UCHtml::addYiiGridViewScriptsForAjax();
		Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.extensions.formDialog.formDialog').'.js'));
		$options= CJavaScript::encode($this->options);
		Yii::app()->clientScript->registerScript('FormDialog'.$this->link, "$('{$this->link}').formDialog({$options})");
	}
	
}

