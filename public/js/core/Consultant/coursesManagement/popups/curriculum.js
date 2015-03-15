(function(namespace, $) {
    "use strict";

    var CurriculumPopUp = function() {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function() {

            jQuery.ajaxSetup({async:false});

            $(".radio-inline").click(function(e) {
                var course_main_type_id = $(this).find(">:first-child").val();
                $.get("../ajax/getCourseSubTypes/" + course_main_type_id, function(data) {
                    $("#course_sub_types_row").html(data);
                });
                $("input[name=course_main_type]").change(function() {
                    window.opener.$("#curriculum").val("");
                });
                $(":radio[class=sub_types]").change(function() {
                    if(this.checked) {
                        var checked_value = $(this).val();
                        window.opener.$("#curriculum").val(checked_value);
                    }
                })
                $(":checkbox").change(function() {
                    if(this.checked) {
                        var checked_value = $(this).val();
                        var original_value = window.opener.$("#curriculum").val();
                        if(original_value) {
                            original_value = original_value + ",";
                        }
                        window.opener.$("#curriculum").val(original_value + checked_value);
                    }
                    else {
                        var unchecked_value = $(this).val();
                        var original_value = window.opener.$("#curriculum").val();
                        var index_of_comma = original_value.indexOf(unchecked_value);
                        var changed_value = "";
                        if (index_of_comma == 0) {
                            changed_value = original_value.replace(unchecked_value + ",", "");
                            if(original_value == unchecked_value) {
                                changed_value = original_value.replace(unchecked_value, "");
                            }
                        }
                        else {
                            changed_value = original_value.replace("," + unchecked_value, "");
                        }
                        window.opener.$("#curriculum").val(changed_value);
                    }
                });
            });

            $(":button").click(function() {
                window.close();
            });

            o.initialize();

        });

    };
    var p = CurriculumPopUp.prototype;

    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function() {
        ;
    };

    // =========================================================================
    namespace.CurriculumPopUp = new CurriculumPopUp;
}(this.boostbox, jQuery)); // pass in (namespace, jQuery):