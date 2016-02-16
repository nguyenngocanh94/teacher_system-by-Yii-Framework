<?php

class MyFile extends CFormModel
{
	public $image;
	public function rules(){
		return array(
			array('image','file','types'=>'png, jpg'),
			);
	}
}
?>
