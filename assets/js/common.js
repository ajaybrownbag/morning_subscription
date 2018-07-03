
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

    $(window).load(function(){        
        $('#selectlocation').modal('show');
    });
    $(".selectcity").chosen();
    $(".selectarea").chosen();
    $(".selectsociety").chosen();
    
$('.collapse.in').prev('.panel-heading').addClass('active');
$('#accordionaccp, .panel-collapse')
    .on('show.bs.collapse', function (a) {
        $(a.target).prev('.panel-heading').addClass('active');
    })
    .on('hide.bs.collapse', function (a) {
        $(a.target).prev('.panel-heading').removeClass('active');
});

function sidebarcategory() {
if($(window).width() <= 767) return;
var $sticky = $('.sticky');
  var $stickyrStopper = $('.sticky-stopper');
  if (!!$sticky.offset()) {
    var generalSidebarHeight = $sticky.innerHeight();
    var stickyTop = $sticky.offset().top;
    var stickOffset = 0;
    var stickyStopperPosition = $stickyrStopper.offset().top;
    var stopPoint = stickyStopperPosition - generalSidebarHeight - stickOffset;
    var diff = stopPoint + stickOffset;
    var outerwidth = $sticky.outerWidth();
    $(window).scroll(function(){
      var windowTop = $(window).scrollTop();
      if (stopPoint < windowTop) {
          $sticky.css({ 'position':'absolute', 'top': diff - 20 });
      } else if (stickyTop < windowTop+stickOffset) {
          $sticky.css({ 'position':'fixed', 'width': outerwidth, 'z-index':'99','top':stickOffset });
      } else {
          $sticky.css({'position':'absolute','top':'initial', 'width': outerwidth});
      }
    });
  }
};
sidebarcategory();
// document ready end

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
var bindDateRangeValidation = function (f, s, e) {
    if(!(f instanceof jQuery)){
            console.log("Not passing a jQuery object");
    }
    var jqForm = f,
        startDateId = s,
        endDateId = e;
  
    var checkDateRange = function (startDate, endDate) {
        var isValid = (startDate != "" && endDate != "") ? startDate <= endDate : true;
        return isValid;
    }

    var bindValidator = function () {
        var bstpValidate = jqForm.data('bootstrapValidator');
        var validateFields = {
            startDate: {
                validators: {
                    notEmpty: { message: 'This field is required.' },
                    callback: {
                        message: 'Start Date must less than or equal to End Date.',
                        callback: function (startDate, validator, $field) {
                            return checkDateRange(startDate, $('#' + endDateId).val())
                        }
                    }
                }
            },
            endDate: {
                validators: {
                    notEmpty: { message: 'This field is required.' },
                    callback: {
                        message: 'End Date must greater than or equal to Start Date.',
                        callback: function (endDate, validator, $field) {
                            return checkDateRange($('#' + startDateId).val(), endDate);
                        }
                    }
                }
            },
            customize: {
                validators: {
                    customize: { message: 'customize.' }
                }
            }
        }
        if (!bstpValidate) {
            jqForm.bootstrapValidator({
                excluded: [':disabled'], 
            })
        }
      
        jqForm.bootstrapValidator('addField', startDateId, validateFields.startDate);
        jqForm.bootstrapValidator('addField', endDateId, validateFields.endDate);
      
    };

    var hookValidatorEvt = function () {
        var dateBlur = function (e, bundleDateId, action) {
            jqForm.bootstrapValidator('revalidateField', e.target.id);
        }

        $('#' + startDateId).on("dp.change dp.update blur", function (e) {
            $('#' + endDateId).data("DateTimePicker").setMinDate(e.date);
            dateBlur(e, endDateId);
        });

        $('#' + endDateId).on("dp.change dp.update blur", function (e) {
            $('#' + startDateId).data("DateTimePicker").setMaxDate(e.date);
            dateBlur(e, startDateId);
        });
    }

    bindValidator();
    hookValidatorEvt();
};


$(function () {
    var sd = new Date(), ed = new Date();
  
    $('#startDate').daterangepicker();
  
    $('#endDate').daterangepicker();
    bindDateRangeValidation($("#form"), 'startDate', 'endDate');
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
function headeradjust(){
if ($(window).width() <= 767) return;
$(window).scroll(function() {
    var tophead = $("#top-nav").outerHeight();
      if ($(this).scrollTop() > tophead){
      $('#header').addClass('topfixed');
      }
      else{
      $('#header').removeClass('topfixed');
      }
      });
};
headeradjust();
function headeradjustmob(){
if ($(window).width() >= 767) return;
$('.searchwidth').css('min-width','100%');
$(window).scroll(function() {
    var tophead = $(".header-logo").outerHeight();
    var iconbarwidthvar = $(".iconbarwidth").outerWidth();
    var iconshopbagvar = $(".iconshopbag").outerWidth();
    var searchwidthvar = $(".searchwidth").outerWidth();
      if ($(this).scrollTop() > tophead){
      $('#header').addClass('topfixed');
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
      $('#header').removeClass('topfixed');
      $('.header-logo').show();
      $('.mobilescrollhide').show();
      $('.searchwidth').css({'left':'0px', 'right':'0px','position':'relative','z-index':'1','top':'0px','width':'100%'});
      $('.easy-autocomplete').css({'width':'100%'});
      }
      }); 
};
headeradjustmob();

