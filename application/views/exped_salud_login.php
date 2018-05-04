<?php
    if ($message != ""){
        $class = "has-error";
    }else{
        $class = "";
    }
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Chain Responsive Bootstrap3 Admin</title>

        <link href="<?= $path ?>css/style.default.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="signin">
        
        
        <section>
            
            <div class="panel panel-signin">
                <div class="panel-body">
                    <div class="logo text-center">
                        <img src="<?=$path ?>images/image001.png" alt="Chain Logo" >
                    </div>
                    <br />
                    <h4 class="text-center mb5">Already a Member?</h4>
                    <p class="text-center">Sign in to your account</p>
                    
                    <div class="mb30"></div>
                    
                    <?= form_open('/master/login'); ?>                                        
                        <div class="input-group mb15 <?=$class ?> ">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>                            
                            <?php echo form_input( array( 'class' => 'form-control', 'placeholder' => $form[0]['placeholder'] , 'name' => $form[0]['name'] ), '', '' ); ?>

                        </div><!-- input-group -->
                        <div class="input-group mb15 <?=$class ?>">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <?php echo form_input( array( 'class' => 'form-control', 'placeholder' => $form[1]['placeholder'] , 'name' => $form[1]['name'] ), '', '', 'password' ); ?>
                            <?php
                                if($message!=""){
                                    echo "<label for='name' class='error'>" . $message . "</label>";
                                }

                            ?>
                        </div><!-- input-group -->
                        
                        <div class="clearfix">
                            <div class="pull-left">
                                <div class="ckbox ckbox-primary mt10">
                                    <input type="checkbox" id="rememberMe" value="1">
                                    <label for="rememberMe">Remember Me</label>
                                </div>
                            </div>
                            <div class="pull-right">                                
                                <?= form_submit_button('', 'Subir curso', array( 'class' => 'btn btn-success' ), 'Sign In <i class="fa fa-angle-right ml5"></i>') ?>
                            </div>
                        </div>
                        
                    <?= form_close(); ?>                      
                    
                    
                </div><!-- panel-body -->
                <div class="panel-footer">
                    <a href="<?= $path . "index.php/master/signin"; ?>" class="btn btn-primary btn-block">Not yet a Member? Create Account Now</a>
                </div><!-- panel-footer -->
            </div><!-- panel -->
            
        </section>


        <script src="<?=$path ?>js/jquery-1.11.1.min.js"></script>
        <script src="<?=$path ?>js/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?=$path ?>js/bootstrap.min.js"></script>
        <script src="<?=$path ?>js/modernizr.min.js"></script>
        <script src="<?=$path ?>js/pace.min.js"></script>
        <script src="<?=$path ?>js/retina.min.js"></script>
        <script src="<?=$path ?>js/jquery.cookies.js"></script>

        <script src="<?=$path ?>js/custom.js"></script>

    </body>
</html>
