<section>

    {!! Form::open() !!}
    <div class="section-body">

        <input name="encrypted_test_id" type="hidden" value="{{ $encrypted_test_id }}"/>


        <?php
            $q11 = App\LvlTestMcPoolIntermediate::find($lvl_test_mc->question_11);
            $q12 = App\LvlTestMcPoolIntermediate::find($lvl_test_mc->question_12);
            $q13 = App\LvlTestMcPoolIntermediate::find($lvl_test_mc->question_13);
            $q14 = App\LvlTestMcPoolIntermediate::find($lvl_test_mc->question_14);
            $q15 = App\LvlTestMcPoolIntermediate::find($lvl_test_mc->question_15);
        ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-head box-head-xs style-primary">
                        <header><h5 class="text-light"> 중급 1. </h5></header>
                    </div>
                    <div class="box-body">
                        <div class="well well-lg">{{ $q11->question }}</div>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(11, 1)">
                                <input type="radio" name="answer_11" value="1" @if($lvl_test_mc->answer_11 == 1) checked="" @endif>
                                {{ $q11->example_1 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(11, 2)">
                                <input type="radio" name="answer_11" value="2" @if($lvl_test_mc->answer_11 == 2) checked="" @endif>
                                {{ $q11->example_2 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(11, 3)">
                                <input type="radio" name="answer_11" value="3" @if($lvl_test_mc->answer_11 == 3) checked="" @endif>
                                {{ $q11->example_3 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(11, 4)">
                                <input type="radio" name="answer_11" value="4" @if($lvl_test_mc->answer_11 == 4) checked="" @endif>
                                {{ $q11->example_4 }}
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
                        <header><h5 class="text-light"> 중급 2. </h5></header>
                    </div>
                    <div class="box-body">
                        <div class="well well-lg">{{ $q12->question }}</div>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(12, 1)">
                                <input type="radio" name="answer_12" value="1" @if($lvl_test_mc->answer_12 == 1) checked="" @endif>
                                {{ $q12->example_1 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(12, 2)">
                                <input type="radio" name="answer_12" value="2" @if($lvl_test_mc->answer_12 == 2) checked="" @endif>
                                {{ $q12->example_2 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(12, 3)">
                                <input type="radio" name="answer_12" value="3" @if($lvl_test_mc->answer_12 == 3) checked="" @endif>
                                {{ $q12->example_3 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(12, 4)">
                                <input type="radio" name="answer_12" value="4" @if($lvl_test_mc->answer_12 == 4) checked="" @endif>
                                {{ $q12->example_4 }}
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
                        <header><h5 class="text-light"> 중급 3. </h5></header>
                    </div>
                    <div class="box-body">
                        <div class="well well-lg">{{ $q13->text }}</div>
                        <p style="margin-left: 10px;"><strong>Q. {{ $q13->question }}</strong></p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(131, 1)">
                                <input type="radio" name="answer_131" value="1" @if($lvl_test_mc->answer_131 == 1) checked="" @endif>
                                {{ $q13->example_1 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(131, 2)">
                                <input type="radio" name="answer_131" value="2" @if($lvl_test_mc->answer_131 == 2) checked="" @endif>
                                {{ $q13->example_2 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(131, 3)">
                                <input type="radio" name="answer_131" value="3" @if($lvl_test_mc->answer_131 == 3) checked="" @endif>
                                {{ $q13->example_3 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(131, 4)">
                                <input type="radio" name="answer_131" value="4" @if($lvl_test_mc->answer_131 == 4) checked="" @endif>
                                {{ $q13->example_4 }}
                            </label>
                        </p>
                        <p style="margin-left: 10px;"><strong>Q. {{ $q13->question_2 }}</strong></p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(132, 1)">
                                <input type="radio" name="answer_132" value="1" @if($lvl_test_mc->answer_132 == 1) checked="" @endif>
                                {{ $q13->example_5 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(132, 2)">
                                <input type="radio" name="answer_132" value="2" @if($lvl_test_mc->answer_132 == 2) checked="" @endif>
                                {{ $q13->example_6 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(132, 3)">
                                <input type="radio" name="answer_132" value="3" @if($lvl_test_mc->answer_132 == 3) checked="" @endif>
                                {{ $q13->example_7 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(132, 4)">
                                <input type="radio" name="answer_132" value="4" @if($lvl_test_mc->answer_132 == 4) checked="" @endif>
                                {{ $q13->example_8 }}
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
                        <header><h5 class="text-light"> 중급 4. </h5></header>
                    </div>
                    <div class="box-body">
                        <div class="well well-lg">{{ $q14->text }}</div>
                        <p style="margin-left: 10px;"><strong>Q. {{ $q14->question }}</strong></p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(141, 1)">
                                <input type="radio" name="answer_141" value="1" @if($lvl_test_mc->answer_141 == 1) checked="" @endif>
                                {{ $q14->example_1 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(141, 2)">
                                <input type="radio" name="answer_141" value="2" @if($lvl_test_mc->answer_141 == 2) checked="" @endif>
                                {{ $q14->example_2 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(141, 3)">
                                <input type="radio" name="answer_141" value="3" @if($lvl_test_mc->answer_141 == 3) checked="" @endif>
                                {{ $q14->example_3 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(141, 4)">
                                <input type="radio" name="answer_141" value="4" @if($lvl_test_mc->answer_141 == 4) checked="" @endif>
                                {{ $q14->example_4 }}
                            </label>
                        </p>
                        <p style="margin-left: 10px;"><strong>Q. {{ $q14->question_2 }}</strong></p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(142, 1)">
                                <input type="radio" name="answer_142" value="1" @if($lvl_test_mc->answer_142 == 1) checked="" @endif>
                                {{ $q14->example_5 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(142, 2)">
                                <input type="radio" name="answer_142" value="2" @if($lvl_test_mc->answer_142 == 2) checked="" @endif>
                                {{ $q14->example_6 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(142, 3)">
                                <input type="radio" name="answer_142" value="3" @if($lvl_test_mc->answer_142 == 3) checked="" @endif>
                                {{ $q14->example_7 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(142, 4)">
                                <input type="radio" name="answer_142" value="4" @if($lvl_test_mc->answer_142 == 4) checked="" @endif>
                                {{ $q14->example_8 }}
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
                        <header><h5 class="text-light"> 중급 5. </h5></header>
                    </div>
                    <div class="box-body">
                        <div class="well well-lg">{{ $q15->question }}</div>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(15, 1)">
                                <input type="radio" name="answer_15" value="1" @if($lvl_test_mc->answer_15 == 1) checked="" @endif>
                                {{ $q15->example_1 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(15, 2)">
                                <input type="radio" name="answer_15" value="2" @if($lvl_test_mc->answer_15 == 2) checked="" @endif>
                                {{ $q15->example_2 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(15, 3)">
                                <input type="radio" name="answer_15" value="3" @if($lvl_test_mc->answer_15 == 3) checked="" @endif>
                                {{ $q15->example_3 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(15, 4)">
                                <input type="radio" name="answer_15" value="4" @if($lvl_test_mc->answer_15 == 4) checked="" @endif>
                                {{ $q15->example_4 }}
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