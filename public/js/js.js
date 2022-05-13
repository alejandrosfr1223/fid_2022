window.onload = function() {
    var p = document.getElementsByClassName("viewbook"); 
    for(var i=0; i<p.length; i++){
        p[i].onclick = function(){ 
            Swal.fire({
                icon: 'info',
                title: 'Proximamente disponible',
                showConfirmButton: false,
                timer: 2500
            });
        } 
    }

    var anchors = document.getElementsByClassName('icons_members_index');
    for(var i = 0; i < anchors.length; i++) {
        var anchor = anchors[i];
        anchor.onclick = function() {
        	var slideSource = document.getElementById('index_members');
        	fadeOut(slideSource);
            switch (this.id) {
				case "open_formation":
					var slideopen = document.getElementById('f_members');
					fadeIn(slideopen);
					break;
				case "open_investigation":
					var slideopen = document.getElementById('i_members');
					fadeIn(slideopen);
					break;
				case "open_documentation":
					var slideopen = document.getElementById('d1_members');
					fadeIn(slideopen);
					break;
				case "open_diffusion":
					var slideopen = document.getElementById('d2_members');
					fadeIn(slideopen);
					break;
			}
        }
    }

    var info = document.getElementsByClassName('returnback');
    for(var i = 0; i < info.length; i++) {
        var anchor = info[i];
        anchor.onclick = function() {
        	var slideSourceClose = document.getElementsByClassName('member_menu_open');
        	for (i=0;i<4;i++){
        		var slideSource = slideSourceClose[i];
        		fadeOut(slideSource);
        	}
        	var slideSource = document.getElementById('index_members');
        	fadeIn(slideSource);
        }
    }
}

function fadeOut(element) {
    var op = 1;  // initial opacity
    var timer = setInterval(function () {
        if (op <= 0.1){
            clearInterval(timer);
            element.style.display = 'none';
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op -= op * 0.1;
    }, 20);
}

function fadeIn(element) {
    var op = 0.1;  // initial opacity
    element.style.display = 'block';
    var timer = setInterval(function () {
        if (op >= 1){
            clearInterval(timer);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.1;
    }, 20);
}