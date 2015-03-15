(function(namespace, $) {
    "use strict";

    var NewCourseRequest = function() {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function() {
            o.initialize();
        });

    };
    var p = NewCourseRequest.prototype;

    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function() {
        this._initPopUp();
        this._initDateTime();
        this._initSelect2();
    };

    // =========================================================================
    // POP UP WINDOW INIT
    // =========================================================================

    p._initPopUp = function() {
        $('#curriculum_popup_open, #curriculum').click(function(e) {
            window.open('popups/curriculum',
                        'popup',
                        'width=800px, height=600px, left=0, top=0, resizeable=false');
        });
    }

    // =========================================================================
    // DATETIME PICKER
    // =========================================================================

    p._initDateTime = function() {
        if (!$.isFunction($.fn.DateTimePicker)) {
            return;
        }
        $('#dtBox').DateTimePicker({
            addEventHandlers: function() {
                var dtPickerObj = this;
                $("#start_date").change(function(e) {
                    var selected_date = $(this).val();
                    var selected_date_tokens = selected_date.split("-");
                    selected_date_tokens[2]++;
                    var selected_date = selected_date_tokens.join("-");
                    $("#end_date").attr('data-min', selected_date);
                });
            }
        });
    };

    // =========================================================================
    // SELECT2
    // =========================================================================

    p._initSelect2 = function() {
        $("#running_days").select2();
    }

    // =========================================================================
    namespace.NewCourseRequest = new NewCourseRequest;
}(this.boostbox, jQuery)); // pass in (namespace, jQuery):
