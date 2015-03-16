<?php namespace App\Http\Controllers\Consultant;

use App\Company;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateCompanyRequest;

class CompaniesManagementController extends Controller {

	public function index() {
        return view('consultant.companiesManagement.index')
            ->with('companies', Company::all());
    }

    public function create(CreateCompanyRequest $request) {

        /**
         * 기존 추가되어있는 회사 이름을 검색해서 존재한다면 오류 반환
         */
        $company = Company::where('name', $request->name)->first();
        if(!is_null($company)) {
            \Flash::error('고객사 '.$request->name.' 은 이미 존재합니다.');
            return redirect('Consultant/companiesManagement/index');
        }

        /**
         * transaction begin
         */
        \DB::beginTransaction();

        $new_company = Company::create($request->all());
        $contact_number_1 = preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/',
                                        '$1-$2-$3',
                                        str_replace('_', '', $request->input('contact_number_1')));

        $new_company->contact_number_1 = $contact_number_1;

        if($request->input('contact_number_2')) {
            $contact_number_2 = preg_replace('/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/',
                                                '$1-$2-$3',
                                                str_replace('_', '', $request->input('contact_number_2')));

            $new_company->contact_number_2 = $contact_number_2;
        }

        $logo_image_path = storage_path().'/images/logo_images';

        if(!\File::exists($logo_image_path)) {
            \File::makeDirectory($logo_image_path, 0775, true);
        }

        $file = $request->file('logo_image');

        $fileName = $new_company->id.'_logo_'.time().'.'.$file->getClientOriginalExtension();

        $file->move($logo_image_path, $fileName);

        $new_company->logo_image = $fileName;

        $new_company->save();

        try {
            \DB::commit();
        }
        catch(\Exception $e) {
            \DB::rollback();
            \Flash::error('죄송합니다 오류가 발생하였습니다. 다시 시도해 주세요. (오류코드 : error-company-create)');
            return \Redirect::back()->withinput();
        }

        \Flash::success('고객사 '.$new_company->name.' 가 성공적으로 생성되었습니다.');
        return redirect('Consultant/companiesManagement/index');
    }

}
