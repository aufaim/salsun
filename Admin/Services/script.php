<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script>
    $("#logout").on("click", function(){
        $("#form-logout").submit();
    });
</script>

<script>
(function () {
    var current = location.pathname.split('/').pop();
    var is_crud = current.split('-')[1];
    if(is_crud != undefined){
        current = is_crud;
    }
    if (current === "") return;
    var menuItems = document.querySelectorAll('.side-menu a');
    for (var i = 0, len = menuItems.length; i < len; i++) {
        if (menuItems[i].getAttribute("href").indexOf(current) !== -1) {
            menuItems[i].className += "active";
        }
    }
})();
</script>
