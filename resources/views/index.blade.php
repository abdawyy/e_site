<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Site | Reserve Your Dream Website</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Site | {{ __('messages.reserve') }}</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
  <canvas id="interactive-bg"></canvas>
  <nav class="navbar">
    <div class="logo">E-Site</div>
    <ul class="nav-links">
      <li><a href="#hero">{{ __('messages.home') }}</a></li>
      <li><a href="#reservation">{{ __('messages.reserve') }}</a></li>
      <li><a href="#portfolio">{{ __('messages.portfolio') }}</a></li>
      <li><a href="#about">{{ __('messages.about') }}</a></li>
      <li><a href="#contact">{{ __('messages.contact') }}</a></li>
    </ul>
    <div>
      <button id="darkModeToggle" aria-label="{{ __('messages.toggle_dark') }}">
        <span class="toggle-icon">🌙</span>
      </button>
      <a class="text-decoration-none me-2 {{ app()->getLocale() == 'en' ? 'fw-bold text-primary' : 'text-black' }}"
        href="{{ url('/lang/en') }}">EN</a>
      |
      <a class="text-decoration-none ms-2 {{ app()->getLocale() == 'ar' ? 'fw-bold text-primary' : 'text-black' }}"
        href="{{ url('/lang/ar') }}">العربية</a>
    </div>
  </nav>

  <section id="hero" class="hero-section">
    <div class="hero-bg parallax"></div>
    <div class="hero-content fade-in">
      <h1 class="dark-mode">{!! __('messages.hero_title') !!}</h1>
      <p class="dark-mode">{{ __('messages.hero_subtitle') }}</p>
      <a href="#reservation" class="cta-btn">{{ __('messages.reserve_now') }}</a>
    </div>
    <svg class="hero-wave" viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,60 C360,120 1080,0 1440,60 L1440,120 L0,120 Z" fill="#4f8cff" fill-opacity="0.15">
        <animate attributeName="d" dur="6s" repeatCount="indefinite" values="M0,60 C360,120 1080,0 1440,60 L1440,120 L0,120 Z;
                M0,80 C400,40 1040,140 1440,80 L1440,120 L0,120 Z;
                M0,60 C360,120 1080,0 1440,60 L1440,120 L0,120 Z" />
      </path>
    </svg>
        <div class="floating-shapes"></div>

  </section>

  <section id="reservation" class="reservation-section">
    <div class="reservation-container slide-up">
      <h2 class="zoom-in">{{ __('messages.reserve_title') }}</h2>
      <form id="reservationForm">
        <div class="form-step active" data-step="1">
          <label>{{ __('messages.name') }}
            <input type="text" name="name" required placeholder="{{ __('messages.name') }}">
          </label>
          <label>{{ __('messages.email') }}
            <input type="email" name="email" required placeholder="{{ __('messages.email') }}">
          </label>
          <label>{{ __('messages.phone') }}
            <input type="tel" name="phone" required placeholder="{{ __('messages.phone') }}">
          </label>
          <button type="button" class="next-btn">{{ __('messages.next') }}</button>
        </div>
        <div class="form-step" data-step="2">
          <label>{{ __('messages.business_type') }}
            <input type="text" name="business" required placeholder="Restaurant, Portfolio...">
          </label>
          <label>{{ __('messages.website_features') }}
            <select name="features" multiple required>
              <option value="ecommerce">{{ __('messages.feature_ecommerce') }}</option>
              <option value="blog">{{ __('messages.feature_blog') }}</option>
              <option value="booking">{{ __('messages.feature_booking') }}</option>
              <option value="gallery">{{ __('messages.feature_gallery') }}</option>
              <option value="custom">{{ __('messages.feature_custom') }}</option>

            </select>
          </label>
          <button type="button" class="prev-btn">{{ __('messages.back') }}</button>
          <button type="button" class="next-btn">{{ __('messages.next') }}</button>
        </div>
        <div class="form-step" data-step="3">
<label>{{ __('messages.any_other_details') }}
  <input name="message" required placeholder="{{ __('messages.any_other_details') }}">
</label>


          <button type="button" class="prev-btn">{{ __('messages.back') }}</button>
          <button type="submit" class="submit-btn">{{ __('messages.submit') }}</button>
        </div>
        <div class="form-step" data-step="4">
          <div class="success-message">
            <h3 class="dark-mode">{{ __('messages.thank_you') }}</h3>
            <p class="dark-mode">{{ __('messages.submitted_msg') }}</p>
          </div>
        </div>
      </form>
    </div>
  </section>

<section id="portfolio" class="portfolio-section">
  <h2 class="zoom-in">{{ __('messages.portfolio_title') }}</h2>
  <div class="portfolio-filters slide-up">
    <button class="filter-btn active" data-filter="all">{{ __('messages.filter_all') }}</button>
    <button class="filter-btn" data-filter="ecommerce">{{ __('messages.filter_ecommerce') }}</button>
    <button class="filter-btn" data-filter="blog">{{ __('messages.filter_blog') }}</button>
    {{-- <button class="filter-btn" data-filter="corporate">{{ __('messages.filter_corporate') }}</button> --}}
  </div>

  <div class="portfolio-grid">

    <a href="https://hayahfashion.net/" class="portfolio-card fade-in" data-category="ecommerce">
      <img src="{{ asset('img/hayah.png') }}" alt="{{ __('messages.ecommerce_site_alt') }}">
      <div class="card-info">
        <h3 class="dark-mode">{{ __('messages.portfolio_hayah_title') }}</h3>
        <p class="dark-mode">{{ __('messages.portfolio_hayah_desc') }}</p>
      </div>
    </a>

    <a href="https://lamstoma.com/" class="portfolio-card fade-in" data-category="blog">
      <img src="{{ asset('img/oma.png') }}" alt="{{ __('messages.blog_site_alt') }}">
      <div class="card-info">
        <h3 class="dark-mode">{{ __('messages.portfolio_lamstoma_title') }}</h3>
        <p class="dark-mode">{{ __('messages.portfolio_lamstoma_desc') }}</p>
      </div>
    </a>

    <a href="https://jaysbasic.site/" class="portfolio-card fade-in" data-category="ecommerce">
      <img src="{{ asset('img/jay.png') }}" alt="{{ __('messages.ecommerce_site2_alt') }}">
      <div class="card-info">
        <h3 class="dark-mode">{{ __('messages.portfolio_jays_title') }}</h3>
        <p class="dark-mode">{{ __('messages.portfolio_jays_desc') }}</p>
      </div>
    </a>

  </div>
</section>


  <section id="testimonials" class="testimonials-section">
    <h2 class="zoom-in">{{ __('messages.testimonials_title') }}</h2>
    <div class="testimonials-grid">
      <div class="testimonial-card fade-in">
        <p class="dark-mode">{{ __('messages.testimonial1') }}</p>
      </div>
      <div class="testimonial-card fade-in">
        <p class="dark-mode">{{ __('messages.testimonial2') }}</p>
      </div>
      <div class="testimonial-card fade-in">
        <p class="dark-mode">{{ __('messages.testimonial3') }}</p>
      </div>
    </div>
  </section>

  <section id="about" class="about-section">
    <h2 class="zoom-in">{{ __('messages.about_title') }}</h2>
    <div class="about-counters slide-up">
      <div class="counter" data-target="50">
        <span class="count">40</span>+
        <div class="counter-label">{{ __('messages.projects') }}</div>
      </div>
      <div class="counter" data-target="40">
        <span class="count">50</span>+
        <div class="counter-label">{{ __('messages.clients') }}</div>
      </div>
      <div class="counter" data-target="5">
        <span class="count">5</span>+
        <div class="counter-label">{{ __('messages.years') }}</div>
      </div>
    </div>
    <div class="timeline fade-in">
      <div class="timeline-step">
        <div class="timeline-content">
          <h4>1. {{ __('messages.consultation') }}</h4>
          <p class="dark-mode">{{ __('messages.consultation_desc') }}</p>
        </div>
      </div>
      <div class="timeline-step">
        <div class="timeline-content">
          <h4>2. {{ __('messages.design') }}</h4>
          <p class="dark-mode">{{ __('messages.design_desc') }}</p>
        </div>
      </div>
      <div class="timeline-step">
        <div class="timeline-content">
          <h4>3. {{ __('messages.development') }}</h4>
          <p class="dark-mode">{{ __('messages.development_desc') }}</p>
        </div>
      </div>
      <div class="timeline-step">
        <div class="timeline-content">
          <h4>4. {{ __('messages.launch') }}</h4>
          <p class="dark-mode">{{ __('messages.launch_desc') }}</p>
        </div>
      </div>
    </div>
  </section>

<section id="contact" class="contact-section">
  <h2 class="zoom-in">{{ __('messages.contact_title') }}</h2>

  <div class="contact-info fade-in">
    <p class="dark-mode">
      <i class="fas fa-phone-alt"></i>
      <a href="tel:01118038076" class="dark-mode">01118038076</a>
    </p>

    <div class="social-links">
      <a href="https://facebook.com/yourpage" target="_blank" class="social-btn">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://instagram.com/yourpage" target="_blank" class="social-btn">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="https://www.snapchat.com/add/yourusername" target="_blank" class="social-btn">
        <i class="fab fa-snapchat-ghost"></i>
      </a>
      <a href="https://www.tiktok.com/@yourusername" target="_blank" class="social-btn">
        <i class="fab fa-tiktok"></i>
      </a>
      <a href="https://wa.me/201118038076" target="_blank" class="social-btn">
        <i class="fab fa-whatsapp"></i>
      </a>
    </div>
  </div>
</section>


  <footer>
    <p class="dark-mode">&copy; 2025 E-Site. {{ __('messages.footer') }}</p>
  </footer>

  <script src="{{ asset('script.js') }}"></script>
</body>

</html>

</html>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const reservationForm = document.getElementById('reservationForm');
  if (reservationForm) {
    reservationForm.onsubmit = function (e) {
      e.preventDefault();
      console.log('Form submit triggered');

      const steps = reservationForm.querySelectorAll('.form-step');
      let formData = {
        name: reservationForm.querySelector('input[name="name"]').value,
        email: reservationForm.querySelector('input[name="email"]').value,
        phone: reservationForm.querySelector('input[name="phone"]').value,
        business: reservationForm.querySelector('input[name="business"]').value,
        features: Array.from(reservationForm.querySelector('select[name="features"]').selectedOptions).map(opt => opt.value).join(', '),
        message: reservationForm.querySelector('input[name="message"]').value,
      };

      fetch('/messages', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(formData)
      })
      .then(response => response.json())
      .then(data => {
        console.log('Laravel response:', data);
        steps.forEach(s => s.classList.remove('active'));
        reservationForm.querySelector('.form-step[data-step="4"]').classList.add('active');
        reservationForm.querySelector('.progress').style.width = '100%';
        setTimeout(() => { reservationForm.reset(); }, 2000);
      })
      .catch(error => {
        console.error('Error submitting form:', error);
      });
    };
  }
});
</script>