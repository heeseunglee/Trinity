(function(namespace, $) {
    "use strict";

    var RegisterStudentsDirectly = function() {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function() {
            o.initialize();
        });

    };
    var p = RegisterStudentsDirectly.prototype;

    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function() {
        this._initMultiSelect();
        this._initEventForAddStudentRow();
        this._initEventForRemoveStudentRow();
    };

    // =========================================================================
    // MULTI SELECT
    // =========================================================================

    p._initMultiSelect = function() {
        if (!$.isFunction($.fn.multiSelect)) {
            return;
        }
        $("#existing_students").multiSelect({
            afterSelect: function(value) {
                var number_of_students = $("input[name='number_of_students']").val();
                number_of_students++;
                $("input[name='number_of_students']").val(number_of_students);
                var header_string = $("header h4").html();
                var header_string_array = header_string.split(" ");
                header_string_array[header_string_array.length - 1] = number_of_students + "명";
                $("header h4").html(header_string_array.join(" "));
            },
            afterDeselect: function(value) {
                var number_of_students = $("input[name='number_of_students']").val();
                number_of_students--;
                $("input[name='number_of_students']").val(number_of_students);
                var header_string = $("header h4").html();
                var header_string_array = header_string.split(" ");
                header_string_array[header_string_array.length - 1] = number_of_students + "명";
                $("header h4").html(header_string_array.join(" "));
            }
        });
    };

    // =========================================================================
    // STUDENT ADD ROW
    // =========================================================================

    p._initEventForAddStudentRow = function() {
        $("#add_student_row").click(function() {
            var number_of_students = Number($("input[name='number_of_students']").val());
            number_of_students++;
            $("input[name='number_of_students']").val(number_of_students);
            $("input[name='end_of_student_row']").before("<div class='student_row row'>\
            <div class='box'>\
            <div class='box-head box-head-xs style-support3'>\
            <header><h5 class='text-light'>학생 <strong>#" + number_of_students + "</strong></h5></header>\
            </div>\
            <div class='box-body'>\
            <div class='form-group'>\
            <div class='col-sm-2'>\
            <label for='student_name[]' class='control-label'>이름</label>\
            </div>\
            <div class='col-sm-10'>\
            <input type='text' name='student_name[]' class='form-control' placeholder='이름' required='' data-rule-minlength='2'>\
            </div>\
            </div>\
            <div class='form-group'>\
            <div class='col-sm-2'>\
            <label for='student_email[]' class='control-label'>이메일</label>\
            </div>\
            <div class='col-sm-10'>\
            <input type='email' name='student_email[]' class='form-control' placeholder='이메일' required=''>\
            </div>\
            </div>\
            </div>\
            </div>\
            </div>");
            var header_string = $("header h4").html();
            var header_string_array = header_string.split(" ");
            header_string_array[header_string_array.length - 1] = number_of_students + "명";
            $("header h4").html(header_string_array.join(" "));
        });
    };

    // =========================================================================
    // STUDENT REMOVE ROW
    // =========================================================================

    p._initEventForRemoveStudentRow = function() {
        $("#remove_student_row").click(function() {
            var number_of_students = $("input[name='number_of_students']").val();
            if(number_of_students > 1) {
                number_of_students--;
                $("input[name='number_of_students']").val(number_of_students);
                $("input[name='end_of_student_row']").prev().remove();
                var header_string = $("header h4").html();
                var header_string_array = header_string.split(" ");
                header_string_array[header_string_array.length - 1] = number_of_students + "명";
                $("header h4").html(header_string_array.join(" "));
            }
        });
    };
    // =========================================================================
    namespace.RegisterStudentsDirectly = new RegisterStudentsDirectly;
}(this.boostbox, jQuery)); // pass in (namespace, jQuery):
