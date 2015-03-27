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
		<h1 class="page-header"><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo "<?php echo __('{$pluralHumanName}'); ?>\n"; ?>
				<div class="pull-right">
					<div class="btn-group">
						<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
							<?php echo "<?php echo __('Actions'); ?>\n"; ?>
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							<li><?php echo "<?php echo \$this->Html->link(__('New " . $singularHumanName . "'), array('action' => 'add')); ?>"; ?></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
						<tr>
							<?php foreach ($fields as $field): ?>
							<th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
							<?php endforeach; ?>
							<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
						</tr>
						</thead>
						<tbody>
<?php
echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
echo "\t<tr>\n";
foreach ($fields as $field) {
	$isKey = false;
	if (!empty($associations['belongsTo'])) {
		foreach ($associations['belongsTo'] as $alias => $details) {
			if ($field === $details['foreignKey']) {
				$isKey = true;
				echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
				break;
			}
		}
	}
	if ($isKey !== true) {
		echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?></td>\n";
	}
}

echo "\t\t<td class=\"actions\">\n";
echo "\t\t\t<?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
echo "\t\t\t<?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
echo "\t\t\t<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array(), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
echo "\t\t</td>\n";
echo "\t</tr>\n";

echo "<?php endforeach; ?>\n";
?>
						</tbody>
					</table>
					<div class="text-center">
<?php
echo "<?php\n";
echo "\techo \$this->Paginator->pagination(array('ul' => 'pagination pagination-centered'));\n";
echo "?>\n";
?>
					</div>
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-6 -->
</div>
