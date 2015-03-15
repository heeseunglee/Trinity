<?php

use App\LvlTestMcPoolBeginner;
use Illuminate\Database\Seeder;

class LvlTestMcPoolBeginnerTableSeeder extends Seeder {

	public function run()
	{
        LvlTestMcPoolBeginner::create([
            'session' => 1,
            'question' => 'ài',
            'example_1' => '厌',
            'example_2' => '爱',
            'example_3' => '都',
            'answer' => 2,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 1,
            'question' => 'běijīng',
            'example_1' => '上海',
            'example_2' => '天津',
            'example_3' => '北京',
            'answer' => 3,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 1,
            'question' => 'búkèqi',
            'example_1' => '不客气',
            'example_2' => '对不起',
            'example_3' => '没关系',
            'answer' => 1,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 1,
            'question' => 'tiānqì',
            'example_1' => '天气',
            'example_2' => '饭店',
            'example_3' => '飞机',
            'answer' => 1,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 1,
            'question' => 'xiānsheng',
            'example_1' => '饭店',
            'example_2' => '先生',
            'example_3' => '孩子',
            'answer' => 2,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 1,
            'question' => 'xiàwǔ',
            'example_1' => '中午',
            'example_2' => '上午',
            'example_3' => '下午',
            'answer' => 3,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 1,
            'question' => 'duōshǎo',
            'example_1' => '多少',
            'example_2' => '怎样',
            'example_3' => '什么',
            'answer' => 1,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 1,
            'question' => 'xiàyǔ',
            'example_1' => '下雪',
            'example_2' => '下雨',
            'example_3' => '打雷',
            'answer' => 2,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 1,
            'question' => 'yīshēng',
            'example_1' => '同学',
            'example_2' => '老师',
            'example_3' => '医生',
            'answer' => 3,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 1,
            'question' => 'gāoxìng',
            'example_1' => '高兴',
            'example_2' => '可怜',
            'example_3' => '生气',
            'answer' => 1,
        ]);

        LvlTestMcPoolBeginner::create([
            'session' => 2,
            'question' => '他',
            'example_1' => 'tà',
            'example_2' => 'wǒ',
            'example_3' => 'jú',
            'answer' => 1,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 2,
            'question' => '你好',
            'example_1' => 'bù hǎo',
            'example_2' => 'nǐ hǎo',
            'example_3' => 'hěn hǎo',
            'answer' => 2,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 2,
            'question' => '姐姐',
            'example_1' => 'jiě jie',
            'example_2' => 'mèi mei',
            'example_3' => 'gē ge',
            'answer' => 1,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 2,
            'question' => '今天',
            'example_1' => 'míngtiān',
            'example_2' => 'jīntiān',
            'example_3' => 'zuótiān',
            'answer' => 2,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 2,
            'question' => '现在',
            'example_1' => 'xiànzài',
            'example_2' => 'guòqù',
            'example_3' => 'wèilái',
            'answer' => 1,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 2,
            'question' => '学习',
            'example_1' => 'xuéxí',
            'example_2' => 'dúshū',
            'example_3' => 'chànggē',
            'answer' => 1,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 2,
            'question' => '生日',
            'example_1' => 'gōngxǐ',
            'example_2' => 'kuàilè',
            'example_3' => 'shēngrì',
            'answer' => 3,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 2,
            'question' => '丈夫',
            'example_1' => 'zhàngfu',
            'example_2' => 'qīzi',
            'example_3' => 'fūqī',
            'answer' => 1,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 2,
            'question' => '家',
            'example_1' => 'yuàn',
            'example_2' => 'jiā',
            'example_3' => 'xiào',
            'answer' => 2,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 2,
            'question' => '元',
            'example_1' => 'kuài',
            'example_2' => 'jiǎo',
            'example_3' => 'yuan',
            'answer' => 3,
        ]);

        LvlTestMcPoolBeginner::create([
            'session' => 3,
            'question' => '你好，认识你很高兴。',
            'example_1' => '吃饭了没？',
            'example_2' => '不是，我是学生。',
            'example_3' => '我也很高兴。',
            'answer' => 3,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 3,
            'question' => '现在你去哪儿？',
            'example_1' => '学习汉语。',
            'example_2' => '去银行。',
            'example_3' => '做饭。',
            'answer' => 2,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 3,
            'question' => '今天是你的生日吧。生日快乐！',
            'example_1' => '我喜欢唱歌。',
            'example_2' => '明天是星期四。',
            'example_3' => '谢谢。',
            'answer' => 3,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 3,
            'question' => '一斤多少钱？',
            'example_1' => '三十块。',
            'example_2' => '十点半。',
            'example_3' => '周四。',
            'answer' => 1,
        ]);

        LvlTestMcPoolBeginner::create([
            'session' => 4,
            'question' => '今天是（ ）月（ ）号？',
            'example_1' => '什么',
            'example_2' => '多少',
            'example_3' => '几',
            'answer' => 3,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 4,
            'question' => '今天是星期一，（ ）是星期二。',
            'example_1' => '后天',
            'example_2' => '明天',
            'example_3' => '昨天',
            'answer' => 2,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 4,
            'question' => '你（ ）在哪儿？',
            'example_1' => '住',
            'example_2' => '打',
            'example_3' => '飞',
            'answer' => 1,
        ]);
        LvlTestMcPoolBeginner::create([
            'session' => 4,
            'question' => '他（ ）买苹果。',
            'example_1' => '可以',
            'example_2' => '会',
            'example_3' => '想',
            'answer' => 3,
        ]);
	}

}