<script>
    document.addEventListener("DOMContentLoaded", function () {
        const counters = document.querySelectorAll(".kons-count-number");

        const animateCounter = (counter) => {
            const target = Number(counter.dataset.count);
            const duration = 1600;
            const startTime = performance.now();

            const updateCounter = (currentTime) => {
                const elapsedTime = currentTime - startTime;
                const progress = Math.min(elapsedTime / duration, 1);

                const currentValue = Math.floor(progress * target);
                counter.textContent = currentValue;

                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };

            requestAnimationFrame(updateCounter);
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const counter = entry.target;

                    if (!counter.classList.contains("is-counted")) {
                        counter.classList.add("is-counted");
                        animateCounter(counter);
                    }

                    observer.unobserve(counter);
                }
            });
        }, {
            threshold: 0.4
        });

        counters.forEach((counter) => {
            observer.observe(counter);
        });
    });
</script>