<?php
Yii::import('zii.widgets.CPortlet');
 
class Comments extends CPortlet
{
    public $title='Recent Comments';
    public $maxComments=10;
 
    public function getComments()
    {
        return Comment::model()->findRecentComments($this->maxComments);
    }
 
    protected function renderContent()
    {
        $this->render('comments');
    }
}
?>