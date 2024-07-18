
  <style>
    /* 하단 바텀바 서식 */
    footer > nav{
      position: fixed;
      width: 100%;
      bottom: 0;
      border-top: 1px solid #ccc;
      background: #fff;
      z-index: 100;
    }
    footer > nav ul{
      display: flex;
      justify-content: space-evenly;
      width: 100%;
      padding: 0;
    }
    footer > nav ul li{
      text-align: center;
      width: 60px; height: 60px;
      list-style: none;
    }
    footer > nav a{
      display: flex;
      flex-direction: column;
      text-decoration: none;
      width: 100%;
      height: 100%;
      color: #666;
      justify-content: center;
      align-items: center;
      gap: 5px;
    }
    /* 아이콘 크기 조정 */
    footer > nav ul li i{
      font-size: 1.5rem;
      color: var(--black);
    }
    .bi-heart::before{
      transform: scale(0.9);
    }
    .bi-person::before{
      transform: scale(1.1);
    }

    /* 글씨 스타일 조정 */
    footer > nav ul li span{
      text-align: center;
      font-size: var(--fs-small);
      font-weight: var(--fw-light);
      color: var(--black);
      text-wrap: nowrap;
    }

    /* 활성화 버튼 컬러 */
    footer a.active >*{
      color: var(--red);
    }

  </style>


  <!-- 하단 바텀바 -->
  <footer>
    <nav>
      <ul>
        <li>
          <a href="./index.php" title="홈">
            <i class="bi bi-house"></i>
            <span class="">홈</span>
          </a>
        </li>
        <li>
          <a href="#" title="검색">
            <i class="bi bi-search"></i>
            <span>검색</span>
          </a>
        </li>
        <li>
          <a href="#" title="상담">
            <i class="bi bi-chat-dots"></i>
            <span>상담</span>
          </a>
        </li>
        <li>
          <a href="#" title="찜">
            <i class="bi bi-heart"></i>
            <span>찜</span>
          </a>
        </li>
        <li>
          <a href="./mypage.php" title="마이페이지">
            <i class="bi bi-person"></i>
            <span>마이페이지</span>
          </a>
        </li>
      </ul>
    </nav>
  </footer>


  <script>
  $(document).ready(function() {
    // 페이지가 로드될 때 localStorage에서 active 정보를 가져와 설정
    const activeLink = localStorage.getItem("activeLink");
    if (activeLink) {
      $("footer nav ul li a").each(function() {
        if ($(this).attr("href") === activeLink) {
          $(this).addClass("active");
        } else {
          $(this).removeClass("active");
          
        }
      });
    }
    // 각 링크에 클릭 이벤트 추가
    $("footer nav ul li a").click(function(event) {
      event.preventDefault();

      // 기존 active 클래스 제거
      $("footer nav ul li a.active").removeClass("active");

      // 클릭된 링크에 active 클래스 추가
      $(this).addClass("active");

      // localStorage에 activeLink 저장
      const href = $(this).attr("href");
      localStorage.setItem("activeLink", href);

      // 페이지 이동
      window.location.href = href;
    });
  });
</script>
