<?php namespace App\Http\Controllers\Student;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StudentFirstLoginRequest;
use App\Student;

class FirstLoginController extends Controller {

    public function update(StudentFirstLoginRequest $request) {
        \DB::transaction(function() use ($request) {

            $current_user = \Auth::user();

            $current_user->password = \Hash::make($request->input('password'));
            $current_user->name_eng = $request->input('name_eng');
            $current_user->phone_number = preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/',
                                                        '$1-$2-$3',
                                                        str_replace('_', '', $request->input('phone_number')));

            $profile_image_path = storage_path().'/images/profile_images';

            if(!\File::exists($profile_image_path)) {
                \File::makeDirectory($profile_image_path, 0775, true);
            }
            if(!is_null($request->file('profile_image'))) {
                $file = $request->file('profile_image');
                $rules_profile_image = array('profile_image' => 'image');
                $validator = \Validator::make($request->all(), $rules_profile_image);

                if($validator->fails()) {
                    \Flash::error('프로필 이미지를 확인해 주세요');
                    return \Redirect::back();
                }

                $fileName = $current_user->id.'_profile_'.time().'.'.$file->getClientOriginalExtension();
                $file->move($profile_image_path, $fileName);
                $current_user->profile_image = $fileName;
            }

            $current_user->is_first_login = false;

            $current_student = Student::find($current_user->userable_id);
            $current_student->position = $request->input('position');
            $current_student->deputy = $request->input('deputy');


            $current_user->save();
            $current_student->save();

        });

        \Flash::success('개인정보가 성공적으로 업데이트 되었습니다.');
        return redirect('Student/coursesManagement/index');
    }

}
