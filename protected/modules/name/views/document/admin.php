<div class="row">

			<!-- Blog Entries Column -->
			<div class="col-md-8">
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
        // $.fn.yiiGridView.update('your-grid', {
        $.fn.yiiListView.update('your-list', {
                data: $(this).serialize()
        });
        return false;
});
");
?>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$model->search(),
	'itemView'=>'_view',
)); ?>

            </div>

			<!-- Blog Sidebar Widgets Column -->
			<div class="col-md-4">

				<!-- Blog Search Well -->
				<div class="well">
					<h4>Blog Search</h4>
					<div class="input-group">
					
					<?php $this->renderPartial('_search',array(
						'model'=>$model,
					)); ?>
					

					</div>
					<!-- /.input-group -->
				</div>

				<!-- Blog Categories Well -->
				
				<!-- Side Widget Well -->
				<div class="well">
					<h4>Ask a Question</h4>
					<?php $a = Yii::app()->session['name'];
					echo CHtml::link('Ask A Question', Yii::app()->createUrl("name/qa/create/",array("id"=>$a)),array('class'=>'btn btn-primary'));
					?>
				</div>

			</div>

		</div>
		<!-- /.row -->
