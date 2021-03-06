<!--関連書籍の取得(API), 現在地からお弁当屋さんまでの経路(API) あり-->


<?php
$url = 'https://www.googleapis.com/books/v1/volumes?q=お弁当&maxResults=9';
$json = file_get_contents($url);
$data = json_decode($json);
$books = $data->items;
$get_count = count($books);
$total_count = $data->totalItems;
?>



<!doctype html>
<html>



  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>お弁当屋さん</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous">
    </script>
  </head>



  <body class="vh-100 d-flex justify-content-center text-center">
    <div class="w-75 mt-3">


        <!-- 店名 -->
        <div class="text-black-50 text-left border-bottom mt-5">
            <h1>お弁当屋さん</h1>
            <div class="d-flex">
              <p id="countdown"></p>
            </div>
        </div>
        <!-- END : 店名 -->


        <!-- 商品表示欄 -->
        <div class="container">
          <div class="row">
              <div id="border" class="col-md-4 border mt-4" style="height:300px;">
                <div class="d-flex align-items-center justify-content-center w-100 h-100">
                  <img id="image"src="img/bai.png" style="height:200px;"></li>
                </div>
              </div>

              <div class="col-md-8 text-left p-0 mt-4" style="height:300px;">

                <div class="h-50 pt-4 pl-4">
                    <div class="d-flex align-items-center">
                      <p id="name">スペシャル弁当 -梅-</p>
                      <p>　/　</p>
                      <p id="price">3000</p><p>円</p>
                    </div>
                    <div>
                      <button id="shou" type="button" class="btn btn-outline-info">松</button>
                      <button id="chiku" type="button" class="btn btn-outline-info">竹</button>
                      <button id="bai" type="button" class="btn btn-outline-info">梅</button>
                    </div>
                </div>

                <div class="h-25 pl-4">
                  <div id ="explanation" class="h-100 p-2 border">
                    とってもとっても美味しいスペシャル弁当です。
                  </div>
                </div>

                <div class="h-25 justify-content-end d-flex align-items-end">
                  <button id="stock-confirm" type="button" class="btn btn-outline-info">在庫を確認する</button>
                  <button id="cart-confirm" type="button" class="btn btn-outline-info ml-2">ショッピングカートに追加する</button>
                </div>

            </div>

          </div>
        </div>
        <!-- END : 商品表示欄 -->


        <!-- カート -->
        <div class="text-black-50 text-left border-bottom mt-5">
            <h3>お弁当カート</h3>
            <p id="totalPrice">合計金額 : 0円</p>
        </div>
        <div>
            <ul id="cart-list" class="list-group list-group-flush text-left">
            </ul>
        </div>
        <!-- END : カート -->


        <!-- その他のメニュー -->
        <div class="text-black-50 text-left border-bottom d-flex mt-5">
            <h5 class="mt-2">その他のメニュー</h5>
            <button id="hide" type="button" class="btn btn-sm btn-secondary ml-4 mb-2">非表示</button>
        </div>

        <div>
          <ul id="cartlist" class="list-group list-group-flush text-left">
            <li class="list-group-item">春弁当</li>
            <li class="list-group-item">夏弁当</li>
            <li class="list-group-item">秋弁当</li>
            <li class="list-group-item">冬弁当</li>
          </ul>
        </div>
        <!-- その他のメニュー -->


        <!-- オプション -->
        <div class="text-black-50 text-left border-bottom d-flex mt-5">
            <h5 class="mt-2">オプション</h5>
        </div>

        <form id="radioForm" class="d-flex text-black-50 text-left mt-3">
          <p>ご飯の量</p>
          <div class="ml-5">
            <div class="form-check form-check-inline">
              <input name="option" value="大" class="form-check-input" type="radio">
              <label>大</label>
            </div>
            <div class="form-check form-check-inline">
              <input name="option" value="中" class="form-check-input" type="radio">
              <label>中</label>
            </div>
            <div class="form-check form-check-inline">
              <input name="option" value="小" class="form-check-input" type="radio">
              <label>小</label>
            </div>
          </div>
          <button type="submit" class="btn btn-sm btn-outline-info">Submit</button>
        </form>

        <form id="checkboxForm" class="d-flex text-black-50 text-left mt-3">
          <p>付属品</p>
          <div class="ml-5">
            <div class="form-check form-check-inline">
              <input name="accessory" value="箸" class="form-check-input" type="checkbox">
              <label>箸</label>
            </div>
            <div class="form-check form-check-inline">
              <input name="accessory" value="手拭き" class="form-check-input" type="checkbox">
              <label>手拭き</label>
            </div>
            <div class="form-check form-check-inline">
              <input name="accessory" value="爪楊枝" class="form-check-input" type="checkbox">
              <label>爪楊枝</label>
            </div>
          </div>
          <button type="submit" class="btn btn-sm btn-outline-info">Submit</button>
        </form>

        <form id="selectForm" class="text-black-50 text-right mt-3">
          <select name="select" class="form-control form-control-lg">
            <option value="知人の紹介">知人の紹介</option>
            <option value="インターネット">インターネット</option>
            <option value="その他">その他</option>
          </select>
          <button type="submit" class="btn btn-outline-info mt-2">Submit</button>
        </form>

        <form id="textForm" class="text-black-50 text-right mt-3">
          <input name="text" class="form-control" value="お届け先住所"></textarea>
          <button type="submit" class="btn btn-outline-info mt-2">Submit</button>
        </form>

        <form id="textareaForm" class="text-black-50 text-right mt-3">
          <textarea name="textarea" class="form-control" rows="3">その他ご要望を入力してください</textarea>
          <button type="submit" class="btn btn-outline-info mt-2">Submit</button>
        </form>

        <div class="w-100 text-left mt-5 mb-5" style="height:300px;">
          <div id ="optionExplanation" class="h-100 p-2 border">
            <!--<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC8F2vD0OFURJR3LovVPmhNjTUkNOswwZE&q=東京駅"  width="300" height="225" frameborder="0" style="border:0;" allowfullscreen=""></iframe>-->
          </div>
        </div>
        <!--END: オプション -->

        <!-- お弁当関連書籍 -->
        <div class="text-black-50 text-left border-bottom d-flex mt-5">
            <h5 class="mt-2">お弁当関連書籍</h5>
        </div>

        <div class="container mt-3">
          <div class="row">
          <?php if($get_count > 0): ?>

              <?php foreach($books as $book):
                  $title = $book->volumeInfo->title;
                  $thumbnail = $book->volumeInfo->imageLinks->thumbnail;
                  $authors = implode(',', $book->volumeInfo->authors);
              ?>

              <div class="col-md-4 card p-0">
                <div class="card-body">
                    <img src="<?php echo $thumbnail; ?>" alt="<?php echo $title; ?>" style="height:200px">
                    <br/>
                    <p class="text-black-50 pt-3" style="height:100px">
                      <b>『<?php echo $title; ?>』</b>
                      <br/>
                      著者：<?php echo $authors; ?>
                    </p>
                </div>
              </div>
              <?php endforeach; ?>

           <?php else: ?>
             <p>情報が有りません</p>
           <?php endif; ?>

          </div>
        </div>
        <!--END : お弁当関連書籍 -->

        <!-- 現在地からお弁当屋さんまでの経路 -->
        <div class="text-black-50 text-left border-bottom d-flex mt-5">
            <h5 class="mt-2">現在地から東京駅までの経路</h5>
            <button id="maptest" type="button" class="btn btn-outline-info ml-4 mb-1">表示</button>
        </div>

        <div class="w-100 text-left mt-5 mb-5" style="height:300px;">
          <div id="map_canvas"  class="mb-5" style="width:600px; height:400px"></div>
        </div>
        <!--END : 現在地からお弁当屋さんまでの経路 -->

   </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.23.0/moment.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.23.0/locale/ja.js"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8F2vD0OFURJR3LovVPmhNjTUkNOswwZE&callback=initMap&sensor=false"></script>
   <script src="script_c.js"></script>

  </body>



</html>

?>
