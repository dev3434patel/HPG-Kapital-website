<div class="pt-16">
    <!-- Hero -->
    <section class="relative min-h-[60vh] flex items-center overflow-hidden">
        <div
            class="absolute inset-0 bg-cover bg-center bg-fixed"
            style="background-image: url('<?= $view->asset('images/hotel-interior.jpg') ?>');"
        ></div>
        <div class="absolute inset-0 bg-gradient-to-r from-navy/95 to-royal-blue/90"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-3xl" data-animate="fade-up" data-hero-animation="true" style="opacity: 0; transform: translateY(50px);">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 px-4 sm:px-0">
                    Hospitality Financing
                </h1>
                <p class="text-lg sm:text-xl text-white/90 px-4 sm:px-0">
                    Comprehensive capital solutions designed specifically for the hospitality industry, delivering customized financing that fuels your vision from concept to completion.
                </p>
            </div>
        </div>
    </section>

    <!-- Solutions - 3x2 Grid with Icons -->
    <section class="py-24 bg-light-gray">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20" data-animate="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-navy mb-4 sm:mb-6">
                    Financing Solutions
                </h2>
                <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                    Comprehensive capital solutions designed specifically for the hospitality industry
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $solutions = [
                    [
                        'title' => 'CMBS Loans',
                        'description' => 'Long-term, fixed-rate financing for stabilized hospitality assets. Non-recourse structures with predictable debt service and assumability.',
                        'features' => ['Non-recourse structures', 'Fixed-rate terms', 'Assumable loans', 'Predictable debt service'],
                        'icon' => 'building'
                    ],
                    [
                        'title' => 'Ground-Up Development',
                        'description' => 'Capital for new hotel construction and expansion. Structured to fund projects from concept through completion and stabilization.',
                        'features' => ['70-75% LTC available', 'Flexible draw schedules', 'Construction-to-permanent', 'Completion funding'],
                        'icon' => 'trending-up'
                    ],
                    [
                        'title' => 'Bridge Loans',
                        'description' => 'Short-term, flexible funding to bridge gaps or reposition assets. Fast execution when timing is critical.',
                        'features' => ['Fast execution', 'Flexible terms', 'Repositioning support', 'Quick closing'],
                        'icon' => 'zap'
                    ],
                    [
                        'title' => 'Soft & Hard Debt',
                        'description' => 'Structured to match your project\'s risk profile and timeline. Flexible layering for optimal capital stack outcomes.',
                        'features' => ['Risk-matched structures', 'Flexible layering', 'Optimal capital stack', 'Customized terms'],
                        'icon' => 'dollar-sign'
                    ],
                    [
                        'title' => 'SBA Loans',
                        'description' => 'Government-backed financing for qualified hospitality ventures. Favorable terms for owner-occupied properties.',
                        'features' => ['Government-backed', 'Favorable rates', 'Owner-occupied focus', 'Long terms'],
                        'icon' => 'file-check'
                    ],
                    [
                        'title' => 'PACE Financing',
                        'description' => 'Energy-efficient funding that enhances sustainability and ROI. Long-term, non-dilutive capital for qualifying improvements.',
                        'features' => ['100% financing', '20-30 year terms', 'Non-dilutive', 'Enhanced property value'],
                        'icon' => 'leaf'
                    ],
                ];
                
                $iconSvg = [
                    'building' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>',
                    'trending-up' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>',
                    'zap' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>',
                    'dollar-sign' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                    'file-check' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                    'leaf' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>',
                ];
                
                foreach ($solutions as $index => $solution):
                ?>
                <div 
                    class="bg-card rounded-2xl p-8 shadow-lg border border-border/50 hover:shadow-xl transition-all h-full flex flex-col lender-card" 
                    data-animate="fade-up" 
                    data-animation-delay="<?= $index * 0.1 ?>"
                >
                    <div class="w-20 h-20 bg-gradient-to-br from-accent/20 to-royal-blue/20 rounded-2xl flex items-center justify-center text-royal-blue mb-6">
                        <?= $iconSvg[$solution['icon']] ?? '' ?>
                    </div>
                    <h3 class="text-2xl font-bold text-navy mb-4"><?= $view->escape($solution['title']) ?></h3>
                    <p class="text-muted-foreground leading-relaxed mb-6 flex-grow">
                        <?= $view->escape($solution['description']) ?>
                    </p>
                    <ul class="space-y-2 mb-6">
                        <?php foreach ($solution['features'] as $feature): ?>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-accent mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm text-muted-foreground"><?= $view->escape($feature) ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <a 
                        href="<?= $view->url('/contact') ?>" 
                        class="text-royal-blue hover:text-accent font-semibold flex items-center gap-2 transition-colors"
                    >
                        Learn More
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Why Choose Us - Side by Side -->
    <section class="py-24 bg-background">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-animate="fade-up">
                    <div class="space-y-6">
                        <div class="inline-flex items-center px-4 py-2 bg-accent/10 rounded-full">
                            <span class="text-sm font-semibold text-accent uppercase tracking-wider">Why HPG Kapital</span>
                        </div>
                        <h2 class="text-5xl font-bold text-navy">
                            Hospitality-First Expertise
                        </h2>
                        <p class="text-lg text-muted-foreground leading-relaxed">
                            We understand that hospitality financing requires specialized expertise and deep market knowledge. Our team brings decades of combined experience to help you navigate complex capital structures.
                        </p>
                        <div class="space-y-4 pt-4">
                            <?php
                            $advantages = [
                                "Tailored loan structures built around your unique goals",
                                "Direct access to top-tier debt providers with hospitality expertise",
                                "Deep understanding of operational needs and industry dynamics"
                            ];
                            foreach ($advantages as $item):
                            ?>
                            <div class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-accent mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-muted-foreground"><?= $view->escape($item) ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div data-animate="fade-up" data-animation-delay="0.2">
                    <div class="grid grid-cols-2 gap-6">
                        <?php
                        $features = [
                            ['title' => 'Tailored Structures', 'desc' => 'Built for your unique project requirements'],
                            ['title' => 'Trusted Relationships', 'desc' => 'Top-tier lenders with hospitality expertise'],
                            ['title' => 'Industry Expertise', 'desc' => 'Deep understanding of hotel operations'],
                            ['title' => 'Fast Execution', 'desc' => 'Streamlined process from application to closing'],
                        ];
                        foreach ($features as $idx => $item):
                        ?>
                        <div class="bg-card rounded-xl p-6 shadow-lg border border-border/50 hover:shadow-xl transition-all lender-card">
                            <div class="text-3xl font-bold text-royal-blue mb-2"><?= str_pad($idx + 1, 2, '0', STR_PAD_LEFT) ?></div>
                            <h3 class="text-lg font-bold text-navy mb-2"><?= $view->escape($item['title']) ?></h3>
                            <p class="text-sm text-muted-foreground"><?= $view->escape($item['desc']) ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Timeline -->
    <section class="py-24 bg-light-gray">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-animate="fade-up">
                <h2 class="text-5xl font-bold text-navy mb-4">Our Process</h2>
                <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                    A proven approach to delivering optimal financing solutions
                </p>
            </div>

            <div class="max-w-5xl mx-auto">
                <div class="relative">
                    <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-gradient-to-b from-accent to-royal-blue hidden md:block"></div>
                    <div class="space-y-12">
                        <?php
                        $steps = [
                            ['step' => '01', 'title' => 'Project Assessment', 'desc' => 'Comprehensive analysis of your project needs and financial goals'],
                            ['step' => '02', 'title' => 'Capital Stack Engineering', 'desc' => 'Strategic structuring to optimize your financing mix'],
                            ['step' => '03', 'title' => 'Lender Matching', 'desc' => 'Connecting you with the right capital partners'],
                            ['step' => '04', 'title' => 'Closing Guidance', 'desc' => 'Expert support through documentation and execution'],
                        ];
                        foreach ($steps as $index => $item):
                        ?>
                        <div data-animate="fade-up" data-animation-delay="<?= $index * 0.1 ?>">
                            <div class="relative flex items-start gap-8">
                                <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-accent to-royal-blue rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg z-10">
                                    <?= $view->escape($item['step']) ?>
                                </div>
                                <div class="flex-1 pt-2">
                                    <h3 class="text-2xl font-bold text-navy mb-2"><?= $view->escape($item['title']) ?></h3>
                                    <p class="text-muted-foreground leading-relaxed"><?= $view->escape($item['desc']) ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="relative py-24 overflow-hidden">
        <!-- Background Image -->
        <div
            class="absolute inset-0 bg-cover bg-center bg-fixed"
            style="background-image: url('<?= $view->asset('images/hotel-interior.jpg') ?>');"
        ></div>
        <!-- Blue Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-navy/95 to-royal-blue/90"></div>
        
        <div class="container mx-auto px-6 text-center relative z-10">
            <div data-animate="fade-up">
                <h2 class="text-5xl lg:text-6xl font-bold text-white mb-6">
                    Ready to Finance Your Hospitality Project?
                </h2>
                <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                    Let's discuss how our specialized hospitality financing expertise can bring your vision to life
                </p>
                <a 
                    href="<?= $view->url('/contact') ?>"
                    class="inline-block bg-luxury-red hover:bg-luxury-red/90 text-white font-semibold uppercase tracking-wider px-8 py-6 text-lg rounded-md transition-colors"
                >
                    Schedule a Consultation
                </a>
            </div>
        </div>
    </section>
</div>
