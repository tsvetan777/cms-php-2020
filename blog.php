<?php include ('./templates/header.php'); ?>
<?php include ('./src/controllers/blog.php'); ?>

<?php $categoryFetch = Database::query("SELECT * FROM tm_categories"); ?>

<div class="wrapper">
    
    <ul id="category-placeholder" class="mb-25">
    
        <?php while ($blogCategory = Database::fetch(categoryFetch)) { ?>

            <li class="category-placeholder--category">
            
                <?php $categoryId = $blogCategory['id']; ?>
            
                <a href="<?php echo "http://localhost/CMS/blog.php?category=$categoryId" ?> ">
                    <?php echo $blogCategory['title'] ?>
                </a>
            
            </li>
        
            <li class="category-placeholder--category">
                <a href="http://localhost/CMS/blog.php">Изчисти</a>
            </li>
    
        <?php } ?>
    
    </ul>
    
    <div>
        <form method="GET">
            
            <input type="text" placeholder="Търси ..." name="q">
            
             <select name="q_selector">
                <option value="title">Търси по заглавие</option>
                <option value="content">Търси по съдържание</option>
            </select>
            
            <input type="hidden" name="post_search_tokken" value="1">
            <input type="submit">
            
        </form>
    </div>
    
</div>

            
<div id="blog-post--content">
                
    <div class="post">
        <?php 
                    
        $mysqlResult    = listAllBlogPost();
        
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