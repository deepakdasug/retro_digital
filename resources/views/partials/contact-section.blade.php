
<section class="contact-section " id="contact">
    <div class="contact-inc-container">

        {{-- Left: Concise Info Card --}}
        <div class="contact-inc-info-card" data-anim="left">
            <div class="contact-live-status-pill">
                <span class="clsp-ping"><span class="clsp-ping-dot"></span></span>
                <span class="clsp-text">Engineering Desk: <strong>Available for New Sprints</strong></span>
                <span class="clsp-sla"><i class="fa-solid fa-clock"></i> &lt; 2h Response</span>
            </div>

            <span class="contact-inc-badge">
                <span class="contact-inc-dot" aria-hidden="true"></span>
                Get in Touch
            </span>
            <h2 class="contact-inc-info-title">Let's Grow Your Business</h2>
            <p class="contact-inc-info-sub">Have a question or project in mind? Connect with our team for strategic guidance and scalable execution.</p>

            <ul class="contact-inc-channels">
                <li class="contact-inc-channel">
                    <div class="contact-inc-channel-icon" aria-hidden="true"><i class="fa-solid fa-phone"></i></div>
                    <div class="contact-inc-channel-data">
                        <span class="contact-inc-channel-lbl">Call Us</span>
                        <a href="tel:+919910836538" class="contact-inc-channel-val">+91 99108 36538</a>
                    </div>
                </li>
                <li class="contact-inc-channel">
                    <div class="contact-inc-channel-icon" aria-hidden="true"><i class="fa-solid fa-envelope"></i></div>
                    <div class="contact-inc-channel-data">
                        <span class="contact-inc-channel-lbl">Email</span>
                        <a href="mailto:info@retrotechdigital.com" class="contact-inc-channel-val">info@retrotechdigital.com</a>
                    </div>
                </li>
                <li class="contact-inc-channel">
                    <div class="contact-inc-channel-icon" aria-hidden="true"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="contact-inc-channel-data">
                        <span class="contact-inc-channel-lbl">Location</span>
                        <span class="contact-inc-channel-val">DLF Phase 1, Gurugram, Haryana, India</span>
                    </div>
                </li>
            </ul>

            <div class="contact-inc-trust-grid">
                <div class="contact-inc-trust-item"><i class="fa-solid fa-circle-check"></i> Free Consultation</div>
                <div class="contact-inc-trust-item"><i class="fa-solid fa-circle-check"></i> Agile Execution</div>
                <div class="contact-inc-trust-item"><i class="fa-solid fa-circle-check"></i> Rapid Turnaround</div>
                <div class="contact-inc-trust-item"><i class="fa-solid fa-circle-check"></i> Dedicated Support</div>
            </div>
        </div>

        {{-- Right: Compact 2-Column Form Card --}}
        <div class="contact-inc-form-card" data-anim="right">
            <div class="contact-inc-form-head">
                <h2 class="contact-inc-form-title">Let's Do Great Work Together</h2>
                <p class="contact-inc-form-sub">Fill out the quick details below and our team will get back to you promptly.</p>
            </div>

            <form class="contact-inc-form" action="{{ route('contact.submit') }}" method="POST">
                @csrf

                @if (session('success'))
                    <div class="contact-inc-success" role="status">
                        <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                    </div>
                @endif

                {{-- Row 1: Full Name & Email Address (2 Columns) --}}
                <div class="contact-inc-group">
                    <label class="contact-inc-label" for="contactName">Full Name <span class="req">*</span></label>
                    <input type="text" name="name" id="contactName" class="contact-inc-input" placeholder="Your name" value="{{ old('name') }}" required autocomplete="name">
                    @error('name') <span class="contact-inc-error">{{ $message }}</span> @enderror
                </div>

                <div class="contact-inc-group">
                    <label class="contact-inc-label" for="contactEmail">Email Address <span class="req">*</span></label>
                    <input type="email" name="email" id="contactEmail" class="contact-inc-input" placeholder="name@company.com" value="{{ old('email') }}" required autocomplete="email">
                    @error('email') <span class="contact-inc-error">{{ $message }}</span> @enderror
                </div>

                {{-- Row 2: Phone Number & Service Interested In (2 Columns) --}}
                <div class="contact-inc-group">
                    <label class="contact-inc-label" for="contactPhone">Phone Number <span class="req">*</span></label>
                    <input type="tel" name="phone" id="contactPhone" class="contact-inc-input" placeholder="+91 ..." value="{{ old('phone') }}" required autocomplete="tel">
                    @error('phone') <span class="contact-inc-error">{{ $message }}</span> @enderror
                </div>

                <div class="contact-inc-group">
                    <label class="contact-inc-label" for="contactService">Service Interested In</label>
                    <select name="service" id="contactService" class="contact-inc-select">
                        <option value="">Select Service</option>
                        @foreach (['Web Development', 'Mobile App Development', 'Custom Application', 'CRM & ERP Services', 'SaaS Application', 'API Development', 'Software Development', 'WhatsApp Integration', 'Digital Marketing'] as $svc)
                            <option value="{{ $svc }}" @selected(old('service') === $svc)>{{ $svc }}</option>
                        @endforeach
                    </select>
                    @error('service') <span class="contact-inc-error">{{ $message }}</span> @enderror
                </div>

                {{-- Row 3: How Did You Hear About Us & Website / Company (2 Columns) --}}
                <div class="contact-inc-group">
                    <label class="contact-inc-label" for="contactReferral">How Did You Hear About Us?</label>
                    <select name="referral_source" id="contactReferral" class="contact-inc-select">
                        <option value="">Select an option</option>
                        @foreach (['Google Search', 'Social Media', 'Referral / Word of Mouth', 'Online Advertisement', 'Email Marketing', 'Other'] as $ref)
                            <option value="{{ $ref }}" @selected(old('referral_source') === $ref)>{{ $ref }}</option>
                        @endforeach
                    </select>
                    @error('referral_source') <span class="contact-inc-error">{{ $message }}</span> @enderror
                </div>

                <div class="contact-inc-group">
                    <label class="contact-inc-label" for="contactUrl">Website / Company (Optional)</label>
                    <input type="url" name="website_url" id="contactUrl" class="contact-inc-input" placeholder="https://yourcompany.com" value="{{ old('website_url') }}" autocomplete="url">
                    @error('website_url') <span class="contact-inc-error">{{ $message }}</span> @enderror
                </div>

                {{-- Interactive Project Budget Chips --}}
                <div class="contact-inc-group contact-inc-col-full">
                    <label class="contact-inc-label">Estimated Project Budget (Optional)</label>
                    <div class="contact-budget-chips" id="contactBudgetChips">
                        <button type="button" class="budget-chip" data-budget="< $5,000">&lt; $5,000 (MVP / Sprint)</button>
                        <button type="button" class="budget-chip" data-budget="$5,000 - $15,000">$5,000 - $15,000 (Growth)</button>
                        <button type="button" class="budget-chip" data-budget="$15,000 - $35,000">$15,000 - $35,000 (Custom SaaS)</button>
                        <button type="button" class="budget-chip" data-budget="$35,000+ Enterprise">$35,000+ (Enterprise Tier)</button>
                    </div>
                </div>

                {{-- Row 4: Message (Full Width / 2 Columns) --}}
                <div class="contact-inc-group contact-inc-col-full">
                    <label class="contact-inc-label" for="contactMessage">Message / Project Requirements (Optional)</label>
                    <textarea name="message" id="contactMessage" class="contact-inc-textarea" rows="3" placeholder="Tell us about your project, goals, or timeline...">{{ old('message') }}</textarea>
                    @error('message') <span class="contact-inc-error">{{ $message }}</span> @enderror
                </div>

                {{-- Consent Checkbox --}}
                <label class="contact-inc-agree" for="contactAgree">
                    <input type="checkbox" name="agree" id="contactAgree" value="1" @checked(old('agree'))>
                    <span>By submitting this form, I agree to Retrotech's <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.</span>
                </label>
                @error('agree') <span class="contact-inc-error contact-inc-col-full">{{ $message }}</span> @enderror

                {{-- Submit Button --}}
                <div class="contact-inc-submit-wrap">
                    <button type="submit" class="contact-inc-submit">
                        Submit Message <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
