(function ($) {
    class Counters {
        constructor() {
            this.countersScroll();

            document.addEventListener("scroll", () => this.countersScroll());
        }

        countersScroll() {
            const counters = document.querySelector(".counters-js");
            if (!counters) return;

            let scrollPercent = (counters.getBoundingClientRect().top / window.innerHeight) * 100;

            if ((scrollPercent < 90) && !counters.classList.contains("done")) {
                $('.counter-js').countTo();
                counters.classList.add("done");
            }
        }

    }

    $(document).ready(function () {
        var counters = new Counters();
    });

}(jQuery));