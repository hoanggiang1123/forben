    <?php if(!is_page_template('vuacasino.php') && !is_page_template('vuacasino1.php')):?>
    <footer class="footer__single">
        <div class="footer-1 container footer-1-single">
            <div class="footer__info">
               <img src="https://vuacasino.info/wp-content/uploads/2019/09/logo-vuacasino.info_.png" alt="logo vuacasino.info">
               <p align="left">Website: Vuacasino.info <br><br/>
Địa chỉ: Số 31 ngõ 370 nguyễn trãi thanh xuân hà nội<br><br/>
Sđt: +84936179910<br><br/>
Email: vuacasino.info@gmail.com</p>
            </div>
            <div class="footer__link">
                <ul>
                    <li><a href="https://vuacasino.info/gioi-thieu/">Giới Thiệu</a></li>
                    <li><a href="https://vuacasino.info/lien-he/">Liên Hệ</a></li>
                    <li><a href="https://vuacasino.info/chinh-sach/">Chính Sách</a></li>
                    <li><a href="https://vuacasino.info/dieu-khoan-dich-vu/">Điều Khoản</a></li>
					<li><a href="https://vuacasino.info/anh-gai/">Ảnh Gái Xinh</a></li>
					<li><a href="https://vuacasino.info/tin-tuc-tong-hop/">Tin Tức Tổng Hợp</a></li>
                </ul>
            </div>
            <div class="footer__social">
                <a class="fb" href="https://www.facebook.com/vuacasino.info"><img src="<?php echo BEN_THEME_URL.'/img/fb.png';?>" alt="Vuacasino.info trên Facebook"></a>
                <a class="tw" href="https://twitter.com/vuacasino"><img src="<?php echo BEN_THEME_URL.'/img/linke.png';?>" alt="Vuacasino.info trên Twitter"></a>
                <a class="pin" href="https://www.pinterest.com/vuacasino"><img src="<?php echo BEN_THEME_URL.'/img/pin.png';?>" alt="Vuacasino.info trên Pinterest"></a>
                <a class="linke" href="http://www.linkedin.com/in/vuacasino"><img src="<?php echo BEN_THEME_URL.'/img/tw.png';?>" alt="Vuacasino.info trên Linkedin"></a>
                <a class="yt" href="https://www.youtube.com/channel/UCakUCBMMwwSr6H8MV-EPaMQ"><img src="<?php echo BEN_THEME_URL.'/img/yt.png';?>" alt="Vuacasino.info trên Youtube"></a>
            </div>
        </div>
        <div class="footer-cp">
            <p> © vuacasino All Rights Reserved.</p>
        </div>
    </footer>
    <?php wp_footer();?>
    <script>
        var vuacasino = {
            isSearchOpen: false,
            isMenuOpen: false,
            init: function() {
                vuacasino.openSearch();
                vuacasino.closeSearch();
                vuacasino.toogleMenu();
				vuacasino.toogleMenuMobile();
            },
            openSearch: function() {
                document.querySelector(".icon__search i").addEventListener("click", function() {
                    if(vuacasino.isSearchOpen == false) {
                        document.querySelector(".main__search").classList.add("opened");
                        vuacasino.isSearchOpen = true;
                    }
                })
            },
            closeSearch: function() {
                document.querySelector(".btn__close").addEventListener("click",function() {
                    document.querySelector(".main__search").classList.remove("opened");
                    vuacasino.isSearchOpen = false;
                })
            },
            toogleMenu: function() {
                document.getElementById("menu-toggle").addEventListener("click", function() {
                    if(vuacasino.isMenuOpen == false) {
                        document.querySelector(".site-nav").classList.add("nav-mobile");
                        vuacasino.isMenuOpen = true;
                    } else {
                        document.querySelector(".site-nav").classList.remove("nav-mobile");
                        vuacasino.isMenuOpen = false;
                    }
                })
            },
            
			toogleMenuMobile: function() {
				navs = document.querySelectorAll('ul li.menu-item-has-children');
				for(let i = 0; i < navs.length; i++) {
					var btn = navs[i].querySelector('i');
					btn.addEventListener("click",function(){
						var ul = navs[i].querySelector('ul.sub-menu');
						if(ul != undefined) {
							if(ul.clientHeight == 0) {
								ul.style.height = 'auto';
							} else {
								ul.style.height = 0;
							}
						}
					})
				}
			}
           
        }
        vuacasino.init();
    </script>
    <?php endif;?>
    <?php if(is_page_template('vuacasino.php')):?>
    <script>
        jQuery(document).ready(function($){
        $('.mobileImage').slick({
            
            dots: true,
            infinite: true,
            speed: 500,
            fade: true,
            autoplay: true,
            autoplaySpeed: 500,
            cssEase: 'linear'
            });
        })
	</script>
    <?php endif;?>
</body>
</html>