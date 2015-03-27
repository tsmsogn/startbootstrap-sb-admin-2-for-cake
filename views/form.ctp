<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php printf("<?php echo __('%s %s'); ?>\n", Inflector::humanize($action), $singularHumanName); ?>
				<div class="pull-right">
					<div class="btn-group">
						<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
							<?php echo "<?php echo __('Actions'); ?>\n"; ?>
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
<?php if (strpos($action, 'add') === false): ?>
							<li><?php echo "<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), array(), __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>"; ?></li>
<?php endif; ?>
							<li><?php echo "<?php echo \$this->Html->link(__('List " . $pluralHumanName . "'), array('action' => 'index')); ?>"; ?></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-6">
						<?php echo "<?php echo \$this->Form->create('{$modelClass}', array('inputDefaults' => array('div' => 'form-group', 'class' => 'form-control', 'wrapInput' => false))); ?>\n"; ?>
						<?php
						echo "<?php\n";
						foreach ($fields as $field) {
							if (strpos($action, 'add') !== false && $field === $primaryKey) {
								continue;
							} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
								echo "\t\t\t\t\t\techo \$this->Form->input('{$field}');\n";
							}
						}
						if (!empty($associations['hasAndBelongsToMany'])) {
							foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
								echo "\t\t\t\t\t\techo \$this->Form->input('{$assocName}');\n";
							}
						}
						echo "\t\t\t\t\t\t?>\n";
						?>
						<?php
						echo "<?php echo \$this->Form->end(array('label' => __('Submit'), 'div' => false, 'class' => 'btn btn-primary')); ?>\n";
						?>
					</div>
					<!-- /.col-lg-6 (nested) -->
				</div>
				<!-- /.row (nested) -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
