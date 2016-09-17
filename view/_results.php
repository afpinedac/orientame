<nav class="navbar navbar-default navbar-fixed-top" style="margin-bottom: 400px">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img alt="Brand" src="...">
            </a>
        </div>
    </div>
</nav>
<br>
<br>

<div class="row-fluid" style="" id="profile" data-answers="<?php echo $user->answers ?>"
     data-token="<?php echo $user->token ?>">

    <div class="col-sm-10 col-sm-offset-1">

        <div class="col-sm-6">

            <h3>Perfil</h3>

            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <a href="#" class="thumbnail">
                        <img
                            src="http://fdzeta.com/data/MetaMirrorCache/_img_media_4fe247229f26aaee75ebb32d85db2e844452a402_0_64_3520_3317a7e76a89a2cfe21d0d30292be64d.jpg"
                            alt="...">
                    </a>
                </div>
                <p><strong>Nombre:</strong> <?php echo ucfirst($user->first_name) . " " . ucfirst($user->last_name) ?>
                </p>
                <p><strong>Email: </strong><?php echo strtolower($user->email) ?></p>
            </div>
        </div>
        <div class="col-sm-6" style="text-align: center">
            <h3>Intereses</h3>
            <canvas id="interests" width="200" height="100" style="display: inline-block"></canvas>
        </div>


    </div>
    <div class="col-sm-10 col-sm-offset-1">

        <div class="col-sm-6" style="text-align: center">

            <h3>Personalidad</h3>

            <canvas id="personality" width="500" height="200" style="display: inline-block"></canvas>


        </div>
        <div class="col-sm-6" style="text-align: center">
            <h3>Habilidades</h3>
            <canvas style="display: inline-block" id="skills" width="100" height="100"></canvas>
        </div>


    </div>

    <div class="col-sm-12" style="margin-top: 20px; text-align: center">
        <div class="" style="display: inline-block">


            <a style="display: inline" href="#" class="btn btn-block btn-social btn-twitter"
               onclick="Orientame.socialNetwork.share('twitter')">
                <span class="fa fa-twitter"></span>
                Compartir en Twitter
            </a> &nbsp;
            <a href="#" style="display: inline" class="btn btn-block btn-social btn-facebook"
               onclick="Orientame.socialNetwork.share('facebook')">
                <span class="fa fa-facebook"></span>
                Compartir en Facebook
            </a>

        </div>
    </div>
</div>


<script src="https://code.createjs.com/createjs-2015.11.26.min.js"></script>
<script>

    var stage = new createjs.Stage("personality");

    var createRangePicker = function (y, position) {

        var gradient = new createjs.Shape();
        gradient.graphics.beginFill("#B3B5C6").drawRoundRect(0, y, 400, 9, 4, 4);
        stage.addChild(gradient);


        var circle = new createjs.Shape();
        circle.graphics.beginFill("#000").drawCircle(position, y - 12, 12);
        circle.x = 0;
        circle.y = 17;
        stage.addChild(circle);
        return circle;

    }

    function init() {

        var ranges = [50, 40, 30, 80];
        var pickers = [];

        _.each(ranges, function (e, i) {
            pickers[i] = createRangePicker((i + 1) * 40, e);
        });

        stage.update();

        createjs.Ticker.on("tick", tick);

        function tick(event) {

            _.each(ranges, function (e, i) {
                if (pickers[i].x < ranges[i]) {
                    pickers[i].x += 3;
                }
            });
            /*if (circle.x < 300) {
             circle.x += 25;
             }*/
            stage.update(event); // important!!
        }


        // stage.addChild(rect);

    }
    init();
</script>

