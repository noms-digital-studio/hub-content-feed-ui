$(document).ready(function () {
    $('.bxslider').bxSlider();

    $("#AboutInfo").hide();
    $("#EpisodeLink").click(function (e) {
        e.preventDefault();
        $("#AboutInfo").hide();
        $("#EpisodeInfo").show();
        $(this).addClass("active");
        $("#AboutLink").removeClass("active");
    });
    $("#AboutLink").click(function (e) {
        e.preventDefault();
        $("#AboutInfo").show();
        $("#EpisodeInfo").hide();
        $("#EpisodeLink").removeClass("active");
        $(this).addClass("active");
    });
});

(function ($) {

    $(function () {

        var setup = {
            'controls': true,                        
                'controlBar': {
                    'children': {                        
                        'muteToggle': {},
                        'playToggle': {},
                        'volumeControl': {},                 
                        'durationDisplay': {},                        
                        'currentTimeDisplay': {},
                        'progressControl': {
                            'children': {
                                'seekBar': {
                                    'children': {
                                        'playProgressBar': {}                                        
                                    }
                                }
                            }
                        }
                    }
                }
            
        };

        var player = videojs('#radio-player', setup, function(){
            
        });

//        $(".vjs-progress-control.").on('click', function (e) {
//            e.preventDefault;
//        });

        //Play show
//        $('[data-audio-src]').on('click.moj-audio-play', function (e) {
//            e.preventDefault();
//            player.src([
//                {type: 'audio/mp3', src: $(this).data('audio-src')}
//            ]).play();
//        });

    });
}(jQuery));
