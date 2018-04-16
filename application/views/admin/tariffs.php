<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if (empty($list)): ?>
                            <p>Список инвестиций пуст</p>
                        <?php else: ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Номер вклада</th>
                                        <th>Дата старта</th>
                                        <th>Дата завершения</th>
                                        <th>Сумма</th>
                                        <th>Получаете</th>
                                        <th>Процент</th>
                                        <th>Логин</th>
                                        <th>E-mail</th>
                                        <th>Статус</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list as $val): ?>
                                        <tr>
                                            <td><?php echo $val['id']; ?></td>
                                            <td><?php echo date('d.m.Y в H:i', $val['unixTimeStart']); ?></td>
                                            <td><?php echo date('d.m.Y в H:i', $val['unixTimeFinish']); ?></td>
                                            <td><?php echo $val['sumIn']; ?> $</td>
                                            <td><?php echo round($val['sumIn'] + ($val['sumIn'] * $val['percent']) / 100, 2); ?> $</td>
                                            <td><?php echo $val['percent']; ?> %</td>
                                            <td><?php echo $val['login']; ?></td>
                                            <td><?php echo $val['email']; ?></td>
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
        </div>
    </div>
</div>