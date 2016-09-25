<html>

<head>
    <link rel="stylesheet" href="assets/build/src/orientame.css">
    <link rel="stylesheet" href="assets/css/charts.css">
    <script src="assets/build/src/orientame.js"></script>
    <script src="assets/js/charts.js"></script>
    <script src="assets/js/social.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

</head>
<body>
<div id="cover-display">
</div>
<?php
require "$view"
?>


<?php if (\Flash::hasMessage()) {
    $msgs = \Flash::getMessage();
    ?>
    <script>
        <?php foreach ($msgs as $msg) { ?>
        $.notify({
            message: '<?php echo $msg ?>'
        }, {
            type: 'success',
            z_index: 1052
        });
        <?php } ?>
    </script>
    <?php
}
if (\Flash::hasError()) {
    $errors = \Flash::getError();
    ?>
    <script>
        <?php foreach ($errors as $error) { ?>
        $.notify({
            message: '<?php echo $error; ?>'
        }, {
            type: 'danger',
            z_index: 1052
        });
        <?php } ?>

    </script>
<?php } ?>


</body>
<footer>
    <script>
        var Orientame = {};
        Orientame.UI = Orientame.UI || {};
        Orientame.UI.coverOn = function () {
            $("#cover-display").show();
        }
        Orientame.UI.coverOff = function () {
            $("#cover-display").hide();
        }


    </script>

    <style>
        #cover-display {
            display: none;
            position: fixed;
            z-index: 999999;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(255, 255, 255, .8) url('http://www.brainpecks.com/wp-content/uploads/2014/02/clock-loading.gif') 50% 50% no-repeat;
            background-size: 250px 200px;
        }
    </style>
</footer>
</html>

