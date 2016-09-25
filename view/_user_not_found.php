<nav class="navbar navbar-default navbar-fixed-top" style="margin-bottom: 400px">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#" style="margin-top: -10px">
                <img alt="Brand" src="http://2.bp.blogspot.com/-58Yhlvz0cn0/VPi2Qbn6EPI/AAAAAAAAA_U/OwJdOM3Ge0A/s1600/brujula-1024x1024.png" width="40" height="40">
            </a>

        </div>

        <ul class="nav navbar-nav navbar-left">
            <li><a href="#">ORIENTACIÓN VOCACIONAL</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="profile.php?action=logout">Salir</a></li>
        </ul>
    </div>
</nav>
<br>
<br>


<div class="container" style="margin-top: 40px">
    <div class="row">
        <div class="span12">
            <div class="hero-unit center">
                <h1>Error <small><font face="Tahoma" color="red">Usuario no encontrado</font></small></h1>
                <br />
                <p><?php echo $user->first_name ?>, Es posible que aun no te hayas registrado en la aplicación Android de Orientación vocacional</p>
                <p>Descargala ya <a href="<?php echo URL_APP_ANDROID ?>">aquí</a> </p>
                <br>
                <a href="profile.php?action=logout" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Salir</a>
            </div>
            <br />
            <p></p>
            <!-- By ConnerT HTML & CSS Enthusiast -->
        </div>
    </div>
</div>


<style>
    .center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto;}

</style>
