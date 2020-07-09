$(function() {
    var rangePercent = $('#temperatureRangeSlider').val();
    $('#temperatureRangeSlider').on('change input', function() {
        rangePercent = $('#temperatureRangeSlider').val();
        $('#rangePercent').html(rangePercent + '<span></span>');
        $('#temperatureRangeSlider, h4>span').css('filter', 'hue-rotate(-' + rangePercent / 2 + 'deg)');
        // $('h4').css({'transform': 'translateX(calc(-50% - 20px)) scale(' + (1+(rangePercent/100)) + ')', 'left': rangePercent+'%'});
        $('#rangePercent').css({ 'transform': 'translateX(-50%) scale(' + (1 + (rangePercent / 140)) + ')', 'left': rangePercent + '%' });
    });

});

$(function() {
    var rangePercent = $('#humidityRangeSlider').val();
    $('#humidityRangeSlider').on('change input', function() {
        rangePercent = $('#humidityRangeSlider').val();
        $('#rangePercent1').html(rangePercent + '<span></span>');
        $('#humidityRangeSlider, h4>span').css('filter', 'hue-rotate(-' + rangePercent / 2 + 'deg)');
        // $('h4').css({'transform': 'translateX(calc(-50% - 20px)) scale(' + (1+(rangePercent/100)) + ')', 'left': rangePercent+'%'});
        $('#rangePercent1').css({ 'transform': 'translateX(-50%) scale(' + (1 + (rangePercent / 140)) + ')', 'left': rangePercent + '%' });
    });
});

$(function() {
    var rangePercent = $('#SMRangeSlider').val();
    $('#SMRangeSlider').on('change input', function() {
        rangePercent = $('#SMRangeSlider').val();
        $('#rangePercent2').html(rangePercent + '<span></span>');
        $('#SMRangeSlider, h4>span').css('filter', 'hue-rotate(-' + rangePercent / 2 + 'deg)');
        // $('h4').css({'transform': 'translateX(calc(-50% - 20px)) scale(' + (1+(rangePercent/100)) + ')', 'left': rangePercent+'%'});
        $('#rangePercent2').css({ 'transform': 'translateX(-50%) scale(' + (1 + (rangePercent / 140)) + ')', 'left': rangePercent + '%' });
    });
});