<?php
class ChangePasswordForm extends CFormModel{
	public $currentPassword;
	public $newPassword;
	public $newPassword_repeat;
	private $_user;
	public function rules(){
		return array(
				array(
						'currentPassword','compareCurrentPassword'
				),
				array(
						'currentPassword, newPassword, newPassword_repeat', 'required',
						'message'=>'Introduzca su {attribute}.',
				),
				array(
						'newPassword_repeat', 'compare',
						'compareAttribute'=>'newPassword',
						'message'=>'La contraseña nueva no coincide.',
				),
		);
	}
		public function compareCurrentPassword($attribute,$params){
			if( sha1($this->currentPassword) !== $this->_user->password ){
				$this->addError($attribute,'Password not correct, try again!');
			}	
		}
		public function init(){
			$this->_user = User::model()->findByAttributes( array( 'id'=>Yii::app()->user->getid()))->username;
		}
		public function attributeLabels(){
			return array(
			'currentPassword'=>'Current Password',
			'newPassword'=>'New Password',
			'newPassword_repeat'=>'Repeat Password',
			);		
		}
		public function changePassword(){
			$this->_user->password = $this->newPassword;
			if( $this->_user->save() )
				return true;
			return false;
		}
}
