<?php
// ============================================================
// admin/gallery.php — Manage Gallery Images
// ============================================================
define('BHI_ADMIN', true);
require_once dirname(__DIR__) . '/includes/config.php';
require_once dirname(__DIR__) . '/includes/Database.php';
require_once dirname(__DIR__) . '/includes/helpers.php';

$page_title = 'Gallery';
$msg = $err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_login();
    if (!csrf_verify(post('csrf_token'))) {
        die('Invalid session token. Please go back and refresh the page, then try again.');
    }
    $action = post('action');

    if ($action === 'upload_image') {
        $cat_id   = (int) post('category_id');
        $prog_id  = (int) post('program_id') ?: null;
        $alt      = clean(post('alt_text'));
        $caption  = clean(post('caption'));
        $featured = post('is_featured') ? 1 : 0;
        $taken_at = clean(post('taken_at')) ?: null;

        if (empty($_FILES['image']['name'])) {
            $err = 'Please choose an image to upload.';
        } else {
            $upload = upload_image($_FILES['image'], GALLERY_PATH, 'gal');
            if (!$upload['success']) {
                $err = $upload['message'];
            } else {
                Database::execute(
                  "INSERT INTO gallery_images
                   (category_id, program_id, filename, original_name, alt_text, caption,
                    file_size, width, height, is_featured, uploaded_by, taken_at)
                   VALUES (:c,:p,:f,:on,:a,:cap,:fs,:w,:h,:fe,:ub,:ta)",
                  [
                    'c'=>$cat_id,'p'=>$prog_id,'f'=>$upload['filename'],
                    'on'=>$_FILES['image']['name'],'a'=>$alt,'cap'=>$caption,
                    'fs'=>$_FILES['image']['size'],'w'=>$upload['width'],'h'=>$upload['height'],
                    'fe'=>$featured,'ub'=>current_admin()['id'],'ta'=>$taken_at
                  ]
                );
                log_activity('upload_image', 'gallery_images', Database::lastId());
                $msg = 'Image uploaded successfully.';
            }
        }
    }

    if ($action === 'bulk_upload') {
        $cat_id  = (int) post('category_id');
        $prog_id = (int) post('program_id') ?: null;
        $count = 0;
        if (!empty($_FILES['images']['name'][0])) {
            $n = count($_FILES['images']['name']);
            for ($i = 0; $i < $n; $i++) {
                $file = [
                    'name'     => $_FILES['images']['name'][$i],
                    'type'     => $_FILES['images']['type'][$i],
                    'tmp_name' => $_FILES['images']['tmp_name'][$i],
                    'error'    => $_FILES['images']['error'][$i],
                    'size'     => $_FILES['images']['size'][$i],
                ];
                $upload = upload_image($file, GALLERY_PATH, 'gal');
                if ($upload['success']) {
                    Database::execute(
                      "INSERT INTO gallery_images
                       (category_id, program_id, filename, original_name, width, height, uploaded_by)
                       VALUES (?,?,?,?,?,?,?)",
                      [$cat_id, $prog_id, $upload['filename'], $file['name'],
                       $upload['width'], $upload['height'], current_admin()['id']]
                    );
                    $count++;
                }
            }
        }
        $msg = "$count image(s) uploaded successfully.";
    }

    if ($action === 'update_image') {
        $id = (int) post('id');
        Database::execute(
          "UPDATE gallery_images SET category_id=?, alt_text=?, caption=?, is_featured=?, is_published=?
           WHERE id=?",
          [(int)post('category_id'), clean(post('alt_text')), clean(post('caption')),
           post('is_featured')?1:0, post('is_published')?1:0, $id]
        );
        $msg = 'Image updated.';
    }

    if ($action === 'delete_image') {
        $id = (int) post('id');
        $img = Database::fetchOne("SELECT filename FROM gallery_images WHERE id=?", [$id]);
        if ($img) {
            $path = GALLERY_PATH . '/' . $img['filename'];
            if (file_exists($path)) @unlink($path);
            Database::execute("DELETE FROM gallery_images WHERE id=?", [$id]);
            log_activity('delete_image', 'gallery_images', $id);
        }
        $msg = 'Image deleted.';
    }

    if ($action === 'add_category') {
        $name = clean(post('cat_name'));
        Database::execute(
          "INSERT INTO gallery_categories (name, slug, sort_order) VALUES (?,?,?)",
          [$name, slugify($name), (int) post('sort_order', '0')]
        );
        $msg = 'Category added.';
    }
}

require_login();

$categories = Database::fetchAll("SELECT * FROM gallery_categories ORDER BY sort_order");
$programs   = Database::fetchAll("SELECT id, title FROM outreach_programs ORDER BY scheduled_date DESC");

$filter_cat = (int) get_param('category_id');
$page = max(1,(int)get_param('page','1'));
$where = $filter_cat ? "WHERE gi.category_id = $filter_cat" : "";
$total = Database::fetchOne("SELECT COUNT(*) AS n FROM gallery_images gi $where")['n'] ?? 0;
$pag = paginate((int)$total, $page, 16);

$images = Database::fetchAll(
    "SELECT gi.*, gc.name AS category_name
     FROM gallery_images gi
     JOIN gallery_categories gc ON gc.id = gi.category_id
     $where
     ORDER BY gi.created_at DESC
     LIMIT {$pag['per_page']} OFFSET {$pag['offset']}"
);

require_once 'partials/header.php';
?>
<?php if ($msg): ?><div class="alert alert-success"><?= htmlspecialchars($msg) ?></div><?php endif; ?>
<?php if ($err): ?><div class="alert alert-error"><?= htmlspecialchars($err) ?></div><?php endif; ?>

<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.25rem;flex-wrap:wrap;gap:.75rem">
  <div style="display:flex;gap:.5rem;flex-wrap:wrap">
    <a href="?" class="btn <?= !$filter_cat?'btn-primary':'btn-secondary' ?>" style="font-size:.75rem">All</a>
    <?php foreach ($categories as $c): ?>
      <a href="?category_id=<?= $c['id'] ?>" class="btn <?= $filter_cat===$c['id']?'btn-primary':'btn-secondary' ?>" style="font-size:.75rem"><?= htmlspecialchars($c['name']) ?></a>
    <?php endforeach; ?>
  </div>
  <div style="display:flex;gap:.5rem">
    <button class="btn btn-secondary" onclick="openModal('modal-cat')">+ Category</button>
    <button class="btn btn-primary" onclick="openModal('modal-upload')">+ Upload Images</button>
  </div>
</div>

<div class="card">
  <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:1rem">
    <?php foreach ($images as $img): ?>
      <div style="border:1px solid var(--border);border-radius:10px;overflow:hidden">
        <div style="aspect-ratio:4/3;background:#f1f5f9;overflow:hidden;position:relative">
          <img src="<?= SITE_URL ?>/uploads/gallery/<?= htmlspecialchars($img['filename']) ?>"
               style="width:100%;height:100%;object-fit:cover" loading="lazy">
          <?php if ($img['is_featured']): ?>
            <span style="position:absolute;top:6px;right:6px;background:var(--gold);color:#fff;font-size:.6rem;font-weight:700;padding:.15rem .5rem;border-radius:50px">★ Featured</span>
          <?php endif; ?>
          <?php if (!$img['is_published']): ?>
            <span style="position:absolute;top:6px;left:6px;background:#475569;color:#fff;font-size:.6rem;font-weight:700;padding:.15rem .5rem;border-radius:50px">Hidden</span>
          <?php endif; ?>
        </div>
        <div style="padding:.6rem .75rem">
          <div style="font-size:.72rem;color:var(--light);margin-bottom:.4rem"><?= htmlspecialchars($img['category_name']) ?></div>
          <div style="display:flex;gap:.4rem">
            <button class="btn btn-secondary" style="flex:1;font-size:.68rem;justify-content:center" onclick='editImage(<?= json_encode($img) ?>)'>Edit</button>
            <form method="POST" onsubmit="return confirm('Delete this image?')">
              <input type="hidden" name="action" value="delete_image">
              <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
              <input type="hidden" name="id" value="<?= $img['id'] ?>">
              <button type="submit" class="btn" style="background:#fee2e2;color:#991b1b;font-size:.68rem">×</button>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <?php if (!$images): ?><p style="color:#94a3b8;padding:2rem;text-align:center">No images in this category yet.</p><?php endif; ?>

  <?php if ($pag['total_pages'] > 1): ?>
  <div style="display:flex;gap:.5rem;justify-content:center;padding:1.25rem 0 0">
    <?php for($i=1;$i<=$pag['total_pages'];$i++): ?>
      <a href="?<?= $filter_cat?"category_id=$filter_cat&":'' ?>page=<?=$i?>" class="btn <?=$i===$pag['page']?'btn-primary':'btn-secondary'?>" style="min-width:36px;justify-content:center"><?=$i?></a>
    <?php endfor; ?>
  </div>
  <?php endif; ?>
</div>

<!-- Upload Modal -->
<div id="modal-upload" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:9000;overflow-y:auto">
  <div style="background:#fff;max-width:520px;margin:3rem auto;border-radius:14px;overflow:hidden">
    <div style="background:var(--navy);padding:1.25rem 1.5rem;display:flex;justify-content:space-between;align-items:center">
      <span style="color:#fff;font-family:'Montserrat',sans-serif;font-weight:800">Upload Images</span>
      <button onclick="closeModal('modal-upload')" style="background:none;border:none;color:#fff;font-size:1.4rem;cursor:pointer">×</button>
    </div>
    <form method="POST" enctype="multipart/form-data" style="padding:1.5rem">
      <input type="hidden" name="action" value="bulk_upload">
      <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
      <div class="form-group">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-control" required>
          <?php foreach ($categories as $c): ?>
            <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Link to Outreach Program (optional)</label>
        <select name="program_id" class="form-control">
          <option value="">— None —</option>
          <?php foreach ($programs as $p): ?>
            <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['title']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Images (multiple allowed)</label>
        <input type="file" name="images[]" class="form-control" accept="image/*" multiple required>
      </div>
      <button type="submit" class="btn btn-primary" style="width:100%">Upload</button>
    </form>
  </div>
</div>

<!-- Edit Modal -->
<div id="modal-edit" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:9000">
  <div style="background:#fff;max-width:480px;margin:3rem auto;border-radius:14px;overflow:hidden">
    <div style="background:var(--navy);padding:1.25rem 1.5rem;display:flex;justify-content:space-between;align-items:center">
      <span style="color:#fff;font-family:'Montserrat',sans-serif;font-weight:800">Edit Image</span>
      <button onclick="closeModal('modal-edit')" style="background:none;border:none;color:#fff;font-size:1.4rem;cursor:pointer">×</button>
    </div>
    <form method="POST" style="padding:1.5rem">
      <input type="hidden" name="action" value="update_image">
      <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
      <input type="hidden" name="id" id="e-id">
      <div class="form-group">
        <label class="form-label">Category</label>
        <select name="category_id" id="e-cat" class="form-control">
          <?php foreach ($categories as $c): ?>
            <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group"><label class="form-label">Alt Text</label><input name="alt_text" id="e-alt" class="form-control"></div>
      <div class="form-group"><label class="form-label">Caption</label><textarea name="caption" id="e-caption" class="form-control" rows="2"></textarea></div>
      <div style="display:flex;gap:1.5rem;margin-bottom:1.25rem">
        <label style="display:flex;gap:.4rem;align-items:center;font-size:.88rem;cursor:pointer"><input type="checkbox" name="is_featured" id="e-featured" value="1"> Featured</label>
        <label style="display:flex;gap:.4rem;align-items:center;font-size:.88rem;cursor:pointer"><input type="checkbox" name="is_published" id="e-published" value="1"> Published</label>
      </div>
      <button type="submit" class="btn btn-primary" style="width:100%">Save Changes</button>
    </form>
  </div>
</div>

<!-- Category Modal -->
<div id="modal-cat" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:9000">
  <div style="background:#fff;max-width:400px;margin:5rem auto;border-radius:14px;overflow:hidden">
    <div style="background:var(--navy);padding:1.25rem 1.5rem;display:flex;justify-content:space-between;align-items:center">
      <span style="color:#fff;font-family:'Montserrat',sans-serif;font-weight:800">New Category</span>
      <button onclick="closeModal('modal-cat')" style="background:none;border:none;color:#fff;font-size:1.4rem;cursor:pointer">×</button>
    </div>
    <form method="POST" style="padding:1.5rem">
      <input type="hidden" name="action" value="add_category">
      <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
      <div class="form-group"><label class="form-label">Category Name</label><input name="cat_name" class="form-control" required></div>
      <div class="form-group"><label class="form-label">Sort Order</label><input type="number" name="sort_order" class="form-control" value="0"></div>
      <button type="submit" class="btn btn-primary" style="width:100%">Add Category</button>
    </form>
  </div>
</div>

<script>
function openModal(id)  { document.getElementById(id).style.display='block'; }
function closeModal(id) { document.getElementById(id).style.display='none';  }
function editImage(img) {
  document.getElementById('e-id').value = img.id;
  document.getElementById('e-cat').value = img.category_id;
  document.getElementById('e-alt').value = img.alt_text || '';
  document.getElementById('e-caption').value = img.caption || '';
  document.getElementById('e-featured').checked = img.is_featured == 1;
  document.getElementById('e-published').checked = img.is_published == 1;
  openModal('modal-edit');
}
window.addEventListener('click', e => {
  ['modal-upload','modal-edit','modal-cat'].forEach(id => {
    const el = document.getElementById(id);
    if (e.target === el) el.style.display = 'none';
  });
});
</script>

<?php require_once 'partials/footer.php'; ?>