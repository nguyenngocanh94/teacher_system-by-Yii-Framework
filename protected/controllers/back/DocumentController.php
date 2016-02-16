<?php
class DocumentController extends Controller {
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
				'actions'=>array('update','delete','index','create','view','download'),
				'roles'=>array('member'),
			),
			array('allow',
				'actions'=>array('getlinkdownload'),
				'users'=>array('*'),
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
	public	function actionDownload($filename){
		Yii::app()->request->xSendFile($filename,array(
		'mimeType'=>'pdf/doc/docx/zip/rar/tar.gz',	
   		'terminate'=>false,
		));
	}
	
	public function actionView($id) {
		$dataProvider = new CActiveDataProvider ( 'Document', array('criteria'=>array('condition'=>'id_document='.$id)));
		$this->render ( 'index', array (
				'dataProvider' => $dataProvider 
		) );
	}
	public function getsubject() {
		$q = new CDbCriteria();
		$q->addSearchCondition('id_user', Yii::app()->user->getid());
		// this function returns the list of categories to use in a dropdown
		return CHtml::listData ( Subject::model ()->findAll ($q), 'id_subject', 'subject' );
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new Document ();
		$a = Yii::app ()->user->getid ();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if (isset ( $_POST ['Document'] )) {
			$model->user_id = $a;
			$model->attributes = $_POST ['Document'];
			$img = CUploadedFile::getInstance ( $model, 'document_src' );
			if (! empty ( $img )) { 
				$fileSource = Yii::getPathOfAlias ( 'webroot' ) . '/img/';
				$rnd = rand ( 0, 9999 ); 
				$nameImg = "{$rnd}-" . $img->name;
				$model->document_src = "img/" . $nameImg;
				$img->saveAs (  $fileSource.$nameImg );
			}

			if ($model->save ())
				$this->redirect ( array (
						'view',
						'id' => $model->id_document 
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
	public function actionUpdate($id) {
		$model = $this->loadModel ( $id );
		$a = Yii::app ()->user->getid ();
		if ($a == (Document::model ()->findByAttributes ( array (
				'id_document' => $id 
		) )->user_id)){
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['Document'] )) {
			$model->attributes = $_POST ['Document'];
			$model->time_create = new CDbExpression('NOW()');
			$img = CUploadedFile::getInstance ( $model, 'document_src' );
			if (! empty ( $img )) { 
				$fileSource = Yii::getPathOfAlias ( 'webroot' ) . '/img/';
				$rnd = rand ( 0, 9999 ); 
				$nameImg = "{$rnd}-" . $img->name;
				$model->document_src = "img/" . $nameImg;
				$img->saveAs ( $fileSource . $nameImg );
			}
			if ($model->save ())
				$this->redirect ( array (
						'view',
						'id' => $model->id_document 
				) );
		}
		
		$this->render ( 'update', array (
				'model' => $model 
		) );}else{
				throw new CHttpException ( 400, 'Invalid request. that document not belong to you.' );
			}
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be deleted
	 *        	
	 */
	
	public function actionDelete($id)
	{
		
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();
			
			if(isset($_POST['type']))
				$this->redirect(array('/site/index'));
		
			// if AJAX request (triggered by deletion via index grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		
	}



	
	
	/**
	 * Manages all models.
	 */
	public function actionIndex() {
		$model = new Document ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_GET ['Document'] ))
			$model->attributes = $_GET ['Document'];
		
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
		$model = Document::model ()->findByPk ( $id );
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
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'document-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
	}
}
