<div class="col-lg-12">
    <div class="box">
        <div class="box-head box-head-xs style-primary">
            <header><h5 class="text-light"> <strong>{{ $course_main_curriculum->name }}</strong></h5></header>
        </div>
        <div class="box-body">
            {!! Form::open(['class' => 'form-horizontal']) !!}
                <div class="form-group">
                    @if($course_main_curriculum->can_select_multiple)
                        <input name="can_select_multiple" type="hidden" value="1"/>
                    @else
                        <input name="can_select_multiple" type="hidden" value="0"/>
                    @endif
                    @foreach($course_main_curriculum->courseSubCurriculums as $course_sub_curriculum)
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            @if($course_main_curriculum->can_select_multiple)
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="course_sub_curriculum[]" value="{{ $course_sub_curriculum->name }}"> {{ $course_sub_curriculum->name }}
                                </label>
                            @else
                                <label class="radio-inline">
                                    <input type="radio" name="course_sub_curriculum" value="{{ $course_sub_curriculum->name }}"> {{ $course_sub_curriculum->name }}
                                </label>
                            @endif
                        </div>
                    @endforeach
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>