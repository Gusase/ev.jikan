<!DOCTYPE html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title><?= (isset($page) && !empty($anim)) ? $anim->getTitle() . $page['title'] : $page['title'] ?></title>
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
  
