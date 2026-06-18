@push('addon-script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const animatedSections = document.querySelectorAll(
                '.kons-services, .kons-about, .kons-media, .kons-why, .kons-value, .kons-governance'
            );

            if (!animatedSections.length) return;

            animatedSections.forEach(function (section) {
                section.classList.add('scroll-animate-ready');
            });

            function animateCounters(section) {
                const counters = section.querySelectorAll('.kons-count-number');

                counters.forEach(function (counter) {
                    const target = parseInt(counter.getAttribute('data-count'), 10);

                    if (isNaN(target)) return;

                    const duration = 1400;
                    const startTime = performance.now();

                    function updateCounter(currentTime) {
                        if (!section.classList.contains('is-visible')) return;

                        const elapsed = currentTime - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        const easedProgress = 1 - Math.pow(1 - progress, 3);
                        const currentValue = Math.floor(easedProgress * target);

                        counter.textContent = currentValue;

                        if (progress < 1) {
                            requestAnimationFrame(updateCounter);
                        } else {
                            counter.textContent = target;
                        }
                    }

                    counter.textContent = 0;
                    requestAnimationFrame(updateCounter);
                });
            }

            function resetCounters(section) {
                const counters = section.querySelectorAll('.kons-count-number');

                counters.forEach(function (counter) {
                    counter.textContent = 0;
                });
            }

            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    const section = entry.target;

                    if (entry.isIntersecting) {
                        section.classList.add('is-visible');

                        if (section.classList.contains('kons-why')) {
                            animateCounters(section);
                        }
                    } else {
                        section.classList.remove('is-visible');

                        if (section.classList.contains('kons-why')) {
                            resetCounters(section);
                        }
                    }
                });
            }, {
                threshold: 0.22,
                rootMargin: '0px 0px -70px 0px'
            });

            animatedSections.forEach(function (section) {
                observer.observe(section);
            });
        });
    </script>
@endpush