<?php
/**
 * This is the model class for table "tbl_country".
 */
class Country extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_country':
	 * @property integer $id
	 * @property string $code
	 * @property string $name
	 * @property integer $call_code
	 */
	/**
	 * Returns the static model of the specified AR class.
	 * @return Country the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
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
	
	/**
	 * @return array relational rules.
	 */
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	
	/**
	 * Suggests a list of existing values matching the specified keyword.
	 * @param string the keyword to be matched
	 * @param integer maximum number of names to be returned
	 * @return array list of matching lastnames
	 */
	
	public function suggest($keyword,$limits,$a)
	{	
		$models=$this->findAll(array(
			'condition'=>'title LIKE :keyword AND user_id = :a',
			'order'=>'title',
			'limit'=>$a,
			'params'=>array(':keyword'=>"%$keyword%",':a'=>"$a")
			));
		$suggest=array();
		foreach($models as $model) {
			$suggest[] = array(
				'label'=>$model->title,  // label for dropdown list
				'value'=>$model->title,  // value for input field
			);
		}
		return $suggest;
	}
	/**
	 * Suggests a list of existing fullnames matching the specified keyword.
	 * @param string the keyword to be matched
	 * @param integer maximum number of names to be returned
	 * @return array list of matching fullnames
	 */
	
	/**
	 * @return array for dropdown (attr1 => attr2)
	 */
	public function getOptions()
	{
		return CHtml::listData($this->findAll(),'id','name');
	}
}