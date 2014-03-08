<!DOCTYPE html>

<html>
<head>
    <title>Install OriginCMS</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>

<body>
    <div class="container">
        <?php
            
            $cwd=getcwd();
            $rootDir=str_replace('install', '', $cwd);
        
            //step 1- general info
            if((!isset($_GET['step'])) || $_GET['step']=='1'){
                if(file_exists($rootDir . '/includes/config.php')){
                    echo '<p>The config file is already written. If you would like to reinstall, please delete /includes/config.php</p>';
                    die();
                } elseif(!file_exists($rootDir . '/includes/config.php')){
                    echo '
                        <h1>Welcome!</h1>
                        <hr>
                        <p>Welcome to the OriginCMS installation process. This should only take a few minutes and will guide you through the installation. </p>
                        <br>
                        <h1>Needed information:</h1>
                        <hr>
                        <p>We will need to know a few things before we can start the install.</p>
                        <form class="form-horizontal" id="form" role="form" method="post" action="./?step=2">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Site name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Name" name="siteName" data-msg-required="This field is required" data-rule-required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Site description</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" placeholder="Description for search engines. Only applies if search engine indexing is enabled." name="siteDesc"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Admin username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="admin" name="adminUser" data-msg-required="This field is required" data-rule-required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Admin email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" placeholder="Email" name="adminEmail" data-msg-required="This field is required" data-rule-required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Admin password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" placeholder="Password" name="adminPass" data-msg-required="This field is required" data-rule-required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Confirm password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" placeholder="Password" name="adminPassConfirm" data-msg-required="This field is required" data-rule-required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                        <input type="checkbox" name="indexing" checked>Allow search engine indexing
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Next</button>
                                </div>
                            </div>
                        </form>
                    ';
                }else{
                    echo '<p>An unexpected error occurred and the config file both exists and doesn\'t exist at the same time. Please get a new <a href="https://www.teknostuf.com/OriginCMS/hosting>host</a>."';
                }
            }else{


                //step 2- db stuff
                if($_GET['step']=='2'){
                    session_start();
                    $_SESSION['siteName']=$_POST['siteName'];
                    $_SESSION['siteDesc']=$_POST['siteName'];
                    $_SESSION['adminUser']=$_POST['adminUser'];
                    $_SESSION['adminPass']=$_POST['adminPass'];
                    $_SESSION['adminPassConfirm']=$_POST['adminPassConfirm'];
                    $_SESSION['indexing']=$_POST['indexing'];
                    echo '
                        <h1>OriginCMS Install Step 2</h1>
                        <hr>
                        <p>You should have already made a mysql database before this step. If you didn\'t, go do it now. If you already have one, enter your connection info below.</p>
                        <form class="form-horizontal" id="form" role="form" method="post" action="./?step=3">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Database host</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="localhost" name="dbHost" data-msg-required="This field is required" data-rule-required="true" value="localhost">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Database name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="OriginCMS" name="dbName" data-msg-required="This field is required" data-rule-required="true" value="OriginCMS">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">User name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="OriginCMS" name="dbUser" data-msg-required="This field is required" data-rule-required="true" value="OriginCMS">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" placeholder="Password" name="dbPass" data-msg-required="This field is required" data-rule-required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Table prefix</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Prefix" name="dbPre" data-msg-required="This field is required" data-rule-required="true" value="origincms_">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Finish</button>
                                </div>
                            </div>
                        </form>
                    ';
                }else{


                    //step 3- make stuff
                    if($_GET['step']=='3'){
                        $configData="<?php \n".
                                '   $config[\'dbHost\']= \''.$_POST['dbHost']."';\n".
                                '   $config[\'dbName\']=\''.$_POST['dbName']."';\n".
                                '   $config[\'dbUser\']=\''.$_POST['dbUser']."';\n".
                                '   $config[\'dbPass\']=\''.$_POST['dbPass']."';\n".
                                '   $config[\'dbPre\']=\''.$_POST['dbPre']."';\n".
                            '?>
                        ';
                        $file=$rootDir . '/includes/config.php';
                        echo 'Succesfully created config.';
                        file_put_contents($file, $configData);

                        //create tables in the database
                        require_once($rootDir . '/classes/mysqli.php');
                        doSql("
                            CREATE TABLE IF NOT EXISTS `templates` (
                                `id` int(10) NOT NULL AUTO_INCREMENT,
                                `title` varchar(25),
                                `version_id` int(10),
                                `version_string` varchar(25),
                                `style_id` int(10),
                                `addon_id` int(10),
                                PRIMARY KEY (`id`)
                            )
                        ");
                    }
                }
            }
        ?>
    </div>
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jQuery.validate/1.11.1/jquery.validate.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script>
        //make sure all required fields are filled out
        $("form").validate({
            showErrors: function(errorMap, errorList) {
                //document.getElementById("required").className += " has-error";
                // Clean up any tooltips for valid elements
                $.each(this.validElements(), function (index, element) {
                    var $element = $(element);
                    $element.data("title", "") // Clear the title - there is no error associated anymore
                      .removeClass("error")
                      .tooltip("destroy");
                })
                $.each(errorList, function (index, error) {
                    var $element = $(error.element);
                    $element.tooltip("destroy") // Destroy any pre-existing tooltip so we can repopulate with new tooltip content
                    .data("title", error.message)
                    .parent().parent().addClass("has-error")
                    .tooltip(); // Create a new tooltip based on the error messsage we just set in the title
                });
            }
        });
    </script>
</body>
</html>
