<div class="container">
    <h1 class="mt-4 mb-3">Восстановление пароля</h1>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <form action="/account/recovery" method="post">
                <div class="control-group form-group">
                    <div class="controls">
                        <label>E-mail:</label>
                        <input type="email" class="form-control" name="email">
                        <p class="help-block"></p>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Восстановить пароль</button>
            </form>
        </div>
    </div>
</div>