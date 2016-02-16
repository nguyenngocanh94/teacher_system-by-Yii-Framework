<?php
class ContentController extends Controller {
	/**
	 *
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 *      using two-column layout. See 'protected/views/layouts/column2.php'.
	 *     
	 */
	
	
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
				'roles'=>array('member'),
			),
			array('allow', // allow index user to perform 'index' and 'delete' actions
				'actions'=>array('index','delete','index','create','view'),
				'roles' => array('index'),
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
		$dataProvider = new CActiveDataProvider ( 'Content', array('criteria'=>array('condition'=>'id_content='.$id)));
		$this->render ( 'index', array (
				'dataProvider' => $dataProvider 
		) );
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new Content ();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['Content'] )) {
			$model->user_id = Yii::app()->user->getid();
			$model->attributes = $_POST ['Content'];
			if ($model->save ())
				$this->redirect ( array (
						'view',
						'id' => $model->id_content 
				) );
		}
		
		$this->render ( 'create', array (
				'model' => $model 
		) );
	}
	
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
	public function actionUpdate($id) {
		$model = $this->loadModel ($id);
		//if(in_array($id, Content::model()->howmanyrecord(Yii::app()->user->getid()))){
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$a = Yii::app()->user->getid();
		//$array = CHtml::listData(Content::model()->findByAttributes(array('id_content'=>$id)), 'user_id','time_create');
		$arr = Content::model()->findByAttributes(array('id_content'=>$id))->user_id;	
		if($a === $arr){
		if (isset ( $_POST ['Content'] )) {
			$model->user_id = Yii::app()->user->getid();
			$model->attributes = $_POST ['Content'];
			if ($model->save ())
				$this->redirect ( array (
						'view',
						'id' => $model->id_content 
				) );
		}
		
		$this->render ( 'update', array (
				'model' => $model 
		) );
	}else
		throw new CHttpException ( 430, 'you have not permisson to access that request.' );
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be deleted
	 *        	
	 */
	public function actionDelete($id) {
		if (Yii::app ()->request->isPostRequest) {
			
			// we only allow deletion via POST request
			$this->loadModel ( $id )->delete ();
			
			// if AJAX request (triggered by deletion via index grid view), we should not redirect the browser
			if (! isset ( $_GET ['ajax'] ))
				$this->redirect ( isset ( $_POST ['returnUrl'] ) ? $_POST ['returnUrl'] : array (
						'index' 
				) );
		} else
			throw new CHttpException ( 400, 'Invalid request. Please do not repeat this request again.' );
	}
	
	/**
	 * Lists all models.
	 */
	/*public function actionIndex() {
		$a = Yii::app()->user->getid();
		$dataProvider = new CActiveDataProvider ( 'Content',array('criteria'=>array(
        'condition'=>'user_id='.$a,)));
		$this->render ( 'index', array (
				'dataProvider' => $dataProvider 
		) );
	}
	*/
	/**
	 * Manages all models.
	 */
	public function actionIndex() {
		$model = new Content ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_GET ['Content'] ))
			$model->attributes = $_GET ['Content'];
		
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
		$model = Content::model ()->findByPk ( $id );
		if ($model === null)
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		return $model;
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
