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


//        TODO - move repetative stuff in to functions - make better during the ticket to style radio player
//          TODO - remove from global.js - only load on radio player page.

        var player = videojs('#radio-player', setup, function () {
        });

        $('[data-audio-src]').on('click.play-radio-show', function (e) {
            e.preventDefault();
            var src = $(this).data('audio-src');
            var currentShow = $('[data-audio-src="' + src + '"]').parent();
            if (!currentShow.next().length) {
                $('#play-next-show').hide();
            } else {
                $('#play-next-show').show();
            }
            if (!currentShow.prev().length) {
                $('#play-prev-show').hide();
            } else {
                $('#play-prev-show').show();
            }
            if ($(this).hasClass('moj-audio-paused')) {
                player.play();
            } else if ($(this).hasClass('moj-audio-playing')) {
                player.pause();
            } else {
                player.src([
                    {type: 'audio/mp3', src: src}
                ]).play();
            }
        });

        $('#play-next-show').on('click', function () {
            var src = player.src();
            var currentShow = $('[data-audio-src="' + src + '"]').parent();
            var nextShow = currentShow.next();
            nextShow.find('a').click();
        });

        $('#play-prev-show').on('click', function () {
            var src = player.src();
            var currentShow = $('[data-audio-src="' + src + '"]').parent();
            var prevShow = currentShow.prev();
            prevShow.find('a').click();
        });

        player.on('play', function () {
            var src = player.src();
            $('.radio-container ul li a').removeClass('moj-audio-paused moj-audio-playing');
            $('.radio-container ul li a span.play-show-icon-clock').removeClass('icon-clock-white').addClass('icon-clock');

            //Remove pause button from every row and add a play button
            $('.radio-container ul li a span.play-show-button').removeClass('icon-pause-button-white').addClass('icon-play-button');

            var selectedShow = $('[data-audio-src="' + src + '"]');
            selectedShow.addClass('moj-audio-playing');

            //Add a white pause button to the row which is playing
            selectedShow.find('span.play-show-button').removeClass('icon-play-button').removeClass('icon-play-button-white').addClass('icon-pause-button-white');

            $('.radio-container ul li').removeClass('show-playing');
            selectedShow.parent().addClass('show-playing');

            //Change the highlighted rows clock to white
            selectedShow.find('.icon.play-show-icon-clock').addClass('icon-clock-white').removeClass('icon-clock');
        });

        player.on('pause', function (e) {
            var src = player.src();
            $('.radio-container ul li a').removeClass('moj-audio-paused moj-audio-playing');
            $('[data-audio-src="' + src + '"]').addClass('moj-audio-paused');
            var selectedShow = $('[data-audio-src="' + src + '"]');

            //Remove pause button and replace with white play button
            selectedShow.find('.icon.icon-pause-button-white').removeClass('icon-pause-button-white').addClass('icon-play-button-white');
        });

        //Highlight selected show on page load
        var src = player.src();
        var selectedShow = $('[data-audio-src="' + src + '"]');
        selectedShow.parent().addClass('show-playing');
        selectedShow.find('.icon.icon-clock').addClass('icon-clock-white').removeClass('icon-clock');
        selectedShow.find('.icon.icon-play-button').addClass('icon-play-button-white').removeClass('icon-play-button');

        if (!selectedShow.parent().next().length) {
            $('#play-next-show').hide();
        }

        if (!selectedShow.parent().prev().length) {
            $('#play-prev-show').hide();
        }

    });
}(jQuery));
