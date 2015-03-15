/**
 * Created by finallee on 15. 1. 15..
 */
$(document).ready(function() {
    $("#postcodify_search_button").postcodifyPopUp();
    $("#postcode_1").postcodifyPopUp();
    $("#postcode_2").postcodifyPopUp();
    $("#address_1").postcodifyPopUp();

    $("#available_time_morning_checkbox").click(function(e) {
        if($("#available_time_morning_checkbox").is(":checked")) {
            $("#available_time_morning_start").removeAttr("disabled").attr("required", "required").timepicker({
                "timeFormat": "H:i",
                "minTime": "06:00",
                "maxTime": "12:00"
            });
            $("available_time_morning_start").on("changeTime", function() {
                $(this).focusout();
                $("#available_time_morning_end").focus();
            });
            $("#available_time_morning_end").removeAttr("disabled").attr("required", "required").timepicker({
                "timeFormat": "H:i",
                "minTime": "06:00",
                "maxTime": "12:00"
            });

        }
        else {
            $("#available_time_morning_start").attr("disabled", "disabled").removeAttr("required");
            $("#available_time_morning_end").attr("disabled", "disabled").removeAttr("required");
        }
    });

    $("#available_time_afternoon_checkbox").click(function(e) {
        if($("#available_time_afternoon_checkbox").is(":checked")) {
            $("#available_time_afternoon_start").removeAttr("disabled").attr("required", "required").timepicker({
                "timeFormat": "H:i",
                "minTime": "12:00",
                "maxTime": "18:00"
            });
            $("available_time_afternoon_start").on("changeTime", function() {
                $(this).focusout();
                $("#available_time_afternoon_end").focus();
            });
            $("#available_time_afternoon_end").removeAttr("disabled").attr("required", "required").timepicker({
                "timeFormat": "H:i",
                "minTime": "12:00",
                "maxTime": "18:00"
            });

        }
        else {
            $("#available_time_afternoon_start").attr("disabled", "disabled").removeAttr("required");
            $("#available_time_afternoon_end").attr("disabled", "disabled").removeAttr("required");
        }
    });

    $("#available_time_night_checkbox").click(function(e) {
        if($("#available_time_night_checkbox").is(":checked")) {
            $("#available_time_night_start").removeAttr("disabled").attr("required", "required").timepicker({
                "timeFormat": "H:i",
                "minTime": "18:00",
                "maxTime": "24:00"
            });
            $("available_time_night_start").on("changeTime", function() {
                $(this).focusout();
                $("#available_time_night_end").focus();
            });
            $("#available_time_night_end").removeAttr("disabled").attr("required", "required").timepicker({
                "timeFormat": "H:i",
                "minTime": "18:00",
                "maxTime": "24:00"
            });

        }
        else {
            $("#available_time_night_start").attr("disabled", "disabled").removeAttr("required");
            $("#available_time_night_end").attr("disabled", "disabled").removeAttr("required");
        }
    });

    $("#refresh").click(function(e) {
        document.location.reload(true);
    });
});

(function(namespace, $) {
    "use strict";

    var jobPoolingSignUpForm = function() {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function() {
            o.initialize();
        });

    };
    var p = jobPoolingSignUpForm.prototype;

    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function() {
        this._initSelect2();
        this._initWysiwyg();
    };

    // =========================================================================
    // SELECT2
    // =========================================================================

    p._initSelect2 = function() {
        if (!$.isFunction($.fn.select2)) {
            return;
        }
        $(".select2-list").select2({
            allowClear: true
        });
    };

    p._initWysiwyg = function() {
        if (typeof wysihtml5 === 'undefined') {
            return;
        }
        var editor = new wysihtml5.Editor("wysiwyg", {
            toolbar: "toolbar",
            parserRules: wysihtml5ParserRules
        });
        boostbox.App.monitorWysihtml5(editor);
    };

    namespace.jobPoolingSignUpForm = new jobPoolingSignUpForm;
}(this.boostbox, jQuery)); // pass in (namespace, jQuery):
