    <?php if(!is_page_template('vuacasino.php') && !is_page_template('vuacasino1.php')):?>
    <footer class="footer__single">
        <div class="footer-1 container footer-1-single">
            <div class="footer__info">
               <img src="https://cdn.shortpixel.ai/client/q_glossy,ret_img/https://www.gotchseo.com/wp-content/uploads/2018/02/logo.png" alt="">
               <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Saepe, nihil natus veritatis adipisci ipsum pariatur excepturi beatae animi sapiente sunt.</p>
            </div>
            <div class="footer__link">
                <ul>
                    <li><a href="javascript:;">Gioi Thieu</a></li>
                    <li><a href="javascript:;">Lien He</a></li>
                    <li><a href="javascript:;">Chinh Sach</a></li>
                    <li><a href="javascript:;">Dieu Khoan</a></li>
                </ul>
            </div>
            <div class="footer__social">
                <a class="fb" href="javascript:;"><img src="<?php echo BEN_THEME_URL.'/img/fb.png';?>" alt="fb"></a>
                <a class="tw" href="javascript:;"><img src="<?php echo BEN_THEME_URL.'/img/linke.png';?>" alt="tw"></a>
                <a class="pin" href="javascript:;"><img src="<?php echo BEN_THEME_URL.'/img/pin.png';?>" alt="pin"></a>
                <a class="linke" href="javascript:;"><img src="<?php echo BEN_THEME_URL.'/img/tw.png';?>" alt="linke"></a>
                <a class="yt" href="javascript:;"><img src="<?php echo BEN_THEME_URL.'/img/yt.png';?>" alt="yt"></a>
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
                vuacasino.slider();
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
            slider: function() {
                var mySwiper = new Swiper ('.swiper-container', {
                    direction:'horizontal',
                    loop: true,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    pagination: {
                        el: '.swiper-pagination',
                    }
                });
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
            autoplaySpeed: 1500,
            cssEase: 'linear'
            });
        })
	</script>
    <?php endif;?>
</body>
</html>