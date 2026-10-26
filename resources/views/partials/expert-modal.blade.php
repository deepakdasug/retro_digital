<div class="modal-backdrop" id="expertModal">
  <div class="modal-card">
    <button class="modal-close-btn icon-only-control" id="modalCloseBtn" aria-label="Close modal" title="Close modal"><i class="fa-solid fa-xmark" aria-hidden="true"></i></button>

    <div class="modal-header">
      <span class="modal-pill">RETROTECH BUSINESS CONSULTATION</span>
      <h2>Connect With Our Experts</h2>
      <p>Discover how Retrotech's automated WhatsApp tools can drive 3x more conversions for your business.</p>
    </div>

    <form class="expert-form" id="expertForm"
      onsubmit="event.preventDefault(); alert('Thank you! Your inquiry has been received. Our expert will contact you shortly.'); document.getElementById('expertModal').classList.remove('active');">      @csrf

      <div class="form-group">
        <label for="clientName">Full Name *</label>
        <input type="text" id="clientName" name="name" placeholder="e.g. Deepak Kumar" required>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="clientPhone">WhatsApp Number *</label>
          <input type="tel" id="clientPhone" name="phone" placeholder="+91 98765 43210" required>
        </div>
        <div class="form-group">
          <label for="companyName">Business / Brand Name</label>
          <input type="text" id="companyName" name="company" placeholder="e.g. Retrotech Digital">
        </div>
      </div>

      <div class="form-group">
        <label for="clientGoal">Primary Goal</label>
        <select id="clientGoal" name="goal">
          <option value="broadcast">Automated Broadcasts & Promotional Campaigns</option>
          <option value="chatbot">AI WhatsApp Chatbots & Auto-Replies</option>
          <option value="lead-gen">Lead Generation & Sales Closing</option>
          <option value="ecom">E-commerce Order Alerts & Abandoned Cart Recovery</option>
          <option value="api">Custom WhatsApp Cloud API Integration</option>
        </select>
      </div>

      <button type="submit" class="submit-expert-btn">
        <span>Schedule Expert Consultation</span>
        <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
      </button>

      <p class="modal-disclaimer">
        Certified WhatsApp Business API solution. No spam.
      </p>
    </form>
  </div>
</div>
