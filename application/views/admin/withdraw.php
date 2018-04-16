<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">Заявки на вывод по тарфиам</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if (empty($listTariffs)): ?>
                            <p>Список заявок на вывод по тарфиам пуст</p>
                        <?php else: ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Номер вклада</th>
                                        <th>Дата</th>
                                        <th>Сумма</th>
                                        <th>Логин</th>
                                        <th>Кошелек</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listTariffs as $val): ?>
                                        <tr>
                                            <td># <?php echo $val['id']; ?></td>
                                            <td><?php echo date('d.m.Y в H:i', $val['unixTimeFinish']); ?></td>
                                            <td><?php echo $val['sumOut']; ?> $</td>
                                            <td><?php echo $val['login']; ?></td>
                                            <td><?php echo $val['wallet']; ?></td>
                                            <td>
                                                <form action="/admin/withdraw" method="post">
                                                    <input type="hidden" name="type" value="tariff">
                                                    <input type="hidden" name="id" value="<?php echo $val['id']; ?>">
                                                    <button type="submit" class="btn btn-success">Выплачено</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">Заявки на вывод реферального вознаграждения</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if (empty($listRef)): ?>
                            <p>Список заявок на вывод реферального вознаграждения пуст</p>
                        <?php else: ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Дата</th>
                                        <th>Сумма</th>
                                        <th>Логин</th>
                                        <th>Кошелек</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listRef as $val): ?>
                                        <tr>
                                            <td><?php echo date('d.m.Y в H:i', $val['unixTime']); ?></td>
                                            <td><?php echo $val['amount']; ?> $</td>
                                            <td><?php echo $val['login']; ?></td>
                                            <td><?php echo $val['wallet']; ?></td>
                                            <td>
                                                <form action="/admin/withdraw" method="post">
                                                    <input type="hidden" name="type" value="ref">
                                                    <input type="hidden" name="id" value="<?php echo $val['id']; ?>">
                                                    <button type="submit" class="btn btn-success">Выплачено</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>