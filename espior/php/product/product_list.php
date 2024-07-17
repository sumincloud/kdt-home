<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>상품목록</title>
  <!-- 부트스트랩 CSS 연결 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- 부트스트랩 JS 연결 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    img {
      width: 100px;
      height: 100px;
      object-fit: cover;
    }
    table {
      width: 100%;
    }
    th, td {
      text-align: center;
      vertical-align: middle;
    }
    .table-caption {
      caption-side: top;
      text-align: center;
      font-size: 1.5rem;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>
  <!-- 관리자 헤더삽입 -->
  <?php include('./admin_header.php')?>

  <main class="container my-5">
    <h2 class="text-center mb-4">상품목록 리스트</h2>
    <?php
      include('../../db/dbconn.php');
      $sql = "SELECT * FROM shop_data";
      $result = mysqli_query($conn, $sql);

      echo "<table class='table table-striped table-bordered'>";
      echo "<caption class='table-caption'>상품목록 리스트</caption>";
      echo "<thead class='table-dark' style='text-wrap:nowrap;'><tr>
              <th>No.</th>
              <th>상품분류</th>
              <th>상품명</th>
              <th>보조설명</th>
              <th>가격</th>
              <th>설명</th>
              <th>메모</th>
              <th>등록일</th>
              <th>이미지</th>
              <th>관리</th>
            </tr></thead>";
      echo "<tbody>";

      while($row = mysqli_fetch_row($result)){
        echo "<tr><td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[3] . "</td>";
        echo "<td>" . $row[4] . "</td>";
        echo "<td>" . $row[5] . "</td>";
        echo "<td>" . $row[6] . "</td>";
        echo "<td>" . $row[7] . "</td>";
        echo "<td>" . date('Y-m-d', strtotime($row[8])) . "</td>";
        echo "<td><img src='../../images/shop/" . $row[2] . "' alt='이미지'></td>";
        echo "<td style='text-wrap:nowrap;'>
                <a href='product_update.php?no=" . $row[0] . "' class='btn btn-warning btn-sm' title='수정'>수정</a>
                <a href='product_del.php?no=" . $row[0] . "' class='btn btn-danger btn-sm' title='삭제'>삭제</a>
              </td></tr>";
      }
      echo "</tbody>";
      echo "</table>";

      mysqli_free_result($result); // 쿼리 내용을 메모리에서 제거
      mysqli_close($conn);
    ?>
  </main>

  <!-- 관리자 푸터삽입 -->
  <?php include('./admin_footer.php')?>

</body>
</html>
