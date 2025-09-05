(function () {
  var STORAGE_KEY = 'sc-theme';
  var root = document.documentElement;
  var btn = document.getElementById('theme-switch');

  // 1) Determine initial theme:
  //    saved -> system preference -> default 'dark'
  function getInitialTheme() {
    try {
      var saved = localStorage.getItem(STORAGE_KEY);
      if (saved === 'light' || saved === 'dark') return saved;
    } catch (e) { }
    var prefersLight = window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches;
    return prefersLight ? 'light' : 'dark';
  }

  function applyTheme(theme) {
    root.setAttribute('data-theme', theme);
    if (btn) btn.setAttribute('aria-pressed', theme === 'dark' ? 'true' : 'false');
  }

  var current = getInitialTheme();
  applyTheme(current);

  // 2) Toggle on click
  if (btn) {
    btn.addEventListener('click', function () {
      current = (root.getAttribute('data-theme') === 'light') ? 'dark' : 'light';
      applyTheme(current);
      try { localStorage.setItem(STORAGE_KEY, current); } catch (e) { }
    });
  }

  // 3) (Optional) react to system preference changes if user hasn't chosen manually
  //    Comment this block out if you don't want auto-adjust later.
  try {
    var media = window.matchMedia('(prefers-color-scheme: light)');
    media.addEventListener('change', function (e) {
      var saved = localStorage.getItem(STORAGE_KEY);
      if (saved !== 'light' && saved !== 'dark') {
        applyTheme(e.matches ? 'light' : 'dark');
      }
    });
  } catch (e) { }
})();

(function () {
  try {
    var k = 'sc-theme', t = localStorage.getItem(k);
    if (!t) {
      t = (window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches) ? 'light' : 'dark';
    }
    document.documentElement.setAttribute('data-theme', t);
  } catch (e) { }
})();


(function () {
  const nav = document.querySelector('.nav');
  if (!nav) return;

  // Add toggle buttons after each parent link
  nav.querySelectorAll('.menu-item-has-children').forEach(li => {
    const a = li.querySelector(':scope > a');
    if (!a) return;

    // Inject button only once
    if (li.querySelector(':scope > .submenuToggle')) return;

    const btn = document.createElement('button');
    btn.className = 'submenuToggle';
    btn.setAttribute('aria-expanded', 'false');
    btn.setAttribute('aria-label', 'Toggle submenu');
    btn.innerHTML = '<svg viewBox="0 0 20 20" aria-hidden="true"><path d="M5 7l5 6 5-6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    a.after(btn);

    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const open = li.classList.toggle('is-open');
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  });

  // Close open submenus if you click outside (optional)
  document.addEventListener('click', (e) => {
    if (!nav.contains(e.target)) {
      nav.querySelectorAll('.menu-item-has-children.is-open').forEach(li => {
        li.classList.remove('is-open');
        const btn = li.querySelector(':scope > .submenuToggle');
        if (btn) btn.setAttribute('aria-expanded', 'false');
      });
    }
  });
})();


(function(){
  const nav = document.querySelector('.nav');
  if (!nav) return;

  // Add a small caret button next to parent links
  nav.querySelectorAll('.menu-item-has-children').forEach(li => {
    const link = li.querySelector(':scope > a');
    if (!link) return;

    // Insert once
    if (li.querySelector(':scope > .submenuToggle')) return;

    const btn = document.createElement('button');
    btn.className = 'submenuToggle';
    btn.setAttribute('aria-expanded','false');
    btn.setAttribute('aria-label','Toggle submenu');
    btn.innerHTML = '<svg viewBox="0 0 20 20" aria-hidden="true"><path d="M5 7l5 6 5-6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>';

    // Only show button on mobile; keep DOM light on desktop
    const mm = window.matchMedia('(max-width: 860px)');
    function placeButton(mq){
      if (mq.matches) {
        link.after(btn);
      } else {
        if (btn.parentNode) btn.parentNode.removeChild(btn);
        li.classList.remove('is-open');
      }
    }
    placeButton(mm);
    mm.addEventListener ? mm.addEventListener('change', placeButton) : mm.addListener(placeButton);

    btn.addEventListener('click', e => {
      e.preventDefault();
      const open = li.classList.toggle('is-open');
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  });

  // Close any open submenus when clicking outside (optional)
  document.addEventListener('click', (e) => {
    if (!nav.contains(e.target)) {
      nav.querySelectorAll('.menu-item-has-children.is-open').forEach(li => {
        li.classList.remove('is-open');
        const b = li.querySelector(':scope > .submenuToggle');
        if (b) b.setAttribute('aria-expanded','false');
      });
    }
  });
})();

function installAppShopify(event) {
  event.preventDefault();
  const form = event.currentTarget;
  const input = form.querySelector('input[name="shop"]');
  if (!input) return;
  let shop = String(input.value || '').trim().toLowerCase();
  const url = `https://app.shopcomponent.com/auth/login?shop=${shop}&utm_source=shopcomponent.com&utm_medium=directInstall`;
  window.open(url, '_blank');

}