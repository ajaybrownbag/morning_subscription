$(document).ready(function(){
$(function() {
    $('#login-form-link').click(function(e) {
		e.preventDefault();
		$("#register-form").fadeOut(1);
        $("#login-form").fadeIn(100);
		$('#register-form-link').removeClass('active');
        $(this).addClass('active');
    });
    $('#register-form-link').click(function(e) {
		e.preventDefault();
		$("#login-form").fadeOut(1);
        $("#register-form").fadeIn(100);
		$('#login-form-link').removeClass('active');
        $(this).addClass('active');
    });
});

$(".forgetpass").click(function(){
	$(".cardhide").hide();
	$(".cardshow").show();
});
$(".reveal").click(function () {
    var type = ($(".pwd").attr('type') == "password") ? "text" : "password";
    var className = (type == "password") ? "fa-eye" : "fa-eye-slash";
    $(".pwd").attr('type', type);
    $(this).removeClass("fa-eye-slash fa-eye").addClass(className);
});
  
$('.collapse.in').prev('.panel-heading').addClass('active');
$('#accordionaccp, .panel-collapse')
    .on('show.bs.collapse', function (a) {
        $(a.target).prev('.panel-heading').addClass('active');
    })
    .on('hide.bs.collapse', function (a) {
        $(a.target).prev('.panel-heading').removeClass('active');
});	
});

$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }
        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});

$('.input-number').change(function() {
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
});


function toggleChevron(e) {
    $(e.target)
        .prev('.panel-heading')
        .find("i.indicator")
        .toggleClass('glyphicon glyphicon-plus glyphicon glyphicon-minus');
}
$('#accordionaccp').on('hidden.bs.collapse', toggleChevron);
$('#accordionaccp').on('shown.bs.collapse', toggleChevron); 

if($(window).width() <= 767){
function myacc_mob_boxopen() {
    document.getElementById("myacc_mobSidenav").style.marginRight = "0%";
    document.getElementById("myacc_mobOverlay").style.display = "block";
    $("body").css("overflow","hidden");
}
function myacc_mob_boxclose() {
    document.getElementById("myacc_mobSidenav").style.marginRight = "-75%";
    document.getElementById("myacc_mobOverlay").style.display = "none";
    $("body").css("overflow","visible");
}
}else{
function myacc_mob_boxopen() {
    document.getElementById("myacc_mobSidenav").style.marginRight = "-35px";
} };

function filter_mob_boxopen() {
    document.getElementById("filter_mobSidenav").style.left = "0%";
    document.getElementById("filter_mobOverlay").style.display = "block";
    $("body").css("overflow","hidden");
};
function filter_mob_boxclose() {
    document.getElementById("filter_mobSidenav").style.left = "-75%";
    document.getElementById("filter_mobOverlay").style.display = "none";
    $("body").css("overflow","visible");
};
$('#header').affix({offset: {top: $("#top-nav").outerHeight(true)} });

function headeradjustmob(){
if ($(window).width() >= 767) return;
$('.searchwidth').css('min-width','100%');

	$(window).scroll(function() {
		var tophead = $(".header-logo").outerHeight();
		var iconbarwidthvar = $(".iconbarwidth").outerWidth();
		var iconshopbagvar = $(".iconshopbag").outerWidth();
		var searchwidthvar = $(".searchwidth").outerWidth();
		if ($(this).scrollTop() > tophead){
			$('.header-logo').hide();
			$('.mobilescrollhide').hide();
			$('.searchwidth').css({'left':iconbarwidthvar, 'right':iconshopbagvar,'position':'fixed','z-index':'99','top':'12px','width':'50%'});
			var windowwidth = $(window).width();
			var windowminusleft = windowwidth - iconbarwidthvar;
			var windowminusright = windowminusleft - iconshopbagvar;
			$('.easy-autocomplete').css({'width':windowminusright});
			$('.easy-autocomplete.eac-square input').css({'min-width':windowminusright});
		}
		else{
			$('.header-logo').show();
			$('.mobilescrollhide').show();
			$('.searchwidth').css({'left':'0px', 'right':'0px','position':'relative','z-index':'1','top':'0px','width':'100%'});
			$('.easy-autocomplete').css({'width':'100%'});
		}
    }); 
};
headeradjustmob();
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

function productdetail(){
$(function () {
    $('.button-checkbox').each(function () {
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');
            $button.data('state', (isChecked) ? "on" : "off");
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);
            if (isChecked) {
                $button
                    .removeClass('btn-disabled')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-disabled');
            }
        }
        function init() {
            updateDisplay();
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});
};
productdetail();