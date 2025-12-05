<div class="pt-16">
    <!-- Hero Section with Smooth Parallax -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden" id="hero-section">
        <!-- Parallax Background Image -->
        <div
            class="absolute inset-0 bg-cover bg-center bg-no-repeat hero-parallax"
            style="background-image: url('<?= $view->asset('images/hero-hotel.jpg') ?>');"
        ></div>
        
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-navy/95 via-royal-blue/90 to-navy/95 z-0"></div>
        
        <div class="container mx-auto px-6 relative z-10 text-center">
            <div class="max-w-6xl mx-auto" data-animate="fade-up" data-animation-delay="0" data-hero-animation="true" style="opacity: 0; transform: translateY(50px);">
                <h1 class="text-4xl sm:text-5xl lg:text-7xl font-bold text-white mb-4 sm:mb-6 leading-tight px-4 sm:px-0">
                    Hospitality Finance,<br>
                    Engineered for Growth
                </h1>
                <p class="text-lg sm:text-xl lg:text-2xl text-white/90 mb-6 sm:mb-10 leading-relaxed max-w-5xl mx-auto px-4 sm:px-0">
                    At HPG Kapital, we specialize in hospitality financing,<br>
                    delivering customized capital solutions that fuel your vision from concept to completion.
                </p>
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center px-4 sm:px-0">
                    <a 
                        href="<?= $view->url('/hospitality-financing') ?>"
                        class="bg-luxury-red hover:bg-luxury-red/90 text-white font-semibold uppercase tracking-wider text-sm px-6 sm:px-8 py-5 sm:py-6 min-h-[44px] touch-target w-full sm:w-auto rounded-md transition-colors inline-block text-center"
                    >
                        Explore Hospitality Financing
                    </a>
                    <a 
                        href="<?= $view->url('/contact') ?>"
                        class="bg-white text-navy hover:bg-white/90 font-semibold uppercase tracking-wider text-sm px-6 sm:px-8 py-5 sm:py-6 min-h-[44px] touch-target w-full sm:w-auto rounded-md transition-colors inline-block text-center"
                    >
                        Talk to Our Team
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Hospitality Financing Solutions -->
    <section class="py-12 sm:py-16 lg:py-24 bg-light-gray">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="text-center mb-12 sm:mb-16" data-animate="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy mb-4">
                    Our Hospitality Financing Solutions
                </h2>
                <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                    Comprehensive capital solutions designed specifically for the hospitality industry
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                $services = [
                    [
                        'title' => 'CMBS Loans',
                        'description' => 'Long-term, fixed-rate financing for stabilized hospitality assets.',
                        'image' => 'commercial-building.jpg',
                        'icon' => 'building'
                    ],
                    [
                        'title' => 'Ground-Up Development',
                        'description' => 'Capital for new hotel construction and expansion.',
                        'image' => 'construction.jpg',
                        'icon' => 'trending-up'
                    ],
                    [
                        'title' => 'Bridge Loans',
                        'description' => 'Short-term, flexible funding to bridge gaps or reposition assets.',
                        'image' => 'meeting-room.jpg',
                        'icon' => 'zap'
                    ],
                    [
                        'title' => 'Soft & Hard Debt',
                        'description' => 'Structured to match your project\'s risk profile and timeline.',
                        'image' => 'hotel-interior.jpg',
                        'icon' => 'dollar-sign'
                    ],
                    [
                        'title' => 'SBA Loans',
                        'description' => 'Government-backed financing for qualified hospitality ventures.',
                        'image' => 'commercial-building.jpg',
                        'icon' => 'file-check'
                    ],
                    [
                        'title' => 'PACE Financing',
                        'description' => 'Energy-efficient funding that enhances sustainability and ROI.',
                        'image' => 'hotel-interior.jpg',
                        'icon' => 'leaf'
                    ],
                ];

                foreach ($services as $index => $service):
                ?>
                <div 
                    class="bg-card rounded-2xl overflow-hidden shadow-lg border border-border/50 hover:shadow-xl transition-all duration-300 service-card" 
                    data-animate="fade-up" 
                    data-animation-delay="<?= $index * 0.1 ?>"
                >
                    <div class="relative h-48 overflow-hidden">
                        <img 
                            src="<?= $view->asset('images/' . $service['image']) ?>" 
                            alt="<?= $view->escape($service['title']) ?>"
                            class="w-full h-full object-cover transition-transform duration-500"
                            loading="lazy"
                        />
                        <div class="absolute top-4 right-4 w-12 h-12 bg-background/90 backdrop-blur-sm rounded-xl flex items-center justify-center text-primary">
                            <?php
                            $iconSvg = [
                                'building' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>',
                                'trending-up' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>',
                                'zap' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>',
                                'dollar-sign' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                                'file-check' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
                                'leaf' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>',
                            ];
                            echo $iconSvg[$service['icon']] ?? '';
                            ?>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-navy mb-3"><?= $view->escape($service['title']) ?></h3>
                        <p class="text-muted-foreground leading-relaxed"><?= $view->escape($service['description']) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Why HPG Kapital -->
    <section class="py-12 sm:py-16 lg:py-24 bg-background">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16 items-center">
                <div data-animate="fade-up">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy mb-4 sm:mb-6">
                        Why HPG Kapital?
                    </h2>
                    <p class="text-lg text-muted-foreground leading-relaxed mb-8">
                        We understand that hospitality financing requires specialized expertise and deep market knowledge. Our team brings decades of combined experience to help you navigate complex capital structures.
                    </p>
                </div>

                <div class="space-y-6">
                    <?php
                    $advantages = [
                        ['title' => 'Tailored Loan Structures', 'description' => 'Built around your unique goals and project requirements'],
                        ['title' => 'Trusted Relationships', 'description' => 'Direct access to top-tier debt providers and lenders'],
                        ['title' => 'Hospitality-First Expertise', 'description' => 'Deep understanding of operational needs and industry dynamics'],
                    ];
                    foreach ($advantages as $index => $advantage):
                    ?>
                    <div class="bg-card rounded-2xl p-8 shadow-lg border border-border/50 hover:shadow-xl transition-shadow" data-animate="fade-up" data-animation-delay="<?= ($index + 1) * 0.1 ?>">
                        <h3 class="text-xl font-bold text-royal-blue mb-3"><?= $view->escape($advantage['title']) ?></h3>
                        <p class="text-muted-foreground"><?= $view->escape($advantage['description']) ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Broader Services -->
    <section class="py-12 sm:py-16 lg:py-24 bg-light-gray">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="text-center mb-16 animate-fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy mb-4">
                    Comprehensive Capital Solutions
                </h2>
                <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                    Beyond hospitality, we offer a full suite of commercial real estate financing services
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                $broaderServices = [
                    ['title' => 'Capital Markets Advisory', 'description' => 'Deep network of private funds, portfolio banks, CMBS providers, family offices & insurance companies.', 'image' => 'meeting-room.jpg', 'link' => '/capital-markets'],
                    ['title' => 'EB-5 Advisory', 'description' => 'HPG Kapital proudly serves as an EB-5 advisor to two regional centers.', 'image' => 'global-network.jpg', 'link' => '/eb5-advisory'],
                    ['title' => 'Loan Products', 'description' => 'From CMBS to Construction to SBA loans, structured for maximum flexibility.', 'image' => 'commercial-building.jpg', 'link' => '/loan-products'],
                    ['title' => 'Preferred GC Referral', 'description' => 'We recommend trusted general contractors for ground-up and renovation projects.', 'image' => 'construction.jpg', 'link' => '/gc-referral'],
                ];
                foreach ($broaderServices as $index => $service):
                ?>
                <div class="bg-card rounded-2xl p-8 shadow-lg border border-border/50 hover:shadow-xl transition-all hover:-translate-y-2" data-animate="fade-up" data-animation-delay="<?= $index * 0.1 ?>">
                    <div class="w-full h-40 mb-6 rounded-xl overflow-hidden">
                        <img src="<?= $view->asset('images/' . $service['image']) ?>" alt="<?= $view->escape($service['title']) ?>" class="w-full h-full object-cover" loading="lazy" />
                    </div>
                    <h3 class="text-xl font-bold text-navy mb-3"><?= $view->escape($service['title']) ?></h3>
                    <p class="text-muted-foreground mb-4"><?= $view->escape($service['description']) ?></p>
                    <a href="<?= $view->url($service['link']) ?>" class="text-royal-blue font-semibold hover:text-accent transition-colors">
                        Learn More →
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- How We Work -->
    <section class="py-12 sm:py-16 lg:py-24 bg-background">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="text-center mb-16 animate-fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy mb-4">
                    How We Work
                </h2>
                <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                    A proven process designed to deliver optimal financing solutions
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                $steps = [
                    ['step' => '01', 'title' => 'Project Assessment', 'description' => 'Comprehensive analysis of your project needs and financial goals'],
                    ['step' => '02', 'title' => 'Capital Stack Engineering', 'description' => 'Strategic structuring to optimize your financing mix'],
                    ['step' => '03', 'title' => 'Lender Matching', 'description' => 'Connecting you with the right capital partners'],
                    ['step' => '04', 'title' => 'Closing Guidance', 'description' => 'Expert support through documentation and execution'],
                ];
                foreach ($steps as $index => $step):
                ?>
                <div class="text-center" data-animate="fade-up" data-animation-delay="<?= $index * 0.1 ?>">
                    <div class="text-6xl font-bold text-accent/20 mb-4"><?= $view->escape($step['step']) ?></div>
                    <h3 class="text-xl font-bold text-navy mb-3"><?= $view->escape($step['title']) ?></h3>
                    <p class="text-muted-foreground"><?= $view->escape($step['description']) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA Band -->
    <section 
        class="relative py-16 sm:py-24 lg:py-32 overflow-hidden"
        style="background-image: url('<?= $view->asset('images/city-skyline.jpg') ?>'); background-size: cover; background-position: center; background-attachment: fixed; background-repeat: no-repeat;"
    >
        <div class="absolute inset-0 bg-navy/90 z-0"></div>
        
        <div class="container mx-auto px-6 relative z-10 text-center">
            <div class="animate-fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4 sm:mb-6 px-4 sm:px-0">
                    Let's Build Something Exceptional
                </h2>
                <p class="text-lg sm:text-xl text-white/90 mb-6 sm:mb-8 max-w-2xl mx-auto px-4 sm:px-0">
                    Navigating hospitality finance doesn't have to be complex.
                </p>
                <a 
                    href="<?= $view->url('/contact') ?>"
                    class="inline-block bg-luxury-red hover:bg-luxury-red/90 text-white font-semibold uppercase tracking-wider min-h-[44px] touch-target px-6 sm:px-8 py-5 sm:py-6 rounded-md transition-colors"
                >
                    Schedule a Consultation
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Form & Info -->
    <section class="py-12 sm:py-16 lg:py-24 bg-background">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="text-center mb-16 animate-fade-up">
                <h2 class="text-4xl font-bold text-navy mb-4">Get in Touch</h2>
                <p class="text-xl text-muted-foreground">Our team is ready to discuss your project</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16">
                <!-- Form -->
                <div data-animate="fade-up">
                    <div class="bg-card rounded-2xl p-6 sm:p-8 lg:p-10 shadow-xl border border-border/50">
                        <h2 class="text-2xl sm:text-3xl font-bold text-navy mb-4 sm:mb-6">Send Us a Message</h2>
                        <form action="<?= $view->url('/contact') ?>" method="POST" class="space-y-6" novalidate>
                            <input type="hidden" name="csrf_token" value="<?= $view->escape($csrfToken ?? '') ?>">
                            
                            <div>
                                <label for="name" class="block text-sm font-semibold text-navy mb-2">
                                    Name *
                                </label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    required
                                    placeholder="Your full name"
                                    maxlength="100"
                                    class="w-full px-4 py-3 border border-border rounded-md focus:outline-none focus:ring-2 focus:ring-royal-blue <?= isset($errors['name']) ? 'border-destructive' : '' ?>"
                                    value="<?= isset($formData['name']) ? $view->escape($formData['name']) : '' ?>"
                                >
                                <?php if (isset($errors['name'])): ?>
                                    <p class="text-sm text-destructive mt-1" role="alert"><?= $view->escape($errors['name']) ?></p>
                                <?php endif; ?>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-semibold text-navy mb-2">
                                    Email *
                                </label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    required
                                    placeholder="your@email.com"
                                    maxlength="255"
                                    class="w-full px-4 py-3 border border-border rounded-md focus:outline-none focus:ring-2 focus:ring-royal-blue <?= isset($errors['email']) ? 'border-destructive' : '' ?>"
                                    value="<?= isset($formData['email']) ? $view->escape($formData['email']) : '' ?>"
                                >
                                <?php if (isset($errors['email'])): ?>
                                    <p class="text-sm text-destructive mt-1" role="alert"><?= $view->escape($errors['email']) ?></p>
                                <?php endif; ?>
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-semibold text-navy mb-2">
                                    Phone
                                </label>
                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    placeholder="(555) 123-4567"
                                    maxlength="20"
                                    class="w-full px-4 py-3 border border-border rounded-md focus:outline-none focus:ring-2 focus:ring-royal-blue"
                                    value="<?= isset($formData['phone']) ? $view->escape($formData['phone']) : '' ?>"
                                >
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-semibold text-navy mb-2">
                                    Message *
                                </label>
                                <textarea
                                    id="message"
                                    name="message"
                                    required
                                    rows="5"
                                    maxlength="5000"
                                    placeholder="Tell us about your project..."
                                    class="w-full px-4 py-3 border border-border rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-royal-blue <?= isset($errors['message']) ? 'border-destructive' : '' ?>"
                                ><?= isset($formData['message']) ? $view->escape($formData['message']) : '' ?></textarea>
                                <?php if (isset($errors['message'])): ?>
                                    <p class="text-sm text-destructive mt-1" role="alert"><?= $view->escape($errors['message']) ?></p>
                                <?php endif; ?>
                                <p class="text-xs text-muted-foreground mt-1">
                                    <span id="message-count">0</span>/5000 characters
                                </p>
                            </div>

                            <button
                                type="submit"
                                class="w-full bg-luxury-red hover:bg-luxury-red/90 text-white font-semibold uppercase tracking-wider min-h-[44px] touch-target px-6 sm:px-8 py-5 sm:py-6 rounded-md transition-colors"
                            >
                                Submit Inquiry
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8" data-animate="fade-up" data-animation-delay="0.2">
                    <div>
                        <h2 class="text-3xl font-bold text-navy mb-6">Direct Contacts</h2>
                        <p class="text-lg text-muted-foreground mb-8">
                            Reach out directly to our principals for immediate assistance
                        </p>
                    </div>

                    <!-- Paresh Govan -->
                    <div class="bg-card rounded-2xl p-8 shadow-lg border border-border/50">
                        <h3 class="text-2xl font-bold text-navy mb-2">Paresh Govan</h3>
                        <p class="text-lg text-royal-blue font-semibold mb-4">President</p>
                        <div class="space-y-3">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <a href="tel:404-434-4932" class="text-muted-foreground hover:text-accent transition-colors">
                                    404-434-4932
                                </a>
                            </div>
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <a href="mailto:kiwi@hpg-kapital.com" class="text-muted-foreground hover:text-accent transition-colors">
                                    kiwi@hpg-kapital.com
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Office Location -->
                    <div class="bg-card rounded-2xl p-8 shadow-lg border border-border/50">
                        <h3 class="text-2xl font-bold text-navy mb-4">Office Location</h3>
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-accent mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div class="text-muted-foreground">
                                <a
                                    href="https://www.google.com/maps/search/?api=1&query=1651+Mt.+Vernon+Road,+3rd+Floor,+Dunwoody,+GA+30338"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="block hover:text-accent transition-colors"
                                >
                                    <p class="font-semibold text-navy">1651 Mt. Vernon Road, 3rd Floor</p>
                                    <p class="font-semibold text-navy">Dunwoody, GA 30338</p>
                                </a>
                                <p class="text-sm mt-2">Serving clients across the United States</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

