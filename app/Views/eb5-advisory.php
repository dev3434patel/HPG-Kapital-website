<div class="pt-16">
    <!-- Hero -->
    <section class="relative min-h-[60vh] flex items-center overflow-hidden">
        <div
            class="absolute inset-0 bg-cover bg-center bg-fixed"
            style="background-image: url('<?= $view->asset('images/global-network.jpg') ?>');"
        ></div>
        <div class="absolute inset-0 bg-gradient-to-r from-navy/95 to-royal-blue/90"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-3xl" data-animate="fade-up" data-hero-animation="true" style="opacity: 0; transform: translateY(50px);">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 px-4 sm:px-0">EB-5 Advisory Services</h1>
                <p class="text-lg sm:text-xl text-white/90 px-4 sm:px-0">
                    Strategic guidance for projects seeking foreign direct investment through the EB-5 program
                </p>
            </div>
        </div>
    </section>

    <!-- What We Do -->
    <section class="py-24 bg-background">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-animate="fade-up">
                    <div class="space-y-6">
                        <div class="inline-flex items-center px-4 py-2 bg-accent/10 rounded-full">
                            <span class="text-sm font-semibold text-accent uppercase tracking-wider">EB-5 Expertise</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy">EB-5 Expertise</h2>
                        <p class="text-lg text-muted-foreground leading-relaxed">
                            HPG Kapital proudly serves as an EB-5 advisor to two regional centers, providing strategic counsel on capital formation and compliance for projects seeking foreign direct investment.
                        </p>
                        <div class="space-y-4 pt-4">
                            <?php
                            $expertise = [
                                "Strategic counsel on capital formation and compliance",
                                "Deep understanding of EB-5 regulations and CRE financing",
                                "Structure compliant, attractive offerings that raise capital",
                                "Maintain project economics while meeting EB-5 requirements"
                            ];
                            foreach ($expertise as $item):
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
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <img
                            src="<?= $view->asset('images/commercial-building.jpg') ?>"
                            alt="EB-5 Projects"
                            class="w-full h-[500px] object-cover"
                            loading="lazy"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Benefits - 3x2 Grid -->
    <section class="py-24 bg-light-gray">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20" data-animate="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-navy mb-4 sm:mb-6">Why Consider EB-5 Capital?</h2>
                <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                    Unique advantages of EB-5 financing for qualifying projects
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $benefits = [
                    ['title' => 'Below-Market Rates', 'description' => 'Access capital at rates significantly lower than conventional debt', 'icon' => 'trending-up'],
                    ['title' => 'Flexible Terms', 'description' => 'Longer maturities and interest-only periods compared to traditional loans', 'icon' => 'globe'],
                    ['title' => 'Job Creation Credit', 'description' => 'Fulfills EB-5 requirements while supporting local economic development', 'icon' => 'users'],
                    ['title' => 'Non-Recourse Structure', 'description' => 'Typically structured without personal guarantees or sponsor recourse', 'icon' => 'shield'],
                    ['title' => 'Subordinate Position', 'description' => 'Can sit junior to senior debt, improving overall project leverage', 'icon' => 'file-check'],
                    ['title' => 'Strategic Capital', 'description' => 'Fills equity gaps and enhances returns to project sponsors', 'icon' => 'trending-up'],
                ];
                
                $iconSvg = [
                    'trending-up' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>',
                    'globe' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                    'users' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>',
                    'shield' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>',
                    'file-check' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>',
                ];
                
                foreach ($benefits as $index => $benefit):
                ?>
                <div 
                    class="bg-card rounded-2xl p-8 shadow-lg border border-border/50 hover:shadow-xl transition-all h-full flex flex-col lender-card" 
                    data-animate="fade-up" 
                    data-animation-delay="<?= $index * 0.1 ?>"
                >
                    <div class="w-20 h-20 bg-gradient-to-br from-accent/20 to-royal-blue/20 rounded-2xl flex items-center justify-center text-royal-blue mb-6">
                        <?= $iconSvg[$benefit['icon']] ?? '' ?>
                    </div>
                    <h3 class="text-2xl font-bold text-navy mb-4"><?= $view->escape($benefit['title']) ?></h3>
                    <p class="text-muted-foreground leading-relaxed flex-grow">
                        <?= $view->escape($benefit['description']) ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Process Timeline -->
    <section class="py-24 bg-background">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-animate="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy mb-4">Our EB-5 Process</h2>
                <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                    Navigating EB-5 compliance and capital formation with expert guidance
                </p>
            </div>

            <div class="max-w-5xl mx-auto">
                <div class="relative">
                    <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-gradient-to-b from-accent to-royal-blue hidden md:block"></div>
                    <div class="space-y-12">
                        <?php
                        $steps = [
                            ['step' => '01', 'title' => 'Project Evaluation', 'desc' => 'Assess EB-5 suitability and job creation potential'],
                            ['step' => '02', 'title' => 'Structuring', 'desc' => 'Design compliant capital structure and investor terms'],
                            ['step' => '03', 'title' => 'Capital Sourcing', 'desc' => 'Connect with regional centers and investor networks'],
                            ['step' => '04', 'title' => 'USCIS Documentation', 'desc' => 'Support preparation of required immigration filings'],
                            ['step' => '05', 'title' => 'Monitoring', 'desc' => 'Ongoing compliance tracking and investor relations'],
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

    <!-- Why HPG -->
    <section class="py-24 bg-light-gray">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-animate="fade-up">
                    <div class="space-y-6">
                        <div class="inline-flex items-center px-4 py-2 bg-accent/10 rounded-full">
                            <span class="text-sm font-semibold text-accent uppercase tracking-wider">Why HPG for EB-5</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy">Why Choose HPG for EB-5?</h2>
                        <p class="text-lg text-muted-foreground leading-relaxed">
                            Our unique combination of EB-5 expertise and commercial real estate financing knowledge delivers optimal outcomes.
                        </p>
                        <div class="space-y-4 pt-4">
                            <?php
                            $whyHpg = [
                                "Direct advisor to two USCIS-designated regional centers",
                                "Unique ability to integrate EB-5 capital with conventional debt",
                                "End-to-end guidance from evaluation through monitoring"
                            ];
                            foreach ($whyHpg as $item):
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
                            ['title' => 'Regional Centers', 'desc' => 'Direct advisor to two USCIS-designated centers'],
                            ['title' => 'CRE Expertise', 'desc' => 'Integrate EB-5 with conventional debt'],
                            ['title' => 'Comprehensive Support', 'desc' => 'End-to-end guidance and monitoring'],
                            ['title' => 'Proven Track Record', 'desc' => 'Successful capital formation and compliance'],
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

    <!-- CTA -->
    <section class="relative py-24 overflow-hidden">
        <!-- Background Image -->
        <div
            class="absolute inset-0 bg-cover bg-center bg-fixed"
            style="background-image: url('<?= $view->asset('images/global-network.jpg') ?>');"
        ></div>
        <!-- Blue Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-navy/95 to-royal-blue/90"></div>
        
        <div class="container mx-auto px-6 text-center relative z-10">
            <div data-animate="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-white mb-4 sm:mb-6 px-4 sm:px-0">
                    Start an EB-5 Conversation
                </h2>
                <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                    Explore whether EB-5 capital could enhance your project's financing strategy
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
