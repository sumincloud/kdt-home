<?php
  include('../../php/include/dbconn.php');
?>


<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>공통 컴포넌트 정리</title>
  <!-- 부트스트랩 아이콘폰트 연결 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- 부트스트랩 css연결하기 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- 부트스트랩 js연결하기 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- 초기화서식 연결 -->
  <link rel="stylesheet" href="../../css/reset.css">
  <!-- 공통서식 연결 -->
  <link rel="stylesheet" href="../../css/common.css">
  <!-- 제이쿼리 -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <style>
    body{
      display: flex;
      flex-wrap: wrap;
      gap: 50px;
    }
    .cart_box{
      background: #ccc;
      border: 1px solid #aaa;
      width: 100px;height: 100px;
      position: relative;
    }
  </style>
</head>
<body>
  <!-- 찜버튼 -->
  <div class="cart_box">
    <div class="cart">
      <img src="./heart_w.png" alt="찜버튼">
    </div>
  </div class="cart_box">
  <div class="cart_box">
    <div class="cart">
      <img src="./heart_r.png" alt="찜버튼">
    </div>
  </div class="cart_box">

  <!-- 별점 -->
  <div class="star">
    <i class="bi bi-star-fill active"></i>
    <i class="bi bi-star-fill"></i>
    <i class="bi bi-star-fill"></i>
    <i class="bi bi-star-fill"></i>
    <i class="bi bi-star-fill"></i>
  </div>

  <!-- 리스트 형식 -->
  <ul class="list">
    <li>
      <span>07.01</span>
      <a href="#" title="제목">새로운 공지사항입니다</a>
      <span class="active">N</span>
    </li>
    <li>
      <span>06.25</span>
      <a href="#" title="제목">중요 업데이트 안내</a>
      <span class="active">N</span>
    </li>
    <li>
      <span>06.15</span>
      <a href="#" title="제목">서비스 점검 예정</a>
      <span>N</span>
    </li>
    <li>
      <span>06.15</span>
      <a href="#" title="제목">서비스 점검 예정</a>
      <span>N</span>
    </li>
  </ul>


  <!-- 탭 컨텐츠 형식 -->
  <div class="tab">
    <ul>
      <li class="tab-item">
        <button class="tab-link active" data-tab-target="#tab1" type="button">탭1</button>
      </li>
      <li class="tab-item">
        <button class="tab-link" data-tab-target="#tab2" type="button">탭2</button>
      </li>
      <li class="tab-item">
        <button class="tab-link" data-tab-target="#tab3" type="button">탭3</button>
      </li>
    </ul>
    <div class="tab_con">
      <div class="active" id="tab1">
        <ul class="list">
          <li>
            <span>07.01</span>
            <a href="#" title="제목">탭1 제목을 입력해주세요.</a>
            <span class="active">N</span>
          </li>
          <li>
            <span>06.25</span>
            <a href="#" title="제목">탭1 제목을 입력해주세요.</a>
            <span class="active">N</span>
          </li>
          <li>
            <span>06.15</span>
            <a href="#" title="제목">탭1 제목을 입력해주세요.</a>
            <span>N</span>
          </li>
          <li>
            <span>06.15</span>
            <a href="#" title="제목">탭1 제목을 입력해주세요.</a>
            <span>N</span>
          </li>
        </ul>
      </div>
      <div id="tab2">
        <ul class="list">
          <li>
            <span>07.01</span>
            <a href="#" title="제목">탭2 제목을 입력해주세요.</a>
            <span class="active">N</span>
          </li>
          <li>
            <span>06.25</span>
            <a href="#" title="제목">탭2 제목을 입력해주세요.</a>
            <span>N</span>
          </li>
          <li>
            <span>06.15</span>
            <a href="#" title="제목">탭2 제목을 입력해주세요.</a>
            <span>N</span>
          </li>
          <li>
            <span>06.15</span>
            <a href="#" title="제목">탭2 제목을 입력해주세요.</a>
            <span>N</span>
          </li>
        </ul>
      </div>
      <div id="tab3">
        <ul class="list">
          <li>
            <span>07.01</span>
            <a href="#" title="제목">탭3 제목을 입력해주세요.</a>
            <span class="active">N</span>
          </li>
          <li>
            <span>06.25</span>
            <a href="#" title="제목">탭3 제목을 입력해주세요.</a>
            <span class="active">N</span>
          </li>
          <li>
            <span>06.15</span>
            <a href="#" title="제목">탭3 제목을 입력해주세요.</a>
            <span>N</span>
          </li>
          <li>
            <span>06.15</span>
            <a href="#" title="제목">탭3 제목을 입력해주세요.</a>
            <span>N</span>
          </li>
        </ul>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $('.tab-link').on('click', function() {
          $('.tab-link').removeClass('active');
          $(this).addClass('active');
          
          // 모든 탭 콘텐츠 숨기기
          $('.tab_con > div').removeClass('active');
          // 데이터 속성으로 타겟팅된 탭 콘텐츠 보이기
          var target = $(this).data('tab-target');
          $(target).addClass('active');
        });
      });
    </script>
  </div>

  <!-- 버튼 형식 -->
  <div class="btn-box-s">
    <button class="btn-s line">Small Button</button>
    <button class="btn-s">Small Button</button>
  </div>
  <div class="btn-box-l">
    <button class="btn-l">Large Button</button>
    <button class="btn-l">Large Button</button>
  </div>


  <!-- 상품목록 카드 스타일 -->
  <ul class="card-list">
    <!-- 태그에 맞는 강의 가져와서 리스트로 넣기 -->
    <?php
      $sql = "select * from academy_list where category2='자격증'";
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_array($result)) {
    ?>
    <li>
      <div>
        <!-- 강의 썸네일 이미지 -->
        <a href="./cook_academy_detail.php?class_no=<?= $row['class_no']; ?>" title="상세페이지로 이동">
          <img src="./uploads/class_detail/<?php echo $row['thumnail_img']; ?>" alt="강의 썸네일 사진">
        </a>
        <!-- 강의 이름 -->
        <div>
          <h2>
            <a href="./cook_academy_detail.php?class_no=<?= $row['class_no']; ?>" title="상세페이지로 이동">
              <?php echo $row['name']; ?>
            </a>
          </h2>

          <!-- 강의 # 태그 -->
          <p>
            <span>#<?php echo $row['category2']; ?></span>
            <span>#<?php echo $row['category1']; ?></span>
            <span>#<?php echo $row['category3']; ?></span>
          </p>

          <!-- 기간 / 강사이름 -->
          <div>
            <span><?php echo $row['start_date']; ?> ~ <?php echo $row['end_date']; ?></span>
            <span><?php echo $row['teacher']; ?></span>
          </div>
        </div>
        <!-- 찜버튼 -->
        <div class="cart">
          <img src="./heart_w.png" alt="찜버튼">
        </div>
      </div>

      <!-- 버튼이 들어가는 경우에만 삽입 -->
      <div>
        <div class="btn-box-s mt-4">
          <button class="btn-s line">Small Button</button>
          <button class="btn-s line">Small Button</button>
        </div>
        <div class="btn-box-l mt-2 mb-2">
          <button class="btn-l">Large Button</button>
        </div>
      </div>

    </li>
    <?php } ?>
  </ul>
</body>
</html>