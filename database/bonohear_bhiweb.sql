

-- ── 1. ADMIN USERS ────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS admin_users (
  id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name        VARCHAR(120)  NOT NULL,
  email       VARCHAR(180)  NOT NULL UNIQUE,
  password    VARCHAR(255)  NOT NULL,          -- bcrypt hash
  role        ENUM('superadmin','admin','editor') NOT NULL DEFAULT 'editor',
  avatar      VARCHAR(255)  DEFAULT NULL,
  last_login  DATETIME      DEFAULT NULL,
  is_active   TINYINT(1)    NOT NULL DEFAULT 1,
  created_at  DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at  DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Seed default superadmin (password: BHI@admin2026 — change immediately)
INSERT INTO admin_users (name, email, password, role)
VALUES ('Dr. Bediako Mensah', 'admin@bonoheartinitiative.org',
  '$2y$12$5zxQkRHaVJvGvR3bSqXIH.eH/RGhgZvGnY2xnknFv3IcLz4s3fNUi', 'superadmin');


-- ── 2. NEWSLETTER SUBSCRIBERS ────────────────────────────────
CREATE TABLE IF NOT EXISTS subscribers (
  id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email        VARCHAR(180) NOT NULL UNIQUE,
  name         VARCHAR(120) DEFAULT NULL,
  status       ENUM('active','unsubscribed','bounced') NOT NULL DEFAULT 'active',
  token        VARCHAR(64)  NOT NULL,           -- email verification / unsubscribe token
  verified_at  DATETIME     DEFAULT NULL,
  source       VARCHAR(80)  DEFAULT 'footer',   -- footer / homepage / outreach / etc.
  subscribed_at DATETIME    NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_status (status),
  INDEX idx_token  (token)
) ENGINE=InnoDB;


-- ── 3. CONTACT / PARTNER ENQUIRIES ───────────────────────────
CREATE TABLE IF NOT EXISTS contact_messages (
  id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  full_name    VARCHAR(120) NOT NULL,
  email        VARCHAR(180) NOT NULL,
  phone        VARCHAR(30)  DEFAULT NULL,
  organisation VARCHAR(180) DEFAULT NULL,
  enquiry_type ENUM('general','partnership','volunteer','media','referral','other')
               NOT NULL DEFAULT 'general',
  subject      VARCHAR(255) NOT NULL,
  message      TEXT         NOT NULL,
  status       ENUM('new','read','replied','archived') NOT NULL DEFAULT 'new',
  ip_address   VARCHAR(45)  DEFAULT NULL,
  created_at   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX idx_status      (status),
  INDEX idx_enquiry     (enquiry_type),
  INDEX idx_created     (created_at)
) ENGINE=InnoDB;


-- ── 4. SCREENING REGISTRATIONS ────────────────────────────────
CREATE TABLE IF NOT EXISTS screening_registrations (
  id              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  full_name       VARCHAR(120) NOT NULL,
  age             TINYINT UNSIGNED DEFAULT NULL,
  gender          ENUM('male','female','other','prefer_not') DEFAULT NULL,
  phone           VARCHAR(30)  NOT NULL,
  email           VARCHAR(180) DEFAULT NULL,
  district        VARCHAR(100) NOT NULL,
  community       VARCHAR(150) NOT NULL,
  has_hypertension TINYINT(1)  DEFAULT 0,
  has_diabetes     TINYINT(1)  DEFAULT 0,
  has_kidney_disease TINYINT(1) DEFAULT 0,
  family_history   TINYINT(1)  DEFAULT 0,
  notes            TEXT         DEFAULT NULL,
  session_id      INT UNSIGNED DEFAULT NULL,   -- FK to outreach_sessions
  status          ENUM('pending','confirmed','screened','referred','no_show')
                  NOT NULL DEFAULT 'pending',
  registered_at   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at      DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX idx_status    (status),
  INDEX idx_district  (district),
  INDEX idx_session   (session_id)
) ENGINE=InnoDB;


-- ── 5. OUTREACH PROGRAMS ──────────────────────────────────────
CREATE TABLE IF NOT EXISTS outreach_programs (
  id              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title           VARCHAR(255) NOT NULL,
  slug            VARCHAR(255) NOT NULL UNIQUE,
  description     TEXT         NOT NULL,
  summary         VARCHAR(500) DEFAULT NULL,   -- short card summary
  district        VARCHAR(100) NOT NULL,
  community       VARCHAR(150) NOT NULL,
  program_type    ENUM('community_screening','school_outreach','market_screening',
                       'church_outreach','clinic_day','awareness_campaign','other')
                  NOT NULL DEFAULT 'community_screening',
  status          ENUM('upcoming','ongoing','completed','cancelled')
                  NOT NULL DEFAULT 'upcoming',
  scheduled_date  DATE         NOT NULL,
  end_date        DATE         DEFAULT NULL,
  scheduled_time  TIME         DEFAULT NULL,
  venue           VARCHAR(255) DEFAULT NULL,
  cover_image     VARCHAR(255) DEFAULT NULL,   -- path in uploads/outreach/
  screening_target INT UNSIGNED DEFAULT NULL,
  screened_count  INT UNSIGNED DEFAULT 0,
  referred_count  INT UNSIGNED DEFAULT 0,
  volunteers_count INT UNSIGNED DEFAULT 0,
  registration_open TINYINT(1) NOT NULL DEFAULT 1,
  is_featured     TINYINT(1)  NOT NULL DEFAULT 0,
  is_published    TINYINT(1)  NOT NULL DEFAULT 1,
  created_by      INT UNSIGNED DEFAULT NULL,
  created_at      DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at      DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX idx_status    (status),
  INDEX idx_district  (district),
  INDEX idx_date      (scheduled_date),
  INDEX idx_featured  (is_featured),
  INDEX idx_published (is_published)
) ENGINE=InnoDB;


-- ── 6. OUTREACH SESSIONS (individual days within a program) ──
CREATE TABLE IF NOT EXISTS outreach_sessions (
  id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  program_id    INT UNSIGNED NOT NULL,
  session_date  DATE         NOT NULL,
  session_time  TIME         DEFAULT NULL,
  venue         VARCHAR(255) DEFAULT NULL,
  slots_total   SMALLINT UNSIGNED DEFAULT 100,
  slots_booked  SMALLINT UNSIGNED DEFAULT 0,
  status        ENUM('open','full','completed','cancelled') NOT NULL DEFAULT 'open',
  notes         TEXT         DEFAULT NULL,
  created_at    DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (program_id) REFERENCES outreach_programs(id) ON DELETE CASCADE,
  INDEX idx_program  (program_id),
  INDEX idx_date     (session_date),
  INDEX idx_status   (status)
) ENGINE=InnoDB;


-- ── 7. GALLERY ────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS gallery_categories (
  id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name       VARCHAR(100) NOT NULL,
  slug       VARCHAR(100) NOT NULL UNIQUE,
  sort_order TINYINT UNSIGNED DEFAULT 0,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO gallery_categories (name, slug, sort_order) VALUES
  ('Community Outreach',  'community-outreach',  1),
  ('Screening Sessions',  'screening-sessions',  2),
  ('Diagnostic Hub',      'diagnostic-hub',       3),
  ('Team & Volunteers',   'team-volunteers',      4),
  ('Partnerships',        'partnerships',         5),
  ('Awareness Campaigns', 'awareness-campaigns',  6);

CREATE TABLE IF NOT EXISTS gallery_images (
  id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category_id  INT UNSIGNED NOT NULL,
  program_id   INT UNSIGNED DEFAULT NULL,       -- optional link to outreach program
  filename     VARCHAR(255) NOT NULL,           -- stored filename in uploads/gallery/
  original_name VARCHAR(255) DEFAULT NULL,
  alt_text     VARCHAR(255) DEFAULT NULL,
  caption      TEXT         DEFAULT NULL,
  file_size    INT UNSIGNED DEFAULT NULL,       -- bytes
  width        SMALLINT UNSIGNED DEFAULT NULL,
  height       SMALLINT UNSIGNED DEFAULT NULL,
  is_featured  TINYINT(1)   NOT NULL DEFAULT 0, -- show on homepage gallery
  is_published TINYINT(1)   NOT NULL DEFAULT 1,
  sort_order   SMALLINT UNSIGNED DEFAULT 0,
  uploaded_by  INT UNSIGNED DEFAULT NULL,
  taken_at     DATE         DEFAULT NULL,
  created_at   DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (category_id) REFERENCES gallery_categories(id) ON DELETE RESTRICT,
  FOREIGN KEY (program_id)  REFERENCES outreach_programs(id)  ON DELETE SET NULL,
  INDEX idx_category  (category_id),
  INDEX idx_featured  (is_featured),
  INDEX idx_published (is_published),
  INDEX idx_program   (program_id)
) ENGINE=InnoDB;


-- ── 8. PARTNERSHIP / DONOR ENQUIRIES ─────────────────────────
CREATE TABLE IF NOT EXISTS partnership_enquiries (
  id              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  organisation    VARCHAR(200) NOT NULL,
  contact_name    VARCHAR(120) NOT NULL,
  email           VARCHAR(180) NOT NULL,
  phone           VARCHAR(30)  DEFAULT NULL,
  tier            ENUM('bronze','silver','gold','platinum','corporate','individual','in_kind','other')
                  NOT NULL DEFAULT 'other',
  amount_ghs      DECIMAL(12,2) DEFAULT NULL,
  message         TEXT          DEFAULT NULL,
  status          ENUM('new','contacted','negotiating','confirmed','declined')
                  NOT NULL DEFAULT 'new',
  created_at      DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at      DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX idx_status (status),
  INDEX idx_tier   (tier)
) ENGINE=InnoDB;


-- ── 9. IMPACT STATISTICS (editable via admin) ────────────────
CREATE TABLE IF NOT EXISTS impact_stats (
  id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  stat_key    VARCHAR(80)  NOT NULL UNIQUE,    -- e.g. "people_screened"
  label       VARCHAR(120) NOT NULL,
  value       VARCHAR(40)  NOT NULL,           -- e.g. "1,240+"
  icon        VARCHAR(10)  DEFAULT NULL,       -- emoji or icon class
  sort_order  TINYINT UNSIGNED DEFAULT 0,
  updated_at  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO impact_stats (stat_key, label, value, icon, sort_order) VALUES
  ('people_screened',    'People Screened',          '0',  '🫀', 1),
  ('communities_reached','Communities Reached',       '0',  '🏘️', 2),
  ('echos_performed',    'Echocardiograms Performed', '0',  '📊', 3),
  ('patients_referred',  'Patients Referred',         '0',  '🏥', 4),
  ('outreach_sessions',  'Outreach Sessions',         '0',  '📍', 5),
  ('volunteers',         'Volunteer Hours',            '0',  '🤝', 6);


-- ── 10. ADMIN ACTIVITY LOG ────────────────────────────────────
CREATE TABLE IF NOT EXISTS admin_activity_log (
  id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  admin_id   INT UNSIGNED DEFAULT NULL,
  action     VARCHAR(100) NOT NULL,
  entity     VARCHAR(80)  DEFAULT NULL,
  entity_id  INT UNSIGNED DEFAULT NULL,
  detail     TEXT         DEFAULT NULL,
  ip_address VARCHAR(45)  DEFAULT NULL,
  created_at DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_admin  (admin_id),
  INDEX idx_action (action),
  INDEX idx_entity (entity, entity_id)
) ENGINE=InnoDB;


-- ── FOREIGN KEY CONSTRAINTS (added after all tables exist) ───
ALTER TABLE screening_registrations
  ADD CONSTRAINT fk_reg_session
  FOREIGN KEY (session_id) REFERENCES outreach_sessions(id) ON DELETE SET NULL;

ALTER TABLE outreach_programs
  ADD CONSTRAINT fk_prog_admin
  FOREIGN KEY (created_by) REFERENCES admin_users(id) ON DELETE SET NULL;

ALTER TABLE gallery_images
  ADD CONSTRAINT fk_img_uploader
  FOREIGN KEY (uploaded_by) REFERENCES admin_users(id) ON DELETE SET NULL;
