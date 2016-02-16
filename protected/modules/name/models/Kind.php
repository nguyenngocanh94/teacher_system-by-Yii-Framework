<?php

/**
 * This is the model class for table "kind".
 *
 * The followings are the available columns in table 'kind':
 * @property integer $id_kind
 * @property string $category
 * @property string $img_src
 *
 * The followings are the available model relations:
 * @property Content[] $contents
 * @property Document[] $documents
 */
class Kind extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kind';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category, img_src', 'required'),
			array('category', 'length', 'max'=>100),
			array('img_src', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_kind, category, img_src', 'safe', 'on'=>'search'),
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
			'contents' => array(self::MANY_MANY, 'Content', 'id_kind'),
			'documents' => array(self::MANY_MANY, 'Document', 'id_kind'),
		);
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_kind' => 'Id Kind',
			'category' => 'Category',
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

		$criteria->compare('id_kind',$this->id_kind);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('img_src',$this->img_src,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kind the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
