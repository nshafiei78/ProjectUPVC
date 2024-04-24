"use strict";
(function () {
	var userAgent = navigator.userAgent.toLowerCase(),
		initialDate = new Date(),
		$document = $(document),
		$window = $(window),
		$html = $("html"),
		$body = $("body"),
		isRtl = $html.attr("dir") === "rtl",
		isDesktop = $html.hasClass("desktop"),
		isFirefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1,
		isIE = userAgent.indexOf("msie") !== -1 ? parseInt(userAgent.split("msie")[1], 10) : userAgent.indexOf("trident") !== -1 ? 11 : userAgent.indexOf("edge") !== -1 ? 12 : false,
		isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
		plugins = {
			pointerEvents: isIE < 11 ? "js/pointer-events.min.js" : false,
			bootstrapTooltip: $("[data-toggle='tooltip']"),
			bootstrapModalDialog: $('.modal'),
			rdNavbar: $(".rd-navbar"),
			materialParallax: $(".parallax-container"),
			rdGoogleMaps: $(".rd-google-map"),
			rdMailForm: $(".rd-mailform"),
			rdInputLabel: $(".form-label"),
			regula: $("[data-constraints]"),
			owl: $(".owl-carousel"),
			swiper: $(".swiper-slider"),
			mfp: $('[data-lightbox]').not('[data-lightbox="gallery"] [data-lightbox]'),
			mfpGallery: $('[data-lightbox^="gallery"]'),
			wow: $('.wow'),
			isotope: $(".isotope"),
			photoSwipeGallery: $("[data-photo-swipe-item]"),
			radio: $("input[type='radio']"),
			checkbox: $("input[type='checkbox']"),
			customToggle: $("[data-custom-toggle]"),
			counter: $(".counter"),
			progressLinear: $(".progress-linear"),
			circleProgress: $(".progress-bar-circle"),
			dateCountdown: $('.DateCountdown'),
			pageLoader: $("#page-loader"),
			selectFilter: $("select"),
			rdAudioPlayer: $(".rd-audio"),
			jPlayerInit: $(".jp-player-init"),
			customParallax: $(".custom-parallax"),
			slick: $('.slick-slider'),
			countDown: $(".countdown"),
			calendar: $(".rd-calendar"),
			bookingCalendar: $(".booking-calendar"),
			bootstrapDateTimePicker: $("[data-time-picker]"),
			stepper: $("input[type='number']"),
			customWaypoints: $('[data-custom-scroll-to]'),
			scroller: $(".scroll-wrap")
		};
	$(function () {
		var isNoviBuilder = window.xMode;

		function getSwiperHeight(object, attr) {
			var val = object.attr("data-" + attr),
				dim;
			if (!val) {
				return undefined;
			}
			dim = val.match(/(px)|(%)|(vh)|(vw)$/i);
			if (dim.length) {
				switch (dim[0]) {
					case "px":
						return parseFloat(val);
					case "vh":
						return $window.height() * (parseFloat(val) / 100);
					case "vw":
						return $window.width() * (parseFloat(val) / 100);
					case "%":
						return object.width() * (parseFloat(val) / 100);
				}
			} else {
				return undefined;
			}
		}

		function toggleSwiperInnerVideos(swiper) {
			var prevSlide = $(swiper.slides[swiper.previousIndex]),
				nextSlide = $(swiper.slides[swiper.activeIndex]),
				videos, videoItems = prevSlide.find("video");
			for (var i = 0; i < videoItems.length; i++) {
				videoItems[i].pause();
			}
			videos = nextSlide.find("video");
			if (videos.length) {
				videos.get(0).play();
			}
		}

		function toggleSwiperCaptionAnimation(swiper) {
			var prevSlide = $(swiper.container).find("[data-caption-animate]"),
				nextSlide = $(swiper.slides[swiper.activeIndex]).find("[data-caption-animate]"),
				delay, duration, nextSlideItem, prevSlideItem;
			for (var i = 0; i < prevSlide.length; i++) {
				prevSlideItem = $(prevSlide[i]);
				prevSlideItem.removeClass("animated").removeClass(prevSlideItem.attr("data-caption-animate")).addClass("not-animated");
			}
			var tempFunction = function (nextSlideItem, duration) {
				return function () {
					nextSlideItem.removeClass("not-animated").addClass(nextSlideItem.attr("data-caption-animate")).addClass("animated");
					if (duration) {
						nextSlideItem.css('animation-duration', duration + 'ms');
					}
				};
			};
			for (var i = 0; i < nextSlide.length; i++) {
				nextSlideItem = $(nextSlide[i]);
				duration = nextSlideItem.attr('data-caption-duration');
				if (!isNoviBuilder) {
					setTimeout(tempFunction(nextSlideItem, duration), parseInt(delay, 10));
				} else {
					nextSlideItem.removeClass("not-animated")
				}
			}
		}

		function makeWaypointScroll(obj) {
			var $this = $(obj);
			if (!isNoviBuilder) {
				$this.on('click', function (e) {
					e.preventDefault();
					$("body, html").stop().animate({
						scrollTop: $("#" + $(this).attr('data-custom-scroll-to')).offset().top
					}, 1000, function () {
						$window.trigger("resize");
					});
				});
			}
		}

		function initSwiperWaypoints(swiper) {
			var prevSlide = $(swiper.container),
				nextSlide = $(swiper.slides[swiper.activeIndex]);
			prevSlide.find('[data-custom-scroll-to]').each(function () {
				var $this = $(this);
				makeWaypointScroll($this);
			});
			nextSlide.find('[data-custom-scroll-to]').each(function () {
				var $this = $(this);
				makeWaypointScroll($this);
			});
		}

		function initOwlCarousel(c) {
			var aliaces = ["-", "-sm-", "-md-", "-lg-", "-xl-", "-xxl-"],
				values = [0, 576, 768, 992, 1200, 1600],
				responsive = {};
			for (var j = 0; j < values.length; j++) {
				responsive[values[j]] = {};
				for (var k = j; k >= -1; k--) {
					if (!responsive[values[j]]["items"] && c.attr("data" + aliaces[k] + "items")) {
						responsive[values[j]]["items"] = k < 0 ? 1 : parseInt(c.attr("data" + aliaces[k] + "items"), 10);
					}
					if (!responsive[values[j]]["stagePadding"] && responsive[values[j]]["stagePadding"] !== 0 && c.attr("data" + aliaces[k] + "stage-padding")) {
						responsive[values[j]]["stagePadding"] = k < 0 ? 0 : parseInt(c.attr("data" + aliaces[k] + "stage-padding"), 10);
					}
					if (!responsive[values[j]]["margin"] && responsive[values[j]]["margin"] !== 0 && c.attr("data" + aliaces[k] + "margin")) {
						responsive[values[j]]["margin"] = k < 0 ? 30 : parseInt(c.attr("data" + aliaces[k] + "margin"), 10);
					}
				}
			}
			if (c.attr('data-dots-custom')) {
				c.on("initialized.owl.carousel", function (event) {
					var carousel = $(event.currentTarget),
						customPag = $(carousel.attr("data-dots-custom")),
						active = 0;
					if (carousel.attr('data-active')) {
						active = parseInt(carousel.attr('data-active'), 10);
					}
					carousel.trigger('to.owl.carousel', [active, 300, true]);
					customPag.find("[data-owl-item='" + active + "']").addClass("active");
					customPag.find("[data-owl-item]").on('click', function (e) {
						e.preventDefault();
						carousel.trigger('to.owl.carousel', [parseInt(this.getAttribute("data-owl-item"), 10), 300, true]);
					});
					carousel.on("translate.owl.carousel", function (event) {
						customPag.find(".active").removeClass("active");
						customPag.find("[data-owl-item='" + event.item.index + "']").addClass("active")
					});
				});
			}
			c.owlCarousel({
				autoplay: isNoviBuilder ? false : c.attr("data-autoplay") === "true",
				loop: isNoviBuilder ? false : c.attr("data-loop") !== "false",
				items: 1,
				rtl: c.attr('data-rtl') ? c.attr('data-rtl') === "true" : isRtl,
				center: c.attr("data-center") === "true",
				dotsContainer: c.attr("data-pagination-class") || false,
				navContainer: c.attr("data-navigation-class") || false,
				mouseDrag: isNoviBuilder ? false : c.attr("data-mouse-drag") !== "false",
				nav: c.attr("data-nav") === "true",
				dots: c.attr("data-dots") === "true",
				dotsEach: c.attr("data-dots-each") ? parseInt(c.attr("data-dots-each"), 10) : false,
				animateIn: c.attr('data-animation-in') ? c.attr('data-animation-in') : false,
				animateOut: c.attr('data-animation-out') ? c.attr('data-animation-out') : false,
				responsive: responsive,
				navText: function () {
					try {
						return JSON.parse(c.attr("data-nav-text"));
					} catch (e) {
						return [];
					}
				}(),
				navClass: function () {
					try {
						return JSON.parse(c.attr("data-nav-class"));
					} catch (e) {
						return ['owl-prev', 'owl-next'];
					}
				}()
			});
		}

		function isScrolledIntoView(elem) {
			if (!isNoviBuilder) {
				return elem.offset().top + elem.outerHeight() >= $window.scrollTop() && elem.offset().top <= $window.scrollTop() + $window.height();
			} else {
				return true;
			}
		}

		function lazyInit(element, func) {
			$document.on('scroll', function () {
				if ((!element.hasClass('lazy-loaded') && (isScrolledIntoView(element)))) {
					func.call();
					element.addClass('lazy-loaded');
				}
			}).trigger("scroll");
		}
		if (plugins.owl.length) {
			for (var i = 0; i < plugins.owl.length; i++) {
				var c = $(plugins.owl[i]);
				plugins.owl[i].owl = c;
				initOwlCarousel(c);
			}
		}

		function attachFormValidator(elements) {
			for (var i = 0; i < elements.length; i++) {
				var o = $(elements[i]),
					v;
				o.addClass("form-control-has-validation").after("<span class='form-validation'></span>");
				v = o.parent().find(".form-validation");
				if (v.is(":last-child")) {
					o.addClass("form-control-last-child");
				}
			}
			elements.on('input change propertychange blur', function (e) {
				var $this = $(this),
					results;
				if (e.type !== "blur") {
					if (!$this.parent().hasClass("has-error")) {
						return;
					}
				}
				if ($this.parents('.rd-mailform').hasClass('success')) {
					return;
				}
				if ((results = $this.regula('validate')).length) {
					for (i = 0; i < results.length; i++) {
						$this.siblings(".form-validation").text(results[i].message).parent().addClass("has-error")
					}
				} else {
					$this.siblings(".form-validation").text("").parent().removeClass("has-error")
				}
			}).regula('bind');
			var regularConstraintsMessages = [{
				type: regula.Constraint.Required,
				newMessage: "وارد کردن این قسمت الزامی است."
			}, {
				type: regula.Constraint.Email,
				newMessage: "ایمیل وارد شده نامعتبر است."
			}, {
				type: regula.Constraint.Numeric,
				newMessage: "فقط اعداد قابل قبول هستند."
			}, {
				type: regula.Constraint.Selected,
				newMessage: "لطفا یک گزینه انتخاب کنید."
			}];
			for (var i = 0; i < regularConstraintsMessages.length; i++) {
				var regularConstraint = regularConstraintsMessages[i];
				regula.override({
					constraintType: regularConstraint.type,
					defaultMessage: regularConstraint.newMessage
				});
			}
		}

		function isValidated(elements) {
			var results, errors = 0;
			if (elements.length) {
				for (var j = 0; j < elements.length; j++) {
					var $input = $(elements[j]);
					if ((results = $input.regula('validate')).length) {
						for (k = 0; k < results.length; k++) {
							errors++;
							$input.siblings(".form-validation").text(results[k].message).parent().addClass("has-error");
						}
					} else {
						$input.siblings(".form-validation").text("").parent().removeClass("has-error")
					}
				}
				return errors === 0;
			}
			return true;
		}

		function initBootstrapTooltip(tooltipPlacement) {
			if (window.innerWidth < 576) {
				plugins.bootstrapTooltip.tooltip('dispose');
				plugins.bootstrapTooltip.tooltip({
					placement: 'bottom'
				});
			} else {
				plugins.bootstrapTooltip.tooltip('dispose');
				plugins.bootstrapTooltip.tooltip({
					placement: tooltipPlacement
				});
			}
		}
		if (navigator.platform.match(/(Mac)/i)) $html.addClass("mac-os");
		if (isFirefox) $html.addClass("firefox");
		if (isIE) {
			if (isIE < 10) {
				$html.addClass("lt-ie-10");
			}
			if (isIE < 11) {
				if (plugins.pointerEvents) {
					$.getScript(plugins.pointerEvents).done(function () {
						$html.addClass("ie-10");
						PointerEventsPolyfill.initialize({});
					});
				}
			}
			if (isIE === 11) {
				$html.addClass("ie-11");
			}
			if (isIE === 12) {
				$html.addClass("ie-edge");
			}
		}
		if (plugins.bootstrapTooltip.length) {
			var tooltipPlacement = plugins.bootstrapTooltip.attr('data-placement');
			initBootstrapTooltip(tooltipPlacement);
			$window.on('resize orientationchange', function () {
				initBootstrapTooltip(tooltipPlacement);
			})
		}
		if (plugins.bootstrapModalDialog.length > 0) {
			for (var i = 0; i < plugins.bootstrapModalDialog.length; i++) {
				var modalItem = $(plugins.bootstrapModalDialog[i]);
				modalItem.on('hidden.bs.modal', $.proxy(function () {
					var activeModal = $(this),
						rdVideoInside = activeModal.find('video'),
						youTubeVideoInside = activeModal.find('iframe');
					if (rdVideoInside.length) {
						rdVideoInside[0].pause();
					}
					if (youTubeVideoInside.length) {
						var videoUrl = youTubeVideoInside.attr('src');
						youTubeVideoInside.attr('src', '').attr('src', videoUrl);
					}
				}, modalItem));
			}
		}
		if (plugins.rdGoogleMaps.length) {
			$.getScript("https://maps.google.com/maps/api/js?key=AIzaSyAEn4c_T1rFt7ltf_oNavnjND8dDPm4KQs&language=fa&sensor=false&libraries=geometry,places&v=3.7", function () {
				var head = document.getElementsByTagName('head')[0],
					insertBefore = head.insertBefore;
				head.insertBefore = function (newElement, referenceElement) {
					if (newElement.href && newElement.href.indexOf('https://fonts.googleapis.com/css?family=Roboto') !== -1 || newElement.innerHTML.indexOf('gm-style') !== -1) {
						return;
					}
					insertBefore.call(head, newElement, referenceElement);
				};
				for (var i = 0; i < plugins.rdGoogleMaps.length; i++) {
					var $googleMapItem = $(plugins.rdGoogleMaps[i]);
					lazyInit($googleMapItem, $.proxy(function () {
						var $this = $(this),
							styles = $this.attr("data-styles");
						$this.googleMap({
							marker: {
								basic: $this.data('marker'),
								active: $this.data('marker-active')
							},
							styles: styles ? JSON.parse(styles) : [],
							onInit: function (map) {
								var inputAddress = $('#rd-google-map-address');
								if (inputAddress.length) {
									var input = inputAddress;
									var geocoder = new google.maps.Geocoder();
									var marker = new google.maps.Marker({
										map: map,
										icon: $this.data('marker-url')
									});
									var autocomplete = new google.maps.places.Autocomplete(inputAddress[0]);
									autocomplete.bindTo('bounds', map);
									inputAddress.attr('placeholder', '');
									inputAddress.on('change', function () {
										$("#rd-google-map-address-submit").trigger('click');
									});
									inputAddress.on('keydown', function (e) {
										if (e.keyCode === 13) {
											$("#rd-google-map-address-submit").trigger('click');
										}
									});
									$("#rd-google-map-address-submit").on('click', function (e) {
										e.preventDefault();
										var address = input.val();
										geocoder.geocode({
											'address': address
										}, function (results, status) {
											if (status === google.maps.GeocoderStatus.OK) {
												var latitude = results[0].geometry.location.lat();
												var longitude = results[0].geometry.location.lng();
												map.setCenter(new google.maps.LatLng(parseFloat(latitude), parseFloat(longitude)));
												marker.setPosition(new google.maps.LatLng(parseFloat(latitude), parseFloat(longitude)))
											}
										});
									});
								}
							}
						});
					}, $googleMapItem));
				}
			});
		}
		if (plugins.radio.length) {
			for (var i = 0; i < plugins.radio.length; i++) {
				$(plugins.radio[i]).addClass("radio-custom").after("<span class='radio-custom-dummy'></span>")
			}
		}
		if (plugins.checkbox.length) {
			for (var i = 0; i < plugins.checkbox.length; i++) {
				$(plugins.checkbox[i]).addClass("checkbox-custom").after("<span class='checkbox-custom-dummy'></span>")
			}
		}
		if (isDesktop && !isNoviBuilder) {
			$().UItoTop({
				easingType: 'easeOutQuart',
				containerClass: 'ui-to-top'
			});
		}
		if (plugins.rdNavbar.length) {
			var aliaces, i, j, len, value, values, responsiveNavbar;
			aliaces = ["-", "-sm-", "-md-", "-lg-", "-xl-", "-xxl-"];
			values = [0, 576, 768, 992, 1200, 1600];
			responsiveNavbar = {};
			for (i = j = 0, len = values.length; j < len; i = ++j) {
				value = values[i];
				if (!responsiveNavbar[values[i]]) {
					responsiveNavbar[values[i]] = {};
				}
				if (plugins.rdNavbar.attr('data' + aliaces[i] + 'layout')) {
					responsiveNavbar[values[i]].layout = plugins.rdNavbar.attr('data' + aliaces[i] + 'layout');
				}
				if (plugins.rdNavbar.attr('data' + aliaces[i] + 'device-layout')) {
					responsiveNavbar[values[i]]['deviceLayout'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'device-layout');
				}
				if (plugins.rdNavbar.attr('data' + aliaces[i] + 'hover-on')) {
					responsiveNavbar[values[i]]['focusOnHover'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'hover-on') === 'true';
				}
				if (plugins.rdNavbar.attr('data' + aliaces[i] + 'auto-height')) {
					responsiveNavbar[values[i]]['autoHeight'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'auto-height') === 'true';
				}
				if (isNoviBuilder) {
					responsiveNavbar[values[i]]['stickUp'] = false;
				} else if (plugins.rdNavbar.attr('data' + aliaces[i] + 'stick-up')) {
					responsiveNavbar[values[i]]['stickUp'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'stick-up') === 'true';
				}
				if (plugins.rdNavbar.attr('data' + aliaces[i] + 'stick-up-offset')) {
					responsiveNavbar[values[i]]['stickUpOffset'] = plugins.rdNavbar.attr('data' + aliaces[i] + 'stick-up-offset');
				}
			}
			plugins.rdNavbar.RDNavbar({
				anchorNav: !isNoviBuilder,
				stickUpClone: (plugins.rdNavbar.attr("data-stick-up-clone") && !isNoviBuilder) ? plugins.rdNavbar.attr("data-stick-up-clone") === 'true' : false,
				responsive: responsiveNavbar,
				callbacks: {
					onStuck: function () {
						var navbarSearch = this.$element.find('.rd-search input');
						if (navbarSearch) {
							navbarSearch.val('').trigger('propertychange');
						}
					},
					onDropdownOver: function () {
						return !isNoviBuilder;
					},
					onUnstuck: function () {
						if (this.$clone === null)
							return;
						var navbarSearch = this.$clone.find('.rd-search input');
						if (navbarSearch) {
							navbarSearch.val('').trigger('propertychange');
							navbarSearch.trigger('blur');
						}
					}
				}
			});
			if (plugins.rdNavbar.attr("data-body-class")) {
				document.body.className += ' ' + plugins.rdNavbar.attr("data-body-class");
			}
		}
		if (plugins.swiper.length) {
			for (var i = 0; i < plugins.swiper.length; i++) {
				var s = $(plugins.swiper[i]);
				var pag = s.find(".swiper-pagination"),
					next = s.find(".swiper-button-next"),
					prev = s.find(".swiper-button-prev"),
					bar = s.find(".swiper-scrollbar"),
					swiperSlide = s.find(".swiper-slide"),
					autoplay = false;
				for (var j = 0; j < swiperSlide.length; j++) {
					var $this = $(swiperSlide[j]),
						url;
					if (url = $this.attr("data-slide-bg")) {
						$this.css({
							"background-image": "url(" + url + ")",
							"background-size": "cover"
						})
					}
				}
				swiperSlide.end().find("[data-caption-animate]").addClass("not-animated").end();
				s.swiper({
					autoplay: s.attr('data-autoplay') ? s.attr('data-autoplay') === "false" ? undefined : s.attr('data-autoplay') : 5000,
					direction: s.attr('data-direction') ? s.attr('data-direction') : "horizontal",
					effect: s.attr('data-slide-effect') ? s.attr('data-slide-effect') : "slide",
					speed: s.attr('data-slide-speed') ? s.attr('data-slide-speed') : 600,
					keyboardControl: s.attr('data-keyboard') === "true",
					mousewheelControl: s.attr('data-mousewheel') === "true",
					mousewheelReleaseOnEdges: s.attr('data-mousewheel-release') === "true",
					nextButton: next.length ? next.get(0) : null,
					prevButton: prev.length ? prev.get(0) : null,
					pagination: pag.length ? pag.get(0) : null,
					paginationClickable: pag.length ? pag.attr("data-clickable") !== "false" : false,
					paginationBulletRender: pag.length ? pag.attr("data-index-bullet") === "true" ? function (swiper, index, className) {
						return '<span class="' + className + '">' + (index + 1) + '</span>';
					} : null : null,
					scrollbar: bar.length ? bar.get(0) : null,
					scrollbarDraggable: bar.length ? bar.attr("data-draggable") !== "false" : true,
					scrollbarHide: bar.length ? bar.attr("data-draggable") === "false" : false,
					loop: isNoviBuilder ? false : s.attr('data-loop') !== "false",
					simulateTouch: s.attr('data-simulate-touch') && !isNoviBuilder ? s.attr('data-simulate-touch') === "true" : false,
					onTransitionStart: function (swiper) {
						toggleSwiperInnerVideos(swiper);
					},
					onTransitionEnd: function (swiper) {
						toggleSwiperCaptionAnimation(swiper);
					},
					onInit: function (swiper) {
						toggleSwiperInnerVideos(swiper);
						toggleSwiperCaptionAnimation(swiper);
						if (!isRtl) {
							$window.on('resize', function () {
								swiper.update(true);
							});
						}
					}
				});
				$window.on("resize", (function (s) {
					return function () {
						var mh = getSwiperHeight(s, "min-height"),
							h = getSwiperHeight(s, "height");
						if (h) {
							s.css("height", mh ? mh > h ? mh : h : h);
						}
					}
				})(s)).trigger("resize");
			}
		}
		if (plugins.dateCountdown.length) {
			for (var i = 0; i < plugins.dateCountdown.length; i++) {
				var dateCountdownItem = $(plugins.dateCountdown[i]),
					time = {
						"Days": {
							"text": "روز",
							"show": true,
							color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#f9f9f9"
						},
						"Hours": {
							"text": "ساعت",
							"show": true,
							color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#f9f9f9"
						},
						"Minutes": {
							"text": "دقیقه",
							"show": true,
							color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#f9f9f9"
						},
						"Seconds": {
							"text": "ثانیه",
							"show": true,
							color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#f9f9f9"
						}
					};
				dateCountdownItem.TimeCircles({
					color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "rgba(247, 247, 247, 1)",
					animation: "smooth",
					bg_width: dateCountdownItem.attr("data-bg-width") ? dateCountdownItem.attr("data-bg-width") : 0.6,
					circle_bg_color: dateCountdownItem.attr("data-bg") ? dateCountdownItem.attr("data-bg") : "rgba(0, 0, 0, 1)",
					fg_width: dateCountdownItem.attr("data-width") ? dateCountdownItem.attr("data-width") : 0.03
				});
				(function (dateCountdownItem, time) {
					$window.on('load resize orientationchange', function () {
						if (window.innerWidth < 479) {
							dateCountdownItem.TimeCircles({
								time: {
									"Days": {
										"text": "روز",
										"show": true,
										color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#f9f9f9"
									},
									"Hours": {
										"text": "ساعت",
										"show": true,
										color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#f9f9f9"
									},
									"Minutes": {
										"text": "دقیقه",
										"show": true,
										color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#f9f9f9"
									},
									Seconds: {
										"text": "ثانیه",
										show: false,
										color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#f9f9f9"
									}
								}
							}).rebuild();
						} else if (window.innerWidth < 767) {
							dateCountdownItem.TimeCircles({
								time: {
									"Days": {
										"text": "روز",
										"show": true,
										color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#f9f9f9"
									},
									"Hours": {
										"text": "ساعت",
										"show": true,
										color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#f9f9f9"
									},
									"Minutes": {
										"text": "دقیقه",
										"show": true,
										color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#f9f9f9"
									},
									Seconds: {
										text: '',
										show: false,
										color: dateCountdownItem.attr("data-color") ? dateCountdownItem.attr("data-color") : "#f9f9f9"
									}
								}
							}).rebuild();
						} else {
							dateCountdownItem.TimeCircles({
								time: time
							}).rebuild();
						}
					});
				})(dateCountdownItem, time);
			}
		}
		if (plugins.isotope.length) {
			var isogroup = [];
			for (var i = 0; i < plugins.isotope.length; i++) {
				var isotopeItem = plugins.isotope[i],
					isotopeInitAttrs = {
						itemSelector: '.isotope-item',
						isOriginLeft: false,
						layoutMode: isotopeItem.getAttribute('data-isotope-layout') ? isotopeItem.getAttribute('data-isotope-layout') : 'masonry',
						filter: '*'
					};
				if (isotopeItem.getAttribute('data-column-width')) {
					isotopeInitAttrs.masonry = {
						columnWidth: parseFloat(isotopeItem.getAttribute('data-column-width'))
					};
				} else if (isotopeItem.getAttribute('data-column-class')) {
					isotopeInitAttrs.masonry = {
						columnWidth: isotopeItem.getAttribute('data-column-class')
					};
				}
				var iso = new Isotope(isotopeItem, isotopeInitAttrs);
				isogroup.push(iso);
			}
			setTimeout(function () {
				for (var i = 0; i < isogroup.length; i++) {
					isogroup[i].element.className += " isotope--loaded";
					isogroup[i].layout();
				}
			}, 200);
			var resizeTimout;
			$("[data-isotope-filter]").on("click", function (e) {
				e.preventDefault();
				var filter = $(this);
				clearTimeout(resizeTimout);
				filter.parents(".isotope-filters").find('.active').removeClass("active");
				filter.addClass("active");
				var iso = $('.isotope[data-isotope-group="' + this.getAttribute("data-isotope-group") + '"]'),
					isotopeAttrs = {
						itemSelector: '.isotope-item',
						isOriginLeft: false,
						layoutMode: iso.attr('data-isotope-layout') ? iso.attr('data-isotope-layout') : 'masonry',
						filter: this.getAttribute("data-isotope-filter") === '*' ? '*' : '[data-filter*="' + this.getAttribute("data-isotope-filter") + '"]'
					};
				if (iso.attr('data-column-width')) {
					isotopeAttrs.masonry = {
						columnWidth: parseFloat(iso.attr('data-column-width'))
					};
				} else if (iso.attr('data-column-class')) {
					isotopeAttrs.masonry = {
						columnWidth: iso.attr('data-column-class')
					};
				}
				iso.isotope(isotopeAttrs);
			}).eq(0).trigger("click")
		}
		if ($html.hasClass("wow-animation") && plugins.wow.length && !isNoviBuilder && isDesktop) {
			new WOW().init();
		}
		if (plugins.rdInputLabel.length) {
			plugins.rdInputLabel.RDInputLabel();
		}
		if (plugins.regula.length) {
			attachFormValidator(plugins.regula);
		}
		if (plugins.rdMailForm.length) {
			var i, j, k, msg = {
				'MF000': 'با موفقیت ارسال شد!',
				'MF004': 'لطفا نوع فرم را تعریف نمایید!',
				'MF254': 'خطایی در ارسال ایمیل رخ داده است!',
				'MF255': 'خطایی در ارسال فرم رخ داده است!'
			};
			for (i = 0; i < plugins.rdMailForm.length; i++) {
				var $form = $(plugins.rdMailForm[i]);
					$form.attr('novalidate', 'novalidate').ajaxForm({
					data: {
						"form-type": $form.attr("data-form-type") || "contact",
						"counter": i
					},
					beforeSubmit: function (arr, $form, options) {
						if (isNoviBuilder)
							return;
						var form = $(plugins.rdMailForm[this.extraData.counter]),
							inputs = form.find("[data-constraints]"),
							output = $("#" + form.attr("data-form-output"));
						output.removeClass("active error success");
						if (isValidated(inputs)) {
							form.addClass('form-in-process');
							if (output.hasClass("snackbars")) {
								output.html('<p><span class="icon text-middle fa fa-circle-o-notch fa-spin icon-xxs"></span><span>در حال ارسال ...</span></p>');
								output.addClass("active");
							}
						} else {
							return false;
						}
					},
					error: function (result) {
						if (isNoviBuilder)
							return;
						var output = $("#" + $(plugins.rdMailForm[this.extraData.counter]).attr("data-form-output")),
							form = $(plugins.rdMailForm[this.extraData.counter]);
						output.text(msg[result]);
						form.removeClass('form-in-process');
					},
					success: function (result) {
						if (isNoviBuilder)
							return;
						var form = $(plugins.rdMailForm[this.extraData.counter]),
							output = $("#" + form.attr("data-form-output")),
							select = form.find('select');
						form.addClass('success').removeClass('form-in-process');
						result = result.length === 5 ? result : 'MF255';
						output.text(msg[result]);
						if (result === "MF000") {
							if (output.hasClass("snackbars")) {
								output.html('<p><span class="icon text-middle mdi mdi-check icon-xxs"></span><span>' + msg[result] + '</span></p>');
							} else {
								output.addClass("active success");
							}
						} else {
							if (output.hasClass("snackbars")) {
								output.html(' <p class="snackbars-left"><span class="icon icon-xxs mdi mdi-alert-outline text-middle"></span><span>' + msg[result] + '</span></p>');
							} else {
								output.addClass("active error");
							}
						}
						form.clearForm();
						if (select.length) {
							select.select2("val", "");
						}
						form.find('input, textarea').trigger('blur');
						setTimeout(function () {
							output.removeClass("active error success");
							form.removeClass('success');
						}, 3500);
					}
				});
			}
		}
		if (plugins.photoSwipeGallery.length && !isNoviBuilder) {
			$document.delegate("[data-photo-swipe-item]", "click", function (event) {
				event.preventDefault();
				var $el = $(this),
					$galleryItems = $el.parents("[data-photo-swipe-gallery]").find("a[data-photo-swipe-item]"),
					pswpElement = document.querySelectorAll('.pswp')[0],
					encounteredItems = {},
					pswpItems = [],
					options, pswpIndex = 0,
					pswp;
				if ($galleryItems.length === 0) {
					$galleryItems = $el;
				}
				$galleryItems.each(function () {
					var $item = $(this),
						src = $item.attr('href'),
						size = $item.attr('data-size').split('x'),
						pswdItem;
					if ($item.is(':visible')) {
						if (!encounteredItems[src]) {
							pswdItem = {
								src: src,
								w: parseInt(size[0], 10),
								h: parseInt(size[1], 10),
								el: $item
							};
							encounteredItems[src] = {
								item: pswdItem,
								index: pswpIndex
							};
							pswpItems.push(pswdItem);
							pswpIndex++;
						}
					}
				});
				options = {
					index: encounteredItems[$el.attr('href')].index,
					getThumbBoundsFn: function (index) {
						var $el = pswpItems[index].el,
							offset = $el.offset();
						return {
							x: offset.left,
							y: offset.top,
							w: $el.width()
						};
					},
					shareEl: true,
					shareButtons:[
						{
							id: "facebook",
							label: "فیسبوک",
							url: "https://www.facebook.com/dialog/share?app_id=871247336313831&amp;href={{url}}&amp;picture={{raw_image_url}}"
						},
						{
							id: "twitter",
							label: "توییتر",
							url: "https://twitter.com/intent/tweet?text={{text}}&url={{url}}"
						}
					]
				};
				pswp = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, pswpItems, options);
				pswp.init();
			});
		}
		if (plugins.customToggle.length) {
			for (var i = 0; i < plugins.customToggle.length; i++) {
				var $this = $(plugins.customToggle[i]);
				$this.on('click', $.proxy(function (event) {
					event.preventDefault();
					var $ctx = $(this);
					$($ctx.attr('data-custom-toggle')).add(this).toggleClass('active');
				}, $this));
				if ($this.attr("data-custom-toggle-hide-on-blur") === "true") {
					$body.on("click", $this, function (e) {
						if (e.target !== e.data[0] && $(e.data.attr('data-custom-toggle')).find($(e.target)).length && e.data.find($(e.target)).length === 0) {
							$(e.data.attr('data-custom-toggle')).add(e.data[0]).removeClass('active');
						}
					})
				}
				if ($this.attr("data-custom-toggle-disable-on-blur") === "true") {
					$body.on("click", $this, function (e) {
						if (e.target !== e.data[0] && $(e.data.attr('data-custom-toggle')).find($(e.target)).length === 0 && e.data.find($(e.target)).length === 0) {
							$(e.data.attr('data-custom-toggle')).add(e.data[0]).removeClass('active');
						}
					})
				}
			}
		}
		if (plugins.counter.length) {
			for (var i = 0; i < plugins.counter.length; i++) {
				var $counterNotAnimated = $(plugins.counter[i]).not('.animated');
				$document.on("scroll", $.proxy(function () {
					var $this = this;
					if ((!$this.hasClass("animated")) && (isScrolledIntoView($this))) {
						$this.countTo({
							refreshInterval: 40,
							from: 0,
							to: parseInt($this.text(), 10),
							speed: $this.attr("data-speed") || 1000
						});
						$this.addClass('animated');
					}
				}, $counterNotAnimated)).trigger("scroll");
			}
		}
		if (plugins.circleProgress.length) {
			var i;
			for (i = 0; i < plugins.circleProgress.length; i++) {;
				(function () {
					var proto = $.circleProgress.defaults,
						originalDrawEmptyArc = proto.drawEmptyArc;
					proto.emptyThickness = 5;
					proto.drawEmptyArc = function (v) {
						var oldGetThickness = this.getThickness,
							oldThickness = this.getThickness(),
							emptyThickness = this.emptyThickness || _oldThickness.call(this),
							oldRadius = this.radius,
							delta = (oldThickness - emptyThickness) / 2;
						this.getThickness = function () {
							return emptyThickness;
						};
						this.radius = oldRadius - delta;
						this.ctx.save();
						this.ctx.translate(delta, delta);
						originalDrawEmptyArc.call(this, v);
						this.ctx.restore();
						this.getThickness = oldGetThickness;
						this.radius = oldRadius;
					};
				})();
				var circleProgressItem = $(plugins.circleProgress[i]);
				$document.on("scroll", $.proxy(function () {
					var $this = $(this);
					if (!$this.hasClass('animated') && isScrolledIntoView($this)) {
						var arrayGradients = $this.attr('data-gradient').split(",");
						$this.circleProgress({
							value: $this.attr('data-value'),
							size: $this.attr('data-size') ? $this.attr('data-size') : 175,
							fill: {
								gradient: arrayGradients,
								gradientAngle: Math.PI / 4
							},
							startAngle: -Math.PI / 4 * 2,
							emptyFill: $this.attr('data-empty-fill') ? $this.attr('data-empty-fill') : "rgb(245,245,245)",
							thickness: $this.attr('data-thickness') ? parseInt($this.attr('data-thickness')) : 10,
							emptyThickness: 1,
						}).on('circle-animation-progress', function (event, progress, stepValue) {
							$(this).find('span').text(String(stepValue.toFixed(2)).replace('0.', '').replace('1.', '1'));
						});
						$this.addClass('animated');
					}
				}, circleProgressItem)).trigger("scroll");
			}
		}
		if (plugins.progressLinear.length) {
			for (i = 0; i < plugins.progressLinear.length; i++) {
				var progressBar = $(plugins.progressLinear[i]);
				$window.on("scroll load", $.proxy(function () {
					var bar = $(this);
					if (!bar.hasClass('animated-first') && isScrolledIntoView(bar)) {
						var end = parseInt($(this).find('.progress-value').text(), 10);
						bar.find('.progress-bar-linear').css({
							width: end + '%'
						});
						bar.find('.progress-value').countTo({
							refreshInterval: 40,
							from: 0,
							to: end,
							speed: 500
						});
						bar.addClass('animated-first');
					}
				}, progressBar));
			}
		}
		if (plugins.materialParallax.length) {
			if (!isNoviBuilder && !isIE && !isMobile) {
				plugins.materialParallax.parallax();
			} else {
				for (var i = 0; i < plugins.materialParallax.length; i++) {
					var parallax = $(plugins.materialParallax[i]),
						imgPath = parallax.data("parallax-img");
					parallax.css({
						"background-image": 'url(' + imgPath + ')',
						"background-attachment": "fixed",
						"background-size": "cover"
					});
				}
			}
		}
		if (plugins.selectFilter.length) {
			var i;
			for (i = 0; i < plugins.selectFilter.length; i++) {
				var select = $(plugins.selectFilter[i]);
				select.select2({
					theme: "bootstrap"
				}).next().addClass(select.attr("class").match(/(input-sm)|(input-lg)|($)/i).toString().replace(new RegExp(",", 'g'), " "));
			}
		}
		if (plugins.rdAudioPlayer.length && !isNoviBuilder) {
			var i;
			for (i = 0; i < plugins.rdAudioPlayer.length; i++) {
				$(plugins.rdAudioPlayer[i]).RDAudio();
			}
		}
		if (plugins.mfp.length > 0 || plugins.mfpGallery.length > 0 && !isNoviBuilder) {
			if (plugins.mfp.length) {
				for (i = 0; i < plugins.mfp.length; i++) {
					var mfpItem = plugins.mfp[i];
					$(mfpItem).magnificPopup({
						type: mfpItem.getAttribute("data-lightbox")
					});
				}
			}
			if (plugins.mfpGallery.length) {
				for (i = 0; i < plugins.mfpGallery.length; i++) {
					var mfpGalleryItem = $(plugins.mfpGallery[i]).find('[data-lightbox]');
					for (var c = 0; c < mfpGalleryItem.length; c++) {
						$(mfpGalleryItem).addClass("mfp-" + $(mfpGalleryItem).attr("data-lightbox"));
					}
					mfpGalleryItem.end().magnificPopup({
						delegate: '[data-lightbox]',
						type: "image",
						gallery: {
							enabled: true
						}
					});
				}
			}
		}
		if (plugins.slick.length) {
			for (var i = 0; i < plugins.slick.length; i++) {
				var $slickItem = $(plugins.slick[i]);
				$slickItem.slick({
					slidesToScroll: parseInt($slickItem.attr('data-slide-to-scroll'), 10) || 1,
					asNavFor: $slickItem.attr('data-for') || false,
					dots: $slickItem.attr("data-dots") === "true",
					infinite: isNoviBuilder ? false : $slickItem.attr("data-loop") === "true",
					focusOnSelect: true,
					arrows: $slickItem.attr("data-arrows") === "true",
					swipe: $slickItem.attr("data-swipe") === "true",
					autoplay: $slickItem.attr("data-autoplay") === "true",
					vertical: $slickItem.attr("data-vertical") === "true",
					centerMode: $slickItem.attr("data-center-mode") === "true",
					centerPadding: $slickItem.attr("data-center-padding") ? $slickItem.attr("data-center-padding") : '0.50',
					mobileFirst: true,
					rtl: isRtl,
					responsive: [{
						breakpoint: 0,
						settings: {
							slidesToShow: parseInt($slickItem.attr('data-items'), 10) || 1
						}
					}, {
						breakpoint: 575,
						settings: {
							slidesToShow: parseInt($slickItem.attr('data-sm-items'), 10) || 1
						}
					}, {
						breakpoint: 767,
						settings: {
							slidesToShow: parseInt($slickItem.attr('data-md-items'), 10) || 1
						}
					}, {
						breakpoint: 991,
						settings: {
							slidesToShow: parseInt($slickItem.attr('data-lg-items'), 10) || 1
						}
					}, {
						breakpoint: 1199,
						settings: {
							slidesToShow: parseInt($slickItem.attr('data-xl-items'), 10) || 1
						}
					}]
				}).on('afterChange', function (event, slick, currentSlide, nextSlide) {
					var $this = $(this),
						childCarousel = $this.attr('data-child');
					if (childCarousel) {
						$(childCarousel + ' .slick-slide').removeClass('slick-current');
						$(childCarousel + ' .slick-slide').eq(currentSlide).addClass('slick-current');
					}
				});
			}
		}

		function initRowEvents(events) {
			if (!events.length) {
				return false;
			}
			for (i = 0; i < events.length; i++) {
				var $event = $(events[i]);
				$event.on('click', i, function (event) {
					var $selectedEvent = $(this),
						hiddenEvents = $selectedEvent.find('.rdc-table_events'),
						ch = hiddenEvents.outerHeight(),
						animationDuration = 330,
						revealOffset = 0,
						eventRow, openedEvents = $(".rdc-calendar-event-panel");
					if ($selectedEvent.find('.rdc-table_prev').length || $selectedEvent.find('.rdc-table_next').length) {
						return;
					}
					if ($selectedEvent.hasClass("opened")) {
						eventRow = $('#calendarEvent' + event.data + ' .event-panel');
						eventRow.animate({
							height: "0"
						}, animationDuration);
						setTimeout(function () {
							eventRow.parent().remove();
						}, animationDuration);
					} else {
						if (openedEvents.length) {
							openedEvents.animate({
								height: "0"
							}, animationDuration);
							$('.rdc-table_has-events.opened').removeClass('opened');
							setTimeout(function () {
								openedEvents.remove();
							}, animationDuration);
							revealOffset = animationDuration * 1.2;
						}
						setTimeout(function () {
							$selectedEvent.parent().after("<div class='rdc-calendar-event-panel' id='calendarEvent" + event.data + "'><div class='event-panel'></div></div>");
							eventRow = hiddenEvents.clone().appendTo($('#calendarEvent' + event.data + ' .event-panel'));
							ch = eventRow.outerHeight();
							eventRow.parent().css("height", "0");
							eventRow.parent().animate({
								height: ch + "px"
							}, animationDuration);
						}, revealOffset);
					}
					setTimeout(function () {
						$selectedEvent.toggleClass("opened");
					}, revealOffset);
				});
			}
		}

		function initEventsCounter() {
			var $events = $('.rdc-table_has-events');
			for (var j = 0; j < $events.length; j++) {
				var $currentItem = $($events[j]),
					$eventsCount = $currentItem.find('.rdc-table_events-count');
				$eventsCount.html('<span class="rdc-table_events-count-inner">' + $currentItem.find('.rdc-inline-event-list > *').length + ' Available' + '</span>');
			}
		}
		if (plugins.calendar.length) {
			var i;
			for (i = 0; i < plugins.calendar.length; i++) {
				var calendarItem = $(plugins.calendar[i]);
				calendarItem.rdCalendar({
					days: calendarItem.attr("data-days") ? calendarItem.attr("data-days").split(/\s?,\s?/i) : ['ی', 'د', 'س', 'چ', 'پ', 'ج', 'ش'],
					month: calendarItem.attr("data-months") ? calendarItem.attr("data-months").split(/\s?,\s?/i) : ['ژانویه', 'فوریه', 'مارس', 'آوریل', 'می', 'ژوئن', 'جولای', 'اوت', 'سپتامبر', 'اکتبر', 'نوامبر', 'دسامبر']
				});
				if (calendarItem.data('events-inline') === true) {
					calendarItem.on('rdc.refresh', function () {
						initRowEvents($('.rdc-table_has-events'));
						initEventsCounter();
					});
					initRowEvents($('.rdc-table_has-events'));
					initEventsCounter();
				}
			}
			$window.on('resize', function () {
				var eventToResize = $('.rdc-calendar-event-panel');
				if (eventToResize.length) {
					var eventInnerRow = eventToResize.find('.event-panel'),
						ch = eventToResize.find('.rdc-table_events').outerHeight();
					eventInnerRow.css({
						height: ch + 'px'
					});
				}
			});
		}
		if (plugins.bookingCalendar.length) {
			var i;
			for (i = 0; i < plugins.bookingCalendar.length; i++) {
				var calendarItem = $(plugins.bookingCalendar[i]);
				calendarItem.rdCalendar({
					days: calendarItem.attr("data-days") ? calendarItem.attr("data-days").split(/\s?,\s?/i) : ['ی', 'د', 'س', 'چ', 'پ', 'ج', 'ش'],
					month: calendarItem.attr("data-months") ? calendarItem.attr("data-months").split(/\s?,\s?/i) : ['ژانویه', 'فوریه', 'مارس', 'آوریل', 'می', 'ژوئن', 'جولای', 'اوت', 'سپتامبر', 'اکتبر', 'نوامبر', 'دسامبر']
				});
				var temp = $('.rdc-table_has-events');
				for (i = 0; i < temp.length; i++) {
					var $this = $(temp[i]);
					$this.on("click", i, function (event) {
						event.preventDefault();
						event.stopPropagation();
						$(this).toggleClass("opened");
						var tableEvents = $('.rdc-table_events'),
							ch = tableEvents.outerHeight(),
							currentEvent = $(this).children('.rdc-table_events'),
							eventCell = $('#calendarEvent' + event.data),
							animationDuration = 250;
						if ($(this).hasClass("opened")) {
							$(this).parent().after("<tr id='calendarEvent" + event.data + "' style='height: 0'><td colspan='7'></td></tr>");
							currentEvent.clone().appendTo($('#calendarEvent' + event.data + ' td'));
							$('#calendarEvent' + event.data + ' .rdc-table_events').css("height", "0");
							$('#calendarEvent' + event.data + ' .rdc-table_events').animate({
								height: ch + "px"
							}, animationDuration);
						} else {
							$('#calendarEvent' + event.data + ' .rdc-table_events').animate({
								height: "0"
							}, animationDuration);
							setTimeout(function () {
								eventCell.remove();
							}, animationDuration);
						}
					});
				};
				$(window).on('resize', function () {
					if ($('.rdc-table_has-events').hasClass('active')) {
						var tableEvents = $('.rdc-table_events'),
							ch = tableEvents.outerHeight(),
							tableEventCounter = $('.rdc-table_events-count');
						tableEventCounter.css({
							height: ch + 'px'
						});
					}
				});
				$('input[type="radio"]').on("click", function () {
					if ($(this).attr("value") == "register") {
						$(".register-form").hide();
						$(".login-form").fadeIn('slow');
					}
					if ($(this).attr("value") == "login") {
						$(".register-form").fadeIn('slow');
						$(".login-form").hide();
					}
				});
				$('.rdc-next, .rdc-prev').on("click", function () {
					var temp = $('.rdc-table_has-events');
					for (i = 0; i < temp.length; i++) {
						var $this = $(temp[i]);
						$this.on("click", i, function (event) {
							event.preventDefault();
							event.stopPropagation();
							$(this).toggleClass("opened");
							var tableEvents = $('.rdc-table_events'),
								ch = tableEvents.outerHeight(),
								currentEvent = $(this).children('.rdc-table_events'),
								eventCell = $('#calendarEvent' + event.data),
								animationDuration = 250;
							if ($(this).hasClass("opened")) {
								$(this).parent().after("<tr id='calendarEvent" + event.data + "' style='height: 0'><td colspan='7'></td></tr>");
								currentEvent.clone().appendTo($('#calendarEvent' + event.data + ' td'));
								$('#calendarEvent' + event.data + ' .rdc-table_events').css("height", "0");
								$('#calendarEvent' + event.data + ' .rdc-table_events').animate({
									height: ch + "px"
								}, animationDuration);
							} else {
								$('#calendarEvent' + event.data + ' .rdc-table_events').animate({
									height: "0"
								}, animationDuration);
								setTimeout(function () {
									eventCell.remove();
								}, animationDuration);
							}
						});
					};
					$(window).on('resize', function () {
						if ($('.rdc-table_has-events').hasClass('active')) {
							var tableEvents = $('.rdc-table_events'),
								ch = tableEvents.outerHeight(),
								tableEventCounter = $('.rdc-table_events-count');
							tableEventCounter.css({
								height: ch + 'px'
							});
						}
					});
					$('input[type="radio"]').on("click", function () {
						if ($(this).attr("value") == "login") {
							$(".register-form").hide();
							$(".login-form").fadeIn('slow');
						}
						if ($(this).attr("value") == "register") {
							$(".register-form").fadeIn('slow');
							$(".login-form").hide();
						}
					});
				});
			}
		}
		if (plugins.bootstrapDateTimePicker.length) {
			var i;
			for (i = 0; i < plugins.bootstrapDateTimePicker.length; i++) {
				var $dateTimePicker = $(plugins.bootstrapDateTimePicker[i]);
				var options = {};
				options['format'] = 'dddd DD MMMM YYYY - HH:mm';
				if ($dateTimePicker.attr("data-time-picker") === "date") {
					options['format'] = 'dddd DD MMMM YYYY';
					options['minDate'] = new Date();
				} else if ($dateTimePicker.attr("data-time-picker") === "time") {
					options['format'] = 'HH:mm';
				}
				options["time"] = ($dateTimePicker.attr("data-time-picker") !== "date");
				options["date"] = ($dateTimePicker.attr("data-time-picker") !== "time");
				options["shortTime"] = true;
				$dateTimePicker.bootstrapMaterialDatePicker(options);
			}
		}
		var bootstrapCollapse = $('.calendar-box-list-view');
		bootstrapCollapse.collapse({
			toggle: false
		});
		$body.on("click", bootstrapCollapse, function (e) {
			bootstrapCollapse.collapse('hide');
		});
		if (plugins.stepper.length) {
			plugins.stepper.stepper({
				labels: {
					up: "",
					down: ""
				}
			});
		}
		if (plugins.countDown.length) {
			var i;
			for (i = 0; i < plugins.countDown.length; i++) {
				var countDownItem = plugins.countDown[i],
					d = new Date(),
					type = countDownItem.getAttribute('data-type'),
					time = countDownItem.getAttribute('data-time'),
					format = countDownItem.getAttribute('data-format'),
					settings = [];
				d.setTime(Date.parse(time)).toLocaleString();
				settings[type] = d;
				settings['format'] = format;
				$(countDownItem).countdown(settings);
			}
		}
		if (plugins.customWaypoints.length) {
			var i;
			for (i = 0; i < plugins.customWaypoints.length; i++) {
				var $this = $(plugins.customWaypoints[i]);
				makeWaypointScroll($this);
			}
		}
		if (plugins.scroller.length) {
			for (var i = 0; i < plugins.scroller.length; i++) {
				var scrollerItem = $(plugins.scroller[i]);
				scrollerItem.mCustomScrollbar({
					theme: scrollerItem.attr('data-theme') ? scrollerItem.attr('data-theme') : 'minimal',
					scrollInertia: 100,
					scrollButtons: {
						enable: false
					}
				});
			}
		}
	});
	if (plugins.pageLoader.length) {
		$window.on("load", function () {
			setTimeout(function () {
				plugins.pageLoader.addClass("loaded");
				$window.trigger("resize");
			}, 50);
		});
	}
}());
