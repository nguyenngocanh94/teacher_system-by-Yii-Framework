<?php
class DownloadController {
    function download($filename){
Yii::app()->request->xSendFile($filename,array(
   'terminate'=>false,
));
}
}
?>