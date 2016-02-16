<?php

/**
 * This is the model class for table "content".
 *
 * The followings are the available columns in table 'content':
 * @property integer $id_content
 * @property string $title
 * @property string $content
 * @property string $time_create
 * @property integer $user_id
 * @property integer $kind_content
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Content extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content, user_id,kind_content', 'required'),
			array('user_id,kind_content', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
		
			 array('time_create','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_content, title, content, time_create, user_id, kind_content', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'kind_content_id' => array(self::BELONGS_TO,'Kind','kind_content'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_content' => 'Id Content',
			'title' => 'Title',
			'content' => 'Content',
			'time_create' => 'Time Create',
			'user_id' => 'User_id',
			'kind_content'=> 'kind content'
		);
	}
	public function howmanyrecord($id){
		return $this->findByAttributes(array('user_id=>$id'))->id_content;
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
		$a = Yii::app()->session['name'];
		$criteria=new CDbCriteria;
		$criteria->addSearchCondition('user_id', $a);
		$criteria->compare('id_content',$this->id_content);
		$criteria->compare('title',$this->title,true);
		$criteria->order = "time_create DESC";
		$criteria->compare('content',$this->content,true);
		$criteria->compare('time_create',$this->time_create,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('kind_content',$this->kind_content);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Content the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
