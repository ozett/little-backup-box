<html lang="en">
    <!-- Author: Dmitri Popov, dmpop@linux.com
         License: GPLv3 https://www.gnu.org/licenses/gpl-3.0.txt -->

    <head>
	<meta charset="utf-8">
	<title>Little Backup Box</title>
	<link rel="shortcut icon" href="favicon.png" />
	<link rel="stylesheet" href="css/lit.css">
	<link href="https://fonts.googleapis.com/css2?family=Nunito" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	 textarea {
	     font-size: 15px;
	     width: 100%;
	     height: 55%;
	     line-height: 1.9;
	     margin-top: 2em;
	 }
	</style>
    </head>
    <body>
	<div class="c">
	    <?php
	    // include i18n class and initialize it
	    require_once 'i18n.class.php';
	    $i18n = new i18n('lang/{LANGUAGE}.ini', 'cache/', 'en');
	    $i18n->init();
            if ($_POST["save"]){
		Write();
            };
            ?>
	    <h1><?php echo L::edit; ?></h1>
	    <hr>
            <?php
            function Read() {
		$CONFIGFILE = "config.cfg";
                echo file_get_contents($CONFIGFILE);
            }
            function Write() {
		$CONFIGFILE = "config.cfg";
                $fp = fopen($CONFIGFILE, "w");
                $data = $_POST["text"];
                fwrite($fp, $data);
                fclose($fp);
            }
            ?>     
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<textarea name="text"><?php Read(); ?></textarea>
		<?php echo '<input class="btn primary" type="submit" name="save" value="'.L::edit_save_b.'">'; ?>
		<a class="btn" href="index.php"><?php echo L::back_b; ?></a>
            </form>
	</div>
    </body>
</html>
