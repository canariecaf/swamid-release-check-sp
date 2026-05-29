<?php
namespace releasecheck;

/**
 *
 * CAF specific HTML behaviour
 *  - Remove ESI
 *  - Setup our own Discovery Service Handling
 *
 */
class HTMLCAF extends HTML
{
  /** Print CAF Version of Navigation Tab Bar
   *
   * @return string
   */
  public function showNavTabs($tab) {
    printf('    <div class="row">
        <div class="col">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link%s" id="attributes-tab" data-toggle="tab" href="#attributes"
                role="tab" aria-controls="attributes" aria-selected="%s">' . _('Attributes') . '</a>
            </li>
            <li class="nav-item">
              <a class="nav-link%s" id="acc-tab" data-toggle="tab" href="#acc"
                role="tab" aria-controls="acc" aria-selected="%s">' . _('Authentication') . '</a>
            </li>
            <li class="nav-item">
              <a class="nav-link%s" id="entityCategory-tab" data-toggle="tab"
                href="#entityCategory" role="tab" aria-controls="entityCategory"
                aria-selected="%s">' . _('Entity category') . '</a>
            </li>
          </ul>
        </div>
        <div class="col-4 text-right">%s',
    $tab == 'attributes' ? self::HTML_ACTIVE : '', $tab == 'attributes' ? self::HTML_TRUE : '',
    $tab == 'acc' ? self::HTML_ACTIVE : '', $tab == 'acc' ? self::HTML_TRUE : '',
    $tab == 'entityCategory' ? self::HTML_ACTIVE : '', $tab == 'entityCategory' ? self::HTML_TRUE : '',
    "\n");
  }

  /**
   * Print CAF Version of SelectIdP Block
   *
   * @return string
   */
  public function showSelectIdP() {

    printf ('
        <div class="collapse multi-collapse" id="selectIdP">
          <h2>' . _('Select IdP') . '</h2>
          <br>
          <div class="row">
            <div class="col">
              <A HREF=https://%s/%s?entityID=%s&return=%s>IdP Discovery</A><br><br>
            </div>
          </div>
        </div><!-- end collapse selectIdP -->',
      $this->federation['DS'], $this->federation['LoginURL'], 
      urlencode(isset($this->federation['entityID']) ? $this->federation['entityID'] : sprintf('%s/shibboleth', $this->config->basename())),
      urlencode(sprintf('https://%s/Shibboleth.sso/Login?SAMLDS=1', $this->config->basename()))
      );
  }

}

