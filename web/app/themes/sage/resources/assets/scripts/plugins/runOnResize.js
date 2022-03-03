// Run a function on resize with a 'debounce' function
// to ensure it does not get called too often

// call on load
function_to_call();

// call on window resize
$(window).resize(function () {
    waitForFinalEvent(function () {
        function_to_call();
    }, 500, 'unique_string');
});

// debounce-like function to keep functions from
// getting called too often during resize event
const waitForFinalEvent = (function () {
    const timers = {};
    return function (callback, ms, uniqueId) {
        if (!uniqueId) {
            uniqueId = 'Use a uniqueId';
        }
        if (timers[uniqueId]) {
            clearTimeout(timers[uniqueId]);
        }
        timers[uniqueId] = setTimeout(callback, ms);
    };
})();

// function to call (example)
function function_to_call()
{

  // Empty function
  // this is where you do everything

}
