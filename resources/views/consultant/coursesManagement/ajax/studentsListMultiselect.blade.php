<div class="col-lg-3 col-md-2 col-sm-3">
    <label class="control-label" for="students">학생 등록</label>
</div>
<div class="col-lg-9 col-md-10 col-sm-9">
    <select multiple="multiple" id="students" name="students[]" required="">
        @foreach($company->students as $student)
            <option value="{{ $student->id }}">{{ $student->user->name_kor }} ( {{ $student->user->email }} )</option>
        @endforeach
    </select>
</div>