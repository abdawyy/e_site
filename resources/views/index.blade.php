<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>EgyTechSolutions | {{ __('messages.reserve') }}</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    /* ========================================
       THEME VARIABLES
       ======================================== */
    :root {
      /* Default Dark Mode */
      --primary: #3b82f6;
      --primary-glow: rgba(59, 130, 246, 0.3);
      --bg: #030712;
      --card-bg: rgba(17, 24, 39, 0.8);
      --text: #f8fafc;
      --text-muted: #94a3b8;
      --border: rgba(255, 255, 255, 0.1);
      --nav-bg: rgba(3, 7, 18, 0.9);
      --input-bg: rgba(255, 255, 255, 0.05);
      --mesh-opacity: 0.5;
    }

    /* Light Mode Overrides */
    body.light-mode {
      --bg: #f8fafc;
      --card-bg: rgba(255, 255, 255, 0.95);
      --text: #0f172a;
      --text-muted: #475569;
      --border: rgba(0, 0, 0, 0.1);
      --nav-bg: rgba(248, 250, 252, 0.9);
      --input-bg: #ffffff;
      --mesh-opacity: 0.15;
    }

    /* ========================================
       BASE STYLES
       ======================================== */
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Montserrat', sans-serif; transition: background 0.3s ease, color 0.3s ease, border 0.3s ease; }
    body { background-color: var(--bg); color: var(--text); line-height: 1.6; overflow-x: hidden; }
    h1, h2, h3, h4 { color: var(--text); }

    /* Animated Software Background */
    .bg-mesh {
      position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;
      background: 
        radial-gradient(circle at 10% 10%, var(--primary-glow) 0%, transparent 40%),
        radial-gradient(circle at 90% 90%, #6366f122 0%, transparent 40%);
      opacity: var(--mesh-opacity);
      filter: blur(60px);
    }

    section { padding: 100px 10%; position: relative; }
    h2 { font-size: 2.5rem; margin-bottom: 3.5rem; text-align: center; font-weight: 800; }

    /* ========================================
       COMPONENTS
       ======================================== */
    
    /* Navbar */
    .navbar {
      display: flex; justify-content: space-between; align-items: center;
      padding: 1rem 10%; position: fixed; width: 100%; top: 0; z-index: 1000;
      background: var(--nav-bg); backdrop-filter: blur(15px); border-bottom: 1px solid var(--border);
    }
    .logo { font-weight: 700; font-size: 1.4rem; color: var(--primary); letter-spacing: 1px; }
    .nav-links { display: flex; list-style: none; gap: 2rem; }
    .nav-links a { text-decoration: none; color: var(--text); font-weight: 600; font-size: 0.85rem; }
    .nav-actions { display: flex; align-items: center; gap: 15px; }

    #themeToggle { 
      background: var(--border); border: none; width: 42px; height: 42px; 
      border-radius: 12px; cursor: pointer; color: var(--text); 
      display: flex; align-items: center; justify-content: center; font-size: 1.1rem;
    }

    /* Hero */
    .hero { height: 100vh; display: flex; align-items: center; justify-content: center; text-align: center; }
    .hero h1 { font-size: clamp(2.5rem, 6vw, 4.5rem); font-weight: 800; line-height: 1.1; margin-bottom: 1.5rem; }
    .hero p { color: var(--text-muted); font-size: 1.25rem; max-width: 800px; margin: 0 auto 2.5rem; }
    .cta-btn {
      background: var(--primary); color: white; padding: 1.2rem 2.8rem; border-radius: 14px;
      text-decoration: none; font-weight: 700; display: inline-block; 
      box-shadow: 0 10px 30px var(--primary-glow);
    }

    /* Grid & Glass Cards */
    .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2.5rem; }
    .glass-card {
      background: var(--card-bg); border: 1px solid var(--border); border-radius: 28px;
      overflow: hidden; text-decoration: none; color: inherit; 
      backdrop-filter: blur(10px); transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .glass-card:hover { transform: translateY(-10px); border-color: var(--primary); box-shadow: 0 20px 40px rgba(0,0,0,0.2); }
    .glass-card img { width: 100%; height: 240px; object-fit: cover; }
    .card-content { padding: 2rem; }

    /* Multi-Step Form */
    .form-box {
      max-width: 700px; margin: 0 auto; background: var(--card-bg);
      padding: 4rem; border-radius: 35px; border: 1px solid var(--border);
    }
    .step { display: none; }
    .step.active { display: block; animation: fadeInUp 0.5s ease; }
    
    input, select, textarea {
      width: 100%; padding: 16px; margin-top: 12px; border-radius: 14px;
      border: 1px solid var(--border); background: var(--input-bg);
      color: var(--text); outline: none; font-size: 1rem; margin-bottom: 1.5rem;
    }
    input:focus { border-color: var(--primary); }

    .btn-row { display: flex; gap: 15px; margin-top: 1rem; }
    .next-btn, .submit-btn { background: var(--primary); border: none; color: #fff; padding: 16px 35px; border-radius: 12px; cursor: pointer; font-weight: 700; flex: 1; }
    .prev-btn { background: transparent; border: 1px solid var(--border); color: var(--text-muted); padding: 16px 35px; border-radius: 12px; cursor: pointer; }

    /* Stats */
    .stats { display: flex; justify-content: space-around; flex-wrap: wrap; gap: 40px; text-align: center; }
    .stat-item .num { font-size: 3.5rem; font-weight: 800; color: var(--primary); display: block; }
    .stat-item .label { font-weight: 600; text-transform: uppercase; color: var(--text-muted); font-size: 0.9rem; letter-spacing: 1px; }

    @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
    @media (max-width: 768px) { .nav-links { display: none; } section { padding: 80px 5%; } .form-box { padding: 2rem; } }
  </style>

  <script>
    (function() {
      const savedTheme = localStorage.getItem('theme') || 'dark';
      if (savedTheme === 'light') {
        document.documentElement.classList.add('light-mode');
      }
    })();
  </script>
</head>

<body>
  <div class="bg-mesh"></div>

  <nav class="navbar">
    <div class="logo">EGY TECH</div>
    <ul class="nav-links">
      <li><a href="#hero">{{ __('messages.home') }}</a></li>
      <li><a href="#reservation">{{ __('messages.reserve') }}</a></li>
      <li><a href="#portfolio">{{ __('messages.portfolio') }}</a></li>
      <li><a href="#testimonials">{{ __('messages.about') }}</a></li>
    </ul>
    <div class="nav-actions">
      <button id="themeToggle" title="Toggle Light/Dark Mode">
        <i class="fas fa-moon"></i>
      </button>
      <div class="lang-switcher">
        <a href="{{ url('/lang/en') }}" style="color: {{ app()->getLocale() == 'en' ? 'var(--primary)' : 'var(--text-muted)' }}; text-decoration: none; font-weight: 700; margin: 0 5px;">EN</a>
        <a href="{{ url('/lang/ar') }}" style="color: {{ app()->getLocale() == 'ar' ? 'var(--primary)' : 'var(--text-muted)' }}; text-decoration: none; font-weight: 700; margin: 0 5px;">AR</a>
      </div>
    </div>
  </nav>

  <section id="hero" class="hero">
    <div class="hero-content">
      <h1>{!! __('messages.hero_title') !!}</h1>
      <p>{{ __('messages.hero_subtitle') }}</p>
      <a href="#reservation" class="cta-btn">{{ __('messages.reserve_now') }}</a>
    </div>
  </section>

  <section id="testimonials">
    <h2>Egyptian Client Success</h2>
    <div class="grid">
      <div class="glass-card card-content">
        <i class="fas fa-quote-left" style="color: var(--primary); font-size: 2rem; opacity: 0.3;"></i>
        <p style="margin: 20px 0; font-style: italic;">"The team at EgyTech understood exactly what our Cairo-based startup needed. The booking system doubled our efficiency."</p>
        <h4 style="color: var(--primary);">Mohamed El-Fayed</h4>
        <small style="color: var(--text-muted);">Founder, Cairo Logistics</small>
      </div>
      <div class="glass-card card-content">
        <i class="fas fa-quote-left" style="color: var(--primary); font-size: 2rem; opacity: 0.3;"></i>
        <p style="margin: 20px 0; font-style: italic;">"Highly professional and creative. They designed an e-commerce platform that handles high traffic during our sales events perfectly."</p>
        <h4 style="color: var(--primary);">Nourhan Mansour</h4>
        <small style="color: var(--text-muted);">Marketing Lead, Giza Fashion</small>
      </div>
      <div class="glass-card card-content">
        <i class="fas fa-quote-left" style="color: var(--primary); font-size: 2rem; opacity: 0.3;"></i>
        <p style="margin: 20px 0; font-style: italic;">"Technical expertise is 10/10. They are definitely our go-to software partner for all our digital transformation projects."</p>
        <h4 style="color: var(--primary);">Khaled Ibrahim</h4>
        <small style="color: var(--text-muted);">CTO, Alexandria Tech Hub</small>
      </div>
    </div>
  </section>

  <section id="reservation">
    <div class="form-box">
      <h2>{{ __('messages.reserve_title') }}</h2>
      <form id="reservationForm">
        <div class="step active" data-step="1">
          <label>{{ __('messages.name') }}</label>
          <input type="text" name="name" required placeholder="Full Name">
          <label>{{ __('messages.email') }}</label>
          <input type="email" name="email" required placeholder="email@example.com">
          <label>{{ __('messages.phone') }}</label>
          <input type="tel" name="phone" required placeholder="+20...">
          <button type="button" class="next-btn">{{ __('messages.next') }}</button>
        </div>

        <div class="step" data-step="2">
          <label>{{ __('messages.business_type') }}</label>
          <input type="text" name="business" required placeholder="e.g. Retail, Medical...">
          <label>{{ __('messages.website_features') }}</label>
          <select name="features" multiple required>
            <option value="ecommerce">E-Commerce</option>
            <option value="booking">Booking System</option>
            <option value="portfolio">Portfolio/Gallery</option>
            <option value="custom">Custom Web App</option>
          </select>
          <div class="btn-row">
            <button type="button" class="prev-btn">{{ __('messages.back') }}</button>
            <button type="button" class="next-btn">{{ __('messages.next') }}</button>
          </div>
        </div>

        <div class="step" data-step="3">
          <label>{{ __('messages.any_other_details') }}</label>
          <textarea name="message" rows="4" placeholder="Tell us more about your project..."></textarea>
          <div class="btn-row">
            <button type="button" class="prev-btn">{{ __('messages.back') }}</button>
            <button type="submit" class="submit-btn">{{ __('messages.submit') }}</button>
          </div>
        </div>

        <div class="step" data-step="4">
          <div style="text-align: center; padding: 2rem;">
            <i class="fas fa-check-circle" style="font-size: 4rem; color: #10b981; margin-bottom: 1.5rem;"></i>
            <h3>{{ __('messages.thank_you') }}</h3>
            <p>{{ __('messages.submitted_msg') }}</p>
          </div>
        </div>
      </form>
    </div>
  </section>

  <section id="portfolio">
    <h2>{{ __('messages.portfolio_title') }}</h2>
    <div class="grid">
      <a href="https://hayahfashion.net/" target="_blank" class="glass-card">
        <img src="{{ asset('img/hayah.png') }}" alt="Hayah Fashion">
        <div class="card-content">
          <h3>{{ __('messages.portfolio_hayah_title') }}</h3>
          <p>{{ __('messages.portfolio_hayah_desc') }}</p>
        </div>
      </a>
      <a href="https://lamstoma.com/" target="_blank" class="glass-card">
        <img src="{{ asset('img/oma.png') }}" alt="Lamstoma">
        <div class="card-content">
          <h3>{{ __('messages.portfolio_lamstoma_title') }}</h3>
          <p>{{ __('messages.portfolio_lamstoma_desc') }}</p>
        </div>
      </a>
      <a href="https://jaysbasic.site/" target="_blank" class="glass-card">
        <img src="{{ asset('img/jay.png') }}" alt="Jays Basic">
        <div class="card-content">
          <h3>{{ __('messages.portfolio_jays_title') }}</h3>
          <p>{{ __('messages.portfolio_jays_desc') }}</p>
        </div>
      </a>
    </div>
  </section>

  <section id="about">
    <div class="stats">
      <div class="stat-item"><span class="num">50+</span><span class="label">Projects Done</span></div>
      <div class="stat-item"><span class="num">40+</span><span class="label">Happy Clients</span></div>
      <div class="stat-item"><span class="num">5+</span><span class="label">Years Experience</span></div>
    </div>
  </section>

  <footer style="padding: 5rem 10%; border-top: 1px solid var(--border); text-align: center;">
    <div style="display: flex; justify-content: center; gap: 20px; margin-bottom: 30px;">
      <a href="#" style="color: var(--text); font-size: 1.5rem;"><i class="fab fa-facebook"></i></a>
      <a href="#" style="color: var(--text); font-size: 1.5rem;"><i class="fab fa-instagram"></i></a>
      <a href="https://wa.me/201118038076" style="color: var(--text); font-size: 1.5rem;"><i class="fab fa-whatsapp"></i></a>
    </div>
    <p style="color: var(--text-muted);">&copy; 2025 Egy Tech Solutions. All Rights Reserved.</p>
  </footer>

  <script>
    /* 1. THEME TOGGLE LOGIC */
    const themeBtn = document.getElementById('themeToggle');
    const icon = themeBtn.querySelector('i');
    const body = document.body;

    // Apply the saved theme icon on load
    if (body.classList.contains('light-mode')) {
      icon.classList.replace('fa-moon', 'fa-sun');
    }

    themeBtn.addEventListener('click', () => {
      const isLight = body.classList.toggle('light-mode');
      localStorage.setItem('theme', isLight ? 'light' : 'dark');
      
      // Swap Icon
      if (isLight) {
        icon.classList.replace('fa-moon', 'fa-sun');
      } else {
        icon.classList.replace('fa-sun', 'fa-moon');
      }
    });

    /* 2. MULTI-STEP FORM LOGIC */
    document.addEventListener('DOMContentLoaded', () => {
      const form = document.getElementById('reservationForm');
      const nextBtns = document.querySelectorAll('.next-btn');
      const prevBtns = document.querySelectorAll('.prev-btn');
      const steps = document.querySelectorAll('.step');

      nextBtns.forEach(btn => {
        btn.onclick = () => {
          const currentStep = btn.closest('.step');
          const nextStepNum = parseInt(currentStep.dataset.step) + 1;
          currentStep.classList.remove('active');
          document.querySelector(`[data-step="${nextStepNum}"]`).classList.add('active');
        }
      });

      prevBtns.forEach(btn => {
        btn.onclick = () => {
          const currentStep = btn.closest('.step');
          const prevStepNum = parseInt(currentStep.dataset.step) - 1;
          currentStep.classList.remove('active');
          document.querySelector(`[data-step="${prevStepNum}"]`).classList.add('active');
        }
      });

      // Form Submission logic
      form.onsubmit = async (e) => {
        e.preventDefault();
        
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        try {
          const response = await fetch('/messages', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(data)
          });

          if (response.ok) {
            steps.forEach(s => s.classList.remove('active'));
            document.querySelector('[data-step="4"]').classList.add('active');
          }
        } catch (error) {
          console.error("Submission error:", error);
          alert("Something went wrong. Please try again.");
        }
      };
    });
  </script>
</body>
</html>