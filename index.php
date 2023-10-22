<?php
session_start();

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/utils/redirectMain.php';

$v = isset($_GET['v']) ? $_GET['v'] : '';
$page = redirect($v);

?>


<!-- html -->
<?php
include 'components/head.php';
include 'components/nav.php'
?>

<?php if (empty($v)) : ?>
  <div>
    <div class="relative overflow-hidden py-52 px-16">
      <!-- berat jir -->
    </div>
  </div>
<?php endif; ?>

<?php if (isset($page))
  include_once $page['page'];
?>


<?php include 'components/foot.php' ?>