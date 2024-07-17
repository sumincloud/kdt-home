$(document).ready(function() {

  //찜버튼 클릭시 no값 전달하고 php실행
  $('.pick').on('click', function() {
    // 클릭된 버튼의 데이터 속성에서 no 값을 가져옴
    const no = $(this).data('no');

    // Ajax 요청 보내기
    $.ajax({
      url: './php/cart_input.php',
      type: 'GET',
      data: { no: no },
      success: function(response) {
        // 성공적으로 처리되었을 때의 동작 (예: 필요한 경우 처리)
        console.log('Ajax request succeeded.');
        // 찜 버튼에서 active 클래 추가
        $(`.pick[data-no="${no}"]`).addClass('active');
      },
      error: function(xhr, status, error) {
        // 오류 발생 시 처리
        console.error('Ajax request failed:', error);
      }
    })
  });


  // 찜 버튼에서 active 클래스 제거할 때
  $('.pick.active').on('click', function() {
    const no = $(this).data('no');

    // Ajax 요청 보내기
    $.ajax({
      url: './php/cart_delete.php',
      type: 'GET',
      data: { no: no },
      success: function(response) {
        console.log('찜 상태 삭제 완료');
        
        // 찜 버튼에서 active 클래스 제거
        $(`.pick[data-no="${no}"]`).removeClass('active');
        
      },
      error: function(xhr, status, error) {
        console.error('Ajax request failed:', error);
      }
    });
  })


  //------메인배너 이미지 사이즈 변경--------
    function screenSize() {
      var screenWidth = $(window).width();
      if (screenWidth <= 768) {
        // 화면이 768px 이하일 때 이미지 경로를 변경
        $('#img1').attr('src', './images/main/m_main_1.jpg');
        $('#img2').attr('src', './images/main/m_main_2.jpg');
        $('#img3').attr('src', './images/main/m_main_3.jpg');
        $('#img4').attr('src', './images/main/m_main_4.jpg');
      } else {
        // 화면이 768px 초과일 때 원래 이미지 경로로 복구 (필요시 추가 구현)
        $('#img1').attr('src', './images/main/main_1.jpg');
        $('#img2').attr('src', './images/main/main_2.jpg');
        $('#img3').attr('src', './images/main/main_3.jpg');
        $('#img4').attr('src', './images/main/main_4.jpg');
      }
    }
    // 초기 로드시 화면 너비에 따라 처리
    screenSize();
    // 윈도우 리사이즈 이벤트 핸들러
    $(window).resize(function() {
      screenSize();
    });






  });
  




//1. 메인 슬라이드
var swiper = new Swiper(".mySwiper1", {
  autoplay: {
    delay: 4000,
    disableOnInteraction: false
  },
  pagination: {
    el: ".swiper-pagination",
    type: "progressbar",
  },
});

//2. 메인 슬라이드
var swiper = new Swiper(".mySwiper2", {
  autoplay: {
    delay: 4000,
    disableOnInteraction: false
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});





