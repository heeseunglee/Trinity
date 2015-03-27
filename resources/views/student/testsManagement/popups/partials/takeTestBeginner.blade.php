<section>

    {!! Form::open() !!}
        <div class="section-body">

            <input name="encrypted_test_id" type="hidden" value="{{ $encrypted_test_id }}"/>


            <?php
                $q1 = App\LvlTestMcPoolBeginner::find($lvl_test_mc->question_1);
                $q2 = App\LvlTestMcPoolBeginner::find($lvl_test_mc->question_2);
                $q3 = App\LvlTestMcPoolBeginner::find($lvl_test_mc->question_3);
                $q4 = App\LvlTestMcPoolBeginner::find($lvl_test_mc->question_4);
                $q5 = App\LvlTestMcPoolBeginner::find($lvl_test_mc->question_5);
            ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-head box-head-xs style-primary">
                            <header><h5 class="text-light"> 입문 1. </h5></header>
                        </div>
                        <div class="box-body">
                            <div class="well well-lg">{{ $q1->question }}</div>
                            <p style="margin-left: 30px;">
                                <label class="radio-inline" onclick="updateMcAnswer(1, 1)">
                                    <input type="radio" name="answer_1" value="1" @if($lvl_test_mc->answer_1 == 1) checked="" @endif>
                                    {{ $q1->example_1 }}
                                </label>
                            </p>
                            <p style="margin-left: 30px;">
                                <label class="radio-inline" onclick="updateMcAnswer(1, 2)">
                                    <input type="radio" name="answer_1" value="2" @if($lvl_test_mc->answer_1 == 2) checked="" @endif>
                                    {{ $q1->example_2 }}
                                </label>
                            </p>
                            <p style="margin-left: 30px;">
                                <label class="radio-inline" onclick="updateMcAnswer(1, 3)">
                                    <input type="radio" name="answer_1" value="3" @if($lvl_test_mc->answer_1 == 3) checked="" @endif>
                                    {{ $q1->example_3 }}
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
                            <header><h5 class="text-light"> 입문 2. </h5></header>
                        </div>
                        <div class="box-body">
                            <div class="well well-lg">{{ $q2->question }}</div>
                            <p style="margin-left: 30px;">
                                <label class="radio-inline" onclick="updateMcAnswer(2, 1)">
                                    <input type="radio" name="answer_2" value="1" @if($lvl_test_mc->answer_2 == 1) checked="" @endif>
                                    {{ $q2->example_1 }}
                                </label>
                            </p>
                            <p style="margin-left: 30px;">
                                <label class="radio-inline" onclick="updateMcAnswer(2, 2)">
                                    <input type="radio" name="answer_2" value="2" @if($lvl_test_mc->answer_2 == 2) checked="" @endif>
                                    {{ $q2->example_2 }}
                                </label>
                            </p>
                            <p style="margin-left: 30px;">
                                <label class="radio-inline" onclick="updateMcAnswer(2, 3)">
                                    <input type="radio" name="answer_2" value="3" @if($lvl_test_mc->answer_2 == 3) checked="" @endif>
                                    {{ $q2->example_3 }}
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
                            <header><h5 class="text-light"> 입문 3. </h5></header>
                        </div>
                        <div class="box-body">
                            <div class="well well-lg">{{ $q3->question }}</div>
                            <p style="margin-left: 30px;">
                                <label class="radio-inline" onclick="updateMcAnswer(3, 1)">
                                    <input type="radio" name="answer_3" value="1" @if($lvl_test_mc->answer_3 == 1) checked="" @endif>
                                    {{ $q3->example_1 }}
                                </label>
                            </p>
                            <p style="margin-left: 30px;">
                                <label class="radio-inline" onclick="updateMcAnswer(3, 2)">
                                    <input type="radio" name="answer_3" value="2" @if($lvl_test_mc->answer_3 == 2) checked="" @endif>
                                    {{ $q3->example_2 }}
                                </label>
                            </p>
                            <p style="margin-left: 30px;">
                                <label class="radio-inline" onclick="updateMcAnswer(3, 3)">
                                    <input type="radio" name="answer_3" value="3" @if($lvl_test_mc->answer_3 == 3) checked="" @endif>
                                    {{ $q3->example_3 }}
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
                            <header><h5 class="text-light"> 입문 4. </h5></header>
                        </div>
                        <div class="box-body">
                            <div class="well well-lg">{{ $q4->question }}</div>
                            <p style="margin-left: 30px;">
                                <label class="radio-inline" onclick="updateMcAnswer(4, 1)">
                                    <input type="radio" name="answer_4" value="1" @if($lvl_test_mc->answer_4 == 1) checked="" @endif>
                                    {{ $q4->example_1 }}
                                </label>
                            </p>
                            <p style="margin-left: 30px;">
                                <label class="radio-inline" onclick="updateMcAnswer(4, 2)">
                                    <input type="radio" name="answer_4" value="2" @if($lvl_test_mc->answer_4 == 2) checked="" @endif>
                                    {{ $q4->example_2 }}
                                </label>
                            </p>
                            <p style="margin-left: 30px;">
                                <label class="radio-inline" onclick="updateMcAnswer(4, 3)">
                                    <input type="radio" name="answer_4" value="3" @if($lvl_test_mc->answer_4 == 3) checked="" @endif>
                                    {{ $q4->example_3 }}
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
                            <header><h5 class="text-light"> 입문 5. </h5></header>
                        </div>
                        <div class="box-body">
                            <div class="well well-lg">{{ $q5->question }}</div>
                            <p style="margin-left: 30px;">
                                <label class="radio-inline" onclick="updateMcAnswer(5, 1)">
                                    <input type="radio" name="answer_5" value="1" @if($lvl_test_mc->answer_5 == 1) checked="" @endif>
                                    {{ $q5->example_1 }}
                                </label>
                            </p>
                            <p style="margin-left: 30px;">
                                <label class="radio-inline" onclick="updateMcAnswer(5, 2)">
                                    <input type="radio" name="answer_5" value="2" @if($lvl_test_mc->answer_5 == 2) checked="" @endif>
                                    {{ $q5->example_2 }}
                                </label>
                            </p>
                            <p style="margin-left: 30px;">
                                <label class="radio-inline" onclick="updateMcAnswer(5, 3)">
                                    <input type="radio" name="answer_5" value="3" @if($lvl_test_mc->answer_5 == 3) checked="" @endif>
                                    {{ $q5->example_3 }}
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