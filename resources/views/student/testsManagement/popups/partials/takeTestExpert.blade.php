<section>

    {!! Form::open() !!}
    <div class="section-body">

        <input name="encrypted_test_id" type="hidden" value="{{ $encrypted_test_id }}"/>


        <?php
            $q16 = App\LvlTestMcPoolExpert::find($lvl_test_mc->question_16);
            $q17 = App\LvlTestMcPoolExpert::find($lvl_test_mc->question_17);
            $q18 = App\LvlTestMcPoolExpert::find($lvl_test_mc->question_18);
            $q19 = App\LvlTestMcPoolExpert::find($lvl_test_mc->question_19);
            $q20 = App\LvlTestMcPoolExpert::find($lvl_test_mc->question_20);
        ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-head box-head-xs style-primary">
                        <header><h5 class="text-light"> 고급 1. </h5></header>
                    </div>
                    <div class="box-body">
                        <div class="well well-lg">{{ $q16->question }}</div>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(16, 1)">
                                <input type="radio" name="answer_16" value="1" @if($lvl_test_mc->answer_16 == 1) checked="" @endif>
                                {{ $q16->example_1 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(16, 2)">
                                <input type="radio" name="answer_16" value="2" @if($lvl_test_mc->answer_16 == 2) checked="" @endif>
                                {{ $q16->example_2 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(16, 3)">
                                <input type="radio" name="answer_16" value="3" @if($lvl_test_mc->answer_16 == 3) checked="" @endif>
                                {{ $q16->example_3 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(16, 4)">
                                <input type="radio" name="answer_16" value="4" @if($lvl_test_mc->answer_16 == 4) checked="" @endif>
                                {{ $q16->example_4 }}
                            </label>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-head box-head-xs style-primary">
                        <header><h5 class="text-light"> 고급 2. </h5></header>
                    </div>
                    <div class="box-body">
                        <div class="well well-lg">{{ $q17->question }}</div>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(17, 1)">
                                <input type="radio" name="answer_17" value="1" @if($lvl_test_mc->answer_17 == 1) checked="" @endif>
                                {{ $q17->example_1 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(17, 2)">
                                <input type="radio" name="answer_17" value="2" @if($lvl_test_mc->answer_17 == 2) checked="" @endif>
                                {{ $q17->example_2 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(17, 3)">
                                <input type="radio" name="answer_17" value="3" @if($lvl_test_mc->answer_17 == 3) checked="" @endif>
                                {{ $q17->example_3 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(17, 4)">
                                <input type="radio" name="answer_17" value="4" @if($lvl_test_mc->answer_17 == 4) checked="" @endif>
                                {{ $q17->example_4 }}
                            </label>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-head box-head-xs style-primary">
                        <header><h5 class="text-light"> 고급 3. </h5></header>
                    </div>
                    <div class="box-body">
                        <div class="well well-lg">{{ $q18->text }}</div>
                        <p style="margin-left: 10px;"><strong>Q. {{ $q18->question }}</strong></p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(18, 1)">
                                <input type="radio" name="answer_18" value="1" @if($lvl_test_mc->answer_18 == 1) checked="" @endif>
                                {{ $q18->example_1 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(18, 2)">
                                <input type="radio" name="answer_18" value="2" @if($lvl_test_mc->answer_18 == 2) checked="" @endif>
                                {{ $q18->example_2 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(18, 3)">
                                <input type="radio" name="answer_18" value="3" @if($lvl_test_mc->answer_18 == 3) checked="" @endif>
                                {{ $q18->example_3 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(18, 4)">
                                <input type="radio" name="answer_18" value="4" @if($lvl_test_mc->answer_18 == 4) checked="" @endif>
                                {{ $q18->example_4 }}
                            </label>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-head box-head-xs style-primary">
                        <header><h5 class="text-light"> 고급 4. </h5></header>
                    </div>
                    <div class="box-body">
                        <p style="margin-left: 10px;"><strong>Q. 寻找病句</strong></p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(19, 1)">
                                <input type="radio" name="answer_19" value="1" @if($lvl_test_mc->answer_19 == 1) checked="" @endif>
                                {{ $q19->example_1 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(19, 2)">
                                <input type="radio" name="answer_19" value="2" @if($lvl_test_mc->answer_19 == 2) checked="" @endif>
                                {{ $q19->example_2 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(19, 3)">
                                <input type="radio" name="answer_19" value="3" @if($lvl_test_mc->answer_19 == 3) checked="" @endif>
                                {{ $q19->example_3 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(19, 4)">
                                <input type="radio" name="answer_19" value="4" @if($lvl_test_mc->answer_19 == 4) checked="" @endif>
                                {{ $q19->example_4 }}
                            </label>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-head box-head-xs style-primary">
                        <header><h5 class="text-light"> 고급 5. </h5></header>
                    </div>
                    <div class="box-body">
                        <p style="margin-left: 10px;"><strong>Q. 寻找病句</strong></p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(20, 1)">
                                <input type="radio" name="answer_20" value="1" @if($lvl_test_mc->answer_20 == 1) checked="" @endif>
                                {{ $q20->example_1 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(20, 2)">
                                <input type="radio" name="answer_20" value="2" @if($lvl_test_mc->answer_20 == 2) checked="" @endif>
                                {{ $q20->example_2 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(20, 3)">
                                <input type="radio" name="answer_20" value="3" @if($lvl_test_mc->answer_20 == 3) checked="" @endif>
                                {{ $q20->example_3 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(20, 4)">
                                <input type="radio" name="answer_20" value="4" @if($lvl_test_mc->answer_20 == 4) checked="" @endif>
                                {{ $q20->example_4 }}
                            </label>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-footer text-center">
        <button type="button" class="btn btn-success" onclick="submitMcTest();">답안 제출</button>
        <button type="button" class="btn btn-warning" onclick="pauseMcTest();">일시 정지</button>
    </div>

    {!! Form::close() !!}
</section>