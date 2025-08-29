// Dark mode toggle
const darkModeToggle = document.getElementById('darkModeToggle');
const body = document.body;
const icon = darkModeToggle.querySelector('.toggle-icon');

function setDarkMode(enabled) {
  if (enabled) {
    body.classList.add('dark-mode');
    icon.textContent = '☀️';
    localStorage.setItem('darkMode', 'true');
  } else {
    body.classList.remove('dark-mode');
    icon.textContent = '🌙';
    localStorage.setItem('darkMode', 'false');
  }
}

darkModeToggle.addEventListener('click', () => {
  setDarkMode(!body.classList.contains('dark-mode'));
});

// On load, set dark mode from localStorage
window.addEventListener('DOMContentLoaded', () => {
  const dark = localStorage.getItem('darkMode') === 'true';
  setDarkMode(dark);
});

// Smooth scroll for nav links
const navLinks = document.querySelectorAll('.nav-links a');
navLinks.forEach(link => {
  link.addEventListener('click', function(e) {
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth' });
    }
  });
});

// Reservation Form Interactivity
const form = document.getElementById('reservationForm');
if (form) {
  const steps = Array.from(form.querySelectorAll('.form-step'));
  const nextBtns = form.querySelectorAll('.next-btn');
  const prevBtns = form.querySelectorAll('.prev-btn');
  const progress = form.querySelector('.progress');
  let currentStep = 0;

  function showStep(idx) {
    steps.forEach((step, i) => {
      step.classList.toggle('active', i === idx);
    });
    // Progress bar
    const percent = ((idx) / (steps.length - 2)) * 100;
    if (progress) progress.style.width = percent + '%';
  }

  nextBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      // Validate current step
      const inputs = steps[currentStep].querySelectorAll('input, select');
      let valid = true;
      inputs.forEach(input => {
        if (!input.checkValidity()) {
          input.reportValidity();
          valid = false;
        }
      });
      if (!valid) return;
      if (currentStep < steps.length - 2) {
        currentStep++;
        showStep(currentStep);
      }
    });
  });
  prevBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      if (currentStep > 0) {
        currentStep--;
        showStep(currentStep);
      }
    });
  });
  form.addEventListener('submit', e => {
    e.preventDefault();
    // Optionally, send data to backend here
    currentStep = steps.length - 1;
    showStep(currentStep);
    if (progress) progress.style.width = '100%';
    setTimeout(() => {
      form.reset();
      currentStep = 0;
      showStep(currentStep);
      if (progress) progress.style.width = '0%';
    }, 4000);
  });
  // Initialize
  showStep(currentStep);
}

// Scroll-triggered Animations
function animateOnScroll() {
  const animatedEls = document.querySelectorAll('.fade-in, .slide-up, .zoom-in');
  const windowHeight = window.innerHeight;
  animatedEls.forEach(el => {
    const rect = el.getBoundingClientRect();
    if (rect.top < windowHeight - 80) {
      el.classList.add('visible');
    } else {
      el.classList.remove('visible');
    }
  });
}
window.addEventListener('scroll', animateOnScroll);
window.addEventListener('DOMContentLoaded', animateOnScroll);

// Portfolio Filtering
const filterBtns = document.querySelectorAll('.filter-btn');
const portfolioCards = document.querySelectorAll('.portfolio-card');
filterBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    filterBtns.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    const filter = btn.getAttribute('data-filter');
    portfolioCards.forEach(card => {
      if (filter === 'all' || card.getAttribute('data-category') === filter) {
        card.style.display = '';
        setTimeout(() => card.classList.add('visible'), 10);
      } else {
        card.classList.remove('visible');
        setTimeout(() => card.style.display = 'none', 400);
      }
    });
  });
});
// Lightbox
const lightbox = document.getElementById('lightbox');
const lightboxImg = document.querySelector('.lightbox-img');
const lightboxCaption = document.querySelector('.lightbox-caption');
const closeBtn = document.querySelector('.lightbox .close');
portfolioCards.forEach(card => {
  card.addEventListener('click', () => {
    const img = card.querySelector('img');
    lightboxImg.src = img.src;
    lightboxCaption.textContent = card.querySelector('h3').textContent + ' - ' + card.querySelector('p').textContent;
    lightbox.classList.add('active');
  });
});
closeBtn.addEventListener('click', () => {
  lightbox.classList.remove('active');
});
lightbox.addEventListener('click', e => {
  if (e.target === lightbox) lightbox.classList.remove('active');
});
// Animated Counters
function animateCounters() {
  const counters = document.querySelectorAll('.counter .count');
  counters.forEach(counter => {
    const parent = counter.closest('.counter');
    const target = +parent.getAttribute('data-target');
    let started = parent.getAttribute('data-animated');
    if (!started && parent.getBoundingClientRect().top < window.innerHeight - 60) {
      parent.setAttribute('data-animated', 'true');
      let count = 0;
      const step = Math.ceil(target / 60);
      function update() {
        count += step;
        if (count > target) count = target;
        counter.textContent = count;
        if (count < target) requestAnimationFrame(update);
      }
      update();
    }
  });
}
window.addEventListener('scroll', animateCounters);
window.addEventListener('DOMContentLoaded', animateCounters);
// Parallax Hero
const heroBg = document.querySelector('.hero-bg.parallax');
window.addEventListener('scroll', () => {
  if (heroBg) {
    const y = window.scrollY * 0.3;
    heroBg.style.backgroundPosition = `center ${y}px`;
  }
});

// Floating Shapes Effect
function createFloatingShapes() {
  const container = document.querySelector('.floating-shapes');
  if (!container) return;
  const colors = ['#4f8cff', '#ff6f91', '#c3cfe2', '#fff'];
  for (let i = 0; i < 8; i++) {
    const shape = document.createElement('div');
    shape.className = 'floating-shape';
    const size = Math.random() * 40 + 30;
    shape.style.width = `${size}px`;
    shape.style.height = `${size}px`;
    shape.style.left = `${Math.random() * 90}%`;
    shape.style.top = `${Math.random() * 60 + 10}%`;
    shape.style.background = colors[Math.floor(Math.random() * colors.length)];
    shape.style.animationDuration = `${10 + Math.random() * 8}s`;
    shape.style.animationDelay = `${Math.random() * 6}s`;
    container.appendChild(shape);
  }
}
window.addEventListener('DOMContentLoaded', createFloatingShapes);

// Interactive Canvas Background (Particles)
function interactiveBgParticles() {
  const canvas = document.getElementById('interactive-bg');
  if (!canvas) return;
  const ctx = canvas.getContext('2d');
  let width = window.innerWidth;
  let height = window.innerHeight;
  let particles = [];
  const numParticles = 48;
  const maxDist = 120;
  let mouse = { x: width/2, y: height/2 };
  let scrollY = window.scrollY;

  function resize() {
    width = window.innerWidth;
    height = window.innerHeight;
    canvas.width = width;
    canvas.height = height;
  }
  window.addEventListener('resize', resize);
  resize();

  function randomColor() {
    return [
      'rgba(79,140,255,0.7)',
      'rgba(255,111,145,0.7)',
      'rgba(195,207,226,0.7)',
      'rgba(255,255,255,0.5)'
    ][Math.floor(Math.random()*4)];
  }

  function Particle() {
    this.x = Math.random() * width;
    this.y = Math.random() * height;
    this.baseVx = (Math.random() - 0.5) * 0.7;
    this.baseVy = (Math.random() - 0.5) * 0.7;
    this.vx = this.baseVx;
    this.vy = this.baseVy;
    this.baseRadius = Math.random() * 2.5 + 1.5;
    this.radius = this.baseRadius;
    this.color = randomColor();
  }
  Particle.prototype.draw = function() {
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.radius, 0, 2 * Math.PI);
    ctx.fillStyle = this.color;
    ctx.fill();
  };
  Particle.prototype.update = function(scrollRatio) {
    // Speed up and grow with scroll
    this.vx = this.baseVx * (1 + scrollRatio * 1.5);
    this.vy = this.baseVy * (1 + scrollRatio * 1.5);
    this.radius = this.baseRadius * (1 + scrollRatio * 0.7);
    this.x += this.vx;
    this.y += this.vy;
    if (this.x < 0 || this.x > width) this.vx *= -1;
    if (this.y < 0 || this.y > height) this.vy *= -1;
  };

  function initParticles() {
    particles = [];
    for (let i = 0; i < numParticles; i++) {
      particles.push(new Particle());
    }
  }
  initParticles();

  canvas.addEventListener('mousemove', e => {
    mouse.x = e.offsetX;
    mouse.y = e.offsetY;
  });
  canvas.addEventListener('mouseleave', () => {
    mouse.x = width/2;
    mouse.y = height/2;
  });

  window.addEventListener('scroll', () => {
    scrollY = window.scrollY;
  });

  function drawLines(scrollRatio) {
    for (let i = 0; i < particles.length; i++) {
      for (let j = i + 1; j < particles.length; j++) {
        const dx = particles[i].x - particles[j].x;
        const dy = particles[i].y - particles[j].y;
        const dist = Math.sqrt(dx*dx + dy*dy);
        if (dist < maxDist) {
          ctx.beginPath();
          ctx.moveTo(particles[i].x, particles[i].y);
          ctx.lineTo(particles[j].x, particles[j].y);
          // Animate color with scroll
          ctx.strokeStyle = `rgba(79,140,255,${0.13 + scrollRatio * 0.2})`;
          ctx.lineWidth = 1.2 + scrollRatio * 1.2;
          ctx.stroke();
        }
      }
      // Mouse interaction
      const dxm = particles[i].x - mouse.x;
      const dym = particles[i].y - mouse.y;
      const distm = Math.sqrt(dxm*dxm + dym*dym);
      if (distm < maxDist * 0.8) {
        ctx.beginPath();
        ctx.moveTo(particles[i].x, particles[i].y);
        ctx.lineTo(mouse.x, mouse.y);
        ctx.strokeStyle = `rgba(255,111,145,${0.18 + scrollRatio * 0.2})`;
        ctx.lineWidth = 1.2 + scrollRatio * 1.2;
        ctx.stroke();
      }
    }
  }

  function animate() {
    ctx.clearRect(0, 0, width, height);
    // Calculate scroll ratio (0 at top, up to ~1 at 1000px scroll)
    const scrollRatio = Math.min(1, scrollY / 1000);
    for (let p of particles) {
      p.update(scrollRatio);
      p.draw();
    }
    drawLines(scrollRatio);
    requestAnimationFrame(animate);
  }
  animate();
}
window.addEventListener('DOMContentLoaded', interactiveBgParticles);

// Navbar scroll effect
window.addEventListener('scroll', () => {
  const navbar = document.querySelector('.navbar');
  if (window.scrollY > 10) {
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }
});

// Modal logic
const signInModal = document.getElementById('signInModal');
const signUpModal = document.getElementById('signUpModal');
const signInNav = document.getElementById('signInNav');
const signUpNav = document.getElementById('signUpNav');
const dashboardLink = document.getElementById('dashboardLink');
const closeSignIn = document.getElementById('closeSignIn');
const closeSignUp = document.getElementById('closeSignUp');
const switchToSignUp = document.getElementById('switchToSignUp');
const switchToSignIn = document.getElementById('switchToSignIn');

function showModal(modal) {
  modal.style.display = 'flex';
}
function closeModal(modal) {
  modal.style.display = 'none';
}

signInNav.onclick = (e) => { e.preventDefault(); showModal(signInModal); };
signUpNav.onclick = (e) => { e.preventDefault(); showModal(signUpModal); };
closeSignIn.onclick = () => closeModal(signInModal);
closeSignUp.onclick = () => closeModal(signUpModal);
switchToSignUp.onclick = (e) => { e.preventDefault(); closeModal(signInModal); showModal(signUpModal); };
switchToSignIn.onclick = (e) => { e.preventDefault(); closeModal(signUpModal); showModal(signInModal); };
window.onclick = function(event) {
  if (event.target === signInModal) closeModal(signInModal);
  if (event.target === signUpModal) closeModal(signUpModal);
};

// Demo Auth Logic
function setLoggedIn(loggedIn) {
  if (loggedIn) {
    localStorage.setItem('loggedIn', 'true');
    dashboardLink.style.display = '';
    signInNav.style.display = 'none';
    signUpNav.style.display = 'none';
  } else {
    localStorage.removeItem('loggedIn');
    dashboardLink.style.display = 'none';
    signInNav.style.display = '';
    signUpNav.style.display = '';
  }
}
if (localStorage.getItem('loggedIn')) setLoggedIn(true);
else setLoggedIn(false);

document.getElementById('signInForm').onsubmit = function(e) {
  e.preventDefault();
  // Demo: any email/password logs in
  setLoggedIn(true);
  closeModal(signInModal);
};
document.getElementById('signUpForm').onsubmit = function(e) {
  e.preventDefault();
  // Demo: any signup logs in
  setLoggedIn(true);
  closeModal(signUpModal);
};
// Optionally, add a logout button in dashboard.html 

// Reservation form submission: save to localStorage for dashboard
// const reservationForm = document.getElementById('reservationForm');

// if (reservationForm) {
//   reservationForm.onsubmit = function (e) {
//     e.preventDefault();

//     const steps = reservationForm.querySelectorAll('.form-step');
//     let formData = {};

//     formData.name = reservationForm.querySelector('input[name="name"]').value;
//     formData.email = reservationForm.querySelector('input[name="email"]').value;
//     formData.phone = reservationForm.querySelector('input[name="phone"]').value;
//     formData.business = reservationForm.querySelector('input[name="business"]').value;

//     const featuresSelect = reservationForm.querySelector('select[name="features"]');
//     formData.features = Array.from(featuresSelect.selectedOptions).map(opt => opt.value).join(', ');

//     formData.budget = reservationForm.querySelector('input[name="budget"]').value;
//     formData.deadline = reservationForm.querySelector('input[name="deadline"]').value;
//     console.log(formData);

//     // Send data via AJAX to Laravel controller
//     fetch('/messages', {
//       method: 'POST',
//       headers: {
//         'Content-Type': 'application/json',
//         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//       },
//       body: JSON.stringify(formData)
//     })
//     .then(response => response.json())
//     .then(data => {
//       console.log('Laravel response:', data);
//       steps.forEach(s => s.classList.remove('active'));
//       reservationForm.querySelector('.form-step[data-step="4"]').classList.add('active');
//       reservationForm.querySelector('.progress').style.width = '100%';
//       setTimeout(() => { reservationForm.reset(); }, 2000);
//     })
//     .catch(error => {
//       console.error('Error submitting form:', error);
//     });
//   };
// }

