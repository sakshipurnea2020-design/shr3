<?php
/**
 * Shreya Namankan – Central Configuration & Content File
 * -------------------------------------------------------
 * All site content is managed here. Update this file to reflect
 * changes without touching any HTML or PHP template code.
 */

$config = [

    /* ── Site Settings ─────────────────────────────────────── */
    'site' => [
        'name'      => 'Shreya Namankan',
        'tagline'   => 'Free Study Abroad Consultancy',
        'url'       => 'https://shreyanamankan.com',
        'email'     => 'hello@shreyanamankan.com',
        'phone'     => '+91-9135288718',
        'whatsapp'  => '919135288718',
        'hours'     => 'Mon–Sat, 10am–7pm IST',
        'og_image'  => 'https://shreyanamankan.com/assets/images/og-image.jpg',
        'hero_image'=> 'assets/images/hero-bg.jpg',
        'description' => 'Shreya Namankan is a 100% free study abroad consultancy in Patna, Bihar. We help Indian students get admitted to 1000+ universities in 15+ countries — Germany, UK, Canada, Australia & more — at zero cost to students.',
    ],

    /* ── Social Media URLs ──────────────────────────────────── */
    /* Leave value as empty string '' for unconfirmed platforms  */
    'social' => [
        'instagram' => 'https://www.instagram.com/shreya_namankan',
        'whatsapp'  => 'https://wa.me/919135288718',
        'twitter'   => 'https://twitter.com/shreya_namankan',
        'youtube'   => '',          // TODO: confirm YouTube channel URL
        'facebook'  => '',          // TODO: confirm Facebook page URL
        'linkedin'  => '',          // TODO: confirm LinkedIn profile URL
    ],

    /* ── Destination Countries (flag emoji + name) ──────────── */
    'countries' => [
        ['flag' => '🇩🇪', 'name' => 'Germany'],
        ['flag' => '🇬🇧', 'name' => 'UK'],
        ['flag' => '🇨🇦', 'name' => 'Canada'],
        ['flag' => '🇦🇺', 'name' => 'Australia'],
        ['flag' => '🇳🇿', 'name' => 'New Zealand'],
        ['flag' => '🇺🇸', 'name' => 'USA'],
        ['flag' => '🇫🇷', 'name' => 'France'],
        ['flag' => '🇮🇹', 'name' => 'Italy'],
        ['flag' => '🇪🇸', 'name' => 'Spain'],
        ['flag' => '🇳🇱', 'name' => 'Netherlands'],
        ['flag' => '🇵🇱', 'name' => 'Poland'],
        ['flag' => '🇮🇪', 'name' => 'Ireland'],
        ['flag' => '🇸🇬', 'name' => 'Singapore'],
        ['flag' => '🇰🇷', 'name' => 'South Korea'],
        ['flag' => '🇯🇵', 'name' => 'Japan'],
        ['flag' => '🇸🇪', 'name' => 'Sweden'],
        ['flag' => '🇨🇭', 'name' => 'Switzerland'],
        ['flag' => '🇩🇰', 'name' => 'Denmark'],
        ['flag' => '🇫🇮', 'name' => 'Finland'],
        ['flag' => '🇧🇪', 'name' => 'Belgium'],
        ['flag' => '🇦🇹', 'name' => 'Austria'],
        ['flag' => '🇨🇿', 'name' => 'Czech Republic'],
        ['flag' => '🇲🇾', 'name' => 'Malaysia'],
        ['flag' => '🇦🇪', 'name' => 'UAE'],
    ],

    /* ── Services ───────────────────────────────────────────── */
    'services' => [
        [
            'number'      => '01',
            'title'       => 'University & Course Selection',
            'description' => 'We match your profile, budget, and career goals to the right universities and programs across 15+ countries.',
            'bullets'     => [
                'Personalised university shortlist (5–10 options)',
                'Course comparison across countries',
                'Ranking & employability analysis',
                'Intake calendar planning',
            ],
        ],
        [
            'number'      => '02',
            'title'       => 'IELTS & Application Fee Waivers',
            'description' => 'Save thousands in fees — we secure official waivers directly through our university partnerships.',
            'bullets'     => [
                'IELTS requirement waivers for eligible profiles',
                'Application fee waivers (save ₹5,000–₹20,000)',
                'MOI letter guidance as alternative proof',
                'Waiver tracking and follow-up',
            ],
        ],
        [
            'number'      => '03',
            'title'       => 'Applications & Documentation',
            'description' => 'We handle every step of the application process — from SOP writing to final submission.',
            'bullets'     => [
                'Statement of Purpose (SOP) drafting & review',
                'LOR guidance for recommenders',
                'Transcript & document authentication',
                'Application submission & deadline tracking',
            ],
        ],
        [
            'number'      => '04',
            'title'       => 'Scholarships & Education Loans',
            'description' => 'We identify scholarships you qualify for and connect you with trusted education loan providers.',
            'bullets'     => [
                'Merit and need-based scholarship search',
                'DAAD, Chevening, and country-specific grants',
                'Education loan eligibility check',
                'Bank and NBFC tie-ups for collateral-free loans',
            ],
        ],
        [
            'number'      => '05',
            'title'       => 'Visa Guidance & Interview Prep',
            'description' => 'Our visa success rate is high because we prepare students thoroughly for every step.',
            'bullets'     => [
                'Visa document checklist and preparation',
                'Blocked account & finance guidance (Germany)',
                'Mock visa interview sessions',
                'Embassy appointment scheduling support',
            ],
        ],
        [
            'number'      => '06',
            'title'       => 'Accommodation & Pre-Departure Support',
            'description' => 'We make sure you land confident — with housing sorted and everything you need to know.',
            'bullets'     => [
                'Student accommodation search assistance',
                'Airport pickup coordination',
                'Pre-departure orientation briefing',
                'SIM card, bank account & health insurance tips',
            ],
        ],
    ],

    /* ── Process Steps ──────────────────────────────────────── */
    'process_steps' => [
        [
            'number'      => '01',
            'title'       => 'Free Profile Evaluation',
            'description' => 'Tell us about your background — we assess your eligibility for free within 24 hours.',
            'bullets'     => [
                'Academic background review',
                'English proficiency assessment',
                'Target country & budget discussion',
                'Career goal alignment',
            ],
        ],
        [
            'number'      => '02',
            'title'       => 'Country & University Shortlisting',
            'description' => 'We create a personalised list of the best-fit universities and programs for your profile.',
            'bullets'     => [
                'Country comparison (tuition, living cost, visa ease)',
                'University shortlist (5–10 options)',
                'Program matching by career goal',
                'Intake planning (Winter/Summer)',
            ],
        ],
        [
            'number'      => '03',
            'title'       => 'Waivers & Application Submission',
            'description' => 'We apply for all available waivers and submit your applications accurately and on time.',
            'bullets'     => [
                'IELTS and fee waiver requests',
                'SOP and LOR preparation',
                'Document checklist and verification',
                'Application portal submission',
            ],
        ],
        [
            'number'      => '04',
            'title'       => 'Scholarship & Loan Assistance',
            'description' => 'After receiving offers, we help you fund your education through scholarships and loans.',
            'bullets'     => [
                'Scholarship search and application',
                'Offer letter evaluation',
                'Education loan documentation support',
                'Financial planning for the first year',
            ],
        ],
        [
            'number'      => '05',
            'title'       => 'Visa File Preparation & Interview Prep',
            'description' => 'We build an airtight visa file and prepare you for any embassy interview.',
            'bullets'     => [
                'Full visa document compilation',
                'Blocked account / financial proof guidance',
                'Mock interview sessions',
                'Visa appointment booking help',
            ],
        ],
        [
            'number'      => '06',
            'title'       => 'Pre-Departure Briefing & Arrival Support',
            'description' => 'You land prepared — with housing, finances, and everything else sorted before you board.',
            'bullets'     => [
                'Pre-departure orientation session',
                'Accommodation booking assistance',
                'Travel and packing tips',
                'Connect with our abroad community group',
            ],
        ],
    ],

    /* ── Community Perks ────────────────────────────────────── */
    'perks' => [
        [
            'icon'        => '🏠',
            'title'       => 'Accommodation Support',
            'description' => 'We help you find safe, affordable student housing before and after you land.',
        ],
        [
            'icon'        => '💼',
            'title'       => 'Part-Time Job Alerts',
            'description' => 'Regular updates on student-friendly part-time job openings in your city.',
        ],
        [
            'icon'        => '🎓',
            'title'       => 'Graduate Job Updates',
            'description' => 'Post-study work opportunities and graduate job alerts relevant to your field.',
        ],
        [
            'icon'        => '🛍️',
            'title'       => 'Shopping Guides',
            'description' => 'Know where to buy groceries, Indian food, and essentials without overspending.',
        ],
        [
            'icon'        => '🎟️',
            'title'       => 'Student Discounts',
            'description' => 'Access exclusive student deals on transport, software, and local services.',
        ],
        [
            'icon'        => '🤝',
            'title'       => 'Pre-Arrival Connections',
            'description' => 'Connect with our existing students in your destination before you even land.',
        ],
        [
            'icon'        => '📋',
            'title'       => 'Tax Filing Guidance',
            'description' => 'Simple, jargon-free guidance on annual student tax returns abroad.',
        ],
        [
            'icon'        => '🛂',
            'title'       => 'PR Pathway Guidance',
            'description' => 'Early advice on post-study visa and permanent residency pathways.',
        ],
        [
            'icon'        => '🔄',
            'title'       => 'Visa Renewal Help',
            'description' => 'We assist with student visa extensions and compliance throughout your studies.',
        ],
        [
            'icon'        => '💬',
            'title'       => 'Permanent Support Channel',
            'description' => 'Access our WhatsApp and community group for questions at any stage of your journey.',
        ],
    ],

    /* ── Testimonials ───────────────────────────────────────── */
    'testimonials' => [
        [
            'name'        => 'Priya Sharma',
            'course'      => 'MSc Data Science, Germany',
            'quote'       => 'Shreya di helped me get into a top German university with an IELTS waiver and zero application fee. I honestly could not have done this without her constant support. She made the whole process feel easy.',
            'stars'       => 5,
        ],
        [
            'name'        => 'Rohit Kumar',
            'course'      => 'BEng Computer Science, Canada',
            'quote'       => 'From profile evaluation to visa approval, everything was handled professionally. I got a scholarship I did not even know I was eligible for. Best decision to reach out to Shreya Namankan!',
            'stars'       => 5,
        ],
        [
            'name'        => 'Anjali Singh',
            'course'      => 'MBA, United Kingdom',
            'quote'       => 'The community support even after arriving in the UK is what sets them apart. They helped me find accommodation, part-time work, and even tax filing tips. Truly a full-journey partner.',
            'stars'       => 5,
        ],
    ],

    /* ── FAQ Pairs ──────────────────────────────────────────── */
    'faqs' => [
        [
            'question' => 'Is the consultancy service really free for students?',
            'answer'   => 'Yes — 100% free. Shreya Namankan charges absolutely nothing to students. We are compensated by our university partners, so every service — from profile evaluation to visa preparation — is provided at zero cost to you.',
        ],
        [
            'question' => 'Which countries can I apply to?',
            'answer'   => 'We support applications to 15+ countries including Germany, United Kingdom, Canada, Australia, New Zealand, USA, France, Italy, Spain, Netherlands, Poland, Ireland, Singapore, South Korea, Japan, Sweden, Switzerland, Denmark, Finland, Belgium, Austria, Czech Republic, Malaysia, and UAE.',
        ],
        [
            'question' => 'Is IELTS mandatory for all universities?',
            'answer'   => 'Not always. Many of our partner universities offer IELTS waivers for students who have studied in English-medium institutions. We assess your eligibility and apply for the waiver on your behalf — saving you time and the IELTS exam cost.',
        ],
        [
            'question' => 'Is it true that public universities in Germany are free?',
            'answer'   => 'Yes! Most public universities in Germany charge only a semester fee (€150–€350) for administration and transport. There is no tuition fee for international students at most state universities. This makes Germany one of the most affordable study destinations in the world.',
        ],
        [
            'question' => 'How do I get started?',
            'answer'   => 'Simply fill out the contact form on this page or send us a WhatsApp message at +91-9135288718. We will schedule a free profile evaluation call and guide you from there. No commitment required.',
        ],
        [
            'question' => 'Can you help me get an education loan?',
            'answer'   => 'Yes. We help you identify scholarship opportunities and connect you with trusted banks and NBFCs that offer student education loans — including collateral-free options for eligible profiles. We guide you through the documentation process at no extra charge.',
        ],
        [
            'question' => 'Is it safe to study abroad as an Indian student?',
            'answer'   => 'Studying abroad is generally very safe. Our students are part of a community group where they receive pre-arrival city guides, safety tips, and ongoing support. We connect you with existing students in your destination city before you even land.',
        ],
        [
            'question' => 'What is the minimum eligibility to apply?',
            'answer'   => 'Requirements vary by country and program. In general, you need a 10+2 or bachelor\'s degree (depending on the program level), a basic understanding of English, and a valid passport. Contact us for a free profile check — there is no minimum requirement to start the conversation.',
        ],
    ],

    /* ── SMTP Configuration ─────────────────────────────────── */
    /* Set 'enabled' to true and fill in credentials to use SMTP */
    'smtp' => [
        'enabled'  => false,
        'host'     => '',           // e.g. smtp.gmail.com
        'port'     => 587,
        'username' => '',           // your SMTP username / email
        'password' => '',           // your SMTP password / app password
        'from'     => 'hello@shreyanamankan.com',
        'from_name'=> 'Shreya Namankan',
    ],

];
