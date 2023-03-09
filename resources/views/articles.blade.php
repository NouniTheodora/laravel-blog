<title>My Blog</title>

<body>
    <?php foreach ($articles as $article) : ?>
         <article>
             <a href="<?php echo $article->slug ?>"> <?php echo $article->title; ?> </a>
         </article>
     <?php endforeach; ?>
</body>