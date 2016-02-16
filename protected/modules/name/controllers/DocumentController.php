	<?php
class DocumentController extends Controller {
	/**
	 *
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 *      using two-column layout. See 'protected/views/layouts/column2.php'.
	 *     
	 */
 	public $layout = 'application.modules.name.views.layouts.main2';
 	public $_idofteacher;
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','index','create','view','download'),
				'users' => array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function getlinkdownload($filename){
		$url = Yii::app()->createUrl('document/download',array("filename"=>$filename));
		return $url;
	}

	/**
	 * Displays a particular model.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be displayed
	 *        	
	 */
	public function actionView($id) {
		
			$this->render ( 'view', array (
					'model' => $this->loadModel ( $id ) 
			) );
	}
	public function getsubject() {
		// this function returns the list of categories to use in a dropdown
		return CHtml::listData ( Subject::model ()->findAll (), 'id_subject', 'subject' );
	}
	
	/**
	 * Lists all models.
	 */
	
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin($id) {
		Yii::app()->session['name'] = $id;
		$model = new Document ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_POST ['Document'] ))
			$model->attributes = $_POST ['Document'];
		
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
