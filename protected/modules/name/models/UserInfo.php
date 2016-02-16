<?php

/**
 * This is the model class for table "user_info".
 *
 * The followings are the available columns in table 'user_info':
 * @property integer $iduser_info
 * @property string $fullname
 * @property string $male
 * @property string $position
 * @property string $img_src
 *
 * The followings are the available model relations:
 * @property User $iduserInfo
 */
class UserInfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iduser_info, fullname, male, position,img_src', 'required'),
			array('iduser_info', 'numerical', 'integerOnly'=>true),
			array('fullname, img_src', 'length', 'max'=>255),
			array('male', 'length', 'max'=>5),
			array('position', 'length', 'max'=>10),
 			array('img_src', 'file', 'types' => 'jpg, png', 'allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('iduser_info, fullname, male, position, img_src', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'iduserInfo' => array(self::BELONGS_TO, 'User', 'iduser_info'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iduser_info' => 'Iduser Info',
			'fullname' => 'Fullname',
			'male' => 'Male',
			'position' => 'Position',
			'img_src' => 'Img Src',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('iduser_info',$this->iduser_info);
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('male',$this->male,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('img_src',$this->img_src,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
