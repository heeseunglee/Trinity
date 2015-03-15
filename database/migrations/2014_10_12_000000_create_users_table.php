<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
            $table->increments('id');

            /**
             * 로그인 이메일 주소
             */
            $table->string('email')->unique();

            /**
             * 암호
             */
            $table->string('password');

            /**
             * 라라벨에서의 사용자 인증은 오직 users 테이블로만 진행되어야 함
             * 그래서 처음에는 roles 테이블을 추가하여 users 의 각 엔트리가
             * 어떠한 권한을 가지고 있는지 설정하는 방법으로 개발을 하였지만
             * polymorphic 관계 모델을 사용하여 개발하는 방향으로 업그레이드 됨
             *
             * 학생, 교수, 인사담당자, 내부사용자 혹은 관리자의 아이디를 저장
             */
            $table->integer('userable_id');

            /**
             * 사용자의 권한을 스트링으로 저장
             */
            $table->string('userable_type');

            /**
             * 사용자의 한글 이름
             */
            $table->string('name_kor');

            /**
             * 사용자의 영문 이름
             */
            $table->string('name_eng')->nullable();

            /**
             * 개인 이메일은 향후 안드로이드 구글 OAuth 를 진행하기 위한
             * 이메일 주소로써 안드로이드 앱이 개발되기 전까지는 신경쓰지 않아도 될 부분임
             * TODO:
             */
            $table->string('private_email')->nullable();

            /**
             * 연락처 정보 저장
             */
            $table->string('phone_number')->nullable();

            $table->string('profile_image')->default('no_image.png');

            /**
             * 사용자가 처음으로 로그인을 진행한다면 이름 / 이메일 이외의 추가 정보를 입력하게 redirect
             */
            $table->boolean('is_first_login')->default(true);

            $table->rememberToken();
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
