<?php include ('./templates/header.php'); ?>

<ul id="category-placeholder">
    <li class="category-placeholder--category">Клюки</li>
    <li class="category-placeholder--category">Политика</li>
    <li class="category-placeholder--category">Програмиране</li>
</ul>
            
<div id="blog-post--content">
                
    <div class="post">
        <?php 
                    
        $mysqlResult = Database::query("SELECT * FROM tb_blogpost");
        while($blogPost = Database::fetch($mysqlResult)) { ?>
                    
        <span class="post-title"> 
            <?php echo $blogPost['title']; ?> 
        </span>
                    
        <div class="post-content">
            
            <p><?php echo $blogPost['content']; ?></p>
            
        </div>
                    
        <?php } ?>
    </div>
                
</div>
            
<?php include ('./templates/footer.php'); ?>