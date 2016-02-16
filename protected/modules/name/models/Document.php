<?php

/**
 * This is the model class for table "document".
 *
 * The followings are the available columns in table 'document':
 * @property integer $id_document
 * @property string $title
 * @property string $document_src
 * @property string $time_create
 * @property integer $user_id
 * @property integer $id_subject
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Document extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'document';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, document_src, user_id, id_subject', 'required'),
			array('user_id, id_subject', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('document_src', 'length', 'max'=>255),
			array('document_src', 'file', 'types' => 'jpg, png, pdf, docx, txt, csv, zip', 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * 50, 'tooLarge' => 'The file was larger than 50MB. Please upload a smaller file.'),
			array('time_create','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_document, title, document_src, time_create, user_id, id_subject', 'safe', 'on'=>'search'),
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
			'kinddocument' => array(self::MANY_MANY, 'Kind','id_subject'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_document' => 'Id Document',
			'title' => 'Title',
			'document_src' => 'Document Src',
			'time_create' => 'Time Create',
			'user_id' => 'User',
			'id_subject' => 'Select Subject',
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
		$a = Yii::app()->session['name'];
		$criteria=new CDbCriteria;
		$criteria->addSearchCondition('user_id', $a);
		$criteria->compare('id_document',$this->id_document);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('document_src',$this->document_src,true);
		$criteria->compare('time_create',$this->time_create,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('id_subject',$this->id_subject);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Document the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
