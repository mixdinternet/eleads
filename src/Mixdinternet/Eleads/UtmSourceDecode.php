<?php

namespace Mixdinternet\Eleads;

class UtmSourceDecode
{

  var $campaign_source;       // Campaign Source
  var $campaign_name;       // Campaign Name
  var $campaign_medium;       // Campaign Medium
  var $campaign_content;      // Campaign Content
  var $campaign_term;         // Campaign Term

  var $first_visit;         // Date of first visit
  var $previous_visit;      // Date of previous visit
  var $current_visit_started; // Current visit started at
  var $times_visited;     // Times visited
  var $pages_viewed;      // Pages viewed in current session

  function __construct($cookie) {
     // If we have the cookies we can go ahead and parse them.
     if (isset($cookie["__utma"]) and isset($cookie["__utmz"])) {
         $this->ParseCookies();
       }

  }

  function ParseCookies(){

  // Parse __utmz cookie
  list($domain_hash,$timestamp, $session_number, $campaign_numer, $campaign_data) = split('[\.]', $cookie["__utmz"],5);

  // Parse the campaign data
  $campaign_data = parse_str(strtr($campaign_data, "|", "&"));

  $this->campaign_source = $utmcsr;
  $this->campaign_name = $utmccn;
  $this->campaign_medium = $utmcmd;
  if (isset($utmctr)) $this->campaign_term = $utmctr;
  if (isset($utmcct)) $this->campaign_content = $utmcct;

  // You should tag you campaigns manually to have a full view
  // of your adwords campaigns data.
  // The same happens with Urchin, tag manually to have your campaign data parsed properly.

  if (isset($utmgclid)) {
    $this->campaign_source = "google";
    $this->campaign_name = "";
    $this->campaign_medium = "cpc";
    $this->campaign_content = "";
    $this->campaign_term = $utmctr;
  }

  // Parse the __utma Cookie
  list($domain_hash,$random_id,$time_initial_visit,$time_beginning_previous_visit,$time_beginning_current_visit,$session_counter) = split('[\.]', $cookie["__utma"]);

  $this->first_visit = date("d M Y - H:i",$time_initial_visit);
  $this->previous_visit = date("d M Y - H:i",$time_beginning_previous_visit);
  $this->current_visit_started = date("d M Y - H:i",$time_beginning_current_visit);
  $this->times_visited = $session_counter;

  // Parse the __utmb Cookie

  list($domain_hash,$pages_viewed,$garbage,$time_beginning_current_session) = split('[\.]', $cookie["__utmb"]);
  $this->pages_viewed = $pages_viewed;

 // End ParseCookies
 }

// End GA_Parse
}

?>