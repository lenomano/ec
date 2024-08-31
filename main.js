$(function(){
    /*=================================================
    // カルーセル用 jQueryプラグイン「slick」
    // マニュアル：https://kenwheeler.github.io/slick/
    ===================================================*/
    $('#slider').slick({
      autoplay: true,                         // 自動再生オン
      autoplaySpeed: 3000,                    // スライドを3秒で切り替え
      arrows: true,                           // 左右の矢印を表示
      dots: true,                             // ドット（ページ送り）を表示
      slidesToShow: 1,                        // スライドを1枚表示（※centerModeをtrueにすると両端に2枚見切れた状態になる）
      centerMode: true,                       // センターモード（両端が見切れた状態になる）
      // centerPadding: '18%',                   // 見切れたコンテンツの幅を18%に設定
      prevArrow:'<div class="prev"></div>',   // 前へ矢印のHTMLを変更する
      nextArrow:'<div class="next"></div>',   // 次へ矢印のHTMLを変更する
      responsive: [              // レスポンシブの設定
        {
          breakpoint: 900,       // 900px以下の場合に適用
          settings: {
            centerMode: false    // センターモードをオフにする
          }
        }
      ]
    });
  });

  // トップに戻るボタン
  $(function(){
    var pagetop = $('#page-top');
    pagetop.hide();
    $(window).scroll(function () {
       if ($(this).scrollTop() > 100) {
            pagetop.fadeIn();
       } else {
            pagetop.fadeOut();
       }
    });
    pagetop.click(function () {
       $('html, body').animate({ scrollTop: 0 }, 500);
       return false;
    });
  });