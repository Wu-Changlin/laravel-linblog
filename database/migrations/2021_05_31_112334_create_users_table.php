<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id()->comment('用户主键');
            $table->string('name')->comment('用户名称');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

        });
    }

//`user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT				          		COMMENT '用户id',
//`headimgurl` varchar(500) NOT NULL DEFAULT 0									COMMENT '用户头像',
//`name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL 		COMMENT '用户昵称',
//`email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL		COMMENT '用户邮箱',
//`password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL	COMMENT '用户密码',
//`login_number` int(10) UNSIGNED NOT NULL DEFAULT 0 							COMMENT '登录次数',
//`last_login_time` int(10) NOT NULL DEFAULT 0  								COMMENT '最近登录时间',
//`last_login_ip` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '最后登录ip',
//`created_time` int(10) UNSIGNED NOT NULL DEFAULT 0 	COMMENT	'创建时间',
//`updated_time` int(10) UNSIGNED NOT NULL DEFAULT 0 	COMMENT	'更新时间',
//`deleted_time` int(10) UNSIGNED NOT NULL DEFAULT 0 	COMMENT	'删除时间',
//PRIMARY KEY (`user_id`) USING BTREE
//) ENGINE = InnoDB  AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci  COMMENT = '用户表' ROW_FORMAT = Dynamic;



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
