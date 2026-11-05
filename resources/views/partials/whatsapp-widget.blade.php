<div class="whatsapp-floating-wrapper" id="whatsappWrapper">
  <div class="wa-radar-ring"></div>
  <div class="wa-radar-ring ring-2"></div>

  <button class="whatsapp-btn" id="whatsappBtn" aria-label="Chat on WhatsApp" title="Chat with Retrotech Specialists">
    <img src="{{ asset('assets/images/wtsp_logo.webp') }}" alt="WhatsApp" style="width:32px;height:32px;display:block;">
  </button>

  <div class="wa-popup-bubble" id="waBubble">
    <div class="wa-bubble-header">
      <div class="wa-avatar">
        <img src="{{ asset('assets/images/wtsp_logo.webp') }}" alt="WhatsApp" style="width:22px;height:22px;display:block;">
        <span class="online-indicator"></span>
      </div>
      <div class="wa-info">
        <strong>Retrotech Expert</strong>
        <small>Typically replies in under 5 mins</small>
      </div>
      <button class="wa-close-btn icon-only-control" id="waCloseBubble" aria-label="Close message" title="Close message"><i class="fa-solid fa-xmark" aria-hidden="true"></i></button>
    </div>
    <div class="wa-bubble-body">
      <p>👋 Looking to automate customer messages and sell smarter on WhatsApp?</p>
      
      {{-- 2026 Interactive Quick-Prompt Selection Pills --}}
      <div class="wa-prompt-pills">
        <a href="https://wa.me/+919973960072?text=Hi%20Retrotech%2C%20I%20need%20a%20fast%20website%20or%20app%20development%20delivery" 
           target="_blank" rel="noopener noreferrer" class="wa-prompt-pill">
          <span>⚡ Urgent Web / App Project</span>
        </a>
        <a href="https://wa.me/+919973960072?text=Hi%20Retrotech%2C%20I%20would%20like%20a%20free%20technical%20architecture%20and%20cost%20estimate" 
           target="_blank" rel="noopener noreferrer" class="wa-prompt-pill">
          <span>💬 Cost &amp; Sprint Estimate</span>
        </a>
        <a href="https://wa.me/+919973960072?text=Hi%20Retrotech%2C%20I%20want%20to%20hire%20dedicated%20senior%20software%20engineers" 
           target="_blank" rel="noopener noreferrer" class="wa-prompt-pill">
          <span>🚀 Hire Senior Dedicated Devs</span>
        </a>
      </div>
    </div>
    <a href="https://wa.me/+919973960072?text=Hi%20Retrotech%2C%20I%20am%20interested%20in%20connecting%20with%20an%20expert%20for%20WhatsApp%20marketing%20tools"
       target="_blank"
       rel="noopener noreferrer"
       class="wa-bubble-action icon-label-control" aria-label="Start WhatsApp chat" title="Start WhatsApp chat">
      <img src="{{ asset('assets/images/wtsp_logo.webp') }}" alt="" aria-hidden="true" style="width:24px;height:24px;display:block;">
      <span>Start WhatsApp chat</span>
    </a>
  </div>
</div>
