<div class="pt-16">
    <!-- Hero -->
    <section class="relative min-h-[50vh] flex items-center overflow-hidden">
        <div
            class="absolute inset-0 bg-cover bg-center bg-fixed"
            style="background-image: url('<?= $view->asset('images/handshake.jpg') ?>');"
        ></div>
        <div class="absolute inset-0 bg-gradient-to-r from-navy/95 to-royal-blue/90"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-3xl" data-animate="fade-up" data-hero-animation="true" style="opacity: 0; transform: translateY(50px);">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6 px-4 sm:px-0">Get in Touch</h1>
                <p class="text-lg sm:text-xl text-white/90 px-4 sm:px-0">
                    Let's discuss how we can help finance your next project
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Form & Info -->
    <section class="py-24 bg-background">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16">
                <!-- Form -->
                <div data-animate="fade-up">
                    <div class="bg-card rounded-2xl p-6 sm:p-8 lg:p-10 shadow-xl border border-border/50">
                        <h2 class="text-2xl sm:text-3xl font-bold text-navy mb-4 sm:mb-6">Send Us a Message</h2>
                        <form action="<?= $view->url('/contact') ?>" method="POST" class="space-y-6" novalidate>
                            <input type="hidden" name="csrf_token" value="<?= $view->escape($csrfToken ?? '') ?>">
                            
                            <?php if (isset($success) && $success): ?>
                                <div class="p-4 bg-green-100 border border-green-400 text-green-700 rounded-md">
                                    <?= isset($successMessage) ? $view->escape($successMessage) : "Thank you! We'll be in touch soon." ?>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($errors['general'])): ?>
                                <div class="p-4 bg-red-100 border border-red-400 text-red-700 rounded-md">
                                    <?= $view->escape($errors['general']) ?>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($errors['rate_limit'])): ?>
                                <div class="p-4 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded-md">
                                    <?= $view->escape($errors['rate_limit']) ?>
                                </div>
                            <?php endif; ?>
                            
                            <div>
                                <label for="contact-name" class="block text-sm font-semibold text-navy mb-2">
                                    Name *
                                </label>
                                <input
                                    type="text"
                                    id="contact-name"
                                    name="name"
                                    required
                                    placeholder="Your full name"
                                    maxlength="100"
                                    class="w-full px-4 py-3 border border-border rounded-md focus:outline-none focus:ring-2 focus:ring-royal-blue <?= isset($errors['name']) ? 'border-destructive' : '' ?>"
                                    value="<?= isset($formData['name']) ? $view->escape($formData['name']) : '' ?>"
                                    aria-invalid="<?= isset($errors['name']) ? 'true' : 'false' ?>"
                                    aria-describedby="<?= isset($errors['name']) ? 'name-error' : '' ?>"
                                >
                                <?php if (isset($errors['name'])): ?>
                                    <p id="name-error" class="text-sm text-destructive mt-1" role="alert"><?= $view->escape($errors['name']) ?></p>
                                <?php endif; ?>
                            </div>

                            <div>
                                <label for="contact-email" class="block text-sm font-semibold text-navy mb-2">
                                    Email *
                                </label>
                                <input
                                    type="email"
                                    id="contact-email"
                                    name="email"
                                    required
                                    placeholder="your@email.com"
                                    maxlength="255"
                                    class="w-full px-4 py-3 border border-border rounded-md focus:outline-none focus:ring-2 focus:ring-royal-blue <?= isset($errors['email']) ? 'border-destructive' : '' ?>"
                                    value="<?= isset($formData['email']) ? $view->escape($formData['email']) : '' ?>"
                                    aria-invalid="<?= isset($errors['email']) ? 'true' : 'false' ?>"
                                    aria-describedby="<?= isset($errors['email']) ? 'email-error' : '' ?>"
                                >
                                <?php if (isset($errors['email'])): ?>
                                    <p id="email-error" class="text-sm text-destructive mt-1" role="alert"><?= $view->escape($errors['email']) ?></p>
                                <?php endif; ?>
                            </div>

                            <div>
                                <label for="contact-phone" class="block text-sm font-semibold text-navy mb-2">
                                    Phone
                                </label>
                                <input
                                    type="tel"
                                    id="contact-phone"
                                    name="phone"
                                    placeholder="(555) 123-4567"
                                    maxlength="20"
                                    class="w-full px-4 py-3 border border-border rounded-md focus:outline-none focus:ring-2 focus:ring-royal-blue <?= isset($errors['phone']) ? 'border-destructive' : '' ?>"
                                    value="<?= isset($formData['phone']) ? $view->escape($formData['phone']) : '' ?>"
                                    aria-invalid="<?= isset($errors['phone']) ? 'true' : 'false' ?>"
                                    aria-describedby="<?= isset($errors['phone']) ? 'phone-error' : '' ?>"
                                >
                                <?php if (isset($errors['phone'])): ?>
                                    <p id="phone-error" class="text-sm text-destructive mt-1" role="alert"><?= $view->escape($errors['phone']) ?></p>
                                <?php endif; ?>
                            </div>

                            <div>
                                <label for="contact-message" class="block text-sm font-semibold text-navy mb-2">
                                    Message *
                                </label>
                                <textarea
                                    id="contact-message"
                                    name="message"
                                    required
                                    rows="5"
                                    maxlength="5000"
                                    placeholder="Tell us about your project..."
                                    class="w-full px-4 py-3 border border-border rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-royal-blue <?= isset($errors['message']) ? 'border-destructive' : '' ?>"
                                    aria-invalid="<?= isset($errors['message']) ? 'true' : 'false' ?>"
                                    aria-describedby="<?= isset($errors['message']) ? 'message-error' : '' ?>"
                                ><?= isset($formData['message']) ? $view->escape($formData['message']) : '' ?></textarea>
                                <?php if (isset($errors['message'])): ?>
                                    <p id="message-error" class="text-sm text-destructive mt-1" role="alert"><?= $view->escape($errors['message']) ?></p>
                                <?php endif; ?>
                                <p class="text-xs text-muted-foreground mt-1">
                                    <span id="message-count"><?= isset($formData['message']) ? strlen($formData['message']) : 0 ?></span>/5000 characters
                                </p>
                            </div>

                            <button
                                type="submit"
                                class="w-full bg-luxury-red hover:bg-luxury-red/90 text-white font-semibold uppercase tracking-wider min-h-[44px] touch-target px-6 sm:px-8 py-5 sm:py-6 rounded-md transition-colors"
                                aria-label="Submit contact form"
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
