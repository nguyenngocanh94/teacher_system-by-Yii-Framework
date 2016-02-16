<?php
class UserInfoController extends Controller {
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
				'actions'=>array('view','index'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','view'),
				'roles' => array('admin'),
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
		$a = Yii::app()->user->getid();
		$arr = UserInfo::model()->findByAttributes(array('iduser_info'=>$id))->user_id;	
		if($a === $arr){
		$this->render ( 'view', array (
				'model' => $this->loadModel ( $id ) 
		) );
	}else{
		throw new CHttpException ( 430, 'you have not permisson to access that request.' );
	}
}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new UserInfo ();
		$a = Yii::app ()->user->getid ();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['UserInfo'] )) {
			$model->user_id = $a;
			$model->attributes = $_POST ['UserInfo'];
			/*$img = CUploadedFile::getInstance($model, 'img_src');
 			if (!empty($img)) { //Kiểm tra xem người nhập có upload ảnh hay không, nếu có thực hiện các bước bên dưới, không thì $model->image = null
			 $fileSource = Yii::getPathOfAlias('webroot') . '/uploads/';
			 $rnd = rand(0, 9999);//tạo ngẫu nhiên 1 số để tránh trường hợp 2 ảnh khác nhau nhưng cùng tên
			 $nameImg = "{$rnd}-" . $img->name;
			 $model->img_src = "uploads/" . $nameImg;
			 $img->saveAs($fileSource . $nameImg);
 			}
			*/
		if ($model->save ())
				$this->redirect ( array (
						'view',
						'id' => $model->iduser_info 
				) );
		}
		
		$this->render ( 'create', array (
				'model' => $model 
		) );
	}
	public function actionExist() {
		$id_info = Yii::app ()->user->id;
		$checkdata = UserInfo::model ()->findByAttributes ( array (
				'user_id' => $id_info 
		) );
		if (isset ( $checkdata )) {
			return $k = 1;
		} else {
			return $k = 0;
		}
	}
	public function getnamefromid($id){
		$name = UserInfo::model()->findByAttributes(array('user_id'=>$id))->fullname;
		$prof = UserInfo::model()->findByAttributes(array('user_id'=>$id))->position;
		return $prof.' '.$name;
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be updated
	 *        	
	 */
	public function actionUpdate() {
		$id = Yii::app()->user->getid();
		$id1 = UserInfo::model()->findByAttributes(array('user_id'=>$id))->iduser_info;
		$model = $this->loadModel ($id1);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['UserInfo'] )) {
			$model->attributes = $_POST ['UserInfo'];
			if ($model->save ())
				$this->redirect ( array (
						'view',
						'id' => $model->iduser_info 
				) );
		}
		
		$this->render ( 'update', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be deleted
	 *        	
	 */
	public function actionDelete($id) {
		if (Yii::app ()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel ( $id )->delete ();
			
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (! isset ( $_GET ['ajax'] ))
				$this->redirect ( isset ( $_POST ['returnUrl'] ) ? $_POST ['returnUrl'] : array (
						'admin' 
				) );
		} else
			throw new CHttpException ( 400, 'Invalid request. Please do not repeat this request again.' );
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex($id) {
		$criteria = new CDbCriteria();
		$criteria->addSearchCondition('user_id', $id);
		$dataProvider = new CActiveDataProvider ( 'UserInfo',array('criteria'=>$criteria,));
		$this->render ( 'index', array (
				'dataProvider' => $dataProvider 
		) );
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new UserInfo ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_GET ['UserInfo'] ))
			$model->attributes = $_GET ['UserInfo'];
		
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
		$model = UserInfo::model ()->findByPk ( $id );
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
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'user-info-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
	}
}
