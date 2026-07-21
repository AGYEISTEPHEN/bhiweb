/* ============================================================
   assets/js/bhi-main.js
   Bono Heart Initiative — Frontend AJAX Controller
   Handles: newsletter, contact form, screening registration,
   partnership enquiry, outreach programs feed, gallery feed
   ============================================================ */

const BHI = {
  apiBase: '/bhiweb/api',   // adjust to your XAMPP folder, e.g. http://localhost/bhi/api

  // ── Generic POST helper ─────────────────────────────────────
  async post(endpoint, formData) {
    try {
      const res = await fetch(`${this.apiBase}/${endpoint}`, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        body: formData,
      });
      return await res.json();
    } catch (err) {
      return { success: false, message: 'Network error. Please check your connection and try again.' };
    }
  },

  // ── Generic GET helper ──────────────────────────────────────
  async get(endpoint, params = {}) {
    try {
      const qs = new URLSearchParams(params).toString();
      const res = await fetch(`${this.apiBase}/${endpoint}${qs ? '?' + qs : ''}`, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
      });
      return await res.json();
    } catch (err) {
      return { success: false, message: 'Network error.' };
    }
  },

  // ── Toast notification ──────────────────────────────────────
  toast(message, type = 'success') {
    let el = document.getElementById('bhi-toast');
    if (!el) {
      el = document.createElement('div');
      el.id = 'bhi-toast';
      el.style.cssText = `
        position:fixed;bottom:24px;right:24px;z-index:99999;
        padding:14px 22px;border-radius:8px;font-family:'Source Sans 3',sans-serif;
        font-size:.92rem;font-weight:600;max-width:340px;
        box-shadow:0 8px 28px rgba(0,0,0,.18);transform:translateY(20px);opacity:0;
        transition:all .3s ease;`;
      document.body.appendChild(el);
    }
    el.style.background = type === 'success' ? '#2E8B57' : '#C8102E';
    el.style.color = '#fff';
    el.textContent = message;
    requestAnimationFrame(() => { el.style.transform = 'translateY(0)'; el.style.opacity = '1'; });
    clearTimeout(this._toastTimer);
    this._toastTimer = setTimeout(() => {
      el.style.transform = 'translateY(20px)'; el.style.opacity = '0';
    }, 4500);
  },

  // ── Button loading state ─────────────────────────────────────
  setLoading(btn, loading, loadingText = 'Sending...') {
    if (loading) {
      btn.dataset.originalText = btn.textContent;
      btn.textContent = loadingText;
      btn.disabled = true;
      btn.style.opacity = '.7';
    } else {
      btn.textContent = btn.dataset.originalText || btn.textContent;
      btn.disabled = false;
      btn.style.opacity = '1';
    }
  },

  // ── Show inline field errors ─────────────────────────────────
  showFieldErrors(form, errors) {
    form.querySelectorAll('.bhi-field-error').forEach(e => e.remove());
    form.querySelectorAll('.bhi-error-input').forEach(e => e.classList.remove('bhi-error-input'));
    Object.entries(errors || {}).forEach(([field, msg]) => {
      const input = form.querySelector(`[name="${field}"]`);
      if (input) {
        input.classList.add('bhi-error-input');
        const err = document.createElement('div');
        err.className = 'bhi-field-error';
        err.style.cssText = 'color:#C8102E;font-size:.78rem;margin-top:.3rem';
        err.textContent = msg;
        input.parentNode.appendChild(err);
      }
    });
  },

  // ============================================================
  // NEWSLETTER SUBSCRIPTION
  // ============================================================
  initNewsletterForms() {
    document.querySelectorAll('[data-bhi-form="newsletter"]').forEach(form => {
      form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const btn = form.querySelector('button[type="submit"]');
        const fd  = new FormData(form);
        fd.set('source', form.dataset.source || 'footer');
        this.setLoading(btn, true, 'Subscribing...');
        const res = await this.post('subscribe.php', fd);
        this.setLoading(btn, false);
        this.toast(res.message, res.success ? 'success' : 'error');
        if (res.success) form.reset();
      });
    });
  },

  // ============================================================
  // CONTACT FORM
  // ============================================================
  initContactForm() {
    const form = document.querySelector('[data-bhi-form="contact"]');
    if (!form) return;
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const btn = form.querySelector('button[type="submit"]');
      const fd  = new FormData(form);
      this.setLoading(btn, true);
      const res = await this.post('contact.php', fd);
      this.setLoading(btn, false);
      this.toast(res.message, res.success ? 'success' : 'error');
      if (res.success) {
        form.reset();
        this.showFieldErrors(form, {});
      } else if (res.data && res.data.errors) {
        this.showFieldErrors(form, res.data.errors);
      }
    });
  },

  // ============================================================
  // SCREENING REGISTRATION
  // ============================================================
  initScreeningForm() {
    const form = document.querySelector('[data-bhi-form="screening"]');
    if (!form) return;
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const btn = form.querySelector('button[type="submit"]');
      const fd  = new FormData(form);
      this.setLoading(btn, true, 'Registering...');
      const res = await this.post('register_screening.php', fd);
      this.setLoading(btn, false);
      this.toast(res.message, res.success ? 'success' : 'error');
      if (res.success) {
        form.reset();
        this.showFieldErrors(form, {});
      } else if (res.data && res.data.errors) {
        this.showFieldErrors(form, res.data.errors);
      }
    });
  },

  // ============================================================
  // PARTNERSHIP ENQUIRY
  // ============================================================
  initPartnerForm() {
    const form = document.querySelector('[data-bhi-form="partner"]');
    if (!form) return;
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const btn = form.querySelector('button[type="submit"]');
      const fd  = new FormData(form);
      this.setLoading(btn, true);
      const res = await this.post('partner_enquiry.php', fd);
      this.setLoading(btn, false);
      this.toast(res.message, res.success ? 'success' : 'error');
      if (res.success) form.reset();
      else if (res.data && res.data.errors) this.showFieldErrors(form, res.data.errors);
    });
  },

  // ============================================================
  // OUTREACH PROGRAMS FEED
  // ============================================================
  async loadOutreachPrograms(containerId = 'outreach-programs-grid', status = 'all') {
    const container = document.getElementById(containerId);
    if (!container) return;
    container.innerHTML = `<div class="bhi-loading">Loading outreach programs…</div>`;

    const res = await this.get('outreach.php', { action: 'list', status });
    if (!res.success || !res.data.programs.length) {
      container.innerHTML = `<p class="bhi-empty">No outreach programs to display right now. Check back soon.</p>`;
      return;
    }

    const typeLabels = {
      community_screening: 'Community Screening',
      school_outreach: 'School Outreach',
      market_screening: 'Market Screening',
      church_outreach: 'Church Outreach',
      clinic_day: 'Clinic Day',
      awareness_campaign: 'Awareness Campaign',
      other: 'Outreach Program',
    };
    const statusColors = { upcoming: '#E6A817', ongoing: '#1B2F6E', completed: '#2E8B57', cancelled: '#94a3b8' };

    container.innerHTML = res.data.programs.map(p => {
      const date = new Date(p.scheduled_date).toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
      const pct = p.screening_target ? Math.min(100, Math.round((p.screened_count / p.screening_target) * 100)) : null;
      const img = p.cover_image
        ? `/bhiweb/uploads/outreach/${p.cover_image}`
        : 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=500&q=70';

      return `
      <div class="outreach-card" data-id="${p.id}">
        <div class="outreach-card-img" style="background-image:url('${img}')">
          <span class="outreach-badge" style="background:${statusColors[p.status] || '#94a3b8'}">${p.status}</span>
        </div>
        <div class="outreach-card-body">
          <span class="outreach-type">${typeLabels[p.program_type] || p.program_type}</span>
          <h3>${this.esc(p.title)}</h3>
          <p class="outreach-loc">📍 ${this.esc(p.community)}, ${this.esc(p.district)}</p>
          <p class="outreach-date">🗓️ ${date}${p.scheduled_time ? ' · ' + p.scheduled_time.slice(0,5) : ''}</p>
          ${p.summary ? `<p class="outreach-summary">${this.esc(p.summary)}</p>` : ''}
          ${pct !== null ? `
            <div class="outreach-progress">
              <div class="outreach-progress-bar"><div style="width:${pct}%"></div></div>
              <span>${p.screened_count} / ${p.screening_target} screened</span>
            </div>` : ''}
          <div class="outreach-card-actions">
            ${p.registration_open && p.open_sessions > 0
              ? `<button class="btn-outreach-register" onclick="BHI.openScreeningModal(${p.id})">Register for Screening →</button>`
              : `<span class="outreach-closed">${p.status === 'completed' ? 'Program completed' : 'Registration closed'}</span>`}
          </div>
        </div>
      </div>`;
    }).join('');
  },

  // ── Filter tabs for outreach ──────────────────────────────────
  initOutreachFilters() {
    const tabs = document.querySelectorAll('[data-outreach-filter]');
    if (!tabs.length) return;
    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        this.loadOutreachPrograms('outreach-programs-grid', tab.dataset.outreachFilter);
      });
    });
  },

  // ── Open registration modal pre-filled with sessions ─────────
  async openScreeningModal(programId) {
    const res = await this.get('outreach.php', { action: 'get', id: programId });
    if (!res.success) { this.toast('Could not load program details.', 'error'); return; }

    const { program, sessions } = res.data;
    const modal = document.getElementById('bhi-screening-modal');
    if (!modal) {
      // If no modal exists on page, just scroll to the screening section
      document.getElementById('screening')?.scrollIntoView({ behavior: 'smooth' });
      return;
    }

    modal.querySelector('.bhi-modal-title').textContent = program.title;
    const sessionSelect = modal.querySelector('select[name="session_id"]');
    sessionSelect.innerHTML = sessions.length
      ? sessions.map(s => {
          const d = new Date(s.session_date).toLocaleDateString('en-GB', { day:'numeric', month:'short', year:'numeric' });
          const remaining = s.slots_total - s.slots_booked;
          return `<option value="${s.id}" ${remaining <= 0 ? 'disabled' : ''}>
            ${d}${s.session_time ? ' · ' + s.session_time.slice(0,5) : ''} — ${remaining > 0 ? remaining + ' slots left' : 'FULL'}
          </option>`;
        }).join('')
      : '<option disabled>No open sessions</option>';

    modal.style.display = 'flex';
  },

  closeScreeningModal() {
    const modal = document.getElementById('bhi-screening-modal');
    if (modal) modal.style.display = 'none';
  },

  // ============================================================
  // GALLERY FEED
  // ============================================================
  async loadGallery(containerId = 'gallery-grid', categoryId = 0, page = 1) {
    const container = document.getElementById(containerId);
    if (!container) return;
    container.innerHTML = `<div class="bhi-loading">Loading gallery…</div>`;

    const res = await this.get('gallery.php', { action: 'list', category_id: categoryId, page, per_page: 12 });
    if (!res.success || !res.data.images.length) {
      container.innerHTML = `<p class="bhi-empty">No images in this category yet.</p>`;
      return;
    }

    container.innerHTML = res.data.images.map((img, i) => `
      <div class="gallery-item" onclick="BHI.openLightbox(${i})" data-full="${img.url}" data-caption="${this.esc(img.caption || '')}">
        <img src="${img.url}" alt="${this.esc(img.alt_text || img.category_name)}" loading="lazy">
        <div class="gallery-overlay">
          <span>${this.esc(img.category_name)}</span>
        </div>
      </div>
    `).join('');

    this._galleryImages = res.data.images;
    this.renderGalleryPagination(containerId, categoryId, res.data.pagination);
  },

  renderGalleryPagination(containerId, categoryId, pag) {
    const wrap = document.getElementById(containerId + '-pagination');
    if (!wrap) return;
    if (pag.total_pages <= 1) { wrap.innerHTML = ''; return; }
    let html = '';
    for (let i = 1; i <= pag.total_pages; i++) {
      html += `<button class="gallery-page-btn ${i === pag.page ? 'active' : ''}"
                onclick="BHI.loadGallery('${containerId}', ${categoryId}, ${i})">${i}</button>`;
    }
    wrap.innerHTML = html;
  },

  initGalleryFilters() {
    const tabs = document.querySelectorAll('[data-gallery-filter]');
    if (!tabs.length) return;
    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        tabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        this.loadGallery('gallery-grid', tab.dataset.galleryFilter || 0, 1);
      });
    });
  },

  async loadGalleryCategories(containerId = 'gallery-filter-tabs') {
    const container = document.getElementById(containerId);
    if (!container) return;
    const res = await this.get('gallery.php', { action: 'categories' });
    if (!res.success) return;
    container.innerHTML = `<button class="gallery-tab active" data-gallery-filter="0">All</button>` +
      res.data.categories.map(c =>
        `<button class="gallery-tab" data-gallery-filter="${c.id}">${this.esc(c.name)} (${c.image_count})</button>`
      ).join('');
    this.initGalleryFilters();
  },

  // ── Lightbox ──────────────────────────────────────────────────
  openLightbox(index) {
    const images = this._galleryImages;
    if (!images || !images[index]) return;
    this._lightboxIndex = index;

    let box = document.getElementById('bhi-lightbox');
    if (!box) {
      box = document.createElement('div');
      box.id = 'bhi-lightbox';
      box.className = 'bhi-lightbox';
      box.innerHTML = `
        <button class="bhi-lightbox-close" onclick="BHI.closeLightbox()">×</button>
        <button class="bhi-lightbox-nav prev" onclick="BHI.navLightbox(-1)">‹</button>
        <img class="bhi-lightbox-img" src="">
        <p class="bhi-lightbox-caption"></p>
        <button class="bhi-lightbox-nav next" onclick="BHI.navLightbox(1)">›</button>
      `;
      document.body.appendChild(box);
      box.addEventListener('click', e => { if (e.target === box) this.closeLightbox(); });
    }
    this.renderLightbox();
    box.style.display = 'flex';
  },

  renderLightbox() {
    const images = this._galleryImages;
    const img = images[this._lightboxIndex];
    const box = document.getElementById('bhi-lightbox');
    box.querySelector('.bhi-lightbox-img').src = img.url;
    box.querySelector('.bhi-lightbox-caption').textContent = img.caption || img.category_name || '';
  },

  navLightbox(dir) {
    const images = this._galleryImages;
    this._lightboxIndex = (this._lightboxIndex + dir + images.length) % images.length;
    this.renderLightbox();
  },

  closeLightbox() {
    const box = document.getElementById('bhi-lightbox');
    if (box) box.style.display = 'none';
  },

  // ── Homepage impact stats (animated counters) ─────────────────
  async loadImpactStats(containerId = 'impact-stats-grid') {
    const container = document.getElementById(containerId);
    if (!container) return;
    const res = await this.get('outreach.php', { action: 'stats' });
    if (!res.success) return;

    container.innerHTML = res.data.stats.map(s => `
      <div class="impact-stat-box">
        <div class="impact-stat-icon">${s.icon || ''}</div>
        <div class="impact-stat-value" data-target="${s.value}">${s.value}</div>
        <div class="impact-stat-label">${this.esc(s.label)}</div>
      </div>
    `).join('');
  },

  // ── Featured gallery strip on homepage ─────────────────────────
  async loadFeaturedGallery(containerId = 'featured-gallery-strip') {
    const container = document.getElementById(containerId);
    if (!container) return;
    const res = await this.get('gallery.php', { action: 'featured', limit: 8 });
    if (!res.success || !res.data.images.length) return;

    container.innerHTML = res.data.images.map(img => `
      <div class="featured-gallery-item">
        <img src="${img.url}" alt="${this.esc(img.alt_text || '')}" loading="lazy">
      </div>
    `).join('');
  },

  // ── Utility: HTML escape ────────────────────────────────────────
  esc(str) {
    const div = document.createElement('div');
    div.textContent = str || '';
    return div.innerHTML;
  },

  // ── Init everything ──────────────────────────────────────────
  init() {
    this.initNewsletterForms();
    this.initContactForm();
    this.initScreeningForm();
    this.initPartnerForm();
    this.initOutreachFilters();
    this.initGalleryFilters();

    if (document.getElementById('outreach-programs-grid')) this.loadOutreachPrograms();
    if (document.getElementById('gallery-grid'))            this.loadGallery();
    if (document.getElementById('gallery-filter-tabs'))     this.loadGalleryCategories();
    if (document.getElementById('impact-stats-grid'))       this.loadImpactStats();
    if (document.getElementById('featured-gallery-strip'))  this.loadFeaturedGallery();

    // ESC key closes lightbox / modal
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape') { this.closeLightbox(); this.closeScreeningModal(); }
    });
  },
};

document.addEventListener('DOMContentLoaded', () => BHI.init());
