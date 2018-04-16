<div class="container">
    <h1 class="mt-4 mb-3"><?php echo $title; ?></h1>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <?php if (empty($list)): ?>
            	<p>История пуста</p>
            <?php else: ?>
            	<table class="table table-bordered">
            		<thead>
            			<tr>
            				<th>Дата</th>
            				<th>Описание</th>
            			</tr>
            		</thead>
            		<tbody>
		            	<?php foreach ($list as $val): ?>
		            		<tr>
		            			<td><?php echo date('d.m.Y в H:i', $val['unixTime']); ?></td>
		            			<td><?php echo $val['description']; ?></td>
		            		</tr>
		            	<?php endforeach; ?>
		            </tbody>
		        </table>
            	<?php echo $pagination; ?>
            <?php endif; ?>
        </div>
    </div>
</div>