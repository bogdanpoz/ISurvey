@extends('layouts.company')

@section('content')
<style>
    .ms-options-wrap,
.ms-options-wrap * {
    box-sizing: border-box;
}

.ms-options-wrap > button:focus,
.ms-options-wrap > button {
    position: relative;
    width: 100%;
    text-align: left;
    border: 1px solid #aaa;
    background-color: #fff;
    padding: 5px 20px 5px 5px;
    margin-top: 1px;
    font-size: 13px;
    color: #aaa;
    outline: none;
    white-space: nowrap;
}

.ms-options-wrap > button:after {
    content: ' ';
    height: 0;
    position: absolute;
    top: 50%;
    right: 5px;
    width: 0;
    border: 6px solid rgba(0, 0, 0, 0);
    border-top-color: #999;
    margin-top: -3px;
}

.ms-options-wrap > .ms-options {
    position: absolute;
    left: 0;
    width: 100%;
    margin-top: 1px;
    margin-bottom: 20px;
    background: white;
    z-index: 2000;
    border: 1px solid #aaa;
	text-align:left;
}

.ms-options-wrap > .ms-options > .ms-search input {
    width: 100%;
    padding: 4px 5px;
    border: none;
    border-bottom: 1px groove;
    outline: none;
}

.ms-options-wrap > .ms-options .ms-selectall {
    display: inline-block;
    font-size: .9em;
    text-transform: lowercase;
    text-decoration: none;
}
.ms-options-wrap > .ms-options .ms-selectall:hover {
    text-decoration: underline;
}

.ms-options-wrap > .ms-options > .ms-selectall.global {
    margin: 4px 5px;
}

.ms-options-wrap > .ms-options > ul > li.optgroup {
    padding: 5px;
}
.ms-options-wrap > .ms-options > ul > li.optgroup + li.optgroup {
    border-top: 1px solid #aaa;
}

.ms-options-wrap > .ms-options > ul > li.optgroup .label {
    display: block;
    padding: 5px 0 0 0;
    font-weight: bold;
}

.ms-options-wrap > .ms-options > ul label {
    position: relative;
    display: inline-block;
    width: 100%;
    padding: 8px 4px;
    margin: 1px 0;
}

.ms-options-wrap > .ms-options > ul li.selected label,
.ms-options-wrap > .ms-options > ul label:hover {
    background-color: #efefef;
}

.ms-options-wrap > .ms-options > ul input[type="checkbox"] {
    margin-right: 5px;
    position: absolute;
    left: 4px;
    top: 7px;
}
</style>
<div class="content-header">
	<div class="container">
		<div class="row mt-3">
			<div class="col-lg-12">
				<h4 class="mb-3">{{ $survey->title }}</h4>
				<div class="card template">
					<div class="tab-nav">
						@include('company.survey.tab', ['activeTab' => 'share', 'survey' => $survey])
						<div class="tab-content mt-3" id="myTabContent">
							<div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
								<div class="card shadow-none">
                                    <div class="card-body" x-data="{
                                            src : '{{ $survey->url() }}',
                                            embedUrl: '{{ $survey->embedUrl() }}',
                                            width: 640,
                                            height: 640}"
                                            >
                                    <form action="{{ route('company.surveys.share.store', $survey)}}" method="POST">
                                                @csrf
                                            @error('survey_url')
                                                <p style="color:red; padding-left: 25.5%; margin-top: -2%">please input country</p>
                                            @enderror
                                        <div class="form-group row" >
                        
                                            <label class="col-sm-3 text-sm-right col-form-label">{{ __('Country') }}</label>
                                            <div class="col-sm-3">
                                                <select name="countryCode[]" class="form-control"  id="country_code" multiple>
                                                    @include('company.survey.countries')
                                                </select>
                                                <input type="checkbox" class="col-sm-1" id="select_all" value="">
                                                <label class="col-sm-5 text-sm-right col-form-label" style="text-align: left !important;font-weight: 400;">{{ __('Select All') }}</label>
                                                
                                            </div>
                                        </div>

                                        <div class="form-group row mt-2" >
                                            <label class="col-sm-3 text-sm-right col-form-label">{{ __('Business Unit') }}</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="business_unit" placeholder="Type Business Unit"/>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-4">
                                            <label class="col-sm-3 text-sm-right col-form-label"></label>
                                            <div class="col-sm-6">
                                                <button id="g_links" class="btn btn-primary">Generate Links</button>
                                            </div>
                                        </div>
                                       

                                        @foreach ($survey->urls as $url)                    
                                        <div> 
                                            <div class="form-group row">
                                                <label class="col-sm-3 text-sm-right col-form-label" id="survey-label">{{ __('Survey URL') }} {{$loop->iteration}}</label>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="background_color" id="survey-url" value={{$url->survey_url}}/>
                                                        <span class="input-group-append">
                                                            <span class="input-group-text btn-clipboard" data-clipboard-target="#survey-url">{{ __('Copy') }}</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach   
                                        <div id="urls">
                                            <div class="form-group row">
                                                <label class="col-sm-3 text-sm-right col-form-label">{{ __('Survey URL') }}</label>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="background_color" id="survey-url" x-model="src" />
                                                        <span class="input-group-append">
                                                            <span class="input-group-text btn-clipboard" data-clipboard-target="#survey-url">{{ __('Copy') }}</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                 
                                        <div class="form-group row" >
                                            <label class="col-sm-3 text-sm-right col-form-label">{{ __('Embed Survey') }}</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="background_color" id="embed-survey" x-bind:value="`<iframe src='${embedUrl}' width='${width}' height='${height}' frameborder='0' marginwidth='0' marginheight='0'>Loading</iframe>`" />
                                                    <span class="input-group-append">
                                                        <span class="input-group-text btn-clipboard" data-clipboard-target="#embed-survey">{{ __('Copy') }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row" >
                                            <label class="col-sm-3 text-sm-right col-form-label">{{ __('Embed Width') }}</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="background_color" x-model="width" />
                                            </div>
                                        </div>

                                        <div class="form-group row mt-2" >
                                            <label class="col-sm-3 text-sm-right col-form-label">{{ __('Embed Height') }}</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" name="background_color" x-model="height" />
                                            </div>
                                        </div>


                                        @if (settings()->get('sharethis_status'))
                                            <div class="form-group row mt-4">
                                                <label class="col-sm-3 text-sm-right col-form-label">{{ __('Share') }}</label>
                                                <div class="col-sm-6">
                                                    <div class="sharethis-inline-share-buttons"></div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="form-group row mt-4">
                                            <label class="col-sm-3 text-sm-right col-form-label"></label>
                                            <div class="col-sm-6">
                                                <a href="{{ $survey->url() }}" target="_blank" class="btn btn-primary">{{ __('Preview Survey') }}</a>
                                            </div>
                                        </div>
                                     
                                    </form>
								    </div>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    /**
 * Display a nice easy to use multiselect list
 * @Version: 2.0
 * @Author: Patrick Springstubbe
 * @Contact: @JediNobleclem
 * @Website: springstubbe.us
 * @Source: https://github.com/nobleclem/jQuery-MultiSelect
 * @Notes: If select list is hidden on page load use the jquery.actual plugin
 *         to resolve issues with preselected items placeholder text
 *         https://github.com/dreamerslab/jquery.actual
 *
 * Usage:
 *     $('select[multiple]').multiselect();
 *     $('select[multiple]').multiselect({ placeholder: 'Select options' });
 *     $('select[multiple]').multiselect('reload');
 *     $('select[multiple]').multiselect( 'loadOption', [{
 *         name   : 'Option Name 1',
 *         value  : 'option-value-1',
 *         checked: false
 *     },{
 *         name   : 'Option Name 2',
 *         value  : 'option-value-2',
 *         checked: false
 *     }]);
 *
 **/
(function($){
    var defaults = {
        placeholder   : 'Select options', // text to use in dummy input
        columns       : 1,                // how many columns should be use to show options
        search        : false,            // include option search box
        // search filter options
        searchOptions : {
            'default'    : 'Search',             // search input placeholder text
            showOptGroups: false,                // show option group titles if no options remaining
            onSearch     : function( element ){} // fires on keyup before search on options happens
        },
        selectAll     : false, // add select all option
        selectGroup   : false, // select entire optgroup
        minHeight     : 200,   // minimum height of option overlay
        maxHeight     : null,  // maximum height of option overlay
        showCheckbox  : true,  // display the checkbox to the user
        jqActualOpts  : {},    // options for jquery.actual

        // Callbacks
        onLoad        : function( element ) {  // fires at end of list initialization
            $(element).hide();
        },
        onOptionClick : function( element, option ){}, // fires when an option is clicked

        // @NOTE: these are for future development
        maxWidth      : null,  // maximum width of option overlay (or selector)
        minSelect     : false, // minimum number of items that can be selected
        maxSelect     : false, // maximum number of items that can be selected
    };

    var msCounter = 1;

    function MultiSelect( element, options )
    {
        this.element = element;
        this.options = $.extend( {}, defaults, options );
        this.load();
    }

    MultiSelect.prototype = {
        /* LOAD CUSTOM MULTISELECT DOM/ACTIONS */
        load: function() {
            var instance = this;

            // make sure this is a select list and not loaded
            if( (instance.element.nodeName != 'SELECT') || $(instance.element).hasClass('jqmsLoaded') ) {
                return true;
            }

            // sanity check so we don't double load on a select element
            $(instance.element).addClass('jqmsLoaded');

            // add option container
            $(instance.element).after('<div class="ms-options-wrap"><button>None Selected</button><div class="ms-options"><ul></ul></div></div>');
            var placeholder = $(instance.element).next('.ms-options-wrap').find('> button:first-child');
            var optionsWrap = $(instance.element).next('.ms-options-wrap').find('> .ms-options');
            var optionsList = optionsWrap.find('> ul');
            var hasOptGroup = $(instance.element).find('optgroup').length ? true : false;

            var maxWidth = null;
            if( typeof instance.options.width == 'number' ) {
                optionsWrap.parent().css( 'position', 'relative' );
                maxWidth = instance.options.width;
            }
            else if( typeof instance.options.width == 'string' ) {
                $( instance.options.width ).css( 'position', 'relative' );
                maxWidth = '100%';
            }
            else {
                optionsWrap.parent().css( 'position', 'relative' );
            }

            var maxHeight = ($(window).height() - optionsWrap.offset().top - 20);
            if( instance.options.maxHeight ) {
                maxHeight = ($(window).height() - optionsWrap.offset().top - 20);
                maxHeight = maxHeight < instance.options.minHeight ? instance.options.minHeight : maxheight;
            }

            maxHeight = maxHeight < instance.options.minHeight ? instance.options.minHeight : maxHeight;

            optionsWrap.css({
                maxWidth : maxWidth,
                minHeight: instance.options.minHeight,
                maxHeight: maxHeight,
                overflow : 'auto'
            }).hide();

            // isolate options scroll
            // @source: https://github.com/nobleclem/jQuery-IsolatedScroll
            optionsWrap.bind( 'touchmove mousewheel DOMMouseScroll', function ( e ) {
                if( ($(this).outerHeight() < $(this)[0].scrollHeight) ) {
                    var e0 = e.originalEvent,
                        delta = e0.wheelDelta || -e0.detail;

                    if( ($(this).outerHeight() + $(this)[0].scrollTop) > $(this)[0].scrollHeight ) {
                        e.preventDefault();
                        this.scrollTop += ( delta < 0 ? 1 : -1 );
                    }
                }
            });

            // hide options menus if click happens off of the list placeholder button
            $(document).off('click.ms-hideopts').on('click.ms-hideopts', function( event ){
                if( !$(event.target).closest('.ms-options-wrap').length ) {
                    $('.ms-options-wrap > .ms-options:visible').hide();
                }
            });

            // disable button action
            placeholder.bind('mousedown',function( event ){
                // ignore if its not a left click
                if( event.which != 1 ) {
                    return true;
                }

                // hide other menus before showing this one
                $('.ms-options-wrap > .ms-options:visible').each(function(){
                    if( $(this).parent().prev()[0] != optionsWrap.parent().prev()[0] ) {
                        $(this).hide();
                    }
                });

                // show/hide options
                optionsWrap.toggle();

                // recalculate height
                if( optionsWrap.is(':visible') ) {
                    optionsWrap.css( 'maxHeight', '' );

                    var maxHeight = ($(window).height() - optionsWrap.offset().top - 20);
                    if( instance.options.maxHeight ) {
                        maxHeight = ($(window).height() - optionsWrap.offset().top - 20);
                        maxHeight = maxHeight < instance.options.minHeight ? instance.options.minHeight : maxheight;
                    }
                    maxHeight = maxHeight < instance.options.minHeight ? instance.options.minHeight : maxHeight;

                    optionsWrap.css( 'maxHeight', maxHeight );
                }
            }).click(function( event ){ event.preventDefault(); });

            // add placeholder copy
            if( instance.options.placeholder ) {
                placeholder.text( instance.options.placeholder );
            }

            // add search box
            if( instance.options.search ) {
                optionsList.before('<div class="ms-search"><input type="text" value="" placeholder="'+ instance.options.searchOptions['default'] +'" /></div>');

                var search = optionsWrap.find('.ms-search input');
                search.on('keyup', function(){
                    // ignore keystrokes that don't make a difference
                    if( $(this).data('lastsearch') == $(this).val() ) {
                        return true;
                    }

                    $(this).data('lastsearch', $(this).val() );

                    // USER CALLBACK
                    if( typeof instance.options.searchOptions.onSearch == 'function' ) {
                        instance.options.searchOptions.onSearch( instance.element );
                    }

                    // search non optgroup li's
                    optionsList.find('li:not(.optgroup)').each(function(){
                        var optText = $(this).text();

                        // show option if string exists
                        if( optText.toLowerCase().indexOf( search.val().toLowerCase() ) > -1 ) {
                            $(this).show();
                        }
                        // don't hide selected items
                        else if( !$(this).hasClass('selected') ) {
                            $(this).hide();
                        }

                        // hide / show optgroups depending on if options within it are visible
                        if( !instance.options.searchOptions.showOptGroups && $(this).closest('li.optgroup') ) {
                            $(this).closest('li.optgroup').show();

                            if( $(this).closest('li.optgroup').find('li:visible').length ) {
                                $(this).closest('li.optgroup').show();
                            }
                            else {
                                $(this).closest('li.optgroup').hide();
                            }
                        }
                    });
                });
            }

            // add global select all options
            if( instance.options.selectAll ) {
                optionsList.before('<a href="#" class="ms-selectall global">Select all</a>');
            }

            // handle select all option
            optionsWrap.on('click', '.ms-selectall', function( event ){
                event.preventDefault();

                if( $(this).hasClass('global') ) {
                    // check if any selected if so then select them
                    if( optionsList.find('li:not(.optgroup)').filter(':not(.selected)').length ) {
                        optionsList.find('li:not(.optgroup)').filter(':not(.selected)').find('input[type="checkbox"]').trigger('click');
                    }
                    // deselect everything
                    else {
                        optionsList.find('li:not(.optgroup).selected input[type="checkbox"]').trigger('click');
                    }
                }
                else if( $(this).closest('li').hasClass('optgroup') ) {
                    var optgroup = $(this).closest('li.optgroup');

                    // check if any selected if so then select them
                    if( optgroup.find('li:not(.selected)').length ) {
                        optgroup.find('li:not(.selected) input[type="checkbox"]').trigger('click');
                    }
                    // deselect everything
                    else {
                        optgroup.find('li.selected input[type="checkbox"]').trigger('click');
                    }
                }
            });

            // add options to wrapper
            var options = [];
            $(instance.element).children().each(function(){
                if( this.nodeName == 'OPTGROUP' ) {
                    var groupOptions = [];

                    $(this).children('option').each(function(){
                        groupOptions[ $(this).val() ] = {
                            name   : $(this).text(),
                            value  : $(this).val(),
                            checked: $(this).prop( 'selected' )
                        };
                    });

                    options.push({
                        label  : $(this).attr('label'),
                        options: groupOptions
                    });
                }
                else if( this.nodeName == 'OPTION' ) {
                    options.push({
                        name   : $(this).text(),
                        value  : $(this).val(),
                        checked: $(this).prop( 'selected' )
                    });
                }
                else {
                    // bad option
                    return true;
                }
            });
            instance.loadOptions( options );

            // COLUMNIZE
            if( hasOptGroup ) {
                // float non grouped options
                optionsList.find('> li:not(.optgroup)').css({
                    float: 'left',
                    width: (100 / instance.options.columns) +'%'
                });

                // add CSS3 column styles
                optionsList.find('li.optgroup').css({
                    clear: 'both'
                }).find('> ul').css({
                    'column-count'        : instance.options.columns,
                    'column-gap'          : 0,
                    '-webkit-column-count': instance.options.columns,
                    '-webkit-column-gap'  : 0,
                    '-moz-column-count'   : instance.options.columns,
                    '-moz-column-gap'     : 0
                });

                // for crappy IE versions float grouped options
                if( this._ieVersion() && (this._ieVersion() < 10) ) {
                    optionsList.find('li.optgroup > ul > li').css({
                        float: 'left',
                        width: (100 / instance.options.columns) +'%'
                    });
                }
            }
            else {
                // add CSS3 column styles
                optionsList.css({
                    'column-count'        : instance.options.columns,
                    'column-gap'          : 0,
                    '-webkit-column-count': instance.options.columns,
                    '-webkit-column-gap'  : 0,
                    '-moz-column-count'   : instance.options.columns,
                    '-moz-column-gap'     : 0
                });

                // for crappy IE versions float grouped options
                if( this._ieVersion() && (this._ieVersion() < 10) ) {
                    optionsList.find('> li').css({
                        float: 'left',
                        width: (100 / instance.options.columns) +'%'
                    });
                }
            }

            // BIND SELECT ACTION
            optionsWrap.on( 'click', 'input[type="checkbox"]', function(){
                $(this).closest( 'li' ).toggleClass( 'selected' );

                var select = optionsWrap.parent().prev();

                // toggle clicked option
                select.find('option[value="'+ $(this).val() +'"]').prop(
                    'selected', $(this).is(':checked')
                ).closest('select').trigger('change');

                if( typeof instance.options.onOptionClick == 'function' ) {
                    instance.options.onOptionClick();
                }

                instance._updatePlaceholderText();
            });

            // hide native select list
            if( typeof instance.options.onLoad === 'function' ) {
                instance.options.onLoad( instance.element );
            }
            else {
                $(instance.element).hide();
            }
        },

        /* LOAD SELECT OPTIONS */
        loadOptions: function( options, overwrite ) {
            overwrite = (typeof overwrite == 'boolean') ? overwrite : true;

            var instance    = this;
            var optionsList = $(instance.element).next('.ms-options-wrap').find('> .ms-options > ul');

            if( overwrite ) {
                optionsList.find('> li').remove();
            }

            for( var key in options ) {
                var thisOption = options[ key ];
                var container  = $('<li></li>');

                // optgroup
                if( thisOption.hasOwnProperty('options') ) {
                    container.addClass('optgroup');
                    container.append('<span class="label">'+ thisOption.label +'</span>');
                    container.find('> .label').css({
                        clear: 'both'
                    });

                    if( instance.options.selectGroup ) {
                        container.append('<a href="#" class="ms-selectall">Select all</a>')
                    }
                    
                    container.append('<ul></ul>');

                    for( var gKey in thisOption.options ) {
                        var thisGOption = thisOption.options[ gKey ];
                        var gContainer  = $('<li></li>').addClass('ms-reflow');

                        instance._addOption( gContainer, thisGOption );

                        container.find('> ul').append( gContainer );
                    }
                }
                // option
                else if( thisOption.hasOwnProperty('value') ) {
                    container.addClass('ms-reflow')

                    instance._addOption( container, thisOption );
                }

                optionsList.append( container );
            }

            optionsList.find('.ms-reflow input[type="checkbox"]').each(function( idx ){
                if( $(this).css('display').match(/block$/) ) {
                    var checkboxWidth = $(this).outerWidth();
                        checkboxWidth = checkboxWidth ? checkboxWidth : 15;

                    $(this).closest('label').css(
                        'padding-left',
                        (parseInt( $(this).closest('label').css('padding-left') ) * 2) + checkboxWidth
                    );

                    $(this).closest('.ms-reflow').removeClass('ms-reflow');
                }
            });

            instance._updatePlaceholderText();
        },

        /* RESET THE DOM */
        unload: function() {
            $(this.element).next('.ms-options-wrap').remove();
            $(this.element).show(function(){
                $(this).css('display','').removeClass('jqmsLoaded');
            });
        },

        /* RELOAD JQ MULTISELECT LIST */
        reload: function() {
            // remove existing options
            $(this.element).next('.ms-options-wrap').remove();
            $(this.element).removeClass('jqmsLoaded');

            // load element
            this.load();
        },

        /** PRIVATE FUNCTIONS **/
        // update selected placeholder text
        _updatePlaceholderText: function(){
            var instance    = this;
            var placeholder = $(instance.element).next('.ms-options-wrap').find('> button:first-child');
            var optionsWrap = $(instance.element).next('.ms-options-wrap').find('> .ms-options');
            var select      = optionsWrap.parent().prev();

            // get selected options
            var selOpts = [];
            select.find('option:selected').each(function(){
                selOpts.push( $(this).text() );
            });

            // UPDATE PLACEHOLDER TEXT WITH OPTIONS SELECTED
            placeholder.text( selOpts.join( ', ' ) );
            var copy = placeholder.clone().css({
                display   : 'inline',
                width     : 'auto',
                visibility: 'hidden'
            }).appendTo( optionsWrap.parent() );

            // if the jquery.actual plugin is loaded use it to get the widths
            var copyWidth  = (typeof $.fn.actual !== 'undefined') ? copy.actual( 'width', instance.options.jqActualOpts ) : copy.width();
            var placeWidth = (typeof $.fn.actual !== 'undefined') ? placeholder.actual( 'width', instance.options.jqActualOpts ) : placeholder.width();

            // if copy is larger than button width use "# selected"
            if( copyWidth > placeWidth ) {
                placeholder.text(selOpts.length +' selected' );
            }
            // if options selected then use those
            else if( selOpts.length ) {
                placeholder.text( selOpts.join( ', ' ) );
            }
            // replace placeholder text
            else {
                placeholder.text( instance.options.placeholder );
            }

            // remove dummy element
            copy.remove();
        },

        // Add option to the custom dom list
        _addOption: function( container, option ) {
            container.text( option.name );
            container.prepend(
                $('<input type="checkbox" value="" title="" />')
                    .val( option.value )
                    .attr( 'title', option.name )
                    .attr( 'id', 'ms-opt-'+ msCounter )
            );

            if( option.checked ) {
                container.addClass('default');
                container.addClass('selected');
                container.find( 'input[type="checkbox"]' ).prop( 'checked', true );
            }

            var label = $('<label></label>').attr( 'for', 'ms-opt-'+ msCounter );
            container.wrapInner( label );


            if( !this.options.showCheckbox ) {
                container.find('input[id="ms-opt-'+ msCounter +'"]').hide();
            }

            msCounter = msCounter + 1;
        },

        // check ie version
        _ieVersion: function() {
            var myNav = navigator.userAgent.toLowerCase();
            return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
        }
    };

    // ENABLE JQUERY PLUGIN FUNCTION
    $.fn.multiselect = function( options ){
        var args = arguments;
        var ret;

        // menuize each list
        if( (options === undefined) || (typeof options === 'object') ) {
            return this.each(function(){
                if( !$.data( this, 'plugin_multiselect' ) ) {
                    $.data( this, 'plugin_multiselect', new MultiSelect( this, options ) );
                }
            });
        } else if( (typeof options === 'string') && (options[0] !== '_') && (options !== 'init') ) {
            this.each(function(){
                var instance = $.data( this, 'plugin_multiselect' );

                if( instance instanceof MultiSelect && typeof instance[ options ] === 'function' ) {
                    ret = instance[ options ].apply( instance, Array.prototype.slice.call( args, 1 ) );
                }

                // special destruct handler
                if( options === 'unload' ) {
                    $.data( this, 'plugin_multiselect', null );
                }
            });

            return ret;
        }
    };
}(jQuery));
$('select[multiple]').multiselect({
    columns: 1,
    placeholder: 'Select Countries',
    search: true
});
</script>
<script>
    $('#select_all').change(function() {
        if(this.checked) {
            $('.ms-options-wrap button').text('Selected All')
            $('.ms-options').each(function(){
                $(this).find('ul li').addClass('selected')
                $(this).find( 'input[type="checkbox"]' ).prop( 'checked', true )
            })
            $('#country_code option').prop('selected', true)
        }
        else {
            $('.ms-options-wrap button').text('Select Country')
            $('.ms-options').each(function(){
                $(this).find('ul li').removeClass('selected')
                $(this).find( 'input[type="checkbox"]' ).prop( 'checked', false );
            })
            $('#country_code option').prop('selected', false)
        }
    });
    $(document).ready(function(){
        const Base_url = $("#survey-url").val()
        function display_urls(){
            var bussiness_unit = []
            var countries = $("#country_code").val()
            bussiness_unit = $("#business_unit").val().split(",")
            $("#urls").empty()
            for( let b = 0; b < bussiness_unit.length; b++){
                var unit = bussiness_unit[b];
                for(let i=0; i < countries.length; i++){
                    // var c_name='';
                    // $('#country_code').children().each(function(i,v){
                    //     if($(v).val()==countries[i])
                    //     {
                    //         c_name=$(this).text();
                    //     }
                    // })
                    // console.log(c_name)
                   
                    var new_val = Base_url+"?c_id="+countries[i]+"&b_unit="+unit
                    $("#urls").append(''+
                    '<div class="form-group row">'+
                        '<label class="col-sm-3 text-sm-right col-form-label">Unit: '+unit+' ('+countries[i]+')</label>'+
                        '<div class="col-sm-6">'+
                            '<div class="input-group">'+
                                '<input type="text" class="form-control" name="survey_url['+b+i+']" value="'+new_val+'" id="survey_url_'+i+'"/>'+
                                '<span class="input-group-append">'+
                                    '<span class="input-group-text btn-clipboard" data-clipboard-target="#survey_url_'+i+'">Copy</span>'+
                                '</span>'+
                            '</div>'+
                        '</div>'+
                    '</div>')
                }
                
            }
        }

        $("#g_links").click(function(){
            display_urls()
        })
    })
</script>
@endsection
