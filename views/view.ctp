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
		<h1 class="page-header"><?php echo "<?php echo __('{$singularHumanName}'); ?>"; ?></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo "<?php echo __('{$singularHumanName}'); ?>\n"; ?>
				<div class="pull-right">
					<div class="btn-group">
						<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
							<?php echo "<?php echo __('Actions'); ?>\n"; ?>
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
<?php
echo "\t\t\t\t\t\t\t<li><?php echo \$this->Html->link(__('Edit " . $singularHumanName . "'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?> </li>\n";
echo "\t\t\t\t\t\t\t<li><?php echo \$this->Form->postLink(__('Delete " . $singularHumanName . "'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array(), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?> </li>\n";
echo "\t\t\t\t\t\t\t<li><?php echo \$this->Html->link(__('List " . $pluralHumanName . "'), array('action' => 'index')); ?> </li>\n";
echo "\t\t\t\t\t\t\t<li><?php echo \$this->Html->link(__('New " . $singularHumanName . "'), array('action' => 'add')); ?> </li>\n";
?>
						</ul>
					</div>
				</div>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
						</thead>
						<tbody>
<?php
foreach ($fields as $field) {
	$isKey = false;
	echo "\t\t\t\t\t\t\t<tr>\n";
	if (!empty($associations['belongsTo'])) {
		foreach ($associations['belongsTo'] as $alias => $details) {
			if ($field === $details['foreignKey']) {
				$isKey = true;
				echo "\t\t\t\t\t\t\t\t<td><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></td>\n";
				echo "\t\t\t\t\t\t\t\t<td><?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></td>\n";
				break;
			}
		}
	}
	if ($isKey !== true) {
		echo "\t\t\t\t\t\t\t\t<td><?php echo __('" . Inflector::humanize($field) . "'); ?></td>\n";
		echo "\t\t\t\t\t\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?></td>\n";
	}
	echo "\t\t\t\t\t\t\t</tr>\n";
}
?>
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-6 -->
</div>
