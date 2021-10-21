
<label class="col-m-2 col-form-label ml-4 mt-3" for="Question_color-select">Font</label>
 <select class="form-control input-lg w-75 ml-4" name="font_style" id="font_style_val">
    @if($survey->font_style)
    <option value="{{ $survey->font_style }}" selected>{{ $survey->font_style }}</option>
    @else
    <option value="Arial" selected>Arial</option>
    @endif
    <option value="Comic Sans MS">Comic Sans MS</option>
    <option value="Times New Roman">Times New Roman</option>
    <option value="Courier New">Courier New</option>
    <option value="Verdana">Verdana</option>
    <option value="Sans Serif">Sans Serif</option>
    <option value="Arial">Arial</option>
    <option value="Trebuchet MS">Trebuchet MS</option>
    <option value="Arial Black">Arial Black</option>
    <option value="Impact">Impact</option>
    <option value="Bookman">Bookman</option>
    <option value="Garamond">Garamond</option>
    <option value="Palatino">Palatino</option>
    <option value="Georgia">Georgia</option>
</select>
<div contenteditable="true" id="show_font" class="form-control w-75 ml-4 mt-3" style="height: 100px; overflow-y: scroll">
    This is survey font style.
</div>

<label class="col-m-2 col-form-label ml-4 mt-3" for="Question_color-select">Question</label>
<div class="input-group survey-colorpicker w-75 ml-4">
    <input type="text" class="form-control input-lg" value="#303532" name="Question-color" />
    <span class="input-group-append">
        <span class="input-group-text colorpicker-input-addon"><i></i></span>
    </span>
</div>

<label class="col-m-2 col-form-label ml-4 mt-3" for="Answer_color-select">Answer</label>
<div class="input-group survey-colorpicker w-75 ml-4">
    <input type="text" class="form-control input-lg" value="rgb(0, 0, 0)" name="Answer-color" />
    <span class="input-group-append">
        <span class="input-group-text colorpicker-input-addon"><i></i></span>
    </span>
</div>

<label class="col-m-2 col-form-label ml-4 mt-3" for="button-color-select">Button</label>
<div class="input-group survey-colorpicker w-75 ml-4">
    <input type="text" class="form-control input-lg" value="rgb(23, 162, 184)" name="button-color" />
    <span class="input-group-append">
        <span class="input-group-text colorpicker-input-addon"><i></i></span>
    </span>
</div>

<label class="col-m-2 col-form-label ml-4 mt-3" for="Button-text-color-select">Button Text</label>
<div class="input-group survey-colorpicker w-75 ml-4">
    <input type="text" class="form-control input-lg" value="rgb(255, 255, 255)" name="button-text-color" />
    <span class="input-group-append">
        <span class="input-group-text colorpicker-input-addon"><i></i></span>
    </span>
</div>

<label class="col-m-2 col-form-label ml-4 mt-3" for="Button-text-color-select">Background</label>
<div class="input-group survey-colorpicker w-75 ml-4">
    <input type="text" class="form-control input-lg" value="#FBFBFB" name="button-text-color" />
    <span class="input-group-append">
        <span class="input-group-text colorpicker-input-addon"><i></i></span>
    </span>
</div>