<!--
 Nested Set Admin GUI
 Form  View File  _form.php

This Form uses client validation.Check Yii Class Reference for rules supported by  client validation.
If your validation rule is not supported you may need to modify this file,possibly enabling
ajax validation -in this case you'll have to write the validation code in the controller.

 @author Spiros Kabasakalis <kabasakalis@gmail.com>,myspace.com/spiroskabasakalis
 @copyright Copyright &copy; 2011 Spiros Kabasakalis
 @since 1.0
 @license The MIT License-->
<div id="chapter_form_con"   class="client-val-form">
<?php if (isset($_POST['create_root']) && ($_POST['create_root']=='true') && $model->isNewRecord) : ?>              <h3 id="create_header">Create New Root Chapter </h3>
<?php elseif ($model->isNewRecord) : ?>     <h3 id="create_header">Create New Chapter </h3>
     <?php  elseif (!$model->isNewRecord):  ?>     <h3 id="update_header">Update Chapter <?php  echo $model->name;  ?> (ID:<?php   echo $model->id;  ?>) </h3>
    <?php   endif;  ?>
    <div   id="success-chapter" class="notification success png_bg" style="display:none;">
				<a href="#" class="close"><img src="<?php echo Yii::app()->request->baseUrl.'/css/images/icons/cross_grey_small.png';  ?>"
                                                                title="Close this notification" alt="close" /></a>
			</div>

<div  id="error-chapter" class="notification errorshow png_bg" style="display:none;">
				<a href="#" class="close"><img src="<?php echo Yii::app()->request->baseUrl.'/css/images/icons/cross_grey_small.png';  ?>"
                                                                title="Close this notification" alt="close" /></a>
			</div>

<div class="form">
<?php
$formId='chapter-form';
 $ajaxUrl=($model->isNewRecord)?
              ( ( !(isset($_POST['create_root']) && ($_POST['create_root']=='true'))  )?CController::createUrl('chapter/create'):CController::createUrl('chapter/createRoot')):
               CController::createUrl('chapter/update');
$val_error_msg='Error.Chapter was not saved.';
$val_success_message=($model->isNewRecord)?
( (!(isset($_POST['create_root']) && ($_POST['create_root']=='true')))?'Chapter was created successfuly.':'Root Chapter was created successfuly.'):
                                                  'Chapter was updated successfuly.';


$success='function(data){
    var response= jQuery.parseJSON (data);

    if (response.success ==true)
    {
		setTimeout("$.fancybox.close();",3000);
        jQuery("#'.Chapter::ADMIN_TREE_CONTAINER_ID.'").jstree("refresh");
        $("#success-chapter")
        .fadeOut(1000, "linear",function(){
			$(this)
			.append("<div> '.$val_success_message.'</div>")
			.fadeIn(2000, "linear")
		});
        $("#chapter-form").slideToggle(1500);'.
        (isset($updatesuccess)?$updatesuccess:'').
    '}
    else {
    	$("#error-chapter")
    	.hide()
    	.show()
    	.css({"opacity": 1 })
    	.append("<div>"+response.message+"</div>").fadeIn(2000);

              jQuery("#'.Chapter::ADMIN_TREE_CONTAINER_ID.'").jstree("refresh");

                  }
                     }//function';

$js_afterValidate="js:function(form,data,hasError) {


        if (!hasError) {                         //if there is no error submit with  ajax
        jQuery.ajax({'type':'POST',
                              'url':'$ajaxUrl',
                         'cache':false,
                         'data':$(\"#$formId\").serialize(),
                         'success':$success
                           });
                         return false; //cancel submission with regular post request,ajax submission performed above.
    } //if has not error submit via ajax

else{
return false;       //if there is validation error don't send anything
    }                    //cancel submission with regular post request,validation has errors.

}";


$form=$this->beginWidget('CActiveForm', array(
     'id'=>'chapter-form',
   //'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
     'focus'=>array($model,'name'),
     'errorMessageCssClass' => 'input-notification-error  error-simple png_bg',
     'clientOptions'=>array('validateOnSubmit'=>true,
                                        'validateOnType'=>false,
                                        'afterValidate'=>$js_afterValidate,
                                        'errorCssClass' => 'err',
                                        'successCssClass' => 'suc',
                                        'afterValidateAttribute' => 'js:function(form, attribute, data, hasError){
                                                   if(!hasError){
                                                                    $("#success-"+attribute.id).fadeIn(500);
                                                                   $("label[for=\'Chapter_"+attribute.name+"\']").removeClass("error");
                                                                      }else {
                                                                                  $("label[for=\'Chapter_"+attribute.name+"\']").addClass("error");
                                                                                   $("#success-"+attribute.id).fadeOut(500);
                                                                                   }

                                                                                                                            }'
                                                                             ),
)); 

 ?>
<?php echo $form->errorSummary($model, '<div style="font-weight:bold">Please correct these errors:</div>', NULL, array('class' => 'errorsum notification errorshow png_bg')); ?><p class="note">Fields with <span class="required">*</span> are required.</p>

  

 <div class="row" >
  <?php echo $form->labelEx($model,'name'); ?>    <?php  echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128,'value'=>(isset($_POST['name'])?$_POST['name']:$model->name),'style'=>'width:88%;'));  ?>       <span  id="success-Chapter_name"  class="hid input-notification-success  success png_bg"></span>
    <div><small></small> </div>
     <?php   echo $form->error($model,'name');  ?>    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'content_type'); ?>
		<?php echo $form->dropDownList($model,'content_type',ULookup::$CONTENT_TYPE_MESSAGES); ?>		
		<?php echo $form->error($model,'content_type'); ?>
	</div>
     
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		The chapter uses a Markdown Extra format, please refer to <a href="http://michelf.com/projects/php-markdown/extra/" target="_blank">http://michelf.com/projects/php-markdown/extra/</a>.</br>
		You can also use Math formula, such as $x^2$, please ref to <a href="http://www.mediawiki.org/wiki/Extension:MathJax" target="_blank">MathJax </a> and <a href="http://www.codecogs.com/latex/eqneditor.php"  target="_blank">Demo</a>。<br/>
		<?php
		echo $form->textArea($model,'description',array('rows'=>12, 'cols'=>110));
		
	/*		$this->widget('ext.ultraeditor.jmarkitup.EMarkitupWidget', array(
					// you can either use it for model attribute
					'model' => $model,
					'attribute' => 'description',
					
					'settings'=>'markdown',
					'options'=>array(
							'previewParserPath'=>
							Yii::app()->urlManager->createUrl('site/previewMarkdown')
					)
			));
			*/
			$this->widget('ext.ultraeditor.EditorSelector', array(
					// you can either use it for model attribute
					'link' => '#Chapter_content_type',
					'editor' => '#Chapter_description',
						
					'options'=>array(
							ULookup::CONTENT_TYPE_WIKI=>array('settings'=>array('previewParserPath'=>
									Yii::app()->urlManager->createUrl('site/previewWiki'),
								)),
							ULookup::CONTENT_TYPE_MARKDOWN=>array('settings'=>array('previewParserPath'=>
									Yii::app()->urlManager->createUrl('site/previewMarkdown'),
								)),
							ULookup::CONTENT_TYPE_HTML=>array('settings'=>array(
								'html5Upload'=>false,
								'tools'=>'full',
								'upLinkUrl'=>'/joj/upload/create/type/report/classRoom/0',
								'upLinkExt'=>'zip,rar,txt,sql,ppt,pptx,doc,docx',
								'upImgUrl'=>'/joj/upload/create/type/report/classRoom/0',
								'upImgExt'=>'jpg,jpeg,gif,png',	
								'id'=>'Chapter_description',
								'name'=>'Chapter[description]'
								)),
					)
			));
			?>
		<?php //echo $form->textArea($model,'description',array('rows'=>10, 'cols'=>50)); ?>
             <span  id="success-Chapter_description"  class="hid input-notification-success  success png_bg"></span>
           <div><small></small> </div>
		<?php echo $form->error($model,'description'); ?>
	</div>

<input type="hidden" name= "YII_CSRF_TOKEN" value="<?php echo Yii::app()->request->csrfToken; ?>"  />
  <input type="hidden" name= "parent_id" value="<?php echo isset($_POST['parent_id'])?$_POST['parent_id']:''; ?>"  />

  <?php  if (!$model->isNewRecord): ?>    <input type="hidden" name= "update_id" value=" <?php echo $model->id; ?>"  />
     <?php endif; ?>      
    
 <table>
 <tr>
 <td>
   <div class="row buttons">
 <?php   echo  CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save',array('class' => 'button align-right')); ?>	</div>
 </td>
 <td>
 <? /*$this->widget('ext.EAjaxUpload.EAjaxUploadBasic',
array(
        'id'=>'uploadFile',
        'config'=>array(
        		'button'=>'js:jQuery("#fileUploader")[0]',
        		'action'=>UCHtml::url('upload/create/type/chapter'.(isset($model->root)?('/book/'.(int)($model->root)):'')),
               'allowedExtensions'=>array("jpg","jpeg","png","gif","txt","rar","zip","ppt","chm","pdf","doc","7z"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>10,// minimum file size in bytes
               'onComplete'=>'js:function(id, fileName, responseJSON){ if (typeof(responseJSON.success)!="undefined" && responseJSON.success){insertFile(fileName,responseJSON);}}',
               //'messages'=>array(
               //                  'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
               //                  'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
               //                  'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
               //                  'emptyError'=>"{file} is empty, please select files again without it.",
               //                  'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
               //                 ),
               //'showMessage'=>"js:function(message){ alert(message); }"
              )
)); */?>
 </td>
 </tr>
 </table>
     
 <?php  $this->endWidget(); ?></div><!-- form -->

</div>
<?php echo 
CHtml::script(
'

	
	jQuery.fn.extend({
insertAtCaret: function(myValue){
  return this.each(function(i) {
    if (document.selection) {
      this.focus();
      sel = document.selection.createRange();
      sel.text = myValue;
      this.focus();
    }
    else if (this.selectionStart || this.selectionStart == \'0\') {
      var startPos = this.selectionStart;
      var endPos = this.selectionEnd;
      var scrollTop = this.scrollTop;
      this.value = this.value.substring(0, startPos)+myValue+this.value.substring(endPos,this.value.length);
      this.focus();
      this.selectionStart = startPos + myValue.length;
      this.selectionEnd = startPos + myValue.length;
      this.scrollTop = scrollTop;
    } else {
      this.value += myValue;
      this.focus();
    }
  })
}
});

function insertFile(fileName,responseJSON)
{
	if(responseJSON.ext=="jpg"||responseJSON.ext=="jpeg"||responseJSON.ext=="png"||responseJSON.ext=="gif")
		//$("#Chapter_description").insertAtCaret(\'\{\{Attachment:\'+responseJSON.fileid+\'|\'+fileName+\'}}\');
		$("#Chapter_description").insertAtCaret(\'![\'+fileName+\']\'+\'('.UCHtml::url('upload/download/').'\'+responseJSON.fileid+\')\');
	else
		//$("#Chapter_description").insertAtCaret(\'[[Attachment:\'+responseJSON.fileid+\'|\'+fileName+\']]\');
		$("#Chapter_description").insertAtCaret(\'[\'+fileName+\']\'+\'('.UCHtml::url('upload/download/').'\'+responseJSON.fileid+\')\');
}
'
);
?>

<script  type="text/javascript">
    
 //Close button:

		$(".close").click(
			function () {
				$(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
					$(this).slideUp(600);
				});
				return false;
			}
		);


</script>

<script type="text/javascript">
/*<![CDATA[*/
function initControl(){
	$('#Chapter_content_type').editorselection('#Chapter_description',{'1':{'settings':{'previewParserPath':'/joj/site/previewWiki'}},'2':{'settings':{'previewParserPath':'/joj/site/previewMarkdown'}},'4':{'settings':{'html5Upload':false,'tools':'full','upLinkUrl':'/joj/upload/create/type/report/classRoom/0','upLinkExt':'zip,rar,txt,sql,ppt,pptx,doc,docx','upImgUrl':'/joj/upload/create/type/report/classRoom/0','upImgExt':'jpg,jpeg,gif,png','id':'Chapter_description','name':'Chapter[description]'}}})
};
/*]]>*/
</script>
