<?php

use App\LvlTestMcPoolIntermediate;
use Illuminate\Database\Seeder;

class LvlTestMcPoolIntermediateTableSeeder extends Seeder {

	public function run()
	{
        LvlTestMcPoolIntermediate::create([
            'session' => 1,
            'question' => '今日（ ）共八版',
            'example_1' => '报纸',
            'example_2' => '电视',
            'example_3' => '手机',
            'example_4' => '照片',
            'answer' => 1,
        ]);
        LvlTestMcPoolIntermediate::create([
            'session' => 1,
            'question' => '学校（ ）有一个公园',
            'example_1' => '左右',
            'example_2' => '一面',
            'example_3' => '旁边',
            'example_4' => '内外',
            'answer' => 3,
        ]);
        LvlTestMcPoolIntermediate::create([
            'session' => 1,
            'question' => '狗是很可爱的（ ）。',
            'example_1' => '食物',
            'example_2' => '动物',
            'example_3' => '植物',
            'example_4' => '它物',
            'answer' => 2,
        ]);
        LvlTestMcPoolIntermediate::create([
            'session' => 1,
            'question' => '想到过去，不后悔；想到（ ），有信心。',
            'example_1' => '将来',
            'example_2' => '往来',
            'example_3' => '将近',
            'example_4' => '往去',
            'answer' => 1,
        ]);
        LvlTestMcPoolIntermediate::create([
            'session' => 1,
            'question' => '她表示要放弃这个机会，同学们都觉得很（ ）。',
            'example_1' => '可爱',
            'example_2' => '爱惜',
            'example_3' => '可惜',
            'example_4' => '感动',
            'answer' => 3,
        ]);
        LvlTestMcPoolIntermediate::create([
            'session' => 1,
            'question' => '卖还是不卖，您还是先和阿姨（ ）一下再做决定吧。',
            'example_1' => '质量',
            'example_2' => '商量',
            'example_3' => '商办',
            'example_4' => '尽量',
            'answer' => 4,
        ]);

        LvlTestMcPoolIntermediate::create([
            'session' => 2,
            'question' => '中老年消费者 / 这种产品 / 针对 / 主要 ',
            'example_1' => '中老年消费者针对主要这种产品。',
            'example_2' => '中老年消费者这种产品主要针对。',
            'example_3' => '这种产品中老年消费者主要针对。',
            'example_4' => '这种产品主要针对中老年消费者。',
            'answer' => 4,
        ]);
        LvlTestMcPoolIntermediate::create([
            'session' => 2,
            'question' => '要 / 她 / 出席此次 / 学术讨论会 / 邀请专家',
            'example_1' => '她要邀请专家出席此次学术讨论会。',
            'example_2' => '她邀请专家出席此次要学术讨论会。',
            'example_3' => '她学术讨论会出席此次要邀请专家。',
            'example_4' => '她要邀请专家学术讨论会出席此次。',
            'answer' => 1,
        ]);
        LvlTestMcPoolIntermediate::create([
            'session' => 2,
            'question' => '他 / 食物 / 分配给了 / 把 / 每个士兵',
            'example_1' => '每个士兵分配给了把食物他。',
            'example_2' => '每个士兵把食物分配给了他。',
            'example_3' => '他食物把分配给了每个士兵。',
            'example_4' => '他把食物分配给了每个士兵。',
            'answer' => 4,
        ]);

        LvlTestMcPoolIntermediate::create([
            'session' => 3,
            'text' => '让阅读成为一种习惯吧。因为阅读有许多好处，它会让你的知识更丰富，它会让你找到解决问题的办法，它会让你不再孤单，它会让你获得更多快乐，它会让你的生活更精彩。',
            'question' => '阅读可以使人：',
            'example_1' => '更仔细',
            'example_2' => '很难过',
            'example_3' => '心情愉快',
            'example_4' => '节约时间',
            'answer' => 3,
            'question_2' => '这段话主要讲阅读的：',
            'example_5' => '作用',
            'example_6' => '速度',
            'example_7' => '范围',
            'example_8' => '顺序',
            'answer_2' => 5,
        ]);
        LvlTestMcPoolIntermediate::create([
            'session' => 3,
            'text' => '世界上有三种感情：亲情、友情和爱情。亲情是每个人一出生就带来的，是最重要的感情；从三四岁的小孩子到七八十岁的老人，每个人都需要朋友，离开朋友，我们的生活肯定会非常无聊；一生之中，和你在一起时间最长的人是你的爱人，陪你尝遍生活中的苦、辣、酸、甜的人也是你的爱人。',
            'question' => '根据这段话，可以知道亲情：',
            'example_1' => '十分复杂',
            'example_2' => '无法选择',
            'example_3' => '不容易表达',
            'example_4' => '受环境影响',
            'answer' => 2,
            'question_2' => '这段话主要谈：',
            'example_5' => '生活态度',
            'example_6' => '工作的烦恼',
            'example_7' => '学习的方法',
            'example_8' => '情感',
            'answer_2' => 8,
        ]);
        LvlTestMcPoolIntermediate::create([
            'session' => 3,
            'text' => '说话是一门艺术，语言是人们表达看法、交流感情的工具。看一个人怎么说话，往往可以比较准确地判断出他是一个什么样的人。有的人心里怎么想，嘴上就怎么说，即使是对别人的缺点，他也会直接说出来，这样的人给人感觉很诚实；有的人虽然也看到别人的缺点，但却不会直接指出来，而是通过别的方法来提醒，让你认识到自己的缺点，这样的人会让人觉得更友好。',
            'question' => '心里怎么想嘴上就怎么说的人，让人感觉很：',
            'example_1' => '诚实',
            'example_2' => '勇敢',
            'example_3' => '冷静',
            'example_4' => '随便',
            'answer' => 1,
            'question_2' => '根据这段话，可以知道什么？',
            'example_5' => '要准时',
            'example_6' => '说话能反映性格',
            'example_7' => '要懂礼貌',
            'example_8' => '应相信自己',
            'answer_2' => 6,
        ]);

        LvlTestMcPoolIntermediate::create([
            'session' => 4,
            'question' => 'A.这种情况下，就需要及时解释 B.两个人在一起，总会出现一些误会 C.否则，误会就可能越来越深',
            'example_1' => 'CBA',
            'example_2' => 'ABC',
            'example_3' => 'BAC',
            'example_4' => 'ACB',
            'answer' => 3,
        ]);
        LvlTestMcPoolIntermediate::create([
            'session' => 4,
            'question' => 'A.就能看到希望 B.因此，只要勇敢地向前走 C.困难只是暂时的',
            'example_1' => 'CAB',
            'example_2' => 'CBA',
            'example_3' => 'BCA',
            'example_4' => 'ABC',
            'answer' => 2,
        ]);
        LvlTestMcPoolIntermediate::create([
            'session' => 4,
            'question' => 'A.我觉得他各方面都很优秀 B.这一点是他吸引我的主要原因 C.首先是脾气、性格很好',
            'example_1' => 'CBA',
            'example_2' => 'BAC',
            'example_3' => 'BCA',
            'example_4' => 'ABC',
            'answer' => 4,
        ]);
    }

}