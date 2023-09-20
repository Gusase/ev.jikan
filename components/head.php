<!DOCTYPE html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=7">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- <title><?= (isset($page) && !empty($anim)) ? $anim->getTitles()[0]->getTitle() . $page['title'] : $page['title'] ?></title> -->
  <title>
    <?php
    $en = null;
    $enn = null;
    if (isset($page) && !empty($anim)) {
      foreach ($anim->getTitles() as $title) {
        if ($title->getType() == 'English') {
          $en = $title->getTitle();
          $enn = " ($en)";
          break;
        }else{
          $en = '';
        }
        
      }
      if ($en === $anim->getTitles()[0]->getTitle() || strlen($en) > 31) {
        $en = null;
        $enn = null;
      }
    }
    echo (isset($page) && !empty($anim) || !is_null($en))
      ? $anim->getTitles()[0]->getTitle() . $enn . $page['title'] . ' - Jikan'
      : $page['title'];
    ?>
  </title>
  <style>
    @keyframes fade {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    ::-webkit-scrollbar {
      width: 0 !important;
    }

    .fd {
      animation: fade .4s ease-in;
    }
  </style>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          container: {
            center: true,
          }
        }
      }
    }
  </script>
</head>

<body class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-[#121212] fd">
