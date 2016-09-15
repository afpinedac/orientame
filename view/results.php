<div class="row-fluid" id="profile" data-answers="<?php echo $user->answers ?>">


    <div class="col-sm-11 col-sm-offset-1">

        <div class="col-sm-6">

            <h3> Profile</h3>

            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <a href="#" class="thumbnail">
                        <img
                            src="http://fdzeta.com/data/MetaMirrorCache/_img_media_4fe247229f26aaee75ebb32d85db2e844452a402_0_64_3520_3317a7e76a89a2cfe21d0d30292be64d.jpg"
                            alt="...">
                    </a>
                </div>
                <p><?php echo $user->first_name . " " .  $user->last_name ?></p>
                <p><?php echo $user->email ?></p>
                <p>Medellín</p>
            </div>
        </div>
        <div class="col-sm-6">
            <h3>Intereses</h3>

            <canvas id="interests" width="200" height="100"></canvas>


        </div>


    </div>
    <div class="col-sm-12">

        <div class="col-sm-6">

            <h3>Personalidad</h3>

            <div class="col-sm-12">
                <div class="col-sm-2">
                    <input type="text" class="input-sm">
                </div>
                <div class="col-sm-8">
                    <div id="personality-1" class="personality-slider"></div>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="input-sm">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-2">
                    <input type="text" class="input-sm">
                </div>
                <div class="col-sm-8">
                    <div id="personality-2" class="personality-slider"></div>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="input-sm">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-2">
                    <input type="text" class="input-sm">
                </div>
                <div class="col-sm-8">
                    <div id="personality-3" class="personality-slider"></div>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="input-sm">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-2">
                    <input type="text" class="input-sm">
                </div>
                <div class="col-sm-8">
                    <div id="personality-4" class="personality-slider"></div>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="input-sm">
                </div>
            </div>


        </div>
        <div class="col-sm-6">
            <h3>habilidades</h3>
            <canvas id="skills" width="80" height="100"></canvas>

        </div>


    </div>
</div>