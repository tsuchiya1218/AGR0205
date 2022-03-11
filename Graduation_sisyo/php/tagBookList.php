<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/searchByLi.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>詳細検索(司書)</title>

</head>

<body>
    <header>

    
        <div class="title">
            <div class="logo_img">
                <img src="../img/title_logo.png" alt="" width="281" height="62">
            </div>
            <div class="logo_txt">
                <p>Shinjuku City Library</p>
            </div>
        </div>


        
        <br>
        <hr>
        
        
    </header>
    <main>

        

       <h2>「面白い」タグが含まれる結果一覧</h2>

       <a href="ninsho6.html" class="btn btn--orange btn--cubic btn--shadow">タグを削除する</a>


       <h3>1 ～ 5 件（全5 件）</h3>
       


       <table class="tableArea" id="makeImg" border=1>
        
        <tr class='clickable-row' data-href="bookDetail.html">
            
               <td><img src="../img/book1.jpg" alt="" width="50px" height="100px"></td>
               <th>
                   映画に学ぶ危機管理
               </th>
               <td>
                   齋藤　富雄／編著 -- 晃洋書房 -- 2018.9 -- 1901010110
               </td>
               <td>
                   <button>貸出中</button>
               </td>
           </tr>
        

           <tr>
               <td><img src="../img/book4.jpg" alt="" width="50px" height="100px"></td>
               <th>
                   映画に学ぶ危機管理
               </th>
               <td>
                   齋藤　富雄／編著 -- 晃洋書房 -- 2018.9 -- 1901010110
               </td>
               <td>
                   <button class="button3">貸出可</button>
               </td>
               
           </tr>


           <tr>
               <td><img src="../img/book5.jpg" alt="" width="50px" height="100px"></td>
               <th>
                   映画に学ぶ危機管理
               </th>
               <td>
                   齋藤　富雄／編著 -- 晃洋書房 -- 2018.9 -- 1901010110
               </td>
               <td>
                   <button>貸出中</button>
               </td>
               
           </tr>


           <tr>
               <td><img src="../img/book2.jpg" alt="" width="50px" height="100px"></td>
               <th>
                   映画に学ぶ危機管理
               </th>
               <td>
                   齋藤　富雄／編著 -- 晃洋書房 -- 2018.9 -- 1901010110
               </td>
               <td>
                   <button>貸出中</button>
               </td>
               
           </tr>


           <tr>
               <td><img src="../img/book3.jpg" alt="" width="50px" height="100px"></td>
               <th>
                   映画に学ぶ危機管理
               </th>
               <td>
                   齋藤　富雄／編著 -- 晃洋書房 -- 2018.9 -- 1901010110
               </td>
               <td>
                   <button>貸出中</button>
               </td>
               
           </tr>
           
       </table>
       
       <script>
        jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
      </script>

    
<a href="index.php" class="btn btn--orange btn--cubic btn--shadow">ホームに戻る</a>

    </main>
</body>

</html>

