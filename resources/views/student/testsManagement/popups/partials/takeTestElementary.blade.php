<section>

    {!! Form::open() !!}
    <div class="section-body">

        <input name="encrypted_test_id" type="hidden" value="{{ $encrypted_test_id }}"/>


        <?php
            $q6 = App\LvlTestMcPoolElementary::find($lvl_test_mc->question_6);
            $q7 = App\LvlTestMcPoolElementary::find($lvl_test_mc->question_7);
            $q8 = App\LvlTestMcPoolElementary::find($lvl_test_mc->question_8);
            $q9 = App\LvlTestMcPoolElementary::find($lvl_test_mc->question_9);
            $q10 = App\LvlTestMcPoolElementary::find($lvl_test_mc->question_10);
        ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-head box-head-xs style-primary">
                        <header><h5 class="text-light"> 초급 1. </h5></header>
                    </div>
                    <div class="box-body">
                        <div class="well well-lg">{{ $q6->question }}</div>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(6, 1)">
                                <input type="radio" name="answer_6" value="1" @if($lvl_test_mc->answer_6 == 1) checked="" @endif>
                                {{ $q6->example_1 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(6, 2)">
                                <input type="radio" name="answer_6" value="2" @if($lvl_test_mc->answer_6 == 2) checked="" @endif>
                                {{ $q6->example_2 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(6, 3)">
                                <input type="radio" name="answer_6" value="3" @if($lvl_test_mc->answer_6 == 3) checked="" @endif>
                                {{ $q6->example_3 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(6, 4)">
                                <input type="radio" name="answer_6" value="4" @if($lvl_test_mc->answer_6 == 4) checked="" @endif>
                                {{ $q6->example_4 }}
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
                        <header><h5 class="text-light"> 초급 2. </h5></header>
                    </div>
                    <div class="box-body">
                        <div class="well well-lg">{{ $q7->question }}</div>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(7, 1)">
                                <input type="radio" name="answer_7" value="1" @if($lvl_test_mc->answer_7 == 1) checked="" @endif>
                                {{ $q7->example_1 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(7, 2)">
                                <input type="radio" name="answer_7" value="2" @if($lvl_test_mc->answer_7 == 2) checked="" @endif>
                                {{ $q7->example_2 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(7, 3)">
                                <input type="radio" name="answer_7" value="3" @if($lvl_test_mc->answer_7 == 3) checked="" @endif>
                                {{ $q7->example_3 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(7, 4)">
                                <input type="radio" name="answer_7" value="4" @if($lvl_test_mc->answer_7 == 4) checked="" @endif>
                                {{ $q7->example_4 }}
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
                        <header><h5 class="text-light"> 초급 3. </h5></header>
                    </div>
                    <div class="box-body">
                        <div class="well well-lg">{{ $q8->question }}</div>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(8, 1)">
                                <input type="radio" name="answer_8" value="1" @if($lvl_test_mc->answer_8 == 1) checked="" @endif>
                                {{ $q8->example_1 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(8, 2)">
                                <input type="radio" name="answer_8" value="2" @if($lvl_test_mc->answer_8 == 2) checked="" @endif>
                                {{ $q8->example_2 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(8, 3)">
                                <input type="radio" name="answer_8" value="3" @if($lvl_test_mc->answer_8 == 3) checked="" @endif>
                                {{ $q8->example_3 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(8, 4)">
                                <input type="radio" name="answer_8" value="4" @if($lvl_test_mc->answer_8 == 4) checked="" @endif>
                                {{ $q8->example_4 }}
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
                        <header><h5 class="text-light"> 초급 4. </h5></header>
                    </div>
                    <div class="box-body">
                        <div class="well well-lg">{{ $q9->text }}</div>
                        <p style="margin-left: 10px;"><strong>Q. {{ $q9->question }}</strong></p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(9, 1)">
                                <input type="radio" name="answer_9" value="1" @if($lvl_test_mc->answer_9 == 1) checked="" @endif>
                                {{ $q9->example_1 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(9, 2)">
                                <input type="radio" name="answer_9" value="2" @if($lvl_test_mc->answer_9 == 2) checked="" @endif>
                                {{ $q9->example_2 }}
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
                        <header><h5 class="text-light"> 초급 5. </h5></header>
                    </div>
                    <div class="box-body">
                        <div class="well well-lg">{{ $q10->text }}</div>
                        <p style="margin-left: 10px;"><strong>Q. {{ $q10->question }}</strong></p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(10, 1)">
                                <input type="radio" name="answer_10" value="1" @if($lvl_test_mc->answer_10 == 1) checked="" @endif>
                                {{ $q10->example_1 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(10, 2)">
                                <input type="radio" name="answer_10" value="2" @if($lvl_test_mc->answer_10 == 2) checked="" @endif>
                                {{ $q10->example_2 }}
                            </label>
                        </p>
                        <p style="margin-left: 30px;">
                            <label class="radio-inline" onclick="updateMcAnswer(10, 3)">
                                <input type="radio" name="answer_10" value="3" @if($lvl_test_mc->answer_10 == 3) checked="" @endif>
                                {{ $q10->example_3 }}
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