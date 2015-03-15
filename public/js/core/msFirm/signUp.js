(function(namespace, $) {
    "use strict";

    var FormWizard = function() {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function() {
            o.initialize();
        });

    };
    var p = FormWizard.prototype;

    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function() {
        this._initWizard();
    };

    // =========================================================================
    // WIZARD
    // =========================================================================

    p._initWizard = function() {
        var o = this;
        $('#rootwizard').bootstrapWizard({
            onTabShow: function(tab, navigation, index) {
                o._handleTabShow(tab, navigation, index, $('#rootwizard'));
            },
            onNext: function(tab, navigation, index) {
                var form = $('#rootwizard').find('.form-validation');
                var valid = form.valid();
                if(!valid) {
                    form.data('validator').focusInvalid();
                    return false;
                }
            }
        });
    }

    p._handleTabShow = function(tab, navigation, index, wizard){
        var total = navigation.find('li').length;
        var current = index + 0;
        var percent = (current / (total - 1)) * 100;
        var percentWidth = 100 - (100 / total) + '%';

        navigation.find('li').removeClass('done');
        navigation.find('li.active').prevAll().addClass('done');

        wizard.find('.progress-bar').css({width: percent + '%'});
        $('.form-wizard-horizontal').find('.progress').css({'width': percentWidth});
    }

    // =========================================================================
    namespace.FormWizard = new FormWizard;
}(this.boostbox, jQuery)); // pass in (namespace, jQuery):

$(document).ready(function() {
    $("#postcodify_search_button").postcodifyPopUp();

    $("#postcode_1").postcodifyPopUp();
    $("#postcode_2").postcodifyPopUp();

    $("#address_1").postcodifyPopUp();

    $("#add_student_row").click(function(e) {
        var number_of_students = $("#number_of_students").val();
        var next_number_of_students = parseInt(number_of_students) + 1;
        console.log(number_of_students);
        $("#student_row_" + number_of_students).after("<div id='student_row_" + next_number_of_students + "' class='row'>\
        <div class='col-lg-12'>\
        <div class='box'>\
        <div class='box-head box-head-xs style-support3'>\
        <header><h5 class='text-light'>학생 <strong>#" + next_number_of_students + "</strong></h5></header>\
        </div>\
        <div class='box-body'>\
        <div class='form-group'>\
        <div class='col-sm-3 text-center'>\
        <label for='student_name_" + next_number_of_students + "' class='control-label'>이름</label>\
        </div>\
        <div class='col-sm-9'>\
        <input type='text' name='student_name_" + next_number_of_students + "' id='student_name_" + next_number_of_students + "' class='form-control' placeholder='이름' required='' data-rule-minlength='2'>\
        </div>\
        </div>\
        <div class='form-group'>\
        <div class='col-sm-3 text-center'>\
        <label for='student_deputy_" + next_number_of_students + "' class='control-label'>부서</label>\
        </div>\
        <div class='col-sm-9'>\
        <input type='text' name='student_deputy_" + next_number_of_students + "' id='student_deputy_" + next_number_of_students + "' class='form-control' placeholder='부서' required=''>\
        </div>\
        </div>\
        <div class='form-group'>\
        <div class='col-sm-3 text-center'>\
        <label for='student_position_" + next_number_of_students + "' class='control-label'>직급</label>\
        </div>\
        <div class='col-sm-9'>\
        <input type='text' name='student_position_" + next_number_of_students + "' id='student_position_" + next_number_of_students + "' class='form-control' placeholder='직급' required=''>\
        </div>\
        </div>\
        <div class='form-group'>\
        <div class='col-sm-3 text-center'>\
        <label for='student_email_" + next_number_of_students + "' class='control-label'>이메일</label>\
        </div>\
        <div class='col-sm-9'>\
        <input type='email' name='student_email_" + next_number_of_students + "' id='student_email_" + next_number_of_students + "' class='form-control' placeholder='이메일' required=''>\
        </div>\
        </div>\
        <div class='form-group'>\
        <div class='col-sm-3 text-center'>\
        <label for='student_phone_" + next_number_of_students + "' class='control-label'>전화번호</label>\
        </div>\
        <div class='col-sm-9'>\
        <input type='text' name='student_phone_" + next_number_of_students + "' id='student_phone_" + next_number_of_students + "' class='form-control' placeholder='전화번호' required='' data-inputmask=\"\'mask\': \'99999999999\'\">\
        </div>\
        </div>\
        <div class='form-group'>\
        <div class='col-sm-3 text-center'>\
        <label for='student_gender_" + next_number_of_students + "' class='control-label'>성별</label>\
        </div>\
        <div class='col-sm-9'>\
        <label class='radio-inline' style='margin-right: 50px;'>\
        <input type='radio' name='student_gender_" + next_number_of_students + "' value='M' required=''> 남자\
        </label>\
        <label class='radio-inline'>\
        <input type='radio' name='student_gender_" + next_number_of_students + "' value='F' required=''> 여자\
        </label>\
        </div>\
        </div>\
        <div class='form-group'>\
        <div class='col-sm-3 text-center'>\
        <label for='student_age_" + next_number_of_students + "' class='control-label'>나이</label>\
        </div>\
        <div class='col-sm-9'>\
        <input type='text' name='student_age_" + next_number_of_students + "' id='student_age_" + next_number_of_students + "' class='form-control' placeholder='나이' required='' data-inputmask=\"\'mask\': \'99\'\">\
        </div>\
        </div>\
        <div class='form-group'>\
        <div class='col-sm-3 text-center'>\
        <label for='student_city_" + next_number_of_students + "' class='control-label'>파견도시</label>\
        </div>\
        <div class='col-sm-9'>\
        <input type='text' name='student_city_" + next_number_of_students + "' id='student_city_" + next_number_of_students + "' class='form-control' placeholder='파견도시' required=''>\
        </div>\
        </div>\
        <div class='form-group'>\
        <div class='col-sm-3 text-center'>\
        <label for='student_level_" + next_number_of_students + "' class='control-label'>수강생 중국어레벨</label>\
        </div>\
        <div class='col-sm-9'>\
        <label class='radio-inline' style='margin-right: 30px;'>\
        <input type='radio' name='student_level_" + next_number_of_students + "' value='1' required=''> 입문\
        </label>\
        <label class='radio-inline' style='margin-right: 30px;'>\
        <input type='radio' name='student_level_" + next_number_of_students + "' value='2' required=''> 초급\
        </label>\
        <label class='radio-inline' style='margin-right: 30px;'>\
        <input type='radio' name='student_level_" + next_number_of_students + "' value='3' required=''> 중급\
        </label>\
        <label class='radio-inline'>\
        <input type='radio' name='student_level_" + next_number_of_students + "' value='4' required=''> 고급\
        </label>\
        </div>\
        </div>\
        </div>\
        </div>\
        </div>\
        </div>");

        $("#number_of_students").val(next_number_of_students);
        $(":input").inputmask();
    });

    $("#remove_student_row").click(function(e) {
        var number_of_students = $("#number_of_students").val();
        if(number_of_students > 1) {
            $("#student_row_" + number_of_students).remove();
            $("#number_of_students").val(parseInt(number_of_students - 1));
        }
    });

    $(":input").inputmask();
});