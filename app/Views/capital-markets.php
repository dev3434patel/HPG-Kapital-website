<div class="pt-16">
    <!-- Hero -->
    <section class="relative min-h-[60vh] flex items-center overflow-hidden">
        <div
            class="absolute inset-0 bg-cover bg-center bg-fixed"
            style="background-image: url('<?= $view->asset('images/meeting-room.jpg') ?>');"
        ></div>
        <div class="absolute inset-0 bg-gradient-to-r from-navy/95 to-royal-blue/90"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-3xl" data-animate="fade-up" data-hero-animation="true" style="opacity: 0; transform: translateY(50px);">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 px-4 sm:px-0">
                    Capital Markets Advisory
                </h1>
                <p class="text-lg sm:text-xl text-white/90 px-4 sm:px-0">Debt Solutions Engineered for Success</p>
            </div>
        </div>
    </section>

    <!-- Lender Network - 3x2 Grid -->
    <section class="py-24 bg-light-gray">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20" data-animate="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-navy mb-4 sm:mb-6">Our Lender Network</h2>
                <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                    Direct access to an extensive network of sophisticated capital providers
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $lenders = [
                    [
                        'title' => 'Private Funds',
                        'description' => 'Direct access to private equity and debt funds specializing in commercial real estate',
                        'icon' => 'trending-up'
                    ],
                    [
                        'title' => 'Portfolio Banks',
                        'description' => 'Regional and national banks with dedicated CRE lending platforms',
                        'icon' => 'building'
                    ],
                    [
                        'title' => 'Family Offices',
                        'description' => 'Sophisticated family office capital for strategic real estate investments',
                        'icon' => 'users'
                    ],
                    [
                        'title' => 'Insurance Companies',
                        'description' => 'Life insurance companies providing long-term, fixed-rate financing',
                        'icon' => 'line-chart'
                    ],
                    [
                        'title' => 'CMBS Providers',
                        'description' => 'Commercial mortgage-backed securities lenders for stabilized assets',
                        'icon' => 'building'
                    ],
                    [
                        'title' => 'Life Companies',
                        'description' => 'Life insurance companies offering competitive long-term debt solutions',
                        'icon' => 'trending-up'
                    ],
                ];
                
                $iconSvg = [
                    'trending-up' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>',
                    'building' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>',
                    'users' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>',
                    'line-chart' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>',
                ];
                
                foreach ($lenders as $index => $lender):
                ?>
                <div 
                    class="bg-card rounded-2xl p-8 shadow-lg border border-border/50 hover:shadow-xl transition-all h-full flex flex-col lender-card" 
                    data-animate="fade-up" 
                    data-animation-delay="<?= $index * 0.1 ?>"
                >
                    <div class="w-20 h-20 bg-gradient-to-br from-accent/20 to-royal-blue/20 rounded-2xl flex items-center justify-center text-royal-blue mb-6">
                        <?= $iconSvg[$lender['icon']] ?? '' ?>
                    </div>
                    <h3 class="text-2xl font-bold text-navy mb-4"><?= $view->escape($lender['title']) ?></h3>
                    <p class="text-muted-foreground leading-relaxed flex-grow">
                        <?= $view->escape($lender['description']) ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Market Insight -->
    <section class="py-24 bg-background">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-animate="fade-up">
                    <div class="space-y-6">
                        <div class="inline-flex items-center px-4 py-2 bg-accent/10 rounded-full">
                            <span class="text-sm font-semibold text-accent uppercase tracking-wider">Market Intelligence</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy">Real-Time Market Intelligence</h2>
                        <p class="text-lg text-muted-foreground leading-relaxed">
                            Our team maintains daily engagement with top-tier CRE lenders, providing us with real-time insight into market dynamics, lending appetite, and rate environments.
                        </p>
                        <div class="space-y-4 pt-4">
                            <?php
                            $insights = [
                                "Daily engagement with top-tier CRE lenders",
                                "Real-time insight into market dynamics and lending appetite",
                                "Anticipate market shifts and identify emerging opportunities",
                                "Engineer optimal capital solutions by understanding both sides"
                            ];
                            foreach ($insights as $insight):
                            ?>
                            <div class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-accent mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-muted-foreground"><?= $view->escape($insight) ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div data-animate="fade-up" data-animation-delay="0.2">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <img
                            src="<?= $view->asset('images/commercial-building.jpg') ?>"
                            alt="Market Analysis"
                            class="w-full h-[500px] object-cover"
                            loading="lazy"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Timeline -->
    <section class="py-24 bg-light-gray">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-animate="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy mb-4">Our Advisory Process</h2>
                <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                    A systematic approach to delivering optimal debt solutions
                </p>
            </div>

            <div class="max-w-5xl mx-auto">
                <div class="relative">
                    <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-gradient-to-b from-accent to-royal-blue hidden md:block"></div>
                    <div class="space-y-12">
                        <?php
                        $steps = [
                            ['step' => '01', 'title' => 'Project Assessment', 'desc' => 'Comprehensive analysis of your project, financial position, and strategic objectives to understand exactly what you need'],
                            ['step' => '02', 'title' => 'Capital Stack Engineering', 'desc' => 'Strategic structuring of your entire capital stack: debt positioning, tranching, and timing to optimize leverage and terms'],
                            ['step' => '03', 'title' => 'Lender Matching', 'desc' => 'Identifying and connecting you with the right capital partners based on asset class, deal size, and lender appetite'],
                            ['step' => '04', 'title' => 'Closing Guidance', 'desc' => 'Expert support through documentation, underwriting, and closing to ensure seamless execution'],
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
            style="background-image: url('<?= $view->asset('images/city-skyline.jpg') ?>');"
        ></div>
        <!-- Blue Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-navy/95 to-royal-blue/90"></div>
        
        <div class="container mx-auto px-6 text-center relative z-10">
            <div data-animate="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-white mb-4 sm:mb-6 px-4 sm:px-0">
                    Discuss Your Capital Strategy
                </h2>
                <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                    Let's explore how our capital markets expertise can optimize your next project
                </p>
                <a 
                    href="<?= $view->url('/contact') ?>"
                    class="inline-block bg-luxury-red hover:bg-luxury-red/90 text-white font-semibold uppercase tracking-wider px-8 py-6 text-lg rounded-md transition-colors"
                >
                    Contact Our Team
                </a>
            </div>
        </div>
    </section>
</div>
