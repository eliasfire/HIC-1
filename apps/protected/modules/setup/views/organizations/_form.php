<?php 
/***************************
#	Developed: Abdul Ibad
#	Contact: abdul.ibad@gmail.com
#	Website: http://dulabs.com
#	Date: @ March 2012
***************************/
?>

<?php $form=$this->beginWidget('ext.bootstrap.widgets.BootActiveForm',array(
	'id'=>'setup-mst-organizations-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'n_org_id',array('class'=>'span5','maxlength'=>15)); ?>
<?php echo $form->textFieldRow($model,'v_org_code',array('class'=>'span5','maxlength'=>30)); ?>
<?php echo $form->textFieldRow($model,'v_org_name',array('class'=>'span5','maxlength'=>150)); ?>
<?php 
		  echo '<div class="control-group">';
		  echo $form->labelEx($model,'d_start_date');
		 echo '<div class="controls">';
		$form->widget('zii.widgets.jui.CJuiDatePicker', array(
	        'model'=>$model,
	        'attribute'=>'d_start_date',
	        'name'=>'d_start_date',    // This is how it works for me.
			'value'=>'',
	        'options'=>array('dateFormat'=>'dd/mm/yy', 
	                        'altFormat'=>'yy-mm-dd', 
	                        'changeMonth'=>'true', 
	                        'changeYear'=>'true',
							'showButtonPanel'=>'false',
	                        'yearRange'=>'1998:2030', 
	                     	),
	        'htmlOptions'=>array('size'=>'10','class'=>'span5 date')
	   ));
		echo "</div>
</div>"; ?>
<?php 
		  echo '<div class="control-group">';
		  echo $form->labelEx($model,'d_end_date');
		 echo '<div class="controls">';
		$form->widget('zii.widgets.jui.CJuiDatePicker', array(
	        'model'=>$model,
	        'attribute'=>'d_end_date',
	        'name'=>'d_end_date',    // This is how it works for me.
			'value'=>'',
	        'options'=>array('dateFormat'=>'dd/mm/yy', 
	                        'altFormat'=>'yy-mm-dd', 
	                        'changeMonth'=>'true', 
	                        'changeYear'=>'true',
							'showButtonPanel'=>'false',
	                        'yearRange'=>'1998:2030', 
	                     	),
	        'htmlOptions'=>array('size'=>'10','class'=>'span5 date')
	   ));
		echo "</div>
</div>"; ?>
<?php

$lookups = SetupSecUsers::model()->findByPK(Yii::app()->user->v_user_code)->with('setupMstLookups')->findByAttributes(array("v_lookup_name"=>"v_org_level"));

print_r($lookups->attributes);
	
?>

<?php echo $form->textFieldRow($model,'v_flag_coy_id',array('class'=>'span5','maxlength'=>1)); ?>
<?php echo $form->dropDownListRow($model, 'v_status_agent', array('Y'=>Yii::t('setupModule.main','Perusahaan/Bisnis'),'N' => Yii::t('setupModule.main','Unit'))); ?>
<?php echo $form->dropDownListRow($model, 'v_org_level', array()); ?>
<?php 
		
			echo '<div class="control-group">';
			echo $form->labelEx($model, 'n_org_parent');
			 echo '<div class="controls">';
		 $this->widget('EJuiAutoCompleteFkField', array(
			  'model'=>$model,
			  'attribute'=>'n_org_parent', //the FK field (from CJuiInputWidget)
			  // controller method to return the autoComplete data (from CJuiAutoComplete)
			  'sourceUrl'=>array('combo_setup-mst-organizations'),
			  // defaults to false.  set 'true' to display the FK field with 'readonly' attribute.
			  'showFKField'=>false,
			   // display size of the FK field.  only matters if not hidden.  defaults to 10
			  'FKFieldSize'=>15,
			  'relName'=>'nOrgParent', // the relation name defined above
			  'displayAttr'=>'v_org_name',  // attribute or pseudo-attribute to display
			  // length of the AutoComplete/display field, defaults to 50
			  //'autoCompleteLength'=>15,
			  // any attributes of CJuiAutoComplete and jQuery JUI AutoComplete widget may
			  // also be defined.  read the code and docs for all options
			  'options'=>array(
				  // number of characters that must be typed before
				  // autoCompleter returns a value, defaults to 2
				  'minLength'=>2,
			  ),
			  'htmlOptions' => array(
					'class' => 'span5',
			  ),
		 ));
		 echo $form->error($model, 'n_org_parent');
		 echo "</div>
</div>";?>
<?php echo $form->textFieldRow($model,'v_no_account',array('class'=>'span5','maxlength'=>60)); ?>
<?php echo $form->textFieldRow($model,'v_npwp',array('class'=>'span5','maxlength'=>30)); ?>
<?php echo $form->textFieldRow($model,'v_currency',array('class'=>'span5','maxlength'=>15)); ?>
<?php echo $form->textFieldRow($model,'v_address',array('class'=>'span5','maxlength'=>150)); ?>
<?php echo $form->textFieldRow($model,'v_city',array('class'=>'span5','maxlength'=>30)); ?>
<?php echo $form->textFieldRow($model,'v_province',array('class'=>'span5','maxlength'=>30)); ?>
<?php echo $form->textFieldRow($model,'v_country',array('class'=>'span5','maxlength'=>30)); ?>
<?php echo $form->textFieldRow($model,'v_post_code',array('class'=>'span5','maxlength'=>5)); ?>
<?php echo $form->textFieldRow($model,'v_phone',array('class'=>'span5','maxlength'=>15)); ?>
<?php echo $form->textFieldRow($model,'v_contact_person',array('class'=>'span5','maxlength'=>60)); ?>
<?php echo $form->textFieldRow($model,'v_phone_person',array('class'=>'span5','maxlength'=>15)); ?>
<?php echo $form->textFieldRow($model,'v_email_person',array('class'=>'span5','maxlength'=>60)); ?>
	<div class="actions">
		<?php
		echo CHtml::submitButton($model->isNewRecord ? Yii::t('setupModule.main','Buat') : Yii::t('setupModule.main','Simpan'),array('class'=>'btn primary')); 
		?>
		&nbsp;
		
		<?php
		echo CHtml::resetButton(Yii::t('setupModule.main','Batal'),array('class'=>'btn primary')); ?>&nbsp;|
		
		<?php
		echo CHtml::link(Yii::t('setupModule.main','Kembali Ke List'),array('index'), array('class'=>'btn')); ?>
	</div>

<?php $this->endWidget(); ?>
