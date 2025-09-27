/*------------------------------------------------------
Animated Counters
------------------------------------------------------*/
function initCounters() {
  document.querySelectorAll(".single-counter").forEach(function (item) {
    let target = parseInt(item.getAttribute("data-number"));
    let current = 0,
        duration = 1500,
        interval = 10,
        steps = duration / interval;
    let increment = target / steps;

    let stop = setInterval(function () {
      current += increment;
      if (current >= target) {
        current = target;
        clearInterval(stop);
      }
      item.textContent = Math.floor(current) + "+";
    }, interval);
  });
}

initCounters();