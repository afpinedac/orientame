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
<?php require "$view" ?>


<?php if (Flash::hasMessage()) {
    $msgs = Flash::getMessage();
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
if (Flash::hasError()) {
    $errors = Flash::getError();
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
    </script>
</footer>
</html>

