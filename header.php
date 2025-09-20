<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin-top: 0 !important;">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title(); ?></title>
  <link rel="icon" type="image/png" href="<?= get_template_directory_uri() ?>/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="<?= get_template_directory_uri() ?>/favicon.svg" />
  <link rel="shortcut icon" href="<?= get_template_directory_uri() ?>/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri() ?>/apple-touch-icon.png" />
  <link rel="manifest" href="<?= get_template_directory_uri() ?>/site.webmanifest" />

  <?php wp_head(); ?>
  
  <!-- Скріпт для автоперезавантаження сторінки, видалить на релізі -->
  <script>
    const ws = new WebSocket("ws://localhost:35729");
    ws.onmessage = (msg) => {
      if (msg.data === "reload") location.reload();
    };
  </script>
   <!-- Скріпт для автоперезавантаження сторінки, видалить на релізі -->

    <?= get_field('analytics_scripts_before_head', 'options'); ?>
</head>

<body <?php body_class(); ?>>
  <pageid><?= get_the_ID() ?></pageid>

  <?= get_field('analytics_scripts_after_body', 'options'); ?>

  <?php include_once get_template_directory() . '/templates/header/header.php'; ?>