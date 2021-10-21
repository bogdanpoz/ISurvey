
<div class="parent-container d-flex">
    <div class="container p-0 border border setting-secondary-button-container">
      <div class = "container p-0 border-bottom container-above-secondary-buttons">

      </div>
      <div class = "container p-0 border-bottom container-above-secondary-buttons">
        Theme
      </div>
        <button class="setting-secondary-button">Layout</button> 
        <button class="setting-secondary-button">General</button>
        <button class="setting-secondary-button">Style</button>
        <button class="setting-secondary-button">Motion</button>
        <button class="setting-secondary-button">Logo</button>
        <button wire:click="renderBackgroundSettings" class="setting-secondary-button @if($activeSetting == 'background') active @endif">Background</button>
        <button wire:click="renderDesignSettings" class="setting-secondary-button @if($activeSetting == 'design') active @endif">Design</button>
        <div class="restore-default-container">
          <button class="restore-default-button">Restore Defaults</button>
          <div class="restore-default-link-container">
            <a href="" class="restore-default-container-link">Need help?</a>
          </div>
          
        </div> 
        
        
  </div>
 
  <div class="container pb-5 pt-3 border border w-75 setting-container" style="background-color: rgb(240, 240, 240);">

    @if($activeSetting == 'background')
      @include('company.survey.settings.backgroundsettings')
    @endif

    @if($activeSetting == 'design')
    @include('company.survey.settings.designsettings')
    @endif
    
  </div>
  
  <div class="container pb-5 pt-3 border border preview-container" style="background-color: rgb(240, 240, 240);">
      <div class="border-bottom text-secondary d-flex justify-content-center">Preview</div>
      
  </div>
</div>       



