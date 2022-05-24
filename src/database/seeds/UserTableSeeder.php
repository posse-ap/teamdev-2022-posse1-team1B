<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $params = [
            [
                'email' => 'mrp@com',
                'password' => bcrypt('password'),
                'first_name' => "森",
                'last_name' => "遥",
                'first_name_ruby' => "モリ",
                'last_name_ruby' => "ハルカ",
                'phone_number' => '080-0000-0000',
                'nickname' => "森香",
                'sex' => "女",
                'role_id' => Role::getIntervieweeId(),
                'company' => null,
                'department' => null,
                'working_period' => null,
            ],
            [
                'email' => 'daiki@com',
                'password' => bcrypt('password'),
                'first_name' => "佐藤",
                'last_name' => "大暉",
                'first_name_ruby' => "サトウ",
                'last_name_ruby' => "ダイキ",
                'phone_number' => '080-0000-0000',
                'nickname' => "だいき",
                'sex' => "男",
                'role_id' => Role::getSolverId(),
                'company' => "株式会社アンチパターン",
                'department' => "エンジニア部門",
                'working_period' => "2",
            ],
            [
                'email' => 'mayuna@com',
                'password' => bcrypt('password'),
                'first_name' => "石田",
                'last_name' => "麻由奈",
                'first_name_ruby' => "イシダ",
                'last_name_ruby' => "マユナ",
                'phone_number' => '080-0000-0000',
                'nickname' => "Mayu",
                'sex' => "女",
                'role_id' => Role::getIntervieweeId(),
                'company' => null,
                'department' => null,
                'working_period' => null,
            ],
            [
                'email' => 'hina@com',
                'password' => bcrypt('password'),
                'first_name' => "高橋",
                'last_name' => "日奈",
                'first_name_ruby' => "タカハシ",
                'last_name_ruby' => "ヒナ",
                'phone_number' => '080-0000-0000',
                'nickname' => "高橋",
                'sex' => "女",
                'role_id' => Role::getSolverId(),
                'company' => "株式会社アンチパターン",
                'department' => "カルチャー部門",
                'working_period' => 1,
            ],
            [
                'email' => 'kotani@com',
                'password' => bcrypt('password'),
                'first_name' => "小谷",
                'last_name' => "ユウイチ",
                'first_name_ruby' => "コタニ",
                'last_name_ruby' => "ユウイチ",
                'phone_number' => '080-0000-0000',
                'nickname' => "こたにさん",
                'sex' => "男",
                'role_id' => Role::getSolverId(),
                'company' => "株式会社アンチパターン",
                'department' => "エンジニア部門",
                'working_period' => 12,
            ],
            [
                'email' => 'neko@com',
                'password' => bcrypt('password'),
                'first_name' => "猫",
                'last_name' => "はっち",
                'first_name_ruby' => "ネコ",
                'last_name_ruby' => "ハッチ",
                'phone_number' => '080-0000-0000',
                'nickname' => "はっち",
                'sex' => "男",
                'role_id' => Role::getSolverId(),
                'company' => "株式会社ネコ",
                'department' => "ネコ部門",
                'working_period' => 10,
            ],
            [
                'email' => 'nobu@com',
                'password' => bcrypt('password'),
                'first_name' => "岩永",
                'last_name' => "信之",
                'first_name_ruby' => "イワナガ",
                'last_name_ruby' => "ノブユキ",
                'phone_number' => '080-0000-0000',
                'nickname' => "のぶさん",
                'sex' => "男",
                'role_id' => Role::getSolverId(),
                'company' => "株式会アクセンチュア",
                'department' => "人事部門",
                'working_period' => 20,
            ],
            [
                'email' => 'yuyama@com',
                'password' => bcrypt('password'),
                'first_name' => "湯山",
                'last_name' => "智晴",
                'first_name_ruby' => "ユヤマ",
                'last_name_ruby' => "トモハル",
                'phone_number' => '080-0000-0000',
                'nickname' => "ともくん",
                'sex' => "男",
                'role_id' => Role::getSolverId(),
                'company' => "ランサーズ",
                'department' => "エンジニア部門",
                'working_period' => 1,
            ],
            [
                'email' => 'shuto@com',
                'password' => bcrypt('password'),
                'first_name' => "吉岡",
                'last_name' => "姑",
                'first_name_ruby' => "ヨシオカ",
                'last_name_ruby' => "シュウト",
                'phone_number' => '080-0000-0000',
                'nickname' => "姑",
                'sex' => "男",
                'role_id' => Role::getSolverId(),
                'company' => "楽天グループ株式会社",
                'department' => "エンジニア部門",
                'working_period' => 1,
            ],
            [
                'email' => 'ryo@com',
                'password' => bcrypt('password'),
                'first_name' => "影島",
                'last_name' => "亮太郎",
                'first_name_ruby' => "カゲシマ",
                'last_name_ruby' => "リョウタロウ",
                'phone_number' => '080-0000-0000',
                'nickname' => "りょうちゃん",
                'sex' => "男",
                'role_id' => Role::getSolverId(),
                'company' => "APPLE",
                'department' => "経営部門",
                'working_period' => 11,
            ],
        ];
        DB::table('users')->insert($params);
    }
}
