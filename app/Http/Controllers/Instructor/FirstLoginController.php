<?php namespace App\Http\Controllers\Instructor;

use App\CareerDetail;
use App\Certificate;
use App\CourseSubCurriculum;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Instructor;
use App\OtherCertificate;
use App\PreferredArea;
use App\Resume;
use Illuminate\Http\Request;
use App\Http\Requests\InstructorFirstLoginRequest;

class FirstLoginController extends Controller {

    public function update(InstructorFirstLoginRequest $request) {

        \DB::transaction(function() use($request) {
            $current_user = \Auth::user();
            $current_instructor = Instructor::find($current_user->userable_id);

            $current_user->password = \Hash::make($request->input('password'));
            $current_user->name_eng = $request->input('name_eng');
            $current_user->phone_number = preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/',
                '$1-$2-$3',
                str_replace('_', '', $request->input('phone_number')));

            $profile_image_path = storage_path().'/images/profile_images';

            if(!\File::exists($profile_image_path)) {
                \File::makeDirectory($profile_image_path, 0775, true);
            }
            $file = $request->file('profile_image');
            $fileName = $current_user->id.'_profile_'.time().'.'.$file->getClientOriginalExtension();

            $current_user->profile_image = $fileName;

            $current_instructor->name_chn = $request->input('name_chn');
            $current_instructor->date_of_birth = $request->input('date_of_birth');
            $current_instructor->bank_id = $request->input('bank_id');
            $current_instructor->bank_account_number = \Crypt::encrypt($request->input('bank_account_number'));
            $current_instructor->gender = $request->input('gender');
            $current_instructor->instructor_visa_type_id = $request->input('instructor_visa_type_id');

            $certificate_array = explode(', ', $request->input('certificate')); //TSC 4급, Opic 중국어 Novice Mid, BCT 3급, 운전면허증
            foreach ($certificate_array as $certificate) {
                if (strpos($certificate, 'HSK') !== false) {
                    $grade = str_replace('HSK ', '', $certificate);
                    $hsk = Certificate::where('name', 'HSK')->where('grade', $grade)->first();
                    $current_instructor->certificates()->attach($hsk->id);
                }
                if (strpos($certificate, 'TSC') !== false) {
                    $grade = str_replace('TSC ', '', $certificate);
                    $tsc = Certificate::where('name', 'TSC')->where('grade', $grade)->first();
                    $current_instructor->certificates()->attach($tsc->id);
                }
                if (strpos($certificate, 'Opic 중국어') !== false) {
                    $grade = str_replace('Opic 중국어 ', '', $certificate);
                    $opic = Certificate::where('name', 'Opic 중국어')->where('grade', $grade)->first();
                    $current_instructor->certificates()->attach($opic->id);
                }
                if (strpos($certificate, 'BCT') !== false) {
                    $grade = str_replace('BCT ', '', $certificate);
                    $bct = Certificate::where('name', 'BCT')->where('grade', $grade)->first();
                    $current_instructor->certificates()->attach($bct->id);
                }
                if (strpos($certificate, '운전면허증') !== false) {
                    $driver = Certificate::where('name', '운전면허증')->first();
                    $current_instructor->certificates()->attach($driver->id);
                }
            }

            for($i = 1; $i <= 3; $i++) {
                if($request->input('other_certificate_name_'.$i)) {
                    $other_certificate = new OtherCertificate();
                    $other_certificate->instructor_id = $current_instructor->id;
                    $other_certificate->name = $request->input('other_certificate_name_'.$i);
                    if($request->input('other_certificate_detail_'.$i)) {
                        $other_certificate->detail = $request->input('other_certificate_detail_'.$i);
                    }
                    $other_certificate->save();
                }
            }

            $current_instructor->academic_background_id = $request->input('academic_background_id');
            $current_instructor->academic_background_detail = $request->input('academic_background_detail');
            $current_instructor->major = $request->input('major');
            $current_instructor->years_of_stay_in_china = $request->input('years_of_stay_in_china');
            $current_instructor->career_years = $request->input('career_years');

            $curriculum_array = explode(', ', $request->input('curriculum'));
            foreach($curriculum_array as $curriculum) {
                $course_sub_curriculum = CourseSubCurriculum::where('name', $curriculum)->first();
                $current_instructor->curriculums()->attach($course_sub_curriculum->id);
            }

            $preferred_area__name_array = explode(', ', $request->input('preferred_area'));
            foreach($preferred_area__name_array as $preferred_area_name) {
                $preferred_area = PreferredArea::where('name', $preferred_area_name)->first();
                $current_instructor->preferredAreas()->attach($preferred_area->id);
            }

            if($request->input('available_morning_from')) {
                $current_instructor->available_morning_from = $request->input('available_morning_from');
                $current_instructor->available_morning_to = $request->input('available_morning_to');
            }

            if($request->input('available_afternoon_from')) {
                $current_instructor->available_afternoon_from = $request->input('available_afternoon_from');
                $current_instructor->available_afternoon_to = $request->input('available_afternoon_to');
            }

            if($request->input('available_night_from')) {
                $current_instructor->available_night_from = $request->input('available_night_from');
                $current_instructor->available_night_to = $request->input('available_night_to');
            }

            for($i = 1; $i <= 10; $i++) {
                if($request->input('career_detail_'.$i.'_company_name')) {
                    $new_career_detail = new CareerDetail();
                    $new_career_detail->instructor_id = $current_instructor->id;
                    $new_career_detail->company_name = $request->input('career_detail_'.$i.'_company_name');
                    $new_career_detail->type = $request->input('career_detail_'.$i.'_type');
                    $new_career_detail->description = $request->input('career_detail_'.$i.'_description');
                    $new_career_detail->period = $request->input('career_detail_'.$i.'_period');
                    $new_career_detail->save();
                }
            }

            if($request->input('resume')) {
                $new_resume = new Resume();
                $new_resume->instructor_id = $current_instructor->id;
                $new_resume->content = $request->input("resume");
                $new_resume->save();
            }

            $current_user->is_first_login = false;

            $current_instructor->save();
            $current_user->save();

            $file->move($profile_image_path, $fileName);

        });

        \Flash::success('정보 업데이트가 성공적으로 완료되었습니다.');
        return redirect('Instructor/coursesManagement/index');
    }

}
