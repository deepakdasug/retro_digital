<section class="contact-section {{ request()->routeIs('contact.page', 'contact.us') ? 'contact-page-section' : 'contact-home-section' }}">
    <div class="contact-container" id="contact">
        {{-- Left: Contact information --}}
        <div class="contact-info-card">
            <div class="contact-avatar-badge" aria-hidden="true">
                <img src="{{ asset('assets/images/retrotech-digital-logo - Copy.png') }}" alt="">
            </div>
            <h2 class="contact-info-title">Let's Grow Your Business</h2>
            <p class="contact-info-subtitle">Have a question or a project in mind? Our team is here to help you find the right solution.</p>

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

                {{-- Full-width fields: one field per row --}}
                    <div class="contact-form-group">
                        <label class="contact-field-label" for="contactName">Full Name <span aria-hidden="true">*</span></label>
                        <input type="text" name="name" id="contactName" placeholder="Enter your full name" value="{{ old('name') }}" required autocomplete="name">
                        @error('name') <span class="contact-form-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="contact-form-group">
                        <label class="contact-field-label" for="contactEmail">Email Address <span aria-hidden="true">*</span></label>
                        <input type="email" name="email" id="contactEmail" placeholder="Enter your email address" value="{{ old('email') }}" required autocomplete="email">
                        @error('email') <span class="contact-form-error">{{ $message }}</span> @enderror
                    </div>

                    <div class="contact-form-group">
                        <label class="contact-field-label" for="contactPhone">Phone Number <span aria-hidden="true">*</span></label>
                        <input type="tel" name="phone" id="contactPhone" placeholder="Enter your phone number" value="{{ old('phone') }}" required autocomplete="tel">
                        @error('phone') <span class="contact-form-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="contact-form-group">
                        <label class="contact-field-label" for="contactService">Service Interested In (Optional)</label>
                        <select name="service" id="contactService">
                            <option value="">Select a service</option>
                            @foreach (['IT Data Destruction', 'IT Asset Remarketing', 'IT Asset Management', 'Hard Drive Disposal', 'Data Center Decommissioning', 'Hard Disk Destruction'] as $serviceOption)
                                <option value="{{ $serviceOption }}" @selected(old('service') === $serviceOption)>{{ $serviceOption }}</option>
                            @endforeach
                        </select>
                        @error('service') <span class="contact-form-error">{{ $message }}</span> @enderror
                    </div>

                {{-- Referral source --}}
                <div class="contact-form-group">
                    <label class="contact-field-label" for="contactReferral">How Did You Hear About Us? (Optional)</label>
                    <select name="referral_source" id="contactReferral">
                        <option value="">Select an option</option>
                        @foreach (['Google Search', 'Social Media', 'Referral / Word of Mouth', 'Online Advertisement', 'Email Marketing', 'Other'] as $referralOption)
                            <option value="{{ $referralOption }}" @selected(old('referral_source') === $referralOption)>{{ $referralOption }}</option>
                        @endforeach
                    </select>
                    @error('referral_source') <span class="contact-form-error">{{ $message }}</span> @enderror
                </div>

                {{-- Row 4: Message --}}
                <div class="contact-form-group contact-form-message-group">
                    <label class="contact-field-label" for="contactMessage">Message / Project Requirements (Optional)</label>
                    <textarea name="message" id="contactMessage" rows="4" placeholder="Tell us about your requirements or how we can help">{{ old('message') }}</textarea>
                    @error('message') <span class="contact-form-error">{{ $message }}</span> @enderror
                </div>

                {{-- Consent --}}
                <label class="contact-form-agree" for="contactAgree">
                    <input type="checkbox" name="agree" id="contactAgree" value="1" @checked(old('agree'))>
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

<style>
/* Contact form: single-column layout with centered submit button */
.contact-form-card .contact-form { display: flex; flex-direction: column; gap: 18px; }
.contact-form-card .contact-form > .contact-form-group { width: 100%; min-width: 0; margin: 0; }
.contact-form-card .contact-form > .contact-form-group input,
.contact-form-card .contact-form > .contact-form-group select,
.contact-form-card .contact-form > .contact-form-group textarea { width: 100%; box-sizing: border-box; }
.contact-form-card .contact-form-submit-wrap { display: flex; justify-content: center; width: 100%; }
.contact-form-card .contact-form-submit { margin-left: auto; margin-right: auto; }
</style>
