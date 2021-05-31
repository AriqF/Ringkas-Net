<!doctype html>
<head>
  	<title>User Blog</title>
    <?php
        $currentPage = 'user_read_blog'; //rubah sesuai dgn nama halaman, dan tambahkan juga dalam navbar di file header
        include 'header-user.php';
    ?>
    <link href="../src/css/blogStyle.css" type="text/css" rel="stylesheet"> 


    <header class="blog-header text-center">
        <h1 class="blog-title">Blog Title</h1>
        <p class="lead" style="font-size: 16px;"><span style="color: #24C157; font-size: 17px;">#penulis</span> &#8231; 22/01/87</p>
        <hr class="divider">
    </header>
    <div class="page-section blog-page">

        <div class="container">
            <img src="../src/img/index-bg.jpg" class="img-fluid rounded">
            <p class="blog-content">
                "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
                "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."
            </p>
        </div>

    </div>

    
    <?php 
        include'function-scroll-trigger.php';
    ?>
    <script>
         document.getElementById("img-block").style.backgroundImage = "url(../src/img/signin-img.jpg)";
        //merubah background pada div id, hapus komen jika ingin menggunakan script ini
        //document.getElementById("user_write").style.backgroundImage = "url(../src/img/user-write-img.jpg)";
    </script>
</body>
</html>