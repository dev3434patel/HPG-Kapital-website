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
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 px-4 sm:px-0">Commercial Loan Products</h1>
                <p class="text-lg sm:text-xl text-white/90 px-4 sm:px-0">
                    Comprehensive financing solutions structured for maximum flexibility
                </p>
            </div>
        </div>
    </section>

    <!-- CMBS Loans -->
    <section class="py-24 bg-background">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-animate="fade-up">
                    <div class="space-y-6">
                        <div class="inline-flex items-center px-4 py-2 bg-accent/10 rounded-full">
                            <svg class="w-5 h-5 text-accent mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <span class="text-sm font-semibold text-accent uppercase tracking-wider">CMBS Loans</span>
                        </div>
                        
                        <h2 class="text-4xl font-bold text-navy">Commercial Mortgage-Backed Securities</h2>
                        
                        <div class="space-y-4 text-lg text-muted-foreground leading-relaxed">
                            <p>
                                CMBS loans provide long-term, fixed-rate financing for stabilized income-producing properties. These non-recourse, assumable loans offer predictable debt service and the ability to transfer the loan to a future buyer.
                            </p>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6 mt-8">
                            <div class="bg-light-gray rounded-xl p-6">
                                <h4 class="font-bold text-navy mb-2">Eligible Properties</h4>
                                <ul class="space-y-1 text-sm text-muted-foreground">
                                    <li>• Multifamily</li>
                                    <li>• Office</li>
                                    <li>• Industrial</li>
                                    <li>• Retail</li>
                                    <li>• Self-Storage</li>
                                    <li>• Hotels</li>
                                </ul>
                            </div>
                            
                            <div class="bg-light-gray rounded-xl p-6">
                                <h4 class="font-bold text-navy mb-2">Key Features</h4>
                                <ul class="space-y-1 text-sm text-muted-foreground">
                                    <li>• Minimum $3M+</li>
                                    <li>• Non-recourse</li>
                                    <li>• Assumable</li>
                                    <li>• Fixed rate</li>
                                    <li>• Stabilized assets</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div data-animate="fade-up" data-animation-delay="0.2">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <img
                            src="<?= $view->asset('images/commercial-building.jpg') ?>"
                            alt="CMBS Properties"
                            class="w-full h-[600px] object-cover"
                            loading="lazy"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Construction Loans -->
    <section class="py-24 bg-light-gray">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-animate="fade-up" class="order-2 lg:order-1">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <img
                            src="<?= $view->asset('images/construction.jpg') ?>"
                            alt="Construction Projects"
                            class="w-full h-[600px] object-cover"
                            loading="lazy"
                        />
                    </div>
                </div>

                <div data-animate="fade-up" data-animation-delay="0.2" class="order-1 lg:order-2">
                    <div class="space-y-6">
                        <div class="inline-flex items-center px-4 py-2 bg-accent/10 rounded-full">
                            <svg class="w-5 h-5 text-accent mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            <span class="text-sm font-semibold text-accent uppercase tracking-wider">Construction Loans</span>
                        </div>
                        
                        <h2 class="text-4xl font-bold text-navy">Ground-Up & Major Renovation Financing</h2>
                        
                        <div class="space-y-4 text-lg text-muted-foreground leading-relaxed">
                            <p>
                                Construction loans fund new development and substantial renovation projects. These facilities provide capital as work progresses, transitioning to permanent financing upon completion or stabilization.
                            </p>
                        </div>

                        <div class="space-y-4 mt-8">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 rounded-full bg-royal-blue/10 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-royal-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-navy mb-1">Loan-to-Cost (LTC)</h4>
                                    <p class="text-muted-foreground">Typically 70–75% LTC for qualified sponsors</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 rounded-full bg-royal-blue/10 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-royal-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-navy mb-1">Recourse Options</h4>
                                    <p class="text-muted-foreground">Both recourse and non-recourse structures available</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 rounded-full bg-royal-blue/10 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-royal-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-navy mb-1">For Developers & Operators</h4>
                                    <p class="text-muted-foreground">Designed for experienced sponsors with proven track records</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bridge Loans -->
    <section class="py-24 bg-background">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12" data-animate="fade-up">
                <div class="inline-flex items-center px-4 py-2 bg-accent/10 rounded-full mb-6">
                    <svg class="w-5 h-5 text-accent mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm font-semibold text-accent uppercase tracking-wider">Bridge Loans</span>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy mb-4 sm:mb-6">When Timing Matters</h2>
                <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                    Bridge loans provide short-term, flexible funding to bridge gaps, execute acquisitions, or reposition assets before permanent financing.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div data-animate="fade-up" data-animation-delay="0.1">
                    <div class="bg-card rounded-2xl p-8 shadow-lg border border-border/50 text-center">
                        <svg class="w-12 h-12 text-royal-blue mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-xl font-bold text-navy mb-3">Quick Execution</h3>
                        <p class="text-muted-foreground">
                            Faster closings than conventional debt when speed is critical
                        </p>
                    </div>
                </div>

                <div data-animate="fade-up" data-animation-delay="0.2">
                    <div class="bg-card rounded-2xl p-8 shadow-lg border border-border/50 text-center">
                        <svg class="w-12 h-12 text-royal-blue mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        <h3 class="text-xl font-bold text-navy mb-3">Flexible Structures</h3>
                        <p class="text-muted-foreground">
                            Tailored terms that adapt to your project's unique timeline
                        </p>
                    </div>
                </div>

                <div data-animate="fade-up" data-animation-delay="0.3">
                    <div class="bg-card rounded-2xl p-8 shadow-lg border border-border/50 text-center">
                        <svg class="w-12 h-12 text-royal-blue mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-xl font-bold text-navy mb-3">Interim Solutions</h3>
                        <p class="text-muted-foreground">
                            Perfect for acquisitions, refinance, or interim financing needs
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SBA Loans -->
    <section class="py-24 bg-light-gray">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-animate="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy mb-4">SBA Loan Programs</h2>
                <p class="text-xl text-muted-foreground max-w-3xl mx-auto">
                    Government-backed financing with favorable terms for qualified businesses
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
                <div data-animate="fade-up" data-animation-delay="0.1">
                    <div class="bg-card rounded-2xl p-10 shadow-xl border border-border/50 h-full">
                        <h3 class="text-2xl font-bold text-navy mb-6">SBA 7(a) Loans</h3>
                        <div class="space-y-4 text-muted-foreground">
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 rounded-full bg-accent mt-2"></div>
                                <p><strong class="text-navy">Loan Amount:</strong> Up to $5 million</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 rounded-full bg-accent mt-2"></div>
                                <p><strong class="text-navy">Term:</strong> 25 years for real estate, 10 years for other assets</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 rounded-full bg-accent mt-2"></div>
                                <p><strong class="text-navy">Use:</strong> General business purposes including working capital and equipment</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 rounded-full bg-accent mt-2"></div>
                                <p><strong class="text-navy">Requirement:</strong> Property must be at least 51% owner-occupied</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div data-animate="fade-up" data-animation-delay="0.2">
                    <div class="bg-card rounded-2xl p-10 shadow-xl border border-border/50 h-full">
                        <h3 class="text-2xl font-bold text-navy mb-6">SBA 504 Loans</h3>
                        <div class="space-y-4 text-muted-foreground">
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 rounded-full bg-accent mt-2"></div>
                                <p><strong class="text-navy">Loan Amount:</strong> Up to $13 million (combined)</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 rounded-full bg-accent mt-2"></div>
                                <p><strong class="text-navy">Structure:</strong> 50% bank debt / 40% SBA / 10% equity</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 rounded-full bg-accent mt-2"></div>
                                <p><strong class="text-navy">Term:</strong> Fully amortized fixed rates</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 rounded-full bg-accent mt-2"></div>
                                <p><strong class="text-navy">Best For:</strong> Real estate (25 years) and machinery (10 years)</p>
                            </div>
                        </div>
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
            style="background-image: url('<?= $view->asset('images/commercial-building.jpg') ?>');"
        ></div>
        <!-- Blue Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-navy/95 to-royal-blue/90"></div>
        
        <div class="container mx-auto px-6 text-center relative z-10">
            <div data-animate="fade-up">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-white mb-4 sm:mb-6 px-4 sm:px-0">
                    Find Your Optimal Financing Solution
                </h2>
                <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                    Let's discuss which loan product best fits your project and strategic objectives
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
