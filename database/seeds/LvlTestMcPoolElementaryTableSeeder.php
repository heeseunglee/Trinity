<?php

use App\LvlTestMcPoolElementary;
use Illuminate\Database\Seeder;

class LvlTestMcPoolElementaryTableSeeder extends Seeder {

	public function run()
	{
        LvlTestMcPoolElementary::create([
            'session' => 1,
            'question' => '（ ）好，见到你们很高兴。',
            'example_1' => '您',
            'example_2' => '我',
            'example_3' => '她',
            'example_4' => '大家',
            'answer' => 4,
        ]);
        LvlTestMcPoolElementary::create([
            'session' => 1,
            'question' => '今天晚上给我（ ）电话吧。',
            'example_1' => '打',
            'example_2' => '破',
            'example_3' => '弄',
            'example_4' => '会',
            'answer' => 1,
        ]);
        LvlTestMcPoolElementary::create([
            'session' => 1,
            'question' => '我会（ ）汉语一点点。',
            'example_1' => '跑',
            'example_2' => '吃',
            'example_3' => '说',
            'example_4' => '洗',
            'answer' => 3,
        ]);

        LvlTestMcPoolElementary::create([
            'session' => 2,
            'question' => '你想吃（ ）块苹果?',
            'example_1' => '什么',
            'example_2' => '几',
            'example_3' => '哪',
            'example_4' => '怎么',
            'answer' => 2,
        ]);
        LvlTestMcPoolElementary::create([
            'session' => 2,
            'question' => '老师，坐在（ ）的学生听不见你说话。',
            'example_1' => '前面',
            'example_2' => '后面',
            'example_3' => '左右',
            'example_4' => '往来',
            'answer' => 2,
        ]);
        LvlTestMcPoolElementary::create([
            'session' => 2,
            'question' => '美国人喜欢比萨，（ ）胖的人很多。',
            'example_1' => '所以',
            'example_2' => '但是',
            'example_3' => '却',
            'example_4' => '因为',
            'answer' => 1,
        ]);

        LvlTestMcPoolElementary::create([
            'session' => 3,
            'question' => '可爱 / 她女儿 / 特别 / 长得 。',
            'example_1' => '她女儿长得可爱特别。',
            'example_2' => '她特别可爱女儿长得。',
            'example_3' => '她女儿特别长得可爱。',
            'example_4' => '她女儿长得特别可爱。',
            'answer' => 4,
        ]);
        LvlTestMcPoolElementary::create([
            'session' => 3,
            'question' => '关上 / 你 / 吧 / 把教室的门 。 ',
            'example_1' => '你把教室的门关上吧。',
            'example_2' => '你把关上教室的门吧。',
            'example_3' => '你关上吧把教室的门。',
            'example_4' => '你吧教室的门关上把。',
            'answer' => 1,
        ]);
        LvlTestMcPoolElementary::create([
            'session' => 3,
            'question' => '越大 / 雪 / 雪下 / 了。',
            'example_1' => '越下雪越大了。',
            'example_2' => '雪越下越大了。',
            'example_3' => '越下越大雪了。',
            'example_4' => '雪了越下越大。',
            'answer' => 2,
        ]);

        LvlTestMcPoolElementary::create([
            'session' => 4,
            'text' => '这张桌子我是十年前买的，一千多元，那个时候是非常贵的。现在买一张八千元的也不感觉太贵。',
            'question' => '这张桌子八千块钱。',
            'example_1' => '对',
            'example_2' => '错',
            'answer' => 2,
        ]);
        LvlTestMcPoolElementary::create([
            'session' => 4,
            'text' => '这个题你做错了，再做一次吧。做完了再出去玩儿。',
            'question' => '作业做得不好',
            'example_1' => '对',
            'example_2' => '错',
            'answer' => 1,
        ]);
        LvlTestMcPoolElementary::create([
            'session' => 4,
            'text' => '今天我去上班，没有看到了一个同事。过了很长时间，我想起来今天是星期天。',
            'question' => '今天不上班。',
            'example_1' => '对',
            'example_2' => '错',
            'answer' => 2,
        ]);

        LvlTestMcPoolElementary::create([
            'session' => 5,
            'text' => '今天阿丽没有来上班，她头疼，还发了高烧，全身无力，医生说她可能是因为最近工作比较累，加上天气又比较冷，所以得了重感冒。医生给她开了药，让她在家好好休息两天。',
            'question' => '这段话主要是想说明什么？',
            'example_1' => '阿丽今天没来上班',
            'example_2' => '阿丽想在家里休息',
            'example_3' => '阿丽今天身体不舒服',
            'answer' => 3,
        ]);
        LvlTestMcPoolElementary::create([
            'session' => 5,
            'text' => '你总是这么慢！现在已经七点了，再过一个小时表演就开始了，外面在下雨，路上的车很多，我们还要先去吃饭。',
            'question' => '我们先去：',
            'example_1' => '看表演',
            'example_2' => '吃饭',
            'example_3' => '拿伞',
            'answer' => 2,
        ]);
        LvlTestMcPoolElementary::create([
            'session' => 5,
            'text' => '哥哥长得很高，只有一个爱好，就是打篮球。他希望有机会做篮球运动员，但是他现在的水平还不是很高。',
            'question' => '根据这段话，哥哥：',
            'example_1' => '爱打篮球',
            'example_2' => '正在打球',
            'example_3' => '以前是运动员',
            'answer' => 1,
        ]);
	}

}