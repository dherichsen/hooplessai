// ═══════════════════════════════════════════════════════
// GRADIENT SYSTEM — streaming blobs + scroll repulsion
// ═══════════════════════════════════════════════════════

const canvas = document.getElementById('gradient-canvas');
const ctx = canvas.getContext('2d');

function resize() {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
}
resize();
window.addEventListener('resize', resize);

// ── Color palette (violet spectrum) ──
const COLORS = [
  { r: 139, g: 92,  b: 246 },
  { r: 167, g: 139, b: 250 },
  { r: 124, g: 58,  b: 237 },
  { r: 196, g: 181, b: 253 },
  { r: 109, g: 40,  b: 217 },
];

// ── Purple waves — anchored to the page, scroll with content ──
// Many waves spread across entire document height.
// Each floats gently on its own. Scroll reveals new ones.
const pageH = () => document.body.scrollHeight;
const waves = [];

function generateWaves() {
  waves.length = 0;
  const totalH = pageH();
  // ~1 wave per 250px of document height, scattered randomly
  const count = Math.max(20, Math.floor(totalH / 250));

  for (let i = 0; i < count; i++) {
    const color = COLORS[i % COLORS.length];
    waves.push({
      // Document-space position
      docX: -0.1 + Math.random() * 1.2,
      docY: Math.random() * totalH,
      x: 0, y: 0,
      radius: 160 + Math.random() * 300,
      stretch: 1 + Math.random() * 1.5,         // 1x-2.5x — blobby, not liney
      angle: Math.random() * Math.PI * 2,
      // Parallax: scrolls slightly slower (subtle lag)
      parallax: 0.94 + Math.random() * 0.05,
      // Ambient float — visible gentle movement
      driftSpeedX: 0.04 + Math.random() * 0.08,
      driftSpeedY: 0.03 + Math.random() * 0.06,
      driftPhaseX: Math.random() * Math.PI * 2,
      driftPhaseY: Math.random() * Math.PI * 2,
      driftAmpX: 15 + Math.random() * 30,    // noticeable: 15-45px
      driftAmpY: 10 + Math.random() * 25,    // noticeable: 10-35px
      // Color
      r: color.r, g: color.g, b: color.b,
      alpha: 0.12 + Math.random() * 0.16,
      repelX: 0, repelY: 0,
    });
  }
}
generateWaves();

// ── Cursor (pink) ──
let cursorX = -1, cursorY = -1;
let smoothCX = -1, smoothCY = -1;
let hasCursor = false;
let scrollY = 0;
let time = 0;

document.addEventListener('mousemove', (e) => {
  cursorX = e.clientX; cursorY = e.clientY; hasCursor = true;
}, { passive: true });

window.addEventListener('scroll', () => {
  scrollY = window.scrollY;
}, { passive: true });

function draw() {
  time += 0.006;
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  if (hasCursor) {
    if (smoothCX < 0) { smoothCX = cursorX; smoothCY = cursorY; }
    smoothCX += (cursorX - smoothCX) * 0.08;
    smoothCY += (cursorY - smoothCY) * 0.08;
  }

  const cursorRadius = 220;
  const viewH = canvas.height;

  for (const wave of waves) {
    // Convert document position to screen position with parallax
    const screenX = wave.docX * canvas.width;
    const screenY = wave.docY - scrollY * wave.parallax;

    // Gentle ambient drift
    const driftX = Math.sin(time * wave.driftSpeedX + wave.driftPhaseX) * wave.driftAmpX;
    const driftY = Math.sin(time * wave.driftSpeedY + wave.driftPhaseY) * wave.driftAmpY;

    let baseX = screenX + driftX;
    let baseY = screenY + driftY;

    // Cursor repulsion
    if (hasCursor) {
      const dx = (baseX + wave.repelX) - smoothCX;
      const dy = (baseY + wave.repelY) - smoothCY;
      const dist = Math.sqrt(dx * dx + dy * dy);
      const repelZone = cursorRadius + wave.radius * 0.7 + 80;

      if (dist < repelZone && dist > 1) {
        const force = Math.pow(1 - dist / repelZone, 1.8) * 3;
        wave.repelX += (dx / dist * force * 150 - wave.repelX) * 0.05;
        wave.repelY += (dy / dist * force * 150 - wave.repelY) * 0.05;
      } else {
        wave.repelX *= 0.93;
        wave.repelY *= 0.93;
      }
    }

    // Position is immediate (no easing on scroll), only repulsion eases
    wave.x = baseX + wave.repelX;
    wave.y = baseY + wave.repelY;

    // Skip if offscreen
    const margin = wave.radius * wave.stretch;
    if (wave.y < -margin || wave.y > viewH + margin) continue;

    // Draw
    ctx.save();
    ctx.translate(wave.x, wave.y);
    ctx.rotate(wave.angle);
    ctx.scale(wave.stretch, 1);

    const grad = ctx.createRadialGradient(0, 0, 0, 0, 0, wave.radius);
    grad.addColorStop(0, `rgba(${wave.r}, ${wave.g}, ${wave.b}, ${wave.alpha})`);
    grad.addColorStop(0.3, `rgba(${wave.r}, ${wave.g}, ${wave.b}, ${wave.alpha * 0.55})`);
    grad.addColorStop(0.6, `rgba(${wave.r}, ${wave.g}, ${wave.b}, ${wave.alpha * 0.12})`);
    grad.addColorStop(1, `rgba(${wave.r}, ${wave.g}, ${wave.b}, 0)`);

    ctx.fillStyle = grad;
    const s = wave.radius * wave.stretch * 2;
    ctx.fillRect(-s, -wave.radius * 2, s * 2, wave.radius * 4);
    ctx.restore();
  }

  // ── Cursor blob (pink in light mode, purple in dark mode) ──
  const isDark = document.body.classList.contains('dark');
  if (hasCursor) {
    const cGrad = ctx.createRadialGradient(
      smoothCX, smoothCY, 0, smoothCX, smoothCY, cursorRadius
    );
    if (isDark) {
      // Purple cursor in dark mode
      cGrad.addColorStop(0, 'rgba(139, 92, 246, 0.45)');
      cGrad.addColorStop(0.25, 'rgba(124, 58, 237, 0.25)');
      cGrad.addColorStop(0.5, 'rgba(109, 40, 217, 0.1)');
      cGrad.addColorStop(1, 'rgba(109, 40, 217, 0)');
    } else {
      // Pink cursor in light mode
      cGrad.addColorStop(0, 'rgba(244, 114, 182, 0.4)');
      cGrad.addColorStop(0.25, 'rgba(236, 72, 153, 0.22)');
      cGrad.addColorStop(0.5, 'rgba(219, 39, 119, 0.08)');
      cGrad.addColorStop(1, 'rgba(219, 39, 119, 0)');
    }
    ctx.fillStyle = cGrad;
    ctx.fillRect(0, 0, canvas.width, canvas.height);
  }

  requestAnimationFrame(draw);
}
draw();

// ═══════════════════════════════════════
// ANIMATED FULL-SCREEN MENU
// ═══════════════════════════════════════

const MENU_ITEMS = [
  'Home',
  'About',
  'Services',
  'Insights',
  'Contact',
];

// Build staggered character spans for each menu item
const menuNav = document.getElementById('menu-nav');
const menuLinks = menuNav.querySelectorAll('.menu-item');
menuLinks.forEach((link, i) => {
  const text = MENU_ITEMS[i];
  let html = '';
  for (const char of text) {
    if (char === ' ') {
      html += '<span class="char"><span class="char-inner">&nbsp;</span><span class="char-ghost">&nbsp;</span></span>';
    } else {
      html += `<span class="char"><span class="char-inner">${char}</span><span class="char-ghost">${char}</span></span>`;
    }
  }
  link.innerHTML = html;
});

// Hover: activate item + switch image
const menuImages = document.querySelectorAll('.menu-img');
function setActiveMenuItem(index) {
  menuLinks.forEach((link, i) => {
    if (i === index) {
      link.classList.add('active');
      link.style.color = '#F8F5FF';
    } else {
      link.classList.remove('active');
      link.style.color = 'rgba(248,245,255,0.3)';
    }
  });
  menuImages.forEach((img, i) => {
    img.classList.toggle('active', i === index);
  });
}

menuLinks.forEach((link, i) => {
  link.addEventListener('mouseenter', () => setActiveMenuItem(i));
});

// Burger toggle
const menuBtn = document.getElementById('menu-btn');
const menuOverlay = document.getElementById('menu-overlay');
const logoLink = document.querySelector('header a');
let menuOpen = false;

menuBtn.addEventListener('click', () => {
  menuOpen = !menuOpen;
  menuBtn.classList.toggle('open', menuOpen);
  menuOverlay.classList.toggle('open', menuOpen);
  document.body.style.overflow = menuOpen ? 'hidden' : '';

  // Swap logo color for dark bg
  if (menuOpen) {
    logoLink.style.color = '#F8F5FF';
  } else {
    logoLink.style.color = '';
    // Reset to first item when closing
    setTimeout(() => setActiveMenuItem(0), 500);
  }
});

// ── Navbar scroll bg ──
const headerEl = document.querySelector('header');
window.addEventListener('scroll', () => {
  headerEl.classList.toggle('scrolled', window.scrollY > 20);
}, { passive: true });

// ── Theme toggle ──
const themeToggle = document.getElementById('theme-toggle');
const toggleLabels = themeToggle.querySelectorAll('.toggle-label');
themeToggle.querySelector('.toggle-track').addEventListener('click', () => {
  const isDark = document.body.classList.toggle('dark');
  themeToggle.classList.toggle('dark', isDark);
  toggleLabels[0].classList.toggle('active', !isDark);
  toggleLabels[1].classList.toggle('active', isDark);
});

// ── Scroll-spy reveal (sweep from left) ──
const revealEls = document.querySelectorAll('.reveal');
const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      revealObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.1, rootMargin: '0px 0px -80px 0px' });

// Slightly longer delay for a more cinematic entrance
setTimeout(() => {
  revealEls.forEach(el => revealObserver.observe(el));
}, 150);
