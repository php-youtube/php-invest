<div class="container">
    <h1 class="my-4">Тарифы</h1>
    <div class="row">
        <?php foreach ($tariffs as $key => $val): ?>
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h3 class="card-header"><?php echo $val['title']; ?></h3>
                    <div class="card-body">
                        <div class="display-4"><?php echo $val['percent']; ?> %</div>
                        <div class="font-italic"><?php echo $val['description']; ?></div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Минимальная инвестиция: <?php echo $val['min']; ?> $</li>
                        <li class="list-group-item">Максимальная инвестиция: <?php echo $val['max']; ?> $</li>
                        <li class="list-group-item">Период инвестиции: <?php echo $val['hour']; ?> ч.</li>
                        <li class="list-group-item">
                            <?php if (isset($_SESSION['account']['id'])): ?>
                                <a href="/dashboard/invest/<?php echo $key; ?>" class="btn btn-primary">Инвестировать</a>
                            <?php else: ?>
                               <p>* Для покупки этого тарифа необходима авторизация</p>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>