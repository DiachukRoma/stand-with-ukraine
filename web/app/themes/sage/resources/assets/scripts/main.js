// IE polyfill for the CustomEvent constructor
(function() {
  if (typeof window.CustomEvent === 'function') {
    return false;
  } //If not IE

  function CustomEvent(event, params) {
    params = params || { bubbles: false, cancelable: false, detail: undefined };
    const evt = document.createEvent('CustomEvent');
    evt.initCustomEvent(event, params.bubbles, params.cancelable, params.detail);
    return evt;
  }

  CustomEvent.prototype = window.Event.prototype;
  window.CustomEvent = CustomEvent;
})();

// import external dependencies
import 'jquery';

import 'bootstrap/js/dist/modal';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';

/** Populate Router instance with DOM routes */
const routes = new Router({
  common,
  home,
});

// Load Events
document.addEventListener('DOMContentLoaded', () => routes.loadEvents());
