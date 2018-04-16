<div class="container">
    <h1 class="mt-4 mb-3"><?php echo $title; ?></h1>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <?php if (empty($list)): ?>
            	<p>Список инвестиций пуст</p>
            <?php else: ?>
            	<table class="table table-bordered">
            		<thead>
            			<tr>
            				<th>Дата старта</th>
            				<th>Дата завершения</th>
            				<th>Сумма</th>
            				<th>Получаете</th>
            				<th>Процент</th>
                            <th>Статус</th>
            			</tr>
            		</thead>
            		<tbody>
		            	<?php foreach ($list as $val): ?>
		            		<tr>
		            			<td><?php echo date('d.m.Y в H:i', $val['unixTimeStart']); ?></td>
		            			<td><?php echo date('d.m.Y в H:i', $val['unixTimeFinish']); ?></td>
		            			<td><?php echo $val['sumIn']; ?> $</td>
		            			<td><?php echo round($val['sumIn'] + ($val['sumIn'] * $val['percent']) / 100, 2); ?> $</td>
		            			<td><?php echo $val['percent']; ?> %</td>
                                <td>
                                    <?php if (time() >= $val['unixTimeFinish']): ?>
                                        <?php if ($val['sumOut']): ?>
                                            Ожидает выплаты
                                        <?php else: ?>
                                            Закрыт
                                        <?php endif; ?>
                                    <?php else: ?>
                                        Активна
                                    <?php endif; ?>
                                </td>
		            		</tr>
		            	<?php endforeach; ?>
		            </tbody>
		        </table>
            	<?php echo $pagination; ?>
            <?php endif; ?>
        </div>
    </div>
</div>