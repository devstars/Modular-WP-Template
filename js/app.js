//import StickyHeader from './modules/StickyHeader';
//import Hamburger from './modules/Hamburger';
import ScrollDown from './modules/ScrollDown';
import LazyImages from './modules/LazyImages';
import Accordion from './modules/Accordion';
import DropDown from './modules/DropDown';
import browserInfo from './modules/BrowserInfo.js';
//import Accordion from './modules/Accordion';
require('./jquery.lazyloadxt.min.js');
require('./jquery.lazyloadxt.bg.min.js');
require('./modules/Modals.js');

(function () {

       class Hamburger {
              constructor() {
                     const hamburger = document.querySelector(".hamburger-js");
                     const menuMobile = document.querySelector(".menu-mobile-js");
                     const navTop = document.querySelector(".c-nav-top");

                     hamburger.addEventListener('click', function () {
                            menuMobile.classList.toggle("active");

                            if (hamburger.classList.contains("active")) {
                                   hamburger.classList.remove("active");
                                   document.querySelector(".nav-top-js").classList.remove("mobile-active");

                                   if (navTop.classList.contains("sticky")) return;

                                   if (navTop.classList.contains("section-transparent-tmp")) {
                                          navTop.classList.replace("section-transparent-tmp", "section-transparent");
                                   }

                            } else {
                                   hamburger.classList.add("active");
                                   document.querySelector(".nav-top-js").classList.add("mobile-active");

                                   if (navTop.classList.contains("sticky")) return;

                                   if (navTop.classList.contains("section-transparent")) {
                                          navTop.classList.replace("section-transparent", "section-transparent-tmp");
                                   }
                            }
                     });
              }
       }


       let hamburger = new Hamburger();

       class StickyHeader {
              constructor() {
                     this.siteHeader = document.querySelector(".c-nav-top");

                     document.addEventListener("scroll", () => this.scroll());
              }

              scroll() {
                     if (window.scrollY > 60) {
                            this.siteHeader.classList.add("sticky");

                            if (!this.siteHeader.classList.contains("mobile-active")) {
                                   if (this.siteHeader.classList.contains("section-transparent")) {
                                          this.siteHeader.classList.replace("section-transparent", "section-transparent-tmp");
                                   }
                            }


                     } else {
                            this.siteHeader.classList.remove("sticky");
                            if (!this.siteHeader.classList.contains("mobile-active")) {
                                   if (this.siteHeader.classList.contains("section-transparent-tmp")) {
                                          this.siteHeader.classList.replace("section-transparent-tmp", "section-transparent");
                                   }
                            }

                     }
              }
       }


       let stickyHeader = new StickyHeader();


       let scrollDown = new ScrollDown();
       let lazyImage = new LazyImages();
       let accordion = new Accordion(jQuery);
       let bI = new browserInfo();

       $ = new DropDown(jQuery);



       $(".drop-down-js").each(
              function () {
                     let self = this;
                     $(this).dropDown({
                            select: function (el) {
                                   let chosen = $(el).find(".option-js").text();
                                   $(self).find(".drop-p-js").text(chosen).addClass("filled");
                            }
                     });
              }
       );
}());