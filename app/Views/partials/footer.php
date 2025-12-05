<footer class="bg-white text-navy">
    <div class="container mx-auto px-4 sm:px-6 py-12 md:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12">
            <!-- Logo and Description -->
            <div class="text-center md:text-left">
                <a href="<?= $view->url('/') ?>" class="inline-block mb-4">
                    <img 
                        src="<?= $view->asset('images/HPG LOGO TP.png') ?>" 
                        alt="HPG Kapital" 
                        class="h-[94px] w-auto mx-auto md:mx-0"
                    />
                </a>
                <p class="text-sm leading-relaxed opacity-80 max-w-xs mx-auto md:mx-0">
                    Commercial real estate capital advisory firm specializing in debt and EB-5 placement solutions.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="text-center md:text-left">
                <h4 class="font-semibold text-lg mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li>
                        <a href="<?= $view->url('/') ?>" class="text-sm text-navy/80 hover:text-navy hover:font-semibold transition-all inline-block">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="<?= $view->url('/about') ?>" class="text-sm text-navy/80 hover:text-navy hover:font-semibold transition-all inline-block">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="<?= $view->url('/hospitality-financing') ?>" class="text-sm text-navy/80 hover:text-navy hover:font-semibold transition-all inline-block">
                            Hospitality Financing
                        </a>
                    </li>
                    <li>
                        <a href="<?= $view->url('/contact') ?>" class="text-sm text-navy/80 hover:text-navy hover:font-semibold transition-all inline-block">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Services -->
            <div class="text-center md:text-left">
                <h4 class="font-semibold text-lg mb-4">Services</h4>
                <ul class="space-y-2">
                    <li>
                        <a href="<?= $view->url('/capital-markets') ?>" class="text-sm text-navy/80 hover:text-navy hover:font-semibold transition-all inline-block">
                            Capital Markets Advisory
                        </a>
                    </li>
                    <li>
                        <a href="<?= $view->url('/eb5-advisory') ?>" class="text-sm text-navy/80 hover:text-navy hover:font-semibold transition-all inline-block">
                            EB-5 Advisory
                        </a>
                    </li>
                    <li>
                        <a href="<?= $view->url('/loan-products') ?>" class="text-sm text-navy/80 hover:text-navy hover:font-semibold transition-all inline-block">
                            Loan Products
                        </a>
                    </li>
                    <li>
                        <a href="<?= $view->url('/gc-referral') ?>" class="text-sm text-navy/80 hover:text-navy hover:font-semibold transition-all inline-block">
                            GC Referral
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="text-center md:text-left">
                <h4 class="font-semibold text-lg mb-4">Contact</h4>
                <ul class="space-y-3">
                    <li class="flex items-start justify-center md:justify-start space-x-3">
                        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" style="color: rgb(2 39 64)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <a
                            href="https://www.google.com/maps/search/?api=1&query=1651+Mt.+Vernon+Road,+3rd+Floor,+Dunwoody,+GA+30338"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="text-sm text-navy/80 hover:text-navy hover:font-semibold transition-all text-left"
                        >
                            <div>1651 Mt. Vernon Road, 3rd Floor</div>
                            <div>Dunwoody, GA 30338</div>
                        </a>
                    </li>
                    <li class="flex items-center justify-center md:justify-start space-x-3">
                        <svg class="w-5 h-5 flex-shrink-0" style="color: rgb(2 39 64)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span class="opacity-80 text-sm">404-434-4932</span>
                    </li>
                    <li class="flex items-center justify-center md:justify-start space-x-3">
                        <svg class="w-5 h-5 flex-shrink-0" style="color: rgb(2 39 64)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <a href="mailto:info@hpg-kapital.com" class="text-sm text-navy/80 hover:text-navy hover:font-semibold transition-all">
                            info@hpg-kapital.com
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-current/20 mt-8 md:mt-12 pt-6 md:pt-8 text-center">
            <p class="opacity-60 text-sm">
                © <?= date('Y') ?> HPG Kapital. All rights reserved.
            </p>
        </div>
    </div>
</footer>

