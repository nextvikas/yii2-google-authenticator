<?php
use yii\helpers\Html;
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 _amd">
                <h1>2 step Authentication</h1>
                <p class="_ap">A Google Authenticator</p>
                <hr>
                <?= Html::beginForm(['/authenticator/default/scan'], 'POST'); ?>
                    <div class="_aform">
                        <?php if (Yii::$app->session->has('failed')): ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Oh snap!</strong> Invalid Code.
                            </div>
                            <?php   
                                Yii::$app->session->remove('failed');
                            ?>
                        <?php endif;

                        if(isset($qrCodeUrl)) {
                        ?>
                            
                            <img class="img-fluid" src="<?php echo $qrCodeUrl ?>" alt="Verify this Google Authenticator"><br><br>
                        <?php } ?>

                            <input type="text" class="form-control" name="code" placeholder="******"><br> <br>    
                            <button type="submit" class="btn btn-md btn-primary">Verify</button>

                    </div>

                <?= Html::endForm(); ?>
            </div>
        </div>
    </div>
<style type="text/css">
._ap {
    font-style: italic;text-align: center;
}
._amd {
    background: white; padding: 20px; box-shadow: 10px 10px 30px 5px #888888; margin-top: 100px;
}
._aform .form-control {
    font-size: xx-large;width: 200px;border-radius: 0px;text-align: center;display: inline;color: #0275d8;
}
._aform .btn.btn-md.btn-primary {
    width: 200px;border-radius: 0px;
}
._aform,._aform img {
    text-align: center;
}
._amd h1 {
    text-align: center;
}
</style>