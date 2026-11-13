
<section class="contact-section " id="contact">
    @php($previewMode = $previewMode ?? false)
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
            @if(request()->routeIs('contact.page'))
                <h1 class="contact-inc-info-title">Let's Grow Your Business</h1>
            @else
                <h2 class="contact-inc-info-title">Let's Grow Your Business</h2>
            @endif
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

            @if($previewMode)
                <fieldset class="contact-inc-form blog-contact-preview-form" disabled style="border:0;padding:0;margin:0;min-width:0">
            @else
                <form class="contact-inc-form" action="{{ route('contact.submit') }}" method="POST">
                    @csrf
            @endif

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
                    <div class="phone-field-wrap">
                        {{-- Country Code Picker --}}
                        <div class="cc-picker" id="ccPicker" role="combobox" aria-expanded="false" aria-haspopup="listbox" aria-label="Country code">
                            <span class="cc-flag" id="ccFlag" aria-hidden="true">🇮🇳</span>
                            <span class="cc-code" id="ccCode">+91</span>
                            <i class="fa-solid fa-chevron-down cc-chevron" aria-hidden="true"></i>
                            <div class="cc-dropdown" id="ccDropdown" role="listbox" aria-label="Select country code">
                                <div class="cc-search-wrap">
                                    <i class="fa-solid fa-magnifying-glass cc-search-icon" aria-hidden="true"></i>
                                    <input type="text" class="cc-search-input" id="ccSearch" placeholder="Search country..." autocomplete="off" aria-label="Search country code">
                                </div>
                                <ul class="cc-list" id="ccList" data-lenis-prevent-wheel="true" data-lenis-prevent-touch="true"></ul>
                                <p class="cc-no-results" id="ccNoResults" style="display:none">No results found</p>
                            </div>
                        </div>
                        {{-- Hidden field stores full code e.g. +91 --}}
                        <input type="hidden" name="country_code" id="contactCountryCode" value="+91">
                        <input type="tel" name="phone" id="contactPhone" class="contact-inc-input cc-phone-input" placeholder="98765 43210" value="{{ old('phone') }}" required autocomplete="tel">
                    </div>
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

                <!-- {{-- Interactive Project Budget Chips --}}
                <div class="contact-inc-group contact-inc-col-full">
                    <label class="contact-inc-label">Estimated Project Budget (Optional)</label>
                    <div class="contact-budget-chips" id="contactBudgetChips">
                        <button type="button" class="budget-chip" data-budget="< $5,000">&lt; $5,000 (MVP / Sprint)</button>
                        <button type="button" class="budget-chip" data-budget="$5,000 - $15,000">$5,000 - $15,000 (Growth)</button>
                        <button type="button" class="budget-chip" data-budget="$15,000 - $35,000">$15,000 - $35,000 (Custom SaaS)</button>
                        <button type="button" class="budget-chip" data-budget="$35,000+ Enterprise">$35,000+ (Enterprise Tier)</button>
                    </div>
                </div> -->

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
            @if($previewMode)
                </fieldset>
            @else
                </form>
            @endif
        </div>
    </div>
</section>

@push('scripts')
<script>
(function () {
  /* ── Country data: flag emoji, name, dial code ── */
  const COUNTRIES = [
    {f:'🇦🇫',n:'Afghanistan',d:'+93'},{f:'🇦🇱',n:'Albania',d:'+355'},{f:'🇩🇿',n:'Algeria',d:'+213'},
    {f:'🇦🇩',n:'Andorra',d:'+376'},{f:'🇦🇴',n:'Angola',d:'+244'},{f:'🇦🇷',n:'Argentina',d:'+54'},
    {f:'🇦🇲',n:'Armenia',d:'+374'},{f:'🇦🇺',n:'Australia',d:'+61'},{f:'🇦🇹',n:'Austria',d:'+43'},
    {f:'🇦🇿',n:'Azerbaijan',d:'+994'},{f:'🇧🇭',n:'Bahrain',d:'+973'},{f:'🇧🇩',n:'Bangladesh',d:'+880'},
    {f:'🇧🇾',n:'Belarus',d:'+375'},{f:'🇧🇪',n:'Belgium',d:'+32'},{f:'🇧🇿',n:'Belize',d:'+501'},
    {f:'🇧🇯',n:'Benin',d:'+229'},{f:'🇧🇹',n:'Bhutan',d:'+975'},{f:'🇧🇴',n:'Bolivia',d:'+591'},
    {f:'🇧🇦',n:'Bosnia & Herzegovina',d:'+387'},{f:'🇧🇼',n:'Botswana',d:'+267'},
    {f:'🇧🇷',n:'Brazil',d:'+55'},{f:'🇧🇳',n:'Brunei',d:'+673'},{f:'🇧🇬',n:'Bulgaria',d:'+359'},
    {f:'🇧🇫',n:'Burkina Faso',d:'+226'},{f:'🇧🇮',n:'Burundi',d:'+257'},{f:'🇰🇭',n:'Cambodia',d:'+855'},
    {f:'🇨🇲',n:'Cameroon',d:'+237'},{f:'🇨🇦',n:'Canada',d:'+1'},{f:'🇨🇻',n:'Cape Verde',d:'+238'},
    {f:'🇨🇫',n:'Central African Republic',d:'+236'},{f:'🇹🇩',n:'Chad',d:'+235'},
    {f:'🇨🇱',n:'Chile',d:'+56'},{f:'🇨🇳',n:'China',d:'+86'},{f:'🇨🇴',n:'Colombia',d:'+57'},
    {f:'🇰🇲',n:'Comoros',d:'+269'},{f:'🇨🇬',n:'Congo',d:'+242'},{f:'🇨🇷',n:'Costa Rica',d:'+506'},
    {f:'🇭🇷',n:'Croatia',d:'+385'},{f:'🇨🇺',n:'Cuba',d:'+53'},{f:'🇨🇾',n:'Cyprus',d:'+357'},
    {f:'🇨🇿',n:'Czech Republic',d:'+420'},{f:'🇩🇰',n:'Denmark',d:'+45'},{f:'🇩🇯',n:'Djibouti',d:'+253'},
    {f:'🇩🇴',n:'Dominican Republic',d:'+1-809'},{f:'🇪🇨',n:'Ecuador',d:'+593'},
    {f:'🇪🇬',n:'Egypt',d:'+20'},{f:'🇸🇻',n:'El Salvador',d:'+503'},{f:'🇬🇶',n:'Equatorial Guinea',d:'+240'},
    {f:'🇪🇷',n:'Eritrea',d:'+291'},{f:'🇪🇪',n:'Estonia',d:'+372'},{f:'🇸🇿',n:'Eswatini',d:'+268'},
    {f:'🇪🇹',n:'Ethiopia',d:'+251'},{f:'🇫🇯',n:'Fiji',d:'+679'},{f:'🇫🇮',n:'Finland',d:'+358'},
    {f:'🇫🇷',n:'France',d:'+33'},{f:'🇬🇦',n:'Gabon',d:'+241'},{f:'🇬🇲',n:'Gambia',d:'+220'},
    {f:'🇬🇪',n:'Georgia',d:'+995'},{f:'🇩🇪',n:'Germany',d:'+49'},{f:'🇬🇭',n:'Ghana',d:'+233'},
    {f:'🇬🇷',n:'Greece',d:'+30'},{f:'🇬🇹',n:'Guatemala',d:'+502'},{f:'🇬🇳',n:'Guinea',d:'+224'},
    {f:'🇬🇾',n:'Guyana',d:'+592'},{f:'🇭🇹',n:'Haiti',d:'+509'},{f:'🇭🇳',n:'Honduras',d:'+504'},
    {f:'🇭🇰',n:'Hong Kong',d:'+852'},{f:'🇭🇺',n:'Hungary',d:'+36'},{f:'🇮🇸',n:'Iceland',d:'+354'},
    {f:'🇮🇳',n:'India',d:'+91'},{f:'🇮🇩',n:'Indonesia',d:'+62'},{f:'🇮🇷',n:'Iran',d:'+98'},
    {f:'🇮🇶',n:'Iraq',d:'+964'},{f:'🇮🇪',n:'Ireland',d:'+353'},{f:'🇮🇱',n:'Israel',d:'+972'},
    {f:'🇮🇹',n:'Italy',d:'+39'},{f:'🇯🇲',n:'Jamaica',d:'+1-876'},{f:'🇯🇵',n:'Japan',d:'+81'},
    {f:'🇯🇴',n:'Jordan',d:'+962'},{f:'🇰🇿',n:'Kazakhstan',d:'+7'},{f:'🇰🇪',n:'Kenya',d:'+254'},
    {f:'🇰🇼',n:'Kuwait',d:'+965'},{f:'🇰🇬',n:'Kyrgyzstan',d:'+996'},{f:'🇱🇦',n:'Laos',d:'+856'},
    {f:'🇱🇻',n:'Latvia',d:'+371'},{f:'🇱🇧',n:'Lebanon',d:'+961'},{f:'🇱🇸',n:'Lesotho',d:'+266'},
    {f:'🇱🇷',n:'Liberia',d:'+231'},{f:'🇱🇾',n:'Libya',d:'+218'},{f:'🇱🇮',n:'Liechtenstein',d:'+423'},
    {f:'🇱🇹',n:'Lithuania',d:'+370'},{f:'🇱🇺',n:'Luxembourg',d:'+352'},{f:'🇲🇴',n:'Macao',d:'+853'},
    {f:'🇲🇬',n:'Madagascar',d:'+261'},{f:'🇲🇼',n:'Malawi',d:'+265'},{f:'🇲🇾',n:'Malaysia',d:'+60'},
    {f:'🇲🇻',n:'Maldives',d:'+960'},{f:'🇲🇱',n:'Mali',d:'+223'},{f:'🇲🇹',n:'Malta',d:'+356'},
    {f:'🇲🇷',n:'Mauritania',d:'+222'},{f:'🇲🇺',n:'Mauritius',d:'+230'},{f:'🇲🇽',n:'Mexico',d:'+52'},
    {f:'🇲🇩',n:'Moldova',d:'+373'},{f:'🇲🇨',n:'Monaco',d:'+377'},{f:'🇲🇳',n:'Mongolia',d:'+976'},
    {f:'🇲🇪',n:'Montenegro',d:'+382'},{f:'🇲🇦',n:'Morocco',d:'+212'},{f:'🇲🇿',n:'Mozambique',d:'+258'},
    {f:'🇲🇲',n:'Myanmar',d:'+95'},{f:'🇳🇦',n:'Namibia',d:'+264'},{f:'🇳🇵',n:'Nepal',d:'+977'},
    {f:'🇳🇱',n:'Netherlands',d:'+31'},{f:'🇳🇿',n:'New Zealand',d:'+64'},{f:'🇳🇮',n:'Nicaragua',d:'+505'},
    {f:'🇳🇪',n:'Niger',d:'+227'},{f:'🇳🇬',n:'Nigeria',d:'+234'},{f:'🇲🇰',n:'North Macedonia',d:'+389'},
    {f:'🇳🇴',n:'Norway',d:'+47'},{f:'🇴🇲',n:'Oman',d:'+968'},{f:'🇵🇰',n:'Pakistan',d:'+92'},
    {f:'🇵🇸',n:'Palestine',d:'+970'},{f:'🇵🇦',n:'Panama',d:'+507'},{f:'🇵🇬',n:'Papua New Guinea',d:'+675'},
    {f:'🇵🇾',n:'Paraguay',d:'+595'},{f:'🇵🇪',n:'Peru',d:'+51'},{f:'🇵🇭',n:'Philippines',d:'+63'},
    {f:'🇵🇱',n:'Poland',d:'+48'},{f:'🇵🇹',n:'Portugal',d:'+351'},{f:'🇶🇦',n:'Qatar',d:'+974'},
    {f:'🇷🇴',n:'Romania',d:'+40'},{f:'🇷🇺',n:'Russia',d:'+7'},{f:'🇷🇼',n:'Rwanda',d:'+250'},
    {f:'🇸🇦',n:'Saudi Arabia',d:'+966'},{f:'🇸🇳',n:'Senegal',d:'+221'},{f:'🇷🇸',n:'Serbia',d:'+381'},
    {f:'🇸🇱',n:'Sierra Leone',d:'+232'},{f:'🇸🇬',n:'Singapore',d:'+65'},{f:'🇸🇰',n:'Slovakia',d:'+421'},
    {f:'🇸🇮',n:'Slovenia',d:'+386'},{f:'🇸🇴',n:'Somalia',d:'+252'},{f:'🇿🇦',n:'South Africa',d:'+27'},
    {f:'🇸🇸',n:'South Sudan',d:'+211'},{f:'🇪🇸',n:'Spain',d:'+34'},{f:'🇱🇰',n:'Sri Lanka',d:'+94'},
    {f:'🇸🇩',n:'Sudan',d:'+249'},{f:'🇸🇷',n:'Suriname',d:'+597'},{f:'🇸🇪',n:'Sweden',d:'+46'},
    {f:'🇨🇭',n:'Switzerland',d:'+41'},{f:'🇸🇾',n:'Syria',d:'+963'},{f:'🇹🇼',n:'Taiwan',d:'+886'},
    {f:'🇹🇯',n:'Tajikistan',d:'+992'},{f:'🇹🇿',n:'Tanzania',d:'+255'},{f:'🇹🇭',n:'Thailand',d:'+66'},
    {f:'🇹🇱',n:'Timor-Leste',d:'+670'},{f:'🇹🇬',n:'Togo',d:'+228'},{f:'🇹🇹',n:'Trinidad & Tobago',d:'+1-868'},
    {f:'🇹🇳',n:'Tunisia',d:'+216'},{f:'🇹🇷',n:'Turkey',d:'+90'},{f:'🇹🇲',n:'Turkmenistan',d:'+993'},
    {f:'🇺🇬',n:'Uganda',d:'+256'},{f:'🇺🇦',n:'Ukraine',d:'+380'},{f:'🇦🇪',n:'United Arab Emirates',d:'+971'},
    {f:'🇬🇧',n:'United Kingdom',d:'+44'},{f:'🇺🇸',n:'United States',d:'+1'},{f:'🇺🇾',n:'Uruguay',d:'+598'},
    {f:'🇺🇿',n:'Uzbekistan',d:'+998'},{f:'🇻🇪',n:'Venezuela',d:'+58'},{f:'🇻🇳',n:'Vietnam',d:'+84'},
    {f:'🇾🇪',n:'Yemen',d:'+967'},{f:'🇿🇲',n:'Zambia',d:'+260'},{f:'🇿🇼',n:'Zimbabwe',d:'+263'},
  ];

  function buildList(data) {
    const list = document.getElementById('ccList');
    if (!list) return;
    list.innerHTML = '';
    data.forEach(c => {
      const li = document.createElement('li');
      li.setAttribute('role', 'option');
      li.setAttribute('data-dial', c.d);
      li.setAttribute('data-flag', c.f);
      li.innerHTML = `<span class="cc-item-flag">${c.f}</span><span class="cc-item-name">${c.n}</span><span class="cc-item-dial">${c.d}</span>`;
      li.addEventListener('mousedown', e => {
        e.preventDefault(); // prevent blur before click
        selectCountry(c.f, c.d);
      });
      list.appendChild(li);
    });
    document.getElementById('ccNoResults').style.display = data.length ? 'none' : 'block';
  }

  function selectCountry(flag, dial) {
    document.getElementById('ccFlag').textContent = flag;
    document.getElementById('ccCode').textContent = dial;
    document.getElementById('contactCountryCode').value = dial;
    // mark selected
    document.querySelectorAll('#ccList li').forEach(li => {
      li.setAttribute('aria-selected', li.getAttribute('data-dial') === dial && li.getAttribute('data-flag') === flag ? 'true' : 'false');
    });
    closePicker();
    document.getElementById('contactPhone').focus();
  }

  function openPicker() {
    const picker = document.getElementById('ccPicker');
    picker.setAttribute('aria-expanded', 'true');
    document.getElementById('ccSearch').value = '';
    buildList(COUNTRIES);
    setTimeout(() => document.getElementById('ccSearch').focus(), 50);
  }

  function closePicker() {
    document.getElementById('ccPicker').setAttribute('aria-expanded', 'false');
  }

  document.addEventListener('DOMContentLoaded', function () {
    buildList(COUNTRIES);

    const picker = document.getElementById('ccPicker');
    if (!picker) return;

    // Toggle on picker click (not on dropdown children)
    picker.addEventListener('click', function (e) {
      if (e.target.closest('.cc-dropdown')) return;
      picker.getAttribute('aria-expanded') === 'true' ? closePicker() : openPicker();
    });

    // Live search
    document.getElementById('ccSearch').addEventListener('input', function () {
      const q = this.value.toLowerCase().trim();
      const filtered = COUNTRIES.filter(c =>
        c.n.toLowerCase().includes(q) || c.d.includes(q)
      );
      buildList(filtered);
    });

    // Close on outside click
    document.addEventListener('click', function (e) {
      if (!picker.contains(e.target)) closePicker();
    });

    // Keyboard: Escape closes
    picker.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closePicker();
    });
  });
})();
</script>
@endpush
