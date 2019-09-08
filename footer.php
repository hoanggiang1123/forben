    <footer>
        <div class="footer-1 container">
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
                <a class="fb" href="javascript:;"><img src="./img/fb.png" alt=""></a>
                <a class="tw" href="javascript:;"><img src="./img/linke.png" alt=""></a>
                <a class="pin" href="javascript:;"><img src="./img/pin.png" alt=""></a>
                <a class="linke" href="javascript:;"><img src="./img/tw.png" alt=""></a>
                <a class="yt" href="javascript:;"><img src="./img/yt.png" alt=""></a>
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
</body>
</html>