
// x3_panel.elements.js
// global elements

var x3_html = $('html'),
		x3_win = $(window),
		x3_body = $('body'),
		x3_footer = x3_body.children('.footer'),
		x3_modal_settings,
		x3_panel_container = x3_body.children('.x3-panel-container'),
		preloader = x3_panel_container.children('#preloader'),
		x3_content_show = x3_panel_container.find('#content_show'),
		x3_navbar_container = x3_panel_container.children('.navbar'),
		x3_welcome = x3_navbar_container.find('#welcome'),
		x3_navbar_nav = x3_navbar_container.find('.navbar-nav'),
		x3_search_input = x3_navbar_container.find('#searchInput'),
		left_sidebar = x3_panel_container.find('#left_sidebar'),
		scroll_button = x3_footer.find('.x3-scroll-up'),

		// for ajax_show_filemanger
		x3_show_conf,
		x3_conf_button,
		x3_mtree,
		x3_modal_new_folder,
		x3_modal_new_zip_file,
		x3_modal_copy_selected,
		x3_modal_move_selected,
		x3_modal_remove_selected,
		x3_modal_uploader,
		container_id_tree,
		container_id_tree2,
		container_id_tree3;


// open modal
function x3_open_modal(str){
	var modal_body = x3_modal_settings.find('.modal-body');
	modal_body.html(str);
	x3_modal_settings.modal();
}

// firewall error
function firewall_error(t, e){
	if(t.toLowerCase() === 'error' && e.toLowerCase() === 'forbidden') {
		x3_open_modal('<p><span class="label label-danger" style="font-size: 1.8em; display: inline-block;">Firewall Detected!</span></p><p>Your server returns \"Forbidden\" when trying to POST X3 settings to <code>x3_settings.php</code>. This indicates that your server has a firewall, which is blocking the POST. You need to ask your host to disable the firewall (or disable some rules) for the <code>/panel/</code> directory.</p><p>There is nothing wrong with having a Firewall, but X3 needs to be able to SAVE settings obviously. The firewall is meant to protect your website, but your X3 panel is already protected by login for known users.</p>');
	}
}

// Add helper modal
(function() {

	// add x3_modal_settings
	x3_body.append('<div class="modal" id="modal-settings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-body"></div></div></div></div>');

	// set global var
	x3_modal_settings = x3_body.children('#modal-settings');

	//var modal = x3_body.children('#modal-settings'),
	var modal_body = x3_modal_settings.find('.modal-body');

	// helper modal
	x3_body.on('click', 'a.show-help, a.text-help, .panel-help', function(e) {
		e.stopPropagation();
		e.preventDefault();
		var el = $(this);
		if(el.data('help')){
			var content = x3_help[el.data('help')];
		} else {
			var hidden = (el.siblings('.hidden').length > 0) ? el.siblings('.hidden') : x3_content_show.find(el.data('hidden'));
			var content = hidden.html();
		}
		modal_body.html(content);
		x3_modal_settings.modal();
	});

	// submit
	function submit(val){
		//var new_folder = x3_content_show.children('#newFolder');
		new_folder_path = val;
		mkdir(x3_modal_new_folder.data('there') || null);
		//mkdir(new_folder.data('there') || null);
	}

	// Submit new folder
	x3_content_show.on('click', '#newFolder button.btn-primary', function(e) {
		var el = $(this),
				val = x3_modal_new_folder.find('input#new_folder').val();
		if(val.length > 0){ // make sure val is not empty
			/*var name_arr = val.split('.');
			if(mypath === '/custom/files'){
				submit(val);
			} else if(val.indexOf('.') > -1 && $.isNumeric(name_arr[0])) {
				if(name_arr[1].length > 0) submit(val);
			} else {
				var c = confirm('Is it intentional to keep this page hidden from the menu?');
				if(c) submit(val);
			}*/
			submit(val);
		}
	});

	// vars
	var msg_space = 'Empty spaces are not allowed in folder names',
			msg_reset = '',
			msg_empty = '',
			timer,
			timing = false,
			span,
			url_helper,
			mybutton,
			last = '',
			mypath = '',
			x3_path = location.hostname + get_x3_path();//location.href.split('/panel')[0];

	// Set some stuff on initial focus
	x3_content_show.on('focus', '#new_folder, #rename_new_name', function(e) {
		var el = $(this);
		var modal = el.closest('#newFolder');
		span = el.siblings('.url-info');
		url_helper = el.siblings('.url-helper');
		mybutton = el.closest('.modal-content').find('button.btn-primary, button.btn-success');
		if(modal.length){
			mypath = (modal.data('there') || here).split('./content')[1].replace(/\/\d+\./g, '/').replace(/\/$/, '');
		}
	});

	// postman
	function postman(msg, err){

		if(span.text() !== msg) {
			span.removeClass('label-warning label-danger');
			span.text(msg).addClass(err ? 'label-danger' : 'label-warning').velocity('stop').velocity({opacity:[1,0]}, {duration: 200});
		}

		// Reset after two seconds
		if(err) {
			clearTimeout(timer);
			timing = true;
			timer = setTimeout(function(){
				timing = false;
				//if(span.text() !== msg_reset) span.removeClass('error')
				if(span.text() !== msg_reset) span.removeClass('label-danger').addClass('label-warning')
						.text(msg_reset)
						.velocity('stop')
						.velocity({opacity:[1,0]}, {duration: 200});
			}, 2000);
		}

	}

	// Input key event
	x3_body.on('keypress keyup focus', '#new_folder, #rename_new_name:not(.input-move)', function(e) {

		// Get key
		var key = String.fromCharCode(e.which);

		// Block disallowed characters
		if(('#$%^&*()+=[]\'"/\\|{}`~!@?,').indexOf(key) > -1) {
			if(e.type == 'keypress') postman(key + ' character not allowed in folder names.', true);
			return false;

		} else {

			// get val
			var el = $(this),
					val = el.val(),
					val_array = val.split('.'),
					is_numeric = val_array.length > 1 && $.isNumeric(val_array[0]),
					url_string = is_numeric ? val.replace(val_array[0] + '.', '') : val;

			// url helper
			url_helper.toggle(url_string.indexOf('_') !== 0 && url_string.length > 0 && mypath !== '/custom/files').html('<i class="glyphicon glyphicon-link"></i> ' + x3_path + mypath + '/<span>' + url_string + '</span>/');

			// reset msg
			//msg_reset = is_numeric || mypath === '/custom/files' ? msg_visible : (val.length > 1 ? msg_num : msg_empty);

			// Replace space
			if(e.which == 32) {
				postman(msg_space, true);
				if(e.type == 'keyup') el.val(val.replace(/\s+/g, '-'));

			// postman reset
			} else if(!timing){
				//postman(msg_reset, false);
				postman('', false);
			}

			// toggle numeric class on input
			//el.toggleClass('is_numeric', is_numeric);

			// toggle button disabled
			mybutton.prop('disabled', !url_string);

			// title and label placeholder
			var options = el.siblings('.panel');
			if(options.length) {
				// vars
				var title_input = options.find('#new_folder_title'),
						label_input = options.find('#new_folder_label'),
						title = url_string.replace(/-+|_+/g,' ').trim(),
						title = title.charAt(0).toUpperCase() + title.substring(1);

				title_input.attr('placeholder', title);
				label_input.attr('placeholder', title);
			}
		}
	});
})();

// endsWith prototype
if(typeof String.prototype.endsWith !== 'function') {
  String.prototype.endsWith = function(suffix) {
    return this.indexOf(suffix, this.length - suffix.length) !== -1;
  };
}

// update fixed elements
function update_fixed(immediate){
	if(immediate === true){
		x3_win.resize();
	} else {
		setTimeout(function(){
			x3_win.resize();
		}, 500);
	}
}

// x3 scroll top
function x3_scroll_top(){
	if(x3_win.scrollTop() > 75) {
		x3_html.velocity('stop').velocity('scroll', {
			duration: 500,
			easing: 'easeInOutCubic',
			complete: function(){
				if(!button_is_hidden){
					button_is_hidden = true;
					scroll_button.velocity('stop').velocity('fadeOut', { duration: 200 });
				}
			}
		});
	}
}

// footer scroll button
var button_is_hidden = true;
(function() {

	// toggle_button
	function toggle_button(){

		// vars
		var is_scrolled = x3_win.scrollTop() > 75 ? true : false;

		// changed
		var changed = (button_is_hidden && is_scrolled) || (!button_is_hidden && !is_scrolled) ? true : false;
		if(changed){
			button_is_hidden = !button_is_hidden;
			scroll_button.velocity('stop').velocity(button_is_hidden ? 'fadeOut' : 'fadeIn', { duration: 200 });
		}
	}

	// run every 1000ms
	setInterval(toggle_button, 1000);

	// click
	scroll_button.on('click', x3_scroll_top);
})();

// set menu active
function main_menu_active(id){
	x3_navbar_nav.children('.active').removeClass('active');
	x3_navbar_nav.children(id).addClass('active');
}

// get x3 path
function get_x3_path(){
	var arr = location.pathname.split('/').filter(function(v){return v!==''});
  arr.pop();
  var mypath = arr.join('/');
  return (mypath ? '/' + mypath : '');
}

// fix for editor custom buttons [center]
function myToggleBlock(editor, type, start_chars, end_chars) {
  if (/editor-preview-active/.test(editor.codemirror.getWrapperElement().lastChild.className))
      return;

  end_chars = (typeof end_chars === 'undefined') ? start_chars : end_chars;
  var cm = editor.codemirror;
  var text;
  var start = start_chars;
  var end = end_chars;

  var startPoint = cm.getCursor('start');
  var endPoint = cm.getCursor('end');

  text = cm.getSelection();
  cm.replaceSelection(start + text + end);

  startPoint.ch += start_chars.length;
  endPoint.ch = startPoint.ch + text.length;

  cm.setSelection(startPoint, endPoint);
  cm.focus();
};

// Check for localstorage support
var is_local_storage = window.localStorage ? function(){
	try {
    var x = 'x3_test';
    localStorage.setItem(x, x);
    localStorage.removeItem(x);
    return true;
  } catch (e) {
    return false;
  }
}() : false;
function supports_local_storage() {
	return is_local_storage;
}

// get primary domain
function get_domain(){
  var parts = location.hostname.split('.');
  if(parts.length > 3) parts = parts.slice(parts.length - 3);
  if(parts.length === 3 && (parts[1].length > 3 || parts[0] === 'www')) parts = parts.slice(1);
  return parts.join('.');
}

// atob alias
function atob_alias(str){
	return atob(str);
}

// is flamepix
var is_flamepix = window[atob_alias('dXNlcng=')] === atob_alias('ZnA='),
		x3_license = !is_flamepix && supports_local_storage() && localStorage.getItem(atob_alias('eDNfbGljZW5zZQ==')) !== null ? parseInt(localStorage.getItem(atob_alias('eDNfbGljZW5zZQ=='))) : 1;
//x3_license = 1; // 0 = unlicensed, 1 = pro, 2 = private

// deny guest
function deny_guest(msg){
	if(is_guest) x3Notifier(msg || 'Guest user cannot make changes.', 3000, null, 'danger');
	return is_guest;
}

// check if query parameter exists
function url_param_exists(param, str){
  var s = str || location.search;
  return s.search('[?&]' + param + '($|=|&)') != -1;
}

// x3_debug var
var x3_debug = url_param_exists('debug') || location.host == 'x3.locl';

// x3_log
function x3_log(msg, dir, type){
	if(!x3_debug) return;
	var args = ['X3 panel /', msg];
	if(dir) args.push(dir);
	console[type || 'log'].apply(this, args);
}

//
/*function nice_id(text){
  return text.toString().replace(/\s+/g, '_') 		// spaces
  											.replace(/[^\w\-]+/g, '_') // Remove all non-word chars
  											.replace(/\_\_+/g, '_')		// Replace multiple - with single -
  											.replace(/^_+/, '')             // Trim - from start of text
  											.replace(/_+$/, '');            // Trim - from end of text
}*/


/* Copyright (c) 2012 Joshfire - MIT license */
/**
 * @fileoverview Core of the JSON Form client-side library.
 *
 * Generates an HTML form from a structured data model and a layout description.
 *
 * The library may also validate inputs entered by the user against the data model
 * upon form submission and create the structured data object initialized with the
 * values that were submitted.
 *
 * The library depends on:
 *  - jQuery
 *  - the underscore library
 *  - a JSON parser/serializer. Nothing to worry about in modern browsers.
 *  - the JSONFormValidation library (in jsv.js) for validation purpose
 *
 * See documentation at:
 * http://developer.joshfire.com/doc/dev/ref/jsonform
 *
 * The library creates and maintains an internal data tree along with the DOM.
 * That structure is necessary to handle arrays (and nested arrays!) that are
 * dynamic by essence.
 */

 /*global window*/

(function(serverside, global, $, _, JSON) {
  // Don't try to load underscore.js if is already loaded
  if (serverside && typeof _ === 'undefined') {
    _ = require('underscore');
    if (_ === 'undefined') throw 'Failed to load underscore.js';
  }

  var getDefaultClasses = function(isBootstrap2) {
    return isBootstrap2 ? {
      groupClass: 'control-group',
      groupMarkClassPrefix: '',
      labelClass: 'control-label',
      controlClass: 'controls',
      iconClassPrefix: 'icon',
      buttonClass: 'btn',
      textualInputClass: '',
      prependClass: 'input-prepend',
      appendClass: 'input-append',
      addonClass: 'add-on',
      inlineClassSuffix: ' inline'
    } : {
      groupClass: 'form-group',
      groupMarkClassPrefix: 'has-',
      labelClass: 'control-label',
      controlClass: 'controls',
      iconClassPrefix: 'glyphicon glyphicon',
      buttonClass: 'btn btn-default',
      textualInputClass: 'form-control',
      prependClass: 'input-group',
      appendClass: 'input-group',
      addonClass: 'input-group-addon',
      buttonAddonClass: 'input-group-btn',
      inlineClassSuffix: '-inline'
    };
  };

  /**
   * Regular expressions used to extract array indexes in input field names
   */
  var reArray = /\[([0-9]*)\](?=\[|\.|$)/g;

  /**
   * Template settings for form views
   */
  var fieldTemplateSettings = {
    evaluate    : /<%([\s\S]+?)%>/g,
    interpolate : /<%=([\s\S]+?)%>/g
  };

  /**
   * Template settings for value replacement
   */
  var valueTemplateSettings = {
    evaluate    : /\{\[([\s\S]+?)\]\}/g,
    interpolate : /\{\{([\s\S]+?)\}\}/g
  };

  var _template = typeof _.template('', {}) === 'string' ? _.template : function(tmpl, data, opts) {
    return _.template(tmpl, opts)(data);
  }

  /**
   * Returns true if given value is neither "undefined" nor null
   */
  var isSet = function (value) {
    return !(_.isUndefined(value) || _.isNull(value));
  };

  /**
   * Returns true if given property is directly property of an object
   */
  var hasOwnProperty = function (obj, prop) {
    return typeof obj === 'object' && Object.prototype.hasOwnProperty.call(obj, prop);
  }

  /**
   * The jsonform object whose methods will be exposed to the window object
   */
  var jsonform = {util:{}};


  // From backbonejs
  var escapeHTML = function (string) {
    if (!isSet(string)) {
      return '';
    }
    string = '' + string;
    if (!string) {
      return '';
    }
    return string
      .replace(/&(?!\w+;|#\d+;|#x[\da-f]+;)/gi, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#x27;')
      .replace(/\//g, '&#x2F;');
  };

/**
 * Escapes selector name for use with jQuery
 *
 * All meta-characters listed in jQuery doc are escaped:
 * http://api.jquery.com/category/selectors/
 *
 * @function
 * @param {String} selector The jQuery selector to escape
 * @return {String} The escaped selector.
 */
var escapeSelector = function (selector) {
  return selector.replace(/([ \!\"\#\$\%\&\'\(\)\*\+\,\.\/\:\;<\=\>\?\@\[\\\]\^\`\{\|\}\~])/g, '\\$1');
};


/**
 * Initializes tabular sections in forms. Such sections are generated by the
 * 'selectfieldset' type of elements in JSON Form.
 *
 * Input fields that are not visible are automatically disabled
 * not to appear in the submitted form. That's on purpose, as tabs
 * are meant to convey an alternative (and not a sequence of steps).
 *
 * The tabs menu is not rendered as tabs but rather as a select field because
 * it's easier to grasp that it's an alternative.
 *
 * Code based on bootstrap-tabs.js, updated to:
 * - react to option selection instead of tab click
 * - disable input fields in non visible tabs
 * - disable the possibility to have dropdown menus (no meaning here)
 * - act as a regular function instead of as a jQuery plug-in.
 *
 * @function
 * @param {Object} tabs jQuery object that contains the tabular sections
 *  to initialize. The object may reference more than one element.
 */
var initializeTabs = function (tabs) {
  var activate = function (element, container) {
    container
      .find('> .active')
      .removeClass('active');
    element.addClass('active');
  };

  var enableFields = function ($target, targetIndex) {
    // Enable all fields in the targeted tab
    $target.find('input, textarea, select').removeAttr('disabled');

    // Disable all fields in other tabs
    $target.parent()
      .children(':not([data-idx=' + targetIndex + '])')
      .find('input, textarea, select')
      .attr('disabled', 'disabled');
  };

  var optionSelected = function (e) {
    var $option = $("option:selected", $(this)),
      $select = $(this),
      // do not use .attr() as it sometimes unexplicably fails
      targetIdx = $option.get(0).getAttribute('data-idx') || $option.attr('value'),
      $target;

    e.preventDefault();
    if ($option.hasClass('active')) {
      return;
    }

    $target = $(this).parents('.tabbable').eq(0).find('> .tab-content > [data-idx=' + targetIdx + ']');

    activate($option, $select);
    activate($target, $target.parent());
    enableFields($target, targetIdx);
  };

  var tabClicked = function (e) {
    var $a = $('a', $(this));
    var $content = $(this).parents('.tabbable').first()
      .find('.tab-content').first();
    var targetIdx = $(this).index();
    var $target = $content.find('[data-idx=' + targetIdx + ']');

    e.preventDefault();
    activate($(this), $(this).parent());
    activate($target, $target.parent());
    if ($(this).parent().hasClass('jsonform-alternative')) {
      enableFields($target, targetIdx);
    }
  };

  tabs.each(function () {
    $(this).delegate('select.nav', 'change', optionSelected);
    $(this).find('select.nav').each(function () {
      $(this).val($(this).find('.active').attr('value'));
      // do not use .attr() as it sometimes unexplicably fails
      var targetIdx = $(this).find('option:selected').get(0).getAttribute('data-idx') ||
        $(this).find('option:selected').attr('value');
      var $target = $(this).parents('.tabbable').eq(0).find('> .tab-content > [data-idx=' + targetIdx + ']');
      enableFields($target, targetIdx);
    });

    $(this).delegate('ul.nav li', 'click', tabClicked);
    $(this).find('ul.nav li.active').click();
  });
};


// Twitter bootstrap-friendly HTML boilerplate for standard inputs
jsonform.fieldTemplate = function(inner) {
  return '<div class="<%= cls.groupClass %> jsonform-node jsonform-error-<%= keydash %>' +
    '<%= elt.htmlClass ? " " + elt.htmlClass : "" %>' +
    '<%= (node.required && node.formElement && (node.formElement.type !== "checkbox") ? " jsonform-required" : "") %>' +
    '<%= (node.isReadOnly() ? " jsonform-readonly" : "") %>' +
    '<%= (node.disabled ? " jsonform-disabled" : "") %>' +
    '" data-jsonform-type="<%= node.formElement.type %>">' +
    '<% if (node.title && !elt.notitle && elt.inlinetitle !== true) { %>' +
      '<label class="<%= cls.labelClass %>" for="<%= node.id %>"><%= node.title %></label>' +
    '<% } %>' +
    '<div class="<%= cls.controlClass %>">' +
      '<% if (node.description) { %>' +
        '<span class="help-block jsonform-description"><%= node.description %></span>' +
      '<% } %>' +
      '<% if (node.prepend || node.append) { %>' +
        '<div class="<%= node.prepend ? cls.prependClass : "" %> ' +
        '<%= node.append ? cls.appendClass : "" %>">' +
        '<% if (node.prepend && node.prepend.indexOf("<button ") >= 0) { %>' +
          '<% if (cls.buttonAddonClass) { %>' +
            '<span class="<%= cls.buttonAddonClass %>"><%= node.prepend %></span>' +
          '<% } else { %>' +
            '<%= node.prepend %>' +
          '<% } %>' +
        '<% } %>' +
        '<% if (node.prepend && node.prepend.indexOf("<button ") < 0) { %>' +
          '<span class="<%= cls.addonClass %>"><%= node.prepend %></span>' +
        '<% } %>' +
      '<% } %>' +
      inner +
      '<% if (node.append && node.append.indexOf("<button ") >= 0) { %>' +
        '<% if (cls.buttonAddonClass) { %>' +
          '<span class="<%= cls.buttonAddonClass %>"><%= node.append %></span>' +
        '<% } else { %>' +
          '<%= node.append %>' +
        '<% } %>' +
      '<% } %>' +
      '<% if (node.append && node.append.indexOf("<button ") < 0) { %>' +
        '<span class="<%= cls.addonClass %>"><%= node.append %></span>' +
      '<% } %>' +
      '<% if (node.prepend || node.append) { %>' +
        '</div>' +
      '<% } %>' +
      '<span class="help-block jsonform-errortext" style="display:none;"></span>' +
    '</div></div>';
};

var fileDisplayTemplate = '<div class="_jsonform-preview">' +
  '<% if (value.type=="image") { %>' +
  '<img class="jsonform-preview" id="jsonformpreview-<%= id %>" src="<%= value.url %>" />' +
  '<% } else { %>' +
  '<a href="<%= value.url %>"><%= value.name %></a> (<%= Math.ceil(value.size/1024) %>kB)' +
  '<% } %>' +
  '</div>' +
  '<a href="#" class="<%= cls.buttonClass %> _jsonform-delete"><i class="<%= cls.iconClassPrefix %>-remove" title="Remove"></i></a> ';

var inputFieldTemplate = function (type, isTextualInput, extraOpts) {
  var templ = {
    'template': '<input type="' + type + '" ' +
      'class="<%= fieldHtmlClass' + (isTextualInput ? ' || cls.textualInputClass' : '') + ' %>" ' +
      'name="<%= node.name %>" value="<%= escape(value) %>" id="<%= id %>"' +
      '<%= (node.disabled? " disabled" : "")%>' +
      '<%= (node.isReadOnly() ? " readonly=\'readonly\'" : "") %>' +
      '<%= (node.schemaElement && node.schemaElement.maxLength ? " maxlength=\'" + node.schemaElement.maxLength + "\'" : "") %>' +
      '<%= (node.required ? " required=\'required\'" : "") %>' +
      '<%= (node.placeholder? " placeholder=" + \'"\' + escape(node.placeholder) + \'"\' : "")%>' +
      ' />',
    'fieldtemplate': true,
    'inputfield': true,
    'onInsert': function(evt, node) {
      if (node.formElement && node.formElement.autocomplete) {
        var $input = $(node.el).find('input');
        if ($input.autocomplete) {
          $input.autocomplete(node.formElement.autocomplete);
        }
      }
      if (node.formElement && (node.formElement.tagsinput || node.formElement.getValue === 'tagsvalue')) {
        if (!$.fn.tagsinput)
          throw new Error('tagsinput is not found');
        var $input = $(node.el).find('input');
        var isArray = Array.isArray(node.value);
        if (isArray)
          $input.attr('value', '').val('');
        $input.tagsinput(node.formElement ? (node.formElement.tagsinput || {}) : {});
        if (isArray) {
          node.value.forEach(function(value) {
            $input.tagsinput('add', value);
          });
        }
      }
      if (node.formElement && node.formElement.typeahead) {
        var $input = $(node.el).find('input');
        if ($input.typeahead) {
          if (Array.isArray(node.formElement.typeahead)) {
            for (var i = 1; i < node.formElement.typeahead.length; ++i) {
              var dataset = node.formElement.typeahead[i];
              if (dataset.source && Array.isArray(dataset.source)) {
                var source = dataset.source;
                dataset.source = function(query, cb) {
                  var lq = query.toLowerCase();
                  cb(source.filter(function(v) {
                    return v.toLowerCase().indexOf(lq) >= 0;
                  }).map(function(v) {
                    return (typeof v === 'string') ? {value: v} : v;
                  }));
                }
              }
            }
            $.fn.typeahead.apply($input, node.formElement.typeahead);
          }
          else {
            $input.typeahead(node.formElement.typeahead);
          }
        }
      }
    }
  }
  if (extraOpts)
    templ = _.extend(templ, extraOpts);
  return templ;
};

var numberFieldTemplate = function (type, isTextualInput) {
  return {
    'template': '<input type="' + type + '" ' +
      'class="<%= fieldHtmlClass' + (isTextualInput ? ' || cls.textualInputClass' : '') + ' %>" ' +
      'name="<%= node.name %>" value="<%= escape(value) %>" id="<%= id %>"' +
      '<%= (node.disabled? " disabled" : "")%>' +
      '<%= (node.isReadOnly() ? " readonly=\'readonly\'" : "") %>' +
      '<%= (range.min !== undefined ? " min="+range.min : "")%>' +
      '<%= (range.max !== undefined ? " max="+range.max : "")%>' +
      '<%= (range.step !== undefined ? " step="+range.step : "")%>' +
      '<%= (node.schemaElement && node.schemaElement.maxLength ? " maxlength=\'" + node.schemaElement.maxLength + "\'" : "") %>' +
      '<%= (node.required ? " required=\'required\'" : "") %>' +
      '<%= (node.placeholder? "placeholder=" + \'"\' + escape(node.placeholder) + \'"\' : "")%>' +
      ' />',
    'fieldtemplate': true,
    'inputfield': true,
    'onBeforeRender': function (data, node) {
      data.range = {
        step: 1
      };
      if (type == 'range') {
        data.range.min = 1;
        data.range.max = 100;
      }
      if (!node || !node.schemaElement) return;
      if (node.formElement && node.formElement.step) {
        data.range.step = node.formElement.step;
      }
      else if (node.schemaElement.type == 'number') {
        data.range.step = 'any';
      }
      var step = data.range.step === 'any' ? 1 : data.range.step;
      if (typeof node.schemaElement.minimum !== 'undefined') {
        if (node.schemaElement.exclusiveMinimum) {
          data.range.min = node.schemaElement.minimum + step;
        }
        else {
          data.range.min = node.schemaElement.minimum;
        }
      }
      if (typeof node.schemaElement.maximum !== 'undefined') {
        if (node.schemaElement.exclusiveMaximum) {
          data.range.max = node.schemaElement.maximum - step;
        }
        else {
          data.range.max = node.schemaElement.maximum;
        }
      }
    }
  };
}

jsonform.elementTypes = {
  'none': {
    'template': ''
  },
  'root': {
    'template': '<div><%= children %></div>'
  },
  'text': inputFieldTemplate('text', true),
  'password': inputFieldTemplate('password', true),
  'date': inputFieldTemplate('date', true, {
    'onInsert': function(evt, node) {
      if (window.Modernizr && window.Modernizr.inputtypes && !window.Modernizr.inputtypes.date) {
        var $input = $(node.el).find('input');
        if ($input.datepicker) {
          var opt = {dateFormat: "yy-mm-dd"};
          if (node.formElement && node.formElement.datepicker && typeof node.formElement.datepicker === 'object')
            _.extend(opt, node.formElement.datepicker);
          $input.datepicker(opt);
        }
      }
    }
  }),
  'datetime': inputFieldTemplate('datetime', true),
  'datetime-local': inputFieldTemplate('datetime-local', true, {
    'onBeforeRender': function (data, node) {
      if (data.value && data.value.getTime) {
        data.value = new Date(data.value.getTime()-data.value.getTimezoneOffset()*60000).toISOString().slice(0, -1);
      }
    }
  }),
  'email': inputFieldTemplate('email', true),
  'month': inputFieldTemplate('month', true),
  'number': numberFieldTemplate('number', true),
  'search': inputFieldTemplate('search', true),
  'tel': inputFieldTemplate('tel', true),
  'time': inputFieldTemplate('time', true),
  'url': inputFieldTemplate('url', true),
  'week': inputFieldTemplate('week', true),
  'range': numberFieldTemplate('range'),
  'color':{
    'template':'<input type="text" ' +
      '<%= (fieldHtmlClass ? "class=\'" + fieldHtmlClass + "\' " : "") %>' +
      'name="<%= node.name %>" value="<%= escape(value) %>" id="<%= id %>"' +
      '<%= (node.disabled? " disabled" : "")%>' +
      '<%= (node.required ? " required=\'required\'" : "") %>' +
      ' />',
    'fieldtemplate': true,
    'inputfield': true,
    'onInsert': function(evt, node) {
      $(node.el).find('#' + escapeSelector(node.id)).spectrum({
        preferredFormat: "hex",
        showInput: true
      });
    }
  },
  'textarea':{
    'template':'<textarea id="<%= id %>" name="<%= node.name %>" ' +
      'class="<%= fieldHtmlClass || cls.textualInputClass %>" ' +
      'style="<%= elt.height ? "height:" + elt.height + ";" : "" %>width:<%= elt.width || "100%" %>;"' +
      '<%= (node.disabled? " disabled" : "")%>' +
      '<%= (node.isReadOnly() ? " readonly=\'readonly\'" : "") %>' +
      '<%= (node.schemaElement && node.schemaElement.maxLength ? " maxlength=\'" + node.schemaElement.maxLength + "\'" : "") %>' +
      '<%= (node.required ? " required=\'required\'" : "") %>' +
      '<%= (node.placeholder? " placeholder=" + \'"\' + escape(node.placeholder) + \'"\' : "")%>' +
      '><%= value %></textarea>',
    'fieldtemplate': true,
    'inputfield': true
  },
  'wysihtml5':{
    'template':'<textarea id="<%= id %>" name="<%= node.name %>" style="height:<%= elt.height || "300px" %>;width:<%= elt.width || "100%" %>;"' +
      '<%= (node.disabled? " disabled" : "")%>' +
      '<%= (node.isReadOnly() ? " readonly=\'readonly\'" : "") %>' +
      '<%= (node.schemaElement && node.schemaElement.maxLength ? " maxlength=\'" + node.schemaElement.maxLength + "\'" : "") %>' +
      '<%= (node.required ? " required=\'required\'" : "") %>' +
      '<%= (node.placeholder? " placeholder=" + \'"\' + escape(node.placeholder) + \'"\' : "")%>' +
      '><%= value %></textarea>',
    'fieldtemplate': true,
    'inputfield': true,
    'onInsert': function (evt, node) {
      var setup = function () {
        //protect from double init
        if ($(node.el).data("wysihtml5")) return;
        $(node.el).data("wysihtml5_loaded",true);

        $(node.el).find('#' + escapeSelector(node.id)).wysihtml5({
          "html": true,
          "link": true,
          "font-styles":true,
          "image": true,
          "events": {
            "load": function () {
              // In chrome, if an element is required and hidden, it leads to
              // the error 'An invalid form control with name='' is not focusable'
              // See http://stackoverflow.com/questions/7168645/invalid-form-control-only-in-google-chrome
              $(this.textareaElement).removeAttr('required');
            }
          }
        });
      };

      // Is there a setup hook?
      if (window.jsonform_wysihtml5_setup) {
        window.jsonform_wysihtml5_setup(setup);
        return;
      }

      // Wait until wysihtml5 is loaded
      var itv = window.setInterval(function() {
        if (window.wysihtml5) {
          window.clearInterval(itv);
          setup();
        }
      },1000);
    }
  },
  'ace':{
    'template':'<div id="<%= id %>" style="position:relative;height:<%= elt.height || "300px" %>;"><div id="<%= id %>__ace" style="width:<%= elt.width || "100%" %>;height:<%= elt.height || "300px" %>;"></div><input type="hidden" name="<%= node.name %>" id="<%= id %>__hidden" value="<%= escape(value) %>"/></div>',
    'fieldtemplate': true,
    'inputfield': true,
    'onBeforeRender': function (data, node) {
      if (data.value && typeof data.value == 'object' || Array.isArray(data.value))
        data.value = JSON.stringify(data.value, null, 2);
    },
    'onInsert': function (evt, node) {
      var setup = function () {
        var formElement = node.formElement || {};
        var ace = window.ace;
        var editor = ace.edit($(node.el).find('#' + escapeSelector(node.id) + '__ace').get(0));
        var idSelector = '#' + escapeSelector(node.id) + '__hidden';
        // Force editor to use "\n" for new lines, not to bump into ACE "\r" conversion issue
        // (ACE is ok with "\r" on pasting but fails to return "\r" when value is extracted)
        editor.getSession().setNewLineMode('unix');
        editor.renderer.setShowPrintMargin(false);
        editor.setTheme("ace/theme/"+(formElement.aceTheme||"twilight"));

        if (formElement.aceMode) {
          editor.getSession().setMode("ace/mode/"+formElement.aceMode);
        }
        editor.getSession().setTabSize(2);

        // Set the contents of the initial manifest file
        var valueStr = node.value;
        if (valueStr === null || valueStr === undefined)
          valueStr = '';
        else if (typeof valueStr == 'object' || Array.isArray(valueStr))
          valueStr = JSON.stringify(valueStr, null, 2);
        editor.getSession().setValue(valueStr);

        //TODO this is clearly sub-optimal
        // 'Lazily' bind to the onchange 'ace' event to give
        // priority to user edits
        var lazyChanged = _.debounce(function () {
          $(node.el).find(idSelector).val(editor.getSession().getValue());
          $(node.el).find(idSelector).change();
        }, 600);
        editor.getSession().on('change', lazyChanged);

        editor.on('blur', function() {
          $(node.el).find(idSelector).change();
          $(node.el).find(idSelector).trigger("blur");
        });
        editor.on('focus', function() {
          $(node.el).find(idSelector).trigger("focus");
        });
      };

      // Is there a setup hook?
      if (window.jsonform_ace_setup) {
        window.jsonform_ace_setup(setup);
        return;
      }

      // Wait until ACE is loaded
      var itv = window.setInterval(function() {
        if (window.ace) {
          window.clearInterval(itv);
          setup();
        }
      },1000);
    }
  },
  'checkbox':{
    'template': '<div class="checkbox"><label><input type="checkbox" id="<%= id %>" ' +
      'name="<%= node.name %>" value="1" <% if (value) {%>checked<% } %>' +
      '<%= (node.disabled? " disabled" : "")%>' +
      '<%= (node.required && node.schemaElement && (node.schemaElement.type !== "boolean") ? " required=\'required\'" : "") %>' +
      ' /><span><%= (node.inlinetitle === true ? node.title : node.inlinetitle) || "" %></span>' +
      '</label></div>',
    'fieldtemplate': true,
    'inputfield': true,
    'onInsert': function (evt, node) {
      if (node.formElement.toggleNext) {
        var nextN = node.formElement.toggleNext === true ? 1 : node.formElement.toggleNext;
        var toggleNextClass = 'jsonform-toggle-next jsonform-toggle-next-' + nextN;
        var $next = nextN === 1 ? $(node.el).next() : (nextN === 'all' ? $(node.el).nextAll() : $(node.el).nextAll().slice(0, nextN));
        $next.addClass('jsonform-toggle-next-target');
        $(node.el).addClass(toggleNextClass).find(':checkbox').on('change', function() {
          var $this = $(this);
          var checked = $this.is(':checked');
          $(node.el).toggleClass('checked', checked);
          $next.toggle(checked).toggleClass('jsonform-toggled-visible', checked);
        }).change();
      }
    },
    'getElement': function (el) {
      return $(el).parent().parent().get(0);
    }
  },
  'file':{
    'template':'<input class="input-file" id="<%= id %>" name="<%= node.name %>" type="file" ' +
      '<%= (node.required ? " required=\'required\'" : "") %>' +
      '/>',
    'fieldtemplate': true,
    'inputfield': true
  },
  'file-hosted-public':{
    'template':'<span><% if (value && (value.type||value.url)) { %>'+fileDisplayTemplate+'<% } %><input class="input-file" id="_transloadit_<%= id %>" type="file" name="<%= transloaditname %>" /><input data-transloadit-name="_transloadit_<%= transloaditname %>" type="hidden" id="<%= id %>" name="<%= node.name %>" value=\'<%= escape(JSON.stringify(node.value)) %>\' /></span>',
    'fieldtemplate': true,
    'inputfield': true,
    'getElement': function (el) {
      return $(el).parent().get(0);
    },
    'onBeforeRender': function (data, node) {

      if (!node.ownerTree._transloadit_generic_public_index) {
        node.ownerTree._transloadit_generic_public_index=1;
      } else {
        node.ownerTree._transloadit_generic_public_index++;
      }

      data.transloaditname = "_transloadit_jsonform_genericupload_public_"+node.ownerTree._transloadit_generic_public_index;

      if (!node.ownerTree._transloadit_generic_elts) node.ownerTree._transloadit_generic_elts = {};
      node.ownerTree._transloadit_generic_elts[data.transloaditname] = node;
    },
    'onChange': function(evt,elt) {
      // The "transloadit" function should be called only once to enable
      // the service when the form is submitted. Has it already been done?
      if (elt.ownerTree._transloadit_bound) {
        return false;
      }
      elt.ownerTree._transloadit_bound = true;

      // Call the "transloadit" function on the form element
      var formElt = $(elt.ownerTree.domRoot);
      formElt.transloadit({
        autoSubmit: false,
        wait: true,
        onSuccess: function (assembly) {
          // Image has been uploaded. Check the "results" property that
          // contains the list of files that Transloadit produced. There
          // should be one image per file input in the form at most.
          var results = _.values(assembly.results);
          results = _.flatten(results);
          _.each(results, function (result) {
            // Save the assembly result in the right hidden input field
            var id = elt.ownerTree._transloadit_generic_elts[result.field].id;
            var input = formElt.find('#' + escapeSelector(id));
            var nonEmptyKeys = _.filter(_.keys(result.meta), function (key) {
              return !!isSet(result.meta[key]);
            });
            result.meta = _.pick(result.meta, nonEmptyKeys);
            input.val(JSON.stringify(result));
          });

          // Unbind transloadit from the form
          elt.ownerTree._transloadit_bound = false;
          formElt.unbind('submit.transloadit');

          // Submit the form on next tick
          _.delay(function () {
            x3_log('submit form');
            elt.ownerTree.submit();
          }, 10);
        },
        onError: function (assembly) {
          // TODO: report the error to the user
          x3_log('assembly error', assembly);
        }
      });
    },
    'onInsert': function (evt, node) {
      $(node.el).find('a._jsonform-delete').on('click', function (evt) {
        $(node.el).find('._jsonform-preview').remove();
        $(node.el).find('a._jsonform-delete').remove();
        $(node.el).find('#' + escapeSelector(node.id)).val('');
        evt.preventDefault();
        return false;
      });
    },
    'onSubmit':function(evt, elt) {
      if (elt.ownerTree._transloadit_bound) {
        return false;
      }
      return true;
    }

  },
  'file-transloadit': {
    'template': '<span><% if (value && (value.type||value.url)) { %>'+fileDisplayTemplate+'<% } %><input class="input-file" id="_transloadit_<%= id %>" type="file" name="_transloadit_<%= node.name %>" /><input type="hidden" id="<%= id %>" name="<%= node.name %>" value=\'<%= escape(JSON.stringify(node.value)) %>\' /></span>',
    'fieldtemplate': true,
    'inputfield': true,
    'getElement': function (el) {
      return $(el).parent().get(0);
    },
    'onChange': function (evt, elt) {
      // The "transloadit" function should be called only once to enable
      // the service when the form is submitted. Has it already been done?
      if (elt.ownerTree._transloadit_bound) {
        return false;
      }
      elt.ownerTree._transloadit_bound = true;

      // Call the "transloadit" function on the form element
      var formElt = $(elt.ownerTree.domRoot);
      formElt.transloadit({
        autoSubmit: false,
        wait: true,
        onSuccess: function (assembly) {
          // Image has been uploaded. Check the "results" property that
          // contains the list of files that Transloadit produced. Note
          // JSONForm only supports 1-to-1 associations, meaning it
          // expects the "results" property to contain only one image
          // per file input in the form.
          var results = _.values(assembly.results);
          results = _.flatten(results);
          _.each(results, function (result) {
            // Save the assembly result in the right hidden input field
            var input = formElt.find('input[name="' +
              result.field.replace(/^_transloadit_/, '') +
              '"]');
            var nonEmptyKeys = _.filter(_.keys(result.meta), function (key) {
              return !!isSet(result.meta[key]);
            });
            result.meta = _.pick(result.meta, nonEmptyKeys);
            input.val(JSON.stringify(result));
          });

          // Unbind transloadit from the form
          elt.ownerTree._transloadit_bound = false;
          formElt.unbind('submit.transloadit');

          // Submit the form on next tick
          _.delay(function () {
            x3_log('submit form');
            elt.ownerTree.submit();
          }, 10);
        },
        onError: function (assembly) {
          // TODO: report the error to the user
          x3_log('assembly error', assembly);
        }
      });
    },
    'onInsert': function (evt, node) {
      $(node.el).find('a._jsonform-delete').on('click', function (evt) {
        $(node.el).find('._jsonform-preview').remove();
        $(node.el).find('a._jsonform-delete').remove();
        $(node.el).find('#' + escapeSelector(node.id)).val('');
        evt.preventDefault();
        return false;
      });
    },
    'onSubmit': function (evt, elt) {
      if (elt.ownerTree._transloadit_bound) {
        return false;
      }
      return true;
    }
  },
  'select':{
    'template':'<select name="<%= node.name %>" id="<%= id %>"' +
      ' class="<%= fieldHtmlClass || cls.textualInputClass %>"' +
      '<%= (node.disabled? " disabled" : "")%>' +
      '<%= (node.required ? " required=\'required\'" : "") %>' +
      '> ' +
      '<% _.each(node.options, function(key, val) { if(key instanceof Object) { if (value === key.value) { %> <option selected value="<%= key.value %>"><%= key.title %></option> <% } else { %> <option value="<%= key.value %>"><%= key.title %></option> <% }} else { if (value === key) { %> <option selected value="<%= key %>"><%= key %></option> <% } else { %><option value="<%= key %>"><%= key %></option> <% }}}); %> ' +
      '</select>',
    'fieldtemplate': true,
    'inputfield': true
  },
  'tagsinput':{
    'template':'<select name="<%= node.name %><%= node.formElement.getValue === "tagsinput" ? "" : "[]" %>" id="<%= id %>"' +
      ' class="<%= fieldHtmlClass || cls.textualInputClass %>" multiple' +
      '<%= (node.disabled? " disabled" : "")%>' +
      '<%= (node.required ? " required=\'required\'" : "") %>' +
      '> ' +
      '</select>',
    'fieldtemplate': true,
    'inputfield': true,
    'onInsert': function(evt, node) {
      if (!$.fn.tagsinput)
        throw new Error('tagsinput is not found');
      var $input = $(node.el).find('select');
      $input.tagsinput(node.formElement ? (node.formElement.tagsinput || {}) : {});
      if (node.value) {
        node.value.forEach(function(value) {
          $input.tagsinput('add', value);
        });
      }
    }
  },
  'imageselect': {
    'template': '<div>' +
      '<input type="hidden" name="<%= node.name %>" id="<%= node.id %>" value="<%= value %>" />' +
      '<div class="dropdown">' +
      '<a class="<%= node.value ? buttonClass : cls.buttonClass %>" data-toggle="dropdown" href="#"<% if (node.value) { %> style="max-width:<%= width %>px;max-height:<%= height %>px"<% } %>>' +
        '<% if (node.value) { %><img src="<% if (!node.value.match(/^https?:/)) { %><%= prefix %><% } %><%= node.value %><%= suffix %>" alt="" /><% } else { %><%= buttonTitle %><% } %>' +
      '</a>' +
      '<div class="dropdown-menu navbar" id="<%= node.id %>_dropdown">' +
        '<div>' +
        '<% _.each(node.options, function(key, idx) { if ((idx > 0) && ((idx % columns) === 0)) { %></div><div><% } %><a class="<%= buttonClass %>" style="max-width:<%= width %>px;max-height:<%= height %>px"><% if (key instanceof Object) { %><img src="<% if (!key.value.match(/^https?:/)) { %><%= prefix %><% } %><%= key.value %><%= suffix %>" alt="<%= key.title %>" /></a><% } else { %><img src="<% if (!key.match(/^https?:/)) { %><%= prefix %><% } %><%= key %><%= suffix %>" alt="" /><% } %></a> <% }); %>' +
        '</div>' +
        '<div class="pagination-right"><a class="<%= cls.buttonClass %>">Reset</a></div>' +
      '</div>' +
      '</div>' +
      '</div>',
    'fieldtemplate': true,
    'inputfield': true,
    'onBeforeRender': function (data, node) {
      var elt = node.formElement || {};
      var nbRows = null;
      var maxColumns = elt.imageSelectorColumns || 5;
      data.buttonTitle = elt.imageSelectorTitle || 'Select...';
      data.prefix = elt.imagePrefix || '';
      data.suffix = elt.imageSuffix || '';
      data.width = elt.imageWidth || 32;
      data.height = elt.imageHeight || 32;
      data.buttonClass = elt.imageButtonClass || data.cls.buttonClass;
      if (node.options.length > maxColumns) {
        nbRows = Math.ceil(node.options.length / maxColumns);
        data.columns = Math.ceil(node.options.length / nbRows);
      }
      else {
        data.columns = maxColumns;
      }
    },
    'getElement': function (el) {
      return $(el).parent().get(0);
    },
    'onInsert': function (evt, node) {
      $(node.el).on('click', '.dropdown-menu a', function (evt) {
        evt.preventDefault();
        evt.stopPropagation();
        var img = (evt.target.nodeName.toLowerCase() === 'img') ?
          $(evt.target) :
          $(evt.target).find('img');
        var value = img.attr('src');
        var elt = node.formElement || {};
        var prefix = elt.imagePrefix || '';
        var suffix = elt.imageSuffix || '';
        var width = elt.imageWidth || 32;
        var height = elt.imageHeight || 32;
        if (value) {
          if (value.indexOf(prefix) === 0) {
            value = value.substring(prefix.length);
          }
          value = value.substring(0, value.length - suffix.length);
          $(node.el).find('input').attr('value', value);
          $(node.el).find('a[data-toggle="dropdown"]')
            .addClass(elt.imageButtonClass)
            .attr('style', 'max-width:' + width + 'px;max-height:' + height + 'px')
            .html('<img src="' + (!value.match(/^https?:/) ? prefix : '') + value + suffix + '" alt="" />');
        }
        else {
          $(node.el).find('input').attr('value', '');
          $(node.el).find('a[data-toggle="dropdown"]')
            .removeClass(elt.imageButtonClass)
            .removeAttr('style')
            .html(elt.imageSelectorTitle || 'Select...');
        }
      });
    }
  },
  'iconselect': {
    'template': '<div>' +
      '<input type="hidden" name="<%= node.name %>" id="<%= node.id %>" value="<%= value %>" />' +
      '<div class="dropdown">' +
      '<a class="<%= node.value ? buttonClass : cls.buttonClass %>" data-toggle="dropdown" href="#"<% if (node.value) { %> style="max-width:<%= width %>px;max-height:<%= height %>px"<% } %>>' +
        '<% if (node.value) { %><i class="<%= cls.iconClassPrefix %>-<%= node.value %>" /><% } else { %><%= buttonTitle %><% } %>' +
      '</a>' +
      '<div class="dropdown-menu navbar" id="<%= node.id %>_dropdown">' +
        '<div>' +
        '<% _.each(node.options, function(key, idx) { if ((idx > 0) && ((idx % columns) === 0)) { %></div><div><% } %><a class="<%= buttonClass %>" ><% if (key instanceof Object) { %><i class="<%= cls.iconClassPrefix %>-<%= key.value %>" alt="<%= key.title %>" /></a><% } else { %><i class="<%= cls.iconClassPrefix %>-<%= key %>" alt="" /><% } %></a> <% }); %>' +
        '</div>' +
        '<div class="pagination-right"><a class="<%= cls.buttonClass %>">Reset</a></div>' +
      '</div>' +
      '</div>' +
      '</div>',
    'fieldtemplate': true,
    'inputfield': true,
    'onBeforeRender': function (data, node) {
      var elt = node.formElement || {};
      var nbRows = null;
      var maxColumns = elt.imageSelectorColumns || 5;
      data.buttonTitle = elt.imageSelectorTitle || 'Select...';
      data.buttonClass = elt.imageButtonClass || data.cls.buttonClass;
      if (node.options.length > maxColumns) {
        nbRows = Math.ceil(node.options.length / maxColumns);
        data.columns = Math.ceil(node.options.length / nbRows);
      }
      else {
        data.columns = maxColumns;
      }
    },
    'getElement': function (el) {
      return $(el).parent().get(0);
    },
    'onInsert': function (evt, node) {
      $(node.el).on('click', '.dropdown-menu a', function (evt) {
        evt.preventDefault();
        evt.stopPropagation();
        var i = (evt.target.nodeName.toLowerCase() === 'i') ?
          $(evt.target) :
          $(evt.target).find('i');
        var value = i.attr('class');
        var elt = node.formElement || {};
        if (value) {
          value = value;
          $(node.el).find('input').attr('value', value);
          $(node.el).find('a[data-toggle="dropdown"]')
            .addClass(elt.imageButtonClass)
            .html('<i class="'+ value +'" alt="" />');
        }
        else {
          $(node.el).find('input').attr('value', '');
          $(node.el).find('a[data-toggle="dropdown"]')
            .removeClass(elt.imageButtonClass)
            .html(elt.imageSelectorTitle || 'Select...');
        }
      });
    }
  },
  'radios':{
    'template': '<div id="<%= node.id %>"><% _.each(node.options, function(key, val) { %>' +
      '<% if (!elt.inline) { %><div class="radio"><label><% } else { %>' +
      '<label class="radio<%= cls.inlineClassSuffix %>"><% } %>' +
      '<input type="radio" <% if (((key instanceof Object) && (value === key.value)) || (value === key)) { %> checked="checked" <% } %> name="<%= node.name %>" value="<%= (key instanceof Object ? key.value : key) %>"' +
      '<%= (node.disabled? " disabled" : "")%>' +
      '<%= (node.required ? " required=\'required\'" : "") %>' +
      '/><span><%= (key instanceof Object ? key.title : key) %></span></label><%= elt.inline ? "" : "</div>" %> <% }); %></div>',
    'fieldtemplate': true,
    'inputfield': true,
    'onInsert': function (evt, node) {
      if (node.formElement.toggleNextMap) {
        var valueMapToNext = {};
        for (var value in node.formElement.toggleNextMap) {
          var toggleNext = node.formElement.toggleNextMap[value];
          var nextN = toggleNext === true ? 1 : toggleNext;
          var toggleNextClass = 'jsonform-toggle-next jsonform-toggle-next-' + nextN;
          var $next = nextN === 1 ? $(node.el).next() : (nextN === 'all' ? $(node.el).nextAll() : $(node.el).nextAll().slice(0, nextN));
          $next.addClass('jsonform-toggle-next-target');
          valueMapToNext[value] = $next;
        }
        $(node.el).addClass(toggleNextClass).find(':radio').on('change', function() {
          var $this = $(this);
          var val = $this.val();
          var checked = $this.is(':checked');
          if (checked) {
            for (var v in valueMapToNext) {
              var $n = valueMapToNext[v];
              if (v === val)
                $n.toggle(checked).toggleClass('jsonform-toggled-visible', checked);
              else
                $n.toggle(!checked).toggleClass('jsonform-toggled-visible', !checked);
            }
          }
          else {
            // no option checked yet
            for (var v in valueMapToNext) {
              var $n = valueMapToNext[v];
              $n.toggle(false).toggleClass('jsonform-toggled-visible', false);
            }
          }
        }).change();
      }
    }
  },
  'radiobuttons': {
    'template': '<div id="<%= node.id %>" '+' class="<%= elt.htmlClass ? " " + elt.htmlClass : "" %>">' +
      '<% _.each(node.options, function(key, val) { %>' +
        '<label class="<%= cls.buttonClass %>">' +
        '<input type="radio" style="position:absolute;left:-9999px;" ' +
        '<% if (((key instanceof Object) && (value === key.value)) || (value === key)) { %> checked="checked" <% } %> name="<%= node.name %>" value="<%= (key instanceof Object ? key.value : key) %>" />' +
        '<span><%= (key instanceof Object ? key.title : key) %></span></label> ' +
        '<% }); %>' +
      '</div>',
    'fieldtemplate': true,
    'inputfield': true,
    'onInsert': function (evt, node) {
      var activeClass = 'active';
      var elt = node.formElement || {};
      if (elt.activeClass) {
        activeClass += ' ' + elt.activeClass;
      }
      $(node.el).find('label').on('click', function () {
        $(this).parent().find('label').removeClass(activeClass);
        $(this).addClass(activeClass);
      }).find(':checked').closest('label').addClass(activeClass);
    }
  },
  'checkboxes':{
    'template': '<div id="<%= node.id %>"><%= choiceshtml %><%= children %></div>',
    'fieldtemplate': true,
    'inputfield': true,
    'childTemplate': function(inner, node) {
      // non-inline style, we do not wrap it.
      if (!node.formElement.otherField)
        return inner;
      var template = '';
      if (node.formElement.otherField.asArrayValue) {
        // XXX: for the novalue mode, the checkbox has no value, value is in the input field
        if (node.otherValues) {
          template += '<% value = node.parentNode.otherValues.join(", ") %>';
        }
      }
      template += '<input type="checkbox"<%= value !== undefined && value !== null && value !== "" ? " checked=\'checked\'" : "" %>';
      if (!node.formElement.otherField.asArrayValue && node.formElement.otherField.novalue !== true || node.formElement.otherField.novalue === false) {
        template += ' name="' + node.key + '[' + (node.formElement.otherField.idx !== undefined ? node.formElement.otherField.idx : node.formElement.options.length) + ']" value="' + (node.formElement.optionsAsEnumOrder ? 1 : (node.formElement.otherField.otherValue || 'OTHER')) + '"';
      }
      template += '<%= node.disabled? " disabled" : "" %> />';
      template += '<span><%= node.title || "Other" %> </span>';
      var otherFieldClass = 'other-field';
      if (node.formElement.otherField.inline) {
        // put the other field just after the checkbox, wrapped in the label tag
        template += '<div class="other-field-content">'+ inner + '</div>';
        otherFieldClass = 'inline-' + otherFieldClass;
      }
      if (node.formElement.inline) {
        template = '<label class="'+otherFieldClass+' checkbox<%= cls.inlineClassSuffix %>">' + template + '</label>';
      }
      else {
        template = '<div class="'+otherFieldClass+' checkbox"><label>' + template + '</label></div>';
      }
      if (!node.formElement.otherField.inline) {
        // put the other field just after the checkbox's label/div
        template += '<div class="other-field-content">'+ inner + '</div>';
      }
      return template;
    },
    'onBeforeRender': function (data, node) {
      // Build up choices from the enumeration/options list
      if (!node || !node.schemaElement || !node.schemaElement.items) return;
      var choices = node.formElement.options;
      if (!choices) return;

      var template = '<input type="checkbox"<%= checked ? " checked=\'checked\'" : "" %> name="<%= name %>" value="<%= escape(value) %>"<%= node.disabled? " disabled" : "" %> /><span><%= title %></span>';
      if (node.formElement.inline) {
        template = '<label class="checkbox' + data.cls.inlineClassSuffix + '">' + template + '</label>';
      }
      else {
        template = '<div class="checkbox"><label>' + template + '</label></div>';
      }

      var choiceshtml = '';
      if (node.formElement.otherField && node.formElement.otherField.asArrayValue && node.value) {
        var choiceValues = choices.map(function(choice) { return choice.value; });
        // we detect values which are not within our choice values.
        var otherValues = [];
        node.value.forEach(function(val) {
          if (!_.include(choiceValues, val)) {
            otherValues.push(val);
          }
        });
        if (otherValues.length > 0)
          node.otherValues = otherValues;
      }
      else
        delete node.otherValues;
      _.each(choices, function (choice, idx) {
        if (node.formElement.otherField && choice.value === (node.formElement.otherField.otherValue || 'OTHER')) {
          node.formElement.otherField.idx = idx;
          return;
        }

        choiceshtml += _template(template, {
          name: node.key + '[' + idx + ']',
          value: node.formElement.optionsAsEnumOrder ? 1 : choice.value,
          checked: _.include(node.value, choice.value),
          title: choice.title,
          node: node,
          escape: escapeHTML
        }, fieldTemplateSettings);
      });

      // the otherField could be?
      // 1. key, then use the key as inputField? wrap or not? type?
      // 2. {key: theKey, inline: boolean} type?
      // 2.1 about the type, can it be text type? if so, it will use the title, the template
      //     etc. it's good, but we do not want the title, then use notitle?
      // 3. {nokey, items: [custom elementes]} type?
      if (node.formElement.otherField) {
        // XXX: other field rendered as child, with its own template? e.g. text input
        // Then what about the "Other" checkbox? there are options:
        // 1. "Other" checkbox was rendered already by the options, then the otherField
        //    will following last checkbox div or label (inline), and we need code to
        //    connect between the checkbox and the input.
        // 2. "Other" checkbox render with the textField together? embed the text field
        //    into the "Other" checkbox's label, but HOW?
        // 2.1 with childTemplate, the child text input field can be wrappered, but what
        //     should be for the checkbox's name, value, disabled, title, checked?
        // 2.1.1 title, checked, disabled == text field title, non-blank, disabled
        //       value can be non-value or some special value
        // 2.2 should the value be collected? and how?
        //     it's better it can be collected as a member of the array, maybe special value
        //     how the checkbox array got result value?
        // 2.2.1 if as_value collect, as it follow the name style here node.key[idx]
        //       its value can be collected.
        //       if as_value===true get value from enum then if it's previous rendered
        //       as the last item of enum, then it can get its value too.
      }

      data.choiceshtml = choiceshtml;
    },
    'onInsert': function (evt, node) {
      // FIXME: consider default values?
      function inputHasAnyValue(inputs) {
        var anyValue = false;
        inputs.each(function() {
          var $input = $(this);
          if ($input.is(':checkbox, :radio')) {
            if ($input.prop('checked')) {
              anyValue = true;
              return false;
            }
          }
          if ($input.is('button'))
            return;
          if ($(this).val() !== '') {
            anyValue = true;
            return false;
          }
        });
        return anyValue;
      }
      var $checkbox = node.formElement.otherField && node.formElement.otherField.inline ? $(node.el).find('.inline-other-field :checkbox').first() : $(node.el).find('.other-field :checkbox');
      var $inputs = $(node.el).find('.other-field-content :input');

      function otherFieldValueChange() {
        $checkbox.prop('checked', inputHasAnyValue($inputs));
      }
      $inputs.on('keyup', otherFieldValueChange).on('change', otherFieldValueChange).change();

      $checkbox.on('change', function() {
        if (this.checked) {
          this.checked = false;
          $inputs.not(':checkbox,:radio,button').focus();
        } else {
          // FIXME: reset back to default?
          $inputs.filter('input[type=text], textarea').val('');
        }
      });
    }
  },
  'checkboxbuttons': {
    'template': '<div id="<%= node.id %>"><%= choiceshtml %></div>',
    'fieldtemplate': true,
    'inputfield': true,
    'onBeforeRender': function (data, node) {
      // Build up choices from the enumeration list
      var choices = null;
      var choiceshtml = null;
      var template = '<label class="<%= cls.buttonClass %> ' + data.fieldHtmlClass + '">' +
        '<input type="checkbox" style="position:absolute;left:-9999px;" <% if (checked) { %> checked="checked" <% } %> name="<%= name %>" value="<%= value %>"' +
        '<%= (node.disabled? " disabled" : "")%>' +
        '/><span><%= title %></span></label>';
      if (!node || !node.schemaElement || !node.schemaElement.items) return;
      choices = node.formElement.options;
      if (!choices) return;
      if (!node.value || !Array.isArray(node.value))
        node.value = [];
      choiceshtml = '';
      _.each(choices, function (choice, idx) {
        choiceshtml += _template(template, {
          name: node.key + '[' + idx + ']',
          checked: _.include(node.value, choice.value),
          value: choice.value,
          title: choice.title,
          node: node,
          cls: data.cls
        }, fieldTemplateSettings);
      });

      data.choiceshtml = choiceshtml;
    },
    'onInsert': function (evt, node) {
      var activeClass = 'active';
      var elt = node.formElement || {};
      if (elt.activeClass) {
        activeClass += ' ' + elt.activeClass;
      }
      $(node.el).find('label').on('click', function () {
        $(this).toggleClass(activeClass, $(this).find('input:checkbox').prop('checked'));
      }).find(':checked').closest('label').addClass(activeClass);
    }
  },
  'array': {
    'template': '<div id="<%= id %>"><ul class="_jsonform-array-ul" style="list-style-type:none;"><%= children %></ul>' +
      '<% if (!node.isReadOnly()) { %><span class="_jsonform-array-buttons">' +
        '<a href="#" class="<%= cls.buttonClass %> _jsonform-array-addmore"><i class="<%= cls.iconClassPrefix %>-plus-sign" title="Add new"></i></a> ' +
        '<a href="#" class="<%= cls.buttonClass %> _jsonform-array-deletelast"><i class="<%= cls.iconClassPrefix %>-minus-sign" title="Delete last"></i></a>' +
      '</span><% } %>' +
      '</div>',
    'fieldtemplate': true,
    'array': true,
    'childTemplate': function (inner, node) {
      if (!node.isReadOnly() && $('').sortable) {
        // Insert a "draggable" icon
        // floating to the left of the main element
        return '<li data-idx="<%= node.childPos %>">' +
          '<span class="draggable line"><i class="<%= cls.iconClassPrefix %>-list" title="Move item"></i></span>' +
          ' <a href="#" class="_jsonform-array-item-delete"><i class="<%= cls.iconClassPrefix %>-remove" title="Remove item"></i></a>' +
          inner +
          '</li>';
      }
      else {
        return '<li data-idx="<%= node.childPos %>">' +
          inner +
          '</li>';
      }
    },
    'onInsert': function (evt, node) {
      var $nodeid = $(node.el).find('#' + escapeSelector(node.id));
      var boundaries = node.getArrayBoundaries();

      // Switch two nodes in an array
      var moveNodeTo = function (fromIdx, toIdx) {
        // Note "switchValuesWith" extracts values from the DOM since field
        // values are not synchronized with the tree data structure, so calls
        // to render are needed at each step to force values down to the DOM
        // before next move.
        // TODO: synchronize field values and data structure completely and
        // call render only once to improve efficiency.
        if (fromIdx === toIdx) return;
        var incr = (fromIdx < toIdx) ? 1: -1;
        var i = 0;
        var parentEl = $('> ul', $nodeid);
        for (i = fromIdx; i !== toIdx; i += incr) {
          node.children[i].switchValuesWith(node.children[i + incr]);
          node.children[i].render(parentEl.get(0));
          node.children[i + incr].render(parentEl.get(0));
        }

        // No simple way to prevent DOM reordering with jQuery UI Sortable,
        // so we're going to need to move sorted DOM elements back to their
        // origin position in the DOM ourselves (we switched values but not
        // DOM elements)
        var fromEl = $(node.children[fromIdx].el);
        var toEl = $(node.children[toIdx].el);
        fromEl.detach();
        toEl.detach();
        if (fromIdx < toIdx) {
          if (fromIdx === 0) parentEl.prepend(fromEl);
          else $(node.children[fromIdx-1].el).after(fromEl);
          $(node.children[toIdx-1].el).after(toEl);
        }
        else {
          if (toIdx === 0) parentEl.prepend(toEl);
          else $(node.children[toIdx-1].el).after(toEl);
          $(node.children[fromIdx-1].el).after(fromEl);
        }
      };

      var addItem = function (idx) {
        if (boundaries.maxItems >= 0) {
          var slotNum = boundaries.maxItems - node.children.length;
          $nodeid.find('> span > a._jsonform-array-addmore')
            .toggleClass('disabled', slotNum <= 1);
          if (slotNum < 1) {
            return false;
          }
        }

        node.insertArrayItem(idx, $('> ul', $nodeid).get(0));

        var canDelete = node.children.length > boundaries.minItems;
        $nodeid.find('> span > a._jsonform-array-deletelast')
          .toggleClass('disabled', !canDelete);
        $nodeid.find('> ul > li > a._jsonform-array-item-delete').toggle(canDelete);
      }

      var deleteItem = function (idx) {
        var itemNumCanDelete = node.children.length - Math.max(boundaries.minItems, 0);
        $nodeid.find('> span > a._jsonform-array-deletelast')
          .toggleClass('disabled', itemNumCanDelete <= 1);
        $nodeid.find('> ul > li > a._jsonform-array-item-delete').toggle(itemNumCanDelete > 1);
        if (itemNumCanDelete < 1) {
          return false;
        }

        node.deleteArrayItem(idx);

        $nodeid.find('> span > a._jsonform-array-addmore')
          .toggleClass('disabled', boundaries.maxItems >= 0 && node.children.length >= boundaries.maxItems);
      }

      $('> span > a._jsonform-array-addmore', $nodeid).click(function (evt) {
        evt.preventDefault();
        evt.stopPropagation();
        var idx = node.children.length;
        addItem(idx);
      });

      //Simulate Users click to setup the form with its minItems
      var curItems = $('> ul > li', $nodeid).length;
      if (boundaries.minItems > 0) {
        for (var i = node.children.length; i < boundaries.minItems; i++) {
          //$('> span > a._jsonform-array-addmore', $nodeid).click();
          node.insertArrayItem(node.children.length, $nodeid.find('> ul').get(0));
        }
      }
      var itemNumCanDelete = node.children.length - Math.max(boundaries.minItems, 0);
      $nodeid.find('> span > a._jsonform-array-deletelast')
        .toggleClass('disabled', itemNumCanDelete <= 0);
      $nodeid.find('> ul > li > a._jsonform-array-item-delete').toggle(itemNumCanDelete > 0);
      $nodeid.find('> span > a._jsonform-array-addmore')
        .toggleClass('disabled', boundaries.maxItems >= 0 && node.children.length >= boundaries.maxItems);

      $('> span > a._jsonform-array-deletelast', $nodeid).click(function (evt) {
        var idx = node.children.length - 1;
        evt.preventDefault();
        evt.stopPropagation();
        deleteItem(idx);
      });

      $nodeid.on('click', '> ul > li > a._jsonform-array-item-delete', function (e) {
        e.preventDefault();
        var $li = $(e.currentTarget).parent();
        if ($li.parent().parent().attr('id') != node.id) return;
        e.stopPropagation();
        var idx = $li.data('idx');
        deleteItem(idx);
      });

      if (!node.isReadOnly() && $(node.el).sortable) {
        $('> ul', $nodeid).sortable();
        $('> ul', $nodeid).bind('sortstop', function (event, ui) {
          var idx = $(ui.item).data('idx');
          var newIdx = $(ui.item).index();
          moveNodeTo(idx, newIdx);
        });
      }
    }
  },
  'tabarray': {
    'template': '<div id="<%= id %>"><div class="tabbable tabs-left">' +
      '<ul class="nav nav-tabs">' +
        '<%= tabs %>' +
      '</ul>' +
      '<div class="tab-content">' +
        '<%= children %>' +
      '</div>' +
      '</div>' +
      '</div>',
    'fieldtemplate': true,
    'array': true,
    'childTemplate': function (inner) {
      return '<div data-idx="<%= node.childPos %>" class="tab-pane">' +
        inner +
        '</div>';
    },
    'onBeforeRender': function (data, node) {
      // Generate the initial 'tabs' from the children
      /*var tabs = '';
      _.each(node.children, function (child, idx) {
        var title = child.legend ||
          child.title ||
          ('Item ' + (idx+1));
        tabs += '<li data-idx="' + idx + '"' +
          ((idx === 0) ? ' class="active"' : '') +
          '><a class="draggable tab" data-toggle="tab">' + escapeHTML(title);
        if (!node.isReadOnly()) {
          tabs += ' <span href="#" class="_jsonform-array-item-delete"><i class="' +
          node.ownerTree.defaultClasses.iconClassPrefix + '-remove" title="Remove item"></i></span>' +
          '</a>';
        }
        tabs +=  '</li>';
      });
      var boundaries = node.getArrayBoundaries();
      if (!node.isReadOnly() && (boundaries.maxItems < 0 || node.children.length < boundaries.maxItems)) {
        tabs += '<li data-idx="-1" class="_jsonform-array-addmore"><a class="tab _jsonform-array-addmore" title="'+(node.formElement.addMoreTooltip ? escapeHTML(node.formElement.addMoreTooltip) : 'Add new item')+'"><i class="' +
        node.ownerTree.defaultClasses.iconClassPrefix + '-plus-sign"></i> '+(node.formElement.addMoreTitle || 'New')+'</a></li>';
      }
      data.tabs = tabs;*/
      data.tabs = '';
    },
    'onInsert': function (evt, node) {
      var $nodeid = $(node.el).find('#' + escapeSelector(node.id));
      var boundaries = node.getArrayBoundaries();

      var moveNodeTo = function (fromIdx, toIdx) {
        // Note "switchValuesWith" extracts values from the DOM since field
        // values are not synchronized with the tree data structure, so calls
        // to render are needed at each step to force values down to the DOM
        // before next move.
        // TODO: synchronize field values and data structure completely and
        // call render only once to improve efficiency.
        if (fromIdx === toIdx) return;
        var incr = (fromIdx < toIdx) ? 1: -1;
        var i = 0;
        var tabEl = $('> .tabbable > .tab-content', $nodeid).get(0);
        for (i = fromIdx; i !== toIdx; i += incr) {
          node.children[i].switchValuesWith(node.children[i + incr]);
          node.children[i].render(tabEl);
          node.children[i + incr].render(tabEl);
        }
      };


      // Refreshes the list of tabs
      var updateTabs = function (selIdx) {
        var tabs = '';
        var activateFirstTab = false;
        if (selIdx === undefined) {
          selIdx = $('> .tabbable > .nav-tabs .active', $nodeid).data('idx');
          if (selIdx) {
            selIdx = parseInt(selIdx, 10);
          }
          else {
            activateFirstTab = true;
            selIdx = 0;
          }
        }
        if (selIdx >= node.children.length) {
          selIdx = node.children.length - 1;
        }
        _.each(node.children, function (child, idx) {
          var title = child.legend ||
            child.title ||
            ('Item ' + (idx+1));
          tabs += '<li data-idx="' + idx + '">' +
            '<a class="draggable tab" data-toggle="tab">' + escapeHTML(title);
          if (!node.isReadOnly()) {
            tabs += ' <span href="#" class="_jsonform-array-item-delete"><i class="' +
              node.ownerTree.defaultClasses.iconClassPrefix + '-remove" title="Remove item"></i></span>' +
              '</a>';
          }
          tabs += '</li>';
        });
        if (!node.isReadOnly() && (boundaries.maxItems < 0 || node.children.length < boundaries.maxItems)) {
          tabs += '<li data-idx="-1"><a class="tab _jsonform-array-addmore" title="'+(node.formElement.addMoreTooltip ? escapeHTML(node.formElement.addMoreTooltip) : 'Add new item')+'"><i class="' +
            node.ownerTree.defaultClasses.iconClassPrefix + '-plus-sign"></i> '+(node.formElement.addMoreTitle || 'New')+'</a></li>';
        }
        $('> .tabbable > .nav-tabs', $nodeid).html(tabs);
        var canDelete = boundaries.minItems >= 0 && node.children.length <= boundaries.minItems;
        $nodeid.find('> .tabbable > .nav-tabs > li > a > ._jsonform-array-item-delete').toggle(!canDelete);
        if (activateFirstTab) {
          $('> .tabbable > .nav-tabs [data-idx="0"]', $nodeid).addClass('active');
        }
        $('> .tabbable > .nav-tabs [data-toggle="tab"]', $nodeid).eq(selIdx).click();
      };

      var deleteItem = function (idx) {
        var itemNumCanDelete = node.children.length - Math.max(boundaries.minItems, 0);
        $nodeid.find('> a._jsonform-array-deleteitem')
          .toggleClass('disabled', itemNumCanDelete <= 1);
        $nodeid.find('> .tabbable > .nav-tabs > li > a > ._jsonform-array-item-delete').toggle(itemNumCanDelete > 1);
        if (itemNumCanDelete < 1) {
          return false;
        }

        node.deleteArrayItem(idx);
        updateTabs();

        $nodeid.find('> a._jsonform-array-addmore')
          .toggleClass('disabled', boundaries.maxItems >= 0 && node.children.length >= boundaries.maxItems);
      }
      var addItem = function (idx) {
        if (boundaries.maxItems >= 0) {
          var slotNum = boundaries.maxItems - node.children.length;
          $nodeid.find('> a._jsonform-array-addmore')
            .toggleClass('disabled', slotNum <= 1);
          if (slotNum < 1) {
            return false;
          }
        }

        node.insertArrayItem(idx,
          $nodeid.find('> .tabbable > .tab-content').get(0));
        updateTabs(idx);

        $nodeid.find('> a._jsonform-array-deleteitem')
          .toggleClass('disabled', node.children.length <= boundaries.minItems);
      }

      $('> a._jsonform-array-deleteitem', $nodeid).click(function (evt) {
        var idx = $('> .tabbable > .nav-tabs .active', $nodeid).data('idx');
        evt.preventDefault();
        evt.stopPropagation();
        deleteItem(idx);
      });

      //$('> a._jsonform-array-addmore, > .tabbable > .nav-tabs > li > ._jsonform-array-addmore', $nodeid).click(function (evt) {
      $nodeid.on('click', '> a._jsonform-array-addmore, > .tabbable > .nav-tabs > li > ._jsonform-array-addmore', function (evt) {
        var idx = node.children.length;
        evt.preventDefault();
        evt.stopPropagation();
        addItem(idx);
      });

      $nodeid.on('click', '> .tabbable > .nav-tabs > li > a > ._jsonform-array-item-delete', function (e) {
        e.preventDefault();
        e.stopPropagation();
        var idx = $(e.currentTarget).closest('li').data('idx');
        deleteItem(idx);
      });

      $(node.el).on('legendUpdated', function (evt) {
        updateTabs();
        evt.preventDefault();
        evt.stopPropagation();
      });

      if (!node.isReadOnly() && $(node.el).sortable) {
        $('> .tabbable > .nav-tabs', $nodeid).sortable({
          containment: node.el,
          cancel: '._jsonform-array-addmore',
          tolerance: 'pointer'
        }).on('sortchange', function (event, ui) {
          if (ui.placeholder.index() == $(this).children().length-1 && ui.placeholder.prev().data('idx') == -1) {
            ui.placeholder.prev().before(ui.placeholder);
          }
        }).on('sortstop', function (event, ui) {
          var idx = $(ui.item).data('idx');
          var newIdx = $(ui.item).index();
          moveNodeTo(idx, newIdx);
          updateTabs(newIdx);
        });
      }

      // Simulate User's click to setup the form with its minItems
      if (boundaries.minItems >= 0) {
        for (var i = node.children.length; i < boundaries.minItems; i++) {
          addItem(node.children.length);
        }
        updateTabs(0);
      }
      else
        updateTabs();

      $nodeid.find('> a._jsonform-array-addmore')
        .toggleClass('disabled', boundaries.maxItems >= 0 && node.children.length >= boundaries.maxItems);
      var canDelete = boundaries.minItems >= 0 && node.children.length <= boundaries.minItems;
      $nodeid.find('> a._jsonform-array-deleteitem')
        .toggleClass('disabled', canDelete);
      $nodeid.find('> .tabbable > .nav-tabs > li > a > ._jsonform-array-item-delete').toggle(!canDelete);
    }
  },
  'help':{
    'template':'<span <%= id ? \'id="\' + id + \'"\' : "" %> class="help-block" style="padding-top:5px"><%= node.helpvalue || elt.helpvalue %></span>',
    'fieldtemplate': true
  },
  'msg': {
    'template': '<%= elt.msg %>'
  },
  'html': {
    'template': '<%= elt.html %>'
  },
  'textview': {
    'template': '<pre id="<%= id %>" name="<%= node.name %>"><%= value %></pre>',
    'inputfield': true,
    'fieldtemplate': true
  },
  'fieldset':{
    'template': '<fieldset class="jsonform-node jsonform-error-<%= keydash %> <% if (elt.expandable) { %>expandable<% } %> <%= elt.htmlClass?elt.htmlClass:"" %>" ' +
      '<% if (id) { %> id="<%= id %>"<% } %>' +
      ' data-jsonform-type="fieldset">' +
      '<% if (node.title || node.legend) { %><legend><%= node.title || node.legend %></legend><% } %>' +
      '<% if (elt.expandable) { %><div hidden class="<%= cls.groupClass %>"><% } %>' +
      '<%= children %>' +
      '<% if (elt.expandable) { %></div><% } %>' +
      '<span class="help-block jsonform-errortext" style="display:none;"></span>' +
      '</fieldset>'
  },
  'advancedfieldset': {
    'template': '<fieldset' +
      '<% if (id) { %> id="<%= id %>"<% } %>' +
      ' class="expandable jsonform-node jsonform-error-<%= keydash %> <%= elt.htmlClass?elt.htmlClass:"" %>" data-jsonform-type="advancedfieldset">' +
      '<legend>Advanced options</legend>' +
      '<div hidden class="<%= cls.groupClass %>">' +
      '<%= children %>' +
      '</div>' +
      '<span class="help-block jsonform-errortext" style="display:none;"></span>' +
      '</fieldset>'
  },
  'authfieldset': {
    'template': '<fieldset' +
      '<% if (id) { %> id="<%= id %>"<% } %>' +
      ' class="expandable jsonform-node jsonform-error-<%= keydash %> <%= elt.htmlClass?elt.htmlClass:"" %>" data-jsonform-type="authfieldset">' +
      '<legend>Authentication settings</legend>' +
      '<div hidden class="<%= cls.groupClass %>">' +
      '<%= children %>' +
      '</div>' +
      '<span class="help-block jsonform-errortext" style="display:none;"></span>' +
      '</fieldset>'
  },
  'submit':{
    'template':'<input type="submit" <% if (id) { %> id="<%= id %>" <% } %> class="btn btn-primary <%= elt.htmlClass?elt.htmlClass:"" %>" value="<%= value || node.title %>"<%= (node.disabled? " disabled" : "")%>/>'
  },
  'button':{
    'template':' <button <% if (id) { %> id="<%= id %>" <% } %> class="<%= cls.buttonClass %> <%= elt.htmlClass?elt.htmlClass:"" %>"><%= node.title %></button> '
  },
  'actions':{
    'template':'<div class="form-actions <%= elt.htmlClass?elt.htmlClass:"" %>"><%= children %></div>'
  },
  'hidden':{
    'template':'<input type="hidden" id="<%= id %>" name="<%= node.name %>" value="<%= escape(value) %>" <%= (node.disabled? " disabled" : "")%> />',
    'inputfield': true
  },
  'selectfieldset': {
    'template': '<fieldset class="tab-container <%= elt.htmlClass?elt.htmlClass:"" %>">' +
      '<% if (node.legend) { %><legend><%= node.legend %></legend><% } %>' +
      '<% if (node.formElement.key) { %><input type="hidden" id="<%= node.id %>" name="<%= node.name %>" value="<%= escape(value) %>" /><% } else { %>' +
        '<a id="<%= node.id %>"></a><% } %>' +
      '<div class="tabbable">' +
        '<div class="<%= cls.groupClass %><%= node.formElement.hideMenu ? " hide" : "" %>">' +
          '<% if (node.title && !elt.notitle) { %><label class="<%= cls.labelClass %>" for="<%= node.id %>"><%= node.title %></label><% } %>' +
          '<div class="<%= cls.controlClass %>"><%= tabs %></div>' +
        '</div>' +
        '<div class="tab-content">' +
          '<%= children %>' +
        '</div>' +
      '</div>' +
      '</fieldset>',
    'inputfield': true,
    'getElement': function (el) {
      return $(el).parent().get(0);
    },
    'childTemplate': function (inner) {
      return '<div data-idx="<%= node.childPos %>" class="tab-pane' +
        '<% if (node.active) { %> active<% } %>">' +
        inner +
        '</div>';
    },
    'onBeforeRender': function (data, node) {
      // Before rendering, this function ensures that:
      // 1. direct children have IDs (used to show/hide the tabs contents)
      // 2. the tab to active is flagged accordingly. The active tab is
      // the first one, except if form values are available, in which case
      // it's the first tab for which there is some value available (or back
      // to the first one if there are none)
      // 3. the HTML of the select field used to select tabs is exposed in the
      // HTML template data as "tabs"

      var children = null;
      var choices = [];
      if (node.schemaElement) {
        choices = node.schemaElement['enum'] || [];
      }
      if (node.options) {
        children = _.map(node.options, function (option, idx) {
          var child = node.children[idx];
          if (option instanceof Object) {
            option = _.extend({ node: child }, option);
            option.title = option.title ||
              child.legend ||
              child.title ||
              ('Option ' + (child.childPos+1));
            option.value = isSet(option.value) ? option.value :
              isSet(choices[idx]) ? choices[idx] : idx;
            return option;
          }
          else {
            return {
              title: option,
              value: isSet(choices[child.childPos]) ?
                choices[child.childPos] :
                child.childPos,
              node: child
            };
          }
        });
      }
      else {
        children = _.map(node.children, function (child, idx) {
          return {
            title: child.legend || child.title || ('Option ' + (child.childPos+1)),
            value: choices[child.childPos] || child.childPos,
            node: child
          };
        });
      }

      var activeChild = null;
      if (data.value) {
        activeChild = _.find(children, function (child) {
          return (child.value === node.value);
        });
      }
      if (!activeChild) {
        activeChild = _.find(children, function (child) {
          return child.node.hasNonDefaultValue();
        });
      }
      if (!activeChild) {
        activeChild = children[0];
      }
      activeChild.node.active = true;
      data.value = activeChild.value;

      var elt = node.formElement;
      var tabs = '<select class="nav '+(data.cls.textualInputClass)+'"' +
        (node.disabled ? ' disabled' : '') +
        '>';
      _.each(children, function (child, idx) {
        tabs += '<option data-idx="' + idx + '" value="' + child.value + '"' +
          (child.node.active ? ' class="active"' : '') +
          '>' +
          escapeHTML(child.title) +
          '</option>';
      });
      tabs += '</select>';

      data.tabs = tabs;
      return data;
    },
    'onInsert': function (evt, node) {
      $(node.el).find('select.nav').first().on('change', function (evt) {
        var $option = $(this).find('option:selected');
        $(node.el).find('input[type="hidden"]').first().val($option.attr('value'));
      });
    }
  },
  'optionfieldset': {
    'template': '<div' +
      '<% if (node.id) { %> id="<%= node.id %>"<% } %>' +
      '>' +
      '<%= children %>' +
      '</div>'
  },
  'section': {
    'template': '<div' +
      '<% if (node.id) { %> id="<%= node.id %>"<% } %> class="jsonform-node jsonform-error-<%= keydash %> <%= elt.htmlClass?elt.htmlClass:"" %>"' +
      '><%= children %></div>'
  },

  /**
   * A "questions" field renders a series of question fields and binds the
   * result to the value of a schema key.
   */
  'questions': {
    'template': '<div>' +
      '<input type="hidden" id="<%= node.id %>" name="<%= node.name %>" value="<%= escape(value) %>" />' +
      '<%= children %>' +
      '</div>',
    'fieldtemplate': true,
    'inputfield': true,
    'getElement': function (el) {
      return $(el).parent().get(0);
    },
    'onInsert': function (evt, node) {
      if (!node.children || (node.children.length === 0)) return;
      _.each(node.children, function (child) {
        $(child.el).hide();
      });
      $(node.children[0].el).show();
    }
  },

  /**
   * A "question" field lets user choose a response among possible choices.
   * The field is not associated with any schema key. A question should be
   * part of a "questions" field that binds a series of questions to a
   * schema key.
   */
  'question': {
    'template': '<div id="<%= node.id %>"><% _.each(node.options, function(key, val) { %>' +
      '<% if (elt.optionsType === "radiobuttons") { %><label class="<%= cls.buttonClass%> <%= ((key instanceof Object && key.htmlClass) ? " " + key.htmlClass : "") %>"><% } else { %>' +
      '<% if (!elt.inline) { %><div class="radio"><% } %>' +
      '<label class="<%= elt.inline ? "radio"+cls.inlineClassSuffix : "" %> <%= ((key instanceof Object && key.htmlClass) ? " " + key.htmlClass : "") %>">' +
      '<% } %><input type="radio" <% if (elt.optionsType === "radiobuttons") { %> style="position:absolute;left:-9999px;" <% } %>name="<%= node.id %>" value="<%= val %>"<%= (node.disabled? " disabled" : "")%>/><span><%= (key instanceof Object ? key.title : key) %></span></label><%= elt.optionsType !== "radiobuttons" && !elt.inline ? "</div>" : "" %> <% }); %></div>',
    'fieldtemplate': true,
    'onInsert': function (evt, node) {
      var activeClass = 'active';
      var elt = node.formElement || {};
      if (elt.activeClass) {
        activeClass += ' ' + elt.activeClass;
      }

      // Bind to change events on radio buttons
      $(node.el).find('input[type="radio"]').on('change', function (evt) {
        var questionNode = null;
        var option = node.options[$(this).val()];
        if (!node.parentNode || !node.parentNode.el) return;

        $(node.el).find('label').removeClass(activeClass);
        $(this).parent().addClass(activeClass);
        $(node.el).nextAll().hide();
        $(node.el).nextAll().find('input[type="radio"]').prop('checked', false);

        // Execute possible actions (set key value, form submission, open link,
        // move on to next question)
        if (option.value) {
          // Set the key of the 'Questions' parent
          $(node.parentNode.el).find('input[type="hidden"]').val(option.value);
        }
        if (option.next) {
          questionNode = _.find(node.parentNode.children, function (child) {
            return (child.formElement && (child.formElement.qid === option.next));
          });
          $(questionNode.el).show();
          $(questionNode.el).nextAll().hide();
          $(questionNode.el).nextAll().find('input[type="radio"]').prop('checked', false);
        }
        if (option.href) {
          if (option.target) {
            window.open(option.href, option.target);
          }
          else {
            window.location = option.href;
          }
        }
        if (option.submit) {
          setTimeout(function () {
            node.ownerTree.submit();
          }, 0);
        }
      });
    }
  }
};


//Allow to access subproperties by splitting "."
/**
 * Retrieves the key identified by a path selector in the structured object.
 *
 * Levels in the path are separated by a dot. Array items are marked
 * with [x]. For instance:
 *  foo.bar[3].baz
 *
 * @function
 * @param {Object} obj Structured object to parse
 * @param {String} key Path to the key to retrieve
 * @param {boolean} ignoreArrays True to use first element in an array when
 *   stucked on a property. This parameter is basically only useful when
 *   parsing a JSON schema for which the "items" property may either be an
 *   object or an array with one object (only one because JSON form does not
 *   support mix of items for arrays).
 * @return {Object} The key's value.
 */
jsonform.util.getObjKey = function (obj, key, ignoreArrays) {
  var innerobj = obj;
  var keyparts = key.split(".");
  var subkey = null;
  var arrayMatch = null;
  var prop = null;

  for (var i = 0; i < keyparts.length; i++) {
    if ((innerobj === null) || (typeof innerobj !== "object")) return null;
    subkey = keyparts[i];
    prop = subkey.replace(reArray, '');
    reArray.lastIndex = 0;
    arrayMatch = reArray.exec(subkey);
    if (arrayMatch) {
      innerobj = innerobj[prop];
      while (true) {
        if (!_.isArray(innerobj)) return null;
        innerobj = innerobj[parseInt(arrayMatch[1], 10)];
        arrayMatch = reArray.exec(subkey);
        if (!arrayMatch) break;
      }
    }
    else if (ignoreArrays &&
        !innerobj[prop] &&
        _.isArray(innerobj) &&
        innerobj[0]) {
      innerobj = innerobj[0][prop];
    }
    else {
      innerobj = innerobj[prop];
    }
  }

  if (ignoreArrays && _.isArray(innerobj) && innerobj[0]) {
    return innerobj[0];
  }
  else {
    return innerobj;
  }
};

//Allow to access subproperties by splitting "."
/**
 * Retrieves the key identified by a path selector in the structured object.
 *
 * Levels in the path are separated by a dot. Array items are marked
 * with [x]. For instance:
 *  foo.bar[3].baz
 *
 * @function
 * @param {Object} obj Structured object to parse, can be array too
 * @param {String} key Path to the key to retrieve
 * @return {Object} The key's value.
 */
jsonform.util.getObjKeyEx = function (obj, key, objKey) {
  var innerobj = obj;

  if (key === null || key === undefined || key === '')
    return obj;

  if (typeof objKey === 'string' && objKey.length > 0) {
    if (key.slice(0, objKey.length) !== objKey) {
      x3_log([objKey, obj, key]);
      throw new Error('key [' + key + '] does not match the objKey [' + objKey + ']');
    }
    key = key.slice(objKey.length);
    if (key[0] === '.')
      key = key.slice(1);
  }

  var m = key.match(/^((([^\\\[.]|\\.)+)|\[(\d+)\])\.?(.*)$/);
  if (!m)
    throw new Error('bad format key: ' + key);

  if (typeof m[2] === 'string' && m[2].length > 0) {
    innerobj = innerobj[m[2]];
  }
  else if (typeof m[4] === 'string' && m[4].length > 0) {
    innerobj = innerobj[Number(m[4])];
  }
  else
    throw new Error('impossible reach here');
  if (innerobj && m[5].length > 0)
    innerobj = this.getObjKeyEx(innerobj, m[5]);

  return innerobj;
};


/**
 * Sets the key identified by a path selector to the given value.
 *
 * Levels in the path are separated by a dot. Array items are marked
 * with [x]. For instance:
 *  foo.bar[3].baz
 *
 * The hierarchy is automatically created if it does not exist yet.
 *
 * @function
 * @param {Object} obj The object to build
 * @param {String} key The path to the key to set where each level
 *  is separated by a dot, and array items are flagged with [x].
 * @param {Object} value The value to set, may be of any type.
 */
jsonform.util.setObjKey = function(obj,key,value) {
  var innerobj = obj;
  var keyparts = key.split(".");
  var subkey = null;
  var arrayMatch = null;
  var prop = null;

  for (var i = 0; i < keyparts.length-1; i++) {
    subkey = keyparts[i];
    prop = subkey.replace(reArray, '');
    reArray.lastIndex = 0;
    arrayMatch = reArray.exec(subkey);
    if (arrayMatch) {
      // Subkey is part of an array
      while (true) {
        if (!_.isArray(innerobj[prop])) {
          innerobj[prop] = [];
        }
        innerobj = innerobj[prop];
        prop = parseInt(arrayMatch[1], 10);
        arrayMatch = reArray.exec(subkey);
        if (!arrayMatch) break;
      }
      if ((typeof innerobj[prop] !== 'object') ||
        (innerobj[prop] === null)) {
        innerobj[prop] = {};
      }
      innerobj = innerobj[prop];
    }
    else {
      // "Normal" subkey
      if ((typeof innerobj[prop] !== 'object') ||
        (innerobj[prop] === null)) {
        innerobj[prop] = {};
      }
      innerobj = innerobj[prop];
    }
  }

  // Set the final value
  subkey = keyparts[keyparts.length - 1];
  prop = subkey.replace(reArray, '');
  reArray.lastIndex = 0;
  arrayMatch = reArray.exec(subkey);
  if (arrayMatch) {
    while (true) {
      if (!_.isArray(innerobj[prop])) {
        innerobj[prop] = [];
      }
      innerobj = innerobj[prop];
      prop = parseInt(arrayMatch[1], 10);
      arrayMatch = reArray.exec(subkey);
      if (!arrayMatch) break;
    }
    innerobj[prop] = value;
  }
  else {
    innerobj[prop] = value;
  }
};


/**
 * Retrieves the key definition from the given schema.
 *
 * The key is identified by the path that leads to the key in the
 * structured object that the schema would generate. Each level is
 * separated by a '.'. Array levels are marked with []. For instance:
 *  foo.bar[].baz
 * ... to retrieve the definition of the key at the following location
 * in the JSON schema (using a dotted path notation):
 *  foo.properties.bar.items.properties.baz
 *
 * @function
 * @param {Object} schema The JSON schema to retrieve the key from
 * @param {String} key The path to the key, each level being separated
 *  by a dot and array items being flagged with [].
 * @return {Object} The key definition in the schema, null if not found.
 */
var getSchemaKey = function(schema,key) {
  var schemaKey = key
    .replace(/\./g, '.properties.')
    .replace(/\[[0-9]*\]/g, '.items');
  var schemaDef = jsonform.util.getObjKey(schema, schemaKey, true);
  if (schemaDef && schemaDef.$ref) {
    throw new Error('JSONForm does not yet support schemas that use the ' +
      '$ref keyword. See: https://github.com/joshfire/jsonform/issues/54');
  }
  return schemaDef;
};

/**
 * Retrieves the key default value from the given schema.
 *
 * The key is identified by the path that leads to the key in the
 * structured object that the schema would generate. Each level is
 * separated by a '.'. Array levels are marked with [idx]. For instance:
 *  foo.bar[3].baz
 * ... to retrieve the definition of the key at the following location
 * in the JSON schema (using a dotted path notation):
 *  foo.properties.bar.items.properties.baz
 *
 * @function
 * @param {Object} schema The top level JSON schema to retrieve the key from
 * @param {String} key The path to the key, each level being separated
 *  by a dot and array items being flagged with [idx].
 * @param {Number} top array level of schema within it we search the default.
 * @return {Object} The key definition in the schema, null if not found.
 */
var getSchemaDefaultByKeyWithArrayIdx = function(schema, key, topDefaultArrayLevel) {
  topDefaultArrayLevel = topDefaultArrayLevel || 0;
  var defaultValue = undefined;
  if (!isSet(key) || key === '') {
    if (topDefaultArrayLevel == 0)
      defaultValue = schema.default;
  }
  else if (schema.default && topDefaultArrayLevel == 0) {
    defaultValue = jsonform.util.getObjKeyEx(schema.default, key);
  }
  else {
    var m = key.match(/^((([^\\\[.]|\\.)+)|\[(\d+)\])\.?(.*)$/);
    if (!m)
      throw new Error('bad format key: ' + key);

    if (typeof m[2] === 'string' && m[2].length > 0) {
      schema = schema.properties[m[2]];
    }
    else if (typeof m[4] === 'string' && m[4].length > 0) {
      schema = schema.items;
      if (topDefaultArrayLevel > 0)
        --topDefaultArrayLevel;
    }
    else
      throw new Error('impossible reach here');

    if (schema) {
      if (schema.default && topDefaultArrayLevel == 0) {
        defaultValue = jsonform.util.getObjKeyEx(schema.default, m[5]);
      }
      else {
        defaultValue = getSchemaDefaultByKeyWithArrayIdx(schema, m[5], topDefaultArrayLevel);
      }
    }
  }
  return defaultValue;
};

/**
 * Truncates the key path to the requested depth.
 *
 * For instance, if the key path is:
 *  foo.bar[].baz.toto[].truc[].bidule
 * and the requested depth is 1, the returned key will be:
 *  foo.bar[].baz.toto
 *
 * Note the function includes the path up to the next depth level.
 *
 * @function
 * @param {String} key The path to the key in the schema, each level being
 *  separated by a dot and array items being flagged with [].
 * @param {Number} depth The array depth
 * @return {String} The path to the key truncated to the given depth.
 */
var truncateToArrayDepth = function (key, arrayDepth) {
  var depth = 0;
  var pos = 0;
  if (!key) return null;

  if (arrayDepth > 0) {
    while (depth < arrayDepth) {
      pos = key.indexOf('[]', pos);
      if (pos === -1) {
        // Key path is not "deep" enough, simply return the full key
        return key;
      }
      pos = pos + 2;
      depth += 1;
    }
  }

  // Move one step further to the right without including the final []
  pos = key.indexOf('[]', pos);
  if (pos === -1) return key;
  else return key.substring(0, pos);
};

/**
 * Applies the array path to the key path.
 *
 * For instance, if the key path is:
 *  foo.bar[].baz.toto[].truc[].bidule
 * and the arrayPath [4, 2], the returned key will be:
 *  foo.bar[4].baz.toto[2].truc[].bidule
 *
 * @function
 * @param {String} key The path to the key in the schema, each level being
 *  separated by a dot and array items being flagged with [].
 * @param {Array(Number)} arrayPath The array path to apply, e.g. [4, 2]
 * @return {String} The path to the key that matches the array path.
 */
var applyArrayPath = function (key, arrayPath) {
  var depth = 0;
  if (!key) return null;
  if (!arrayPath || (arrayPath.length === 0)) return key;
  var newKey = key.replace(reArray, function (str, p1) {
    // Note this function gets called as many times as there are [x] in the ID,
    // from left to right in the string. The goal is to replace the [x] with
    // the appropriate index in the new array path, if defined.
    var newIndex = str;
    if (isSet(arrayPath[depth])) {
      newIndex = '[' + arrayPath[depth] + ']';
    }
    depth += 1;
    return newIndex;
  });
  return newKey;
};


/**
 * Returns the initial value that a field identified by its key
 * should take.
 *
 * The "initial" value is defined as:
 * 1. the previously submitted value if already submitted
 * 2. the default value defined in the layout of the form
 * 3. the default value defined in the schema
 *
 * The "value" returned is intended for rendering purpose,
 * meaning that, for fields that define a titleMap property,
 * the function returns the label, and not the intrinsic value.
 *
 * The function handles values that contains template strings,
 * e.g. {{values.foo[].bar}} or {{idx}}.
 *
 * When the form is a string, the function truncates the resulting string
 * to meet a potential "maxLength" constraint defined in the schema, using
 * "..." to mark the truncation. Note it does not validate the resulting
 * string against other constraints (e.g. minLength, pattern) as it would
 * be hard to come up with an automated course of action to "fix" the value.
 *
 * @function
 * @param {Object} formObject The JSON Form object
 * @param {String} key The generic key path (e.g. foo[].bar.baz[])
 * @param {Array(Number)} arrayPath The array path that identifies
 *  the unique value in the submitted form (e.g. [1, 3])
 * @param {Object} tpldata Template data object
 * @param {Boolean} usePreviousValues true to use previously submitted values
 *  if defined.
 */
var getInitialValue = function (formObject, key, arrayPath, tpldata, usePreviousValues) {
  var value = null;

  // Complete template data for template function
  tpldata = tpldata || {};
  tpldata.idx = tpldata.idx ||
    (arrayPath ? arrayPath[arrayPath.length-1] : 1);
  tpldata.value = isSet(tpldata.value) ? tpldata.value : '';
  tpldata.getValue = tpldata.getValue || function (key) {
    return getInitialValue(formObject, key, arrayPath, tpldata, usePreviousValues);
  };

  // Helper function that returns the form element that explicitly
  // references the given key in the schema.
  var getFormElement = function (elements, key) {
    var formElement = null;
    if (!elements || !elements.length) return null;
    _.each(elements, function (elt) {
      if (formElement) return;
      if (elt === key) {
        formElement = { key: elt };
        return;
      }
      if (_.isString(elt)) return;
      if (elt.key === key) {
        formElement = elt;
      }
      else if (elt.items) {
        formElement = getFormElement(elt.items, key);
      }
    });
    return formElement;
  };
  var formElement = getFormElement(formObject.form || [], key);
  var schemaElement = getSchemaKey(formObject.schema.properties, key);

  if (usePreviousValues && formObject.value) {
    // If values were previously submitted, use them directly if defined
    value = jsonform.util.getObjKey(formObject.value, applyArrayPath(key, arrayPath));
  }
  if (!isSet(value)) {
    if (formElement && (typeof formElement['value'] !== 'undefined')) {
      // Extract the definition of the form field associated with
      // the key as it may override the schema's default value
      // (note a "null" value overrides a schema default value as well)
      value = formElement['value'];
    }
    else if (schemaElement) {
      // Simply extract the default value from the schema
      if (isSet(schemaElement['default'])) {
        value = schemaElement['default'];
      }
    }
    if (value && value.indexOf('{{values.') !== -1) {
      // This label wants to use the value of another input field.
      // Convert that construct into {{getValue(key)}} for
      // Underscore to call the appropriate function of formData
      // when template gets called (note calling a function is not
      // exactly Mustache-friendly but is supported by Underscore).
      value = value.replace(
        /\{\{values\.([^\}]+)\}\}/g,
        '{{getValue("$1")}}');
    }
    if (value) {
      value = _template(value, tpldata, valueTemplateSettings);
    }
  }

  // TODO: handle on the formElement.options, because user can setup it too.
  // Apply titleMap if needed
  if (isSet(value) && formElement && hasOwnProperty(formElement.titleMap, value)) {
    value = _template(formElement.titleMap[value],
      tpldata, valueTemplateSettings);
  }

  // Check maximum length of a string
  if (value && _.isString(value) &&
    schemaElement && schemaElement.maxLength) {
    if (value.length > schemaElement.maxLength) {
      // Truncate value to maximum length, adding continuation dots
      value = value.substr(0, schemaElement.maxLength - 1) + '…';
    }
  }

  if (!isSet(value)) {
    return null;
  }
  else {
    return value;
  }
};


/**
 * Represents a node in the form.
 *
 * Nodes that have an ID are linked to the corresponding DOM element
 * when rendered
 *
 * Note the form element and the schema elements that gave birth to the
 * node may be shared among multiple nodes (in the case of arrays).
 *
 * @class
 */
var formNode = function () {
  /**
   * The node's ID (may not be set)
   */
  this.id = null;

  /**
   * The node's key path (may not be set)
   */
  this.key = null;

  /**
   * DOM element associated witht the form element.
   *
   * The DOM element is set when the form element is rendered.
   */
  this.el = null;

  /**
   * Link to the form element that describes the node's layout
   * (note the form element is shared among nodes in arrays)
   */
  this.formElement = null;

  /**
   * Link to the schema element that describes the node's value constraints
   * (note the schema element is shared among nodes in arrays)
   */
  this.schemaElement = null;

  /**
   * Pointer to the "view" associated with the node, typically the right
   * object in jsonform.elementTypes
   */
  this.view = null;

  /**
   * Node's subtree (if one is defined)
   */
  this.children = [];

  /**
   * A pointer to the form tree the node is attached to
   */
  this.ownerTree = null;

  /**
   * A pointer to the parent node of the node in the tree
   */
  this.parentNode = null;

  /**
   * Child template for array-like nodes.
   *
   * The child template gets cloned to create new array items.
   */
  this.childTemplate = null;


  /**
   * Direct children of array-like containers may use the value of a
   * specific input field in their subtree as legend. The link to the
   * legend child is kept here and initialized in computeInitialValues
   * when a child sets "valueInLegend"
   */
  this.legendChild = null;


  /**
   * The path of indexes that lead to the current node when the
   * form element is not at the root array level.
   *
   * Note a form element may well be nested element and still be
   * at the root array level. That's typically the case for "fieldset"
   * elements. An array level only gets created when a form element
   * is of type "array" (or a derivated type such as "tabarray").
   *
   * The array path of a form element linked to the foo[2].bar.baz[3].toto
   * element in the submitted values is [2, 3] for instance.
   *
   * The array path is typically used to compute the right ID for input
   * fields. It is also used to update positions when an array item is
   * created, moved around or suppressed.
   *
   * @type {Array(Number)}
   */
  this.arrayPath = [];

  /**
   * Position of the node in the list of children of its parents
   */
  this.childPos = 0;
};


/**
 * Clones a node
 *
 * @function
 * @param {formNode} New parent node to attach the node to
 * @return {formNode} Cloned node
 */
formNode.prototype.clone = function (parentNode) {
  var node = new formNode();
  node.childPos = this.childPos;
  node.arrayPath = _.clone(this.arrayPath);
  node.ownerTree = this.ownerTree;
  node.parentNode = parentNode || this.parentNode;
  node.formElement = this.formElement;
  node.schemaElement = this.schemaElement;
  node.view = this.view;
  node.children = _.map(this.children, function (child) {
    return child.clone(node);
  });
/*  if (this.childTemplate) {
    node.childTemplate = this.childTemplate.clone(node);
  }*/
  return node;
};


/**
 * Returns true if the subtree that starts at the current node
 * has some non empty value attached to it
 */
formNode.prototype.hasNonDefaultValue = function () {

  // hidden elements don't count because they could make the wrong selectfieldset element active
  if (this.formElement && this.formElement.type=="hidden") {
    return false;
  }

  if (this.value && !this.defaultValue) {
    return true;
  }
  var child = _.find(this.children, function (child) {
    return child.hasNonDefaultValue();
  });
  return !!child;
};


/**
 * Returns a property value of node, optional look for in parents chain
 *
 * @function
 * @param {String} prop Property name for looking
 * @param {Boolean} searchInParents Search the property in parents chain if not found in current node
 * @return {Any} The property value
 */
formNode.prototype.getProperty = function (prop, searchInParents) {
  var value = this[prop];
  if (value !== undefined || !searchInParents || !this.parentNode)
    return value;
  return this.parentNode.getProperty(prop, true);
};

formNode.prototype.isReadOnly = function() {
  return this.getProperty('readOnly', true);
}

/**
 * Attaches a child node to the current node.
 *
 * The child node is appended to the end of the list.
 *
 * @function
 * @param {formNode} node The child node to append
 * @return {formNode} The inserted node (same as the one given as parameter)
 */
formNode.prototype.appendChild = function (node) {
  node.parentNode = this;
  node.childPos = this.children.length;
  this.children.push(node);
  return node;
};


/**
 * Removes the last child of the node.
 *
 * @function
 */
formNode.prototype.removeChild = function () {
  var child = this.children[this.children.length-1];
  if (!child) return;

  // Remove the child from the DOM
  $(child.el).remove();

  // Remove the child from the array
  return this.children.pop();
};


/**
 * Moves the user entered values set in the current node's subtree to the
 * given node's subtree.
 *
 * The target node must follow the same structure as the current node
 * (typically, they should have been generated from the same node template)
 *
 * The current node MUST be rendered in the DOM.
 *
 * TODO: when current node is not in the DOM, extract values from formNode.value
 * properties, so that the function be available even when current node is not
 * in the DOM.
 *
 * Moving values around allows to insert/remove array items at arbitrary
 * positions.
 *
 * @function
 * @param {formNode} node Target node.
 */
formNode.prototype.moveValuesTo = function (node) {
  var values = this.getFormValues(node.arrayPath);
  node.resetValues();
  node.computeInitialValues(values, true);
};


/**
 * Switches nodes user entered values.
 *
 * The target node must follow the same structure as the current node
 * (typically, they should have been generated from the same node template)
 *
 * Both nodes MUST be rendered in the DOM.
 *
 * TODO: update getFormValues to work even if node is not rendered, using
 * formNode's "value" property.
 *
 * @function
 * @param {formNode} node Target node
 */
formNode.prototype.switchValuesWith = function (node) {
  var values = this.getFormValues(node.arrayPath);
  var nodeValues = node.getFormValues(this.arrayPath);
  node.resetValues();
  node.computeInitialValues(values, true);
  this.resetValues();
  this.computeInitialValues(nodeValues, true);
};


/**
 * Resets all DOM values in the node's subtree.
 *
 * This operation also drops all array item nodes.
 * Note values are not reset to their default values, they are rather removed!
 *
 * @function
 */
formNode.prototype.resetValues = function () {
  var params = null;
  var idx = 0;

  // Reset value
  this.value = null;

  // Propagate the array path from the parent node
  // (adding the position of the child for nodes that are direct
  // children of array-like nodes)
  if (this.parentNode) {
    this.arrayPath = _.clone(this.parentNode.arrayPath);
    if (this.parentNode.view && this.parentNode.view.array) {
      this.arrayPath.push(this.childPos);
    }
  }
  else {
    this.arrayPath = [];
  }

  if (this.view && this.view.inputfield) {
    // Simple input field, extract the value from the origin,
    // set the target value and reset the origin value
    params = $(':input', this.el).serializeArray();
    _.each(params, function (param) {
      // TODO: check this, there may exist corner cases with this approach
      // (with multiple checkboxes for instance)
      $('[name="' + escapeSelector(param.name) + '"]', $(this.el)).val('');
    }, this);
  }
  else if (this.view && this.view.array) {
    // The current node is an array, drop all children
    while (this.children.length > 0) {
      this.removeChild();
    }
  }

  // Recurse down the tree
  _.each(this.children, function (child) {
    child.resetValues();
  });
};


/**
 * Sets the child template node for the current node.
 *
 * The child template node is used to create additional children
 * in an array-like form element. The template is never rendered.
 *
 * @function
 * @param {formNode} node The child template node to set
 */
formNode.prototype.setChildTemplate = function (node) {
  this.childTemplate = node;
  node.parentNode = this;
};

/**
 * Gets the child template node for the current node.
 *
 * The child template node is used to create additional children
 * in an array-like form element. We delay create it when first use.
 *
 * @function
 * @param {formNode} node The child template node to set
 */
formNode.prototype.getChildTemplate = function () {
  if (!this.childTemplate) {
    if (this.view.array) {
      // The form element is an array. The number of items in an array
      // is by definition dynamic, up to the form user (through "Add more",
      // "Delete" commands). The positions of the items in the array may
      // also change over time (through "Move up", "Move down" commands).
      //
      // The form node stores a "template" node that serves as basis for
      // the creation of an item in the array.
      //
      // Array items may be complex forms themselves, allowing for nesting.
      //
      // The initial values set the initial number of items in the array.
      // Note a form element contains at least one item when it is rendered.
      if (this.formElement.items) {
        key = this.formElement.items[0] || this.formElement.items;
      }
      else {
        key = this.formElement.key + '[]';
      }
      if (_.isString(key)) {
        key = { key: key };
      }
      this.setChildTemplate(this.ownerTree.buildFromLayout(key));
    }
  }
  return this.childTemplate;
};


/**
 * Recursively sets values to all nodes of the current subtree
 * based on previously submitted values, or based on default
 * values when the submitted values are not enough
 *
 * The function should be called once in the lifetime of a node
 * in the tree. It expects its parent's arrayPath to be up to date.
 *
 * Three cases may arise:
 * 1. if the form element is a simple input field, the value is
 * extracted from previously submitted values of from default values
 * defined in the schema.
 * 2. if the form element is an array-like node, the child template
 * is used to create as many children as possible (and at least one).
 * 3. the function simply recurses down the node's subtree otherwise
 * (this happens when the form element is a fieldset-like element).
 *
 * @function
 * @param {Object} values Previously submitted values for the form
 * @param {Boolean} ignoreDefaultValues Ignore default values defined in the
 *  schema when set.
 * @param {Integer} the top array level of the default value scope, used when
 *  add new item into array, at that time won't consider all default values
 *  above the array schema level.
 */
formNode.prototype.computeInitialValues = function (values, ignoreDefaultValues, topDefaultArrayLevel) {
  var self = this;
  var node = null;
  var nbChildren = 1;
  var i = 0;
  var formData = this.ownerTree.formDesc.tpldata || {};
  topDefaultArrayLevel = topDefaultArrayLevel || 0;

  // Propagate the array path from the parent node
  // (adding the position of the child for nodes that are direct
  // children of array-like nodes)
  if (this.parentNode) {
    this.arrayPath = _.clone(this.parentNode.arrayPath);
    if (this.parentNode.view && this.parentNode.view.array) {
      this.arrayPath.push(this.childPos);
    }
  }
  else {
    this.arrayPath = [];
  }

  // Prepare special data param "idx" for templated values
  // (is is the index of the child in its wrapping array, starting
  // at 1 since that's more human-friendly than a zero-based index)
  formData.idx = (this.arrayPath.length > 0) ?
    this.arrayPath[this.arrayPath.length-1] + 1 :
    this.childPos + 1;

  // Prepare special data param "value" for templated values
  formData.value = '';

  // Prepare special function to compute the value of another field
  formData.getValue = function (key) {
    return getInitialValue(self.ownerTree.formDesc,
      key, self.arrayPath,
      formData, !!values);
  };

  if (this.formElement) {
    // Compute the ID of the field (if needed)
    if (this.formElement.id) {
      this.id = applyArrayPath(this.formElement.id, this.arrayPath);
    }
    else if (this.view && this.view.array) {
      this.id = escapeSelector(this.ownerTree.formDesc.prefix) +
        '-elt-counter-' + _.uniqueId();
    }
    else if (this.parentNode && this.parentNode.view &&
      this.parentNode.view.array) {
      // Array items need an array to associate the right DOM element
      // to the form node when the parent is rendered.
      this.id = escapeSelector(this.ownerTree.formDesc.prefix) +
        '-elt-counter-' + _.uniqueId();
    }
    else if ((this.formElement.type === 'button') ||
      (this.formElement.type === 'selectfieldset') ||
      (this.formElement.type === 'question') ||
      (this.formElement.type === 'buttonquestion')) {
      // Buttons do need an id for "onClick" purpose
      this.id = escapeSelector(this.ownerTree.formDesc.prefix) +
        '-elt-counter-' + _.uniqueId();
    }

    // Compute the actual key (the form element's key is index-free,
    // i.e. it looks like foo[].bar.baz[].truc, so we need to apply
    // the array path of the node to get foo[4].bar.baz[2].truc)
    if (this.formElement.key) {
      this.key = applyArrayPath(this.formElement.key, this.arrayPath);
      this.keydash = this.key.replace(/\./g, '---');
    }

    // Same idea for the field's name
    this.name = applyArrayPath(this.formElement.name, this.arrayPath);

    // Consider that label values are template values and apply the
    // form's data appropriately (note we also apply the array path
    // although that probably doesn't make much sense for labels...)
    _.each([
      'title',
      'legend',
      'description',
      'append',
      'prepend',
      'inlinetitle',
      'helpvalue',
      'value',
      'disabled',
      'required',
      'placeholder',
      'readOnly'
    ], function (prop) {
      if (_.isString(this.formElement[prop])) {
        if (this.formElement[prop].indexOf('{{values.') !== -1) {
          // This label wants to use the value of another input field.
          // Convert that construct into {{jsonform.getValue(key)}} for
          // Underscore to call the appropriate function of formData
          // when template gets called (note calling a function is not
          // exactly Mustache-friendly but is supported by Underscore).
          this[prop] = this.formElement[prop].replace(
            /\{\{values\.([^\}]+)\}\}/g,
            '{{getValue("$1")}}');
        }
        else {
          // Note applying the array path probably doesn't make any sense,
          // but some geek might want to have a label "foo[].bar[].baz",
          // with the [] replaced by the appropriate array path.
          this[prop] = applyArrayPath(this.formElement[prop], this.arrayPath);
        }
        if (this[prop]) {
          this[prop] = _template(this[prop], formData, valueTemplateSettings);
        }
      }
      else {
        this[prop] = this.formElement[prop];
      }
    }, this);

    // Apply templating to options created with "titleMap" as well
    if (this.formElement.options) {
      this.options = _.map(this.formElement.options, function (option) {
        var title = null;
        if (_.isObject(option) && option.title) {
          // See a few lines above for more details about templating
          // preparation here.
          if (option.title.indexOf('{{values.') !== -1) {
            title = option.title.replace(
              /\{\{values\.([^\}]+)\}\}/g,
              '{{getValue("$1")}}');
          }
          else {
            title = applyArrayPath(option.title, self.arrayPath);
          }
          return _.extend({}, option, {
            value: (isSet(option.value) ? option.value : ''),
            title: _template(title, formData, valueTemplateSettings)
          });
        }
        else {
          return option;
        }
      });
    }
  }

  if (this.view && this.view.inputfield && this.schemaElement) {
    // Case 1: simple input field
    if (values) {
      // Form has already been submitted, use former value if defined.
      // Note we won't set the field to its default value otherwise
      // (since the user has already rejected it)
      if (isSet(jsonform.util.getObjKey(values, this.key))) {
        this.value = jsonform.util.getObjKey(values, this.key);
      }
    }
    else if (!ignoreDefaultValues) {
      // No previously submitted form result, use default value
      // defined in the schema if it's available and not already
      // defined in the form element
      if (!isSet(this.value)) {
        // XXX: the default value could comes from the top upper level default
        //      value in the schema parent chain, maybe under a certain parent
        //      level(e.g. when handle new itemn for array)
        var schemaDefault = getSchemaDefaultByKeyWithArrayIdx(self.ownerTree.formDesc.schema, this.key, topDefaultArrayLevel);
        if (isSet(schemaDefault)) {
          this.value = schemaDefault;
          if (_.isString(this.value)) {
            if (this.value.indexOf('{{values.') !== -1) {
              // This label wants to use the value of another input field.
              // Convert that construct into {{jsonform.getValue(key)}} for
              // Underscore to call the appropriate function of formData
              // when template gets called (note calling a function is not
              // exactly Mustache-friendly but is supported by Underscore).
              this.value = this.value.replace(
                /\{\{values\.([^\}]+)\}\}/g,
                '{{getValue("$1")}}');
            }
            else {
              // Note applying the array path probably doesn't make any sense,
              // but some geek might want to have a label "foo[].bar[].baz",
              // with the [] replaced by the appropriate array path.
              this.value = applyArrayPath(this.value, this.arrayPath);
            }
            if (this.value) {
              this.value = _template(this.value, formData, valueTemplateSettings);
            }
          }
          this.defaultValue = true;
        }
      }
    }
  }
  else if (this.view && this.view.array) {
    // Case 2: array-like node
    nbChildren = 1;
    var minItems = this.getArrayBoundaries().minItems;

    if (values) {
      var previousArrayValue = jsonform.util.getObjKeyEx(values, this.key);
      if (previousArrayValue && Array.isArray(previousArrayValue)) {
        nbChildren = previousArrayValue.length;
      }
    }
    // TODO: use default values at the array level when form has not been
    // submitted before. Note it's not that easy because each value may
    // be a complex structure that needs to be pushed down the subtree.
    // The easiest way is probably to generate a "values" object and
    // compute initial values from that object
    else if (!ignoreDefaultValues) {
      var schemaDefault = getSchemaDefaultByKeyWithArrayIdx(self.ownerTree.formDesc.schema, this.key, topDefaultArrayLevel);
      if (schemaDefault && Array.isArray(schemaDefault)) {
        nbChildren = schemaDefault.length;
      }
    }
    else {
      // If form has already been submitted with no children, the array
      // needs to be rendered without children. If there are no previously
      // submitted values, the array gets rendered with one empty item as
      // it's more natural from a user experience perspective. That item can
      // be removed with a click on the "-" button.
      if (minItems >= 0) {
        nbChildren = 0;
      }

    }

    for (i = 0; i < nbChildren; i++) {
      this.appendChild(this.getChildTemplate().clone());
    }
  }

  // Case 3 and in any case: recurse through the list of children
  _.each(this.children, function (child) {
    child.computeInitialValues(values, ignoreDefaultValues, topDefaultArrayLevel);
  });

  // If the node's value is to be used as legend for its "container"
  // (typically the array the node belongs to), ensure that the container
  // has a direct link to the node for the corresponding tab.
  if (this.formElement && this.formElement.valueInLegend) {
    node = this;
    while (node) {
      if (node.parentNode &&
        node.parentNode.view &&
        node.parentNode.view.array) {
        node.legendChild = this;
        if (node.formElement && node.formElement.legend) {
          node.legend = applyArrayPath(node.formElement.legend, node.arrayPath);
          formData.idx = (node.arrayPath.length > 0) ?
            node.arrayPath[node.arrayPath.length-1] + 1 :
            node.childPos + 1;
          formData.value = isSet(this.value) ? this.value : '';
          node.legend = _template(node.legend, formData, valueTemplateSettings);
          break;
        }
      }
      node = node.parentNode;
    }
  }
};


/**
 * Returns the structured object that corresponds to the form values entered
 * by the user for the node's subtree.
 *
 * The returned object follows the structure of the JSON schema that gave
 * birth to the form.
 *
 * Obviously, the node must have been rendered before that function may
 * be called.
 *
 * @function
 * @param {Array(Number)} updateArrayPath Array path to use to pretend that
 *  the entered values were actually entered for another item in an array
 *  (this is used to move values around when an item is inserted/removed/moved
 *  in an array)
 * @return {Object} The object that follows the data schema and matches the
 *  values entered by the user.
 */
formNode.prototype.getFormValues = function (updateArrayPath) {
  // The values object that will be returned
  var values = {};

  if (!this.el) {
    throw new Error('formNode.getFormValues can only be called on nodes that are associated with a DOM element in the tree');
  }

  // Form fields values
  var formArray = $(':input', this.el).serializeArray();

  // Set values to false for unset checkboxes and radio buttons
  // because serializeArray() ignores them
  formArray = formArray.concat(
    $(':input[type=checkbox]:not(:disabled):not(:checked)[name]', this.el).map( function() {
      return {"name": this.name, "value": this.checked}
    }).get()
  );

  if (updateArrayPath) {
    _.each(formArray, function (param) {
      param.name = applyArrayPath(param.name, updateArrayPath);
    });
  }

  // The underlying data schema
  var formSchema = this.ownerTree.formDesc.schema;

  for (var i = 0; i < formArray.length; i++) {
    // Retrieve the key definition from the data schema
    var name = formArray[i].name;
    var eltSchema = getSchemaKey(formSchema.properties, name);
    var arrayMatch = null;
    var cval = null;

    // Skip the input field if it's not part of the schema
    if (!eltSchema) continue;

    // Handle multiple checkboxes separately as the idea is to generate
    // an array that contains the list of enumeration items that the user
    // selected.
    if (eltSchema._jsonform_checkboxes_as_array) {
      arrayMatch = name.match(/\[([0-9]*)\]$/);
      if (arrayMatch) {
        name = name.replace(/\[([0-9]*)\]$/, '');
        cval = jsonform.util.getObjKey(values, name) || [];
        if (eltSchema._jsonform_checkboxes_as_array === 'value' && formArray[i].value !== false && formArray[i].value !== '') {
          // Value selected, push the corresponding enumeration item
          // to the data result
          cval.push(formArray[i].value);
        }
        else if (eltSchema._jsonform_checkboxes_as_array === true && formArray[i].value === '1'){
          // Value selected, push the corresponding enumeration item
          // to the data result
          cval.push(eltSchema['enum'][parseInt(arrayMatch[1],10)]);
        }
        jsonform.util.setObjKey(values, name, cval);
        continue;
      }
    }
    if (eltSchema._jsonform_get_value_by_tagsinput === 'tagsinput') {
      var vals;
      if (updateArrayPath) {
        var oriName = applyArrayPath(name, this.arrayPath);
        vals = $(':input[name="' + oriName + '"]', this.el).tagsinput('items');
      }
      else
        vals = $(':input[name="' + name + '"]', this.el).tagsinput('items');
      // this may be called multiple times, but it's ok.
      jsonform.util.setObjKey(values, name, vals);
      continue;
    }
    if (name.slice(-2) === '[]') {
      name = name.slice(0, -2);
      eltSchema = getSchemaKey(formSchema.properties, name);
      if (eltSchema.type === 'array') {
        cval = jsonform.util.getObjKey(values, name) || [];
        if (cval.indexOf(formArray[i].value) < 0) {
          cval.push(formArray[i].value);
          jsonform.util.setObjKey(values, name, cval);
        }
        continue;
      }
    }

    // Type casting
    if (eltSchema.type === 'boolean') {
      if (formArray[i].value === '0' || formArray[i].value === 'false') {
        formArray[i].value = false;
      } else if (formArray[i].value === '') {
        formArray[i].value=null;
      } else {
        formArray[i].value = !!formArray[i].value;
      }
    }
    if ((eltSchema.type === 'number') ||
      (eltSchema.type === 'integer')) {
      if (_.isString(formArray[i].value)) {
        if (!formArray[i].value.length) {
          formArray[i].value = null;
        } else if (!isNaN(Number(formArray[i].value))) {
          formArray[i].value = Number(formArray[i].value);
        }
      }
    }
    if ((eltSchema.type === 'string') &&
      (formArray[i].value === '') &&
      !eltSchema._jsonform_allowEmpty) {
      formArray[i].value=null;
    }
    if ((eltSchema.type === 'object') &&
      _.isString(formArray[i].value) &&
      (formArray[i].value.substring(0,1) === '{')) {
      try {
        formArray[i].value = JSON.parse(formArray[i].value);
      } catch (e) {
        formArray[i].value = {};
      }
    }
    if ((eltSchema.type === 'array') && _.isString(formArray[i].value)) {
      if (formArray[i].value.substring(0,1) === '[') {
        try {
          formArray[i].value = JSON.parse(formArray[i].value);
        } catch (e) {
          formArray[i].value = []; // or null?
        }
      }
      else
        formArray[i].value = null;
    }
    //TODO is this due to a serialization bug?
    if ((eltSchema.type === 'object') &&
      (formArray[i].value === 'null' || formArray[i].value === '')) {
      formArray[i].value = null;
    }

    if (formArray[i].name && (formArray[i].value !== null)) {
      jsonform.util.setObjKey(values, formArray[i].name, formArray[i].value);
    }
  }
  return values;
};



/**
 * Renders the node.
 *
 * Rendering is done in three steps: HTML generation, DOM element creation
 * and insertion, and an enhance step to bind event handlers.
 *
 * @function
 * @param {Node} el The DOM element where the node is to be rendered. The
 *  node is inserted at the right position based on its "childPos" property.
 */
formNode.prototype.render = function (el) {
  var html = this.generate();
  this.setContent(html, el);
  this.enhance();
};


/**
 * Inserts/Updates the HTML content of the node in the DOM.
 *
 * If the HTML is an update, the new HTML content replaces the old one.
 * The new HTML content is not moved around in the DOM in particular.
 *
 * The HTML is inserted at the right position in its parent's DOM subtree
 * otherwise (well, provided there are enough children, but that should always
 * be the case).
 *
 * @function
 * @param {string} html The HTML content to render
 * @param {Node} parentEl The DOM element that is to contain the DOM node.
 *  This parameter is optional (the node's parent is used otherwise) and
 *  is ignored if the node to render is already in the DOM tree.
 */
formNode.prototype.setContent = function (html, parentEl) {
  var node = $(html);
  var parentNode = parentEl ||
    (this.parentNode ? this.parentNode.el : this.ownerTree.domRoot);
  var nextSibling = null;

  if (this.el) {
    // Replace the contents of the DOM element if the node is already in the tree
    $(this.el).replaceWith(node);
  }
  else {
    // Insert the node in the DOM if it's not already there
    nextSibling = $(parentNode).children().get(this.childPos);
    if (nextSibling) {
      $(nextSibling).before(node);
    }
    else {
      $(parentNode).append(node);
    }
  }

  // Save the link between the form node and the generated HTML
  this.el = node;

  // Update the node's subtree, extracting DOM elements that match the nodes
  // from the generated HTML
  this.updateElement(this.el);
};


/**
 * Updates the DOM element associated with the node.
 *
 * Only nodes that have ID are directly associated with a DOM element.
 *
 * @function
 */
formNode.prototype.updateElement = function (domNode) {
  if (this.id) {
    this.el = $('#' + escapeSelector(this.id), domNode).get(0);
    if (this.view && this.view.getElement) {
      this.el = this.view.getElement(this.el);
    }
    if ((this.fieldtemplate !== false) &&
      this.view && this.view.fieldtemplate) {
      // The field template wraps the element two or three level deep
      // in the DOM tree, depending on whether there is anything prepended
      // or appended to the input field
      this.el = $(this.el).parent().parent();
      if (this.prepend || this.append) {
        this.el = this.el.parent();
      }
      this.el = this.el.get(0);
    }
    if (this.parentNode && this.parentNode.view &&
      this.parentNode.view.childTemplate) {
      // TODO: the child template may introduce more than one level,
      // so the number of levels introduced should rather be exposed
      // somehow in jsonform.fieldtemplate.
      this.el = $(this.el).parent().get(0);
    }
  }

  _.each(this.children, function (child) {
    child.updateElement(this.el || domNode);
  });
};


/**
 * Generates the view's HTML content for the underlying model.
 *
 * @function
 */
formNode.prototype.generate = function () {
  var data = {
    id: this.id,
    keydash: this.keydash,
    elt: this.formElement,
    schema: this.schemaElement,
    node: this,
    value: isSet(this.value) ? this.value : '',
    cls: this.ownerTree.defaultClasses,
    escape: escapeHTML
  };
  var template = null;
  var html = '';

  // Complete the data context if needed
  if (this.ownerTree.formDesc.onBeforeRender) {
    this.ownerTree.formDesc.onBeforeRender(data, this);
  }
  if (this.view.onBeforeRender) {
    this.view.onBeforeRender(data, this);
  }

  // Use the template that 'onBeforeRender' may have set,
  // falling back to that of the form element otherwise
  if (this.template) {
    template = this.template;
  }
  else if (this.formElement && this.formElement.template) {
    template = this.formElement.template;
  }
  else {
    template = this.view.template;
  }

  // Wrap the view template in the generic field template
  // (note the strict equality to 'false', needed as we fallback
  // to the view's setting otherwise)
  if ((this.fieldtemplate !== false) &&
    (this.fieldtemplate || this.view.fieldtemplate)) {
    template = jsonform.fieldTemplate(template);
  }

  // Wrap the content in the child template of its parent if necessary.
  if (this.parentNode && this.parentNode.view &&
    this.parentNode.view.childTemplate) {
    template = this.parentNode.view.childTemplate(template, this.parentNode);
  }

  // Prepare the HTML of the children
  var childrenhtml = '';
  _.each(this.children, function (child) {
    childrenhtml += child.generate();
  });
  data.children = childrenhtml;

  data.fieldHtmlClass = '';
  if (this.ownerTree &&
      this.ownerTree.formDesc &&
      this.ownerTree.formDesc.params &&
      this.ownerTree.formDesc.params.fieldHtmlClass) {
    data.fieldHtmlClass = this.ownerTree.formDesc.params.fieldHtmlClass;
  }
  if (this.formElement &&
      (typeof this.formElement.fieldHtmlClass !== 'undefined')) {
    data.fieldHtmlClass = this.formElement.fieldHtmlClass;
  }

  // Apply the HTML template
  html = _template(template, data, fieldTemplateSettings);
  return html;
};


/**
 * Enhances the view with additional logic, binding event handlers
 * in particular.
 *
 * The function also runs the "insert" event handler of the view and
 * form element if they exist (starting with that of the view)
 *
 * @function
 */
formNode.prototype.enhance = function () {
  var node = this;
  var handlers = null;
  var handler = null;
  var formData = _.clone(this.ownerTree.formDesc.tpldata) || {};

  if (this.formElement) {
    // Check the view associated with the node as it may define an "onInsert"
    // event handler to be run right away
    if (this.view.onInsert) {
      this.view.onInsert({ target: $(this.el) }, this);
    }

    handlers = this.handlers || this.formElement.handlers;

    // Trigger the "insert" event handler
    handler = this.onInsert || this.formElement.onInsert;
    if (handler) {
      handler({ target: $(this.el) }, this);
    }
    if (handlers) {
      _.each(handlers, function (handler, onevent) {
        if (onevent === 'insert') {
          handler({ target: $(this.el) }, this);
        }
      }, this);
    }

    // No way to register event handlers if the DOM element is unknown
    // TODO: find some way to register event handlers even when this.el is not set.
    if (this.el) {

      // Register specific event handlers
      // TODO: Add support for other event handlers
      if (this.onChange)
        $(this.el).bind('change', function(evt) { node.onChange(evt, node); });
      if (this.view.onChange)
        $(this.el).bind('change', function(evt) { node.view.onChange(evt, node); });
      if (this.formElement.onChange)
        $(this.el).bind('change', function(evt) { node.formElement.onChange(evt, node); });

      if (this.onClick)
        $(this.el).bind('click', function(evt) { node.onClick(evt, node); });
      if (this.view.onClick)
        $(this.el).bind('click', function(evt) { node.view.onClick(evt, node); });
      if (this.formElement.onClick)
        $(this.el).bind('click', function(evt) { node.formElement.onClick(evt, node); });

      if (this.onKeyUp)
        $(this.el).bind('keyup', function(evt) { node.onKeyUp(evt, node); });
      if (this.view.onKeyUp)
        $(this.el).bind('keyup', function(evt) { node.view.onKeyUp(evt, node); });
      if (this.formElement.onKeyUp)
        $(this.el).bind('keyup', function(evt) { node.formElement.onKeyUp(evt, node); });

      if (handlers) {
        _.each(handlers, function (handler, onevent) {
          if (onevent !== 'insert') {
            $(this.el).bind(onevent, function(evt) { handler(evt, node); });
          }
        }, this);
      }
    }

    // Auto-update legend based on the input field that's associated with it
    if (this.formElement.legend && this.legendChild && this.legendChild.formElement) {
      function onLegendChildChange(evt) {
        if (node.formElement && node.formElement.legend && node.parentNode) {
          node.legend = applyArrayPath(node.formElement.legend, node.arrayPath);
          formData.idx = (node.arrayPath.length > 0) ?
            node.arrayPath[node.arrayPath.length-1] + 1 :
            node.childPos + 1;
          formData.value = $(evt.target).val();
          node.legend = _template(node.legend, formData, valueTemplateSettings);
          $(node.parentNode.el).trigger('legendUpdated');
        }
      }
      $(this.legendChild.el).on('keyup', onLegendChildChange);
      $(this.legendChild.el).on('change', onLegendChildChange);
    }
  }

  // Recurse down the tree to enhance children
  _.each(this.children, function (child) {
    child.enhance();
  });
};



/**
 * Inserts an item in the array at the requested position and renders the item.
 *
 * @function
 * @param {Number} idx Insertion index
 */
formNode.prototype.insertArrayItem = function (idx, domElement) {
  var i = 0;

  // Insert element at the end of the array if index is not given
  if (idx === undefined) {
    idx = this.children.length;
  }

  // Create the additional array item at the end of the list,
  // using the item template created when tree was initialized
  // (the call to resetValues ensures that 'arrayPath' is correctly set)
  var child = this.getChildTemplate().clone();
  this.appendChild(child);
  child.resetValues();

  // To create a blank array item at the requested position,
  // shift values down starting at the requested position
  // one to insert (note we start with the end of the array on purpose)
  for (i = this.children.length-2; i >= idx; i--) {
    this.children[i].moveValuesTo(this.children[i+1]);
  }

  // Initialize the blank node we've created with default values
  this.children[idx].resetValues();

  // XXX: new array item won't follow upper level default.
  this.children[idx].computeInitialValues(null, false, this.children[idx].arrayPath.length);

  // Re-render all children that have changed
  for (i = idx; i < this.children.length; i++) {
    this.children[i].render(domElement);
  }
};


/**
 * Remove an item from an array
 *
 * @function
 * @param {Number} idx The index number of the item to remove
 */
formNode.prototype.deleteArrayItem = function (idx) {
  var i = 0;
  var child = null;

  // Delete last item if no index is given
  if (idx === undefined) {
    idx = this.children.length - 1;
  }

  // Move values up in the array
  for (i = idx; i < this.children.length-1; i++) {
    this.children[i+1].moveValuesTo(this.children[i]);
    this.children[i].render();
  }

  // Remove the last array item from the DOM tree and from the form tree
  this.removeChild();
};

/**
 * Returns the minimum/maximum number of items that an array field
 * is allowed to have according to the schema definition of the fields
 * it contains.
 *
 * The function parses the schema definitions of the array items that
 * compose the current "array" node and returns the minimum value of
 * "maxItems" it encounters as the maximum number of items, and the
 * maximum value of "minItems" as the minimum number of items.
 *
 * The function reports a -1 for either of the boundaries if the schema
 * does not put any constraint on the number of elements the current
 * array may have of if the current node is not an array.
 *
 * Note that array boundaries should be defined in the JSON Schema using
 * "minItems" and "maxItems". The code also supports "minLength" and
 * "maxLength" as a fallback, mostly because it used to by mistake (see #22)
 * and because other people could make the same mistake.
 *
 * @function
 * @return {Object} An object with properties "minItems" and "maxItems"
 *  that reports the corresponding number of items that the array may
 *  have (value is -1 when there is no constraint for that boundary)
 */
formNode.prototype.getArrayBoundaries = function () {
  var boundaries = {
    minItems: -1,
    maxItems: -1
  };

  if (!this.view || !this.view.array) return boundaries;

  var getNodeBoundaries = function (node, initialNode) {
    var schemaKey = null;
    var arrayKey = null;
    var boundaries = {
      minItems: -1,
      maxItems: -1
    };
    initialNode = initialNode || node;

    if (node.view && node.view.array && (node !== initialNode)) {
      // New array level not linked to an array in the schema,
      // so no size constraints
      return boundaries;
    }

    if (node.key) {
      // Note the conversion to target the actual array definition in the
      // schema where minItems/maxItems may be defined. If we're still looking
      // at the initial node, the goal is to convert from:
      //  foo[0].bar[3].baz to foo[].bar[].baz
      // If we're not looking at the initial node, the goal is to look at the
      // closest array parent:
      //  foo[0].bar[3].baz to foo[].bar
      arrayKey = node.key.replace(/\[[0-9]+\]/g, '[]');
      if (node !== initialNode) {
        arrayKey = arrayKey.replace(/\[\][^\[\]]*$/, '');
      }
      schemaKey = getSchemaKey(
        node.ownerTree.formDesc.schema.properties,
        arrayKey
      );
      if (!schemaKey) return boundaries;

      if (schemaKey.minItems >= 0) {
        boundaries.minItems = schemaKey.minItems;
      }

      if (schemaKey.minLength >= 0) {
        boundaries.minItems = schemaKey.minLength;
      }

      if (schemaKey.maxItems >= 0) {
        boundaries.maxItems = schemaKey.maxItems;
      }

      if (schemaKey.maxLength >= 0) {
        boundaries.maxItems = schemaKey.maxLength;
      }

      return boundaries;
    }
    else {
      _.each(node.children, function (child) {
        var subBoundaries = getNodeBoundaries(child, initialNode);
        if (subBoundaries.minItems !== -1) {
          if (boundaries.minItems !== -1) {
            boundaries.minItems = Math.max(
              boundaries.minItems,
              subBoundaries.minItems
            );
          }
          else {
            boundaries.minItems = subBoundaries.minItems;
          }
        }
        if (subBoundaries.maxItems !== -1) {
          if (boundaries.maxItems !== -1) {
            boundaries.maxItems = Math.min(
              boundaries.maxItems,
              subBoundaries.maxItems
            );
          }
          else {
            boundaries.maxItems = subBoundaries.maxItems;
          }
        }
      });
    }
    return boundaries;
  };
  return getNodeBoundaries(this);
};


/**
 * Form tree class.
 *
 * Holds the internal representation of the form.
 * The tree is always in sync with the rendered form, this allows to parse
 * it easily.
 *
 * @class
 */
var formTree = function () {
  this.eventhandlers = [];
  this.root = null;
  this.formDesc = null;
};

/**
 * Initializes the form tree structure from the JSONForm object
 *
 * This function is the main entry point of the JSONForm library.
 *
 * Initialization steps:
 * 1. the internal tree structure that matches the JSONForm object
 *  gets created (call to buildTree)
 * 2. initial values are computed from previously submitted values
 *  or from the default values defined in the JSON schema.
 *
 * When the function returns, the tree is ready to be rendered through
 * a call to "render".
 *
 * @function
 */
formTree.prototype.initialize = function (formDesc) {
  formDesc = formDesc || {};

  // Keep a pointer to the initial JSONForm
  // (note clone returns a shallow copy, only first-level is cloned)
  this.formDesc = _.clone(formDesc);

  jsonform.defaultClasses = getDefaultClasses(this.formDesc.isBootstrap2 || jsonform.isBootstrap2);
  this.defaultClasses = _.clone(jsonform.defaultClasses);
  if (this.formDesc.defaultClasses)
    _.extend(this.defaultClasses, this.formDesc.defaultClasses);

  // Compute form prefix if no prefix is given.
  this.formDesc.prefix = this.formDesc.prefix ||
    'jsonform-' + _.uniqueId();

  // JSON schema shorthand
  if (this.formDesc.schema && !this.formDesc.schema.properties) {
    this.formDesc.schema = {
      properties: this.formDesc.schema
    };
  }

  // Schema V4 adjust, required field moved to top level of the schema
  var processedSchemaNodes = []; // prevent inner dead loop.
  function convertSchemaV3ToV4(schema) {
    if (schema && schema.properties) {
      var required = Array.isArray(schema.required) ? schema.required : [];
      for (var field in schema.properties) {
        var fieldSchema = schema.properties[field];
        if (fieldSchema.required === true) {
          if (required.indexOf(field) < 0)
            required.push(field);
        }
        else if (fieldSchema.required !== undefined && fieldSchema.required !== false && !Array.isArray(fieldSchema.required))
          throw new Error('field ' + field + "'s required property should be either boolean or array of strings");
        if (fieldSchema.type === 'object') {
          if (processedSchemaNodes.indexOf(fieldSchema) < 0) {
            processedSchemaNodes.push(fieldSchema);
            convertSchemaV3ToV4(fieldSchema);
          }
        }
        else
          delete fieldSchema.required;
        if (fieldSchema.type === 'array' && fieldSchema.items) {
          if (Array.isArray(fieldSchema.items)) {
            throw new Error('the items property of array property ' + field + ' in the schema definition must be an object');
          }
          if (fieldSchema.items.type === 'object') {
            if (processedSchemaNodes.indexOf(fieldSchema.items) < 0) {
              processedSchemaNodes.push(fieldSchema.items);
              convertSchemaV3ToV4(fieldSchema.items);
            }
          }
        }
      }
      if (required.length > 0)
        schema.required = required;
      else
        delete schema.required;
    }
  }
  convertSchemaV3ToV4(this.formDesc.schema);
  if (this.formDesc.schema.definitions) {
    for(var definition in this.formDesc.schema.definitions) {
      convertSchemaV3ToV4(this.formDesc.schema.definitions[definition]);
    }
  }

  this.formDesc._originalSchema = this.formDesc.schema;
  this.formDesc.schema = JSON.parse(JSON.stringify(this.formDesc.schema));

  // Resolve inline $ref definitions, result schema not work with z-schema at least
  var resolvedSchemaRefNodes = [];
  function resolveRefs(obj, defs)
  {
    Object.keys(obj).forEach(function(prop, index, array){
      var def = obj[prop];
      if (def !== null && typeof def === 'object') {
        if (def.$ref) {
          if (def.$ref.slice(0, 14) === '#/definitions/') {
            var ref = def.$ref.replace(/^#\/definitions\//, '');
            obj[prop] = defs[ref];
          }
          else {
            x3_log('Unresolved $ref: ' + def.$ref);
          }
        }
        else if (resolvedSchemaRefNodes.indexOf(def) < 0) {
          resolveRefs(def, defs);
          resolvedSchemaRefNodes.push(def);
        }
      }
    })
  }

  if (this.formDesc.schema.definitions) {
    resolveRefs(this.formDesc.schema, this.formDesc.schema.definitions);
  }

  // Ensure layout is set
  this.formDesc.form = this.formDesc.form || [
    '*',
    {
      type: 'actions',
      items: [
        {
          type: 'submit',
          value: 'Submit'
        }
      ]
    }
  ];
  this.formDesc.form = (_.isArray(this.formDesc.form) ?
    this.formDesc.form :
    [this.formDesc.form]);

  this.formDesc.params = this.formDesc.params || {};

  // Create the root of the tree
  this.root = new formNode();
  this.root.ownerTree = this;
  this.root.view = jsonform.elementTypes['root'];

  // Generate the tree from the form description
  this.buildTree();

  // Compute the values associated with each node
  // (for arrays, the computation actually creates the form nodes)
  this.computeInitialValues();
};


/**
 * Constructs the tree from the form description.
 *
 * The function must be called once when the tree is first created.
 *
 * @function
 */
formTree.prototype.buildTree = function () {
  // Parse and generate the form structure based on the elements encountered:
  // - '*' means "generate all possible fields using default layout"
  // - a key reference to target a specific data element
  // - a more complex object to generate specific form sections
  _.each(this.formDesc.form, function (formElement) {
    if (formElement === '*') {
      _.each(this.formDesc.schema.properties, function (element, key) {
        if (this.formDesc.nonDefaultFormItems && this.formDesc.nonDefaultFormItems.indexOf(key) >= 0)
          return;
        this.root.appendChild(this.buildFromLayout({
          key: key
        }));
      }, this);
    }
    else {
      if (_.isString(formElement)) {
        formElement = {
          key: formElement
        };
      }
      this.root.appendChild(this.buildFromLayout(formElement));
    }
  }, this);
};


/**
 * Builds the internal form tree representation from the requested layout.
 *
 * The function is recursive, generating the node children as necessary.
 * The function extracts the values from the previously submitted values
 * (this.formDesc.value) or from default values defined in the schema.
 *
 * @function
 * @param {Object} formElement JSONForm element to render
 * @param {Object} context The parsing context (the array depth in particular)
 * @return {Object} The node that matches the element.
 */
formTree.prototype.buildFromLayout = function (formElement, context) {
  var schemaElement = null;
  var node = new formNode();
  var view = null;
  var key = null;

  // XXX: we now support setup formElement for specific key by customFormItems
  if (formElement.key && this.formDesc.customFormItems) {
    var formEl = this.formDesc.customFormItems[formElement.key];
    if (formEl !== undefined) {
      formEl.key = formElement.key;
      formElement = formEl;
    }
  }

  // The form element parameter directly comes from the initial
  // JSONForm object. We'll make a shallow copy of it and of its children
  // not to pollute the original object.
  // (note JSON.parse(JSON.stringify()) cannot be used since there may be
  // event handlers in there!)
  formElement = _.clone(formElement);
  if (formElement.items) {
    if (_.isArray(formElement.items)) {
      formElement.items = _.map(formElement.items, _.clone);
    }
    else {
      formElement.items = [ _.clone(formElement.items) ];
    }
  }

  if (formElement.key) {
    // The form element is directly linked to an element in the JSON
    // schema. The properties of the form element override those of the
    // element in the JSON schema. Properties from the JSON schema complete
    // those of the form element otherwise.

    // Retrieve the element from the JSON schema
    schemaElement = getSchemaKey(
      this.formDesc.schema.properties,
      formElement.key);
    if (!schemaElement) {
      // The JSON Form is invalid!
      throw new Error('The JSONForm object references the schema key "' +
        formElement.key + '" but that key does not exist in the JSON schema');
    }

    // Schema element has just been found, let's trigger the
    // "onElementSchema" event
    // (tidoust: not sure what the use case for this is, keeping the
    // code for backward compatibility)
    if (this.formDesc.onElementSchema) {
      this.formDesc.onElementSchema(formElement, schemaElement);
    }

    formElement.name =
      formElement.name ||
      formElement.key;
    formElement.title =
      formElement.title ||
      schemaElement.title;
    formElement.description =
      formElement.description ||
      schemaElement.description;
    formElement.readOnly =
      formElement.readOnly ||
      schemaElement.readOnly ||
      formElement.readonly ||
      schemaElement.readonly;

      // A input field should be marked required unless formElement mark required
      // or it's an array's item's required field
      // or it's a required field of a required object (need verify the object parent chain's required)
    function isRequiredField(key, schema) {
      var parts = key.split('.');
      var field = parts.pop();
      // whether an array element field is required?
      // array element has minItems and maxItems which control whether the item is required
      // so, for array item, we do not consider it as required
      // then for array itself? it maybe required or not, yes. so, what does it matter?
      // a required array always has value, even empty array, it still cound has value.
      // a non-required array, can not appear in the result json at all.
      // here we try to figure out whether a form input element should be mark required.
      // all of them are default non-required, unless:
      // 1. it's top level element and it's marked required
      // 2. it's direct child of an array item and it's marked required
      // 3. it's direct child of an object and both it and its parent are marked required.
      if (field.slice(-2) == '[]') return false;
      var parentKey = parts.join('.');
      var required = false;
      // we need get parent schema's required value
      if (!parentKey) {
        required = schema.required && schema.required.indexOf(field) >= 0;
      }
      else {
        var parentSchema = getSchemaKey(schema.properties, parentKey);
        required = parentSchema.required && parentSchema.required.indexOf(field) >= 0;
        if (required)
          required = parentKey.slice(-2) == '[]' || isRequiredField(parentKey, schema);
      }
      return required;
    }
    formElement.required = formElement.required === true || schemaElement.required === true || isRequiredField(formElement.key, this.formDesc.schema);

    // Compute the ID of the input field
    if (!formElement.id) {
      formElement.id = escapeSelector(this.formDesc.prefix) +
        '-elt-' + formElement.key;
    }

    // Should empty strings be included in the final value?
    // TODO: it's rather unclean to pass it through the schema.
    if (formElement.allowEmpty) {
      schemaElement._jsonform_allowEmpty = true;
    }

    // If the form element does not define its type, use the type of
    // the schema element.
    if (!formElement.type) {
      if ((schemaElement.type === 'string') &&
        (schemaElement.format === 'color')) {
        formElement.type = 'color';
      } else if ((schemaElement.type === 'number' ||
          schemaElement.type === 'integer') &&
        !schemaElement['enum']) {
        formElement.type = 'number';
      } else if ((schemaElement.type === 'string' ||
          schemaElement.type === 'any') &&
        !schemaElement['enum']) {
        formElement.type = 'text';
      } else if (schemaElement.type === 'boolean') {
        formElement.type = 'checkbox';
      } else if (schemaElement.type === 'object') {
        if (schemaElement.properties) {
          formElement.type = 'fieldset';
        } else {
          formElement.type = 'textarea';
        }
      } else if (!_.isUndefined(schemaElement['enum'])) {
        formElement.type = 'select';
      } else {
        formElement.type = schemaElement.type;
      }
    }

    function prepareOptions(formElement, enumValues) {
      if (formElement.options) {
        if (Array.isArray(formElement.options)) {
          formElement.options = formElement.options.map(function(value) {
            return hasOwnProperty(value, 'value') ? value : {
              value: value,
              title: value
            };
          });
        }
        else if (typeof formElement.options === 'object') {
          // titleMap like options
          formElement.options = Object.keys(formElement.options).map(function(value) {
            return {
              value: value,
              title: formElement.options[value]
            };
          });
        }
      }
      else if (formElement.titleMap) {
        formElement.options = _.map(enumValues, function (value) {
          var title = value.toString();
          return {
            value: value,
            title: hasOwnProperty(formElement.titleMap, title) ? formElement.titleMap[title] : title
          };
        });
      }
      else {
        formElement.options = enumValues.map(function(value) {
          return {
            value: value,
            title: value.toString()
          };
        });
      }
    }
    // Unless overridden in the definition of the form element (or unless
    // there's a titleMap defined), use the enumeration list defined in
    // the schema
    if (formElement.options) {
      // FIXME: becareful certin type form element may has special format for options
      prepareOptions(formElement);
    }
    else if (schemaElement['enum'] || schemaElement.type === 'boolean') {
      var enumValues = schemaElement['enum'];
      if (!enumValues) {
        enumValues = formElement.type === 'select' ? ['', true, false] : [true, false];
      }
      else {
        formElement.optionsAsEnumOrder = true;
      }
      prepareOptions(formElement, enumValues);
    }

    // Flag a list of checkboxes with multiple choices
    if ((formElement.type === 'checkboxes' || formElement.type === 'checkboxbuttons') && schemaElement.items) {
      var theItem = Array.isArray(schemaElement.items) ? schemaElement.items[0] : schemaElement.items;
      if (formElement.options) {
        // options only but no enum mode, since no enum, we can use only the value mode
        prepareOptions(formElement);
        theItem._jsonform_checkboxes_as_array = 'value';
      }
      else {
        var enumValues = theItem['enum'];
        if (enumValues) {
          prepareOptions(formElement, enumValues);
          formElement.optionsAsEnumOrder = true;
          theItem._jsonform_checkboxes_as_array = formElement.type === 'checkboxes' ? true : 'value';
        }
      }
    }
    if (formElement.getValue === 'tagsinput') {
      schemaElement._jsonform_get_value_by_tagsinput = 'tagsinput';
    }

    // If the form element targets an "object" in the JSON schema,
    // we need to recurse through the list of children to create an
    // input field per child property of the object in the JSON schema
    if (schemaElement.type === 'object') {
      _.each(schemaElement.properties, function (prop, propName) {
        var key = formElement.key + '.' + propName;
        if (this.formDesc.nonDefaultFormItems && this.formDesc.nonDefaultFormItems.indexOf(key) >= 0)
          return;
        node.appendChild(this.buildFromLayout({
          key: key
        }));
      }, this);
    }
  }

  if (!formElement.type) {
    formElement.type = 'text';
  }
  view = jsonform.elementTypes[formElement.type];
  if (!view) {
    throw new Error('The JSONForm contains an element whose type is unknown: "' +
      formElement.type + '"');
  }


  if (schemaElement) {
    // The form element is linked to an element in the schema.
    // Let's make sure the types are compatible.
    // In particular, the element must not be a "container"
    // (or must be an "object" or "array" container)
    if (!view.inputfield && !view.array &&
      (formElement.type !== 'selectfieldset') &&
      (schemaElement.type !== 'object')) {
      throw new Error('The JSONForm contains an element that links to an ' +
        'element in the JSON schema (key: "' + formElement.key + '") ' +
        'and that should not based on its type ("' + formElement.type + '")');
    }
  }
  else {
    // The form element is not linked to an element in the schema.
    // This means the form element must be a "container" element,
    // and must not define an input field.
    if (view.inputfield && (formElement.type !== 'selectfieldset')) {
      throw new Error('The JSONForm defines an element of type ' +
        '"' + formElement.type + '" ' +
        'but no "key" property to link the input field to the JSON schema');
    }
  }

  // A few characters need to be escaped to use the ID as jQuery selector
  formElement.iddot = escapeSelector(formElement.id || '');

  // Initialize the form node from the form element and schema element
  node.formElement = formElement;
  node.schemaElement = schemaElement;
  node.view = view;
  node.ownerTree = this;

  // Set event handlers
  if (!formElement.handlers) {
    formElement.handlers = {};
  }

  // Parse children recursively
  if (node.view.array) {
    // Do not create childTemplate until we first use it.
  }
  else if (formElement.items) {
    // The form element defines children elements
    _.each(formElement.items, function (item) {
      if (_.isString(item)) {
        item = { key: item };
      }
      node.appendChild(this.buildFromLayout(item));
    }, this);
  }
  else if (formElement.otherField) {
    var item = formElement.otherField;
    if (_.isString(item)) {
      item = formElement.otherField = { key: item, notitle: true };
    }
    else if (item.notitle === undefined){
      item.notitle = true;
    }
    if (item.inline === undefined)
      item.inline = formElement.inline;
    node.appendChild(this.buildFromLayout(item));
  }

  return node;
};


/**
 * Computes the values associated with each input field in the tree based
 * on previously submitted values or default values in the JSON schema.
 *
 * For arrays, the function actually creates and inserts additional
 * nodes in the tree based on previously submitted values (also ensuring
 * that the array has at least one item).
 *
 * The function sets the array path on all nodes.
 * It should be called once in the lifetime of a form tree right after
 * the tree structure has been created.
 *
 * @function
 */
formTree.prototype.computeInitialValues = function () {
  this.root.computeInitialValues(this.formDesc.value);
};


/**
 * Renders the form tree
 *
 * @function
 * @param {Node} domRoot The "form" element in the DOM tree that serves as
 *  root for the form
 */
formTree.prototype.render = function (domRoot) {
  if (!domRoot) return;
  this.domRoot = domRoot;
  this.root.render();

  // If the schema defines required fields, flag the form with the
  // "jsonform-hasrequired" class for styling purpose
  // (typically so that users may display a legend)
  if (this.hasRequiredField()) {
    $(domRoot).addClass('jsonform-hasrequired');
  }
  $(domRoot).addClass('jsonform');
};

/**
 * Walks down the element tree with a callback
 *
 * @function
 * @param {Function} callback The callback to call on each element
 */
formTree.prototype.forEachElement = function (callback) {

  var f = function(root) {
    for (var i=0;i<root.children.length;i++) {
      callback(root.children[i]);
      f(root.children[i]);
    }
  };
  f(this.root);

};

formTree.prototype.validate = function(noErrorDisplay) {

  var values = jsonform.getFormValue(this.domRoot);
  var errors = false;

  var options = this.formDesc;

  if (options.validate!==false) {
    var validator = false;
    if (typeof options.validate!="object") {
      if (global.ZSchema) {
        validator = new global.ZSchema();
        validator._vendor = 'z-schema';
      } else if (global.jjv) {
        validator = global.jjv();
        validator._vendor = 'jjv';
      } else if (global.JSONFormValidator) {
        validator = global.JSONFormValidator.createEnvironment("json-schema-draft-03");
        validator._vendor = 'jsv';
      }
    } else {
      validator = options.validate;
    }
    if (validator) {
      $(this.domRoot).jsonFormErrors(false,options);
      if (validator._vendor == 'jjv') {
        var v = validator.validate(this.formDesc._originalSchema, values);
        if (v) {
          errors = [v];
        }
      }
      else {
        var v = validator.validate(values, this.formDesc._originalSchema);
        if (validator._vendor == 'z-schema') {
          errors = validator.getLastErrors();
          v = v ? null : {errors: errors};
        }
        else if (v && v.errors && v.errors.length) {
          if (!errors) errors = [];
          errors = errors.concat(v.errors);
        }
      }
    }
  }

  if (errors && !noErrorDisplay) {
    if (options.displayErrors) {
      options.displayErrors(errors,this.domRoot);
    } else {
      $(this.domRoot).jsonFormErrors(errors,options);
    }
  }

  return {"errors": errors, "values": values};

}

formTree.prototype.submit = function(evt) {

  var stopEvent = function() {
    if (evt) {
      evt.preventDefault();
      evt.stopPropagation();
    }
    return false;
  };
  var values = jsonform.getFormValue(this.domRoot);
  var options = this.formDesc;

  var brk=false;
  this.forEachElement(function(elt) {
    if (brk) return;
    if (elt.view.onSubmit) {
      brk = !elt.view.onSubmit(evt, elt); //may be called multiple times!!
    }
  });

  if (brk) return stopEvent();

  var validated = this.validate();

  if (options.onSubmit && !options.onSubmit(validated.errors,values)) {
    return stopEvent();
  }

  if (validated.errors) return stopEvent();

  if (options.onSubmitValid && !options.onSubmitValid(values)) {
    return stopEvent();
  }

  return false;

};


/**
 * Returns true if the form displays a "required" field.
 *
 * To keep things simple, the function just return true if detect any
 * jsonform-required class in the form dom.
 *
 * @function
 * @return {boolean} True when the form has some required field,
 *  false otherwise.
 */
formTree.prototype.hasRequiredField = function () {
  return $(this.domRoot).find('.jsonform-required').length > 0;
};


/**
 * Returns the structured object that corresponds to the form values entered
 * by the use for the given form.
 *
 * The form must have been previously rendered through a call to jsonform.
 *
 * @function
 * @param {Node} The <form> tag in the DOM
 * @return {Object} The object that follows the data schema and matches the
 *  values entered by the user.
 */
jsonform.getFormValue = function (formelt) {
  var form = $(formelt).data('jsonform-tree');
  if (!form) return null;
  return form.root.getFormValues();
};


/**
 * Highlights errors reported by the JSON schema validator in the document.
 *
 * @function
 * @param {Object} errors List of errors reported by the JSON schema validator
 * @param {Object} options The JSON Form object that describes the form
 *  (unused for the time being, could be useful to store example values or
 *   specific error messages)
 */
$.fn.jsonFormErrors = function(errors, options) {
  var form = $(this).data("jsonform-tree");
  $("."+form.defaultClasses.groupMarkClassPrefix+"error", this).removeClass(form.defaultClasses.groupMarkClassPrefix+"error");
  $("."+form.defaultClasses.groupMarkClassPrefix+"warning", this).removeClass(form.defaultClasses.groupMarkClassPrefix+"warning");

  $(".jsonform-errortext", this).hide();
  if (!errors) return;

  var errorSelectors = [];
  for (var i = 0; i < errors.length; i++) {
    // Compute the address of the input field in the form from the URI
    // returned by the JSON schema validator.
    // These URIs typically look like:
    //  urn:uuid:cccc265e-ffdd-4e40-8c97-977f7a512853#/pictures/1/thumbnail
    // What we need from that is the path in the value object:
    //  pictures[1].thumbnail
    // ... and the jQuery-friendly class selector of the input field:
    //  .jsonform-error-pictures\[1\]---thumbnail
    var key = errors[i].uri || errors[i].path;
    if (['OBJECT_DEPENDENCY_KEY', 'OBJECT_MISSING_REQUIRED_PROPERTY'].indexOf(errors[i].code) >= 0) {
      if (key.slice(-1) != '/')
        key += '/';
      key += errors[i].params[0];
    }
    if (key) {
      key = key.replace(/.*#\//, '')
        .replace(/\//g, '.')
        .replace(/\.([0-9]+)(?=\.|$)/g, '[$1]');
      //var formElement = getSchemaKey(formSchema.properties, name);
      var errormarkerclass = ".jsonform-error-" +
        escapeSelector(key.replace(/\./g,"---"));
      errorSelectors.push(errormarkerclass);

      var errorType = errors[i].type || "error";
      var $node = $(errormarkerclass, this);
      // FIXME: Ideally, we should retrieve the formNode or formElement
      //        But becuase we generate html as text, and did not have a direct
      //        way get the formNode or formElement from the key...
      if (errors[i].code == 'ARRAY_LENGTH_SHORT' && ['checkboxes', 'checkboxbuttons'].indexOf($node.data('jsonform-type')) >= 0) {
        errors[i].message = 'Please select at least ' + errors[i].params[1] + (errors[i].params[1] > 1 ? ' options' : ' option') + ' above.';
      }
      $node.addClass(form.defaultClasses.groupMarkClassPrefix + errorType);
      $node.find("> div > .jsonform-errortext, > .jsonform-errortext").text(errors[i].message).show();
    }
  }

  // Look for the first error in the DOM and ensure the element
  // is visible so that the user understands that something went wrong
  errorSelectors = errorSelectors.join(',');
  var $errorSelectors = $(errorSelectors, this);
  // XXX: check invisible panels if error happens there
  var $errorInvisiblePanels = $errorSelectors.parents('.tab-pane');
  var $errorTabs = $();
  $errorInvisiblePanels.each(function() {
    var $this = $(this);
    $errorTabs = $errorTabs.add($this.closest('.tabbable').find('> .nav > li').eq($this.index()).addClass(form.defaultClasses.groupMarkClassPrefix + 'error'));
  });

  var firstError = $errorSelectors.filter(':visible').get(0);
  if (!firstError && $errorTabs.length > 0){
    firstError = $errorTabs.get(0);
  }
  if (firstError && firstError.scrollIntoView) {
    firstError.scrollIntoView(true, {
      behavior: 'smooth'
    });
  }
};


/**
 * Generates the HTML form from the given JSON Form object and renders the form.
 *
 * Main entry point of the library. Defined as a jQuery function that typically
 * needs to be applied to a <form> element in the document.
 *
 * The function handles the following properties for the JSON Form object it
 * receives as parameter:
 * - schema (required): The JSON Schema that describes the form to render
 * - form: The options form layout description, overrides default layout
 * - prefix: String to use to prefix computed IDs. Default is an empty string.
 *  Use this option if JSON Form is used multiple times in an application with
 *  schemas that have overlapping parameter names to avoid running into multiple
 *  IDs issues. Default value is "jsonform-[counter]".
 * - transloadit: Transloadit parameters when transloadit is used
 * - validate: Validates form against schema upon submission. Uses the value
 * of the "validate" property as validator if it is an object.
 * - displayErrors: Function to call with errors upon form submission.
 *  Default is to render the errors next to the input fields.
 * - submitEvent: Name of the form submission event to bind to.
 *  Default is "submit". Set this option to false to avoid event binding.
 * - onSubmit: Callback function to call when form is submitted
 * - onSubmitValid: Callback function to call when form is submitted without
 *  errors.
 *
 * @function
 * @param {Object} options The JSON Form object to use as basis for the form
 */
$.fn.jsonForm = function(options, param1) {
  if (options === 'values') {
    return jsonform.getFormValue(this);
  }
  if (options === 'submit') {
    var form = this.data('jsonform-tree');
    if (!form) return null;
    return form.submit();
  }
  if (options === 'validate') {
    var form = this.data('jsonform-tree');
    if (!form) return null;
    return form.validate(param1);
  }

  var formElt = this;

  options = _.defaults({}, options, {submitEvent: 'submit'});

  var form = new formTree();
  form.initialize(options);
  form.render(formElt.get(0));

  // TODO: move that to formTree.render
  if (options.transloadit) {
    formElt.append('<input type="hidden" name="params" value=\'' +
      escapeHTML(JSON.stringify(options.transloadit.params)) +
      '\'>');
  }

  // Keep a direct pointer to the JSON schema for form submission purpose
  formElt.data("jsonform-tree", form);

  if (options.submitEvent) {
    formElt.unbind((options.submitEvent)+'.jsonform');
    formElt.bind((options.submitEvent)+'.jsonform', function(evt) {
      form.submit(evt);
    });
  }

  // Initialize tabs sections, if any
  initializeTabs(formElt);

  // Initialize expandable sections, if any
  $('.expandable > div, .expandable > fieldset', formElt).hide();
  formElt.on('click', '.expandable > legend', function () {
    var parent = $(this).parent();
    parent.toggleClass('expanded');
    $('> div', parent).slideToggle(100);
  });

  return form;
};


/**
 * Retrieves the structured values object generated from the values
 * entered by the user and the data schema that gave birth to the form.
 *
 * Defined as a jQuery function that typically needs to be applied to
 * a <form> element whose content has previously been generated by a
 * call to "jsonForm".
 *
 * Unless explicitly disabled, the values are automatically validated
 * against the constraints expressed in the schema.
 *
 * @function
 * @return {Object} Structured values object that matches the user inputs
 *  and the data schema.
 */
$.fn.jsonFormValue = function() {
  return jsonform.getFormValue(this);
};

// Expose the getFormValue method to the global object
// (other methods exposed as jQuery functions)
if (!global.JSONForm) {
  global.JSONForm = jsonform;
}

})((typeof exports !== 'undefined'),
  ((typeof exports !== 'undefined') ? exports : window),
  ((typeof jQuery !== 'undefined') ? jQuery : { fn: {} }),
  ((typeof _ !== 'undefined') ? _ : null),
  JSON);

// jQuery File Tree Plugin
//
// Version 1.01
//
// Cory S.N. LaViska
// A Beautiful Site (http://abeautifulsite.net/)
// 24 March 2008
//
// Visit http://abeautifulsite.net/notebook.php?article=58 for more information
//
// Usage: $('.fileTreeDemo').fileTree( options, callback )
//
// Options:  root           - root folder to display; default = /
//           script         - location of the serverside AJAX file to use; default = jqueryFileTree.php
//           folderEvent    - event to trigger expand/collapse; default = click
//           expandSpeed    - default = 500 (ms); use -1 for no animation
//           collapseSpeed  - default = 500 (ms); use -1 for no animation
//           expandEasing   - easing function to use on expand (optional)
//           collapseEasing - easing function to use on collapse (optional)
//           multiFolder    - whether or not to limit the browser to one subfolder at a time
//           loadMessage    - Message to display while initial tree loads (can be HTML)
//
// History:
//
// 1.01 - updated to work with foreign characters in directory/file names (12 April 2008)
// 1.00 - released (24 March 2008)
//
// TERMS OF USE
// 
// This plugin is dual-licensed under the GNU General Public License and the MIT License and
// is copyright 2008 A Beautiful Site, LLC. 
//

if(jQuery) (function($){
	
	$.extend($.fn, {
		fileTree: function(o, h) {
			// Defaults
			if( !o ) var o = {};
			if( o.root == undefined ) o.root = '/';
			if( o.script == undefined ) o.script = 'jqueryFileTree.php';
			if( o.folderEvent == undefined ) o.folderEvent = 'click';
			if( o.expandSpeed == undefined ) o.expandSpeed= 500;
			if( o.collapseSpeed == undefined ) o.collapseSpeed= 500;
			if( o.expandEasing == undefined ) o.expandEasing = null;
			if( o.collapseEasing == undefined ) o.collapseEasing = null;
			if( o.multiFolder == undefined ) o.multiFolder = true;
			if( o.loadMessage == undefined ) o.loadMessage = 'Loading...';

			$(this).each( function() {
				
				function showTree(c, t) {
                    if(t.search("%") >= 0)
                    {
                        var new_t = t.split("%");
                        var end = new_t.length - 1;
                        var n = -1;
                        new_t[end] = new_t[end].replace("/", "");
                        $.get("filemanager_js/utf-8.txt", function(data) {
                            var utf_8 = data.split('\n');
                            var new_utf_8 = "";
                            for(var i in new_t)
                            {
                                if(i > 0)
                                {
                                    for(var j in utf_8)
                                    {

                                        n = utf_8[j].indexOf(new_t[i]);
                                        if(n > -1)
                                        {
                                            new_utf_8 = utf_8[j].split(";");
                                            new_utf_8 = new_utf_8[1].split("\t")
                                            new_t[i] = new_utf_8[1];
                                        }
                                    }
                                }
                            }
                            new_t = new_t.join('');
                            t = new_t+"/";
                            $(c).addClass('wait');
                            $(".jqueryFileTree.start").remove();
                            $.post(o.script, { dir: t, sign: here }, function(data) {
                                $(c).find('.start').html('');
                                $(c).removeClass('wait').append(data);
                                if( o.root == t ) $(c).find('UL:hidden').show(); else $(c).find('UL:hidden').slideDown({ duration: o.expandSpeed, easing: o.expandEasing });
                                bindTree(c);
                            });
                        });
                    }
                    else
                    {
                        $(c).addClass('wait');
                        $(".jqueryFileTree.start").remove();
                        $.post(o.script, { dir: t, sign: here }, function(data) {
                            $(c).find('.start').html('');
                            $(c).removeClass('wait').append(data);
                            if( o.root == t ) $(c).find('UL:hidden').show(); else $(c).find('UL:hidden').slideDown({ duration: o.expandSpeed, easing: o.expandEasing });
                            bindTree(c);
                        });
                    }

				}

                function bindTree(t) {
                    $(t).find('LI A').bind(o.folderEvent, function() {
                        if( $(this).parent().hasClass('directory') ) {
                            if( $(this).parent().hasClass('collapsed') ) {
                                // Expand
                                if( !o.multiFolder ) {
                                    $(this).parent().parent().find('UL').slideUp({ duration: o.collapseSpeed, easing: o.collapseEasing });
                                    $(this).parent().parent().find('LI.directory').removeClass('expanded').addClass('collapsed');
                                }
                                $(this).parent().find('UL').remove(); // cleanup
                                showTree( $(this).parent(), escape($(this).attr('rel').match( /.*\// )) );
                                $(this).parent().removeClass('collapsed').addClass('expanded');
                            } else {
                                // Collapse
                                $(this).parent().find('UL').slideUp({ duration: o.collapseSpeed, easing: o.collapseEasing });
                                $(this).parent().removeClass('expanded').addClass('collapsed');
                            }
                        } else {
                            h($(this).attr('rel'));
                        }
                        return false;
                    });
                    // Prevent A from triggering the # on non-click events
                    if( o.folderEvent.toLowerCase != 'click' ) $(t).find('LI A').bind('click', function() { this_dir_selected = h($(this).attr('rel')); });

                }
				// Loading message
				$(this).html('<ul class="jqueryFileTree start"><li class="wait">' + o.loadMessage + '<li></ul>');
				// Get the initial file list
				showTree( $(this), escape(o.root) );
			});
		}
	});


    $.extend($.fn, {
        leftFileTree: function(o, h) {
            // Defaults
            if( !o ) var o = {};
            if( o.root == undefined ) o.root = '/';
            if( o.script == undefined ) o.script = 'folderMenu.php';
            if( o.folderEvent == undefined ) o.folderEvent = 'click';
            if( o.expandSpeed == undefined ) o.expandSpeed= 500;
            if( o.collapseSpeed == undefined ) o.collapseSpeed= 500;
            if( o.expandEasing == undefined ) o.expandEasing = null;
            if( o.collapseEasing == undefined ) o.collapseEasing = null;
            if( o.multiFolder == undefined ) o.multiFolder = true;
            if( o.loadMessage == undefined ) o.loadMessage = 'Loading...';

            $(this).each( function() {

                function showTree(c, t) {
                    $(c).addClass('wait');
                    $(".jqueryFileTree.start").remove();
                    $.post(o.script, { dir: t, sign: here }, function(data) {
                        $(c).find('.start').html('');
                        $(c).removeClass('wait').append(data);
                        if( o.root == t ) $(c).find('UL:hidden').show(); else $(c).find('UL:hidden').slideDown({ duration: o.expandSpeed, easing: o.expandEasing });
                    });
                }

                if( first_flag == true )
                {
                    // Loading message
                    $(this).html('<ul class="jqueryFileTree start"><li class="wait">' + o.loadMessage + '<li></ul>');
                    // Get the initial file list
                    showTree( $(this), escape(o.root) );
                }

            });
        }
    });
	
})(jQuery);



var open_folders = new Array();
var repeat_flag = true;
var lick = true;
var open_all = true;
function fileTreeToggle( user, obj )
{
    if( lick ) {
        var c = "#left_folder_menu_box";
        if( !o ) var o = {};
        if( o.root == undefined ) o.root = '/';
        if( o.script == undefined ) o.script = user+'folderMenu.php';
        if( o.folderEvent == undefined ) o.folderEvent = 'click';
        if( o.expandSpeed == undefined ) o.expandSpeed= 100;
        if( o.collapseSpeed == undefined ) o.collapseSpeed= 100;
        if( o.expandEasing == undefined ) o.expandEasing = null;
        if( o.collapseEasing == undefined ) o.collapseEasing = null;
        if( o.multiFolder == undefined ) o.multiFolder = true;
        if( o.loadMessage == undefined ) o.loadMessage = 'Loading...';
        liClick( $(c), o, obj );
    }
}

function liClick( c, o, lid )
{
    var id = "#"+$(c).attr("id");
    if( repeat_flag ) {
        repeat_flag = false;
        var tt = lid.id;
        if( lid.id != "FILEMANAGER_NO_COLLAPSE") {
            var t = document.getElementById(tt).getAttribute("rel");
            var hasChildren = document.getElementById(tt).getAttribute("data-children");
            var obj = lid;
            $(c).addClass('wait');
            $(".jqueryFileTree.start").remove();

            if( !in_array( open_folders,  lid.id ) ) {
                $.post(o.script, { dir: t, sign: here }, function(data) {
                    $(c).find('.start').html('');
                    $(c).removeClass('wait').append(data);
                    if( o.root == t ) {
                        $(c).find('UL:hidden').show();
                    }
                    else {
                        $("#"+tt+" ul").remove();
                        $(c).find('UL:hidden').appendTo("#"+tt);
                        $(c).find('UL:hidden').slideDown({ duration: o.expandSpeed, easing: o.expandEasing });
                        open_folders.push(lid.id);
                        $("#"+tt).addClass("expanded");
                        first_flag = $("#show_left_sidebar").html();
                        repeat_flag = true;
                    }
                    liBindTree( lid, o );
                });
            }
            else {
                $("#"+tt+" ul").remove();
                removeItem( open_folders, lid.id );
                $("#"+tt).removeClass("expanded");
                first_flag = $("#show_left_sidebar").html();
                setTimeout(function(){repeat_flag = true;}, 500);
            }
        }
    }
}

function liBindTree( t, o ) {
    $(t).bind(o.folderEvent, function() {
        first_flag = $("#show_left_sidebar").html();
    });
}



function liAutoOpen( c, o, lid )
{
    var id = "#"+$(c).attr("id");
    var go = true;
    if( go ) {
        repeat_flag = false;
        var tt = lid.id;
        if( lid.id != "FILEMANAGER_NO_COLLAPSE") {
            var t = document.getElementById(tt).getAttribute("rel");
            var hasChildren = document.getElementById(tt).getAttribute("data-children");
            var obj = lid;
            $(c).addClass('wait');
            $(".jqueryFileTree.start").remove();

            if( !in_array( open_folders,  lid.id ) ) {
                $.post(o.script, { dir: t, sign: here }, function(data) {
                    $(c).find('.start').html('');
                    $(c).removeClass('wait').append(data);
                    if( o.root == t ) {
                        $(c).find('UL:hidden').show();
                    }
                    else {
                        $("#"+tt+" ul").remove();
                        $(c).find('UL:hidden').appendTo("#"+tt);
                        $(c).find('UL:hidden').slideDown({ duration: o.expandSpeed, easing: o.expandEasing });
                        open_folders.push(lid.id);
                        $("#"+tt).addClass("expanded");
                        first_flag = $("#show_left_sidebar").html();
                        repeat_flag = true;
                    }
                    liBindTree( lid, o );
                });
            }
            else {
                $("#"+tt+" ul").remove();
                removeItem( open_folders, lid.id );
                $("#"+tt).removeClass("expanded");
                first_flag = $("#show_left_sidebar").html();
                setTimeout(function(){repeat_flag = true;}, 500);
            }
        }
    }
}


function open_all_dirs( user )
{		
		var expand = true;
    var obj = $(".left_open_all_dir");
    obj.children().each (function() {
        if( $(this).attr("data-class") != "" ) {
            $(this).addClass( $(this).attr("data-class") );
        }
        if( $(this).attr( "data-children" ) == "yes" && expand ) {
            var c = "#left_folder_menu_box";
            if( !o ) var o = {};
            if( o.root == undefined ) o.root = '/';
            if( o.script == undefined ) o.script = user+'folderMenu.php';
            if( o.folderEvent == undefined ) o.folderEvent = 'click';
            if( o.expandSpeed == undefined ) o.expandSpeed= 100;
            if( o.collapseSpeed == undefined ) o.collapseSpeed= 100;
            if( o.expandEasing == undefined ) o.expandEasing = null;
            if( o.collapseEasing == undefined ) o.collapseEasing = null;
            if( o.multiFolder == undefined ) o.multiFolder = true;
            if( o.loadMessage == undefined ) o.loadMessage = 'Loading...';
            liAutoOpen( $(c), o, this );
            obj.removeClass( "left_open_all_dir" );
            setTimeout( function(){ open_all_dirs( user ) }, 1000, user );
        }
    });
}
window.onload = setTimeout( function(){ open_all_dirs( fileTreeUserFolder ) }, 1000, fileTreeUserFolder );

// setInterval


$(document).bind('drop dragover', function (e) {
    e.preventDefault();
});

$(document).bind('dragover', function (e) {
    var dropZone = $('#dropzone'),
        timeout = window.dropZoneTimeout;
    if (!timeout) {
        dropZone.addClass('in');
    } else {
        clearTimeout(timeout);
    }
    var found = false,
        node = e.target;
    do {
        if (node === dropZone[0]) {
            found = true;
            break;
        }
        node = node.parentNode;
    } while (node != null);
    if (found) {
        dropZone.addClass('hover');
    } else {
        dropZone.removeClass('hover');
    }
    window.dropZoneTimeout = setTimeout(function () {
        window.dropZoneTimeout = null;
        dropZone.removeClass('in hover');
    }, 100);
});



(function(){

  // Name and settings
  var name = 'mtree'
  var defaults = {
    collapsed: true, // Start with collapsed menu (only level 1 items visible)
    close_same_level: true, // Close elements on same level when opening new node.
    duration: 300, // Animation duration should be tweaked according to easing.
    list_animation : true, // Animate separate list items on open/close element (velocity.js only).
    easing: 'easeOutQuart', // Velocity.js only, defaults to 'swing' with jquery animation.
    use_nodes: false, // Set <span></span> node before link for collapse/expand functionality
    skip_init: false // Skip css/style initialization if done before
  };

  function Mtree(el, options) {
    this.$el  = $(el);
    var plugin = this;

    // Default mtree settings
    this.options = $.extend(defaults, options, this.$el.data('options')); 

    // Click event for buttons without nodes
    $.fn.notNodeClick = function() {
    	var el = $(this);
      el.closest('ul.mtree').find('.mtree-active').removeClass('mtree-active');
      el.addClass('mtree-active');
  	}

    // Click event for buttons with nodes
    $.fn.nodeClick = function() {

      // vars
      var el = $(this),
      		isOpen = el.hasClass('mtree-open');

      // toggle active
      if(!isOpen) el.closest('ul.mtree').find('.mtree-active').removeClass('mtree-active');
      el.toggleClass('mtree-active', !isOpen);

      // close siblings
      if(plugin.options.close_same_level && !isOpen) el.closest('ul').children('.mtree-open').closeNodes();

      // toggle classes
      el.toggleClass('mtree-open mtree-closed');

      // Toggle open anim
      el.children('ul').first().toggleList(!isOpen);

      // Sub lists anim
      if(!isOpen && plugin.options.list_animation) el.find('> ul > li, li.mtree-open > ul > li').css({'opacity':0}).velocity('stop').velocity('list');

  	}

    // close sibling elements
    $.fn.closeNodes = function(){
    	var el = $(this);
      el.children('ul').toggleList(false, plugin.options.duration/3);
      el.toggleClass('mtree-open mtree-closed');
    }

    // Animate open/close menu
    $.fn.toggleList = function(isOpen, delay) {

    	// vars
    	var el = $(this);

      // get height if opening
      if(isOpen) {
        var restore_height = el.css('height');
        el.css({'height': 'auto', 'display':'block'});
      	var h = el.outerHeight();
        el.css({'height': restore_height});
      }

      // animate
      el.velocity('stop').velocity({
        height: isOpen ? h : 0
      },{
        duration: plugin.options.duration,
        delay: delay || 0,
        easing: plugin.options.easing,
        display: isOpen ? 'block' : 'none',
        complete: function(){ if(isOpen) el.css('height', 'auto'); }
      });
    }

    // velocity sublist animation sequence
    $.Velocity.Sequences.list = function (element, options, index, size) {
      $.Velocity.animate(element, {
        opacity: [1,0],
        translateY: [0, -(index+1)]
      }, {
        delay: index*(plugin.options.duration/size/2),
        duration: plugin.options.duration,
        easing: plugin.options.easing
      });
    };
    this.init();
  }

  // init plugin
  Mtree.prototype.init = function() {

  	var li = this.$el.find('li');

  	// Populate Arrays
  	this.$nodes = li.has('ul');// this.$el.find('li:has(ul)');
  	//$("div").not(":has(img)")
    this.$notNodes = li.not(':has(ul)')//this.$el.find('li').not(':has(ul)');
    this.$sublists = this.$el.find('ul');
    if(this.options.use_nodes) this.$nodes.prepend('<span class=mtree-icon></span>');
    this.$nodeButtons = this.$nodes.children(':first-child');
    this.$notNodeButtons = this.$notNodes.children(':first-child');

    // Set initial classes
    if(!this.options.skip_init) this.setClasses();

    // Clicks
    this.$nodeButtons.on('click.mtree-node', function(e){
    	if(preventJSClick(e)) return;
      $(this).parent('li').first().nodeClick();
      e.preventDefault();
    });
    this.$notNodeButtons.on('click.mtree-notNode', function(e){
    	if(preventJSClick(e)) return;
      $(this).parent('li').first().notNodeClick();
    });
  };

  // set initial classesz
  Mtree.prototype.setClasses = function() {
    this.$el.addClass('mtree');
    this.$nodes.addClass('mtree-node mtree-' + (this.options.collapsed ? 'closed' : 'open'));
    this.$sublists.css({'overflow':'hidden', 'height': (this.options.collapsed) ? 0 : 'auto', 'display': (this.options.collapsed) ? 'none' : 'block' });
    this.$nodeButtons.css('cursor', 'pointer');
    this.$sublists.each(function(index, val) {
    	var el = $(this);
      el.addClass('mtree-level-' + (el.parentsUntil($('ul.mtree'), 'ul').length + 1));
  	});
  }

  // make plugin
  $.fn[name] = function(options) {
    return this.each(function() {
      if(!$.data(this, 'plugin_' + name)) $.data(this, 'plugin_' + name, new Mtree(this, options));
    });
  };

	// Initiate mtree on ul.mtree classes, and show 
  /*$(document).ready(function() {
    var $items = $('body').find('ul.' + name);
    $items[name]();
    $items.velocity('fadeIn', {
    	complete: function(){
    		$(this).removeAttr('style');
    	}
    });
	});*/

})();


/* ===== STYLER CONFIG ===== */

var stylerConfig = {
	"layouts" : {
		'topbar-center' : 'topbar-center topbar-fixed-up',
		'topbar-float'	: 'topbar-float topbar-fixed-up',
		'sidebar'				: 'sidebar',
		'sidebar-right'	: 'sidebar-right',
		'slidemenu'			: 'slidemenu topbar-center'/*,

		'custom1'				: '-',
		'fixed'					: 'topbar-center topbar-fixed',
		'fixed-up'			: 'topbar-center topbar-fixed-up',
		'unfixed'				: 'topbar-center',
		'wide'					: 'topbar-float wide'*/
	},

	// SKINS
	"skins"	: {
		'DAYLIGHT' : 'header', // DAYLIGHT
		'daylight 78a642'	: 'daylight 78a642',
		'daylight darkorange'	: 'daylight darkorange',
		'daylight tomato'	: 'daylight tomato',
		'daylight ffc000'	: 'daylight ffc000',
		'daylight salmon'	: 'daylight salmon',
		'daylight burlywood'	: 'daylight burlywood',
		//'daylight hotpink'	: 'daylight hotpink',
		//'daylight indianred'	: 'daylight indianred',
		'daylight yellowgreen'	: 'daylight yellowgreen',
		'daylight darkseagreen'	: 'daylight darkseagreen',
		'daylight skyblue'	: 'daylight skyblue',
		'daylight deeppink'	: 'daylight deeppink',
		'daylight palevioletred'	: 'daylight palevioletred',
		//'daylight crimson'	: 'daylight crimson',

		'TWILIGHT' : 'header', // TWILIGHT
		'twilight brown'	: 'twilight brown',
		'twilight goldenrod'						: 'twilight goldenrod',
		//'twilight burlywood'	: 'twilight burlywood',
		'twilight peru'	: 'twilight peru',
		'twilight crimson'	: 'twilight crimson',
		//'twilight orange'	: 'twilight orange',
		'twilight mediumvioletred'	: 'twilight mediumvioletred',
		'twilight deeppink'	: 'twilight deeppink',
		//'twilight orchid'	: 'twilight orchid',
		'twilight steelblue'	: 'twilight steelblue',
		'twilight darkcyan'	: 'twilight darkcyan',
		'twilight seagreen'	: 'twilight seagreen',
		'twilight 78a642'	: 'twilight 78a642',

		'WHITE'				: 'header',
		'white coral':'white coral',
		'white hotpink':'white hotpink',
		'white lightskyblue':'white lightskyblue',
		'white mediumaquamarine':'white mediumaquamarine',
		'white yellowgreen':'white yellowgreen',
		//'white sandybrown':'white sandybrown',
		//'white darkorange':'white darkorange',
		//'white indianred':'white indianred',
		//'white crimson':'white crimson',
		//'white deepskyblue':'white deepskyblue',

		'BLACK': 'header',
		'black crimson':'black crimson',
		'black mediumvioletred':'black mediumvioletred',
		'black orange':'black orange',
		//'black peru':'black peru',
		//'black brown':'black brown',
		//'black orchid':'black orchid',
		'black olivedrab':'black olivedrab',
		//'black mediumaquamarine':'black mediumaquamarine',
		'black steelblue':'black steelblue',

		'MELLOW': 'header',
		'mellow indianred':'mellow indianred',
		//'mellow tomato':'mellow tomato',
		//'mellow coral':'mellow coral',
		'mellow darksalmon':'mellow darksalmon',
		//'mellow peru':'mellow peru',
		'mellow tan':'mellow tan',
		//'mellow cadetblue':'mellow cadetblue',
		//'mellow yellowgreen':'mellow yellowgreen',
		'mellow darkseagreen':'mellow darkseagreen',
		'mellow palevioletred':'mellow palevioletred',

		'ORGANIC': 'header',
		'organic 78a642':'organic 78a642',
		'organic indianred':'organic indianred',
		'organic crimson':'organic crimson',
		'organic hotpink':'organic hotpink',
		'organic burlywood':'organic burlywood',
		//'organic olivedrab':'organic olivedrab',
		//'organic steelblue':'organic steelblue',
		//'organic darkseagreen':'organic darkseagreen',
		//'organic peru':'organic peru',

		'SCIENCE': 'header',
		'science palevioletred':'science palevioletred',
		'science indianred':'science indianred',
		'science salmon':'science salmon',
		'science burlywood':'science burlywood',
		'science darkseagreen':'science darkseagreen',
		//'science hotpink':'science hotpink',
		//'science plum':'science plum',
		//'science orange':'science orange',
		//'science goldenrod':'science goldenrod',
		//'science yellowgreen':'science yellowgreen',
		//'science olivedrab':'science olivedrab',
		//'science mediumaquamarine':'science mediumaquamarine',
		//'science lightseagreen':'science lightseagreen',
		//'science sandybrown':'science sandybrown',

	},
	"fonts"	: {

		'EDITORS FAVORITES' : 'header', // SIBLINGS
		'Lato Skinny'	: 'Lato:300,300i,400,400i|paragraph:300|body:300|subheader:italic|topbar:uppercase|sidebar:uppercase,small|footer:italic|styled:italic',
		'Lato'	: 'Lato:400,400italic,700,700italic|subheader:italic|topbar:uppercase,large|sidebar:uppercase,small|footer:italic|styled:italic',
		'Lato Fat'	: 'Lato:400,700,900,400italic,700italic,900italic|logo:italic,900|header:italic,bold|subheader:italic|topbar:bold,uppercase|sidebar:bold,uppercase,small|footer:italic|styled:italic',
		'Raleway - Amaranth' : 'Raleway:400,600|Amaranth',
		'Open Sans - Fauna One':'Open+Sans:300,300italic,600,600italic|Fauna One|subheader:small|topbar:Fauna One,uppercase,small|sidebar:Fauna One,uppercase,xsmall',
		'Ubuntu - Raleway':'Ubuntu:300,300italic,600,600italic|Raleway:300|topbar:uppercase,small',
		'Merriweather - Alegreya Sans':'Merriweather:300,300italic,700,700italic|Alegreya+Sans:400,700|logo:700|header:700|menu:Alegreya Sans|topbar:uppercase|sidebar:uppercase|subheader:small',
		'Ubuntu - Roboto Slab':'Ubuntu:300,300italic|Roboto+Slab:400|logo:small',
		'Merriweather - Raleway':'Merriweather:300,300italic,700|Raleway:300|menu:Raleway|subheader:Raleway',
		'custom0'							: '-',
		'Raleway - Lobster':'Raleway:300,600,300italic|Lobster+Two:400|styled:italic|footer:italic',
		'Merriweather - Berkshire Swash':'Merriweather:300,700,300italic|Berkshire+Swash|subheader:small',
		'Open Sans - Paytone One':'Open+Sans:300italic,400,600|Paytone+One|subheader:small',
		'Lato - Bubblegum Sans':'Lato:400,700,400italic|Bubblegum+Sans|subheader:small',
		'Roboto - Shadows Into Light':'Roboto:300,300italic,700|Shadows Into Light Two|topbar:Shadows Into Light Two|sidebar:Shadows Into Light Two',
		'Gudea - Rancho'	: 'Gudea:400,700,400italic|Rancho|logo:large|topbar:Rancho,uppercase|sidebar:Rancho,uppercase,small|subheader:small',
		'custom1'							: '-',
		'Roboto [+Slab]' : 'Roboto:300italic,300|Roboto Slab:300,400|topbar:Roboto Slab|sidebar:Roboto Slab',
		'PT Sans [+Narrow]' : 'PT Sans:400,700,400italic|PT Sans Narrow:400,700|logo:700|header:700|subheader:PT Sans Narrow|menu:PT Sans Narrow|topbar:uppercase|sidebar:uppercase',
		'Roboto [+Condensed]'	: 'Roboto:300,300italic,700|Roboto+Condensed:300|menu:Roboto+Condensed|sidebar:uppercase,small|topbar:small,uppercase|subheader:small|styled:Roboto+Condensed|footer:Roboto+Condensed',
		'Alegreya Sans [+SC]' : 'Alegreya Sans:300,300italic,700|Alegreya Sans SC:400,400italic|styled:italic|footer:italic|topbar:Alegreya Sans SC|sidebar:Alegreya Sans SC',
		'Alegreya [+SC]' : 'Alegreya:400,400italic,700|Alegreya SC:400|topbar:Alegreya SC|sidebar:Alegreya SC',
		'Raleway'				: 'Raleway:300,300italic,400,600|paragraph:300|logo:400|header:400|sidebar:uppercase,small|topbar:400,uppercase,small',
		'Neuton' : 'Neuton:300,400,700,300italic|header:400|logo:400|subheader:300|paragraph:300,xxlarge|topbar:uppercase|sidebar:uppercase,small',
		'Dosis' : 'Dosis:400,500,600|logo:500|header:500',


		'SUPER STYLISH' : 'header', // STYLED
		'Cabin [+Sketch]' : 'Cabin:400,400italic,700|Cabin Sketch:700|logo:700|header:700|styled:Cabin|footer:Cabin',
		'Handlee - Roboto' : 'Roboto:300,700,300italic|Handlee',
		'Roboto Slab - Megrim' : 'Roboto Slab:300,700|Megrim|header:uppercase|logo:uppercase|subheader:small|topbar:uppercase',
		'Noto Sans - Pacifico':'Noto Sans:400,700,400italic|Pacifico|subheader:small',
		'PT Sans - Indie Flower':'PT Sans:400,700,400italic|Indie Flower|subheader:small|topbar:uppercase,small|sidebar:uppercase,small',
		'Open Sans - Dancing Script':'Open+Sans:300,600,300italic|Dancing+Script:400,700|header:bold|logo:bold,xlarge|topbar:large',
		'Lato - Just Another Hand':'Lato:300,300italic|Just Another Hand|logo:xxlarge|styled:large|topbar:Just Another Hand,xxlarge|sidebar:Just Another Hand,xxlarge|subheader:small',
		'Droid Sans - Oleo Script':'Droid+Sans:400,400italic,700|Oleo+Script:400,700|sidebar:Oleo+Script|topbar:Oleo+Script,large|subheader:small',
		'Open Sans - Lobster Two':'Open+Sans:300,600,300italic|Lobster+Two:400,700',
		'Lato - Great Vibes':'Lato:300,300italic|Great+Vibes|logo:xxlarge|subheader:300|paragraph:300|styled:xlarge',
		'Lato - Oldenburg':'Lato:300,300italic|Oldenburg|topbar:Oldenburg|sidebar:Oldenburg|subheader:small',
		'Open Sans - Playfair Display'	: 'Open+Sans:300italic,300,600|Playfair+Display:400|subheader:small',
		'Roboto Condensed - Amatic SC':'Roboto+Condensed:300,300italic,700|Amatic+SC:700|topbar:Amatic SC,large|sidebar:Amatic SC,large',
		'Nobile - Corben':'Open+Sans:300,300italic,600|Corben:400,700|logo:700,xsmall|subheader:small',
		'Inconsolata - Special Elite':'Inconsolata:400,700|Special%20Elite|logo:small|topbar:Special Elite|sidebar:Special Elite|subheader:small|styled:Inconsolata',


		'BEAUTIFUL SIBLINGS' : 'header', // SIBLINGS
		'Open Sans [+Condensed]' : 'Open+Sans:300italic,300,600|Open Sans Condensed:300,700|menu:Open Sans Condensed|header:700|logo:700|subheader:Open Sans Condensed|topbar:uppercase|sidebar:uppercase',
		'[+Slab] Roboto' : 'Roboto Slab:300,700|Roboto:900|logo:bold|header:bold',
		'Ubuntu [+Condensed]' : 'Ubuntu:300,300italic,700|Ubuntu Condensed',
		'[+Sans] Merriweather' : 'Merriweather Sans:300,300italic,700|Merriweather:400italic,700|logo:700|header:700|styled:italic|footer:italic|subheader:italic',
		'Josefin Slab [+Sans]' : 'Josefin Slab:400,400italic,700|Josefin Sans:400|menu:Josefin Sans',
		'Varela [+Round]':'Varela|Varela+Round|topbar:Varela+Round|sidebar:Varela+Round',


		'POWERFUL SINGLES'			: 'header', // SINGLES
		'Roboto'				: 'Roboto:300italic,300',
		'Roboto Slab'		: 'Roboto+Slab:300,400,700|paragraph:300|subheader:300',
		'Roboto Condensed':'Roboto+Condensed:300italic,700italic,300,400,700|logo:700|header:700|paragraph:300|subheader:300|sidebar:uppercase,300|menu:300|topbar:400,uppercase,small|sidebar:uppercase,small',
		'Droid Serif'		: 'Droid+Serif:400,700,400italic|header:bold|logo:bold,small|subheader:italic,small|styled:italic|footer:italic',
		'Open Sans'			: 'Open+Sans:300,300italic,600,600italic|topbar:uppercase,small|sidebar:uppercase,small',
		'Montserrat'		: 'Montserrat:400,700|topbar:uppercase,small|sidebar:uppercase,xsmall',
		'Ubuntu'				: 'Ubuntu:300,300italic,400,400italic|subheader:300|paragraph:300',
		'Merriweather'	: 'Merriweather:300,300italic,400,400italic|paragraph:300|header:400|logo:400|subheader:italic|styled:italic|footer:italic|menu:italic',
		'Lora'				: 'Lora:400,700,400italic,700italic|subheader:italic|styled:italic|footer:italic|menu:italic',
		'PT Sans'				: 'PT+Sans:400,700,400italic,700italic|logo:700|header:700|subheader:italic|topbar:uppercase|sidebar:uppercase',
		'PT Sans Narrow': 'PT Sans Narrow:400,700|logo:bold|header:bold|topbar:uppercase|sidebar:uppercase,small',
		'Noto Sans': 'Noto Sans:400,700,400italic|subheader:italic,small|styled:italic|footer:italic',
		'Yanone Kaffeesatz': 'Yanone Kaffeesatz:300,400|logo:400|header:400|subheader:300|paragraph:300|menu:300|topbar:uppercase',
		'Source Sans Pro':'Source Sans Pro:300,300italic,600,600italic|subheader:small|paragraph:300|topbar:uppercase',
		'Cabin' : 'Cabin:400,600,400italic|subheader:italic|styled:italic,normal|footer:italic',
		'Josefin Sans' : 'Josefin Sans:400,400italic',
		'Marvel' : 'Marvel:400,400italic,700|header:700|logo:700',
		'Titillium Web' : 'Titillium Web:300,300italic,600,600italic',


		'GOOD COMBINATIONS' : 'header', // SMOOTH COMBINATIONS
		'Raleway - Bitter':'Raleway:300,600,300italic,600italic|Bitter:400|sidebar:small',
		'Dosis - Cinzel':'Dosis:300,600|Cinzel|sidebar:large|styled:Dosis',
		'Oxygen - Volkhov': 'Oxygen:300,700|Volkhov:400|paragraph:300|subheader:300|logo:small',
		'Gentium Basic - Open+Sans' : 'Gentium Basic:400,700,400italic|body:small|Open+Sans:400,600,800|header:800,uppercase|logo:bold,uppercase,xsmall|menu:Open+Sans|sidebar:uppercase,xsmall|topbar:uppercase,small|subheader:large',
		'Open Sans - Bree Serif' : 'Open+Sans:300italic,300,600|Bree+Serif',
		'Source Sans Pro - Bitter':'Source Sans Pro:300,300italic,600|Bitter:400|topbar:uppercase|small',
		'PT Sans - Arvo':'PT+Sans:400,700,400italic|Arvo:400,400italic,700|topbar:|sidebar:|subheader:Arvo,small|styled:PT+Sans',
		'Josefin Sans - Montaga':'Josefin+Sans:400,700,400italic|Montaga',
		'Roboto - Yanone Kaffeesatz':'Roboto:300,300italic,700|Yanone+Kaffeesatz:400,700|logo:bold|header:bold|subheader:small|topbar:Yanone+Kaffeesatz,uppercase|sidebar:Yanone+Kaffeesatz,uppercase',
		'Sintony - Rufina':'Sintony:400,700|Rufina:400,700|subheader:small|logo:bold|header:bold|topbar:|sidebar:',
		'Source Sans Pro - Oxygen':'Source Sans Pro:300,600,300italic|Oxygen:400|sidebar:Oxygen|topbar:Oxygen',
		'Lato - Oswald' : 'Lato:300,700,400italic|Oswald:300|sidebar:Oswald|topbar:Oswald|subheader:300',
		'Lora - Ubuntu':'Lora:400,700,400italic|Ubuntu:300|menu:300,Ubuntu|subheader:small',
		'Noto Sans - Montserrat':'Noto+Sans:400,700,400italic|Montserrat|menu:Montserrat',
		'none':'none'
	},
	"classes" : ""
}

// Lets make a few favorites, just for fun!
stylerConfig["favs"] = {
	'&#9733; RECOMMENDED &#9733;': 'mine',
	'Akaishi': [
		"topbar-center topbar-fixed-up",
    "twilight brown",
    //"Merriweather Sans:300,300italic,700|Merriweather:400italic,700|logo:700|header:700|styled:italic|footer:italic|subheader:italic",
    stylerConfig.fonts["[+Sans] Merriweather"],
    "clear"
	],
	'Andes': [
		"topbar-center topbar-fixed-up",
    "white coral",
    //"Open+Sans:400italic,400,700|Fauna One|subheader:small|topbar:Fauna One,uppercase,small|sidebar:Fauna One,uppercase,xsmall",
    stylerConfig.fonts["Open Sans - Fauna One"],
    "clear"
	],
	'Apennines': [
		"topbar-center topbar-fixed-up",
    "white hotpink",
    //"Raleway:400,400italic,500|logo:500|header:500|sidebar:500,uppercase,small|topbar:500,uppercase,small",
    stylerConfig.fonts["Raleway"],
    "clear"
	],
	'Appalachian': [
		"topbar-center topbar-fixed-up",
    "daylight yellowgreen",
    //"Sintony:400,700|Rufina:400,700|subheader:small|logo:bold|header:bold|topbar:|sidebar:",
    stylerConfig.fonts["Sintony - Rufina"],
    "clear"
	],
	'Aravalli': [
		"topbar-center topbar-fixed-up",
    "black crimson",
    //"Open+Sans:400italic,400,700|Bree+Serif|topbar:Bree+Serif|sidebar:Bree+Serif",
    stylerConfig.fonts["Open Sans - Bree Serif"],
    "clear"
	],
	'Atlantika': [
		"topbar-center topbar-fixed-up",
    "organic 78a642",
    //"Roboto Slab:300,700|Roboto:900|logo:bold|header:bold",
    stylerConfig.fonts["[+Slab] Roboto"],
    "filled"
	],
	'Atlas': [
		"topbar-center topbar-fixed-up",
    "twilight brown",
    //"Roboto+Condensed:300,300italic,700|Amatic+SC:700|topbar:Amatic SC,large|sidebar:Amatic SC,large",
    stylerConfig.fonts["Roboto Condensed - Amatic SC"],
    "clear"
	],
	'Bakossi': [
		"topbar-center topbar-fixed-up",
    "science salmon",
    //"Gudea:400,700,400italic|Rancho|logo:large|topbar:Rancho,uppercase|sidebar:Rancho,uppercase,small|subheader:small",
    stylerConfig.fonts["Gudea - Rancho"],
    "filled"
	],
	'Beaufort': [
		"topbar-center topbar-fixed-up",
    "twilight goldenrod",
    //"Marvel:400,400italic,700|header:700|logo:700",
    stylerConfig.fonts["Marvel"],
    "filled"
	],
	'Belasitsa': [
		"topbar-center topbar-fixed-up",
    "twilight brown",
    //"PT Sans Narrow:400,700|logo:bold|header:bold|topbar:uppercase|sidebar:uppercase,small",
    stylerConfig.fonts["PT Sans Narrow"],
    "clear"
	],
	'Bergamo': [
		"topbar-center topbar-fixed-up",
    "organic indianred",
    //"Raleway:400,700|Amaranth",
    stylerConfig.fonts["Raleway - Amaranth"],
    "clear"
	],
	'Bitterroot': [
		"topbar-center topbar-fixed-up",
    "daylight yellowgreen",
    //"Neuton:300,400,700,300italic|header:400|logo:400|subheader:300|paragraph:300,xxlarge|topbar:uppercase|sidebar:uppercase,small",
    stylerConfig.fonts["Neuton"],
    "clear"
	],
	'Camelsfoot': [
		"topbar-center topbar-fixed-up",
    "daylight palevioletred",
    //"Cabin:400,700,400italic|Lobster+Two:700italic,400italic|header:italic,bold|logo:italic,bold|styled:italic|footer:italic",
    stylerConfig.fonts["Open Sans - Lobster Two"],
    "clear"
	],
	'Cantabrian': [
		"topbar-center topbar-fixed-up",
    "twilight darkcyan",
    //"Alegreya Sans:400,400italic,700|Alegreya Sans SC:400,400italic|styled:italic|footer:italic|topbar:Alegreya Sans SC|sidebar:Alegreya Sans SC",
    stylerConfig.fonts["Alegreya Sans [+SC]"],
    "filled"
	],
	'Carpathian': [
		"topbar-center topbar-fixed-up",
    "organic 78a642",
    //"Droid+Sans:400,400italic,700|Oleo+Script:400,700|sidebar:Oleo+Script|topbar:Oleo+Script,large|subheader:small",
    stylerConfig.fonts["Droid Sans - Oleo Script"],
    "filled"
	],
	'Caucasus': [
		"topbar-center topbar-fixed-up",
    "twilight mediumvioletred",
    //"Open+Sans:400italic,400,700|Paytone+One|subheader:small",
    stylerConfig.fonts["Open Sans - Paytone One"],
    "filled"
	],
	'Cederberg': [
		"topbar-center topbar-fixed-up",
    "twilight seagreen",
    //"Raleway:400,700|Amaranth",
    stylerConfig.fonts["Raleway - Amaranth"],
    "filled"
	],
	'Chittagong': [
		"topbar-center topbar-fixed-up",
    "twilight steelblue",
    //"PT+Sans:400,700,400italic|Arvo:400,400italic,700|topbar:|sidebar:|subheader:Arvo,small|styled:PT+Sans",
    stylerConfig.fonts["PT Sans - Arvo"],
    "filled"
	],
	'Chuckwalla': [
		"topbar-center topbar-fixed-up",
	  "white mediumaquamarine",
	  //"Noto Sans:400,700,400italic|Pacifico|subheader:small",
	  stylerConfig.fonts["Noto Sans - Pacifico"],
	  "clear"
	],
	'Cordillera': [
		"topbar-center topbar-fixed-up",
	  "mellow indianred",
	  //"Alegreya Sans:400,400italic,700|Alegreya Sans SC:400,400italic|styled:italic|footer:italic|topbar:Alegreya Sans SC|sidebar:Alegreya Sans SC",
	  stylerConfig.fonts["Alegreya Sans [+SC]"],
	  "clear"
	],
	'Dachstein': [
		"topbar-center topbar-fixed-up",
	  "daylight yellowgreen",
	  //"PT Sans:400,700,400italic|Indie Flower|subheader:small|topbar:uppercase,small|sidebar:uppercase,small",
	  stylerConfig.fonts["PT Sans - Indie Flower"],
	  "clear"
	],
	'Dolomites': [
		"topbar-center topbar-fixed-up",
	  "daylight salmon",
	  //"Merriweather:300,300italic,700|Alegreya+Sans:400,700|logo:bold|header:bold|menu:Alegreya Sans|topbar:uppercase|sidebar:uppercase|subheader:small",
	  stylerConfig.fonts["Merriweather - Alegreya Sans"],
	  "filled"
	],
	'Drakensberg': [
		"topbar-center topbar-fixed-up",
	  "daylight palevioletred",
	  //"Sintony:400,700|Rufina:400,700|subheader:small|logo:bold|header:bold|topbar:|sidebar:",
	  stylerConfig.fonts["Sintony - Rufina"],
	  "clear"
	],
	'Genevieve': [
		"topbar-center topbar-fixed-up",
	  "twilight steelblue",
	  //"Open+Sans:400italic,400,700|Fauna One|subheader:small|topbar:Fauna One,uppercase,small|sidebar:Fauna One,uppercase,xsmall",
	  stylerConfig.fonts["Open Sans - Fauna One"],
	  "clear"
	],
	'Granatspitze': [
		"topbar-center topbar-fixed-up",
	  "twilight seagreen",
	  //"Ubuntu:300,300italic,700|Raleway:500",
	  stylerConfig.fonts["Ubuntu - Raleway"],
	  "clear"
	],
	'Grossglockner': [
		"topbar-float topbar-fixed-up",
	  "daylight ffc000",
	  //"Source Sans Pro:400,400italic,700|Bitter:400",
	  stylerConfig.fonts["Source Sans Pro - Bitter"],
	  "clear"
	],
	'Himalayas': [
		"topbar-float topbar-fixed-up",
	  "daylight darkorange",
	  //"Open+Sans:400italic,400,700|Fauna One|subheader:small|topbar:Fauna One,uppercase,small|sidebar:Fauna One,uppercase,xsmall",
	  stylerConfig.fonts["Open Sans - Fauna One"],
	  "clear"
	],
	'Hindu Kush': [
		"topbar-float topbar-fixed-up",
	  "twilight brown",
	  //"Merriweather:300,300italic,700|Raleway:400,500|menu:Raleway|logo:500|header:500|sidebar:500|subheader:Raleway",
	  stylerConfig.fonts["Merriweather - Raleway"],
	  "filled"
	],
	'Jayawijaya': [
		"topbar-float topbar-fixed-up",
	  "mellow darksalmon",
	  //"Sintony:400,700|Rufina:400,700|subheader:small|logo:bold|header:bold|topbar:|sidebar:",
	  stylerConfig.fonts["Sintony - Rufina"],
	  "clear"
	],
	'Jotunheimen': [
		"topbar-float topbar-fixed-up",
	  "twilight 78a642",
	  //"Dosis:400,500|logo:500|header:500",
	  stylerConfig.fonts["Dosis"],
	  "clear"
	],
	'Karakoram': [
		"topbar-float topbar-fixed-up",
	  "science darkseagreen",
	  //"Cabin:400,700,400italic|Bubblegum+Sans|subheader:small",
	  stylerConfig.fonts["Lato - Bubblegum Sans"],
	  "filled"
	],
	'Karwendel': [
		"topbar-float topbar-fixed-up",
	  "organic hotpink",
	  //"Dosis:400,700|Cinzel:400,700|sidebar:large|styled:Dosis",
	  stylerConfig.fonts["Dosis - Cinzel"],
	  "filled"
	],
	'Khibinsky': [
		"topbar-float topbar-fixed-up",
	  "black olivedrab",
	  //"Roboto:300italic,300,700|Roboto Slab:300,400|topbar:Roboto Slab|sidebar:Roboto Slab",
	  stylerConfig.fonts["Roboto [+Slab]"],
	  "clear"
	],
	'Kilimanjaro': [
		"sidebar",
	  "mellow indianred",
	  //"Josefin Sans:400,400italic,600|header:600|logo:600",
	  stylerConfig.fonts["Josefin Sans"],
	  "clear"
	],
	'Livigno': [
		"sidebar",
	  "twilight brown",
	  //"Inconsolata:400,700|Special%20Elite|logo:small|topbar:Special Elite|sidebar:Special Elite|subheader:small|styled:Inconsolata",
	  stylerConfig.fonts["Inconsolata - Special Elite"],
	  "filled"
	],
	'Lebombo': [
		"sidebar",
	  "black olivedrab",
	  //"Merriweather:300,300italic,700|Alegreya+Sans:400,700|logo:bold|header:bold|menu:Alegreya Sans|topbar:uppercase|sidebar:uppercase|subheader:small",
	  stylerConfig.fonts["Merriweather - Alegreya Sans"],
	  "filled"
	],
	'Mandara': [
		"sidebar",
	  "mellow palevioletred",
	  //"Open+Sans:400italic,400,700|Paytone+One|subheader:small",
	  stylerConfig.fonts["Open Sans - Paytone One"],
	  "filled"
	],
	'Mantiqueira': [
		"sidebar",
	  "daylight yellowgreen",
	  //"Titillium Web:400,700,400italic|logo:700|header:700",
	  stylerConfig.fonts["Titillium Web"],
	  "filled"
	],
	'Pyrenees': [
		"sidebar",
	  "black crimson",
	  //"Source Sans Pro:400,400italic,700|Bitter:400",
	  stylerConfig.fonts["Source Sans Pro - Bitter"],
	  "clear"
	],
	'Saint Elias': [
		"sidebar",
	  "daylight darkseagreen",
	  //"Merriweather:400,700,400italic|Berkshire+Swash|subheader:small|topbar:Berkshire+Swash|sidebar:Berkshire+Swash",
	  stylerConfig.fonts["Merriweather - Berkshire Swash"],
	  "clear"
	],
	'Santa Catalina': [
		"sidebar",
	  "white hotpink",
	  //"PT Sans:400,700,400italic|Indie Flower|subheader:small|topbar:uppercase,small|sidebar:uppercase,small",
	  stylerConfig.fonts["PT Sans - Indie Flower"],
	  "filled"
	],
	'Sierra Nevada': [
		"sidebar",
	  "twilight steelblue",
	  //"Lato:300,700,400italic|Oswald:300|sidebar:Oswald|topbar:Oswald|subheader:300",
	  stylerConfig.fonts["Lato - Oswald"],
	  "filled"
	],
	'Snowdonia': [
		"sidebar",
	  "daylight darkseagreen",
	  //"Roboto Slab:300,700|Megrim|header:uppercase|logo:uppercase|subheader:small|topbar:uppercase",
	  stylerConfig.fonts["Roboto Slab - Megrim"],
	  "clear"
	],
	'Stanovoi': [
		"sidebar",
	  "daylight salmon",
	  //"Ubuntu:300,300italic,700|logo:700|header:700|subheader:300|paragraph:300",
	  stylerConfig.fonts["Ubuntu"],
	  "filled"
	],
	'Swartberg': [
		"sidebar",
	  "daylight darkseagreen",
	  //"Roboto Slab:300,700|Roboto:900|logo:bold|header:bold",
	  stylerConfig.fonts["[+Slab] Roboto"],
	  "filled"
	],
	'Tian Shan': [
		"sidebar",
	  "science darkseagreen",
	  //"Josefin Sans:400,400italic,600|header:600|logo:600",
	  stylerConfig.fonts["Josefin Sans"],
	  "filled"
	],
	'Transantarctic': [
		"sidebar",
	  "twilight peru",
	  //"Roboto+Slab:300,400,700|paragraph:300|subheader:300",
	  stylerConfig.fonts["Roboto Slab"],
	  "clear"
	],'Trollheimen': [
		"sidebar",
	  "twilight brown",
	  //"Roboto:300,300italic,700|Shadows Into Light Two|topbar:Shadows Into Light Two|sidebar:Shadows Into Light Two",
	  stylerConfig.fonts["Roboto - Shadows Into Light"],
	  "filled"
	],
	'Vanoise': [
		"sidebar",
	  "daylight skyblue",
	  //"Roboto Slab:300,700|Megrim|header:uppercase|logo:uppercase|subheader:small|topbar:uppercase",
	  stylerConfig.fonts["Roboto Slab - Megrim"],
	  "filled"
	],
	'Zagros': [
		"sidebar",
	  "organic burlywood",
	  //"Ubuntu:300,300italic|Roboto+Slab:400|logo:small",
	  stylerConfig.fonts["Ubuntu - Roboto Slab"],
	  "filled"
	]
};

// imagevue.layout.link.js

// init popup links
x3_body.on('click', '[data-popup-window]', function(e) {
	var href = this.dataset.href || this.getAttribute('href');
	if(!href || preventJSClick(e)) return;
	e.preventDefault();
	e.stopImmediatePropagation();
	var options = (this.dataset.popupWindow || '').split(',');
	_f.popupwin(href, options[0], options[1], options[2]);
});


/*
FIX
myWindow.close();   // Closes the new window
myWindow.document.write("<p>This is 'myWindow'</p>");   // Text in the new window
myWindow.opener.document.write("<p>This is the source window!</p>");  // Text in the window that created the new window
*/

// editor.templates.js
// Templates for the editor

var editor_templates = {
	"Markdown Sample"			: "## Intro\n\
We recommend using [markdown](https://help.github.com/articles/markdown-basics/) for basic content editing, because it is easy to read, faster to write and prevents html-coding mistakes which make break the page. You can use the markdown-syntax in the examples below, the toolbar or keyboard-shortcuts like `cmd-b` and `ctrl-b`.\n\
\n\
New paragraphs should be separated by two blank lines. Styles *italic*, **bold** and ~~strikethrough~~ are easily added. Add links like [flamepix](https://flamepix.com) by using syntax `[text](url)`. Add a horizontal rule by including three hyphens:\n\
\n\
---\n\
\n\
## Links\n\
Easily add links into your content by adding `[link text]` in brackets, immediately followed by the `(url)` in parenthesis. Optionally, you can surround a link address in angle-brackets `<https://flamepix.com>`, and it will automtically be formatted as a link. Examples:\n\
\n\
* <https://www.photo.gallery>\n\
* [mjau-mjau](https://mjau-mjau.com)\n\
* [relative link ../](../)\n\
\n\
## Lists\n\
Unordered lists can be started using the toolbar, or by typing `*`, `-` or `+`. Ordered lists can be started by typing `1.`.\n\
\n\
* Lists are piece of cake ...\n\
* They will auto-continue as you type ...\n\
* Double-enter will end a list\n\
	* Tabs and shift-tabs works also ...\n\
	* ... for nested lists\n\
\n\
## Image\n\
Embed images by adding the image `[title]` in brackets, immediately followed by the image `(img url)` in parenthesis. **Tip!** Use `{{path}}` to refer the path of the current page, for example `![title]({{path}}/file.jpg)`.\n\
\n\
![Monkey](https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f648.svg)\n\
\n\
## Blockquote\n\
Add blockquotes by preceding text on a new line with the `>` tag.\n\
\n\
> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eget sem et dui pulvinar aliquam. Etiam sit amet nulla erat. Mauris aliquam euismod tellus, ac varius velit tincidunt ut.",


	"Font Awesome Icons": "<!-- Find your icon name here http://fontawesome.io/icons/ -->\n\
Here is a camera <i class=\"fa fa-camera\"></i> icon.\n\
<i class=\"fa fa-heart fa-2x\" style=\"color:tomato;\"></i>\n\
<i class=\"fa fa-trophy fa-5x\"  style=\"color:gold;\"></i>",


	"Comparison-slider plugin" : "<!-- Comparison slider demo and documentation: https://demo.photo.gallery/examples/plugins/comparison-slider/ -->\n\
<div class=\"comparison-slider x3-style-frame\" data-orientation=\"horizontal\" data-offset=\"0.5\" data-hover=\"true\">\n\
<img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f648.svg\">\n\
<img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f435.svg\">\n\
</div>",


	"Contact Form (simple)" : "<form data-abide class=\"contactform\">\n\
	<div>\n\
		<input type=\"text\" name=\"name\" placeholder=\"Name\" required>\n\
	</div>\n\
	<div>\n\
		<input type=\"email\" name=\"email\" placeholder=\"Email\" required>\n\
	</div>\n\
	<div>\n\
		<textarea rows=\"6\" name=\"message\" placeholder=\"Message\" required></textarea>\n\
	</div>\n\
	<!-- Uncomment below section to include GDPR required email consent -->\n\
	<!--\n\
	<div>\n\
		<input type=\"checkbox\" id=\"consent\" name=\"consent\" required>\n\
		<label for=\"consent\">By using this form you agree with the handling of your data by this website.</label>\n\
	</div>\n\
	-->\n\
	<button type=\"submit\">Send</button>\n\
</form>",


	"Columns 6/6"				: "<div class=\"row\">\n\
  <div class=\"medium-6 columns\">\n\
		<img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f98e.svg\" alt=\"lizard\">\n\
  </div>\n\
  <div class=\"medium-6 columns\">\n\
  	<p>Both left and right columns are set to 6/12 width. This creates a two columns equal-width columns, which collapse into a single column on small screens. Read more about the grid <a href=http://foundation.zurb.com/docs/components/grid.html>here</a>.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus fringilla, risus ac lacinia consequat, ipsum augue posuere quam, eget commodo lorem augue vel dui. Sed elementum quis risus a volutpat. Vivamus fringilla, risus ac lacinia consequat, ipsum augue posuere quam, eget commodo lorem augue vel dui. Sed elementum quis risus a volutpat.</p>\n\
  </div>\n\
</div>",


	"Columns 4/8"				: "<div class=\"row\">\n\
  <div class=\"medium-4 columns\">\n\
		<img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f40a.svg\" alt=\"crocodile\">\n\
  </div>\n\
  <div class=\"medium-8 columns\">\n\
  	<p>Left column is set to use 4/12 columns width, while right column is set to take 8/12 columns width. This creates a two columns layout, which collapse into a single column on small screens. Read more about the grid <a href=http://foundation.zurb.com/docs/components/grid.html>here</a>.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus fringilla, risus ac lacinia consequat, ipsum augue posuere quam, eget commodo lorem augue vel dui. Sed elementum quis risus a volutpat.</p>\n\
  </div>\n\
</div>",


	"Block-Grid 3,2,1"	: "<!-- Evenly adjust content within a block-grid -->\n\
<!-- Read more: http://foundation.zurb.com/sites/docs/v/5.5.3/components/block_grid.html -->\n\
<ul class='small-block-grid-1 medium-block-grid-2 large-block-grid-3'>\n\
<li><div data-alert class=\"alert-box bg2\"><strong>Block Grid</strong><br>Block grids give you a way to evenly separate contents of a list within a grid. If you want to create a row with a specific amount of elements that need to stay evenly spaced, the block grid is your friend.</div></li>\n\
<li><img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f693.svg\"></li>\n\
<li><img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f691.svg\"></li>\n\
<li><img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f692.svg\"></li>\n\
<li><img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f699.svg\"></li>\n\
<li><img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f695.svg\"></li>\n\
</ul>",


	"About Me Example"	: "---\n\
\n\
<div class=\"row text-left\">\n\
  <div class=\"medium-6 columns\">\n\
    <div class=\"frame\">\n\
      <figure><!-- Add your own image in below src -->\n\
        <img alt=\"profile\" src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f3c2.svg\">\n\
      </figure>\n\
    </div>\n\
  </div>\n\
\n\
  <div class=\"medium-6 columns\">\n\
  <p><strong>Howdy!</strong><br>\n\
  My name is Bob Dobalina, and this website is my blog as well as a playground\n\
  for the X3 Photo gallery website CMS. <a href=\"https://www.photo.gallery\" target=\"_blank\">View Demo</a></p>\n\
\n\
  <p><strong>About me</strong><br>\n\
  I am interested in design, functionality, minimalism and performance. My hobbies are: sleeping, snoozing and watching TV.</p>\n\
\n\
  <p><strong>Article</strong><br>\n\
  More than a decade ago, when SWF was an emerging technology, this website became a very popular showcase of Flash. <a href=\"https://mjau-mjau.com/blog/rewind-web-2002/\">See Post</a></p>\n\
  </div>\n\
</div>",


	"Embed Youtube"			: "<div class='flex-video widescreen x3-style-frame'>\n\
	<iframe src='https://www.youtube.com/embed/A3PDXmYoF5U' frameborder='0' allowfullscreen></iframe>\n\
</div>",


	"Embed Vimeo"				: "<div class='flex-video widescreen vimeo x3-style-frame'>\n\
<iframe src='https://player.vimeo.com/video/84067859' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>\n\
</div>",


	"Embed Google Maps"	: "<div class='flex-video x3-style-frame' style='height:auto;'>\n\
<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d424396.3176723366!2d150.92243255000002!3d-33.7969235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b129838f39a743f%3A0x3017d681632a850!2sSydney+NSW%2C+Australia!5e0!3m2!1sen!2sth!4v1415268600966' frameborder='0' style='border:0'></iframe>\n\
</div>",


"Embed MP4 Video"	: "<!-- Upload an MP4 video file to your page, and use the code below to embed the video into your content. The {{path}} variable will dynamically convert to the folder path -->\n\
<video width=\"100%\" preload=\"metadata\" controls controlsList=\"nodownload\">\n\
<source src=\"{{path}}videofilename.mp4\" type=\"video/mp4\">\n\
</video>",


"Popup Links" : "<!-- Basic image popup. You can replace the href tag with \"{{path}}/filename.jpg\" to load an image within the same folder. Demo and documentation: https://demo.photo.gallery/examples/samples/popup/ -->\n\
<a href=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f405.svg\" data-popup>Tiger</a>\n\
\n\
<!-- Open Youtube video in popup -->\n\
<a href=\"https://www.youtube.com/embed/G46ygBKsTZI\" data-popup>Youtube Video</a>\n\
\n\
<!-- Open a website in browser popup-window. You can set window name, width and height  -->\n\
<a href=\"https://flamepix.com\" data-popup-window=\"name,800,600\">flamepix.com</a>",


"Carousel Plugin" : "<!-- content carousel. More info: https://demo.photo.gallery/examples/plugins/carousel/ -->\n\
<div data-carousel data-carousel-items=3 data-carousel-loop=true data-carousel-dots=true data-carousel-autoplay=3000 data-carousel-responsive=true data-carousel-shuffle=false>\n\
<div><h3>Camel</h3><img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f42b.svg\" /></div>\n\
<div><h3>Fish</h3><img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f41f.svg\" /></div>\n\
<div><h3>Squirrel</h3><img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f43f.svg\" /></div>\n\
<div><h3>Goat</h3><img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f410.svg\" /></div>\n\
<div><h3>Elephant</h3><img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f418.svg\" /></div>\n\
<div><h3>Ox</h3><img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f402.svg\" /></div>\n\
<div><h3>Whale</h3><img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f433.svg\" /></div>\n\
<div><h3>Blowfish</h3><img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f421.svg\" /></div>\n\
<div><h3>Turtle</h3><img src=\"https://cdnjs.cloudflare.com/ajax/libs/emojione/2.2.6/assets/svg/1f422.svg\" /></div>\n\
</div>",


"Modal Plugin" : "<!-- Add the modal element anywhere in your content. It will be hidden until triggered. -->\n\
<div id=\"modal_id1\" class=\"reveal-modal\" data-reveal aria-hidden=\"true\" role=\"dialog\">\n\
<a class=\"close-reveal-modal\" aria-label=\"Close\"><i class=\"fa fa-close\"></i></a>\n\
<h2>Modal Title</h2>\n\
<p>Modal content/html here.</p>\n\
</div>\n\
\n\
<!-- Include a link anywhere in your content to trigger a modal with a specific ID on click. Make sure the id of the modal element matches the data-reveal-id in the link! -->\n\
<a href=\"#\" data-reveal-id=\"modal_id1\">Open Modal link</a>",


"Tabs Plugin" : "<!-- Wrap all code inside a <section> with tabs-container class -->\n\
<!-- Optional style classes that can be included: tabs-style-1 OR tabs-style-2 -->\n\
<section class=\"tabs-container tabs-radius tabs-anim tabs-color-active\">\n\
\n\
<!-- Create a ul list that contains the tab links -->\n\
<!-- include the vertical class if you want to use vertical orientation -->\n\
<ul class=\"tabs\" data-tab>\n\
<li class=\"tab-title active\"><a href=\"#panel1\">Tab 1</a></li>\n\
<li class=\"tab-title\"><a href=\"#panel2\">Tab 2</a></li>\n\
<li class=\"tab-title\"><a href=\"#panel3\">Tab 3</a></li>\n\
<li class=\"tab-title\"><a href=\"#panel4\">Tab 4</a></li>\n\
</ul>\n\
\n\
<!-- Create a tabs content element that contains all tab contents  -->\n\
<!-- include the vertical class if you want to use vertical orientation -->\n\
<div class=\"tabs-content\">\n\
<div class=\"content active\" id=\"panel1\">\n\
<p>This is the first panel of the basic tab example.</p>\n\
</div>\n\
<div class=\"content\" id=\"panel2\">\n\
<p>This is the second panel of the basic tab example.</p>\n\
</div>\n\
<div class=\"content\" id=\"panel3\">\n\
<p>This is the third panel of the basic tab example.</p>\n\
</div>\n\
<div class=\"content\" id=\"panel4\">\n\
<p>This is the fourth panel of the basic tab example.</p>\n\
</div>\n\
</div>\n\
\n\
<!-- Make sure #links in the <a> anchor tags correspond with id's in the tabs-content! -->\n\
</section>",


"Alert Box" : "<!-- You can use any of the following color-tags: success alert bg2 bg3 primary warning info -->\n\
<div data-alert class=\"alert-box success\">\n\
\n\
<!-- close button below is optional -->\n\
<a href=\"#\" class=\"close close-x\"></a>\n\
\n\
Add your content/html here.\n\
</div>",


"Toggle Content" : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tristique quis justo luctus pulvinar. Nulla venenatis lacus eget sapien pretium dignissim. <span class=\"toggle-content\">Duis feugiat magna vitae fermentum euismod. Sed venenatis finibus lorem. Phasellus vel ante nibh. Praesent nec metus condimentum, vulputate ex vel, molestie sem. Praesent molestie tortor in mi tristique, at commodo lorem volutpat. Integer elementum facilisis erat, in pellentesque turpis venenatis ac.</span><br><a href=\"#\" class=\"toggle-button\" data-close-text=\"less\">more</a>\n\
\n\
<a href=\"#\" class=\"toggle-button\">What is a tomato?</a>\n\
<div class=\"toggle-content\">The <strong style=\"color: tomato;\">tomato</strong> is the edible, red fruit of Solanum lycopersicum, commonly known as a tomato plant, which belongs to the nightshade family, Solanaceae. The species originated in Central and South America. The Nahuatl (Aztec language) word tomatl gave rise to the Spanish word \"tomate\", from which the English word tomato originates.</div>",


"Contact Form (advanced)" : "<!-- More info on HTML forms: http://foundation.zurb.com/sites/docs/v/5.5.3/components/forms.html -->\n\
<!-- Always start your <form> with DATA-ABIDE attribute and \"contactform\" class -->\n\
<form data-abide class=\"contactform text-left\">\n\
\n\
<!-- All form elements must contain NAME attributes-->\n\
<div>\n\
<input type=\"text\" name=\"name\" placeholder=\"Name\" required>\n\
</div>\n\
\n\
<!-- Notice the REQUIRED attribute, which makes the input required -->\n\
<div>\n\
<input type='email' name='email' placeholder='Email' required>\n\
</div>\n\
\n\
<div>\n\
<input type=\"tel\" name=\"Phone Number\" placeholder=\"Phone number\">\n\
</div>\n\
\n\
<!--  Select lists -->\n\
<div>\n\
<strong>Ice Cream Flavor</strong>\n\
<select name=\"Ice Cream Flavour\">\n\
<option value=\"Vanilla flavor\">Vanilla</option>\n\
<option value=\"Chocolate flavor\">Chocolate</option>\n\
<option value=\"Strawberry flavor\">Strawberry</option>\n\
<option value=\"Pistachio flavor\">Pistachio</option>\n\
</select>\n\
</div>\n\
\n\
<!--  With radio groups NAME should be the same across all radios in the group. -->\n\
<!--  Include CHECKED attribute to set default checked value -->\n\
<div>\n\
<strong>Favorite color</strong><br>\n\
<input type=\"radio\" name=\"Favorite Color\" value=\"Red\" id=\"radio1\" checked><label for=\"radio1\">Red</label>\n\
<input type=\"radio\" name=\"Favorite Color\" value=\"Blue\" id=\"radio2\"><label for=\"radio2\">Blue</label>\n\
<input type=\"radio\" name=\"Favorite Color\" value=\"Green\" id=\"radio3\"><label for=\"radio3\">Green</label>\n\
</div>\n\
\n\
<!--  With checkboxes, set different NAME attributes. -->\n\
<!--  Include CHECKED attribute to set default checked values -->\n\
<div>\n\
<strong>I like to</strong><br>\n\
<input type=\"checkbox\" name=\"sleep\" value=\"Yes!\" id=\"check1\" checked><label for=\"check1\">Sleep</label>\n\
<input type=\"checkbox\" name=\"snooze\" value=\"As long as possble\" id=\"check2\"><label for=\"check2\">Snooze</label>\n\
<input type=\"checkbox\" name=\"doze\" value=\"All the time\" id=\"check3\"><label for=\"check3\">Doze</label>\n\
</div>\n\
\n\
<!--  textarea input -->\n\
<div>\n\
<strong>Message</strong>\n\
<textarea required rows=\"6\" name=\"message\" placeholder=\"Add your message\"></textarea>\n\
</div>\n\
\n\
<!-- Uncomment below section to include GDPR required email consent -->\n\
<!--\n\
<div>\n\
	<input type=\"checkbox\" id=\"consent\" name=\"consent\" required>\n\
	<label for=\"consent\">By using this form you agree with the handling of your data by this website.</label>\n\
</div>\n\
-->\n\
\n\
<!--  SEND button -->\n\
<button type=\"submit\">Send</button>\n\
\n\
<!-- End form -->\n\
</form>",


"Code Highlighter" : "<pre data-lang=\"javascript\"><code>\n\
var googoo = 'gaga';\n\
function get_googoo(){\n\
	return googoo;\n\
}\n\
get_googoo(); // returns 'gaga'\n\
</code></pre>"
};
///////////////////////////////////////////////////////////////
//	Author: Joshua De Leon
//	File: numericInput.js
//	Description: Allows only numeric input in an element.
//	
//	If you happen upon this code, enjoy it, learn from it, and 
//	if possible please credit me: www.transtatic.com
///////////////////////////////////////////////////////////////

//	Sets a keypress event for the selected element allowing only numbers. Typically this would only be bound to a textbox.
(function( $ ) {
	// Plugin defaults
	var defaults = {
		allowFloat: false,
		allowNegative: false
	};	
	
	// Plugin definition
	//	allowFloat: (boolean) Allows floating point (real) numbers. If set to false only integers will be allowed. Default: false.
	//	allowNegative: (boolean) Allows negative values. If set to false only positive number input will be allowed. Default: false.
 	$.fn.numericInput = function( options ) { 
		var settings = $.extend( {}, defaults, options ); 
		var allowFloat = settings.allowFloat;
		var allowNegative = settings.allowNegative;
		
		this.keypress(function (event) {
			var inputCode = event.which;
			var currentValue = $(this).val();

			if (inputCode > 0 && (inputCode < 48 || inputCode > 57))	// Checks the if the character code is not a digit
			{
				if (allowFloat == true && inputCode == 46)	// Conditions for a period (decimal point)
				{
					//Disallows a period before a negative
					if (allowNegative == true && getCaret(this) == 0 && currentValue.charAt(0) == '-') 
						return false;

					//Disallows more than one decimal point.
					if (currentValue.match(/[.]/)) 
						return false; 
				}

				else if (allowNegative == true && inputCode == 45)	// Conditions for a decimal point
				{
					if(currentValue.charAt(0) == '-') 
						return false;
					
					if(getCaret(this) != 0) 
						return false; 
				}

				else if (inputCode == 8) 	// Allows backspace
					return true; 

				else								// Disallow non-numeric
					return false;  
			}

			else if(inputCode > 0 && (inputCode >= 48 && inputCode <= 57))	// Disallows numbers before a negative.
			{
				if (allowNegative == true && currentValue.charAt(0) == '-' && getCaret(this) == 0) 
					return false;
			}
		});
		
		return this;
	};
	
	
	// Private function for selecting cursor position. Makes IE play nice.
	//	http://stackoverflow.com/questions/263743/how-to-get-caret-position-in-textarea
	function getCaret(element) 
	{ 
		if (element.selectionStart) 
			return element.selectionStart; 

		else if (document.selection) //IE specific
		{ 
			element.focus(); 

			var r = document.selection.createRange(); 
			if (r == null) 
				return 0; 

			var re = element.createTextRange(), 
			rc = re.duplicate(); 
			re.moveToBookmark(r.getBookmark()); 
			rc.setEndPoint('EndToStart', re); 
			return rc.text.length; 
		}  

		return 0; 
	};
}( jQuery ));

// Cloudflare API


// Cloudflare get domain ID
function cf_getDomainID(){
	$.post('cloudflare.php', { action: 'zones' }, function(data) {
		if(data.success && data.result.length > 0){
			cf_domain_id = data.result[0].id;
			localStorage.setItem('cf_domain_id', cf_domain_id);
			cf_addButton();
		} else {
			cloudflare = false;
		}
	}, 'json');
}

// Cloudflare get X3 URL
function cf_getUrl(){
	var arr = location.pathname.split('/');
	if(arr[arr.length-1].length < 1) arr.pop();
	arr.pop();
	return location.protocol + '//' + location.host + arr.join('/') + '/';
}

// Cloudflare get relative URL path from physical string
function cf_getRelPath(str){
	var lnk = str.replace('../../content/','').replace('../content/','').split('/');
  $.each(lnk, function(index, val) {
  	if(val.indexOf('.') > -1 && $.isNumeric(val.split('.')[0])) lnk[index] = val.split('.')[1];
  });
  lnk = lnk.join('/').replace(/\/?$/, '/').replace('index/','');
  return lnk;
}

// Cloudflare get all files
function cf_getAllFiles(){
	var url = cf_getUrl(),
			arr = [];

	// loop json_menu
	$.each(json_menu, function(index, val) {
		if(val.link.indexOf('custom/') !== 0) arr.push(url + val.link);
		/*var lnk = cf_getRelPath(val.link);
	  lnk = url + lnk
		arr.push(lnk);
		var json = lnk.replace(/\/$/, '') + '.json';
		if(index > 0) arr.push(json);*/
	});
	arr.push(url);
	arr.push(url +'custom/404/');
	arr.push(url +'sitemap');
	arr.push(url +'sitemap.xml');
	arr.push(url +'feed/');
	arr.push(url +'feed.xml');
	return arr;
}

// Cloudflare get current file
function cf_getCurrentFile(){
	var url = cf_getUrl();
	var lnk = cf_getRelPath(localStorage.getItem('current_page'));
	var arr = [];
	arr.push((lnk == '/') ? url : url + lnk); // link
	return arr;
}

// Cloudflare Flush Current Page
function cf_purgeFiles(all){
	if(deny_guest()) return;
	var purge_files = all ? cf_getAllFiles() : cf_getCurrentFile();
	show_preloader();
	x3_panel_container.addClass('cf-busy');
	$.post('cloudflare.php', { action: 'purge_files', zone_identifier: cf_domain_id, files: purge_files }, function(data) {
		if(data.success){
			show_errors_on_nav(language['Cloudflare_Flush_Success'], 'green');
		} else {
			show_errors_on_nav(language['Cloudflare_Flush_Fail'], 'red');
		}
		x3_panel_container.removeClass('cf-busy');
	}, 'json');
}

// Cloudflare add button to nav
function cf_addButton(){

	// html dropdown

	x3_navbar_nav.append('<li class="dropdown cloudflare-dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-cloud"></span></a><ul class="dropdown-menu pull-right dropdown-menu-right" role="menu"><li role="presentation" class="dropdown-header">CLOUDFLARE</li><li id=cf_flush_current><a href="#"><span class="glyphicon glyphicon-trash"></span>&nbsp; '+language['Cloudflare_Flush_Current_Page']+'</a></li><li id=cf_flush_all><a href="#"><span class="glyphicon glyphicon-trash"></span>&nbsp; '+language['Cloudflare_Flush_All_Pages']+'</a></li></ul></li>');

	var cloudflare_el = x3_navbar_nav.children('.cloudflare-dropdown'),
			cloudflare_dropdown = cloudflare_el.children('.dropdown-menu');
	//$('.navbar-nav > li').last().after('<li class="dropdown cloudflare-dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-cloud"></span></a><ul class="dropdown-menu pull-right dropdown-menu-right" role="menu"><li role="presentation" class="dropdown-header">CLOUDFLARE</li><li id=cf_flush_current><a href="#"><span class="glyphicon glyphicon-trash"></span>&nbsp; '+language['Cloudflare_Flush_Current_Page']+'</a></li><li id=cf_flush_all><a href="#"><span class="glyphicon glyphicon-trash"></span>&nbsp; '+language['Cloudflare_Flush_All_Pages']+'</a></li></ul></li>');

  // dropdown hover
  cloudflare_el.hoverIntent({
    over: function(e){
    	cloudflare_dropdown.velocity({opacity:1}, {duration: 200,display:'block'});
    	cloudflare_el.addClass('open');
    },
    out: function(){
    	cloudflare_dropdown.velocity('stop').css({'opacity':0, 'display':'none'});
    	cloudflare_el.removeClass('open');
    },
    timeout: 300
	});

	// actions
	cloudflare_el.on('click', '#cf_flush_current', function(e) {
		e.preventDefault();
		cf_purgeFiles(false);
	});
	cloudflare_el.on('click', '#cf_flush_all', function(e) {
		e.preventDefault();
		cf_purgeFiles(true);
	});
}

// Initiate cloudflare;
var cf_domain_id,
		cf_checked = false;
function cf_load(){
	if(cloudflare && !cf_checked && supports_local_storage()) {
		cf_checked = true;
		if(localStorage.getItem('cf_domain_id') !== null) {
			cf_domain_id = localStorage.getItem('cf_domain_id');
			cf_addButton();
		} else {
			setTimeout(function(){ cf_getDomainID(); }, 1000);
		}
	}
}



// x3_panel.events.js

x3_body.on('keypress.nospace, keyup.nospace', 'input.file-link, [name="gallery.image.link"]', function(e) {
	// Prevent spacebar on input
	if(e.which == 32) {
		return false;
	} else {
		// Add has-link if input is not empty
		var el = $(this);
		el.parent().toggleClass('has-link', el.val().length > 0);
	}

// Set image input link HREF on mouseenter
}).on('mouseenter', '.file-data > a', function(e) {
	var el = $(this),
			page = x3_content_show.find('a.view-page').attr('href'),
			name_ext = el.closest('tr').data('name'),
			name = name_ext.substr(0, name_ext.lastIndexOf('.')),
			val = el.parent().children('input.file-link').val().replace('{file_name}', name).replace('{file_name_ext}', name_ext),
			link = val.toLowerCase().indexOf('http') === 0 ? val : (val.indexOf('/') === 0 ? '..' + val : page + val);
	el.attr('href', link);

	if(el.parent().find('label.active').data('name') === 'popup') {
		el.attr('data-popup-window', '');
	} else {
		el.removeAttr('data-popup-window');
	}

// Toggle "has-focus" class on input focus
}).on('focus', 'input.file-link', function(e) {
	$(this).parent().addClass('has-focus');
}).on('blur', 'input.file-link', function(e) {
	$(this).parent().removeClass('has-focus');

// Show help
}).on('mouseenter', '.file-data > input, .file-data > textarea', function(e) {
	$(this).prev().addClass('has-hover');
}).on('mouseleave', '.file-data > input, .file-data > textarea', function(e) {
	$(this).prev().removeClass('has-hover');

// Save preview image from gallery
}).on('click', 'a.set-preview, span.set-preview', function(e) {
	e.preventDefault();
	var name = $(this).closest('tr').data('name');
	save_inject({"image": name}, function(success){
		if(success) {
			// Update page settings image
			var selectize = x3_content_show.find('input.form-control.selectized[name="image"]');
			if(selectize.length) selectize[0].selectize.addItem(name, true);
		}
	}, 'Changed folder preview image.');

// Hide file or folder in gallery ROW
}).on('click', '.hide-file', function(e) {
	e.preventDefault();

	// vars
	var el = $(this),
			row = el.closest('tr'),
			name = row.data('name'),
			is_folder = row.hasClass('is-folder'),
			is_jpg = !is_folder && $.inArray(row.data('ext'), ['jpg', 'jpeg', 'pjpeg']) > -1,
			hide = !row.hasClass('is-hidden'),
			success_msg = name + ' ' + (hide ? lang('Hide') : lang('Unhide')),
			ob = {};

	// folder
	if(is_folder){
		var mypath = row.data('path');
		ob[mypath.split('./content/')[1]] = { hidden: hide };
		set_folders(ob, function(){
			toggle_row(row, hide);
			toggle_menu_item(null, hide, mypath);
			x3Notifier(success_msg, null, null, 'success');
		});

	// is JPG (IPTC)
	/*} else if(is_jpg){

		// preloader modal
		preloader.modal('show');

		// ob
		ob.iptc = true;
		ob.files = {};
		ob.files[name] = {
			hidden: hide ? '1' : '',
			path: row.data('path').replace('../../', '../'),
			date: row.data('date')
		};

		// post
		$.post('x3_settings.php', ob).done(function(data) {
			if(data.success) {
				toggle_row(row, hide);
				x3Notifier(success_msg, null, null, 'success');
			} else {
				var error_msg = data.error ? data.error : 'Failed to ' + (hide ? 'hide' : 'unhide') + ' item';
				x3Notifier(error_msg, null, null, 'danger');
			}

		// fail
  	}).fail(function(data) {
  		var error_msg = 'Failed to POST to X3 settings' + (data.statusText ? ': ' + data.statusText : '');
			x3Notifier(error_msg, null, null, 'danger');

		// always
	  }).always(function(data) {
	  	preloader.modal('hide');
	  });*/

	// file
	} else {
		ob[name] = { hidden: hide };

		// IPTC on save inject
		if(is_jpg && current_settings.back.use_iptc){
			ob.iptc_inject = {};
			ob.iptc_inject[name] = {
				hidden: hide ? '1' : '',
				path: row.data('path').replace('../../', '../'),
				date: row.data('date')
			};
		}

		// save inject
		save_inject(ob, function(success){
			toggle_row(row, hide);
		}, success_msg);

		// is JPG IPTC redundant hidden save (alread applied above)
		/*if(is_jpg && current_settings.back.use_iptc){
			setTimeout(function(){
				var iptc_ob = {iptc:true, files: {}};
				iptc_ob.files[name] = {
					hidden: hide ? '1' : '',
					path: row.data('path').replace('../../', '../'),
					date: row.data('date')
				};
				$.post('x3_settings.php', iptc_ob);
			}, 1000);
		}*/
	}

// click folder icon
}).on('click', '.td-folder', function(e) {
	$(this).next().children('a').click();

// toggle refresh menu
}).on('click', 'input[name="settings.menu_manual"]', function(e) {
	x3_navbar_nav.children('li#refresh').toggleClass('hidden', !$(this).is(':checked'));

// previews refresh click dir
}).on('click', '.previews-log td.dir > a', function(e) {
	e.preventDefault();
	showFileManager($(this).attr('href'));
});


// toggle hide row
function toggle_row(row, hide, mypath){
	if(!row) row = rows_folders.filter('[data-path="' + mypath + '"]');
	var hide_text = hide ? lang('Unhide') : lang('Hide');
	row.toggleClass('is-hidden', hide);
	row.find('span.hide-file').toggleClass('fa-eye', !hide).toggleClass('fa-eye-slash', hide).attr('title', hide_text);
	row.find('a.hide-file').text(hide_text);
}

// toggle hide menu item
function toggle_menu_item(anchor, hide, mypath){
	if(!anchor) anchor = x3_panel_container.find('#left_folder_menu_box').find('a[data-href="' + mypath.replace(/"/g, '&quot;') + '"]').parent();
	if(anchor.length) {
		anchor.toggleClass('is-hidden', hide);
	}
}



// X3 panel filedata

// Collect data into object
function collectFiledata(rows){

	// ob
	var ob = {};

	// loop
	rows.each(function(index, val) {

		// vars
		var row = $(this),
				el = row.find('.file-data'),
				name = row.data('name'),
				title = el.children('.file-title').val()
				description = el.children('.file-description').val(),
				link = el.children('.file-link').val(),
				target = el.find('label.active').data('name'),
				params = el.children('.file-params').val(),
				custom_index = row.attr('data-custom'),
				hidden = row.hasClass('is-hidden');

		// img object
		var img_ob = {};
		if(title) img_ob.title = title;
		if(description) img_ob.description = description;
		if(link) {
			img_ob.link = link;
			if(target !== 'auto') img_ob.target = target;
		}
		if(params) img_ob.params = params;
		if(custom_index) img_ob.index = parseInt(custom_index);
		if(hidden) img_ob.hidden = true;

		// Add img_ob if has properties
		if(Object.keys(img_ob).length) ob[name] = img_ob;
	});

	// return object or false
	return Object.keys(ob).length ? ob : false;
}


// x3_panel.folders.js
// set various in folders.json

function set_folders(ob, callback){
	if(deny_guest()) return;

	// preloader modal
	preloader.modal('show');

	// set data folders
	var data = {
		folders: JSON.stringify(ob)
	}

	// post
	$.post('x3_settings.php', data).done(function(result) {

		// success
    if(result.success) {

    	// callback
    	if(callback) callback();

    	// update folders object
    	$.extend(true, folders, ob);

    	// clean empty indexes
    	Object.keys(ob).forEach(function(key) {
				if(folders.hasOwnProperty(key) && folders[key].hasOwnProperty('index') && !folders[key]['index']) delete folders[key]['index'];
			});

			x3_log('set folders:', folders);

    // soft fail
    } else {
    	var error_msg = result.error ? result.error : 'Error in x3_settings.php';
			x3Notifier(error_msg, null, null, 'danger');
    }

  // hard fail
  }).fail(function(data) {
  	var error_msg = 'Failed to POST to x3_settings.php' + (data.statusText ? ': ' + data.statusText : '.');
		x3Notifier(error_msg, null, null, 'danger');

  // always
  }).always(function() {
    preloader.modal('hide');
  });
}

function update_folders_key_array(selected, here, new_name, copy){
	if(!selected || !here || !new_name) return;

	// fix .. ../.. ../folder
	if(new_name.indexOf('./content') == -1 && new_name.indexOf('.') === 0) {
		var arr = new_name.split('..'),
				new_name = arr[arr.length - 1] ? '../content' + arr[arr.length - 1] : '../content';
	}

	// convert to array
	if(!Array.isArray(selected)) selected = [selected];
	var old_dirs = [],
			new_dirs = [];

	// remove JPG files
	selected = remove_jpg(selected);
	if(!selected.length) return;

	// loop
	selected.forEach(function(el) {
		old_dirs.push(here + '/' + el);
		new_dirs.push(new_name + '/' + el);
	});

	// process update folders key
	update_folders_key(old_dirs, new_dirs, copy);
}

// update folders key
function update_folders_key(old_dirs, new_dirs, copy){

	if(!Object.keys(folders).length || !old_dirs || !new_dirs) return;
	if(!Array.isArray(old_dirs)) old_dirs = [old_dirs];
	if(!Array.isArray(new_dirs)) new_dirs = [new_dirs];
	if(!old_dirs.length || !new_dirs.length) return;

	for (var i = 0; i < old_dirs.length; i++) {
    var old_dir = get_content_path(old_dirs[i]),
    		new_dir = get_content_path(new_dirs[i]);

    if(old_dir && new_dir) Object.keys(folders).forEach(function(key) {
			if(key.indexOf(old_dir) === 0) {
				folders[key.replace(old_dir, new_dir)] = folders[key];
				if(!copy) delete folders[key];
			}
		});
	};
}

// remove folders key
function remove_folders_key(dirs, here){
	if(!dirs || !Object.keys(folders).length) return;

	// array
	if(Array.isArray(dirs) && here) {
		if(!dirs.length) return;
		dirs = remove_jpg(dirs);
		if(!dirs.length) return;
		for (var i = 0; i < dirs.length; i++) {
	    var dir = get_content_path(here + '/' + dirs[i]);
	    if(dir) Object.keys(folders).forEach(function(key) {
				if(key.indexOf(dir) === 0) delete folders[key];
			});
		};
		return;
	}

	// string
	var dir = get_content_path(dirs);
	if(dir) Object.keys(folders).forEach(function(key) {
		if(key.indexOf(dir) === 0) delete folders[key];
	});
}

// get content path
function get_content_path(str){
	var search = '/content/';
	search = str.indexOf('.' + search) > -1 ? ('.' + search) : search;
	if(str.indexOf(search) == -1) return str.replace(/\/\/+/g, '/').replace(/\/$/, '');
	var arr = str.replace(/\/\/+/g, '/').replace(/\/$/, '').split(search);
	arr.shift();
	return arr.join(search);
}

// remove jpg files from array
function remove_jpg(myarray){
	return myarray.filter(function(dir){
		var arr = dir.split('.');
		return arr.length < 2 || arr.pop().toLowerCase() !== 'jpg';
	});
}

// add folders key (mkdir)
function add_folders_key(dir, val){
	var ob = {};
	ob[dir] = val;
	$.extend(folders, ob);
}


// x3_panel.help.js

x3_help = {
	"new_folder": "<h3>Create New Folder</h3><p>Creates a new child-page (subfolder) inside the current page. The name you give to the folder represents the page URL (slug) in browser, and should be short and simple.</p><h4>Numbered Folder Names</h4><em>* Optional</em><p>Unless you intend to use custom sorting (by drag and drop), you can add a number in front of the folder name to indicate the sort order of the page. The number will not display in the actual URL.</p><p>The following example creates a page with sort order 4:<br><strong><code>4.foldername</code></strong> : <code>yourwebsite.com/foldername/</code><br><em>* The initial number in folder name will NOT display in the URL.</em></p><h4>Folder names are <u>NOT</u> page titles</h4><p>Folder names are only used for the URL and to identify the page. You should use the page <code>title</code> option for extensive page titles, and the <code>label</code> setting for menu labels. The folder name should be as simple as possible, preferably a single lowercase word, without special characters or empty spaces.</p><h4>Empty spaces not allowed</h4><p>Empty spaces are NOT allowed in folder names. Even if they were allowed, it would create ugly url's that are bad for SEO: <code>/not%20nice%20url/</code>. If you need to use multiple words, separate them with hyphens- instead: <code>/nice-url/</code>.</p><h4>Other disallowed characters</h4><p>Other characters that are not allowed in folder names include <code>#$%^&*()+=[]\'\"/\\|{}`~!@</code>. Most of these characters are simply not allowed in URL's, while some characters are disallowed because they break the functionality of X3.</p>",

	"protect": "<h3>Page Password Protection</h3><p>Here you can add passwords to your pages. Simply locate the page in the <code>link</code> field, add a <code>username</code> and <code>password</code>, and click save. The specific page will now require login when accessed by any visitor.</p><h4>Users</h4><p><em>* Optional</em></p><p>Instead of adding a username and password per page link, you can instead include <code>users</code> to give specific users access to a page. Users are added separately from the <code>users</code> tab. The benefit of \"users\", is that you can assign a single login for a user, which may allow them access to multiple protected pages without re-entering login credentials. Also, it is sometimes easier to manage usernames and passwords in a users section for persistent usage.</p><p><em>* You should select either a user <strong>OR</strong> username+password, not both.</em></p><h4>Recursive Protection</h4><p>Link protection is recursive, which means the login for a specific link will inherit upon child pages. For example, a password applied to <code>galleries/</code> would also apply for child-pages <code>galleries/food/</code> and <code>galleries/landscape/</code>. If you are specifically protecting child-pages of already-protected parent-pages, the child-page login will outrank the parent-page login.</p><h4>Global Protect</h4><p>Use the special <code>*Global</code> link to protect your entire X3 website. Basically this is like protecting the / root page, and since link-protection is recursive, it will protect ALL pages - your entire website. <em>* You can still apply passwords to child-pages, which will outrank the global protection.</em></p><h4>Super Users</h4><p>There is a special <code>superuser</code> user, which can access ALL password-protected pages without even being assigned specifically for the link. A super-user should normally be reserved for gallery-owners who want to remember a single login that works on all password-protected pages. Create a super-user in the users-section by simply appending an asterisk* behind the username, for example <code>superuser*</code>. Since super-users are allowed access to ALL password-protected pages, they do not show up in the list of available users to assign from the links tab.</p><p><em>* The asterisk* character is part of the username, and needs to be included when logging in.</em></p><h4>Sessions</h4><p>Login uses WWW-Authenticate, which basically creates \"sessions\" in the browser that remembers the current authentication. This helps so the visitor doesn't need to re-authenticate, and it also allows a \"user\" to access all pages they are assigned to without having to enter login details more than once. This is a good thing of course, but since there is no \"logout\" for these sessions, it can make testing difficult from your browser since you may be logged in to a session already. Therefore, if you are testing your protected pages, you may need to use \"New Incognito Window\" (Google Chrome), or \"New Private Window\" (Safari, Firefox) for each test. These special windows do not inherit your browser sessions, so you can test properly. Just remember to to open/close the window for each test, because even private windows have temporary sessions until they are closed.</p>",

	"page-examples": "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong class=title>Examples</strong><span class=content>This folder contains examples of various layouts for your pages. You can delete or hide this page. <strong>NB!</strong> For the sake of demonstration, all galleries in the examples section are set to load images from the <em>3.examples/assets</em> folder.</span></div>",

	"page-logo": "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong class=title>Logo</strong><span class=content>Upload your logo here if you have selected <strong>image logo</strong> in <em>Settings &rsaquo; Style &rsaquo; Logo</em>.</span></div>",

	"page-audio": "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong class=title>Audio Player Files</strong><span class=content>To enable audio, upload one or more mp3 files, and enable the audio player plugin from <em>settings &rsaquo; plugins &rsaquo; audio player</em>. If you get errors on mp3 file upload, it is likely because your server has a <strong>2MB upload_max_filesize</strong> limit in php.ini (see <a href=\"../?diagnostics\" target=_blank>diagnostics</a>). If so, you will need to either increase upload_max_filesize on your server, or upload mp3 files by FTP.</span></div>",

	"page-404": "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong class=title>404 \"Page Not Found\" Template</strong><span class=content>This page can be edited to change text and appearance of the page that appears when a page is not found.</span></div>",

	"page-custom": "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\" style='visibility: visible;'><span aria-hidden=\"true\">&times;</span></button><strong class=title>Custom</strong><span class=content>This folder is for special features and custom files.</span></div>",

	"page-files": "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\" style='visibility: visible;'><span aria-hidden=\"true\">&times;</span></button><strong class=title>Custom Files</strong><span class=content>Contains folders where you can store custom files to use in your website.</span></div>",

	"page-files-generic": "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\" style='visibility: visible;'><span aria-hidden=\"true\">&times;</span></button><span class=content>* Files in this folder can be used in pages and plugins with dynamic source path <strong>{{files}}/{{foldername}}/</strong>filename.jpg.</span></div>",

	"page-javascript": "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\" style='visibility: visible;'><span aria-hidden=\"true\">&times;</span></button><strong class=title>Custom Javascript Files <span style='font-weight: 400;'>[Advanced]</span></strong><span class=content>Upload custom javascript files here. <br><br>* Files with \"include\" in the name (for example <strong>\"myscript.include.js\"</strong>) will automatically load into the website.</span></div>",

	"page-images": "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\" style='visibility: visible;'><span aria-hidden=\"true\">&times;</span></button><strong class=title>Custom images</strong><span class=content>Upload custom images here which can be used in your pages and plugins.<br><br>* Images in this folder can be used in pages and plugins with dynamic source path <strong>{{files}}/images/</strong>filename.jpg.</span></div>",

	"page-css": "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\" style='visibility: visible;'><span aria-hidden=\"true\">&times;</span></button><strong class=title>Custom CSS Files <span style='font-weight: 400;'>[Advanced]</span></strong><span class=content>Upload custom css files here.<br><br>* Files with \"include\" in the name (for example <strong>\"mystyle.include.css\"</strong>) will automatically load into the website.</span></div>",

	"page-index": "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\" style='visibility: visible;'><span aria-hidden=\"true\">&times;</span></button><strong class=title>Home Page</strong><span class=content>The folder name <em>index</em> represents your home page. You can hide it from the menu by clicking the \"hide\" button. The index page cannot contain child pages (subfolders) and is just a placeholder for your home page.</span></div>",

	"page-content": "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\" style='visibility: visible;'><span aria-hidden=\"true\">&times;</span></button><strong class=title>Content Folder</strong><span class=content>This is your main content folder where you add your page structure. This folder does not represent any page and is just the container for all your pages. Do not upload images into this folder.</span></div>",

	"page-assets": "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\" style='visibility: visible;'><span aria-hidden=\"true\">&times;</span></button><strong class=title>Examples Gallery Assets</strong><span class=content>This is where we store images for galleries in the examples sample pages.</span></div>",

	"page-favicon": "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\" style='visibility: visible;'><span aria-hidden=\"true\">&times;</span></button><strong class=title>Favicon</strong><span class=content>Add a custom favicon <a href=https://en.wikipedia.org/wiki/Favicon target=_blank>[wiki]</a> by deleting the default \"favicon.png\", and uploading your own icon in PNG format [32 x 32 px].<br><br><strong>Tip!</strong> Use a new filename (for example \"favicon2.png\") to prevent browser from caching old favicon file.</span></div>",

	"preload": "<h3>Preload Website</h3><p>When set to <strong>auto</strong> or <strong>create</strong>, your website will preload a compressed data file containing all pages in your website. This will make your website seem super-fast to visitors, as pages will display instantaneously on page navigation.</p><p>Visit the <a href=\"https://demo.photo.gallery\" target=\"_blank\">X3 Demo</a> and navigate the menu to try this feature in effect.</p><p><code>no</code><br>No preloading will occur and data file will not be created.</p><p><code>auto</code> <em>* default</em><br>X3 will automatically build the data file as your pages are navigated. This means the data file will populate progressively until all your pages are visited once. When you edit anything from the panel, the data file will become invalid and start re-building from scratch again. The advantage of this option, is that it is an automatic process with no management required.</p><p><code>create</code><br>When set to 'create', you will have the option to CREATE the full website data file directly from the panel. The advantage of this option, is that you can create the FULL website data file up front, directly from the panel. This is the most powerful option, but it requires that you manually create the website data file every time you wish to publish changes you have made from the panel.</p><p><strong>Warning:</strong> If your website is very large and/or you have a slow server, the manual create process may take a long time to complete and in some cases fail.</p><hr><ul><li>Loading of the data file occurs as an invisible process after first page is loaded.</li><li>Data file will only cache page navigation requests (navigating internally in the website).</li><li>The data file does not cache images or other static assets.</li><li>Password protected pages are never cached</li><li>Data file size is limited to 1MB when set to <strong>[auto]</strong>.</li></ul>",

	"authorize": "<h3>Authorize</h3><p>Checks if your domain is authorized to used X3.</p>",

	"menu": "<h3>Create Menu</h3><p>Click the button to create- and <u>cache</u> your X3 website menu. Once the menu is created, it will be cached until next time you make any changes to your X3 website. The cached menu fragment will allow separate pages to build faster.</p><h4>Do I need this?</h4><p>No - This operation is optional because the menu will be created- and cached on the first page visit regardless. This process may be helpful for X3 websites with a heavy menu structure where you wish to pre-cache the menu before loading any pages.</p><h4>About Menu Caching</h4><p>Every time you make <u>any</u> change to your X3 website, the menu needs to get re-created and cached. The menu creation is a relatively heavy process, because it requires X3 to loop through <u>all</u> folders in your content, read the data file and gather information about all files. The speed of this process is proportional to the amount of folders and files in your content, and the speed of your server.</p>",

	"htaccess": "<h2>" + (conf_editor ? conf_editor : '') + "</h2><p><em>* This is an advanced feature. Do NOT edit this file unless you know what you are doing.</em></p><p>This page displays the content of the <code>" + (conf_editor ? conf_editor : '') + "</code> file in your root X3 directory. The " + (conf_editor ? conf_editor : '') + " file is necessary for X3 to be able to run properly. This feature is mainly used to diagnose issues, but can also be used to edit the " + (conf_editor ? conf_editor : '') + " file if it is writable.</p>" + (conf_editor === 'htaccess' ? '<h3>Custom rules</h3><p>If you need to add custom rules, you should wrap them inside <code># custom rules start</code> and <code># custom rules end</code> tags, so they are copied when you apply X3 updates. For example:</p><pre><code># custom rules start<br><br>YOUR CUSTOM RULES HERE<br><br># custom rules end</code></pre>' : ''),

	"reset": "<h3>Reset</h3><p>This setting resets your global settings to default, by simply deleting the <code>config/config.user.json</code> file. It does NOT affect page-settings stored in your pages/folders. </p>",

	"templates": "<h3>Setting Templates</h3><p>Setting templates are tested combinations of settings, which can be applied to folders- and gallery. Basically, they are just shortcuts for certain layout-combinations, which you otherwise can apply normally. You don\'t need to use setting templates, but they offer a quick way to achieve specific layouts.</p><p><strong>Important</strong><br>Default setting templates only change a <em>few</em> related options each, and many settings will remain default. Therefore, it is likely you may wish to make some adjustments after applying a template. Templates may not affect specific layout details, tooltips- or captions, so results may depend on your defaults.</p><h4>Custom Templates</h4><p>Create your own templates by selecting the <code>Save Current Settings As...</code> option. This will allow you to save current settings as a custom template.</p><p><em>* You still need to click SAVE after applying a template.</em></p>",

	"image_title": "<h3>Image Title</h3><p>Add a unique title for your image. Titles may display in gallery layouts and in the image popup, and are also used for the image <code>alt=\"\"</code> tag (accessibility and SEO). <em>* You can use any characters in image title</em>.</p><h4>Some html allowed</h4><p>You are allowed to use the following html tags in image titles:<br><code>&lt;code&gt;&lt;a&gt;&lt;span&gt;&lt;em&gt;&lt;i&gt;&lt;b&gt;&lt;strong&gt;&lt;small&gt;&lt;s&gt;</code></p><h4>Dynamic Values</h4><p>You can use the following values in titles, which are replaced dynamically. This may be useful if you are including file names, or links that refer to the image name.</p><p><code>{file_name_ext}</code> is replaced by the file name.<br><code>{file_name}</code> is replaced by the file name <em>without</em> extension.<br><code>{path}</code> is replaced by the path of current folder.<br><code>{image_path}</code> is replaced by the path to the image.</p>",

	"image_description": "<h3>Image Description</h3><p>Add a unique description for your image. Descriptions may display in gallery layouts and in the image popup. <em>* You can use any characters in image description</em>.</p><h4>Some html allowed</h4><p>You are allowed to use the following html tags in image descriptions:<br><code>&lt;a&gt;&lt;span&gt;&lt;em&gt;&lt;i&gt;&lt;b&gt;&lt;strong&gt;&lt;small&gt;&lt;s&gt;&lt;br&gt;&lt;mark&gt;&lt;img&gt;&lt;kbd&gt;&lt;code&gt;&lt;button&gt;</code></p><h4>Dynamic Values</h4><p>You can use the following values in default description, which are replaced dynamically. This may be useful if you are including file names, or links that refer to the image name.</p><p><code>{file_name_ext}</code> is replaced by the file name.<br><code>{file_name}</code> is replaced by the file name <em>without</em> extension.<br><code>{path}</code> is replaced by the path of current folder.<br><code>{image_path}</code> is replaced by the path to the image.</p>",

	"image_link": "<h3>Image Link</h3><p>If you set an image link, clicking an image will open the link instead of the image. You can use absolute- or relative links. <em>* If you want to link to an X3 page, you should use a relative path so that the link is loaded by ajax.</em></p><p><code>https://flamepix.com</code><br><em>* Absolute link.</em></p><p><code>/pagex/pagey/</code><br><em>* Link is relative to domain name.</em></p><p><code>pagex/pagey/</code><br><em>* Link is relative to current page.</em></p><h4>Dynamic Values</h4><p>You can use the following variables in your links, which are replaced dynamically:</p><p><code>{file_name_ext}</code> is replaced by the file name.<br><code>{file_name}</code> is replaced by the file name <em>without</em> extension.<br><code>{path}</code> is replaced by the file path of current folder.<br><code>{image_path}</code> is replaced by the path to the image.</p><h3>Target</h3><p>Target decides in what window to open the link.</p><p><code>auto</code> Uses default target, or automatically determines target depending on the link.<br><code>_self</code> Opens the link in the same window.<br><code>_blank</code> Opens the link in a new window (normally a new tab).<br><code>popup</code> Opens the link in a popup window.<br><code>X3 popup</code> Opens link in native X3 popup. <em>* Good for Youtube embeds, images and simple content, but should <u>not</u> be used when linking to full websites.</em></p>",

	"params": "<h3>Parameters</h3><p>Custom image parameters for various plugins. Options are added in a querystring format:<br><pre><code>option1=2&option2=hello&option3=false</code></pre></p><h4>Panorama plugin options</h4><p><span class=\"code-inline-block\"><code>id</code><code>title</code><code>open</code><code>width</code><code>height</code><code>type</code><code>source</code><code>source_4096</code><code>preview</code><code>levels</code><code>path</code><code>url_format</code><code>zero_padding</code><code>index_start</code><code>tilesize</code><code>yaw</code><code>pitch</code><code>fov</code><code>maxVFov</code><code>maxHFov</code><code>pitch_min</code><code>pitch_max</code><code>maxResolution</code><code>pinFirstLevel</code><code>zoom</code><code>scene_id</code><code>scene_index</code><code>geo</code><code>geo_zoom</code></span></p>",

	"custom_sort": "<h2>Custom Sort</h2><p>This mode allows you to drag-and-drop items into a custom sorting order. After you have sorted items, click the &quot;save&quot; button.</p><p>Files and folders are by default sorted by name. When you add new files or folders, they will automatically be sorted by name also. However, if you have already applied custom sorting, new files and folders will be added to the top of the list.</p>",

	"previews": "<h2>Update Preview Images</h2><p>This tool will attempt to set preview images for your pages, unless already set correctly.</p><p><em>What are page preview images?</em><br>Page preview image is a unique image that identifies a page. It is used in category listing pages, in the mega menu, and also when sharing the page.</p><p><em>Do my pages need preview images?</em><br>No, but if you are using the mega menu, you may want to have unique preview images for each page. If you don't set a unique preview image, default preview image will be used.</p><p><em>Why isn't this process automatic?</em><br>This process is too slow to be handled automatically by the frontend.</p><p><em>How does this tool help?</em><br>You might have forgotten to set a preview image? Perhaps you want your category pages to inherit preview image from a child folder? Maybe you renamed an image that is used for preview? This tool will correct issues for you.</p><p><em>This tool will attempt to perform the following on all your pages:</em></p><strong>If preview image is set</strong><ol><li>Checks if the preview image is valid.</li><li>Checks if <code>preview.jpg</code> exists in folder.</li><li>Tries to set first image from the page gallery.</li><li>If the page has no images, tries to set first image from page gallery assets.</li><li>If no success, you will be notified 'Cannot locate image'.</li></ol><strong>If preview image is <u>NOT</u> set</strong><ol><li>Checks if <code>preview.jpg</code> exists in folder.</li><li>Tries to set first image from the page gallery.</li><li>If page has no images, tries to set first image from gallery assets.</li><li>If page has no assets assigned, tries to set image from first image in last child folder.</li><li>If no success, preview will be left empty.</li></ol>",

	"refresh": "<h2>Refresh Menu</h2><p>Click this button to refresh your site main menu.</p><h4>Why isn't this process automatic?</h4><p>Building the menu can be a slow process because it requires looping through all pages, extracting data, and looping through images. Why re-build the menu each time you make a change if the change does not affect the menu? Use this button to publish your site menu when required. Pages will get created faster when the menu is cached.</p><h4>Can I set it to automatic?</h4><p><strong>Yes.</strong> Go to <em>Settings › Advanced › Menu Processing</em>, and disable <em>Manual refresh</em>. If you disable this feature, the site menu will be re-created every time you make <em>any</em> changes from the panel. Depending on the depth of your content and the speed of your server, this could drastically slow down page creation time.</p><p><em>* Manual menu refresh does not affect output speed of already-cached pages.</em></p>",

	"vertical_split": "<h3>Split View</h3><p>The split view setting allows you to split each item into two columns, with image on one side and caption on the other. This setting works best with the <code>vertical</code> layout, but can also be used with <code>grid</code> and <code>carousel</code>.</p><p><em>* Below is an example of an item displaying in split view.</em></p><div style='overflow:auto;'><div style='width:50%; padding: .5em; float:left;'><div style='background:#CCC; padding: 2em 0;text-align: center;font-size:2em;'>image</div></div><div style='width:50%; padding: .5em; float:left;'><div style=''><strong>Title</strong><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean accumsan justo vulputate arcu posuere scelerisque. Mauris at sollicitudin ante.</p></div></div></div><h4>Ratio</h4><p>The split view is based on a 12-column grid, and default ratio <strong>6</strong> means the columns will split into two equally-sized columns. If you increase the ratio, the left column will occupy more space. The ratio can be set from <strong>2 to 10</strong>, indicating how many columns the left side should occupy. Normally, you should be considering values between 4 and 8 for any functional layout.</p><p><em>* Example of ratio to set 4, which means left side will occupy 33.3% of the available width</em></p><div style='overflow:auto;'><div style='width:33.3%; padding: .5em; float:left;'><div style='background:#CCC; padding: 2em 0;text-align: center;font-size:2em;'>image</div></div><div style='width:66.6%; padding: .5em; float:left;'><div style=''><strong>Title</strong><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean accumsan justo vulputate arcu posuere scelerisque. Mauris at sollicitudin ante.</p></div></div></div><h4>Invert</h4><p>By default, the split is inverted so that preview-image is on the left, and text is on the right. If you disable invert, the text will be on the left, and image on the right.</p>",

	"page_title": "<h2>Page Title</h2><p>This is the main title of your page. If you don't set a page title, title will be inherited from <em>folder name</em>. Page title is used for the following:</p><ul><li><code>&lt;h1&gt;</code> large title at the top of page content.</li><li><code>&lt;title&gt;</code> meta tag used for SEO and sharing. <em>* Can be overriden in page SEO settings.</em></li><li>Page/folder listing pages.</li><li>Carousel and list mega menu.</li></ul><h4>HTML Tags</h4><p><em>Some</em> html tags are allowed in the page title:<br><span class=code-inline-block><code>&lt;a&gt;</code><code>&lt;span&gt;</code><code>&lt;em&gt;</code><code>&lt;i&gt;</code><code>&lt;b&gt;</code><code>&lt;strong&gt;</code><code>&lt;small&gt;</code><code>&lt;s&gt;</code></span></p><p><em>*Html tags are stripped from menu items.</em></p>",

	"menu_label": "<h2>Menu Label</h2><p>Use the menu label to set a short title for the main menu. If you don't set a menu label, label will be inherited from <em>folder name</em>. Unlike titles, menu labels should be as short as possible, so they fit nicely into the menu.</p><h4>HTML Tags</h4><p><em>Some</em> html tags are allowed in the menu label:<br><span class=code-inline-block><code>&lt;span&gt;</code><code>&lt;em&gt;</code><code>&lt;i&gt;</code><code>&lt;b&gt;</code><code>&lt;strong&gt;</code><code>&lt;small&gt;</code><code>&lt;img&gt;</code><code>&lt;svg&gt;</code></span></p><p><em>* Mega menu <em>carousel</em> will use titles instead of label.</em><br><em>* label can also be used in folders-listings.</em></p>",

	"page_link": "<h2>Link URL</h2><p>If you want to create the page as alink to another page/website, add the URL for the page you want to link to. You can use <em>root-relative</em> urls to other pages in your X3 website, <em>relative</em> urls to child-pages of the current page, or <em>absolute</em> links to external websites.</p><h3>Examples</h3><p><code>/galleries/food/</code><br>Link to another page in your website with a root-relative url. When you include a slash before the relative url, it will look for the url relative to your website root. <em> * When linking to a page within your X3 website, the page will load with AJAX in the same window.</em></p><p><code>child-folder/</code><br>Link to a child-page of the current page by omitting the opening slash.</p><p><code>https://www.photo.gallery</code><br>Link to an external website by adding absolute url.</p><p><code>file.pdf</code><br>Link to a file located in the page.</p>",

	"page_link_target": "<h2>Link Target</h2><p>Use this setting to decide the target for the link.</p><p><strong>auto</strong><br>Window target will be determined automatically: Relative links will open in same <code>_self</code> window, while absolute links and files will open in a new <code>_blank</code> window.</p><p><strong>_self</strong><br>Link will always open in the same <code>_self</code> browser window.</p><p><strong>_blank</strong><br>Link will always open in a new <code>_blank</code> browser window.</p><p><strong>Popup Window</strong><br>Link will open in a native browser popup window. <em>* Mobile devices will revert to a new tab/window.</em></p><p><strong>X3 Popup</strong><br>Link will open in the native X3 popup, useful and elegant for image and video links.</p><p><strong>X3 Modal</strong><br>Displays the content of this page in an X3 modal popup. <em>* ignores the link</em></p>",

	"page_hidden": "<h2>Hide Page</h2><p>Hidden pages will not display in the menu or page layouts, but are still available by URL.<p>",

	"clean_image_cache": "<h3>Clean Image Cache</h3><p>This task will delete expired image resize cache items in <code>render</code> dir based on the following:</p><ol><li>Cache path does not match any source path (source images are moved or deleted).</li><li>Cache item time is older than source time (source has changed after cache was created).</li><li>Cache item has not been accessed for 90 days or more (cache file is not being used).</li></ol><h4>Automatic cleaning</h4><p>This task will automatically trigger every time you login to the X3 control panel, but maximum once every day. It is safe to run this task, as it will only delete expired or orphan cache items.</p>",

	"delete_image_cache": "<h3>Delete Image Cache</h3><p>This task will delete all image resize cache items in the <code>render</code> directory.</p><div class=\"alert alert-warning\" role=\"alert\"><strong>Caution!</strong><p>This option will delete your entire image resize cache, which may have taken time and lots of server resources to build. Use the \"simulate\" option first!</p></div><h4>Path match <small style=\"color:#999\">* optional</small></h4><p>Use this field to delete only cache items that match a specific request path. <strong>Examples:</strong></p><p><code>filename.jpg</code><br>Deletes all cache items that match a filename (could be several files in different directories).</p><p><code>path/filename.jpg</code><br>Deletes all cache items that match the given path.</p><p><code>/path/</code><br>Deletes all cache items for a specific directory path (and sub-directories).</p><p><code>w320-c1.1</code><br>Deletes all cache items that match the resize request (width 320, crop 1:1).</p><p><code>w320-c1.1/path/filename.jpg</code><br>Deletes a single specific cache item.</p><p>You can use <code>*</code> (asterisk) as wildcard in path patterns.</p><h4>Simulate</h4><p>This option will allow you to simulate a delete task without actually deleting any files. Use this option if you want to find out how many files will get deleted before you commit.</p><div class=\"alert alert-warning\" role=\"alert\"><strong>Browser Cache</strong><p>After running the delete task, image resize requests may still be cached in your browser. To make sure your browser is not serving cached content, you can A) Delete your browser cache, or B) Open new \"Private\" browser window.</p></div>",

	"delete_page_cache": "<h3>Delete page cache</h3><p>This task clears the  X3 page cache, so that new pages are created. This task is not necessary, because pages are always refreshed after you make changes from the panel. However, it may be useful if you are making changes by FTP, or simply want to delete all page cache items as part of maintenance.</p>"
};


// x3_panel.iptc.js

// update iptc data values
function update_iptc_data(ob, rows){

	// store new current value in data
	Object.keys(ob).forEach(function(key) {

		// vars
		var row = rows.filter('[data-name="' + key.replace(/"/g, '\\"') + '"]');
		if(row.length){
			var current = ob[key];
			if(current.hasOwnProperty('title')) row.data('title', current.title);
			if(current.hasOwnProperty('description')) row.data('description', current.description);
			if(current.hasOwnProperty('link')) row.data('link', current.link);
			if(current.hasOwnProperty('target')) row.data('link-target', current.target);
			if(current.hasOwnProperty('params')) row.data('params', current.params);
			if(current.hasOwnProperty('index')) row.data('index', current.index);
		}
	});
}

// Collect data into object
function collect_iptc_files(rows){

	// object
	var iptc_ob = {};

	// loop jpg rows
	rows.each(function(index){

		// vars
		var row = $(this),
				name = row.data('name'),
				file_data = row.find('.file-data'),
				title = file_data.children('.file-title').val(),
				description = file_data.children('.file-description').val(),
				link = file_data.children('.file-link').val(),
				target = file_data.find('label.active').data('name'),
				target = target == 'auto' ? '' : target, // auto = empty
				params = file_data.children('.file-params').val(),
				custom_index = row.attr('data-custom');

		// image object
		var img_ob = {};
		if(is_different(title, row.data('title'))) img_ob.title = title;
		if(is_different(description, row.data('description'))) img_ob.description = description;
		if(is_different(link, row.data('link'))) img_ob.link = link;
		if(is_different(target, row.data('link-target'))) img_ob.target = target;
		if(is_different(params, row.data('params'))) img_ob.params = params;
		if(is_different(custom_index, row.data('index'))) img_ob.index = parseInt(custom_index);

		// apply image object to iptc object if any keys are set
		if(Object.keys(img_ob).length) {
			iptc_ob[name] = img_ob;
			iptc_ob[name].path = row.data('path').replace('../../', '../');
			iptc_ob[name].date = row.data('date');
		}
	});

	// return object or false
	return Object.keys(iptc_ob).length ? iptc_ob : false;
 }

 // compare values
function is_different(val1, val2){
	if(!val1 && !val2) return false;
	return val1 != val2;
}
// x3_panel.js


// Global
var mtree_menu_expanded = false;
var mtree_menu_open = [],
		mtree_state_loaded = false;
var files_checked = false;
var page_selected_items = {};
var current_nav;
var current_folder_images = [];
var x3_user_dir = user === 'user' ? core_user_dir : root_dir_name;
var current_dir_path;

function createContextMenu(){

	// Create right-click context element
	x3_body.append('<div id="context-menu" style="" class="dropdown">\
	<ul class="dropdown-menu" role="menu" aria-labelledby="context-menu">\
	<li role="presentation" class="dropdown-header">Content</li>\
	<li role="presentation" class="cm-hide"><a role="menuitem" tabindex="-1"><span class="glyphicon glyphicon-pencil"></span></a></li>\
	<li role="presentation" class=cm-rename><a role="menuitem" tabindex="-1"><span class="glyphicon glyphicon-pencil"></span>'+language["Rename"]+'</a></li>\
	<li role="presentation" class="cm-delete"><a role="menuitem" tabindex="-1"><span class="glyphicon glyphicon-remove"></span>'+language["Delete"]+'</a></li>\
	<li role="presentation" class=cm-move><a role="menuitem" tabindex="-1"><span class="glyphicon glyphicon-move"></span>'+language["Move"]+'</a></li>\
	<li role="presentation" class=cm-copy><a role="menuitem" tabindex="-1"><span class="glyphicon glyphicon-transfer"></span>'+language["Copy"]+'</a></li>\
	<li role="presentation" class=cm-upload><a role="menuitem" tabindex="-1"><span class="glyphicon glyphicon-plus"></span>'+language["Upload"]+'</a></li>\
	<li role="presentation" class=cm-new><a role="menuitem" tabindex="-1"><span class="glyphicon glyphicon-file"></span>'+language["Create_New_Folder"]+'</a></li>\
	</ul>\
	</div>');
	//

	// Create context menu click event
	var contextmenu = x3_body.children('#context-menu');

	// temp "HERE" val for context
	contextmenu.find('li.cm-rename > a, li.cm-move > a, li.cm-copy > a').click(function(e) {
		e.preventDefault();
		var old_here = here;
		here = contextmenu.data('path').replace(/\/$/, '');
		x3_content_show.children('#showConf').on('hidden.bs.modal', function (e) {
			setTimeout(function(){here = old_here;}, 1);
			x3_content_show.children('#showConf').off('hidden.bs.modal');
		});
	});

	// hide
	contextmenu.find('li.cm-hide > a').click(function(e) {
		e.preventDefault();
		var mypath = contextmenu.data('path'),
				hide = !contextmenu.data('hidden'),
				ob = {};
		ob[mypath.split('./content/')[1]] = { hidden: hide };
		set_folders(ob, function(){
			toggle_row(null, hide, mypath);
			toggle_menu_item(contextmenu.data('listitem'), hide, mypath);
			// toggle hide if is current page
			if(mypath === current_dir_path) x3_content_show.children('.x3-manager').toggleClass('is-hidden', hide).find('.btn-hide').toggleClass('active', hide);
			x3Notifier(contextmenu.data('name') + ' ' + (hide ? lang('Hide') : lang('Unhide')), null, null, 'success');
		});
	});

	// Delete
	contextmenu.find('li.cm-delete > a').click(function(e) {
		e.preventDefault();
		remove_dir(contextmenu.data('path'), contextmenu.data('name'), 'first');
		x3_content_show.children('#showConf').modal('show');
	});

	// Rename
	contextmenu.find('li.cm-rename > a').click(function(e) {
		e.preventDefault();
		rename_dir(contextmenu.data('path'), contextmenu.data('name'), 'first');
		x3_content_show.children('#showConf').modal('show');
	});

	// Move
	contextmenu.find('li.cm-move > a').click(function(e) {
		e.preventDefault();
		rename_dir(contextmenu.data('path'), contextmenu.data('name'), 'move');
		x3_content_show.children('#showConf').modal('show');
	});

	// Copy
	contextmenu.find('li.cm-copy > a').click(function(e) {
		e.preventDefault();
		copy_dir(contextmenu.data('path'), contextmenu.data('name'), 'first');
		x3_content_show.children('#showConf').modal('show');
	});

	// Upload
	contextmenu.find('li.cm-upload > a').click(function(e) {
		e.preventDefault();
		showUploader(contextmenu.data('path'));
		var mymodal = x3_content_show.children('.modal#uploader');
		var cur_title = mymodal.find('.modal-title').text();
		mymodal.find('.modal-title').text('Upload to '+contextmenu.data('name'));
		mymodal.find('.modal-footer > button').hide();
		mymodal.find('.modal-footer').append('<button type="button" class="btn btn-default btn-temp" data-dismiss="modal" onclick="show_preloader(); setTimeout(function(){loading_from_file = false; hide_preloader(); have_action = \'yes\'; active_page_tab = \'#gallery\'; showFileManager(\''+contextmenu.data('path')+'\')}, 1000);">Click to see uploaded files.</button>');
		mymodal.on('hidden.bs.modal', function (e) {
			var el = $(this);
			el.find('.modal-title').text(cur_title);
			el.find('.modal-footer > button.btn-temp').remove();
			el.find('.modal-footer > button').show();
			mymodal.off('hidden.bs.modal');
		});
		mymodal.modal('show');
	});

	// New Folder
	contextmenu.find('li.cm-new > a').click(function(e) {
		e.preventDefault();
		/*var new_folder = x3_content_show.children('#newFolder');
		new_folder.data('there', contextmenu.data('path'));
		new_folder.modal('show');*/
		x3_modal_new_folder.data('there', contextmenu.data('path'));
		x3_modal_new_folder.modal('show');
	});

	// Set mypath when using context to create new
	x3_content_show.on('show.bs.modal', '#newFolder', function (e) {
		var el = $(this),
				mypath = (el.data('there') || here) + '//';
		el.find('label > span.path').html(mypath.replace(/\.\.\//g, '').replace(/\.\//g, '').replace('content/', '').replace('///', '').replace('//', ''));
	}).on('hidden.bs.modal', '#newFolder', function (e) {
		$(this).removeData('there');
	});
}

var json_menu;
function createMtree(container){

	// Create Mtree
	var menu = x3_panel_container.find('#left_folder_menu_box > ul');
	menu.mtree({ use_nodes:true, skip_init:false, close_same_level:false });

	// prepare json menu;
	json_menu = [];
	protectPageAfter();

	// Add classes, set ID's and add mtree-tools
	menu.find('a').each(function(index, val) {

		// vars
		var el = $(this),
				parent_li = el.parent('li'),
				name = el.text(),
				href = el.data('href'),
				href_rel = href.split('./content/')[1],
				//menu_id = '_' + href_rel.replace(/\./g,'_').replace(/\//g,'__').replace(/"|'/g, ''),
				lnk = href_rel.split('/'),
				is_name_hidden = name.indexOf('_') === 0,
				is_hidden = is_name_hidden || (folders && folders.hasOwnProperty(href_rel) && folders[href_rel].hasOwnProperty('hidden') && folders[href_rel]['hidden']);

		// add id and tools
		parent_li/*.attr('id', menu_id)*/.append('<span class="mtree-tools">&nbsp;<span class="glyphicon glyphicon-wrench"></span></span>');

		// hidden
		if(is_hidden) parent_li.addClass('is-hidden' + (is_name_hidden ? ' is-name-hidden' : ''));

		// fix link path for json menu
		//var lnk = el.data('href').replace('../../content/','').replace('../content/','').split('/');
		$.each(lnk, function(index, val) {
	  	if(val.indexOf('.') > -1 && $.isNumeric(val.split('.')[0])) lnk[index] = val.split('.')[1];
	  });
	  lnk = lnk.join('/').replace(/\/?$/, '/');//.replace('index/','');
		if(lnk.length > 0 && (lnk.indexOf('custom/') != 0 || (lnk.indexOf('custom/files/') === 0 && lnk !== 'custom/files/')) && lnk.indexOf('services/') != 0) json_menu.push({link: lnk, label: lnk, path: href_rel});
	});

	// Move /custom/ folder to bottom of menu
	var menu_custom = menu.children('#_custom');
	menu_custom.add(menu_custom.find('ul, li')).addClass('no-drag');
	menu_custom.appendTo(menu);
	menu_custom.find('#_custom__files').appendTo(menu_custom.children('ul'));

	// prepend index to top, if unnumbered and not custom-sorted. // nope, not for now, then need to fix from frontend also
	//var menu_index = menu.children('#_index');
	//if(menu_index.length && menu_index.attr('data-custom') === '0') menu_index.prependTo(menu);

	// Init Cloudflare first time, just to make sure menu has loaded
	cf_load();

	// Add expand/collapse
	if(menu.siblings('#menu-expand').length < 1) menu.before('<button id="menu-expand">+ '+language.Menu_Expand+'</button>');

	// Create context menu
	if(x3_body.children('#context-menu').length < 1) createContextMenu();

	// get mtree_state from localstorage, first load only
	if(!mtree_state_loaded) {
		if(supports_local_storage() && localStorage.getItem('mtree_state') !== null) {
			mtree_menu_open = JSON.parse(localStorage.getItem('mtree_state'));
		}
		mtree_state_loaded = true;
	}

	// Update Mtree
	mtreeEvents();
}


function updateMtree(){

	var menu = x3_panel_container.find('#left_folder_menu_box > ul');
	menu.mtree({ use_nodes:false, skip_init:true, close_same_level:false });

	// Update Mtree
	mtreeEvents();
}

// fixed timer
var fixed_timer;
function toggleMenuFixed(){
	var fx = x3_content_show.find('#menu-container');
	if(fx.length){
		clearTimeout(fixed_timer);
		fixed_timer = setTimeout(function(){
			if($.isScrollToFixed(fx) && (fx.height() > (x3_win.height()-50) || x3_win.width() < 992)) {
				fx.trigger('detach.ScrollToFixed');
			} else if(!$.isScrollToFixed(fx) && fx.height() < (x3_win.height()-50) && x3_win.width() >= 992){
				fx.scrollToFixed({zIndex: 2, marginTop: 40});
			}
		}, 300);
	}
}


// toggleMenuFixed on window resize
x3_win.on('resize.menu_scrolltofixed', $.debounce(500, toggleMenuFixed));

function mtreeEvents(){

	var left_folder_menu_box = x3_panel_container.find('#left_folder_menu_box'),
			menu = left_folder_menu_box.children('ul'),
			context_menu = x3_body.children('#context-menu');

	// sortable menu only no-touch or large screen. Sortable blocks scroll on smaller screens.
	if(!('ontouchstart' in window) || x3_win.width() >= 992){

		// sortable menu
		var sortable_nodes = menu.find('ul:not(.no-drag)').add(menu).filter(function(index) {
			return $(this).children().length > 1;
		});
		sortable_nodes.each(function(index, el) {

			var ul = $(el);
			ul.addClass('is-sortable');

			Sortable.create(el, {
				animation: 100,
				ghostClass: "sortable-ghost",
				chosenClass: "sortable-chosen",
				filter: '.no-drag',
				onSort: function(){

					// vars
					var is_same = true,
							//ul = $(el),
							items = ul.children(':not(#_custom)'),
							ob = {};

					// loop items
					items.each(function(index, item) {
						item.setAttribute('data-custom', (index + 1));
						ob[item.getAttribute('data-content-path')] = { index : index + 1};
						if(is_same && index !== parseInt(item.getAttribute('data-sort'))) is_same = false;
					});

					// reset
					if(is_same) {
						items.attr('data-custom', '0');
						Object.keys(ob).forEach(function(key) {
				      ob[key]['index'] = 0;
				    });
					}

					// post
					if(Object.keys(ob).length) set_folders(ob, function(){

						// cross-polinate
						if(rows_folders.length){
							var parent_li = ul.parent('li'),
									parent_dir = parent_li.length ? parent_li.attr('data-dir') : x3_user_dir;
							if(parent_dir === current_dir_path || (!current_dir_path && x3_user_dir === parent_dir)){
						    rows_folders.each(function(index, row) {
									var content_path = get_content_path(row.getAttribute('data-path'));
									if(ob.hasOwnProperty(content_path))row.setAttribute('data-custom', ob[content_path].index);
								});

								// re-sort if custom sort mode
								if(active_gallery_sort === 3) sort_elements(rows_folders, 'custom');
								reset_sort_button.toggleClass('disabled', is_same);
							}
						}

						// success msg
						x3Notifier('Sorted!', null, null, 'success');
						if(is_same) x3Notifier('Sorting reset to alphabetic order', null, null, 'success');
					});
				}
			});
		});
	}

	// Save menu on expand/collapse state, load initially
	menu.on('click', '.mtree-icon', function(){
		mtreeSaveState(menu);
		toggleMenuFixed();
	});
	mtreeLoadState(menu);

	// Show mtree-tools button on hover
	menu.hoverIntent({
    over: function(e){
    	var mt = $(this).siblings('.mtree-tools');
    	mt.addClass('current_intent');
    	menu.find('.current_hover').not('.current_intent').hide().removeClass('current_hover');
    	if(!mt.hasClass('current_hover')) mt.velocity({opacity:1}, {duration: 200,display:'block'}).addClass('current_hover')
    	mt.removeClass('current_intent');
    },
    out: function(){null},
    selector: 'a'
	}).on('mouseover', 'a', function(e) {
		menu.contextmenu('closemenu',e);
		context_menu.off('mouseleave.closemenu');
		menu.find('li.current-li-active').removeClass('current-li-active');
		//menu.find('li.current-context-active').removeClass('current-context-active');
		$(this).parent('li').addClass('current-li-active');
	}).on('mouseleave', function(e) {
		menu.find('.current_hover').hide().removeClass('current_hover');
	});

	// Show mtree-tools
	menu.hoverIntent({
    over: function(e){
    	menu.contextmenu('show',e);
    	context_menu.on('mouseleave.closemenu', function(e) {
    		menu.contextmenu('closemenu', e);//.find('li.current-context-active').removeClass('current-context-active');
    		context_menu.off('mouseleave.closemenu');
    	});
    },
    out: function(){null},
    selector: '.mtree-tools'
	});

	// Mtree CLICK events
	menu.find('a').click(function(event) {
		event.preventDefault();
		var el = $(this);
		menu.find('.menu_active').removeClass('menu_active');
		el.parent('li').addClass('menu_active');
		showFileManager(el.data('href'));
	});

	// Create CONTEXT MENU
	var cm = context_menu;
	menu.contextmenu({
	  target:'#context-menu',
	  before: function(e,context) {
	  	e.preventDefault();
	  	var listitem = menu.find('.current-li-active');
	  	listitem.addClass('current-context-active');
	  	var path = listitem.children('a').data('href');
	  	var arr = path.split('/');
	  	var title = arr[arr.length-1];
	  	var hidden = listitem.hasClass('is-hidden');
	  	var name_hidden = listitem.hasClass('is-name-hidden');
	  	var disable_class = 'hidden';
	  	//var cm = $('#context-menu');
	  	cm.data('path', path);
	  	cm.data('name', title);
	  	cm.data('listitem', listitem);
	  	cm.data('hidden', hidden);
	  	cm.find('.dropdown-header').text(title);
	  	cm.find('.' + disable_class).removeClass(disable_class);

	  	// text for hide button
	  	cm.find('.cm-hide > a').text(hidden ? lang('Unhide') : lang('Hide'));

	  	// custom/files/*
	  	if(path.indexOf('content/custom/files/') > -1){
	  		cm.find('.cm-hide, .cm-move, .cm-copy, .cm-new').addClass(disable_class);
	  	// custom/files
	  	} else if(path.endsWith('content/custom/files')){
	  		cm.find('.cm-hide, .cm-rename, .cm-delete, .cm-move, .cm-copy, .cm-upload').addClass(disable_class);
	  	// custom/*
	  	} else if(path.indexOf('content/custom/') > -1){
	  		cm.find('.cm-hide, .cm-rename, .cm-delete, .cm-move, .cm-copy, .cm-new').addClass(disable_class);
	  	// custom
	  	} else if(path.endsWith('content/custom')){
	  		cm.find('.cm-hide, .cm-rename, .cm-delete, .cm-move, .cm-upload, .cm-new').addClass(disable_class);
	  	// index
	  	} else if(path.endsWith('content/1.index') || path.endsWith('content/index')){
	  		cm.find('.cm-new').addClass(disable_class);
	  	}
	  	// name hidden
	  	if(name_hidden) cm.find('.cm-hide').addClass(disable_class);
	  	return true;
	  }
	});

	// Remove
	cm.on('hide.bs.context',function () {
		menu.find('.current-context-active').removeClass('current-context-active');
	});

	// Set EXPAND/COLLAPSE Click
	left_folder_menu_box.children('#menu-expand').click(function(event) {
		if(mtree_menu_expanded) {
			menu.find('.mtree-open').removeClass('mtree-open mtree-active').addClass('mtree-closed').children('ul').css({'height':'0px','display':'none'});
		} else {
			menu.find('.mtree-closed').removeClass('mtree-closed').addClass('mtree-open').children('ul').css({'height':'auto','display':'block'});
		}
		toggleMenuFixed();
		mtreeSaveState(menu);
	});

	// Set active menu item from 'here' var, should be set
	mtreeActive(menu);

	// Show menu!
	menu.show();
}

function mtreeActive(menu){
	var menu = menu || x3_panel_container.find('#left_folder_menu_box > ul');
	menu.find('.menu_active').removeClass('menu_active');
	menu.find('a[data-href="' + here.replace(/\/+$/,'').replace(/"/g, '\\"') + '"]').parent('li').addClass('menu_active');
}

function mtreeSaveState(menu){
	mtree_menu_open.length = 0;
	menu.find('.mtree-open').has('ul').each(function(index, el) {
		var val = $(this).attr('id');
		if(val.indexOf('/') === -1) mtree_menu_open.push(val);
	});
	if(supports_local_storage()) localStorage.setItem('mtree_state', JSON.stringify(mtree_menu_open));
	set_mtree_expanded(menu);
}

// mtree reload state
function mtreeLoadState(menu){
	menu.find('.mtree-open').removeClass('mtree-open mtree-active').addClass('mtree-closed').children('ul').css({'height':'0px','display':'none'});
	$.each(mtree_menu_open, function(index, val) {
		menu.find('#'+val).has('ul').removeClass('mtree-closed').addClass('mtree-open').children('ul').css({'height':'auto','display':'block'});
	});
	set_mtree_expanded(menu);
}

// set mtree expanded state
function set_mtree_expanded(menu){
	mtree_menu_expanded = mtree_menu_open.length === 0 || menu.children('.mtree-open').has('ul').length === 0 ? false : true;
	x3_content_show.find('#menu-expand').text(mtree_menu_expanded ? '- '+language.Menu_Collapse : '+ '+language.Menu_Expand);
}

// Bind "return" key from input for certain modals that include btn-key
x3_content_show.on('keyup', '.modal input.form-control', function(event){
	if(event.keyCode == 13){
		var modal = $(this).closest('.modal');
		if(modal.find('.btn-key').length) modal.find('.btn-key').click();
	}
});

// Bind return for search
x3_panel_container.find('#searchInput').on('keyup', function(event){
	if(event.keyCode == 13){
		$(this).parent().siblings('.top_search_btn').click();
	}
});

// Click manager rows toggle checkbox
x3_content_show.on('click.tablerow', '.manage-table tr', function(e) {
	var target = e.target.nodeName.toLowerCase();
	if(target == 'td' || target == 'tr') {
		var checkbox = $(this).find('input[type="checkbox"]');
		checkbox.click();//prop('checked', !checkbox.prop('checked'));
	}
});

// Tab manager
var active_page_tab = (supports_local_storage() && localStorage.getItem('active_page_tab') !== null) ? localStorage.getItem('active_page_tab') : '#page';

// x3 before show filemanager
function x3BeforeShowFileManager(){
	var current_height = x3_content_show.height();//$('.x3-manager').height();
  x3_content_show.css('height', current_height);
	if(x3_win.scrollTop() > 300) x3_html.velocity('stop').velocity("scroll", { duration: 600, easing: "easeInOutCubic" });
}

// x3 show filemanager
function x3ShowFileManager(){
	var mypath = (supports_local_storage() && localStorage.getItem('current_page') !== null) ? localStorage.getItem('current_page') : '';
	here = mypath;
	showFileManager(mypath);
}

// Add remember state of closed alerts
if(supports_local_storage()) {
	x3_content_show.on('click', '.col-md-9 > .alert > .close', function(e) {
		e.preventDefault();
		var mypath = $(this).parent().data('path');
		localStorage.setItem('help-' + mypath, 'hide');
	});
}

// replace dynamic path for custom files folders
function replace_dynamic_path(str, name, ext){
	return str.replace('{{dynamic_path}}', 'Files in this folder can be accessed from content and plugins by using dynamic path <strong>{{files}}/' + name + '/</strong>filename.' + ext + '');
};

// filemanager actions from data-action
function item_action(el){
	var row = el.closest('tr'),
			action = el.data('action'),
			time = el.data('time') || 'first';
	if(row.length && row.data('path') && row.data('name')) window[action](row.data('path'), row.data('name'), time, true);
}

// after show filemanager
function x3AfterShowFileManager(dir_path){

	// set filemanager global vars
	x3_show_conf = x3_content_show.children('#showConf');
	x3_conf_button = x3_show_conf.find('#confButton');
	x3_mtree = x3_content_show.find('ul.mtree');
	x3_modal_new_folder = x3_content_show.children('#newFolder');
	x3_modal_new_zip_file = x3_content_show.children('#newzipFile');
	x3_modal_copy_selected = x3_content_show.children('#copySelected');
	x3_modal_move_selected = x3_content_show.children('#moveSelected');
	x3_modal_remove_selected = x3_content_show.children('#removeSelected');
	x3_modal_uploader = x3_content_show.children('#uploader');

	container_id_tree = x3_show_conf.find('#container_id_tree');
	container_id_tree2 = x3_modal_move_selected.find('#container_id_tree2');
	container_id_tree3 = x3_modal_copy_selected.find('#container_id_tree3');

	// vars
	var x3_manager = x3_content_show.children('.x3-manager'),
			manage_box_show = x3_manager.find('.manage_box_show'),
			menu_column = manage_box_show.children('.col-md-3'),
			manage_column = manage_box_show.children('.col-md-9');

	// global
	manage_container = manage_column.find('.manage-container');

	// more vars
	var manage_table = manage_container.children('.table.manage-table'),
			manage_table_tbody = manage_table.children('.popup-parent'),
			gallery_rows = manage_table_tbody.children('tr'),
			current_folder_buttons = manage_column.children('.current-folder-btns'),
			selected_actions = manage_column.find('.selected-actions');

	// set folder level class for x3_manager
	x3_manager.addClass('level-' + (dir_path ? get_content_path(dir_path).split('/').length : 0));

	// set global vars for rows
	rows_folders = gallery_rows.filter('[data-isfile="0"]');
	rows_files = gallery_rows.filter('[data-isfile="1"]');
	table_body = manage_table_tbody;

	// New folder modal input events
	x3_modal_new_folder.find('#new_folder_link').on('keypress keyup focus', function(e) {
		x3_modal_new_folder.find('.new-folder-target-container').toggleClass('hidden', !$(this).val());
	});

	// panorama enabled class for file pano config
	//if(page_settings.plugins.panorama.enabled) table_body.addClass('panorama-enabled');

	// Set collapse status and text for more options in x3_modal_new_folder
	if(supports_local_storage()){
		var new_folder_options_open = localStorage.getItem('new_folder_options_open') != null && localStorage.getItem('new_folder_options_open') ? true : false,
				new_folder_options_toggle_button = x3_modal_new_folder.find('a[data-toggle="collapse"]');

			x3_modal_new_folder.find('.new-folder-options').toggleClass('in', new_folder_options_open);
			new_folder_options_toggle_button.text(new_folder_options_open ? '- Less settings' : '+ More settings');

		new_folder_options_toggle_button.on('click', function(e) {
			new_folder_options_open = !new_folder_options_open;
			localStorage.setItem('new_folder_options_open', (new_folder_options_open ? '1' : ''));
			new_folder_options_toggle_button.text(new_folder_options_open ? '- Less settings' : '+ More settings');
		});
	}

	// X3 various set input focus on modal
	x3_show_conf.add(x3_modal_new_folder).add(x3_modal_new_zip_file).on('shown.bs.modal', function () {
	  $(this).find('input.form-control').first().focus().select();
	});

	// X3 prevent default event for filemanager dropdown
  manage_table.on('click', '.dropdown-menu a', function(e) {
  	e.preventDefault();
  });

  // current folder buttons show modal conf
  current_folder_buttons.children('.btn-group').on('click', 'button', function(e) {
  	var el = $(this),
  			action = el.data('action'),
				time = el.data('time') || 'first';
		x3_show_conf.modal('show');
		window[action](dir_path, dirname, time, true);
  });

  // current folder upload
  current_folder_buttons.children('.btn-uploader').on('click', function(e) {
  	x3_modal_uploader.modal('show');
  });

  // current folder new
  current_folder_buttons.children('.btn-new').on('click', function(e) {
  	x3_modal_new_folder.modal('show');
  });

  // click row button dropdown
  manage_table_tbody.on('click', '.td-button a:not(.set-preview):not(.hide-file)', function(e) {
  	e.preventDefault();
  	item_action($(this));
  	x3_show_conf.modal('show');
  });

  // navigate to folder
  manage_table_tbody.on('click', '.is-folder > .td-name > a', function(e) {
  	e.preventDefault();
  	this_dir_path = $(this).closest('tr').attr('data-path');
		showFileManager(this_dir_path);
  });

	// Add help to some folders
	if(!x3_manager.is('#page_search') && (!supports_local_storage() || (supports_local_storage() && localStorage.getItem('help-' + dir_path) !== 'hide'))) {

		// vars
		var foldername = dir_path.split('/').pop(),
				hr = manage_column.children('hr'),
				myhelp = '';

		// conditions
		if(foldername == '3.examples'){
			myhelp = x3_help["page-examples"];
		} else if(dir_path.endsWith('content/1.index')){
			myhelp = x3_help["page-index"];
		} else if(dir_path.endsWith('content/custom')){
			myhelp = x3_help["page-custom"];
		} else if(dir_path.endsWith('content/custom/logo')){
			myhelp = x3_help["page-logo"];
		} else if(dir_path.endsWith('content/custom/audio')){
			myhelp = x3_help["page-audio"];
		} else if(dir_path.endsWith('content/custom/404')){
			myhelp = x3_help["page-404"];
		} else if(dir_path.endsWith('content/custom/favicon')){
			myhelp = x3_help["page-favicon"];
		} else if(dir_path.endsWith('content/custom/files')){
			myhelp = x3_help["page-files"];
		} else if(dir_path.endsWith('content/custom/files/javascript')){
			myhelp = x3_help["page-javascript"];
		} else if(dir_path.endsWith('content/custom/files/css')){
			myhelp = x3_help["page-css"];
		} else if(dir_path.endsWith('content/custom/files/images')){
			myhelp = x3_help["page-images"];
		} else if(dir_path.indexOf('content/custom/files/') > -1){ // generic custom/files/*
			myhelp = x3_help["page-files-generic"].replace(/{{foldername}}/g, foldername);
		} else if(dir_path.indexOf('examples/assets') > -1){
			myhelp = x3_help["page-assets"];
		} else if(dir_path.length < 1){
			myhelp = x3_help["page-content"];
		}

		// if myhelp
		if(myhelp) hr.after(myhelp);

		// alert
		var my_alert = hr.siblings('.alert');
		my_alert.data('path', dir_path);
		my_alert.one('closed.bs.alert', update_fixed); // updates fixed elements on close
		update_fixed(true); // updates fixed elements
	}

	// New root page button click (uses stuff from context-menu)
	menu_column.find('.new-root-page').click(function(e) {
		var there = user === 'user' ? core_user_dir : root_dir_name;
		x3_modal_new_folder.data('there', there).modal('show');
	});

	// popuplate current_folder_images array
	current_folder_images = [];
	if(gallery_rows.length){
		gallery_rows.each(function(i, el) {
			if(el.getAttribute('data-isimage') == '1') current_folder_images.push(el.getAttribute('data-name'));
		});
	}

	// toggle
	toggleMenuFixed();

	// Set current_page
	current_dir_path = dir_path;
	if(supports_local_storage()) localStorage.setItem('current_page', dir_path);

	// X3 tab manager
  var mytab = manage_column.children('#myTab'),
  		mytabs = mytab.find('a');

  if(mytabs.length > 1) {
  	var active_tab = mytabs.filter('a[href="'+active_page_tab+'"]');
  	if(active_tab.length && active_tab.is(':visible')){
  		active_tab.tab('show');
  	} else {
  		mytabs.filter(':visible').tab('show');
  	}
  } else {
  	mytabs.tab('show');
  }

  // tabs click
  mytab.on('click', 'a', function(e) {
		active_page_tab = $(this).attr('href');
		if(supports_local_storage()) localStorage.setItem('active_page_tab', active_page_tab);
	}).on('shown.bs.tab', 'a', function (e) {
	  update_fixed(true);
	});

  // X3 reset x3_content_show height
  x3_content_show.css('height', '');

  // vars
  var dirpath = dir_path ? dir_path : x3_user_dir,
  		mypath = dirpath.endsWith('./content') ? '' : dirpath.split('./content/')[1],
  		link = mypath.split('/'),
  		dirname = link[link.length - 1],
  		is_custom = link[0] == 'custom',
  		is_hidden = folders && folders.hasOwnProperty(mypath) && folders[mypath].hasOwnProperty('hidden') && folders[mypath]['hidden'],
  		is_name_hidden = false;

  // loop link get url and is_name_hidden
  $.each(link, function(index, val) {
  	if(val.indexOf('_') === 0) {
  		is_hidden = is_name_hidden = true;
  		return false;
  	}
  	if(val.indexOf('.') > -1 && $.isNumeric(val.split('.')[0])) link[index] = val.split('.')[1];
  });

  // create link
  link = link.join('/').replace(/\/?$/, '/').replace('index/','');
  if(link === '/') link = '';

  // Add link button
  if(!is_name_hidden && mypath) manage_column.find('.page-title').prepend('<a href="../' + link.replace(/"/g, '&quot;') + '" target="_blank" class="view-page" title="'+language["View_Page"]+'"><span class="glyphicon glyphicon-new-window"></span></a>');

  // hide button
  if(mypath && !is_custom && !is_name_hidden){
  	current_folder_buttons.children('.btn-group').prepend('<button type="button" class="btn btn-default btn-group-filemanager btn-hide' + (is_hidden ? ' active' : '') + '">' + lang('Hide') + '</button>');
  	var hide_button = current_folder_buttons.find('.btn-hide');
  	hide_button.on('click', function(e) {
  		e.stopImmediatePropagation();
  		var ob = {};
  		ob[mypath] = { hidden: !is_hidden };
  		set_folders(ob, function(){
  			is_hidden = !is_hidden;
  			hide_button.toggleClass('active', is_hidden);
  			x3_manager.toggleClass('is-hidden', is_hidden);
				toggle_menu_item(null, is_hidden, dirpath);
				x3Notifier(dirname + ' ' + (is_hidden ? lang('Hide') : lang('Unhide')), null, null, 'success');
			});
  	});
  }

  // Add classes .is-custom .is-hidden .is-hidden-menu
  if(is_custom) x3_manager.addClass('is-custom');
  if(is_hidden) x3_manager.addClass('is-hidden');
  if(is_name_hidden) x3_manager.addClass('is-name-hidden');

  // add global link in navbar
  x3_navbar_nav.find('#website-link > a').attr('href', '../' + (link.indexOf('custom/') === 0 || is_name_hidden ? '' : link));

  // Add link url below title
  if(!is_name_hidden) manage_column.children('.title-url').attr('href', '../' + link).children('span').first().text(location.hostname + get_x3_path() + '/' + link);

  // checked stuff
  files_checked = false;
  selected_actions.find('button').addClass('disabled');
  // Set Selected
  x3SetSelected();
  // Update row data-filesize
  x3SetByteSize();
  // Set preview-image class for thumbnail
  setPreviewImageActive();

  // Loop rows, add various
  is_custom_sort = false;
  is_custom_sort_folders = false;
  var folders_amount = 0,
  		files_amount = 0;

	gallery_rows.each(function(index, el) {

  	var el = $(this),
  			is_folder = el.attr('data-isfile') == '0', //el.data('isfile') == '0',
  			name = el.attr('data-name'), //String(el.data('name')),
  			mypath = el.attr('data-path').split('./content/')[1], //el.data('path').split('./content/')[1],
  			is_hidden = el.data('hidden') != undefined;
  			//is_hidden = el.hasClass('is-hidden');

  	// Add file/folder classes
  	el.addClass(is_folder ? 'is-folder' : 'is-file');

  	// Add count
  	if(is_folder){
  		folders_amount ++;
  	} else {
  		files_amount ++;
  	}

  	// apply folder settings from folders.json
  	if(is_folder && folders && folders.hasOwnProperty(mypath)){

  		// set hidden
  		if(folders[mypath].hasOwnProperty('hidden') && folders[mypath]['hidden']) is_hidden = true;

  		// set custom index
  		if(folders[mypath].hasOwnProperty('index')) el.attr('data-custom', folders[mypath]['index']);
  	}

  	// get data from page.json
  	if(page_settings != undefined && !is_folder && page_settings.hasOwnProperty(name)) {

  		// item object
  		var item_object = page_settings[name];

  		// get sort index
	  	if(item_object.hasOwnProperty('index')) el.attr('data-custom', item_object.index);

	  	// get hidden from page.json
	  	if(item_object.hasOwnProperty('hidden')) is_hidden = item_object.hidden;
  	}

		// check hidden by NAME (if not already hidden by IPTC or page.json)
		var is_name_hidden = name.indexOf('_' + (is_folder ? '' : '_')) === 0;
		if(is_name_hidden) is_hidden = true;

		// add is-hidden class
  	if(is_hidden) el.addClass('is-hidden' + (is_name_hidden ? ' is-name-hidden' : ''));

  	// Add buttons for set preview image
  	if(el.is('[data-isimage="1"]')) {
  		var list = el.find('ul.dropdown-menu');
  		list.children('[role="presentation"]').after('<li><a href=# class="set-preview">Set as preview image</a></li>');
  		el.children('.td-name').prepend('<span class="fa fa-flag set-preview" title="Set as folder preview image"></span>');
  	}

  	// Add buttons for HIDE
  	if(!is_name_hidden) {
  		var hide_text = is_hidden ? lang('Unhide') : lang('Hide');
  		el.children('.td-name').prepend('<span class="fa fa-eye' + (is_hidden ? '-slash' : '') + ' hide-file" title="' + hide_text + '"></span>');
  		el.find('ul.dropdown-menu').children('[role="presentation"]').after('<li><a href=# class="hide-file">' + hide_text + '</a></li>');
  	}
  });

  // Add amount classes to container
  manage_container.addClass(folders_amount > 0 ? 'has-folders' : 'no-folders')
  	.addClass(files_amount > 0 ? 'has-files' : 'no-files')
  	.toggleClass('is-empty', (folders_amount === 0 && files_amount === 0));

  // Set Sort
  x3SetSort(active_gallery_sort, (active_gallery_sort == 0 ? true : false));
  // Add thumbnails
  x3FileManagerThumbs();
  // Gallery view manager
  x3FileManagerView(active_gallery_view);
  // bugfix col-md-7 empty min-height
  var manage_list_buttons = manage_column.find('.manage-list-buttons');
  manage_list_buttons.children('.selected-actions').css('min-height', manage_list_buttons.children('.list-actions').outerHeight(true));
  // scrolltofixed for gallery toolbar
  manage_list_buttons.scrollToFixed({zIndex: 5});
}

// update preview image
function updatePreviewImage(image){
	var name = image ? image.data('name') : null;
	setTimeout(function(){
		save_inject({"image": name}, function(success){
			if(success && image) {
				// Update page settings image
				var selectize = x3_content_show.find('input.form-control.selectized[name="image"]');
				if(selectize.length) selectize[0].selectize.addItem(name, true);
				image.addClass('preview-image');
			}
		}, 'Updated preview image: ' + name, false);
	}, 500);
}

// Update selected preview image
function setPreviewImageActive(){
	var x3_manager = x3_content_show.children('.x3-manager').not('#page_search');

	if(x3_manager.length){
		var table = x3_manager.find('.manage-table'),
				images = table.find('tr[data-isimage="1"]');

		// remove current class
		table.find('tr.preview-image').removeClass('preview-image');

		// update if images.length
		if(images.length) {

			// image is populated and relative to folder
			if(page_settings.image && page_settings.image.indexOf('/') === -1) {

				var image = images.filter('[data-name="' + page_settings.image.replace(/"/g, '\\"') + '"]');

				// image exists
				if(image.length) {
					image.addClass('preview-image');

				// update if images and not using assets
				} else if(!page_settings.gallery.assets){

					// image is obviously wrong
					var preview = images.filter('[data-name="preview.jpg"]');
					image = preview.length ? preview : images.first();
					updatePreviewImage(image);
				}

			// Set automatically if empty and images exist
			} else if(!page_settings.image && images.length){
				var preview = images.filter('[data-name="preview.jpg"]');
				image = preview.length ? preview : images.first();
				updatePreviewImage(image);
			}
		}
	}
}

// Create the thumbnail in list
function x3FileManagerThumbs(){
	var arr = [],
			w = window.devicePixelRatio > 1 ? '200' : '100',
			manage_table = x3_content_show.find('.manage-table');

	manage_table.find('tr').each(function(index, el) {

		// vars
		var el = $(this);
		arr[index] = {
			name: el.attr('data-name').replace(/"/g, '&quot;'),
			path: el.attr('data-path').replace('../content/../content/','../content/').replace('../../','../'),
			ext: el.data('ext'),
			isfile: el.data('isfile'),
			isimage: el.data('isimage')
		};

		// more vars
		var td,
				extension = arr[index].ext.toLowerCase();

		// conditions
		if($.inArray(extension, ['jpg','jpeg','png','gif','webp']) !== -1){
			var popup_link = el.find('.td-name .popup'),
					escaped_path = arr[index].path.replace(/"/g, '&quot;'),
					resize_path = escaped_path.replace('content','render/w' + w + '-c1.1'),
					td = '<td class="td-thumb td-jpg"><span class="glyphicon glyphicon-picture"></span><a href="' + escaped_path + '" class="popup" data-width="' + popup_link.data('width') + '" data-height="' + popup_link.data('height') + '" data-name="' + arr[index].name + '" data-filesize="' + popup_link.data('filesize') + '" rel="group2"><img data-src="' + resize_path + '" class="lazy" /></a></td>';
			if(popup_link.attr('href') !== arr[index].path) popup_link.attr('href', arr[index].path);
		} else if(extension === 'zip'){
			td = '<td class="td-thumb td-file"><span class="fa fa-file-zip-o"></span></td>';
		} else if(extension === 'js' || extension === 'css'){
			td = '<td class="td-thumb td-file"><span class="fa fa-code"></span></td>';
		} else if(extension === 'mp3'){
			td = '<td class="td-thumb td-file"><span class="glyphicon glyphicon-volume-up"></span></td>';
		} else if(extension == 'mp4'){
			td = '<td class="td-thumb td-file"><span class="fa fa-film"></span></td>';
		} else if(arr[index].isimage == '1'){
			td = '<td class="td-thumb td-picture"><span class="glyphicon glyphicon-picture"></span></td>';
		} else if(arr[index].isfile == '1'){
			td = '<td class="td-thumb td-file"><span class="glyphicon glyphicon-file"></span></td>';
		} else {
			td = '<td class="td-thumb td-folder"><span class="glyphicon glyphicon-folder-close"></span></td>';
		}
		el.find('.td-checkbox').after(td);

		// Add description fields for files
		if(arr[index].isfile =='1') {

			// defaults from IPTC data-[name]
			var title = el.data('title'),
					description = el.data('description') || '',
					link = el.data('link'),
					link_target = el.data('link-target'),
					params = el.data('params') || '';

			// values from page.json
			if(page_settings != undefined) {
				if(arr[index].name in page_settings){
					var file = page_settings[arr[index].name];
					if(file.title) title = file.title;
					if(file.description) description = file.description;
					if(file.link) link = file.link;
					if(file.target) link_target = file.target;
					if(file.params) params = file.params;
				}
			}

			// unset link target if is auto
			link_target = link_target == 'auto' ? false : link_target;

			// write file-data element
			var td = el.children('.td-name');
			td.append('<div class="file-data' + (link ? ' has-link' : '') + '"><i class="fa fa-question panel-help" data-help="image_title"></i><input type="text" class="form-control file-title" placeholder="Title"><i class="fa fa-question panel-help" data-help="image_description"></i><textarea class="form-control file-description" rows="3" placeholder="Description">' + description + '</textarea><a href="#" class="fa fa-link" target="_blank"></a><i class="fa fa-question panel-help" data-help="image_link"></i><input type="text" class="form-control file-link" placeholder="Link"><div class="btn-group btn-group-sm" data-toggle="buttons"><label class="btn btn-default' + (!link_target ? ' active' : '') + '" data-name="auto"><input type="radio"' + (!link_target ? ' checked' : '') + '>auto</label><label class="btn btn-default" data-name="_self"><input type="radio">_self</label><label class="btn btn-default" data-name="_blank"><input type="radio">_blank</label><label class="btn btn-default" data-name="popup"><input type="radio">popup window</label><label class="btn btn-default" data-name="x3_popup"><input type="radio">X3 popup</label></div><i class="fa fa-question panel-help" data-help="params"></i><textarea class="form-control file-params" rows="1" placeholder="Parameters">' + params + '</textarea></div>');

			// for correct implmenetation of htmlspecialchars fields
			if(title) td.find('.file-title').val(title);
			if(link) td.find('.file-link').val(link);

			// set correct link target active/checked
			if(link_target) td.find('[data-name="' + link_target + '"]').addClass('active').children('input').prop('checked', true);

		// is folder
		} else {
			el.children('.td-name').append('<div class="folder-data"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span></div>');
		}
	});
	setTimeout(function(){
		autosize(manage_table.find('textarea'))}
	, 1);
	yall();
}

// Views Manager
var gallery_views;
var active_gallery_view = (supports_local_storage() && localStorage.getItem('active_gallery_view') !== null) ? Math.min(4, Number(localStorage.getItem('active_gallery_view'))) : 1;
$(document).ready(function() {
	gallery_views = [['list','align-justify','btn-xs',language['List']],['small','list','btn-sm',language['Small_Thumbs']],['big','th-list','btn-sm', language['Large_Thumbs']],['edit','pencil','btn-sm',language['Edit_Mode']],['grid','th','btn-sm','grid']];
});
function x3FileManagerView(v){
	var container = x3_content_show.find('.manage-container');
	container.removeClass('view-list view-small view-big view-edit view-grid').addClass('view-'+gallery_views[v][0]);
	container.siblings('.manage-list-buttons').find('.btn-view > span').removeClass().addClass('glyphicon glyphicon-'+gallery_views[v][1]);
	container.find('.td-button button').removeClass('btn-xs btn-sm').addClass(gallery_views[v][2]);

	// set Tabindexing for edit view mode
	x3ToggleEditview(v == 3);
}

// Descriptions view mode
function x3ToggleEditview(yes){
	x3_content_show.find('.manage-table').find('a, button, input[type="checkbox"]').prop('tabIndex', (yes ? -1 : true));
}

// Views click
x3_content_show.on('click.view', '.btn-view', function(e) {
	active_gallery_view = (active_gallery_view >= gallery_views.length-1) ? 0 : active_gallery_view+1;
	if(supports_local_storage()) localStorage.setItem('active_gallery_view', active_gallery_view);
	x3FileManagerView(active_gallery_view);
	x3_content_show.find('.list-actions > .button-helper').text(gallery_views[active_gallery_view][3]);
});

// File manager buttons hover helper
x3_content_show.hoverIntent({
  over: function(e){
  	var el = $(this),
  			helper = el.siblings('.button-helper');
  	helper.text(el.data('title')).velocity({opacity:1}, {duration: 200});
  },
  out: function(e){
  	var el = $(this),
  			helper = el.siblings('.button-helper');
  	helper.text('').velocity('stop').css('opacity', 0);
  },
  selector: '.list-actions > *'
});

// Selected actions hover
/*x3_content_show.on('mouseover', '.selected-actions button', function(e) {
	var el = $(this),
			s = el.closest('.selected-actions').children('.selected-text'),
			d = el.hasClass('disabled'),
			t = selected.length + ' ' + s.data('lang');

	t = d ? t : el.text()+' '+t;
	s.text(t).addClass(d ? 'nonselected' : 'ishover');
}).on('mouseout', '.selected-actions', function(e) {
	var s = $(this).closest('.selected-actions').children('.selected-text')
	s.text(selected.length+' '+s.data('lang')).removeClass('ishover nonselected');
});*/

// tooltip selected actions
x3_content_show.tooltip({
	container: 'body',
	delay: {
		show: 200,
		hide: 0
	},
	selector: '.selected-actions .btn-primary',
	trigger: 'hover',
	title: function(){
		return this.innerHTML + ' ' + selected.length + ' ' + language['selected_Folders_Files'];
	}
});






// Manager file actions button hover ROW
x3_content_show.hoverIntent({
  over: function(e){
  	var el = $(this);
  	if(!el.data('hover-items')) el.data('hover-items', el.find('.td-button .btn-group, span.set-preview, span.hide-file'));
  	el.data('hover-items').velocity({opacity:1}, {duration: 200});
  },
  out: function(){
  	$(this).data('hover-items').velocity('stop').css('opacity', 0);
  },
  timeout: 200,
  selector: '.manage-table tr'
});

// row button
x3_content_show.hoverIntent({
	over: function(e){
		$(this).find('.dropdown-menu').velocity({opacity:1}, {duration: 200,display:'block'});
	},
	out: function(){
		$(this).find('.dropdown-menu').velocity('stop').hide();
	},
	timeout: 200,
	selector: '.td-button .btn-group'
});

// Select All
function select_all(){
	var rows = x3_content_show.find('.manage-table tr');
	files_checked = !files_checked;
	rows.find('.td-checkbox > input').prop('checked', files_checked);
	selected.length = 0;
	if(files_checked){
		rows.each(function(index, el) {
			selected.push($(this).data('name'));
		});
	}
	rows.toggleClass('is-checked', files_checked);
	updateSelectAll();
	selectUpdate();
	x3SaveSelected();
}

function updateSelectAll(){
	var select_all = x3_content_show.find('#select_all');
	var title = files_checked ? select_all.data('unselect') : select_all.data('select');
	select_all.toggleClass('active', files_checked).data('title', title);
	select_all.siblings('.button-helper').text(title);
}

// Update on checkbox select
function selectUpdate(){
	var manage_table = x3_content_show.find('.manage-table'),
			manage_list_buttons = x3_content_show.find('.manage-list-buttons'),
			checkbox_all = manage_table.find('input:checkbox'),
			total = checkbox_all.length,
			amount = checkbox_all.filter(':checked').length,
			s = manage_list_buttons.find('.selected-text'),
			has_amount = amount > 0 ? true : false;

	s.text(amount+' '+s.data('lang')).toggleClass('has-selection', (amount > 0));
	manage_list_buttons.find('.selected-actions button').toggleClass('disabled', !has_amount).toggleClass('btn-primary', has_amount);

	if(files_checked && amount < total) {
		files_checked = false;
		updateSelectAll();
	} else if(!files_checked && total == amount){
		files_checked = true;
		updateSelectAll();
	}
}

// Save selected items
function x3SaveSelected(){
	page_selected_items[here] = [];
	x3_content_show.find('.manage-table tr').each(function(index, el) {
		var el = $(this);
		if(el.hasClass('is-checked')) page_selected_items[here].push(el.data('name'));
	});
	if(supports_local_storage()) localStorage.setItem('selected_'+here, JSON.stringify(page_selected_items[here]));
}

// Set selected on load
function x3SetSelected(){
	var arr = [];
	if(page_selected_items[here] != undefined && page_selected_items[here].length > 0) {
		arr = page_selected_items[here];
	} else if(supports_local_storage() && localStorage.getItem('selected_'+here) !== null){
		arr = JSON.parse(localStorage.getItem('selected_'+here));
	}
	if(arr.length > 0) {
		selected.length = 0;
		var rows = x3_content_show.find('.manage-table tr');
		$.each(arr, function(index, val) {
			var el = rows.filter('[data-name="' + val.replace(/"/g, '\\"') + '"]');
			if(el.length) {
				el.addClass('is-checked').find('.td-checkbox > input').prop('checked', true);
				selected.push(el.data('name'));
			}
		});
		x3SaveSelected();
		selectUpdate();
	}
}

// filemanager checkbox click
x3_content_show.on('click.checkbox', '.td-checkbox > input', function(e) {
	var el = $(this);
	el.closest('tr').toggleClass('is-checked', el.is(':checked'));
	x3SaveSelected();
	selectUpdate();
});

// Caluclate real bytesize
function x3SetByteSize(){
	x3_content_show.find('.manage-table tr').each(function(index, el) {
		var el = $(this),
				val = el.data('filesize') || '';

		if(val.indexOf('GB') > -1){
			val = parseInt(val) * 1000000000;
		} else if(val.indexOf('MB') > -1){
			val = parseInt(val) * 1000000;
		} else if(val.indexOf('KB') > -1){
			val = parseInt(val) * 1000;
		}
		el.attr('data-filesize', parseInt(val));
		el.data('filesize', parseInt(val));
	});
}

// X3 Sort manager
var gallery_sort = [['sort','-by-alphabet'],['filesize','-by-attributes-alt'],['date','-by-order'],['custom','']],
		active_gallery_sort = (supports_local_storage() && localStorage.getItem('active_gallery_sort') !== null) ? Math.min(3, Number(localStorage.getItem('active_gallery_sort'))) : 0,
		sortable_files,
		sortable_folders,
		is_custom_sort = false,
		is_custom_sort_folders = false;

// sort elements
function sort_elements(elements, sortby, parent){

	// sort elements array
	elements.sort(function(a,b){

		// sort by type
		var response = a.getAttribute('data-' + sortby) - b.getAttribute('data-' + sortby);

		// if values are same or incomparable, sort by name
		if(!response) {
			response = a.getAttribute('data-sort') - b.getAttribute('data-sort');

		// if sortby filesize or date, reverse sort
		} else if(sortby == 'filesize' || sortby == 'date'){
			response *= -1;
		}

		// return
		return response;
	});

	// detach and append to table body
	elements.detach().prependTo(parent || table_body);
};

// reset sort
function reset_sort(){
	var ob = {};
	function complete(soft){
		x3Notifier('Folder sorting reset to alphabetic order', null, null, 'success');
		sort_elements(rows_folders, 'sort');
		rows_folders.removeAttr('data-custom');

		// reset menu segment, only if set_folders save
		if(!soft){
			var menu_box = x3_panel_container.find('#left_folder_menu_box'),
					parent_ul = current_dir_path ? menu_box.find('li[data-dir="' + current_dir_path + '"]').children('ul') : menu_box.children('ul'),
					list_items = parent_ul.children(':not(#_custom)');
			if(list_items.length) {
				list_items.attr('data-custom', '0');
				sort_elements(list_items, 'sort', parent_ul);
			}
		}
	}
	rows_folders.each(function() {
		var content_path = get_content_path(this.getAttribute('data-path')),
				index = this.getAttribute('data-custom');
		//if(content_path && index) ob[content_path] = { index: 0 };
		if(content_path && index && folders.hasOwnProperty(content_path) && folders[content_path].hasOwnProperty('index') && folders[content_path]['index'] !== 0) ob[content_path] = { index: 0 };
	});
	if(Object.keys(ob).length) {
		set_folders(ob, complete);
	} else {
		complete(true);
	}
	reset_sort_button.addClass('disabled');
}

// global jquery collections for x3setsort
var rows_folders, rows_files, table_body, manage_container, reset_sort_button;

// set sort
function x3SetSort(i, folders_only){

	//var startTimerX = new Date();

	// vars
	var sortby = gallery_sort[i][0];

	// sort folders and files
	if(!folders_only) sort_elements(rows_files, sortby);
	sort_elements(rows_folders, sortby);

	// Toggle button html
	toggleSortButton(i);

	// Toggle sortable
	if(sortby === 'custom' && (rows_files.length || rows_folders.length)){
		if(!manage_container.hasClass('custom-sort')){
			manage_container.prepend('<div class=custom-sort-help><a href=# class="text-help" data-help="custom_sort">Custom Sort</a><span class="can-sort"> - Drag items into order, and click <em>save</em>.</span></div>');
			manage_container.addClass('custom-sort');
			sortable_files = rows_files.length > 1 ? add_custom_sort(true) : false;
			sortable_folders = rows_folders.length > 1 ? add_custom_sort() : false;
		}
	} else if(manage_container.hasClass('custom-sort')){
		manage_container.children('.custom-sort-help').remove();
		manage_container.removeClass('custom-sort');
		if(sortable_files) sortable_files.destroy();
		if(sortable_folders) sortable_folders.destroy();
	}

	// reset sort button
	var show_reset_sort = sortby === 'custom' && rows_folders.length > 1,
			list_buttons = manage_container.parent().children('.manage-list-buttons'),
			rows_folders_last = rows_folders.last(),
			reset_button_enabled = show_reset_sort && rows_folders_last.attr('data-custom') && rows_folders_last.attr('data-custom') !== '0';
	reset_sort_button = list_buttons.find('.reset-sort');
	reset_sort_button.toggleClass('hidden', !show_reset_sort).toggleClass('disabled', !reset_button_enabled);
	list_buttons.find('.button-helper').toggleClass('hidden', show_reset_sort);
}

function add_custom_sort(files){
	return Sortable.create(table_body[0], {
		//delay: 50,
		filter: files ? '.is-folder' : '.is-file',
		draggable: files ? '.is-file' : '.is-folder',
		animation: 100,
		ghostClass: "sortable-ghost",
		chosenClass: "sortable-chosen",
		onStart: function (e) {
			manage_container.addClass('is-sorting');
    },
    onEnd: function (e) {
    	if(files) is_custom_sort = true;
    	if(!files) is_custom_sort_folders = true;
    	manage_container.removeClass('is-sorting');
    	setTimeout(function(){
    	}, 100);

    	// update data-custom
    	var filter = files ? '[data-isfile="1"]' : '[data-isfile="0"]';
    	var rows = table_body.children('tr').filter(filter);
    	var is_same = true;
    	var offset = files ? rows_folders.length : 0;
			for(var i = 0; i < rows.length; i++){
				rows[i].setAttribute('data-custom', (i + 1));
				if(is_same && (i + offset) !== parseInt(rows[i].getAttribute('data-sort'))) is_same = false;
			}
			if(is_same) rows.attr('data-custom', '0');
			if(!is_same && !files) reset_sort_button.removeClass('disabled');
    }
	});
}

function toggleSortButton(i){
	var button = x3_content_show.find('.btn-sort');
	button.html('<span class="glyphicon glyphicon-sort'+gallery_sort[i][1]+'"></span> '+button.data(gallery_sort[i][0])).data('title', button.data('sortby')+' '+button.data(gallery_sort[active_gallery_sort][0]));
}

// Sort button click
x3_content_show.on('click.sort', '.btn-sort', function(e) {
	active_gallery_sort = (active_gallery_sort >= gallery_sort.length-1) ? 0 : active_gallery_sort+1;
	if(supports_local_storage()) localStorage.setItem('active_gallery_sort', active_gallery_sort);
	x3SetSort(active_gallery_sort);
	x3_content_show.find('.list-actions > .button-helper').text($(this).data('title'));
});

// Reset sort button click
x3_content_show.on('click.sort', '.reset-sort:not(.disabled)', reset_sort);

// navbar click add body page class
x3_navbar_nav.on('click.pageclass', 'li:not(.dropdown)', function(e) {
	var page = $(this).attr('id');
	x3_panel_container.toggleClass('fileManager', (page == 'fileManager'));
	current_nav = page;
	if(supports_local_storage() && page !== undefined) localStorage.setItem('current_nav', page);
});

// on page load (from php)
function x3NavPage(){
	current_nav = 'fileManager';
	if(supports_local_storage()) {
		var ls = localStorage.getItem('current_nav');
		if(ls !== null){
			if(ls == 'setting'){
        showSetting();
        current_nav = 'setting';
			} else if(ls == 'users'){
        showUsers();
        current_nav = 'users';
			} else if(ls == 'editProfile'){
		   	showEditProfile();
		   	current_nav = 'editProfile';
		  } else if(ls == 'protect'){
		   	protectPage();
		   	current_nav = 'protect';
		  } else if(ls == 'tools'){
		   	showTools();
		   	current_nav = 'tools';
		  } else if(ls == 'auth'){
		   	authPage();
		   	current_nav = 'auth';
			} else {
				x3ShowFileManager();
			}
		} else {
			x3ShowFileManager();
		}
	} else {
		x3ShowFileManager();
	}

	// add default
	if(current_nav === 'fileManager') x3_panel_container.addClass('fileManager');
}

// Growl-type notifier wrapper
function x3Notifier(str, delay, w, type){
	var icon = (type == 'danger') ? 'ban' : ((type == 'warning') ? 'warning' : 'check');
	$.bootstrapGrowl('<i class="fa fa-' + icon + '"></i>&nbsp;&nbsp;' + str||'nothing.',{
	  type: type||'info x3-note',
	  offset: {from: 'bottom', amount: 20},
	  align: 'right',
	  width: w||'auto',
	  delay: delay||1000,
	  allow_dismiss: false
	});
}

// x3 Panel Settings + LOCALSTORAGE
var x3_settings = (supports_local_storage() && localStorage.getItem('x3_settings') !== null) ? JSON.parse(localStorage.getItem('x3_settings')) : {};

function x3UpdateSettings(ob){
	$.extend(x3_settings, ob);
	if(supports_local_storage()) localStorage.setItem('x3_settings', JSON.stringify(x3_settings));
}

// Photoswipe
x3_content_show.on('click', 'a.popup', function(event) {
	event.preventDefault();

	var el = $(this),
			parent = el.closest('.popup-parent'),
			index = el.closest('tr').index('tr[data-isimage="1"]'),
			rel = el.attr('rel'),
			elements = (rel === undefined) ? el : parent.find('a.popup[rel="'+rel+'"]'),
			items = [];

	// Set items
	elements.each(function(index, el) {

		var el = $(this),
				caption = '<span>' + el.data('name') + '</span><span>' + el.data('width') + ' x ' + el.data('height') + '</span><span>' + el.data('filesize') + '</span>',
				row = el.closest('tr'),
				file_data = row.find('.file-data'),
				title = file_data.children('.file-title').val(),
				description = file_data.children('.file-description').val();

		if(title || description) {
			caption += '<div>';
			if(title) caption += '<span class="caption-title">' + title + '</span>';
			if(description) caption += description;
			caption += '</div>';
		}
		items.push({
			src: el.attr('href'),
			w: el.data('width'),
			h: el.data('height'),
			title: caption
		});
	});

	// Set options
	var options = {
		index: index,
		showHideOpacity: true,
		bgOpacity: .95,
		history: false,
		barsSize: {top:0, bottom:0},
		captionEl: true,
		shareEl: false
	}

	// Initializes and opens PhotoSwipe
	var gallery = new PhotoSwipe(pswp[0], PhotoSwipeUI_Default, items, options);
	gallery.init();
});

// Init localstorage
//flush current_nav current_page
if(supports_local_storage()) {
	if(localStorage.getItem('last_user') !== null && localStorage.getItem('last_user') !== user){
		localStorage.removeItem('current_nav');
		localStorage.removeItem('current_page');
	}
	localStorage.setItem('last_user', user);
}





// x3_panel.language.js

function lang(str){
	if(str){
		var _str = str.replace(/\s+/g, '_');
		return language[_str] ? language[_str] : str;
	}
	return;
}


// language.Menu_Expand

// x3_panel.lift-junk.js

var ajax_load_path = user === 'user' ? 'filemanager_user/' : '';


// SHARED

// navigate to path
function navigate_to_path(navigate_to) {
	if (navigate_to == "") {
		alert(lang('Select_nav_error'));
		return false;
	}
	if (navigate_to == "../") navigate_to = '';
	show_preloader();
	setTimeout(function() {
		hide_preloader();
		showFileManager(navigate_to);
	}, 1000);
}

// copy selected
function copy_selected() {
	//document.getElementById('selected_copy').value = "";
	x3_log('new_name1: ' + new_name);
	x3_log('COPY > From: ' + here + ' > TO: ' + new_name);
	if(!new_name) {
		alert('Please input path!');
		return;
	}

	x3_modal_copy_selected.find('#selected_copy').val('');
	x3_modal_copy_selected.modal("hide");
	if(deny_guest()) return;
	show_preloader();
	setTimeout(function() {
		$.post(ajax_load_path + "ajax_manage_dir.php", {
				copy_selected: selected,
				this_path: here,
				copy_path: new_name
			},
			function(data, status) {
				if (status == "success") {
					have_action = "yes";
					if (data == "true") {
						loading_from_file = lang('Files and folders has been copied.');
						loading_from_file_status = "green";
						reload_sidebar = true;
						update_folders_key_array(selected, here, new_name, true);
					} else {
						loading_from_file = '<div class="alert alert-error"><center>' + lang('Error! Can not copy') + ' ' + data + '.</center></div>';
						loading_from_file_status = "red";
					}
					if (is_root == 'true')
						showFileManager('');
					else
						showFileManager(here);
				} else {
					alert("Error: " + status);
					hide_preloader();
				}
			});
	}, 1000);
}

// move selected
function move_selected() {
	x3_log('MOVE_SELECTED > From: ' + here + ' > TO: ' + new_name);
	if(!new_name) {
		alert('Please input path!');
		return;
	}
	x3_modal_move_selected.modal("hide");
	if(deny_guest()) return;
	show_preloader();
	setTimeout(function() {
		$.post(ajax_load_path + "ajax_manage_dir.php", {
				move_selected: selected,
				this_path: here,
				move_path: new_name
			},
			function(data, status) {
				have_action = "yes";
				if (status == "success") {
					if (data == "true") {
						loading_from_file = lang('Files and folders has been moved.');
						loading_from_file_status = "green";
						reload_sidebar = true;
						update_folders_key_array(selected, here, new_name, false);
					} else {
						loading_from_file = lang('Error! Can not move') + ' ' + data + '.';
						loading_from_file_status = "red";
					}
					if (is_root == 'true')
						showFileManager('');
					else
						showFileManager(here);
				} else {
					alert("Error: " + status);
					hide_preloader();
				}
			});
	}, 1000);
}

// remove selected
function remove_selected() {
	x3_modal_remove_selected.modal("hide");
	if(deny_guest()) return;
	show_preloader();
	x3_log('remove_selected: '+selected);
	setTimeout(function() {
		$.post(ajax_load_path + "ajax_manage_dir.php", {
				remove_selected: selected,
				this_path: here
			},
			function(data, status) {
				if (status == "success") {
					have_action = "yes";
					if (data == "true") {
						loading_from_file = lang('Files and folders has been removed.');
						loading_from_file_status = "green";
						reload_sidebar = true;
						
						remove_folders_key(selected, here);

					} else {
						loading_from_file = lang('Error! Can not remove') + ' ' + data + '. ' + lang('Please Wait...');
						loading_from_file_status = "red";
					}
					if(is_root == 'true'){
						showFileManager('');
					} else {
						showFileManager(here);
					}
				} else {
					alert("Error: " + status);
					hide_preloader();
				}
			});
	}, 1000);
}

// show uploader
function showUploader(uploadDir) {
	var dir = uploadDir || current_dir_path;
	x3_log('showUploader(' + dir + ')');
	$.post(ajax_load_path + "filemanager_uploader.php", {
			upload_dir: dir
		},
		function(data, status) {
			if (status == "success") {
				x3_modal_uploader.find('#show_uploader').html(data);
			} else {
				alert("Error: " + status);
			}
		}
	);
}

// set new zip file
function set_new_zipFile_name(value) {
	var check = value.indexOf('.zip');
	if(check != -1) {
		alert(lang('Please write zip file name without extension.'));
		return false;
	}
	zip_file_name = value;
}

// set selected
function set_selected(value, id, checker) {
	var in_array_index = $.inArray(value, selected);
	if(checker) {
		if(in_array_index === -1) selected.push(value);
	} else if(in_array_index > -1) {
		selected.splice(in_array_index, 1);
	}
}

// remove item array
function removeItem(array, item) {
	var in_array_index = $.inArray(item, array);
	if (in_array_index > -1) array.splice(in_array_index, 1);
}

// in array // probably unused
function in_array(array, id) {
	var in_array_index = $.inArray(id, array);
	return in_array_index > -1 ? true : false;
}

// clean array (junk from filemanager_user/ajax_show_filemanager.php)
function cleanArray(actual) {
	var newArray = new Array();
	for(var i = 0; i < actual.length; i++) {
		if(actual[i]) {
			newArray.push(actual[i]);
		}
	}
	return newArray;
}

// check is real root (junk from filemanager_user/ajax_show_filemanager.php)
function check_is_real_root() {
	//var user_dir = core_user_dir;
	//if(user_dir == ".." || user_dir == "../") {
	if(core_user_dir == ".." || core_user_dir == "../") {
		return true;
	} else {
		return false;
	}
}

// show this dir file (search)
/*function show_this_dir_file(is_file, is_zip, is_img, name, download) {
	if(is_file == 0) {
		page = 1;
		this_dir_path = name;
		showFileManager(this_dir_path);
	} else {
		if (is_img == 0) window.open(ajax_load_path + "download.php?show=" + download, ajax_load_path + "download.php?show=" + download);
	}
}*/

// rename file
function rename_file(name, index, time) {

	//
	filext = name.substr((Math.max(0, name.lastIndexOf(".")) || Infinity) + 1);
	filext = '.' + filext;
	var val = index.replace(/\.[^/.]+$/, '');

	x3_log('new_name1: '+new_name);

	if(time == "first") {
		is_rename = true;
		x3_show_conf.find("#confLable").html(lang('Rename') + ' ' + index);
		x3_show_conf.find('#container_id_tree').html(lang('Write a new name.'));
		x3_show_conf.find("#confButton").html('<div class="row"><div class="col-xs-6"><input type="text" class="form-control" id="rename_new_name" placeholder="' + lang('New File Name') + '" style="float: left; margin-top: 0px;" onchange="is_rename = true; set_new_name(this.value);" value="' + val.replace(/"/g, '&quot;') + '" /><input type="hidden" class="input-small" id="rename_new_ext" value="' + filext + '" style="float: left; margin-top: 0px;" onchange="//filext = this.value;"/></div><div class="col-xs-6"><button class="btn btn-default" data-dismiss="modal" aria-hidden="true">' + lang('Cancel') + '</button><button class="btn btn-success btn-key">' + lang('Rename') + '</button></div></div>');
		x3_show_conf.find('.btn-success').one('click', function(e) {
			e.preventDefault();
			rename_file(name, index, 'r');
		});
	} else if (time == "move") {
		x3_show_conf.find("#confLable").html(lang('Move') + ' ' + index);
		//$('#container_id_tree').html('');
		x3_show_conf.find('#container_id_tree').html(lang('Choose your target directory.'));
		old_name = name.replace(here, "");
		old_name = old_name.replace(filext, "");
		is_move = true;
		x3_show_conf.find("#confButton").html('<div class="row"><div class="col-xs-6"><input type="text" class="form-control input-move" id="rename_new_name" placeholder="' + lang('New File Path') + '" style="float: left; margin-top: 0px;" onchange="is_move = true; set_new_name(this.value);"/><input type="hidden" class="input-small" id="rename_new_ext" value="' + filext + '" style="float: left; margin-top: 0px;" onchange="//filext = this.value;"/></div><div class="col-xs-6"><button class="btn btn-default" data-dismiss="modal" aria-hidden="true">' + lang('Cancel') + '</button><button class="btn btn-info" onclick="showInlineTree()">' + lang('Browse') + '</button><button class="btn btn-success">' + lang('Move') + '</button></div></div>');
		x3_show_conf.find('.btn-success').one('click', function(e) {
			e.preventDefault();
			rename_file(name, index, 'm');
		});
	} else {
		x3_show_conf.modal("hide");
		var user_name = new_name;

		// hmm
		if(!is_move) {
			var last_char = name.split("/");
			last_char[last_char.length - 1] = last_char[last_char.length - 1].replace(index, new_name);
			new_name = last_char.join("/");
		}

		x3_log('rename_file(' + name + ', ' + index + ')');
		x3_log('new_name2: '+new_name);
		new_name = normalize_new_name(new_name);
		x3_log('new_name3: '+new_name);

		if(deny_guest()) return;
		show_preloader();
		setTimeout(function() {
			$.post(ajax_load_path + "ajax_manage_dir.php", {
					filename: name,
					newName: new_name
				},
				function(data, status) {
					have_action = "yes";
					if (status == "success") {
						if (data == "true") {
							if(time == 'r') var error_text = lang('File has been renamed');
							if(time == 'm') var error_text = lang('File has been moved');
							loading_from_file = error_text;
							loading_from_file_status = "green";
						} else {
							if(time == 'r') var error_text = lang('File has not been renamed');
							if(time == 'm') var error_text = lang('File has not been moved');
							loading_from_file = error_text;
							loading_from_file_status = "red";
						}
						if (is_root == 'true')
							showFileManager('');
						else
							showFileManager(here);
					} else {
						alert("Error: " + status);
						hide_preloader();
					}
				});
		}, 1000);
	}
}

// copy file
function copy_file(name, index, time) {
	filext = name.substr((Math.max(0, name.lastIndexOf(".")) || Infinity) + 1);
	filext = '.' + filext;
	if (time == "first") {
		x3_show_conf.find("#confLable").html(lang('Copy') + ' ' + index);
		//$('#container_id_tree').html('');
		x3_show_conf.find('#container_id_tree').html(lang('Choose your target directory.'));
		old_name = name.replace(here, "");
		old_name = old_name.replace(filext, "");
		x3_show_conf.find("#confButton").html('<div class="row"><div class="col-xs-6"><input type="text" class="form-control" id="copy_new_name" placeholder="' + lang('New Folder Path') + '" style="float: left; margin-top: 0px;" onchange="set_new_name(this.value);"/></div><input type="hidden" class="form-control" id="rename_new_ext" value="' + filext + '" style="float: left; margin-top: 0px;" onchange="//filext = this.value;"/><div class="col-xs-6"><button class="btn btn-default" data-dismiss="modal" aria-hidden="true">' + lang('Cancel') + '</button><button class="btn btn-info" onclick="showInlineTree()">' + lang('Browse') + '</button><button class="btn btn-success">' + lang('Copy') + '</button></div></div>');
		x3_show_conf.find('.btn-success').one('click', function(e) {
			e.preventDefault();
			copy_file(name, index, 'rename');
		});
	} else {
		x3_show_conf.modal("hide");
		var user_name = new_name;

		/*if(user === 'super') {
			var last_char = name.split("/");
			last_char[last_char.length - 1] = last_char[last_char.length - 1].replace(index, new_name);
			new_name = last_char.join("/");
		}*/

		x3_log('copy_file(' + name + ', ' + index + ')');
		x3_log('new_name2: '+new_name);
		new_name = normalize_new_name(new_name);
		x3_log('new_name3: '+new_name);

		if(deny_guest()) return;
		show_preloader();
		setTimeout(function() {
			$.post(ajax_load_path + "ajax_manage_dir.php", {
					filename: name,
					newName: new_name,
					copy_this: 'ok'
				},
				function(data, status) {
					have_action = "yes";
					if (status == "success") {
						if (data == "true") {
							loading_from_file = lang('File has been copied.');
							loading_from_file_status = "green";
						} else {
							loading_from_file = lang('File has not been copied.');
							loading_from_file_status = "red";
						}
						if (is_root == 'true')
							showFileManager('');
						else
							showFileManager(here);
					} else {
						alert("Error: " + status);
						hide_preloader();
					}
				});
		}, 1000);
	}
}

function get_row_data(el){
	var el = $(el),
			row = el.closest('tr');
	return {
		name: row.data('path')
	};
}

// remove file
function remove_file(name, index, time) {

	if (time == "first") {
		x3_show_conf.find("#confLable").html(lang('Remove') + ' ' + index);
		x3_show_conf.find("#container_id_tree").html(lang('Do you want to remove this file'));
		x3_show_conf.find("#confButton").html('<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">' + lang('Cancel') + '</button><button class="btn btn-danger">' + lang('Remove') + '</button>');
		x3_show_conf.find('.btn-danger').one('click', function(e) {
			e.preventDefault();
			remove_file(name, index, 'rename');
		});
	}
	else {
		x3_show_conf.modal("hide");
		if(deny_guest()) return;
		show_preloader();
		setTimeout(function() {
			$.post(ajax_load_path + "ajax_manage_dir.php", {
					removeFileName: name
				},
				function(data, status) {
					have_action = "yes";
					if (status == "success") {
						if (data == "true") {
							loading_from_file = lang('File has been deleted.');
							loading_from_file_status = "green";
						}
						else {
							loading_from_file = lang('File has not been deleted.');
							loading_from_file_status = "red";
						}
						if (is_root == 'true')
							showFileManager('');
						else
							showFileManager(here);
					}
					else {
						alert("Error: " + status);
						hide_preloader();
					}
				});
		}, 1000);
	}
}

// add slashes (I don't think this is used, or maybe USER)
function addslashes(string) {
	return string.replace(/\\/g, '\\\\').
	replace(/\u0008/g, '\\b').
	replace(/\t/g, '\\t').
	replace(/\n/g, '\\n').
	replace(/\f/g, '\\f').
	replace(/\r/g, '\\r').
	replace(/'/g, '\\\'').
	replace(/"/g, '\\"');
}

// mk dir
function mkdir(there) {
	x3_modal_new_folder.modal("hide");
	if(deny_guest()) return;
	show_preloader();
	var new_here = there || here;
	var post_data = {
		mkdir_path: new_folder_path,
		this_place: new_here
	};

	x3_log('mkdir(' + there + ')');
	x3_log('new_here: ' + new_here);
	x3_log('new_folder_path: ' + new_folder_path);

	// optional page settings
	var arr = ['title', 'label', 'link', 'target'];
	arr.forEach(function(item) {
		var val = x3_modal_new_folder.find('#new_folder_' + item).val();
		if(val && val != 'auto') post_data[item] = val;
	});
	var hidden = x3_modal_new_folder.find('#new_folder_hidden').prop('checked');
	if(hidden) {
		post_data.hidden = true;
		var hidden_content_path = get_content_path(new_here + '/' + new_folder_path);
	}

	// Post!
	setTimeout(function() {
		$.post(ajax_load_path + 'ajax_manage_dir.php', post_data,
			function(data, status) {
				if (status == "success") {
					have_action = "yes";
					reload_sidebar = true;
					if (data === 'already') {
						loading_from_file = lang('already exists.');
						loading_from_file_status = "red";
					} else if (data == "true") {
						loading_from_file = lang('Folder has been created.');
						loading_from_file_status = "green";
						if(hidden) add_folders_key(hidden_content_path, { hidden: true });
					} else {
						loading_from_file = lang('Folder has not been created.');
						loading_from_file_status = "red";
					}
					if (is_root == 'true') {
						showFileManager('');
					} else {
						showFileManager(new_here);
					}
				} else {
					alert("Error: " + status);
					hide_preloader();
				}
			});
		new_folder_path = "";
	}, 100);
}

// create zip
function create_zip() {
	x3_log('create_zip(' + here + '/' + zip_file_name + ')');
	if (selected == "" || selected == null) {
		alert(lang('Please select files and folders'));
	} else {
		x3_modal_new_zip_file.modal("hide");
		if(deny_guest()) return;
		show_preloader();
		setTimeout(function() {
			$.post(ajax_load_path + "ajax_manage_dir.php", {
					create_zip: selected,
					this_place: here,
					zip_name: zip_file_name
				},
				function(data, status) {
					if (status == "success") {
						if (data == "true") {
							loading_from_file = lang('Zip file has been created.');
							loading_from_file_status = "green";
						} else {
							loading_from_file = lang('Zip file has not been created.');
							loading_from_file_status = "red";
						}
						showFileManager(here);
					} else {
						alert("Error: " + status);
						hide_preloader();
					}
				});
			zip_file_name = "";
		}, 1000);
	}
}

// set new name
function set_new_name(name) {

	//if(user === 'user') name = name == "./.." ? ".." : name.replace("./..", "../");


	if (is_rename == true && !is_guest) {
		if(user === 'super') is_rename = false;
		var check = name.indexOf("/");
		if (check != -1) {
			alert(lang('Please write new folder/file name.'));
			return false;
		}
	}
	if (is_move == true && !is_guest) {
		//is_move = false;
		var check = name.indexOf("/");
		if (check == -1) {
			alert(lang('Please write new folder/file path.'));
			return false;
		}
	}
	var check = name.indexOf("'");
	if (check != -1) {
		alert(lang('Please don\'t use quotation in server folders.'));
		return false;
	}
	check = name.indexOf("\"");
	if (check != -1) {
		alert(lang('Please don\'t use quotation in server folders.'));
		return false;
	}

	var file_ext = x3_show_conf.find("#rename_new_ext");
	if(file_ext.length) filext = file_ext.val();

	//new_name = name + filext;
	new_name = name.replace(/\/\//g, '/') + filext;

	x3_log('set_new_name: '+new_name);
	//new_name = normalize_new_name(new_name);
	//x3_log('new_name2: '+new_name);



	/*x3_log('new_name1: ' + new_name);
	//new_name = (user === 'super' ? '' : '../') + '../content/' + new_name.split('/content/')[1].replace(/\/\//g, '/');
	x3_log('new_name2: ' + new_name);*/


	filext = "";
}

// rename dir
function rename_dir(name, index, time) {
	//here = context ? name : here;
	//name = name.replace(/\/$/, '');
	name = filemanager_slash_fix(name);
	/*context = context || false;
	if(context) {
		var old_here = here;
		here = name;
	}*/
	var index_warning = name.match('.index$') || name.match('/index$') ? '<div class="alert alert-danger" role="alert">Are you sure you want to rename the index home page?</div>' : '';

	if (time == "first") {
		x3_show_conf.find("#confLable").html(lang('Rename') + ' ' + index);
		//$('#container_id_tree').html('');
		x3_show_conf.find('#container_id_tree').html(index_warning + lang('Write a new name.') + '<div class=modal-help>* Make sure to save any unsaved settings before you rename a folder.</div>');
		x3_show_conf.find("#confButton").html('<div class="row"><div class="col-xs-6"><input type="text" class="form-control is-dir" id="rename_new_name" placeholder="' + lang('New Folder Name') + '" style="float: left; margin-top: 0px;" onchange="is_rename = true; set_new_name(this.value);" value="' + index.replace(/"/g, '&quot;') + '" /></div><div class="col-xs-6"><button class="btn btn-default" data-dismiss="modal" aria-hidden="true">' + lang('Cancel') + '</button><button class="btn btn-success btn-key">' + lang('Rename') + '</button></div></div>');
		x3_show_conf.find('.btn-success').one('click', function(e) {
			e.preventDefault();
			rename_dir(name, index, 'r');
		});

	} else if (time == "move") {
		x3_show_conf.find("#confLable").html(lang('Move') + ' ' + index);
		//$('#container_id_tree').html('');
		x3_show_conf.find('#container_id_tree').html(lang('Choose your target directory.'));
		old_name = name.replace(here, "");
		old_name = old_name.replace(filext, "");
		is_move = true;

		x3_show_conf.find("#confButton").html('<div class="row"><div class="col-xs-6"><input type="text" class="form-control is-dir" id="rename_new_name_dir" placeholder="' + lang('New Folder Path') + '" style="float: left; margin-top: 0px;" onchange="is_move = true; set_new_name(this.value);"/></div><div class="col-xs-6"><button class="btn btn-default" data-dismiss="modal" aria-hidden="true">' + lang('Cancel') + '</button><button class="btn btn-info" onclick="showInlineTree()">' + lang('Browse') + '</button><button class="btn btn-success">' + lang('Move') + '</button></div></div>');
		x3_show_conf.find('.btn-success').one('click', function(e) {
			e.preventDefault();
			is_move = true;
			rename_dir(name, index, 'm');
		});
	} else {

		x3_log('[RENAME/MOVE]');

		if(!new_name) {
			alert('Please input a new ' + (is_move ? 'path' : 'name') + '!');
			is_move = false;
			return;
		}

		x3_show_conf.modal("hide");
		if (here == name && is_move) {
			new_name = new_name.replace("../", "");
		}
		var user_name = new_name;


		// hmm
		if(!is_move){
			var last_char = name.split("/");
			last_char[last_char.length - 1] = last_char[last_char.length - 1].replace(index, new_name);
			new_name = last_char.join("/");
		}


		if (here == name && is_move) {
			new_name = new_name + "/" + index;
		}
		var was_here = here;

		x3_log('new_name2: '+new_name);
		new_name = normalize_new_name(new_name);
		x3_log('new_name3: '+new_name);

		if(new_name.indexOf(name) === 0 && is_move){
			new_name = '';
			is_move = false;
			alert("Can't move folder into itself!");
		} else {
			is_move = false;
			if(deny_guest()) return;
			show_preloader();
			setTimeout(function() {
				$.post(ajax_load_path + "ajax_manage_dir.php", {
						dirname: name,
						newName: new_name
					},
					function(data, status) {
						have_action = "yes";
						if (status == "success") {
							if (data == "true") {
								if (time == 'r')
									var error_text = lang('Folder has been renamed.');
								if (time == 'm')
									var error_text = lang('Folder has been moved.');
								this_dir_path = new_name.replace(user_name, '');
								if (name == was_here && time == "m") {
									this_dir_path = name.replace(index, '');
								}
								if (name == was_here && time == "r") {
									this_dir_path = new_name;
								}
								loading_from_file = error_text;
								loading_from_file_status = "green";
								reload_sidebar = true;

								// X3 mtree push open ID
								var arr = name.split('/');
								var old_id = 'menu_' + arr[arr.length - 1].replace('.', '_');
								var new_id = 'menu_' + user_name.replace('.', '_');
								var old_id_open = x3_mtree.find('#' + old_id);
								if(old_id_open.length && old_id_open.hasClass('mtree-open')) {
									old_id_open.attr('id', new_id);
									mtreeSaveState();
								}
								update_folders_key(name, new_name, false);
							}
							else {
								if (time == 'r')
									var error_text = lang('Folder has not been renamed.');
								if (time == 'm')
									var error_text = lang('Folder has not been moved.');
								this_dir_path = name.replace(index, '');
								loading_from_file = error_text;
								loading_from_file_status = "red";
							}
							if (is_root == 'true') {
								showFileManager('');
							}
							else {
								showFileManager(this_dir_path);
							}

						}
						else {
							alert("Error: " + status);
							hide_preloader();
						}
					});
			}, 1000);
		}
	}
}

// normalize new name
function normalize_new_name(str) {
	/*if(str.indexOf('./') > -1){
		var arr = str.split('./');
		str = arr[arr.length - 1];
	}
	if(str.indexOf('/content/') > -1) str = str.split('/content/')[1];*/

	/*
	RENAME
	normalize_new_name(../content/8.hiawathazzz/NAME777.jpg)
	normalized: ../content/8.hiawathazzz/NAME777.jpg

	MOVE
	normalize_new_name(../content/8.hiawathazzz/../9.subdir2/1.subdir1/1.subdir2/NAME555.jpg)
	normalized: ../content/8.hiawathazzz/../9.subdir2/1.subdir1/1.subdir2/NAME555.jpg
	*/

	x3_log('normalize_new_name(' + str + ')');
	if(str.indexOf('/content/') > -1){
		str = str.split('/content/')[1];
	} else if(str.indexOf('./') > -1){
		var arr = str.split('./');
		str = arr[arr.length - 1];
	}
	/*if(str.indexOf('/content/') > -1){
		str = str.split('/content/')[1];
	}
	if(str.indexOf('./') > -1){
		var arr = str.split('./');
		str = arr[arr.length - 1];
	}*/
	str = (user === 'super' ? '' : '../') + ('../content/' + str).replace(/\/\//g, '/').replace(/\/$/, '');
	x3_log('normalized: ' + str);
	return str
}

// copy dir
function copy_dir(name, index, time) {
	//here = context? name : here;
	//name = name.replace(/\/$/, '');
	name = filemanager_slash_fix(name);
	if (time == "first") {
		x3_show_conf.find("#confLable").html(lang('Copy') + ' ' + index);
		//$('#container_id_tree').html('');
		x3_show_conf.find('#container_id_tree').html(lang('Choose your target directory.'));
		old_name = name.replace(here, "");
		old_name = old_name.replace(filext, "");
		x3_show_conf.find("#confButton").html('<div class="row"><div class="col-xs-6"><input type="text" class="form-control" id="copy_new_name_dir" placeholder="' + lang('New Folder Path') + '" style="float: left; margin-top: 0px;" onchange="set_new_name(this.value);"/></div><div class="col-xs-6"><button class="btn btn-default" data-dismiss="modal" aria-hidden="true">' + lang('Cancel') + '</button><button class="btn btn-info" onclick="showInlineTree()">' + lang('Browse') + '</button><button class="btn btn-success">' + lang('Copy') + '</button></div></div>');
		x3_show_conf.find('.btn-success').one('click', function(e) {
			e.preventDefault();
			copy_dir(name, index, 'rename');
		});
	}	else {
		x3_log('copy_dir(' + name + ')');
		x3_log('new_name1: '+new_name);

		if(!new_name) {
			alert("Please input a new path!");
			is_move = false;
			return;
		}
		x3_show_conf.modal("hide");
		if(here == name) {
			new_name = new_name.replace("../", "");
		}
		var user_name = new_name;

		// hmm
		/*var last_char = name.split("/");
		last_char[last_char.length - 1] = last_char[last_char.length - 1].replace(index, new_name);
		new_name = last_char.join("/");*/
		x3_log('new_name2: '+new_name);

		if(here == name) {
			new_name = new_name + "/" + index;
		}
		var was_here = here;

		new_name = normalize_new_name(new_name);
		x3_log('new_name3: '+new_name);


		if(new_name.indexOf(name) === 0){
			alert("Can't copy dir into itself!");
			new_name = '';
		} else {
			if(deny_guest()) return;
			show_preloader();
			setTimeout(function() {
				$.post(ajax_load_path + "ajax_manage_dir.php", {
						dirname: name,
						newName: new_name,
						copy_this: 'ok'
					},
					function(data, status) {
						have_action = "yes";
						if(status == "success") {
							if(data == "true") {
								this_dir_path = new_name.replace(user_name, '');
								reload_sidebar = true;
								loading_from_file = lang('Folder has been copied.');
								loading_from_file_status = "green";
								update_folders_key(name, new_name, true);
							} else {
								this_dir_path = name.replace(index, '');
								loading_from_file = lang('Folder has not been copied.');
								loading_from_file_status = "red";
							}
							if(is_root == 'true') {
								showFileManager('');
							} else {
								if(was_here == name) {
									this_dir_path = was_here;
								}
								showFileManager(this_dir_path);
							}

						}
						else {
							alert("Error: " + status);
							hide_preloader();
						}
					});
			}, 1000);
		}
	}
}

// remove dir
function remove_dir(name, index, time) {
	name = name.replace(/\/$/, '');
	var index_warning = name.match('.index$') || name.match('/index$') ? '<div class="alert alert-danger" role="alert">Are you sure you want to delete your home page?</div>' : '';
	if (time == "first") {
		x3_show_conf.find("#confLable").html(lang('Remove') + ' ' + index);
		x3_show_conf.find("#container_id_tree").html(index_warning + lang('Do you want to remove this folder'));
		x3_show_conf.find("#confButton").html('<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">' + lang('Cancel') + '</button><button class="btn btn-danger">' + lang('Remove') + '</button>');
		x3_show_conf.find('.btn-danger').one('click', function(e) {
			e.preventDefault();
			remove_dir(name, index, 'rename');
		});
	} else {
		x3_show_conf.modal("hide");
		if(deny_guest()) return;
		x3_log('remove_dir(' + name + ')');
		name = normalize_new_name(name);
		x3_log('normalize_new_name(name) == ' + name);
		show_preloader();
		setTimeout(function() {
			$.post(ajax_load_path + "ajax_manage_dir.php", {
					removeDirName: name
				},
				function(data, status) {
					have_action = "yes";
					if(status == "success") {
						if (data == "true") {
							reload_sidebar = true;
							loading_from_file = lang('Folder has been deleted.');
							loading_from_file_status = "green";


							//x3_log('remove_dir: ');
							//x3_log('name: '+name);
							/*
							name: ./../content/5.myshit/1.aaaaxoy
							*/
							remove_folders_key(name);


						} else {
							loading_from_file = lang('Folder has not been deleted.');
							loading_from_file_status = "red";
						}
						var last_char = name.split("/");
						last_char[last_char.length - 1] = last_char[last_char.length - 1].replace(index, '');
						this_dir_path = last_char.join("/");
						if(is_root == 'true'){
							showFileManager('');
						} else {
							showFileManager(this_dir_path);
						}
					} else {
						alert("Error: " + status);
						hide_preloader();
					}
				});
		}, 1000);
	}
}

// showInlineTree
function showInlineTree() {

	if(user === 'super'){

		var loop_start = root_dir_name_parent_count;

		if(container_id_tree.is(':visible')) container_id_tree.fileTree({
			root: root_dir_name + '/',
			script: ajax_load_path + 'jqueryFileTree.php',
			expandSpeed: 500,
			collapseSpeed: 500,
			multiFolder: false
		}, function(file) {
			var set_back_slashes = '';
			if (is_root == "truez") {
				var real_name_show = file.replace(root_dir_name + '/', '');
			} else {
				var real_name_show = file.replace(root_dir_name + '/', '../');
				var create_back = here.split("/");
				removeItem(create_back, "");
				create_back = create_back.length;
				var debug = here.split("/");
				removeItem(debug, "");
				create_back -= 2;
				for (var j = 0; j < debug.length; j++) {
					if (debug[j] == "" && j != (debug.length - 1)) {
						create_back += 2;
						create_back -= 3;
						break;
					}
				}
				if (create_back >= 1) {
					for (var i = loop_start; i < create_back; i++) {
						set_back_slashes += '../';
					}
				}
			}
			real_name_show = real_name_show.substring(0, real_name_show.length - 1);

			var copy_new_name = x3_show_conf.find('#copy_new_name');
			if(copy_new_name.length){
				if(is_root == "true") {
					copy_new_name.val(real_name_show + old_name);
				} else {
					copy_new_name.val(set_back_slashes + real_name_show + old_name);
				}
				filext = x3_show_conf.find('#rename_new_ext');
			}

			var rename_new_name = x3_show_conf.find('#rename_new_name');
			if(rename_new_name.length){
				if(is_root == "true") {
					rename_new_name.val(real_name_show + old_name);
				} else {
					rename_new_name.val(set_back_slashes + real_name_show + old_name);
				}
				filext = x3_show_conf.find('#rename_new_ext');
			}

			var copy_new_name_dir = x3_show_conf.find('#copy_new_name_dir');
			if(copy_new_name_dir.length){
				if(is_root == "true") {
					copy_new_name_dir.val(real_name_show + old_name);
				} else {
					copy_new_name_dir.val(set_back_slashes + real_name_show + old_name);
				}
				filext = '';
			}

			var rename_new_name_dir = x3_show_conf.find('#rename_new_name_dir');
			if(rename_new_name_dir.length){
				if(is_root == "true") {
					rename_new_name_dir.val(real_name_show + old_name);
				} else {
					rename_new_name_dir.val(set_back_slashes + real_name_show + old_name);
				}
				filext = '';
			}

			set_new_name(set_back_slashes + real_name_show + old_name);
		});

		// container_id_tree2
		if(container_id_tree2.is(':visible')) container_id_tree2.fileTree({
			root: root_dir_name + '/',
			script: ajax_load_path + 'jqueryFileTree.php',
			expandSpeed: 500,
			collapseSpeed: 500,
			multiFolder: false
		}, function(file) {
			var set_back_slashes = '';
			if (is_root == "true") {
				var real_name_show = file.replace(root_dir_name + '/', '');
			} else {
				var real_name_show = file.replace(root_dir_name + '/', '../');
				var create_back = here.split("/");
				removeItem(create_back, "");
				create_back = create_back.length;
				var debug = here.split("/");
				removeItem(debug, "");
				create_back -= 2;
				for (var j = 0; j < debug.length; j++) {
					if (debug[j] == "" && j != (debug.length - 1)) {
						create_back += 2;
						create_back -= 3;
						break;
					}
				}
				if (create_back >= 1) {
					for (var i = loop_start; i < create_back; i++) {
						set_back_slashes += '../';
					}
				}
			}
			real_name_show = real_name_show.substring(0, real_name_show.length - 1);

			var selected_move = x3_modal_move_selected.find('#selected_move');
			if(selected_move.length) {
				if(is_root == "true") {
					selected_move.val(real_name_show + old_name);
				} else {
					selected_move.val(set_back_slashes + real_name_show + old_name);
				}
			}

			set_new_name(set_back_slashes + real_name_show);
		});

		// container_id_tree3
		if(container_id_tree3.is(':visible')) container_id_tree3.fileTree({
			root: root_dir_name + '/',
			script: ajax_load_path + 'jqueryFileTree.php',
			expandSpeed: 500,
			collapseSpeed: 500,
			multiFolder: false
		}, function(file) {
			var set_back_slashes = '';
			if (is_root == "true") {
				var real_name_show = file.replace(root_dir_name + '/', '');
			} else {
				var real_name_show = file.replace(root_dir_name + '/', '../');
				var create_back = here.split("/");
				removeItem(create_back, "");
				create_back = create_back.length;
				var debug = here.split("/");
				removeItem(debug, "");
				create_back -= 2;
				for (var j = 0; j < debug.length; j++) {
					if (debug[j] == "" && j != (debug.length - 1)) {
						create_back += 2;
						create_back -= 3;
						break;
					}
				}
				if (create_back >= 1) {
					for (var i = loop_start; i < create_back; i++) {
						set_back_slashes += '../';
					}
				}
			}

			real_name_show = real_name_show.substring(0, real_name_show.length - 1);

			var selected_copy = x3_modal_copy_selected.find('#selected_copy');
			if(selected_copy.length) {
				if(is_root == "true") {
					selected_copy.val(real_name_show + old_name);
				} else {
					selected_copy.val(set_back_slashes + real_name_show + old_name);
				}
			}

			set_new_name(set_back_slashes + real_name_show);
		});
	} else {
		if(container_id_tree.is(':visible')) container_id_tree.fileTree({
			root: map_path,
			script: ajax_load_path + 'jqueryFileTree.php',
			expandSpeed: 500,
			collapseSpeed: 500,
			multiFolder: false
		}, function(file) {
			var set_back_slashes = '';
			var real_name_show = file;
			var create_back = here.split("/");
			removeItem(create_back, "");
			create_back = create_back.length;
			var debug = here.split("/");
			removeItem(debug, "");
			create_back -= 2;
			for (var j = 0; j < debug.length; j++) {
				if (debug[j] == "" && j != (debug.length - 1)) {
					create_back += 2;
					create_back -= 3;
					break;
				}
			}
			if (create_back >= 1) {
				for (var i = 0; i < create_back; i++) {
					set_back_slashes += '../';
				}
			}
			real_name_show = real_name_show.substring(0, real_name_show.length - 1);

			var copy_new_name = x3_show_conf.find('#copy_new_name');
			if(copy_new_name.length){
				var parse_user = real_name_show.split("/");
        var user_folder = parse_user.indexOf(user_folder_name);
        for(var i = 0; i <= user_folder; i++){
					delete parse_user[i];
        }
        var show_to_user = cleanArray(parse_user);
        show_to_user = show_to_user.join("/");
        copy_new_name.val(show_to_user + old_name)
        filext = x3_show_conf.find('#rename_new_ext').val();
			}

			var rename_new_name = x3_show_conf.find('#rename_new_name');
			if(rename_new_name.length){
				var parse_user = real_name_show.split("/");
        var user_folder = parse_user.indexOf(user_folder_name);
        for(var i = 0; i <= user_folder; i++){
        	delete parse_user[i];
        }
        var show_to_user = cleanArray(parse_user);
        show_to_user = show_to_user.join("/");
        rename_new_name.val(show_to_user + old_name);
        filext = x3_show_conf.find('#rename_new_ext').val();
			}

			var copy_new_name_dir = x3_show_conf.find('#copy_new_name_dir');
			if(copy_new_name_dir.length){
				var parse_user = real_name_show.split("/");
        var user_folder = parse_user.indexOf(user_folder_name);
        for(var i = 0; i <= user_folder; i++){
        	delete parse_user[i];
        }
        var show_to_user = cleanArray(parse_user);
        show_to_user = show_to_user.join("/");
        show_to_user = show_to_user.replace("//", "/");
        copy_new_name_dir.val(show_to_user + old_name);
        filext = '';
			}

			var rename_new_name_dir = x3_show_conf.find('#rename_new_name_dir');
			if(rename_new_name_dir.length){
				var parse_user = real_name_show.split("/");
        var user_folder = parse_user.indexOf(user_folder_name);
        for(var i = 0; i <= user_folder; i++){
					delete parse_user[i];
        }
        var show_to_user = cleanArray(parse_user);
        show_to_user = show_to_user.join("/");
        rename_new_name_dir.val(show_to_user + old_name);
        filext = '';
			}

			var is_user_root = set_back_slashes+real_name_show;
      var check_is_user_root = is_user_root.split("../").length - 1;
      if(check_is_user_root <= 1 && check_is_real_root()){
      	is_user_root = is_user_root.replace('../', '');
      }
      set_new_name(real_name_show + "/" + old_name);
		});

		// container_id_tree2
		if(container_id_tree2.is(':visible')) container_id_tree2.fileTree({
			root: map_path,
			script: ajax_load_path + 'jqueryFileTree.php',
			expandSpeed: 500,
			collapseSpeed: 500,
			multiFolder: false
		}, function(file) {
			var set_back_slashes = '';
			var real_name_show = file;
			var create_back = here.split("/");
			removeItem(create_back, "");
			create_back = create_back.length;
			var debug = here.split("/");
			removeItem(debug, "");
			create_back -= 2;
			for (var j = 0; j < debug.length; j++) {
				if (debug[j] == "" && j != (debug.length - 1)) {
					create_back += 2;
					create_back -= 3;
					break;
				}
			}
			if (create_back >= 1) {
				for (var i = 0; i < create_back; i++) {
					set_back_slashes += '../';
				}
			}
			real_name_show = real_name_show.substring(0, real_name_show.length - 1);
			var selected_move = x3_modal_move_selected.find('#selected_move');
			if(selected_move.length) {
				var parse_user = real_name_show.split("/");
        var user_folder = parse_user.indexOf(user_folder_name);
        for(var i = 0; i <= user_folder; i++){
        	delete parse_user[i];
        }
        var show_to_user = cleanArray(parse_user);
        show_to_user = show_to_user.join("/");
        show_to_user = show_to_user.replace("//", "/");
        selected_move.val(show_to_user + old_name);
			}
			var is_user_root = set_back_slashes + real_name_show;
      var check_is_user_root = is_user_root.split("../").length - 1;
      if(check_is_user_root <= 1 && check_is_real_root()){
      	is_user_root = is_user_root.replace('../', '');
      }
      set_new_name(real_name_show);
		});

		// container_id_tree3
		if(container_id_tree3.is(':visible')) container_id_tree3.fileTree({
			root: map_path,
			script: ajax_load_path + 'jqueryFileTree.php',
			expandSpeed: 500,
			collapseSpeed: 500,
			multiFolder: false
		}, function(file) {
			var set_back_slashes = '';
			var real_name_show = file;
			var create_back = here.split("/");
			removeItem(create_back, "");
			create_back = create_back.length;
			var debug = here.split("/");
			removeItem(debug, "");
			create_back -= 2;
			for (var j = 0; j < debug.length; j++) {
				if (debug[j] == "" && j != (debug.length - 1)) {
					create_back += 2;
					create_back -= 3;
					break;
				}
			}
			if (create_back >= 1) {
				for (var i = 0; i < create_back; i++) {
					set_back_slashes += '../';
				}
			}

			real_name_show = real_name_show.substring(0, real_name_show.length - 1);

			var selected_copy = x3_modal_copy_selected.find('#selected_copy');
			if(selected_copy.length) {
				var parse_user = real_name_show.split("/");
        var user_folder = parse_user.indexOf(user_folder_name);
        for(var i = 0; i <= user_folder; i++){
        	delete parse_user[i];
        }
        var show_to_user = cleanArray(parse_user);
        show_to_user = show_to_user.join("/");
        selected_copy.val(show_to_user + old_name);
			}

			var is_user_root = set_back_slashes + real_name_show;
      var check_is_user_root = is_user_root.split("../").length - 1;
      if(check_is_user_root <= 1 && check_is_real_root()){
      	is_user_root = is_user_root.replace('../', '');
      }
      set_new_name(real_name_show);
		});
	}

}

// show file manager
function showFileManager(dir_path, active_tab) {

	var dir_path = dir_path === 'here' ? current_dir_path : dir_path;
	if(active_tab) active_page_tab = active_tab;

	if(typeof(my_sort) == 'undefined') {
		my_sort = "name";
	}

	if(typeof(loading_from_file_status) == 'undefined') {
		loading_from_file_status = "blue";
	}

	if(typeof(page) == 'undefined') {
		page = 1;
	}

	if(typeof(countShow) == 'undefined') {
		countShow = 10;
	}

	if(typeof(search) == 'undefined') {
		search = '';
	}

	if(typeof(have_action) == 'undefined') {
		have_action = 'no';
	}

	var myroot = user === 'super' ? root_dir_name : '../';
	var set_root = dir_path == "" || dir_path == myroot ? 1 : 0;
	if(loading_from_file == false) preloader.modal('show');

	// x3 before show file manager
	x3BeforeShowFileManager();

	// post
	$.post(ajax_load_path + "ajax_show_filemanager.php", {
			showFilemanager: user === 'super' ? core_admin_id : core_user_id,
			root: set_root,
			my_dir_path: dir_path,
			sort_type: my_sort,
			page: page,
			countShow: countShow,
			have_action: have_action,
			search: search
		},
		function(data, status) {

			// re-login
			if(!data.trim()) {
				window.location.replace('login.php');
				return;
			}

			if(status == "success") {

				var show_left_sidebar1 = x3_content_show.find('#show_left_sidebar');
				if(first_flag !== true && show_left_sidebar1.length > 0) {
					first_flag = show_left_sidebar1.html();
				}
				/*if(first_flag !== true && $("#show_left_sidebar").length > 0) {
					first_flag = $("#show_left_sidebar").html();
				}*/

				main_menu_active('#fileManager');
				if(loading_from_file == false) {
					preloader.modal("hide");
				} else {
					show_errors_on_nav(loading_from_file, loading_from_file_status);
				}
				loading_from_file = false;
				search = '';
				have_action = "no";

				//x3_content_show.fadeIn(1000);
				x3_content_show.show();
				x3_content_show.html(data);

				// sidebar
				var show_left_sidebar2 = x3_content_show.find('#show_left_sidebar');
				if(!reload_sidebar) {
					if(first_flag == true) {
						//$("#left_folder_menu_box").appendTo(show_left_sidebar2);
						left_sidebar.children('#left_folder_menu_box').appendTo(show_left_sidebar2);
						first_flag = show_left_sidebar2.html();
					} else {
						show_left_sidebar2.html(first_flag);
						updateMtree();
					}
				} else {
					show_left_folder_menu();
				}
				lick = true;

				// X3 after show file manager
				x3AfterShowFileManager(dir_path);
			} else {
				lick = true;
				alert("<center>Can not load page, click to exit. SERVER STATUS: " + status + "</center>");
			}
		});
}

// show left folder menu
function show_left_folder_menu() {

	// only init load
	if(!reload_sidebar) {

		left_sidebar.children('#left_folder_menu_box').load('x3_menu.php', {
			dir: user === 'super' ? root_dir_name + '/' : core_user_dir + '/',
			user: user,
			is_guest: is_guest
		}, function(data) {
			createMtree();
			initShowFileManager();
			setTimeout(auto_garbage_collector, 5000);
		});
	} else {
		reload_sidebar = false;

		// vars
		var show_left_sidebar = x3_content_show.find('#show_left_sidebar');

		//$("#left_folder_menu_box").remove();
		show_left_sidebar.children('#left_folder_menu_box').remove();

		//$("#left_sidebar").html('<div id="left_folder_menu_box"></div>');
		left_sidebar.html('<div id="left_folder_menu_box"></div>');
		var left_folder_menu_box = left_sidebar.children('#left_folder_menu_box');

		//$('#show_left_sidebar').html('Please wait...');
		show_left_sidebar.html('Please wait...');

		left_folder_menu_box.load('x3_menu.php', {
			dir: user === 'super' ? root_dir_name + '/' : core_user_dir + '/',
			user: user,
			is_guest: is_guest
		}, function() {
			//$('#show_left_sidebar').html('');
			show_left_sidebar.html('');

			//$("#left_folder_menu_box").appendTo("#show_left_sidebar");
			left_folder_menu_box.appendTo(show_left_sidebar);

			createMtree();

			//first_flag = $("#show_left_sidebar").html();
			first_flag = show_left_sidebar.html();
		});
	}
}

// show setting
function showSetting() {
	preloader.modal('show');
	$.post(ajax_load_path + "ajax_show_setting.php", {
			showSetting: user === 'super' ? core_admin_id : core_user_id
		},
		function(data, status) {

			// re-login
			if(!data.trim()) {
				window.location.replace('login.php');
				return false;
			}

			if(status == "success") {
				main_menu_active('#setting');
				preloader.modal("hide");
				x3_content_show.show();
				x3_content_show.html(data);
			} else {
				alert("<center>Can not load page, click to exit. SERVER STATUS: " + status + "</center>");
			}
		});
}

// show edit profile
function showEditProfile() {
	preloader.modal('show');
	$.post(ajax_load_path + "ajax_show_profile.php", {
			showProfile: user === 'super' ? core_admin_id : core_user_id
		},
		function(data, status) {
			if(status == "success") {
				main_menu_active('#editProfile');
				preloader.modal("hide");
				x3_content_show.show();
				x3_content_show.html(data);
			} else {
				alert("<center>Can not load page, click to exit. SERVER STATUS: " + status + "</center>");
			}
		});
}

// show users
function showUsers() {
	preloader.modal('show');
	$.post(ajax_load_path + "ajax_show_users.php", {
			showUser: user === 'super' ? core_admin_id : core_user_id
		},
		function(data, status) {
			if(status == "success") {
				main_menu_active('#users');
				preloader.modal("hide");
				x3_content_show.show();
				x3_content_show.html(data);
			} else {
				alert("<center>Can not load page, click to exit. SERVER STATUS: " + status + "</center>");
			}
		});
}

// show add user
function showAddUser() {
	x3_log('showAddUser()');
	preloader.modal('show');
	$.post(ajax_load_path + "ajax_add_user.php", {
			showAddUser: user === 'super' ? core_admin_id : core_user_id
		},
		function(data, status) {
			if(status == "success") {
				main_menu_active('#users');
				preloader.modal("hide");
				x3_content_show.show();
				x3_content_show.html(data);
			} else {
				alert("<center>Can not load page, click to exit. SERVER STATUS: " + status + "</center>");
			}
		});
}

// show errors on nav
function show_errors_on_nav(msg, color) {
	if(color == "red") {
		color = "#D9534F";
	} else if(color == "green") {
		color = "#5CB85C";
	} else if(color == "blue") {
		color = "#428BCA";
	}

	x3_scroll_top();
	x3_welcome.popover({
		content: '<center><span style="color: ' + color + ';">' + msg + '</span></center>',
	  sanitize: false
	});
	x3_welcome.popover('show');


	setTimeout(function() {
		x3_welcome.popover('hide');
	}, 3000);
}

// show preloader
function show_preloader() {
	x3_scroll_top();

	if(x3_win.scrollTop() > 75) x3_html.velocity('stop').velocity('scroll', {
			duration: 500,
			easing: 'easeInOutCubic',
			complete: function(){
				if(!button_is_hidden){
					button_is_hidden = true;
					scroll_button.velocity('stop').velocity('fadeOut', { duration: 200 });
				}
			}
		});

	x3_welcome.popover({
		content: '<center><img src="filemanager_assets/ajax-loader.gif"/></center>',
	  sanitize: false
	});
	x3_welcome.popover('show');
}

// hide preloader
function hide_preloader() {
	x3_scroll_top();
	x3_welcome.attr("data-content", "");
	x3_welcome.popover('hide');
}

// x3_panel.load.js

// topbar navigation
x3_navbar_nav.children('#editProfile').add(x3_navbar_container.find('.editProfile')).click(function(e) {
	loading_from_file = false;
	showEditProfile();
});
x3_navbar_nav.children('#fileManager').click(function(e) {
	loading_from_file = false;
	page = 1;
	x3ShowFileManager();
});
x3_navbar_nav.children('#setting').click(function(e) {
	loading_from_file = false;
	showSetting();
});
x3_navbar_nav.children('#users').click(function(e) {
	loading_from_file = false;
	showUsers();
});
x3_navbar_nav.children('#addUser').click(function(e) {
	loading_from_file = false;
	showAddUser();
});
/*x3_navbar_nav.children('#tickets').click(function(e) {
	loading_from_file = false;
	showTickets();
});*/

// <a> click prevent default
x3_navbar_nav.find('a[href="#"]').click(function(e) {
	e.preventDefault();
});

// inject photoswipe
x3_footer.after('<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"><div class="pswp__bg"></div><div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button><button class="pswp__button pswp__button--share" title="Share"></button><button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button><button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button><button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div></div>');
var pswp = x3_body.children('.pswp');

// start session refresh interval
(function() {

	// only proceed if session_maxlifetime is set and is >= 300 (5 minutes)
	if(session_maxlifetime && session_maxlifetime >= 300) {

		// refresh interval 0.8 * session_maxlifetime
		var refresh_interval = Math.round(session_maxlifetime * 800);

		// refresh load
		function refresh(){
			$.ajax({
			  method: 'POST',
			  url: 'x3_tools.php',
			  dataType: 'json',
			  data: {'session_refresh': true}
			}).done(function(data){
				if(data && data.success) setTimeout(refresh, refresh_interval);
			});
		}

		// start first timeout
		setTimeout(refresh, refresh_interval);
	}
})();

// store default lang
if(selected_lang && supports_local_storage) localStorage.setItem('selected_lang', selected_lang);

// Ace
ace.config.set('basePath', 'https://cdn.jsdelivr.net/npm/ace-builds@1.4.12/src-noconflict/');


// x3_panel.misc.js

function preventJSClick(e){
	if((e.which > 1 || e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) && e.currentTarget.href !== undefined && e.currentTarget.href.length > 0) return true;
}

function filemanager_slash_fix(str){
	// first replace // to / then remove slash at end
	return str.replace(/\/\/+/g, '/').replace(/\/$/, '');
}

// x3_panel.protect.js

var protectPage;
var protectPageAfter;
(function() {

	var current_users = [];
	var waiting = false;
	var protected_tab = (supports_local_storage() && localStorage.getItem('protected_tab') !== null) ? localStorage.getItem('protected_tab') : '#protect-access';

	// Add new user element on population of last-child
	x3_content_show.on('keyup', '#form-users .row:first-child input', function(event) {
		var el = $(this),
				row = el.closest('.row'),
				u = row.find('.users_username_form').val(),
				p = row.find('.users_password_form').val();

		// condition
		if(u.length > 0 && p.length > 0 && row.is(':first-child')) {
			var form_users = x3_content_show.find('#protect-users #form-users');
			form_users.prepend(userElement('',''));
			form_users.find('.row:first-child').css('display', 'none').velocity('slideDown', { duration: 500, delay: 10, easing: 'easeOutQuart' });
		}
	});

	// Remove user item buttons
	x3_content_show.on('click', '.x3-protect .btn-remove', function(event) {
		var row = $(this).closest('.row');
		row.velocity("slideUp", { duration: 200, complete: function(){row.remove();} });
	});

	// Assign click event for menu
	x3_navbar_nav.on('click', '#protect', function(event) {
		event.preventDefault();
		protectPage();
	});

	// Assign click event for SAVE
	x3_content_show.on('click', '.btn-save-protect', function(event) {
		event.preventDefault();
		savePasswords();
	});

	// Tabs click
	x3_content_show.on('click', '.x3-protect .nav-tabs a', function(event) {

		// vars
		var el = $(this);

		// Save active tab
		protected_tab = el.attr('href');
		if(supports_local_storage()) localStorage.setItem('protected_tab', protected_tab);

		// Scroll if necessary
		var x3_protect = x3_content_show.children('.x3-protect'),
				offset = x3_protect.offset().top;
		if(x3_win.scrollTop() > offset) x3_win.scrollTop(offset);

		// Update users available
		if(el.attr('href') === '#protect-access') {

			// Populate users array
			var users = [],
					passwords = [],
					form_users = x3_protect.find('#form-users'),
					form_users_children = form_users.children();

			if(form_users_children.length > 0){
				form_users_children.each(function(index, val) {
					var el = $(this),
							username = el.find('.users_username_form').val()||'',
							password = el.find('.users_password_form').val()||'';

					if(username.length > 0 && username.slice(-1) !== '*') {
						users.push(username);
						passwords.push(password);
					}
				});
			}

			// Refresh users object
			loaded_json.users = {};
			$.each(users, function(index, val) {
				loaded_json.users[val] = passwords[index];
			});

			// Loop access items if changed
			var form_access = x3_protect.find('#form-access'),
					form_access_children = form_access.children('.access-item');

			if($(users).not(current_users).length !== 0 || $(current_users).not(users).length !== 0 || users.length == 0){
				$.each(form_access_children, function(index, val) {

					// Get selectize instance
					var s = $(this).find('.select-users')[0].selectize;

					// Add option for each user
					if(users.length > 0){
						$.each(users, function(index, val) {
							s.addOption({value: val, text: val});
						});
					}

					// Clear options that are not in users array
					$.each(s.options, function(key, val) {
						if($.inArray(key, users) == -1) s.removeOption(key);
					});

					// enable/disable users
					if(users.length == 0) {
						s.disable();
					} else {
						s.enable();
					}

				});
				current_users = users;
			}
		}
	});

	var template = "\
	<div class='x3-panel-section x3-protect'>\
		<div class=protect-controls>\
		<button type=button class='btn btn-primary btn-save-protect'>" + language.Save + "</button>\
		<button type=button data-help=protect class='btn btn-default btn-protect-help panel-help'><i class='fa fa-question'></i></button>\
    <ul class='nav nav-tabs' role='tablist'>\
	    <li role=presentation class=active><a href=#protect-access aria-controls=protect-access role=tab data-toggle=tab>" + language.Links + "</a></li>\
	    <li role=presentation><a href=#protect-users aria-controls=protect-users role=tab data-toggle=tab>" + language.Users + "</a></li>\
    </ul>\
    </div>\
    <div id=myTabContent class=tab-content>\
      <div role=tabpanel class='tab-pane active in' id=protect-access></div>\
      <div role=tabpanel class='tab-pane fade' id=protect-users></div>\
    </div>\
  </div>";
  //
  var loaded_json;

  // This function runs AFTER menu is loaded, in case.
  protectPageAfter = function(){
  	if(waiting && x3_navbar_nav.children('li#protect').hasClass('active')) loadsuccess();
  }

	protectPage = function(){
		preloader.modal('show');
		if(loaded_json != undefined && !waiting) {
			x3_navbar_nav.children('li.active').removeClass('active');
    	x3_navbar_nav.children('li#protect').addClass('active');
    	loadsuccess();
		} else {
			$.getJSON('x3_protect.php', function(data, success) {
				x3_navbar_nav.children('li.active').removeClass('active');
	    	x3_navbar_nav.children('li#protect').addClass('active');
				if(success == 'success') {
					if(data.error != undefined) {
			  		x3_log('Error: '+data.error);
			  		x3Notifier(language.Error + ': '+data.error, null, null, 'danger');
			  	} else if(json_menu != undefined) {
			  		loaded_json = data;
			  		loadsuccess();
			  	} else {
			  		loaded_json = data;
			  		waiting = true;
			  		x3_log('log: waiting for menu ...');
			  	}
				} else {
					x3_log('Error -> success: '+success);
					x3Notifier(language.Error + ' -> success: '+success, null, null, 'danger');
				}
			}).fail(function(){
				window.location.replace('login.php');
			});
		}
	}

	// Save Passwords
	function savePasswords(){
		if(deny_guest()) return;

		preloader.modal("show");

		// vars
		var json = {},
				form_access = x3_content_show.find('#form-access');

		// access
		json['access'] = {};
		if(form_access.children().length > 1){
			var links = [];
			form_access.children().each(function(index, val) {
				var el = $(this);
				var link = el.find('.link_form').val()||'';
				var users = el.find('.users_form').val() || '';
				var user = el.find('.username_form').val().replace(/:/g,'') || '';
				var password = el.find('.password_form').val()||'';

				if(link.length > 0) {

					if($.inArray(link, links) > -1) x3Notifier('<strong>Warning: Link "'+link+'"</strong><br>' + language.warning_multiple_links, 3000, null, 'warning');
					links.push(link);
					json['access'][link] = {};
					if(user.length > 0) json['access'][link]['username'] = user;
					if(password.length > 0) json['access'][link]['password'] = password;
					if(users.length > 0) {
						json['access'][link]['users'] = [];
						$.each(users, function(index, val) {
							json['access'][link]['users'].push(val);
						});
					}
				}
			});
		}

		// users
		json['users'] = {};
		var form_users = x3_content_show.find('#form-users');

		if(form_users.children().length > 1){
			var users = [];
			form_users.children().each(function(index, val) {
				var el = $(this);
				var username = el.find('.users_username_form').val().replace(/:/g,'') || '';
				var password = el.find('.users_password_form').val() || '';
				if(username.length > 0 && password.length > 0) json['users'][username] = password;
				if($.inArray(username, users) > -1 && password.length > 0) x3Notifier('<strong>Warning: Username "'+username+'"</strong><br>' + language.warning_multiple_usernames, 3000, null, 'warning');
				if(username.length > 0 && password.length == 0) x3Notifier('<strong>Warning</strong><br>' + language.usernames_without_passwords, 3000, null, 'warning');
				if(username.length == 0 && password.length > 0) x3Notifier('<strong>Warning</strong><br>' + language.passwords_without_usernames, 3000, null, 'warning');
				if(username.length > 0 && password.length > 0) users.push(username);
			});
		}



		// Save to PHP
		$.ajax({
		  method: 'POST',
		  url: 'x3_protect.php',
		  dataType: 'json',
		  data: {
		  	action: 'protect',
		  	protect: json
		  }
		  //data: {'protect': JSON.stringify(json)},

		// done (success)
		}).done(function(data, textStatus, jqXHR){
			// re-process all from loaded object?
	  	if(data.error != undefined) {
	  		// error
	  		x3_log('Error: '+data.error);
	  		x3Notifier(language.Error + ': '+data.error, null, null, 'danger');
	  	} else {
	  		// success
	  		x3_log('success');
	  		x3Notifier(language.Saved, null, null, 'success');
	  		loaded_json = data;
	  		makePage();
	  	}

	  // fail
		}).fail(function(jqXHR, textStatus, errorThrown) {
	    x3_log('error');

	  	// re-login
			if(!jqXHR.responseText) {
				window.location.replace('login.php');
				return;
			}

	  	x3Notifier(language.Error + ' -> textStatus: '+textStatus, null, null, 'danger');
	  	x3_log('textStatus: '+textStatus);
	  	x3_log('errorThrown: '+errorThrown);

	  // always
	  }).always(function(){
			preloader.modal('hide');
		});
	}

	function loadsuccess(){
		waiting = false;
    preloader.modal("hide");
		x3_content_show.html(template);
		var x3_protect = x3_content_show.children('.x3-protect');
		x3_protect.find('.nav-tabs').find('a[href="'+protected_tab+'"]').tab('show');
    x3_content_show.velocity("fadeIn", { duration: 500 });
    makePage();
    x3_protect.find('.protect-controls').scrollToFixed({
    	zIndex: 2
    });
	}

	function makePage(){
		makeAccessForm();
    makeUsersForm();
	}

	// Get html for new user form element
	function userElement(user, pass){

		// username
		var str = '<div class="row">\
		<div class="form-group col-xs-5">\
		<div class="input-group">\
		<div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>\
		<input type="text" class="form-control users_username_form" placeholder="' + language.Username + '" value="' + user.replace(/"/g, '&quot;') + '">\
		</div>\
		</div>';

		// password
		str += '\
		<div class="form-group col-xs-5">\
		<div class="input-group">\
		<div class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></div>\
		<input type="text" class="form-control users_password_form" placeholder="' + language.Password + '" value="' + pass.replace(/"/g, '&quot;') + '">\
		</div>\
		</div>';

		// button
		str += '\
		<div class="col-xs-2">\
		<button type="button" class="btn btn-default btn-remove" tabIndex=-1><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>\
		</div>';

		str += '</div>'

		return str;
	}

	function makeUsersForm(){
		var str = '<form id="form-users" name="form-users">';
		$.each(loaded_json.users, function(key, val) {
			str += userElement(key, val);
		});
		str += '</form>';

		var protect_users = x3_content_show.find('#protect-users');

		// Write form
		protect_users.html(str);

		// Append first empty item
		protect_users.children('#form-users').prepend(userElement('',''));
	}

	// Get html for new access form element
	function accessElement(url, selected_users, username, password){

		// link
		var str = '\
		<div class="access-item row">\
		<div class="col-xs-10">\
		<div class="form-group">\
    <input type="text" class="form-control select-link link_form" placeholder="' + language.Link + '" value="' + url + '">\
		</div>';
		//

		// Users select
		var users = '';
		$.each(loaded_json.users, function(key, val2) {
			if(key.slice(-1) !== '*') users += '<option value="' + key.replace(/"/g, '&quot;') + '" ' + ((selected_users != undefined && $.inArray(key, selected_users) > -1) ? 'selected' : '') + '>' + key.replace(/</g,'&lt;').replace(/>/g,'&gt;') + '</option>';
		});


		str += '\
		<div class="form-group">\
		<select multiple class="form-control select-users users_form" placeholder="' + language.Users + '">' + users + '</select>\
		</div>';

		// username
		str += '<div class=row>\
		<div class="form-group col-sm-6">\
		<div class="input-group">\
		<div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>\
		<input type="text" class="form-control username_form" placeholder="' + language.Username + '" value="' + username.replace(/"/g, '&quot;') + '">\
		</div>\
		</div>';

		// password
		str += '\
		<div class="form-group col-sm-6">\
		<div class="input-group">\
		<div class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></div>\
		<input type="text" class="form-control password_form" placeholder="' + language.Password + '" value="' + password.replace(/"/g, '&quot;') + '">\
		</div>\
		</div>\
		</div>\
		</div>';

		// remove button
		str += '\
		<div class=col-xs-2>\
		<button type="button" class="btn btn-default btn-remove" tabIndex="-1"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>\
		</div>';

		// help
		if(url.length == 0){
			str += '\
			<div class="col-xs-12 passwords-help">\
			* ' + language.passwords_help + '\
			</div>';
		}

		str += '</div>';

		return str;
	}

	function applySelectize(el){

		// vars
		var link = el.find('.select-link');

		// push json links, exclude custom
		var json = [];
		json_menu.forEach(function(el) {
		  if(el.link.indexOf('custom/') !== 0) json.push(el);
		});

		// add pre-selected items, even if not in array
		var arr = link.val().split(',');
		if($.inArray('*', arr) == -1) json.unshift({link: "*", "label": "*GLOBAL"});
		$.each(arr, function(index, val) {
			if(!val) return;
			var label = (val == '*') ? '*GLOBAL' : val;
			json.unshift({link: val, 'label': label});
		});

		var s = link.selectize({
			//create: true,
			valueField: 'link',
    	labelField: 'label',
    	searchField: ['link'],
    	options: json
		});

		//var selectize = s[0].selectize;
		var item = el;
		s[0].selectize.on('item_add', function(){
			var form = x3_content_show.find('#form-access');
			if(item.is(':first-child')) {
				form.prepend(accessElement('','','',''));
				var neww = form.find('.row:first-child');
				neww.css('display', 'none').velocity('slideDown', { duration: 500, delay: 10, easing: 'easeOutQuart' });
				applySelectize(neww);
			}
		});

		// users
		var u = el.find('.select-users').selectize();
		if(!loaded_json.users || Object.keys(loaded_json.users).length < 1)  {
			u[0].selectize.disable();
		} else {
			u[0].selectize.enable();
		}
	}

	function makeAccessForm(){
		var str = '<form id="form-access" name="form-access">';

		$.each(loaded_json.access, function(key, val) {
			var myurl = (key == undefined || key.length == 0) ? '' : key;
			var username = (val.username == undefined) ? '' : val.username;
			var password = (val.password == undefined) ? '' : val.password;
			str += accessElement(myurl, val.users, username, password);
		});
		str += '</form>';

		// vars
		var protect_access = x3_content_show.find('#protect-access');

		// Write form
		protect_access.html(str);

		// vars
		var form_access = protect_access.children('#form-access');

		// Append first empty item
		form_access.prepend(accessElement('','','',''));

		// vars
		var access_items = form_access.children('.access-item');

		// Add selectize to links
		$.each(access_items, function(index, val) {
			applySelectize($(this));
		});
	}

//});
})();

// x3_panel.refresh.js

(function() {
	x3_navbar_nav.on('click', 'li#refresh > a', function(e) {
		e.preventDefault();
		if(deny_guest()) return;

		// vars
		var btn = $(this),
				original_text = btn.html(),
				date1 = new Date();

		// button
		btn.attr('disabled', true).width(btn.width()).text('Refreshing ...');

		// Get
		$.getJSON('menu_create.php').done(function(data) {
			if(data.success) {
				var date2 = new Date();
	  		var diff = Number(date2)-Number(date1);
				var msg = "Menu refreshed in " + ((diff)/1000).toFixed(2) + " seconds.",
						success = 'success';
			} else if(data.error){
				var msg = "Error: " + data.error,
						success = 'danger';
			} else {
				var msg = "Error :(",
						success = 'danger';
			}
		  x3Notifier(msg, 2000, null, success);

		// fail
	  }).fail(function(jqxhr, textStatus, error) {
	    x3_log('menu create fail:', jqxhr);
    	var msg = textStatus + " : " + error;
		  x3Notifier(msg, 2000, null, 'danger');

		// always
	  }).always(function(jqxhr, textStatus, error) {
	  	var date2 = new Date();
	  	var diff = Number(date2)-Number(date1);
	  	var timer = Math.max(1, (1000 - Number(diff)));
	    setTimeout(function(){btn.html(original_text).attr('disabled', false)}, timer);
	  });

	});
})();

// x3_panel.settings.js

(function() {
	// save key control, global settings and page settings
	key.filter = function(event){
	  return true;
	}
	key('⌘+s, ctrl+s', function(event, handler){
		var json_form = x3_content_show.find('#json-form');
		if(json_form.length) json_form.submit();
	  return false;
	});
})();

// global vars
var get_x3_settings,
		settings_loaded = false,
		current_settings;

// Settings container
(function() {

	// Global vars
	var form_object,
			json_form,
			json_fields,
			current_tab_index,
			filter_buttons,
			x3_settings_container,
			schema_loaded = false,
			saving = false,
			diagnostics_was_disabled = supports_local_storage() && localStorage.getItem('x3_diagnostics_was_disabled') !== null ? true : false;

	// Create skins colors object
	var skin_colors = {};
	$.each(stylerConfig.skins, function(key, val) {
  	if(val !== 'header') {
  		var name = key.split(' ')[0];
  		var col = val.split(' ')[1];
  		if(skin_colors[name] == undefined) skin_colors[name] = [];
  		skin_colors[name].push({
  			"item": col
  		})
  	}
  });

	// Get Schema immediately and store globally
	function getSchema(){
		$.getJSON('settings-schema.json?v=' + x3_panel_version, function(data) {
			schema_loaded = true;
			form_object = data;
	  }).fail(function() {
	    x3_log('Error: Can\'t load panel/settings-schema.json');
	  });
	}
	getSchema();

	// Get settings immediately
	function getSettings(){
		$.ajax({
		  method: 'POST',
		  url: 'x3_settings.php',
		  dataType: 'json',
		  //cache: false,
		  data: {'get_settings': true},
		  success: function(data, textStatus, jqXHR){
		  	settings_loaded = true;
		  	if(data.settings.preload === true) data.settings.preload = 'create';
		  	current_settings = data;
		  },
		  error: function(jqXHR, textStatus, errorThrown){
		  	x3_log('get settings error: ' + textStatus);
		  	x3Notifier(language.Error + ' -> textStatus: '+textStatus, null, null, 'danger');
		  }
		});
	}
	getSettings();

  // Save settings
	function save(json){
		x3_log('save settings');
		if(deny_guest()) return;
		if(!saving){

			saving = true;
			var save_btn = filter_buttons.children('.btn-settings-save');

			save_btn.button('loading');
			preloader.modal('show');

			// add auth x
			if(x3_license) json.x = x3_license;

			// ajax
			$.ajax({
			  method: 'POST',
			  url: 'x3_settings.php',
			  dataType: 'json',
			  //cache: false,
			  data: {'settings': JSON.stringify(json)},
			  success: function(data, textStatus, jqXHR){
			  	if(data.success) {
			  		var logout = !current_settings.back.panel.use_db && (current_settings.back.panel.username !== json.back.panel.username || json.back.panel.password);
						current_settings = json;
			  		x3Notifier(language.Saved, null, null, 'success');
			  		if(logout) location.replace('logout.php');
			  		activeIndicators();

			  		// Remove diagnostics alias container
			  		if(!current_settings.settings.diagnostics && !diagnostics_was_disabled) {
			  			var diagnostics_alias_container = x3_settings_container.children('.diagnostics-alias-container');
			  			if(diagnostics_alias_container.length){
			  				diagnostics_was_disabled = true;
			  				if(supports_local_storage()) localStorage.setItem('x3_diagnostics_was_disabled', true);
			  				diagnostics_alias_container.remove();
			  				x3_win.resize();
			  			}
			  		}
			  	} else {
			  		x3Notifier(language.Error + ': '+data.error, 2000, null, 'danger');
			  		x3_log('save settings error: ' + data.error);
			  	}
			  },
			  complete: function(){
			  	setTimeout(function(){save_btn.button('reset')}, 1000);
			  	preloader.modal("hide");
			  	saving = false;
			  }
			}).fail(function(jqXHR, textStatus, errorThrown){

				// re-login
				if(!jqXHR.responseText) {
					window.location.replace('login.php');
					return;
				}

				x3Notifier(language.Error + ' -> textStatus: '+textStatus, null, null, 'danger');
				firewall_error(textStatus, errorThrown);
			});
		}
	}

	// Render form on page
	function render(){

		// Set default values from current settings
		form_object.value = current_settings;

		// Validation on submit
		form_object.onSubmit = function (errors, values) {
      if(errors) {
        x3_log('render jsonform errors', errors);
      } else {
        x3_log('jsonform valid!');
        save(values);
      }
      x3_log('jsonform values', values);
    }

    // Initiate JSONFORM
    json_form.append('<input style="display:none;" type="text" name="somefakename" /><input style="display:none;" type="password" name="anotherfakename" />');
		json_form.jsonForm(form_object);

		// toggle style.LAYOUT sub-options
		function toggle_layout(){
			var val = layout_radios.filter(':checked').val();
    	layout_topbar_settings.toggle(val.indexOf('topbar') > -1);
    	layout_slidemenu_settings.toggle(val === 'slidemenu');
    }
    // vars
		var layout_settings = json_form.find('.x3-layout-settings'),
				layout_radios = layout_settings.find('[name="style.layout.layout"]'),
				layout_topbar_settings = layout_settings.find('.jsonform-error-style---layout---fixed, .jsonform-error-style---layout---wide'),
				layout_slidemenu_settings = layout_settings.find('.jsonform-error-style---layout---overlay');
		// toggle on change
		layout_radios.change(toggle_layout);
		// toggle immediately
    toggle_layout();

    // custom transition


    //var e = document.getElementById("ddlViewBy");
		//var strUser = e.value;
		var transition_select = document.querySelector('[name="popup.transition"]'),
				custom_transition = document.getElementsByClassName('x3-custom-transition')[0];
		if(transition_select.value != 'custom') custom_transition.style.display = 'none';

		transition_select.addEventListener('change', function(e){
			console.log('this.value', this.value);
    	custom_transition.style.display = this.value == 'custom' ? 'block' : 'none';
    });



    /*var transition_radios = document.querySelectorAll('[name="popup.transition"]'),
    		custom_transition = document.getElementsByClassName('x3-custom-transition')[0];
    for (var i = 0; i < transition_radios.length; i++) {
    	if(transition_radios[i].checked) custom_transition.style.display = transition_radios[i].value == 'custom' ? 'block' : 'none';
    	transition_radios[i].addEventListener('change', function (e){
	    	custom_transition.style.display = this.value == 'custom' ? 'block' : 'none';
	    });
    }*/

    // Show diagnostics helper
    if(!diagnostics_was_disabled) {
	    var diagnostics = json_form.find('[name="settings.diagnostics"]');
	    if(diagnostics.is(':checked')){
	    	// add
	    	x3_settings_container.children('h3').after('<div class="diagnostics-alias-container text-center"><div class="alert alert-info text-left" role="alert" style="display: inline-block;"><strong>Diagnostics Active</strong><br><span class="content">To disable diagnostics and activate your X3 website, uncheck the option below and click save.<br><label style="margin: .7em 0;"><input type="checkbox" id="diagnostics_alias" name="diagnostics_alias" checked> &nbsp;Show Diagnostics</label><br><em>* Diagnostics can be re-enabled from the "Advanced" section below.</em></span></div></div>');
	    	// vars
	    	var diagnostics_alias_container = x3_settings_container.children('.diagnostics-alias-container'),
	    			diagnostics_alias = diagnostics_alias_container.find('#diagnostics_alias'),
	    			diagnostics_both = diagnostics.add(diagnostics_alias);
	    	// on change
		    diagnostics_both.change(function(e) {
		    	diagnostics_both.prop('checked', $(this).is(':checked'));
		    });
	    }
	  }

    // Fixed header
    if(x3_win.width() > 992) filter_buttons.scrollToFixed({zIndex: 5});

		// create site object injected button
		json_form.find('a.btn-create-site-object').on('click', function(e) {
			e.preventDefault();
			if(current_settings.settings.diagnostics){
				x3Notifier('Disable "Show Diagnostics", and click SAVE before you run this task.', 4000, null, 'danger');
			} else if(current_settings.settings.preload !== 'create'){
				x3Notifier('SAVE settings before you run this task.', 4000, null, 'danger');
			} else {
				createSiteObject(true);
			}
		});

		// Styler vars
		var style_settings = json_form.find('.json-form-style-settings'),
				primary_color_selector = style_settings.find('input[name="style.skin.primary_color"]'),
				skin_selector_inputs = style_settings.find('input[name="style.skin.skin"]'),
				skin_selector_labels = skin_selector_inputs.parent('label'),
				font_input = style_settings.find('textarea[name="style.font.font"]');

		// Primary color options for skin selection
		function setPrimaryOptions(skin){
			//var s = json_form.find('input[name="style.skin.primary_color"]')[0].selectize;
			var s = primary_color_selector[0].selectize;
			var current = s.getValue();
			s.clearOptions();
			s.load(function(callback){
				callback(skin_colors[skin]);
				s.createItem(current);
			});
		}
		//var input = json_form.find('input[name="style.skin.primary_color"]');
		//var initial_val = input.val();
		var initial_val = primary_color_selector.val();
		//var s = input.selectize({
		var s = primary_color_selector.selectize({
			persist: false,
			create: true,
			maxItems: 1,
			valueField: 'item',
    	labelField: 'item',
    	searchField: 'item',
    	options: skin_colors[skin_selector_labels.filter('.active').children('input').val()]
    	//options: skin_colors[json_form.find('.skin-selector > label.active > input[type=radio]').val()]
		});
		s[0].selectize.createItem(initial_val);
		//json_form.find('.skin-selector input[type=radio]').change(function() {
		skin_selector_inputs.change(function() {
			setPrimaryOptions($(this).val());
		});

		// Add selectize font-selector from stylerConfig.fonts
		//var combo = json_form.find('textarea[name="style.font.font"]');
		//var selected = combo.val();
		var selected = font_input.val();
		var fonts = [];
		$.each(stylerConfig.fonts, function(key, val) {
    	if(val !== 'header' && val !== '-') {
    		fonts.push({
    			"label": key,
    			"link": val
    		})
    	}
    });
    //combo.before('<select></select><label>Source</label>');
    font_input.before('<select></select><label>Source</label>');
    //var select = combo.siblings('select');
    var select = font_input.siblings('select');
		var s = select.selectize({
			items: [selected],
			create: false,
			maxItems: 1,
			valueField: 'link',
    	labelField: 'label',
    	searchField: ['link'],
    	options: fonts,
    	onChange: function(value) {
    		font_input.val(value);
        //combo.val(value);
    	}
		});

		// Add autosize to textarea's
		autosize(json_form.find('textarea'));

		// Apply filterbuttons
    filterButtons();

    // ACE fix
		var aces = json_form.find('[data-jsonform-type="ace"]');
		aces.each(function(index, val) {
			var container = $(this).children('.controls').children('div');
			var id = container.children('div').attr('id');
			var editor = ace.edit(id);
			container.css('height', 'auto');
			editor.setAutoScrollEditorIntoView(true);
    	editor.setOption("maxLines", 100);
    	editor.setOption("minLines", 5);
    	editor.getSession().setUseWrapMode(true);
    	editor.$blockScrolling = Infinity;
		});

		// Add optional fieldset subtitle
		json_form.find('.alt-title').each(function(index, el) {
			var el = $(this),
					text = el.find('.help-block').first().html();
			el.prev('legend').html(text);
			el.remove();
		});

		// Add selectize to inputs with parent .settings_selectize class
		json_form.find('.settings_selectize').each(function(index, val) {
			var el = $(this);
			var field = el.find('.selectize-items');
			var single = field.hasClass('selectize-single');
			var items = field.text().split(',');
			var original_items = single ? [el.find('input').val()] : el.find('input').val().split(',');
			var options = [];
			$.each(original_items, function(index, val) {
				if($.inArray(val, items) == -1) items.push(val);
			});
			$.each(items, function(index, val) {
				options.push({"item":val});
			});
			var ob = {
				create: field.hasClass('selectize-create'),
				valueField: 'item',
	    	labelField: 'item',
	    	searchField: 'item',
	    	options: options
			}
			if(single) {
				ob.maxItems = 1;
				ob.delimiter = null;
			}
			var s = el.find('input').selectize(ob);
			s[0].selectize.enable();
		});

		// Active plugins
		activeIndicators();

		// save
		//x3_content_show.on('click', '.x3-settings .btn-settings-save', function(event) {
		filter_buttons.children('.btn-settings-save').on('click', function(e) {
			if(json_form.length) json_form.submit();
		});
	}

	// Initiate page
	get_x3_settings = function(){

		// Set global vars
		x3_settings_container = x3_content_show.children('.x3-settings');
		filter_buttons = x3_settings_container.children('.filter-buttons');
		json_form = x3_settings_container.children('#json-form');

		// Check if schema and settings are loaded
		if(schema_loaded && settings_loaded){
			render();
		} else {
			var timer = setInterval(function(){
				if(schema_loaded && settings_loaded){
					clearInterval(timer);
					if(current_nav == 'setting') render();
				}
			}, 1000);
		}
	}

	// Add filter buttons
	function filterButtons(){
		json_fields = json_form.children().children('fieldset');
		var template = '';
		$.each(json_fields, function(index, val) {
			var el = $(this);
			var name = form_object.form[index].title;
			template += '<label class="btn btn-primary"><input type="radio" name="options" id="option' + (index + 1) + '" autocomplete="off" checked>' + name + '</label>';
			el.data('height', el.outerHeight(true));
		});
		//filter_buttons = json_form.siblings('.filter-buttons');
		filter_buttons.children('.btn-group').html(template).after('<button data-loading-text="Saving ..." type="button" class="btn btn-settings-save btn-primary">Save</button>');
		filter_buttons.removeClass('invisible');
		current_tab_index = (supports_local_storage() && localStorage.getItem('x3_settings_tab') !== null) ? Number(localStorage.getItem('x3_settings_tab')) : 0;
		filter_buttons.find('label.btn').eq(current_tab_index).addClass('active');
		json_fields.not(json_fields.eq(current_tab_index)).css('display', 'none');

		filter_buttons.on('click', 'label.btn', function(e) {
			setFilterItem($(this).index());
		});
	};

	// active indicators for plugins
	function activeIndicators(){

		var plugins = json_form.find('fieldset.settings-plugins');

		// plugin image_background (intro)
		var e1 = plugins.find('input[name="plugins.image_background.enabled"]');
		e1.closest('fieldset').toggleClass('is-active', e1.is(':checked') && plugins.find('input[name="plugins.image_background.src"]').val().length > 0);

		// background plugin
		var e2 = plugins.find('input[name="plugins.background.enabled"]');
		e2.closest('fieldset').toggleClass('is-active', e2.is(':checked') && (plugins.find('input[name="plugins.background.src"]').val().length > 0 || plugins.find('input[name="plugins.background.color"]').val().length > 0));

		// fotomoto plugin
		var e3 = plugins.find('input[name="plugins.fotomoto.enabled"]');
		e3.closest('fieldset').toggleClass('is-active', e3.is(':checked') && plugins.find('input[name="plugins.fotomoto.store_id"]').val().length > 0 );

		// audioplayer plugin
		var e4 = plugins.find('input[name="plugins.audioplayer.enabled"]');
		e4.closest('fieldset').toggleClass('is-active', e4.is(':checked'));

		// chat plugin
		var e5 = plugins.find('input[name="accounts.chat"]');
		e5.closest('fieldset').toggleClass('is-active', e5.val().length > 0);

		// disqus comments
		var e6 = plugins.find('input[name="accounts.disqus_shortname"]');
		e6.closest('fieldset').toggleClass('is-active', e6.val().length > 0);

		// Page Sibling Navigation
		var e7 = plugins.find('input[name="settings.pagenav"]');
		e7.closest('fieldset').toggleClass('is-active', e7.is(':checked'));

		// EU Cookie plugin
		var e7 = plugins.find('input[name="plugins.cookie_consent.enabled"]');
		e7.closest('fieldset').toggleClass('is-active', e7.is(':checked'));
	}

	// Set Filter Item
	function setFilterItem(index){
		var click_index = index;
		var item = json_fields.eq(click_index);
		json_form.css('min-height', item.data('height'));
		json_fields.not(item).filter(':visible').velocity({opacity:0}, {
			duration: 100,
			display: 'none',
			complete: function(){
				item.filter(':hidden').velocity({opacity:1}, {duration:200, display:'block'});
			}
		});
		if(supports_local_storage()) localStorage.setItem('x3_settings_tab', click_index);
	}

	// filter buttons click
	/*x3_content_show.on('click', '.x3-settings .filter-buttons label.btn', function(event) {
		setFilterItem($(this).index());
	});*/

	// save button click
	/*x3_content_show.on('click', '.x3-settings .btn-settings-save', function(event) {
		//json_form.find('.save-settings').click();
		//var json_form = $('#json-form');
		if(json_form.length) json_form.submit();
	});*/

	// Fix for radiobuttons label vs help
	var active_label;
	x3_content_show.on('mousedown', 'a.show-help', function(event) {
		active_label = $(this).closest('.form-group').find('label.active.btn-primary');
	}).on('mouseup', 'a.show-help', function(event) {
		var unlabel = $(this).parent('.control-label');
		setTimeout(function(){
			unlabel.removeClass('active btn-primary');
			active_label.addClass('active btn-primary');
		}, 1);
	});


})();


// x3_panel.settings.page.js

var get_x3_page_settings,
		page_settings,
		save_inject;

(function() {

	// Global vars
	var form_object,
			json_form,
			json_fields,
			current_tab_index,
			filter_buttons,
			schema_loaded = false,
			templates_loaded = false,
			current_page_path,
			saving = false,
			save_buttons,
			simplemde,
			template_process = false,
			current_template,
			current_template_type,
			current_template_name,
			current_copy,
			current_get,
			html_editor;

	// form html template
	var template = '<div class="filter-buttons invisible"><div class="btn-group btn-group-sm" data-toggle="buttons"></div></div><form id=json-form></form>';
	//<div id="res" class="alert"></div>';

	// Setting template help
	var templates_help = '<a href=# class=show-help></a><div class=hidden>' + x3_help.templates + '</div>';

	// Setting templates
	var templates = {},
			custom_templates = {},
			core_templates = {},
			templates_loaded_amount = custom_setting_templates ? 0 : 1;

	// templates loaded
	function templates_complete(){
		templates_loaded_amount ++;
		if(templates_loaded_amount === 2) {
			$.extend(true, templates, core_templates, custom_templates);
			templates_loaded = true;
		}
	}

	// Get templates
	$.getJSON('setting-templates.json?v=' + x3_panel_version, function(data) {
		core_templates = data;
		templates_complete();
  }).fail(function() {
  	x3Notifier(language.Error + ': Can\'t load panel/setting-templates.json', null, null, 'danger');
    x3_log('Error: Can\'t load panel/setting-templates.json');
  });

  // get templates
  if(custom_setting_templates) {
  	$.ajax({
		  method: 'POST',
		  url: 'x3_tools.php',
		  dataType: 'json',
		  cache: false,
		  data: {'get_templates':true},
		  success: function(data, textStatus, jqXHR){
				custom_templates = data;
				templates_complete();
		  },
		  error: function(jqXHR, textStatus, errorThrown){
		  	x3Notifier(language.Error + ' -> textStatus: '+textStatus, null, null, 'danger');
		  	x3_log('Templates Error: ' + textStatus);
		  }
		});
  }

	// Get Schema immediately and store globally
	$.getJSON('settings-page-schema.json?v=' + x3_panel_version, function(data) {
		schema_loaded = true;
		form_object = data;
  }).fail(function() {
    x3_log('Error: Can\'t load panel/settings-page-schema.json');
  });

  // Save settings
	function save(json, inject, callback, msg, modal){
		x3_log('save page');
		if(deny_guest()) return;
		if(!saving){
			if(modal === undefined) modal = true;
			saving = true;
			if(typeof save_buttons != 'undefined') save_buttons.button('loading');
			if(modal) preloader.modal('show');
			var data = {};
			var iptc = false;
			var folders_ob = {};

			// function change sort type
			function change_sort(mytype){
				if(active_gallery_sort !== 3 || active_page_tab !== '#gallery') return;
				x3Notifier('Changed to ' + mytype + ' "custom" sorting', null, null, 'success');
				json[mytype]["sortby"] = 'custom';
				json_form.find('.' + mytype + '-sorting').find('input[value="custom"]').click();
			}

			// inject single value
			if(inject){
				data.inject = true;

				// store IPTC also on inject
				if(json.hasOwnProperty('iptc_inject')) {
					data.files = $.extend(true, {}, json['iptc_inject']);
					delete json['iptc_inject'];
				}

			// get image titles and descriptions (for storage in both iptc and page.json)
			} else {

				// get file rows
			  //var rows = x3_content_show.find('.manage-table').children('tbody').children('tr').filter('[data-isfile="1"]');
			  var rows = rows_files;

				// ROWS FILES : proceed if rows length
				if(rows.length) {

					// iptc
					if(current_settings.back.use_iptc){

						// jpg rows
						var jpg_rows = rows.filter(function() {
					    return $.inArray(this.getAttribute('data-ext'), ['jpg', 'jpeg', 'pjpeg']) > -1;
					  });

						// proceed if jpg_rows length
					  if(jpg_rows.length) {
					  	iptc = collect_iptc_files(jpg_rows);
							if(iptc) data.files = iptc;

							// remove jpg_rows from rows
							//rows = rows.not(jpg_rows);
					  }
					}

					// collect file data for remaining rows
					if(rows.length) {
						var file_data = collectFiledata(rows);
						if(file_data) $.extend(true, json, file_data);
					}

					// change sort setting on sort
					if(is_custom_sort && page_settings.gallery.sortby !== 'custom') change_sort('gallery');
					is_custom_sort = false;
				}

				// folders custom sort
				if(rows_folders.length && is_custom_sort_folders){
					rows_folders.each(function() {
						var content_path = get_content_path(this.getAttribute('data-path')),
								index = this.getAttribute('data-custom');
						if(content_path && index) folders_ob[content_path] = { index: parseInt(index) };
					});
					if(Object.keys(folders_ob).length) {
						data.folders = JSON.stringify(folders_ob);
						if(page_settings.folders.sortby !== 'custom') change_sort('folders');
					}
					is_custom_sort_folders = false;
				}
			}

			// add page settings
			data.page_settings = JSON.stringify(json);
			data.path = current_page_path;

			// log iptc
			x3_log('iptc OB:', iptc);

			// ajax save
			$.ajax({
			  method: 'POST',
			  url: 'x3_settings.php',
			  dataType: 'json',
			  data: data,
			  success: function(data, textStatus, jqXHR){
			  	if(data.success) {
			  		x3Notifier(msg||language.Saved, null, null, 'success');
			  		$.extend(true, page_settings, json);
			  		if(inject) {
							form_object.value = page_settings;
							if(callback) callback(true);
			  		}

			  		// update data-fields after IPTC save
			  		if(iptc) update_iptc_data(iptc, jpg_rows);

			  		// update folders if changed
			  		if(Object.keys(folders_ob).length) {
			  			$.extend(true, folders, folders_ob);

			  			// custom sort main menu
			  			var menu_box = x3_panel_container.find('#left_folder_menu_box'),
			  					parent_ul = current_dir_path ? menu_box.find('li[data-dir="' + current_dir_path + '"]').children('ul') : menu_box.children('ul');
			  			if(parent_ul.length){
			  				var list_items = parent_ul.children(':not(#_custom)');
			  				list_items.each(function(index, item) {
			  					var content_path = item.getAttribute('data-content-path');
			  					if(folders_ob.hasOwnProperty(content_path)) item.setAttribute('data-custom', folders_ob[content_path].index);
								});
								sort_elements(list_items, 'custom', parent_ul);
			  			}
			  		}

			  		//table_body.toggleClass('panorama-enabled', page_settings.plugins.panorama.enabled);
			  		setPreviewImageActive();
			  		activeIndicators();
			  	} else {
			  		x3Notifier(language.Error + ': '+data.error, 2000, null, 'danger');
			  		x3_log('save settings error: ' + data.error);
			  	}
			  },
			  complete: function(){
			  	setTimeout(function(){save_buttons.button('reset')}, 1000);
			  	if(modal) preloader.modal('hide');
			  	saving = false;
			  }
			}).fail(function(jqXHR, textStatus, errorThrown){

				// re-login
				if(!jqXHR.responseText) {
					window.location.replace('login.php');
					return;
				}

				x3Notifier(language.Error + ' -> textStatus: '+textStatus, null, null, 'danger');
				x3_log('save settings error: ' + textStatus);
				if(inject && callback) callback(false);
				firewall_error(textStatus, errorThrown);
			});
		}
	}

	// inject alias, accessible globally
	save_inject = function(json, callback, msg, modal){
		save(json, true, callback, msg, modal);
	};

	// populate assets
	function populateAssets(){
		var assets = json_form.find('input[name="gallery.assets"], input[name="folders.assets"]');
		var json = json_menu.slice();

		assets.each(function(index, val) {
			$(this).selectize({
				//items: ["items"]
				create: false,
				maxItems: 1,
				valueField: 'link',
	    	labelField: 'label',
	    	searchField: ['link'],
	    	options: json
			});
		});
	}

	// Render form on page
	function render(page_settings){

		// vars
		var container = x3_content_show.find('.x3-page-settings-container');

		// add template
		container.append(template);

		// Set global vars
		json_form = container.children('#json-form');

		// Html <tag> fix (fixes </textarea> issue)
		//if(page_settings.content) page_settings.content = page_settings.content.replace(/<\/textarea>/g,'&lt;/textarea&gt;');
		if(page_settings.content) page_settings.content = page_settings.content.replace(/</g,'&lt;').replace(/>/g,'&gt;');

		// Set default values from current settings
		form_object.value = page_settings;

		// Validation on submit
		if(!template_process) form_object.onSubmit = function (errors, values) {

			// update content from editor:
			var current_content = current_settings.back.panel.editor === 'markdown' ? simplemde.value() : html_editor.summernote('code');
			values.content = current_content;
			content_textarea.val(current_content);

			// errors
      if(errors) {
        x3_log('jsonform errors: ', errors);
      } else {
      	x3_log('jsonform valid: ', values);
        if(template_process == 'apply' || template_process == 'paste' || template_process == 'paste-all') {
        	container.css('height', container.outerHeight());
        	container.empty();
        	if(template_process == 'paste') {
        		var remove_items = ['title','label','description','date','image','content', 'link', 'menu', 'seo'];
        		$.each(remove_items, function(index, val) {
        			if(val in current_copy) delete current_copy[val];
        		});
        	}
        	var ob = template_process == 'apply' ? current_template : current_copy;
      		render($.extend(true, {}, current_settings, values, ob));
        	container.css('height', 'auto');
        	var msg = template_process == 'apply' ? (current_template_name + ' template applied to ' + current_template_type + ' settings.') : 'Successfully pasted settings from clipboard.';
        	x3Notifier(msg, null, null, 'success');
        } else if(template_process == 'get'){
        	current_get = values;
        } else if(template_process == 'copy'){
        	x3Notifier('Current settings successfully copied.', null, null, 'success');
        	filter_buttons.find('a.settings-paste, a.settings-paste-all').parent('li').removeClass('disabled');
        	current_copy = values;
        } else {
        	save(values);
        }
        template_process = false;
      }
    }

    // Initiate JSONFORM
		json_form.jsonForm(form_object);

		// vars
		var content_textarea = json_form.find('textarea[name="content"]');

		// layout selectors (gallery/folders)
		function toggle_layout(type, val){
			var els = type === 'gallery' ? gallery_split_view_selector.add(gallery_crop_checkbox) : folders_split_view_selector.add(folders_crop_checkbox);
			els.toggle(val === 'grid' || val === 'vertical' || val === 'carousel');
		}

		// selector vars
		var gallery_layout_selector = json_form.find('.gallery-layout-selector').find('.tabbable').children('.form-group').find('select'),
				gallery_split_view_selector = json_form.find('.gallery-split-view-setting'),
				gallery_crop_checkbox = json_form.find('.gallery-crop-setting'),
				folders_layout_selector = json_form.find('.folders-layout-selector').find('.tabbable').children('.form-group').find('select'),
				folders_split_view_selector = json_form.find('.folders-split-view-setting'),
				folders_crop_checkbox = json_form.find('.folders-crop-setting');

		// set values
		gallery_layout_selector.on('change', function(e) {
			toggle_layout('gallery', this.value);
		});
		toggle_layout('gallery', gallery_layout_selector.val());

		folders_layout_selector.on('change', function(e) {
			toggle_layout('folders', this.value);
		});
		toggle_layout('folders', folders_layout_selector.val());
				
		// Add autosize to textarea's
		autosize(json_form.find('textarea'));

    // ACE fix
		var aces = json_form.find('[data-jsonform-type="ace"]');
		aces.each(function(index, val) {
			var container = $(this).children('.controls').children('div');
			var id = container.children('div').attr('id');
			var editor = ace.edit(id);
			container.css('height', 'auto');
			editor.setAutoScrollEditorIntoView(true);
    	editor.setOption("maxLines", 100);
    	editor.setOption("minLines", 5);
    	editor.getSession().setUseWrapMode(true);
    	editor.$blockScrolling = Infinity;
		});

		// Add optional fieldset subtitle
		json_form.find('.alt-title').each(function(index, el) {
			var el = $(this);
			var text = el.find('.help-block').first().html();
			el.prev('legend').html(text);
			el.remove();
		});

		// populate assets
		if(json_menu !== undefined) {
			populateAssets();
		} else {
			var interval = setInterval(function(){
				if(json_menu !== undefined) {
					clearInterval(interval);
					populateAssets();
				}
			}, 500);
		}

		// Add selectize to inputs with parent .settings_selectize class
		json_form.find('.settings_selectize').each(function(index, val) {
			var el = $(this);
			var field = el.find('.selectize-items');
			var items = field.text().split(',');
			var original_items = el.find('input').val().split(',');
			var options = [];
			$.each(original_items, function(index, val) {
				if($.inArray(val, items) == -1) items.push(val);
			});
			$.each(items, function(index, val) {
				options.push({"item":val});
			});
			var ob = {
				create: field.hasClass('selectize-create'),
				valueField: 'item',
	    	labelField: 'item',
	    	searchField: 'item',
	    	options: options
			}
			if(field.hasClass('selectize-single')) {
				ob.maxItems = 1;
				ob.delimiter = null;
			}
			var s = el.find('input').selectize(ob);
			s[0].selectize.enable();
		});

		// Add selectize to preview-image selector, settimout to allow current_folder_images to update
		setTimeout(function(){
			if(current_folder_images.length) {
				var image_input = json_form.find('input[name="image"], input[name="plugins.image_background.src"], input[name="plugins.background.src"]');
				image_input.each(function(index, el) {
					var options = [],
							el = $(this);
					$.each(current_folder_images, function(index, val) {
						options.push({"item":val});
					});
					if($.inArray(el.val(), current_folder_images) == -1) options.unshift({"item":el.val()});
					var s = el.selectize({
						create: true,
						maxItems: 1,
						delimiter: null,
						valueField: 'item',
			    	labelField: 'item',
			    	searchField: 'item',
			    	options: options
					});
					s[0].selectize.enable();
				});
			}
		}, 10);

		// summernote
		if(current_settings.back.panel.editor === 'html') {
			content_textarea.css('display', 'none');
			content_textarea.after('<div class="html-editor"></div>');
			html_editor = content_textarea.siblings('.html-editor');
			var summernote_config = {
				minHeight: 300,
				codemirror: { // codemirror options
			    theme: 'default',
			    lineWrapping: true,
			    viewportMargin: Infinity
			  },
				toolbar: [
			    ['style', ['style']],
			    ['format', ['bold', 'italic', 'underline', 'clear']],
			    ['color', ['color']],
			    ['size', ['fontsize']],
			    ['para', ['ul', 'ol', 'paragraph']],
			    ['table', ['table']],
			    ['insert', ['link', 'video', 'hr']],
			    ['right', ['codeview', 'fullscreen']]
			  ]
			}
			if(summernote_lang) summernote_config.lang = summernote_lang;
			html_editor.summernote(summernote_config);
			html_editor.summernote('code', content_textarea.text());

			// $('#summernote').summernote('destroy');
			//<button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="" data-original-title="Picture"><i class="note-icon-picture"></i></button>

		// simplemde
		} else {
			simplemde = new SimpleMDE({
				element: content_textarea[0],
				spellChecker: false,
				autoDownloadFontAwesome: false,
				toolbar: [
					"preview",
		      "side-by-side",
		      "fullscreen",
					"bold",
					"italic",
					"heading-1",
					"heading-2",
					"heading-3",
					"|",
					"quote",
					"unordered-list",
					"ordered-list",
					{
						name: "center",
						action: function(editor){
							myToggleBlock(editor, 'center', '<center markdown=1>', '</center>');
						},
						className: "fa fa-align-center",
						title: "Align center",
					},
					"horizontal-rule",
					"|",
					"link",
					"image",
					"|"
					],
					previewRender: function(plainText) {
						return SimpleMDE.prototype.markdown(plainText.replace(/{{path}}/g , here + '/'));
					}
			});

			// Refresh content editor
			if(current_tab_index === 1) setTimeout(function(){simplemde.codemirror.refresh();}, 10);

			// Prepare templates dropdown
			var editor = json_form.find('.editor-toolbar'),
					dropdown_templates = '',
					sorted = Object.keys(editor_templates).sort();
			$.each(sorted, function(index, val) {
				dropdown_templates += '<li><a href="#">' + val + '</a></li>';
			});
			var add_buttons = '';

			// Add images dropdown // 10ms timeout to make sure current_folder_images is populated correctly
			setTimeout(function(){

				// Add images dropdown
				if(here && current_folder_images.length) {

					// remove existing image button
					var img_button = editor.children('.fa-picture-o');
					img_button.hide();

					// vars
					var root_path = get_x3_path() + '/content/' + here.split('../content/')[1].replace(/"/g, '&quot;') + '/',
							popup_checked = supports_local_storage() && localStorage.getItem('dropdown_images_popup') !== null && localStorage.getItem('dropdown_images_popup') ? ' checked' : '',
							frame_checked = supports_local_storage() && localStorage.getItem('dropdown_images_frame') !== null && localStorage.getItem('dropdown_images_frame') ? ' checked' : '',
							dropdown_images_small = current_folder_images.length > 15 ? true : false,
							break_amount = dropdown_images_small ? 10 : 5,
							img_size = !dropdown_images_small && 'devicePixelRatio' in window && window.devicePixelRatio > 1 ? 'w200' : 'w100',
							resize_path = root_path.replace('/content/','/render/' + img_size + '-c1.1/');
					add_buttons += '<div class="dropdown editor-dropdown"><a class="btn-images dropdown-toggle fa fa-picture-o" data-toggle="dropdown" role="button" aria-expanded="true"></a><div class="dropdown-images dropdown-menu pull-right dropdown-menu-right' + (dropdown_images_small ? ' dropdown-images-small' : '') + '" role="menu"><div class="dropdown-images-name"><span>Select image</span></div>';

					// loop
					var line_count = 0
							image_count = 0;
					$.each(current_folder_images, function(index, val) {
						line_count ++;
						image_count ++;
						val = val.replace(/"/g, '&quot;');
						add_buttons += '<img data-name="' + val + '" data-path="' + root_path + val + '" data-src="' + resize_path + val + '">';
						if(image_count >= 100) return false; // limit 100
						if(line_count === break_amount){
							line_count = 0;
							if(index < current_folder_images.length - 1) add_buttons += '<br>';
						}
					});

					// images dropdown end html
					add_buttons += '<div class="dropdown-images-options"><input type="checkbox" id="dropdown_images_popup" name="dropdown_images_popup"' + popup_checked + '><label for="dropdown_images_popup">Popup link</label><input type="checkbox" id="dropdown_images_frame" name="dropdown_images_frame"' + frame_checked + '><label for="dropdown_images_frame">Frame</label></div></div></div>';
				}

				// Add templates dropdown
				add_buttons += '<div class="dropdown editor-dropdown"><a class="btn-templates dropdown-toggle fa fa-magic" data-toggle="dropdown" role="button" aria-expanded="false"></a><ul class="dropdown-templates dropdown-menu pull-right dropdown-menu-right" role="menu" aria-labelledby="dropdown-templates"><li class="dropdown-header">Insert Template</li>' + dropdown_templates + '</ul></div>';

				// append dropdowns
				editor.append(add_buttons);

				// Template buttons
				editor.find('.dropdown-templates').on('click', 'a', function(event) {
					event.preventDefault();
					var str = editor_templates[$(this).text()];
					simplemde.codemirror.replaceSelection(str);
					simplemde.codemirror.focus();
				});

				// image dropdown buttons
				var dropdown_images = editor.find('.dropdown-images');
				if(dropdown_images.length) {

					// vars
					var dropdown_images_container = dropdown_images.parent('.dropdown'),
							dropdown_images_name = dropdown_images.children('.dropdown-images-name'),
							dropdown_images_popup = dropdown_images.find('#dropdown_images_popup'),
							dropdown_images_frame = dropdown_images.find('#dropdown_images_frame');

					// store options in localstorage
					if(supports_local_storage()){
						dropdown_images_popup.add(dropdown_images_frame).change(function() {
							localStorage.setItem(this.id, (this.checked ? 1 : ''));
				    });
					}

					// click toolbar button, insert markup and remove dropdown
					editor.find('.btn-images').click(function(e) {
			    	if(dropdown_images_container.is(':visible')){
			    		dropdown_images.velocity('stop').css({'opacity':0, 'display':'none'});
			    		dropdown_images_container.removeClass('open');
			    	}
			    	img_button.click();

			    // load images
					}).one('mouseenter touchstart', function(e) {
						dropdown_images.find('img').each(function(index) {
							if(!this.hasAttribute('src')) this.setAttribute('src', this.getAttribute('data-src'));
						});
					});

					// Image insert buttons
					dropdown_images.on('click', 'img', function(e) {

						// vars
						var name = this.getAttribute('data-name'),
								name_escaped = name.replace(/"/g, '&quot;'),
								frame = dropdown_images_frame.prop('checked') ? 'class="x3-style-frame" ' : '',
								image_url = '{{path}}' + name_escaped,
								image_alt = page_settings.hasOwnProperty(name) ? page_settings[name]['title'] || page_settings[name]['description'] : false,
								insert = '<img src="' + image_url + '" ' + frame + 'alt="' + (image_alt ? image_alt.replace(/"/g, '&quot;').replace(/(<([^>]+)>)/ig,"") : '') + '" />',
								caption = '';		

						// get caption from page_settings
						if(page_settings.hasOwnProperty(name)){
							caption += page_settings[name]['title'] ? '<strong>' + page_settings[name]['title'] + '</strong>' : '';
							caption += page_settings[name]['description'] ? (caption ? '<br>' : '') + page_settings[name]['description'] : '';
							if(caption) caption = ' data-popup-title="' + caption.replace(/"/g, '&quot;') + '"';
						}

						// popup link
						if(dropdown_images_popup.prop('checked')) insert = '<a href="{{path}}' + name_escaped + '"' + caption + ' data-popup>' + insert + '</a>';

						// inserted class and text
						dropdown_images_name.addClass('inserted').html(name_escaped + ' &nbsp;<i class="glyphicon glyphicon-ok"></i>');

						// insert
						simplemde.codemirror.replaceSelection(insert + '\n');
						simplemde.codemirror.focus();
					}).on('mouseenter', 'img', function(e) {
						dropdown_images_name.html(this.getAttribute('data-name'));
					}).on('mouseleave', 'img', function(e) {
						dropdown_images_name.removeClass('inserted').html('<span>Select image</span>');
					});
				}
			}, 10);

			// Add save button to editor-fullscreen
			editor.prepend('<button data-loading-text="Saving ..." type="button" class="btn btn-settings-save editor-save btn-primary">Save</button>');
		}

		// Add templates
		json_form.find('.template-selector').each(function(index, val) {
			var el = $(this);
			var type = el.hasClass('template-gallery') ? 'Gallery' : 'Folders';
			el.prepend('<div class=setting_templates>' + templates_help + '<select><option value="" disabled selected>' + type + ' Setting Templates</option></select></div>');
			type = type.toLowerCase();
			var selector = el.find('select'),
					html = '',
					original_length = Object.keys(core_templates[type]).length,
					names = [];

			// Add options
			$.each(Object.keys(templates[type]), function(index, val) {
				if(index === original_length) html += '<option value="" disabled>---</option>';
				html += '<option>' + val + '</option>';
				names.push(val);
			});

			// Save
			if(supports_local_storage()) html += '<option class=last-option disabled>---</option><option value="save">Save Current Settings As...</option>';

			// Append options
			selector.append(html);

			// Selector change event
			selector.on('change', function() {

				var el = $(this);

				// SAVE
				if(el.val() == 'save'){
					if(deny_guest()) return;

					// prompt for new template name
					var template_name = prompt('Save current ' + type + '-settings as template:');

					// apply template if template name
					if(template_name && $.inArray(template_name, names) > -1) {
						x3Notifier('Please use a unique name!', 3000, null, 'danger');
					} else if(template_name) {

						// Get current for values
						template_process = 'get';
						//json_form.find('input[type="submit"]').click();
						if(json_form.length) json_form.submit();

						// Create new object for template item
						var ob = {};
						ob[type] = {};
						ob[type][template_name] = {};
						ob[type][template_name][type] = current_get[type];

						// Save it!
						preloader.modal('show');
						$.ajax({
						  method: 'POST',
						  url: 'x3_tools.php',
						  dataType: 'json',
						  cache: false,
						  data: {'save_template':JSON.stringify(ob)},
						  success: function(data, textStatus, jqXHR){
						  	if(data.success) {
						  		x3Notifier('Template "' + template_name + '" saved.', null, null, 'success');
						  	} else {
						  		x3Notifier('Save template error:<br>'+data.fail+'<br><br>Template will be available temporarily until you refresh page.', 3000, null, 'warning');
						  		x3_log('Save template error: ' + data.fail);
						  	}
						  },
						  error: function(jqXHR, textStatus, errorThrown){
						  	x3Notifier('Save template error:<br>'+textStatus+'<br><br>Template will be available temporarily until you refresh page.', 3000, null, 'warning');
						  	x3_log('Save template error: ' + textStatus);
						  },
						  complete: function(){
						  	preloader.modal('hide');
						  }
						});

						// Append new item to list
						var new_option = '';
						if($.isEmptyObject(custom_templates[type])) new_option += '<option class=last-option disabled>---</option>';
						new_option += '<option>' + template_name + '</option>';
						selector.children('[value="save"]').prev().before(new_option);
						names.push(template_name);

						// Add to custom_templates
						$.extend(true, custom_templates, ob);

						// Add to templates
						$.extend(true, templates, ob);
					}

					// Reset selector
					selector.val('');

				} else {
					current_template_name = $(this).val();
					current_template_type = type;
					current_template = templates[type][current_template_name];
					template_process = 'apply';
					//json_form.find('input[type="submit"]').click();
					if(json_form.length) json_form.submit();
				}
			});

		});

		// Active plugins
		activeIndicators();

		// vars
		save_buttons = x3_content_show.find('.btn-settings-save, .save-page');

		// save click
		save_buttons.on('click', function(e) {
			if(json_form.length) json_form.submit();
		});

		// Apply filterbuttons
    filterButtons();

    // Fixed header
    if(x3_win.width() > 992) filter_buttons.scrollToFixed({zIndex: 5});
	}

	// save button
	x3_content_show.on('click', '.save-page, .x3-page-settings .btn-settings-save', function(e) {
		//json_form.find('.save-settings').click();
		if(json_form.length) json_form.submit();
	});

	// Initiate page
	get_x3_page_settings = function(page_json, cpath){

		// Store page settings
		page_settings = $.extend(true, {}, current_settings, page_json);
		x3_log('page settings: ', page_settings);

		// Store current page.json path
		current_page_path = cpath;

		// Check if schema and settings (global) are loaded
		if(schema_loaded && settings_loaded && templates_loaded){
			render(page_settings);
		} else {
			var timer = setInterval(function(){
				if(schema_loaded && settings_loaded && templates_loaded){
					clearInterval(timer);
					if(current_nav == 'fileManager') render(page_settings);
				}
			}, 1000);
		}
	}

	// Add filter buttons
	function filterButtons(){
		json_fields = json_form.children().children('fieldset');
		var template = '';
		$.each(json_fields, function(index, val) {
			var name = form_object.form[index].title;
			template += '<label class="btn btn-default"><input type="radio" name="options" id="option' + (index + 1) + '" autocomplete="off" checked>' + name + '</label>';
			var el = $(this);
			el.data('height', el.outerHeight(true));
		});
		//x3_content_show
		//json_form
		filter_buttons = x3_content_show.find('.filter-buttons');
		var btn_group = filter_buttons.children('.btn-group');
		filter_buttons.prepend('<h3>' + x3_content_show.find('.col-md-9 > h3').text() + '</h3>');
		btn_group.html(template).after('<button data-loading-text="Saving ..." type="button" class="btn btn-settings-save btn-primary">Save</button>');
		filter_buttons.removeClass('invisible');
		current_tab_index = (supports_local_storage() && localStorage.getItem('x3_settings_page_tab') !== null) ? Number(localStorage.getItem('x3_settings_page_tab')) : 0;
		btn_group.children('label.btn').eq(current_tab_index).addClass('active');
		json_fields.not(json_fields.eq(current_tab_index)).css('display', 'none');

  	// copy-paste help
  	var help = "<div class=hidden><h3>Copy-Paste Page Settings</h3><p>This feature allows you to copy settings from one page to another. This is useful when you want to create a page with an identical layout as an existing page. Simply navigate to the source page, click <code>copy</code>, then navigate to the new page and click <code>paste</code>.</p><h4>Copy</h4><p>Copies settings from the current page into clipboard.</p><h4>Paste</h4><p>Pastes settings from clipboard into the current page. This function will only paste layout-related settings, and will <em>ignore</em> unique page details, content, link and menu.</p><h4>Paste All</h4><p>Same as above, but this function will paste <em>all</em> page settings, including details, content, link and menu. This will basically paste an identical copy of the source page, overwriting all existing settings, so it is likely you will want to make some changes after paste.</p><p><em>* You still need to click save after pasting settings.</em></p></div>";

  	// Copy-paste
  	btn_group.after('<div class="dropdown dropdown-copy-paste"><button type="button" class="btn btn-sm btn-default btn-copy-paste\ dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-paste"></i></button>\
    <ul class="dropdown-menu pull-right dropdown-menu-right" role="menu" aria-labelledby="copymenu">\
    <li class="dropdown-header">Copy-Paste Settings</li>\
    <li><a href="#" class=settings-copy data-process=copy><i class="fa fa-copy"></i> Copy</a></li>\
    <li><a href="#" class=settings-paste data-process=paste><i class="fa fa-paste"></i> Paste</a></li>\
    <li><a href="#" class=settings-paste-all data-process=paste-all><i class="fa fa-paste"></i> Paste All</a></li>\
    <li role="separator" class="divider"></li>\
    <li><a href="#" class="settings-copy-help text-help" data-process=copy-paste-help><i class="fa fa-question-circle"></i> Help</a>' + help + '</li>\
  	</ul></div>');

  	// hover // timeout for editor dropdown images
  	setTimeout(function(){
  		filter_buttons.children('.dropdown-copy-paste').add(json_form.find('.editor-dropdown')).hoverIntent({
		    over: function(e){
		    	var el = $(this),
		    			dd = el.find('.dropdown-menu');
		    	dd.velocity({opacity:1}, {duration: 200,display:'block'});
		    	el.addClass('open');
		    },
		    out: function(){
		    	var el = $(this),
		    			dd = el.find('.dropdown-menu');
		    	dd.velocity('stop').css({'opacity':0, 'display':'none'});
		    	el.removeClass('open');
		    },
		    timeout: 300
			});
  	}, 11);

  	// disabled paste
		filter_buttons.find('a.settings-paste, a.settings-paste-all').parent('li').toggleClass('disabled', (current_copy === undefined));

		// filter buttons click
		btn_group.on('click', '.btn', function(e) {
			var el = $(this);
			setFilterItem(el.index());
			if(current_settings.back.panel.editor === 'markdown' && el.index() == 1) simplemde.codemirror.refresh();
		});

		// dropdown copy paste click
		filter_buttons.find('.dropdown-menu').on('click', 'a', function(e) {
			e.preventDefault();
			var el = $(this);
			if(el.data('process') !== 'copy-paste-help') {
				template_process = el.data('process');
				if(json_form.length) json_form.submit();
			}
		});

	};

	// active indicators for plugins
	function activeIndicators(){

		if(typeof json_form == 'undefined') return;

		// plugins
		var plugins = json_form.find('fieldset.plugins');

		// plugin image_background (intro)
		var e1 = plugins.find('input[name="plugins.image_background.enabled"]');
		e1.closest('fieldset').toggleClass('is-active', e1.is(':checked') && plugins.find('input[name="plugins.image_background.src"]').val().length > 0);

		// background plugin
		var e2 = plugins.find('input[name="plugins.background.enabled"]');
		e2.closest('fieldset').toggleClass('is-active', e2.is(':checked') && (plugins.find('input[name="plugins.background.src"]').val().length > 0 || plugins.find('input[name="plugins.background.color"]').val().length > 0));

		// plugin video background
		var e3 = plugins.find('input[name="plugins.video_background.src"]');
		e3.closest('fieldset').toggleClass('is-active', e3.val().length > 0);

		// Fotomoto
		var e4 = plugins.find('input[name="plugins.fotomoto.enabled_page"]'),
				e4_fieldset = e4.closest('fieldset');
		if(page_settings.plugins.fotomoto.enabled && page_settings.plugins.fotomoto.store_id){
			e4_fieldset.toggleClass('is-active', page_settings.plugins.fotomoto.enabled_page);
		} else {
			e4_fieldset.hide();
		}

		// Disqus
		var e5 = plugins.find('input[name="layout.disqus"]'),
				e5_fieldset = e5.closest('fieldset');
		if(page_settings.accounts && page_settings.accounts.disqus_shortname){
			e5_fieldset.toggleClass('is-active', page_settings.layout.disqus);
		} else {
			e5_fieldset.hide();
		}

		// Panorama
		var e6 = plugins.find('input[name="plugins.panorama.enabled"]');
		e6.closest('fieldset').toggleClass('is-active', e6.is(':checked'));
	}

	// Set Filter Item
	function setFilterItem(index){
		var container = x3_content_show.find('.x3-page-settings-container');
		var offset = container.offset().top;
		var click_index = index;
		var item = json_fields.eq(click_index);
		if(x3_win.scrollTop() > offset){
			container.velocity('scroll', { duration: 500, easing: 'easeInOutCubic', complete: function(){
				json_form.css('min-height', item.data('height'));
				json_fields.not(item).filter(':visible').hide();
				item.filter(':hidden').show();
			}});
		} else {
			json_form.css('min-height', item.data('height'));
			json_fields.not(item).filter(':visible').hide();
			item.filter(':hidden').show();
		}
		setTimeout(function(){
			json_form.css('min-height', item.data('height'));
		}, 1000);
		if(supports_local_storage()) localStorage.setItem('x3_settings_page_tab', click_index);
	}

})();

/* x3_panel.tools.auth.js */

var authPage;

//
(function () {

	// vars
	var api = atob_alias('aHR0cHM6Ly9hdXRoLnBob3RvLmdhbGxlcnkv'),
			host = get_domain(),
			btn,
			x3_auth,
			auth_res,
			auth_res_child,
			ls = false,
			ob = {
				domain: host,
				product: 3
			};

	// set current
	function set_current(result){
		x3_license = result.status === 200 ? (result.parameters && result.parameters.type && result.parameters.type == '2' ? 2 : 1) : 0;
		if(supports_local_storage()) localStorage.setItem('x3_license', x3_license);
		x3_body.removeClass('x3-auth-0 x3-auth-1 x3-auth-2').addClass('x3-auth-' + x3_license);
		if(location.search.indexOf('override') > -1) x3_body.addClass('x3-override');
		ls = [result.status, result.message];
	}

	// flamepix x3-auth-1
	if(is_flamepix) x3_body.addClass('x3-auth-' + x3_license);
	// check immediately (!is_flamepix)
	// auth.photo.gallery, ob {domain, product}, success, 'json'
	if(!is_flamepix) $.post(api, ob, function(result){
		set_current(result);
		if(x3_license === 0 && supports_local_storage()) {
			if(localStorage.getItem('x3_license_time') !== null){
				var diff = Date.now() - parseInt(localStorage.getItem('x3_license_time'));

				// diff > 3 days (259200000 ms)
				if(diff > 259200000){

					// prompt
					x3_open_modal('<p><span class="label label-danger" style="font-size: 1.5em; display: inline-block;">No X3 License Found</span></p><p>The website <strong>' + host + '</strong> is not licensed to use X3. If you wish to continue using X3, please consider purchasing a license.</p><p><a href="https://www.photo.gallery/buy/" target="_blank" class="btn btn-primary">Purchase X3 License</a></p>');

					// reset x3_license_time
					localStorage.setItem('x3_license_time', Date.now());
				}
			} else {
				// set initial
				localStorage.setItem('x3_license_time', Date.now());
			}
		}
	}, 'json');

	// Auth page
	authPage = function(){
		x3_auth = x3_content_show.find('.x3-auth');
		auth_res = x3_auth.children('.auth-res');
		auth_res_child = auth_res.children('div');
		btn = x3_auth.children('.btn-auth');
    if(!ls){
    	checkLicense();
    } else {
    	render(ls[0], ls[1]);
    }

    // Button click check
		btn.on('click', checkLicense);
	}

	// Check License
	function checkLicense(){
		if(is_flamepix) {
			render(200);
			return;
		}
		btn.button('loading');
		auth_res_child.html('<div><span class="label label-default">...</span></div>');
		//x3_content_show.find('.auth-res > div').html('<div><span class="label label-default">...</span></div>');
		$.ajax({
			type: 'POST',
			data: ob,
			url: api,
			dataType: 'json',
			success: function(result) {
				x3_log('X3 license:', result);
				set_current(result);
		    render(result.status, result.message);
		  }
		}).fail(function() {
			render(300, 'Can\'t connect to ' + api);
  	}).always(function(){
  		btn.button('reset');
  	});
	}

	function render(status, message){
		var label = (parseInt(status) == 200) ? 'success' : 'danger';
		var icon = (parseInt(status) == 200) ? 'ok' : 'remove';
		var message = (parseInt(status) == 301) ? 'No license found for this domain.' : message;
		if(x3_license && parseInt(status) == 200) message = x3_license === 2 ? 'X3 Private License' : 'X3 Professional License';
		var html = '<span class="label label-' + label + '"><span class="glyphicon glyphicon-' + icon + '" aria-hidden="true"></span>' + message + '</span>';
		if(parseInt(status) == 301) html += '<br><a href="https://www.photo.gallery/buy/" target=_blank class="btn btn-primary" style="margin-top:1.5em; font-size: 12px;">Purchase X3 License</a>';
		auth_res_child.html(html);
		x3Notifier(message, 2000, null, label);
	}

})();

var tools_auth_template = "\
	<div class=x3-auth>\
		<h3>Authorize X3<i class='help-icon panel-help pull-right fa fa-question-circle' data-help='authorize'></i></h3>\
		<div class=auth-res>\
			<strong>domain:</strong> " + window.location.hostname + "\
			<div><span class='label label-default'>...</span></div>\
		</div><br>\
		<button type=button class='btn btn-primary btn-auth' data-loading-text='Checking License ...'><span class='glyphicon glyphicon-repeat' aria-hidden=true></span> &nbsp;Re-check</button>\
  </div>";

// x3_panel.tools.htaccess

var tools_htaccess_init;

(function() {

	var save_me = true,
			btn,
			myeditor,
			tools_htaccess,
			current_htaccess = false;

	function myAlert(msg, type){
		var tools_htaccess = x3_content_show.find('#tools-htaccess');
		tools_htaccess.find('.alert').remove();
		var out = '<div class="alert alert-' + type + ' alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + msg + '</div>';
		tools_htaccess.append(out);
	}

	function saveHtaccess(data){
		if(deny_guest()) return;
		btn.button('loading');
		var editor_val = myeditor.getValue();
		$.ajax({
		  url: "x3_htaccess.php",
		  method: 'POST',
		  dataType: 'html',
		  cache: false,
		  data: {'data': editor_val}
		}).done(function(data){
			if(data == 'ok') {
				current_htaccess = editor_val;
				x3Notifier('.htaccess file saved!', 2000, null, 'success');
			} else {
				x3Notifier('Can\'t write to .htaccess file!', 2000, null, 'danger');
			}
		}).fail(function(jqxhr, textStatus, error){
			x3_log('htaccess save error:', jqxhr);
    	var msg = textStatus + ": " + error;
		  x3Notifier(msg, 3000, null, 'danger');
		}).always(function(){
			setTimeout(function(){
				btn.button('reset');
			}, 1000);
		});
	}

	// set editor
	function set_editor(data){

		// Check for nowrite
		if(data.indexOf('nowrite') == 0) {
			data = data.replace('nowrite','');
			myAlert('If this file was writeable, you could save changes directly from the panel.', 'warning');
			save_me = false;
		}

		// Add editor
		tools_htaccess.append('<div id="htaccess-editor"></div>');
		myeditor = ace.edit('htaccess-editor');
  	myeditor.setOption("maxLines", Infinity);
  	myeditor.setOption("minLines", 5);
  	myeditor.setAutoScrollEditorIntoView(true);
  	myeditor.getSession().setUseWrapMode(true);
  	myeditor.$blockScrolling = Infinity;
    myeditor.setTheme('ace/theme/tomorrow_night');
    var mode = conf_editor === 'htaccess' ? 'apache_conf' : 'xml';
    myeditor.getSession().setMode('ace/mode/' + mode);
    myeditor.setValue(data, -1);

    // add save button
    if(save_me){
    	tools_htaccess.append('<button type="button" class="btn btn-primary btn-process btn-save-htaccess" data-loading-text="Saving ...">Save</button>');
    	btn = tools_htaccess.children('.btn-save-htaccess');
    	btn.on('click', saveHtaccess);
    }
	}

	// Get htaccess
	function getHtaccess(){

		// vars
		tools_htaccess = x3_content_show.find('#tools-htaccess');

		// condition
		if(tools_htaccess.children('#htaccess-editor').length < 1){

			// already loaded once
			if(current_htaccess){
				set_editor(current_htaccess);

			// reload
			} else {
				show_preloader();
				$.ajax({
				  url: "x3_htaccess.php",
				  method: 'POST',
				  dataType: "html",
				  cache: false,
				  data: {'action': 'load'}
				}).done(function(data) {
					if(data == 'nofile') {
						var msg = 'Cannot find .htaccess file in application root!';
						x3Notifier(msg, 2000, null, 'danger');
						myAlert(msg, 'danger');
					} else if(data == 'noread'){
						var msg = '.htaccess file is not readable!';
						x3Notifier(msg, 2000, null, 'warning');
						myAlert(msg, 'warning');
					} else if(data.length < 1){
						var msg = '.htaccess file seems to be empty!';
						x3Notifier(msg, 2000, null, 'warning');
						myAlert(msg, 'warning');
					} else {
						x3Notifier('.htaccess loaded!', 2000, null, 'success');
						current_htaccess = data;
						set_editor(data);
					}

				}).fail(function(jqXHR, textStatus) {
				  x3_log('htaccess load error:', jqxhr);
				  var msg = jqXHR.status + ' ' + jqXHR.statusText;
				  x3Notifier(msg, 2000, null, 'danger');
				  myAlert(msg, 'danger');
				}).always(function(){
					hide_preloader();
				});
			}
		}
	}

	// on tab show
	tools_htaccess_init = function(){
	  getHtaccess();
	};
})();

var tools_htaccess_template = "<h3>" + (conf_editor ? conf_editor : '') + " editor<i class='help-icon panel-help pull-right fa fa-question-circle' data-help='htaccess'></i></h3>";




/* x3_panel.tools.js */

var showTools;

/*(function() {
})();*/

//
(function() {

	// vars
	var auth_exclude = ['flamepix.com', 'imagevuex.com', 'localhost', '127.0.0.1', 'photo.gallery'],
			host = window.location.hostname,
			show_auth_tab = true;//($.inArray(host, auth_exclude) == -1 && host.indexOf('flamepix.com') == -1 && host.indexOf('photo.gallery') == -1);

	// conditional auth tab content
	var auth_tab = show_auth_tab ? '<li role=presentation id=tab-tools-auth class=active><a href=#tools-auth aria-controls=tools-auth role=tab data-toggle=tab>Authorize</a></li>' : '';

	// conditional config editor
	var config_editor = conf_editor ? '<li role=presentation id=tab-tools-htaccess><a href=#tools-htaccess aria-controls=tools-htaccess role=tab data-toggle=tab>' + conf_editor + '</a></li>' : '';

	// tabs template
	var template;
	function get_template(){
		if(template) return template;
		template = '\
		<div class="x3-panel-section x3-tools">\
			<div class="tabs-container">\
	    <ul class="nav nav-tabs" role="tablist">\
	    	' + auth_tab + config_editor + '\
	    	<li role=presentation id=tab-tools-phpinfo class=flamepix-hidden><a href=#tools-phpinfo aria-controls=tools-phpinfo role=tab data-toggle=tab>PHPinfo</a></li>\
		    <li role=presentation><a href=#tools-site aria-controls=tools-site role=tab data-toggle=tab>Preload</a></li>\
		    <li role=presentation><a href=#tools-reset aria-controls=tools-reset role=tab data-toggle=tab>Reset</a></li>\
		    <li role=presentation id=tab-tools-touch><a href=#tools-touch aria-controls=tools-touch role=tab data-toggle=tab>Cache</a></li>\
		    <li role=presentation id=tab-tools-previews><a href=#tools-previews aria-controls=tools-previews role=tab data-toggle=tab>Previews</a></li>\
		    <li role=presentation id=tab-tools-updates><a href=#tools-updates aria-controls=tools-upates role=tab data-toggle=tab>X3 Updates</a></li>\
	    </ul>\
	    </div>\
	    <div id=myTabContent class=tab-content>\
	      <div role=tabpanel class="tab-pane fade tools-mini active in" id=tools-auth>' + tools_auth_template + '</div>\
	      <div role=tabpanel class="tab-pane fade" id=tools-htaccess>' + tools_htaccess_template + '</div>\
	      <div role=tabpanel class="tab-pane fade flamepix-hidden" id=tools-phpinfo>' + tools_phpinfo_template + '</div>\
	      <div role=tabpanel class="tab-pane fade tools-mini" id=tools-site>' + tools_site_template + '</div>\
	      <div role=tabpanel class="tab-pane fade tools-mini" id=tools-reset>' + tools_reset_template + '</div>\
	      <div role=tabpanel class="tab-pane fade tools-mini" id=tools-touch style="text-align: left">' + tools_touch_template + '</div>\
	      <div role=tabpanel class="tab-pane fade" id=tools-previews>' + tools_previews_template + '</div>\
	      <div role=tabpanel class="tab-pane fade tools-mini" id=tools-updates>' + tools_updates_template + '</div>\
	    </div>\
	  </div>';
	  return template;
	}

	// show tools page
	showTools = function(){
		main_menu_active('#tools');
		x3_content_show.html(get_template());

		// vars
		var x3_tools = x3_content_show.children('.x3-tools'),
				tabs_container = x3_tools.children('.tabs-container'),
				tools_tabs = tabs_container.children('.nav-tabs');

		// init on first tabs show
		tools_tabs.find('a[href="#tools-previews"]').one('shown.bs.tab', function (e) {
			tools_previews_init();
		}).end().find('a[href="#tools-touch"]').one('shown.bs.tab', function (e) {
			tools_touch_init();
		}).end().find('a[href="#tools-reset"]').one('shown.bs.tab', function (e) {
			tools_reset_init();
		}).end().find('a[href="#tools-site"]').one('shown.bs.tab', function (e) {
			tools_preload_init();
		}).end().find('a[href="#tools-phpinfo"]').one('shown.bs.tab', function (e) {
			tools_phpinfo_init();
		}).end().find('a[href="#tools-htaccess"]').one('shown.bs.tab', function (e) {
			tools_htaccess_init();
		}).end().find('a[href="#tools-updates"]').one('shown.bs.tab', function (e) {
			tools_updates_init();
		});

		// render
		var tab = supports_local_storage() && localStorage.getItem('panel_tools_tab') !== null ? localStorage.getItem('panel_tools_tab') : 'tools-auth',
				current_tab = tools_tabs.find('a[href="#' + tab + '"]');
		if(current_tab.length) current_tab.tab('show');
    x3_content_show.velocity('fadeIn', { duration: 500 });

    // auth?
    if(tab === 'tools-auth') {
    	authPage();
    } else {
    	tools_tabs.find('a[href="#tools-auth"]').one('shown.bs.tab', function (e) {
				authPage();
			});
    }

    // Tab selector
		tools_tabs.on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
		  if(supports_local_storage()) localStorage.setItem('panel_tools_tab', String(e.target).split('#')[1]);
		});
	}

	// Assign click event for menu
	x3_navbar_nav.find('li#tools > a').on('click', function(e) {
		e.preventDefault();
		showTools();
	});

})();

// x3_panel.tools.htaccess

var tools_phpinfo_init;

(function() {

	// current phpinfo
	var current_phpinfo = false;

	// Get htaccess
	function getPhpInfo(){

		// already loaded!
		if(current_phpinfo) {
			x3_content_show.find('#myphpinfo').html(current_phpinfo);

		// reload
		} else {
			show_preloader();
			$.ajax({
			  url: "x3_tools.php",
			  method: 'POST',
			  dataType: "html",
			  cache: false,
			  data: {'phpinfo': true}
			}).done(function(data) {
				if(data.length < 1){
					var msg = 'phpinfo() seems to be empty :(';
					x3Notifier(msg, 2000, null, 'warning');
				} else {
					x3Notifier('phpinfo loaded!', 2000, null, 'success');
					current_phpinfo = data;
					x3_content_show.find('#myphpinfo').html(data);
				}
			}).fail(function(jqXHR, textStatus) {
			  x3_log('PHPinfo error:', jqxhr);
			  var msg = jqXHR.status + ' ' + jqXHR.statusText;
			  x3Notifier(msg, 2000, null, 'danger');
			  x3_content_show.find('#myphpinfo').html(msg);
			}).always(function(){
				hide_preloader();
			});
		}
	}

	// on tab show
	tools_phpinfo_init = function(){
	  getPhpInfo();
	};
})();

var tools_phpinfo_template = "<div id=myphpinfo></div>";


/* x3_panel.create_menu.js */

var createSiteObject, tools_preload_init;

(function() {

	// vars
	var btn_preload;

	// Save json
	createSiteObject = function(main_settings){
		if(current_settings.settings.diagnostics){
			x3Notifier('You cannot create site object while diagnostics are enabled.', 3000, null, 'warning');
		} else if(current_settings.settings.preload !== 'create'){
			x3Notifier('This feature requires you to have <strong>Preload Website: [create]</strong> in Settings > Advanced.', 3000, null, 'warning');
		} else {
			if(deny_guest()) return;

			// vars
			//var btn = main_settings ? x3_content_show.find('.btn-create-site-object') : x3_content_show.find('.btn-preload'),
			var btn = main_settings ? x3_content_show.find('.btn-create-site-object') : btn_preload,
					original_text = btn.text(),
					date1 = new Date();

			// button
			btn.attr('disabled', true).text('Creating site object ...');

			// ajax
			$.ajax({
			  method: 'POST',
			  url: 'x3_tools.php',
			  dataType: 'json',
			  data: {'site_object': true}
			}).done(function(data){
				if(data.success) {
					var date2 = new Date(),
							diff = Number(date2)-Number(date1),
							msg = "Site object created in " + ((diff)/1000).toFixed(2) + " seconds.";

					x3Notifier(msg, 2000, null, 'success');
				} else if(data.error !== undefined) {
					x3Notifier(data.error , 2000, null, 'danger');
				} else {
					x3Notifier("Error", 2000, null, 'danger');
				}
			}).fail(function(jqxhr, textStatus, error){
				x3_log('site object error: ', jqxhr);
	    	var msg = textStatus + ": " + error;
			  x3Notifier(msg, 2000, null, 'danger');
			}).always(function(){
		    btn.text(original_text).attr('disabled', false);
			});

		}
	}

	// on tab show
	tools_preload_init = function(){
		btn_preload = x3_content_show.find('.btn-preload');
	  btn_preload.on('click', function(){
	  	createSiteObject(false);
	  });
	};
})();

var tools_site_template = "<h3>Preload Site Object <i class='help-icon panel-help pull-right fa fa-question-circle' data-help='preload'></i></h3><p class=boxed>Click the button below to refresh the site object, required if you are using the <em>preload</em> option in settings. <strong><a href=# class=show-help data-hidden='.preload_help'>More Info [?]</a></strong></p><p><em>*Depending on the amount of folders and the speed of your server, this process could take up to 60 seconds or even fail.</em></p><button type=button class='btn btn-primary btn-process btn-preload' data-loading-text='Creating Site Object ...'>Create site object</button>";




// x3_panel.tools.previews

var tools_previews_init;

(function() {

	var current_previews_log = '',
			tools_previews,
			btn;

	// Get htaccess
	function previews(){
		if(deny_guest()) return;

		if(tools_previews.length) {
			tools_previews.children('.previews-log').remove();
			var original = btn.text();
			btn.attr('disabled', true).text('Updating ...');
			$.ajax({
			  method: 'POST',
			  url: 'x3_previews.php',
			  dataType: 'html'
			}).done(function(data){
				x3Notifier('Previews updated' , 2000, null, 'success');
				current_previews_log = '<div class=previews-log>' + data + '</div>';
				tools_previews.append(current_previews_log);
			}).fail(function(jqxhr, textStatus, error){
				x3_log('previews error:', jqxhr);
	    	var msg = textStatus + ": " + error;
			  x3Notifier(msg, 2000, null, 'danger');
			}).always(function(){
				setTimeout(function(){
					btn.attr('disabled', false).text(original);
				}, 1000);
			});
		}

	}

	// on tab show
	tools_previews_init = function(){

		// vars
		tools_previews = x3_content_show.find('#tools-previews');
		btn = tools_previews.find('.btn-previews');

		// conditions
	  if(current_previews_log && tools_previews.find('table').length < 1) tools_previews.append(current_previews_log);
	  if(x3_navbar_nav.find('li#refresh').is(':visible') && tools_previews.find('.remember').length < 1) tools_previews.find('.boxed').append('<em class="remember"><br><br>* Remember to refresh menu after update, if there are changes.<em>');

	  // click
	  btn.on('click', previews);
	};
})();

var tools_previews_template = "<h3>Update Preview Images<i class='help-icon panel-help pull-right fa fa-question-circle' data-help='previews'></i></h3><p class=boxed>This tool will try to automatically set preview images for your pages, unless they are already set correctly.</p><button type=button class='btn btn-primary btn-process btn-previews' data-setting-text='Updating ...'>Update Preview Images</button>";


/* x3_panel.create_menu.js */

var tools_reset_init;

(function() {

	// global vars
	var btn;

	// Save json
	function resetSettings(){
		if(deny_guest()) return;
		btn.button('loading');
		$.ajax({
		  method: 'POST',
		  url: 'x3_tools.php',
		  dataType: 'json',
		  data: {'reset_settings': true}
		}).done(function(data){
			if(data.success == 'already') {
				x3Notifier('Settings are already deleted', 2000, null, 'primary');
			} else if(data.success) {
				x3Notifier("Settings Successfully Reset. Logging out ..." , 2000, null, 'success');
				setTimeout(function(){
					location.replace('logout.php');
				}, 2000);
			} else if(data.error !== undefined) {
				x3Notifier(data.error, 2000, null, 'danger');
			} else {
				x3Notifier("Error", 2000, null, 'danger');
			}
		}).fail(function(jqxhr, textStatus, error){
			x3_log('reset error:', jqxhr);
    	var msg = textStatus + ": " + error;
		  x3Notifier(msg, 2000, null, 'danger');
		}).always(function(){
			setTimeout(function(){
				btn.button('reset');
			}, 1000);
		});
	}

	// on tab show
	tools_reset_init = function(){

		// vars
		btn = x3_content_show.find('.btn-reset');

	  // click
	  btn.on('click', resetSettings);
	};
})();

var tools_reset_template = "<h3>Reset Settings<i class='help-icon panel-help pull-right fa fa-question-circle' data-help='reset'></i></h3><p class=boxed>Click below button to reset settings to default. The reset includes username and password, so you will automatically be logged out after reset.</p><p><em>*Reset will not affect your individual page settings.</em></p><button type=button class='btn btn-primary btn-process btn-reset' data-loading-text='Resetting settings to default ...'>Reset Settings</button>";




// x3_panel.tools.touch

// image resize cache garbage collector, called from tools > cache, and also after menu load.
function garbage_collector(params, btn){

	// script
	var script = 'x3.resizer.garbagecollector.php';

	// btn
	if(btn) btn.attr('disabled', true).attr('data-original', btn.text()).text(params.delete ? 'Deleting ...' : 'Cleaning ...');

	// post
	$.post(script, params).done(function(data) {

		// some json output error
		if(!data.msg) return x3Notifier('Error in ' + script + '.', 2000, null, 'danger');

		// success
		if(data.success){
			if(!btn && data.deleted_files < 1) return;
			var msg = (params.simulate ? '[Simulate]<br>' : '') + data.deleted_files + ' cache items ' + (params.simulate ? 'will be ' : '') + 'deleted.<br><br>[Remaining cache]<br>' + data.total_files + ' files / ' + data.total_size + ' MB';
			x3Notifier(msg, 3000, null, 'success');

		// not logged in or guest
		} else if(btn){
			x3Notifier(data.msg, 2000, null, 'danger');
		}

	// some output error, not JSON
  }).fail(function(data){
    x3Notifier('Error in ' + script + '.', 2000, null, 'danger');
  }).always(setTimeout(function(){
  	if(btn) btn.attr('disabled', false).text(btn.attr('data-original'));
  }, 1000));
}

// auto garbage collector, collects image resize cache garbage after menu load
function auto_garbage_collector(){
	garbage_collector({ check_time: true }, false);
}

// global
var tools_touch_init;

//
(function() {

	// global vars
	var btn_page_cache;

	// Get htaccess
	function touch(){
		if(deny_guest()) return;

		// vars
		var original_text = btn_page_cache.text();

		// button
		btn_page_cache.attr('disabled', true).text('Deleting ...');

		// post
		$.ajax({
		  method: 'POST',
		  url: 'x3_tools.php',
		  dataType: 'json',
		  data: {'touch': true}
		}).done(function(data){
			if(data.success) {
				x3Notifier(data.success , 2000, null, 'success');
			} else if(data.warning !== undefined) {
				x3Notifier(data.warning, 2000, null, 'warning');
			} else if(data.error !== undefined) {
				x3Notifier(data.error, 2000, null, 'danger');
			} else {
				x3Notifier("Error", 2000, null, 'danger');
			}
		}).fail(function(jqxhr, textStatus, error){
			x3_log('touch error:', jqxhr);
    	var msg = textStatus + ": " + error;
		  x3Notifier(msg, 2000, null, 'danger');
		}).always(function(){
			setTimeout(function(){
				btn_page_cache.text(original_text).attr('disabled', false);
			}, 1000);
		});
	}

	// on tab show
	tools_touch_init = function(){

		// vars
		btn_page_cache = x3_content_show.find('.btn-page-cache');
		btn_page_cache.on('click', touch);

	  // image resize cache
	  var clean_container = $('#clean-container'),
	  		delete_container = $('#delete-container'),
	  		radios = x3_content_show.find('[name="garbage"]'),
	  		btn_image_cache = x3_content_show.find('.btn-image-cache');
	  radios.on('click', function(event) {
	  	var del = radios[1].checked;
	  	btn_image_cache.text(del ? 'Delete' : 'Clean');
	  	clean_container.css('display', del ? 'none' : 'block');
	  	delete_container.css('display', del ? 'block' : 'none');
	  });
	  btn_image_cache.on('click', function(){
	  	var params = radios[1].checked ? {
	  		delete: true,
	  		pattern: $('#pattern').val() || '',
	  		simulate: $('#simulate').prop('checked') || ''
	  	} : {};
	  	if(params.delete && !params.simulate && !confirm('Are you sure you want to delete all cache' + (params.pattern ? ' matching "' + params.pattern + '"' : '') + '?')) return;
	  	garbage_collector(params, btn_image_cache);
	  });
	}
})();

var tools_touch_template = '<h4>Image cache</h4><div class="form-group"><label class="radio-inline"><input type="radio" name="garbage" id="garbage-clean" value="clean" checked> Clean</label><label class="radio-inline"><input type="radio" name="garbage" id="garbage-delete" value="delete"> Delete</label></div><p id="clean-container">Cleans the image resize cache so that only valid items remain <a href="#" data-help="clean_image_cache" class="panel-help">[help]</a></p><div class="form-group" id="delete-container" style="display: none;"><p><strong style="color: tomato">Use with caution!</strong><br>Delete all image resize cache items <a href="#" data-help="delete_image_cache" class="panel-help">[help]</a></p><div class="form-group"><label style="font-weight: normal" for="pattern">Path match <small style="color:#999">* optional</small></label><input type="text" class="form-control" id="pattern" placeholder="path"></div><div class="checkbox"><label><input type="checkbox" id="simulate"> Simulate</label></div></div><button type="button" class="btn btn-primary btn-process btn-image-cache">Clean</button>\
<hr style="margin: 3rem 0">\
<h4>Page Cache</h4><p>Clear X3 page cache, so that new pages are created <a href="#" data-help="delete_page_cache" class="panel-help">[help]</a></p><button type="button" class="btn btn-primary btn-process btn-page-cache">Delete</button>';










// x3_panel.tools.updates.js

var tools_updates_init;

(function () {

	// vars
	var host = 'https://www.photo.gallery',
			api = host + '/d/',
			downloads = host + '/download/',
			tools_updates,
			x3_updates;

	/*
	TODO
	- loading
	- compare current version
	*/

	// check immediately
	function load_updates(){
		show_preloader();

		// success
		$.post(api, { latest: true, json: true }).done(function(data) {
			x3_log('load updates:', data);

			if(!data || !data.status) {
				x3Notifier('Failed to load X3 updates', 2000, null, 'danger');
			} else {
				x3Notifier('X3 updates loaded', 2000, null, 'success');
				show_results(data);
			}

		// fail
		}).fail(function(data){
			x3Notifier('Failed to load X3 updates', 2000, null, 'danger');

			// adblock test
			x3_updates.append('<div id="ad-container" style="position:absolute;"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAUEBAAAACwAAAAAAQABAAACAkQBADs=" id="ad"></div>');
			var ad_container = x3_updates.children('#ad-container');
			if(!ad_container.is(":visible")) {
				x3_updates.append('<div class="alert alert-danger" role="alert">You seem to have an <strong>Adblock</strong> extension which is preventing X3 from loading remote data. Please disable adblock for this page.</div>');
			}
			ad_container.remove();

		// always
		}).always(function(data){
			hide_preloader();
		});
	}

	function is_newer_version(new_version, old_version){
		if(!new_version || !old_version) return false;
		var new_version_array = new_version.split('.').map(function(x) {
		   return parseInt(x);
		});
		var old_version_array = old_version.split('.').map(function(x) {
		   return parseInt(x);
		});
		if(new_version_array[0] > old_version_array[0]){
			return true;
		} else if(new_version_array[0] === old_version_array[0]){
			if(new_version_array[1] > old_version_array[1]){
				return true;
			} else if(new_version_array[1] === old_version_array[1]){
				if(new_version_array[2] > old_version_array[2]) return true;
				return false;
			}
			return false;
		}
		return false;
	}

	// show results
	function show_results(data){

		// vars
		var force_update = location.search.indexOf('force_update') > -1 ? true : false;

		// start
		//var new_x3_version = data && data.indexOf('.update.flat.') > -1 ? data.split('.update.flat.')[0] : false;
		var new_x3_version = data.version ? 'X' + data.version : false,
				new_text = data.text ? data.text : '<strong>X3 Updater</strong> <span class="label label-warning">Beta</span><br>We recommend using the X3 updater to automatically install latest version of X3.';

		var alert_start = '<div style="margin-bottom:0;" class="alert alert-danger" role="alert">';

		//if(!force_update && (!new_x3_version || new_x3_version === ('X' + x3_version))){
		if(!force_update && !is_newer_version(data.version, x3_version)){
			x3_updates.append('<div class="alert alert-success">You are already using latest release <strong>X' + x3_version + '</strong>!</div>');
		} else {
			var x3_updater_text = '<br><br>';
			if(!has_ziparchive){
				x3_updater_text += alert_start + 'You server is missing PHP <a href=http://php.net/manual/en/class.ziparchive.php target="_blank">ZipArchive</a> class.</div>';
			} else if(!root_writeable){
				x3_updater_text += alert_start + 'You will need to enable <strong>write permissions</strong> on your root X3 directory before you can proceed with the X3 updater.</div>';
			} else if(!has_curl){
				x3_updater_text += alert_start + 'You server is missing PHP <a href=http://php.net/manual/en/book.curl.php target="_blank">cURL</a>, required to download update from remote server.</div>';
			} else {
				x3_updater_text += x3_license || location.search.indexOf('ignore_license') > -1 ? '<button class="btn btn-primary btn-updater">Update to ' + new_x3_version + ' now!</button>' : '<div class="alert alert-danger text-center" role="alert" style="font-size: inherit; margin-bottom: 0;">A valid X3 license is required to update X3.<br><a href="https://www.photo.gallery/buy/" target="_blank" class="btn btn-danger" style="margin-top: .7em;">Purchase X3 License</a></div>';
			}
			x3_updates.append('<div class="panel panel-primary text-left"><div class="panel-heading">New version <strong>' + new_x3_version + '</strong> available!</div><div class="panel-body">' + new_text + x3_updater_text + '</div></div><div class="panel panel-default text-left"><div class="panel-heading">Manually update to <strong>' + new_x3_version + '</strong></div><div class="panel-body">If you for technical reasons can\'t use the X3 updater above, you can update X3 manually:<br><br>1. <a href="' + downloads + 'X3.latest.update.zip">Download</a> latest X3 update.<br>2. Unzip the downloaded ZIP file.<br>3. Upload update files into your X3 directory by FTP.<br>4. After update, go to your <a href="../?diagnostics">diagnostics</a> page.</div></div>');

			// return if !x3_license
			if(!x3_license) return;

			// update button
			var update_button = x3_updates.find('.btn-updater');
			if(update_button.length){
				update_button.on('click', function(e) {
					if(deny_guest()) return;
					update_button.addClass('disabled').text('Loading updater ...');
					show_preloader();
					$.post('x3_tools.php', { copy_updater: true }).done(function(data) {

						// success
						if(data.success) {
							x3Notifier('Updater loaded!', 2000, null, 'success');
							update_button.text('Redirecting ...');
							window.location.href = '../x3_updater.php';

						// failed to download x3_installer.php
						} else {
							var fail_msg = data.msg ? data.msg : 'Failed to download X3 updater.';
							x3Notifier(fail_msg, 2000, null, 'danger');
							update_button.after(alert_start + fail_msg + '</div>');
							update_button.remove();
						}

					// PHP fail
					}).fail(function(data){
						x3Notifier('Failed to start updater', 2000, null, 'danger');

					// always
					}).always(function(data){
						hide_preloader();
					});
				});
			}
		}
	}

	// on tab show
	tools_updates_init = function(){
		tools_updates = x3_content_show.find('#tools-updates');
		x3_updates = tools_updates.children('.x3-updates');
	  load_updates();
	};
})();

var tools_updates_template = "\
<div class=x3-updates>\
	<h3>X3 Updates</h3>\
</div>";

// X3 uploader wrapper

var thumbsize = window.devicePixelRatio > 1 ? '200' : '100';
var x3Uploader;

(function() {

	// Local vars
	var pixelratio = window.devicePixelRatio > 1 ? 2 : 1,
			resize_supported = !/Android(?!.*Chrome)|Opera/.test(window.navigator && navigator.userAgent),
			uploader,
			resize_options,
			resize_toggle,
			resize_inputs,
			queued,
			file_upload;

	// Toggle queued amount
  function hasQueue(iteration){
  	queued += iteration;
  	if(queued > 0 && !uploader.hasClass('hasqueue')) {
  		uploader.addClass('hasqueue');//.find('.fileinput-button').removeClass('btn-lg');
  	} else if(queued < 1 && uploader.hasClass('hasqueue')){
  		uploader.removeClass('hasqueue');//.find('.fileinput-button').addClass('btn-lg');
  	}
  	uploader.find('.queue-text').text(queued+' files in upload queue.');
  }

  // Update uploader resize options
  function updateOptions(){
  	var ob = {
  		disableImageResize: (!resize_toggle.is(":checked") || !resize_supported),
      imageMaxWidth: Number(resize_inputs.find('#resize-width').val()),
    	imageMaxHeight: Number(resize_inputs.find('#resize-height').val()),
    	imageQuality: Number(resize_inputs.find('#resize-quality').val())/100,
    	disableImageMetaDataSave: !!(document.getElementById('resize-meta').checked)
  	}
  	x3UpdateSettings(ob);
  	file_upload.fileupload('option', ob);
  }

  // X3 uploader
	x3Uploader = function(defaults){

		// Define vars
		uploader = x3_content_show.children('.modal#uploader');
		file_upload = uploader.find('#fileupload');
		resize_options = uploader.find('.resize-options');
		resize_toggle = resize_options.find('.resize-toggle input');
		resize_inputs = resize_options.find('.resize-inputs');
	  queued = 0;

	  // Resize option defaults from config.php or 
	  var resize_defaults = {
	  	disableImageResize: (Boolean(x3_settings.disableImageResize) || !Boolean(defaults.img_resize) || !resize_supported),
	    imageMaxWidth: Number(x3_settings.imageMaxWidth || defaults.img_resize_width),
	   	imageMaxHeight: Number(x3_settings.imageMaxHeight || defaults.img_resize_height),
	    imageQuality: Number(x3_settings.imageQuality || Number(defaults.img_resize_quality)/100),
	    disableImageMetaDataSave: defaults.disableImageMetaDataSave ? (x3_settings.hasOwnProperty('disableImageMetaDataSave') ? x3_settings.disableImageMetaDataSave : true) : false
	  }

	  // Copy resize defaults to form
	  resize_toggle.prop('checked', !resize_defaults.disableImageResize).parent('label').toggleClass('active', !resize_defaults.disableImageResize);
	  resize_inputs.toggle(!resize_defaults.disableImageResize);
	  resize_inputs.find('#resize-width').val(resize_defaults.imageMaxWidth);
	  resize_inputs.find('#resize-height').val(resize_defaults.imageMaxHeight);
	  resize_inputs.find('#resize-quality').val(resize_defaults.imageQuality*100);
	  if(resize_defaults.disableImageMetaDataSave) document.getElementById('resize-meta').checked = true;

	  // Reset classes on initilization
	  uploader.removeClass('hasqueue isuploaded');

	  // Update options on options change
	  resize_inputs.on('change', 'input', function(e) {
	  	updateOptions();
	  });

	  // Resize toggle
	  resize_toggle.change(function() {
	  	setTimeout(function(){
	  		var c = resize_toggle.is(":checked");
	  		resize_inputs.toggle(c);
	    	updateOptions();
	  	}, 10);
	  });

	  // Force max amount and numbers-only for resize fields
	  uploader.find('.resize-options input[type="number"]').on('input', function(event) {
	  	var max = Number($(this).attr('maxlength'));
	  	if(this.value.length > max) this.value = this.value.slice(0,max);
	  }).on('blur', function(event) {
	  	if(this.value.length == 0) {
	  		this.value = $(this).attr('placeholder');
	  	} else if(Number(this.value) < parseInt($(this).attr('min'))){
	  		this.value = $(this).attr('min');
	  	} else if(Number(this.value) > parseInt($(this).attr('max'))){
	  		this.value = $(this).attr('max');
	  	}
	  	this.value = Number(this.value);
	  }).numericInput();

	  // View uploaded files
	  uploader.find('button.view').click(function(event) {
	  	uploader.find('.modal-footer > button').last().click();
	  });

	  // deny guest
	  if(is_guest) file_upload.find('button.start').on('click', function(e) {
	  	if(deny_guest('Guest user cannot upload.')) {
	  		e.preventDefault();
	  		e.stopImmediatePropagation();
	  	}
	  });

	  // Initialize the jQuery File Upload widget:
	  file_upload.fileupload({
	      // Uncomment the following to send cross-domain cookies:
	      //xhrFields: {withCredentials: true},
	      dropZone: file_upload.find('#dropzone'),
	      url: defaults.path,
	      //maxFileSize: 10000000,
	      disableImageResize: resize_defaults.disableImageResize,
	      imageMaxWidth: resize_defaults.imageMaxWidth,
	      imageMaxHeight: resize_defaults.imageMaxHeight,
	      imageQuality: resize_defaults.imageQuality,
	      loadImageMaxFileSize: 40000000,
	      disableVideoPreview: true,
	      previewMaxWidth: 100*pixelratio,
	      previewMaxHeight: 50*pixelratio,
	      previewMinWidth: 100*pixelratio,
	      previewMinHeight: 50*pixelratio,
	      previewOrientation: true,//defaults.orientation,
	      imageOrientation: true,//1,//false,//defaults.orientation,//x3_settings.back.panel.upload_resize.orientation
	      //disableExif: true,
	      //imageForceResize: true,
	      acceptFileTypes: defaults.acceptFileTypes,
	  		disableImageMetaDataSave: resize_defaults.disableImageMetaDataSave //
	  }).bind('fileuploadadded', function (e, data) {
	  	var template_download = uploader.find('tr.template-download');
	  	if(uploader.hasClass('isuploaded') && template_download.length) template_download.remove();
	  	if(data.files.error !== true) hasQueue(1);
	  }).bind('fileuploadfailed', function (e, data) {
	  	if(data.files.error !== true) hasQueue(-1);
	  }).bind('fileuploadstart', function (e, data) {
	  	uploader.addClass('isuploading');
	  }).bind('fileuploadstop', function (e) {
	  	uploader.removeClass('isuploading').addClass('isuploaded');
	  	queued = 0;
	  	hasQueue(0);
	  });
	}
})();


