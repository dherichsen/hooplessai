<?php

namespace Database\Seeders;

use App\Models\FaqItem;
use App\Models\Insight;
use App\Models\Page;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // Site Settings
        $settings = [
            ['key' => 'contact_email', 'value' => 'hello@hoopless.ai', 'group' => 'contact'],
            ['key' => 'linkedin_url', 'value' => '', 'group' => 'social'],
            ['key' => 'twitter_url', 'value' => '', 'group' => 'social'],
            ['key' => 'offices', 'value' => json_encode([
                ['city' => 'Boulder', 'address' => "1942 Broadway, Suite 314,\nBoulder, CO 80302"],
                ['city' => 'Columbus', 'address' => "21 E State St, Suite 200,\nColumbus, OH 43215"],
            ]), 'group' => 'offices'],
        ];
        foreach ($settings as $s) {
            SiteSetting::updateOrCreate(['key' => $s['key']], $s);
        }

        // Pages
        Page::updateOrCreate(['slug' => 'home'], [
            'title' => 'Home',
            'template' => 'home',
            'hero_title' => 'Creating Clarity',
            'hero_subtitle' => 'In A World Of Uncertainty',
            'hero_body' => 'We help onboard businesses and developers into the AI era with custom enterprise-grade solutions.',
            'is_published' => true,
        ]);
        Page::updateOrCreate(['slug' => 'about'], [
            'title' => 'About',
            'template' => 'about',
            'hero_title' => 'A different kind of firm',
            'is_published' => true,
        ]);
        Page::updateOrCreate(['slug' => 'services'], [
            'title' => 'Services',
            'template' => 'services',
            'hero_title' => 'What We Build',
            'hero_body' => 'Enterprise-grade AI systems, strategic consulting, and seamless integration — tailored to where you are in your AI journey.',
            'is_published' => true,
        ]);
        Page::updateOrCreate(['slug' => 'projects'], [
            'title' => 'Projects', 'template' => 'projects', 'is_published' => true,
        ]);
        Page::updateOrCreate(['slug' => 'insights'], [
            'title' => 'Insights', 'template' => 'insights', 'is_published' => true,
        ]);
        Page::updateOrCreate(['slug' => 'contact'], [
            'title' => 'Contact',
            'template' => 'contact',
            'hero_title' => "Let's talk",
            'hero_body' => "Whether you have a project in mind or just want to explore what AI can do for your business — we'd love to hear from you.",
            'is_published' => true,
        ]);

        // Services
        Service::updateOrCreate(['slug' => 'enterprise-software'], [
            'name' => 'Enterprise Software',
            'description' => 'We design and build production-grade AI systems — from intelligent automation to custom LLM integrations — engineered for scale, security, and long-term maintainability.',
            'order' => 1,
            'cta_text' => 'Learn more',
        ]);
        Service::updateOrCreate(['slug' => 'ai-integration'], [
            'name' => 'AI Integration',
            'description' => 'We bring businesses into the AI era — embedding intelligent systems into existing workflows, tools, and teams so adoption is seamless and the value is immediate.',
            'order' => 2,
            'cta_text' => 'Learn more',
        ]);
        Service::updateOrCreate(['slug' => 'model-fine-tuning'], [
            'name' => 'Model Fine-tuning',
            'description' => "Off-the-shelf models get you 80% of the way. We take you the rest — fine-tuning open-source and proprietary models on your data to deliver accuracy, tone, and domain specificity that generic APIs can't match.",
            'order' => 3,
            'cta_text' => 'Learn more',
        ]);

        // Team Members
        TeamMember::updateOrCreate(['name' => 'David Erichsen'], [
            'role' => 'Co-Founder — Engineering',
            'bio' => "Full-stack engineer with over a decade building production systems. Leads hoopless.ai's technical architecture — from custom LLM pipelines to the infrastructure that keeps them running at scale.",
            'order' => 1,
        ]);
        TeamMember::updateOrCreate(['name' => 'Jeff Hooton'], [
            'role' => 'Co-Founder — Engineering',
            'bio' => 'Systems engineer specializing in autonomous agents and intelligent automation. Previously built distributed systems at scale before co-founding hoopless.ai.',
            'order' => 2,
        ]);
        TeamMember::updateOrCreate(['name' => 'Sam Knight'], [
            'role' => 'SMB Strategy',
            'bio' => "Google Business Profile Platinum Product Expert and one of 47 leading voices in Whitespark's 2026 Local Search Ranking Factors Report. Helps SMBs build AI-augmented growth strategies.",
            'order' => 3,
        ]);
        TeamMember::updateOrCreate(['name' => 'Ryan Leddy'], [
            'role' => 'SaaS Strategy',
            'bio' => 'SaaS strategist with deep experience in product-led growth, go-to-market, and revenue architecture. Helps AI-native companies find their wedge and scale it.',
            'order' => 4,
        ]);

        // Projects
        $projects = [
            ['title' => 'AI Operations Dashboard', 'category' => 'client', 'description' => 'Real-time monitoring and orchestration platform for a Fortune 500 logistics company. Manages 200+ autonomous agents processing 50K daily decisions.', 'order' => 1],
            ['title' => 'llm-router', 'category' => 'oss', 'description' => 'Intelligent model routing for multi-LLM architectures. Automatically selects the optimal model based on query complexity, cost, and latency requirements.', 'language' => 'TypeScript', 'stars' => '1.2k stars', 'order' => 2],
            ['title' => 'Clinical Documentation AI', 'category' => 'client', 'description' => 'Automated clinical note generation for a regional healthcare network. Reduced physician documentation time by 65% while maintaining compliance standards.', 'order' => 3],
            ['title' => 'rag-toolkit', 'category' => 'oss', 'description' => 'Production-ready RAG pipeline framework with chunking strategies, hybrid search, and evaluation harness.', 'language' => 'Python', 'stars' => '890 stars', 'order' => 4],
            ['title' => 'Fintech AI Roadmap', 'category' => 'client', 'description' => 'End-to-end AI strategy for a Series B fintech. Identified $2.4M in annual savings through intelligent document processing and automated compliance checks.', 'order' => 5],
            ['title' => 'agent-bench', 'category' => 'oss', 'description' => 'Benchmarking framework for evaluating autonomous AI agents. Standardized test suites for reasoning, tool use, and multi-step task completion.', 'language' => 'Python', 'stars' => '640 stars', 'order' => 6],
            ['title' => 'Conversational Search Platform', 'category' => 'client', 'description' => 'Natural language search interface for an e-commerce platform with 2M+ SKUs. Replaced keyword search with semantic understanding, lifting conversion 34%.', 'order' => 7],
            ['title' => 'prompt-lab', 'category' => 'oss', 'description' => 'Visual prompt engineering workbench with version control, A/B testing, and regression detection.', 'language' => 'TypeScript', 'stars' => '430 stars', 'order' => 8],
        ];
        foreach ($projects as $p) {
            Project::updateOrCreate(['title' => $p['title']], array_merge($p, [
                'slug' => \Illuminate\Support\Str::slug($p['title']),
                'is_published' => true,
            ]));
        }

        // FAQ Items
        $faqs = [
            ['question' => 'How does an engagement typically start?', 'answer' => "We start with a conversation — no pitch decks, no sales process. We listen to what you're trying to solve, assess whether AI is the right tool, and scope a focused engagement that delivers value quickly.", 'category' => 'working-with-us', 'order' => 1],
            ['question' => 'What size companies do you work with?', 'answer' => "From funded startups to established enterprises. We work best with teams who know they need AI but want a partner who can both advise and build.", 'category' => 'working-with-us', 'order' => 2],
            ['question' => 'Do you work on retainer or project-based?', 'answer' => 'Both. Consulting is typically project-based with clear deliverables. Engineering often starts as a project and transitions to retainer for ongoing development and support.', 'category' => 'working-with-us', 'order' => 3],
            ['question' => 'What AI models and frameworks do you use?', 'answer' => "We're model-agnostic — OpenAI, Anthropic, open-source, fine-tuned. We recommend the right tool for your requirements, not the trendy one.", 'category' => 'technical', 'order' => 4],
            ['question' => 'Do we own the code and IP?', 'answer' => 'Yes, fully. Code, models, pipelines, documentation — it all belongs to you. No lock-in, no proprietary wrappers.', 'category' => 'technical', 'order' => 5],
            ['question' => 'Can you integrate with our existing stack?', 'answer' => "That's what we do best. We meet you where you are — legacy systems, modern cloud, or something in between. No rip-and-replace required.", 'category' => 'technical', 'order' => 6],
        ];
        foreach ($faqs as $f) {
            FaqItem::updateOrCreate(['question' => $f['question']], array_merge($f, [
                'page' => 'about',
                'is_published' => true,
            ]));
        }

        // Insights
        Insight::updateOrCreate(['slug' => 'why-most-ai-projects-fail'], [
            'title' => 'Why Most AI Projects Fail Before They Start',
            'excerpt' => "The majority of enterprise AI initiatives don't fail because of bad models. They fail because nobody asked the right questions about the problem they were solving.",
            'content' => "<h2>The problem isn't the technology</h2>\n<p>Most AI projects fail before a single line of code is written. The failure mode isn't technical — it's organizational. Teams jump to solutions before understanding the problem.</p>\n<p>We've seen this pattern dozens of times: a company reads about a competitor using AI, gets excited, hires a team or an agency, and starts building. Six months later, they have a proof-of-concept that nobody uses.</p>\n<h2>The questions that matter</h2>\n<p>Before any AI initiative, ask: What manual process are we replacing? Who benefits? How do we measure success? What happens if the AI is wrong 10% of the time? These questions seem basic, but they're almost never asked with enough rigor.</p>",
            'author' => 'David Erichsen',
            'is_published' => true,
            'published_at' => '2026-03-15',
        ]);
        Insight::updateOrCreate(['slug' => 'rag-vs-fine-tuning'], [
            'title' => 'RAG vs Fine-Tuning: A Practical Guide',
            'excerpt' => 'When should you retrieve context at runtime versus bake knowledge into the model? A framework for making the right architectural decision.',
            'content' => "<h2>Two approaches, one goal</h2>\n<p>RAG (Retrieval-Augmented Generation) and fine-tuning are the two primary strategies for making LLMs work with your specific data. The right choice depends on your data, your latency requirements, and your budget.</p>\n<p>RAG retrieves relevant context at query time and feeds it alongside the user's question. Fine-tuning adjusts the model's weights using your training data, baking knowledge directly into the model.</p>\n<h2>When to use RAG</h2>\n<p>Use RAG when your data changes frequently, when you need source attribution, or when you can't afford the compute costs of fine-tuning. RAG is also the safer starting point — it's easier to debug and iterate on.</p>",
            'author' => 'Jeff Hooton',
            'is_published' => true,
            'published_at' => '2026-02-22',
        ]);
        Insight::updateOrCreate(['slug' => 'ai-readiness-checklist'], [
            'title' => 'The AI Readiness Checklist for Growing Companies',
            'excerpt' => "Before you hire an AI team or buy a platform, here are the ten things that actually matter — and the five that don't.",
            'content' => "<h2>What actually matters</h2>\n<p>AI readiness isn't about having the latest GPU cluster or hiring PhDs. It's about having clean data, clear problems, and realistic expectations.</p>\n<ol>\n<li><strong>You have a specific problem worth solving</strong> — not \"we need AI\" but \"we spend 40 hours a week on X\"</li>\n<li><strong>Your data is accessible</strong> — it doesn't need to be perfect, but it needs to be queryable</li>\n<li><strong>You have executive buy-in</strong> — someone with budget authority believes in this</li>\n<li><strong>You can define success</strong> — what does \"working\" look like in measurable terms?</li>\n</ol>",
            'author' => 'David Erichsen',
            'is_published' => true,
            'published_at' => '2026-01-10',
        ]);
    }
}
