<?php

/**
 * This is the model base class for the table "setup_sec_users".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "SetupSecUsers".
 *
 * Columns in table "setup_sec_users" available as properties of the model,
 * followed by relations of table "setup_sec_users" available as properties of the model.
 *
 * @property string $v_user_code
 * @property string $v_user_name
 * @property string $v_password
 * @property string $v_nik
 * @property string $n_coy_id
 * @property string $n_org_id
 * @property string $v_flag_adm
 * @property string $n_id_group
 * @property string $v_email_address
 * @property string $v_address
 * @property string $v_home_phone
 * @property string $v_work_phone
 * @property string $v_cost_centre
 * @property string $v_grant_org_id
 * @property string $v_ipcrea
 * @property string $v_ipmodi
 * @property string $v_created_by
 * @property string $d_created_date
 * @property string $v_updated_by
 * @property string $d_updated_date
 *
 * @property SetupMstOrganizations $nOrg
 */
abstract class BaseSetupSecUsers extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'setup_sec_users';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'SetupSecUsers|SetupSecUsers', $n);
	}

	public static function representingColumn() {
		return 'v_user_name';
	}

	public function rules() {
		return array(
			array('v_user_code, v_user_name, v_password, v_nik, n_org_id', 'required'),
			array('v_user_code, v_password, v_ipcrea, v_ipmodi, v_created_by, v_updated_by', 'length', 'max'=>50),
			array('v_user_name', 'length', 'max'=>150),
			array('v_nik', 'length', 'max'=>10),
			array('n_coy_id, n_id_group', 'length', 'max'=>22),
			array('n_org_id', 'length', 'max'=>15),
			array('v_flag_adm', 'length', 'max'=>1),
			array('v_email_address, v_home_phone, v_work_phone', 'length', 'max'=>100),
			array('v_address', 'length', 'max'=>3000),
			array('v_cost_centre', 'length', 'max'=>20),
			array('v_grant_org_id', 'length', 'max'=>500),
			array('d_created_date, d_updated_date', 'safe'),
			array('n_coy_id, v_flag_adm, n_id_group, v_email_address, v_address, v_home_phone, v_work_phone, v_cost_centre, v_grant_org_id, v_ipcrea, v_ipmodi, v_created_by, d_created_date, v_updated_by, d_updated_date', 'default', 'setOnEmpty' => true, 'value' => null),
			array('v_user_code, v_user_name, v_password, v_nik, n_coy_id, n_org_id, v_flag_adm, n_id_group, v_email_address, v_address, v_home_phone, v_work_phone, v_cost_centre, v_grant_org_id, v_ipcrea, v_ipmodi, v_created_by, d_created_date, v_updated_by, d_updated_date', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'nOrg' => array(self::BELONGS_TO, 'SetupMstOrganizations', 'n_org_id'),
			'setupMstLookups' => array(self::HAS_MANY, 'SetupMstLookups', 'n_coy_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'v_user_code' => Yii::t('setupModule.main', 'User Code'),
			'v_user_name' => Yii::t('setupModule.main', 'User Name'),
			'v_password' => Yii::t('setupModule.main', 'Password'),
			'v_nik' => Yii::t('setupModule.main', 'Nik'),
			'n_coy_id' => Yii::t('setupModule.main', 'Coy'),
			'n_org_id' => Yii::t('setupModule.main','Org Id'),
			'v_flag_adm' => Yii::t('setupModule.main', 'Flag Adm'),
			'n_id_group' => Yii::t('setupModule.main', 'Id Group'),
			'v_email_address' => Yii::t('setupModule.main', 'Email Address'),
			'v_address' => Yii::t('setupModule.main', 'Address'),
			'v_home_phone' => Yii::t('setupModule.main', 'Home Phone'),
			'v_work_phone' => Yii::t('setupModule.main', 'Work Phone'),
			'v_cost_centre' => Yii::t('setupModule.main', 'Cost Centre'),
			'v_grant_org_id' => Yii::t('setupModule.main', 'Grant Org'),
			'v_ipcrea' => Yii::t('setupModule.main', 'Ipcrea'),
			'v_ipmodi' => Yii::t('setupModule.main', 'Ipmodi'),
			'v_created_by' => Yii::t('setupModule.main', 'Created By'),
			'd_created_date' => Yii::t('setupModule.main', 'Created Date'),
			'v_updated_by' => Yii::t('setupModule.main', 'Updated By'),
			'd_updated_date' => Yii::t('setupModule.main', 'Updated Date'),
			'nOrg' => Yii::t('setupModule.main','NOrg'),
			'setupMstLookups' => Yii::t('setupModule.main','setupMstLookups'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('v_user_code', $this->v_user_code, true);
		$criteria->compare('v_user_name', $this->v_user_name, true);
		$criteria->compare('v_password', $this->v_password, true);
		$criteria->compare('v_nik', $this->v_nik, true);
		$criteria->compare('n_coy_id', $this->n_coy_id, true);
		$criteria->compare('n_org_id', $this->n_org_id);
		$criteria->compare('v_flag_adm', $this->v_flag_adm, true);
		$criteria->compare('n_id_group', $this->n_id_group, true);
		$criteria->compare('v_email_address', $this->v_email_address, true);
		$criteria->compare('v_address', $this->v_address, true);
		$criteria->compare('v_home_phone', $this->v_home_phone, true);
		$criteria->compare('v_work_phone', $this->v_work_phone, true);
		$criteria->compare('v_cost_centre', $this->v_cost_centre, true);
		$criteria->compare('v_grant_org_id', $this->v_grant_org_id, true);
		$criteria->compare('v_ipcrea', $this->v_ipcrea, true);
		$criteria->compare('v_ipmodi', $this->v_ipmodi, true);
		$criteria->compare('v_created_by', $this->v_created_by, true);
		$criteria->compare('d_created_date', $this->d_created_date, true);
		$criteria->compare('v_updated_by', $this->v_updated_by, true);
		$criteria->compare('d_updated_date', $this->d_updated_date, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}