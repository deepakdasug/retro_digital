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
