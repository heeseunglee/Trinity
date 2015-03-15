<?php

use App\LvlTestMcPoolExpert;
use Illuminate\Database\Seeder;

class LvlTestMcPoolExpertTableSeeder extends Seeder {

	public function run()
	{
        LvlTestMcPoolExpert::create([
            'session' => 1,
            'question' => '空调、彩电、冰箱、洗衣机开始了新一（ ）的产品换代。',
            'example_1' => '串',
            'example_2' => '轮',
            'example_3' => '起',
            'example_4' => '股',
            'answer' => 2,
        ]);
        LvlTestMcPoolExpert::create([
            'session' => 1,
            'question' => '经过一（ ）思考，他认为在中国只有四个城市适合做房地产。',
            'example_1' => '条',
            'example_2' => '会',
            'example_3' => '番',
            'example_4' => '副',
            'answer' => 3,
        ]);
        LvlTestMcPoolExpert::create([
            'session' => 1,
            'question' => '任何事只要去做，就会有一（ ）生机。',
            'example_1' => '线',
            'example_2' => '张',
            'example_3' => '把',
            'example_4' => '身',
            'answer' => 1,
        ]);

        LvlTestMcPoolExpert::create([
            'session' => 2,
            'question' => '裁判员必须拥有健康的____，特别要具备其职业所需的速度和耐力。要经常进行身体锻炼，有计划和有系统地进行身体____。只有这样，才能精神____，头脑清楚，反应迅速，才能____紧张地进行工作，才能适应运动场上发生的一切。',
            'example_1' => '体魄　训练　饱满　连续',
            'example_2' => '魄力　培训　饱和　陆续',
            'example_3' => '气势　操练　丰满　不断',
            'example_4' => '气魄　操纵　圆满　连忙',
            'answer' => 1,
        ]);
        LvlTestMcPoolExpert::create([
            'session' => 2,
            'question' => '国子监是隋朝以后的中央官学，为中国古代教育____中的最高学府，由于首都北____，明朝在北京、南京____设有国子监。国子监接纳全国各族学生，还接待外国学生,为促进中外文化的交流____了积极的作用。',
            'example_1' => '系列　移　各自　发扬',
            'example_2' => '体系　迁　分别　发挥',
            'example_3' => '团体　挪　必定　发布',
            'example_4' => '系统　跨　单独　发动',
            'answer' => 2,
        ]);
        LvlTestMcPoolExpert::create([
            'session' => 2,
            'question' => '一两次的____不代表永远的失败，几次的成功也不意味着你是个____。保持积极向上的____，审视自己并____自己的不足，才是通向成功的处世之道。',
            'example_1' => '挫折　天才　心态　弥补',
            'example_2' => '曲折　人才　心灵　补救',
            'example_3' => '转折　英雄　姿态　削弱',
            'example_4' => '折磨　专家　良心　补偿',
            'answer' => 1,
        ]);

        LvlTestMcPoolExpert::create([
            'session' => 3,
            'text' => '自从哥伦布发现新大陆后，16世纪烟草从美洲传入欧洲，从贵族社会传入平民百姓，盛行了几百年，如今在欧洲已面临厄运，不再被认为是社交工具，不再是表现绅上淑女风度潇洒的装饰品，而被认为是一种公害。',
            'question' => '什么是一种公害？',
            'example_1' => '哥伦布',
            'example_2' => '装饰品',
            'example_3' => '平民百姓',
            'example_4' => '烟草',
            'answer' => 4,
        ]);
        LvlTestMcPoolExpert::create([
            'session' => 3,
            'text' => '有这样一些家庭，不少是独生子女家庭，家长对孩子不加约束，过于溺爱，毫无限制地满足他们的物质需要，却缺少精神方面的有效教育，使子女变成了自私自利、贪图享爱、粗暴野蛮、丧失道德观念的人。',
            'question' => '什么人使孩子变坏了？',
            'example_1' => '独生子女的家长',
            'example_2' => '缺少教育的家长',
            'example_3' => '溺爱孩子的家长',
            'example_4' => '自私自利的家长',
            'answer' => 3,
        ]);
        LvlTestMcPoolExpert::create([
            'session' => 3,
            'text' => '人们常常看到，每当某事某物在竞争失败后，它的一些拥护者，不是研究它败在何处，何以失败，从而加以改进，提高它的竞争力，而是批评竞争对手太强，希望外部力量来抑制和打杀对手，以保护自己的生存和发展。',
            'question' => '一些竞争失败者为什么要打杀对手？',
            'example_1' => '为了研究自己失败的原因',
            'example_2' => '为了提高竞争力',
            'example_3' => '不想让竞争对手变得更强',
            'example_4' => '为了保护自己的生存和发展',
            'answer' => 4,
        ]);

        LvlTestMcPoolExpert::create([
            'session' => 4,
            'example_1' => '她因不堪忍受雇主的歧视和侮辱，便投诉《人间指南》编辑部，要求编辑部帮她伸张正义，编辑部对此十分重视。',
            'example_2' => '老陈严肃而诚恳地说：“说实话，那些越足年轻的时候有一腔热血，到岁数大了，就越是不愿承认自己老了。”',
            'example_3' => '大李慌忙站起身说：“小米你千万别再‘李大爷李大爷’这么叫了，我听着不自在。哟，找你李大爷有什么事„„嘿，你瞧，把我也绕进去了。”',
            'example_4' => '三妹拉着葛姐的手说，她老家在偏远的山区，因为和家里赌气才跑到北京打工的，接着她又哭泣起自己的遭遇来。',
            'answer' => 3,
        ]);
        LvlTestMcPoolExpert::create([
            'session' => 4,
            'example_1' => '哺乳期妇女如果仅仅依靠服用补品中的含碘量，就有可能缺碘，若不及时添加含碘食品，则有可能导致婴儿脑神经损伤或智力低下。',
            'example_2' => '在这部作品中，并没有给人们多少正面的鼓励和积极的启示，相反，其中一些情节的负面作用倒是不少。',
            'example_3' => '当今世界，自主知识产权所占比重是衡量一个国家科学发展水平的标志，而科学技术进步与否是国家富强的标志。',
            'example_4' => '如何体会企业文化的深刻内涵，认识用优秀文化提升企业竞争力的重要性，是摆在每一位中国企业家面前的重要课题。',
            'answer' => 4,
        ]);
        LvlTestMcPoolExpert::create([
            'session' => 4,
            'example_1' => '七彩瀑布群，位于香格里拉县尼汝村的一个群山深处，一条名为“尼汝河”的高原融雪河流和陡峭的山峰造就了这一旷世奇观。',
            'example_2' => '强强联合制作的大戏，让人们不仅看以了中国戏曲的整体进步，而且看到了中国戏曲在现代化问题上迈出的可喜一步。”',
            'example_3' => '该报指出，这次会晤的主要意义，在于善意姿态、长远战略和历史方向，多于具体互惠措施的落实。”',
            'example_4' => '经过不懈的努力，国家图书馆在搜集、加工、存储、提供古典文献方面，已经形成具有中国特色的藏用并重的格局。',
            'answer' => 2,
        ]);
	}

}