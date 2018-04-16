<div class="container">
    <h1 class="mt-4 mb-3"><?php echo $title; ?></h1>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="/dashboard/referrals" method="post">
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Ссылка для приглашения:</label>
                        <input type="text" class="form-control" value="<?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST']; ?>/account/register/<?php echo $_SESSION['account']['login']; ?>" disabled>
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Реферальный баланс:</label>
                        <input type="text" class="form-control" value="<?php echo $_SESSION['account']['refBalance']; ?> $" disabled>
                        <p class="help-block"></p>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Заказать выплату</button>
            </form>
            <hr>
            <?php if (empty($list)): ?>
            	<p>Список рефералов пуст</p>
            <?php else: ?>
            	<table class="table table-bordered">
            		<thead>
            			<tr>
            				<th>Логин</th>
            				<th>E-mail</th>
            			</tr>
            		</thead>
            		<tbody>
		            	<?php foreach ($list as $val): ?>
		            		<tr>
		            			<td><?php echo $val['login']; ?></td>
		            			<td><?php echo $val['email']; ?></td>
		            		</tr>
		            	<?php endforeach; ?>
		            </tbody>
		        </table>
            	<?php echo $pagination; ?>
            <?php endif; ?>
        </div>
    </div>
</div>