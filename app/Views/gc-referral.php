<div class="pt-16">
    <!-- Hero -->
    <section class="relative min-h-[60vh] flex items-center overflow-hidden">
        <div
            class="absolute inset-0 bg-cover bg-center bg-fixed"
            style="background-image: url('<?= $view->asset('images/construction.jpg') ?>');"
        ></div>
        <div class="absolute inset-0 bg-gradient-to-r from-navy/95 to-royal-blue/90"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-3xl" data-animate="fade-up" data-hero-animation="true" style="opacity: 0; transform: translateY(50px);">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 px-4 sm:px-0">
                    Preferred General Contractor Referrals
                </h1>
                <p class="text-lg sm:text-xl text-white/90 px-4 sm:px-0">
                    Trusted construction partners for ground-up and renovation projects
                </p>
            </div>
        </div>
    </section>

    <!-- Why GC Referrals Matter -->
    <section class="py-24 bg-background">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-animate="fade-up">
                    <h2 class="text-3xl sm:text-4xl font-bold text-navy mb-4 sm:mb-6">
                        Why General Contractor Selection Matters
                    </h2>
                    <div class="space-y-4 text-lg text-muted-foreground leading-relaxed">
                        <p>
                            HPG Kapital also refers our clients with preferred general contractors for ground-up or renovation projects. The right GC can make the difference between a project that stays on budget and on schedule and one that doesn't.
                        </p>
                        <p>
                            We've cultivated relationships with experienced, reliable general contractors who understand the unique requirements of hospitality and commercial real estate construction. These partners bring proven track records, transparent pricing, and commitment to quality.
                        </p>
                        <p>
                            Our referral process is simple: we'll match your project with GCs who have relevant experience, competitive pricing, and the capacity to deliver on time.
                        </p>
                    </div>
                </div>

                <div data-animate="fade-up" data-animation-delay="0.2">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <img
                            src="<?= $view->asset('images/commercial-building.jpg') ?>"
                            alt="Construction Project"
                            class="w-full h-[500px] object-cover"
                            loading="lazy"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Types -->
    <section class="py-24 bg-light-gray">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-animate="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy mb-4">Project Types We Support</h2>
                <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                    Our GC network specializes in hospitality and commercial real estate construction
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div data-animate="fade-up" data-animation-delay="0.1">
                    <div class="bg-card rounded-2xl p-8 shadow-lg border border-border/50 hover:shadow-xl transition-all text-center h-full lender-card">
                        <svg class="w-16 h-16 text-royal-blue mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <h3 class="text-2xl font-bold text-navy mb-4">Ground-Up Construction</h3>
                        <p class="text-muted-foreground leading-relaxed">
                            New hotel and commercial developments from foundation to certificate of occupancy. Full-service GCs with hospitality expertise.
                        </p>
                    </div>
                </div>

                <div data-animate="fade-up" data-animation-delay="0.2">
                    <div class="bg-card rounded-2xl p-8 shadow-lg border border-border/50 hover:shadow-xl transition-all text-center h-full lender-card">
                        <svg class="w-16 h-16 text-royal-blue mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-2xl font-bold text-navy mb-4">Renovation</h3>
                        <p class="text-muted-foreground leading-relaxed">
                            Property improvements, brand conversions, and modernization projects. Experienced with occupied property logistics and phasing.
                        </p>
                    </div>
                </div>

                <div data-animate="fade-up" data-animation-delay="0.3">
                    <div class="bg-card rounded-2xl p-8 shadow-lg border border-border/50 hover:shadow-xl transition-all text-center h-full lender-card">
                        <svg class="w-16 h-16 text-royal-blue mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <h3 class="text-2xl font-bold text-navy mb-4">Repositioning</h3>
                        <p class="text-muted-foreground leading-relaxed">
                            Substantial property transformations including repositioning, adaptive reuse, and comprehensive upgrades to enhance value.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process -->
    <section class="py-24 bg-background">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-animate="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy mb-4">Our Referral Process</h2>
                <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                    Simple, straightforward connections to qualified construction partners
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-12 max-w-5xl mx-auto">
                <div data-animate="fade-up" data-animation-delay="0.1">
                    <div class="text-center">
                        <div class="w-20 h-20 rounded-full bg-accent/10 flex items-center justify-center mx-auto mb-6">
                            <span class="text-3xl font-bold text-accent">01</span>
                        </div>
                        <h3 class="text-xl font-bold text-navy mb-3">Share Your Project</h3>
                        <p class="text-muted-foreground">
                            Tell us about your construction needs, timeline, and project scope
                        </p>
                    </div>
                </div>

                <div data-animate="fade-up" data-animation-delay="0.2">
                    <div class="text-center">
                        <div class="w-20 h-20 rounded-full bg-accent/10 flex items-center justify-center mx-auto mb-6">
                            <span class="text-3xl font-bold text-accent">02</span>
                        </div>
                        <h3 class="text-xl font-bold text-navy mb-3">Match GC Partners</h3>
                        <p class="text-muted-foreground">
                            We identify general contractors with relevant experience and capacity
                        </p>
                    </div>
                </div>

                <div data-animate="fade-up" data-animation-delay="0.3">
                    <div class="text-center">
                        <div class="w-20 h-20 rounded-full bg-accent/10 flex items-center justify-center mx-auto mb-6">
                            <span class="text-3xl font-bold text-accent">03</span>
                        </div>
                        <h3 class="text-xl font-bold text-navy mb-3">Facilitate Introduction</h3>
                        <p class="text-muted-foreground">
                            We make the connection and you take it from there
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits -->
    <section class="py-24 bg-light-gray">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12" data-animate="fade-up">
                    <h2 class="text-4xl font-bold text-navy mb-4">Benefits of Our GC Network</h2>
                </div>

                <div class="space-y-6">
                    <?php
                    $benefits = [
                        ['title' => 'Proven Track Records', 'description' => 'All referred GCs have demonstrated success with similar projects and asset classes', 'icon' => 'clipboard-check'],
                        ['title' => 'Hospitality Expertise', 'description' => 'Specialized knowledge of hotel construction, FF&E coordination, and brand standards', 'icon' => 'user-check'],
                        ['title' => 'Transparent Pricing', 'description' => 'Competitive pricing structures with clear documentation and no surprises', 'icon' => 'check-circle'],
                        ['title' => 'Reliable Execution', 'description' => 'Commitment to schedule adherence, quality standards, and proactive communication', 'icon' => 'building'],
                    ];
                    
                    $benefitIcons = [
                        'clipboard-check' => '<svg class="w-12 h-12 text-royal-blue flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>',
                        'user-check' => '<svg class="w-12 h-12 text-royal-blue flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                        'check-circle' => '<svg class="w-12 h-12 text-royal-blue flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                        'building' => '<svg class="w-12 h-12 text-royal-blue flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>',
                    ];
                    
                    foreach ($benefits as $index => $benefit):
                    ?>
                    <div data-animate="fade-up" data-animation-delay="<?= ($index + 1) * 0.1 ?>">
                        <div class="bg-card rounded-2xl p-8 shadow-lg border border-border/50 flex items-start space-x-6">
                            <?= $benefitIcons[$benefit['icon']] ?? '' ?>
                            <div>
                                <h3 class="text-xl font-bold text-navy mb-2"><?= $view->escape($benefit['title']) ?></h3>
                                <p class="text-muted-foreground">
                                    <?= $view->escape($benefit['description']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="relative py-24 overflow-hidden">
        <!-- Background Image -->
        <div
            class="absolute inset-0 bg-cover bg-center bg-fixed"
            style="background-image: url('<?= $view->asset('images/construction.jpg') ?>');"
        ></div>
        <!-- Blue Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-navy/95 to-royal-blue/90"></div>
        
        <div class="container mx-auto px-6 text-center relative z-10">
            <div data-animate="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-white mb-4 sm:mb-6 px-4 sm:px-0">
                    Request a GC Introduction
                </h2>
                <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                    Connect with our trusted general contractor partners for your next project
                </p>
                <a 
                    href="<?= $view->url('/contact') ?>"
                    class="inline-block bg-luxury-red hover:bg-luxury-red/90 text-white font-semibold uppercase tracking-wider px-8 py-6 text-lg rounded-md transition-colors"
                >
                    Get Started
                </a>
            </div>
        </div>
    </section>
</div>
