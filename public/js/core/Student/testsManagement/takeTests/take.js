$(document).ready(function() {

    var displayMessage = true;

    $(window).bind('beforeunload', function(){
        //the custom message for page unload doesn't work on Firefox
        if(displayMessage){
            var message = '페이지를 나가시면 시험이 일시정지 상태가 됩니다.';
            return message;
        }
    });

    $('*').hover(
        function(){displayMessage = false;},
        function(){displayMessage = true;}
    );

    var currentTime = $("input[name='lvl_test_time_left']").val();

    var test_timer = new (function() {
        var $countdown;
        var $lvl_test_time_left;
        var $form;
        var decrementTime = 70;

        $(function() {
            // Setup the timer
            $countdown = $('#countdown');
            $lvl_test_time_left = $("input[name='lvl_test_time_left']");
            test_timer.Timer = $.timer(updateTimer, decrementTime, true);
        });

        function updateTimer() {

            // Output timer position
            var timeString = formatTime(currentTime);
            $countdown.html(timeString);
            $lvl_test_time_left.val(currentTime);
            // If timer is complete, trigger alert
            if (currentTime == 0) {
                test_timer.Timer.stop();
                alert('시험 시간이 종료되었습니다.');
                //타이머 종료 후 작업 추가
                return;
            }

            // Increment timer position
            currentTime -= decrementTime;
            if (currentTime < 0) currentTime = 0;

        }

        this.resetCountdown = function() {

            // Get time from form
            var newTime = parseInt($form.find('input[type=text]').val()) * 1000;
            if (newTime > 0) {currentTime = newTime;}

            // Stop and reset timer
            test_timer.Timer.stop().once();

        };

    });

    // Common functions
    function pad(number, length) {
        var str = '' + number;
        while (str.length < length) {str = '0' + str;}
        return str;
    }
    function formatTime(time) {
        time = time / 10;
        var min = parseInt(time / 6000),
            sec = parseInt(time / 100) - (min * 60),
            hundredths = pad(time - (sec * 100) - (min * 6000), 2);
        return (min > 0 ? pad(min, 2) : "00") + ":" + pad(sec, 2);
    }

    $("input:radio").change(function(e) {
        var temp = $(this).attr("name");
        var answer_number = temp.substring(temp.lastIndexOf("_") + 1, temp.length);
        var answer = $(this).val();
        temp = window.location.href;
        var lvl_test_id = temp.substring(temp.lastIndexOf("/") + 1, temp.length);
        $.get("../ajax/updateAnswer/" + lvl_test_id + "/" + answer_number + "/" + answer, function(data) {})
    });
});