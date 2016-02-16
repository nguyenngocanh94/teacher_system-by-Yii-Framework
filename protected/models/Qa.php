<?php

/**
 * This is the model class for table "qa".
 *
 * The followings are the available columns in table 'qa':
 * @property integer $id
 * @property string $question
 * @property string $answer
 * @property integer $status
 * @property integer $user_id
 * @property string $auth
 */
class Qa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'qa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question, user_id, auth', 'required'),
			array('status, user_id', 'numerical', 'integerOnly'=>true),
			array('auth', 'length', 'max'=>50),
			array('answer', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, question, answer, status, user_id, auth', 'safe', 'on'=>'search'),
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
			'statusx' => array(self::BELONGS_TO, 'status','id'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'question' => 'Question',
			'answer' => 'Answer',
			'status' => 'Status',
			'user_id' => 'User',
			'auth' => 'Auth',
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
	public function search($idx)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$a = Yii::app()->user->getid();
		$criteria=new CDbCriteria;
		$criteria->addSearchCondition('user_id', $a);
		$criteria->addSearchCondition('status',$idx);
		$criteria->compare('id',$this->id);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('auth',$this->auth,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function searchx()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$a = Yii::app()->user->getid();
		$criteria=new CDbCriteria;
		$criteria->addSearchCondition('user_id', $a);
		$criteria->compare('id',$this->id);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('auth',$this->auth,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Qa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
