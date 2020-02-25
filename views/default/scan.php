<?php
use yii\helpers\Html;
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3"  style="background: white; padding: 20px; box-shadow: 10px 10px 5px #888888; margin-top: 100px;">
                <h1>Time-Based Authentication</h1>
                <p style="font-style: italic;text-align: center;">A Google Authenticator</p>
                <?php //echo $Authenticator->getCode($_SESSION['auth_secret']); ?>
                <hr>
                <?= Html::beginForm(['/authenticator/default/scan'], 'POST'); ?>
                    <div style="text-align: center;">
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
                            
                            <img style="text-align: center;" class="img-fluid" src="<?php echo $qrCodeUrl ?>" alt="Verify this Google Authenticator"><br><br>
                        <?php } ?>

                            <input type="text" class="form-control" name="code" placeholder="******" style="font-size: xx-large;width: 200px;border-radius: 0px;text-align: center;display: inline;color: #0275d8;"><br> <br>    
                            <button type="submit" class="btn btn-md btn-primary" style="width: 200px;border-radius: 0px;">Verify</button>

                    </div>

                <?= Html::endForm(); ?>
            </div>
        </div>
    </div>
