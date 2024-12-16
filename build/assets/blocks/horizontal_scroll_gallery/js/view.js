import Lenis from '@studio-freight/lenis';
import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";

// noinspection JSUnresolvedVariable
(function ($) {
    $(function () {
        // noinspection JSUnresolvedVariable
        if (!CCM_EDIT_MODE) {
            gsap.registerPlugin(ScrollTrigger);

            const sections = gsap.utils.toArray(".section");

            sections.forEach((section) => {
                let panel = Array.from(section.querySelectorAll(".horizontal-scroll-gallery .panel"));

                // noinspection JSCheckFunctionSignatures
                let tl = gsap.timeline({
                    scrollTrigger: {
                        pin: true,
                        scrub: 1,
                        trigger: section,
                        invalidateOnRefresh: true,
                        end: () =>
                            "+=" + (section.scrollWidth - document.documentElement.clientWidth)
                    }
                });

                tl.to(
                    panel,
                    {
                        x: () =>
                            -(section.scrollWidth - document.documentElement.clientWidth) + "px",
                        ease: "none"
                    },
                    0.05
                );

                tl.to({}, {duration: 0.1});
            });
        }
    });
})(jQuery);
