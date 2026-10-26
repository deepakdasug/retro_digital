<section class="contact-section {{ request()->routeIs('contact.page', 'contact.us') ? 'contact-page-section' : 'contact-home-section' }}">
  <div class="contact-container" id="contact">

    {{-- Left: Info Card Matching Image 4 --}}
    <div class="contact-info-card">
      <div class="contact-avatar-badge" aria-hidden="true">
        <img src="{{ asset('assets/images/retrotech-digital-logo - Copy.png') }}" alt="">
      </div>

      <h2 class="contact-info-title">Let's Grow Your Business</h2>
      <p class="contact-info-subtitle">
        Ready to increase your online presence? Our digital marketing experts are here to help you achieve measurable results.
      </p>

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

      {{-- "Why Contact Us?" 4 Feature Cards (Image 3 & 4) --}}
      <div class="contact-why-us">
        <h3 class="why-us-title">Why Contact Us?</h3>
        <div class="why-us-grid">
          <div class="why-us-card">
            <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
            <span>Free Website Audit</span>
          </div>
          <div class="why-us-card">
            <i class="fa-solid fa-chart-line" aria-hidden="true"></i>
            <span>Growth Strategy</span>
          </div>
          <div class="why-us-card">
            <i class="fa-solid fa-bullhorn" aria-hidden="true"></i>
            <span>Digital Marketing</span>
          </div>
          <div class="why-us-card">
            <i class="fa-solid fa-headset" aria-hidden="true"></i>
            <span>Dedicated Support</span>
          </div>
        </div>
      </div>
    </div>

    {{-- Right: Expanded Form with All Proper Input Formats (Image 4) --}}
    <div class="contact-form-card">
      <h2 class="contact-form-title">Let's Do Great Work Together</h2>
      <p class="contact-form-subtitle">Get in touch with our SEO experts today</p>

      <form class="contact-form" action="{{ route('contact.submit') }}" method="POST">
        @csrf

        @if (session('success'))
          <div class="contact-form-success" role="status">
            {{ session('success') }}
          </div>
        @endif

        {{-- 1. Name Input (Full Width) --}}
        <div class="contact-form-group contact-form-name-group">
          <input type="text"
                 name="name"
                 id="contactName"
                 placeholder="Enter Your Name *"
                 value="{{ old('name') }}"
                 required
                 autocomplete="name">
          @error('name') <span class="contact-form-error">{{ $message }}</span> @enderror
        </div>

        {{-- 2. Phone & Email (2-Column Grid) --}}
        <div class="contact-form-row">
          <div class="contact-form-group">
            <input type="tel"
                   name="phone"
                   id="contactPhone"
                   placeholder="Enter Your Phone Number *"
                   value="{{ old('phone') }}"
                   required
                   autocomplete="tel">
            @error('phone') <span class="contact-form-error">{{ $message }}</span> @enderror
          </div>
          <div class="contact-form-group">
            <input type="email"
                   name="email"
                   id="contactEmail"
                   placeholder="Enter Your Email *"
                   value="{{ old('email') }}"
                   required
                   autocomplete="email">
            @error('email') <span class="contact-form-error">{{ $message }}</span> @enderror
          </div>
        </div>

        {{-- 3. Company Name Input (Newly Added) --}}
        <div class="contact-form-group">
          <input type="text"
                 name="company_name"
                 id="contactCompany"
                 placeholder="Enter Your Company Name"
                 value="{{ old('company_name') }}"
                 autocomplete="organization">
          @error('company_name') <span class="contact-form-error">{{ $message }}</span> @enderror
        </div>

        {{-- 4. Company Address Textarea (Newly Added) --}}
        <div class="contact-form-group">
          <textarea name="company_address"
                    id="contactCompanyAddress"
                    rows="2"
                    placeholder="Enter Your Company Address">{{ old('company_address') }}</textarea>
          @error('company_address') <span class="contact-form-error">{{ $message }}</span> @enderror
        </div>

        {{-- 5. Online Presence & Referral Source (2-Column Grid, Newly Added) --}}
        <div class="contact-form-row">
          <div class="contact-form-group">
            <label class="contact-field-label" for="contactUrl">Online Presence (Optional)</label>
            <input type="url"
                   name="website_url"
                   id="contactUrl"
                   placeholder="Enter Your URL (e.g. https://example.com)"
                   value="{{ old('website_url') }}"
                   autocomplete="url">
            @error('website_url') <span class="contact-form-error">{{ $message }}</span> @enderror
          </div>

          <div class="contact-form-group">
            <label class="contact-field-label" for="contactReferral">Where did you hear about us?</label>
            <select name="referral_source" id="contactReferral">
              <option value="" disabled {{ old('referral_source') ? '' : 'selected' }}>Please select</option>
              <option value="Google Search" @selected(old('referral_source') === 'Google Search')>Google Search</option>
              <option value="Social Media" @selected(old('referral_source') === 'Social Media')>Social Media</option>
              <option value="Referral / Word of Mouth" @selected(old('referral_source') === 'Referral / Word of Mouth')>Referral / Word of Mouth</option>
              <option value="Online Advertisement" @selected(old('referral_source') === 'Online Advertisement')>Online Advertisement</option>
              <option value="Email Marketing" @selected(old('referral_source') === 'Email Marketing')>Email Marketing</option>
              <option value="Other" @selected(old('referral_source') === 'Other')>Other</option>
            </select>
            @error('referral_source') <span class="contact-form-error">{{ $message }}</span> @enderror
          </div>
        </div>

        {{-- 6. Services Selection (Optional Selection) --}}
        <div class="contact-form-group">
          <label class="contact-field-label" for="contactService">Choose Services (Optional)</label>
          <select name="service" id="contactService">
            <option value="" disabled {{ old('service') ? '' : 'selected' }}>Choose Services</option>
            <option value="IT Data Destruction" @selected(old('service') === 'IT Data Destruction')>IT Data Destruction</option>
            <option value="IT Asset Remarketing" @selected(old('service') === 'IT Asset Remarketing')>IT Asset Remarketing</option>
            <option value="IT Asset Management" @selected(old('service') === 'IT Asset Management')>IT Asset Management</option>
            <option value="Hard Drive Disposal" @selected(old('service') === 'Hard Drive Disposal')>Hard Drive Disposal</option>
            <option value="Data Center Decommissioning" @selected(old('service') === 'Data Center Decommissioning')>Data Center Decommissioning</option>
            <option value="Hard Disk Destruction" @selected(old('service') === 'Hard Disk Destruction')>Hard Disk Destruction</option>
          </select>
          @error('service') <span class="contact-form-error">{{ $message }}</span> @enderror
        </div>

        {{-- 7. Message Textarea --}}
        <div class="contact-form-group contact-form-message-group">
          <textarea name="message"
                    id="contactMessage"
                    rows="4"
                    placeholder="Enter Message">{{ old('message') }}</textarea>
          @error('message') <span class="contact-form-error">{{ $message }}</span> @enderror
        </div>

        {{-- 8. Compliance & Agreement Checkbox --}}
        <label class="contact-form-agree" for="contactAgree">
          <input type="checkbox"
                 name="agree"
                 id="contactAgree"
                 value="1"
                 {{ old('agree') ? 'checked' : '' }}>
          <span>
            By registering here, I agree to Retrotech's
            <a href="#">Terms of Service</a> and
            <a href="#">Privacy Policy</a>.
          </span>
        </label>
        @error('agree') <span class="contact-form-error">{{ $message }}</span> @enderror

        {{-- 9. Submit Button --}}
        <div class="contact-form-submit-wrap">
          <button type="submit" class="contact-form-submit">
            Submit <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
          </button>
        </div>
      </form>
    </div>

  </div>
</section>
