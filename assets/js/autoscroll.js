function start_scroll_down() { 
    scroll = setInterval(function(){ window.scrollBy(0, 1); console.log('start');}, 15);
 }
 function stop_scroll_down() {
    clearInterval(scroll);
 }
 start_scroll_down();