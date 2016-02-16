<?php
class ContentController extends Controller {
	/**
	 *
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 *      using two-column layout. See 'protected/views/layouts/column2.php'.
	 *     
	 */
	public $layout = 'application.modules.name.views.layouts.main';
	
	
	/**
	 *
	 * @return array action filters
	 *        
	 */
	public function filters() {
		return array (
				'accessControl' 
		) // perform access control for CRUD operations
;
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * 
	 * @return array access control rules
	 *        
	 */
	public function accessRules() {
		return array(

			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update','delete','index','create','view'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','index','create','view'),
				'users' => array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/**
	 * Displays a particular model.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be displayed
	 *        	
	 */
	public function actionView($id) {
		$this->render ('view', array (
				'dataProvider' => $this->loadModel ( $id ) 
		) );
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be updated
	 *        	
	 */
	public function getnamekind()
    { 
     //this function returns the list of categories to use in a dropdown        
      return CHtml::listData(Kind::model()->findAll(), 'id_kind', 'category');
    }
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be deleted
	 *        	
	 */
	
	/**
	 * Lists all models.
	 */
	
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin($name) {
		Yii::app()->session['teacher'] = $name;
		Yii::import('application.controllers.back.UserController');
		$a = UserController::getidfromname($name);
		Yii::app()->session['name'] = $a;
		$model = new Content ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_POST ['Content'] ))
			$model->attributes = $_POST ['Content'];
		
		$this->render ( 'admin', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * 
	 * @param
	 *        	integer the ID of the model to be loaded
	 *        	
	 */
	public function loadModel($id) {
		$dataProvider = new CActiveDataProvider ( 'Content',array('criteria'=>array(
        'condition'=>'id_content='.$id,)));
		if ($dataProvider === null)
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		return $dataProvider;
	}
	
	/**
	 * Performs the AJAX validation.
	 * 
	 * @param
	 *        	CModel the model to be validated
	 *        	
	 */
	protected function performAjaxValidation($model) {
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'content-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
	}
}
