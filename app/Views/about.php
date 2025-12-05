<div class="pt-16">
    <!-- Hero -->
    <section class="relative min-h-[60vh] flex items-center overflow-hidden">
        <div
            class="absolute inset-0 bg-cover bg-center bg-fixed"
            style="background-image: url('<?= $view->asset('images/commercial-building.jpg') ?>');"
        ></div>
        <div class="absolute inset-0 bg-gradient-to-r from-navy/95 to-royal-blue/90"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-3xl" data-animate="fade-up" data-hero-animation="true" style="opacity: 0; transform: translateY(50px);">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 px-4 sm:px-0">About HPG Kapital</h1>
                <p class="text-lg sm:text-xl text-white/90 px-4 sm:px-0">
                    Delivering precision-engineered capital solutions across the United States
                </p>
            </div>
        </div>
    </section>

    <!-- Company Overview -->
    <section class="py-12 sm:py-16 lg:py-24 bg-background">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-animate="fade-up">
                    <h2 class="text-3xl sm:text-4xl font-bold text-navy mb-4 sm:mb-6">Who We Are</h2>
                    <div class="space-y-4 text-lg text-muted-foreground leading-relaxed">
                        <p>
                            HPG Kapital is a commercial real estate capital advisory firm headquartered in Dunwoody, GA, serving clients across the United States. We specialize in structuring debt and EB-5 placement solutions tailored to the unique needs of property investors, developers, and owners.
                        </p>
                        <p>
                            With deep expertise in hospitality financing and a comprehensive understanding of the commercial real estate landscape, we provide strategic guidance that maximizes value while minimizing complexity.
                        </p>
                        <p>
                            Our approach combines precision capital stack engineering with an extensive network of top-tier lenders, enabling us to deliver optimal financing solutions for projects of all sizes and asset classes.
                        </p>
                    </div>
                </div>

                <div data-animate="fade-up" data-animation-delay="0.2">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <img
                            src="<?= $view->asset('images/meeting-room.jpg') ?>"
                            alt="HPG Kapital Team"
                            class="w-full h-[500px] object-cover"
                            loading="lazy"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Philosophy -->
    <section class="py-12 sm:py-16 lg:py-24 bg-light-gray">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="grid md:grid-cols-2 gap-12">
                <div class="bg-card rounded-2xl p-10 shadow-xl border border-border/50 h-full" data-animate="fade-up">
                    <svg class="w-12 h-12 text-royal-blue mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-3xl font-bold text-navy mb-4">Our Mission</h3>
                    <p class="text-lg text-muted-foreground leading-relaxed">
                        To empower real estate investors and developers with strategic capital solutions that fuel growth, optimize returns, and transform visions into reality through expert guidance and trusted partnerships.
                    </p>
                </div>

                <div class="bg-card rounded-2xl p-10 shadow-xl border border-border/50 h-full" data-animate="fade-up" data-animation-delay="0.1">
                    <svg class="w-12 h-12 text-royal-blue mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                    <h3 class="text-3xl font-bold text-navy mb-4">Our Philosophy</h3>
                    <ul class="space-y-3 text-lg text-muted-foreground">
                        <li class="flex items-start">
                            <span class="mr-2 text-accent">•</span>
                            <span><strong class="text-navy">Precision:</strong> Every detail matters in capital structuring</span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2 text-accent">•</span>
                            <span><strong class="text-navy">Sponsor Aligned:</strong> Your success is our success</span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2 text-accent">•</span>
                            <span><strong class="text-navy">Value Maximizing:</strong> Optimizing returns at every stage</span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2 text-accent">•</span>
                            <span><strong class="text-navy">Transparent Engagement:</strong> Clear communication throughout</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Edge -->
    <section class="py-12 sm:py-16 lg:py-24 bg-background">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="text-center mb-16" data-animate="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy mb-4">The HPG Advantage</h2>
                <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                    What sets us apart in the competitive landscape of commercial real estate financing
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                $advantages = [
                    [
                        'title' => 'Deep Lender Network',
                        'description' => 'Direct relationships with top-tier CRE lenders, private funds, and institutional capital providers',
                        'image' => 'meeting-room.jpg',
                        'icon' => 'users'
                    ],
                    [
                        'title' => 'Market Intelligence',
                        'description' => 'Real-time insight into market dynamics and lending appetite across all asset classes',
                        'image' => 'commercial-building.jpg',
                        'icon' => 'building'
                    ],
                    [
                        'title' => 'Capital Engineering',
                        'description' => 'Sophisticated structuring expertise that optimizes your entire capital stack',
                        'image' => 'meeting-room.jpg',
                        'icon' => 'target'
                    ],
                    [
                        'title' => 'Hospitality Focus',
                        'description' => 'Specialized knowledge of hospitality financing and operational considerations',
                        'image' => 'commercial-building.jpg',
                        'icon' => 'award'
                    ],
                ];
                
                $advantageIcons = [
                    'users' => '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>',
                    'building' => '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>',
                    'target' => '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                    'award' => '<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>',
                ];
                
                foreach ($advantages as $index => $item):
                ?>
                <div 
                    class="bg-card rounded-2xl overflow-hidden shadow-lg border border-border/50 hover:shadow-xl transition-all h-full lender-card" 
                    data-animate="fade-up" 
                    data-animation-delay="<?= $index * 0.1 ?>"
                >
                    <div class="h-40 overflow-hidden">
                        <img 
                            src="<?= $view->asset('images/' . $item['image']) ?>" 
                            alt="<?= $view->escape($item['title']) ?>" 
                            class="w-full h-full object-cover transition-transform duration-500"
                            loading="lazy"
                        />
                    </div>
                    <div class="p-6">
                        <div class="text-royal-blue mb-4"><?= $advantageIcons[$item['icon']] ?? '' ?></div>
                        <h3 class="text-xl font-bold text-navy mb-3"><?= $view->escape($item['title']) ?></h3>
                        <p class="text-muted-foreground"><?= $view->escape($item['description']) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Leadership -->
    <section class="py-12 sm:py-16 lg:py-24 bg-light-gray">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="text-center mb-16" data-animate="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy mb-4">Leadership Team</h2>
                <p class="text-xl text-muted-foreground">
                    Experienced professionals dedicated to your success
                </p>
            </div>

            <div class="flex justify-center max-w-4xl mx-auto">
                <div class="bg-card rounded-2xl p-12 shadow-xl border border-border/50" data-animate="fade-up" data-animation-delay="0.1">
                    <div class="text-center mb-8">
                        <h3 class="text-3xl font-bold text-navy mb-3">Paresh Govan</h3>
                        <p class="text-xl text-royal-blue font-semibold">President</p>
                    </div>
                    
                    <div class="space-y-4 pt-6 border-t border-border/50">
                        <div class="flex items-center justify-center gap-4">
                            <svg class="w-5 h-5 text-royal-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <a href="tel:404-434-4932" class="text-lg text-navy hover:text-royal-blue transition-colors font-medium">
                                404-434-4932
                            </a>
                        </div>
                        <div class="flex items-center justify-center gap-4">
                            <svg class="w-5 h-5 text-royal-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <a href="mailto:kiwi@hpg-kapital.com" class="text-lg text-navy hover:text-royal-blue transition-colors font-medium">
                                kiwi@hpg-kapital.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

