$(document).ready(function () {

    Orientame = Orientame || {};

    Orientame.socialNetwork = (function ($, _) {

        var answers = $("#profile").data('answers');
        var token = $("#profile").data('token');


        var share = function (network) {

            var interests = document.getElementById('interests').toDataURL();
            var skills = document.getElementById('skills').toDataURL();
            var personality = document.getElementById('personality').toDataURL();


            bootbox.prompt("Comenta algo sobre tu resultado", function(result) {
                if (result !== null) {


                    $.ajax({
                        url: 'api.php?action=share&type=' + network.toLowerCase(),
                        type: 'POST',
                        headers: {
                            'token': '$4mr$8xy5vPxsn'
                        },
                        data: {
                            interests: interests,
                            skills: skills,
                            personality: personality,
                            token: token,
                            message : result
                        },
                        beforeSend: function () {
                            Orientame.UI.coverOn();
                        }
                    }).done(function (r) {
                        location.href = 'sharer.php?action=share&code=' + r.code ;
                    }).fail(function (e) {
                        $.notify({
                            message: 'Ha ocurrido un error compartiendo el resultado, por favor inténtelo nuevamente'
                        }, {
                            type: 'danger',
                            z_index: 1052
                        });
                    }).always(function () {
                        Orientame.UI.coverOff();
                    });

                }
            });



        }

        return {
            share: share
        }


    })($, _);


    //Orientame.socialNetwork.render();

})
