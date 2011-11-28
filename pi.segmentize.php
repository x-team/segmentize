<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  $plugin_info = array(
               'pi_name' => 'Segmentize',
               'pi_version' =>'0.1',
               'pi_author' =>'Viorel Cojocaru',
               'pi_author_url' => 'http://www.x-team.com',
               'pi_description' => 'Returns segments for a given URL',
               'pi_usage' => Segmentize::usage()
               );

  class Segmentize
  {
      
    function Segmentize() 
    {
        $this->EE =& get_instance();
    }
    
    function get() 
    {
      $url = $this->EE->TMPL->fetch_param('url');
      $url = preg_replace(array('/^\//', '/\/$/'), '', $url); 

      $segments = explode('/', $url);
      $id = $this->EE->TMPL->fetch_param('id');

      if ($id < sizeof($segments))
      {
        return $segments[$id];
      } 
      else 
      {
        return false;
      }
    }

    function usage()
    {
        return 'Returns segments for a given URL';
    }
  }
?>
