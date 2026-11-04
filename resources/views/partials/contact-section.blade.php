@php
    $isContactPage = request()->routeIs('contact.page', 'contact.us');
@endphp

@if ($isContactPage)
    {{-- =========================================================================
         STANDALONE CONTACT PAGE (Route: /contact, /contact-us)
         Maintained exactly as original without alterations
         ========================================================================= --}}
    <section class="contact-section contact-page-section">
        <div class="contact-container" id="contact">
            {{-- Left: Contact information --}}
            <div class="contact-info-card">
                <div class="contact-avatar-badge" aria-hidden="true">
                    <img src="{{ asset('assets/images/retrotech-digital-logo - Copy.png') }}" alt="">
                </div>
                <h2 class="contact-info-title">Let's Grow Your Business</h2>
                <p class="contact-info-subtitle">Ready to increase your online presence? Our digital marketing experts are here to help you achieve measurable results.</p>

                <ul class="contact-channels-list">
                    <li class="contact-channel-item">
                        <div class="channel-icon" aria-hidden="true"><i class="fa-solid fa-phone"></i></div>
                        <div class="channel-text">
                            <span class="channel-label">Call Us</span>
                            <a href="tel:+919910836538" class="channel-value">+91 99108 36538</a>
                        </div>
                    </li>
                    <li class="contact-channel-item">
                        <div class="channel-icon" aria-hidden="true"><i class="fa-solid fa-envelope"></i></div>
                        <div class="channel-text">
                            <span class="channel-label">Email</span>
                            <a href="mailto:info@retrotechdigital.com" class="channel-value">info@retrotechdigital.com</a>
                        </div>
                    </li>
                    <li class="contact-channel-item">
                        <div class="channel-icon" aria-hidden="true"><i class="fa-solid fa-location-dot"></i></div>
                        <div class="channel-text">
                            <span class="channel-label">Office</span>
                            <span class="channel-value">O-126, O-145, O-146, The Shopping Mall, Arjun Marg, DLF Phase 1, Gurugram, Haryana, India, 122002</span>
                        </div>
                    </li>
                </ul>

                <div class="contact-why-us">
                    <h3 class="why-us-title">Why Contact Us?</h3>
                    <div class="why-us-grid">
                        <div class="why-us-card"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i><span>Free Consultation</span></div>
                        <div class="why-us-card"><i class="fa-solid fa-chart-line" aria-hidden="true"></i><span>Tailored Solutions</span></div>
                        <div class="why-us-card"><i class="fa-solid fa-bullhorn" aria-hidden="true"></i><span>Expert Guidance</span></div>
                        <div class="why-us-card"><i class="fa-solid fa-headset" aria-hidden="true"></i><span>Dedicated Support</span></div>
                    </div>
                </div>
            </div>

            {{-- Right: Contact form --}}
            <div class="contact-form-card">
                <h2 class="contact-form-title">Let's Do Great Work Together</h2>
                <p class="contact-form-subtitle">Tell us how we can help. We'll get back to you soon.</p>

                <form class="contact-form" action="{{ route('contact.submit') }}" method="POST">
                    @csrf

                    @if (session('success'))
                        <div class="contact-form-success" role="status">{{ session('success') }}</div>
                    @endif

                    <div class="contact-form-group contact-form-name-group">
                        <label class="contact-field-label" for="contactPageName">Full Name <span aria-hidden="true">*</span></label>
                        <input type="text" name="name" id="contactPageName" placeholder="Enter your full name" value="{{ old('name') }}" required autocomplete="name">
                        @error('name') <span class="contact-form-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="contact-form-row">
                        <div class="contact-form-group">
                            <label class="contact-field-label" for="contactPagePhone">Phone Number <span aria-hidden="true">*</span></label>
                            <input type="tel" name="phone" id="contactPagePhone" placeholder="Enter your phone number" value="{{ old('phone') }}" required autocomplete="tel">
                            @error('phone') <span class="contact-form-error">{{ $message }}</span> @enderror
                        </div>
                        <div class="contact-form-group">
                            <label class="contact-field-label" for="contactPageEmail">Email Address <span aria-hidden="true">*</span></label>
                            <input type="email" name="email" id="contactPageEmail" placeholder="Enter your email address" value="{{ old('email') }}" required autocomplete="email">
                            @error('email') <span class="contact-form-error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="contact-form-group">
                        <label class="contact-field-label" for="contactPageCompany">Company Name (Optional)</label>
                        <input type="text" name="company_name" id="contactPageCompany" placeholder="Enter company name" value="{{ old('company_name') }}">
                        @error('company_name') <span class="contact-form-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="contact-form-group">
                        <label class="contact-field-label" for="contactPageAddress">Company Address (Optional)</label>
                        <textarea name="company_address" id="contactPageAddress" rows="2" placeholder="Enter company address">{{ old('company_address') }}</textarea>
                        @error('company_address') <span class="contact-form-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="contact-form-row">
                        <div class="contact-form-group">
                            <label class="contact-field-label" for="contactPageUrl">Website URL (Optional)</label>
                            <input type="url" name="website_url" id="contactPageUrl" placeholder="https://example.com" value="{{ old('website_url') }}" autocomplete="url">
                            @error('website_url') <span class="contact-form-error">{{ $message }}</span> @enderror
                        </div>
                        <div class="contact-form-group">
                            <label class="contact-field-label" for="contactPageReferral">How Did You Hear About Us? (Optional)</label>
                            <select name="referral_source" id="contactPageReferral">
                                <option value="">Please select</option>
                                @foreach (['Google Search', 'Social Media', 'Referral / Word of Mouth', 'Online Advertisement', 'Email Marketing', 'Other'] as $refOpt)
                                    <option value="{{ $refOpt }}" @selected(old('referral_source') === $refOpt)>{{ $refOpt }}</option>
                                @endforeach
                            </select>
                            @error('referral_source') <span class="contact-form-error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="contact-form-group">
                        <label class="contact-field-label" for="contactPageService">Service Interested In (Optional)</label>
                        <select name="service" id="contactPageService">
                            <option value="">Choose Services</option>
                            @foreach (['IT Data Destruction', 'IT Asset Remarketing', 'IT Asset Management', 'Hard Drive Disposal', 'Data Center Decommissioning', 'Hard Disk Destruction'] as $svcOpt)
                                <option value="{{ $svcOpt }}" @selected(old('service') === $svcOpt)>{{ $svcOpt }}</option>
                            @endforeach
                        </select>
                        @error('service') <span class="contact-form-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="contact-form-group contact-form-message-group">
                        <label class="contact-field-label" for="contactPageMessage">Message / Project Requirements (Optional)</label>
                        <textarea name="message" id="contactPageMessage" rows="4" placeholder="Enter your message">{{ old('message') }}</textarea>
                        @error('message') <span class="contact-form-error">{{ $message }}</span> @enderror
                    </div>

                    <label class="contact-form-agree" for="contactPageAgree">
                        <input type="checkbox" name="agree" id="contactPageAgree" value="1" @checked(old('agree'))>
                        <span>By submitting this form, I agree to Retrotech's <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.</span>
                    </label>
                    @error('agree') <span class="contact-form-error">{{ $message }}</span> @enderror

                    <div class="contact-form-submit-wrap">
                        <button type="submit" class="contact-form-submit">Submit <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@else

    {{-- =========================================================================
         INCLUDED CONTACT SECTION (Embedded across Home, Tech Dev, Blog, etc.)
         Compact, 2-column field grid, tighter spacing, sleek surface styling
         ========================================================================= --}}
    <section class="contact-section contact-included-section" id="contact">
        <div class="contact-inc-container">

            {{-- Left: Concise Info Card --}}
            <div class="contact-inc-info-card">
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
            <div class="contact-inc-form-card">
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
                        <label class="contact-inc-label" for="incContactName">Full Name <span class="req">*</span></label>
                        <input type="text" name="name" id="incContactName" class="contact-inc-input" placeholder="Your name" value="{{ old('name') }}" required autocomplete="name">
                        @error('name') <span class="contact-inc-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="contact-inc-group">
                        <label class="contact-inc-label" for="incContactEmail">Email Address <span class="req">*</span></label>
                        <input type="email" name="email" id="incContactEmail" class="contact-inc-input" placeholder="name@company.com" value="{{ old('email') }}" required autocomplete="email">
                        @error('email') <span class="contact-inc-error">{{ $message }}</span> @enderror
                    </div>

                    {{-- Row 2: Phone Number & Service Interested In (2 Columns) --}}
                    <div class="contact-inc-group">
                        <label class="contact-inc-label" for="incContactPhone">Phone Number <span class="req">*</span></label>
                        <input type="tel" name="phone" id="incContactPhone" class="contact-inc-input" placeholder="+91 ..." value="{{ old('phone') }}" required autocomplete="tel">
                        @error('phone') <span class="contact-inc-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="contact-inc-group">
                        <label class="contact-inc-label" for="incContactService">Service Interested In</label>
                        <select name="service" id="incContactService" class="contact-inc-select">
                            <option value="">Select Service</option>
                            @foreach (['Web Development', 'Mobile App Development', 'Custom Application', 'CRM & ERP Services', 'SaaS Application', 'API Development', 'Software Development', 'WhatsApp Integration', 'Digital Marketing'] as $svc)
                                <option value="{{ $svc }}" @selected(old('service') === $svc)>{{ $svc }}</option>
                            @endforeach
                        </select>
                        @error('service') <span class="contact-inc-error">{{ $message }}</span> @enderror
                    </div>

                    {{-- Row 3: How Did You Hear About Us & Website / Company (2 Columns) --}}
                    <div class="contact-inc-group">
                        <label class="contact-inc-label" for="incContactReferral">How Did You Hear About Us?</label>
                        <select name="referral_source" id="incContactReferral" class="contact-inc-select">
                            <option value="">Select an option</option>
                            @foreach (['Google Search', 'Social Media', 'Referral / Word of Mouth', 'Online Advertisement', 'Email Marketing', 'Other'] as $ref)
                                <option value="{{ $ref }}" @selected(old('referral_source') === $ref)>{{ $ref }}</option>
                            @endforeach
                        </select>
                        @error('referral_source') <span class="contact-inc-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="contact-inc-group">
                        <label class="contact-inc-label" for="incContactUrl">Website / Company (Optional)</label>
                        <input type="url" name="website_url" id="incContactUrl" class="contact-inc-input" placeholder="https://yourcompany.com" value="{{ old('website_url') }}" autocomplete="url">
                        @error('website_url') <span class="contact-inc-error">{{ $message }}</span> @enderror
                    </div>

                    {{-- Row 4: Message (Full Width / 2 Columns) --}}
                    <div class="contact-inc-group contact-inc-col-full">
                        <label class="contact-inc-label" for="incContactMessage">Message / Project Requirements (Optional)</label>
                        <textarea name="message" id="incContactMessage" class="contact-inc-textarea" rows="3" placeholder="Tell us about your project, goals, or timeline...">{{ old('message') }}</textarea>
                        @error('message') <span class="contact-inc-error">{{ $message }}</span> @enderror
                    </div>

                    {{-- Consent Checkbox --}}
                    <label class="contact-inc-agree" for="incContactAgree">
                        <input type="checkbox" name="agree" id="incContactAgree" value="1" @checked(old('agree'))>
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
@endif
