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
        var player = videojs('#radio-player', setup, function () {
        });
                
        $('[data-audio-src]').on('click.play-radio-show', function (e) {
            e.preventDefault();
            if ($(this).hasClass('moj-audio-paused')) {
                player.play();
            } else if ($(this).hasClass('moj-audio-playing')) {
                player.pause();
            } else {
                player.src([
                    {type: 'audio/mp3', src: $(this).data('audio-src')}
                ]).play();
            }
        });
                
        player.on('play', function () {
            var src = player.src();
            $('.moj-audio-paused, .moj-audio-playing').removeClass('moj-audio-paused moj-audio-playing');
            $('[data-audio-src="' + src + '"]').addClass('moj-audio-playing');
        });
        
        player.on('pause', function (e) {
            var src = player.src();
            $('.moj-audio-paused, .moj-audio-playing').removeClass('moj-audio-paused moj-audio-playing');
            $('[data-audio-src="' + src + '"]').addClass('moj-audio-paused');
        });

    });
}(jQuery));
