<div class="row">

			<!-- Blog Entries Column -->
			<div class="col-md-8">

               <?php
				$this->breadcrumbs=array(
					'Contents',
				);
				?>

				<h1 class="page-header">
				    Notifications
				      <small>in week</small>
				</h1>
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
					<div class="wide form">
				<?php	Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
        // $.fn.yiiGridView.update('your-grid', {
        $.fn.yiiListView.update('your-list', {
                data: $(this).serialize()
        });
        return false;
});
");?>
					<?php $this->renderPartial('_search',array(
						'model'=>$model,
					)); ?>

					</div>
					
					<!-- /.input-group -->
				</div>

				<!-- Blog Categories Well -->
				

				<!-- Side Widget Well -->
				<div class="well">
					<h4>Simple Survey</h4>
					<?php 
					Yii::import('application.modules.name.controllers.ContentController');
					$a = ContentController::getidfromhere();
					$this->widget('EPoll', array('user_of_id' => $a));?>
				</div>

			</div>

		</div>