<?php

if(Auth::isAuthenticated()) {
    
    redirectTo("signin");
}

function listAllBlogPost() {
    
    $myCategory = null;
    
    if(isset($_GET['post_search_tokken']) && $_GET['post_search_tokken'] == 1) {
    
        $searchQuery            = $_GET['q'];
        $searchDescriptorColumn = $_GET['q_selector'];
        
        $categoryQuery          = $myCategory ? "b.category_id = $myCategory AND" : "";
    
        // LIKE оператора match-ва всички резултати от базата данни, 
        // в които се съдържа въведен от нас input
        $requestQuery = "SELECT * FROM tb_blogpost a, tb_blog_post__categories b"
                      . "WHERE a.id = b.blog_post_id AND b.category_id = $myCategory"
                      . "AND a.$searchDescriptorColumn LIKE '%$searchQuery%'";
        
    
        return Database::query($requestQuery);
    }
    
    if(isset($_GET['category'])) {
        
        $myCategory = $_GET['category'];
        return Database::query("SELECT * FROM tb_blogpost a, tb_blog_post__categories b"
                             . "WHERE a.id = b.blog_post_id AND b.category_id = $myCategory");
    }
    
    return Database::query("SELECT * FROM tb_blogpost");
}

function listAllBlogCategory() {
    
    return Database::query("SELECT * FROM tm_categories");
}

