<?php

/**
 * This is the model base class for the table "setup_mst_plans".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "SetupMstPlans".
 *
 * Columns in table "setup_mst_plans" available as properties of the model,
 * followed by relations of table "setup_mst_plans" available as properties of the model.
 *
 * @property string $v_plan_code
 * @property string $v_plan_name
 * @property string $v_plan_desc
 * @property string $d_plan_start
 * @property string $d_plan_end
 * @property string $v_prod_line
 * @property string $v_prod_composition
 * @property string $v_indv_or_group
 * @property string $v_plan_type
 * @property string $v_curr_code
 * @property string $v_status
 * @property string $v_created_by
 * @property string $d_created_date
 * @property string $v_updated_by
 * @property string $d_updated_date
 *
 * @property PolMstPolis[] $polMstPolises
 * @property PolDtlQuot[] $polDtlQuots
 * @property SetupPlanBenefits[] $setupPlanBenefits
 */
abstract class BaseSetupMstPlans extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'setup_mst_plans';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'SetupMstPlans|SetupMstPlans', $n);
	}

	public static function representingColumn() {
		return 'v_plan_name';
	}

	public function rules() {
		return array(
			array('v_plan_code, v_plan_name, v_plan_desc, d_plan_start, v_created_by, d_created_date', 'required'),
			array('v_plan_code, v_plan_type, v_curr_code', 'length', 'max'=>10),
			array('v_plan_name', 'length', 'max'=>50),
			array('v_plan_desc', 'length', 'max'=>500),
			array('v_prod_line, v_created_by, v_updated_by', 'length', 'max'=>30),
			array('v_prod_composition, v_indv_or_group, v_status', 'length', 'max'=>1),
			array('d_plan_end, d_updated_date', 'safe'),
			array('d_plan_end, v_prod_line, v_prod_composition, v_indv_or_group, v_plan_type, v_curr_code, v_status, v_updated_by, d_updated_date', 'default', 'setOnEmpty' => true, 'value' => null),
			array('v_plan_code, v_plan_name, v_plan_desc, d_plan_start, d_plan_end, v_prod_line, v_prod_composition, v_indv_or_group, v_plan_type, v_curr_code, v_status, v_created_by, d_created_date, v_updated_by, d_updated_date', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'polMstPolises' => array(self::HAS_MANY, 'PolMstPolis', 'v_plan_code'),
			'polDtlQuots' => array(self::HAS_MANY, 'PolDtlQuot', 'v_plan_code'),
			'setupPlanBenefits' => array(self::HAS_MANY, 'SetupPlanBenefits', 'v_plan_code'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'v_plan_code' => Yii::t('setupModule.main', 'Plan Code'),
			'v_plan_name' => Yii::t('setupModule.main', 'Plan Name'),
			'v_plan_desc' => Yii::t('setupModule.main', 'Plan Desc'),
			'd_plan_start' => Yii::t('setupModule.main', 'Plan Start'),
			'd_plan_end' => Yii::t('setupModule.main', 'Plan End'),
			'v_prod_line' => Yii::t('setupModule.main', 'Prod Line'),
			'v_prod_composition' => Yii::t('setupModule.main', 'Prod Composition'),
			'v_indv_or_group' => Yii::t('setupModule.main', 'Indv Or Group'),
			'v_plan_type' => Yii::t('setupModule.main', 'Plan Type'),
			'v_curr_code' => Yii::t('setupModule.main', 'Curr Code'),
			'v_status' => Yii::t('setupModule.main', 'Status'),
			'v_created_by' => Yii::t('setupModule.main', 'Created By'),
			'd_created_date' => Yii::t('setupModule.main', 'Created Date'),
			'v_updated_by' => Yii::t('setupModule.main', 'Updated By'),
			'd_updated_date' => Yii::t('setupModule.main', 'Updated Date'),
			'polMstPolises' => Yii::t('setupModule.main','PolMstPolises'),
			'polDtlQuots' => Yii::t('setupModule.main','PolDtlQuots'),
			'setupPlanBenefits' => Yii::t('setupModule.main','SetupPlanBenefits'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('v_plan_code', $this->v_plan_code, true);
		$criteria->compare('v_plan_name', $this->v_plan_name, true);
		$criteria->compare('v_plan_desc', $this->v_plan_desc, true);
		$criteria->compare('d_plan_start', $this->d_plan_start, true);
		$criteria->compare('d_plan_end', $this->d_plan_end, true);
		$criteria->compare('v_prod_line', $this->v_prod_line, true);
		$criteria->compare('v_prod_composition', $this->v_prod_composition, true);
		$criteria->compare('v_indv_or_group', $this->v_indv_or_group, true);
		$criteria->compare('v_plan_type', $this->v_plan_type, true);
		$criteria->compare('v_curr_code', $this->v_curr_code, true);
		$criteria->compare('v_status', $this->v_status, true);
		$criteria->compare('v_created_by', $this->v_created_by, true);
		$criteria->compare('d_created_date', $this->d_created_date, true);
		$criteria->compare('v_updated_by', $this->v_updated_by, true);
		$criteria->compare('d_updated_date', $this->d_updated_date, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}