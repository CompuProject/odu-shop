/*
(function($){ 
	var modalInit = false;
	$(window).load(function(){
		$('#camera-slideshow').camera({
			alignment			: "center", //topLeft, topCenter, topRight, centerLeft, center, centerRight, bottomLeft, bottomCenter, bottomRight
			autoAdvance			: false,	//true, false
			mobileAutoAdvance	: false, //true, false. Auto-advancing for mobile devices
			barDirection		: "leftToRight",	//'leftToRight', 'rightToLeft', 'topToBottom', 'bottomToTop'
			barPosition			: "bottom",	//'bottom', 'left', 'top', 'right'
			cols				: 6,
			easing				: "easeInSine",	//��� ������� ������ http://jqueryui.com/demos/effect/easing.html
			mobileEasing		: "easeInSine",	//�������� ������, ���� �� ������, ����� ���������� �� �� �� ��������� ����������� � �.�.
			fx					: "simpleFade",	
			//'random','simpleFade', 'curtainTopLeft', 'curtainTopRight', 'curtainBottomLeft', 'curtainBottomRight', 'curtainSliceLeft', 'curtainSliceRight', 'blindCurtainTopLeft', 'blindCurtainTopRight', 'blindCurtainBottomLeft', 'blindCurtainBottomRight', 'blindCurtainSliceBottom', 'blindCurtainSliceTop', 'stampede', 'mosaic', 'mosaicReverse', 'mosaicRandom', 'mosaicSpiral', 'mosaicSpiralReverse', 'topLeftBottomRight', 'bottomRightTopLeft', 'bottomLeftTopRight', 'bottomLeftTopRight'
			//�� ������ ����� ������������ ����� ������ �������, ������ ��������� �� ��������: 'simpleFade, scrollRight, scrollBottom'
			mobileFx			: "simpleFade",	//�������� ������, ���� �� ������, ����� ���������� �� �� �� ��������� ����������� � �.�.
			gridDifference		: 250,	//����� ������� ����� ����� ��������� ��� �������� ������ ���� ������, ��� transPeriod
			height				: "300px",	//����� �� ������ ������ ������� (�������� '300px'), � ��������� (�� ��������� � ������ �����-���, ��������, '50% ') ��� "Auto"
			imagePath			: 'images/',	//���� � ����� ����������� (��� ������ ��� blank.gif, ����� �� ������ ���������� �����)
			hover				: false,	//true, false. �� �������� ��� ��������� ���������
			loader				: "none",	//pie, bar, none (���� ���� �� ��������� "pie", ������ ��������, ��� IE8- �� c��ue� ���������� ���)
			loaderColor			: "#eeeeee", 
			loaderBgColor		: "#222222", 
			loaderOpacity		: .8,	//0, .1, .2, .3, .4, .5, .6, .7, .8, .9, 1
			loaderPadding		: 2,	//������� ������ �������� �� ������ ���������� ����� loader � ��� ����� background
			loaderStroke		: 7,	//the thickness both of the pie loader and of the bar loader. Remember: for the pie, the loader thickness must be less than a half of the pie diameter
			minHeight			: "",	//�� ����� ������ �������� ��� ���� ������
			navigation			: false,	//true or false, ���������� ��� ��� ������ ���������
			navigationHover		: false,	
			mobileNavHover		: false,	
			opacityOnGrid		: false,	
			overlayer			: false,	
			pagination			: false,
			playPause			: false,	
			pauseOnClick		: false,	
			pieDiameter			: 38,
			piePosition			: "rightTop",
			portrait			: true, 
			rows				: 4,
			slicedCols			: 6,	
			slicedRows			: 4,	
			slideOn				: "next",	//next, prev, random
			thumbnails			: true,
			time				: 6000,	//������������ ����� ������ ������� � ������� ����������
			transPeriod			: 500,	//����������������� ������� � �������������
			onEndTransition		: function() {  },	
			onLoaded			: function() {
				if (!modalInit)
				{
					SqueezeBox.assign($$('.camera-modal'), {
						parse: 'rel'
					});
					modalInit = true;
				}	
			},	
			onStartLoading		: function() {  },	
			onStartTransition	: function() {  }	
		});
	});
})(jQuery);
*/
$(document).ready(function(){
	$('.slider-for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  asNavFor: '.slider-for',
	  arrows: true,
	  dots: false,
	  centerMode: false,
	  focusOnSelect: true,
	});	
	
	$('.touch').touchTouch();
})