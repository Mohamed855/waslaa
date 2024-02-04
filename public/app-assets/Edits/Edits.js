$(window).on('load', function() {
    if (feather) {
        feather.replace({
            width: 14,
            height: 14
        });
    }
})

document.querySelector('.FullScreenMode').addEventListener('click', function() {
    toggleFullScreen();
});

function toggleFullScreen() {
    if (!document.fullscreenElement && // alternative standard method
        !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement
    ) { // current working methods
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
        } else if (document.documentElement.msRequestFullscreen) {
            document.documentElement.msRequestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
            document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }

    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        }
    }
}

(function(window, document, $) {

    var touchspinValue = $('.touchspin-min-max'),
        counterMin = 0,
        counterMax = 100;
    if (touchspinValue.length > 0) {
        touchspinValue
            .TouchSpin({
                min: counterMin,
                max: counterMax,
                buttondown_txt: feather.icons['minus'].toSvg(),
                buttonup_txt: feather.icons['plus'].toSvg()
            })
            .on('touchspin.on.startdownspin', function() {
                var $this = $(this);
                $('.bootstrap-touchspin-up').removeClass('disabled-max-min');
                if ($this.val() == counterMin) {
                    $(this).siblings().find('.bootstrap-touchspin-down').addClass('disabled-max-min');
                }
            })
            .on('touchspin.on.startupspin', function() {
                var $this = $(this);
                $('.bootstrap-touchspin-down').removeClass('disabled-max-min');
                if ($this.val() == counterMax) {
                    $(this).siblings().find('.bootstrap-touchspin-up').addClass('disabled-max-min');
                }
            });
    }

    // Color Options
    $('.touchspin-color').each(function(index) {
        var down = 'btn btn-primary',
            up = 'btn btn-primary',
            $this = $(this);
        if ($this.data('bts-button-down-class')) {
            down = $this.data('bts-button-down-class');
        }
        if ($this.data('bts-button-up-class')) {
            up = $this.data('bts-button-up-class');
        }
        $this.TouchSpin({
            mousewheel: false,
            buttondown_class: down,
            buttonup_class: up,
            buttondown_txt: feather.icons['minus'].toSvg(),
            buttonup_txt: feather.icons['plus'].toSvg()
        });
    });
})(window, document, jQuery);

