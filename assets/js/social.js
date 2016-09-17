$(document).ready(function () {

    Orientame = Orientame || {};

    Orientame.socialNetwork = (function ($, _) {

        var answers = $("#profile").data('answers');
        var token = $("#profile").data('token');


        var share = function (network) {

            var interests = document.getElementById('interests').toDataURL();
            var skills = document.getElementById('skills').toDataURL();
            var personality = document.getElementById('personality').toDataURL();

            $.ajax({
                url: 'api.php?action=share&type=' + network.toLowerCase(),
                type: 'POST',
                data: {
                    interests: interests,
                    skills: skills,
                    personality: personality,
                    token : token
                }
            }).done(function (r) {
                location.href = 'sharer.php?action=share&code=' + r.code;
                //console.log(r);
                //alert('Información compartida correctamente');
            }).fail(function (e) {
                alert('Hubo un error compartiendo la información');
            });
        }

        return {
            share: share
        }


    })($, _);


    //Orientame.socialNetwork.render();

})
