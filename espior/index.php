<?php
  session_start();
  include('./db/dbconn.php');

  // 사용자가 로그인한 경우, 세션에서 가져옴
  if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];

    // 사용자가 찜한 상품의 이름을 shop_temp 테이블에서 가져옴
    $sql = "SELECT no_data FROM shop_temp WHERE ss_id = '$userid'";
    $result = mysqli_query($conn, $sql);

    // 사용자가 선택한 상품 고유넘버를 저장할 배열 초기화
    $picked_items = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $picked_items[] = $row['no_data'];
    }

  } else {
    $userid = null;
    $username = null;
  }

?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>espior</title>
  <!-- 부트스트랩 css연결하기 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- 부트스트랩 js연결하기 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- 부트스트랩 아이콘폰트 연결 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- 제이쿼리 -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- 스와이퍼 css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <!-- 스와이퍼 js -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <!-- 초기화서식 연결 -->
  <link rel="stylesheet" href="./css/reset.css">
  <!-- 공통서식 연결 -->
  <link rel="stylesheet" href="./css/common.css">
  <!-- 메인 css 서식 연결 -->
  <link rel="stylesheet" href="./css/main.css">
</head>
<body>
  <!-- 공통헤더삽입 -->
  <?php include('./header.php')?>
  
  <!-- 메인서식 -->
  <main>
    <section id="sec01">
      <!-- Swiper -->
      <div class="swiper mySwiper1">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="./images/main/main_1.jpg" alt="이미지" id="img1">
          </div>
          <div class="swiper-slide">
            <img src="./images/main/main_2.jpg" alt="이미지" id="img2">
          </div>
          <div class="swiper-slide">
            <img src="./images/main/main_3.jpg" alt="이미지" id="img3">
          </div>
          <div class="swiper-slide">
            <img src="./images/main/main_4.jpg" alt="이미지" id="img4">
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>
    <!-- 카리나픽 -->
    <section id="sec02">
      <h2 class="fs-2 p-4">Karina's PICK</h2>
      <div class="row">
        <!-- Swiper -->
        <div class="swiper mySwiper2 col-lg-6">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="./images/main/sec02_1.jpg" alt="이미지">
            </div>
            <div class="swiper-slide">
              <img src="./images/main/sec02_2.jpg" alt="이미지">
            </div>
            <div class="swiper-slide">
              <img src="./images/main/sec02_3.jpg" alt="이미지">
            </div>
            <div class="swiper-slide">
              <img src="./images/main/sec02_4.jpg" alt="이미지">
            </div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
        <div class="product_box col-lg-6 col-12">
          <?php
            /* 해당 카테고리의 상품 4개 */
            $sql = "SELECT * FROM shop_data WHERE cate = 'cate01' LIMIT 4";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <div class="product col-6">
            <div class="pd_img">
              <!-- 사용자가 찜한 상품에는 active가 생기게 -->
              <button type="button" style="padding: 6px;" class="pick <?php echo in_array($row['no'], $picked_items) ? 'active' : ''; ?>" data-no="<?php echo $row['no']; ?>">
                <span>
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.6423 11.1126C13.9062 10.394 12.9283 10 11.892 10C10.8538 10 9.87785 10.394 9.14413 11.1122C7.61869 12.5986 7.61869 15.0205 9.14373 16.5092L15.9859 23.0909L23.0478 16.3007C24.3819 14.8233 24.3105 12.5319 22.8561 11.1126C22.1216 10.394 21.1453 10 20.1078 10C19.0684 10 18.0912 10.394 17.3563 11.1122L14.335 14.0289C13.9611 14.3827 13.7552 14.8529 13.7552 15.3508C13.7552 15.8491 13.9611 16.3193 14.3346 16.6734C15.1074 17.4049 16.3674 17.4049 17.1417 16.6734L20.0873 13.8428" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </span>
              </button>
              <a href="./detail.php?no=<?php echo $row['no']; ?>" title="상품">
                <img src="./images/shop/<?php echo $row['img']; ?>" alt="상품이미지">
              </a>
            </div>
            <div class="info">
              <p><?php echo $row['name']; ?></p>
              <p><?php echo number_format($row['price']); ?>원</p>
              <a href="./detail.php?no=<?php echo $row['no']; ?>" title="자세히보기">Show more</a>
            </div>
          </div>
          <?php
            }
          ?>
        </div>
      </div>
    </section>
    <!-- NEW ITEM -->
    <section id="sec03">
      <h2 class="fs-2 p-4">NEW ITEM</h2>
      <div class="row">
        <?php
          //해당 카테고리 상품 보여지게
          $sql = "SELECT * FROM shop_data ORDER BY datetime DESC LIMIT 4";
          $result = mysqli_query($conn, $sql);
          
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
        <div class="product_box col-md-3 col-6">
          <div class="product">
            <div class="pd_img">
              <!-- 사용자가 찜한 상품에는 버튼 -->
              <button type="button" style="padding: 6px;" class="pick <?php echo in_array($row['no'], $picked_items) ? 'active' : ''; ?>" data-no="<?php echo $row['no']; ?>">
                <span>
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.6423 11.1126C13.9062 10.394 12.9283 10 11.892 10C10.8538 10 9.87785 10.394 9.14413 11.1122C7.61869 12.5986 7.61869 15.0205 9.14373 16.5092L15.9859 23.0909L23.0478 16.3007C24.3819 14.8233 24.3105 12.5319 22.8561 11.1126C22.1216 10.394 21.1453 10 20.1078 10C19.0684 10 18.0912 10.394 17.3563 11.1122L14.335 14.0289C13.9611 14.3827 13.7552 14.8529 13.7552 15.3508C13.7552 15.8491 13.9611 16.3193 14.3346 16.6734C15.1074 17.4049 16.3674 17.4049 17.1417 16.6734L20.0873 13.8428" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </span>
              </button>
              <a href="./detail.php?no=<?php echo $row['no']; ?>" title="상품">
                <img src="./images/shop/<?php echo $row['img']; ?>" alt="상품이미지">
              </a>
            </div>
            <div class="info">
              <p><?php echo $row['name']; ?></p>
              <p><?php echo number_format($row['price']); ?>원</p>
              <a href="./detail.php?no=<?php echo $row['no']; ?>" title="자세히보기">Show more</a>
            </div>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
    </section>
    <!-- LIP -->
    <section id="sec04">
      <h2 class="fs-2 p-4">LIP</h2>
      <div class="row">
        <?php
          /* 해당 카테고리의 상품 4개 */
          $sql = "SELECT * FROM shop_data WHERE cate = 'cate03' LIMIT 4";
          $result = mysqli_query($conn, $sql);
          
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
        <div class="product_box col-md-3 col-6">
          <div class="product">
            <div class="pd_img">
              <!-- 사용자가 찜한 상품에는 버튼 -->
              <button type="button" style="padding: 6px;" class="pick <?php echo in_array($row['no'], $picked_items) ? 'active' : ''; ?>" data-no="<?php echo $row['no']; ?>">
                <span>
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.6423 11.1126C13.9062 10.394 12.9283 10 11.892 10C10.8538 10 9.87785 10.394 9.14413 11.1122C7.61869 12.5986 7.61869 15.0205 9.14373 16.5092L15.9859 23.0909L23.0478 16.3007C24.3819 14.8233 24.3105 12.5319 22.8561 11.1126C22.1216 10.394 21.1453 10 20.1078 10C19.0684 10 18.0912 10.394 17.3563 11.1122L14.335 14.0289C13.9611 14.3827 13.7552 14.8529 13.7552 15.3508C13.7552 15.8491 13.9611 16.3193 14.3346 16.6734C15.1074 17.4049 16.3674 17.4049 17.1417 16.6734L20.0873 13.8428" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </span>
              </button>
              <a href="./detail.php?no=<?php echo $row['no']; ?>" title="상품">
                <img src="./images/shop/<?php echo $row['img']; ?>" alt="상품이미지">
              </a>
            </div>
            <div class="info">
              <p><?php echo $row['name']; ?></p>
              <p><?php echo number_format($row['price']); ?>원</p>
              <a href="./detail.php?no=<?php echo $row['no']; ?>" title="자세히보기">Show more</a>
            </div>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
    </section>
    <!-- FACE -->
    <section id="sec05">
      <h2 class="fs-2 p-4">FACE</h2>
      <div class="row">
        <?php
          /* 해당 카테고리의 상품 4개 */
          $sql = "SELECT * FROM shop_data WHERE cate = 'cate02' LIMIT 4";
          $result = mysqli_query($conn, $sql);
          
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
        <div class="product_box col-md-3 col-6">
          <div class="product">
            <div class="pd_img">
              <!-- 사용자가 찜한 상품에는 버튼 -->
              <button type="button" style="padding: 6px;" class="pick <?php echo in_array($row['no'], $picked_items) ? 'active' : ''; ?>" data-no="<?php echo $row['no']; ?>">
                <span>
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.6423 11.1126C13.9062 10.394 12.9283 10 11.892 10C10.8538 10 9.87785 10.394 9.14413 11.1122C7.61869 12.5986 7.61869 15.0205 9.14373 16.5092L15.9859 23.0909L23.0478 16.3007C24.3819 14.8233 24.3105 12.5319 22.8561 11.1126C22.1216 10.394 21.1453 10 20.1078 10C19.0684 10 18.0912 10.394 17.3563 11.1122L14.335 14.0289C13.9611 14.3827 13.7552 14.8529 13.7552 15.3508C13.7552 15.8491 13.9611 16.3193 14.3346 16.6734C15.1074 17.4049 16.3674 17.4049 17.1417 16.6734L20.0873 13.8428" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </span>
              </button>
              <a href="./detail.php?no=<?php echo $row['no']; ?>" title="상품">
                <img src="./images/shop/<?php echo $row['img']; ?>" alt="상품이미지">
              </a>
            </div>
            <div class="info">
              <p><?php echo $row['name']; ?></p>
              <p><?php echo number_format($row['price']); ?>원</p>
              <a href="./detail.php?no=<?php echo $row['no']; ?>" title="자세히보기">Show more</a>
            </div>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
    </section>

  </main>
  
  
  <!-- 메인 스크립트 -->
  <script src="./script/main.js"></script>
</body>
</html>