<?php
use yii\helpers\Html;
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 _amd">
                <h1>2 step Authentication</h1>
                <p class="_ap">Identify yourself by scannning the QR code with Google Authenticator app</p>
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
                            <p class="_ap">Enter Your Google Authenticator Code</p>

                            <input type="text" class="form-control" name="code" placeholder="******"><br> <br>    
                            <button type="submit" class="btn btn-md btn-primary">Verify</button>

                    </div>

                <?= Html::endForm(); ?>
            </div>
        </div>
    </div>
